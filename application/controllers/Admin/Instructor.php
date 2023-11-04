<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
Class Instructor extends MY_Controller {

	public function __construct() {
   	 	parent::__construct();
   	 	$this->load->model('User','us');
   	 	$this->load->model('CourseCategory','category');
   	 	$this->load->model('StudentReview','review');
        $this->load->model('SiteSettings','site');
    }
	public function index(){
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
			$data['instructorList'] = $this->us->getRecords('tbl_users',array('user_type'=>3));
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
			$this->load->view('admin/instructor/list',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
	public function reviewList(){
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
			$data['reviewList'] = $this->review->getStudentReviews();
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
			$this->load->view('admin/student/reviewList',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
	public function addStudentReview(){
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
			$data['reviewList'] = $this->us->getRecords('tbl_users',array('user_type'=>2));
			$data['studentList'] = $this->us->getRecords('tbl_users',array('user_type'=>2));
			$data['categoryList'] = $this->category->getRecords('tbl_course_category');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
			$this->load->view('admin/student/add-edit-review',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
	public function editStudentReviews($id){
		if ($this->is_admin_logged_in() == true) {
			$data['admin_session'] = $this->session->userdata('admin');
			$data['singleReview'] = $this->review->singleRecord('tbl_student_review',array('id'=>$id));
			$data['studentList'] = $this->us->getRecords('tbl_users',array('user_type'=>2));
			$data['categoryList'] = $this->category->getRecords('tbl_course_category');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]); 
			$this->load->view('admin/student/add-edit-review',$data);
		}else{
			$this->session->set_flashdata('error','Please login first');
			return redirect('admin');
		}
	}
	public function file_check($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        if(!empty($_FILES['student_image'])){
            $mime = get_mime_by_extension($_FILES['student_image']['name']);
            if(isset($_FILES['student_image']['name']) && $_FILES['student_image']['name']!=""){
                if(in_array($mime, $allowed_mime_type_arr)){
                    return true;
                }else{
                    $this->form_validation->set_message('file_check', 'Please select only jpg/png file.');
                    return false;
                }
            }else{
                $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;    
        }
    }
	//Save Student Review
	public function saveStudentReviews(){
		$this->form_validation->set_rules('student', 'Student Name', 'trim|required');
		$this->form_validation->set_rules('course', 'Course Name', 'trim|required');
		$this->form_validation->set_rules('rating', 'Rating', 'trim|required');
		$this->form_validation->set_rules('review', 'Review', 'trim|required');
		$this->form_validation->set_rules('student_image', 'Image', 'callback_file_check');
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/review';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            if(!empty($_FILES['student_image']['name'])){
	            $uploadedFile = $this->uploadFile($_FILES['student_image']['name'],'student_image',$config);
	             if($uploadedFile['error_msg'] != ''){
	            	$response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
	            	return json_encode($response);
	            }
	            $data['student_image'] = $uploadedFile['file'];
        	}
            $data['student_id'] = $this->input->post('student');
            $data['course_id '] = $this->input->post('course');
            $data['rating'] = $this->input->post('rating');
            $data['review'] = $this->input->post('review');;
            $data['review'] = $this->input->post('review');
            $data['status'] = ($this->input->post('status') == 'on') ? 1 : 0;
            $data['created_at'] = date('Y-m-d H:i:s');
            $result = $this->review->insert('tbl_student_review',$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Review added successfully','url'=>base_url('admin/student-review'));
        		$this->output->set_content_type('application/json')->set_output(json_encode($response));
            }else{
                $response = array('status' => 'errors','message'=> 'Something went wrong');
        		$this->output->set_content_type('application/json')->set_output(json_encode($response));
            } 
        }else{
            $response = array(
        		'status' => 'error',
        		'errors' => array(
				    'student' => form_error('student'),
				    'course' => form_error('course'),
				    'rating' => form_error('rating'),
				    'review' => form_error('review'),
				    'student_image' => form_error('student_image')
        		)  
		   	);
			$this->output->set_content_type('application/json')->set_output(json_encode($response));
        }
	}
	//Update Student Review
	public function updateStudentReviews(){
		$this->form_validation->set_rules('student', 'Student Name', 'trim|required');
		$this->form_validation->set_rules('course', 'Course Name', 'trim|required');
		$this->form_validation->set_rules('rating', 'Rating', 'trim|required');
		$this->form_validation->set_rules('review', 'Review', 'trim|required');
        if ($this->form_validation->run()) {
            $config['upload_path']  = 'assets/uploads/review';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['encrypt_name'] =  TRUE;
            $config['max_size']      = 1024;
            if(!empty($_FILES['student_image']['name'])){
	            $uploadedFile = $this->uploadFile($_FILES['student_image']['name'],'student_image',$config);
	             if($uploadedFile['error_msg'] != ''){
	            	$response = array('status' => 'errors','message'=> $uploadedFile['error_msg']);
	            	echo json_encode($response);
	            	return false;
	            }
	            $data['student_image'] = $uploadedFile['file'];
        	}
            $data['student_id'] = $this->input->post('student');
            $data['course_id '] = $this->input->post('course');
            $data['rating'] = $this->input->post('rating');
            $data['review'] = $this->input->post('review');
            $data['status'] = ($this->input->post('status') == 'on') ? 1 : 0;
            $data['created_at'] = date('Y-m-d H:i:s');
            $result = $this->review->updateRecord('tbl_student_review',array('id'=>$this->input->post('review_id')),$data);
            if($result > 0){
                $response = array('status' => 'success','message'=> 'Review updated successfully','url'=>base_url('admin/student-review'));
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
				    'student' => form_error('student'),
				    'course' => form_error('course'),
				    'rating' => form_error('rating'),
				    'review' => form_error('review'),
				    'student_image' => form_error('student_image')
        		)  
		   	);
			echo json_encode($response);
        	return false;
        }
	}
	public function deleteStudentReview(){
        if ($this->is_admin_logged_in() == true) {
            $id = $this->input->post('id');
            $result = $this->review->deleteRecord('tbl_student_review',array('id'=>$id));
            if($result > 0){
                $response = array('status' => 'success','message' => 'Review delete successfully','url'=>base_url('admin/student-review'));
            }else{
                $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
            }
        }else{
             $response = array('status' => 'errors','message' => 'Something went wrong !!!','url'=>'');
        }
        echo json_encode($response);
    	return false;
    }
    public function exportInstructor(){
        if ($this->is_admin_logged_in() == true) {
            $data['admin_session'] = $this->session->userdata('admin');
            $data['siteSettings'] = $this->site->singleRecord('tbl_site_settings',[]);
            
            $this->load->view('admin/instructor/exportInstructor',$data);
        }else{
            $this->session->set_flashdata('error','Please login first');
            return redirect('admin');
        }
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
    public function exportInstructorByExcel(){ 
        $this->form_validation->set_rules('excel_file', 'Excel File', 'callback_file_check_excel_file');
        if ($this->form_validation->run()) {
            if(!empty($_FILES['excel_file']['name'])){
                // }
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
                    $sheetData = $spreadsheet->getActiveSheet()->toArray();
                    $studentData = [];
                    if(!empty($sheetData)){
                        foreach($sheetData as $key=>$sheet){
                            if($key != 0){
                                $existingStudent = $this->us->singleRecord('tbl_users',array('email'=>$sheet[3],'user_type'=>'3'));
                                if(empty($existingStudent)){
                                    $studentData[$key]['first_name'] = $sheet[0];
                                    $studentData[$key]['middle_name'] = $sheet[1];
                                    $studentData[$key]['last_name'] = $sheet[2];
                                    $studentData[$key]['email'] = $sheet[3];
                                    $studentData[$key]['mobile'] = $sheet[4];
                                    $studentData[$key]['user_type'] = $sheet[5];
                                    $studentData[$key]['image'] = $sheet[6];
                                    $studentData[$key]['password'] = sha1($sheet[7]);
                                    $studentData[$key]['status'] = $sheet[8];
                                }
                            }
                        }
                    }
                    $this->us->insertBulk('tbl_users',$studentData);
                    $response = array('status' => 'success','message' => 'Instructor imported successfully','url'=>base_url('admin/instructor'));
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