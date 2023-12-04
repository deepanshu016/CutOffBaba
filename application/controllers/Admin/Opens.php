<?php

Class Opens extends MY_Controller {

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
            $data['openList'] = $this->master->getRecords('tbl_opens');
            $this->load->view('admin/opens/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/opens/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editOpens($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleOpen'] = $this->master->singleRecord('tbl_opens',array('id'=>$id));
            $this->load->view('admin/opens/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Open
    public function saveOpens(){
        $this->form_validation->set_rules('opens', 'Text','trim|required');
        if ($this->form_validation->run()) {
            $data['opens'] = $this->input->post('opens');
            $result = $this->master->insert('tbl_opens',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Data added successfully','url'=>base_url('admin/opens'));
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
                    'opens' => form_error('opens')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Open
    public function updateOpens(){

        $this->form_validation->set_rules('opens','Text', 'trim|required');
        if ($this->form_validation->run()) {
            $data['opens'] = $this->input->post('opens');
            $result = $this->master->updateRecord('tbl_opens',array('id'=>$this->input->post('open_id')),$data);
            $response = array('status' => 'success','message'=> 'Data updated successfully','url'=>base_url('admin/opens'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'opens' => form_error('opens')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteOpens(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_opens',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Data deleted successfully','url'=>base_url('admin/opens'));
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