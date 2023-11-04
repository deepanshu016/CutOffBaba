<?php

Class Ownership extends MY_Controller {

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
            $data['ownerShipList'] = $this->master->getRecords('tbl_ownership');
            $this->load->view('admin/ownership/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/ownership/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editOwnership($id,$slug){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleOwnership'] = $this->master->singleRecord('tbl_ownership',array('id'=>$id,'slug'=>$slug));
            $this->load->view('admin/ownership/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function file_check($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        if(!empty($_FILES['banner_image'])){
            $mime = get_mime_by_extension($_FILES['banner_image']['name']);
            if(isset($_FILES['banner_image']['name']) && $_FILES['banner_image']['name']!=""){
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
    //Save Banner
    public function saveOwnership(){
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        if ($this->form_validation->run()) {
            $data['title'] = $this->input->post('title');
            $data['slug'] = $this->slug($this->input->post('title'));
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $result = $this->master->insert('tbl_ownership',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Ownership added successfully','url'=>base_url('admin/ownership'));
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
                    'title' => form_error('title')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Category
    public function updateOwnership(){

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        if ($this->form_validation->run()) {

            $data['title'] = $this->input->post('banner_title');
            $data['slug'] = $this->slug($this->input->post('banner_title'));
            $data['status'] = 1;
            $data['updated_at'] = date('Y-m-d H:i:s');
            $result = $this->master->updateRecord('tbl_ownership',array('id'=>$this->input->post('ownership_id')),$data);
            $response = array('status' => 'success','message'=> 'Ownership updated successfully','url'=>base_url('admin/ownership'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'title' => form_error('title')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteOwnership(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_ownership',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Ownership deleted successfully','url'=>base_url('admin/ownership'));
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