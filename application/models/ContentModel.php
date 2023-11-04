<?php

class ContentModel extends CI_Model {

	/* INSERT ANY RECORD IN TABLE */

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
		if(empty($condition)){
			return $this->db->select('*')->get($table)->result_array();
		}else{
			return $this->db->get_where($table,$condition)->result_array();
		}
	}
	function getLatestCoursesWithLimit($table = '', $condition=[]){
		if(empty($condition)){
			return $this->db->order_by('id','DESC')->limit(6)->select('*')->get($table)->result_array();
		}else{
			return $this->db->order_by('id','DESC')->limit(6)->get_where($table,$condition)->result_array();
		}
	}
	function deleteRecord($table = '', $condition) {
		$q = $this->db->where($condition)->delete($table);
		return ($this->db->affected_rows());
	}
	function getAllCoursesCategoryWise($table = '',$categoryIds){
		return $this->db->select('*')->where_in('category_id',$categoryIds)->where(array('is_verified'=>1))->get($table)->result_array();
	}
}

?>
