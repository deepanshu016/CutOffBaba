<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('SiteSettings','site');
   	 	$this->load->model('StudentReview','review');
   	 	$this->load->model('CourseCategory','category');
   	 	$this->load->model('CompanyModel','company');
   	 	$this->load->model('BlogModel','blog');
   	 	$this->load->model('MasterModel','master');
   	 	$this->load->model('CourseModel','course');
   	 	$this->load->model('SiteSettings','site');
        $this->load->model('SliderModel','slider');
    }
	public function index()
	{
		$data['title'] = 'App Info | CUTOFFBABA';
		$this->load->view('site/splash-screen',$data);
	}
	public function appInfo()
	{
		$data['title'] = 'App Info | CUTOFFBABA';
		$data['settings'] = $this->master->singleRecord('tbl_site_settings',['id'=>1]);
		$this->load->view('site/more-about-splash',$data);
	}
	public function login()
	{
		$data['title'] = 'LOGIN | CUTOFFBABA';
		$this->load->view('site/login',$data);
	}
	public function forgot_password()
	{
		$data['title'] = 'Forgot Password | CUTOFFBABA';
		$this->load->view('site/forgot_password',$data);
	}

	public function signup()
	{
		$data['title'] = 'SIGNUP | CUTOFFBABA';
		$data['stateList']=$this->site->getRecords('tbl_state',[]);
		$this->load->view('site/signup',$data);
	}
	public function streams()
	{
		$data['title'] = 'Streams | CUTOFFBABA';
		$data['stream'] = $this->master->getRecords('tbl_stream');
		$this->load->view('site/streams',$data);
	}
	public function coursesByStream($stream_id)
	{
		$data['title'] = 'Courses | CUTOFFBABA';
		$data['selectedStream'] = $this->master->singleRecord('tbl_stream',['id'=>$stream_id]);
		$data['courseLists'] = $this->master->getRecords('tbl_course',['stream'=>$stream_id]);
		$this->load->view('site/course-by-stream',$data);
	}
	public function aboutCourse($course_id)
	{
		$data['title'] = 'About Courses | CUTOFFBABA';
		$data['selectedCourse'] = $this->master->singleRecord('tbl_course',['id'=>$course_id]);
		$data['courseLists'] = $this->master->getRecords('tbl_course',['stream'=>$course_id]);
		$data['courseColleges'] = $this->master->getRecordsFindInSet('tbl_college',$course_id,'course_offered');
		$data['stateList'] = $this->master->getStatesWithMinimumCollege();
		$this->load->view('site/about_us_course',$data);
	}



	public function stateList($course_id)
	{
		$data['title'] = 'State Wise Colleges | CUTOFFBABA';		
		$data['selectedCourse'] = $this->master->singleRecord('tbl_course',['id'=>$course_id]);
		$data['courseColleges'] = $this->master->getRecordsFindInSet('tbl_college',$course_id,'course_offered');
		$data['stateList'] = $this->master->getStatesWithMinimumCollege();
		$this->load->view('site/state-list',$data);
	}
	public function state_wise_colleges($state_id,$course_id)
	{
		$data['title'] = 'State Wise Colleges | CUTOFFBABA';		
		$data['selectedCourse'] = $this->master->singleRecord('tbl_course',['id'=>$course_id]);
		$data['selectedState'] = $this->master->singleRecord('tbl_state',['id'=>$state_id]);
		$data['stateWiseColleges'] = $this->master->getCollegesDataStateWise($state_id,$course_id);
		$data['degreeTypeList'] = $this->master->getRecords('tbl_degree_type',[]);	
		$data['stateList'] = $this->master->getRecords('tbl_state',[]);	
		$data['cityList'] = $this->master->getRecords('tbl_city',[]);	
		$data['examList'] = $this->master->getRecords('tbl_exam',[]);	
		$data['facilityList'] = $this->master->getRecords('tbl_facilities',[]);	
		$data['branchList'] = $this->master->getRecords('tbl_branch',[]);	
		$data['ownershipList'] = $this->master->getRecords('tbl_ownership',[]);	
		$this->load->view('site/state-wise-colleges',$data);
	}
	public function aboutUs()
	{
		$data['title'] = 'About Us | CUTOFFBABA';
		$data['settings'] = $this->master->singleRecord('tbl_site_settings',['id'=>1]);
		$this->load->view('site/about-page',$data);
	}
	public function browseSuccessStories()
	{
		$data['title'] = 'Our Success Story | CUTOFFBABA';
		$data['settings'] = $this->master->singleRecord('tbl_site_settings',['id'=>1]);
		$this->load->view('site/testomonial-exlore',$data);
	}
	public function contactUs()
	{
		$data['title'] = 'Contacts Us | CUTOFFBABA';
		$data['settings'] = $this->master->singleRecord('tbl_site_settings',['id'=>1]);
		$this->load->view('site/contact-us',$data);
	}
	public function termsConditions()
	{
		$data['title'] = 'Terms & Conditions | CUTOFFBABA';
		$data['settings'] = $this->master->singleRecord('tbl_site_settings',['id'=>1]);
		$this->load->view('site/terms-condition',$data);
	}
	public function testimonials()
	{
		$this->load->view('site/testimonials');
	}
	public function testimonials_explore()
	{
		$this->load->view('site/testimonials_explore');
	}
	
	public function plan(){
		$data['title'] = 'Counselling Plan | CUTOFFBABA';
		$data['settings'] = $this->master->singleRecord('tbl_site_settings',['id'=>1]);
		$data['planList'] = $this->master->getRecords('tbl_counsellng_plans');
		$this->load->view('site/counselling_plan',$data);
	}
	
	public function filterCollegeData()
	{
		$state_id = $this->input->post('state_id');
		$course_id = $this->input->post('course_id');
		$data['stateWiseColleges'] = $this->master->getCollegesDataStateWise($state_id,$course_id,$_POST);
		$html = $this->load->view('site/child_pages/college_data',$data,true);
		$response = array('status' => 200,'message' => 'Profile Updated successfully','url'=>'','html'=>$html);
		echo json_encode($response);
		return false;
	}


	public function collegePredictor(){
		$data['title'] = 'College Predictor| CUTOFFBABA';
		$data['settings'] = $this->master->singleRecord('tbl_site_settings',['id'=>1]);
		$data['userData'] = $this->master->singleRecord('tbl_users',['id'=>$this->session->userdata('user')['id']]);
		$data['selectedState'] = $this->master->singleRecord('tbl_state',['id'=>$this->session->userdata('user')['current_state']]);
		$data['degreeTypeList'] = $this->master->getRecords('tbl_degree_type');
		$this->load->view('site/college_predictor',$data);
	}



	public function selectedCourse($state_id,$course_id)
	{
		$data['title'] = 'Course Details | CUTOFFBABA';		
		$data['selectedCourse'] = $this->master->singleRecord('tbl_course',['id'=>$course_id]);
		$data['selectedState'] = $this->master->singleRecord('tbl_state',['id'=>$state_id]);
		$data['stateWiseColleges'] = $this->master->getCollegesDataStateWise($state_id,$course_id);
		$data['degreeTypeList'] = $this->master->getRecords('tbl_degree_type',[]);	
		$data['stateList'] = $this->master->getRecords('tbl_state',[]);	
		$data['cityList'] = $this->master->getRecords('tbl_city',[]);	
		$data['examList'] = $this->master->getRecords('tbl_exam',[]);	
		$data['facilityList'] = $this->master->getRecords('tbl_facilities',[]);	
		$data['branchList'] = $this->master->getRecords('tbl_branch',[]);	
		$data['ownershipList'] = $this->master->getRecords('tbl_ownership',[]);	
		$this->load->view('site/state-wise-colleges',$data);
	}
}
