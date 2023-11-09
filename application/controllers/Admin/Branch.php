<?php

Class Branch extends MY_Controller {

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
            $data['branchList'] = $this->master->getRecords('tbl_branch');
            $this->load->view('admin/branch/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/branch/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editBranch($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleBranch'] = $this->master->singleRecord('tbl_branch',array('id'=>$id));
            $this->load->view('admin/branch/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Branch
    public function saveBranch(){
        $this->form_validation->set_rules('branch', 'Branch', 'trim|required');
        $this->form_validation->set_rules('courses[]', 'Courses', 'trim|required');
        $this->form_validation->set_rules('branch_type', 'Branch Type', 'trim|required');
        if ($this->form_validation->run()) {
            $data['branch'] = $this->input->post('branch');
            $data['courses'] = implode('|',$this->input->post('courses'));
            $data['branch_type'] = $this->input->post('branch_type');
            $result = $this->master->insert('tbl_branch',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Branch added successfully','url'=>base_url('admin/branch'));
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
                    'branch' => form_error('branch'),
                    'courses' => form_error('courses[]'),
                    'branch_type' => form_error('branch_type[]')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Update Branch
    public function updateBranch(){

        $this->form_validation->set_rules('branch', 'Branch', 'trim|required');
        $this->form_validation->set_rules('courses[]', 'Courses', 'trim|required');
        $this->form_validation->set_rules('branch_type', 'Branch Type', 'trim|required');
        if ($this->form_validation->run()) {
            $data['branch'] = $this->input->post('branch');
            $data['courses'] = implode('|',$this->input->post('courses'));
            $data['branch_type'] = $this->input->post('branch_type');
            $result = $this->master->updateRecord('tbl_branch',array('id'=>$this->input->post('branch_id')),$data);
            $response = array('status' => 'success','message'=> 'Branch updated successfully','url'=>base_url('admin/branch'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'branch' => form_error('branch'),
                    'courses' => form_error('courses[]'),
                    'branch_type' => form_error('branch_type[]')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteBranch(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_branch',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Branch deleted successfully','url'=>base_url('admin/branch'));
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