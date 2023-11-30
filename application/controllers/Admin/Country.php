<?php

Class Country extends MY_Controller {

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
            $data['countryList'] = $this->master->getRecords('tbl_country');
            $this->load->view('admin/country/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/country/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editCountry($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleCountry'] = $this->master->singleRecord('tbl_country',array('id'=>$id));
            $this->load->view('admin/country/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Country
    public function saveCountry(){
        $this->form_validation->set_rules('name', 'Country Name', 'trim|required|is_unique[tbl_country.countryCode]');
        $this->form_validation->set_rules('country_code', 'Country Code', 'trim|required');
        if ($this->form_validation->run()) {
            $data['name'] = $this->input->post('name');
            $data['countryCode'] = $this->input->post('country_code');
            $result = $this->master->insert('tbl_country',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Country added successfully','url'=>base_url('admin/country'));
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
                    'name' => form_error('name'),
                    'country_code' => form_error('country_code')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Category
    public function updateCountry(){

        $this->form_validation->set_rules('name', 'Country Name', 'trim|required');
        $this->form_validation->set_rules('country_code', 'Country Code', 'trim|required');
        if ($this->form_validation->run()) {
            $data['name'] = $this->input->post('name');
            $data['countryCode'] = $this->input->post('country_code');
            $result = $this->master->updateRecord('tbl_country',array('id'=>$this->input->post('country_id')),$data);
            $response = array('status' => 'success','message'=> 'Country updated successfully','url'=>base_url('admin/country'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'country_code' => form_error('country_code'),
                    'name' => form_error('name')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteCountry(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_country',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Country deleted successfully','url'=>base_url('admin/country'));
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


    public function importCountry(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/country/import',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }

    // Import CSV in DB
    public function importCountryByExcel(){
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
                    $countryData = [];
                    if(!empty($sheetData)){
                        foreach($sheetData as $key=>$sheet){
                            $countryData[$key]['countryCode'] = $sheet['country_code'];
                            $countryData[$key]['name'] = $sheet['country_name'];
                        }
                    }
                    $countryId = $this->master->insertBulk('tbl_country',$countryData);
                    $response = array('status' => 'success','message' => 'Country imported successfully','url'=>base_url('admin/country'));
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