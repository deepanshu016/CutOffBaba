<?php

Class Institute extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('InstituteModel','institute');
   	 	$this->load->model('CourseCategory','category');
   	 	$this->load->model('StudentReview','review');
        $this->load->model('SiteSettings','site');
        $this->load->model('User','user');
    }
	public function index(){
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
			$data['instituteList'] = $this->institute->getRecords('tbl_institutes');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);  
			$this->load->view('admin/institute/list',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
    public function addInstitute(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);  
            $this->load->view('admin/institute/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editInstitute($id,$slug){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['singleInstitute'] = $this->institute->singleRecord('tbl_institutes',array('id'=>$id,'slug'=>$slug));
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);  
            $this->load->view('admin/institute/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function file_check($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        if(!empty($_FILES['institute_logo'])){
            $mime = get_mime_by_extension($_FILES['institute_logo']['name']);
            if(isset($_FILES['institute_logo']['name']) && $_FILES['institute_logo']['name']!=""){
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
    public function saveInstitute(){
        $this->form_validation->set_rules('institute_name', 'Institute Name', 'trim|required');
        $this->form_validation->set_rules('institute_email', 'Institute Email', 'trim|required|valid_email|is_unique[tbl_institutes.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[25]|callback_check_strong_password');
        $this->form_validation->set_rules('institute_mobile', 'Institute Mobile', 'trim|required');
        $this->form_validation->set_rules('institute_address', 'Address', 'trim|required');
        $this->form_validation->set_rules('institute_logo', 'Institute Logo', 'callback_file_check');
        $this->form_validation->set_rules('established_at', 'Date of Establishment', 'trim|required|date');
        $this->form_validation->set_rules('institute_type', 'Institute Type', 'trim|required');
        $this->form_validation->set_rules('institute_person_name', 'Institute Person Name', 'trim|required');
        $this->form_validation->set_rules('institute_person_designation', 'Institute Person Designation', 'trim|required');
        $this->form_validation->set_rules('institute_person_email', 'Institute Person Email', 'trim|required|valid_email|is_unique[tbl_users.email]');
        $this->form_validation->set_rules('institute_person_mobile', 'Institute Person Mobile', 'trim|required|is_unique[tbl_users.mobile]');
        $this->form_validation->set_rules('about_institute', 'About the company', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/institute';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            if(!empty($_FILES['institute_logo']['name'])){
                $uploadedFile = $this->uploadFile($_FILES['institute_logo']['name'],'institute_logo',$config);
                 if($uploadedFile['error_msg'] != ''){
                    $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                    return json_encode($response);
                }
                $data['logo'] = $uploadedFile['file'];
            }
            $data['institute_name'] = $this->input->post('institute_name');
            $data['slug'] = $this->slug($this->input->post('institute_name'));
            $data['email'] = $this->input->post('institute_email');
            $data['mobile'] = $this->input->post('institute_mobile');
            $data['address'] = $this->input->post('institute_address');
            $data['about_institute'] = $this->input->post('about_institute');
            $data['established_at'] = date('Y-m-d',strtotime($this->input->post('established_at')));
            $data['institute_type'] = $this->input->post('institute_type'); 
            $data['contact_person_designation'] = $this->input->post('institute_person_designation');
            $data['status'] = ($this->input->post('status') == 'on') ? 1 : 0;
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->db->trans_start();
            $dataUser['first_name'] = $this->input->post('institute_person_name');   
            $dataUser['email'] = $this->input->post('institute_person_email');
            $dataUser['mobile'] = $this->input->post('institute_person_mobile');
            $dataUser['password'] = sha1($this->input->post('password'));
            $dataUser['user_type'] = '2';
            $dataUser['status'] = 1;
            $dataUser['created_at'] = date('Y-m-d H:i:s');
            $userId = $this->user->insert('tbl_users',$dataUser);
            $data['user_id'] = $userId;
            $result = $this->institute->insert('tbl_institutes',$data);
            $this->db->trans_complete();
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Institute added successfully','url'=>base_url('admin/institute'));
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
                    'institute_name' => form_error('institute_name'),
                    'institute_email' => form_error('institute_email'),
                    'institute_mobile' => form_error('institute_mobile'),
                    'institute_address' => form_error('institute_address'),
                    'established_at' => form_error('established_at'),
                    'institute_type' => form_error('institute_type'),
                    'institute_person_name' => form_error('institute_person_name'),
                    'institute_person_designation' => form_error('institute_person_designation'),
                    'institute_person_email' => form_error('institute_person_email'),
                    'institute_person_mobile' => form_error('institute_person_mobile'),
                    'about_institute' => form_error('about_institute'),
                    'password' => form_error('password'),
                    'status' => form_error('status')
                )  
            );
            echo json_encode($response);
                return false;
        }
    }
    //Save Category
    public function updateInstitute(){
        if(!empty($_FILES['institute_logo']['name'])){
            $this->form_validation->set_rules('institute_logo', 'Institute Logo', 'callback_file_check');
        }
        $this->form_validation->set_rules('institute_name', 'Institute Name', 'trim|required');
        $this->form_validation->set_rules('institute_email', 'Institute Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('institute_mobile', 'Institute Mobile', 'trim|required');
        $this->form_validation->set_rules('institute_address', 'Address', 'trim|required');
        $this->form_validation->set_rules('established_at', 'Date of Establishment', 'trim|required|date');
        $this->form_validation->set_rules('institute_type', 'Institute Type', 'trim|required');
        $this->form_validation->set_rules('institute_person_name', 'Institute Person Name', 'trim|required');
        $this->form_validation->set_rules('institute_person_designation', 'Institute Person Designation', 'trim|required');
        $this->form_validation->set_rules('institute_person_email', 'Institute Person Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('institute_person_mobile', 'Institute Person Mobile', 'trim|required');
        $this->form_validation->set_rules('about_institute', 'About the Institute', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/institute';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            if(!empty($_FILES['institute_logo']['name'])){
                $uploadedFile = $this->uploadFile($_FILES['institute_logo']['name'],'institute_logo',$config);
                if($uploadedFile['error_msg'] != ''){
                    $response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
                    return json_encode($response);
                }else{
                    $data['logo'] = $uploadedFile['file'];
                }
            }
            $data['institute_name'] = $this->input->post('institute_name');
            $data['slug'] = $this->slug($this->input->post('institute_name'));
            $data['email'] = $this->input->post('institute_email');
            $data['mobile'] = $this->input->post('institute_mobile');
            $data['address'] = $this->input->post('institute_address');
            $data['about_institute'] = $this->input->post('about_institute');
            $data['established_at'] = date('Y-m-d',strtotime($this->input->post('established_at')));
            $data['institute_type'] = $this->input->post('institute_type'); 
            $data['contact_person_designation'] = $this->input->post('institute_person_designation');
            $data['status'] = ($this->input->post('status') == 'on') ? 1 : 0;
            $data['updated_at'] = date('Y-m-d H:i:s');
            $this->db->trans_start();
            $dataUser['first_name'] = $this->input->post('institute_person_name');   
            $dataUser['email'] = $this->input->post('institute_person_email');
            $dataUser['mobile'] = $this->input->post('institute_person_mobile');
            $dataUser['user_type'] = '2';
            $dataUser['status'] = 1;
            $dataUser['updated_at'] = date('Y-m-d H:i:s');
            $this->user->updateRecord('tbl_users',array('id'=>$this->input->post('user_id')),$dataUser);
            $result = $this->institute->updateRecord('tbl_institutes',array('id'=>$this->input->post('institute_id')),$data);
            $this->db->trans_complete();
            $data['singleInstitute'] = $this->institute->singleRecord('tbl_institutes',array('id'=>$this->input->post('institute_id')));
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Institute updated successfully','url'=>base_url('admin/institute'));
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
                    'institute_name' => form_error('institute_name'),
                    'institute_email' => form_error('institute_email'),
                    'institute_mobile' => form_error('institute_mobile'),
                    'institute_address' => form_error('institute_address'),
                    'established_at' => form_error('established_at'),
                    'institute_type' => form_error('institute_type'),
                    'institute_person_name' => form_error('institute_person_name'),
                    'institute_person_designation' => form_error('institute_person_designation'),
                    'institute_person_email' => form_error('institute_person_email'),
                    'institute_person_mobile' => form_error('institute_person_mobile'),
                    'about_institute' => form_error('about_institute'),
                    'status' => form_error('status')
                )  
            );
            echo json_encode($response);
                return false;  
        }
    }
    public function deleteInstitute(){
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
    public function importInstitute(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            
            $this->load->view('admin/institute/importInstitute',$data);
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
    public function importInstituteByExcel(){ 
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
                    $instituteRecord = [];
                    $instituteData = [];
                    if(!empty($sheetData)){
                        foreach($sheetData as $key=>$sheet){
                            if($key != 0){
                                $existingLanguage = $this->institute->singleRecord('tbl_institutes',array('email'=>$sheet[1]));
                                if(empty($existingLanguage)){
                                    $instituteRecord[$key]['institute_name'] = $sheet[0];
                                    $instituteRecord[$key]['slug'] = $this->slug($sheet[0]);
                                    $instituteRecord[$key]['email'] = $sheet[1];
                                    $instituteRecord[$key]['mobile'] = $sheet[2];
                                    $instituteRecord[$key]['address'] = $sheet[3];
                                    $instituteRecord[$key]['logo'] = $sheet[4];
                                    $instituteRecord[$key]['about_institute'] = $sheet[5];
                                    $instituteRecord[$key]['established_at'] = $sheet[6];
                                    $instituteRecord[$key]['institute_type'] = $sheet[7];
                                    $instituteRecord[$key]['contact_person_designation'] = $sheet[8];
                                    $instituteRecord[$key]['status'] = $sheet[9];
                                    $instituteData['first_name'] = $sheet[10];
                                    $instituteData['email'] = $sheet[11];
                                    $instituteData['mobile'] = $sheet[12];
                                    $instituteData['password'] = sha1($sheet[13]);
                                    $instituteData['user_type'] = $sheet[14];
                                    $this->db->trans_start();
                                    $existingUser = $this->user->singleRecord('tbl_users',array('email'=>$sheet[11]));
                                    if(empty($existingUser)){
                                        $userId = $this->user->insert('tbl_users',$instituteData);
                                        $instituteRecord[$key]['user_id'] = $userId;
                                    }else{
                                        $userId = $existingUser['id'];
                                        $instituteRecord[$key]['user_id'] = $userId;
                                    }
                                    $result = $this->institute->insert('tbl_institutes',$instituteRecord[$key]);
                                    $this->db->trans_complete();
                                }
                            }
                        }
                    }
                    $response = array('status' => 'success','message' => 'Company imported successfully','url'=>base_url('admin/institute'));
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