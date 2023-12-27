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
    public function importGalleryHeads(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/galleryheads/import',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
 
    // Import CSV in DB
    public function importGalleryHeadsByExcel(){
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
                            $impdata['head_name']=$data[1];
                            $id=$data[0];
                            if($id==""){
                                $this->db->insert('tbl_gallery_heads',$impdata);
                            }else{
                                $this->db->where('id',$id)->update('tbl_gallery_heads',$impdata);
                            }
                        }
                        $row++;
                     }
                     fclose($handle);
                    $response = array('status' => 'success','message' => 'Gallery Head imported successfully','url'=>base_url('admin/gallery-heads'));
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