<?php

class MasterModel extends CI_Model {

	/* INSERT ANY RECORD IN TABLE */
	function insert_batch($table = '', $data = []) {
		return  $this->db->insert_batch($table, $data);
//		debugger($this->db->queries);
	}
	function insert($table = '', $data = []) {
		
		if (!empty($table) && count($data) > 0) {
			$q = $this->db->insert($table, $data);
			return ($q);
		} else {
			return (0);
		}
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
}

?>
