<?php

Class Certificate extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('CertificateModel','certificate');
        $this->load->model('SiteSettings','site');
    }
	public function index()
	{
		if ($this->is_admin_logged_in() == true) {
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
			$data['admin_session'] = $this->session->userdata('admin');
			$data['certificateList'] = $this->certificate->getRecords('tbl_certification');
			$this->load->view('admin/certificate/list',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
	public function add(){
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
			$this->load->view('admin/certificate/add-edit',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
    public function editCertificate($id,$slug){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
            $data['singleCertificate'] = $this->certificate->singleRecord('tbl_certification',array('id'=>$id,'slug'=>$slug));
            $this->load->view('admin/certificate/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
	public function file_check($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        if(!empty($_FILES['image'])){
            $mime = get_mime_by_extension($_FILES['image']['name']);
            if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=""){
                if(in_array($mime, $allowed_mime_type_arr)){
                    return true;
                }else{
                    $this->form_validation->set_message('file_check', 'Please select only jpg/png file.');
                    return false;
                }
            }else{
                $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;    
        }
    }
	//Save Category
	public function saveCertificate(){
        $this->form_validation->set_rules('image', 'Certificatee Image', 'callback_file_check');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('department', 'Department', 'trim|required');
        $this->form_validation->set_rules('valid_till', 'Certificate Validity', 'trim|required');
        $this->form_validation->set_rules('issue_date', 'Certificate Isseu Date', 'trim|required');
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/certificates';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            if(!empty($_FILES['image']['name'])){
	            $uploadedFile = $this->uploadFile($_FILES['image']['name'],'image',$config);
	             if($uploadedFile['error_msg'] != ''){
	            	$response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
	            	return json_encode($response);
	            }
	            $data['image'] = $uploadedFile['file'];
        	}
            $data['name'] = $this->input->post('name');
            $data['slug'] = $this->slug($this->input->post('name'));
            $data['department'] = $this->input->post('department');
            $data['valid_till'] = date('Y-m-d',strtotime($this->input->post('valid_till')));
            $data['issue_date'] = date('Y-m-d',strtotime($this->input->post('issue_date')));
            $data['status'] = ($this->input->post('status') == 'on') ? 1 : 0;
            $data['created_at'] = date('Y-m-d H:i:s');
            $result = $this->certificate->insert('tbl_certification',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Certificate added successfully','url'=>base_url('admin/certificate'));
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
				    'image' => form_error('image'),
				    'name' => form_error('name'),
                    'department' => form_error('department'),
				    'valid_till' => form_error('valid_till'),
                    'issue_date' => form_error('issue_date')
        		)  
		   	);
			echo json_encode($response);
                return false;
        }
	}
    //Save Category
    public function updateCertificate(){
        if(!empty($_FILES['image']['name'])){
            $this->form_validation->set_rules('image', 'Certificatee Image', 'callback_file_check');
        }
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('department', 'Department', 'trim|required');
        $this->form_validation->set_rules('valid_till', 'Certificate Validity', 'trim|required');
        $this->form_validation->set_rules('issue_date', 'Certificate Isseu Date', 'trim|required');
        if ($this->form_validation->run()) {
            if(!empty($_FILES['image']['name'])){
                $config['upload_path']  = 'assets/uploads/certificates';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['encrypt_name'] =  TRUE;
                $config['max_size']      = 1024;
	            $uploadedFile = $this->uploadFile($_FILES['image']['name'],'image',$config);
	            if($uploadedFile['error_msg'] != ''){
	            	$response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
	            	echo json_encode($response);
                    return false;
	            }else{
	            	$data['image'] = $uploadedFile['file'];
	            }
        	}
            $data['name'] = $this->input->post('name');
            $data['slug'] = $this->slug($this->input->post('name'));
            $data['department'] = $this->input->post('department');
            $data['valid_till'] = date('Y-m-d',strtotime($this->input->post('valid_till')));
            $data['issue_date'] = date('Y-m-d',strtotime($this->input->post('issue_date')));
            $data['status'] = ($this->input->post('status') == 'on') ? 1 : 0;
            $data['updated_at'] = date('Y-m-d H:i:s');
            $result = $this->certificate->updateRecord('tbl_certification',array('id'=>$this->input->post('certificate_id')),$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Certificate updated successfully','url'=>base_url('admin/certificate'));
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
                    'image' => form_error('image'),
                    'name' => form_error('name'),
                    'department' => form_error('department'),
                    'valid_till' => form_error('valid_till'),
                    'issue_date' => form_error('issue_date')
                )  
		   	);
			echo json_encode($response);
                return false;  
        }
    }
    public function deleteCertificate(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->certificate->deleteRecord('tbl_certification',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Certificate deleted successfully','url'=>base_url('admin/certificate'));
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