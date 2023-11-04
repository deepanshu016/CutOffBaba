<?php

Class Exams extends MY_Controller {

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
            $data['examList'] = $this->master->getRecords('tbl_exam');
            $this->load->view('admin/exams/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/exams/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editExams($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleExam'] = $this->master->singleRecord('tbl_exam',array('id'=>$id));
            $this->load->view('admin/exams/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Exams
    public function saveExams(){
        $this->form_validation->set_rules('exam', 'Exam', 'trim|required');
        if ($this->form_validation->run()) {
            $data['exam'] = $this->input->post('exam');
            $result = $this->master->insert('tbl_exam',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Exam added successfully','url'=>base_url('admin/exams'));
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
                    'exam' => form_error('exam')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Update Exams
    public function updateExams(){
        $this->form_validation->set_rules('exam', 'Exam', 'trim|required');
        if ($this->form_validation->run()) {
            $data['exam'] = $this->input->post('exam');
            $result = $this->master->updateRecord('tbl_exam',array('id'=>$this->input->post('exam_id')),$data);
            $response = array('status' => 'success','message'=> 'Exam updated successfully','url'=>base_url('admin/exams'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'exam' => form_error('exam')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Update Exams
    public function deleteExams(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_exam',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Exams deleted successfully','url'=>base_url('admin/exams'));
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