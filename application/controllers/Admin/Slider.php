

<?php

Class Slider extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('SliderModel','slider');
        $this->load->model('SiteSettings','site');
    }
	public function index()
	{
		if ($this->is_admin_logged_in() == true) {
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
			$data['admin_session'] = $this->session->userdata('admin');
			$data['sliderList'] = $this->slider->getRecords('tbl_slider');
			$this->load->view('admin/slider/list',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
	public function add(){
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
			$this->load->view('admin/slider/add-edit',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
    public function editSlider($id,$slug){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
            $data['singleSlider'] = $this->slider->singleRecord('tbl_slider',array('id'=>$id,'slug'=>$slug));
            
            $this->load->view('admin/slider/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
	public function file_check($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        if(!empty($_FILES['slider_image'])){
            $mime = get_mime_by_extension($_FILES['slider_image']['name']);
            if(isset($_FILES['slider_image']['name']) && $_FILES['slider_image']['name']!=""){
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
	//Save Slider
	public function saveSlider(){
        $config['upload_path']  = 'assets/uploads/slider';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] =  TRUE;
        $config['max_size']      = 5000;
        if(!empty($_FILES['background_image_for_small']['name'])){
            $uploadedFile = $this->uploadFile($_FILES['background_image_for_small']['name'],'background_image_for_small',$config);
             if($uploadedFile['error_msg'] != ''){
            	$response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
            	return json_encode($response);
            }
            $data['background_image_for_small'] = $uploadedFile['file'];
    	}
        if(!empty($_FILES['background_image_for_large']['name'])){
            $uploadedFile = $this->uploadFile($_FILES['background_image_for_large']['name'],'background_image_for_large',$config);
             if($uploadedFile['error_msg'] != ''){
                $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                return json_encode($response);
            }
            $data['background_image_for_large'] = $uploadedFile['file'];
        }
        if(!empty($_FILES['left_image_for_large']['name'])){
            $uploadedFile = $this->uploadFile($_FILES['left_image_for_large']['name'],'left_image_for_large',$config);
             if($uploadedFile['error_msg'] != ''){
                $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                return json_encode($response);
            }
            $data['left_image_for_large'] = $uploadedFile['file'];
        }
        if(!empty($_FILES['left_image_for_small']['name'])){
            $uploadedFile = $this->uploadFile($_FILES['left_image_for_small']['name'],'left_image_for_small',$config);
             if($uploadedFile['error_msg'] != ''){
                $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                return json_encode($response);
            }
            $data['left_image_for_small'] = $uploadedFile['file'];
        }
        if(!empty($_FILES['right_image_for_large']['name'])){
            $uploadedFile = $this->uploadFile($_FILES['right_image_for_large']['name'],'right_image_for_large',$config);
             if($uploadedFile['error_msg'] != ''){
                $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                return json_encode($response);
            }
            $data['right_image_for_large'] = $uploadedFile['file'];
        }
        if(!empty($_FILES['right_image_for_small']['name'])){
            $uploadedFile = $this->uploadFile($_FILES['right_image_for_small']['name'],'right_image_for_small',$config);
             if($uploadedFile['error_msg'] != ''){
                $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                return json_encode($response);
            }
            $data['right_image_for_small'] = $uploadedFile['file'];
        }
        $data['banner_title_small'] = $this->input->post('Slider_title_small');
        $data['slug'] = $this->slug($this->input->post('Slider_title_small'));
        $data['banner_title_large'] = $this->input->post('Slider_title_large');
        $data['banner_sub_title_large'] = $this->input->post('Slider_sub_title_large');
        $data['banner_sub_title_right'] = $this->input->post('Slider_sub_title_right');
        $data['button_title_large'] = $this->input->post('button_title_large');
        $data['button_title_small'] = $this->input->post('button_title_small');
        $data['button_link_large'] = $this->input->post('button_link_large');
        $data['button_link_small'] = $this->input->post('button_link_small');
        $data['status'] = 1;
        $data['created_at'] = date('Y-m-d H:i:s');
        $result = $this->slider->insert('tbl_slider',$data);
        if($result > 0){
            $response = array('status' => 'success','message'=> 'Slider added successfully','url'=>base_url('admin/slider'));
    		echo json_encode($response);
            return false;
        }else{
            $response = array('status' => 'errors','message'=> 'Something went wrong');
    		echo json_encode($response);
            return false;
        }
	}
    //Save Category
    public function updateSlider(){
        $config['upload_path']  = 'assets/uploads/slider';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['encrypt_name'] =  TRUE;
        $config['max_size']      = 5000;
        if(!empty($_FILES['background_image_for_small']['name'])){
            $uploadedFile = $this->uploadFile($_FILES['background_image_for_small']['name'],'background_image_for_small',$config);
             if($uploadedFile['error_msg'] != ''){
            	$response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
            	return json_encode($response);
            }
            $data['background_image_for_small'] = $uploadedFile['file'];
    	}
        if(!empty($_FILES['background_image_for_large']['name'])){
            $uploadedFile = $this->uploadFile($_FILES['background_image_for_large']['name'],'background_image_for_large',$config);
             if($uploadedFile['error_msg'] != ''){
                $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                return json_encode($response);
            }
            $data['background_image_for_large'] = $uploadedFile['file'];
        }
        if(!empty($_FILES['left_image_for_large']['name'])){
            $uploadedFile = $this->uploadFile($_FILES['left_image_for_large']['name'],'left_image_for_large',$config);
             if($uploadedFile['error_msg'] != ''){
                $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                return json_encode($response);
            }
            $data['left_image_for_large'] = $uploadedFile['file'];
        }

        if(!empty($_FILES['button_title_large']['name'])){
            $uploadedFile = $this->uploadFile($_FILES['button_title_large']['name'],'button_title_large',$config);
             if($uploadedFile['error_msg'] != ''){
                $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                return json_encode($response);
            }
            $data['button_title_large'] = $uploadedFile['file'];
        }
        if(!empty($_FILES['button_title_small']['name'])){
            $uploadedFile = $this->uploadFile($_FILES['button_title_small']['name'],'button_title_small',$config);
             if($uploadedFile['error_msg'] != ''){
                $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                return json_encode($response);
            }
            $data['button_title_small'] = $uploadedFile['file'];
        }
        if(!empty($_FILES['left_image_for_small']['name'])){
            $uploadedFile = $this->uploadFile($_FILES['left_image_for_small']['name'],'left_image_for_small',$config);
             if($uploadedFile['error_msg'] != ''){
                $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                return json_encode($response);
            }
            $data['left_image_for_small'] = $uploadedFile['file'];
        }
        if(!empty($_FILES['right_image_for_large']['name'])){
            $uploadedFile = $this->uploadFile($_FILES['right_image_for_large']['name'],'right_image_for_large',$config);
             if($uploadedFile['error_msg'] != ''){
                $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                return json_encode($response);
            }
            $data['right_image_for_large'] = $uploadedFile['file'];
        }
        if(!empty($_FILES['right_image_for_small']['name'])){
            $uploadedFile = $this->uploadFile($_FILES['right_image_for_small']['name'],'right_image_for_small',$config);
             if($uploadedFile['error_msg'] != ''){
                $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                return json_encode($response);
            }
            $data['right_image_for_small'] = $uploadedFile['file'];
        }
        $data['banner_title_small'] = $this->input->post('banner_title_small');
        $data['slug'] = $this->slug($this->input->post('banner_title_small'));
        $data['banner_title_large'] = $this->input->post('banner_title_large');
        $data['banner_sub_title_large'] = $this->input->post('banner_sub_title_large');
        $data['banner_sub_title_right'] = $this->input->post('banner_sub_title_right');
        $data['button_link_large'] = $this->input->post('button_link_large');
        $data['button_link_small'] = $this->input->post('button_link_small');
        $data['status'] = 1;
        $data['updated_at'] = date('Y-m-d H:i:s');
        $result = $this->slider->updateRecord('tbl_slider',array('id'=>$this->input->post('slider_id')),$data);
        $response = array('status' => 'success','message'=> 'Slider updated successfully','url'=>base_url('admin/slider'));
    	echo json_encode($response);
        return true;
    }
    public function deleteSlider(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->slider->deleteRecord('tbl_slider',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Slider deleted successfully','url'=>base_url('admin/slider'));
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