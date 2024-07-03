<?php

class MasterModel extends CI_Model {

	/* INSERT ANY RECORD IN TABLE */
	function insert_batch($table = '', $data = []) {
		return  $this->db->insert_batch($table, $data);
//		debugger($this->db->queries);
	}
	function insert($table = '', $data = []) {
		$q = $this->db->insert($table, $data);
		return  $this->db->insert_id();
		
	} // insert end
	function insertBulk($table='',$data=null){
		return $this->db->insert_batch($table, $data);
	}
	function UploadBulk($table='',$data=null){
		$this->db->delete($table);
		return $this->db->insert_batch($table, $data);
	}
	function singleRecord($table = '', $condition=null){
		return $this->db->get_where($table,$condition)->row_array();
	}
	function updateRecord($table = '', $condition=null,$data= []) {
		$q = $this->db->set($data)->where($condition)->update($table);
		return ($this->db->affected_rows());
	}
	function getRecords($table = '', $condition=[]){
		if(empty(!$condition)){
			return $this->db->get_where($table,$condition)->result_array();
		}else{
			return $this->db->select('*')->get($table)->result_array();
		}
	}
	function getRecordsWhereIn($table = '',$key_name = '', $data=[]){
		return $this->db->select('*')->from($table)->where_in($key_name,$data)->get()->result_array();
	}
	function getRecordsFindInSet($table = '', $value,$column_name,$condition=[]){
		$query = $this->db->select('*')->from($table);
		$value = $this->db->escape($value);
    	$column_name = str_replace("'","",$column_name);
		if(empty($condition)){
			$query = $query->where("FIND_IN_SET($value, $column_name) > 0", NULL, FALSE);
		}else{
			$query = $query->where($condition);
		}
		return $query->get()->result_array();
	}

	function getRecordsOrderBy($table = '', $condition=[],$order_by = ''){
		if(empty(!$condition)){
			return $this->db->order_by($order_by,'ASC')->get_where($table,$condition)->result_array();
		}else{
			return $this->db->select('*')->order_by($order_by,'ASC')->get($table)->result_array();
		}
	}
	function getRecordswithOrderAndLimit($table = '', $condition=[]){
		if(empty(!$condition)){
			return $this->db->order_by('id','DESC')->limit(3)->get_where($table,$condition)->result_array();
		}else{
			return $this->db->order_by('id','DESC')->limit(3)->select('*')->get($table)->result_array();
		}
	}
	function getRecordsbyLimit($table = '', $condition=[],$limit=10){
		if(empty(!$condition)){
			return $this->db->order_by('id','ASC')->limit($limit)->get_where($table,$condition)->result_array();
		}else{
			return $this->db->order_by('id','ASC')->limit($limit)->select('*')->get($table)->result_array();
		}
	}
	function getRecordsLike($table = '', $condition=null){
		return $this->db->select('*')->from($table)->like('blog_type',$condition)->get()->result_array();
	}
	function deleteRecord($table = '', $condition=null) {
		$q = $this->db->where($condition)->delete($table);
		return ($this->db->affected_rows());
	}

	function getProceduralData(){
		$query = $this->db->query("CALL GetCombinedData()");
		return $query->result_array();
	}

	function getProceduralDataWithCondition($id,$file_types) {
		$query = "CALL GetMediaData($id,$file_types)";
		$result = $this->db->query($query);
		if ($query) {
			$data = $result->result_array();
			return $data;
		}
		return NULL;
	}


    function getFilteredDataByIds($table_name, $column_name,$ids){
		$query = $this->db->query("CALL FilterByIDs(?, ?, ?)", array($table_name, $column_name, $ids));
		return $query->result_array();
    }


	function deleteDataByIds($table_name, $column_name,$ids){
		$this->db->query("CALL DeleteByIDs(?, ?, ?)", array($table_name, $column_name, $ids));
		while ($this->db->more_results()) {
			$this->db->next_result();
		}
		return true;
	}

