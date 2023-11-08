<?php

Class FeesHead extends MY_Controller {

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
            $data['feesHeadList'] = $this->master->getRecords('tbl_feeshead');
            $this->load->view('admin/feeshead/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/feeshead/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editFeesHead($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleFeesHead'] = $this->master->singleRecord('tbl_feeshead',array('id'=>$id));
            $this->load->view('admin/feeshead/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Feeshead
    public function saveFeesHead(){
        $this->form_validation->set_rules('name', 'Feeshead', 'trim|required');
        if ($this->form_validation->run()) {
            $data['name'] = $this->input->post('name');
            $data['fees_description'] = $this->input->post('fees_description');
            $result = $this->master->insert('tbl_feeshead',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Fees Head added successfully','url'=>base_url('admin/feeshead'));
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
                    'name' => form_error('name')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Feeshead
    public function updateFeesHead(){

        $this->form_validation->set_rules('name', 'Fees Head', 'trim|required');
        if ($this->form_validation->run()) {
            $data['name'] = $this->input->post('name');
            $data['fees_description'] = $this->input->post('fees_description');
            $result = $this->master->updateRecord('tbl_feeshead',array('id'=>$this->input->post('name_id')),$data);
            $response = array('status' => 'success','message'=> 'Fees Head updated successfully','url'=>base_url('admin/feeshead'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'name' => form_error('name')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteFeesHead(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_feeshead',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Fees Head deleted successfully','url'=>base_url('admin/feeshead'));
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