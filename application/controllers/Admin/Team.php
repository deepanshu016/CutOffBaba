<?php

Class Team extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('TeamModel','team');
        $this->load->model('SiteSettings','site');
        $this->load->model('GroupModel','group');
    }
	public function index()
	{
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 

            $data['teamList'] = $this->team->getRecords('tbl_team'); 
			$this->load->view('admin/team/list',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
	public function add(){
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
            $data['groupList'] = $this->group->getRecords('tbl_group',[]);
			$this->load->view('admin/team/add-edit',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
    public function editTeam($id,$slug){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
            $data['singleTeam'] = $this->team->singleRecord('tbl_team',['id'=>$id,'slug'=>$slug]); 
            $data['groupList'] = $this->group->getRecords('tbl_group',[]);
            $this->load->view('admin/team/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
	public function file_check($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        if(!empty($_FILES['image'])){
            $mime = get_mime_by_extension($_FILES['image']['name']);
            if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=""){
                if(in_array($mime, $allowed_mime_type_arr)){
                    return true;
                }else{
                    $this->form_validation->set_message('file_check', 'Please select only jpg/png file.');
                    return false;
                }
            }else{
                $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;    
        }
    }
	//Save Category
	public function saveTeam(){
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('image', 'Image', 'callback_file_check');
        $this->form_validation->set_rules('designation', 'Designation', 'trim|required');
        $this->form_validation->set_rules('about', 'About', 'trim|required');
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/teams';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            if(!empty($_FILES['image']['name'])){
                $uploadedFile = $this->uploadFile($_FILES['image']['name'],'image',$config);
                 if($uploadedFile['error_msg'] != ''){
                    $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                    return json_encode($response);
                }
                $data['image'] = $uploadedFile['file'];
            }
            $data['name'] = $this->input->post('name');
            $data['slug'] = $this->slug($this->input->post('name'));
            $data['designation'] = $this->input->post('designation');
            $data['about'] = $this->input->post('about');
            $data['facebook'] = $this->input->post('facebook');
            $data['twitter'] = $this->input->post('twitter');
            $data['linkedin'] = $this->input->post('linkedin');
            $data['youtube'] = $this->input->post('youtube');
            $data['group_id'] = $this->input->post('group_id');
            $data['website'] = $this->input->post('website');
            $data['instagram'] = $this->input->post('instagram');
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $result = $this->team->insert('tbl_team',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Team added successfully','url'=>base_url('admin/team'));
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
                    'name' => form_error('name'),
                    'image' => form_error('image'),
                    'designation' => form_error('designation'),
                    'about' => form_error('about')
                )  
            );
            echo json_encode($response);
                return false;    
        }
	}
    //Save Category
    public function updateTeam(){
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('designation', 'Designation', 'trim|required');
        $this->form_validation->set_rules('about', 'ABout', 'trim|required');
        if(!empty($_FILES['image']['name'])){
        $this->form_validation->set_rules('image', 'Image', 'callback_file_check');
        }
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/teams';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            if(!empty($_FILES['image']['name'])){
                $uploadedFile = $this->uploadFile($_FILES['image']['name'],'image',$config);
                if($uploadedFile['error_msg'] != ''){
                    $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }else{
                    $data['image'] = $uploadedFile['file'];
                }
            }
            $data['name'] = $this->input->post('name');
            $data['slug'] = $this->slug($this->input->post('name'));
            $data['designation'] = $this->input->post('designation');
            $data['about'] = $this->input->post('about');
            $data['facebook'] = $this->input->post('facebook');
            $data['twitter'] = $this->input->post('twitter');
            $data['linkedin'] = $this->input->post('linkedin');
            $data['group_id'] = $this->input->post('group_id');
            $data['youtube'] = $this->input->post('youtube');
            $data['website'] = $this->input->post('website');
            $data['instagram'] = $this->input->post('instagram');
            $data['status'] = 1;
            $result = $this->team->updateRecord('tbl_team',array('id'=>$this->input->post('team_id')),$data);
            $response = array('status' => 'success','message'=> 'Team updated successfully','url'=>base_url('admin/team'));
            echo json_encode($response);
        }else{
             $response = array(
                'status' => 'error',
                'errors' => array(
                    'name' => form_error('name'),
                    'image' => form_error('image'),
                    'designation' => form_error('designation'),
                    'about' => form_error('about')
                )  
            );
            echo json_encode($response);
                return false;    
        }
    }
    public function deleteTeam(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->team->deleteRecord('tbl_team',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Team delete successfully','url'=>base_url('admin/team'));
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