<?php

Class Opens extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MasterModel','master');
        $this->load->model('SiteSettings','site');
    }
    public function index()
    {
        if ($this->is_admin_logged_in() == true) {
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['admin_session'] = $this->session->userdata('admin');
            $data['openList'] = $this->master->getRecords('tbl_opens');
            $this->load->view('admin/opens/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/opens/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editOpens($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleOpen'] = $this->master->singleRecord('tbl_opens',array('id'=>$id));
            $this->load->view('admin/opens/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Open
    public function saveOpens(){
        $this->form_validation->set_rules('opens', 'Text','trim|required');
        if ($this->form_validation->run()) {
            $data['opens'] = $this->input->post('opens');
            $result = $this->master->insert('tbl_opens',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Data added successfully','url'=>base_url('admin/opens'));
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
                    'opens' => form_error('opens')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Open
    public function updateOpens(){

        $this->form_validation->set_rules('opens','Text', 'trim|required');
        if ($this->form_validation->run()) {
            $data['opens'] = $this->input->post('opens');
            $result = $this->master->updateRecord('tbl_opens',array('id'=>$this->input->post('open_id')),$data);
            $response = array('status' => 'success','message'=> 'Data updated successfully','url'=>base_url('admin/opens'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'opens' => form_error('opens')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteOpens(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_opens',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Data deleted successfully','url'=>base_url('admin/opens'));
            }else{
                $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
            }
        }else{
            $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
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
    public function importOpens(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/opens/import',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }

    // Import CSV in DB
    public function importOpensByExcel(){
        $this->form_validation->set_rules('excel_file', 'Excel File', 'callback_file_check_excel_file');
        if ($this->form_validation->run()) {
            if(!empty($_FILES['excel_file']['name'])){
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
                    $excelData = $spreadsheet->getActiveSheet()->toArray();
                    $sheetData = $this->csv_formatter($excelData);
                    $excelDatas = [];
                    if(!empty($sheetData)){
                        foreach($sheetData as $key=>$sheet){
                            $excelDatas[$key]['opens'] = $sheet['opens'];
                        }
                    }
                    $stateId = $this->master->insertBulk('tbl_opens',$excelDatas);
                    $response = array('status' => 'success','message' => 'Opens status imported successfully','url'=>base_url('admin/opens'));
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