<?php

Class Home extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('SiteSettings','site');
   	 	$this->load->model('StudentReview','review');
   	 	$this->load->model('CourseCategory','category');
   	 	$this->load->model('CompanyModel','company');
   	 	$this->load->model('CourseModel','course');
   	 	$this->load->model('BlogModel','blog');
   	 	$this->load->model('BlogType','blog_type');
        $this->load->model('GroupModel','group');
        $this->load->model('TeamModel','team');
        $this->load->model('CertificateModel','certificate');
        $this->load->model('SliderModel','slider');
    }
	public function index()
	{
		$data['user_session'] = $this->session->userdata('user');
		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
		$data['sliderList'] = $this->slider->getRecords('tbl_slider');
		$this->load->view('site/home',$data);
	}
	public function sendfeedback()
	{
		$data=$this->input->post();
		if($this->db->insert('tbl_feedback',$data)){
			echo " Thank You";
		}
	}
	public function certificate(){
		$data['user_session'] = $this->session->userdata('user');
		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
		$this->load->view('site/certificate',$data);
	}
	public function contactUs(){
		$data['user_session'] = $this->session->userdata('user');
		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
		$this->load->view('site/contactUs',$data);
	}
	public function quizFailed(){
		$data['user_session'] = $this->session->userdata('user');
		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
		$this->load->view('site/quizFailed',$data);
	}
	public function Quiz(){
		$data['user_session'] = $this->session->userdata('user');
		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
		$data['quizquestion']=	$this->team->getRecords('tbl_quiz_question',[]);
		$count=$this->db->select('*')->where('id',$this->session->userdata('user')['id'])->where('quiz_status',1)->get('tbl_users')->result_array();
		if (count($count)>0) {
			redirect('/userdashboard');
		}else{
			$this->load->view('site/quiz',$data);
		}
	}
	public function QuizSubmit(){
		$datax=$this->input->post();
		//print_r($data);
		$correct=0;
		$false=0;
		$notattemp=0;
		foreach($datax as $key => $question){
			$qid=substr($key,1);
			
			$result=$this->db->select('correct_answer')->where('id',$qid)->get('tbl_quiz_question')->result_array();
			if (count($result)>0) {
				if($result[0]['correct_answer']==$question){$correct++;}else{$false++;}
			}

		}
		$notattemp=10-($correct+$false);
		$data['correct']=$correct;
		$data['wrong']=10-$correct;
		$data['noattempt']=$notattemp;
		$data['user_session'] = $this->session->userdata('user');
		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
		if ($correct>6) {
			$insdata['quiz_status']=1;
			$insdata['quiz_result']=1;
			$this->load->view('site/congrats',$data);
		}else{
			$insdata['quiz_status']=1;
			$insdata['quiz_result']=0;
			$this->load->view('site/sorry',$data);
		}
		$this->db->where('id',$this->session->userdata('user')['id'])->update('tbl_users',$insdata);
		
	}
	public function testimonials(){
		$data['user_session'] = $this->session->userdata('user');
		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
		$this->load->view('site/testimonials',$data);
	}
	public function becomeAssociate(){
		$data['user_session'] = $this->session->userdata('user');
		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
		$this->load->view('site/become-associates',$data);
	}
	public function whyUs(){
		$data['user_session'] = $this->session->userdata('user');
		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
		$this->load->view('site/whyUs',$data);
	}
	public function portfolio(){
		$data['user_session'] = $this->session->userdata('user');
		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
		$this->load->view('site/portfolio',$data);
	}
	public function about(){
		$data['user_session'] = $this->session->userdata('user');
		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
		$data['coreList'] = $this->team->getRecords('tbl_team',['group_id'=> 1]);
		$data['mentorsList'] = $this->team->getRecords('tbl_team',['group_id'=>2]);
		$data['certificateList'] = $this->certificate->getRecords('tbl_certification',[]);
		$this->load->view('site/about',$data);
	}
	public function privacyPolicy(){
		$data['user_session'] = $this->session->userdata('user');
		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
		$this->load->view('site/privacyPolicy',$data);
	}
	public function mediaPresence(){
		$data['user_session'] = $this->session->userdata('user');
		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
		$this->load->view('site/mediaPresence',$data);
	}
	public function News(){
		$data['user_session'] = $this->session->userdata('user');
		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
		$this->load->view('site/news',$data);
	}
	public function courseListing(){
		$data['user_session'] = $this->session->userdata('user');
		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
		$this->load->view('site/courseListing',$data);
	}
	public function Faq(){
		$data['user_session'] = $this->session->userdata('user');
		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
		$this->load->view('site/faq',$data);
	}
	public function termsCondition(){
		$data['user_session'] = $this->session->userdata('user');
		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
		$this->load->view('site/termsConditions',$data);
	}
	public function blog($slug=''){
		$data['user_session'] = $this->session->userdata('user');
		if($slug == ''){
			$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
			$this->load->view('site/blogPage',$data);
		}else{
			$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
			$this->load->view('site/blogDetails',$data);
		}
	}
	public function blogFilter($type){
		$data['user_session'] = $this->session->userdata('user');
		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
		$blogType = $this->blog_type->singleRecord('tbl_blog_type',array('slug'=>$type));
		$data['blogType'] = $blogType;
		$data['blogList'] = $this->blog->getRecordsLike('tbl_blog',$blogType['id']);
		$data['type'] = $type;
		$this->load->view('site/blogPage',$data);
	}
	public function returnRefund(){
		$data['user_session'] = $this->session->userdata('user');
		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
		$this->load->view('site/returnRefund',$data);
	}
	public function getTypeWiseReview(){
		$type = $this->input->post('type');
		$data['reviewList'] = $this->review->getStudentReviewsForFrontTypeWise($type);
		$this->load->view('site/allReviewsTypeWise',$data,true);
		$response = array('status' => 'success','message'=> 'Preview generated successfully','url'=>'','html'=>$this->load->view('site/allReviewsTypeWise',$data,true));
        echo json_encode($response);
        return true;
	}
}

?>