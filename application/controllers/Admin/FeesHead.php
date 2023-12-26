<?php

Class FeesHead extends MY_Controller {

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
            $data['feesHeadList'] = $this->master->getRecords('tbl_feeshead');
            $this->load->view('admin/feeshead/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/feeshead/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editFeesHead($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleFeesHead'] = $this->master->singleRecord('tbl_feeshead',array('id'=>$id));
            $this->load->view('admin/feeshead/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Feeshead
    public function saveFeesHead(){
        $this->form_validation->set_rules('fee_head_name', 'Fees Head Name', 'trim|required');
        $this->form_validation->set_rules('tution_fees', 'Tution Fees', 'trim|required');
        if ($this->form_validation->run()) {
            $data['fee_head_name'] = $this->input->post('fee_head_name');
            $data['tution_fees'] = $this->input->post('tution_fees');
            $data['hostel_fees'] = $this->input->post('hostel_fees');
            $data['misc_fees'] = $this->input->post('misc_fees');
            $data['bank_details_1'] = $this->input->post('bank_details_1');
            $data['bank_details_2'] = $this->input->post('bank_details_2');
            $data['demand_draft_name'] = $this->input->post('demand_draft_name');
            $result = $this->master->insert('tbl_feeshead',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Fees Head added successfully','url'=>base_url('admin/feeshead'));
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
                    'fee_head_name' => form_error('fee_head_name'),
                    'tution_fees' => form_error('tution_fees')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Feeshead
    public function updateFeesHead(){

        $this->form_validation->set_rules('fee_head_name', 'Fees Head Name', 'trim|required');
        $this->form_validation->set_rules('tution_fees', 'Tution Fees', 'trim|required');
        if ($this->form_validation->run()) {
            $data['fee_head_name'] = $this->input->post('fee_head_name');
            $data['tution_fees'] = $this->input->post('tution_fees');
            $data['hostel_fees'] = $this->input->post('hostel_fees');
            $data['misc_fees'] = $this->input->post('misc_fees');
            $data['bank_details_1'] = $this->input->post('bank_details_1');
            $data['bank_details_2'] = $this->input->post('bank_details_2');
            $data['demand_draft_name'] = $this->input->post('demand_draft_name');
            $result = $this->master->updateRecord('tbl_feeshead',array('id'=>$this->input->post('name_id')),$data);
            $response = array('status' => 'success','message'=> 'Fees Head updated successfully','url'=>base_url('admin/feeshead'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'fee_head_name' => form_error('fee_head_name'),
                    'tution_fees' => form_error('tution_fees')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteFeesHead(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_feeshead',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Fees Head deleted successfully','url'=>base_url('admin/feeshead'));
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
    public function importFeesHead(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/feeshead/import',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }

    // Import CSV in DB
    public function importFeesHeadByExcel(){
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
                            $impdata['fee_head_name']=$data[1];
                            $impdata['tution_fees']=$data[2];
                            $impdata['hostel_fees']=$data[3];
                            $impdata['misc_fees']=$data[4];
                            $impdata['bank_details_1']=$data[5];
                            $impdata['bank_details_2']=$data[6];
                            $impdata['demand_draft_name']=$data[7];
                            $id=$data[0];
                            if($id==""){
                                $this->db->insert('tbl_feeshead',$impdata);
                            }else{
                                $this->db->where('id',$id)->update('tbl_feeshead',$impdata);
                            }
                        }
                        $row++;
                     }
                     fclose($handle);
                    $response = array('status' => 'success','message' => 'Feeshead imported successfully','url'=>base_url('admin/feeshead'));
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