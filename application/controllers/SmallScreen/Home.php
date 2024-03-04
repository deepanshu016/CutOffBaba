<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
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
		$this->load->view('site/home');
	}
	
	public function login()
	{
		$this->load->view('site/login');
	}
	public function signup()
	{
		$data['stateList'] = $this->master->getRecords('tbl_state');
		$this->load->view('site/signup',$data);
	}
	public function forgot_password()
	{
		$this->load->view('site/forgot_password');
	}
	public function state_wise_colleges()
	{
		$this->load->view('site/state_wise_colleges');
	}
	public function about_us()
	{
		$this->load->view('site/about_us');
	}
	public function testimonials()
	{
		$this->load->view('site/testimonials');
	}
	public function testimonials_explore()
	{
		$this->load->view('site/testimonials_explore');
	}
	public function splash_screen()
	{
		$this->load->view('site/splash_screen');
	}
	

	
}
