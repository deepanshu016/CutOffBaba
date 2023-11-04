<?php

Class Departement extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('DepartementModel','departement');
        $this->load->model('SiteSettings','site');
        $this->load->model('User','user');
    }
	public function index()
	{
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
			$data['departementList'] = $this->departement->getRecords('tbl_departement');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);  
			$this->load->view('admin/departement/list',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
	public function addDepartement(){
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);  
			$this->load->view('admin/departement/add-edit',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
    public function editDepartement($id,$slug){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['singleDepartment'] = $this->departement->singleRecord('tbl_departement',array('id'=>$id,'slug'=>$slug));
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);  
            $this->load->view('admin/departement/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
	//Save Department
	public function saveDepartement(){
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
        if ($this->form_validation->run()) {
            $data['title'] = $this->input->post('title');
            $data['slug'] = $this->slug($this->input->post('title'));
            $data['status'] = ($this->input->post('status') == 'on') ? 1 : 0;
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->db->trans_start();
            $result = $this->departement->insert('tbl_departement',$data);
            $this->db->trans_complete();
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Department added successfully','url'=>base_url('admin/departement'));
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
    //Save Category
    public function updateDepartement(){
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        if ($this->form_validation->run()) {
            $data['title'] = $this->input->post('title');
            $data['slug'] = $this->slug($this->input->post('title'));
            $data['status'] = ($this->input->post('status') == 'on') ? 1 : 0;
            $data['updated_at'] = date('Y-m-d H:i:s');
            $this->db->trans_start();
            $result = $this->departement->updateRecord('tbl_departement',array('id'=>$this->input->post('departement_id')),$data);
            $this->db->trans_complete();
            $data['singleDepartement'] = $this->departement->singleRecord('tbl_departement',array('id'=>$this->input->post('departement_id')));
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Departement updated successfully','url'=>base_url('admin/departement'));
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
    public function deleteDepartement(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->departement->deleteRecord('tbl_departement',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Departement deleted successfully','url'=>base_url('admin/departement'));
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