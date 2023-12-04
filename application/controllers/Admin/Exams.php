<?php

Class Exams extends MY_Controller {

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
            $data['examList'] = $this->master->getRecords('tbl_exam');
            $this->load->view('admin/exams/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/exams/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editExams($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleExam'] = $this->master->singleRecord('tbl_exam',array('id'=>$id));
            $this->load->view('admin/exams/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Exams
    public function saveExams(){
        $this->form_validation->set_rules('exam', 'Exam', 'trim|required');
        $this->form_validation->set_rules('exam_full_name', 'Exam Full Name', 'trim|required');
        $this->form_validation->set_rules('exam_short_name', 'Exam Short Name', 'trim|required');
        $this->form_validation->set_rules('degree_type', 'Degree Type', 'trim|required');
        $this->form_validation->set_rules('eligibility', 'Eligibility', 'trim|required');
        $this->form_validation->set_rules('exam_duration', 'Exam Duration', 'trim|required');
        $this->form_validation->set_rules('maximum_marks', 'Maximum Marks', 'trim|required');
        $this->form_validation->set_rules('passing_marks', 'Passing Marks', 'trim|required');
        $this->form_validation->set_rules('qualifying_marks', 'Qualifying Marks', 'trim|required');
        $this->form_validation->set_rules('exam_held_in[]', 'Exam helds in', 'trim|required');
        $this->form_validation->set_rules('registration_starts','Registration Starts', 'trim|required');
        $this->form_validation->set_rules('registration_ends','Registration Ends', 'trim|required');
        $this->form_validation->set_rules('stream[]','Streams', 'trim|required');
        $this->form_validation->set_rules('course_accepting[]','Course Accepting', 'trim|required');
        if ($this->form_validation->run()) {
            $data['exam'] = $this->input->post('exam');
            $data['slug'] = $this->slug($this->input->post('exam'));
            $data['exam_full_name'] = $this->input->post('exam_full_name');
            $data['exam_short_name'] = $this->input->post('exam_short_name');
            $data['degree_type'] = $this->input->post('degree_type');
            $data['eligibility'] = $this->input->post('eligibility');
            $data['exam_duration'] = $this->input->post('exam_duration');
            $data['maximum_marks'] = $this->input->post('maximum_marks');
            $data['passing_marks'] = $this->input->post('passing_marks');
            $data['qualifying_marks'] = $this->input->post('qualifying_marks');
            $data['registration_starts'] = date('Y-m-d H:i:s',strtotime($this->input->post('registration_starts')));
            $data['registration_ends'] = date('Y-m-d H:i:s',strtotime($this->input->post('registration_ends')));
            $data['exam_held_in'] = implode('|',$this->input->post('exam_held_in'));
            $data['stream'] = implode('|',$this->input->post('stream'));
            $data['course_accepting'] = implode('|',$this->input->post('course_accepting'));
            $result = $this->master->insert('tbl_exam',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Exam added successfully','url'=>base_url('admin/exams'));
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
                    'exam' => form_error('exam'),
                    'exam_full_name' => form_error('exam_full_name'),
                    'exam_short_name' => form_error('exam_short_name'),
                    'degree_type' => form_error('degree_type'),
                    'eligibility' => form_error('eligibility'),
                    'exam_duration' => form_error('exam_duration'),
                    'maximum_marks' => form_error('maximum_marks'),
                    'passing_marks' => form_error('passing_marks'),
                    'qualifying_marks' => form_error('qualifying_marks'),
                    'exam_held_in' => form_error('exam_held_in[]'),
                    'registration_starts' => form_error('registration_starts'),
                    'registration_ends' => form_error('registration_ends'),
                    'stream' => form_error('stream[]'),
                    'course_accepting' => form_error('course_accepting[]'),
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Update Exams
    public function updateExams(){
        $this->form_validation->set_rules('exam', 'Exam', 'trim|required');
        $this->form_validation->set_rules('exam_full_name', 'Exam Full Name', 'trim|required');
        $this->form_validation->set_rules('exam_short_name', 'Exam Short Name', 'trim|required');
        $this->form_validation->set_rules('degree_type', 'Degree Type', 'trim|required');
        $this->form_validation->set_rules('eligibility', 'Eligibility', 'trim|required');
        $this->form_validation->set_rules('exam_duration', 'Exam Duration', 'trim|required');
        $this->form_validation->set_rules('maximum_marks', 'Maximum Marks', 'trim|required');
        $this->form_validation->set_rules('passing_marks', 'Passing Marks', 'trim|required');
        $this->form_validation->set_rules('qualifying_marks', 'Qualifying Marks', 'trim|required');
        $this->form_validation->set_rules('exam_held_in[]', 'Exam helds in', 'trim|required');
        $this->form_validation->set_rules('registration_starts','Registration Starts', 'trim|required');
        $this->form_validation->set_rules('registration_ends','Registration Ends', 'trim|required');
        $this->form_validation->set_rules('stream[]','Streams', 'trim|required');
        $this->form_validation->set_rules('course_accepting[]','Course Accepting', 'trim|required');
        if ($this->form_validation->run()) {
            $data['exam'] = $this->input->post('exam');
            $data['slug'] = $this->slug($this->input->post('exam'));
            $data['exam_full_name'] = $this->input->post('exam_full_name');
            $data['exam_short_name'] = $this->input->post('exam_short_name');
            $data['degree_type'] = $this->input->post('degree_type');
            $data['eligibility'] = $this->input->post('eligibility');
            $data['exam_duration'] = $this->input->post('exam_duration');
            $data['maximum_marks'] = $this->input->post('maximum_marks');
            $data['passing_marks'] = $this->input->post('passing_marks');
            $data['qualifying_marks'] = $this->input->post('qualifying_marks');
            $data['registration_starts'] = date('Y-m-d H:i:s',strtotime($this->input->post('registration_starts')));
            $data['registration_ends'] = date('Y-m-d H:i:s',strtotime($this->input->post('registration_ends')));
            $data['exam_held_in'] = implode('|',$this->input->post('exam_held_in'));
            $data['stream'] = implode('|',$this->input->post('stream'));
            $data['course_accepting'] = implode('|',$this->input->post('course_accepting'));
            $result = $this->master->updateRecord('tbl_exam',array('id'=>$this->input->post('exam_id')),$data);
            $response = array('status' => 'success','message'=> 'Exam updated successfully','url'=>base_url('admin/exams'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'exam' => form_error('exam'),
                    'exam_full_name' => form_error('exam_full_name'),
                    'exam_short_name' => form_error('exam_short_name'),
                    'degree_type' => form_error('degree_type'),
                    'eligibility' => form_error('eligibility'),
                    'exam_duration' => form_error('exam_duration'),
                    'maximum_marks' => form_error('maximum_marks'),
                    'passing_marks' => form_error('passing_marks'),
                    'qualifying_marks' => form_error('qualifying_marks'),
                    'exam_held_in' => form_error('exam_held_in[]'),
                    'registration_starts' => form_error('registration_starts'),
                    'registration_ends' => form_error('registration_ends'),
                    'stream' => form_error('stream[]'),
                    'course_accepting' => form_error('course_accepting[]'),
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Update Exams
    public function deleteExams(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_exam',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Exams deleted successfully','url'=>base_url('admin/exams'));
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
    public function importExams(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/exams/import',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }

    // Import CSV in DB
    public function importExamsByExcel(){
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
                            $excelDatas[$key]['exam'] = $sheet['exam'];
                            $excelDatas[$key]['slug'] = $this->slug($sheet['exam']);
                            $excelDatas[$key]['exam_full_name'] = $sheet['exam_full_name'];
                            $excelDatas[$key]['exam_short_name'] = $sheet['exam_short_name'];
                            $excelDatas[$key]['degree_type'] = $sheet['degree_type_id'];
                            $excelDatas[$key]['eligibility'] = $sheet['eligibility'];
                            $excelDatas[$key]['exam_duration'] = $sheet['exam_duration'];
                            $excelDatas[$key]['maximum_marks'] = $sheet['maximum_marks'];
                            $excelDatas[$key]['passing_marks'] = $sheet['passing_marks'];
                            $excelDatas[$key]['qualifying_marks'] = $sheet['qualifying_marks'];
                            $excelDatas[$key]['exam_held_in'] = date('Y-m-d',strtotime($sheet['exam_held_in']));
                            $excelDatas[$key]['registration_starts'] = date('Y-m-d',strtotime($sheet['registration_starts']));
                            $excelDatas[$key]['registration_ends'] = date('Y-m-d',strtotime($sheet['registration_ends']));
                            $excelDatas[$key]['stream'] = $sheet['stream'];
                            $excelDatas[$key]['course_accepting'] = ($sheet['course_accepting']) ? implode('|',explode(',',$sheet['course_accepting'])) : '';
                        }
                    }
                    $result = $this->master->insertBulk('tbl_exam',$excelDatas);
                    $response = array('status' => 'success','message' => 'Exam status imported successfully','url'=>base_url('admin/exams'));
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