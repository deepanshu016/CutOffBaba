<?php

Class Branch extends MY_Controller {

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
            $data['branchList'] = $this->db->select('tbl_branch.*,tbl_course.course as coursename,tbl_nature.nature')->join('tbl_nature','tbl_nature.id=tbl_branch.branch_type')->join('tbl_course','tbl_course.id=tbl_branch.courses')->get('tbl_branch')->result_array();

            $this->load->view('admin/branch/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['branchList'] = $this->site->getRecords('tbl_nature');
            $this->load->view('admin/branch/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editBranch($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['branchList'] = $this->site->getRecords('tbl_nature');
            $data['singleBranch'] = $this->master->singleRecord('tbl_branch',array('id'=>$id));
            $this->load->view('admin/branch/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Branch
    public function saveBranch(){
        $this->form_validation->set_rules('branch', 'Branch', 'trim|required');
        $this->form_validation->set_rules('courses', 'Courses', 'trim|required');
        $this->form_validation->set_rules('branch_type', 'Branch Type', 'trim|required');
        if ($this->form_validation->run()) {
            $data['branch'] = $this->input->post('branch');
            $data['short_branch_name'] = $this->input->post('short_branch_name');
            $data['branch_name_1'] = $this->input->post('branch_name_1');
            $data['branch_name_2'] = $this->input->post('branch_name_2');
            $data['courses'] = $this->input->post('courses');
            $data['branch_type'] = $this->input->post('branch_type');
           
            $result = $this->master->insert('tbl_branch',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Branch added successfully','url'=>base_url('admin/branch'));
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
                    'branch' => form_error('branch'),
                    'courses' => form_error('courses'),
                    'branch_type' => form_error('branch_type')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Update Branch
    public function updateBranch(){
        $this->form_validation->set_rules('branch', 'Branch', 'trim|required');
        $this->form_validation->set_rules('courses', 'Courses', 'trim|required');
        $this->form_validation->set_rules('branch_type', 'Branch Type', 'trim|required');
        if ($this->form_validation->run()) {
            $data['branch'] = $this->input->post('branch');
            $data['short_branch_name'] = $this->input->post('short_branch_name');
            $data['branch_name_1'] = $this->input->post('branch_name_1');
            $data['branch_name_2'] = $this->input->post('branch_name_2');
            $data['courses'] = $this->input->post('courses');
            $data['branch_type'] = $this->input->post('branch_type');
            $result = $this->master->updateRecord('tbl_branch',array('id'=>$this->input->post('branch_id')),$data);
            $response = array('status' => 'success','message'=> 'Branch updated successfully','url'=>base_url('admin/branch'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'branch' => form_error('branch'),
                    'courses' => form_error('courses'),
                    'branch_type' => form_error('branch_type')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteBranch(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_branch',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Branch deleted successfully','url'=>base_url('admin/branch'));
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
    public function importBranch(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/branch/import',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }

    // Import CSV in DB
    public function importBranchByExcel(){
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
                            $impdata['branch']=$data[1];
                            $impdata['short_branch_name']=$data[2];
                            $impdata['branch_name_1']=$data[5];
                            $impdata['branch_name_2']=$data[6];
                            $impdata['courses']=$data[3];
                            $impdata['branch_type']=$data[4];
                            $id=$data[0];
                            if($id==""){
                                $this->db->insert('tbl_branch',$impdata);
                            }else{
                                $this->db->where('id',$id)->update('tbl_branch',$impdata);
                            }
                        }
                        $row++;
                     }
                     fclose($handle);
                    $response = array('status' => 'success','message' => 'Branch imported successfully','url'=>base_url('admin/branch'));
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