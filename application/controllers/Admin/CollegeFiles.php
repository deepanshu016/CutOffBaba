<?php

Class CollegeFiles extends MY_Controller {

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
            $data['collegeFileList'] = $this->master->getProceduralData();
            $this->load->view('admin/collegefiles/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/collegefiles/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editCollegeFiles($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleCollegeFiles'] = $this->master->singleRecord('tbl_gallery_heads',array('id'=>$id));
            $this->load->view('admin/collegefiles/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function file_check_college_image($str){
        $file_type = $this->input->post('file_type');
        if($file_type == 'image' && empty($_FILES['college_image']['name'][0])){
            $this->form_validation->set_message('file_check_college_image', 'Please choose a file to upload.');
            return false;
        }else if($file_type == 'image'){
            if(isset($_FILES['college_image']['name'][0]) && $_FILES['college_image']['name'][0] !=""){
                    return true;
            }elseif(count($_FILES['college_image'] > 10)){
                $this->form_validation->set_message('file_check_college_image', 'Maximum 10 images allowed in one single request');
                return false;
            }else{
                $this->form_validation->set_message('file_check_college_image', 'Please choose a file to upload.');
                return false;
            }
        }
    }
    public function file_check_college_video($str){
        $file_type = $this->input->post('file_type');
        if($file_type == 'video' && empty($_FILES['college_video']['name'][0])){
            $this->form_validation->set_message('file_check_college_video', 'Please choose a file to upload.');
            return false;
        }else if($file_type == 'video'){
            $mime = get_mime_by_extension($_FILES['college_video']['name'][0]);
            if(isset($_FILES['college_video']['name'][0]) && $_FILES['college_video']['name'] !=""){
                return true;
            }elseif(count($_FILES['college_video'] > 10)){
                $this->form_validation->set_message('file_check_college_video', 'Maximum videos allowed in one single request');
                return false;
            }else{
                $this->form_validation->set_message('file_check_college_video', 'Please choose a file to upload.');
                return false;
            }
        }
    }
    public function file_check_college_doc($str){
        $file_type = $this->input->post('file_type');
        if($file_type == 'video' && empty($_FILES['college_doc']['name'][0])){
            $this->form_validation->set_message('file_check_college_doc', 'Please choose a file to upload.');
            return false;
        }else if($file_type == 'video'){
            $mime = get_mime_by_extension($_FILES['college_doc']['name'][0]);
            if(isset($_FILES['college_doc']['name'][0]) && $_FILES['college_doc']['name'][0] !=""){
                return true;
            }elseif(count($_FILES['college_doc'] > 10)){
                $this->form_validation->set_message('file_check_college_doc', 'Maximum 5 doc files allowed in one single request');
                return false;
            }else{
                $this->form_validation->set_message('file_check_college_doc', 'Please choose a file to upload.');
                return false;
            }
        }
    }
    //Save College Files
    public function saveCollegeFiles(){
        $this->form_validation->set_rules('college', 'College', 'trim|required');
        $this->form_validation->set_rules('file_type', 'File Type', 'trim|required');
        $this->form_validation->set_rules('college_image[]', 'Image', 'callback_file_check_college_image');
        $this->form_validation->set_rules('college_video[]', 'Video', 'callback_file_check_college_video');
        $this->form_validation->set_rules('college_doc[]', 'Video', 'callback_file_check_college_doc');
        if ($this->form_validation->run()) {
            //$this->db->trans_start();
//            try {
                $college_id = $this->input->post('college');
                $file_type = $this->input->post('file_type');
                if(isset($_FILES['college_image']['name'])){
                    $uploadedImages = $this->uploadMultipleFiles($_FILES['college_image'],'college_image',$file_type,$college_id,'media/image/','college');
                    $res = $this->master->insert_batch('tbl_uploaded_files',$uploadedImages);
                }
                if(count($_FILES['college_video']['name']) > 1){
                    $uploadedVideos = $this->uploadMultipleFiles($_FILES['college_video'],'college_video',$file_type,$college_id,'media/video/','college');
                    $res = $this->master->insert_batch('tbl_uploaded_files',$uploadedVideos);
                }
                if(count($_FILES['college_doc']['name']) > 1){
                    $uploadedDocs = $this->uploadMultipleFiles($_FILES['college_doc'],'college_doc',$file_type,$college_id,'media/doc/','college');
                    $res = $this->master->insert_batch('tbl_uploaded_files',$uploadedDocs);
                }
//            } catch (Exception $e) {
//                // Handle the exception
//                echo 'Caugh t exception: ', $e->getMessage();
//            }
            if($res > 0){
                $response = array('status' => 'success','message'=> 'Files uploaded successfully','url'=>base_url('admin/add-college-files'));
                echo json_encode($response);
                return false;
            }
            $response = array('status' => 'error','message'=> 'Something went wrong','url'=>'');
            echo json_encode($response);
            return false;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'college' => form_error('college'),
                    'file_type' => form_error('file_type'),
                    'college_image' => form_error('college_image[]'),
                    'college_video' => form_error('college_video[]'),
                    'college_doc' => form_error('college_doc[]')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save College Files
    public function updateCollegeFiles(){
        $this->form_validation->set_rules('head_name', 'CollegeFiles', 'trim|required');
        if ($this->form_validation->run()) {
            $data['head_name'] = $this->input->post('head_name');
            $result = $this->master->updateRecord('tbl_gallery_heads',array('id'=>$this->input->post('head_id')),$data);
            $response = array('status' => 'success','message'=> 'Gallery Heads updated successfully','url'=>base_url('admin/gallery-heads'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'head_name' => form_error('head_name')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteCollegeFiles(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_gallery_heads',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Gallery Head deleted successfully','url'=>base_url('admin/gallery-heads'));
            }else{
                $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
            }
        }else{
            $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function assignMedia($id){
        if ($this->is_admin_logged_in() == true) {
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['admin_session'] = $this->session->userdata('admin');
            $data['imageData'] = $this->master->getRecords('tbl_uploaded_files',['file_data'=>$id,'file_type'=>'image']);
            $data['videoData'] = $this->master->getRecords('tbl_uploaded_files',['file_data'=>$id,'file_type'=>'video']);
            $data['docData'] = $this->master->getRecords('tbl_uploaded_files',['file_data'=>$id,'file_type'=>'doc']);
            $data['college_id'] = $id;
            $this->load->view('admin/collegefiles/assign-media-gallery',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }

    public function saveMediaToGallery(){
          $request_datas = json_decode($this->input->post('data'),true);
          //print_r($request_datas);
          foreach($request_datas as $request_data){
          if($request_data['head_id'] == 'college_logo'){
               $collegeData = $this->master->singleRecord('tbl_college',['id'=>$request_data['college_id']]);
               $college_data = ['college_logo'=>$request_data['media_id']];
               $result = $this->master->updateRecord('tbl_college',['id'=>$request_data['college_id']],$college_data);
          }else if($request_data['head_id'] == 'college_banner'){
              $collegeData = $this->master->singleRecord('tbl_college',['id'=>$request_data['college_id']]);
              $college_data = ['college_logo'=>$collegeData['media_id']];
              $result = $this->master->updateRecord('tbl_college',['id'=>$request_data['college_id']],$college_data);
          }else if($request_data['head_id'] == 'prospectus_file'){
              $collegeData = $this->master->singleRecord('tbl_college',['id'=>$request_data['college_id']]);
              $college_data = ['prospectus_file'=>$collegeData['media_id']];
              $result = $this->master->updateRecord('tbl_college',['id'=>$request_data['college_id']],$college_data);
          }else {
              $this->db->trans_start();
              $this->master->deleteRecord('tbl_gallery',['media_id'=>$request_data['media_id'],'head_id'=>$request_data['head_id'],'college_id'=>$request_data['college_id']]);
              $gallery_data = ['media_id'=>$request_data['media_id'],'head_id'=>$request_data['head_id'],'college_id'=>$request_data['college_id']];
              $result = $this->master->insert('tbl_gallery',$gallery_data);
              $this->db->trans_complete();
          }
            
        }
        if($result > 0){
                $response = array('status' => 'success','message'=> 'Media added into gallery successfully','url'=>base_url('admin/college-files'));
                echo json_encode($response);
                return false;
            }
            $response = array('status' => 'error','message'=> 'Something went wrong','url'=>'');
            echo json_encode($response);
            return false;
    }
    public function deleteMediaToGallery(){
        $id = $this->input->post('id');
        $media_data = $this->master->singleRecord('tbl_uploaded_files',['id'=>$id]);
        if(!empty($media_data)){
            if($media_data['file_type'] == 'image'){
                $file_path = 'assets/uploads/media/image';
            }
            if($media_data['file_type'] == 'video'){
                $file_path = 'assets/uploads/media/video';
            }
            if($media_data['file_type'] == 'doc'){
                $file_path = 'assets/uploads/media/doc';
            }
            $this->remove_file_from_directory($file_path,$media_data['file_name']);
            $result = $this->master->deleteRecord('tbl_uploaded_files',['id'=>$id]);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Media added into gallery successfully','url'=>base_url('admin/college-files'));
                echo json_encode($response);
                return false;
            }else{
                $response = array('status' => 'error','message'=> 'Something went wrong','url'=>'');
                echo json_encode($response);
                return false;
            }
        }else{
            $response = array('status' => 'error','message'=> 'Something went wrong','url'=>'');
            echo json_encode($response);
            return false;
        }
    }

}

?>