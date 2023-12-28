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

        if($_FILES['excel_file']['error'] == 0){
            $name = $_FILES['excel_file']['name'];
            $ext = explode('.', $name);
            
            $type = $_FILES['excel_file']['type'];
            $tmpName = $_FILES['excel_file']['tmp_name'];
            if($ext[1] === 'csv'){
                if(($handle = fopen($tmpName, 'r')) !== FALSE) {
                    set_time_limit(0);
                    $row = 0;
                    while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                        $col_count = count($data);
                        if ($row>0) {
                            $impdata['exam']=$data[1];
                            $impdata['exam_full_name']=$data[2];
                            $impdata['exam_short_name']=$data[3];
                            $impdata['degree_type']=explode('_',$data[4])[0];
                            $impdata['eligibility']=$data[5];
                            $impdata['exam_duration']=$data[6];
                            $impdata['maximum_marks']=$data[7];
                            $impdata['passing_marks']=$data[8];
                            $impdata['qualifying_marks']=$data[9];
                            $impdata['exam_held_in']=date('Y-m-d',strtotime($data[10]));
                            $impdata['registration_starts']=date('Y-m-d',strtotime($data[11]));
                            $impdata['registration_ends']=date('Y-m-d',strtotime($data[12]));
                            $impdata['stream']=explode('_',$data[13])[0];
                            $impdata['course_accepting']=$data[14];
                            $impdata['slug']=$this->slug($data[1]);
                            $id=$data[0];
                            if($id==""){
                                $this->db->insert('tbl_exam',$impdata);
                            }else{
                                $this->db->where('id',$id)->update('tbl_exam',$impdata);
                            }
                        }
                        $row++;
                     }
                     fclose($handle);
                    $response = array('status' => 'success','message' => 'Exams  imported successfully','url'=>base_url('admin/exams'));
                    echo json_encode($response);
                    return true;

                    

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