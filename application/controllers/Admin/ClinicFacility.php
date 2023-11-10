<?php

Class ClinicFacility extends MY_Controller {

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
            $data['clinicalFacilityList'] = $this->master->getRecords('tbl_clinic_facility');
            $this->load->view('admin/clinicalfacility/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/clinicalfacility/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editClinicFacility($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleClinicFacility'] = $this->master->singleRecord('tbl_clinic_facility',array('id'=>$id));
            $this->load->view('admin/clinicalfacility/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Clinic Facility
    public function saveClinicFacility(){
        $this->form_validation->set_rules('facility', 'Clinical Facility','trim|required');
        if ($this->form_validation->run()) {
            $data['facility'] = $this->input->post('facility');
            $result = $this->master->insert('tbl_clinic_facility',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Clinical Facility added successfully','url'=>base_url('admin/clinical-facility'));
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
                    'facility' => form_error('facility')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save ClinicFacility
    public function updateClinicFacility(){

        $this->form_validation->set_rules('facility','Clinical Facility', 'trim|required');
        if ($this->form_validation->run()) {
            $data['facility'] = $this->input->post('facility');
            $result = $this->master->updateRecord('tbl_clinic_facility',array('id'=>$this->input->post('facility_id')),$data);
            $response = array('status' => 'success','message'=> 'Clinical Facility updated successfully','url'=>base_url('admin/clinical-facility'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'facility' => form_error('facility')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteClinicFacility(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_clinic_facility',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Clinical Facility deleted successfully','url'=>base_url('admin/clinical-facility'));
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