<?php
require(APPPATH.'/libraries/REST_Controller.php');

Class MasterApi extends REST_Controller  {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('User','us');
        $this->load->model('SiteSettings','site');
        $this->load->model('CourseCategory','category');
        $this->load->model('MasterModel','master');
    }



    public function get_user_get()
	{
        $category = $this->master->getRecords('tbl_category',[]);
        $response = array('status'=>200,'message'=>'Data fetched successfully!!!!!','data'=>$category);
        $this->response($response, REST_Controller::HTTP_OK);
	}
}

?>