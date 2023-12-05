<?php

Class CounsellingPlan extends MY_Controller {

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
            $data['counsellingList'] = $this->master->getRecords('tbl_counsellng_plans');
            $this->load->view('admin/counselling_plans/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/counselling_plans/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editCounsellingPlan($id,$slug){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleCounsellingPlan'] = $this->master->singleRecord('tbl_counsellng_plans',array('id'=>$id));

            $this->load->view('admin/counselling_plans/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Counselling Plan
    public function saveCounsellingPlan(){
        $this->form_validation->set_rules('plan_name', 'Counselling Plan Name', 'trim|required');
        $this->form_validation->set_rules('degree_type_id', 'Degree Type', 'trim|required');
        $this->form_validation->set_rules('course_id', 'Course', 'trim|required');
        $this->form_validation->set_rules('discount_percentage', 'Discounted Percentage', 'numeric');
        $this->form_validation->set_rules('discounted_price', 'Discounted Price', 'numeric');
        if ($this->form_validation->run()) {
            $data['plan_name'] = $this->input->post('plan_name');
            $data['slug'] = $this->slug($this->input->post('plan_name'));
            $data['degree_type_id'] = $this->input->post('degree_type_id');
            $data['course_id'] = $this->input->post('course_id');
            $data['discount_percentage'] = $this->input->post('discount_percentage');
            $data['discounted_price'] = $this->input->post('discounted_price');
            $data['description'] = $this->input->post('description');
            $data['terms_condition'] = $this->input->post('terms_condition');
            $data['paid_counselling_registration'] = $this->input->post('paid_counselling_registration');
            $data['payment_info'] = $this->input->post('payment_info');
            $result = $this->master->insert('tbl_counsellng_plans',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Counselling Plan added successfully','url'=>base_url('admin/counselling-plan'));
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
                    'plan_name' => form_error('plan_name'),
                    'degree_type_id' => form_error('degree_type_id'),
                    'course_id' => form_error('course_id'),
                    'discount_percentage' => form_error('discount_percentage'),
                    'discounted_price' => form_error('discounted_price')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Feeshead
    public function updateCounsellingPlan(){
        $this->form_validation->set_rules('plan_name', 'Counselling Plan Name', 'trim|required');
        $this->form_validation->set_rules('degree_type_id', 'Degree Type', 'trim|required');
        $this->form_validation->set_rules('course_id', 'Course', 'trim|required');
        $this->form_validation->set_rules('discount_percentage', 'Discounted Percentage', 'numeric');
        $this->form_validation->set_rules('discounted_price', 'Discounted Price', 'numeric');
        if ($this->form_validation->run()) {
            $data['plan_name'] = $this->input->post('plan_name');
            $data['slug'] = $this->slug($this->input->post('plan_name'));
            $data['degree_type_id'] = $this->input->post('degree_type_id');
            $data['course_id'] = $this->input->post('course_id');
            $data['discount_percentage'] = $this->input->post('discount_percentage');
            $data['discounted_price'] = $this->input->post('discounted_price');
            $data['description'] = $this->input->post('description');
            $data['terms_condition'] = $this->input->post('terms_condition');
            $data['paid_counselling_registration'] = $this->input->post('paid_counselling_registration');
            $data['payment_info'] = $this->input->post('payment_info');

            $result = $this->master->updateRecord('tbl_counsellng_plans',array('id'=>$this->input->post('plan_id')),$data);
            $response = array('status' => 'success','message'=> 'Counselling Plan updated successfully','url'=>base_url('admin/counselling-plan'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'plan_name' => form_error('plan_name'),
                    'degree_type_id' => form_error('degree_type_id'),
                    'course_id' => form_error('course_id'),
                    'discount_percentage' => form_error('discount_percentage'),
                    'discounted_price' => form_error('discounted_price')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteCounsellingPlan(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_counsellng_plans',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Counselling Plan deleted successfully','url'=>base_url('admin/counselling-plan'));
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
    public function importCounsellingPlan(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/counselling_plans/import',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }

    // Import CSV in DB
    public function importCounsellingPlanByExcel(){
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
                    $excelDatas = [];
                    if(!empty($sheetData)){
                        foreach($sheetData as $key=>$sheet){
                            $excelDatas[$key]['plan_name'] = $sheet['plan_name'];
                            $excelDatas[$key]['slug'] = $this->slug($sheet['plan_name']);
                            $excelDatas[$key]['degree_type_id'] = $sheet['degree_type_id'];
                            $excelDatas[$key]['course_id'] = $sheet['course_id'];
                            $excelDatas[$key]['discount_percentage'] = $sheet['discount_percentage'];
                            $excelDatas[$key]['discounted_price'] = $sheet['discounted_price'];
                            $excelDatas[$key]['description'] = $sheet['description'];
                            $excelDatas[$key]['terms_condition'] = $sheet['terms_condition'];
                            $excelDatas[$key]['paid_counselling_registration'] = $sheet['paid_counselling_registration'];
                            $excelDatas[$key]['payment_info'] = $sheet['payment_info'];
                        }
                    }
                    $stateId = $this->master->insertBulk('tbl_counsellng_plans',$excelDatas);
                    $response = array('status' => 'success','message' => 'Counselling Plan data  imported successfully','url'=>base_url('admin/counselling-plan'));
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