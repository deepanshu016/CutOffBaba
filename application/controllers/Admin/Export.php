<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller {

	public function state()

	{	
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
	public function country()

	{	
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

	
	public function district()
	{	
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
		$query = $this->db->select('sd.id as sub_district_id,sd.country as sub_country_id,sd.state as state_sub,sd.district as sub_distrcit,sd.district as sub_district_district,s.id as state_id,s.name as state_name,s.country_id ,d.id as district_id,d.city as city_name,d.state_id, d.country,c.countryCode,c.name as country_name')->from('tbl_sub_district as sd')->join('tbl_state as s', 'sd.state = s.id')->join('tbl_city as d', 'sd.district = d.id')->join('tbl_country as c', 'sd.country = c.id')->get()->result_array(); 

		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "sub_district_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Country ID','State ID','District ID','Sub District'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        $lineData = array($row['sub_district_id'], $row['sub_country_id'].'_'.$row['country_name'], $row['state_sub'].'_'.$row['state_name'], $row['sub_district_district'].'_'.$row['city_name'],$row['sub_district_district']); 
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
				$fields = array('ID', 'Stream Name'); 
				fputcsv($f, $fields, $delimiter); 
				foreach($query as $row){ 
					$lineData = array($row['id'], $row['stream']); 
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

	
	public function course()

	{	

	$query = $this->db->select('*')->get('course')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "course_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Stream','Degree','Course Name','Short Name','Icon', 'About','Title','Description'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        $status = ($row['status'] == 1)?'Active':'Inactive'; 
		        $lineData = array($row['id'], $row['streamid'], $row['degreeid'], $row['name'], $row['shortname'], $row['icon'], $row['about'], $row['title'], $row['description']); 
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

	

	public function branch()

	{	

		$query = $this->db->select('*')->get('specialization')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "branches_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Stream','Degree','Course','Branch Name','Short Name','Branch Type','popularly','alsoknown1','alsoknown2','alsoknown3','about'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        $status = ($row['status'] == 1)?'Active':'Inactive'; 
		        $lineData = array($row['id'], $row['streamid'], $row['degreeid'], $row['courseid'], $row['name'], $row['shortname'], $row['btype'], $row['popularly'], $row['alsoknown1'], $row['alsoknown2'], $row['alsoknown3'], $row['about']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}

	}
	
	public function approved()

	{	

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
	
	public function type()

	{	

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
	

	public function college()

	{	

		$query = $this->db->select('*')->get('college')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "college_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Name','dname','pname','logo','banner','prospectus','estdyear','type','affliatedfrom','aprovedby','recogstatus','gender','hostel','shortdescription','noname','nonumber','contact1','contact2','website','email','about','address','address2','landmark','city','state','country','pincode','title','description','streams'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        $status = ($row['status'] == 1)?'Active':'Inactive'; 
		        $lineData = array($row['id'], $row['name'], $row['dname'], $row['pname'], $row['logo'], $row['banner'], $row['prospectus'], $row['estdyear'], $row['type'], $row['affliatedfrom'], $row['aprovedby'], $row['recogstatus'], $row['gender'], $row['hostel'], $row['shortdescripton'], $row['noname'], $row['nonumber'], $row['contact1'], $row['contact2'], $row['website'], $row['email'], $row['about'], $row['address'], $row['address2'], $row['landmark'], $row['city'], $row['state'], $row['country'], $row['pincode'], $row['title'], $row['description'], $row['streams']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}

	}
	
	public function fee()

	{	

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

		$query = $this->db->select('*')->get('feehead')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "feehead_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Fee Title','Name','Note'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        
		        $lineData = array($row['id'], $row['feetitle'], $row['name'], $row['notes']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}

	}
	
	public function feedesc()

	{	

		$query = $this->db->select('*')->get('feedesc')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "feedesc_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Fee Title','Fee Head','Name','Fee'); 
		    fputcsv($f, $fields, $delimiter); 
		    foreach($query as $row){ 
		        
		        $lineData = array($row['id'], $row['feetitle'], $row['feehead'], $row['name'], $row['fee']); 
		        fputcsv($f, $lineData, $delimiter); 
		    } 
		    fseek($f, 0); 
		    header('Content-Type: text/csv'); 
		    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
		    fpassthru($f); 
		}

	}
	
	public function centralhead()

	{	

		$query = $this->db->select('*')->get('centralhead')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "centralhead_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Course Id','Name'); 
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
	
	public function centralcategory()

	{	

		$query = $this->db->select('*')->get('centralcategory')->result_array(); 
		if(count($query) > 0){ 
		    $delimiter = ","; 
		    $filename = "centralcategory_" . date('Y-m-d') . ".csv"; 
		    $f = fopen('php://memory', 'w'); 
		    $fields = array('ID', 'Centralhead Id','Category'); 
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
	
		public function facility()

	{	

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

}
