<?php

Class Settings extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('SiteSettings','site');
    }
	public function index()
	{
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
			$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
			$this->load->view('admin/settings/settings',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
	public function file_checkfavicon($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        if(!empty($_FILES['favicon'])){
            $mime = get_mime_by_extension($_FILES['favicon']['name']);
            if(isset($_FILES['favicon']['name']) && $_FILES['favicon']['name']!=""){
                if(in_array($mime, $allowed_mime_type_arr)){
                    return true;
                }else{
                    $this->form_validation->set_message('file_checkfavicon', 'Please select only jpg/png file.');
                    return false;
                }
            }else{
                $this->form_validation->set_message('file_checkfavicon', 'Please choose a file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_checkfavicon', 'Please choose a file to upload.');
            return false;    
        }
    }
    public function file_checksiteicon($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        if(!empty($_FILES['site_icon'])){
            $mime = get_mime_by_extension($_FILES['site_icon']['name']);
            if(isset($_FILES['site_icon']['name']) && $_FILES['site_icon']['name']!=""){
                if(in_array($mime, $allowed_mime_type_arr)){
                    return true;
                }else{
                    $this->form_validation->set_message('file_checksiteicon', 'Please select only jpg/png file.');
                    return false;
                }
            }else{
                $this->form_validation->set_message('file_checksiteicon', 'Please choose a file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_checksiteicon', 'Please choose a file to upload.');
            return false;    
        }
    }
    public function file_checkinvoiceheaderimg($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        if(!empty($_FILES['invoice_header_img'])){
            $mime = get_mime_by_extension($_FILES['invoice_header_img']['name']);
            if(isset($_FILES['invoice_header_img']['name']) && $_FILES['invoice_header_img']['name']!=""){
                if(in_array($mime, $allowed_mime_type_arr)){
                    return true;
                }else{
                    $this->form_validation->set_message('file_checkinvoiceheaderimg', 'Please select only jpg/png file.');
                    return false;
                }
            }else{
                $this->form_validation->set_message('file_checkinvoiceheaderimg', 'Please choose a file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_checkinvoiceheaderimg', 'Please choose a file to upload.');
            return false;    
        }
    }
    public function file_checkinvoicefooterimg($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        if(!empty($_FILES['invoice_footer_img'])){
            $mime = get_mime_by_extension($_FILES['invoice_footer_img']['name']);
            if(isset($_FILES['invoice_footer_img']['name']) && $_FILES['invoice_header_img']['name']!=""){
                if(in_array($mime, $allowed_mime_type_arr)){
                    return true;
                }else{
                    $this->form_validation->set_message('file_checkinvoicefooterimg', 'Please select only jpg/png file.');
                    return false;
                }
            }else{
                $this->form_validation->set_message('file_checkinvoicefooterimg', 'Please choose a file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_checkinvoicefooterimg', 'Please choose a file to upload.');
            return false;    
        }
    }
    public function file_checkbannerimg($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        if(!empty($_FILES['banner_image'])){
            $mime = get_mime_by_extension($_FILES['banner_image']['name']);
            if(isset($_FILES['banner_image']['name']) && $_FILES['banner_image']['name']!=""){
                if(in_array($mime, $allowed_mime_type_arr)){
                    return true;
                }else{
                    $this->form_validation->set_message('file_checkbannerimg', 'Please select only jpg/png file.');
                    return false;
                }
            }else{
                $this->form_validation->set_message('file_checkbannerimg', 'Please choose a file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_checkbannerimg', 'Please choose a file to upload.');
            return false;    
        }
    }
	// Update Site Settings
	public function updateSiteSettings(){
        $siteSettings = $this->site->singleRecord('tbl_site_settings',[]);
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|required');
		$this->form_validation->set_rules('meta_description', 'Meta Description', 'trim|required');
		$this->form_validation->set_rules('mobile_no', 'Mobile Number', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('terms_condition', 'Terms & Condition', 'trim|required');
		$this->form_validation->set_rules('about_us', 'About us', 'trim|required');
		$this->form_validation->set_rules('return_refund', 'Return & Refund', 'trim|required');
		$this->form_validation->set_rules('privacy_policy', 'Privacy & Policy', 'trim|required');
        $this->form_validation->set_rules('featured_course_price', 'Featured Course Price', 'trim|required');
		if(empty($siteSettings)){
			$this->form_validation->set_rules('favicon', 'Favicon', 'callback_file_checkfavicon');
			$this->form_validation->set_rules('site_icon', 'Site Logo', 'callback_file_checksiteicon');
			$this->form_validation->set_rules('invoice_header_img', 'Invoice Header Image', 'callback_file_checkinvoiceheaderimg');
			$this->form_validation->set_rules('invoice_footer_img', 'Invoice Footer Image', 'callback_file_checkinvoicefooterimg');
            $this->form_validation->set_rules('banner_image', 'Banner Image', 'callback_file_checkbannerimg');
		}
		$this->form_validation->set_rules('invoice_terms', 'Invoice Terms', 'trim|required');
		if ($this->form_validation->run()) {
            
			$config['upload_path']  = 'assets/uploads/settings';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
        	$data['meta_title'] = $this->input->post('meta_title');
        	$data['meta_description'] = $this->input->post('meta_description');
        	$data['mobile_no'] = $this->input->post('mobile_no');
        	$data['email'] = $this->input->post('email');
        	$data['address'] = $this->input->post('address');
        	$data['terms_condition'] = $this->input->post('terms_condition');
        	$data['about_us'] = $this->input->post('about_us');
        	$data['return_refund'] = $this->input->post('return_refund');
        	$data['privacy_policy'] = $this->input->post('privacy_policy');
            $data['featured_course_price'] = $this->input->post('featured_course_price');
            $data['analytics_code'] = $this->input->post('analytics_code');
        	if($this->input->post('gst') != ''){
        		$data['gst'] = $this->input->post('gst');
        	}
        	if($this->input->post('onesignal_salt') != ''){
        		$data['onesignal_salt'] = $this->input->post('onesignal_salt');
        	}
        	if($this->input->post('onesignal_key') != ''){
        		$data['onesignal_key'] = $this->input->post('onesignal_key');
        	}
        	if($this->input->post('razorpay_salt') != ''){
        		$data['razorpay_salt'] = $this->input->post('razorpay_salt');
        	}
        	if($this->input->post('razorpay_key') != ''){
        		$data['razorpay_key'] = $this->input->post('razorpay_key');
        	}
        	if($this->input->post('map_api_key') != ''){
        		$data['map_api_key'] = $this->input->post('map_api_key');
        	}
        	if($this->input->post('invoice_terms') != ''){
        		$data['invoice_terms_condition'] = $this->input->post('invoice_terms');
        	}
        	if(!empty($_FILES['site_icon']['name'])){
	            $uploadedFile = $this->uploadFile($_FILES['site_icon']['name'],'site_icon',$config);
	            if(!empty($uploadedFile['error_msg'])){
	            	$response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
	            	echo json_encode($response);
                return false;
	            }
	            $data['logo'] = $uploadedFile['file'];
        	}
        	if(!empty($_FILES['favicon']['name'])){
	            $uploadedFile = $this->uploadFile($_FILES['favicon']['name'],'favicon',$config);
	             if(!empty($uploadedFile['error_msg'])){
	            	$response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
	            	echo json_encode($response);
                return false;
	            }
	            $data['favicon'] = $uploadedFile['file'];
        	}
        	if(!empty($_FILES['invoice_header_img']['name'])){
	            $uploadedFile = $this->uploadFile($_FILES['invoice_header_img']['name'],'invoice_header_img',$config);
	             if(!empty($uploadedFile['error_msg'])){
	            	$response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
	            	echo json_encode($response);
                return false;
	            }
	            $data['invoice_header_img'] = $uploadedFile['file'];
        	}
        	if(!empty($_FILES['invoice_footer_img']['name'])){
	            $uploadedFile = $this->uploadFile($_FILES['invoice_footer_img']['name'],'invoice_footer_img',$config);
	             if(!empty($uploadedFile['error_msg'])){
	            	$response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
	            	echo json_encode($response);
                return false;
	            }
	            $data['invoice_footer_img'] = $uploadedFile['file'];
        	}
            if(!empty($_FILES['banner_image']['name'])){
                $uploadedFile = $this->uploadFile($_FILES['banner_image']['name'],'banner_image',$config);
                 if(!empty($uploadedFile['error_msg'])){
                    $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                    echo json_encode($response);
                return false;
                }
                $data['banner_image'] = $uploadedFile['file'];
            }
        	if(empty($siteSettings)){
        		$result = $this->site->insert('tbl_site_settings',$data);
        	}else{
        		$result = $this->site->updateRecord('tbl_site_settings',array('id'=>1),$data);
        	}
        	if($result > 0){
        		$response = array('status' => 'success','message'=> 'Settings updated successfully','url'=>base_url('admin/settings'));
        		echo json_encode($response);
                return true;
        	}else{
        		$response = array('status' => 'errors','message'=> 'Nothing to update');
        		echo json_encode($response);
                return false;
        	}
        }else{
        	$response = array(
        		'status' => 'error',
        		'errors' => array(
                    'title' => form_error('title'),
                    'description' => form_error('description'),
				    'meta_title' => form_error('meta_title'),
				    'meta_description' => form_error('meta_description'),
                    'banner_image' => form_error('banner_image'),
				    'mobile_no' => form_error('mobile_no'),
				    'email' => form_error('email'),
				    'address' => form_error('address'),
				    'terms_condition' => form_error('terms_condition'),
				    'privacy_policy' => form_error('privacy_policy'),
				    'about_us' => form_error('about_us'),
				    'favicon' => form_error('favicon'),
				    'site_icon' => form_error('site_icon'),
				    'invoice_header_img' => form_error('invoice_header_img'),
				    'invoice_footer_img' => form_error('invoice_footer_img'),
                    'featured_course_price' => form_error('featured_course_price')
        		)  
		   	);
			echo json_encode($response);
                return false;
        }
	}
}

?>