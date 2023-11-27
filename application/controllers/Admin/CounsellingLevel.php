<?php

Class CounsellingLevel extends MY_Controller {

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
            $data['counsellingLevelList'] = $this->master->getRecords('tbl_counselling_level');
            $this->load->view('admin/counselling_level/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/counselling_level/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editCounsellingLevel($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleCounsellingLevel'] = $this->master->singleRecord('tbl_counselling_level',array('id'=>$id));
            $this->load->view('admin/counselling_level/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Counselling Level
    public function saveCounsellingLevel(){
        $this->form_validation->set_rules('level', 'Level Name', 'trim|required');
        if ($this->form_validation->run()) {
            $data['level'] = $this->input->post('level');
            $result = $this->master->insert('tbl_counselling_level',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Counselling Level added successfully','url'=>base_url('admin/counselling-level'));
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
                    'level' => form_error('level')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Feeshead
    public function updateCounsellingLevel(){
        $this->form_validation->set_rules('level', 'Level Name', 'trim|required');
        if ($this->form_validation->run()) {
            $data['level'] = $this->input->post('level');
            $result = $this->master->updateRecord('tbl_counselling_level',array('id'=>$this->input->post('level_id')),$data);
            $response = array('status' => 'success','message'=> 'Counselling Level updated successfully','url'=>base_url('admin/counselling-level'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'level' => form_error('level')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteCounsellingLevel(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_counselling_level',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Counselling Level deleted successfully','url'=>base_url('admin/counselling-level'));
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