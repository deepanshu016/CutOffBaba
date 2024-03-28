<?php

Class CounsellingHead extends MY_Controller {

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
            $data['counsellingHeadList'] = $this->master->getRecords('tbl_counselling_head');
            $this->load->view('admin/cutoff_head_name/list',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function add(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/cutoff_head_name/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function editCounsellingHead($id){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['singleCounsellingHead'] = $this->master->singleRecord('tbl_counselling_head',array('id'=>$id));

            $this->load->view('admin/cutoff_head_name/add-edit',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    //Save Counselling Level
    public function saveCounsellingHead(){
        $this->form_validation->set_rules('head_name', 'Head Name', 'trim|required');
        $this->form_validation->set_rules('course_id[]', 'Course', 'trim|required');
        $this->form_validation->set_rules('level_id', 'Level', 'trim|required');
        $this->form_validation->set_rules('exam_id[]', 'Exams', 'trim|required');
        $this->form_validation->set_rules('college[]', 'Colleges', 'trim|required');
        if ($this->form_validation->run()) {
            $data['head_name'] = $this->input->post('head_name');
            $data['level_id'] = $this->input->post('level_id');
            $data['state_id'] = $this->input->post('state');
            $data['course_id'] = ($this->input->post('course_id')) ? implode(',',$this->input->post('course_id')) : '';
            $data['college'] = ($this->input->post('college')) ? implode(',',$this->input->post('college')) : '';
            $data['exams'] = ($this->input->post('exam_id')) ? implode(',',$this->input->post('exam_id')) : '';
            $result = $this->master->insert('tbl_counselling_head',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Cutoff Head added successfully','url'=>base_url('admin/cutoff-head-name'));
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
                    'head_name' => form_error('head_name'),
                    'course_id' => form_error('course_id[]'),
                    'level_id' => form_error('level_id'),
                    'college' => form_error('college[]'),
                    'exam_id' => form_error('exam_id[]')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    //Save Feeshead
    public function updateCounsellingHead(){
        $this->form_validation->set_rules('head_name', 'Head Name', 'trim|required');
        $this->form_validation->set_rules('course_id[]', 'Course', 'trim|required');
        $this->form_validation->set_rules('level_id', 'Level', 'trim|required');
        $this->form_validation->set_rules('exam_id[]', 'Exams', 'trim|required');
        $this->form_validation->set_rules('college[]', 'Colleges', 'trim|required');
        if ($this->form_validation->run()) {
            $data['head_name'] = $this->input->post('head_name');
            $data['level_id'] = $this->input->post('level_id');
            $data['state_id'] = $this->input->post('state');
            $data['course_id'] = ($this->input->post('course_id')) ? implode('|',$this->input->post('course_id')) : '';
            $data['exams'] = ($this->input->post('exam_id')) ? implode('|',$this->input->post('exam_id')) : '';
            $data['college'] = ($this->input->post('college')) ? implode('|',$this->input->post('college')) : '';
            $result = $this->master->updateRecord('tbl_counselling_head',array('id'=>$this->input->post('head_id')),$data);
            $response = array('status' => 'success','message'=> 'Cutoff Head updated successfully','url'=>base_url('admin/cutoff-head-name'));
            echo json_encode($response);
            return true;
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'head_name' => form_error('head_name'),
                    'course_id' => form_error('course_id[]'),
                    'level_id' => form_error('level_id'),
                    'college' => form_error('college[]'),
                    'exam_id' => form_error('exam_id[]')
                )
            );
            echo json_encode($response);
            return false;
        }
    }
    public function deleteCounsellingHead(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->master->deleteRecord('tbl_counselling_head',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Cutoff Head deleted successfully','url'=>base_url('admin/cutoff-head-name'));
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
    public function importCounsellingHead(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/cutoff_head_name/import',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function importCutOffData(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $this->load->view('admin/cutoff_head_name/importCutOffData',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    // public function upload_config() {
	// 	$config['upload_path'] 		= 'assets/uploads/excels';	
	// 	$config['allowed_types'] 	= 'csv|CSV|xlsx|XLSX|xls|XLS';
	// 	$config['encrypt_name'] 	= TRUE;
	// 	$config['max_size'] 		= 4096; 
	// 	$this->load->library('upload', $config);
	// }
    // Import CSV in DB
    public function importCounsellingHeadByExcel(){
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
                            $impdata['head_name']=$data[1];
                            $impdata['course_id']=$data[2];
                            $impdata['level_id']=$data[3];
                            $impdata['exams']=$data[4];
                            $impdata['state_id']=$data[5];
                            $impdata['college']=$data[6];
                            $id=$data[0];
                            if($id==""){
                                $this->db->insert('tbl_counselling_head',$impdata);
                            }else{
                                $this->db->where('id',$id)->update('tbl_counselling_head',$impdata);
                            }
                        }
                        $row++;
                     }
                     fclose($handle);
                    $response = array('status' => 'success','message' => 'Counselling Head imported successfully','url'=>base_url('admin/cutoff-head-name'));
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


   
    public function importCutOffDataExcel(){
        $this->form_validation->set_rules('head_id', 'Head Name', 'trim|required');
        $this->form_validation->set_rules('sub_category_id', 'Category', 'trim|required');
        $this->form_validation->set_rules('year', 'Course', 'trim|required');
        $this->form_validation->set_rules('excel_file', 'Image', 'callback_file_check_excel_file');
        if ($this->form_validation->run()) {
            $head_id = $this->input->post('head_id');  
            $sub_category_id = $this->input->post('sub_category_id');  
            $year = $this->input->post('year');  
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
           
            if (!$this->upload->do_upload('excel_file')) {
                $response = array(
                    'status' => 'error',
                    'errors' => $this->upload->display_errors()
                );
            } else {
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
                $categoryIndex = 3;
                $l = 0;
                $categoryData = [];
                $filterSheet= array_values(array_filter($sheet_data[1]));
                $roundsData = count($filterSheet);
                $totalMarksData = count($sheet_data) - 3;    
                $totalData = $totalMarksData * $roundsData;
                // echo "<pre>";
                // print_r($sheet_data);die;
                for($k=4;$k<count($sheet_data[0]);$k+=15){
                    if($sheet_data[0][$k] != ''){
                        $categoryDatadd=explode("-",$sheet_data[0][$k]);
                        $categoryData[] = $categoryDatadd[0];
                    }
                }
               
                $collegeid="";
                $course_id="";
                $branch_id="";
                $x=4;
                $insertDatasss = [];
                $round1=[];
                $this->master->deleteRecord('tbl_cutfoff_marks_data',array('cutoff_head'=>$head_id,'year'=>$year));
                foreach($categoryData as $key=>$category_type){
                    $round1=[];
                    $round2=[];
                    $round3=[];
                    $round4=[];
                    $round5=[];
                    for($l=3;$l< count($sheet_data);$l++){
                        if($sheet_data[$l][0]!=""){
                            $collegeid=$sheet_data[$l][0];
                        }
                        if($sheet_data[$l][2]!=""){
                            $course_iddd=explode("-",$sheet_data[$l][2]);
                            $course_id=$course_iddd[0];
                        }
                        if($sheet_data[$l][3]!=""){
                            $branch_iddd=explode("-",$sheet_data[$l][3]);
                            $branch_id=$branch_iddd[0];
                        }
                        $r1['round_one']=1;
                        $r1['college_id']=$collegeid;
                        $r1['course_id']=$course_id;
                        $r1['branch_id']=$branch_id;
                        $r1['air']=$sheet_data[$l][$x];
                        $r1['sr']=$sheet_data[$l][$x+1];
                        $r1['marks']=$sheet_data[$l][$x+2];        
                        $r1['category_type']=$sub_category_id;  
                        $r1['cutoff_head']=$head_id;  
                        $r1['year']=$year;  

                        $r2['round_two']=1;
                        $r2['college_id']=$collegeid;
                        $r2['course_id']=$course_id;
                        $r2['branch_id']=$branch_id;
                        $r2['air']=$sheet_data[$l][$x+3];
                        $r2['sr']=$sheet_data[$l][$x+4];
                        $r2['marks']=$sheet_data[$l][$x+5];        
                        $r2['category_type']=$sub_category_id; 
                        $r2['cutoff_head']=$head_id;  
                        $r2['year']=$year;   

                        $r3['round_three']=1;
                        $r3['college_id']=$collegeid;
                        $r3['course_id']=$course_id;
                        $r3['branch_id']=$branch_id;
                        $r3['air']=$sheet_data[$l][$x+6];
                        $r3['sr']=$sheet_data[$l][$x+7];
                        $r3['marks']=$sheet_data[$l][$x+8];        
                        $r3['category_type']=$sub_category_id;  
                        $r3['cutoff_head']=$head_id;  
                        $r3['year']=$year;   

                        $r4['round_four']=1;
                        $r4['college_id']=$collegeid;
                        $r4['course_id']=$course_id;
                        $r4['branch_id']=$branch_id;
                        $r4['air']=$sheet_data[$l][$x+9];
                        $r4['sr']=$sheet_data[$l][$x+10];
                        $r4['marks']=$sheet_data[$l][$x+11];        
                        $r4['category_type']=$sub_category_id;  
                        $r4['cutoff_head']=$head_id;  
                        $r4['year']=$year;   



                        $r5['round_five']=1;
                        $r5['college_id']=$collegeid;
                        $r5['course_id']=$course_id;
                        $r5['branch_id']=$branch_id;
                        $r5['air']=$sheet_data[$l][$x+12];
                        $r5['sr']=$sheet_data[$l][$x+13];
                        $r5['marks']=$sheet_data[$l][$x+14];        
                        $r5['category_type']=$sub_category_id;  
                        $r5['cutoff_head']=$head_id;  
                        $r5['year']=$year;   


                        $round1[] =$r1;
                        $round2[] =$r2;
                        $round3[] =$r3;
                        $round4[] =$r4;
                        $round5[] =$r5;
                    }
                    $this->master->insertBulk('tbl_cutfoff_marks_data',$round1);
                    $this->master->insertBulk('tbl_cutfoff_marks_data',$round2);
                    $this->master->insertBulk('tbl_cutfoff_marks_data',$round3);
                    $this->master->insertBulk('tbl_cutfoff_marks_data',$round4);
                    $this->master->insertBulk('tbl_cutfoff_marks_data',$round5);

                    $x=$x+15;
                }
                $response = array('status' => 'success','message'=> 'Data imported successfully','url'=>base_url('admin/cutoff-entry-data'));
                echo json_encode($response);
                return false;
            }
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'head_id' => form_error('head_id'),
                    'year' => form_error('year'),
                    'excel_file' => form_error('excel_file')
                )
            );
            echo json_encode($response);
            return false;
        }
    }

    public function cutOffEntryData(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            $data['subCategoryData'] = $this->master->getRecords('tbl_sub_category',['head_id'=> 2]);
            $data['counsellingHead'] = $this->master->getRecords('tbl_counselling_head');
            $this->load->view('admin/cutoff_head_name/cutoff_entry_data',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
    }
    public function getCategory(){
        if ($this->is_admin_logged_in() == true) {
            $html = '';
            $subCategoryData = $this->master->getRecords('tbl_sub_category',['head_id'=> $this->input->post('head_id')]);
            if(!empty($subCategoryData)){
                $html .= '<div class="form-group"><label>Category</label> <select class="form-control form-select" name="sub_category_id">';
                foreach($subCategoryData as $sub){
                    $html .= '<option value="'.$sub['id'].'">'.$sub['sub_category_name'].'</option>';
                }
                $html .= '</select><span class="text-danger" id="sub_category_id"></span></div>';
            }
            $response = array('status' => 'success','message'=> 'Data imported successfully','url'=>'','html'=>$html);
            echo json_encode($response);
            return false;
        }else{
            $response = array('status' => 'errors','message'=> 'Something went Wrong','url'=>'','html'=>'');
            echo json_encode($response);
            return false;
        }
    }

    public function filterCutOffData(){
        $this->form_validation->set_rules('head_id', 'Head', 'trim|required');
        $this->form_validation->set_rules('year', 'Year', 'trim|required');
        $this->form_validation->set_rules('sub_category_id', 'Category', 'trim|required');
        if ($this->form_validation->run()) {
            $data['head_id'] = $this->input->post('head_id');
            $data['category_id'] = $this->input->post('sub_category_id');
            $data['year'] = $this->input->post('year');
            $data['subCategoryData'] = $this->master->getRecords('tbl_sub_category',['head_id'=> $data['head_id'],'id'=> $data['category_id']]);
            $data['counsellingHead'] = $this->master->getRecords('tbl_counselling_head',['id'=>$data['head_id']]);
            $result = $this->load->view('admin/cutoff_head_name/cutoff_entry_data_ajax',$data,TRUE);
          
            $response = array('status' => 'success','message'=> 'Cutoff Head found successfully','html'=>$result);
            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
        }else{
            $response = array(
                'status' => 'error',
                'errors' => array(
                    'sub_category_id' => form_error('sub_category_id'),
                    'head_id' => form_error('head_id'),
                    'year' => form_error('year')
                )
            );
            echo json_encode($response);
            return false;
        }    
    }
}

?>