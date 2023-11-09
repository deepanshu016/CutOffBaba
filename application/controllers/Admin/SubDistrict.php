<?php

Class SubDistrict extends MY_Controller {

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
            $data['subDistrictList'] = $this->master->getRecords('tbl_sub_district');
            $this->load->view('admin/sub_district/list',$data);
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
            $this->load->view('admin/sub_district/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editSubDistrict($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['stateList'] = $this->master->getRecords('tbl_state');
            $data['singleSubDistrict'] = $this->master->singleRecord('tbl_sub_district',array('id'=>$id));

            $this->load->view('admin/sub_district/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Country
    public function saveSubDistrict(){
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('district', 'District', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_rules('sub_district', 'Sub District', 'trim|required');
        if ($this->form_validation->run()) {
            $data['district'] = $this->input->post('district');
            $data['state'] = $this->input->post('state');
            $data['country'] = $this->input->post('country');
            $data['sub_district'] = $this->input->post('sub_district');
            $result = $this->master->insert('tbl_sub_district',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Sub District added successfully','url'=>base_url('admin/sub-district'));
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
                    'district' => form_error('district'),
                    'state' => form_error('state'),
                    'country' => form_error('country'),
                    'sub_district' => form_error('sub_district')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Sub District
    public function updateSubDistrict(){

        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('district', 'District', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_rules('sub_district', 'Sub District', 'trim|required');
        if ($this->form_validation->run()) {
            $data['district'] = $this->input->post('district');
            $data['state'] = $this->input->post('state');
            $data['country'] = $this->input->post('country');
            $data['sub_district'] = $this->input->post('sub_district');
            $result = $this->master->updateRecord('tbl_sub_district',array('id'=>$this->input->post('sub_district_id')),$data);
            $response = array('status' => 'success','message'=> 'Sub District updated successfully','url'=>base_url('admin/sub-district'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'district' => form_error('district'),
                    'state' => form_error('state'),
                    'country' => form_error('country'),
                    'sub_district' => form_error('sub_district')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteSubDistrict(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_sub_district',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Sub District deleted successfully','url'=>base_url('admin/sub-district'));
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