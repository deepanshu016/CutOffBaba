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

    public function forgot_password()
	{
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric');
        if ($this->form_validation->run()) {
        	$phone = $this->input->post('phone');
			$userData = $this->us->singleRecord('tbl_users',array('mobile'=>$phone));
        	if(!empty($userData)){
				$otp = "1235";
				$msg = "Here is you OTP for Cutoff Baba Account is  ".$otp.". It will be valid for 10 minutes.Do not share this OTP with anyone. Team, Cutoff Baba";
				$phone = urlencode($phone);
				$msg = urlencode($msg);
				$apiUrl = "http://sms.shubhsandesh.in/vb/apikey.php?apikey=Tdp9KMSdKp6RI2G3&senderid=COBABA&&number=".$phone."&message=".$msg;
				$ch = curl_init($apiUrl);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				$response = curl_exec($ch);
				curl_close($ch);
				$data = json_decode($response, true);
				if ($data['code'] == "011") {
					$this->us->updateRecord('tbl_users',array('id'=>$userData['id']),['token'=>$otp]);
					$response =  array('status' => 'success','message' => 'OTP Sent Successfully','url'=>base_url('small/verify-otp').'/'.base64_encode($userData['id']));
					echo json_encode($response);
					return true;
				} else {
					$response =  array('status' => 'errors','message' => 'Something went wrong','url'=>'');
					echo json_encode($response);
					return true;
				}
        		
        	}else{
        		$response = array('status' => 'errors','message' => 'Phone number not exists in our record','url'=>'');
				echo json_encode($response);
				return true;
			}   
        }else{
        	$response =  array(
        		'status' => 'error',
        		'errors' => array(
				    'phone' => form_error('phone')
        		)  
		   	);
			echo json_encode($response);
			return true;
        }
	}
	public function OtpVerification()
	{
		$this->form_validation->set_rules('otp', 'OTP', 'trim|required|numeric');
        if ($this->form_validation->run()) {
			$user_id = $this->input->post('user_id');
			$userData = $this->master->singleRecord('tbl_users',array('id'=>$user_id));
			if(!empty($userData)){
				$otp = $this->input->post('otp');
				if($otp == $userData['token']){
					$this->master->updateRecord('tbl_users',array('id'=>$userData['id']),['token'=>NULL]);
					$response =  array('status' => 'success','message' => 'OTP verified Successfully','url'=>base_url('small/verify-done'));
					echo json_encode($response);
					return true;
				}else{
					$response =  array('status' => 'errors','message' => 'Incorrect OTP','url'=>'');
					echo json_encode($response);
					return true;
				}
			}else{
				$response = array('status' => 'errors','message' => 'Phone number not exists in our record','url'=>'');
				echo json_encode($response);
				return true;
			}
		}else{
			$response =  array(
				'status' => 'error',
				'errors' => array(
					'phone' => form_error('phone')
				)  
			);
			echo json_encode($response);
			return true;
		}
	}
}
