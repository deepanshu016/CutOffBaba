<?php

Class Company extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('CompanyModel','company');
   	 	$this->load->model('CourseCategory','category');
        $this->load->model('SiteSettings','site');
        $this->load->model('User','user');
    }
	public function index()
	{
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
			$data['companyList'] = $this->category->getRecords('tbl_company');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);  
			$this->load->view('admin/company/list',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
	public function addCompany(){
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);  
			$this->load->view('admin/company/add-edit',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
    public function editCompany($id,$slug){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['singleCompany'] = $this->category->singleRecord('tbl_company',array('id'=>$id,'slug'=>$slug));
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);  
            $this->load->view('admin/company/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
	public function file_check($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        if(!empty($_FILES['company_logo'])){
            $mime = get_mime_by_extension($_FILES['company_logo']['name']);
            if(isset($_FILES['company_logo']['name']) && $_FILES['company_logo']['name']!=""){
                if(in_array($mime, $allowed_mime_type_arr)){
                    return true;
                }else{
                    $this->form_validation->set_message('file_check', 'Please select only jpg/png file.');
                    return false;
                }
            }else{
                $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;    
        }
    }
    public function check_strong_password($str){
       if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
         return TRUE;
       }
       $this->form_validation->set_message('check_strong_password', 'The password field must be contains at least one letter and one digit.');
       return FALSE;
    }
	//Save Category
	public function saveCompany(){
		$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
		$this->form_validation->set_rules('company_email', 'Company Email', 'trim|required|valid_email|is_unique[tbl_company.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[25]|callback_check_strong_password');
		$this->form_validation->set_rules('company_mobile', 'Company Mobile', 'trim|required');
		$this->form_validation->set_rules('company_address', 'Address', 'trim|required');
		$this->form_validation->set_rules('company_logo', 'Company Logo', 'callback_file_check');
		$this->form_validation->set_rules('established_at', 'Date of Establishment', 'trim|required|date');
		$this->form_validation->set_rules('company_type', 'Company Type', 'trim|required');
		$this->form_validation->set_rules('company_service', 'Company Service', 'trim|required');
		$this->form_validation->set_rules('contact_person_name', 'Company Person Name', 'trim|required');
		$this->form_validation->set_rules('contact_person_designation', 'Company Person Designation', 'trim|required');
		$this->form_validation->set_rules('contact_person_email', 'Company Person Email', 'trim|required|valid_email|is_unique[tbl_users.email]');
		$this->form_validation->set_rules('contact_person_mobile', 'Company Person Mobile', 'trim|required|is_unique[tbl_users.mobile]');
        $this->form_validation->set_rules('about_company', 'About the company', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/company';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            if(!empty($_FILES['company_logo']['name'])){
	            $uploadedFile = $this->uploadFile($_FILES['company_logo']['name'],'company_logo',$config);
	             if($uploadedFile['error_msg'] != ''){
	            	$response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
	            	return json_encode($response);
	            }
	            $data['logo'] = $uploadedFile['file'];
        	}
            $data['name'] = $this->input->post('company_name');
            $data['slug'] = $this->slug($this->input->post('company_name'));
            $data['email'] = $this->input->post('company_email');
            $data['mobile'] = $this->input->post('company_mobile');
            $data['address'] = $this->input->post('company_address');
            $data['about_company'] = $this->input->post('about_company');
            $data['established_at'] = date('Y-m-d',strtotime($this->input->post('established_at')));
            $data['company_type'] = $this->input->post('company_type');	
            $data['company_service'] = $this->input->post('company_service');	
            $data['contact_person_designation'] = $this->input->post('contact_person_designation');
            $data['status'] = ($this->input->post('status') == 'on') ? 1 : 0;
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->db->trans_start();
            $dataUser['first_name'] = $this->input->post('contact_person_name');   
            $dataUser['email'] = $this->input->post('contact_person_email');
            $dataUser['mobile'] = $this->input->post('contact_person_mobile');
            $dataUser['password'] = sha1($this->input->post('password'));
            $dataUser['user_type'] = '4';
            $dataUser['status'] = 1;
            $dataUser['created_at'] = date('Y-m-d H:i:s');
            $userId = $this->user->insert('tbl_users',$dataUser);
            $data['user_id'] = $userId;
            $result = $this->company->insert('tbl_company',$data);
            $this->db->trans_complete();
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Company added successfully','url'=>base_url('admin/company'));
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
				    'company_name' => form_error('company_name'),
				    'company_email' => form_error('company_email'),
				    'company_mobile' => form_error('company_mobile'),
				    'company_address' => form_error('company_address'),
				    'established_at' => form_error('established_at'),
				    'company_type' => form_error('company_type'),
				    'company_service' => form_error('company_service'),
				    'contact_person_name' => form_error('contact_person_name'),
				    'contact_person_designation' => form_error('contact_person_designation'),
				    'contact_person_email' => form_error('contact_person_email'),
				    'contact_person_mobile' => form_error('contact_person_mobile'),
                    'about_company' => form_error('about_company'),
                    'password' => form_error('password'),
				    'status' => form_error('status')
        		)  
		   	);
			echo json_encode($response);
                return false;
        }
	}
    //Save Category
    public function updateCompany(){
        if(!empty($_FILES['company_logo']['name'])){
            $this->form_validation->set_rules('company_logo', 'Company Logo', 'callback_file_check');
        }
        $this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
		$this->form_validation->set_rules('company_email', 'Company Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('company_mobile', 'Company Mobile', 'trim|required');
		$this->form_validation->set_rules('company_address', 'Address', 'trim|required');
		$this->form_validation->set_rules('established_at', 'Date of Establishment', 'trim|required|date');
		$this->form_validation->set_rules('company_type', 'Company Type', 'trim|required');
		$this->form_validation->set_rules('company_service', 'Company Service', 'trim|required');
		$this->form_validation->set_rules('contact_person_name', 'Company Person Name', 'trim|required');
		$this->form_validation->set_rules('contact_person_designation', 'Company Person Designation', 'trim|required');
		$this->form_validation->set_rules('contact_person_email', 'Company Person Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('contact_person_mobile', 'Company Person Mobile', 'trim|required');
        $this->form_validation->set_rules('about_company', 'About the company', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/company';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            if(!empty($_FILES['company_logo']['name'])){
	            $uploadedFile = $this->uploadFile($_FILES['company_logo']['name'],'company_logo',$config);
	            if($uploadedFile['error_msg'] != ''){
	            	$response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
	            	return json_encode($response);
	            }else{
	            	$data['logo'] = $uploadedFile['file'];
	            }
        	}
            $data['company_name'] = $this->input->post('company_name');
            $data['slug'] = $this->slug($this->input->post('company_name'));
            $data['email'] = $this->input->post('company_email');
            $data['mobile'] = $this->input->post('company_mobile');
            $data['address'] = $this->input->post('company_address');
            $data['about_company'] = $this->input->post('about_company');
            $data['established_at'] = date('Y-m-d',strtotime($this->input->post('established_at')));
            $data['company_type'] = $this->input->post('company_type');	
            $data['company_service'] = $this->input->post('company_service');
            $data['contact_person_designation'] = $this->input->post('contact_person_designation');
            $data['status'] = ($this->input->post('status') == 'on') ? 1 : 0;
            $data['updated_at'] = date('Y-m-d H:i:s');
            $this->db->trans_start();
            $dataUser['first_name'] = $this->input->post('contact_person_name');   
            $dataUser['email'] = $this->input->post('contact_person_email');
            $dataUser['mobile'] = $this->input->post('contact_person_mobile');
            $dataUser['user_type'] = '4';
            $dataUser['status'] = 1;
            $dataUser['updated_at'] = date('Y-m-d H:i:s');
            $this->user->updateRecord('tbl_users',array('id'=>$this->input->post('user_id')),$dataUser);
            $result = $this->company->updateRecord('tbl_company',array('id'=>$this->input->post('company_id')),$data);
            $this->db->trans_complete();
            $data['singleCompany'] = $this->company->singleRecord('tbl_company',array('id'=>$this->input->post('company_id')));
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Company updated successfully','url'=>base_url('admin/company'));
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
				    'company_name' => form_error('company_name'),
				    'company_email' => form_error('company_email'),
				    'company_mobile' => form_error('company_mobile'),
				    'company_address' => form_error('company_address'),
				    'established_at' => form_error('established_at'),
				    'company_type' => form_error('company_type'),
				    'company_service' => form_error('company_service'),
				    'contact_person_name' => form_error('contact_person_name'),
				    'contact_person_designation' => form_error('contact_person_designation'),
				    'contact_person_email' => form_error('contact_person_email'),
				    'contact_person_mobile' => form_error('contact_person_mobile'),
                    'about_company' => form_error('about_company'),
				    'status' => form_error('status')
        		)  
		   	);
			echo json_encode($response);
                return false;  
        }
    }
    public function deleteCompany(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->company->deleteRecord('tbl_company',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Company deleted successfully','url'=>base_url('admin/company'));
            }else{
                $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
            }
        }else{
             $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
    public function importCompany(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            
            $this->load->view('admin/company/importCompany',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function file_check_excel_file($str){
        $allowed_mime_type_arr = array('application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/msexcel', 'application/x-msexcel', 'application/x-ms-excel', 'application/x-excel', 'application/x-dos_ms_excel', 'application/xls', 'application/x-xls', 'application/xlsx', 'application/excel');
        if(!empty($_FILES['excel_file'])){
            $mime = get_mime_by_extension($_FILES['excel_file']['name']);
            if(isset($_FILES['excel_file']['name']) && $_FILES['excel_file']['name']!=""){
                if(in_array($mime, $allowed_mime_type_arr)){
                    return true;
                }else{
                    $this->form_validation->set_message('file_check_excel_file', 'Please select only xlsx file.');
                    return false;
                }
            }else{
                $this->form_validation->set_message('file_check_excel_file', 'Please choose a file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check_excel_file', 'Please choose a file to upload.');
            return false;    
        }
    }
    public function importCompanyByExcel(){ 
        $this->form_validation->set_rules('excel_file', 'Excel File', 'callback_file_check_excel_file');
        if ($this->form_validation->run()) {
            if(!empty($_FILES['excel_file']['name'])){
                // }
                $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

                if(isset($_FILES['excel_file']['name']) && in_array($_FILES['excel_file']['type'], $file_mimes)) {
                    $arr_file = explode('.', $_FILES['excel_file']['name']);
                    $extension = end($arr_file);
                    if('xlsx' == $extension){
                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                    } else {
                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                    }
                    $spreadsheet = $reader->load($_FILES['excel_file']['tmp_name']);
                    $sheetData = $spreadsheet->getActiveSheet()->toArray();
                    $companyData = [];
                    $instructorData = [];
                    if(!empty($sheetData)){
                        foreach($sheetData as $key=>$sheet){
                            if($key != 0){
                                $existingLanguage = $this->company->singleRecord('tbl_company',array('email'=>$sheet[1]));
                                if(empty($existingLanguage)){
                                    $companyData[$key]['company_name'] = $sheet[0];
                                    $companyData[$key]['slug'] = $this->slug($sheet[0]);
                                    $companyData[$key]['email'] = $sheet[1];
                                    $companyData[$key]['mobile'] = $sheet[2];
                                    $companyData[$key]['address'] = $sheet[3];
                                    $companyData[$key]['logo'] = $sheet[4];
                                    $companyData[$key]['about_company'] = $sheet[5];
                                    $companyData[$key]['established_at'] = $sheet[6];
                                    $companyData[$key]['company_type'] = $sheet[7];
                                    $companyData[$key]['company_service'] = $sheet[8];
                                    $companyData[$key]['contact_person_designation'] = $sheet[9];
                                    $companyData[$key]['status'] = $sheet[10];
                                    $instructorData['first_name'] = $sheet[11];
                                    $instructorData['email'] = $sheet[12];
                                    $instructorData['mobile'] = $sheet[13];
                                    $instructorData['password'] = sha1($sheet[14]);
                                    $instructorData['user_type'] = $sheet[15];
                                    $this->db->trans_start();
                                    $existingUser = $this->user->singleRecord('tbl_users',array('email'=>$sheet[11]));
                                    if(empty($existingUser)){
                                        $userId = $this->user->insert('tbl_users',$instructorData);
                                        $companyData[$key]['user_id'] = $userId;
                                    }else{
                                        $userId = $existingUser['id'];
                                        $companyData[$key]['user_id'] = $userId;
                                    }
                                    $result = $this->company->insert('tbl_company',$companyData[$key]);
                                    $this->db->trans_complete();
                                }
                            }
                        }
                    }
                    $response = array('status' => 'success','message' => 'Company imported successfully','url'=>base_url('admin/company'));
                    echo json_encode($response);
                    return true;
                }
            }
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'excel_file' => form_error('excel_file')
                )  
            );
            echo json_encode($response);
                return false;
        }
    }
}

?>