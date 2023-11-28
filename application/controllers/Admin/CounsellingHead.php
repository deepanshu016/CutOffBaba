<?php

Class CounsellingHead extends MY_Controller {

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
            $data['counsellingHeadList'] = $this->master->getRecords('tbl_counselling_head');
            $this->load->view('admin/cutoff_head_name/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/cutoff_head_name/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editCounsellingHead($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleCounsellingHead'] = $this->master->singleRecord('tbl_counselling_head',array('id'=>$id));

            $this->load->view('admin/cutoff_head_name/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Counselling Level
    public function saveCounsellingHead(){
        $this->form_validation->set_rules('head_name', 'Head Name', 'trim|required');
        $this->form_validation->set_rules('course_id', 'Course', 'trim|required');
        $this->form_validation->set_rules('level_id', 'Level', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_rules('exam_id[]', 'Exams', 'trim|required');
        if ($this->form_validation->run()) {
            $data['head_name'] = $this->input->post('head_name');
            $data['course_id'] = $this->input->post('course_id');
            $data['level_id'] = $this->input->post('level_id');
            $data['state_id'] = $this->input->post('state');
            $data['exams'] = ($this->input->post('exam_id')) ? implode('|',$this->input->post('exam_id')) : '';
            $result = $this->master->insert('tbl_counselling_head',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Cutoff Head added successfully','url'=>base_url('admin/cutoff-head-name'));
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
                    'head_name' => form_error('head_name'),
                    'course_id' => form_error('course_id'),
                    'level_id' => form_error('level_id'),
                    'state' => form_error('state'),
                    'exam_id' => form_error('exam_id[]')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Feeshead
    public function updateCounsellingHead(){
        $this->form_validation->set_rules('head_name', 'Head Name', 'trim|required');
        $this->form_validation->set_rules('course_id', 'Course', 'trim|required');
        $this->form_validation->set_rules('level_id', 'Level', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_rules('exam_id[]', 'Exams', 'trim|required');

        if ($this->form_validation->run()) {
            $data['head_name'] = $this->input->post('head_name');
            $data['course_id'] = $this->input->post('course_id');
            $data['level_id'] = $this->input->post('level_id');
            $data['state_id'] = $this->input->post('state');
            $data['exams'] = ($this->input->post('exam_id')) ? implode('|',$this->input->post('exam_id')) : '';
            $result = $this->master->updateRecord('tbl_counselling_head',array('id'=>$this->input->post('head_id')),$data);
            $response = array('status' => 'success','message'=> 'Cutoff Head updated successfully','url'=>base_url('admin/cutoff-head-name'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'head_name' => form_error('head_name'),
                    'course_id' => form_error('course_id'),
                    'level_id' => form_error('level_id'),
                    'state' => form_error('state'),
                    'exam_id' => form_error('exam_id[]')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteCounsellingHead(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_counselling_head',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Cutoff Head deleted successfully','url'=>base_url('admin/cutoff-head-name'));
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