	function getCutOffData(){
		$this->db->select('t1.*, 
			c.id, c.course, c.course_full_name, c.course_short_name, c.course_icon, 
			c.stream AS stream_id, c.degree_type AS degree_type_id, c.course_duration, c.exam, 
			c.course_eligibility, c.course_opportunity, c.expected_salary, c.course_fees, 
			c.counselling_authority, t2.full_name AS college_full_name,
			b.id AS branch_id, b.branch AS branch_name, b.branch_type');
		$this->db->from('tbl_cutfoff_marks_data AS t1');
		$this->db->join('tbl_course AS c', 'c.id = t1.course_id');
		$this->db->join('tbl_college AS t2', 't2.id = t1.college_id');
		$this->db->join('tbl_branch AS b', 'b.id = t1.branch_id');
		$this->db->group_by('t1.category_type');

		$query = $this->db->get();
		return $query->result_array();
	}
	function GetCollegeForCutOff(){
		$this->db->select('t1.id as cutoff_id, t1.college_id, t2.full_name AS college_full_name,t2.course_offered');
		$this->db->from('tbl_cutfoff_marks_data AS t1');
		$this->db->join('tbl_college AS t2', 't2.id = t1.college_id');
		$this->db->group_by('t1.college_id');
		$query = $this->db->get();
		return $query->result_array();
	}


	function getParentChildData($table1, $table2,$common_field){
		$this->db->select('t1.id as state_id,t1.name as state_name,t1.country_id,t2.countryCode,t2.name as country_name');
		$this->db->from($table1.' AS t1');
		$this->db->join($table2. ' AS t2', 't2.id = t1.'.$common_field.'');
		$query = $this->db->get();
		return $query->result_array();
	}
	function getDistrictDataWithParent($table1, $table2,$table3, $common_field1, $common_field2){
		$this->db->select('t2.id as state_id,t2.name as state_name,t2.country_id,t3.countryCode,t3.name as country_name,t1.id as district_id,t1.city');
		$this->db->from($table1.' AS t1');
		$this->db->join($table2. ' AS t2', 't2.id = t1.'.$common_field1.'');
		$this->db->join($table3. ' AS t3', 't3.id = t1.'.$common_field2.'');
		$query = $this->db->get();
		return $query->result_array();
	}
	function getSubDistrictDataWithParent($table1, $table2,$table3,$table4, $common_field1, $common_field2,$common_field3){
		$this->db->select('t1.country as country_id,t1.state as state_id ,t1.district as district_id,t1.sub_district ,t1.district,t3.name as state_name,t4.countryCode,t4.name as country_name');
		$this->db->from($table1.' AS t1');
		$this->db->join($table2. ' AS t2', 't2.id = t1.'.$common_field1.'');
		$this->db->join($table3. ' AS t3', 't3.id = t1.'.$common_field2.'');
		$this->db->join($table4. ' AS t4', 't4.id = t1.'.$common_field3.'');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getExamCoursesList($exam_id){
		echo $exam_id; die;
	}
	public function getExamCourses($exam_id){
		$examData = $this->db->get_where('tbl_exam',['id'=>$exam_id])->row_array();
		
		if(empty($examData)){
			return [];
		}
		$coursesData = [];
		$coursesOffered = explode(',',$examData['course_accepting']);
		$allCourses = $this->db->select('*')->from('tbl_course')->where_in('id', $coursesOffered)->get()->result_array();
		if(!empty($allCourses)){
			foreach($allCourses as $key=>$course){
				$coursesData[$key]['id'] = $course['id'];
				$coursesData[$key]['course'] = $course['course'];
				$coursesData[$key]['course_full_name'] = $course['course_full_name'];
				$coursesData[$key]['course_short_name'] = $course['course_short_name'];
				$coursesData[$key]['course_icon'] = $course['course_icon'];
				$coursesData[$key]['stream'] = $course['stream'];
				$coursesData[$key]['degree_type'] = $course['degree_type'];
				$coursesData[$key]['course_duration'] = $course['course_duration'];
				$coursesData[$key]['exam'] = $course['exam'];
				$coursesData[$key]['course_eligibility'] = $course['course_eligibility'];
				$coursesData[$key]['course_opportunity'] = $course['course_opportunity'];
				$coursesData[$key]['expected_salary'] = $course['expected_salary'];
				$coursesData[$key]['course_fees'] = $course['course_fees'];
				$coursesData[$key]['counselling_authority'] = $course['counselling_authority'];
				$coursesData[$key]['college'] = $course['college'];
				$coursesData[$key]['branch_type'] = $course['branch_type'];
				$coursesData[$key]['status'] = $course['status'];
				$head_data = array_column($this->db->select('id')->from('tbl_counselling_head')->where("FIND_IN_SET(" . $course['id'] . ", course_id) > 0", NULL, FALSE)->get()->result_array(),'id');
				//echo $this->db->last_query();
				if (count($head_data)>0) {
					$coursesData[$key]['category_data'] = $this->db->select('*')->from('tbl_category')->where_in('head_id', $head_data)->get()->result_array();
				}
				
				$coursesData[$key]['sub_category_data'] = $this->db->select('*')->from('tbl_sub_category')->get()->result_array();
			}
		}
		return $coursesData;
	}


	function getDomicileCategories($user_data){
		$state_data = $this->db->select('state_id')->from('tbl_counselling_head')->where('level_id',2)->get()->result_array();
		$stateIds =   array_column($state_data,'state_id');
		if(empty($stateIds)){
			return [];
		}
		return $this->db->select('*')->from('tbl_state')->where_in('id', $stateIds)->get()->result_array();
	}
	public function updateCoursePreferences($table, $data) {
		$course_data = $data;
		$datas = [];
		$count = 0;
		$this->deleteRecord($table, ['user_id'=>$course_data['user']['id']]);
		if(!empty($course_data)){
			foreach($course_data['course_data'] as $key => $course){
				if(!empty($course['category'])){
					foreach($course['category'] as $keys=>$category){
						$datas['user_id'] = $course_data['user']['id'];
						$datas['course_id'] = $course['course_id'];
						$datas['category_id'] = $category['category_id'];
						$datas['sub_category_id'] = $category['sub_category_id'];
						$result = $this->insert($table,$datas);
						if($result){
							$count += 1;
						}
					}
				}
				if(isset($course['domicile_category_id']) && $course['domicile_category_id'] != ''){
					$datas['user_id'] = $course_data['user']['id'];
					$datas['course_id'] = $course['course_id'];
					$datas['state_id'] = $course['domicile_category_id']['state_id'];
					$datas['domicile_state_category_id'] = $course['domicile_category_id']['domicile_state_category_id'];
					$datas['domicile_state_sub_category_id'] = $course['domicile_category_id']['domicile_state_sub_category_id'];
					$result = $this->insert($table,$datas);
					if($result){
						$count += 1;
					}
				}
			}
		}
		return $count;
	}

	public function getStatesWithMinimumCollege(){
		$this->db->select('s.*');
        $this->db->from('tbl_state as s');
        $this->db->join('tbl_college as c', 'c.state = s.id', 'inner');
        $this->db->group_by('s.id');
        $query = $this->db->get();
        return $query->result_array();
	}
	public function getStatesWithMinimumCollegeWithCourse($course_id){
		$this->db->select('s.*');
        $this->db->from('tbl_state as s');
        $this->db->join('tbl_college as c', 'c.state = s.id', 'inner');
        $this->db->where("FIND_IN_SET(" . $course_id. ", c.course_offered) > 0", NULL, FALSE);
        $this->db->group_by('s.id');
        $query = $this->db->get();
        return $query->result_array();
	}
	public function getMinimumCollegeWithCourse(){
		$this->db->select('c.id as college_id,c.full_name,c.slug,c.short_description,c.popular_name_one,c.popular_name_two,c.establishment,
		c.gender_accepted,c.course_offered,c.affiliated_by,c.university_name,c.approved_by,c.college_logo,c.college_banner,c.prospectus_file,c.website,c.email,
		c.contact_one,c.contact_two,c.contact_three,c.nodal_officer_name,c.nodal_officer_no,c.keywords,c.tags,s.id as state_id,s.name as state_name,');
        $this->db->from('tbl_state as s');
        $this->db->join('tbl_college as c', 'c.state = s.id', 'inner');
        $query = $this->db->get();
        return $query->result_array();
	}
	public function getBranchesWithCourse($course_id){
		$this->db->select('*');
        $this->db->from('tbl_branch');
        $this->db->where("FIND_IN_SET(" . $course_id. ", courses) > 0", NULL, FALSE);
        $query = $this->db->get();
        return $query->result_array();
	}
	public function getBranchesWithid($branch_id){
		$this->db->select('*');
        $this->db->from('tbl_branch');
        $this->db->where("id",$branch_id);
        $query = $this->db->get();
        return $query->result_array();
	}
	public function getCollegesDataStateWise($state_id,$course_id,$data=[]){
		
		$course_ids = [];
		$course_ids[] = $course_id;
		$data['states'] = $state_id;
		if(isset($data['degree_type'])){
			$courseData = $this->getRecords('tbl_course',['degree_type'=>$data['degree_type']]);
			if(!empty($courseData)){
				$course_ids = array_merge($course_ids, array_column($courseData,'id'));
			}
		}
		if($data && $data['exam'] != ''){
			$courseData = $this->db->select('*')->from('tbl_course')->where("FIND_IN_SET(" . $data['exam']. ", exam) > 0", NULL, FALSE)->get()->result_array();
			if(!empty($courseData)){
				$course_ids = array_merge($course_ids, array_column($courseData,'id'));
			}
		}
		$college_query  = $this->db->select('c.id as college_id,c.full_name,c.slug,c.short_description,c.popular_name_one,c.popular_name_two,c.establishment,
		c.gender_accepted,c.course_offered,c.affiliated_by,c.university_name,c.approved_by,c.college_logo,c.college_banner,c.prospectus_file,c.website,c.email,
		c.contact_one,c.contact_two,c.contact_three,c.nodal_officer_name,c.nodal_officer_no,c.keywords,c.tags,s.id as state_id,s.name as state_name,cit.id as city_id,
		cit.city as city_name,count.countryCode,a.id as approval_id,a.approval,o.id as ownership_id,o.title as ownership_title')->from('tbl_college as c');
		// if(isset($data['degree_type'])){
		// 	$courseData = $course_query->where(['degree_type'=>$data['degree_type']]);
		// 	echo "<pre>";
		// 	print_r($courseData); die;
		// 	if(!empty($courseData)){
		// 		$course_ids = array_merge($course_ids, array_column($courseData,'id'));
		// 	}
		// }
		foreach ($course_ids as $course_id) {
			$college_query = $college_query->or_where("FIND_IN_SET($course_id, c.course_offered) > 0");
		}
		if(isset($data['states'])){
			$college_query = $college_query->where('c.state',$data['states']);
		}
		if(isset($data['city'])){
			$college_query = $college_query->where('c.city',$data['city']);
		}
		// if($data && $data['exam'] != ''){
		// 	$courseData = $course_query->where("FIND_IN_SET(" . $data['exam']. ", exam) > 0", NULL, FALSE)->get()->result_array();
		// 	if(!empty($courseData)){
		// 		$course_ids = array_merge($course_ids, array_column($courseData,'id'));
		// 	}
		// }
		if(isset($data['ownership'])){
			$college_query = $college_query->where('c.ownership',$data['ownership']);
		}
		if(isset($data['facility'])){
			$college_query = $college_query->where('c.facility',$data['facility']);
		}
		// $query = $query->where("FIND_IN_SET(" . $course_id . ", c.course_offered) > 0", NULL, FALSE);
		$college_query = $college_query->join('tbl_state as s', 's.id = c.state')
				->join('tbl_city as cit', 'cit.id = c.city')
				->join('tbl_country as count', 'count.id = c.country')
				->join('tbl_approval as a', 'a.id = c.approved_by')
				->join('tbl_ownership as o', 'o.id = c.ownership');
		return $college_query->get()->result_array();
	}


	public function getCollegeForSearch($table, $keyword){
		$collegeList = $this->db->select('c.id as college_id,c.full_name,c.slug,c.short_description,c.popular_name_one,c.popular_name_two,c.establishment,
						c.gender_accepted,c.course_offered,c.affiliated_by,c.university_name,c.approved_by,c.college_logo,c.college_banner,c.prospectus_file,c.website,c.email,
						c.contact_one,c.contact_two,c.contact_three,c.nodal_officer_name,c.nodal_officer_no,c.keywords,c.tags,s.id as state_id,s.name as state_name,cit.id as city_id,
						cit.city as city_name,count.countryCode,a.id as approval_id,a.approval,o.id as ownership_id,o.title as ownership_title')->from('tbl_college as c')
					  ->like('full_name', $keyword, 'both')
					  ->or_like('short_name', $keyword, 'both')
					  ->or_like('popular_name_one', $keyword, 'both')
					  ->or_like('popular_name_two', $keyword, 'both')
					  ->or_like('university_name', $keyword, 'both')
					  ->or_like('keywords', $keyword, 'both')
					  ->or_like('tags', $keyword, 'both');
		$collegeList = $collegeList->join('tbl_state as s', 's.id = c.state')
				->join('tbl_city as cit', 'cit.id = c.city')
				->join('tbl_country as count', 'count.id = c.country')
				->join('tbl_approval as a', 'a.id = c.approved_by')
				->join('tbl_ownership as o', 'o.id = c.ownership');
		return $collegeList->get()->result_array();
	}
	public function getCoursesForSearch($table, $keyword){
		$courseList = $this->db->select('*')->from($table)
					  ->like('course', $keyword, 'both')
					  ->or_like('course_full_name', $keyword, 'both')
					  ->or_like('course_short_name', $keyword, 'both')
					  ->or_like('course_eligibility', $keyword, 'both')
					  ->or_like('course_opportunity', $keyword, 'both');
		return $courseList->get()->result_array();
	}
	public function getStateForSearch($table, $keyword){
		$stateList = $this->db->select('*')->from($table)
					->like('name', $keyword, 'both');
		return $stateList->get()->result_array();
	}
	public function getCollegesExamWise($data=[]){
		$course_ids = [];
		if($data && $data['exam'] != ''){
			$courseData = $this->db->select('*')->from('tbl_course')->where("FIND_IN_SET(" . $data['exam']. ", exam) > 0", NULL, FALSE)->get()->result_array();
			if(!empty($courseData)){
				$course_ids = array_merge($course_ids, array_column($courseData,'id'));
			}
		}
		if(!empty($course_ids)){
			$college_query  = $this->db->select('c.id as college_id,c.full_name,c.slug,c.short_description,c.popular_name_one,c.popular_name_two,c.establishment,
			c.gender_accepted,c.course_offered,c.affiliated_by,c.university_name,c.approved_by,c.college_logo,c.college_banner,c.prospectus_file,c.website,c.email,
			c.contact_one,c.contact_two,c.contact_three,c.nodal_officer_name,c.nodal_officer_no,c.keywords,c.tags,s.id as state_id,s.name as state_name,cit.id as city_id,
			cit.city as city_name,count.countryCode,a.id as approval_id,a.approval,o.id as ownership_id,o.title as ownership_title')->from('tbl_college as c');
				
			foreach ($course_ids as $course_id) {
				if($course_id){
					$college_query->or_where("FIND_IN_SET(?, c.course_offered) > 0", $course_id);
				}
			}
			$college_query = $college_query->join('tbl_state as s', 's.id = c.state')
					->join('tbl_city as cit', 'cit.id = c.city')
					->join('tbl_country as count', 'count.id = c.country')
					->join('tbl_approval as a', 'a.id = c.approved_by')
					->join('tbl_ownership as o', 'o.id = c.ownership');
			$college_query  = $college_query->get()->result_array();
			echo $this->db->last_query();die;
		}else{
			return [];
		}
	}
	public function getCollegesCourseWise($course_id){
		$college_query = $this->db->select('c.id as college_id,c.full_name,c.slug,c.short_description,c.popular_name_one,c.popular_name_two,c.establishment,
						c.gender_accepted,c.course_offered,c.affiliated_by,c.university_name,c.approved_by,c.college_logo,c.college_banner,c.prospectus_file,c.website,c.email,
						c.contact_one,c.contact_two,c.contact_three,c.nodal_officer_name,c.nodal_officer_no,c.keywords,c.tags,s.id as state_id,s.name as state_name,cit.id as city_id,
						cit.city as city_name,count.countryCode,a.id as approval_id,a.approval,o.id as ownership_id,o.title as ownership_title')->from('tbl_college as c')
						->where("FIND_IN_SET(" . $course_id. ", c.course_offered) > 0", NULL, FALSE)
						->join('tbl_state as s', 's.id = c.state')
						->join('tbl_city as cit', 'cit.id = c.city')
						->join('tbl_country as count', 'count.id = c.country')
						->join('tbl_approval as a', 'a.id = c.approved_by')
						->join('tbl_ownership as o', 'o.id = c.ownership');
		return  $college_query->get()->result_array();
	}
	public function getFullCollegeDetail($college_id){
		$college_query = $this->db->select('c.id as college_id,c.full_name,c.slug,c.short_description,c.popular_name_one,c.popular_name_two,c.establishment,
						c.gender_accepted,c.course_offered,c.affiliated_by,c.university_name,c.approved_by,c.college_logo,c.college_banner,c.prospectus_file,c.website,c.email,
						c.contact_one,c.contact_two,c.contact_three,c.nodal_officer_name,c.nodal_officer_no,c.keywords,c.tags,s.id as state_id,s.name as state_name,cit.id as city_id,
						cit.city as city_name,count.countryCode,count.name as country_name,a.id as approval_id,a.approval,o.id as ownership_id,o.title as ownership_title')->from('tbl_college as c')
						->where('c.id',$college_id)
						->join('tbl_state as s', 's.id = c.state')
						->join('tbl_city as cit', 'cit.id = c.city')
						->join('tbl_country as count', 'count.id = c.country')
						->join('tbl_approval as a', 'a.id = c.approved_by')
						->join('tbl_ownership as o', 'o.id = c.ownership');
		return  $college_query->get()->row_array();
	}


	function getRecordsbyLimitForPagination($table = '', $id,$rowperpage, $rowno,$data){
		$query = $this->db->order_by('id', 'ASC')->limit($rowperpage,$rowno)->where("FIND_IN_SET('{$id}', course_offered) >",0);
		
		if(!empty($data['ownership'])){
			$query = $query->where_in('affiliated_by',$data['ownership']);
		}
		if(!empty($data['approval'])){
			$this->db->group_start();
			foreach ($data['approval'] as $approval) {	
				$query = $query->or_where("FIND_IN_SET('{$approval}', approved_by) >",0);
            }
			$this->db->group_end();
		}
		if(!empty($data['state'])){
			$query = $query->where_in('state',$data['state']);
		}
		if(!empty($data['gender'])){
			$query = $query->where_in('gender',$data['gender']);
		}
		return $query->get($table)->result_array();
	}
	function getRecordsbyLimitWithoutPagination($table = '', $course_id,$data){
		$query = $this->db->order_by('id', 'ASC');
		if(!empty($course_id)){
			$query = $query->where("FIND_IN_SET('{$course_id}', course_offered) >",0);
		}
		if(!empty($data['ownership'])){
			$query = $query->where_in('affiliated_by',$data['ownership']);
		}
		if(!empty($data['approval'])){
			$this->db->group_start();
			foreach ($data['approval'] as $approval) {
				$query = $query->where("FIND_IN_SET('{$approval}', approved_by) >",0);
            }
			$this->db->group_end();
		}
		if(!empty($data['state'])){
			$query = $query->where_in('state',$data['state']);
		}
		if(!empty($data['gender'])){
			$query = $query->where_in('gender',$data['gender']);
		}
		return $query->get($table)->result_array();
	}
	public function getCollegeWithLikeQuery($keyword){
		$collegeList = $this->db->select('*')->from('tbl_college')
					  ->like('full_name', $keyword, 'both')
					  ->or_like('short_name', $keyword, 'both')
					  ->or_like('popular_name_one', $keyword, 'both')
					  ->or_like('popular_name_two', $keyword, 'both')
					  ->or_like('university_name', $keyword, 'both')
					  ->or_like('keywords', $keyword, 'both')
					  ->or_like('tags', $keyword, 'both');
		return $collegeList->get()->result_array();
	}
	public function getNewsWithLikeQuery($keyword){
		$collegeList = $this->db->select('title')->from('tbl_news')
					  ->like('title', $keyword, 'both')
					  ->or_like('short_description', $keyword, 'both')
					  ->or_like('full_description', $keyword, 'both');
		return $collegeList->get()->result_array();
	}
	public function getCoursesWithLikeQuery($keyword){
		$collegeList = $this->db->select('course')->from('tbl_course')
					  ->like('course', $keyword, 'both')
					  ->or_like('course_full_name', $keyword, 'both')
					  ->or_like('course_short_name', $keyword, 'both')
					  ->or_like('course_short_name', $keyword, 'both');
		return $collegeList->get()->result_array();
	}
	public function getBranchesWithLikeQuery($keyword){
		$collegeList = $this->db->select('branch')->from('tbl_branch')
					  ->like('branch', $keyword, 'both')
					  ->or_like('short_branch_name', $keyword, 'both')
					  ->or_like('branch_name_1', $keyword, 'both')
					  ->or_like('branch_name_2', $keyword, 'both');
		return $collegeList->get()->result_array();
	}


	function getRecordsbyLimitForPaginationForStream($table = '', $id,$rowperpage, $rowno,$data){
		$query = $this->db->order_by('id', 'ASC')->limit($rowperpage,$rowno)->where('stream',$id);
		
		if(!empty($data['ownership'])){
			$query = $query->where_in('affiliated_by',$data['ownership']);
		}
		if(!empty($data['courses'])){
			$this->db->group_start();
			foreach ($data['courses'] as $course) {	
				$query = $query->or_where("FIND_IN_SET('{$course}', course_offered) >",0);
            }
			$this->db->group_end();
		}
		if(!empty($data['approval'])){
			$this->db->group_start();
			foreach ($data['approval'] as $approval) {	
				$query = $query->or_where("FIND_IN_SET('{$approval}', approved_by) >",0);
            }
			$this->db->group_end();
		}
		if(!empty($data['state'])){
			$query = $query->where_in('state',$data['state']);
		}
		if(!empty($data['gender'])){
			$query = $query->where_in('gender',$data['gender']);
		}
		return $query->get($table)->result_array();
	}
	function getRecordsbyLimitWithoutPaginationForStream($table = '', $stream_id,$data){
		$query = $this->db->order_by('id', 'ASC')->where('stream',$stream_id);
		
		if(!empty($data['ownership'])){
			$query = $query->where_in('affiliated_by',$data['ownership']);
		}
		if(!empty($data['courses'])){
			$this->db->group_start();
			foreach ($data['courses'] as $course) {	
				$query = $query->or_where("FIND_IN_SET('{$course}', course_offered) >",0);
            }
			$this->db->group_end();
		}
		if(!empty($data['approval'])){
			$this->db->group_start();
			foreach ($data['approval'] as $approval) {
				$query = $query->where("FIND_IN_SET('{$approval}', approved_by) >",0);
            }
			$this->db->group_end();
		}
		if(!empty($data['state'])){
			$query = $query->where_in('state',$data['state']);
		}
		if(!empty($data['gender'])){
			$query = $query->where_in('gender',$data['gender']);
		}
		return $query->get($table)->result_array();
	}


	public function getSimilarColleges($collegeDetail){
		$similarCollege = [];
		if(!empty($collegeDetail)){
			$courseIds = explode(',',$collegeDetail['course_offered']);
			$query = $this->db->select('*');
			if(!empty($courseIds)){
				$query = $query->where("FIND_IN_SET('{$courseIds[0]}', course_offered) >",0);
				$this->db->group_start();
				foreach ($courseIds as $course) {
					$query = $query->or_where("FIND_IN_SET('{$course}', course_offered) >",0);
				}
				$this->db->group_end();
			}
			$similarCollege = $query->limit(10)->get('tbl_college')->result_array();
		}
		return $similarCollege;
	}
}

?>
