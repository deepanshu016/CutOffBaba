<?php

Class Visibility extends MY_Controller {

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
            $data['visibilityList'] = $this->master->getRecords('tbl_visibility');
            $this->load->view('admin/visibility/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/visibility/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editVisibility($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleVisibility'] = $this->master->singleRecord('tbl_visibility',array('id'=>$id));
            $this->load->view('admin/visibility/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Visibility
    public function saveVisibility(){
        $this->form_validation->set_rules('visibility', 'Visibility','trim|required');
        if ($this->form_validation->run()) {
            $data['visibility'] = $this->input->post('visibility');
            $result = $this->master->insert('tbl_visibility',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Visibility added successfully','url'=>base_url('admin/visibility'));
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
                    'visibility' => form_error('visibility')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Visibility
    public function updateVisibility(){

        $this->form_validation->set_rules('visibility','Visibility', 'trim|required');
        if ($this->form_validation->run()) {
            $data['visibility'] = $this->input->post('visibility');
            $result = $this->master->updateRecord('tbl_visibility',array('id'=>$this->input->post('visibility_id')),$data);
            $response = array('status' => 'success','message'=> 'Visibility updated successfully','url'=>base_url('admin/visibility'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'visibility' => form_error('visibility')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteVisibility(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_visibility',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Visibility deleted successfully','url'=>base_url('admin/visibility'));
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