<?php

Class Experience extends MY_Controller {

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
            $data['pagelink']='experience';
    		$data['user_session'] = $this->session->userdata('user');
    		$data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);	
    		$data['experienceDetails'] = $this->master->getRecords('tbl_work_experience',array('user_id'=>$data['user_session']['id']));
            $data['countryList'] = $this->master->getRecords('countries',[]);
		    $this->load->view('site/experience',$data);
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
    public function editExperienceDetails($id,$slug){
        if ($this->is_user_logged_in() == true) {
            $data['pagelink']='Experience';
            $data['user_session'] = $this->session->userdata('user');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);  
            $data['experienceDetails'] = $this->master->getRecords('tbl_work_experience',array('user_id'=>$data['user_session']['id']));
            $data['singleExperience'] = $this->master->singleRecord('tbl_work_experience',array('id'=>$id,'slug'=>$slug));
            // echo "<pre>";
            // print_r($data['singleExperience']); die;
            $this->load->view('site/experience',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('login');
        }
    }
    public function addExperienceDetails(){
        $this->form_validation->set_rules('company_name', 'Company name', 'trim|required');
        $this->form_validation->set_rules('job_role', 'Job Role', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('from', 'From Date', 'trim|required');
        $this->form_validation->set_rules('to_date', 'End Date', 'trim|required');
         $this->form_validation->set_rules('is_fresher', 'Experience Type', 'trim|required');
        if ($this->form_validation->run()) {
            
            $data['company_name'] = $this->input->post('company_name');
            $data['slug'] = $this->slug($this->input->post('company_name'));
            $data['job_role'] = $this->input->post('job_role');
            $data['description'] = $this->input->post('description');
            $data['start_year'] = $this->input->post('from');
            $data['end_year'] = $this->input->post('to_date');
            $data['is_fresher'] = $this->input->post('is_fresher');
            $data['currently_work'] = $this->input->post('curently_work_here');
            $data['user_id'] = $this->input->post('user_id');
            if($this->input->post('experience_id') == ''){
                $result = $this->master->insert('tbl_work_experience',$data);
                if($result){
                    $response = array('status' => 'success','message' => 'Experience Added successfully','url'=>base_url('experience'));
                    echo json_encode($response);
                    return false;
                }else{
                    $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');                
                    echo json_encode($response);
                    return false;
                }
            }else{
                $data['updated_at'] = date('Y-m-d H:i:s');
                $result = $this->master->updateRecord('tbl_work_experience',array('id'=>$this->input->post('experience_id')),$data);
                if($result){
                    $response = array('status' => 'success','message' => 'Experience updated successfully','url'=>base_url('experience'));
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
                    'company_name' => form_error('company_name'),
                    'job_role' => form_error('job_role'),
                    'description' => form_error('description'),
                    'from' => form_error('from'),
                    'to_date' => form_error('to_date'),
                    'is_fresher' => form_error('is_fresher')
                )  
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteExperience(){
        if ($this->is_user_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_work_experience',array('id'=>$id));
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