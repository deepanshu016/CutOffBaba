<?php

Class Authenticate extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('User','us');
        $this->load->model('SiteSettings','site');
        $this->load->model('CourseCategory','category');
        $this->load->model('MasterModel','master');
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
                $response = array('status' => 'success','message' => 'Logged in successfull','url'=>base_url('streams'));
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
    public function register()
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
                $response = array('status' => 'success','message' => 'User signed up succesfully !!!','url'=>base_url('login'));
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
    public function demo()
    {
       if ($this->is_user_logged_in() == false) {
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
            $this->load->view('site/demotext',$data);
        }else{
            $this->session->set_flashdata('error','Access not allowed');
            return redirect('/');
        }
    }
    
	
	//Forgot Password
	public function forgotPassword()
	{
        if ($this->is_user_logged_in() == false) {
            $data['user_session'] = $this->session->userdata('user');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
    		$this->load->view('site/forgotpassword',$data);
        }else{
            $this->session->set_flashdata('error','Access not allowed');
            return redirect('/');
        }
	}
    public function resetPassword($token)
    {    
        $userData = $this->us->singleRecord('tbl_users',array('token'=>$token));
        if(!empty($userData)){
            $data['token'] = $token;
            $data['user_session'] = $this->session->userdata('user');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('site/resetPassword',$data);
        }else{
            $this->session->set_flashdata('error', "Link expired");
            return redirect('login');
        }
    }

    public function verifyAccount($token)
    {    
        $singleRecord = $this->us->singleRecord('tbl_users',['token'=>$token]);
        if(!empty($singleRecord)){
            $result = $this->us->updateRecord('tbl_users',array('id'=>$singleRecord['id']),array('email_verified'=>1,'status'=>1));
            if($result){
                $data['token'] = NULL;
                $data['updated_at'] = date('Y-m-d H:i:s');
                $results = $this->us->updateRecord('tbl_users',array('id'=>$singleRecord['id']),$data);
                $this->session->set_flashdata('success', 'Your account is verified now ,Please login to proceed');
                return redirect('login');
            }else{
                $this->session->set_flashdata('error', "Link expired");
                return redirect('login');
            }
        }else{
            $this->session->set_flashdata('error', "Link expired");
            return redirect('login');
        }
    }
	public function check_strong_password($str){
       if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
         return TRUE;
       }
       $this->form_validation->set_message('check_strong_password', 'The password field must be contains at least one letter and one digit.');
       return FALSE;
    }
	public function userRegistration(){
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tbl_users.email]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric|is_unique[tbl_users.mobile]');	
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[25]|matches[rptpassword]|callback_check_strong_password');	
		$this->form_validation->set_rules('rptpassword', 'Confirm Password', 'trim|required');	
        if ($this->form_validation->run()) {
        	$data['name'] = $this->input->post('name');
        	$data['email'] = $this->input->post('email');
        	$data['mobile'] = $this->input->post('mobile');
        	$data['password'] = sha1($this->input->post('password'));
        	$data['status'] = 0;
        	$data['created_at'] = date('Y-m-d H:i:s');
        	$result = $this->us->insert('tbl_users',$data);
        	if($result){
                $checkLogin = $this->us->singleRecord('tbl_users',array('id'=>$result));
                $email_result = $this->sendEmailCommon($checkLogin);
                // $this->session->set_userdata('user',$checkLogin);
        		$response = array('status' => 'success','message' => 'User signed up succesfully !!!','url'=>base_url('login'));
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
				    'rptpassword' => form_error('rptpassword')
        		)  
		   	);

        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
	}
    public function sendEmailCommon($userData){
        $from_email = "noreply@unitemicrosystems.in";
        $to_email = $userData['email'];
        if(!empty($userData)){
            $config = array();
            $config['mailtype'] = 'html';
            $this->load->library('Phpmailer_lib');
            $mail = $this->phpmailer_lib->load();
            $mail->isSMTP();
            $mail->Host     = 'smtp.hostinger.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'noreply@unitemicrosystems.in';
            $mail->Password = 'Noreply@5254';
            $mail->SMTPSecure = 'ssl';
            $mail->Port     = 465;
            $mail->setFrom('noreply@unitemicrosystems.in', 'Imaze World');
            $mail->addAddress($userData['email']);
            $mail->Subject = 'Verify Email';
            $mail->isHTML(true);
            $token = base64_encode($userData['email']);
            $this->us->updateRecord('tbl_users',array('email'=>$to_email),array('token'=>$token));
            $link_url = base_url('verify-account').'/'.$token;
            $message = 'Please click on below link to verify your account <br/>'.'<a href="'.$link_url.'"> Click Here </a>';
            $mail->Body = $message;
            return $mail->send();
        }else{
            return false;
        }
    }
	public function userLogin(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run()) {
        	$email = $this->input->post('email');
        	$password = sha1($this->input->post('password'));
        	$userData = $this->us->singleRecord('tbl_users',array('email'=>$email,'password'=>$password,'status'=>1));
        	if(!empty($userData)){
                $this->session->set_userdata('user',$userData);
                if($userData['quiz_status'] == 0){
                    $response = array('status' => 'success','message' => 'Please Complete Quiz first','url'=>base_url('quiz'));
                }else{
                    if($userData['quiz_status'] == 1 && $userData['quiz_result'] == 0){
                        $response = array('status' => 'success','message' => 'Sorry , Access not Allowed','url'=>base_url('quiz-failed'));
                    }else{
                        $response = array('status' => 'success','message' => 'Logged in succesfull','url'=>base_url('profile'));
                    }
                }
        		// $response = array('status' => 'success','message' => 'Logged in succesfull','url'=>base_url('userdashboard'));
        	}else{
        		$response = array('status' => 'errors','message' => 'Invalid Username or Password','url'=>'');
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

    public function getQuizResult($user_id){
        $correct=0;
        $false=0;
        $notattemp=0;
        foreach($datax as $key => $question){
            $qid=substr($key,1);
            
            $result=$this->db->select('correct_answer')->where('id',$user_id)->get('tbl_quiz_question')->result_array();
            if (count($result)>0) {
                if($result[0]['correct_answer']==$question){$correct++;}else{$false++;}
            }
        }
        return $correct;
    }
    // Send  Email Password
    public function requestToForgotPassword() {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run()) {
            $from_email = "noreply@unitemicrosystems.in";
            $to_email = $this->input->post('email');
            $userData = $this->us->singleRecord('tbl_users',array('email'=>$to_email));
            if(!empty($userData)){
                $config = array();
                $config['mailtype'] = 'html';
                $this->load->library('Phpmailer_lib');
                $mail = $this->phpmailer_lib->load();
                $mail->isSMTP();
                $mail->Host     = 'smtp.hostinger.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'noreply@unitemicrosystems.in';
                $mail->Password = 'Noreply@5254';
                $mail->SMTPSecure = 'ssl';
                $mail->Port     = 465;
                $mail->setFrom('noreply@unitemicrosystems.in', 'ImazeWorld');
                $mail->addAddress($userData['email']);
                $mail->Subject = 'Forgot Password';
                $mail->isHTML(true);
                $token = base64_encode($userData['email']);
                $this->us->updateRecord('tbl_users',array('email'=>$to_email),array('token'=>$token));
                $link_url = base_url('reset-password').'/'.$token;
                $message = 'Please click on below link to reset your password <br/>'.'<a href="'.$link_url.'"> Click Here </a>';
                $mail->Body = $message;
                if($mail->send()){
                    $response = array('status' => 'success','message' => 'Reset link has been sent on your email ,Please check','url'=>base_url('forgot-password'));
                }else{
                    $response = array('status' => 'errors','message' => 'Something went wrong','url'=>'');
                }
            }else{
                $response = array('status' => 'errors','message' => 'User not exists','url'=>'');
            }
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'email' => form_error('email')
                )  
            );
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
    //Reset Password
    public function requestToResetPassword(){
      
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[25]|matches[confirm_password]|callback_check_strong_password');   
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required'); 
        if ($this->form_validation->run()) {
            $token = $this->input->post('token');
            $email = base64_decode($token);
            $userData = $this->us->singleRecord('tbl_users',array('email'=>$email));
            $data['password'] = sha1($this->input->post('password'));
            $data['token'] = NULL;
            $data['updated_at'] = date('Y-m-d H:i:s');
            $result = $this->us->updateRecord('tbl_users',array('id'=>$userData['id']),$data);
            if($result){
                $response = array('status' => 'success','message' => 'Your password updated successfully','url'=>base_url('login'));
            }else{
                $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
            }
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'password' => form_error('password'),
                    'confirm_password' => form_error('confirm_password')
                )  
            );

        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
    }
    //Logout
	public function logout(){
        $this->session->unset_userdata('user');
        $this->session->set_flashdata('success', "Logout successfully!!!");
        redirect('/login');
    }


    public function saveContactForm(){
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        if ($this->form_validation->run()) {
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['phone'] = $this->input->post('phone');
            $data['message'] = $this->input->post('message');
            $data['status'] = 0;
            $data['created_at'] = date('Y-m-d H:i:s');
            $result = $this->enquiry->insert('tbl_enquiry',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Data submitted successfully','url'=>base_url('contact-us'));
                echo json_encode($response);
                return false;
            }else{
                $response = array('status' => 'errors','message'=> 'Something went wrong');
                echo json_encode($response);
                return false;
            }
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'name' => form_error('name'),
                    'email' => form_error('email'),
                    'phone' => form_error('phone'),
                    'subject' => form_error('subject'),
                    'message' => form_error('message')
                )  
            );
            echo json_encode($response);
                return false;
        }
    }

    
    public function Sendemail(){
         $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run()) {
            $from_email = "noreply@unitemicrosystems.in";
            $to_email = $this->session->userdata('user')['email'];
            $userData = $this->us->singleRecord('tbl_users',array('email'=>$to_email));
            if(!empty($userData)){
                $config = array();
                $config['mailtype'] = 'html';
                $this->load->library('Phpmailer_lib');
                $mail = $this->phpmailer_lib->load();
                $mail->isSMTP();
                $mail->Host     = 'smtp.hostinger.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'noreply@unitemicrosystems.in';
                $mail->Password = 'Noreply@5254';
                $mail->SMTPSecure = 'ssl';
                $mail->Port     = 465;
                $mail->setFrom('noreply@unitemicrosystems.in', 'Imaze World');
                $mail->addAddress($userData['email']);
                $mail->Subject = 'Verify Email';
                $mail->isHTML(true);
                $token = base64_encode($userData['email']);
                $this->us->updateRecord('tbl_users',array('email'=>$to_email),array('token'=>$token));
                $link_url = base_url('reset-password').'/'.$token;
                $message = 'Please click on below link to reset your password <br/>'.'<a href="'.$link_url.'"> Click Here </a>';
                $mail->Body = $message;
                if($mail->send()){
                    $response = array('status' => 'success','message' => 'Reset link has been sent on your email ,Please check','url'=>base_url('forgot-password'));
                }else{
                    $response = array('status' => 'errors','message' => 'Something went wrong','url'=>'');
                }
            }else{
                $response = array('status' => 'errors','message' => 'User not exists','url'=>'');
            }
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'email' => form_error('email')
                )  
            );
        }
        redirect('/dashboard');
    }
    public function file_check($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        if(!empty($_FILES['profile_image'])){
            $mime = get_mime_by_extension($_FILES['profile_image']['name']);
            if(isset($_FILES['profile_image']['name']) && $_FILES['profile_image']['name']!=""){
                if(in_array($mime, $allowed_mime_type_arr)){
                    return true;
                }else{
                    $this->form_validation->set_message('file_check', 'Please select only jpg/png file.');
                    return false;
                }
            }
        }
    }
    public function updateUserProfile(){
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile No.', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('profile_image', 'Banner Image', 'callback_file_check');
        $this->form_validation->set_rules('profile_type', 'Participation Type', 'trim|required');
        $this->form_validation->set_rules('pincode_permanent', 'Pincode', 'trim|min_length[6]|max_length[6]');
        $this->form_validation->set_rules('pincode_current', 'Pincode', 'trim|min_length[6]|max_length[6]');
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/users';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            if(!empty($_FILES['profile_image']['name'])){
                $uploadedFile = $this->uploadFile($_FILES['profile_image']['name'],'profile_image',$config);
                if($uploadedFile['error_msg'] != ''){
                    $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                    return json_encode($response);
                }
                $data['image'] = $uploadedFile['file'];
            } 
            $data['permanent_state'] = $this->input->post('state_permanent');
            $data['permanent_city'] = $this->input->post('city_permanent');
            $data['permanent_pincode'] = $this->input->post('pincode_permanent');
            $data['permanent_address'] = $this->input->post('address_permanent');
            if($this->input->post('is_address_same') == ''){
                $data['current_state'] = $this->input->post('state_current');
                $data['current_city'] = $this->input->post('city_current');
                $data['current_pincode'] = $this->input->post('pincode_current');
                $data['current_address'] = $this->input->post('address_current');
            }
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['mobile'] = $this->input->post('mobile');
            $data['username'] = $this->input->post('username');
            $data['profile_type'] = $this->input->post('profile_type');
            $data['password'] = sha1($this->input->post('password'));
            $data['is_address_same'] = $this->input->post('is_address_same');
            $result = $this->us->updateRecord('tbl_users',array('id'=>$this->input->post('user_id')),$data);
            if($result){
                $response = array('status' => 'success','message' => 'Profile Updated successfully','url'=>base_url('profile'));
                echo json_encode($response);
                return false;
            }else{
                $response = array('status' => 'errors','message' => 'Nothing to update','url'=>'');                
                echo json_encode($response);
                return false;
            }
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'name' => form_error('name'),
                    'email' => form_error('email'),
                    'mobile' => form_error('mobile'),
                    'profile_image' => form_error('profile_image'),
                    'profile_type' => form_error('profile_type'),
                    'pincode_permanent' => form_error('pincode_permanent'),
                    'pincode_current' => form_error('pincode_current')
                )  
            );
            echo json_encode($response);
            return false;
        }
    }
    public function EditUserProfile()
	{
		$data['title'] = 'Profile | CUTOFFBABA';
		$data['settings'] = $this->master->singleRecord('tbl_site_settings',['id'=>1]);
		$data['exams'] = $this->master->getRecords('tbl_exam');
		$data['states'] = $this->master->getRecords('tbl_state');
		$data['district'] = $this->master->getRecords('tbl_city');
        $data['user'] = $this->master->singleRecord('tbl_users',['id'=>$this->session->userdata('user')['id']]);
		$data['coursesList'] = $this->master->getExamCourses($data['user']['selected_exam']);
        $data['levelData'] = $this->master->getRecords('tbl_counselling_level',[]);
        $data['domicileCategory'] = $this->master->getDomicileCategories($data['user']);
		$this->load->view('site/profile',$data);
	}
    public function forgot_password()
	{
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric');
        if ($this->form_validation->run()) {
        	$phone = $this->input->post('phone');
			$userData = $this->us->singleRecord('tbl_users',array('mobile'=>$phone));
        	if(!empty($userData)){
				$otp = "1235";
				$msg = "Here is you OTP for Cutoff Baba Account is  ".$otp.". It will be valid for 10 minutes. Do not share this OTP with anyone. Team, Cutoff Baba";
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
					$response =  array('status' => 'success','message' => 'OTP Sent Successfully','url'=>base_url('verify-otp').'/'.base64_encode($userData['id']));
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
    public function verify_otp($phone)
	{
       
		$user_id =  base64_decode($phone);
		$userData = $this->master->singleRecord('tbl_users',array('id'=>$user_id));
		$this->load->view('site/verify_otp',['userData'=>$userData]);
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
					$response =  array('status' => 200,'message' => 'OTP verified Successfully','url'=>base_url('verify-done'));
					echo json_encode($response);
					return true;
				}else{
					$response =  array('status' => 400,'message' => 'Incorrect OTP','url'=>'');
					echo json_encode($response);
					return true;
				}
			}else{
				$response = array('status' => 400,'message' => 'Phone number not exists in our record','url'=>'');
				echo json_encode($response);
				return true;
			}
		}else{
			$response =  array(
				'status' => 400,
				'errors' => form_error('otp')
			);
			echo json_encode($response);
			return true;
		}
	}
    public function verify_done()
	{
		$this->load->view('site/verify_done');
	}
    public function userProfile()
	{
        $data['title'] = 'User Dashboard | CUTOFFBABA';
		$data['settings'] = $this->master->singleRecord('tbl_site_settings',['id'=>1]);
        $data['paymentsData'] = $this->master->getRecords('payments',['user_id'=>$this->session->userdata('user')['id']]);
        $data['userData'] = $this->master->singleRecord('tbl_users',['id'=>$this->session->userdata('user')['id']]);
		$this->load->view('site/user_profile',$data);
	}
   
}

?>