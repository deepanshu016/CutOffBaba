<?php

Class Feature extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('FeatureModel','feature');
        $this->load->model('SiteSettings','site');
        $this->load->model('User','user');
    }
	public function index()
	{
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
			$data['featureList'] = $this->feature->getRecords('tbl_feature');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);  
			$this->load->view('admin/feature/list',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
	public function addFeature(){
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);  
			$this->load->view('admin/feature/add-edit',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
    public function editFeature($id,$slug){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['singleFeature'] = $this->feature->singleRecord('tbl_feature',array('id'=>$id,'slug'=>$slug));
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);  
            $this->load->view('admin/feature/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
	public function file_check($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        if(!empty($_FILES['feature_image'])){
            $mime = get_mime_by_extension($_FILES['feature_image']['name']);
            if(isset($_FILES['feature_image']['name']) && $_FILES['feature_image']['name']!=""){
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
	//Save Feature
	public function saveFeature(){
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('feature_image', 'Company Logo', 'callback_file_check');
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/feature';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 200;
            if(!empty($_FILES['feature_image']['name'])){
	            $uploadedFile = $this->uploadFile($_FILES['feature_image']['name'],'feature_image',$config);
	             if($uploadedFile['error_msg'] != ''){
	            	$response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
	            	return json_encode($response);
	            }
	            $data['feature_image'] = $uploadedFile['file'];
        	}
            $data['title'] = $this->input->post('title');
            $data['slug'] = $this->slug($this->input->post('title'));
            $data['description'] = $this->input->post('description');
            $data['status'] = ($this->input->post('status') == 'on') ? 1 : 0;
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->db->trans_start();
            $result = $this->feature->insert('tbl_feature',$data);
            $this->db->trans_complete();
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Feature added successfully','url'=>base_url('admin/feature'));
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
				    'title' => form_error('title'),
				    'description' => form_error('description'),
				    'feature_image' => form_error('feature_image')
        		)  
		   	);
			echo json_encode($response);
                return false;
        }
	}
    //Save Category
    public function updateFeature(){
        if(!empty($_FILES['feature_image']['name'])){
            $this->form_validation->set_rules('feature_image', 'Company Logo', 'callback_file_check');
        }
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/feature';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 200;
            if(!empty($_FILES['feature_image']['name'])){
	            $uploadedFile = $this->uploadFile($_FILES['feature_image']['name'],'company_logo',$config);
	            if($uploadedFile['error_msg'] != ''){
	            	$response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
	            	return json_encode($response);
	            }else{
	            	$data['feature_image'] = $uploadedFile['file'];
	            }
        	}
            $data['title'] = $this->input->post('title');
            $data['slug'] = $this->slug($this->input->post('title'));
            $data['description'] = $this->input->post('description');
            $data['status'] = ($this->input->post('status') == 'on') ? 1 : 0;
            $data['updated_at'] = date('Y-m-d H:i:s');
            $this->db->trans_start();
            $result = $this->feature->updateRecord('tbl_feature',array('id'=>$this->input->post('feature_id')),$data);
            $this->db->trans_complete();
            $data['singleFeature'] = $this->feature->singleRecord('tbl_feature',array('id'=>$this->input->post('feature_id')));
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Feature updated successfully','url'=>base_url('admin/feature'));
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
				    'title' => form_error('title'),
                    'description' => form_error('description'),
                    'feature_image' => form_error('feature_image')
        		)  
		   	);
			echo json_encode($response);
                return false;  
        }
    }
    public function deleteFeature(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->feature->deleteRecord('tbl_feature',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Feature deleted successfully','url'=>base_url('admin/feature'));
            }else{
                $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
            }
        }else{
             $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
    public function importFeature(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            
            $this->load->view('admin/feature/importFeature',$data);
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