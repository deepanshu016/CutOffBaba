<?php

class User extends CI_Model {

	/* INSERT ANY RECORD IN TABLE */
	protected $table = 'tbl_users';
	function insert($table = '', $data = []) {
		
		if (!empty($table) && count($data) > 0) {
			$q = $this->db->insert($table, $data);
			$q = $this->db->insert_id();
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
	function getRecords($table = '', $condition){
		return $this->db->get_where($table,$condition)->result_array();
	}
	function deleteRecord($table = '', $condition) {
		$q = $this->db->where($condition)->delete($table);
		return ($this->db->affected_rows());
	}
	public function studentList() {
        $this->db->select(array('s.first_name', 's.middle_name', 's.last_name', 's.email', 's.mobile', 's.user_type', 's.image', 's.password','s.status'));
        $this->db->from('tbl_users as s');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_count($type){
		return $this->db->select('*')->where('user_type',$type)->get($this->table)->num_rows();
    }
    function getPaginatedData($type,$limit,$page){
    	$this->db->limit($limit, $page);
        $query = $this->db->where(array('user_type'=>$type))->get($this->table);
        return $query->result_array();
    }
}

?>
