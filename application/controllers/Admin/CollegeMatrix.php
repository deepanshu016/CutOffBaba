<?php

Class CollegeMatrix extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MasterModel','master');
        $this->load->model('SiteSettings','site');
    }
    public function collegeSeatMatrix()
    {
        if ($this->is_admin_logged_in() == true) {
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['admin_session'] = $this->session->userdata('admin');
            $data['streamList'] = $this->master->getRecords('tbl_stream');
            $data['degreeTypeList'] = $this->master->getRecords('tbl_degree_type');
            $this->load->view('admin/college_matrix/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function getCourses()
    {
        if ($this->is_admin_logged_in() == true) {
            $stream_id = $this->input->post('stream_id');
            $degree_type_id = $this->input->post('degree_type_id');
            $coursesList = $this->master->getRecords('tbl_course',['stream'=>$stream_id,'degree_type'=>$degree_type_id]);
            $html = '';
            if(!empty($coursesList)){
                $html .= '<div class="form-group"><label>Courses</label> <select class="form-control form-select" name="course_id" id="course_ids">';
                $html .= '<option value="">Select Course</option>';
                foreach($coursesList as $course){
                    $html .= '<option value="'.$course['id'].'">'.$course['course'].'</option>';
                }
                $html .= '</select><span class="text-danger" id="course_id"></span></div>';
                $response = array('status' => 'success','message'=> 'Data fetched successfully','url'=>'','html'=>$html);
                echo json_encode($response);
                return false;
            }else{
                $response = array('status' => 'errors','message'=> 'Something went Wrong','url'=>'','html'=>'');
                echo json_encode($response);
                return false;
            }
        }else{
            $response = array('status' => 'errors','message'=> 'Something went Wrong','url'=>'','html'=>'');
            echo json_encode($response);
            return false;
        }
    }
    public function getCOllegesData()
    {
        if ($this->is_admin_logged_in() == true) {
            $stream_id = $this->input->post('stream_id');
            $degree_type_id = $this->input->post('degree_type_id');
            $course_id = $this->input->post('course_id');
            $data['collegeList'] = $this->master->getMinimumCollegeWithCourse($course_id);
            $data['branchList'] = $this->master->getBranchesWithCourse($course_id);
            $result = $this->load->view('admin/college_matrix/college_matrix_data',$data,TRUE);
            $response = array('status' => 'success','message'=> 'Colleges found successfully','html'=>$result);
            echo json_encode($response);
            return false;
        }else{
            $response = array('status' => 'errors','message'=> 'Something went Wrong','url'=>'','html'=>'');
            echo json_encode($response);
            return false;
        }
    }
   
}

?>