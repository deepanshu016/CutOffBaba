<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('MasterModel','master');
        $this->load->model('SiteSettings','site');
    }
	public function state(){	
		$query = $this->db->select('s.id as state_id,s.name as state_name , s.country_id,c.countryCode,c.name')->from('tbl_state as s')->join('tbl_country as c', 's.country_id = c.id')->get()->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "state_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'State Name','Country'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        $lineData = array($row['state_id'], $row['state_name'], $row['country_id'].'_'.$row['name']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}
	}
	public function country(){	
		$query = $this->db->select('*')->get('tbl_country')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "country_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID','Country Code', 'Country Name'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){
		        $lineData = array($row['id'], $row['countryCode'], $row['name']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}
	}

	public function district(){	
		$query = $this->db->select('s.id as state_id,s.name as state_name,s.country_id ,c.id as district_id,c.city as city_name,c.state_id, c.country')->from('tbl_city as c')->join('tbl_state as s', 'c.state_id = s.id')->get()->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "city_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'State ID','City Name','COUNTRY ID'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        $lineData = array($row['district_id'], $row['state_id'].'_'.$row['state_name'], $row['city_name'], $row['country_id']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}

	}

	public function subDistrict()
	{	
		$query = $this->db->select('sd.id as sub_district_id,sd.country as sub_country_id,sd.state as state_sub,sd.sub_district as sub_distrcit,sd.district as sub_district_district,s.id as state_id,s.name as state_name,s.country_id ,d.id as district_id,d.city as city_name,d.state_id, d.country,c.countryCode,c.name as country_name')->from('tbl_sub_district as sd')->join('tbl_state as s', 'sd.state = s.id')->join('tbl_city as d', 'sd.district = d.id')->join('tbl_country as c', 'sd.country = c.id')->get()->result_array(); 

		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "sub_district_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Country ID','State ID','District ID','Sub District'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        $lineData = array($row['sub_district_id'], $row['sub_country_id'].'_'.$row['country_name'], $row['state_sub'].'_'.$row['state_name'], $row['sub_district_district'].'_'.$row['city_name'],$row['sub_distrcit']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}

	}

	public function ownership()
	{	
		$query = $this->db->select('*')->get('tbl_ownership')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "ownership_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID','Title'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){
		        $lineData = array($row['id'], $row['title']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}
	}


	public function approval()
	{	
		$query = $this->db->select('*')->get('tbl_approval')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "approval_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID','Approval'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){
		        $lineData = array($row['id'], $row['approval']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}
	}

	public function exams()
	{	
		$query = $this->db->select('e.id as exam_id,e.exam,e.exam_full_name,e.exam_short_name,e.degree_type as degree_type_id,e.eligibility,e.exam_duration,e.maximum_marks,e.passing_marks,e.qualifying_marks,e.exam_held_in,e.registration_starts,e.registration_ends,e.stream as stream_id,e.course_accepting,dt.degreetype,s.stream')
						  ->from('tbl_exam as e')
						  ->join('tbl_degree_type as dt', 'e.degree_type = dt.id')
						  ->join('tbl_stream as s', 'e.stream = s.id')
						  ->get()
						  ->result_array();
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "exam_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Exam','Exam Full Name','Exam Short Name','Degree Type','Eligibility','Exam Duration','Maximum Marks','Passing Marks','Qualifying Marks','Exam Held In','Registration Start from','Registration Last Date','Stream','Course Accepting'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        $lineData = array($row['exam_id'], $row['exam'],$row['exam_full_name'], $row['exam_short_name'],$row['degree_type_id'].'_'.$row['degreetype'], $row['eligibility'],$row['exam_duration'],$row['maximum_marks'],$row['passing_marks'],$row['qualifying_marks'],date('Y-m-d',strtotime($row['exam_held_in'])),date('Y-m-d',strtotime($row['registration_starts'])),date('Y-m-d',strtotime($row['registration_ends'])),$row['stream_id'].'_'.$row['stream'],$row['course_accepting']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}
	}


	public function recognition()
	{	
		$query = $this->db->select('*')->get('tbl_recognition')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "recognition_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID','Recognition'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){
		        $lineData = array($row['id'], $row['recognition']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}
	}

	public function gender()
	{	
		$query = $this->db->select('*')->get('tbl_gender')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "gender_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID','Gender'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){
		        $lineData = array($row['id'], $row['gender']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}
	}

	public function stream()
	{	
		$query = $this->db->select('*')->get('tbl_stream')->result_array(); 
			if(count($query) > 0){ 
				$delimiter = ","; 
				$filename = "stream_" . date('Y-m-d') . ".csv"; 
				$f = fopen('php://memory', 'w'); 
				$fields = array('ID', 'Stream Name','Description','Image'); 
				fputcsv($f, $fields, $delimiter); 
				foreach($query as $row){ 
					$lineData = array($row['id'], $row['stream'], $row['description'], $row['stream_image']); 
					fputcsv($f, $lineData, $delimiter); 
				} 
				fseek($f, 0); 
				header('Content-Type: text/csv'); 
				header('Content-Disposition: attachment; filename="' . $filename . '";'); 
				fpassthru($f); 
			}
	}

	public function opens()
	{	
		$query = $this->db->select('*')->get('tbl_opens')->result_array(); 
		if(count($query) > 0){ 
			$delimiter = ","; 
			$filename = "opens_" . date('Y-m-d') . ".csv"; 
			$f = fopen('php://memory', 'w'); 
			$fields = array('ID', 'Opens Name'); 
			fputcsv($f, $fields, $delimiter); 
			foreach($query as $row){ 
				$lineData = array($row['id'], $row['opens']); 
				fputcsv($f, $lineData, $delimiter); 
			} 
			fseek($f, 0); 
			header('Content-Type: text/csv'); 
			header('Content-Disposition: attachment; filename="' . $filename . '";'); 
			fpassthru($f); 
		}
	}	

	public function visibility()
	{	
		$query = $this->db->select('*')->get('tbl_visibility')->result_array(); 
		if(count($query) > 0){ 
			$delimiter = ","; 
			$filename = "visibility_" . date('Y-m-d') . ".csv"; 
			$f = fopen('php://memory', 'w'); 
			$fields = array('ID', 'Visibility'); 
			fputcsv($f, $fields, $delimiter); 
			foreach($query as $row){ 
				$lineData = array($row['id'], $row['visibility']); 
				fputcsv($f, $lineData, $delimiter); 
			} 
			fseek($f, 0); 
			header('Content-Type: text/csv'); 
			header('Content-Disposition: attachment; filename="' . $filename . '";'); 
			fpassthru($f); 
		}
	}	
	public function clinicdetails()
	{	
		$query = $this->db->select('*')->get('tbl_clinic_details')->result_array(); 
		if(count($query) > 0){ 
			$delimiter = ","; 
			$filename = "clinic_details_" . date('Y-m-d') . ".csv"; 
			$f = fopen('php://memory', 'w'); 
			$fields = array('ID', 'Clinic Details'); 
			fputcsv($f, $fields, $delimiter); 
			foreach($query as $row){ 
				$lineData = array($row['id'], $row['details']); 
				fputcsv($f, $lineData, $delimiter); 
			} 
			fseek($f, 0); 
			header('Content-Type: text/csv'); 
			header('Content-Disposition: attachment; filename="' . $filename . '";'); 
			fpassthru($f); 
		}
	}	
	public function clinicfacility()
	{	
		$query = $this->db->select('*')->get('tbl_clinic_facility')->result_array(); 
		if(count($query) > 0){ 
			$delimiter = ","; 
			$filename = "clinic_facility_" . date('Y-m-d') . ".csv"; 
			$f = fopen('php://memory', 'w'); 
			$fields = array('ID', 'Clinic Facility'); 
			fputcsv($f, $fields, $delimiter); 
			foreach($query as $row){ 
				$lineData = array($row['id'], $row['facility']); 
				fputcsv($f, $lineData, $delimiter); 
			} 
			fseek($f, 0); 
			header('Content-Type: text/csv'); 
			header('Content-Disposition: attachment; filename="' . $filename . '";'); 
			fpassthru($f); 
		}
	}	
	public function degreetype()

	{	
		$query = $this->db->select('*')->get('tbl_degree_type')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "degree_type_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Degree Type'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        $lineData = array($row['id'], $row['degreetype']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}

	}

	public function nature()
	{	
		$query = $this->db->select('*')->get('tbl_nature')->result_array(); 
		if(count($query) > 0){ 
			$delimiter = ","; 
			$filename = "nature_" . date('Y-m-d') . ".csv"; 
			$f = fopen('php://memory', 'w'); 
			$fields = array('ID', 'Nature'); 
			fputcsv($f, $fields, $delimiter); 
			foreach($query as $row){ 
				$lineData = array($row['id'], $row['nature']); 
				fputcsv($f, $lineData, $delimiter); 
			} 
			fseek($f, 0); 
			header('Content-Type: text/csv'); 
			header('Content-Disposition: attachment; filename="' . $filename . '";'); 
			fpassthru($f); 
		}
	}	
	
	
	public function courses()
	{	
		$query = $this->db->select('c.id as course_id,c.course,c.course_full_name,c.course_short_name,c.course_icon,c.stream as stream_id,c.degree_type as degree_type_id,,c.course_duration,c.exam,c.course_eligibility,c.course_opportunity,c.expected_salary,c.course_fees,c.counselling_authority,c.college,c.branch_type,c.status,dt.degreetype,s.stream')
						  ->from('tbl_course as c')
						  ->join('tbl_degree_type as dt', 'c.degree_type = dt.id')
						  ->join('tbl_stream as s', 'c.stream = s.id')
						  ->get()
						  ->result_array();
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "course_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Course','Course Full Name','Course Short Name','Course Icon','Stream','Degree Type','Course Duration','Exam','Course Eligibility','Course Opportunity','Expected Salary','Course Fees','Counselling Authority ','College','Branch Type','Status'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
				$status = ($row['status'] == 1) ? 'Active' : 'Inactive';
				$branch_type = ($row['branch_type'] == 1) ? 'Clinical' : 'Non- Clinical';
		        $lineData = array($row['course_id'], $row['course'],$row['course_full_name'], $row['course_short_name'],$row['course_icon'],$row['stream_id'].'_'.$row['stream'],$row['degree_type_id'].'_'.$row['degreetype'], $row['course_duration'],$row['exam'],$row['course_eligibility'],$row['course_opportunity'],$row['expected_salary'],$row['course_fees'],$row['counselling_authority'],$row['college'],$branch_type,$status); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}
	}

	public function branch()
	{	
		$query = $this->db->select('*')->from('tbl_branch')->get()->result_array();
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "branch_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Branch Name', 'Short Branch Name','Courses','Branch type','Branch Name One','Branch Name Two'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
				$branch_type = ($row['branch_type'] == 1) ? 'Clinical' : 'Non- Clinical';
		        $lineData = array($row['id'], $row['branch'],$row['short_branch_name'],$row['courses'],$branch_type,$row['branch_name_1'],$row['branch_name_2']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}
	}

	public function branchtype()
	{	
		$query = $this->db->select('*')->get('btype')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "branchtype_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Stream','Degree','Course','Branch Name'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        $status = ($row['status'] == 1)?'Active':'Inactive'; 
		        $lineData = array($row['id'], $row['streamid'], $row['degreeid'], $row['courseid'], $row['name']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}

	}

	
	
	public function approved(){	
		$query = $this->db->select('*')->get('approved')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "approved_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Approved by','Description'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        $status = ($row['status'] == 1)?'Active':'Inactive'; 
		        $lineData = array($row['id'], $row['approvedby'], $row['description']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}
	}
	
	public function type(){	
		$query = $this->db->select('*')->get('type')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "ownership_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Type','Description'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        $status = ($row['status'] == 1)?'Active':'Inactive'; 
		        $lineData = array($row['id'], $row['type'], $row['description']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}
	}
	

	public function college(){	
		$query = $this->db->select('cl.*,c.countryCode,c.name as country_name,s.name as state_name,city.city as city_name,a.approval,o.title as ownership_title')
						  ->from('tbl_college as cl')
						  ->join('tbl_country as c','cl.country = c.id')
						  ->join('tbl_state as s','cl.state = s.id')
						  ->join('tbl_city as city','cl.city = city.id')
						  ->join('tbl_approval as a','cl.approved_by = a.id')
						  ->join('tbl_ownership as o','cl.ownership = o.id')
						  ->get()
						  ->result_array();
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "college_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Name','Short Description','Popular Name One','Popular Name Two','logo','banner','prospectus','estdyear','aprovedby','gender','Course Offered','Country','State','City','University','Approved By','Ownership','Website','Email','Contact One','Contact Two','Contact Three','Nodal Officer Name','Nodal Officer Number','Keywords','Tags','Status'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        $status = ($row['status'] == 1)?'Active':'Inactive'; 
				$lineData = array($row['id'], $row['full_name'], $row['short_description'], $row['popular_name_one'], $row['popular_name_two'], $row['college_logo'], $row['college_banner'], $row['prospectus_file'], $row['establishment'], $row['approved_by'].'_'.$row['approval'], $row['gender_accepted'], $row['course_offered'], $row['country'].'_'.$row['country_name'], $row['state'].'_'.$row['state_name'], $row['city'].'_'.$row['city'], $row['university_name'], $row['approved_by'].'_'.$row['approval'], $row['ownership'].'_'.$row['ownership_title'], $row['website'], $row['email'], $row['contact_one'], $row['contact_two'], $row['contact_three'], $row['nodal_officer_name'], $row['nodal_officer_no'], $row['keywords'], $row['tags'], $status);
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}
	}
	
	public function counselling_level(){	
		$query = $this->db->select('*')->get('tbl_counselling_level')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "counselling_level_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Level'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        
		        $lineData = array($row['id'], $row['level']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}
	}

	public function counselling_head(){	
		$query = $this->db->select('ch.*,c.course as course_name,l.level as counselling_level,s.name as state_name')
						  ->from('tbl_counselling_head as ch')
						  ->join('tbl_course as c','ch.course_id = c.id')
						  ->join('tbl_counselling_level as l','ch.level_id = l.id')
						  ->join('tbl_state as s','ch.state_id = s.id')
						  ->get()
						  ->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "counselling_head_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Head Name','Course','Level','Exams','State','College'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        
		        $lineData = array($row['id'], $row['head_name'], $row['course_id'].'_'.$row['course_name'], $row['level_id'].'_'.$row['counselling_level'], $row['exams'], $row['state_id'].'_'.$row['state_name'],$row['college']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}
	}

	public function category(){	
		$query = $this->db->select('c.*,ch.head_name,v.visibility')
						  ->from('tbl_category as c')
						  ->join('tbl_counselling_head as ch','c.head_id = ch.id')
						  ->join('tbl_visibility as v','c.visibility_id  = v.id')
						  ->get()
						  ->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "category_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Category','Counselling Head','Short Name','Visibility'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        
		        $lineData = array($row['id'], $row['category_name'], $row['head_id'].'_'.$row['head_name'], $row['short_name'], $row['visibility_id'].'_'.$row['visibility']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}
	}

	public function sub_category(){	
		$query = $this->db->select('s.*,ch.head_name,c.category_name,o.opens')
						  ->from('tbl_sub_category as s')
						  ->join('tbl_counselling_head as ch','s.head_id = ch.id')
						  ->join('tbl_category as c','s.category_id = c.id')
						  ->join('tbl_opens as o','s.open_id  = o.id')
						  ->get()
						  ->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "sub_category_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Sub Category','Category','Counselling Head','Short Name','Open'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        
		        $lineData = array($row['id'], $row['sub_category_name'], $row['category_id'].'_'.$row['category_name'], $row['head_id'].'_'.$row['head_name'], $row['short_name'], $row['open_id'].'_'.$row['opens']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}
	}


	public function special_category(){	
		$query = $this->db->select('s.*,ch.head_name,v.visibility')
						  ->from('tbl_special_category as s')
						  ->join('tbl_counselling_head as ch','s.head_id = ch.id')
						  ->join('tbl_visibility as v','s.visibility_id  = v.id')
						  ->get()
						  ->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "special_category_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Special Category','Counselling Head','Short Name','Visibility'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        
		        $lineData = array($row['id'], $row['special_category_name'], $row['head_id'].'_'.$row['head_name'], $row['short_name'], $row['visibility_id'].'_'.$row['visibility']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}
	}

	public function sub_special_category(){	
		$query = $this->db->select('s.*,ch.head_name,c.special_category_name,o.opens')
						  ->from('tbl_sub_special_category as s')
						  ->join('tbl_counselling_head as ch','s.head_id = ch.id')
						  ->join('tbl_special_category as c','s.special_id = c.id')
						  ->join('tbl_opens as o','s.open_id  = o.id')
						  ->get()
						  ->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "sub_special_category_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Sub Special Category','Special Category','Counselling Head','Short Name','Open'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        
		        $lineData = array($row['id'], $row['sub_special_category_name'], $row['special_id'].'_'.$row['special_category_name'], $row['head_id'].'_'.$row['head_name'], $row['short_name'], $row['open_id'].'_'.$row['opens']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}
	}
	

	public function fee(){	

		$query = $this->db->select('*')->get('feetitle')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "feetitle_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Name'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        
		        $lineData = array($row['id'], $row['name']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}

	}
	
	public function feehead()
	{	
		$query = $this->db->select('*')->get('tbl_feeshead')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "fees_head_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Fee Head Name','Tution Fees','Hostel Fees','Miscellaneous Fees','Bank Details One','Bank Details Two','Demand Draft Name'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        
		        $lineData = array($row['id'], $row['fee_head_name'], $row['tution_fees'], $row['tution_fees'], $row['misc_fees'], $row['bank_details_1'], $row['bank_details_2'], $row['demand_draft_name']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}

	}
	
	public function service_bond_rules()
	{	
		$query = $this->db->select('*')->get('tbl_service_bond_rules')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "service_bond_rules_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Service Bond Rule','Seat Indentity Charges','Upgradation  Proceessing Fees'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        
		        $lineData = array($row['id'], $row['service_bond'], $row['seat_indentity_charges'], $row['upgradation_processing_fees']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}

	}

	public function gallery_heads(){	
		$query = $this->db->select('*')->get('tbl_gallery_heads')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "gallery_heads_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Head Name'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        
		        $lineData = array($row['id'], $row['head_name']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}
	}
	public function clinical_details(){	
		$query = $this->db->select('*')->get('tbl_clinical_details')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "clinical_details_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'clinical detail'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        
		        $lineData = array($row['id'], $row['clinical_detail']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}
	}
	public function facilities(){	
		$query = $this->db->select('*')->get('tbl_facilities')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "facilities_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Facility'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        
		        $lineData = array($row['id'], $row['facility']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}
	}
	
	public function counselling_plan(){	
		$query = $this->db->select('cp.*,dt.degreetype as degree_type_name,c.course as course_name')
						  ->from('tbl_counsellng_plans as cp')
						  ->join('tbl_degree_type as dt','cp.degree_type_id = dt.id')
						  ->join('tbl_course as c','cp.course_id = c.id')
						  ->get() 
						  ->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "counselling_plan_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Plan Name','Degree Type','Course','Discount Percentage','Discounted Price','Description','Terms Condition','Paid Counselling Registration','Payment Info','Status'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
				$status = ($row['status'] == 1) ? 'Active' : 'Inactive';
		        $lineData = array($row['id'], $row['plan_name'], $row['degree_type_id'].'_'.$row['degree_type_name'], $row['course_id'].'_'.$row['course_name'],$row['discount_percentage'],$row['discounted_price'],$row['description'],$row['terms_condition'],$row['paid_counselling_registration'],$row['payment_info'],$status); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}

	}
	
	public function news()
	{	

		$query = $this->db->select('n.*,c.course as course_name')
						  ->from('tbl_news as n')
						  ->join('tbl_course as c','n.course_id = c.id')
						  ->get() 
						  ->result_array();
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "news_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'News Image','Course ID','Title','Short Description','Full Description'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        
		        $lineData = array($row['id'], $row['image'], $row['course_id'].'_'.$row['course_name'], $row['title'], $row['short_description'], $row['full_description']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}

	}
	
	public function centralsubcategory()

	{	

		$query = $this->db->select('*')->get('centralsubcategory')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "centralsubcategory_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Centralhead Id','Category Id','subcategory'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        
		        $lineData = array($row['id'], $row['ch_id'], $row['cat_id'], $row['subcategory']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}

	}
	
	public function statehead()

	{	

		$query = $this->db->select('*')->get('statehead')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "statehead_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'courseid','Name'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        
		        $lineData = array($row['id'], $row['courseid'], $row['name']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}

	}
	
	public function statecategory()

	{	

		$query = $this->db->select('*')->get('statecategory')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "statecategory_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Head ID','Category'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        
		        $lineData = array($row['id'], $row['ch_id'], $row['category']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}

	}
	
	public function statesubcategory()

	{	

		$query = $this->db->select('*')->get('statesubcategory')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "statesubcategory_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Head ID','Category ID','subcategory'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        
		        $lineData = array($row['id'], $row['ch_id'], $row['cat_id'], $row['subcategory']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}

	}
	
	public function clinical()

	{	

		$query = $this->db->select('*')->get('clinic')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "clinical_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Degree ID','Name'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        
		        $lineData = array($row['id'], $row['degreeid'], $row['name']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}

	}
	
	public function facility(){	
		$query = $this->db->select('*')->get('facility')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "facility_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID','Name'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        
		        $lineData = array($row['id'], $row['name']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}
	}

	function getColumnIndex($colIndex)
	{
		
		$letters = '';
		while ($colIndex > 0) {
			$remainder = ($colIndex - 1) % 26;
			$letters = chr(65 + $remainder) . $letters;
			$colIndex = floor(($colIndex - 1) / 26);
		}
		return $letters;
	}
	public function exportCutOffEntryData($head=null,$year=null) {
		require 'vendor/autoload.php';
		$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$subCategoryData = $this->master->getRecords('tbl_sub_category',array('head_id'=>$head));
		$count=count($subCategoryData);
		$row=[];
		for($i=1;$i<=$count;$i++){
			$row=array_merge($row,['R1','','','R2','','','R3','','','R4','','','R5','','']);
		}
		$totalSpaces = array_filter(array_values($row));
		$rows=[];
		for($j=1;$j<=count($totalSpaces);$j++){
			$rows=array_merge($rows,['AIR', 'SR', 'MARKS']);
		}
		$excelData = [];
		$g = 0;
		$counsellingHead = $this->master->getRecords('tbl_counselling_head',array('id'=>$head));
		$i = 0;
                       
		if($counsellingHead){
			foreach($counsellingHead as $head) { 
				$collegeIds = ($head['college']) ? explode('|',$head['college']) : [];
				if(!empty($collegeIds)){
				$collegeData = $this->db->select('*')->where_in('id',$collegeIds)->get('tbl_college')->result_array();
				$keys = 0;                 
if(!empty($collegeData)){
foreach($collegeData as $college) { 
	$courseList = ($head['course_id']) ? explode('|',$head['course_id']) : [];
	if(!empty($courseList)){
		$courseData = $this->db->select('*')->where_in('id',$courseList)->get('tbl_course')->result_array();
	}
	$j = 0;
	if(!empty($courseData)){
		foreach($courseData as $course) {
			$branchData = $this->db->select('*')->like('courses',$course['id'])->get('tbl_branch')->result_array();
			if(!empty($branchData)){
				foreach($branchData as $branch) { 
					$courses=($branch['courses']) ? explode('|',$branch['courses']) : [];
					
					if(in_array($course['id'],$courses)){
						$excelData[$keys][] = '';
					$excelData[$keys][] = ($i === 0) ? $college['id']: '';
					$excelData[$keys][] = ($i === 0) ? $college['full_name'] : '';
					$excelData[$keys][] = ($j === 0) ? $course['id']."-".$course['course'] : '';
					$excelData[$keys][] = $branch['id']."-".$branch['branch'];
						

	if(!empty($subCategoryData)) { 
		$excelRecords = [];
	foreach($subCategoryData as $kysss=>$subs) {
		$cutoffMarksRoundOne = $this->db->select('*')->where(array('college_id'=>$college['id'],'course_id'=>$course['id'],'branch_id'=>$branch['id'],'category_type'=>$subs['id'],'round_one'=>1))->get('tbl_cutfoff_marks_data')->row_array();
		$cutoffMarksRoundTwo = $this->db->select('*')->where(array('college_id'=>$college['id'],'course_id'=>$course['id'],'branch_id'=>$branch['id'],'category_type'=>$subs['id'],'round_two'=>1))->get('tbl_cutfoff_marks_data')->row_array();
		$cutoffMarksRoundThree = $this->db->select('*')->where(array('college_id'=>$college['id'],'course_id'=>$course['id'],'branch_id'=>$branch['id'],'category_type'=>$subs['id'],'round_three'=>1))->get('tbl_cutfoff_marks_data')->row_array();
		$cutoffMarksRoundFour = $this->db->select('*')->where(array('college_id'=>$college['id'],'course_id'=>$course['id'],'branch_id'=>$branch['id'],'category_type'=>$subs['id'],'round_four'=>1))->get('tbl_cutfoff_marks_data')->row_array();
		$cutoffMarksRoundFive = $this->db->select('*')->where(array('college_id'=>$college['id'],'course_id'=>$course['id'],'branch_id'=>$branch['id'],'category_type'=>$subs['id'],'round_five'=>1))->get('tbl_cutfoff_marks_data')->row_array();
		array_push($excelRecords,(!empty($cutoffMarksRoundOne)) ? $cutoffMarksRoundOne['air'] : 0);
		array_push($excelRecords,(!empty($cutoffMarksRoundOne)) ? $cutoffMarksRoundOne['sr'] : 0);
		array_push($excelRecords,(!empty($cutoffMarksRoundOne)) ? $cutoffMarksRoundOne['marks'] : 0);
		array_push($excelRecords,(!empty($cutoffMarksRoundTwo)) ? $cutoffMarksRoundTwo['air'] : 0);
		array_push($excelRecords,(!empty($cutoffMarksRoundTwo)) ? $cutoffMarksRoundTwo['sr'] : 0);
		array_push($excelRecords,(!empty($cutoffMarksRoundTwo)) ? $cutoffMarksRoundTwo['marks'] : 0);
		array_push($excelRecords,(!empty($cutoffMarksRoundThree)) ? $cutoffMarksRoundThree['air'] : 0);
		array_push($excelRecords,(!empty($cutoffMarksRoundThree)) ? $cutoffMarksRoundThree['sr'] : 0);
		array_push($excelRecords,(!empty($cutoffMarksRoundThree)) ? $cutoffMarksRoundThree['marks'] : 0);
		array_push($excelRecords,(!empty($cutoffMarksRoundFour)) ? $cutoffMarksRoundFour['air'] : 0);
		array_push($excelRecords,(!empty($cutoffMarksRoundFour)) ? $cutoffMarksRoundFour['sr'] : 0);
		array_push($excelRecords,(!empty($cutoffMarksRoundFour)) ? $cutoffMarksRoundFour['marks'] : 0);
		array_push($excelRecords,(!empty($cutoffMarksRoundFive)) ? $cutoffMarksRoundFive['air'] : 0);
		array_push($excelRecords,(!empty($cutoffMarksRoundFive)) ? $cutoffMarksRoundFive['sr'] : 0);
		array_push($excelRecords,(!empty($cutoffMarksRoundFive)) ? $cutoffMarksRoundFive['marks'] : 0);
		$excelData[$keys][5] = $excelRecords;
	 }
	}
	
$j++;$i++; } $keys++;} 

 $j = 0;
					
}

} 


}
$i = 0; 
}

}
}
}}
		$data = [
			[
				'',
				'',
				'',
				'',
				'',
				$row
			],
			[
				'',
				'',
				'',
				'',
				'',
				$rows
			]
		];
		
		$data = array_merge($data,$excelData);
		$subCategoryDatas = [];
		if(!empty($subCategoryData)){
			foreach($subCategoryData as $sub){
				$catid=$sub['category_id'];
				$catname=$this->master->singleRecord('tbl_category',array('id'=>$catid));
				$subCategoryDatas[] = $sub['id']."-".$catname['category_name']."-".$sub['sub_category_name'];
				for($i = 0;$i<14; $i++){
					$subCategoryDatas[] = '';
				}
			}
		}
		$headers = [
			'College ID',
			'College Name',
			'Course',
			'Branch'
		];
		$headers = array_merge($headers,$subCategoryDatas);
		$sheet->fromArray([$headers], NULL, 'A1');
		$alphabet = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		if (!empty($subCategoryData)) {
			$startval=5;
			for ($k = 1; $k <= $count; $k++) {
				$startcountval=$startval;
				for($startcount=0;$startcountval>0;$startcount++){
				$startcountval=floor($startcountval/26);
			}
			if ($startcount==1) {
				$startAlphabet =  $alphabet[$startval-1];
			}
			if ($startcount==2) {
				if ($startval%26==0) {
		 			 $startAlphabet = $alphabet[floor($startval/26)-2]."Z";
		 			}else{
					 $startAlphabet = $alphabet[floor($startval/26)-1].$alphabet[$startval%26-1];
	 			}
			}
			if ($startcount==3) {
				if ($startval%26==0) {
		 			 $startAlphabet = $alphabet[floor(floor($startval/26)/26)-1].$alphabet[floor(floor($startval/26)%26)-1]."Z";
		 			}else{
		 				//echo $startval;
		 				if(floor($startval/26)-26>=26){
		 				$sec=floor(floor($startval/26)%26);
		 			    }else{
		 			    	$sec=floor($startval/26)-26;
		 			    }
					 $startAlphabet = $alphabet[floor(floor($startval/26)/26)-1].$alphabet[$sec].$alphabet[$startval%26-1];
	 			}
			}



			$endval= 14+$startval;
			 $startcountval=$endval;
				for($startcount=0;$startcountval>0;$startcount++){
				$startcountval=floor($startcountval/26);
			}
			if ($startcount==1) {
				$endAlphabet =  $alphabet[$endval-1];
			}
			if ($startcount==2) {
				if ($endval%26==0) {
		 			 $endAlphabet = $alphabet[floor($endval/26)-2]."Z";
		 			}else{
					 $endAlphabet = $alphabet[floor($endval/26)-1].$alphabet[$endval%26-1];
	 			}
			}
			if ($startcount==3) {
				if ($endval%26==0) {
		 			 $endAlphabet = $alphabet[floor(floor($endval/26)/26)-1].$alphabet[floor(floor($endval/26)%26)-1]."Z";
		 			}else{
		 				//echo $endval;
		 				if(floor($endval/26)-26>=26){
		 				$sec=floor(floor($endval/26)%26);
		 			    }else{
		 			    	$sec=floor($endval/26)-26;
		 			    }
					 $endAlphabet = $alphabet[floor(floor($endval/26)/26)-1].$alphabet[$sec].$alphabet[$endval%26-1];
	 			}
			}





			//echo "<br/>";
			// 	
			// 	if($startval <=26){
			// 		$startAlphabet =  $alphabet[$startval-1];
			// 	}else{
			// 		//echo $startval%26;
			// 		//echo '<br/>';
			// 		//echo $startval%26;
			// 		if (floor($startval/26)>26) {
			// 			if ($startval%26==0) {
			// 				echo $startAlphabet = 'A'.$alphabet[floor(floor($startval/26)/26)-1]."Z";
			// 			}else{
			// 				echo $startAlphabet = 'A'.$alphabet[floor(floor($startval/26)%26)-1].$alphabet[$startval%26-1];
			// 			}
			// 		}else{
			// 			if ($startval%26==0) {
			// 			$startAlphabet = $alphabet[floor($startval/26)-2]."Z";
			// 			}else{
			// 				$startAlphabet = $alphabet[floor($startval/26)-1].$alphabet[$startval%26-1];
							
			// 			}
			// 		}
					
					
			// 	}
			// 	if($endval<=26){
			// 		$endAlphabet =  $alphabet[$endval-1];
			// 	}else{
			// 		if (floor($endval/26)>26) {
			// 			if ($endval%26==0) {
			// 				echo "-".$endAlphabet = 'A'.$alphabet[floor(floor($endval/26)/26)-1]."Z";
			// 				echo "<br/>";
			// 			}else{
			// 				echo "-".$endAlphabet = 'A'.$alphabet[floor(floor($endval/26)%26)-1].$alphabet[$endval%26-1];
			// 				echo "<br/>";
			// 			}
			// 		}else{
			// 			if ($endval%26==0) {
			// 				$endAlphabet = $alphabet[floor($endval/26)-2]."Z";
			// 			}else{
			// 				$endAlphabet = $alphabet[floor($endval/26)-1].$alphabet[$endval%26-1];
							
			// 			}
			// 		}
			// 	}
			 	$cellRange = $startAlphabet."1:".$endAlphabet.'1';
			 	$sheet->mergeCells($cellRange);
			 	$startval=$startval+14+1;
			}
			$startval=5;
			$endval=0;
			for ($k = 1; $k <= $count*5; $k++) {
				$endval= 2 + $startval;
				if($startval <= 26){
					$startAlphabet =  $alphabet[$startval-1];
				}else{
					if (floor($startval/26)>26) {
						// code...
					}else{
					if ($startval%26==0) {
						$startAlphabet = $alphabet[floor($startval/26)-2]."Z";
					}else{
						$startAlphabet = $alphabet[floor($startval/26)-1].$alphabet[$startval%26-1];
					}
				}
				}
				if($endval<=26){
					$endAlphabet =  $alphabet[$endval-1];
				}else{
					if (floor($endval/26)>26) {
						// code...
					}else{
					if ($endval%26==0) {
						$endAlphabet = $alphabet[floor($endval/26)-2]."Z";
					}else{
						$endAlphabet = $alphabet[floor($endval/26)-1].$alphabet[$endval%26-1];
					}
				}
				}
				$cellRange = $startAlphabet."2:".$endAlphabet.'2';
				$sheet->mergeCells($cellRange);
				$startval=$startval+2+1;
			}
		}
die();
		// $sheet->mergeCells('D2:F2');
		// $sheet->mergeCells('G2:I2');
		// $sheet->mergeCells('J2:L2');
		// $sheet->mergeCells('M2:O2');
		// $sheet->mergeCells('P2:R2');
		// $sheet->mergeCells('S2:U2');
		// $sheet->mergeCells('V2:X2');
		// $sheet->mergeCells('Y2:AA2');
		// $sheet->mergeCells('AB2:AD2');
		// $sheet->mergeCells('AE2:AG2');
		$rowIndex = 2;
		foreach ($data as $row) {
			$columnIndex = 0;
			foreach ($row as $cell) {
				if (is_array($cell)) {
					foreach ($cell as $value) {
						if ($rowIndex == 2 && $columnIndex > 2) { // Assuming the first row needs to be bold
							$sheet->getStyleByColumnAndRow($columnIndex + 1, $rowIndex)->getFont()->setBold(true);
						}
						$sheet->setCellValueByColumnAndRow($columnIndex++, $rowIndex, $value);
					}
					$columnIndex += 5;
				} else {
					$sheet->setCellValueByColumnAndRow($columnIndex++, $rowIndex, $cell);
				}
				if ($rowIndex == 2 && $columnIndex > 2) { // Assuming the first row needs to be bold
					$sheet->getStyleByColumnAndRow($columnIndex + 1, $rowIndex)->getFont()->setBold(true);
				}
			}
			$rowIndex++;
		}
		$lastColumn = $sheet->getHighestColumn();
		$lastRow = $sheet->getHighestRow();
		$range = 'A1:' . $lastColumn . $lastRow;
		$sheet->getStyle($range)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle($range)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
		$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
		$filename = "cutoff_data_head_" . date('Y-m-d') . ".xlsx";
		$writer->save($filename);	
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header("Content-Disposition: attachment; filename=$filename");
		header('Cache-Control: max-age=0');
		readfile($filename);
		exit;
	}
}
