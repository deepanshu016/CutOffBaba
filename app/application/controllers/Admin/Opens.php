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
                            $impdata['opens']=$data[1];
                            $id=$data[0];
                            if($id==""){
                                $this->db->insert('tbl_opens',$impdata);
                            }else{
                                $this->db->where('id',$id)->update('tbl_opens',$impdata);
                            }
                        }
                        $row++;
                     }
                     fclose($handle);
                    $response = array('status' => 'success','message' => 'Opens data  imported successfully','url'=>base_url('admin/opens'));
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