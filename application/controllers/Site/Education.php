<?php

Class Education extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('SiteSettings','site');
   	 	$this->load->model('StudentReview','review');
   	 	$this->load->model('CourseCategory','category');
   	 	$this->load->model('CompanyModel','company');
   	 	$this->load->model('BlogModel','blog');
   	 	$this->load->model('LanguageModel','language');
        $this->load->model('MasterModel','master');
        $this->load->model('User','user');
    }
	public function index(){
        if ($this->is_user_logged_in() == true) {
            $data['pagelink']='education';
    		$data['user_session'] = $this->session->userdata('user');
    		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
    		$data['educationDetails'] = $this->master->getRecords('tbl_education',array('user_id'=>$data['user_session']['id']));
		    $this->load->view('site/education',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('login');
        }
	}
	public function get_state(){
		if ($this->is_user_logged_in() == true) {
			$country = $this->input->post('country');
            $stateList = $this->master->getRecords('states',['country_id'=>$country]);
            $html = '<option value="">-------</option>';
            if(!empty($stateList)){
                foreach($stateList as $state){
                    $html .= '<option value="'.$state['id'].'">'.$state['name'].'</option>';
                }
            }
            echo $html;
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('login');
		}
	}

    public function editEducationDetails($id,$slug){
        if ($this->is_user_logged_in() == true) {
            $data['pagelink']='education';
            $data['user_session'] = $this->session->userdata('user');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);  
            $data['educationDetails'] = $this->master->getRecords('tbl_education',array('user_id'=>$data['user_session']['id']));
            $data['singleEducation'] = $this->master->singleRecord('tbl_education',array('id'=>$id,'slug'=>$slug));

            $this->load->view('site/education',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('login');
        }
    }
    public function addEducationDetails(){
        $this->form_validation->set_rules('qualification', 'Qualification', 'trim|required');
        $this->form_validation->set_rules('institute_name', 'Institute Name', 'trim|required');
        $this->form_validation->set_rules('course_type', 'Course Name', 'trim|required');
        $this->form_validation->set_rules('specialization', 'Specialization', 'trim|required');
        $this->form_validation->set_rules('start_year', 'Start Year', 'trim|required');
        $this->form_validation->set_rules('end_year', 'End Year', 'trim|required');
        if ($this->form_validation->run()) {
            
            $data['qualification'] = $this->input->post('qualification');
            $data['slug'] = $this->slug($this->input->post('qualification'));
            $data['institute_name'] = $this->input->post('institute_name');
            $data['degree'] = $this->input->post('course_type');
            $data['specialization'] = $this->input->post('specialization');
            $data['start_year'] = $this->input->post('start_year');
            $data['end_year'] = $this->input->post('end_year');
            $data['user_id'] = $this->input->post('user_id');
            if($this->input->post('education_id') == ''){
                $result = $this->master->insert('tbl_education',$data);
                if($result){
                    $response = array('status' => 'success','message' => 'Education Added successfully','url'=>base_url('education'));
                    echo json_encode($response);
                    return false;
                }else{
                    $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');                
                    echo json_encode($response);
                    return false;
                }
            }else{
                $data['updated_at'] = date('Y-m-d H:i:s');
                $result = $this->master->updateRecord('tbl_education',array('id'=>$this->input->post('education_id')),$data);
                if($result){
                    $response = array('status' => 'success','message' => 'Education updated successfully','url'=>base_url('education'));
                    echo json_encode($response);
                    return false;
                }else{
                    $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');                
                    echo json_encode($response);
                    return false;
                }
            }
            
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'qualification' => form_error('qualification'),
                    'institute_name' => form_error('institute_name'),
                    'course_type' => form_error('course_type'),
                    'specialization' => form_error('specialization'),
                    'start_year' => form_error('start_year'),
                    'end_year' => form_error('end_year')
                )  
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteEducation(){
        if ($this->is_user_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_education',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Education deleted successfully','url'=>base_url('education'));
            }else{
                $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
            }
        }else{
             $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
}

?>