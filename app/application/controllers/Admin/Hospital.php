<?php

Class Hospital extends MY_Controller {

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
            $data['hospitalList'] = $this->master->getRecords('tbl_hospital');
            $this->load->view('admin/hospital/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['collegeList'] = $this->master->getRecords('tbl_college');
            $this->load->view('admin/hospital/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editHospital($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleHospital'] = $this->master->singleRecord('tbl_hospital',array('id'=>$id));
            $collegeDetail = $this->master->singleRecord('tbl_college',['id'=>$data['singleHospital']['college_id']]);
            $data['collegeList'] = $this->master->getRecords('tbl_college');
            $data['facilitiesList'] = [];
            if(!empty($collegeDetail)){
                $facilities = explode(',',$collegeDetail['facility']);
                $data['facilitiesList'] = $this->db->select('*')->where_in('id',$facilities)->get('tbl_facilities')->result_array();
            }
            $this->load->view('admin/hospital/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    
    public function saveHospital(){
        $this->form_validation->set_rules('hospital_name', 'Hospital name', 'trim|required');
        $this->form_validation->set_rules('college_id', 'College', 'trim|required');
        $this->form_validation->set_rules('facility_value[]', 'Facilities Value', 'trim|required');
        if ($this->form_validation->run()) {
            $facility_id = $this->input->post('facility_ids');
            $facility_value = $this->input->post('facility_value');
            $facilityData = [];
            if(!empty($facility_id) && !empty($facility_value)){
                foreach($facility_id as $key=>$facility){
                    $facilityData[$key]['facility_id'] = $facility;
                    $facilityData[$key]['value'] = $facility_value[$key];
                }   
            }
           
            $data['hospital_name'] = $this->input->post('hospital_name');
            $data['college_id'] = $this->input->post('college_id');
            $data['facilities'] = json_encode($facilityData);
            $data['status'] = 1; 
            $result = $this->master->insert('tbl_hospital',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Data added successfully','url'=>base_url('admin/hospital'));
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
                    'hospital_name' => form_error('hospital_name'),
                    'college_id' => form_error('college_id'),
                    'facility_value' => form_error('facility_value[]'),
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Hospital
    public function updateHospital(){
        $this->form_validation->set_rules('hospital_name', 'Hospital Name', 'trim|required');
        $this->form_validation->set_rules('college_id', 'College', 'trim|required');
        $this->form_validation->set_rules('facility_value[]', 'Facilities Value', 'trim|required');
        if ($this->form_validation->run()) {
            $facility_id = $this->input->post('facility_ids');
            $facility_value = $this->input->post('facility_value');
            $facilityData = [];
            if(!empty($facility_id) && !empty($facility_value)){
                foreach($facility_id as $key=>$facility){
                    $facilityData[$key]['facility_id'] = $facility;
                    $facilityData[$key]['value'] = $facility_value[$key];
                }   
            }
            $data['hospital_name'] = $this->input->post('hospital_name');
            $data['college_id'] = $this->input->post('college_id');
            $data['facilities'] = json_encode($facilityData);
            $data['status'] = 1; 
            $result = $this->master->updateRecord('tbl_hospital',array('id'=>$this->input->post('hospital_id')),$data);
            $response = array('status' => 'success','message'=> 'Hospital updated successfully','url'=>base_url('admin/hospital'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'hospital_name' => form_error('hospital_name'),
                    'college_id' => form_error('college_id'),
                    'facility_value' => form_error('facility_value[]'),
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteHospital(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_hospital',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Data deleted successfully','url'=>base_url('admin/hospital'));
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
    public function importHospital(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/college/import',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }

    // Import CSV in DB
    public function importHospitalByExcel(){

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
                            $impdata['full_name'] = $data[1];
                            $impdata['slug'] = $this->slug($data[1]);
                            $impdata['short_name'] = $data[2];
                            $impdata['short_description'] = $data[3];
                            $impdata['popular_name_one'] = $data[4];
                            $impdata['popular_name_two'] = $data[5];
                            $impdata['establishment'] = $data[6];
                            $impdata['gender_accepted'] = $data[7];
                            $impdata['stream'] = $data[8];
                            $impdata['course_offered'] = $data[9];
                            $impdata['country'] = $data[10];
                            $impdata['state'] = $data[11];
                            $impdata['city'] = $data[12];
                            $impdata['subdistrict'] = $data[13];
                            $impdata['affiliated_by'] = $data[14];
                            $impdata['university_name'] = $data[15];
                            $impdata['approved_by'] = $data[16];
                            $impdata['ownership'] = $data[17];
                            $impdata['website'] =  $data[18];
                            $impdata['email'] = $data[19];
                            $impdata['contact_one'] = $data[20];
                            $impdata['contact_two'] = $data[21];
                            $impdata['contact_three'] = $data[22];
                            $impdata['nodal_officer_name'] = $data[23];
                            $impdata['nodal_officer_no'] = $data[24];
                            $impdata['keywords'] = $data[25];
                            $impdata['tags'] = $data[26];                            
                            $impdata['facility'] = $data[27];
                            $impdata['status'] = $data[28];
                            $id=$data[0];
                            if($id==""){
                                $this->db->insert('tbl_hospital',$impdata);
                            }else{
                                $this->db->where('id',$id)->update('tbl_hospital',$impdata);
                            }
                        }
                        $row++;
                     }
                     fclose($handle);
                    $response = array('status' => 'success','message' => 'College imported successfully','url'=>base_url('admin/college'));
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


    public function getCollegeFacilities(){
        $college_id = $this->input->post('id');
        $hospital_id = $this->input->post('hospital_id');
        $collegeDetail = $this->master->singleRecord('tbl_college',['id'=>$college_id]);
        $singleHospital = $this->master->singleRecord('tbl_hospital',array('id'=>$hospital_id));
        if(!empty($collegeDetail)){
            $facilities = explode(',',$collegeDetail['facility']);
            $facilitiesList = $this->db->select('*')->where_in('id',$facilities)->get('tbl_facilities')->result_array();
            $html = $this->load->view('admin/hospital/facility_data',['facilitiesList'=>$facilitiesList,'singleHospital'=>$singleHospital],true);
            $response = array('status' => 200,'message' => 'Data fetched successfully','url'=>'','html'=>$html);
            echo json_encode($response);
            return false;
        }else{
            $response = array('status' => 400,'message' => 'No Data found','url'=>'','html'=>'');
            echo json_encode($response);
            return false;
        }
    }
}

?>