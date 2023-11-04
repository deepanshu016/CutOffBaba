<?php

Class Course extends MY_Controller {

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
            $data['courseList'] = $this->master->getRecords('tbl_course');
            $this->load->view('admin/course/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/course/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editCourse($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleCourse'] = $this->master->singleRecord('tbl_course',array('id'=>$id));
            $this->load->view('admin/course/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Course
    public function saveCourse(){
        $this->form_validation->set_rules('course', 'Course', 'trim|required');
        if ($this->form_validation->run()) {
            $data['course'] = $this->input->post('course');
            $result = $this->master->insert('tbl_course',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Course added successfully','url'=>base_url('admin/course'));
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
                    'course' => form_error('course')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Update Course
    public function updateCourse(){

        $this->form_validation->set_rules('course', 'Course', 'trim|required');
        if ($this->form_validation->run()) {
            $data['course'] = $this->input->post('course');
            $result = $this->master->updateRecord('tbl_course',array('id'=>$this->input->post('course_id')),$data);
            $response = array('status' => 'success','message'=> 'Course updated successfully','url'=>base_url('admin/course'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'course' => form_error('course')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteCourse(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_course',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Course deleted successfully','url'=>base_url('admin/course'));
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