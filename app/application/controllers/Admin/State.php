<?php

Class State extends MY_Controller {

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
            $data['stateList'] = $this->master->getRecords('tbl_state');
            $this->load->view('admin/state/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['countryList'] = $this->master->getRecords('tbl_country');
            $this->load->view('admin/state/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editState($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['countryList'] = $this->master->getRecords('tbl_country');
            $data['singleState'] = $this->master->singleRecord('tbl_state',array('id'=>$id));
            $this->load->view('admin/state/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function file_check_state_logo($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png','image/jpg');
        if(isset($_FILES['state_logo']['name']) && $_FILES['state_logo']['name']!=""){
            $mime = get_mime_by_extension($_FILES['state_logo']['name']);
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check_state_logo', 'Please select only jpg/png file.');
                return false;
            }
        }
    }
    //Save State
    public function saveState(){
        $this->form_validation->set_rules('name', 'State Name', 'trim|required');
        $this->form_validation->set_rules('country_id', 'Country', 'trim|required');
        $this->form_validation->set_rules('state_logo', 'State Logo', 'callback_file_check_state_logo');
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/state';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            if(!empty($_FILES['state_logo']['name'])) {
                $uploadedFile = $this->uploadFile($_FILES['state_logo']['name'], 'state_logo', $config);
                if (!empty($uploadedFile['error_msg'])) {
                    $response = array('status' => 'errors', 'message' => $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['state_logo'] = $uploadedFile['file'];
            }
            $data['name'] = $this->input->post('name');
            $data['country_id'] = $this->input->post('country_id');
            $result = $this->master->insert('tbl_state',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'State added successfully','url'=>base_url('admin/state'));
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
                    'name' => form_error('name'),
                    'country_id' => form_error('country_id'),
                    'state_logo' => form_error('state_logo')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Category
    public function updateState(){
        $this->form_validation->set_rules('name', 'State Name', 'trim|required');
        $this->form_validation->set_rules('country_id', 'Country', 'trim|required');
        $this->form_validation->set_rules('state_logo', 'State Logo', 'callback_file_check_state_logo');
        if ($this->form_validation->run()) {
            if(!empty($_FILES['state_logo']['name'])) {
                $config['upload_path']  = 'assets/uploads/state';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['encrypt_name'] =  TRUE;
                $config['max_size']      = 1024;
                $uploadedFile = $this->uploadFile($_FILES['state_logo']['name'], 'state_logo', $config);
                if (!empty($uploadedFile['error_msg'])) {
                    $response = array('status' => 'errors', 'message' => $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['state_logo'] = $uploadedFile['file'];
                $this->remove_file_from_directory('assets/uploads/state',$this->input->post('old_state_logo'));
            }
            $data['name'] = $this->input->post('name');
            $data['country_id'] = $this->input->post('country_id');
            $result = $this->master->updateRecord('tbl_state',array('id'=>$this->input->post('state_id')),$data);
            $response = array('status' => 'success','message'=> 'State updated successfully','url'=>base_url('admin/state'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'country_id' => form_error('country_id'),
                    'name' => form_error('name'),
                    'state_logo' => form_error('state_logo')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteState(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $singleRecord = $this->master->singleRecord('tbl_state',array('id'=>$id));
            $result = $this->master->deleteRecord('tbl_state',array('id'=>$id));
            if($result > 0){
                $this->remove_file_from_directory('assets/uploads/state',$singleRecord['state_logo']);
                $response = array('status' => 'success','message' => 'State deleted successfully','url'=>base_url('admin/state'));
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
    public function importState(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/state/import',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    } 

    // Import CSV in DB
   
    public function importStateByExcel(){

        if($_FILES['excel_file']['error'] == 0){
            $name = $_FILES['excel_file']['name'];
            $ext = explode('.', $name);
            
            $type = $_FILES['excel_file']['type'];
            $tmpName = $_FILES['excel_file']['tmp_name'];
            if($ext[1] === 'csv' || $ext[1] === 'xlsx'){
                if(($handle = fopen($tmpName, 'r')) !== FALSE) {
                    set_time_limit(0);
                    $row = 0;
                    while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                        $col_count = count($data);
                        if ($row>0) {
                            $impdata['name']=$data[1];
                            $impdata['country_id']=$data[2];
                            $id=$data[0];
                            if($id==""){
                                $this->db->insert('tbl_state',$impdata);
                            }else{
                                $this->db->where('id',$id)->update('tbl_state',$impdata);
                            }
                        }
                        $row++;
                     }
                     fclose($handle);
                    $response = array('status' => 'success','message' => 'State imported successfully','url'=>base_url('admin/state'));
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