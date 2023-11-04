<?php

Class Stream extends MY_Controller {

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
            $data['streamList'] = $this->master->getRecords('tbl_stream');
            $this->load->view('admin/stream/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/stream/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editStream($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleStream'] = $this->master->singleRecord('tbl_stream',array('id'=>$id));
            $this->load->view('admin/stream/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Stream
    public function saveStream(){
        $this->form_validation->set_rules('stream', 'Stream', 'trim|required');
        if ($this->form_validation->run()) {
            $data['stream'] = $this->input->post('stream');
            $result = $this->master->insert('tbl_stream',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Stream added successfully','url'=>base_url('admin/stream'));
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
                    'stream' => form_error('stream')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Stream
    public function updateStream(){

        $this->form_validation->set_rules('stream', 'Stream', 'trim|required');
        if ($this->form_validation->run()) {
            $data['stream'] = $this->input->post('stream');
            $result = $this->master->updateRecord('tbl_stream',array('id'=>$this->input->post('stream_id')),$data);
            $response = array('status' => 'success','message'=> 'Stream updated successfully','url'=>base_url('admin/stream'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'stream' => form_error('stream')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteStream(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_stream',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Stream deleted successfully','url'=>base_url('admin/stream'));
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