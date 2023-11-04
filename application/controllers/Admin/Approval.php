<?php

Class Approval extends MY_Controller {

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
            $data['approvalList'] = $this->master->getRecords('tbl_approval');
            $this->load->view('admin/approval/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/approval/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editApproval($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleApproval'] = $this->master->singleRecord('tbl_approval',array('id'=>$id));
            $this->load->view('admin/approval/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Country
    public function saveApproval(){
        $this->form_validation->set_rules('approval', 'Approval', 'trim|required');
        if ($this->form_validation->run()) {
            $data['approval'] = $this->input->post('approval');
            $result = $this->master->insert('tbl_approval',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Approval added successfully','url'=>base_url('admin/approval'));
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
                    'approval' => form_error('approval')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Category
    public function updateApproval(){

        $this->form_validation->set_rules('approval', 'Approval', 'trim|required');
        if ($this->form_validation->run()) {
            $data['approval'] = $this->input->post('approval');
            $result = $this->master->updateRecord('tbl_approval',array('id'=>$this->input->post('approval_id')),$data);
            $response = array('status' => 'success','message'=> 'Approval updated successfully','url'=>base_url('admin/approval'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'approval' => form_error('approval')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteApproval(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_approval',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Approval deleted successfully','url'=>base_url('admin/approval'));
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