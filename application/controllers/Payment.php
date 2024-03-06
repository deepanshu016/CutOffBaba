<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Razorpay\Api\Api;

class Payment extends MY_Controller {
	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('MasterModel','master');
    }
	public function successPayment()
	{
        $user_id =  $this->session->userdata('user')['id'];
		$data = [
            'user_id' => $user_id,
            'txn_id' => $this->input->post('razorpay_payment_id'),
            'amount' => $this->input->post('totalAmount'),
            'plan_id' => $this->input->post('plan_id'),
            'purchased_date' => date('Y-m-d H:i:s'),
            'status' => '1'
        ];
        $insert = $this->master->insert('payments', $data);
        if($insert){
            $response =  array('status' => 200,'message' => 'Payment done successfully','url'=>base_url('profile'));
            echo json_encode($response);
            return true;
        }else{
            $response =  array('status' => 400,'message' => 'Incorrect OTP','url'=>'');
            echo json_encode($response);
            return true;
        }
	}
}
?>
