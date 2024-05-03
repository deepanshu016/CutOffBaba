<?php

class Groups extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('GroupModel','group');
        $this->load->model('SiteSettings','site');
        $this->load->model('User','user');
    }
	public function index()
	{
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
			$data['groupList'] = $this->group->getRecords('tbl_group',[]);
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);  
			$this->load->view('admin/group/list',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
	public function addGroup(){
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);  
			$this->load->view('admin/group/add-edit',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
    public function editGroup($id,$slug){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['singleGroup'] = $this->group->singleRecord('tbl_group',array('id'=>$id,'slug'=>$slug));
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);  
            $this->load->view('admin/group/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
	// //Save Department
	public function saveGroup(){
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
        if ($this->form_validation->run()) {
            $data['title'] = $this->input->post('title');
            $data['slug'] = $this->slug($this->input->post('title'));
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->db->trans_start();
            $result = $this->group->insert('tbl_Group',$data);
            $this->db->trans_complete();
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Group added successfully','url'=>base_url('admin/group'));
        		echo json_encode($response);
                return false;
            }else{
                $response = array('status' => 'errors','message'=> 'Something went wrong');
        		echo json_encode($response);
                return false;
            }
        }else{
            $response = array(
        		'status' => 'error',
        		'errors' => array(
				    'title' => form_error('title'),
        		)  
		   	);
			echo json_encode($response);
                return false;
        }
	}
 //    //Save Category
    public function updateGroup(){
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        if ($this->form_validation->run()) {
            $data['title'] = $this->input->post('title');
            $data['slug'] = $this->slug($this->input->post('title'));
            $data['status'] = 1;
            $data['updated_at'] = date('Y-m-d H:i:s');
            $this->db->trans_start();
            $result = $this->group->updateRecord('tbl_Group',array('id'=>$this->input->post('Group_id')),$data);
            $this->db->trans_complete();
            $data['singleGroup'] = $this->Group->singleRecord('tbl_Group',array('id'=>$this->input->post('Group_id')));
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Group updated successfully','url'=>base_url('admin/group'));
        		echo json_encode($response);
                return false;
            }else{
                $response = array('status' => 'errors','message'=> 'Something went wrong');
        		echo json_encode($response);
                return false;
            }
        }else{
             $response = array(
        		'status' => 'error',
        		'errors' => array(
				    'title' => form_error('title')
        		)  
		   	);
			echo json_encode($response);
                return false;  
        }
    }
    public function deleteGroup(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->group->deleteRecord('tbl_Group',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Group deleted successfully','url'=>base_url('admin/group'));
            }else{
                $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
            }
        }else{
             $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
}

?>