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
	function insertBulk($table='',$data){
		return $this->db->insert_batch($table, $data);
	}
	function UploadBulk($table='',$data){
		$this->db->delete($table);
		return $this->db->insert_batch($table, $data);
	}
	function singleRecord($table = '', $condition){
		return $this->db->get_where($table,$condition)->row_array();
	}
	function updateRecord($table = '', $condition,$data= []) {
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
	function getRecordsLike($table = '', $condition){
		return $this->db->select('*')->from($table)->like('blog_type',$condition)->get()->result_array();
	}
	function deleteRecord($table = '', $condition) {
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
}

?>
