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
}

?>
