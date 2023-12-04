<?php

Class GalleryHeads extends MY_Controller {

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
            $data['galleryheadsList'] = $this->master->getRecords('tbl_gallery_heads');
            $this->load->view('admin/galleryheads/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/galleryheads/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editGalleryHeads($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleGalleryHeads'] = $this->master->singleRecord('tbl_gallery_heads',array('id'=>$id));
            $this->load->view('admin/galleryheads/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save GalleryHeads
    public function saveGalleryHeads(){
        $this->form_validation->set_rules('head_name', 'Head', 'trim|required');
        if ($this->form_validation->run()) {
            $data['head_name'] = $this->input->post('head_name');
            $result = $this->master->insert('tbl_gallery_heads',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Gallery Head added successfully','url'=>base_url('admin/gallery-heads'));
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
                    'head_name' => form_error('head_name')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save GalleryHeads
    public function updateGalleryHeads(){
        $this->form_validation->set_rules('head_name', 'GalleryHeads', 'trim|required');
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
    public function deleteGalleryHeads(){
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
}

?>