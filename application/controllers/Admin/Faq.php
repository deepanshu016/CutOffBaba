<?php

Class Faq extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('FAQModel','faq');
        $this->load->model('SiteSettings','site');
    }
	public function index()
	{
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
            $data['faqList'] = $this->faq->getRecords('tbl_faq'); 
			$this->load->view('admin/faq/list',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
	public function add(){
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
			$this->load->view('admin/faq/add-edit',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
    public function editFaq($id,$slug){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
            $data['singleFAQ'] = $this->faq->singleRecord('tbl_faq',['id'=>$id,'slug'=>$slug]); 
            $this->load->view('admin/faq/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
	//Save FAQ
	public function saveFaq(){
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|required');
        $this->form_validation->set_rules('meta_description', 'Meta Description', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        if ($this->form_validation->run()) {
            $data['title'] = $this->input->post('title');
            $data['slug'] = $this->slug($this->input->post('title'));
            $data['meta_title'] = $this->input->post('meta_title');
            $data['meta_description'] = $this->input->post('meta_description');
            $data['description'] = $this->input->post('description');
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $result = $this->faq->insert('tbl_faq',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'FAQ added successfully','url'=>base_url('admin/faq'));
                echo json_encode($response);
                return false;
            }else{
                $response = array('status' => 'errors','message'=> 'Something went wrong');
                echo json_encode($response);
                return false;
            }
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'title' => form_error('title'),
                    'meta_title' => form_error('meta_title'),
                    'meta_description' => form_error('meta_description'),
                    'description' => form_error('description')
                )  
            );
            echo json_encode($response);
                return false;    
        }
	}
    //Save Faq
    public function updateFaq(){
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|required');
        $this->form_validation->set_rules('meta_description', 'Meta Description', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        if ($this->form_validation->run()) {
            $data['title'] = $this->input->post('title');
            $data['slug'] = $this->slug($this->input->post('title'));
            $data['meta_title'] = $this->input->post('meta_title');
            $data['meta_description'] = $this->input->post('meta_description');
            $data['description'] = $this->input->post('description');
            $data['status'] = 1;
            $result = $this->faq->updateRecord('tbl_faq',array('id'=>$this->input->post('faq_id')),$data);
            $response = array('status' => 'success','message'=> 'FAQ updated successfully','url'=>base_url('admin/faq'));
            echo json_encode($response);
        }else{
             $response = array(
                'status' => 'error',
                'errors' => array(
                    'title' => form_error('title'),
                    'meta_title' => form_error('meta_title'),
                    'meta_description' => form_error('meta_description'),
                    'description' => form_error('description')
                )  
            );
            echo json_encode($response);
                return false;    
        }
    }
    public function deleteFaq(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->faq->deleteRecord('tbl_faq',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'FAQ delete successfully','url'=>base_url('admin/faq'));
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