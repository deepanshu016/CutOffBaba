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
        
        $api = new Api("rzp_test_q2ifqqk3pzoTyk", "tMCiHJTx5JRFdglKDGkTt0UW");
        $payData = $api->payment->fetch($this->input->post('razorpay_payment_id'));
        echo "<pre>";
        print_r($payData); die;
        $user_id =  $this->session->userdata('user')['id'];
		$data = [
            'user_id' => $user_id,
            'txn_id' => $this->input->post('razorpay_payment_id'),
            'amount' => $this->input->post('totalAmount'),
            'plan_id' => $this->input->post('plan_id'),
        ];
        $insert = $this->master->insert('payments', $data);
        $arr = array('msg' => 'Payment successfully credited', 'status' => true);  
	}



}
?>
