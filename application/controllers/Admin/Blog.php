<?php

Class Blog extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('BlogModel','blog');
   	 	$this->load->model('CourseCategory','category');
        $this->load->model('BlogType','blog_type');
        $this->load->model('SiteSettings','site');
    }
	public function index()
	{
		if ($this->is_admin_logged_in() == true) {
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
			$data['admin_session'] = $this->session->userdata('admin');
			$data['blogList'] = $this->blog->getRecords('tbl_blog');
			$this->load->view('admin/blog/list',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
	public function addBlog(){
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
            $data['blogTypes'] = $this->blog_type->getRecords('tbl_blog_type',[]);
            $data['categories'] = $this->category->getRecords('tbl_course_category',[]);
			$this->load->view('admin/blog/add-edit',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
    public function editBlog($id,$slug){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
            $data['singleBlog'] = $this->blog->singleRecord('tbl_blog',array('id'=>$id,'slug'=>$slug));
            $data['blogTypes'] = $this->blog_type->getRecords('tbl_blog_type',[]);
            $data['categories'] = $this->category->getRecords('tbl_course_category',[]);
            $this->load->view('admin/blog/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
	public function file_check($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        if(!empty($_FILES['blog_image'])){
            $mime = get_mime_by_extension($_FILES['blog_image']['name']);
            if(isset($_FILES['blog_image']['name']) && $_FILES['blog_image']['name']!=""){
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
	public function saveBlog(){
        $this->form_validation->set_rules('blog_image', 'Bloge Image', 'callback_file_check');
        $this->form_validation->set_rules('blog_title', 'Blog Title', 'trim|required');
        $this->form_validation->set_rules('blog_description', 'Blog Description', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('category_id', 'Status', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/blogs';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            if(!empty($_FILES['blog_image']['name'])){
	            $uploadedFile = $this->uploadFile($_FILES['blog_image']['name'],'blog_image',$config);
	             if($uploadedFile['error_msg'] != ''){
	            	$response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
	            	return json_encode($response);
	            }
	            $data['blog_image'] = $uploadedFile['file'];
        	}
            $data['blog_title'] = $this->input->post('blog_title');
            $data['slug'] = $this->slug($this->input->post('blog_title'));
            $data['blog_description'] = $this->input->post('blog_description');
            $data['category_id'] = $this->input->post('category_id');
            $data['full_description'] = $this->input->post('full_description');
            $data['status'] = ($this->input->post('status') == 'on') ? 1 : 0;
            $data['created_at'] = date('Y-m-d H:i:s');
            $result = $this->blog->insert('tbl_blog',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Blog added successfully','url'=>base_url('admin/blog'));
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
				    'blog_image' => form_error('blog_image'),
				    'blog_description' => form_error('blog_description'),
                    'full_description' => form_error('full_description'),
				    'blog_title' => form_error('blog_title'),
                    'category_id' => form_error('category_id')
        		)  
		   	);
			echo json_encode($response);
                return false;
        }
	}
    //Save Category
    public function updateBlog(){
        if(!empty($_FILES['blog_image']['name'])){
            $this->form_validation->set_rules('blog_image', 'Bloge Image', 'callback_file_check');
        }
        $this->form_validation->set_rules('blog_title', 'Blog Title', 'trim|required');
		$this->form_validation->set_rules('blog_description', 'Blog Description', 'trim|required|max_length[250]');
        $this->form_validation->set_rules('category_id', 'Status', 'trim|required');
        $this->form_validation->set_rules('full_description', 'Status', 'trim|required');
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/blogs';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            if(!empty($_FILES['blog_image']['name'])){
	            $uploadedFile = $this->uploadFile($_FILES['blog_image']['name'],'blog_image',$config);
	            if($uploadedFile['error_msg'] != ''){
	            	$response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
	            	echo json_encode($response);
                    return false;
	            }else{
	            	$data['blog_image'] = $uploadedFile['file'];
	            }
        	}
            $data['blog_title'] = $this->input->post('blog_title');
            $data['slug'] = $this->slug($this->input->post('blog_title'));
            $data['category_id'] = $this->input->post('category_id');
            $data['blog_description'] = $this->input->post('blog_description');
            $data['full_description'] = $this->input->post('full_description');
            $data['status'] = ($this->input->post('status') == 'on') ? 1 : 0;
            $data['updated_at'] = date('Y-m-d H:i:s');
            $result = $this->blog->updateRecord('tbl_blog',array('id'=>$this->input->post('blog_id')),$data);
            $data['singleBlog'] = $this->blog->singleRecord('tbl_blog',array('id'=>$this->input->post('blog_id')));
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Blog updated successfully','url'=>base_url('admin/blog'));
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
                    'blog_image' => form_error('blog_image'),
                    'blog_type' => form_error('blog_type'),
                    'blog_description' => form_error('blog_description'),
                    'full_description' => form_error('full_description'),
                    'blog_title' => form_error('blog_title'),
                    'category_id' => form_error('category_id')
                )  
		   	);
			echo json_encode($response);
                return false;  
        }
    }
    public function deleteBlog(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->blog->deleteRecord('tbl_blog',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Blog deleted successfully','url'=>base_url('admin/blog'));
            }else{
                $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
            }
        }else{
             $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
    public function importBlog(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            
            $this->load->view('admin/blog/importBlog',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function file_check_excel_file($str){
        $allowed_mime_type_arr = array('application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/msexcel', 'application/x-msexcel', 'application/x-ms-excel', 'application/x-excel', 'application/x-dos_ms_excel', 'application/xls', 'application/x-xls', 'application/xlsx', 'application/excel');
        if(!empty($_FILES['excel_file'])){
            $mime = get_mime_by_extension($_FILES['excel_file']['name']);
            if(isset($_FILES['excel_file']['name']) && $_FILES['excel_file']['name']!=""){
                if(in_array($mime, $allowed_mime_type_arr)){
                    return true;
                }else{
                    $this->form_validation->set_message('file_check_excel_file', 'Please select only xlsx file.');
                    return false;
                }
            }else{
                $this->form_validation->set_message('file_check_excel_file', 'Please choose a file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check_excel_file', 'Please choose a file to upload.');
            return false;    
        }
    }
    public function importBlogByExcel(){ 
        $this->form_validation->set_rules('excel_file', 'Excel File', 'callback_file_check_excel_file');
        if ($this->form_validation->run()) {
            if(!empty($_FILES['excel_file']['name'])){
                // }
                $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

                if(isset($_FILES['excel_file']['name']) && in_array($_FILES['excel_file']['type'], $file_mimes)) {
                    $arr_file = explode('.', $_FILES['excel_file']['name']);
                    $extension = end($arr_file);
                    if('xlsx' == $extension){
                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                    } else {
                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                    }
                    $spreadsheet = $reader->load($_FILES['excel_file']['tmp_name']);
                    $sheetData = $spreadsheet->getActiveSheet()->toArray();
                    $blogData = [];
                    $blogTypeData = [];
                    if(!empty($sheetData)){
                        foreach($sheetData as $key=>$sheet){
                            if($key != 0){
                                $blogData[$key]['blog_title'] = $sheet[0];
                                $blogData[$key]['slug'] = $this->slug($sheet[0]);
                                $blogData[$key]['full_description'] = $sheet[1];
                                $blogData[$key]['blog_image'] = $sheet[2];
                                $blogData[$key]['blog_description'] = $sheet[3];
                                $existingBlogType = $this->blog_type->singleRecord('tbl_blog_type',array('blog_type'=>$sheet[4]));
                                if(empty($existingBlogType)){
                                    $blogTypeData['blog_type'] = $sheet[4];
                                    $blogTypeData['slug'] = $this->slug($sheet[4]);
                                    $blogTypeData['status'] = '1';
                                    $this->db->trans_start();
                                    $blogType = $this->blog_type->insert('tbl_blog_type',$blogTypeData);
                                    $blogData[$key]['blog_type'] = $blogType;
                                    $blogData[$key]['status'] = $sheet[4];
                                    $result = $this->blog->insert('tbl_blog',$blogData[$key]);
                                    $this->db->trans_complete();
                                }else{
                                    $blogData[$key]['blog_type'] = $existingBlogType['id'];
                                    $blogData[$key]['status'] = $sheet[4];
                                    $result = $this->blog->insert('tbl_blog',$blogData[$key]);
                                    $this->db->trans_complete();
                                }
                            }
                        }
                    }
                    $response = array('status' => 'success','message' => 'Blog imported successfully','url'=>base_url('admin/blog'));
                     echo json_encode($response);
                    return true;
                }
            }
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'excel_file' => form_error('excel_file')
                )  
            );
            echo json_encode($response);
                return false;
        }
    }
}

?>