<?php

Class Dashboard extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('MasterModel','master');
    }
	public function index()
	{
		
		if ($this->is_user_logged_in() == true) {
			$data['siteSettings']=$this->db->select('*')->get('tbl_site_settings')->result_array();
			$data['siteSettings']=$data['siteSettings'][0];
			$this->load->view('site/user/dashboard',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('login');
		}
	}
	public function profile()
	{
		if ($this->is_user_logged_in() == true) {
			$data['pagelink']='profile';
			$data['user_session'] = $this->session->userdata('user');
			$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
			$data['userDetails'] = $this->us->singleRecord('tbl_users',['id'=>$data['user_session']['id']]);
			$data['stateList'] = $this->master->getRecords('states',[]);
			$this->load->view('site/profile',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('login');
		}
	}
	public function login()
	{
		$data['user_session'] = $this->session->userdata('user');
		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
		$data['categoryList'] = $this->category->getCategoriesForFeatured('tbl_course_category',array('parent_id'=>NULL));
		$this->load->view('site/login',$data);
	}
	//Forgot Password
	public function forgotPassword()
	{
		$data['user_session'] = $this->session->userdata('user');
		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
		$data['categoryList'] = $this->category->getCategoriesForFeatured('tbl_course_category',array('parent_id'=>NULL));
		$this->load->view('site/forgotpassword',$data);

	}

	public function get_city(){
		if ($this->is_user_logged_in() == true) {
			$state = $this->input->post('state');
            $cityList = $this->master->getRecords('cities',['state_id'=>$state]);
            $html = '<option value="">-------</option>';
            if(!empty($cityList)){
                foreach($cityList as $city){
                    $html .= '<option value="'.$city['id'].'">'.$city['city'].'</option>';
                }
            }
            echo $html;
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('login');
		}
	}
}

?>