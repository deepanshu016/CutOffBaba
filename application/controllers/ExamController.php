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
        $course_id = $this->input->post('course_id');
        $user = $this->session->userdata('user');
        $subCategory = $this->master->getRecords('tbl_sub_category',['category_id'=>$id]);
        if(empty($subCategory)){
            $response = array('status' => 400,'message' => 'No Data found !!!','url'=>'','html'=>'');                
            echo json_encode($response);
            return false;
        }
        $subCategoryDatas = $this->db->select('*')->from('tbl_user_course_preferences')->where(['user_id'=>$user['id'],'course_id'=>$course_id])->get()->row_array();  
        $html = '';
        $html .= '<select class="form-control raffss"  name="profile[course_data]['.$key.'][category]['.$keys.'][sub_category_id]" id=""';
        if(!empty($subCategoryDatas) && $subCategoryDatas['sub_category_id'] != '0'){
            $html  .='disabled';
        }
        $html .= '>';
        $html  .= '<option value="">Select State Category</option>';
        foreach($subCategory as $sub){
            $subCategoryData = $this->db->select('*')->from('tbl_user_course_preferences')->where(['user_id'=>$user['id'],'sub_category_id'=>$sub['id'],'course_id'=>$course_id])->get()->row_array();
            $html  .='<option value="'.$sub['id'].'"';
            if(!empty($subCategoryData)){
                $html  .='selected';
            }
            $html  .='>'.ucwords($sub['sub_category_name']).'</option>';
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
            $response = array('status' => 200,'message' => 'Profile Updated successfully','url'=>base_url('user-profile'));
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
        $course_id = $this->input->post('course_id');
        $user = $this->session->userdata('user');
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
        $domicilesubCategoryDatas = $this->db->select('*')->from('tbl_user_course_preferences')->where(['user_id'=>$user['id'],'course_id'=>$course_id])->get()->row_array();

        $html .= '<select class="form-control raffss get-domicile-sub-category" data-key="'.$key.'"  name="profile[course_data]['.$key.'][domicile_category_id][domicile_state_category_id]" id=""';
        if(!empty($domicilesubCategoryDatas) && $domicilesubCategoryDatas['domicile_state_category_id'] != '0'){
            $html  .='disabled';
        }
        $html .= '>';
        $html  .= '<option value="">Select Domicile State Category</option>';
        
        foreach($categoryData as $category){
            $subCategoryDatas = $this->db->select('*')->from('tbl_user_course_preferences')->where(['user_id'=>$user['id'],'domicile_state_category_id'=>$category['id'],'course_id'=>$course_id])->get()->row_array();
            
            $html  .='<option value="'.$category['id'].'"';
            if(!empty($subCategoryDatas)){
                $html  .='selected';
            }
            $html  .='>'.ucwords($category['category_name']).'</option>';
        }
        $html .= '</select></div>';
        $response = array('status' => 200,'message' => 'Data fetched successfully !','url'=>'','html'=>$html);                
        echo json_encode($response);
        return false;
	}
    public function getDomicileSubCategory(){
        $id = $this->input->post('id');
        $key = $this->input->post('key');
        $course_id = $this->input->post('course_id');
        $user = $this->session->userdata('user');
        $subCategory = $this->master->getRecords('tbl_sub_category',['category_id'=>$id]);
        if(empty($subCategory)){
            $response = array('status' => 400,'message' => 'No Data found !!!','url'=>'','html'=>'');                
            echo json_encode($response);
            return false;
        }
        $html = '';
        
        $html .= '<select class="form-control raffss" data-key="'.$key.'" name="profile[course_data]['.$key.'][domicile_category_id][domicile_state_sub_category_id]" id=""';
       
        $domicilesubCategoryDatas = $this->db->select('*')->from('tbl_user_course_preferences')->where(['user_id'=>$user['id'],'course_id'=>$course_id])->get()->row_array();

        if(!empty($domicilesubCategoryDatas) && $domicilesubCategoryDatas['domicile_state_sub_category_id'] != '0'){
            $html  .='disabled';
        }
        $html .= '>';
        $html  .= '<option value="">Select State Category</option>';
        foreach($subCategory as $sub){
            $subCategoryDatas = $this->db->select('*')->from('tbl_user_course_preferences')->where(['user_id'=>$user['id'],'domicile_state_sub_category_id'=>$sub['id'],'course_id'=>$course_id])->get()->row_array();    
            $html  .='<option value="'.$sub['id'].'"';
            if(!empty($subCategoryDatas)){
                $html  .='selected';
            }
            $html  .='>'.ucwords($sub['sub_category_name']).'</option>';
        }
        $html .= '</select></div>';
        $response = array('status' => 200,'message' => 'Data fetched successfully !','url'=>'','html'=>$html);                
        echo json_encode($response);
        return false;
    }


}
