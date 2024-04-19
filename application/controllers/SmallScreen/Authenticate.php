<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticate extends MY_Controller {

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
   	 	$this->load->model('MasterModel','master');
   	 	$this->load->model('User','us');
   	 	$this->load->model('SiteSettings','site');

        $this->load->model('SliderModel','slider');
    }
    public function check_strong_password($str){
        if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
          return TRUE;
        }
        $this->form_validation->set_message('check_strong_password', 'The password field must be contains at least one letter and one digit.');
        return FALSE;
     }
	
	
    public function logout(){
        $this->session->unset_userdata('user');
        $this->session->set_flashdata('success', "Logout successfully!!!");
        redirect('small/home');
    }


	
}
