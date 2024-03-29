<?php

Class Stream extends MY_Controller {

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
            $data['streamList'] = $this->master->getRecords('tbl_stream');
            $this->load->view('admin/stream/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/stream/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editStream($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleStream'] = $this->master->singleRecord('tbl_stream',array('id'=>$id));
            $this->load->view('admin/stream/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function file_check_stream_image($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        $gallery_type = $this->input->post('gallery_type');
        if(empty($_FILES['stream_image']['name'])){
            $this->form_validation->set_message('file_check_stream_image', 'Please choose a file to upload.');
            return false;
        }else{
            $mime = get_mime_by_extension($_FILES['stream_image']['name']);
            if(isset($_FILES['stream_image']['name']) && $_FILES['stream_image']['name']!=""){
                if(in_array($mime, $allowed_mime_type_arr)){
                    return true;
                }else{
                    $this->form_validation->set_message('file_check_stream_image', 'Please select only jpg/png file.');
                    return false;
                }
            }else{
                $this->form_validation->set_message('file_check_stream_image', 'Please choose a file to upload.');
                return false;
            }
        }
    }
    //Save Stream
    public function saveStream(){
        $this->form_validation->set_rules('stream', 'Stream', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('stream_image', 'Stream Image', 'callback_file_check_stream_image');
        if ($this->form_validation->run()) {
            
            $config['upload_path']  = 'assets/uploads/stream';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            if(!empty($_FILES['stream_image']['name'])){
	            $uploadedFile = $this->uploadFile($_FILES['stream_image']['name'],'stream_image',$config);
	             if($uploadedFile['error_msg'] != ''){
	            	$response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
	            	echo json_encode($response);
                    return false;
	            }
                
	            $data['stream_image'] = $uploadedFile['file'];
        	}
            $data['stream'] = $this->input->post('stream');
            $data['description'] = $this->input->post('description');
            $result = $this->master->insert('tbl_stream',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Stream added successfully','url'=>base_url('admin/stream'));
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
                    'stream' => form_error('stream'),
                    'description' => form_error('description'),
                    'stream_image' => form_error('stream_image')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Stream
    public function updateStream(){
        $this->form_validation->set_rules('stream', 'Stream', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        if(!empty($_FILES['stream_image']['name'])){
            $this->form_validation->set_rules('image', 'Stream Image', 'callback_file_check_stream_image');
        }
        if ($this->form_validation->run()) {
            if(!empty($_FILES['stream_image']['name'])){
                $config['upload_path']  = 'assets/uploads/stream';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['encrypt_name'] =  TRUE;
                $config['max_size']      = 1024;    
	            $uploadedFile = $this->uploadFile($_FILES['stream_image']['name'],'stream_image',$config);
	            if($uploadedFile['error_msg'] != ''){
	            	$response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
	            	echo json_encode($response);
                    return false;
	            }else{
	            	$data['stream_image'] = $uploadedFile['file'];
	            }
        	}
            $data['stream'] = $this->input->post('stream');
            $data['description'] = $this->input->post('description');
            $result = $this->master->updateRecord('tbl_stream',array('id'=>$this->input->post('stream_id')),$data);
            $response = array('status' => 'success','message'=> 'Stream updated successfully','url'=>base_url('admin/stream'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'stream' => form_error('stream'),
                    'description' => form_error('description'),
                    'stream_image' => form_error('stream_image')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteStream(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_stream',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Stream deleted successfully','url'=>base_url('admin/stream'));
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
    public function importStream(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/stream/import',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }

    // Import CSV in DB
    public function importStreamByExcel(){
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
                            $impdata['stream']=$data[1];
                            $impdata['description']=$data[2];
                            $impdata['stream_image']=$data[3];
                            $id=$data[0];
                            if($id==""){
                                $this->db->insert('tbl_stream',$impdata);
                            }else{
                                $this->db->where('id',$id)->update('tbl_stream',$impdata);
                            }
                        }
                        $row++;
                     }
                     fclose($handle);
                    $response = array('status' => 'success','message' => 'Streams imported successfully','url'=>base_url('admin/stream'));
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