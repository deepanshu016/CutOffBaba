<?php


class Facilities extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MasterModel', 'master');
        $this->load->model('SiteSettings', 'site');
    }

    public function index()
    {
        if ($this->is_admin_logged_in() == true) {
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings', []);
            $data['admin_session'] = $this->session->userdata('admin');
            $data['facilitiesList'] = $this->master->getRecords('tbl_facilities');
            $this->load->view('admin/facilities/list', $data);
        } else {
            $this->session->set_flashdata('error', 'Please login first');
            return redirect('admin');
        }
    }

    public function add()
    {
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings', []);
            $this->load->view('admin/facilities/add-edit', $data);
        } else {
            $this->session->set_flashdata('error', 'Please login first');
            return redirect('admin');
        }
    }

    public function editFacilities($id)
    {
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings', []);
            $data['singleFacility'] = $this->master->singleRecord('tbl_facilities', array('id' => $id));
            $this->load->view('admin/facilities/add-edit', $data);
        } else {
            $this->session->set_flashdata('error', 'Please login first');
            return redirect('admin');
        }
    }
    public function file_check_facility_logo($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png','image/jpg');
        if(isset($_FILES['facility_logo']['name']) && $_FILES['facility_logo']['name']!=""){
            $mime = get_mime_by_extension($_FILES['facility_logo']['name']);
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check_facility_logo', 'Please select only jpg/png file.');
                return false;
            }
        }
    }
    //Save Facilities
    public function saveFacilities()
    {
        $this->form_validation->set_rules('facility', 'Facilities', 'trim|required');
        $this->form_validation->set_rules('facility_logo', 'State Logo', 'callback_file_check_facility_logo');
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/facility';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            if(!empty($_FILES['facility_logo']['name'])) {
                $uploadedFile = $this->uploadFile($_FILES['facility_logo']['name'], 'facility_logo', $config);
                if (!empty($uploadedFile['error_msg'])) {
                    $response = array('status' => 'errors', 'message' => $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['facility_logo'] = $uploadedFile['file'];
            }
            $data['facility'] = $this->input->post('facility');
            $result = $this->master->insert('tbl_facilities', $data);
            if ($result > 0) {
                $response = array('status' => 'success', 'message' => 'Facilities added successfully', 'url' => base_url('admin/facilities'));
                echo json_encode($response);
                return false;
            } else {
                $response = array('status' => 'errors', 'message' => 'Something went wrong');
                echo json_encode($response);
                return false;
            }
        } else {
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'facility' => form_error('facility'),
                    'facility_logo' => form_error('facility_logo')
                )
            );
            echo json_encode($response);
            return false;
        }
    }

    //Save Facilities
    public function updateFacilities()
    {
        $this->form_validation->set_rules('facility', 'Facilities', 'trim|required');
        $this->form_validation->set_rules('facility_logo', 'Facility Logo', 'callback_file_check_facility_logo');
        if ($this->form_validation->run()) {
            if(!empty($_FILES['facility_logo']['name'])) {
                $config['upload_path']  = 'assets/uploads/facility';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['encrypt_name'] =  TRUE;
                $config['max_size']      = 1024;
                $uploadedFile = $this->uploadFile($_FILES['facility_logo']['name'], 'facility_logo', $config);
                if (!empty($uploadedFile['error_msg'])) {
                    $response = array('status' => 'errors', 'message' => $uploadedFile['error_msg']);
                    echo json_encode($response);
                    return false;
                }
                $data['facility_logo'] = $uploadedFile['file'];
                $this->remove_file_from_directory('assets/uploads/facility',$this->input->post('old_facility_logo'));
            }
            $data['facility'] = $this->input->post('facility');
            $result = $this->master->updateRecord('tbl_facilities', array('id' => $this->input->post('facility_id')), $data);
            $response = array('status' => 'success', 'message' => 'Facilities updated successfully', 'url' => base_url('admin/facilities'));
            echo json_encode($response);
            return true;
        } else {
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'facility' => form_error('facility'),
                    'facility_logo' => form_error('facility_logo')
                )
            );
            echo json_encode($response);
            return false;
        }
    }

    public function deleteFacilities()
    {
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $singleRecord = $this->master->singleRecord('tbl_facilities',array('id'=>$id));
            $result = $this->master->deleteRecord('tbl_facilities', array('id' => $id));
            if ($result > 0) {
                $this->remove_file_from_directory('assets/uploads/facility',$singleRecord['facility_logo']);
                $response = array('status' => 'success', 'message' => 'Facilities deleted successfully', 'url' => base_url('admin/facilities'));
            } else {
                $response = array('status' => 'errors', 'message' => 'Something went wrong !!!', 'url' => '');
            }
        } else {
            $response = array('status' => 'errors', 'message' => 'Something went wrong !!!', 'url' => '');
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
    public function importFacilities(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/facilities/import',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }

    // Import CSV in DB
    public function importFacilitiesByExcel(){
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
                            $impdata['facility']=$data[1];
                            $id=$data[0];
                            if($id==""){
                                $this->db->insert('tbl_facilities',$impdata);
                            }else{
                                $this->db->where('id',$id)->update('tbl_facilities',$impdata);
                            }
                        }
                        $row++;
                     }
                     fclose($handle);
                    $response = array('status' => 'success','message' => 'Facility imported successfully','url'=>base_url('admin/facilities'));
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

