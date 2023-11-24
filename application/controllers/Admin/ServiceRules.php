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
}

?>