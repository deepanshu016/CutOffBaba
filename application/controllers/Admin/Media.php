<?php

Class Media extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('MediaModel','media');
   	 	$this->load->model('MediaImages','images');
        $this->load->model('BlogType','blog_type');
        $this->load->model('SiteSettings','site');
    }
	public function index()
	{
		if ($this->is_admin_logged_in() == true) {
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
			$data['admin_session'] = $this->session->userdata('admin');
			$data['mediaList'] = $this->media->getRecords('tbl_media_presence');
			$this->load->view('admin/media/list',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
	public function add(){
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
			$this->load->view('admin/media/add-edit',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
    public function editMedia($id,$slug){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
            $data['singleMedia'] = $this->media->singleRecord('tbl_media_presence',array('id'=>$id,'slug'=>$slug));
            $this->load->view('admin/media/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
	public function file_check($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        if(!empty($_FILES['thumbnail'])){
            $mime = get_mime_by_extension($_FILES['thumbnail']['name']);
            if(isset($_FILES['thumbnail']['name']) && $_FILES['thumbnail']['name']!=""){
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
	//Save Media
	public function saveMedia(){
        $this->form_validation->set_rules('thumbnail', 'Thumbnaile', 'callback_file_check');
        $this->form_validation->set_rules('event_name', 'Event Name', 'trim|required');
        $this->form_validation->set_rules('event_date', 'Event Date', 'trim|required');
        $this->form_validation->set_rules('event_description', 'Event Description', 'trim|required');
        if ($this->form_validation->run()) {
            $this->db->trans_start();
            $config['upload_path']  = 'assets/uploads/media/thumbnail';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            if(!empty($_FILES['thumbnail']['name'])){
	            $uploadedFile = $this->uploadFile($_FILES['thumbnail']['name'],'thumbnail',$config);
	             if($uploadedFile['error_msg'] != ''){
	            	$response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
	            	return json_encode($response);
	            }
	            $data['thumbnail'] = $uploadedFile['file'];
        	}
            $data['event_name'] = $this->input->post('event_name');
            $data['slug'] = $this->slug($this->input->post('event_name'));
            $data['event_date'] = $this->input->post('event_date');
            $data['event_description'] = $this->input->post('event_description');
            $data['status'] = ($this->input->post('status') == 'on') ? 1 : 0;
            $data['created_at'] = date('Y-m-d H:i:s');
            $result = $this->media->insert('tbl_media_presence',$data);
            if(isset($_FILES['media_images']['name'])){
                $this->images->deleteRecord('tbl_media_images',array('media_id'=>$result));
                $uploadedImages = $this->uploadMultipleFiles($_FILES['media_images'],'media_images','Media Presence',$result,'media/');
                $this->images->insert('tbl_media_images',$uploadedImages);
            }
            $this->db->trans_complete();
            if($result > 0){

                $response = array('status' => 'success','message'=> 'Media added successfully','url'=>base_url('admin/media'));
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
				    'thumbnail' => form_error('thumbnail'),
				    'event_name' => form_error('event_name'),
                    'event_date' => form_error('event_date'),
				    'event_description' => form_error('event_description')
        		)  
		   	);
			echo json_encode($response);
                return false;
        }
	}
    //Save Media
    public function updateMedia(){
        if(!empty($_FILES['thumbnail']['name'])){
            $this->form_validation->set_rules('thumbnail', 'Thumbnail', 'callback_file_check');
        }
        $this->form_validation->set_rules('event_name', 'Event Name', 'trim|required');
        $this->form_validation->set_rules('event_date', 'Event Date', 'trim|required');
        $this->form_validation->set_rules('event_description', 'Event Description', 'trim|required');
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/media/thumbnail';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            if(!empty($_FILES['thumbnail']['name'])){
	            $uploadedFile = $this->uploadFile($_FILES['thumbnail']['name'],'thumbnail',$config);
	            if($uploadedFile['error_msg'] != ''){
	            	$response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
	            	echo json_encode($response);
                    return false;
	            }else{
	            	$data['thumbnail'] = $uploadedFile['file'];
	            }
        	}
            $data['event_name'] = $this->input->post('event_name');
            $data['slug'] = $this->slug($this->input->post('event_name'));
            $data['event_date'] = $this->input->post('event_date');
            $data['event_description'] = $this->input->post('event_description');
            $data['status'] = ($this->input->post('status') == 'on') ? 1 : 0;
            $data['updated_at'] = date('Y-m-d H:i:s');
            $result = $this->media->updateRecord('tbl_media_presence',array('id'=>$this->input->post('media_id')),$data);
            if(isset($_FILES['media_images']['name'])){
                $uploadedImages = $this->uploadMultipleFiles($_FILES['media_images'],'media_images','Media Presence',$this->input->post('media_id'),'media/');
                $this->images->insert('tbl_media_images',$uploadedImages);
            }
            $response = array('status' => 'success','message'=> 'Media updated successfully','url'=>base_url('admin/media'));
    		echo json_encode($response);
            return false;
        }else{
             $response = array(
        		'status' => 'error',
        		'errors' => array(
                    'thumbnail' => form_error('thumbnail'),
                    'event_name' => form_error('event_name'),
                    'event_date' => form_error('event_date'),
                    'event_description' => form_error('event_description')
                )  
		   	);
			echo json_encode($response);
                return false;  
        }
    }
    public function deleteMedia(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->media->deleteRecord('tbl_media_presence',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Media  deleted successfully','url'=>base_url('admin/media'));
            }else{
                $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
            }
        }else{
             $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
    public function deleteMediaImages(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->images->deleteRecord('tbl_media_images',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Image deleted successfully','url'=>base_url('admin/media'));
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