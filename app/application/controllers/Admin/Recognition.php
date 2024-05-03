<?php

Class Recognition extends MY_Controller {

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
            $data['recognitionList'] = $this->master->getRecords('tbl_recognition');
            $this->load->view('admin/recognition/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/recognition/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editRecognition($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleRecognition'] = $this->master->singleRecord('tbl_recognition',array('id'=>$id));
            $this->load->view('admin/recognition/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Recognition
    public function saveRecognition(){
        $this->form_validation->set_rules('recognition', 'Recognition', 'trim|required');
        if ($this->form_validation->run()) {
            $data['recognition'] = $this->input->post('recognition');
            $result = $this->master->insert('tbl_recognition',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Recognition added successfully','url'=>base_url('admin/recognition'));
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
                    'recognition' => form_error('recognition')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Recognition
    public function updateRecognition(){

        $this->form_validation->set_rules('recognition', 'Recognition', 'trim|required');
        if ($this->form_validation->run()) {
            $data['recognition'] = $this->input->post('recognition');
            $result = $this->master->updateRecord('tbl_recognition',array('id'=>$this->input->post('recognition_id')),$data);
            $response = array('status' => 'success','message'=> 'Recognition updated successfully','url'=>base_url('admin/recognition'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'recognition' => form_error('recognition')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteRecognition(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_recognition',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Recognition deleted successfully','url'=>base_url('admin/recognition'));
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
    public function importRecognition(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/recognition/import',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }

    // Import CSV in DB
    

    public function importRecognitionByExcel(){

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
                            $impdata['recognition']=$data[1];
                            $id=$data[0];
                            if($id==""){
                                $this->db->insert('tbl_recognition',$impdata);
                            }else{
                                $this->db->where('id',$id)->update('tbl_recognition',$impdata);
                            }
                        }
                        $row++;
                     }
                     fclose($handle);
                    $response = array('status' => 'success','message' => 'Recognition Data imported successfully','url'=>base_url('admin/recognition'));
                    echo json_encode($response);
                    return true;
                }else{

                    $response = array('status' => 'error','errors' => array('excel_file' => form_error('excel_file')));
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