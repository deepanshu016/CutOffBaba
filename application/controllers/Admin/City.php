<?php

Class City extends MY_Controller {

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
            $data['cityList'] = $this->master->getRecords('tbl_city');
            $this->load->view('admin/city/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['stateList'] = $this->master->getRecords('tbl_state');
            $this->load->view('admin/city/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editCity($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['stateList'] = $this->master->getRecords('tbl_state');
            $data['singleCity'] = $this->master->singleRecord('tbl_city',array('id'=>$id));
            $this->load->view('admin/city/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Country
    public function saveCity(){
        $this->form_validation->set_rules('city', 'City Name', 'trim|required');
        $this->form_validation->set_rules('state_id', 'State', 'trim|required');
        if ($this->form_validation->run()) {
            $data['city'] = $this->input->post('city');
            $data['state_id'] = $this->input->post('state_id');
            $result = $this->master->insert('tbl_city',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'City added successfully','url'=>base_url('admin/city'));
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
                    'city' => form_error('city'),
                    'state_id' => form_error('state_id')
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
            $data['city'] = $this->input->post('city');
            $data['state_id'] = $this->input->post('state_id');
            $result = $this->master->updateRecord('tbl_city',array('id'=>$this->input->post('city_id')),$data);
            $response = array('status' => 'success','message'=> 'City updated successfully','url'=>base_url('admin/city'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'city' => form_error('city'),
                    'state_id' => form_error('state_id')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteCity(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_city',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'City deleted successfully','url'=>base_url('admin/city'));
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