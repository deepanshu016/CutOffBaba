<?php

Class ServiceRules extends MY_Controller {

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
            $data['serviceRulesList'] = $this->master->getRecords('tbl_service_bond_rules');
            $this->load->view('admin/servicerules/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/servicerules/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editServiceRule($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleServiceRule'] = $this->master->singleRecord('tbl_service_bond_rules',array('id'=>$id));
            $this->load->view('admin/servicerules/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Feeshead
    public function saveServiceRule(){
        $this->form_validation->set_rules('service_bond', 'Service Rule  Name', 'trim|required');
        $this->form_validation->set_rules('seat_indentity_charges', 'Seat Indentity Charges', 'trim|required|numeric');
        $this->form_validation->set_rules('upgradation_processing_fees', 'Upgradation Processing Fees', 'trim|required|numeric');
        if ($this->form_validation->run()) {
            $data['service_bond'] = $this->input->post('service_bond');
            $data['seat_indentity_charges'] = $this->input->post('seat_indentity_charges');
            $data['upgradation_processing_fees'] = $this->input->post('upgradation_processing_fees');
            $result = $this->master->insert('tbl_service_bond_rules',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Service Rule added successfully','url'=>base_url('admin/service-rules'));
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
                    'service_bond' => form_error('service_bond'),
                    'seat_indentity_charges' => form_error('seat_indentity_charges'),
                    'upgradation_processing_fees' => form_error('upgradation_processing_fees')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Feeshead
    public function updateServiceRule(){
        $this->form_validation->set_rules('service_bond', 'Service Rule  Name', 'trim|required');
        $this->form_validation->set_rules('seat_indentity_charges', 'Seat Indentity Charges', 'trim|required');
        $this->form_validation->set_rules('upgradation_processing_fees', 'Upgrading Processing Fees', 'trim|required');
        if ($this->form_validation->run()) {
            $data['service_bond'] = $this->input->post('service_bond');
            $data['seat_indentity_charges'] = $this->input->post('seat_indentity_charges');
            $data['upgradation_processing_fees'] = $this->input->post('upgradation_processing_fees');
            $result = $this->master->updateRecord('tbl_service_bond_rules',array('id'=>$this->input->post('service_id')),$data);
            $response = array('status' => 'success','message'=> 'Service Rule  updated successfully','url'=>base_url('admin/service-rules'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'service_bond' => form_error('service_bond'),
                    'seat_indentity_charges' => form_error('seat_indentity_charges'),
                    'upgradation_processing_fees' => form_error('upgradation_processing_fees')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteServiceRule(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_service_bond_rules',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Service Rule  deleted successfully','url'=>base_url('admin/service-rules'));
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
    public function importServiceRules(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/servicerules/import',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }

    // Import CSV in DB
    public function importServiceRulesByExcel(){
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
                            $impdata['service_bond']=$data[1];
                            $impdata['seat_indentity_charges']=$data[2];
                            $impdata['upgradation_processing_fees']=$data[3];
                            $id=$data[0];
                            if($id==""){
                                $this->db->insert('tbl_service_bond_rules',$impdata);
                            }else{
                                $this->db->where('id',$id)->update('tbl_service_bond_rules',$impdata);
                            }
                        }
                        $row++;
                     }
                     fclose($handle);
                    $response = array('status' => 'success','message' => 'Service Bond Rules imported successfully','url'=>base_url('admin/service-rules'));
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