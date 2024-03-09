<?php

Class Enquiry extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('User','us');
        $this->load->model('SiteSettings','site');
        $this->load->model('CourseCategory','category');
        $this->load->model('MasterModel','master');
    }

    public function submitEnquiry()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        if ($this->form_validation->run()) {
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['phone'] = $this->input->post('phone');
            $data['subject'] = $this->input->post('subject');
            $data['message'] = $this->input->post('message');
            $data['status'] = '1';
            $data['created_at'] = date('Y-m-d H:i:s');
            $result = $this->master->insert('tbl_enquiries',$data);
            if($result){
                $response = array('status' => 'success','message' => 'Enquiry submitted succesfully !!!','url'=>base_url('profile'));
            }else{
                $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
            }
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'name' => form_error('name'),
                    'email' => form_error('email'),
                    'subject' => form_error('mobile'),
                    'subject' => form_error('subject'),
                    'message' => form_error('message')
                )  
            );

        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
    }
   
}

?>