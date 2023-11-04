<?php

Class Course extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('CourseModel','course');
        $this->load->model('SiteSettings','site');
    }
	public function index()
	{
		if ($this->is_admin_logged_in() == true) {
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
			$data['admin_session'] = $this->session->userdata('admin');
            $data['courseList'] = $this->course->getRecords('tbl_course',[]); 
			$this->load->view('admin/course/list',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
	public function add(){
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
			$this->load->view('admin/course/add-edit',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
    public function editCourse($id,$slug){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
            $data['singleCourse'] = $this->course->singleRecord('tbl_course',array('id'=>$id,'slug'=>$slug));
            $this->load->view('admin/course/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
	public function file_check($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        if(!empty($_FILES['course_thumbnail'])){
            $mime = get_mime_by_extension($_FILES['course_thumbnail']['name']);
            if(isset($_FILES['course_thumbnail']['name']) && $_FILES['course_thumbnail']['name']!=""){
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
	public function saveCourse(){
        $this->form_validation->set_rules('course_thumbnail', 'Course Thumbnail', 'callback_file_check');
        $this->form_validation->set_rules('course_title', 'Course Title', 'trim|required');
        $this->form_validation->set_rules('course_price', 'Course', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('short_description', 'Short Description', 'trim|required');
        $this->form_validation->set_rules('long_description', 'Long Description', 'trim|required');
        $this->form_validation->set_rules('seo_title', 'SEO Title', 'trim|required');
        $this->form_validation->set_rules('seo_description', 'SEO Description', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/courses';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            if(!empty($_FILES['course_thumbnail']['name'])){
	            $uploadedFile = $this->uploadFile($_FILES['course_thumbnail']['name'],'course_thumbnail',$config);
	             if($uploadedFile['error_msg'] != ''){
	            	$response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
	            	return json_encode($response);
	            }
	            $data['course_thumbnail'] = $uploadedFile['file'];
        	}
            $data['course_title'] = $this->input->post('course_title');
            $data['slug'] = $this->slug($this->input->post('course_title'));
            $data['course_price'] = $this->input->post('course_price');
            $data['short_description'] = $this->input->post('short_description');
            $data['long_description'] = $this->input->post('long_description');
            $data['course_seo_title'] = $this->input->post('seo_title');
            $data['course_seo_description'] = $this->input->post('seo_description');
            $data['status'] = ($this->input->post('status') == 'on') ? 1 : 0;
            $data['created_at'] = date('Y-m-d H:i:s');
            $result = $this->course->insert('tbl_course',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Course added successfully','url'=>base_url('admin/course'));
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
				    'course_thumbnail' => form_error('course_thumbnail'),
				    'course_title' => form_error('course_title'),
                    'course_price' => form_error('course_price'),
				    'short_description' => form_error('short_description'),
                    'long_description' => form_error('long_description'),
                    'seo_title' => form_error('seo_title'),
                    'seo_description' => form_error('seo_description'),
                    'status' => form_error('status')
        		)  
		   	);
			echo json_encode($response);
                return false;
        }
	}
    //Save Category
    public function updateCourse(){
        if(!empty($_FILES['course_thumbnail']['name'])){
            $this->form_validation->set_rules('course_thumbnail', 'Course Thumbnail', 'callback_file_check');
        }
        $this->form_validation->set_rules('course_title', 'Course Title', 'trim|required');
        $this->form_validation->set_rules('course_price', 'Course', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('short_description', 'Short Description', 'trim|required');
        $this->form_validation->set_rules('long_description', 'Long Description', 'trim|required');
        $this->form_validation->set_rules('seo_title', 'SEO Title', 'trim|required');
        $this->form_validation->set_rules('seo_description', 'SEO Description', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/courses';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            if(!empty($_FILES['course_thumbnail']['name'])){
                $uploadedFile = $this->uploadFile($_FILES['course_thumbnail']['name'],'course_thumbnail',$config);
                 if($uploadedFile['error_msg'] != ''){
                    $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                    return json_encode($response);
                }
                $data['course_thumbnail'] = $uploadedFile['file'];
            }
            $data['course_title'] = $this->input->post('course_title');
            $data['slug'] = $this->slug($this->input->post('course_title'));
            $data['course_price'] = $this->input->post('course_price');
            $data['short_description'] = $this->input->post('short_description');
            $data['long_description'] = $this->input->post('long_description');
            $data['course_seo_title'] = $this->input->post('seo_title');
            $data['course_seo_description'] = $this->input->post('seo_description');
            $data['status'] = ($this->input->post('status') == 'on') ? 1 : 0;
            $data['updated_at'] = date('Y-m-d H:i:s');
            $result = $this->course->updateRecord('tbl_course',array('id'=>$this->input->post('course_id')),$data);
            $response = array('status' => 'success','message'=> 'Course updated successfully','url'=>base_url('admin/course'));
    		echo json_encode($response);
            return false;
        }else{
             $response = array(
        		'status' => 'error',
        		'errors' => array(
                    'course_thumbnail' => form_error('course_thumbnail'),
                    'course_title' => form_error('course_title'),
                    'course_price' => form_error('course_price'),
                    'short_description' => form_error('short_description'),
                    'long_description' => form_error('long_description'),
                    'seo_title' => form_error('seo_title'),
                    'seo_description' => form_error('seo_description'),
                    'status' => form_error('status')
                )  
		   	);
			echo json_encode($response);
                return false;  
        }
    }
    public function deleteCourse(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->course->deleteRecord('tbl_course',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Course deleted successfully','url'=>base_url('admin/course'));
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