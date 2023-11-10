<?php

Class ClinicDetails extends MY_Controller {

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
            $data['clinicdetailsList'] = $this->master->getRecords('tbl_clinic_details');
            $this->load->view('admin/clinicdetails/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/clinicdetails/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editClinicDetails($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleClinicDetails'] = $this->master->singleRecord('tbl_clinic_details',array('id'=>$id));
            $this->load->view('admin/clinicdetails/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save ClinicDetails
    public function saveClinicDetails(){
        $this->form_validation->set_rules('details', 'Clinic Details','trim|required');
        if ($this->form_validation->run()) {
            $data['details'] = $this->input->post('details');
            $result = $this->master->insert('tbl_clinic_details',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Clinic Details added successfully','url'=>base_url('admin/clinicdetails'));
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
                    'details' => form_error('details')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save ClinicDetails
    public function updateClinicDetails(){

        $this->form_validation->set_rules('details','Clinic Details', 'trim|required');
        if ($this->form_validation->run()) {
            $data['details'] = $this->input->post('details');
            $result = $this->master->updateRecord('tbl_clinic_details',array('id'=>$this->input->post('details_id')),$data);
            $response = array('status' => 'success','message'=> 'Clinic Details updated successfully','url'=>base_url('admin/clinicdetails'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'details' => form_error('details')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteClinicDetails(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_clinic_details',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Clinic Details deleted successfully','url'=>base_url('admin/clinicdetails'));
            }else{
                $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
            }
        }else{
            $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
}

?>