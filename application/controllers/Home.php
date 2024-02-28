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
	public function stream()
	{
		$selectedStream = $this->master->singleRecord('tbl_stream',['id'=>4]);
		$courseLists = $this->master->getRecords('tbl_course',['stream'=>$selectedStream['id']]);
		$this->load->view('site/stream',['selectedStream'=>$selectedStream,'courseLists'=>$courseLists]);
	}



	public function state_wise_colleges()
	{
		$this->load->view('frontend/state_wise_colleges');
	}
	public function about_us()
	{
		$this->load->view('frontend/about_us');
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
