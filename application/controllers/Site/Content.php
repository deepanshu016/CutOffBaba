<?php

Class Content extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('SiteSettings','site');
   	 	$this->load->model('StudentReview','review');
   	 	$this->load->model('CourseCategory','category');
   	 	$this->load->model('CompanyModel','company');
   	 	$this->load->model('BlogModel','blog');
   	 	$this->load->model('LanguageModel','language');
        $this->load->model('CourseModel','course');
        $this->load->model('SubjectModel','subject');
        $this->load->model('ContentModel','content');
    }
	public function index(){
		$data['user_session'] = $this->session->userdata('user');
		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
		$data['contentList'] = $this->content->getRecords('tbl_contents');
        $data['categoryList'] = $this->category->getCategoriesForFeatured('tbl_course_category',array('parent_id'=>NULL));
		$this->load->view('site/content/list',$data);
	}
	public function addContent(){
		if ($this->is_user_logged_in() == true) {
			$data['user_session'] = $this->session->userdata('user');
			$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['categoryList'] = $this->category->getCategoriesForFeatured('tbl_course_category',array('parent_id'=>NULL));
            $data['subjectList'] = $this->subject->getRecords('tbl_subjects');
			$this->load->view('site/content/add-edit',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('login');
		}
	}
    public function file_check_content_thumbnail($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        if(!empty($_FILES['content_thumbnail'])){
            $mime = get_mime_by_extension($_FILES['content_thumbnail']['name']);
            if(isset($_FILES['content_thumbnail']['name']) && $_FILES['content_thumbnail']['name']!=""){
                if(in_array($mime, $allowed_mime_type_arr)){
                    return true;
                }else{
                    $this->form_validation->set_message('file_check_content_thumbnail', 'Please select only jpg/png file.');
                    return false;
                }
            }else{
                $this->form_validation->set_message('file_check_content_thumbnail', 'Please choose a file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check_content_thumbnail', 'Please choose a file to upload.');
            return false;    
        }
    }
	public function saveContent(){
		$this->form_validation->set_rules('title', 'Content Title', 'trim|required');
		$this->form_validation->set_rules('code', 'Content Code', 'trim|required');
		$this->form_validation->set_rules('subject_id', 'Subject', 'trim|required');
        $this->form_validation->set_rules('content_type', 'Content Type', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('content_thumbnail', 'Content Thumbnail',  'callback_file_check_content_thumbnail');
		if ($this->form_validation->run()) {
            if(!empty($_FILES['content_thumbnail']['name'])){
                $config1['upload_path']  = 'assets/uploads/content/images';
                $config1['allowed_types'] = 'jpg|jpeg|png';
                $config1['encrypt_name'] =  TRUE;
                $config1['max_size']      = 1024;
                $uploadedFile = $this->uploadFile($_FILES['content_thumbnail']['name'],'content_thumbnail',$config1);
                 if($uploadedFile['error_msg'] != ''){
                    $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['image'] = $uploadedFile['file'];
            }
            if(!empty($_FILES['video_upload']['name'])){
                $videoConfig['upload_path']  = 'assets/uploads/content/videos';
                $videoConfig['allowed_types'] = 'wmv|mp4|avi|mov';
                $videoConfig['encrypt_name'] =  TRUE;
                $videoConfig['max_size']      = 2048;
                $uploadedFile = $this->uploadFile($_FILES['video_upload']['name'],'video_upload',$videoConfig);
                 if($uploadedFile['error_msg'] != ''){
                    $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['video_upload'] = $uploadedFile['file'];
            }
            if(!empty($_FILES['audio_upload']['name'])){
                $audioConfig['upload_path']  = 'assets/uploads/content/audio';
                $audioConfig['allowed_types'] = 'mp3|aif|aiff';
                $audioConfig['encrypt_name'] =  TRUE;
                $audioConfig['max_size']      = 2048;
                $uploadedFile = $this->uploadFile($_FILES['audio_upload']['name'],'audio_upload',$videoConfig);
                 if($uploadedFile['error_msg'] != ''){
                    $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['audio_upload'] = $uploadedFile['file'];
            }
            if(!empty($_FILES['document_upload']['name'])){
                $documentConfig['upload_path']  = 'assets/uploads/content/document';
                $documentConfig['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
                $documentConfig['encrypt_name'] =  TRUE;
                $documentConfig['max_size']      = 1024;
                $uploadedFile = $this->uploadFile($_FILES['document_upload']['name'],'document_upload',$videoConfig);
                 if($uploadedFile['error_msg'] != ''){
                    $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['document_upload'] = $uploadedFile['file'];
            }
            if(!empty($_FILES['image_upload']['name'])){
                $config1['upload_path']  = 'assets/uploads/content/images';
                $config1['allowed_types'] = 'jpg|jpeg|png';
                $config1['encrypt_name'] =  TRUE;
                $config1['max_size']      = 1024;
                $uploadedFile = $this->uploadFile($_FILES['image_upload']['name'],'image_upload',$config1);
                 if($uploadedFile['error_msg'] != ''){
                    $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['image_upload'] = $uploadedFile['file'];
            }
            $user_session = $this->session->userdata('user');
            $data['record_updated_by'] = $user_session['id'];
            $data['video_url'] = $this->input->post('video_url');
            $data['audio_url'] = $this->input->post('audio_url');
            $data['document_url'] = $this->input->post('document_url');
            $data['iframe_link'] = $this->input->post('iframe_url');
            $data['image_url'] = $this->input->post('image_url');
            $data['title'] = $this->input->post('title');
            $data['slug'] = $this->slug($this->input->post('title'));
            $data['code'] = $this->input->post('code');
            $data['subject_id'] = $this->input->post('subject_id');
            $data['content_type'] = $this->input->post('content_type');
            $data['description'] = $this->input->post('description');
            // $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $result = $this->content->insert('tbl_contents',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Content added successfully','url'=>base_url('contents'));
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
				    'code' => form_error('code'),
				    'subject_id' => form_error('subject_id'),
				    'content_thumbnail' => form_error('content_thumbnail'),
                    'content_type' => form_error('content_type'),
                    'description' => form_error('description')
        		)  
		   	);
			echo json_encode($response);
            return false;
        }
	}
    public function deleteContent(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->content->deleteRecord('tbl_contents',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Content deleted successfully','url'=>base_url('contents'));
            }else{
                $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
            }
        }else{
             $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
    public function editContent($slug){
        if ($this->is_user_logged_in() == true) {
            $data['user_session'] = $this->session->userdata('user');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['subjectList'] = $this->subject->getRecords('tbl_subjects');
            $data['singleContent'] = $this->content->singleRecord('tbl_contents',array('slug'=>$slug)); 
            $data['categoryList'] = $this->category->getCategoriesForFeatured('tbl_course_category',array('parent_id'=>NULL));
            $this->load->view('site/content/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('login');
        }
    }  
    public function updateContent(){
        $this->form_validation->set_rules('title', 'Content Title', 'trim|required');
        $this->form_validation->set_rules('code', 'Content Code', 'trim|required');
        $this->form_validation->set_rules('subject_id', 'Subject', 'trim|required');
        $this->form_validation->set_rules('content_type', 'Content Type', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        if ($this->form_validation->run()) {
            if(!empty($_FILES['content_thumbnail']['name'])){
                $config1['upload_path']  = 'assets/uploads/content/images';
                $config1['allowed_types'] = 'jpg|jpeg|png';
                $config1['encrypt_name'] =  TRUE;
                $config1['max_size']      = 1024;
                $uploadedFile = $this->uploadFile($_FILES['content_thumbnail']['name'],'content_thumbnail',$config1);
                 if($uploadedFile['error_msg'] != ''){
                    $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['image'] = $uploadedFile['file'];
            }
            if(!empty($_FILES['video_upload']['name'])){
                $videoConfig['upload_path']  = 'assets/uploads/content/videos';
                $videoConfig['allowed_types'] = 'wmv|mp4|avi|mov';
                $videoConfig['encrypt_name'] =  TRUE;
                $videoConfig['max_size']      = 2048;
                $uploadedFile = $this->uploadFile($_FILES['video_upload']['name'],'video_upload',$videoConfig);
                 if($uploadedFile['error_msg'] != ''){
                    $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['video_upload'] = $uploadedFile['file'];
            }
            if(!empty($_FILES['audio_upload']['name'])){
                $audioConfig['upload_path']  = 'assets/uploads/content/audio';
                $audioConfig['allowed_types'] = 'mp3|aif|aiff';
                $audioConfig['encrypt_name'] =  TRUE;
                $audioConfig['max_size']      = 2048;
                $uploadedFile = $this->uploadFile($_FILES['audio_upload']['name'],'audio_upload',$videoConfig);
                 if($uploadedFile['error_msg'] != ''){
                    $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['audio_upload'] = $uploadedFile['file'];
            }
            if(!empty($_FILES['document_upload']['name'])){
                $documentConfig['upload_path']  = 'assets/uploads/content/document';
                $documentConfig['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';
                $documentConfig['encrypt_name'] =  TRUE;
                $documentConfig['max_size']      = 1024;
                $uploadedFile = $this->uploadFile($_FILES['document_upload']['name'],'document_upload',$videoConfig);
                 if($uploadedFile['error_msg'] != ''){
                    $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['document_upload'] = $uploadedFile['file'];
            }
            if(!empty($_FILES['image_upload']['name'])){
                $config1['upload_path']  = 'assets/uploads/content/images';
                $config1['allowed_types'] = 'jpg|jpeg|png';
                $config1['encrypt_name'] =  TRUE;
                $config1['max_size']      = 1024;
                $uploadedFile = $this->uploadFile($_FILES['image_upload']['name'],'image_upload',$config1);
                 if($uploadedFile['error_msg'] != ''){
                    $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['image_upload'] = $uploadedFile['file'];
            }
            $user_session = $this->session->userdata('user');
            $data['record_updated_by'] = $user_session['id'];
            $data['video_url'] = $this->input->post('video_url');
            $data['audio_url'] = $this->input->post('audio_url');
            $data['document_url'] = $this->input->post('document_url');
            $data['iframe_link'] = $this->input->post('iframe_url');
            $data['image_url'] = $this->input->post('image_url');
            $data['title'] = $this->input->post('title');
            $data['slug'] = $this->slug($this->input->post('title'));
            $data['code'] = $this->input->post('code');
            $data['subject_id'] = $this->input->post('subject_id');
            $data['content_type'] = $this->input->post('content_type');
            $data['description'] = $this->input->post('description');
            // $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $result = $this->content->updateRecord('tbl_contents',array('id'=>$this->input->post('content_id')),$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Content updated successfully','url'=>base_url('contents'));
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
                    'code' => form_error('code'),
                    'subject_id' => form_error('subject_id'),
                    'content_type' => form_error('content_type'),
                    'description' => form_error('description')
                )  
            );
            echo json_encode($response);
            return false;
        }
    }
    // Show Content Data
    public function ShowContentData(){
        $id = $this->input->post('id');
        $data['singleContent'] = $this->content->singleRecord('tbl_contents',array('id'=>$id));
        $html = $this->load->view('site/content/dynamicContentData',$data,true);
        $response = array('status' => 'success','message'=> 'Content fetched successfully','html'=>$html);
        echo json_encode($response);
        return false;
    }
}

?>