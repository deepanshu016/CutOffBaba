<?php



Class MasterApi extends MY_Controller  {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('User','us');
        $this->load->model('SiteSettings','site');
        $this->load->model('CourseCategory','category');
        $this->load->model('MasterModel','master');
    }
// API to Get Setting
    
     public function getSiteSettings()
    {
        try {
            $settings = $this->master->singleRecord('tbl_site_settings',[]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$settings);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }


    // API to Get Category
    public function getCategoryList()
	{
        try {
            $category = $this->master->getRecords('tbl_category',[]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$category);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
	}

    // API to Get Country
    public function getCountryList()
	{
        try {
            $counties = $this->master->getRecords('tbl_country',[]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$counties);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
	}
    // API to Get States
    public function getStateList()
	{
        try {
            $states = $this->master->getParentChildData('tbl_state','tbl_country','country_id');
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$states);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
    public function getStateDetail($id=null)
    {
        try {
            $states = $this->db->select('tbl_college.*,tbl_college.id as college_id,tbl_state.name as statename,tbl_uploaded_files.file_name as college_bannerfile')->join('tbl_state','tbl_state.id=tbl_college.state')->join('tbl_uploaded_files','tbl_uploaded_files.id=tbl_college.college_banner')->where(['tbl_college.state'=>$id])->get('tbl_college')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$states);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
    // API to Get District
    public function getDistrictList()
	{
        try {
            $districtList = $this->master->getDistrictDataWithParent('tbl_city','tbl_state','tbl_country','state_id','country');
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$districtList);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
    // API to Get Sub District
    public function getSubDistrictList()
	{
        try {
            $subDistrictList = $this->master->getSubDistrictDataWithParent('tbl_sub_district','tbl_city','tbl_state','tbl_country','district','state','country');
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$districtList);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
    // API to Get OwnerShip Data
    public function getOwnerShipList()
	{
        try {
            $ownerShipList = $this->master->getRecords('tbl_ownership',[]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$ownerShipList);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
    // API to Get Approvals Data
    public function getApprovalList()
	{
        try {
            $approvalList = $this->master->getRecords('tbl_approval',[]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$approvalList);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
    // API to Get Recognition Data
    public function getRecognitionList()
	{
        try {
            $recognitionList = $this->master->getRecords('tbl_recognition',[]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$recognitionList);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
    // API to Get Gender Data
    public function getGenderList()
	{
        try {
            $genderList = $this->master->getRecords('tbl_gender',[]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$genderList);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
    // API to Get Degree Type Data
    public function getDegreeTypeList()
	{
        try {
            $degreeTypeList = $this->master->getRecords('tbl_degree_type',[]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$degreeTypeList);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
    // API to Get Streams Data
    public function getStreamsList()
	{
       
        try {
            $streamList = $this->master->getRecords('tbl_stream',[]);
             $finalstream=array();
            foreach ($streamList as $stream) {
                $degries=$this->db->select('distinct(degree_type)')->where('stream',$stream['id'])->get('tbl_course')->result_array();
                 $finalcourse=array();
                 $finaldegree=array();
                foreach ($degries as $degree) {
                    $deg=array();
                    $degry=$this->db->select('*')->where('id',$degree['degree_type'])->get('tbl_degree_type')->result_array();

                    $deg=$degry[0];
                    $courses=$this->db->select('*')->where('degree_type',$degree['degree_type'])->where('stream',$stream['id'])->get('tbl_course')->result_array();
                    $finalcourse=array();
                    foreach ($courses as $course) {
                        $finalcourse[]=$course;
                    }
                    $deg['courses']=$finalcourse;
                    $finaldegree[]=$deg;
                }
                $stream['degreetype']=$finaldegree;
                $finalstream[]=$stream;
            }
            // echo '<pre>';
            // print_r($finalstream);

            
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$finalstream);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

    public function getcoursebystream($stream=null)
    {
       
        try {
            $streamList = $this->master->getRecords('tbl_stream',['stream'=>str_replace("-"," ",$stream)]);
             $finalstream=array();
            foreach ($streamList as $stream) {
                $degries=$this->db->select('distinct(degree_type)')->where('stream',$stream['id'])->get('tbl_course')->result_array();
                 $finalcourse=array();
                 $finaldegree=array();
                foreach ($degries as $degree) {
                    $deg=array();
                    $degry=$this->db->select('*')->where('id',$degree['degree_type'])->get('tbl_degree_type')->result_array();

                    $deg=$degry[0];
                    $courses=$this->db->select('*')->where('degree_type',$degree['degree_type'])->where('stream',$stream['id'])->get('tbl_course')->result_array();
                    $finalcourse=array();
                    foreach ($courses as $course) {
                        $finalcourse[]=$course;
                    }
                    $deg['courses']=$finalcourse;
                    $finaldegree[]=$deg;
                }
                $stream['degreetype']=$finaldegree;
                $finalstream[]=$stream;
            }
            // echo '<pre>';
            // print_r($finalstream);

            
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$finalstream);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
    // API to Get Opens Data
    public function getOpensList()
	{
        try {
            $openList = $this->master->getRecords('tbl_opens',[]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$openList);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
    // API to Get Visibility Data
    public function getVisibilityList()
	{
        try {
            $visibilityList = $this->master->getRecords('tbl_visibility',[]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$visibilityList);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
    // API to Get Clinic Details Data
    public function getClinicDetailsList()
	{
        try {
            $clinicDetailsList = $this->master->getRecords('tbl_clinic_details',[]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$clinicDetailsList);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
    // API to Get Clinic Facility Data
    public function getClinicFacilityList()
	{
        try {
            $facilityList = $this->master->getRecords('tbl_facilities',[]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$facilityList);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
    // API to Get Exam Data
    public function getExamsList()
	{
        try {
            $examList = $this->master->getRecords('tbl_exam',[]);
            $examData = [];
            if(!empty($examList)){
                foreach($examList as $key=>$exam){
                    $courseAccepted = ($exam['course_accepting']) ? explode('|',$exam['course_accepting']) : [];
                    $examData[$key]['exam_id'] = $exam['id'];
                    $examData[$key]['slug'] = $exam['slug'];
                    $examData[$key]['exam'] = $exam['exam'];
                    $examData[$key]['exam_full_name'] = $exam['exam_full_name'];
                    $examData[$key]['exam_short_name'] = $exam['exam_short_name'];
                    $examData[$key]['degree_type'] = $this->master->singleRecord('tbl_degree_type',['id'=>$exam['degree_type']]);
                    $examData[$key]['eligibility'] = $exam['eligibility'];
                    $examData[$key]['exam_duration'] = $exam['exam_duration'];
                    $examData[$key]['maximum_marks'] = $exam['maximum_marks'];
                    $examData[$key]['passing_marks'] = $exam['passing_marks'];
                    $examData[$key]['qualifying_marks'] = $exam['qualifying_marks'];
                    $examData[$key]['exam_held_in'] = $exam['exam_held_in'];
                    $examData[$key]['registration_starts'] = $exam['registration_starts'];
                    $examData[$key]['registration_ends'] = $exam['registration_ends'];
                    $examData[$key]['stream'] = $this->master->singleRecord('tbl_stream',['id'=>$exam['stream']]);
                    $examData[$key]['course_accepted'] = $this->db->select('*')->where_in('id',$courseAccepted)->get('tbl_course')->result_array();
                }
                $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$examData);
            }
            $response = array('status'=>400,'message'=>'No data found','data'=>$examData);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
    // API to Get Nature Data
    public function getNatureList()
	{
        try {
            $natureList = $this->master->getRecords('tbl_nature',[]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$natureList);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
     // API to Get Course Data
     public function getCourseList()
     {
         try {
             $courseList = $this->master->getRecords('tbl_course',[]);
             $courseData = [];
             if(!empty($courseList)){
                 foreach($courseList as $key=>$course){
                     $exam_data = ($course['exam']) ? explode('|',$course['exam']) : [];
                     $college_data = ($course['college']) ? explode('|',$course['college']) : [];
                     $courseData[$key]['course_id'] = $course['id'];
                     $courseData[$key]['course_full_name'] = $course['course_full_name'];
                     $courseData[$key]['course_short_name'] = $course['course_short_name'];
                     $courseData[$key]['course_icon'] = $course['course_icon'];
                     $courseData[$key]['stream'] = $this->master->singleRecord('tbl_stream',['id'=>$course['stream']]);
                     $courseData[$key]['degree_type'] = $this->master->singleRecord('tbl_degree_type',['id'=>$course['degree_type']]);
                     $courseData[$key]['course_duration'] = $course['course_duration'];
                     if(!empty($exam_data)){
                        $courseData[$key]['exams'] = $this->db->select('*')->where_in('id',$exam_data)->get('tbl_exam')->result_array();
                     }else{
                        $courseData[$key]['exams'] = [];
                     }
                     $courseData[$key]['course_eligibility'] = $course['course_eligibility'];
                     $courseData[$key]['course_eligibility'] = $course['course_eligibility'];
                     $courseData[$key]['expected_salary'] = $course['expected_salary'];
                     $courseData[$key]['course_fees'] = $course['course_fees'];
                     $courseData[$key]['counselling_authority'] = $course['counselling_authority'];
                     if(!empty($college_data)){
                        $courseData[$key]['college'] = $this->db->select('*')->where_in('id',$college_data)->get('tbl_college')->result_array();
                     }else{
                        $courseData[$key]['college'] = [];
                     }
                     $courseData[$key]['branch_type'] = $course['branch_type'];
                     $courseData[$key]['status'] = $course['status'];
                     $courseData[$key]['created_at'] = $course['created_at'];
                     $courseData[$key]['updated_at'] = $course['updated_at'];
                 }
                 $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$courseData);
             }else{
                $response = array('status'=>400,'message'=>'No data found','data'=>$headData);
             }
         } catch (Exception $e) {
             log_message('error', 'Exception: ' . $e->getMessage());
             $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
         }
         $this->output->set_content_type('application/json')->set_output(json_encode($response));
     }
     public function getBranchList()
     {
         try {
             $branchList = $this->master->getRecords('tbl_branch',[]);
             $branchData = [];
             if(!empty($branchList)){
                 foreach($branchList as $key=>$branch){
                     $course_data = ($branch['courses']) ? explode('|',$branch['courses']) : [];
                     $branchData[$key]['branch_id'] = $branch['id'];
                     $branchData[$key]['branch'] = $branch['branch'];
                     $branchData[$key]['branch_type'] = $branch['branch_type'];
                     if(!empty($course_data)){
                        $branchData[$key]['courses'] = $this->db->select('*')->where_in('id',$course_data)->get('tbl_course')->result_array();
                     }else{
                        $branchData[$key]['courses'] = [];
                     }
                 }
                 $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$branchData);
             }
             $response = array('status'=>400,'message'=>'No data found','data'=>$branchData);
         } catch (Exception $e) {
             log_message('error', 'Exception: ' . $e->getMessage());
             $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
         }
         $this->output->set_content_type('application/json')->set_output(json_encode($response));
     }
     public function getCollegeList()
     {
         try {
             $collegeList = $this->master->getRecordsbyLimit('tbl_college',[],10);
             $collegeData = [];
             if(!empty($collegeList)){
                 foreach($collegeList as $key=>$college){
                     $course_data = ($college['course_offered']) ? explode('|',$college['course_offered']) : [];
                     $gender_data = ($college['gender_accepted']) ? explode('|',$college['gender_accepted']) : [];
                     $collegeData[$key]['college_id'] = $college['id'];
                     $collegeData[$key]['full_name'] = $college['full_name'];
                     $collegeData[$key]['slug'] = $college['slug'];
                     $collegeData[$key]['short_description'] = $college['short_description'];
                     $collegeData[$key]['popular_name_one'] = $college['popular_name_one'];
                     $collegeData[$key]['popular_name_two'] = $college['popular_name_two'];
                     $collegeData[$key]['establishment'] = $college['establishment'];
                     if(!empty($course_data)){
                        $collegeData[$key]['courses'] = $this->db->select('*')->where_in('id',$course_data)->get('tbl_course')->result_array();
                     }else{
                        $collegeData[$key]['courses'] = [];
                     }
                     if(!empty($gender_data)){
                        $collegeData[$key]['gender'] = $this->db->select('*')->where_in('id',$gender_data)->get('tbl_gender')->result_array();
                     }else{
                        $collegeData[$key]['gender'] = [];
                     }
                     
                     $collegeData[$key]['country'] = $this->master->singleRecord('tbl_country',['id'=>$college['country']]);
                     $collegeData[$key]['state'] = $this->master->singleRecord('tbl_state',['id'=>$college['state']]);
                     $collegeData[$key]['district'] = $this->master->singleRecord('tbl_city',['id'=>$college['city']]);
                     $collegeData[$key]['affiliated_by'] = $college['affiliated_by'];
                     $collegeData[$key]['university_name'] = $college['university_name'];
                     $collegeData[$key]['approval'] = $this->master->singleRecord('tbl_approval',['id'=>$college['approved_by']]);
                     $collegeData[$key]['approved_by'] = $college['approved_by'];
                     $collegeData[$key]['college_logo'] = $college['college_logo'];
                     $collegeData[$key]['college_banner'] = $college['college_banner'];
                     $college_logo=$this->db->select('*')->where(['tbl_uploaded_files.id'=>$college['college_logo']])->get('tbl_uploaded_files')->result_array();
                    if (count($college_logo)>0) {
                        $collegeData[$key]['college_logofile']=$college_logo[0]['file_name'];
                    }else{
                        $collegeData[$key]['college_logofile']="";
                    }
                    $college_banner=$this->db->select('*')->where(['tbl_uploaded_files.id'=>$college['college_banner']])->get('tbl_uploaded_files')->result_array();
                    if (count($college_banner)>0) {
                        $collegeData[$key]['college_bannerfile']=$college_logo[0]['file_name'];
                    }else{$collegeData[$key]['college_bannerfile']="";}


                     $collegeData[$key]['prospectus_file'] = $college['prospectus_file'];
                     $collegeData[$key]['ownership'] = $this->master->singleRecord('tbl_ownership',['id'=>$college['ownership']]);
                     $collegeData[$key]['website'] = $college['website'];
                     $collegeData[$key]['email'] = $college['email'];
                     $collegeData[$key]['contact_one'] = $college['contact_one'];
                     $collegeData[$key]['contact_two'] = $college['contact_two'];
                     $collegeData[$key]['contact_three'] = $college['contact_three'];
                     $collegeData[$key]['nodal_officer_name'] = $college['nodal_officer_name'];
                     $collegeData[$key]['nodal_officer_no'] = $college['nodal_officer_no'];
                     $collegeData[$key]['keywords'] = $college['keywords'];
                     $collegeData[$key]['tags'] = $college['tags'];
                     $collegeData[$key]['added_by'] = $college['added_by'];
                     $collegeData[$key]['status'] = $college['status'];
                     $collegeData[$key]['created_at'] = $college['created_at'];
                     $collegeData[$key]['updated_at'] = $college['updated_at'];
                 }
                 $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$collegeData);
             }
             $response = array('status'=>200,'message'=>'No data found','data'=>$collegeData);
         } catch (Exception $e) {
             log_message('error', 'Exception: ' . $e->getMessage());
             $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
         }
         $this->output->set_content_type('application/json')->set_output(json_encode($response));
     }
     // API to Get Visibility Data
    public function getCounsellingLevelList()
	{
        try {
            $counsellingLevelList = $this->master->getRecords('tbl_counselling_level',[]);
           
            if(!empty($counsellingLevelList)){
                // debugger($counsellingLevelList);
                $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$counsellingLevelList);
            }else{
                $response = array('status'=>400,'message'=>'No data found','data'=>[]);
            }
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

    public function getCounsellingHead()
     {
         try {
             $counsellingHeadList = $this->master->getRecords('tbl_counselling_head',[]);
             $headData = [];
             if(!empty($counsellingHeadList)){
                 foreach($counsellingHeadList as $key=>$head){
                     $exam_data = ($head['exams']) ? explode('|',$head['exams']) : [];
                     $headData[$key]['head_id'] = $head['id'];
                     $headData[$key]['head_name'] = $head['head_name'];
                     $headData[$key]['courses'] = $this->master->singleRecord('tbl_course',['id'=>$head['course_id']]);
                     $headData[$key]['levels'] = $this->master->singleRecord('tbl_counselling_level',['id'=>$head['level_id']]);
                     if(!empty($exam_data)){
                        $headData[$key]['courses'] = $this->db->select('*')->where_in('id',$exam_data)->get('tbl_exam')->result_array();
                     }else{
                        $headData[$key]['courses'] = [];
                     }
                 }
                 $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$headData);
             }else{
                $response = array('status'=>400,'message'=>'No data found','data'=>$headData);
             }
         } catch (Exception $e) {
             log_message('error', 'Exception: ' . $e->getMessage());
             $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
         }
         $this->output->set_content_type('application/json')->set_output(json_encode($response));
     }
    public function getSubCategoryList()
     {
         try {
             $subCategoryList = $this->master->getRecords('tbl_sub_category',[]);
             $subCategoryData = [];
             if(!empty($subCategoryList)){
                 foreach($subCategoryList as $key=>$sub){
                     $subCategoryData[$key]['sub_category_id'] = $sub['id'];
                     $subCategoryData[$key]['sub_category_name'] = $sub['sub_category_name'];
                     $subCategoryData[$key]['slug'] = $sub['slug'];
                     $subCategoryData[$key]['short_name'] = $sub['short_name'];
                     $subCategoryData[$key]['category'] = $this->master->singleRecord('tbl_category',['id'=>$sub['category_id']]);
                     $subCategoryData[$key]['heads'] = $this->master->singleRecord('tbl_counselling_head',['id'=>$sub['head_id']]);
                     $subCategoryData[$key]['opens'] = $this->master->singleRecord('tbl_opens',['id'=>$sub['open_id']]);
                 }
                 $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$subCategoryData);
             }else{
                $response = array('status'=>400,'message'=>'No data found','data'=>$subCategoryData);
             }
         } catch (Exception $e) {
             log_message('error', 'Exception: ' . $e->getMessage());
             $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
         }
         $this->output->set_content_type('application/json')->set_output(json_encode($response));
     }
    public function getSpecialCategoryList()
     {
         try {
             $specialCategoryList = $this->master->getRecords('tbl_special_category',[]);
             $specialCategoryData = [];
             if(!empty($specialCategoryList)){
                 foreach($specialCategoryList as $key=>$special){
                     $specialCategoryData[$key]['special_category_id'] = $special['id'];
                     $specialCategoryData[$key]['special_category_name'] = $special['special_category_name'];
                     $specialCategoryData[$key]['slug'] = $special['slug'];
                     $specialCategoryData[$key]['short_name'] = $special['short_name'];
                     $specialCategoryData[$key]['heads'] = $this->master->singleRecord('tbl_counselling_head',['id'=>$special['head_id']]);
                     $specialCategoryData[$key]['visibility'] = $this->master->singleRecord('tbl_visibility',['id'=>$special['visibility_id']]);
                 }
                 $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$specialCategoryData);
             }else{
                $response = array('status'=>400,'message'=>'No data found','data'=>$specialCategoryData);
             }
         } catch (Exception $e) {
             log_message('error', 'Exception: ' . $e->getMessage());
             $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
         }
         $this->output->set_content_type('application/json')->set_output(json_encode($response));
     }
     public function getSpecialSubCategoryList()
     {
         try {
             $specialSubCategory = $this->master->getRecords('tbl_sub_special_category',[]);
             $specialSubCategoryData = [];
             if(!empty($specialSubCategory)){
                 foreach($specialSubCategory as $key=>$sub){
                     $specialSubCategoryData[$key]['special_sub_category_id'] = $sub['id'];
                     $specialSubCategoryData[$key]['sub_special_category_name'] = $sub['sub_special_category_name'];
                     $specialSubCategoryData[$key]['slug'] = $sub['slug'];
                     $specialSubCategoryData[$key]['short_name'] = $sub['short_name'];
                     $specialSubCategoryData[$key]['special_category'] = $this->master->singleRecord('tbl_special_category',['id'=>$sub['special_id']]);
                     $specialSubCategoryData[$key]['heads'] = $this->master->singleRecord('tbl_counselling_head',['id'=>$sub['head_id']]);
                     $specialSubCategoryData[$key]['opens'] = $this->master->singleRecord('tbl_opens',['id'=>$sub['open_id']]);
                 }
                 $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$specialSubCategoryData);
             }else{
                $response = array('status'=>400,'message'=>'No data found','data'=>$specialSubCategoryData);
             }
         } catch (Exception $e) {
             log_message('error', 'Exception: ' . $e->getMessage());
             $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
         }
         $this->output->set_content_type('application/json')->set_output(json_encode($response));
     }
     // API to get Fees Head List
     public function getFeesHeadList()
     {
         try {
             $feesHeadList = $this->master->getRecords('tbl_feeshead',[]);
             if(!empty($feesHeadList)){
                 $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$feesHeadList);
             }else{
                 $response = array('status'=>400,'message'=>'No data found','data'=>[]);
             }
         } catch (Exception $e) {
             log_message('error', 'Exception: ' . $e->getMessage());
             $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
         }
         $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
    public function getServiceBondRulesList()
    {
        try {
             $serviceBondRulesList = $this->master->getRecords('tbl_service_bond_rules',[]);
             if(!empty($serviceBondRulesList)){
                 $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$serviceBondRulesList);
             }else{
                 $response = array('status'=>400,'message'=>'No data found','data'=>[]);
             }
        } catch (Exception $e) {
             log_message('error', 'Exception: ' . $e->getMessage());
             $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
    public function getGalleryHeadList()
    {
        try {
             $galleryHeadList = $this->master->getRecords('tbl_gallery_heads',[]);
             if(!empty($galleryHeadList)){
                 $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$galleryHeadList);
             }else{
                 $response = array('status'=>400,'message'=>'No data found','data'=>[]);
             }
        } catch (Exception $e) {
             log_message('error', 'Exception: ' . $e->getMessage());
             $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
    public function getClinicalDataList()
    {
        try {
             $galleryHeadList = $this->master->getRecords('tbl_clinical_details',[]);
             if(!empty($galleryHeadList)){
                 $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$galleryHeadList);
             }else{
                 $response = array('status'=>400,'message'=>'No data found','data'=>[]);
             }
        } catch (Exception $e) {
             log_message('error', 'Exception: ' . $e->getMessage());
             $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }


    public function getCounsellingPlanList()
     {
         try {
             $counsellingPlanList = $this->master->getRecords('tbl_counsellng_plans',[]);
             $counsellingPlanData = [];
             if(!empty($counsellingPlanList)){
                 foreach($counsellingPlanList as $key=>$counselling){
                     $counsellingPlanData[$key]['plan_id'] = $counselling['id'];
                     $counsellingPlanData[$key]['plan_name'] = $counselling['plan_name'];
                     $counsellingPlanData[$key]['slug'] = $counselling['slug'];
                     $counsellingPlanData[$key]['discount_percentage'] = $counselling['discount_percentage'];
                     $counsellingPlanData[$key]['course'] = $this->master->singleRecord('tbl_course',['id'=>$counselling['course_id']]);
                     $counsellingPlanData[$key]['degree_type'] = $this->master->singleRecord('tbl_degree_type',['id'=>$counselling['degree_type_id']]);
                     $counsellingPlanData[$key]['discounted_price'] = $counselling['discounted_price'];
                     $counsellingPlanData[$key]['description'] = $counselling['description'];
                     $counsellingPlanData[$key]['terms_condition'] = $counselling['terms_condition'];
                     $counsellingPlanData[$key]['paid_counselling_registration'] = $counselling['paid_counselling_registration'];
                     $counsellingPlanData[$key]['payment_info'] = $counselling['payment_info'];
                     $counsellingPlanData[$key]['status'] = $counselling['status'];
                     $counsellingPlanData[$key]['created_at'] = $counselling['created_at'];
                     $counsellingPlanData[$key]['updated_at'] = $counselling['updated_at'];
                 }
                 $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$counsellingPlanData);
             }else{
                $response = array('status'=>400,'message'=>'No data found','data'=>$counsellingPlanData);
             }
         } catch (Exception $e) {
             log_message('error', 'Exception: ' . $e->getMessage());
             $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
         }
         $this->output->set_content_type('application/json')->set_output(json_encode($response));
     }
    public function getNewsList()
     {
         try {
             $newsList = $this->master->getRecords('tbl_news',[]);
             $newsData = [];
             if(!empty($newsList)){
                 foreach($newsList as $key=>$news){
                     $newsData[$key]['news_id'] = $news['id'];
                     $newsData[$key]['image'] = $news['image'];
                     $newsData[$key]['slug'] = $news['slug'];
                     $newsData[$key]['title'] = $news['title'];
                     $newsData[$key]['course'] = $this->master->singleRecord('tbl_course',['id'=>$news['course_id']]);
                     $newsData[$key]['short_description'] = $news['short_description'];
                     $newsData[$key]['full_description'] = $news['full_description'];
                     $newsData[$key]['created_at'] = $news['created_at'];
                     $newsData[$key]['updated_at'] = $news['updated_at'];
                 }
                 $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$newsData);
             }else{
                $response = array('status'=>400,'message'=>'No data found','data'=>$newsData);
             }
         } catch (Exception $e) {
             log_message('error', 'Exception: ' . $e->getMessage());
             $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
         }
         $this->output->set_content_type('application/json')->set_output(json_encode($response));
     }
     public function getcoursedetail($id=null){
         try {
            $newsData = $this->master->singleRecord('tbl_course',['id'=>$id]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!','data'=>$newsData);
         } catch (Exception $e) {
             log_message('error', 'Exception: ' . $e->getMessage());
             $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
         }
         $this->output->set_content_type('application/json')->set_output(json_encode($response));
     } 
     public function getCollegedetail($slug=null,$id=null){
         try {
            $newsData = $this->db->select('tbl_college.*,tbl_gender.gender,tbl_ownership.title as ownertitle')->join('tbl_gender','tbl_gender.id=tbl_college.gender_accepted')->join('tbl_ownership','tbl_ownership.id=tbl_college.ownership')->where(['tbl_college.id'=>$id])->get('tbl_college')->result_array();
            $newsData=$newsData[0];
            $college_logo=$this->db->select('*')->where(['tbl_uploaded_files.id'=>$newsData['college_logo']])->get('tbl_uploaded_files')->result_array();
            if (count($college_logo)>0) {
                $newsData['college_logofile']=$college_logo[0]['file_name'];
            }else{
                $newsData['college_logofile']="";
            }
            $college_banner=$this->db->select('*')->where(['tbl_uploaded_files.id'=>$newsData['college_banner']])->get('tbl_uploaded_files')->result_array();
            if (count($college_logo)>0) {
                $newsData['college_bannerfile']=$college_logo[0]['file_name'];
            }else{$newsData['college_bannerfile']="";}
            $response = array('status'=>200,'message'=>'Data fetched successfully!','data'=>$newsData);
         } catch (Exception $e) {
             log_message('error', 'Exception: ' . $e->getMessage());
             $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
         }
         $this->output->set_content_type('application/json')->set_output(json_encode($response));
     }
   
}

?>