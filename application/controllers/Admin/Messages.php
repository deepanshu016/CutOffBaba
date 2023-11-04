 <?php

Class Messages extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
        $this->load->model('SiteSettings','site');
        $this->load->model('EnquiryModel','enquiry');
    }
	
    public function contactForm(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 

            $data['contactList'] = $this->enquiry->getRecords('tbl_enquiry');
            $this->load->view('admin/contact/contact-list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function viewContactDetails(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 

            $data['contactData'] = $this->enquiry->singleRecord('tbl_enquiry',['id'=>$id]);
            $html = $this->load->view('admin/contact/view-contact-details',$data,true);
            $this->enquiry->updateRecord('tbl_enquiry',['id'=>$id],['status'=>1]);
            $response = array('status' => 'success','message' => 'Course fetched successfully','html'=>$html);
            echo json_encode($response);
            return true;
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
}

?>