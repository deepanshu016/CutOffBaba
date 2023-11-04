<?php

Class Country extends MY_Controller {

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
            $data['countryList'] = $this->master->getRecords('tbl_country');
            $this->load->view('admin/country/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/country/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editCountry($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleCountry'] = $this->master->singleRecord('tbl_country',array('id'=>$id));
            $this->load->view('admin/country/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Country
    public function saveCountry(){
        $this->form_validation->set_rules('name', 'Country Name', 'trim|required|is_unique[tbl_country.countryCode]');
        $this->form_validation->set_rules('country_code', 'Country Code', 'trim|required');
        if ($this->form_validation->run()) {
            $data['name'] = $this->input->post('name');
            $data['countryCode'] = $this->input->post('country_code');
            $result = $this->master->insert('tbl_country',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Country added successfully','url'=>base_url('admin/country'));
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
                    'country_code' => form_error('country_code')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Category
    public function updateCountry(){

        $this->form_validation->set_rules('name', 'Country Name', 'trim|required');
        $this->form_validation->set_rules('country_code', 'Country Code', 'trim|required');
        if ($this->form_validation->run()) {
            $data['name'] = $this->input->post('name');
            $data['countryCode'] = $this->input->post('country_code');
            $result = $this->master->updateRecord('tbl_country',array('id'=>$this->input->post('country_id')),$data);
            $response = array('status' => 'success','message'=> 'Country updated successfully','url'=>base_url('admin/country'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'country_code' => form_error('country_code'),
                    'name' => form_error('name')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteCountry(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_country',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Country deleted successfully','url'=>base_url('admin/country'));
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