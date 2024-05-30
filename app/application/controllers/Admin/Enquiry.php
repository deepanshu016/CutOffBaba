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
}

?>