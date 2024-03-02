<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamController extends MY_Controller {
	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('MasterModel','master');
    }
	public function getExamCourses()
	{
		$exam_id = $this->input->post('id');
        $data['coursesList'] = $this->master->getExamCourses($exam_id);
        $data['levelData'] = $this->master->getRecords('tbl_counselling_level',[]);
        $data['user'] = $this->master->singleRecord('tbl_users',['id'=>$this->session->userdata('user')['id']]);
        $data['domicileCategory'] = $this->master->getDomicileCategories($data['user']);
        $html_content = $this->load->view('site/course_data', $data, true);
        $response = array('status' => 200,'message' => 'Data fetched successfully !','url'=>'','html'=>$html_content);                
        echo json_encode($response);
        return false;
	}
    
    public function getSubCategory(){
        $id = $this->input->post('id');
        $key = $this->input->post('key');
        $keys = $this->input->post('keys');
        $subCategory = $this->master->getRecords('tbl_sub_category',['category_id'=>$id]);
        if(empty($subCategory)){
            $response = array('status' => 400,'message' => 'No Data found !!!','url'=>'','html'=>'');                
            echo json_encode($response);
            return false;
        }
        $html = '';
        $html .= '<span class="input-group-text appendCXCss raffss" id="basic-addon1"> <img class="img-fluid useHsih" src='.base_url('assets/site/img/exmas.png').' alt=""> </span>';
        $html .= '<select class="form-control raffss"  name="profile[course_data]['.$key.'][category]['.$keys.'][sub_category_id]" id="">';
        $html  .= '<option value="">Select Sub Category</option>';
        foreach($subCategory as $sub){
            $html  .='<option value="'.$sub['id'].'">'.ucwords($sub['sub_category_name']).'</option>';
        }
        $html .= '</select></div>';
        $response = array('status' => 200,'message' => 'Data fetched successfully !','url'=>'','html'=>$html);                
        echo json_encode($response);
        return false;
    }

    public function updateUserProfile(){
        $allData = $this->input->post('profile');
        $profileData = $allData['user'];
        $courseData = $allData['course_data'];
        $userProfile = $this->master->updateRecord('tbl_users',['id'=>$profileData['id']],$profileData);
        $result = $this->master->updateCoursePreferences('tbl_user_course_preferences',$allData);
        if($result > 0){
            $response = array('status' => 200,'message' => 'Profile Updated successfully','url'=>base_url('profile'));
            echo json_encode($response);
            return false;
        }else{
            $response = array('status' => 400,'message' => 'Nothing to update','url'=>'');                
            echo json_encode($response);
            return false;
        }
    }
}
