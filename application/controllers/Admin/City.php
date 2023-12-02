<?php

Class City extends MY_Controller {

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
            $data['cityList'] = $this->master->getRecords('tbl_city');
            $this->load->view('admin/city/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['stateList'] = $this->master->getRecords('tbl_state');
            $this->load->view('admin/city/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editCity($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['stateList'] = $this->master->getRecords('tbl_state');
            $data['singleCity'] = $this->master->singleRecord('tbl_city',array('id'=>$id));

            $this->load->view('admin/city/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Country
    public function saveCity(){
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('city', 'District', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        if ($this->form_validation->run()) {
            $data['city'] = $this->input->post('city');
            $data['state_id'] = $this->input->post('state');
            $data['country'] = $this->input->post('country');

            $result = $this->master->insert('tbl_city',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'District added successfully','url'=>base_url('admin/district'));
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
                    'city' => form_error('city'),
                    'state' => form_error('state'),
                    'country' => form_error('country')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Category
    public function updateCity(){

        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('city', 'District', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        if ($this->form_validation->run()) {
            $data['city'] = $this->input->post('city');
            $data['state_id'] = $this->input->post('state');
            $data['country'] = $this->input->post('country');
            $result = $this->master->updateRecord('tbl_city',array('id'=>$this->input->post('city_id')),$data);
            $response = array('status' => 'success','message'=> 'District updated successfully','url'=>base_url('admin/district'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'city' => form_error('city'),
                    'state' => form_error('state'),
                    'country' => form_error('country')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteCity(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_city',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'District deleted successfully','url'=>base_url('admin/district'));
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
    public function importCity(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/city/import',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }

    // Import CSV in DB
    public function importCityByExcel(){
        $this->form_validation->set_rules('excel_file', 'Excel File', 'callback_file_check_excel_file');
        if ($this->form_validation->run()) {
            if(!empty($_FILES['excel_file']['name'])){
                $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                if(isset($_FILES['excel_file']['name']) && in_array($_FILES['excel_file']['type'], $file_mimes)) {
                    $arr_file = explode('.', $_FILES['excel_file']['name']);
                    $extension = end($arr_file);
                    if('xlsx' == $extension){
                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                    } else {
                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                    }
                    $spreadsheet = $reader->load($_FILES['excel_file']['tmp_name']);
                    $excelData = $spreadsheet->getActiveSheet()->toArray();
                    $sheetData = $this->csv_formatter($excelData);
                    $stateData = [];
                    if(!empty($sheetData)){
                        foreach($sheetData as $key=>$sheet){
                            $stateData[$key]['city'] = $sheet['district'];
                            $stateData[$key]['state_id '] = $sheet['state_id '];
                            $stateData[$key]['country'] = $sheet['country_id'];
                        }
                    }
                    $stateId = $this->master->insertBulk('tbl_city',$stateData);
                    $response = array('status' => 'success','message' => 'City imported successfully','url'=>base_url('admin/district'));
                    echo json_encode($response);
                    return true;
                }
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