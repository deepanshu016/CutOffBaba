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
        $this->form_validation->set_rules('price', 'Price', 'trim|required');
        // $this->form_validation->set_rules('course_id', 'Course', 'trim|required');
        // $this->form_validation->set_rules('discount_percentage', 'Discounted Percentage', 'numeric');
        $this->form_validation->set_rules('discounted_price', 'Discounted Price', 'numeric');
        if ($this->form_validation->run()) {
            $data['plan_name'] = $this->input->post('plan_name');
            $data['slug'] = $this->slug($this->input->post('plan_name'));
            $data['price'] = $this->input->post('price');
            // $data['course_id'] = $this->input->post('course_id');
            // $data['discount_percentage'] = $this->input->post('discount_percentage');
            $data['discounted_price'] = $this->input->post('discounted_price');
            $data['description'] = $this->input->post('description');
            $data['terms_condition'] = $this->input->post('terms_condition');
            // $data['paid_counselling_registration'] = $this->input->post('paid_counselling_registration');
            // $data['payment_info'] = $this->input->post('payment_info');
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
                    // 'degree_type_id' => form_error('degree_type_id'),
                    // 'course_id' => form_error('course_id'),
                    'price' => form_error('price'),
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
        $this->form_validation->set_rules('price', 'Price', 'trim|required');
        // $this->form_validation->set_rules('course_id', 'Course', 'trim|required');
        // $this->form_validation->set_rules('discount_percentage', 'Discounted Percentage', 'numeric');
        $this->form_validation->set_rules('discounted_price', 'Discounted Price', 'numeric');
        if ($this->form_validation->run()) {
            $data['plan_name'] = $this->input->post('plan_name');
            $data['slug'] = $this->slug($this->input->post('plan_name'));
            // $data['degree_type_id'] = $this->input->post('degree_type_id');
            // $data['course_id'] = $this->input->post('course_id');
            $data['price'] = $this->input->post('price');
            $data['discounted_price'] = $this->input->post('discounted_price');
            $data['description'] = $this->input->post('description');
            $data['terms_condition'] = $this->input->post('terms_condition');
            // $data['paid_counselling_registration'] = $this->input->post('paid_counselling_registration');
            // $data['payment_info'] = $this->input->post('payment_info');

            $result = $this->master->updateRecord('tbl_counsellng_plans',array('id'=>$this->input->post('plan_id')),$data);
            $response = array('status' => 'success','message'=> 'Counselling Plan updated successfully','url'=>base_url('admin/counselling-plan'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'plan_name' => form_error('plan_name'),
                    // 'degree_type_id' => form_error('degree_type_id'),
                    // 'course_id' => form_error('course_id'),
                    'price' => form_error('price'),
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
                            $impdata['plan_name']=$data[1];
                            $impdata['slug']=$this->slug($data[1]);
                            $impdata['degree_type_id']=explode('_',$data[2])[0];
                            $impdata['course_id']=explode('_',$data[3])[0];
                            $impdata['discount_percentage']=$data[4];
                            $impdata['discounted_price']=$data[5];
                            $impdata['description']=$data[6];
                            $impdata['terms_condition']=$data[7];
                            $impdata['paid_counselling_registration']=$data[8];
                            $impdata['payment_info']=$data[9];
                            $id=$data[0];
                            if($id==""){
                                $this->db->insert('tbl_counsellng_plans',$impdata);
                            }else{
                                $this->db->where('id',$id)->update('tbl_counsellng_plans',$impdata);
                            }
                        }
                        $row++;
                     }
                     fclose($handle);
                    $response = array('status' => 'success','message' => 'Counselling Plan imported successfully','url'=>base_url('admin/counselling-plan'));
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