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
            $data['singleCollege'] = $this->master->singleRecord('tbl_college',array('id'=>$id));
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
            $data['short_name'] = $this->input->post('short_name');
            $data['slug'] = $this->slug($this->input->post('full_name'));
            $data['short_description'] = $this->input->post('short_description');
            $data['popular_name_one'] = $this->input->post('popular_name_one');
            $data['popular_name_two'] = $this->input->post('popular_name_two');
            $data['establishment'] = $this->input->post('establishment');
            $data['stream'] = $this->input->post('stream');
            $data['gender_accepted'] = ($this->input->post('gender_accepted')) ?implode('|',$this->input->post('gender_accepted')):'';
            $data['course_offered'] = ($this->input->post('course_offered')) ?implode('|',$this->input->post('course_offered')):'';
            $data['country'] = $this->input->post('country');
            $data['state'] = $this->input->post('state');
            $data['city'] = $this->input->post('city');
            $data['sub_district'] = $this->input->post('subdistrict');
            $data['affiliated_by'] = $this->input->post('affiliated_by');
            $data['university_name'] = $this->input->post('university');
            $data['approved_by'] = ($this->input->post('approved_by')) ?implode('|',$this->input->post('approved_by')):'';
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
                    'full_name' => form_error('full_name')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save College
    public function updateCollege(){
        $this->form_validation->set_rules('full_name', 'Full name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[tbl_college.email]');
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
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
            $data['short_name'] = $this->input->post('short_name');
            $data['slug'] = $this->slug($this->input->post('full_name'));
            $data['short_description'] = $this->input->post('short_description');
            $data['popular_name_one'] = $this->input->post('popular_name_one');
            $data['popular_name_two'] = $this->input->post('popular_name_two');
            $data['establishment'] = $this->input->post('establishment');
            $data['stream'] = $this->input->post('stream');
            $data['gender_accepted'] = ($this->input->post('gender_accepted')) ?implode('|',$this->input->post('gender_accepted')):'';
            $data['course_offered'] = ($this->input->post('course_offered')) ?implode('|',$this->input->post('course_offered')):'';
            $data['country'] = $this->input->post('country');
            $data['state'] = $this->input->post('state');
            $data['city'] = $this->input->post('city');
            $data['sub_district'] = $this->input->post('subdistrict');
            $data['affiliated_by'] = $this->input->post('affiliated_by');
            $data['university_name'] = $this->input->post('university');
            $data['approved_by'] = ($this->input->post('approved_by')) ?implode('|',$this->input->post('approved_by')):'';
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


    public function file_check_excel_file($str){
        $allowed_mime_type_arr = array('application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/msexcel', 'application/x-msexcel', 'application/x-ms-excel', 'application/x-excel', 'application/x-dos_ms_excel', 'application/xls', 'application/x-xls', 'application/xlsx', 'application/excel');
        if(!empty($_FILES['excel_file'])){
            $mime = get_mime_by_extension($_FILES['excel_file']['name']);
            if(isset($_FILES['excel_file']['name']) && $_FILES['excel_file']['name']!=""){
                if(in_array($mime, $allowed_mime_type_arr)){
                    return true;
                }else{
                    $this->form_validation->set_message('file_check_excel_file', 'Please select only xlsx file.');
                    return false;
                }
            }else{
                $this->form_validation->set_message('file_check_excel_file', 'Please choose a file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check_excel_file', 'Please choose a file to upload.');
            return false;
        }
    }
    public function importCollege(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/college/import',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }

    // Import CSV in DB
    public function importCollegeByExcel(){

        if($_FILES['excel_file']['error'] == 0){
            $name = $_FILES['excel_file']['name'];
            $ext = explode('.', $name);
            
            $type = $_FILES['excel_file']['type'];
            $tmpName = $_FILES['excel_file']['tmp_name'];
            if($ext[1] === 'csv'){
                if(($handle = fopen($tmpName, 'r')) !== FALSE) {
                    set_time_limit(0);
                    $row = 0;
                    while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                        $col_count = count($data);
                        if ($row>0) {
                            $impdata['full_name'] = $data[1];
                            $impdata['slug'] = $this->slug($data[1]);
                            $impdata['short_description'] = $data[2];
                            $impdata['popular_name_one'] = $data[3];
                            $impdata['popular_name_two'] = $data[4];
                            $impdata['establishment'] = $data[8];
                            $impdata['gender_accepted'] = $data[10];
                            $impdata['course_offered'] = $data[11];
                            $impdata['college_banner'] = $data[5];
                            $impdata['college_logo'] = $data[6];
                            $impdata['prospectus_file'] = $data[7];
                            $impdata['country'] = $data[12];
                            $impdata['state'] = $data[13];
                            $impdata['city'] = $data[14];
                            $impdata['university_name'] = $data[15];
                            $impdata['approved_by'] = $data[9];
                            $impdata['ownership'] = $data[17];
                            $impdata['website'] =  $data[18];
                            $impdata['email'] = $data[19];
                            $impdata['contact_one'] = $data[20];
                            $impdata['contact_two'] = $data[21];
                            $impdata['contact_three'] = $data[22];
                            $impdata['nodal_officer_name'] = $data[23];
                            $impdata['nodal_officer_no'] = $data[24];
                            $impdata['keywords'] = $data[25];
                            $impdata['tags'] = $data[26];
                            $impdata['status'] = $data[27];
                            $impdata['short_name'] = $data[28];
                            $impdata['stream'] = $data[29];
                            $id=$data[0];
                            if($id==""){
                                $this->db->insert('tbl_college',$impdata);
                            }else{
                                $this->db->where('id',$id)->update('tbl_college',$impdata);
                            }
                        }
                        $row++;
                     }
                     fclose($handle);
                    $response = array('status' => 'success','message' => 'College imported successfully','url'=>base_url('admin/college'));
                    echo json_encode($response);
                    return true;

                    

                }else{

                    $response = array(
                'status' => 'error',
                'errors' => array(
                    'excel_file' => form_error('excel_file')
                )
            );
            echo json_encode($response);
            return false;

                }

            }else{
                $response = array(
                'status' => 'error',
                'errors' => array(
                    'excel_file' => form_error('excel_file')
                )
            );
            echo json_encode($response);
            return false;

            }
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'excel_file' => form_error('excel_file')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
}

?>