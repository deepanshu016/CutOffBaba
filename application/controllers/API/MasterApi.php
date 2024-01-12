<?php



Class MasterApi extends MY_Controller  {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('User','us');
        $this->load->model('SiteSettings','site');
        $this->load->model('CourseCategory','category');
        $this->load->model('MasterModel','master');
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
            $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$streamList);
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
}

?>