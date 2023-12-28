<?php

Class SpecialCategory extends MY_Controller {

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
            $data['specialCategoryList'] = $this->master->getRecords('tbl_special_category');
            $this->load->view('admin/special_category/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/special_category/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editSpecialCategory($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleSpecialCategory'] = $this->master->singleRecord('tbl_special_category',array('id'=>$id));
            $this->load->view('admin/special_category/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Special Category
    public function saveSpecialCategory(){
        $this->form_validation->set_rules('special_category_name', 'Special Category Name', 'trim|required');
        $this->form_validation->set_rules('head_id', 'Head', 'trim|required');
        $this->form_validation->set_rules('short_name', 'Short Name', 'trim|required');
        $this->form_validation->set_rules('visibility_id', 'Visibility', 'trim|required');
        if ($this->form_validation->run()) {
            $data['special_category_name'] = $this->input->post('special_category_name');
            $data['slug'] = $this->slug($this->input->post('special_category_name'));
            $data['head_id'] = $this->input->post('head_id');
            $data['short_name'] = $this->input->post('short_name');
            $data['visibility_id'] = $this->input->post('visibility_id');
            $result = $this->master->insert('tbl_special_category',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Special Category added successfully','url'=>base_url('admin/special-category'));
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
                    'special_category_name' => form_error('special_category_name'),
                    'head_id' => form_error('head_id'),
                    'short_name' => form_error('short_name'),
                    'visibility_id' => form_error('visibility_id')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Sub Category
    public function updateSpecialCategory(){
        $this->form_validation->set_rules('special_category_name', 'Special Category Name', 'trim|required');
        $this->form_validation->set_rules('head_id', 'Head', 'trim|required');
        $this->form_validation->set_rules('short_name', 'Short Name', 'trim|required');
        $this->form_validation->set_rules('visibility_id', 'Open', 'trim|required');
        if ($this->form_validation->run()) {
            $data['special_category_name'] = $this->input->post('special_category_name');
            $data['slug'] = $this->slug($this->input->post('special_category_name'));
            $data['head_id'] = $this->input->post('head_id');
            $data['short_name'] = $this->input->post('short_name');
            $data['visibility_id'] = $this->input->post('visibility_id');
            $result = $this->master->updateRecord('tbl_special_category',array('id'=>$this->input->post('special_category_id')),$data);
            $response = array('status' => 'success','message'=> 'Special Category updated successfully','url'=>base_url('admin/special-category'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'special_category_name' => form_error('special_category_name'),
                    'head_id' => form_error('head_id'),
                    'short_name' => form_error('short_name'),
                    'visibility_id' => form_error('visibility_id')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteSpecialCategory(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_special_category',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Special Category deleted successfully','url'=>base_url('admin/special-category'));
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
    public function importSpecialCategory(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/special_category/import',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }

    // Import CSV in DB
    public function importSpecialCategoryByExcel(){
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
                            $impdata['special_category_name']=$data[1];
                            $impdata['slug']=$this->slug($data[1]);
                            $impdata['head_id']=explode('_',$data[2])[0];
                            $impdata['short_name']=$data[3];
                            $impdata['visibility_id']=explode('_',$data[4])[0];
                            $id=$data[0];
                            if($id==""){
                                $this->db->insert('tbl_special_category',$impdata);
                            }else{
                                $this->db->where('id',$id)->update('tbl_special_category',$impdata);
                            }
                        }
                        $row++;
                     }
                     fclose($handle);
                    $response = array('status' => 'success','message' => 'Special Category imported successfully','url'=>base_url('admin/special-category'));
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