<?php

class InstituteModel extends CI_Model {

	/* INSERT ANY RECORD IN TABLE */
	protected $table = 'tbl_institutes';
	function insert($table = '', $data = []) {
		
		if (!empty($table) && count($data) > 0) {
			$q = $this->db->insert($table, $data);
			return ($q);
		} else {
			return (0);
		}
	} 
	// insert end
	function singleRecord($table = '', $condition){
		return $this->db->get_where($table,$condition)->row_array();
	}
	function updateRecord($table = '', $condition,$data= []) {
		$q = $this->db->set($data)->where($condition)->update($table);
		return ($this->db->affected_rows());
	}
	function getRecords($table = '', $condition=[]){
		if(!empty($condition)){
			return $this->db->select('*')->get($table)->result_array();
		}else{
			return $this->db->get_where($table,$condition)->result_array();
		}
	}
	function getRecordsWithLimit($table = '', $limit=''){
		if($limit == ''){
			return $this->db->select('*')->get($table)->result_array();
		}else{
			return $this->db->select('*')->get($table)->limit($limit,1)->result_array();
		}
	}
	function deleteRecord($table = '', $condition) {
		$q = $this->db->where($condition)->delete($table);
		return ($this->db->affected_rows());
	}
    function get_count(){
		return $this->db->select('*')->get($this->table)->num_rows();
    }
    function getPaginatedData($limit,$page){
    	$this->db->limit($limit, $page);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
}

?>
