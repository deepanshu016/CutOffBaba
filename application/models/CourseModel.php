<?php

class CourseModel extends CI_Model {

	/* INSERT ANY RECORD IN TABLE */
	protected $table = 'tbl_course';
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
	function searchDataWithLike($table = '',$searchString){
		return $this->db->select('*')->from($table)->like("course_title",$searchString,'both')->get()->result_array();
	}
	function getRecordsForFilter($table = '',$search_input,$instructorValue,$levelValue,$priceValue,$category){
		$query =  $this->db->select('*');
		if(!empty($instructorValue)){
			$query =  $query->where_in('user_id',$instructorValue);
		}
		if(!empty($levelValue)){
			$query =  $query->where_in('level',$levelValue);
		}
		if($search_input != ''){
			$query = $query->like("course_title",$search_input,'both');
		}
		if(!empty($priceValue)){
			if(in_array('All', $priceValue)){
				$query = $query->where('is_course_free',1)->or_where('is_course_free',NULL);
			}
			if(in_array('Free', $priceValue)){
				$query = $query->where('is_course_free',1);
			}
			if(in_array('Paid', $priceValue)){
				$query = $query->where('is_course_free',NULL);
			}
		}
		if(!empty($category)){
			$query =  $query->where_in('category_id',$category);
		}
		return $query->get($table)->result_array();
	}
	function get_count($condition) {
		if(empty($condition)){
        	return $this->db->count_all($this->table);
		}else{
			return $this->db->select('*')->where_in('category_id',$condition)->get($this->table)->num_rows();
		}
    }
    function getPaginatedData($limit,$page){
    	$this->db->limit($limit, $page);
        $query = $this->db->order_by('is_featured','DESC')->where(array('is_verified'=>1))->get($this->table);
        return $query->result_array();
    }
    function getAllCoursesCategoryWisePaginated($limit,$page,$categoryIds){
    	if(empty($categoryIds)){
    		$this->db->limit($limit, $page);
	        $query = $this->db->where(array('is_verified'=>1))->get($this->table);
	        return $query->result_array();
    	}else{
    		return $this->db->select('*')->where_in('category_id',$categoryIds)->where(array('is_verified'=>1))->limit($limit, $page)->get($this->table)->result_array();
    	}
	}
}

?>
