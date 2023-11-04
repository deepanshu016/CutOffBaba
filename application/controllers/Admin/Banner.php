<?php

Class Banner extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('BannerModel','banner');
        $this->load->model('SiteSettings','site');
    }
	public function index()
	{
		if ($this->is_admin_logged_in() == true) {
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
			$data['admin_session'] = $this->session->userdata('admin');
			$data['bannerList'] = $this->banner->getRecords('tbl_banner');
			$this->load->view('admin/banner/list',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
	public function add(){
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
			$this->load->view('admin/banner/add-edit',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
    public function editBanner($id,$slug){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
            $data['singleBanner'] = $this->banner->singleRecord('tbl_banner',array('id'=>$id,'slug'=>$slug));
            $this->load->view('admin/banner/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
	public function file_check($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        if(!empty($_FILES['banner_image'])){
            $mime = get_mime_by_extension($_FILES['banner_image']['name']);
            if(isset($_FILES['banner_image']['name']) && $_FILES['banner_image']['name']!=""){
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
	//Save Banner
	public function saveBanner(){
        $this->form_validation->set_rules('banner_image', 'Banner Image', 'callback_file_check');
        $this->form_validation->set_rules('banner_title', 'Banner Title', 'trim|required');
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/banners';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            if(!empty($_FILES['banner_image']['name'])){
	            $uploadedFile = $this->uploadFile($_FILES['banner_image']['name'],'banner_image',$config);
	             if($uploadedFile['error_msg'] != ''){
	            	$response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
	            	return json_encode($response);
	            }
	            $data['image'] = $uploadedFile['file'];
        	}
            $data['title'] = $this->input->post('banner_title');
            $data['slug'] = $this->slug($this->input->post('banner_title'));
            $data['description'] = $this->input->post('description');
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $result = $this->banner->insert('tbl_banner',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Banner added successfully','url'=>base_url('admin/banner'));
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
				    'banner_image' => form_error('banner_image'),
				    'banner_title' => form_error('banner_title')
        		)  
		   	);
			echo json_encode($response);
                return false;
        }
	}
    //Save Category
    public function updateBanner(){
        if(!empty($_FILES['banner_image']['name'])){
            $this->form_validation->set_rules('banner_image', 'Banner Image', 'callback_file_check');
        }
        $this->form_validation->set_rules('banner_title', 'Banner Title', 'trim|required');
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/banners';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            if(!empty($_FILES['banner_image']['name'])){
	            $uploadedFile = $this->uploadFile($_FILES['banner_image']['name'],'banner_image',$config);
	            if($uploadedFile['error_msg'] != ''){
	            	$response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
	            	echo json_encode($response);
                    return false;
	            }else{
	            	$data['image'] = $uploadedFile['file'];
	            }
        	}
            $data['title'] = $this->input->post('banner_title');
            $data['slug'] = $this->slug($this->input->post('banner_title'));
            $data['description'] = $this->input->post('description');
            $data['status'] = 1;
            $data['updated_at'] = date('Y-m-d H:i:s');
            $result = $this->banner->updateRecord('tbl_banner',array('id'=>$this->input->post('banner_id')),$data);
            $response = array('status' => 'success','message'=> 'Banner updated successfully','url'=>base_url('admin/banner'));
        	echo json_encode($response);
            return true;
        }else{
             $response = array(
        		'status' => 'error',
        		'errors' => array(
                    'banner_image' => form_error('banner_image'),
                    'banner_title' => form_error('banner_title')
                )  
		   	);
			echo json_encode($response);
                return false;  
        }
    }
    public function deleteBanner(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->banner->deleteRecord('tbl_banner',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Banner deleted successfully','url'=>base_url('admin/banner'));
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