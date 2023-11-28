<?php

Class SubCategory extends MY_Controller {

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
            $data['subCategoryList'] = $this->master->getRecords('tbl_sub_category');
            $this->load->view('admin/sub_category/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/sub_category/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editSubCategory($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleSubCategory'] = $this->master->singleRecord('tbl_sub_category',array('id'=>$id));

            $this->load->view('admin/sub_category/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save SubCategory
    public function saveSubCategory(){
        $this->form_validation->set_rules('sub_category_name', 'Sub Category Name', 'trim|required');
        $this->form_validation->set_rules('category_id', 'Category', 'trim|required');
        $this->form_validation->set_rules('head_id', 'Head', 'trim|required');
        $this->form_validation->set_rules('short_name', 'Short Name', 'trim|required');
        $this->form_validation->set_rules('open_id', 'Open', 'trim|required');
        if ($this->form_validation->run()) {
            $data['sub_category_name'] = $this->input->post('sub_category_name');
            $data['slug'] = $this->slug($this->input->post('sub_category_name'));
            $data['category_id'] = $this->input->post('category_id');
            $data['head_id'] = $this->input->post('head_id');
            $data['short_name'] = $this->input->post('short_name');
            $data['open_id'] = $this->input->post('open_id');
            $result = $this->master->insert('tbl_sub_category',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Sub Category added successfully','url'=>base_url('admin/sub-category'));
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
                    'sub_category_name' => form_error('sub_category_name'),
                    'head_id' => form_error('head_id'),
                    'category_id' => form_error('category_id'),
                    'short_name' => form_error('short_name'),
                    'open_id' => form_error('open_id')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Sub Category
    public function updateSubCategory(){
        $this->form_validation->set_rules('sub_category_name', 'Sub Category Name', 'trim|required');
        $this->form_validation->set_rules('category_id', 'Category', 'trim|required');
        $this->form_validation->set_rules('head_id', 'Head', 'trim|required');
        $this->form_validation->set_rules('short_name', 'Short Name', 'trim|required');
        $this->form_validation->set_rules('open_id', 'Open', 'trim|required');
        if ($this->form_validation->run()) {
            $data['sub_category_name'] = $this->input->post('sub_category_name');
            $data['slug'] = $this->slug($this->input->post('sub_category_name'));
            $data['category_id'] = $this->input->post('category_id');
            $data['head_id'] = $this->input->post('head_id');
            $data['short_name'] = $this->input->post('short_name');
            $data['open_id'] = $this->input->post('open_id');
            $result = $this->master->updateRecord('tbl_sub_category',array('id'=>$this->input->post('sub_category_id')),$data);
            $response = array('status' => 'success','message'=> 'Sub Category updated successfully','url'=>base_url('admin/sub-category'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'sub_category_name' => form_error('sub_category_name'),
                    'head_id' => form_error('head_id'),
                    'category_id' => form_error('category_id'),
                    'short_name' => form_error('short_name'),
                    'open_id' => form_error('open_id')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteSubCategory(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_sub_category',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Sub Category deleted successfully','url'=>base_url('admin/sub-category'));
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