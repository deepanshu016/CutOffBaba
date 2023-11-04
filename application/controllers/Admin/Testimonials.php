<?php

Class Testimonials extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('TestimonialModel','testimonial');
        $this->load->model('SiteSettings','site');
    }
	public function index()
	{
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
            $data['testimonialsList'] = $this->testimonial->getRecords('tbl_testimonial'); 
			$this->load->view('admin/testimonial/list',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
	public function add(){
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
			$this->load->view('admin/testimonial/add-edit',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
    public function editTestimonial($id,$slug){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
            $data['singleTestimonial'] = $this->testimonial->singleRecord('tbl_testimonial',['id'=>$id,'slug'=>$slug]); 
            $this->load->view('admin/testimonial/add-edit',$data);
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
	public function saveTestimonial(){
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('image', 'Image', 'callback_file_check');
        $this->form_validation->set_rules('rating', 'Rating', 'trim|required');
        $this->form_validation->set_rules('designation', 'Designation', 'trim|required');
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required');
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/testimonial';
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
            $data['rating'] = $this->input->post('rating');
            $data['designation'] = $this->input->post('designation');
            $data['comment'] = $this->input->post('comment');
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $result = $this->testimonial->insert('tbl_testimonial',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Testimonial added successfully','url'=>base_url('admin/testimonial'));
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
                    'rating' => form_error('rating'),
                    'designation' => form_error('designation'),
                    'comment' => form_error('comment')
                )  
            );
            echo json_encode($response);
                return false;    
        }
	}
    //Save Category
    public function updateTestimonial(){
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('rating', 'Rating', 'trim|required');
        $this->form_validation->set_rules('designation', 'Designation', 'trim|required');
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required');
        if(!empty($_FILES['image']['name'])){
        $this->form_validation->set_rules('image', 'Image', 'callback_file_check');
        }
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/testimonial';
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
            $data['rating'] = $this->input->post('rating');
            $data['designation'] = $this->input->post('designation');
            $data['comment'] = $this->input->post('comment');
            $data['status'] = 1;
            $result = $this->testimonial->updateRecord('tbl_testimonial',array('id'=>$this->input->post('testimonial_id')),$data);
            $response = array('status' => 'success','message'=> 'Testimonial updated successfully','url'=>base_url('admin/testimonial'));
            echo json_encode($response);
        }else{
             $response = array(
                'status' => 'error',
                'errors' => array(
                    'name' => form_error('name'),
                    'image' => form_error('image'),
                    'rating' => form_error('rating'),
                    'designation' => form_error('designation'),
                    'comment' => form_error('comment')
                )  
            );
            echo json_encode($response);
                return false;    
        }
    }
    public function deleteTestimonial(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->testimonial->deleteRecord('tbl_testimonial',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Testimonial delete successfully','url'=>base_url('admin/testimonial'));
            }else{
                $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
            }
        }else{
             $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
    public function makeItFeatured(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $data['is_featured'] = ($this->input->post('status') == 0) ? 1 : 0;
            $result = $this->category->updateRecord('tbl_course_category',array('id'=>$id),$data);
            if($result > 0){
                $response = array('status' => 'success','message' => 'Category updated successfully','url'=>base_url('admin/category'));
            }else{
                $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
            }
        }else{
             $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
    public function courseList(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['courseList'] = $this->course->getRecords('tbl_course',[]);
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
            $this->load->view('admin/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function makeCourseVerified(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $data['is_verified'] = ($this->input->post('status') == 0) ? 1 : 0;
            $result = $this->category->updateRecord('tbl_course',array('id'=>$id),$data);
            if($result > 0){
                $response = array('status' => 'success','message' => 'Course verified successfully','url'=>base_url('admin/courses'));
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