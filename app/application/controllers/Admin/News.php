<?php

Class News extends MY_Controller {

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
            $data['newsList'] = $this->master->getRecords('tbl_news');
            $this->load->view('admin/news/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/news/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editNews($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleNews'] = $this->master->singleRecord('tbl_news',array('id'=>$id));
            $this->load->view('admin/news/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Gallery
    public function file_check_news_image($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png','image/jpg');
        if(isset($_FILES['news_image']['name']) && $_FILES['news_image']['name']!=""){
            $mime = get_mime_by_extension($_FILES['news_image']['name']);
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check_news_image', 'Please select only jpg/png file.');
                return false;
            }
        }
    }
    public function saveNews(){
        $this->form_validation->set_rules('course_id', 'Course', 'trim|required');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('news_image', 'News Image', 'callback_file_check_news_image');
        if ($this->form_validation->run()) {
            if(!empty($_FILES['news_image']['name'])) {
                $config['upload_path']  = 'assets/uploads/news';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['encrypt_name'] =  TRUE;
                $config['max_size']      = 1024;
                $uploadedFile = $this->uploadFile($_FILES['news_image']['name'], 'news_image', $config);
                if (!empty($uploadedFile['error_msg'])) {
                    $response = array('status' => 'errors', 'message' => $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['image'] = $uploadedFile['file'];
            }
            $data['title'] = $this->input->post('title');
            $data['slug'] = $this->slug($this->input->post('title'));
            $data['course_id'] = $this->input->post('course_id');
            $data['short_description'] = $this->input->post('short_description');
            $data['full_description'] = $this->input->post('full_description');
            $result = $this->master->insert('tbl_news',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'News added successfully','url'=>base_url('admin/news'));
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
                    'course_id' => form_error('course_id'),
                    'title' => form_error('title'),
                    'news_image' => form_error('news_image')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save News
    public function updateNews(){
        $this->form_validation->set_rules('course_id', 'Course', 'trim|required');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('news_image', 'News Image', 'callback_file_check_news_image');
        if ($this->form_validation->run()) {
            if(!empty($_FILES['news_image']['name'])) {
                $config['upload_path']  = 'assets/uploads/news';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['encrypt_name'] =  TRUE;
                $config['max_size']      = 1024;
                $uploadedFile = $this->uploadFile($_FILES['news_image']['name'], 'news_image', $config);
                if (!empty($uploadedFile['error_msg'])) {
                    $response = array('status' => 'errors', 'message' => $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['image'] = $uploadedFile['file'];
                $this->remove_file_from_directory('assets/uploads/news',$this->input->post('old_news_image'));
            }
            $data['title'] = $this->input->post('title');
            $data['slug'] = $this->slug($this->input->post('title'));
            $data['course_id'] = $this->input->post('course_id');
            $data['short_description'] = $this->input->post('short_description');
            $data['full_description'] = $this->input->post('full_description');
            $result = $this->master->updateRecord('tbl_news',array('id'=>$this->input->post('news_id')),$data);
            $response = array('status' => 'success','message'=> 'News updated successfully','url'=>base_url('admin/news'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'course_id' => form_error('course_id'),
                    'title' => form_error('title'),
                    'news_image' => form_error('news_image')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteNews(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $singleRecord = $this->master->singleRecord('tbl_news',array('id'=>$id));
            $result = $this->master->deleteRecord('tbl_news',array('id'=>$id));
            if($result > 0){
                $this->remove_file_from_directory('assets/uploads/news',$singleRecord['image']);
                $response = array('status' => 'success','message' => 'News deleted successfully','url'=>base_url('admin/news'));
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


    public function importNews(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/news/import',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }

    // Import CSV in DB

    public function importNewsByExcel(){
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
                            $impdata['image']=$data[1];
                            $impdata['slug']=$this->slug($data[3]);
                            $impdata['course_id']=explode('_',$data[2])[0];
                            $impdata['title']=$data[3];
                            $impdata['short_description']=$data[4];
                            $impdata['full_description']=$data[5];
                            $id=$data[0];
                            if($id==""){
                                $this->db->insert('tbl_news',$impdata);
                            }else{
                                $this->db->where('id',$id)->update('tbl_news',$impdata);
                            }
                        }
                        $row++;
                     }
                     fclose($handle);
                    $response = array('status' => 'success','message' => 'News imported successfully','url'=>base_url('admin/news'));
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