<?php

class StudentReview extends CI_Model {

	/* INSERT ANY RECORD IN TABLE */

	function insert($table = '', $data = []) {
		
		if (!empty($table) && count($data) > 0) {
			$q = $this->db->insert($table, $data);
			return ($q);
		} else {
			return (0);
		}
	} // insert end

	function singleRecord($table = '', $condition = []){
		if(!empty($condition)){
			return $this->db->get_where($table,$condition)->row_array();
		}else{
			return $this->db->select('*')->get($table)->row_array();
		}
	}
	function updateRecord($table = '', $condition,$data= []) {
		$q = $this->db->set($data)->where($condition)->update($table);
		return ($this->db->affected_rows());
	}
	function getRecords($table = '', $condition=[]){
		if(!empty($condition)){
			return $this->db->get_where($table,$condition)->result_array();
		}else{
			return $this->db->select('*')->get($table)->result_array();
		}
	}
	function deleteRecord($table = '', $condition) {
		$q = $this->db->where($condition)->delete($table);
		return ($this->db->affected_rows());
	}
	function getStudentReviewsList(){
		$query = $this->db->select('sr.id,sr.student_id,sr.course_id,sr.rating,sr.review,sr.status,sr.review_type,sr.video_id,sr.created_at,sr.updated_at,c.course_title')->from('tbl_student_review as sr')->join('tbl_course as c', 'sr.course_id = c.id')->get();
		return $query->result_array();
	}
	function getStudentReviews(){
		$query = $this->db->select('sr.id,sr.student_id,sr.course_id,sr.rating,sr.review,sr.status,sr.review_type,sr.video_id,sr.created_at,sr.updated_at,c.course_title')->from('tbl_student_review as sr')->join('tbl_course as c', 'sr.course_id = c.id')->where('review_type','text')->get();
		return $query->result_array();
	}
	function getStudentReviewsForFront(){
		$query = $this->db->select('sr.id,sr.student_id,sr.course_id,sr.rating,sr.review,sr.status,sr.review_type,sr.video_id,sr.created_at,sr.updated_at,c.course_title')->from('tbl_student_review as sr')->join('tbl_course as c', 'sr.course_id = c.id')->get();
		return $query->result_array();
	}
	function getStudentReviewsForFrontTypeWise($type){
		$query = $this->db->select('sr.id,sr.student_id,sr.course_id,sr.rating,sr.review,sr.status,sr.review_type,sr.video_id,sr.created_at,sr.updated_at,c.course_title')->from('tbl_student_review as sr')->join('tbl_course as c', 'sr.course_id = c.id')->where('review_type',$type)->get();
		return $query->result_array();
	}
	function averageReview($table='', $condition = []){
		return $rating = $this->db->select('AVG(rating) avg_rating')->where($condition)->get($table)->row_array();
	}
	function getRatingPercentage($table='', $condition = []){
		return $this->db->select('*')->where($condition)->get($table)->num_rows();
	}
}

?>
