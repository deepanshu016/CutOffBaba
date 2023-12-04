<?php

Class Course extends MY_Controller {

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
            $data['courseList'] = $this->master->getRecords('tbl_course');
            $this->load->view('admin/course/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/course/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editCourse($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleCourse'] = $this->master->singleRecord('tbl_course',array('id'=>$id));
            $this->load->view('admin/course/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }

    public function file_check_course_icon($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['course_icon']['name']);
        if(isset($_FILES['course_icon']['name']) && $_FILES['course_icon']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check_course_icon', 'Please select only jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check_course_icon', 'Please choose a file to upload.');
            return false;
        }
    }
    //Save Course
    public function saveCourse(){
        $this->form_validation->set_rules('course', 'Course', 'trim|required');
        $this->form_validation->set_rules('course_full_name', 'Course Full Name', 'trim|required');
        $this->form_validation->set_rules('course_icon', 'Course Icon', 'callback_file_check_course_icon');
        $this->form_validation->set_rules('stream', 'Stream', 'trim|required');
        $this->form_validation->set_rules('degree_type', 'Degree Type', 'trim|required');
        $this->form_validation->set_rules('course_duration', 'Course Duration', 'trim|required');
        $this->form_validation->set_rules('exam[]', 'Exam', 'trim|required');
        $this->form_validation->set_rules('course_eligibility', 'Course Eligibility', 'trim|required');
        $this->form_validation->set_rules('branch_types', 'Branch Type', 'trim|required');
        $this->form_validation->set_rules('college[]', 'Colleges', 'trim|required');
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/course';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            if(!empty($_FILES['course_icon']['name'])) {
                $uploadedFile = $this->uploadFile($_FILES['course_icon']['name'], 'course_icon', $config);

                if (!empty($uploadedFile['error_msg'])) {
                    $response = array('status' => 'errors', 'message' => $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['course_icon'] = $uploadedFile['file'];
            }
            $data['course'] = $this->input->post('course');
            $data['course_full_name'] = $this->input->post('course_full_name');
            $data['course_short_name'] = $this->input->post('course_short_name');
            $data['stream'] = $this->input->post('stream');
            $data['degree_type'] = $this->input->post('degree_type');
            $data['course_duration'] = $this->input->post('course_duration');
            $data['exam'] = ($this->input->post('exam')) ? implode('|',$this->input->post('exam')) : '';
            $data['course_eligibility'] = $this->input->post('course_eligibility');
            $data['course_opportunity'] = $this->input->post('course_opportunity');
            $data['expected_salary'] = $this->input->post('expected_salary');
            $data['course_fees'] = $this->input->post('course_fees');
            $data['branch_type'] = $this->input->post('branch_types');
            $data['counselling_authority'] = $this->input->post('counselling_authority');
            $data['college'] = ($this->input->post('college')) ? implode('|',$this->input->post('college')) : '';
            $result = $this->master->insert('tbl_course',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Course added successfully','url'=>base_url('admin/course'));
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
                    'course' => form_error('course'),
                    'course_full_name' => form_error('course_full_name'),
                    'course_icon' => form_error('course_icon'),
                    'stream' => form_error('stream'),
                    'degree_type' => form_error('degree_type'),
                    'course_duration' => form_error('course_duration'),
                    'exam' => form_error('exam[]'),
                    'college' => form_error('college[]'),
                    'branch_types' => form_error('branch_types')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Update Course
    public function updateCourse(){
        $this->form_validation->set_rules('course', 'Course', 'trim|required');
        $this->form_validation->set_rules('course_full_name', 'Course Full Name', 'trim|required');
        if(!$this->input->post('course_id')) {
            $this->form_validation->set_rules('course_icon', 'Course Icon', 'callback_file_check_course_icon');
        }
        $this->form_validation->set_rules('stream', 'Stream', 'trim|required');
        $this->form_validation->set_rules('degree_type', 'Degree Type', 'trim|required');
        $this->form_validation->set_rules('course_duration', 'Course Duration', 'trim|required');
        $this->form_validation->set_rules('exam[]', 'Exam', 'trim|required');
        $this->form_validation->set_rules('course_eligibility', 'Course Eligibility', 'trim|required');
        $this->form_validation->set_rules('branch_types', 'Branch Type', 'trim|required');
        $this->form_validation->set_rules('college[]', 'Colleges', 'trim|required');
        if ($this->form_validation->run()) {
            if(!empty($_FILES['course_icon']['name'])) {
                $config['upload_path']  = 'assets/uploads/course';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['encrypt_name'] =  TRUE;
                $config['max_size']      = 1024;
                $uploadedFile = $this->uploadFile($_FILES['course_icon']['name'], 'course_icon', $config);
                if (!empty($uploadedFile['error_msg'])) {
                    $response = array('status' => 'errors', 'message' => $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['course_icon'] = $uploadedFile['file'];
                $this->remove_file_from_directory('assets/uploads/gallery_media/video',$this->input->post('old_media'));
            }
            $data['course'] = $this->input->post('course');
            $data['course_full_name'] = $this->input->post('course_full_name');
            $data['course_short_name'] = $this->input->post('course_short_name');
            $data['stream'] = $this->input->post('stream');
            $data['degree_type'] = $this->input->post('degree_type');
            $data['course_duration'] = $this->input->post('course_duration');
            $data['exam'] = ($this->input->post('exam')) ? implode('|',$this->input->post('exam')) : '';
            $data['course_eligibility'] = $this->input->post('course_eligibility');
            $data['course_opportunity'] = $this->input->post('course_opportunity');
            $data['expected_salary'] = $this->input->post('expected_salary');
            $data['course_fees'] = $this->input->post('course_fees');
            $data['branch_type'] = $this->input->post('branch_types');
            $data['counselling_authority'] = $this->input->post('counselling_authority');
            $data['college'] = ($this->input->post('college')) ? implode('|',$this->input->post('college')) : '';
            $result = $this->master->updateRecord('tbl_course',array('id'=>$this->input->post('course_id')),$data);
            $response = array('status' => 'success','message'=> 'Course updated successfully','url'=>base_url('admin/course'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'course' => form_error('course')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteCourse(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_course',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Course deleted successfully','url'=>base_url('admin/course'));
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
    public function importCourse(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/course/import',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }

    // Import CSV in DB
    public function importCourseByExcel(){
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
                            $excelDatas[$key]['course'] = $sheet['course'];
                            $excelDatas[$key]['course_full_name'] = $sheet['course_full_name'];
                            $excelDatas[$key]['course_short_name'] = $sheet['course_short_name'];
                            $excelDatas[$key]['course_icon'] = $sheet['course_icon'];
                            $excelDatas[$key]['stream'] = $sheet['stream_id'];
                            $excelDatas[$key]['degree_type'] = $sheet['degree_type_id'];
                            $excelDatas[$key]['course_duration'] = $sheet['course_duration'];
                            $excelDatas[$key]['exam'] = ($sheet['exam_id']) ? implode('|',explode(',',$sheet['exam_id'])) : '';
                            $excelDatas[$key]['course_eligibility'] = $sheet['course_eligibility'];
                            $excelDatas[$key]['course_opportunity'] = $sheet['course_opportunity'];
                            $excelDatas[$key]['expected_salary'] = $sheet['expected_salary'];
                            $excelDatas[$key]['course_fees'] = $sheet['course_fees'];
                            $excelDatas[$key]['counselling_authority'] = $sheet['counselling_authority'];
                            $excelDatas[$key]['college'] = ($sheet['college_id']) ? implode('|',explode(',',$sheet['college_id'])) : '';
                            $excelDatas[$key]['branch_type'] = $sheet['branch_type'];
                        }
                    }
                    $result = $this->master->insertBulk('tbl_course',$excelDatas);
                    $response = array('status' => 'success','message' => 'Course data imported successfully','url'=>base_url('admin/course'));
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