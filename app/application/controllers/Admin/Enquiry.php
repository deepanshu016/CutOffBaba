<?php

Class Enquiry extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MasterModel','master');
    }
    
    public function index()
    {
        if ($this->is_admin_logged_in() == true) {
            
            $data['siteSettings'] = $this->master->singleRecord('tbl_site_settings',[]);
            $data['admin_session'] = $this->session->userdata('admin');
            
            $data['enquiryList'] = $this->master->getRecords('tbl_enquiries',[]);
            
            $this->load->view('admin/enquiry/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function viewEnquiry($id)
    {
        if ($this->is_admin_logged_in() == true) {
            
            $data['siteSettings'] = $this->master->singleRecord('tbl_site_settings',[]);
            $data['admin_session'] = $this->session->userdata('admin');
            $data['singleEnquiry'] = $this->master->singleRecord('tbl_enquiries',['id'=>$id]);
            $this->load->view('admin/enquiry/view',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }

    public function updateEnquiry(){

        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        if ($this->form_validation->run()) {
            $data['status'] = $this->input->post('status');
            $result = $this->master->updateRecord('tbl_enquiries',array('id'=>$this->input->post('id')),$data);
            $response = array('status' => 'success','message'=> 'Enquiry updated successfully','url'=>base_url('admin/enquiries'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'status' => form_error('status')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
}

?>