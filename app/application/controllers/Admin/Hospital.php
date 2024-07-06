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
            $this->load->view('admin/hospital/import',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
 
    // Import CSV in DB
    public function importHospitalByExcel(){
        if (!empty($_FILES['excel_file'])) {
            if(!empty($_FILES['excel_file']['name'])) {
                $config['upload_path']  = 'assets/uploads/excels';
                $config['allowed_types'] = 'csv|CSV|xlsx|XLSX|xls|XLS';
                $config['encrypt_name'] =  TRUE;
                $config['max_size']      = 1024;
                $uploadedFile = $this->uploadFile($_FILES['excel_file']['name'], 'excel_file', $config);
                $file_data = $uploadedFile['file'];
            }
            $path = 'assets/uploads/excels/';
            $json 		= [];
            $file_name 	= $path.$file_data;

            $arr_file 	= explode('.', $file_name);
            $extension 	= end($arr_file);
            if('csv' == $extension) {
                $reader 	= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader 	= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet 	= $reader->load($file_name);
            $sheet_data 	= $spreadsheet->getActiveSheet()->toArray();
        
            $insertDatas 	= [];
            foreach($sheet_data as $key=>$sheet){
                if($key == 0) {
                    for($i=2;$i<count($sheet);$i++){
                        $insertDatas[$i-2]['facility_id'] = explode('_',$sheet[$i])[0];
                    }
                }
                if($key > 0){
                    $importData['college_id'] = explode('_',$sheet[1])[0];
                    for($i=2;$i<count($sheet);$i++){
                        if(isset($sheet[$i])){
                            $insertDatas[$i-2]['value'] = $sheet[$i];
                        }else{
                            $insertDatas[$i-2]['value'] = 0;
                        }
                    }
                    $importData['facilities'] = json_encode($insertDatas);
                    $ids = $sheet[0];
                    if(!$ids){
                        $this->master->insert('tbl_hospital',$importData);
                    }else{
                        $this->master->updateRecord('tbl_hospital',array('id'=>$ids),$importData);
                    }
                }
            }
            $response = array('status' => 'success','message'=> 'Data imported successfully','url'=>base_url('admin/hospital'));
            echo json_encode($response);
            return false;
        }else{
            $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($response));



        // if($_FILES['excel_file']['error'] == 0){
        //     $name = $_FILES['excel_file']['name'];
        //     $ext = explode('.', $name);
            
        //     $type = $_FILES['excel_file']['type'];
        //     $tmpName = $_FILES['excel_file']['tmp_name'];
        //     if($ext[1] === 'csv'){
        //         if(($handle = fopen($tmpName, 'r')) !== FALSE) {
        //             set_time_limit(0);
        //             $row = 0;
        //             //$datas = fgetcsv($handle, 1000, ',');
                   
        //             while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
        //                 $col_count = count($data);
        //                 $facilityData = [];    
                        
        //                 if($row == 0){
        //                     $totalFacility = count($data);
        //                     for($i=2;$i<$totalFacility;$i++){
        //                         $facilityData[$i-2]['facility_id'] = $data[$i];
        //                         $facilityData[$i-2]['index'] = $i;
        //                     }
        //                 }
        //                 $facilityData = array_filter($facilityData);
        //                 if ($row > 0) {
        //                     echo "<pre>";
        //                     print_r($facilityData);die;
        //                     $impdata['college_id'] = explode('_',$data[1])[0];
                            
        //                     foreach($facilityData as $key=>$face){
                               
        //                         // if(!empty($face) && isset($data[$face['index']])){
        //                         //     $newFace[$key]['facility_id'] = explode('_',$face['facility_id'])[0];
        //                         //     $newFace[$key]['value'] = $data[$face['index']];
                                    
        //                         // }
        //                         // $facilityDatas[$key]['facility_id'] = (isset($data[$face['index']])) ? ;
        //                         // $facilityDatas[$key]['facility_id'] = (isset($data[$face['index']])) ? ;
        //                     }
        //                     $impdata['facilities'] = json_encode($newFace);
        //                     // $id=$data[0];
        //                     // if($id==""){
        //                     //     $this->db->insert('tbl_hospital',$impdata);
        //                     // }else{
        //                     //     $this->db->where('id',$id)->update('tbl_hospital',$impdata);
        //                     // }
        //                     // echo "<pre>";
        //                     // print_r($impdata); 
        //                 }
        //                 $row++;
        //              } 
        //              die;
        //              fclose($handle);
        //             $response = array('status' => 'success','message' => 'College imported successfully','url'=>base_url('admin/college'));
        //             echo json_encode($response);
        //             return true;

                    

        //         }else{

        //             $response = array(
        //                 'status' => 'error',
        //                 'errors' => array(
        //                     'excel_file' => form_error('excel_file')
        //                 )
        //             );
        //             echo json_encode($response);
        //             return false;
        //         }
        //     }else{
        //         $response = array(
        //         'status' => 'error',
        //         'errors' => array(
        //             'excel_file' => form_error('excel_file')
        //             )
        //         );
        //         echo json_encode($response);
        //         return false;
        //     }
        // }else{
        //     $response = array(
        //         'status' => 'error',
        //         'errors' => array(
        //             'excel_file' => form_error('excel_file')
        //         )
        //     );
        //     echo json_encode($response);
        //     return false;
        // }
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