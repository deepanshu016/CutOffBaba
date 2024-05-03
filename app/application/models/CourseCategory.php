<?php

class CourseCategory extends CI_Model {

	/* INSERT ANY RECORD IN TABLE */

	function insert($table = '', $data = []) {
		
		if (!empty($table) && count($data) > 0) {
			$q = $this->db->insert($table, $data);
			return ($q);
		} else {
			return (0);
		}
	} // insert end

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
	function getRecordssssss($table = '', $condition=[]){
		$categoryData = array();
		if(empty($condition)){
			$parentCategory = $this->db->select('*')->get($table)->result_array();
		}else{
			$parentCategory = $this->db->get_where($table,$condition)->result_array();
		}
		if(!empty($parentCategory)){
			foreach($parentCategory as $key=>$category){
				$categoryData[$key]['id'] = $category['id'];
				$categoryData[$key]['category_name'] = $category['category_name'];
				$categoryData[$key]['slug'] = $category['slug'];
				$categoryData[$key]['is_featured'] = $category['is_featured'];
				$categoryData[$key]['icon'] = $category['icon'];
				$categoryData[$key]['parent_id'] = $category['parent_id'];
				$categoryData[$key]['sub_category'] = $this->db->get_where($table,array('parent_id'=>$category['id']))->result_array();
				$categoryData[$key]['sub_categoryIds'] = $this->db->select('id')->where('parent_id',$category['id'])->get($table)->row_array();
				if(!empty($categoryData[$key]['sub_category'])){
					foreach($categoryData[$key]['sub_category'] as $keys=>$subcat){
						$categoryData[$key]['sub_category'][$keys]['id'] = $subcat['id'];
						$categoryData[$key]['sub_category'][$keys]['category_name'] = $subcat['category_name'];
						$categoryData[$key]['sub_category'][$keys]['slug'] = $subcat['slug'];
						$categoryData[$key]['sub_category'][$keys]['is_featured'] = $subcat['is_featured'];
						$categoryData[$key]['sub_category'][$keys]['icon'] = $subcat['icon'];
						$categoryData[$key]['sub_category'][$keys]['parent_id'] = $subcat['parent_id'];
						$categoryData[$key]['sub_category'][$keys]['sub_sub_category'] = $this->db->get_where($table,array('parent_id'=>$subcat['id']))->result_array();
					}
				}
			}
		}
		return $categoryData;
	}
	function getCategoriesForFeatured($table = '', $condition=[]){
		$finalCategoryList = [];
		$finalsCategoryList = [];
		if(empty($condition)){
			$category = $this->db->select('*')->get($table)->result_array();
		}else{
			$category = $this->db->get_where($table,$condition)->result_array();
		}
		
		if(!empty($category)){
			foreach($category as $key=>$category){
				$finalCategoryList[$key]['sub_category'] = [];
				array_push($finalCategoryList[$key]['sub_category'],$category['id']);
				$finalCategoryList[$key]['id'] = $category['id'];
				$finalCategoryList[$key]['category_name'] = $category['category_name'];
				$finalCategoryList[$key]['slug'] = $category['slug'];
				$finalCategoryList[$key]['is_featured'] = $category['is_featured'];
				$finalCategoryList[$key]['icon'] = $category['icon'];
				$finalCategoryList[$key]['parent_id'] = $category['parent_id'];
				$finalCategoryList[$key]['status'] = $category['status'];
				$finalCategoryList[$key]['created_at'] = $category['created_at'];
				$finalCategoryList[$key]['updated_at'] = $category['updated_at'];
				$sub_category = $this->db->select("*")->where_in('parent_id',$category['id'])->get($table)->result_array();
				if(!empty($sub_category)){
					foreach($sub_category as $subcat){
						array_push($finalCategoryList[$key]['sub_category'],$subcat['id']);
					}
				}
			}
		}
		if(!empty($finalCategoryList)){
			foreach($finalCategoryList as $keys=>$final){
				if(!empty($final['sub_category'])){
					$courseCount = $this->db->select('*')->where_in('category_id',$final['sub_category'])->get('tbl_course')->num_rows();
					if($courseCount > 0){
						array_push($finalsCategoryList,$final);
					}
				}
			}
		}
		return $finalsCategoryList;
	}
	function getLatestCourses(){
		if(empty($condition)){
			return $this->db->select('*')->get($table)->result_array();
		}else{
			return $this->db->get_where($table,$condition)->result_array();
		}
	}
	function getRecordsss($table = '', $condition=[]){
		if(empty($condition)){
			$parentIds = array();
			$subQuery = $this->db->select('id')->where('parent_id',NULL)->get($table)->result_array();
			if(!empty($subQuery)){
				foreach($subQuery as $query){
					array_push($parentIds,$query['id']);
				}
				$dat =  $this->db->select("*")->where_in('parent_id',$parentIds)->get($table)->result_array();
			}
			echo "<pre>";
			print_r($dat); die;
			//return $this->db->select('*')->get($table)->result_array();
		}else{
			return $this->db->get_where($table,$condition)->result_array();
		}
	}
	function deleteRecord($table = '', $condition) {
		$q = $this->db->where($condition)->delete($table);
		return ($this->db->affected_rows());
	}
	function getAllLevelCategories($table='',$slug){
		$parentCategory = $this->db->select('id')->where('slug',$slug)->get($table)->result_array();
		$allCategory = array();
		if(!empty($parentCategory)){
			foreach($parentCategory as $parent){
				array_push($allCategory,$parent['id']);
			}
			$secondCategory = $this->db->select('id')->where_in('parent_id',$allCategory)->get($table)->result_array();

			if(!empty($secondCategory)){
				foreach($secondCategory as $second){
					array_push($allCategory,$second['id']);
				}
			}
			$thirdCategory = $this->db->select('id')->where_in('parent_id',$allCategory)->get($table)->result_array();
			if(!empty($thirdCategory)){
				foreach($thirdCategory as $third){
					array_push($allCategory,$third['id']);
				}
			}
		}
		return array_unique($allCategory);

	}
}

?>
