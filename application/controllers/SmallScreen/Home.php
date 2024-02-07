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
   	 	$this->load->model('CourseModel','course');
   	 	$this->load->model('SiteSettings','site');

        $this->load->model('SliderModel','slider');
    }
	public function index()
	{
		$this->load->view('small/frontend/home');
	}
	public function login()
	{
		$this->load->view('small/frontend/login');
	}
	public function signup()
	{
		$this->load->view('small/frontend/signup');
	}
	public function forgot_password()
	{
		$this->load->view('small/frontend/forgot_password');
	}
	public function state_wise_colleges()
	{
		$this->load->view('small/frontend/state_wise_colleges');
	}
	public function about_us()
	{
		$this->load->view('small/frontend/about_us');
	}
	public function testimonials()
	{
		$this->load->view('small/frontend/testimonials');
	}
	public function testimonials_explore()
	{
		$this->load->view('small/frontend/testimonials_explore');
	}
	public function splash_screen()
	{
		$this->load->view('small/frontend/splash_screen');
	}
}
