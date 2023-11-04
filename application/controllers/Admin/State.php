<?php

Class State extends MY_Controller {

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
            $data['stateList'] = $this->master->getRecords('tbl_state');
            $this->load->view('admin/state/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['countryList'] = $this->master->getRecords('tbl_country');
            $this->load->view('admin/state/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editState($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['countryList'] = $this->master->getRecords('tbl_country');
            $data['singleState'] = $this->master->singleRecord('tbl_state',array('id'=>$id));
            $this->load->view('admin/state/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Country
    public function saveState(){
        $this->form_validation->set_rules('name', 'State Name', 'trim|required');
        $this->form_validation->set_rules('country_id', 'Country', 'trim|required');
        if ($this->form_validation->run()) {
            $data['name'] = $this->input->post('name');
            $data['country_id'] = $this->input->post('country_id');
            $result = $this->master->insert('tbl_state',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'State added successfully','url'=>base_url('admin/state'));
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
                    'name' => form_error('name'),
                    'country_id' => form_error('country_id')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Category
    public function updateState(){

        $this->form_validation->set_rules('name', 'State Name', 'trim|required');
        $this->form_validation->set_rules('country_id', 'Country', 'trim|required');
        if ($this->form_validation->run()) {
            $data['name'] = $this->input->post('name');
            $data['country_id'] = $this->input->post('country_id');
            $result = $this->master->updateRecord('tbl_state',array('id'=>$this->input->post('state_id')),$data);
            $response = array('status' => 'success','message'=> 'State updated successfully','url'=>base_url('admin/state'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'country_id' => form_error('country_id'),
                    'name' => form_error('name')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteState(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_state',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'State deleted successfully','url'=>base_url('admin/state'));
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