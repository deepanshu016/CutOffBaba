<?php

Class CounsellingHead extends MY_Controller {

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
            $data['counsellingHeadList'] = $this->master->getRecords('tbl_counselling_head');
            $this->load->view('admin/cutoff_head_name/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/cutoff_head_name/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editCounsellingHead($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleCounsellingHead'] = $this->master->singleRecord('tbl_counselling_head',array('id'=>$id));

            $this->load->view('admin/cutoff_head_name/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Counselling Level
    public function saveCounsellingHead(){
        $this->form_validation->set_rules('head_name', 'Head Name', 'trim|required');
        $this->form_validation->set_rules('course_id', 'Course', 'trim|required');
        $this->form_validation->set_rules('level_id', 'Level', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_rules('exam_id[]', 'Exams', 'trim|required');
        if ($this->form_validation->run()) {
            $data['head_name'] = $this->input->post('head_name');
            $data['course_id'] = $this->input->post('course_id');
            $data['level_id'] = $this->input->post('level_id');
            $data['state_id'] = $this->input->post('state');
            $data['exams'] = ($this->input->post('exam_id')) ? implode('|',$this->input->post('exam_id')) : '';
            $result = $this->master->insert('tbl_counselling_head',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Cutoff Head added successfully','url'=>base_url('admin/cutoff-head-name'));
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
                    'head_name' => form_error('head_name'),
                    'course_id' => form_error('course_id'),
                    'level_id' => form_error('level_id'),
                    'state' => form_error('state'),
                    'exam_id' => form_error('exam_id[]')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Feeshead
    public function updateCounsellingHead(){
        $this->form_validation->set_rules('head_name', 'Head Name', 'trim|required');
        $this->form_validation->set_rules('course_id', 'Course', 'trim|required');
        $this->form_validation->set_rules('level_id', 'Level', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_rules('exam_id[]', 'Exams', 'trim|required');

        if ($this->form_validation->run()) {
            $data['head_name'] = $this->input->post('head_name');
            $data['course_id'] = $this->input->post('course_id');
            $data['level_id'] = $this->input->post('level_id');
            $data['state_id'] = $this->input->post('state');
            $data['exams'] = ($this->input->post('exam_id')) ? implode('|',$this->input->post('exam_id')) : '';
            $result = $this->master->updateRecord('tbl_counselling_head',array('id'=>$this->input->post('head_id')),$data);
            $response = array('status' => 'success','message'=> 'Cutoff Head updated successfully','url'=>base_url('admin/cutoff-head-name'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'head_name' => form_error('head_name'),
                    'course_id' => form_error('course_id'),
                    'level_id' => form_error('level_id'),
                    'state' => form_error('state'),
                    'exam_id' => form_error('exam_id[]')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteCounsellingHead(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_counselling_head',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Cutoff Head deleted successfully','url'=>base_url('admin/cutoff-head-name'));
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
    public function importCounsellingHead(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/cutoff_head_name/import',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }

    // Import CSV in DB
    public function importCounsellingHeadByExcel(){
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
                            $excelDatas[$key]['head_name'] = $sheet['head_name'];
                            $excelDatas[$key]['course_id'] = $sheet['course_id'];
                            $excelDatas[$key]['level_id'] = $sheet['level_id'];
                            $excelDatas[$key]['exams'] = ($sheet['exams']) ? implode('|',explode(',',$sheet['exams'])) : '';
                            $excelDatas[$key]['state_id'] = $sheet['state_id'];
                        }
                    }
                    $stateId = $this->master->insertBulk('tbl_counselling_head',$excelDatas);
                    $response = array('status' => 'success','message' => 'Coutoff Head Name data  imported successfully','url'=>base_url('admin/cutoff-head-name'));
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