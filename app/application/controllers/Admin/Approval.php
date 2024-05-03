<?php

Class Approval extends MY_Controller {

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
            $data['approvalList'] = $this->master->getRecords('tbl_approval');
            $this->load->view('admin/approval/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/approval/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editApproval($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleApproval'] = $this->master->singleRecord('tbl_approval',array('id'=>$id));
            $this->load->view('admin/approval/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Country
    public function saveApproval(){
        $this->form_validation->set_rules('approval', 'Approval', 'trim|required');
        if ($this->form_validation->run()) {
            $data['approval'] = $this->input->post('approval');
            $result = $this->master->insert('tbl_approval',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Approval added successfully','url'=>base_url('admin/approval'));
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
                    'approval' => form_error('approval')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Category
    public function updateApproval(){

        $this->form_validation->set_rules('approval', 'Approval', 'trim|required');
        if ($this->form_validation->run()) {
            $data['approval'] = $this->input->post('approval');
            $result = $this->master->updateRecord('tbl_approval',array('id'=>$this->input->post('approval_id')),$data);
            $response = array('status' => 'success','message'=> 'Approval updated successfully','url'=>base_url('admin/approval'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'approval' => form_error('approval')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteApproval(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_approval',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Approval deleted successfully','url'=>base_url('admin/approval'));
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
    public function importApproval(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/approval/import',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }

    // Import CSV in DB
    public function importApprovalByExcel(){
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
                            $impdata['approval']=$data[1];
                            $id=$data[0];
                            if($id==""){
                                $this->db->insert('tbl_approval',$impdata);
                            }else{
                                $this->db->where('id',$id)->update('tbl_approval',$impdata);
                            }
                        }
                        $row++;
                     }
                     fclose($handle);
                    $response = array('status' => 'success','message' => 'Approval imported successfully','url'=>base_url('admin/approval'));
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