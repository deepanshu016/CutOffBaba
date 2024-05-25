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
        $html .= '<select class="form-control raffss"  name="profile[course_data]['.$key.'][category]['.$keys.'][sub_category_id]" id="">';
        $html  .= '<option value="">Select State Category</option>';
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
        print_r($allData);
        $profileData = $allData['user'];
        $courseData = $allData['course_data'];
        if(!empty($_FILES['photo']['name'])) {
            $config['upload_path']  = 'assets/uploads/users';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            $uploadedFile = $this->uploadFile($_FILES['photo']['name'], 'photo', $config);
            if (!empty($uploadedFile['error_msg'])) {
                $response = array('status' => 'errors', 'message' => $uploadedFile['error_msg']);
                echo json_encode($response);
                return false;
            }
            $profileData['image'] = $uploadedFile['file'];
        }
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
    public function getDomicileMainCategories()
	{
        $id = $this->input->post('id');
        $key = $this->input->post('key');
        $keys = $this->input->post('keys');
        $headData = $this->master->getRecords('tbl_counselling_head',['state_id'=>$id]);
        if(empty($headData)){
            $response = array('status' => 400,'message' => 'No Data found !!!','url'=>'','html'=>'');                
            echo json_encode($response);
            return false;
        }
        $headIds = array_column($headData,'id');
        $categoryData = $this->master->getRecordsWhereIn('tbl_category','head_id',$headIds);
        if(empty($categoryData)){
            $response = array('status' => 400,'message' => 'No Data found !!!','url'=>'','html'=>'');                
            echo json_encode($response);
            return false;
        }
        $html = '';
        $html .= '<select class="form-control raffss get-domicile-sub-category" data-key="'.$key.'"  name="profile[course_data]['.$key.'][domicile_category_id][domicile_state_category_id]" id="">';
        $html  .= '<option value="">Select Domicile State Category</option>';
        foreach($categoryData as $category){
            $html  .='<option value="'.$category['id'].'">'.ucwords($category['category_name']).'</option>';
        }
        $html .= '</select></div>';
        $response = array('status' => 200,'message' => 'Data fetched successfully !','url'=>'','html'=>$html);                
        echo json_encode($response);
        return false;
	}
    public function getDomicileSubCategory(){
        $id = $this->input->post('id');
        $key = $this->input->post('key');
        $subCategory = $this->master->getRecords('tbl_sub_category',['category_id'=>$id]);
        if(empty($subCategory)){
            $response = array('status' => 400,'message' => 'No Data found !!!','url'=>'','html'=>'');                
            echo json_encode($response);
            return false;
        }
        $html = '';
        
        $html .= '<select class="form-control raffss" data-key="'.$key.'" name="profile[course_data]['.$key.'][domicile_category_id][domicile_state_sub_category_id]" id="">';
        $html  .= '<option value="">Select State Category</option>';
        foreach($subCategory as $sub){
            $html  .='<option value="'.$sub['id'].'">'.ucwords($sub['sub_category_name']).'</option>';
        }
        $html .= '</select></div>';
        $response = array('status' => 200,'message' => 'Data fetched successfully !','url'=>'','html'=>$html);                
        echo json_encode($response);
        return false;
    }


}
