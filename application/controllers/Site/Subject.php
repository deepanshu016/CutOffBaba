<?php

Class Subject extends MY_Controller {

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
    }
	public function index(){
        if ($this->is_user_logged_in() == true) {
    		$data['user_session'] = $this->session->userdata('user');
    		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
    		$data['subjectList'] = $this->subject->getRecordsOrderWise('tbl_subjects',[]);
            $data['categoryList'] = $this->category->getCategoriesForFeatured('tbl_course_category',array('parent_id'=>NULL));
    		$this->load->view('site/subject/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('login');
        }
	}
	public function addSubject(){
		if ($this->is_user_logged_in() == true) {
			$data['user_session'] = $this->session->userdata('user');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);  
            $data['courseList'] = $this->category->getRecords('tbl_course',array('is_verified'=>1));
            $data['categoryList'] = $this->category->getCategoriesForFeatured('tbl_course_category',array('parent_id'=>NULL));
			$this->load->view('site/subject/add-edit',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('login');
		}
	}
	public function saveSubject(){
		$this->form_validation->set_rules('subject_title', 'Subject Title', 'trim|required');
		$this->form_validation->set_rules('subject_code', 'Subject Code', 'trim|required');
		$this->form_validation->set_rules('course_id', 'Course', 'trim|required');
		if ($this->form_validation->run()) {
            $user_session = $this->session->userdata('user');
            $data['subject_title'] = $this->input->post('subject_title');
            $data['slug'] = $this->slug($this->input->post('subject_title'));
            $data['subject_code'] = $this->input->post('subject_code');
            $data['course_id'] = $this->input->post('course_id');
            $data['user_id'] = $user_session['id'];
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $result = $this->subject->insert('tbl_subjects',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Subject added successfully','url'=>base_url('subjects'));
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
				    'subject_title' => form_error('subject_title'),
				    'subject_code' => form_error('subject_code'),
				    'course_id' => form_error('course_id')
        		)  
		   	);
			echo json_encode($response);
            return false;
        }
	}
    public function editSubject($slug){
        if ($this->is_user_logged_in() == true) {
            $data['user_session'] = $this->session->userdata('user');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['courseList'] = $this->category->getRecords('tbl_course',array('is_verified'=>1));
            $data['singleSubject'] = $this->subject->singleRecord('tbl_subjects',array('slug'=>$slug)); 
            $data['categoryList'] = $this->category->getCategoriesForFeatured('tbl_course_category',array('parent_id'=>NULL));
            $this->load->view('site/subject/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('login');
        }
    }  
    public function updateSubject(){
        $this->form_validation->set_rules('subject_title', 'Subject Title', 'trim|required');
        $this->form_validation->set_rules('subject_code', 'Subject Code', 'trim|required');
        if ($this->form_validation->run()) {
            $user_session = $this->session->userdata('user');
            $data['user_id'] = $user_session['id'];
            $data['subject_title'] = $this->input->post('subject_title');
            $data['slug'] = $this->slug($this->input->post('subject_title'));
            $data['subject_code'] = $this->input->post('subject_code');
            $data['course_id'] = $this->input->post('course_id');
            $data['status'] = 1;
            $data['updated_at'] = date('Y-m-d H:i:s');
            $result = $this->subject->updateRecord('tbl_subjects',array('id'=>$this->input->post('subject_id')),$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Subject updated successfully','url'=>base_url('subjects'));
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
                    'subject_title' => form_error('subject_title'),
                    'subject_code' => form_error('subject_code')
                )  
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteSubject(){
        if ($this->is_user_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->subject->deleteRecord('tbl_subjects',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Subject delete successfully','url'=>base_url('subjects'));
            }else{
                $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
            }
        }else{
             $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
    public function updateSubjectOrder(){
        if ($this->is_user_logged_in() == true) {
            $subjectIds = $this->input->post('id');
            $order = $this->input->post('order');
            $combineData = [];
            if(!empty($subjectIds)){
                foreach($subjectIds as $key=>$subjectIds){
                    $combineData[$key]['subject_id'] = $subjectIds;
                    $combineData[$key]['order'] = $order[$key];
                }
            }
            if(!empty($combineData)){
                foreach($combineData as $keys=>$combine){
                    $this->subject->updateRecord('tbl_subjects',array('id'=>$combine['subject_id']),array('show_order'=>$combine['order']));
                }
            }
            $response = array('status' => 'success','message' => 'Subject updated successfully','url'=>base_url('subjects'));
            echo json_encode($response);
            return false;
        }else{
             $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
        }
    }
}

?>