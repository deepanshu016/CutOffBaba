<?php

Class College extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MasterModel','master');
        $this->load->model('SiteSettings','site');
    }
    public function index()
    {
        if ($this->is_admin_logged_in() == true) {
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['admin_session'] = $this->session->userdata('admin');
            $data['collegeList'] = $this->master->getRecords('tbl_college');
            $this->load->view('admin/college/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/college/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editCollege($id,$slug){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleCollege'] = $this->master->singleRecord('tbl_college',array('id'=>$id,'slug'=>$slug));
            $this->load->view('admin/college/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Gallery
    public function file_check_college_logo($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        if(isset($_FILES['college_logo']['name']) && $_FILES['college_logo']['name']!=""){
            $mime = get_mime_by_extension($_FILES['college_logo']['name']);
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check_college_logo', 'Please select only jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check_college_logo', 'Please choose file to upload');
            return false;
        }
    }
    public function file_check_college_banner($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['college_banner']['name']);
        if(isset($_FILES['college_banner']['name']) && $_FILES['college_banner']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check_college_banner', 'Please select only jpg/png file.');
                return false;
            }
        }
    }
    public function file_check_prospectus_file($str){
        $allowed_mime_type_arr = array('application/pdf', 'application/postscript','application/msword', 'application/vnd.ms-office', 'application/msword');
        $mime = get_mime_by_extension($_FILES['prospectus_file']['name']);
        if(isset($_FILES['prospectus_file']['name']) && $_FILES['prospectus_file']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check_prospectus_file', 'Please select only pdf/doc/docx file.');
                return false;
            }
        }return false;
    }
    public function saveCollege(){
        $this->form_validation->set_rules('full_name', 'Full name', 'trim|required');
        //$this->form_validation->set_rules('short_description', 'Short Description', 'trim|required');
        //$this->form_validation->set_rules('establishment', 'Establishment Date', 'trim|required');
        //$this->form_validation->set_rules('gender_accepted[]', 'Gender Accepted', 'trim|required');
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[tbl_college.email]');
        //$this->form_validation->set_rules('university', 'University', 'trim|required');
        //$this->form_validation->set_rules('approved_by', 'Approval', 'trim|required');
//        $this->form_validation->set_rules('college_logo', 'College Logo', 'callback_file_check_college_logo');
//        $this->form_validation->set_rules('college_banner', 'College Banner', 'callback_file_check_college_banner');
//        $this->form_validation->set_rules('prospectus_file', 'Prospectus File', 'callback_file_check_prospectus_file');
        if ($this->form_validation->run()) {
            if(!empty($_FILES['college_logo']['name'])) {
                $config['upload_path']  = 'assets/uploads/college/logo';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['encrypt_name'] =  TRUE;
                $config['max_size']      = 1024;
                $uploadedFile = $this->uploadFile($_FILES['college_logo']['name'], 'college_logo', $config);
                if (!empty($uploadedFile['error_msg'])) {
                    $response = array('status' => 'errors', 'message' => $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['college_logo'] = $uploadedFile['file'];
            }
            if(!empty($_FILES['college_banner']['name'])) {
                $config['upload_path']  = 'assets/uploads/college/banner';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['encrypt_name'] =  TRUE;
                $config['max_size']      = 1024;
                $uploadedFile = $this->uploadFile($_FILES['college_banner']['name'], 'college_banner', $config);
                if (!empty($uploadedFile['error_msg'])) {
                    $response = array('status' => 'errors', 'message' => $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['college_banner'] = $uploadedFile['file'];
            }
            if(!empty($_FILES['prospectus_file']['name'])) {
                $config['upload_path']  = 'assets/uploads/college/prospectus_file';
                $config['allowed_types'] = 'pdf|doc|docx';
                $config['encrypt_name'] =  TRUE;
                $config['max_size']      = 1024;
                $uploadedFile = $this->uploadFile($_FILES['prospectus_file']['name'], 'prospectus_file', $config);
                if (!empty($uploadedFile['error_msg'])) {
                    $response = array('status' => 'errors', 'message' => $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['prospectus_file'] = $uploadedFile['file'];
            }
            $data['full_name'] = $this->input->post('full_name');
            $data['slug'] = $this->slug($this->input->post('full_name'));
            $data['short_description'] = $this->input->post('short_description');
            $data['popular_name_one'] = $this->input->post('popular_name_one');
            $data['popular_name_two'] = $this->input->post('popular_name_two');
            $data['establishment'] = date('Y-m-d',strtotime($this->input->post('establishment')));
            $data['gender_accepted'] = implode('|',$this->input->post('gender_accepted'));
            $data['course_offered'] = implode('|',$this->input->post('course_offered'));
            $data['country'] = $this->input->post('country');
            $data['state'] = $this->input->post('state');
            $data['city'] = $this->input->post('city');
            $data['affiliated_by'] = $this->input->post('affiliated_by');
            $data['university_name'] = $this->input->post('university');
            $data['approved_by'] = $this->input->post('approved_by');
            $data['ownership'] = $this->input->post('ownership');
            $data['website'] = $this->input->post('website');
            $data['email'] = $this->input->post('email');
            $data['contact_one'] = $this->input->post('contact_one');
            $data['contact_two'] = $this->input->post('contact_two');
            $data['contact_three'] = $this->input->post('contact_three');
            $data['nodal_officer_name'] = $this->input->post('nodal_offier_name');
            $data['nodal_officer_no'] = $this->input->post('nodal_officer_no');
            $data['keywords'] = implode('|',$this->input->post('keywords'));
            $data['tags'] = implode('|',$this->input->post('tags'));
            $data['added_by'] = $this->session->userdata('admin')['id'];
            $data['status'] = 1;
            $result = $this->master->insert('tbl_college',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'College added successfully','url'=>base_url('admin/college'));
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
                    'full_name' => form_error('full_name'),
//                    'short_description' => form_error('short_description'),
//                    'establishment' => form_error('establishment'),
//                    'gender_accepted' => form_error('gender_accepted[]'),
//                    'course_offered' => form_error('course_offered[]'),
                    'country' => form_error('country'),
                    'state' => form_error('state'),
                    'city' => form_error('city'),
                    'email' => form_error('email'),
//                    'university' => form_error('university'),
//                    'approved_by' => form_error('approved_by'),
//                    'college_logo' => form_error('college_logo'),
//                    'college_banner' => form_error('college_banner'),
//                    'prospectus_file' => form_error('prospectus_file')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Gallery
    public function updateCollege(){
        $this->form_validation->set_rules('full_name', 'Full name', 'trim|required');
//        $this->form_validation->set_rules('short_description', 'Short Description', 'trim|required');
//        $this->form_validation->set_rules('establishment', 'Establishment Date', 'trim|required');
//        $this->form_validation->set_rules('gender_accepted[]', 'Gender Accepted', 'trim|required');
//        $this->form_validation->set_rules('course_offered[]', 'Course Offered', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[tbl_college.email]');
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
//        $this->form_validation->set_rules('affiliated_by', 'Affiliated By', 'trim|required');
//        $this->form_validation->set_rules('university', 'University', 'trim|required');
//        $this->form_validation->set_rules('approved_by', 'Approval', 'trim|required');
//        $this->form_validation->set_rules('college_logo', 'College Logo', 'callback_file_check_college_logo');
//        $this->form_validation->set_rules('college_banner', 'College Banner', 'callback_file_check_college_banner');
//        $this->form_validation->set_rules('prospectus_file', 'Prospectus File', 'callback_file_check_prospectus_file');
        if ($this->form_validation->run()) {
            if(!empty($_FILES['college_logo']['name'])) {
                $config['upload_path']  = 'assets/uploads/college/logo';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['encrypt_name'] =  TRUE;
                $config['max_size']      = 1024;
                $uploadedFile = $this->uploadFile($_FILES['college_logo']['name'], 'college_logo', $config);
                if (!empty($uploadedFile['error_msg'])) {
                    $response = array('status' => 'errors', 'message' => $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['college_logo'] = $uploadedFile['file'];
                $this->remove_file_from_directory('assets/uploads/college/logo',$this->input->post('old_logo'));
            }
            if(!empty($_FILES['college_banner']['name'])) {
                $config['upload_path']  = 'assets/uploads/college/banner';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['encrypt_name'] =  TRUE;
                $config['max_size']      = 1024;
                $uploadedFile = $this->uploadFile($_FILES['college_banner']['name'], 'college_banner', $config);
                if (!empty($uploadedFile['error_msg'])) {
                    $response = array('status' => 'errors', 'message' => $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['college_banner'] = $uploadedFile['file'];
                $this->remove_file_from_directory('assets/uploads/college/banner',$this->input->post('old_banner'));
            }
            if(!empty($_FILES['prospectus_file']['name'])) {
                $config['upload_path']  = 'assets/uploads/college/prospectus_file';
                $config['allowed_types'] = 'pdf|doc|docx';
                $config['encrypt_name'] =  TRUE;
                $config['max_size']      = 1024;
                $uploadedFile = $this->uploadFile($_FILES['prospectus_file']['name'], 'prospectus_file', $config);
                if (!empty($uploadedFile['error_msg'])) {
                    $response = array('status' => 'errors', 'message' => $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['prospectus_file'] = $uploadedFile['file'];
                $this->remove_file_from_directory('assets/uploads/college/prospectus_file',$this->input->post('old_prospectus'));
            }
            $data['full_name'] = $this->input->post('full_name');
            $data['slug'] = $this->slug($this->input->post('full_name'));
            $data['short_description'] = $this->input->post('short_description');
            $data['popular_name_one'] = $this->input->post('popular_name_one');
            $data['popular_name_two'] = $this->input->post('popular_name_two');
            $data['establishment'] = date('Y-m-d',strtotime($this->input->post('establishment')));
            $data['gender_accepted'] = implode('|',$this->input->post('gender_accepted'));
            $data['course_offered'] = implode('|',$this->input->post('course_offered'));
            $data['country'] = $this->input->post('country');
            $data['state'] = $this->input->post('state');
            $data['city'] = $this->input->post('city');
            $data['affiliated_by'] = $this->input->post('affiliated_by');
            $data['university_name'] = $this->input->post('university');
            $data['approved_by'] = $this->input->post('approved_by');
            $data['ownership'] = $this->input->post('ownership');
            $data['website'] = $this->input->post('website');
            $data['email'] = $this->input->post('email');
            $data['contact_one'] = $this->input->post('contact_one');
            $data['contact_two'] = $this->input->post('contact_two');
            $data['contact_three'] = $this->input->post('contact_three');
            $data['nodal_officer_name'] = $this->input->post('nodal_officer_name');
            $data['nodal_officer_no'] = $this->input->post('nodal_officer_no');
            $data['keywords'] = implode('|',$this->input->post('keywords'));
            $data['tags'] = implode('|',$this->input->post('tags'));
            $data['added_by'] = $this->session->userdata('admin')['id'];
            $data['status'] = 1;
            $result = $this->master->updateRecord('tbl_college',array('id'=>$this->input->post('college_id')),$data);
            $response = array('status' => 'success','message'=> 'College updated successfully','url'=>base_url('admin/college'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'full_name' => form_error('full_name'),
                    'country' => form_error('country'),
                    'state' => form_error('state'),
                    'city' => form_error('city'),
                    'email' => form_error('email')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteCollege(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $singleRecord = $this->master->singleRecord('tbl_college',array('id'=>$id));
            $result = $this->master->deleteRecord('tbl_college',array('id'=>$id));
            if($result > 0){
                $this->remove_file_from_directory('assets/uploads/college/logo',$singleRecord['college_logo']);
                $this->remove_file_from_directory('assets/uploads/college/banner',$singleRecord['college_banner']);
                $this->remove_file_from_directory('assets/uploads/college/prospectus_file',$singleRecord['prospectus_file']);
                $response = array('status' => 'success','message' => 'College deleted successfully','url'=>base_url('admin/college'));
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