<?php

Class CollegeMatrix extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MasterModel','master');
        $this->load->model('SiteSettings','site');
    }
    public function collegeSeatMatrix()
    {
        if ($this->is_admin_logged_in() == true) {
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['admin_session'] = $this->session->userdata('admin');
            $data['streamList'] = $this->master->getRecords('tbl_stream');
            $data['degreeTypeList'] = $this->master->getRecords('tbl_degree_type');
            $this->load->view('admin/college_matrix/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function getCourses()
    {
        if ($this->is_admin_logged_in() == true) {
            $stream_id = $this->input->post('stream_id');
            $degree_type_id = $this->input->post('degree_type_id');
            $coursesList = $this->master->getRecords('tbl_course',['stream'=>$stream_id,'degree_type'=>$degree_type_id]);
            $html = '';
            if(!empty($coursesList)){
                $html .= '<div class="form-group"><label>Courses</label> <select class="form-control form-select get-branches" name="course_id" id="course_ids">';
                $html .= '<option value="">Select Course</option>';

                foreach($coursesList as $course){
                    $html .= '<option value="'.$course['id'].'">'.$course['course'].'</option>';
                }
                $html .= '</select><span class="text-danger" id="course_id"></span></div>';
                $response = array('status' => 'success','message'=> 'Data fetched successfully','url'=>'','html'=>$html);
                echo json_encode($response);
                return false;
            }else{
                $response = array('status' => 'errors','message'=> 'Something went Wrong','url'=>'','html'=>'');
                echo json_encode($response);
                return false;
            }
        }else{
            $response = array('status' => 'errors','message'=> 'Something went Wrong','url'=>'','html'=>'');
            echo json_encode($response);
            return false;
        }
    }
    public function getBranches()
    {
        if ($this->is_admin_logged_in() == true) {
            $course_id = $this->input->post('course_id');
            $branchList = $this->master->getBranchesWithCourse($course_id);
            $html = '';
            if(!empty($branchList)){
                $html .= '<div class="form-group"><label>Branch</label> <select class="form-control form-select" name="branch_id" id="branch_ids">';
                $html .= '<option value="">Select Branch</option>';

                foreach($branchList as $branch){
                    $html .= '<option value="'.$branch['id'].'">'.$branch['branch'].'</option>';
                }
                $html .= '</select><span class="text-danger" id="branch_id"></span></div>';
                $response = array('status' => 'success','message'=> 'Data fetched successfully','url'=>'','html'=>$html);
                echo json_encode($response);
                return false;
            }else{
                $response = array('status' => 'errors','message'=> 'Something went Wrong','url'=>'','html'=>'');
                echo json_encode($response);
                return false;
            }
        }else{
            $response = array('status' => 'errors','message'=> 'Something went Wrong','url'=>'','html'=>'');
            echo json_encode($response);
            return false;
        }
    }
    public function getCollegesData()
    {
        if ($this->is_admin_logged_in() == true) {
            $stream_id = $this->input->post('stream_id');
            $degree_type_id = $this->input->post('degree_type_id');
            $course_id = $this->input->post('course_id');
            $branch_id = $this->input->post('branch_id');
            $data['collegeList'] = $this->master->getMinimumCollegeWithCourse();
            $data['branchList'] = $this->master->singleRecord('tbl_branch',['id'=>$branch_id]);
            $data['stream_id'] = $stream_id;
            $data['degree_type_id'] = $degree_type_id;
            $data['course_id'] = $course_id;
            $result = $this->load->view('admin/college_matrix/college_matrix_data',$data,TRUE);
            $response = array('status' => 'success','message'=> 'Colleges found successfully','html'=>$result);
            echo json_encode($response);
            return false;
        }else{
            $response = array('status' => 'errors','message'=> 'Something went Wrong','url'=>'','html'=>'');
            echo json_encode($response);
            return false;
        }
    }
    

    public function saveCollegeSeatMatrix(){
        if ($this->is_admin_logged_in() == true) {
            $json_data = file_get_contents('php://input');
            $request_data = json_decode($json_data, true);
            
            if(!empty($request_data['branch_id'])){
                foreach($request_data['branch_id'] as $key=>$branch){
                    $data[$key]['stream_id'] = $request_data['stream_id'];
                    $data[$key]['college_id'] = $request_data['college_id'];
                    $data[$key]['degree_type_id'] = $request_data['degree_type_id'];
                    $data[$key]['course_id'] = $request_data['course_id'];
                    $data[$key]['branch_id'] = $branch;
                    $data[$key]['seat'] = (isset($request_data['seats'][$key])) ? $request_data['seats'][$key] : 0;
                }
            }
            $this->master->deleteRecord('tbl_college_seat_matrix_data',['college_id'=>$request_data['college_id']]);
            $result = $this->master->insert_batch('tbl_college_seat_matrix_data',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Seat Matrix saved successfully');
                echo json_encode($response);
                return false;
            }else{
                $response = array('status' => 'errors','message'=> 'Something went Wrong','url'=>'');
                echo json_encode($response);
                return false;
            }
        }else{
            $response = array('status' => 'errors','message'=> 'Something went Wrong','url'=>'');
            echo json_encode($response);
            return false;
        }
    }

    public function importSeatMatrixPage(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['streamList'] = $this->master->getRecords('tbl_stream');
            $data['degreeTypeList'] = $this->master->getRecords('tbl_degree_type');
            $this->load->view('admin/college_matrix/import_college_seat_matrix',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function exportSeatMatrixPage(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['streamList'] = $this->master->getRecords('tbl_stream');
            $data['degreeTypeList'] = $this->master->getRecords('tbl_degree_type');
            $this->load->view('admin/college_matrix/export_college_seat_matrix',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function file_check_excel_file($str){
        $allowed_mime_type_arr = array('application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/msexcel', 'application/x-msexcel', 'application/x-ms-excel', 'application/x-excel', 'application/x-dos_ms_excel', 'application/xls', 'application/x-xls', 'application/xlsx','text/csv', 'application/excel');
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
    public function importSeatMatrixData(){
        $this->form_validation->set_rules('stream_id', 'Stream', 'trim|required');
        $this->form_validation->set_rules('degree_type_id', 'Degree Type', 'trim|required');
        $this->form_validation->set_rules('course_id', 'Course', 'trim|required');
        $this->form_validation->set_rules('branch_id', 'Branch', 'trim|required');
        if ($this->form_validation->run()) {
            $stream_id = $this->input->post('stream_id');  
            $degree_type_id = $this->input->post('degree_type_id');  
            $course_id = $this->input->post('course_id');  
            $branch_id = $this->input->post('branch_id');  
            if($_FILES['excel_file']['error'] == 0){
                $name = $_FILES['excel_file']['name'];
                $ext = explode('.', $name);
                $type = $_FILES['excel_file']['type'];
                $tmpName = $_FILES['excel_file']['tmp_name'];
                if($ext[1] === 'csv'){
                    if(($handle = fopen($tmpName, 'r')) !== FALSE) {
                        set_time_limit(0);
                        $row = 0;
                        $firstRowData = fgetcsv($handle, 1000, ',');
                        while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                            for($k=1;$k < count($firstRowData);$k++){
                                if(!empty($data)){
                                    $firstRowData[$k];
                                    $brid=explode("-",$firstRowData[$k]);
                                    //print_r($brid);
                                    $col_count = count($data);
                                    $impdata['college_id']=$data[0];
                                    $impdata['stream_id']=$stream_id;
                                    $impdata['degree_type_id']=$degree_type_id;
                                    $impdata['course_id']=$course_id;
                                    $impdata['branch_id']=$brid[0];
                                    $impdata['seat']=$data[$k];
                                    $this->master->deleteRecord('tbl_college_seat_matrix_data',['college_id'=>$data[0],'stream_id'=>$stream_id,'degree_type_id'=>$degree_type_id,'course_id'=>$course_id,'branch_id'=>$brid[0]]);
                                    //echo $this->db->last_query();
                                    $this->master->insert('tbl_college_seat_matrix_data',$impdata);
                                    //echo $this->db->last_query();
                                }
                                // }
                            }
                            $row++;
                            // $this->master->insert('tbl_college_seat_matrix_data',$impdata);
                        }
                        fclose($handle);
                        $response = array('status' => 'success','message' => 'College Seats imported successfully','url'=>base_url('admin/import-college-seat-matrix'));
                        echo json_encode($response);
                        return true;
                    }else{

                        $response = array( 'status' => 'error','errors' => array('excel_file' => form_error('excel_file')));
                        echo json_encode($response);
                        return false;
                    }
                }else{
                    $response = array('status' => 'error','errors' => array('excel_file' => form_error('excel_file')));
                    echo json_encode($response);
                    return false;

                }
            }else{
                $response = array( 'status' => 'error','errors' => array('excel_file' => form_error('excel_file')));
                echo json_encode($response);
                return false;
            }
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'stream_id' => form_error('stream_id'),
                    'degree_type_id' => form_error('degree_type_id'),
                    'course_id' => form_error('course_id'),
                    'branch_id' => form_error('branch_id'),
                    'excel_file' => form_error('excel_file')
                )
            );
            echo json_encode($response);
            return false;
        }
    }  


    public function exportSeatMatrixData($stream_id=null,$degree_type_id=null,$course_id=null,$branch_id=null){
        
        require 'vendor/autoload.php';
		$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
        $collegeList = $this->master->getMinimumCollegeWithCourse();
        $branchList = $this->master->getBranchesWithid($branch_id);
        $collegeListssss = [];
        $sheet->setCellValue('A1', 'College ID');
        $columns = range('A', 'Z');
        if(!empty($branchList)){
            foreach($branchList as $key=>$branch){
                if ($key>=25) {
                    $sheet->setCellValue("A".$columns[$key-25].'1', $branch['id']."-".$branch['branch']);
                }else{
                    $sheet->setCellValue($columns[$key+1].'1', $branch['id']."-".$branch['branch']);
                }
                
            }
        }        
        if(!empty($collegeList)){
            $row = 2;
            foreach($collegeList as $key=>$college){
                $sheet->setCellValue('A'. $row, $college['college_id']);
                    $SeatMatrixData = $this->db->select('*')->from('tbl_college_seat_matrix_data')->where(['college_id'=>$college['college_id'],'stream_id'=>$stream_id,'degree_type_id'=>$degree_type_id,'course_id'=>$course_id,'branch_id'=>$branch_id])->get()->row_array();
                    if(!empty($SeatMatrixData)){
                        $sheet->setCellValue($columns[1].$row, $SeatMatrixData['seats']);
                    }else{
                        $sheet->setCellValue($columns[1].$row, 0);
                    }
                $row++;
            }
        }
        $filename = 'Seat_Matrix.csv';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }


   
}

?>