<?php

Class Course extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('SiteSettings','site');
   	 	$this->load->model('StudentReview','review');
   	 	$this->load->model('CourseCategory','category');
   	 	$this->load->model('CompanyModel','company');
   	 	$this->load->model('BlogModel','blog');
   	 	$this->load->model('LanguageModel','language');
        $this->load->model('CourseModel','course');
        $this->load->model('User','user');
    }
	public function index(){
		$data['user_session'] = $this->session->userdata('user');
		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
		$data['reviewList'] = $this->review->getStudentReviews();
		$data['categoryList'] = $this->category->getCategoriesForFeatured('tbl_course_category',array('parent_id'=>NULL));
		$data['featuredCategory'] = $this->category->getRecords('tbl_course_category',array('is_featured'=>1));
		$this->load->view('site/home',$data);
	}
	public function addCourse(){
		if ($this->is_user_logged_in() == true) {
			$data['user_session'] = $this->session->userdata('user');
			$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
			$data['languageList'] = $this->language->getRecords('tbl_language');
			$data['parentCategory'] = $this->category->getRecords('tbl_course_category',array('parent_id'=>NULL));
            $data['categoryList'] = $this->category->getCategoriesForFeatured('tbl_course_category',array('parent_id'=>NULL));
			$this->load->view('site/course/add-edit',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('login');
		}
	}
	public function getCourseCategory(){
		if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $categoryList = $this->category->getRecords('tbl_course_category',array('parent_id'=>$id));
            if(!empty($categoryList)){
            	$html = '';
            	$html .= '<option value="">------Select-------</option>';
                foreach($categoryList as $category){
                	$html .= '<option value='.$category['id'].'>'.$category['category_name'].'</option>';
                }
                $response = array('status' => 'success','message' => 'Category fetched successfully','html'=>$html);
            }else{
                $response = array('status' => 'errors','message' => 'Something went wrong !!!','html'=>'');
            }
        }else{
             $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
    public function file_check_course_thumbnail($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        if(!empty($_FILES['course_thumbnail'])){
            $mime = get_mime_by_extension($_FILES['course_thumbnail']['name']);
            if(isset($_FILES['course_thumbnail']['name']) && $_FILES['course_thumbnail']['name']!=""){
                if(in_array($mime, $allowed_mime_type_arr)){
                    return true;
                }else{
                    $this->form_validation->set_message('file_check_course_thumbnail', 'Please select only jpg/png file.');
                    return false;
                }
            }else{
                $this->form_validation->set_message('file_check_course_thumbnail', 'Please choose a file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check_course_thumbnail', 'Please choose a file to upload.');
            return false;    
        }
    }
    public function file_check_course_banner($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        if(!empty($_FILES['course_banner'])){
            $mime = get_mime_by_extension($_FILES['course_banner']['name']);
            if(isset($_FILES['course_banner']['name']) && $_FILES['course_banner']['name']!=""){
                if(in_array($mime, $allowed_mime_type_arr)){
                    return true;
                }else{
                    $this->form_validation->set_message('file_check_course_banner', 'Please select only jpg/png file.');
                    return false;
                }
            }else{
                $this->form_validation->set_message('file_check_course_banner', 'Please choose a file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check_course_banner', 'Please choose a file to upload.');
            return false;    
        }
    }
	public function saveCourse(){
		$this->form_validation->set_rules('course_title', 'Course Title', 'trim|required');
		$this->form_validation->set_rules('short_description', 'Short Description', 'trim|required');
		$this->form_validation->set_rules('long_description', 'Long Description', 'trim|required');
		$this->form_validation->set_rules('category_id', 'Category', 'trim|required');
		$this->form_validation->set_rules('language', 'Language',  'trim|required');
		 if ($this->form_validation->run()) {
            $data['course_title'] = $this->input->post('course_title');
            $data['slug'] = $this->slug($this->input->post('course_title'));
            $data['short_description'] = $this->input->post('short_description');
            $data['long_description'] = $this->input->post('long_description');
            $data['category_id'] = $this->input->post('category_id');
            $data['sub_category'] = $this->input->post('sub_category');
            $data['sub_sub_category'] = $this->input->post('sub_sub_category');
            $data['language'] = $this->input->post('language');	
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $result = $this->course->insert('tbl_course',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Course added successfully','url'=>base_url('add-course'));
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
				    'course_title' => form_error('course_title'),
				    'short_description' => form_error('short_description'),
				    'long_description' => form_error('long_description'),
				    'category_id' => form_error('category_id'),
				    'language' => form_error('language')
        		)  
		   	);
			echo json_encode($response);
            return false;
        }
	}
    ////
    public function FirstStageValidationCourse(){
        $this->form_validation->set_rules('course_title', 'Course Title', 'trim|required');
        $this->form_validation->set_rules('short_description', 'Short Description', 'trim|required');
        $this->form_validation->set_rules('long_description', 'Long Description', 'trim|required');
        $this->form_validation->set_rules('category_id', 'Category', 'trim|required');
        $this->form_validation->set_rules('language', 'Language',  'trim|required');
        $this->form_validation->set_rules('level', 'Language',  'trim|required');
        if ($this->form_validation->run()) {
            $response = array('status' => 'success','message'=> 'Validated successfully','url'=>'');
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'course_title' => form_error('course_title'),
                    'short_description' => form_error('short_description'),
                    'long_description' => form_error('long_description'),
                    'category_id' => form_error('category_id'),
                    'language' => form_error('language'),
                    'level' => form_error('level')
                )  
            );
            echo json_encode($response);
            return true;
        }
    }

    public function SecondStageValidationCourse(){
        $response = array('status' => 'success','message'=> 'Validated successfully','url'=>'');
        echo json_encode($response);
        return true;
    }
    public function ThirdStageValidationCourse(){
        $is_course_free = $this->input->post('is_course_free');
        $course_price = $this->input->post('course_price');
        if($is_course_free != 1 && $course_price == ''){
            $response = array('status' => 'errors','message'=> 'Course Price is required','url'=>'');
            echo json_encode($response);
            return true;
        } else{
            $response = array('status' => 'success','message'=> 'Validated successfully','url'=>'');
            echo json_encode($response);
            return true;
        }
    }

    public function FourthStageValidationCourse(){
        $this->form_validation->set_rules('course_provider', 'Course Provider', 'trim|required');
        if($this->input->post('course_id') == ''){ 
            $this->form_validation->set_rules('course_thumbnail', 'Course Thumbnail', 'callback_file_check_course_thumbnail');
            $this->form_validation->set_rules('course_banner', 'Long Description', 'callback_file_check_course_banner');
        }
        if ($this->form_validation->run()) {
            $response = array('status' => 'success','message'=> 'Validated successfully','url'=>'');
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'course_provider' => form_error('course_provider'),
                    'course_thumbnail' => form_error('course_thumbnail'),
                    'course_banner' => form_error('course_banner')
                )  
            );
            echo json_encode($response);
            return true;
        }
    }
    public function FifthStageValidationCourse(){
        $input = $this->input->post();
        $data['input'] = $input;
        $category = $this->course->singleRecord('tbl_course_category',array('id'=>$input['category_id']));
        if($category['parent_id'] != NULL){
            $data['categoryData'] = $category['category_name'];
        }else{
            $data['categoryData'] = $category['category_name'];
        }
        $data['requirements'] = array_unique($input['requirement_data']);
        if($this->input->post('course_id') == ''){
            $data['course_thumbnail'] = $_FILES['course_thumbnail'];
        }else{
            if(!empty($_FILES['course_thumbnail']['name'])){
                $data['course_thumbnail'] = $_FILES['course_thumbnail'];
            }else{
                $data['course_thumbnail']['name'] = $this->input->post('existing_course_thumbnail');
            }
        }
        if($this->input->post('course_id') == ''){
            $data['course_banner'] = $_FILES['course_banner'];
        }else{
            if(!empty($_FILES['course_banner']['name'])){
                $data['course_banner'] = $_FILES['course_banner'];
            }else{
                $data['course_banner']['name'] = $this->input->post('existing_course_banner');
            }
        }
        if(!empty($_FILES['video_file'])){
            $data['course_video'] = $_FILES['video_file'];
        }
        $headingData = array();
        if(count($input['heading']) > 0){
           foreach($input['heading'] as $key=>$heading){
              if($heading != ''){
                $headingData[$key]['heading'] = $heading;
              }else{
                $headingData[$key]['heading'] = '';
              }
              if($input['features'][$key] != ''){
                $headingData[$key]['features'] = $input['features'][$key];
              }else{
                $headingData[$key]['features'] = '';
              }
           } 
        }
        $data['heading_features'] = $headingData;
        $response = array('status' => 'success','message'=> 'Preview generated successfully','url'=>'','html'=>$this->load->view('site/course/course-preview',$data,true));
        echo json_encode($response);
        return true;
    }
    public function finalSaveCourse(){
        $this->form_validation->set_rules('terms_condition', 'Please check terms & condition', 'trim|required');
        if ($this->form_validation->run()) {
            if(!empty($_FILES['course_thumbnail']['name'])){
                $config['upload_path']  = 'assets/uploads/courses';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['encrypt_name'] =  TRUE;
                $config['max_size']      = 1024;
                $uploadedFile = $this->uploadFile($_FILES['course_thumbnail']['name'],'course_thumbnail',$config);
                 if($uploadedFile['error_msg'] != ''){
                    $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['course_thumbnail'] = $uploadedFile['file'];
            }
            if(!empty($_FILES['course_banner']['name'])){
                $config1['upload_path']  = 'assets/uploads/courses';
                $config1['allowed_types'] = 'jpg|jpeg|png';
                $config1['encrypt_name'] =  TRUE;
                $config1['max_size']      = 1024;
                $uploadedFile = $this->uploadFile($_FILES['course_banner']['name'],'course_banner',$config1);
                 if($uploadedFile['error_msg'] != ''){
                    $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['course_banner'] = $uploadedFile['file'];
            }
            if(($this->input->post('course_provider') == 2) && !empty($_FILES['video_file']['name'])){
                $videoConfig['upload_path']  = 'assets/uploads/courses/video';
                $videoConfig['allowed_types'] = 'wmv|mp4|avi|mov';
                $videoConfig['max_filename'] = '255';
                $videoConfig['encrypt_name'] =  TRUE;
                $videoConfig['max_size']      = 2048;
                $uploadedFile = $this->uploadVideoFile($_FILES['video_file']['name'],'video_file',$videoConfig);
                 if($uploadedFile['error_msg'] != ''){
                    $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['uploaded_video'] = $uploadedFile['file'];
            }else{
                $response = array('status' => 'errors','message'=> 'Please upload course video');
                echo json_encode($response);
                return false;
            }
            $requirements = array_unique($this->input->post('requirement_data'));
            $headingData = array();
            $heading = $this->input->post('heading');
            $features = $this->input->post('features');
            if(count($heading) > 0){
               foreach($heading as $key=>$heading){
                  if($heading != ''){
                    $headingData[$key]['heading'] = $heading;
                  }else{
                    $headingData[$key]['heading'] = '';
                  }
                  if($features[$key] != ''){
                    $headingData[$key]['features'] = $features[$key];
                  }else{
                    $headingData[$key]['features'] = '';
                  }
               } 
            }
            $user_session = $this->session->userdata('user');
            $data['user_id'] = $user_session['id'];
            $data['heading_features'] = json_encode($headingData);
            $data['course_title'] = $this->input->post('course_title');
            $data['slug'] = $this->slug($this->input->post('course_title'));
            $data['short_description'] = $this->input->post('short_description');
            $data['long_description'] = $this->input->post('long_description');
            $data['category_id'] = $this->input->post('category_id');
            $data['sub_category'] = $this->input->post('sub_category');
            $data['sub_sub_category'] = $this->input->post('sub_sub_category');
            $data['language'] = $this->input->post('language'); 
            $data['level'] = $this->input->post('level'); 
            $data['is_featured'] = $this->input->post('is_featured');
            $data['requirements'] = json_encode($requirements); 
            $data['is_course_free'] = $this->input->post('is_course_free');
            $data['course_price'] = $this->input->post('course_price');
            $data['discount_price'] = $this->input->post('discount_price');
            $data['enable_discount'] = $this->input->post('enable_discount');
            $data['discount_limit'] = $this->input->post('discount_limit');
            $data['course_provider'] = $this->input->post('course_provider');
            $data['video_id'] = $this->input->post('video_id');
            $data['course_seo_title'] = $this->input->post('course_seo_title');
            $data['course_seo_description'] = $this->input->post('course_seo_description');
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $result = $this->course->insert('tbl_course',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Course added successfully','url'=>base_url('dashboard'));
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
                    'terms_condition' => form_error('terms_condition')
                )  
            );
            echo json_encode($response);
            return false;
        }
    }
    ////
    public function CourseCategoryWise($slug=''){
        $config = array();
        $config["base_url"] = base_url() . "courses";
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        if(empty($slug)){
            $config["total_rows"] = $this->course->get_count([]);
            $config["per_page"] = 5;
            $config["uri_segment"] = 2;
            $this->pagination->initialize($config);
            $data['total'] = $config['total_rows'];
            $data['startCount'] = (int)$this->uri->segment(3) + 1;
            if ($this->uri->segment(3) + $config['per_page'] > $config['total_rows']) {
                $data['endCount'] = $config['total_rows'];
            } else {
                $data['endCount'] = (int)$this->uri->segment(3) + $config['per_page'];
            }
            $data["links"] = $this->pagination->create_links();
            $data['courseData'] = $this->course->getPaginatedData($config["per_page"], $page);
        }else{
            $categoryData = $this->category->getAllLevelCategories('tbl_course_category',$slug);
            $config["total_rows"] = $this->course->get_count($categoryData);
            $config["per_page"] = 5;
            $config["uri_segment"] = 2;
            $this->pagination->initialize($config);
            $data['total'] = $config['total_rows'];
            $data['startCount'] = (int)$this->uri->segment(3) + 1;
            if ($this->uri->segment(3) + $config['per_page'] > $config['total_rows']) {
                $data['endCount'] = $config['total_rows'];
            } else {
                $data['endCount'] = (int)$this->uri->segment(3) + $config['per_page'];
            }
            $data['totalCourse'] = $this->course->get_count($categoryData);
            $data["links"] = $this->pagination->create_links();
            $data['categoryData'] = $this->category->singleRecord('tbl_course_category',array('slug'=>$slug));
            $data['courseData'] = $this->course->getAllCoursesCategoryWisePaginated($config["per_page"], $page,$categoryData);  
        }
        $data['instructorData'] = $this->user->getRecords('tbl_users',array('user_type'=>3));  
        $data['user_session'] = $this->session->userdata('user');
        $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);  
        $data['reviewList'] = $this->review->getStudentReviews();
        $data['categoryList'] = $this->category->getCategoriesForFeatured('tbl_course_category',array('parent_id'=>NULL));
        $data['filterCategory'] = $this->category->getCategoriesForFeatured('tbl_course_category',[]);
        $data['companyList'] = $this->company->getRecordsWithLimit('tbl_company','');
        $data['featuredCategory'] = $this->category->getRecords('tbl_course_category',array('is_featured'=>1));
        $data['blogList'] = $this->blog->getRecordswithOrderAndLimit('tbl_blog');
        $this->load->view('site/courseList',$data);
    }
    public function CourseFilterList(){
        $slug = $this->input->post('id');
        if(empty($slug)){
            $data['courseData'] = $this->course->getRecords('tbl_course',array('is_verified'=>1));
        }else{
            $categoryData = $this->category->getAllLevelCategories('tbl_course_category',$slug);
            $data['categoryData'] = $this->category->singleRecord('tbl_course_category',array('slug'=>$slug));
            $data['courseData'] = $this->course->getAllCoursesCategoryWise('tbl_course',$categoryData);  
        }
        $data['user_session'] = $this->session->userdata('user');
        $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);  
        $data['reviewList'] = $this->review->getStudentReviews();
        $data['categoryList'] = $this->category->getCategoriesForFeatured('tbl_course_category',array('parent_id'=>NULL));
        $data['companyList'] = $this->company->getRecordsWithLimit('tbl_company','');
        $data['featuredCategory'] = $this->category->getRecords('tbl_course_category',array('is_featured'=>1));
        $data['blogList'] = $this->blog->getRecordswithOrderAndLimit('tbl_blog');
        $response = array('status'=>'success','message'=>'Data fetched successfully','url'=>'','html'=>$this->load->view('site/courseListView',$data,true));
        echo json_encode($response);
        return true;
    }
    public function CourseFilterGrid(){
        $slug = $this->input->post('id');
        if(empty($slug)){
            $data['courseData'] = $this->course->getRecords('tbl_course',array('is_verified'=>1));
        }else{
            $categoryData = $this->category->getAllLevelCategories('tbl_course_category',$slug);
            $data['categoryData'] = $this->category->singleRecord('tbl_course_category',array('slug'=>$slug));
            $data['courseData'] = $this->course->getAllCoursesCategoryWise('tbl_course',$categoryData);  
        }
        $data['user_session'] = $this->session->userdata('user');
        $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);  
        $data['reviewList'] = $this->review->getStudentReviews();
        $data['categoryList'] = $this->category->getCategoriesForFeatured('tbl_course_category',array('parent_id'=>NULL));
        $data['companyList'] = $this->company->getRecordsWithLimit('tbl_company','');
        $data['featuredCategory'] = $this->category->getRecords('tbl_course_category',array('is_featured'=>1));
        $data['blogList'] = $this->blog->getRecordswithOrderAndLimit('tbl_blog');
        $response = array('status'=>'success','message'=>'Data fetched successfully','url'=>'','html'=>$this->load->view('site/courseGridView',array('courseData'=>$data['courseData'],'width'=>'6'),true));
        echo json_encode($response);
        return true;
    }
    public function manageCourses(){
        if ($this->is_user_logged_in() == true) {
            $data['user_session'] = $this->session->userdata('user');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['languageList'] = $this->language->getRecords('tbl_language');
            $data['parentCategory'] = $this->category->getRecords('tbl_course_category',array('parent_id'=>NULL));
            $data['categoryList'] = $this->category->getCategoriesForFeatured('tbl_course_category',array('parent_id'=>NULL));
            $data['courseData'] = $this->course->getRecords('tbl_course',[]);  
            $this->load->view('site/course/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('login');
        }
    }
    public function courseDetail($slug){
            $courseDetail = $this->course->singleRecord('tbl_course',array('slug'=>$slug)); 
            if(!empty($courseDetail)){
                $data['courseDetail'] = $courseDetail;
                $data['courseReview'] = $this->review->getRecords('tbl_student_review',array('course_id'=>$courseDetail['id']));
                $data['reviewRating'] = $this->review->averageReview('tbl_student_review',array('course_id'=>$courseDetail['id']));
                $data['fiveStarRating'] = $this->review->getRatingPercentage('tbl_student_review',array('course_id'=>$courseDetail['id'],'rating'=>'5'));
                $data['fourStarRating'] = $this->review->getRatingPercentage('tbl_student_review',array('course_id'=>$courseDetail['id'],'rating'=>'4'));
                $data['threeStarRating'] = $this->review->getRatingPercentage('tbl_student_review',array('course_id'=>$courseDetail['id'],'rating'=>'3'));
                $data['oneStarRating'] = $this->review->getRatingPercentage('tbl_student_review',array('course_id'=>$courseDetail['id'],'rating'=>'1'));
                
                $data['user_session'] = $this->session->userdata('user');
                $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
                $data['languageList'] = $this->language->getRecords('tbl_language');
                $data['parentCategory'] = $this->category->getRecords('tbl_course_category',array('parent_id'=>NULL));
                $data['categoryList'] = $this->category->getCategoriesForFeatured('tbl_course_category',array('parent_id'=>NULL));
                $data['relatedCourses'] = $this->course->getRecords('tbl_course',array('category_id'=>$courseDetail['category_id']));
                $this->load->view('site/course/courseDetail',$data);
            }else{
                $this->session->set_flashdata('error','No Course Found!!');
                return redirect('/');
            }   
    }
    public function deleteCourse(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->course->deleteRecord('tbl_course',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Course delete successfully','url'=>base_url('manage-courses'));
            }else{
                $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
            }
        }else{
             $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
    public function editCourse($slug){
        if ($this->is_user_logged_in() == true) {
            $data['user_session'] = $this->session->userdata('user');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['languageList'] = $this->language->getRecords('tbl_language');
            $data['parentCategory'] = $this->category->getRecords('tbl_course_category',array('parent_id'=>NULL));
            $data['categoryList'] = $this->category->getCategoriesForFeatured('tbl_course_category',array('parent_id'=>NULL));
            $data['singleCourse'] = $this->course->singleRecord('tbl_course',array('slug'=>$slug)); 
            $this->load->view('site/course/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('login');
        }
    }  
    public function finalUpdateCourse(){
        $this->form_validation->set_rules('terms_condition', 'Please check terms & condition', 'trim|required');
        if ($this->form_validation->run()) {
            if(!empty($_FILES['course_thumbnail']['name'])){
                $config['upload_path']  = 'assets/uploads/courses';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['encrypt_name'] =  TRUE;
                $config['max_size']      = 1024;
                $uploadedFile = $this->uploadFile($_FILES['course_thumbnail']['name'],'course_thumbnail',$config);
                 if($uploadedFile['error_msg'] != ''){
                    $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['course_thumbnail'] = $uploadedFile['file'];
            }
            if(!empty($_FILES['course_banner']['name'])){
                $config1['upload_path']  = 'assets/uploads/courses';
                $config1['allowed_types'] = 'jpg|jpeg|png';
                $config1['encrypt_name'] =  TRUE;
                $config1['max_size']      = 1024;
                $uploadedFile = $this->uploadFile($_FILES['course_banner']['name'],'course_banner',$config1);
                 if($uploadedFile['error_msg'] != ''){
                    $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['course_banner'] = $uploadedFile['file'];
            }
            if(($this->input->post('course_provider') == 2) && !empty($_FILES['video_file']['name'])){
                $videoConfig['upload_path']  = 'assets/uploads/courses/video';
                $videoConfig['allowed_types'] = 'wmv|mp4|avi|mov';
                $videoConfig['max_filename'] = '255';
                $videoConfig['encrypt_name'] =  TRUE;
                $videoConfig['max_size']      = 2048;
                $uploadedFile = $this->uploadVideoFile($_FILES['video_file']['name'],'video_file',$videoConfig);
                 if($uploadedFile['error_msg'] != ''){
                    $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['uploaded_video'] = $uploadedFile['file'];
            }
            $requirements = array_unique($this->input->post('requirement_data'));
            $headingData = array();
            $heading = $this->input->post('heading');
            $features = $this->input->post('features');
            if(count($heading) > 0){
               foreach($heading as $key=>$heading){
                  if($heading != ''){
                    $headingData[$key]['heading'] = $heading;
                  }else{
                    $headingData[$key]['heading'] = '';
                  }
                  if($features[$key] != ''){
                    $headingData[$key]['features'] = $features[$key];
                  }else{
                    $headingData[$key]['features'] = '';
                  }
               } 
            }
            $user_session = $this->session->userdata('user');
            $data['user_id'] = $user_session['id'];
            $data['heading_features'] = json_encode($headingData);
            $data['course_title'] = $this->input->post('course_title');
            $data['slug'] = $this->slug($this->input->post('course_title'));
            $data['short_description'] = $this->input->post('short_description');
            $data['long_description'] = $this->input->post('long_description');
            $data['category_id'] = $this->input->post('category_id');
            $data['sub_category'] = $this->input->post('sub_category');
            $data['sub_sub_category'] = $this->input->post('sub_sub_category');
            $data['language'] = $this->input->post('language'); 
            $data['level'] = $this->input->post('level'); 
            $data['is_featured'] = $this->input->post('is_featured');
            $data['requirements'] = json_encode($requirements); 
            $data['is_course_free'] = $this->input->post('is_course_free');
            $data['course_price'] = $this->input->post('course_price');
            $data['discount_price'] = $this->input->post('discount_price');
            $data['enable_discount'] = $this->input->post('enable_discount');
            $data['discount_limit'] = $this->input->post('discount_limit');
            $data['course_provider'] = $this->input->post('course_provider');
            $data['video_id'] = $this->input->post('video_id');
            $data['course_seo_title'] = $this->input->post('course_seo_title');
            $data['course_seo_description'] = $this->input->post('course_seo_description');
            $data['status'] = 1;
            $data['updated_at'] = date('Y-m-d H:i:s');
            $result = $this->course->updateRecord('tbl_course',array('id'=>$this->input->post('course_id')),$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Course updated successfully','url'=>base_url('dashboard'));
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
                    'terms_condition' => form_error('terms_condition')
                )  
            );
            echo json_encode($response);
            return false;
        }
    } 
    public function SearchCourses(){
        $searchString = $this->input->get('search');
        $searchString = str_replace('-', ' ', $searchString);
        $data['courseData'] = $this->course->searchDataWithLike('tbl_course',$searchString);
        $data['user_session'] = $this->session->userdata('user');
        $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);  
        $data['reviewList'] = $this->review->getStudentReviews();
        $data['categoryList'] = $this->category->getCategoriesForFeatured('tbl_course_category',array('parent_id'=>NULL));
        $data['companyList'] = $this->company->getRecordsWithLimit('tbl_company','');
        $data['featuredCategory'] = $this->category->getRecords('tbl_course_category',array('is_featured'=>1));
        $data['blogList'] = $this->blog->getRecordswithOrderAndLimit('tbl_blog');
        $this->load->view('site/courseList',$data);
    }
    public function importCourse(){
        if ($this->is_admin_logged_in() == true) {
            $data['user_session'] = $this->session->userdata('user');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);  
            $data['categoryList'] = $this->category->getCategoriesForFeatured('tbl_course_category',array('parent_id'=>NULL));
            $this->load->view('site/course/importCourse',$data);
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
    public function importCourseByExcel(){ 
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
                    $languageData = [];
                    if(!empty($sheetData)){
                        foreach($sheetData as $key=>$sheet){
                            if($key != 0){
                                $existingLanguage = $this->language->singleRecord('tbl_language',array('language'=>$sheet[0]));
                                if(empty($existingLanguage)){
                                    $languageData[$key]['language'] = $sheet[0];
                                    $languageData[$key]['slug'] = $this->slug($sheet[0]);
                                }
                            }
                        }
                    }
                    $this->language->insertBulk('tbl_language',$languageData);
                    $response = array('status' => 'success','message' => 'Language imported successfully','url'=>base_url('admin/student'));
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
    public function getCourseByFilter(){
        $instructorValue = $this->input->post('instructorValue');
        $levelValue = $this->input->post('levelValue');
        $priceValue = $this->input->post('priceValue');
        $category = $this->input->post('category');
        $search_input = $this->input->post('search_input');
        $viewType = $this->input->post('viewType');
        $finalCategory = [];
        if(!empty($category)){
            foreach ($category as $key => $category) {
                $categoryData = $this->category->getCategoriesForFeatured('tbl_course_category',array('id'=>$category));
                if(!empty($categoryData[0]['sub_category'])){
                    array_push($finalCategory, $categoryData[0]['sub_category']);
                }
            }
            $finalCategory = call_user_func_array('array_merge', $finalCategory);
        }
        $data['courseData'] = $this->course->getRecordsForFilter('tbl_course',$search_input,$instructorValue,$levelValue,$priceValue,$finalCategory);
        if($viewType == 'ti-layout-grid2'){
            $html = $this->load->view('site/courseGridView',array('courseData'=>$data['courseData'],'width'=>'6'),true);
        }else{
            $html = $this->load->view('site/courseListView',array('courseData'=>$data['courseData']),true);
        }
        $response = array('status' => 'success','message' => 'Course fetched successfully','html'=>$html);
        echo json_encode($response);
        return true;
    }
}

?>