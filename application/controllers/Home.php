<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	public function __construct() {
   	 	parent::__construct();
        $this->load->model('MasterModel','master');
    }
	public function index()
	{
		$data['title'] = 'CUTOFFBABA';
		$data['streams']=$this->streamdata();		
		$data['courses']=$this->coursedata([],10);		
		$data['colleges']=$this->collegeData([],'12');
		$data['siteSettings']=$this->db->select('*')->get('tbl_site_settings')->result_array();
		$data['siteSettings']=$data['siteSettings'][0];
		$this->load->view('site/home',$data);
	}
	function streamdata($where=[],$limit=null){
		$streamList = $this->master->getRecordsbyLimit('tbl_stream',$where,$limit);
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
            return $finalstream;
	}
	function coursedata($where=[],$limit=null){
            $courses=$this->db->select('*')->where($where)->limit($limit)->get('tbl_course')->result_array();                   
            return $courses;
	}
	function collegeData($where=[],$limit=null){

		$collegeList = $this->master->getRecordsbyLimit('tbl_college',$where,$limit);
		$collegeData = [];
		if(!empty($collegeList)){
			foreach($collegeList as $key=>$college){
				$course_data = ($college['course_offered']) ? explode('|',$college['course_offered']) : [];
				$gender_data = ($college['gender_accepted']) ? explode('|',$college['gender_accepted']) : [];
				$collegeData[$key]['college_id'] = $college['id'];
				$collegeData[$key]['full_name'] = $college['full_name'];
				$collegeData[$key]['banner'] = $college['college_banner'];
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
				$collegeData[$key]['college_bannerfile']=$college_banner[0]['file_name'];
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
		}
		return $collegeData;
	}

	public function contactUs()
	{
		$data['title'] = 'CUTOFFBABA-Contact Us';		
		$data['streams']=$this->streamdata();		
		$data['siteSettings']=$this->db->select('*')->get('tbl_site_settings')->result_array();
		$data['siteSettings']=$data['siteSettings'][0];
		$this->load->view('site/contact',$data);
	}

	public function aboutUs()
	{
		$data['title'] = 'CUTOFFBABA-About Us';		
		$data['streams']=$this->streamdata();		
		$data['siteSettings']=$this->db->select('*')->get('tbl_site_settings')->result_array();
		$data['siteSettings']=$data['siteSettings'][0];
		$this->load->view('site/about',$data);
	}
	public function coursesByStream($stream=null,$stream_id)
	{
		$data['title'] = 'COURSES | CUTOFFBABA';
		$data['streams']=$this->streamdata();
		$data['siteSettings']=$this->db->select('*')->get('tbl_site_settings')->result_array();
		$data['siteSettings']=$data['siteSettings'][0];
		$data['courseByStreams']=$this->streamdata(['stream'=>str_replace("-"," ",$stream)]);
		$data['stateList']=$this->master->getRecords('tbl_state',[]);
		$data['approvalList']=$this->master->getRecords('tbl_approval',[]);
		$data['ownerList']=$this->master->getRecords('tbl_ownership',[]);
		$data['genderList']=$this->master->getRecords('tbl_gender',[]);
		$data['streamDetails']=$this->master->singleRecord('tbl_stream',['id'=>$stream_id]);
		// echo "<pre>";
		// print_r($data['streamDetails']);die;
		$this->load->view('site/course-by-stream',$data);
	}
	public function getcoursedetail($id=null)
	{
		$data['title'] = 'COLLEGES | CUTOFFBABA';
		$data['streams']=$this->streamdata();
		$data['siteSettings']=$this->db->select('*')->get('tbl_site_settings')->result_array();
		$data['siteSettings']=$data['siteSettings'][0];
		$data['courseDetail']=$this->master->singleRecord('tbl_course',['id'=>$id]);
		$data['courseDetail']=$data['courseDetail'];
		$data['stateList']=$this->master->getRecords('tbl_state',[]);
		$data['approvalList']=$this->master->getRecords('tbl_approval',[]);
		$data['ownerList']=$this->master->getRecords('tbl_ownership',[]);
		$data['genderList']=$this->master->getRecords('tbl_gender',[]);
		
		$colleges=$this->collegeData(['course_offered'=>$id]);
		$data['colleges']=$colleges;
		$this->load->view('site/coursedetail',$data);
	}
	public function collegeDetail($slug=null,$id=null)
	{
		$data['title'] = 'COURSES | CUTOFFBABA';
		$data['streams'] = $this->streamdata();
		$data['siteSettings'] = $this->db->select('*')->get('tbl_site_settings')->result_array();
		$data['siteSettings'] = $data['siteSettings'][0];
		$data['collegeDetail'] = $this->db->select('tbl_college.*, tbl_stream.stream, tbl_country.name, tbl_state.name,o.id as ownership_id,o.title as o_title' )->join('tbl_stream', 'tbl_stream.id=tbl_college.stream')->join('tbl_country','tbl_country.id=tbl_college.country')->join('tbl_ownership as o','o.id=tbl_college.ownership')->join('tbl_state','tbl_state.id=tbl_college.state')->where(['tbl_college.id'=>$id])->get('tbl_college')->result_array();
		$data['collegeDetail'] = $data['collegeDetail'][0];
		$data['collegeGallery'] = $this->master->getRecords('tbl_uploaded_files',['file_data'=>$id]);
		// echo "<pre>";
		// print_r($data['collegeDetail']); die;
		// echo "<pre>";
		// print_r($this->session->userdata('user'));die;
		$this->load->view('site/collegedetail',$data);
	}
	public function stateList($id=null)
	{
		
		$data['streams']=curlInfo('stream');
		$data['siteSettings']=curlInfo('sitesettings');
		$data['states']=curlInfo('states');
		if ($id) {
			
			$data['colleges']=curlInfo('state/'.$id);
			//print_r($data['statedetail']);
			$data['title'] = $data['colleges'][0]->statename;
			$this->load->view('site/state-detail',$data);
		}else{
			$data['title'] = 'States';
			$this->load->view('site/states',$data);
		}
	}
	public function signup()
	{
		$data['title'] = 'SIGNUP | CUTOFFBABA';
		$data['stateList']=$this->master->getRecords('tbl_state',[]);
		$data['examList']=$this->master->getRecords('tbl_exam',[]);
		$data['streams']=$this->streamdata();		
		$data['siteSettings']=$this->db->select('*')->get('tbl_site_settings')->result_array();
		$data['siteSettings']=$data['siteSettings'][0];
		$this->load->view('site/register',$data);
	}
































	public function login()
	{
		$data['title'] = 'LOGIN | CUTOFFBABA';
		$this->load->view('site/login',$data);
	}
	public function forgot_password()
	{
		$data['title'] = 'FORGOT PASSWORD | CUTOFFBABA';
		$this->load->view('site/forgot_password',$data);
	}

	
	public function streams()
	{
		$data['title'] = 'STREAMS | CUTOFFBABA';
		$data['stream'] = $this->master->getRecords('tbl_stream');
		$this->load->view('site/streams',$data);
	}
	public function paymentList()
	{
		$data['title'] = 'Payment History | CUTOFFBABA';
		$data['paymentsData'] = $this->master->getRecords('payments',['user_id'=>$this->session->userdata('user')['id']]);
		$this->load->view('site/payment-list',$data);
	}
	
	public function aboutCourse($course_id)
	{
		$data['title'] = 'ABOUT COURSES | CUTOFFBABA';
		$data['selectedCourse'] = $this->master->singleRecord('tbl_course',['id'=>$course_id]);
		$data['courseLists'] = $this->master->getRecords('tbl_course',['stream'=>$course_id]);
		$data['courseColleges'] = $this->master->getRecordsFindInSet('tbl_college',$course_id,'course_offered');
		$data['userData'] = $this->master->singleRecord('tbl_users',['id'=>$this->session->userdata('user')['id']]);
		$data['stateList'] = $this->master->getStatesWithMinimumCollegeWithCourse($course_id);
		$this->load->view('site/about_us_course',$data);
	}



	
	public function state_wise_colleges($state_id,$course_id)
	{
		$data['title'] = 'State Wise Colleges | CUTOFFBABA';		
		$data['selectedCourse'] = $this->master->singleRecord('tbl_course',['id'=>$course_id]);
		$data['selectedState'] = $this->master->singleRecord('tbl_state',['id'=>$state_id]);
		$data['stateWiseColleges'] = $this->master->getCollegesDataStateWise($state_id,$course_id);
		$data['degreeTypeList'] = $this->master->getRecords('tbl_degree_type',[]);	
		$data['stateList'] = $this->master->getRecords('tbl_state',[]);	
		$data['cityList'] = $this->master->getRecords('tbl_city',[]);	
		$data['examList'] = $this->master->getRecords('tbl_exam',[]);	
		$data['facilityList'] = $this->master->getRecords('tbl_facilities',[]);	
		$data['branchList'] = $this->master->getRecords('tbl_branch',[]);	
		$data['ownershipList'] = $this->master->getRecords('tbl_ownership',[]);	
		$data['userData'] = $this->master->singleRecord('tbl_users',['id'=>$this->session->userdata('user')['id']]);
		$this->load->view('site/state-wise-colleges',$data);
	}
	
	public function browseSuccessStories()
	{
		$data['title'] = 'Our Success Story | CUTOFFBABA';
		$data['settings'] = $this->master->singleRecord('tbl_site_settings',['id'=>1]);
		$data['userData'] = $this->master->singleRecord('tbl_users',['id'=>$this->session->userdata('user')['id']]);
		$this->load->view('site/testomonial-exlore',$data);
	}
	
	public function termsConditions()
	{
		$data['title'] = 'Terms & Conditions | CUTOFFBABA';
		$data['settings'] = $this->master->singleRecord('tbl_site_settings',['id'=>1]);
		$data['userData'] = $this->master->singleRecord('tbl_users',['id'=>$this->session->userdata('user')['id']]);
		$this->load->view('site/terms-condition',$data);
	}
	public function news()
	{
		$data['title'] = 'News | CUTOFFBABA';
		$data['settings'] = $this->master->singleRecord('tbl_site_settings',['id'=>1]);
		$data['userData'] = $this->master->singleRecord('tbl_users',['id'=>$this->session->userdata('user')['id']]);
		$data['newsList'] = $this->master->getRecords('tbl_news');
		$this->load->view('site/news',$data);
	}
	public function privacyPolicy()
	{
		$data['title'] = 'Privacy Policy | CUTOFFBABA';
		$data['settings'] = $this->master->singleRecord('tbl_site_settings',['id'=>1]);
		$data['userData'] = $this->master->singleRecord('tbl_users',['id'=>$this->session->userdata('user')['id']]);
		$this->load->view('site/privacy-policy',$data);
	}
	public function newsDetail($news_id,$news_slug)
	{
		$data['newsData'] = $this->master->singleRecord('tbl_news',['id'=>$news_id]);
		$data['title'] = $data['newsData']['title'].' | CUTOFFBABA';
		$data['settings'] = $this->master->singleRecord('tbl_site_settings',['id'=>1]);
		$data['userData'] = $this->master->singleRecord('tbl_users',['id'=>$this->session->userdata('user')['id']]);
		$data['newsList'] = $this->master->getRecords('tbl_news');
		$this->load->view('site/news-details',$data);
	}
	public function testimonials()
	{
		$this->load->view('site/testimonials');
	}
	public function testimonials_explore()
	{
		$this->load->view('site/testimonials_explore');
	}
	
	public function plan(){
		$data['title'] = 'Counselling Plan | CUTOFFBABA';
		$data['settings'] = $this->master->singleRecord('tbl_site_settings',['id'=>1]);
		$data['userData'] = $this->master->singleRecord('tbl_users',['id'=>$this->session->userdata('user')['id']]);
		$data['planList'] = $this->master->getRecords('tbl_counsellng_plans');
		$this->load->view('site/counselling_plan',$data);
	}
	
	public function filterCollegeData()
	{
		$state_id = $this->input->post('state_id');
		$course_id = $this->input->post('course_id');
		$data['stateWiseColleges'] = $this->master->getCollegesDataStateWise($state_id,$course_id,$_POST);
		$html = $this->load->view('site/child_pages/college_data',$data,true);
		$response = array('status' => 200,'message' => 'Profile Updated successfully','url'=>'','html'=>$html);
		echo json_encode($response);
		return false;
	}


	public function collegePredictor(){
		$data['title'] = 'College Predictor| CUTOFFBABA';
		$data['settings'] = $this->master->singleRecord('tbl_site_settings',['id'=>1]);
		$data['userData'] = $this->master->singleRecord('tbl_users',['id'=>$this->session->userdata('user')['id']]);
		$data['selectedState'] = $this->master->singleRecord('tbl_state',['id'=>$this->session->userdata('user')['current_state']]);
		$data['degreeTypeList'] = $this->master->getRecords('tbl_degree_type');
		$data['userData'] = $this->master->singleRecord('tbl_users',['id'=>$this->session->userdata('user')['id']]);
		$this->load->view('site/college_predictor',$data);
	}



	public function selectedCourse($state_id,$course_id)
	{
		$data['title'] = 'Course Details | CUTOFFBABA';		
		$data['selectedCourse'] = $this->master->singleRecord('tbl_course',['id'=>$course_id]);
		$data['selectedState'] = $this->master->singleRecord('tbl_state',['id'=>$state_id]);
		$data['stateWiseColleges'] = $this->master->getCollegesDataStateWise($state_id,$course_id);
		$data['degreeTypeList'] = $this->master->getRecords('tbl_degree_type',[]);	
		$data['stateList'] = $this->master->getRecords('tbl_state',[]);	
		$data['cityList'] = $this->master->getRecords('tbl_city',[]);	
		$data['examList'] = $this->master->getRecords('tbl_exam',[]);	
		$data['facilityList'] = $this->master->getRecords('tbl_facilities',[]);	
		$data['branchList'] = $this->master->getRecords('tbl_branch',[]);	
		$data['ownershipList'] = $this->master->getRecords('tbl_ownership',[]);	
		$this->load->view('site/state-wise-colleges',$data);
	}

	public function searchPage(){
		$data['title'] = 'Search | CUTOFFBABA';
		$data['settings'] = $this->master->singleRecord('tbl_site_settings',['id'=>1]);
		$this->load->view('site/search_page',$data);
	}
	public function searchContent(){
		$keyword = $this->input->post('keyword');
		$data['stateWiseColleges'] = $this->master->getCollegeForSearch('tbl_college',$keyword);
		$data['coursesByKeyword'] = $this->master->getCoursesForSearch('tbl_course',$keyword);
		$data['stateByKeyword'] = $this->master->getStateForSearch('tbl_state',$keyword);
		$data['keyword'] = $keyword;
		$html = $this->load->view('site/child_pages/search_data',$data,true);
		$response = array('status' => 200,'message' => 'Profile Updated successfully','url'=>'','html'=>$html);
		echo json_encode($response);
		return false;
	}

	public function allColleges()
	{
		$data['title'] = 'Colleges | CUTOFFBABA';		
		$reqData['exam'] = $this->session->userdata('user')['selected_exam'];
		$data['stateWiseColleges'] = $this->master->getCollegesExamWise($reqData);
		$data['degreeTypeList'] = $this->master->getRecords('tbl_degree_type',[]);	
		$data['stateList'] = $this->master->getRecords('tbl_state',[]);	
		$data['cityList'] = $this->master->getRecords('tbl_city',[]);	
		$data['examList'] = $this->master->getRecords('tbl_exam',[]);	
		$data['facilityList'] = $this->master->getRecords('tbl_facilities',[]);	
		$data['branchList'] = $this->master->getRecords('tbl_branch',[]);	
		$data['ownershipList'] = $this->master->getRecords('tbl_ownership',[]);	
		$this->load->view('site/all_colleges',$data);
	}
	public function collegeInfo($tag='',$course_id)
	{
		$data['title'] = 'College Info | CUTOFFBABA';	
		$data['tag'] = $tag;	
		$data['course_id'] = $course_id;	
		$data['courseWiseColleges'] = $this->master->getCollegesCourseWise($course_id);
		$this->load->view('site/college_info',$data);
	}
	
	


	/// College List with pagination 
	public function loadCollegesRecord($id=null,$rowno=1)
	{
		
		$datas = $this->input->post();
		
		$rowperpage = 5;
		if($rowno != 0){  
			$rowno = ($rowno-1) * $rowperpage;  
		}
		$collegeCount = count($this->master->getRecordsbyLimitWithoutPagination('tbl_college',$id,$datas));
		$colleges = $this->master->getRecordsbyLimitForPagination('tbl_college',$id,$rowperpage,$rowno,$datas);
		
		$config['base_url'] = base_url().'/get-college-data'.'/'.$id.'/'.$rowno;
        $config['use_page_numbers'] = TRUE;  
        $config['total_rows'] = $collegeCount;  
        $config['per_page'] = $rowperpage;    
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';  
        $config['full_tag_close']   = '</ul></nav></div>';  
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';  
        $config['num_tag_close']    = '</span></li>';  
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';  
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';  
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';  
        $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';  
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';  
        $config['prev_tag_close']  = '</span></li>';  
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';  
        $config['first_tag_close'] = '</span></li>';  
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';  
        $config['last_tag_close']  = '</span></li>'; 
		$this->pagination->initialize($config);  	
		$data['pagination'] = $this->pagination->create_links();  
        $data['result'] = $colleges;  
        $data['row'] = $rowno; 
		$data['html'] = $this->load->view('site/college-list-pagination',$data,true);
		echo json_encode($data); 
	}
	public function loadCollegesRecordByStream($id=null,$rowno=1)
	{
		
		$datas = $this->input->post();
		
		$rowperpage = 5;
		if($rowno != 0){  
			$rowno = ($rowno-1) * $rowperpage;  
		}
		$collegeCount = count($this->master->getRecordsbyLimitWithoutPaginationForStream('tbl_college',$id,$datas));
		$colleges = $this->master->getRecordsbyLimitForPaginationForStream('tbl_college',$id,$rowperpage,$rowno,$datas);
		
		$config['base_url'] = base_url().'/get-college-data'.'/'.$id.'/'.$rowno;
        $config['use_page_numbers'] = TRUE;  
        $config['total_rows'] = $collegeCount;  
        $config['per_page'] = $rowperpage;    
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';  
        $config['full_tag_close']   = '</ul></nav></div>';  
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';  
        $config['num_tag_close']    = '</span></li>';  
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';  
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';  
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';  
        $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';  
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';  
        $config['prev_tag_close']  = '</span></li>';  
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';  
        $config['first_tag_close'] = '</span></li>';  
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';  
        $config['last_tag_close']  = '</span></li>'; 
		$this->pagination->initialize($config);  	
		$data['pagination'] = $this->pagination->create_links();  
        $data['result'] = $colleges;  
        $data['row'] = $rowno; 
		$data['html'] = $this->load->view('site/college-list-pagination',$data,true);
		echo json_encode($data); 
	}


	public function getSearchFilterData(){
		$search = $this->input->get('search');
		
		$data['colleges'] = $this->master->getCollegeWithLikeQuery($search);
		$data['news'] = $this->master->getNewsWithLikeQuery($search);
		$data['courses'] = $this->master->getCoursesWithLikeQuery($search);
		$data['branches'] = $this->master->getBranchesWithLikeQuery($search);
		$data['html'] = $this->load->view('site/search-data',$data,true);
		echo json_encode($data); 
	}

	public function get_cutoff_matrix(){
		$data = $this->input->post();
		$datas['year'] = $data['year'];
		$datas['collegeDetail'] = $this->master->singleRecord('tbl_college',['id'=>$data['college_id']]);
		$datas['courseid'] = $this->db->select('id as course_id')->where('id',$data['course_id'])->get('tbl_course')->row_array();
		$result = $this->load->view('site/show_college_matrix',$datas,TRUE);
		$response = array('status' => 'success','message'=> 'Colleges found successfully','html'=>$result);
		echo json_encode($response);
		return false;
	}
	public function get_cutoff_state_matrix(){
		$data = $this->input->post();
		$datas['year'] = $data['year'];
		$datas['collegeDetail'] = $this->master->singleRecord('tbl_college',['id'=>$data['college_id']]);
		$datas['courseid'] = $this->db->select('id as course_id')->where('id',$data['course_id'])->get('tbl_course')->row_array();
		$result = $this->load->view('site/show_college_matrix_state',$datas,TRUE);
		$response = array('status' => 'success','message'=> 'Colleges found successfully','html'=>$result);
		echo json_encode($response);
		return false;
	}

	public function submitEnquiry()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        if ($this->form_validation->run()) {
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['phone'] = $this->input->post('phone');
            $data['subject'] = $this->input->post('subject');
            $data['message'] = $this->input->post('message');
            $data['status'] = '1';
            $data['created_at'] = date('Y-m-d H:i:s');
            $result = $this->master->insert('tbl_enquiries',$data);
            if($result){
                $response = array('status' => 'success','message' => 'Enquiry submitted succesfully !!!','url'=>base_url('/'));
            }else{
                $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
            }
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'name' => form_error('name'),
                    'email' => form_error('email'),
                    'phone' => form_error('phone'),
                    'subject' => form_error('subject'),
                    'message' => form_error('message')
                )  
            );

        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
    }
}	
