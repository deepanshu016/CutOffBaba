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
   	 	$this->load->model('SiteSettings','site');
   	 	$this->load->model('StudentReview','review');
   	 	$this->load->model('CourseCategory','category');
   	 	$this->load->model('CompanyModel','company');
   	 	$this->load->model('BlogModel','blog');
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
	public function signup()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric');
		$this->form_validation->set_rules('state', 'State', 'trim|required|numeric');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[25]|matches[confirm_password]|callback_check_strong_password');	
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');	
        if ($this->form_validation->run()) {
        	$data['name'] = $this->input->post('name');
        	$data['email'] = $this->input->post('email');
        	$data['mobile'] = $this->input->post('phone');
        	$data['password'] = sha1($this->input->post('password'));
        	$data['user_type'] = 1;
        	$data['permanent_state'] = $this->input->post('state');
        	$data['status'] = 0;
        	$data['created_at'] = date('Y-m-d H:i:s');
        	$result = $this->us->insert('tbl_users',$data);
        	if($result){
                $checkLogin = $this->us->singleRecord('tbl_users',array('id'=>$result));
        		$response = array('status' => 'success','message' => 'User signed up succesfully !!!','url'=>base_url('small/login'));
        	}else{
        		$response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
        	}
        }else{
        	$response = array(
        		'status' => 'error',
        		'errors' => array(
        			'name' => form_error('name'),
				    'email' => form_error('email'),
				    'mobile' => form_error('mobile'),
				    'password' => form_error('password'),
				    'confirm_password' => form_error('confirm_password'),
				    'state' => form_error('state')
        		)  
		   	);

        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
	}
	public function login()
	{
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');	
        if ($this->form_validation->run()) {
        	$phone = $this->input->post('phone');
        	$password = sha1($this->input->post('password'));
        	$userData = $this->us->singleRecord('tbl_users',array('mobile'=>$phone,'password'=>$password,'user_type'=>1));
        	if(!empty($userData)){
				$this->session->set_userdata('user',$userData);
        		$response = array('status' => 'success','message' => 'Logged in successfull','url'=>base_url('small/stream'));
        	}else{
        		$response = array('status' => 'errors','message' => 'Credentials not matched','url'=>'');
        	}
        }else{
        	$response = array(
        		'status' => 'error',
        		'errors' => array(
				    'phone' => form_error('phone'),
				    'password' => form_error('password')
        		)  
		   	);

        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
    public function logout(){
        $this->session->unset_userdata('user');
        $this->session->set_flashdata('success', "Logout successfully!!!");
        redirect('small/home');
    }

    public function forgot_password()
	{
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric');
        if ($this->form_validation->run()) {
        	$phone = $this->input->post('phone');
            $msg = "Here is you OTP for Cutoff Baba Account is 123456. It will be valid for 10 minutes.Do not share this OTP with anyone. Team, Cutoff Baba";
            $phone = urlencode($phone);
            $msg = urlencode($msg);
            $apiUrl = "http://sms.shubhsandesh.in/vb/apikey.php?apikey=Tdp9KMSdKp6RI2G3&senderid=COBABA&&number=".$phone."&message=".$msg;
            $ch = curl_init($apiUrl);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            
            if (curl_errno($ch)) {
                echo 'Curl error: ' . curl_error($ch);
            }
            
            // Close cURL session
            curl_close($ch);
            echo "<pre>";
            print_r($response);
            die;
            // $response = $this->curl->simple_get($url);
            if ($response) {
                $data = json_decode($response, true);
                echo "<pre>";
                print_r($data);
                die;
            } else {
                // Handle the error
                echo 'Error calling API';
            }
        }else{
        	$response = array(
        		'status' => 'error',
        		'errors' => array(
				    'phone' => form_error('phone')
        		)  
		   	);

        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
}
