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
        $this->form_validation->set_rules('college[]', 'Colleges', 'trim|required');
        if ($this->form_validation->run()) {
            $data['head_name'] = $this->input->post('head_name');
            $data['course_id'] = $this->input->post('course_id');
            $data['level_id'] = $this->input->post('level_id');
            $data['state_id'] = $this->input->post('state');
            $data['college'] = ($this->input->post('college')) ? implode('|',$this->input->post('college')) : '';
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
                    'college' => form_error('college[]'),
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
        $this->form_validation->set_rules('college[]', 'Colleges', 'trim|required');
        if ($this->form_validation->run()) {
            $data['head_name'] = $this->input->post('head_name');
            $data['course_id'] = $this->input->post('course_id');
            $data['level_id'] = $this->input->post('level_id');
            $data['state_id'] = $this->input->post('state');
            $data['exams'] = ($this->input->post('exam_id')) ? implode('|',$this->input->post('exam_id')) : '';
            $data['college'] = ($this->input->post('college')) ? implode('|',$this->input->post('college')) : '';
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
                    'college' => form_error('college[]'),
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
                            $impdata['head_name']=$data[1];
                            $impdata['course_id']=$data[2];
                            $impdata['level_id']=$data[3];
                            $impdata['exams']=$data[4];
                            $impdata['state_id']=$data[5];
                            $impdata['college']=$data[6];
                            $id=$data[0];
                            if($id==""){
                                $this->db->insert('tbl_counselling_head',$impdata);
                            }else{
                                $this->db->where('id',$id)->update('tbl_counselling_head',$impdata);
                            }
                        }
                        $row++;
                     }
                     fclose($handle);
                    $response = array('status' => 'success','message' => 'Counselling Head imported successfully','url'=>base_url('admin/cutoff-head-name'));
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