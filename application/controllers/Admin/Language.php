<?php

Class Language extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('LanguageModel','language');
   	 	$this->load->model('CourseCategory','category');
        $this->load->model('SiteSettings','site');
    }
	public function index()
	{ 
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
			$data['languageList'] = $this->language->getRecords('tbl_language');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
			$this->load->view('admin/language/list',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
	public function addLanguage(){
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
			$this->load->view('admin/language/add-edit',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
    public function editLanguage($id,$slug){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['singleLanguage'] = $this->language->singleRecord('tbl_language',array('id'=>$id,'slug'=>$slug));
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
            $this->load->view('admin/language/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
	//Save Category
	public function saveLanguage(){
        $this->form_validation->set_rules('language', 'Language', 'trim|required');
        if ($this->form_validation->run()) {
            $data['language'] = $this->input->post('language');
            $data['slug'] = $this->slug($this->input->post('language'));
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $result = $this->language->insert('tbl_language',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Language added successfully','url'=>base_url('admin/language'));
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
				    'language' => form_error('language')
        		)  
		   	);
			echo json_encode($response);
                return false;
        }
	}
    //Save Category
    public function updateLanguage(){
        $this->form_validation->set_rules('language', 'Language', 'trim|required');
        if ($this->form_validation->run()) {
            $data['language'] = $this->input->post('language');
            $data['slug'] = $this->slug($this->input->post('language'));
            $data['status'] = 1;
            $data['updated_at'] = date('Y-m-d H:i:s');
            $result = $this->language->updateRecord('tbl_language',array('id'=>$this->input->post('language_id')),$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Language updated successfully','url'=>base_url('admin/language'));
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
                    'language' => form_error('language')
                )  
		   	);
			echo json_encode($response);
                return false;  
        }
    }
    public function deleteLanguage(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->language->deleteRecord('tbl_language',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Language deleted successfully','url'=>base_url('admin/language'));
            }else{
                $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
            }
        }else{
             $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
    public function importLanguage(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            
            $this->load->view('admin/language/importLanguage',$data);
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
    public function importLanguageByExcel(){ 
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
                    $languageData = [];
                    if(!empty($sheetData)){
                        foreach($sheetData as $key=>$sheet){
                            if($key != 0){
                                $existingLanguage = $this->language->singleRecord('tbl_language',array('language'=>$sheet[0]));
                                if(empty($existingLanguage)){
                                    $languageData[$key]['language'] = $sheet[0];
                                    $languageData[$key]['slug'] = $this->slug($sheet[0]);
                                }
                            }
                        }
                    }
                    $this->language->insertBulk('tbl_language',$languageData);
                    $response = array('status' => 'success','message' => 'Language imported successfully','url'=>base_url('admin/language'));
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