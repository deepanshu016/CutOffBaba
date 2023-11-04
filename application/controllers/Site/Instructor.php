<?php

Class Instructor extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('SiteSettings','site');
   	 	$this->load->model('CourseCategory','category');
   	 	$this->load->model('User','user');
    }
	public function getAllInstructor()
	{
		$data['user_session'] = $this->session->userdata('user');
		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
		$data['categoryList'] = $this->category->getCategoriesForFeatured('tbl_course_category',array('parent_id'=>NULL));
	 	$config = array();
        $config["base_url"] = base_url() . "instructors";
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $config["total_rows"] = $this->user->get_count(3,[]);
        $config["per_page"] = 1;
        $config["uri_segment"] = 2;
        $config['full_tag_open'] = '<ul class="pagination p-center">';
        $config['full_tag_close'] = '</ul>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $this->pagination->initialize($config);
        $data['total'] = $config['total_rows'];
        $data['startCount'] = (int)$this->uri->segment(3) + 1;
        if ($this->uri->segment(3) + $config['per_page'] > $config['total_rows']) {
            $data['endCount'] = $config['total_rows'];
        } else {
            $data['endCount'] = (int)$this->uri->segment(3) + $config['per_page'];
        }
        $data["links"] = $this->pagination->create_links();
        $data['instructorData'] = $this->user->getPaginatedData(3,$config["per_page"], $page);
		$this->load->view('site/instructorList',$data);
	}
}

?>