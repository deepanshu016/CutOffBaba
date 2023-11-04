<?php

Class Category extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('CourseCategory','category');
        $this->load->model('CourseModel','course');
        $this->load->model('SiteSettings','site');
    }
	public function index()
	{
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
			$data['categoryList'] = $this->category->getRecords('tbl_course_category',[]);
			$this->load->view('admin/category/list',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
	public function add(){
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
			$this->load->view('admin/category/add-edit',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
    public function editCategory($id,$slug){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
            $data['singleCategory'] = $this->category->singleRecord('tbl_course_category',array('id'=>$id,'slug'=>$slug));
            $this->load->view('admin/category/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
	public function file_check($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        if(!empty($_FILES['category_icon'])){
            $mime = get_mime_by_extension($_FILES['category_icon']['name']);
            if(isset($_FILES['category_icon']['name']) && $_FILES['category_icon']['name']!=""){
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
	public function saveCategory(){
		$this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');
		$this->form_validation->set_rules('category_icon', 'Category Icon', 'callback_file_check');
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/category';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            $uploadedFile = $this->uploadFile($_FILES['category_icon']['name'],'category_icon',$config);
            if($uploadedFile['error_msg'] == ''){
                $data['category_name'] = $this->input->post('category_name');
                $data['slug'] = $this->slug($this->input->post('category_name'));
                $data['icon'] = $uploadedFile['file'];
                $data['status'] = 1;
                $data['created_at'] = date('Y-m-d H:i:s');
                $result = $this->category->insert('tbl_course_category',$data);
                if($result > 0){
                    $this->session->set_flashdata('success','Category added successfully!!!');
                    return redirect('admin/category');
                }else{
                    $this->session->set_flashdata('error','Something went wrong');
                    return redirect('admin/add-category');
                }   
            }else{
                $this->session->set_flashdata('error',$uploadedFile['error_msg']);
                return redirect('admin/add-category');     
            }
        }else{
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
            $this->load->view('admin/category/add-edit',$data);     
        }
	}
    //Save Category
    public function updateCategory(){
        $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');
        if(!empty($_FILES['category_icon']['name'])){
            $this->form_validation->set_rules('category_icon', 'Category Icon', 'callback_file_check');
        }
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/category';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            $uploadedFile = $this->uploadFile($_FILES['category_icon']['name'],'category_icon',$config);
            $data['category_name'] = $this->input->post('category_name');
            $data['slug'] = $this->slug($this->input->post('category_name'));
            if(!empty($_FILES['category_icon']['name'])){
                $data['icon'] = $uploadedFile['file'];
            }else{
                $data['icon'] = $this->input->post('existing_category_icon');
            }
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $result = $this->category->updateRecord('tbl_course_category',array('id'=>$this->input->post('category_id')),$data);
            $data['singleCategory'] = $this->category->singleRecord('tbl_course_category',array('id'=>$this->input->post('category_id')));
            if($result > 0){
                $this->session->set_flashdata('success','Category updated successfully!!!');
                return redirect('admin/category');
            }else{
                $this->session->set_flashdata('error','Something went wrong');
                return redirect('admin/edit-category'.'/'.$data['singleCategory']['id'].'/'.$data['singleCategory']['slug']);
            }
        }else{
            $data['admin_session'] = $this->session->userdata('admin');
            $this->load->view('admin/category/add-edit',$data);     
        }
    }
    public function deleteCategory(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->category->deleteRecord('tbl_course_category',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Category delete successfully','url'=>base_url('admin/category'));
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