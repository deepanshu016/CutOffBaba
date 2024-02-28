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
		$this->load->view('site/splash-screen');
	}
	public function login()
	{
		$this->load->view('site/login');
	}
	public function forgot_password()
	{
		$this->load->view('site/forgot_password');
	}

	public function signup()
	{
		$data['stateList']=$this->site->getRecords('tbl_state',[]);
		$this->load->view('site/signup',$data);
	}
	public function streams()
	{
		$data['title'] = 'Streams | CUTOFFBABA';
		$data['stream'] = $this->master->getRecords('tbl_stream');
		$this->load->view('site/landing-page',$data);
	}
	public function coursesByStream($stream_id)
	{
		$data['title'] = 'Courses | CUTOFFBABA';
		$data['selectedStream'] = $this->master->singleRecord('tbl_stream',['id'=>$stream_id]);
		$data['courseLists'] = $this->master->getRecords('tbl_course',['stream'=>$stream_id]);
		$this->load->view('site/stream',$data);
	}
	public function aboutCourse($course_id)
	{
		$data['title'] = 'About Courses | CUTOFFBABA';
		$data['selectedCourse'] = $this->master->singleRecord('tbl_course',['id'=>$course_id]);
		$data['courseLists'] = $this->master->getRecords('tbl_course',['stream'=>$course_id]);
		$data['courseColleges'] = $this->master->getRecordsFindInSet('tbl_college',$course_id,'course_offered');
		$this->load->view('site/about_us',$data);
	}



	public function state_wise_colleges()
	{
		$this->load->view('frontend/state_wise_colleges');
	}
	public function aboutUs()
	{
		$data['title'] = 'About Us | CUTOFFBABA';
		$data['settings'] = $this->master->singleRecord('tbl_site_settings',['id'=>1]);
		$this->load->view('site/about_us',$data);
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
		$this->load->view('frontend/testimonials');
	}
	public function testimonials_explore()
	{
		$this->load->view('frontend/testimonials_explore');
	}
	
}
