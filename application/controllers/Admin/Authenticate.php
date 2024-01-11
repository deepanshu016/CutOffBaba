<?php

Class Authenticate extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('SiteSettings','site');
   	 	$this->load->model('User','us');
    }
	public function index()
	{
		echo "<pre>";
		print_r(base64_encode('123456')); die;
		if ($this->is_admin_logged_in() == true) {
			$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
			$data['admin_session'] = $this->session->userdata('admin');
			$this->load->view('admin/dashboard',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
	public function login()
	{
		$this->load->view('admin/login');
	}
	//Forgot Password
	public function forgotPassword()
	{
		$this->load->view('admin/forgotpassword');
	}
	public function adminLogin(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run()) {
        	$email = $this->input->post('email');
        	$password = sha1($this->input->post('password'));
        	$adminData = $this->us->singleRecord('tbl_users',array('email'=>$email,'password'=>$password,'user_type'=>5));
        	if(!empty($adminData)){
				$this->session->set_userdata('admin',$adminData);
        		$response = array('status' => 'success','message' => 'Logged in successfull','url'=>base_url('admin/dashboard'));
        	}else{
        		$response = array('status' => 'errors','message' => 'Credentials not matched','url'=>'');
        	}
        }else{
        	$response = array(
        		'status' => 'error',
        		'errors' => array(
				    'email' => form_error('email'),
				    'password' => form_error('password')
        		)  
		   	);

        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	public function signInGuestUser($id){
    	$userData = $this->us->singleRecord('tbl_users',array('id'=>$id));
    	if(!empty($userData)){
			$this->session->set_userdata('user',$userData);
			$this->session->set_flashdata('success','You are logged in as gust successfully !!!');
    		return redirect('dashboard');
    	}else{
    		$this->session->set_flashdata('error','Invalid User');
    		return redirect('admin/student');
    	}
	}
	//Logout
	public function logout(){
        $this->session->unset_userdata('admin');
        $this->session->set_flashdata('success', "Logout successfully!!!");
        redirect('/admin');
    }
}

?>