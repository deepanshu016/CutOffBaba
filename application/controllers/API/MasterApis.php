<?php



Class MasterApis extends MY_Controller  {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('User','us');
        $this->load->model('SiteSettings','site');
        $this->load->model('CourseCategory','category');
        $this->load->model('MasterModel','master');
    }
// API to Get Setting

    public function Getpayments()
    {
        try {
            $payments = $this->db->select('payments.*,tbl_users.name as userfullname,tbl_counsellng_plans.plan_name as counsellingplan')->join('tbl_users','tbl_users.id=payments.user_id')->join('tbl_counsellng_plans','tbl_counsellng_plans.id=payments.plan_id')->get('payments')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$payments);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetpaymentsByStatus($status=null)
    {
        try {
            $payments = $this->db->select('payments.*,tbl_users.name as userfullname,tbl_counsellng_plans.plan_name as counsellingplan')->join('tbl_users','tbl_users.id=payments.user_id')->join('tbl_counsellng_plans','tbl_counsellng_plans.id=payments.plan_id')->where(['payments.status'=>$status])->get('payments')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$payments);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetpaymentsByDate($purchased_date=null)
    {
        try {
            $payments = $this->db->select('payments.*,tbl_users.name as userfullname,tbl_counsellng_plans.plan_name as counsellingplan')->join('tbl_users','tbl_users.id=payments.user_id')->join('tbl_counsellng_plans','tbl_counsellng_plans.id=payments.plan_id')->where(['payments.purchased_date'=>$purchased_date])->get('payments')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$payments);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetpaymentsByTxnId($txt_id=null)
    {
        try {
            $payments = $this->db->select('payments.*,tbl_users.name as userfullname,tbl_counsellng_plans.plan_name as counsellingplan')->join('tbl_users','tbl_users.id=payments.user_id')->join('tbl_counsellng_plans','tbl_counsellng_plans.id=payments.plan_id')->where(['payments.txn_id'=>$txt_id])->get('payments')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$payments);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetpaymentsByUserId($user_id=null)
    {
        try {
            $payments = $this->db->select('payments.*,tbl_users.name as userfullname,tbl_counsellng_plans.plan_name as counsellingplan')->join('tbl_users','tbl_users.id=payments.user_id')->join('tbl_counsellng_plans','tbl_counsellng_plans.id=payments.plan_id')->where(['payments.user_id'=>$user_id])->get('payments')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$payments);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetpaymentsByPlanId($plan_id=null)
    {
        try {
            $payments = $this->db->select('payments.*,tbl_users.name as userfullname,tbl_counsellng_plans.plan_name as counsellingplan')->join('tbl_users','tbl_users.id=payments.user_id')->join('tbl_counsellng_plans','tbl_counsellng_plans.id=payments.plan_id')->where(['payments.plan_id'=>$plan_id])->get('payments')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$payments);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }


    public function GetpaymentsById($id=null)
    {
        try {
            $payments = $this->db->select('payments.*,tbl_users.name as userfullname,tbl_counsellng_plans.plan_name as counsellingplan')->join('tbl_users','tbl_users.id=payments.user_id')->join('tbl_counsellng_plans','tbl_counsellng_plans.id=payments.plan_id')->where(['payments.id'=>$id])->get('payments')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$payments);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    // approval

    public function Getapproval()
    {
        try {
            $approval = $this->master->getRecords('tbl_approval',[]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$approval);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetapprovalById($id=null)
    {
        try {
            $approval = $this->master->getRecords('tbl_approval',['id' => $id]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$approval);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    //Branch

    public function Getbranch()
    {
        try {
            $data = $this->db->select('tbl_branch.*,tbl_course.course as course_full_name, tbl_nature.nature')->join('tbl_course', 'tbl_course.id=tbl_branch.courses')->join('tbl_nature','tbl_nature.id=tbl_branch.branch_type')->get('tbl_branch')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetbranchById($id=null)
    {
        try {
            $data = $this->db->select('tbl_branch.*,tbl_course.course as course_full_name, tbl_nature.nature')->join('tbl_course', 'tbl_course.id=tbl_branch.courses')->join('tbl_nature','tbl_nature.id=tbl_branch.branch_type')->where(['tbl_branch.id'=>$id])->get('tbl_branch')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    } 

    public function GetbranchByBranchtype($type=null)
    {
        try {
            $data = $this->db->select('tbl_branch.*,tbl_course.course as course_full_name, tbl_nature.nature')->join('tbl_course', 'tbl_course.id=tbl_branch.courses')->join('tbl_nature','tbl_nature.id=tbl_branch.branch_type')->where(['tbl_branch.branch_type'=>$type])->get('tbl_branch')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetbranchByCourse($courses=null)
    {
        try {
            $data = $this->db->select('tbl_branch.*,tbl_course.course as course_full_name, tbl_nature.nature')->join('tbl_course', 'tbl_course.id=tbl_branch.courses')->join('tbl_nature','tbl_nature.id=tbl_branch.branch_type')->where(['tbl_branch.courses'=>$courses])->get('tbl_branch')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }


    public function Getcategory()
    {
        try {
            $data = $this->db->select('tbl_category.*,tbl_counselling_head.head_name')->join('tbl_counselling_head', 'tbl_counselling_head.id=tbl_category.head_id')->get('tbl_category')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    } 


    public function GetcategoryById($id=null)
    {
        try {
            $data = $this->db->select('tbl_category.*,tbl_counselling_head.head_name')->join('tbl_counselling_head', 'tbl_counselling_head.id=tbl_category.head_id')->where(['tbl_category.id'=>$id])->get('tbl_category')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    } 

    public function GetcategoryByHead($head_id=null)
    {
        try {
            $data = $this->db->select('tbl_category.*,tbl_counselling_head.head_name')->join('tbl_counselling_head', 'tbl_counselling_head.id=tbl_category.head_id')->where(['tbl_branch.head_id'=>$head_id])->get('tbl_category')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    } 

    public function Getcity()
    {
        try {
            $data = $this->db->select('tbl_city.*,tbl_country.name, tbl_state.name')->join('tbl_country', 'tbl_country.id=tbl_city.country')->join('tbl_state','tbl_state.id=tbl_city.state_id')->get('tbl_city')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }


    public function GetcityById($head_id=null)
    {
        try {
            $data = $this->db->select('tbl_city.*,tbl_country.name, tbl_state.name')->join('tbl_country', 'tbl_country.id=tbl_city.country')->join('tbl_state','tbl_state.id=tbl_city.state_id')->where(['tbl_branch.courses'=>$courses])->get('tbl_city')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetcityByCountry($country=null)
    {
        try {
            $data = $this->db->select('tbl_city.*,tbl_country.name, tbl_state.name')->join('tbl_country', 'tbl_country.id=tbl_city.country')->join('tbl_state','tbl_state.id=tbl_city.state_id')->where(['tbl_city.country'=>$country])->get('tbl_city')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetcityBystate($state_id =null)
    {
        try {
            $data = $this->db->select('tbl_city.*,tbl_country.name, tbl_state.name')->join('tbl_country', 'tbl_country.id=tbl_city.country')->join('tbl_state','tbl_state.id=tbl_city.state_id')->where(['tbl_city.state_id'=>$state_id])->get('tbl_city')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

   


    public function Getclinical_details()
    {
        try {
            $data = $this->master->getRecords('tbl_clinical_details',[]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

     public function Getclinical_detailsById($id =null)
    {
        try {
            $data = $this->master->singleRecord('tbl_clinical_details',['id' => $id]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }


    public function Getclinic_details()
    {
        try {
            $data = $this->master->getRecords('tbl_clinic_details',[]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

     public function Getclinic_detailsById($id =null)
    {
        try {
            $data = $this->master->singleRecord('tbl_clinic_details',['id' => $id]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function Getclinic_facility()
    {
        try {
            $data = $this->master->getRecords('tbl_clinic_facility',[]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function Getclinic_facilityById($id =null)
    {
        try {
            $data = $this->master->singleRecord('tbl_clinic_facility',['id' => $id]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }


    public function Getcollege()
    {
        try {
            $data = $this->db->select('tbl_college.*, tbl_gender.gender, tbl_gender.gender,tbl_stream.stream, tbl_country.name, tbl_state.name, tbl_city.city, tbl_sub_district.sub_district,  tbl_ownership.title, tbl_users.name' )->join('tbl_gender', 'tbl_gender.id=tbl_college.gender_accepted')->join('tbl_stream', 'tbl_stream.id=tbl_college.stream')->join('tbl_country','tbl_country.id=tbl_college.country')->join('tbl_state','tbl_state.id=tbl_college.state')->join('tbl_city','tbl_city.id=tbl_college.city')->join('tbl_sub_district','tbl_sub_district.id=tbl_college.subdistrict')->join('tbl_ownership','tbl_ownership.id=tbl_college.ownership')->join('tbl_users','tbl_users.id=tbl_college.added_by')->get('tbl_college')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetcollegeById($id =null)
    {
        try {
            $data = $this->db->select('tbl_college.*, tbl_gender.gender, tbl_stream.stream, tbl_country.name, tbl_state.name, tbl_city.city, tbl_sub_district.sub_district,  tbl_ownership.title, tbl_users.name' )->join('tbl_gender', 'tbl_gender.id=tbl_college.gender_accepted')->join('tbl_stream', 'tbl_stream.id=tbl_college.stream')->join('tbl_country','tbl_country.id=tbl_college.country')->join('tbl_state','tbl_state.id=tbl_college.state')->join('tbl_city','tbl_city.id=tbl_college.city')->join('tbl_sub_district','tbl_sub_district.id=tbl_college.subdistrict')->join('tbl_ownership','tbl_ownership.id=tbl_college.ownership')->join('tbl_users','tbl_users.id=tbl_college.added_by')->where(['tbl_college.id'=>$id])->get('tbl_college')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    } 

    public function GetcollegeByEstablishment($date =null)
    {
        try {
            $data = $this->db->select('tbl_college.*, tbl_gender.gender, tbl_stream.stream, tbl_country.name, tbl_state.name, tbl_city.city, tbl_sub_district.sub_district,  tbl_ownership.title, tbl_users.name' )->join('tbl_gender', 'tbl_gender.id=tbl_college.gender_accepted')->join('tbl_stream', 'tbl_stream.id=tbl_college.stream')->join('tbl_country','tbl_country.id=tbl_college.country')->join('tbl_state','tbl_state.id=tbl_college.state')->join('tbl_city','tbl_city.id=tbl_college.city')->join('tbl_sub_district','tbl_sub_district.id=tbl_college.subdistrict')->join('tbl_ownership','tbl_ownership.id=tbl_college.ownership')->join('tbl_users','tbl_users.id=tbl_college.added_by')->where(['tbl_college.establishment'=>$date])->get('tbl_college')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }
    
     public function GetcollegeByGender_accepted($gender =null)
    {
        try {
            $data = $this->db->select('tbl_college.*, tbl_gender.gender, tbl_stream.stream, tbl_country.name, tbl_state.name, tbl_city.city, tbl_sub_district.sub_district, tbl_ownership.title, tbl_users.name' )->join('tbl_gender', 'tbl_gender.id=tbl_college.gender_accepted')->join('tbl_stream', 'tbl_stream.id=tbl_college.stream')->join('tbl_country','tbl_country.id=tbl_college.country')->join('tbl_state','tbl_state.id=tbl_college.state')->join('tbl_city','tbl_city.id=tbl_college.city')->join('tbl_sub_district','tbl_sub_district.id=tbl_college.subdistrict')->join('tbl_ownership','tbl_ownership.id=tbl_college.ownership')->join('tbl_users','tbl_users.id=tbl_college.added_by')->where(['tbl_college.gender'=>$gender])->get('tbl_college')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    } 


    public function GetcollegeByStream($stream =null)
    {
        try {
            $data = $this->db->select('tbl_college.*, tbl_gender.gender, tbl_stream.stream, tbl_country.name, tbl_state.name, tbl_city.city, tbl_sub_district.sub_district, tbl_ownership.title, tbl_users.name' )->join('tbl_gender', 'tbl_gender.id=tbl_college.gender_accepted')->join('tbl_stream', 'tbl_stream.id=tbl_college.stream')->join('tbl_country','tbl_country.id=tbl_college.country')->join('tbl_state','tbl_state.id=tbl_college.state')->join('tbl_city','tbl_city.id=tbl_college.city')->join('tbl_sub_district','tbl_sub_district.id=tbl_college.subdistrict')->join('tbl_ownership','tbl_ownership.id=tbl_college.ownership')->join('tbl_users','tbl_users.id=tbl_college.added_by')->where(['tbl_college.stream'=>$stream])->get('tbl_college')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    } 

    public function GetcollegeByCourse_offered($course_offered =null)
    {
        try {
            $data = $this->db->select('tbl_college.*, tbl_gender.gender, tbl_stream.stream, tbl_country.name, tbl_state.name, tbl_city.city, tbl_sub_district.sub_district, tbl_ownership.title, tbl_users.name' )->join('tbl_gender', 'tbl_gender.id=tbl_college.gender_accepted')->join('tbl_stream', 'tbl_stream.id=tbl_college.stream')->join('tbl_country','tbl_country.id=tbl_college.country')->join('tbl_state','tbl_state.id=tbl_college.state')->join('tbl_city','tbl_city.id=tbl_college.city')->join('tbl_sub_district','tbl_sub_district.id=tbl_college.subdistrict')->join('tbl_ownership','tbl_ownership.id=tbl_college.ownership')->join('tbl_users','tbl_users.id=tbl_college.added_by')->where(['tbl_college.course_offered'=>$course_offered])->get('tbl_college')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    } 

    public function GetcollegeByCountry($country =null)
    {
        try {
            $data = $this->db->select('tbl_college.*, tbl_gender.gender, tbl_stream.stream, tbl_country.name, tbl_state.name, tbl_city.city, tbl_sub_district.sub_district, tbl_ownership.title, tbl_users.name' )->join('tbl_gender', 'tbl_gender.id=tbl_college.gender_accepted')->join('tbl_stream', 'tbl_stream.id=tbl_college.stream')->join('tbl_country','tbl_country.id=tbl_college.country')->join('tbl_state','tbl_state.id=tbl_college.state')->join('tbl_city','tbl_city.id=tbl_college.city')->join('tbl_sub_district','tbl_sub_district.id=tbl_college.subdistrict')->join('tbl_ownership','tbl_ownership.id=tbl_college.ownership')->join('tbl_users','tbl_users.id=tbl_college.added_by')->where(['tbl_college.country'=>$country])->get('tbl_college')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    } 

     public function GetcollegeByState($state =null)
    {
        try {
            $data = $this->db->select('tbl_college.*, tbl_gender.gender, tbl_stream.stream, tbl_country.name, tbl_state.name, tbl_city.city, tbl_sub_district.sub_district, tbl_ownership.title, tbl_users.name' )->join('tbl_gender', 'tbl_gender.id=tbl_college.gender_accepted')->join('tbl_stream', 'tbl_stream.id=tbl_college.stream')->join('tbl_country','tbl_country.id=tbl_college.country')->join('tbl_state','tbl_state.id=tbl_college.state')->join('tbl_city','tbl_city.id=tbl_college.city')->join('tbl_sub_district','tbl_sub_district.id=tbl_college.subdistrict')->join('tbl_ownership','tbl_ownership.id=tbl_college.ownership')->join('tbl_users','tbl_users.id=tbl_college.added_by')->where(['tbl_college.state'=>$state])->get('tbl_college')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    } 

    public function GetcollegeByCity($city =null)
    {
        try {
            $data = $this->db->select('tbl_college.*, tbl_gender.gender, tbl_stream.stream, tbl_country.name, tbl_state.name, tbl_city.city, tbl_sub_district.sub_district, tbl_ownership.title, tbl_users.name' )->join('tbl_gender', 'tbl_gender.id=tbl_college.gender_accepted')->join('tbl_stream', 'tbl_stream.id=tbl_college.stream')->join('tbl_country','tbl_country.id=tbl_college.country')->join('tbl_state','tbl_state.id=tbl_college.state')->join('tbl_city','tbl_city.id=tbl_college.city')->join('tbl_sub_district','tbl_sub_district.id=tbl_college.subdistrict')->join('tbl_ownership','tbl_ownership.id=tbl_college.ownership')->join('tbl_users','tbl_users.id=tbl_college.added_by')->where(['tbl_college.city'=>$city])->get('tbl_college')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    } 

    public function GetcollegeBySubdistrict($subdistrict =null)
    {
        try {
            $data = $this->db->select('tbl_college.*, tbl_gender.gender, tbl_stream.stream, tbl_country.name, tbl_state.name, tbl_city.city, tbl_sub_district.sub_district, tbl_ownership.title, tbl_users.name' )->join('tbl_gender', 'tbl_gender.id=tbl_college.gender_accepted')->join('tbl_stream', 'tbl_stream.id=tbl_college.stream')->join('tbl_country','tbl_country.id=tbl_college.country')->join('tbl_state','tbl_state.id=tbl_college.state')->join('tbl_city','tbl_city.id=tbl_college.city')->join('tbl_sub_district','tbl_sub_district.id=tbl_college.subdistrict')->join('tbl_ownership','tbl_ownership.id=tbl_college.ownership')->join('tbl_users','tbl_users.id=tbl_college.added_by')->where(['tbl_college.subdistrict'=>$subdistrict])->get('tbl_college')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    } 

     public function GetcollegeByApproved_by($approved_by =null)
    {
        try {
            $data = $this->db->select('tbl_college.*, tbl_gender.gender, tbl_stream.stream, tbl_country.name, tbl_state.name, tbl_city.city, tbl_sub_district.sub_district, tbl_ownership.title, tbl_users.name' )->join('tbl_gender', 'tbl_gender.id=tbl_college.gender_accepted')->join('tbl_stream', 'tbl_stream.id=tbl_college.stream')->join('tbl_country','tbl_country.id=tbl_college.country')->join('tbl_state','tbl_state.id=tbl_college.state')->join('tbl_city','tbl_city.id=tbl_college.city')->join('tbl_sub_district','tbl_sub_district.id=tbl_college.subdistrict')->join('tbl_ownership','tbl_ownership.id=tbl_college.ownership')->join('tbl_users','tbl_users.id=tbl_college.added_by')->where(['tbl_college.approved_by'=>$approved_by])->get('tbl_college')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    } 

     public function GetcollegeByOwnership($ownership =null)
    {
        try {
            $data = $this->db->select('tbl_college.*, tbl_gender.gender, tbl_stream.stream, tbl_country.name, tbl_state.name, tbl_city.city, tbl_sub_district.sub_district, tbl_ownership.title, tbl_users.name' )->join('tbl_gender', 'tbl_gender.id=tbl_college.gender_accepted')->join('tbl_stream', 'tbl_stream.id=tbl_college.stream')->join('tbl_country','tbl_country.id=tbl_college.country')->join('tbl_state','tbl_state.id=tbl_college.state')->join('tbl_city','tbl_city.id=tbl_college.city')->join('tbl_sub_district','tbl_sub_district.id=tbl_college.subdistrict')->join('tbl_ownership','tbl_ownership.id=tbl_college.ownership')->join('tbl_users','tbl_users.id=tbl_college.added_by')->where(['tbl_college.ownership'=>$ownership])->get('tbl_college')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    } 

    public function GetcollegeByAdded_by($added_by =null)
    {
        try {
            $data = $this->db->select('tbl_college.*, tbl_gender.gender, tbl_stream.stream, tbl_country.name, tbl_state.name, tbl_city.city, tbl_sub_district.sub_district, tbl_ownership.title, tbl_users.name' )->join('tbl_gender', 'tbl_gender.id=tbl_college.gender_accepted')->join('tbl_stream', 'tbl_stream.id=tbl_college.stream')->join('tbl_country','tbl_country.id=tbl_college.country')->join('tbl_state','tbl_state.id=tbl_college.state')->join('tbl_city','tbl_city.id=tbl_college.city')->join('tbl_sub_district','tbl_sub_district.id=tbl_college.subdistrict')->join('tbl_ownership','tbl_ownership.id=tbl_college.ownership')->join('tbl_users','tbl_users.id=tbl_college.added_by')->where(['tbl_college.added_by'=>$added_by])->get('tbl_college')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    } 

     public function Getfee()
    {
        try {
            $data = $this->db->select('tbl_college_fees.*, tbl_college.full_name, tbl_feeshead.fee_head_name,tbl_course.course')->join('tbl_college', 'tbl_college.id=tbl_college_fees.college_id')->join('tbl_feeshead', 'tbl_feeshead.id=tbl_college_fees.fee_head_id')->join('tbl_course','tbl_course.id=tbl_college_fees.course_id') ->get('tbl_college_fees')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetfeeById($id =null)
    {
        try {
            $data = $this->db->select('tbl_college_fees.*, tbl_college.full_name, tbl_feeshead.fee_head_name,tbl_course.course')->join('tbl_college', 'tbl_college.id=tbl_college_fees.college_id')->join('tbl_feeshead', 'tbl_feeshead.id=tbl_college_fees.fee_head_id')->join('tbl_course','tbl_course.id=tbl_college_fees.course_id')->where(['tbl_college_fees.id'=>$id])->get('tbl_college_fees')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetfeeByCollege($college_id =null)
    {
        try {
            $data = $this->db->select('tbl_college_fees.*, tbl_college.full_name, tbl_feeshead.fee_head_name,tbl_course.course')->join('tbl_college', 'tbl_college.id=tbl_college_fees.college_id')->join('tbl_feeshead', 'tbl_feeshead.id=tbl_college_fees.fee_head_id')->join('tbl_course','tbl_course.id=tbl_college_fees.course_id')->where(['tbl_college_fees.college_id'=>$college_id])->get('tbl_college_fees')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetfeeByFee_head($fee_head_id =null)
    {
        try {
            $data = $this->db->select('tbl_college_fees.*, tbl_college.full_name, tbl_feeshead.fee_head_name,tbl_course.course')->join('tbl_college', 'tbl_college.id=tbl_college_fees.college_id')->join('tbl_feeshead', 'tbl_feeshead.id=tbl_college_fees.fee_head_id')->join('tbl_course','tbl_course.id=tbl_college_fees.course_id')->where(['tbl_college_fees.fee_head_id'=>$fee_head_id])->get('tbl_college_fees')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    } 

    public function GetfeeByCourse($course_id =null)
    {
        try {
            $data = $this->db->select('tbl_college_fees.*, tbl_college.full_name, tbl_feeshead.fee_head_name,tbl_course.course')->join('tbl_college', 'tbl_college.id=tbl_college_fees.college_id')->join('tbl_feeshead', 'tbl_feeshead.id=tbl_college_fees.fee_head_id')->join('tbl_course','tbl_course.id=tbl_college_fees.course_id')->where(['tbl_college_fees.course_id'=>$course_id])->get('tbl_college_fees')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetfeeByYear($year =null)
    {
        try {
            $data = $this->db->select('tbl_college_fees.*, tbl_college.full_name, tbl_feeshead.fee_head_name,tbl_course.course')->join('tbl_college', 'tbl_college.id=tbl_college_fees.college_id')->join('tbl_feeshead', 'tbl_feeshead.id=tbl_college_fees.fee_head_id')->join('tbl_course','tbl_course.id=tbl_college_fees.course_id')->where(['tbl_college_fees.year'=>$year])->get('tbl_college_fees')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetfeeByCourseAndYear($course_id=null, $year =null)
    {
        try {
            $data = $this->db->select('tbl_college_fees.*, tbl_college.full_name, tbl_feeshead.fee_head_name,tbl_course.course')->join('tbl_college', 'tbl_college.id=tbl_college_fees.college_id')->join('tbl_feeshead', 'tbl_feeshead.id=tbl_college_fees.fee_head_id')->join('tbl_course','tbl_course.id=tbl_college_fees.course_id')->where(['tbl_college_fees.year'=>$year])->where(['tbl_college_fees.course_id'=>$course_id])->get('tbl_college_fees')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetfeeByCollegeAndCourseAndYear($college_id=null, $course_id=null ,$year =null )
    {
        try {
            $data = $this->db->select('tbl_college_fees.*, tbl_college.full_name, tbl_feeshead.fee_head_name,tbl_course.course')->join('tbl_college', 'tbl_college.id=tbl_college_fees.college_id')->join('tbl_feeshead', 'tbl_feeshead.id=tbl_college_fees.fee_head_id')->join('tbl_course','tbl_course.id=tbl_college_fees.course_id')->where(['tbl_college_fees.year'=>$year])->where(['tbl_college_fees.course_id'=>$course_id])->where(['tbl_college_fees.college_id'=>$college_id])->get('tbl_college_fees')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetSeat_matrix()
    {
        try {
            // $streamList = $this->master->getRecords('tbl_stream',[]);
            $seatList = $this->master->getRecords('tbl_college_seat_matrix_data',[]);
            $finalseat = array();
            foreach ($seatList as $seat) {
                $streamList = $this->master->getRecords('tbl_stream',['id' => $seat['stream_id']]);
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
                        $branchs =$this->db->select('*')->where('degree_type',$degree['degree_type'])->where('stream',$stream['id'], 'branch_type',$course['branch_type'])->get('tbl_course')->result_array();
                            $finalcourse=array();
                            

                            foreach ($branchs as $branch) {
                                $finalbranch[]=$branch;
                            }

                        $bra['branch']=$finalbranch;
                        $finalcourse[]=$bra;
                        }

                        $deg['courses']=$finalcourse;
                        $finaldegree[]=$deg;


                    }
                    $stream['degreetype']=$finaldegree;
                    $finalstream[]=$stream;
                }

                $seat['stream']=$finalstream;
                $finalseat[]=$seat;


            }    
            // echo '<pre>';
            // print_r($finalstream);

            
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$finalseat);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }


    public function Getcounselling_head()
    {
        try {
            $data = $this->db->select('tbl_counselling_head.*, tbl_state.name')->join('tbl_state', 'tbl_state.id=tbl_counselling_head.state_id')->get('tbl_counselling_head')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function Getcounselling_headById($id=null)
    {
        try {
           $data = $this->db->select('tbl_counselling_head.*, tbl_state.name')->join('tbl_state', 'tbl_state.id=tbl_counselling_head.state_id')->where(['tbl_counselling_head.id'=>$id])->get('tbl_counselling_head')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }
    

    public function Getcounselling_headByState($state_id=null)
    {
        try {
           $data = $this->db->select('tbl_counselling_head.*, tbl_state.name')->join('tbl_state', 'tbl_state.id=tbl_counselling_head.state_id')->where(['tbl_counselling_head.state_id'=>$state_id])->get('tbl_counselling_head')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }


    public function Getcounsellng_plans()
    {
        try {
            $data = $this->db->select('tbl_counsellng_plans.*, tbl_degree_type.degreetype, tbl_course.course')->join('tbl_degree_type', 'tbl_degree_type.id=tbl_counsellng_plans.degree_type_id')->join('tbl_course', 'tbl_course.id=tbl_counsellng_plans.course_id')->get('tbl_counsellng_plans')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function Getcounsellng_plansById($id=null)
    {
        try {
            $data = $this->db->select('tbl_counsellng_plans.*, tbl_degree_type.degreetype, tbl_course.course')->join('tbl_degree_type', 'tbl_degree_type.id=tbl_counsellng_plans.degree_type_id')->join('tbl_course', 'tbl_course.id=tbl_counsellng_plans.course_id')->where(['tbl_counsellng_plans.id'=>$id])->get('tbl_counsellng_plans')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function Getcounsellng_plansByDegree($degree_type_id=null)
    {
        try {
            $data = $this->db->select('tbl_counsellng_plans.*, tbl_degree_type.degreetype, tbl_course.course')->join('tbl_degree_type', 'tbl_degree_type.id=tbl_counsellng_plans.degree_type_id')->join('tbl_course', 'tbl_course.id=tbl_counsellng_plans.course_id')->where(['tbl_counsellng_plans.degree_type_id'=>$degree_type_id])->get('tbl_counsellng_plans')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function Getcounsellng_plansByCourse($course_id=null)
    {
        try {
            $data = $this->db->select('tbl_counsellng_plans.*, tbl_degree_type.degreetype, tbl_course.course')->join('tbl_degree_type', 'tbl_degree_type.id=tbl_counsellng_plans.degree_type_id')->join('tbl_course', 'tbl_course.id=tbl_counsellng_plans.course_id')->where(['tbl_counsellng_plans.course_id'=>$course_id])->get('tbl_counsellng_plans')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function Getcourse()
    {
        try {
            $data = $this->db->select('tbl_course.*, tbl_stream.stream, tbl_degree_type.degreetype, tbl_exam.exam as exam_full_name, tbl_coursegroup.title')->join('tbl_stream', 'tbl_stream.id=tbl_course.stream')->join('tbl_degree_type', 'tbl_degree_type.id=tbl_course.degree_type')->join('tbl_exam', 'tbl_exam.id=tbl_course.exam')->join('tbl_coursegroup', 'tbl_coursegroup.id=tbl_course.coursegroup')->get('tbl_course')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetcourseById($id=null)
    {
        try {
            $data = $this->db->select('tbl_course.*, tbl_stream.stream, tbl_degree_type.degreetype, tbl_exam.exam as exam_full_name, tbl_coursegroup.title')->join('tbl_stream', 'tbl_stream.id=tbl_course.stream')->join('tbl_degree_type', 'tbl_degree_type.id=tbl_course.degree_type')->join('tbl_exam', 'tbl_exam.id=tbl_course.exam')->join('tbl_coursegroup', 'tbl_coursegroup.id=tbl_course.coursegroup')->where(['tbl_course.id'=>$id])->get('tbl_course')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetcourseByStream($stream=null)
    {
        try {
            $data = $this->db->select('tbl_course.*, tbl_stream.stream, tbl_degree_type.degreetype, tbl_exam.exam as exam_full_name, tbl_coursegroup.title')->join('tbl_stream', 'tbl_stream.id=tbl_course.stream')->join('tbl_degree_type', 'tbl_degree_type.id=tbl_course.degree_type')->join('tbl_exam', 'tbl_exam.id=tbl_course.exam')->join('tbl_coursegroup', 'tbl_coursegroup.id=tbl_course.coursegroup')->where(['tbl_course.stream'=>$stream])->get('tbl_course')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    } 


    public function GetcourseByDegree_type($degree_type=null)
    {
        try {
            $data = $this->db->select('tbl_course.*, tbl_stream.stream, tbl_degree_type.degreetype, tbl_exam.exam as exam_full_name, tbl_coursegroup.title')->join('tbl_stream', 'tbl_stream.id=tbl_course.stream')->join('tbl_degree_type', 'tbl_degree_type.id=tbl_course.degree_type')->join('tbl_exam', 'tbl_exam.id=tbl_course.exam')->join('tbl_coursegroup', 'tbl_coursegroup.id=tbl_course.coursegroup')->where(['tbl_course.degree_type'=>$degree_type])->get('tbl_course')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    } 

    public function GetcourseBExam($exam=null)
    {
        try {
            $data = $this->db->select('tbl_course.*, tbl_stream.stream, tbl_degree_type.degreetype, tbl_exam.exam as exam_full_name, tbl_coursegroup.title')->join('tbl_stream', 'tbl_stream.id=tbl_course.stream')->join('tbl_degree_type', 'tbl_degree_type.id=tbl_course.degree_type')->join('tbl_exam', 'tbl_exam.id=tbl_course.exam')->join('tbl_coursegroup', 'tbl_coursegroup.id=tbl_course.coursegroup')->where(['tbl_course.exam'=>$exam])->get('tbl_course')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetcourseByStatus($status=null)
    {
        try {
            $data = $this->db->select('tbl_course.*, tbl_stream.stream, tbl_degree_type.degreetype, tbl_exam.exam as exam_full_name, tbl_coursegroup.title')->join('tbl_stream', 'tbl_stream.id=tbl_course.stream')->join('tbl_degree_type', 'tbl_degree_type.id=tbl_course.degree_type')->join('tbl_exam', 'tbl_exam.id=tbl_course.exam')->join('tbl_coursegroup', 'tbl_coursegroup.id=tbl_course.coursegroup')->where(['tbl_course.status'=>$status])->get('tbl_course')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetcourseByCoursegroup($coursegroup=null)
    {
        try 
        {
            $data = $this->db->select('tbl_course.*, tbl_stream.stream, tbl_degree_type.degreetype, tbl_exam.exam as exam_full_name, tbl_coursegroup.title')->join('tbl_stream', 'tbl_stream.id=tbl_course.stream')->join('tbl_degree_type', 'tbl_degree_type.id=tbl_course.degree_type')->join('tbl_exam', 'tbl_exam.id=tbl_course.exam')->join('tbl_coursegroup', 'tbl_coursegroup.id=tbl_course.coursegroup')->where(['tbl_course.coursegroup'=>$coursegroup])->get('tbl_course')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function Getcoursegroup()
    {
        try {
            $data = $this->master->getRecords('tbl_coursegroup',[]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetcoursegroupById($id =null)
    {
        try {
            $data = $this->master->singleRecord('tbl_coursegroup',['id' => $id]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function Getcutfoff_marks_data()
    {
        try 
        {
            $data = $this->db->select('tbl_cutfoff_marks_data.*, tbl_college.full_name, tbl_course.course, tbl_branch.branch, tbl_category.category_name, tbl_counselling_head.head_name')->join('tbl_college', 'tbl_college.id=tbl_cutfoff_marks_data.college_id')->join('tbl_course', 'tbl_course.id=tbl_cutfoff_marks_data.course_id')->join('tbl_branch', 'tbl_branch.id=tbl_cutfoff_marks_data.branch_id')->join('tbl_category', 'tbl_category.id=tbl_cutfoff_marks_data.category_type')->join('tbl_counselling_head', 'tbl_counselling_head.id=tbl_cutfoff_marks_data.cutoff_head')->get('tbl_cutfoff_marks_data')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

   

    public function Getcutfoff_marks_dataById($id=null)
    {
        try 
        {
            $data = $this->db->select('tbl_cutfoff_marks_data.*, tbl_college.full_name, tbl_course.course, tbl_branch.branch, tbl_category.category_name, tbl_counselling_head.head_name')->join('tbl_college', 'tbl_college.id=tbl_cutfoff_marks_data.college_id')->join('tbl_course', 'tbl_course.id=tbl_cutfoff_marks_data.course_id')->join('tbl_branch', 'tbl_branch.id=tbl_cutfoff_marks_data.branch_id')->join('tbl_category', 'tbl_category.id=tbl_cutfoff_marks_data.category_type')->join('tbl_counselling_head', 'tbl_counselling_head.id=tbl_cutfoff_marks_data.cutoff_head')->where(['tbl_cutfoff_marks_data.id'=>$id])->get('tbl_cutfoff_marks_data')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }


    public function Getcutfoff_marks_dataByCollege($college_id=null)
    {
        try 
        {
            $data = $this->db->select('tbl_cutfoff_marks_data.*, tbl_college.full_name, tbl_course.course, tbl_branch.branch, tbl_category.category_name, tbl_counselling_head.head_name')->join('tbl_college', 'tbl_college.id=tbl_cutfoff_marks_data.college_id')->join('tbl_course', 'tbl_course.id=tbl_cutfoff_marks_data.course_id')->join('tbl_branch', 'tbl_branch.id=tbl_cutfoff_marks_data.branch_id')->join('tbl_category', 'tbl_category.id=tbl_cutfoff_marks_data.category_type')->join('tbl_counselling_head', 'tbl_counselling_head.id=tbl_cutfoff_marks_data.cutoff_head')->where(['tbl_cutfoff_marks_data.college_id'=>$college_id])->get('tbl_cutfoff_marks_data')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function Getcutfoff_marks_dataByCourse($course_id=null)
    {
        try 
        {
            $data = $this->db->select('tbl_cutfoff_marks_data.*, tbl_college.full_name, tbl_course.course, tbl_branch.branch, tbl_category.category_name, tbl_counselling_head.head_name')->join('tbl_college', 'tbl_college.id=tbl_cutfoff_marks_data.college_id')->join('tbl_course', 'tbl_course.id=tbl_cutfoff_marks_data.course_id')->join('tbl_branch', 'tbl_branch.id=tbl_cutfoff_marks_data.branch_id')->join('tbl_category', 'tbl_category.id=tbl_cutfoff_marks_data.category_type')->join('tbl_counselling_head', 'tbl_counselling_head.id=tbl_cutfoff_marks_data.cutoff_head')->where(['tbl_cutfoff_marks_data.course_id'=>$course_id])->get('tbl_cutfoff_marks_data')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function Getcutfoff_marks_dataByBranch($branch_id=null)
    {
        try 
        {
            $data = $this->db->select('tbl_cutfoff_marks_data.*, tbl_college.full_name, tbl_course.course, tbl_branch.branch, tbl_category.category_name, tbl_counselling_head.head_name')->join('tbl_college', 'tbl_college.id=tbl_cutfoff_marks_data.college_id')->join('tbl_course', 'tbl_course.id=tbl_cutfoff_marks_data.course_id')->join('tbl_branch', 'tbl_branch.id=tbl_cutfoff_marks_data.branch_id')->join('tbl_category', 'tbl_category.id=tbl_cutfoff_marks_data.category_type')->join('tbl_counselling_head', 'tbl_counselling_head.id=tbl_cutfoff_marks_data.cutoff_head')->where(['tbl_cutfoff_marks_data.branch_id'=>$branch_id])->get('tbl_cutfoff_marks_data')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function Getcutfoff_marks_dataByCategory_type($category_type=null)
    {
        try 
        {
            $data = $this->db->select('tbl_cutfoff_marks_data.*, tbl_college.full_name, tbl_course.course, tbl_branch.branch, tbl_category.category_name, tbl_counselling_head.head_name')->join('tbl_college', 'tbl_college.id=tbl_cutfoff_marks_data.college_id')->join('tbl_course', 'tbl_course.id=tbl_cutfoff_marks_data.course_id')->join('tbl_branch', 'tbl_branch.id=tbl_cutfoff_marks_data.branch_id')->join('tbl_category', 'tbl_category.id=tbl_cutfoff_marks_data.category_type')->join('tbl_counselling_head', 'tbl_counselling_head.id=tbl_cutfoff_marks_data.cutoff_head')->where(['tbl_cutfoff_marks_data.category_type'=>$category_type])->get('tbl_cutfoff_marks_data')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function Getcutfoff_marks_dataByCutoff_head($cutoff_head=null)
    {
        try 
        {
            $data = $this->db->select('tbl_cutfoff_marks_data.*, tbl_college.full_name, tbl_course.course, tbl_branch.branch, tbl_category.category_name, tbl_counselling_head.head_name')->join('tbl_college', 'tbl_college.id=tbl_cutfoff_marks_data.college_id')->join('tbl_course', 'tbl_course.id=tbl_cutfoff_marks_data.course_id')->join('tbl_branch', 'tbl_branch.id=tbl_cutfoff_marks_data.branch_id')->join('tbl_category', 'tbl_category.id=tbl_cutfoff_marks_data.category_type')->join('tbl_counselling_head', 'tbl_counselling_head.id=tbl_cutfoff_marks_data.cutoff_head')->where(['tbl_cutfoff_marks_data.cutoff_head'=>$cutoff_head])->get('tbl_cutfoff_marks_data')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }


    public function Gettbl_degree_type()
    {
        try {
            $data = $this->master->getRecords('tbl_degree_type',[]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function Gettbl_degree_typeById($id =null)
    {
        try {
            $data = $this->master->singleRecord('tbl_degree_type',['id' => $id]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function Getexam()
    {
        try {
            $data = $this->db->select('tbl_exam.*, tbl_degree_type.degreetype')->join('tbl_degree_type', 'tbl_degree_type.id=tbl_exam.degree_type')->get('tbl_exam')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    } 

    public function GetexamById($id=null)
    {
        try {
            $data = $this->db->select('tbl_exam.*, tbl_degree_type.degreetype')->join('tbl_degree_type', 'tbl_degree_type.id=tbl_exam.degree_type')->where(['tbl_exam.id'=>$id])->get('tbl_exam')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }


    public function GetexamByDegree_type($degree_type=null)
    {
        try {
            $data = $this->db->select('tbl_exam.*, tbl_degree_type.degreetype')->join('tbl_degree_type', 'tbl_degree_type.id=tbl_exam.degree_type')->where(['tbl_exam.degree_type'=>$degree_type])->get('tbl_exam')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }


    public function Getfacilities()
    {
        try {
            $data = $this->master->getRecords('tbl_facilities',[]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetfacilitiesById($id =null)
    {
        try {
            $data = $this->master->singleRecord('tbl_facilities',['id' => $id]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function Getfeeshead()
    {
        try {
            $data = $this->master->getRecords('tbl_feeshead',[]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetfeesheadById($id =null)
    {
        try {
            $data = $this->master->singleRecord('tbl_feeshead',['id' => $id]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetgalleryByCollege($college_id=null)
    {
        try {
            $data = $this->db->select('tbl_gallery.*, tbl_gallery_heads.head_name, tbl_uploaded_files.file_name, tbl_college.full_name')->join('tbl_gallery_heads', 'tbl_gallery_heads.id=tbl_gallery.head_id')->join('tbl_uploaded_files', 'tbl_uploaded_files.id=tbl_gallery.media_id')->join('tbl_college', 'tbl_college.id=tbl_gallery.college_id')->where(['tbl_gallery.college_id'=>$college_id])->get('tbl_gallery')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function Getnews()
    {
        try {
            $data = $this->db->select('tbl_news.*, tbl_course.course')->join('tbl_course', 'tbl_course.id=tbl_news.course_id')->get('tbl_news')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetnewsById($id=null)
    {
        try {
            $data = $this->db->select('tbl_news.*, tbl_course.course')->join('tbl_course', 'tbl_course.id=tbl_news.course_id')->where(['tbl_news.id'=>$id])->get('tbl_news')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }

    public function GetnewsByCourse($course_id=null)
    {
        try {
            $data = $this->db->select('tbl_news.*, tbl_course.course')->join('tbl_course', 'tbl_course.id=tbl_news.course_id')->where(['tbl_news.course_id'=>$course_id])->get('tbl_news')->result_array();
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }


    public function GetusersByType($type=null)
    {
         try {
            $data = $this->master->getRecords('tbl_users',['user_type' => $type]);
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$data);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        echo json_encode($response);
    }


      public function Getcountry()
    {
        try {
            $countryList = $this->master->getRecords('tbl_country');
            $finalcountry = array();
            $x = array();
            foreach ($countryList as $country) {
                $finalcountry=$country;
                $stateList = $this->master->getRecords('tbl_state',['country_id' => $country['id']]);
                foreach ($stateList as $state) {
                    $finalstate=array();
                    $finalstate = $state;
                    $cityList = $this->master->getRecords('tbl_city',['country' => $country['id'], 'state_id' => $state['id']]);
                   $finalcity=array();

                    foreach ($cityList as $city) {
                         
                         $finalcity=$city;
                        $sub_districtList = $this->master->getRecords('tbl_sub_district',['country' => $country['id'], 'state' => $state['id'], 'district' => $city['id']]);
                        $finalsub_district=array();

                       foreach ($sub_districtList as $sub_district) {
                            $finalsub_district[]=$sub_district;
                        }
                        $cit['sub_district']=$finalsub_district;
                        $finalcity['district']=$cit;
                    }
                    $sta['city']=$finalcity;
                    $finalstate['city']=$sta;
                }

                $cou['state']=$finalstate;
                $finalcountry['state']=$cou;
                $x[]=$finalcountry;

            }    
    
            echo'<pre>';
            print_r($x);
            
            // $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data' => $finalcountry);
        } catch (Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            $response = array('status'=>500,'message'=>$e->getMessage(),'data'=>[]);
        }
        // $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }













    
}

?>