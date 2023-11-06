<?php

Class Gallery extends MY_Controller {

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
            $data['galleryList'] = $this->master->getRecords('tbl_gallery');
            $this->load->view('admin/gallery/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/gallery/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editGallery($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleGallery'] = $this->master->singleRecord('tbl_gallery',array('id'=>$id));
            $this->load->view('admin/gallery/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Gallery
    public function file_check_gallery_image($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        $gallery_type = $this->input->post('gallery_type');
        if($gallery_type == 'photo' && empty($_FILES['gallery_image']['name'])){
            $this->form_validation->set_message('file_check_gallery_image', 'Please choose a file to upload.');
            return false;
        }else if($gallery_type == 'photo'){
            $mime = get_mime_by_extension($_FILES['gallery_image']['name']);
            if(isset($_FILES['gallery_image']['name']) && $_FILES['gallery_image']['name']!=""){
                if(in_array($mime, $allowed_mime_type_arr)){
                    return true;
                }else{
                    $this->form_validation->set_message('file_check_gallery_image', 'Please select only jpg/png file.');
                    return false;
                }
            }else{
                $this->form_validation->set_message('file_check_gallery_image', 'Please choose a file to upload.');
                return false;
            }
        }
    }
    public function file_check_gallery_video($str){
        $allowed_mime_type_arr = array('video/mp4','video/x-flv');
        $gallery_type = $this->input->post('gallery_type');
        if($gallery_type == 'video' && empty($_FILES['gallery_video']['name'])){
            $this->form_validation->set_message('file_check_gallery_video', 'Please choose a file to upload.');
            return false;
        }else if($gallery_type == 'video'){
            $mime = get_mime_by_extension($_FILES['gallery_video']['name']);
            if(isset($_FILES['gallery_video']['name']) && $_FILES['gallery_video']['name']!=""){
                if(in_array($mime, $allowed_mime_type_arr)){
                    return true;
                }else{
                    $this->form_validation->set_message('file_check_gallery_video', 'Please select only mp4/3gp file.');
                    return false;
                }
            }else{
                $this->form_validation->set_message('file_check_gallery_video', 'Please choose a file to upload.');
                return false;
            }
        }
    }
    public function saveGallery(){
        $this->form_validation->set_rules('gallery_head', 'Gallery Head', 'trim|required');
        $this->form_validation->set_rules('gallery_type', 'Gallery Type', 'trim|required');
        $this->form_validation->set_rules('gallery_image', 'Photo', 'callback_file_check_gallery_image');
        $this->form_validation->set_rules('gallery_video', 'Video', 'callback_file_check_gallery_video');
        if ($this->form_validation->run()) {
            if($this->input->post('gallery_type') == 'photo'){
                $config['upload_path']  = 'assets/uploads/gallery_media/image';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['encrypt_name'] =  TRUE;
                $config['max_size']      = 1024;
                if(!empty($_FILES['gallery_image']['name'])) {
                    $uploadedFile = $this->uploadFile($_FILES['gallery_image']['name'], 'gallery_image', $config);

                    if (!empty($uploadedFile['error_msg'])) {
                        $response = array('status' => 'errors', 'message' => $uploadedFile['error_msg']);
                        echo json_encode($response);
                        return false;
                    }
                    $data['media'] = $uploadedFile['file'];
                }
            }else {
                $config['upload_path']  = 'assets/uploads/gallery_media/video';
                $config['allowed_types'] = 'mp4|3gp';
                $config['allowed_types'] = 'mp4|3gp';
                $config['encrypt_name'] =  TRUE;
                $config['max_size']      = 4048;
                if(!empty($_FILES['gallery_video']['name'])) {
                    $uploadedFile = $this->uploadFile($_FILES['gallery_video']['name'], 'gallery_video', $config);
                    if (!empty($uploadedFile['error_msg'])) {
                        $response = array('status' => 'errors', 'message' => $uploadedFile['error_msg']);
                        echo json_encode($response);
                        return false;
                    }
                    $data['media'] = $uploadedFile['file'];
                }
            }
            $data['head'] = $this->input->post('gallery_head');
            $data['gallery_type'] = $this->input->post('gallery_type');
            $data['status'] = 1;
            $result = $this->master->insert('tbl_gallery',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Gallery added successfully','url'=>base_url('admin/gallery'));
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
                    'gallery_head' => form_error('gallery_head'),
                    'gallery_type' => form_error('gallery_type'),
                    'gallery_image' => form_error('gallery_image'),
                    'gallery_video' => form_error('gallery_video')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Gallery
    public function updateGallery(){
        $this->form_validation->set_rules('gallery_head', 'Gallery Head', 'trim|required');
        $this->form_validation->set_rules('gallery_type', 'Gallery Type', 'trim|required');
        if ($this->form_validation->run()) {
            if($this->input->post('gallery_type') == 'photo'){
                $config['upload_path']  = 'assets/uploads/gallery_media/image';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['encrypt_name'] =  TRUE;
                $config['max_size']      = 1024;
                if(!empty($_FILES['gallery_image']['name'])) {
                    $uploadedFile = $this->uploadFile($_FILES['gallery_image']['name'], 'gallery_image', $config);

                    if (!empty($uploadedFile['error_msg'])) {
                        $response = array('status' => 'errors', 'message' => $uploadedFile['error_msg']);
                        echo json_encode($response);
                        return false;
                    }
                    $data['media'] = $uploadedFile['file'];
                    $this->remove_file_from_directory('assets/uploads/gallery_media/video',$this->input->post('old_media'));
                    $this->remove_file_from_directory('assets/uploads/gallery_media/image',$this->input->post('old_media'));
                }
            }else {
                $config['upload_path']  = 'assets/uploads/gallery_media/video';
                $config['allowed_types'] = 'mp4|3gp';
                $config['allowed_types'] = 'mp4|3gp';
                $config['encrypt_name'] =  TRUE;
                $config['max_size']      = 4048;
                if(!empty($_FILES['gallery_video']['name'])) {
                    $uploadedFile = $this->uploadFile($_FILES['gallery_video']['name'], 'gallery_video', $config);
                    if (!empty($uploadedFile['error_msg'])) {
                        $response = array('status' => 'errors', 'message' => $uploadedFile['error_msg']);
                        echo json_encode($response);
                        return false;
                    }
                    $data['media'] = $uploadedFile['file'];
                    $this->remove_file_from_directory('assets/uploads/gallery_media/image',$this->input->post('old_media'));
                    $this->remove_file_from_directory('assets/uploads/gallery_media/video',$this->input->post('old_media'));
                }
            }
            $data['head'] = $this->input->post('gallery_head');
            $data['gallery_type'] = $this->input->post('gallery_type');
            $data['status'] = 1;

            $result = $this->master->updateRecord('tbl_gallery',array('id'=>$this->input->post('gallery_id')),$data);
            $response = array('status' => 'success','message'=> 'Gallery updated successfully','url'=>base_url('admin/gallery'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'gallery_head' => form_error('gallery_head'),
                    'gallery_type' => form_error('gallery_type'),
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteGallery(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $singleRecord = $this->master->singleRecord('tbl_gallery',array('id'=>$id));
            $result = $this->master->deleteRecord('tbl_gallery',array('id'=>$id));
            if($result > 0){
                if($singleRecord['gallery_type'] = 'photo'){
                    $this->remove_file_from_directory('assets/uploads/gallery_media/image',$singleRecord['media']);
                }else{
                    $this->remove_file_from_directory('assets/uploads/gallery_media/video',$singleRecord['media']);
                }
                $response = array('status' => 'success','message' => 'Gallery deleted successfully','url'=>base_url('admin/gallery'));
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