<?php 
									
									$branchids=$this->db->select('distinct(branch_id)')->where('college_id',$collegeDetail['id'])->where('course_id',$courseid['course_id'])->get('tbl_cutfoff_marks_data')->result_array(); 
									
									foreach($branchids as $branchid){
								?>
									<table class="table table-bordered text-center ">
										<tr>
											<th>Category</th>
											<th>Round 1</th>
											<th>Round 2</th>
											<th>Round 3</th>
											<th>Round 4</th>
											<th>Round 5</th>
										</tr>
										<tr>
											<th></th>
											<th><table class="table table-bordered">
												<tr>
													<th>AIR</th>
													<th>SR</th>
													<th>Marks</th>
												</tr>
											</table></th><th><table class="table table-bordered">
												<tr>
													<th>AIR</th>
													<th>SR</th>
													<th>Marks</th>
												</tr>
											</table></th><th><table class="table table-bordered">
												<tr>
													<th>AIR</th>
													<th>SR</th>
													<th>Marks</th>
												</tr>
											</table></th><th><table class="table table-bordered">
												<tr>
													<th>AIR</th>
													<th>SR</th>
													<th>Marks</th>
												</tr>
											</table></th><th><table class="table table-bordered">
												<tr>
													<th>AIR</th>
													<th>SR</th>
													<th>Marks</th>
												</tr>
											</table></th>
											
										</tr>
										<?php
										$userData = $this->session->userdata('user');
										$courseSubCategoryPreferences = $this->db->select('sub_category_id')->where('user_id',$userData['id'])->group_by('sub_category_id')->get('tbl_user_course_preferences')->result_array();
										$userCentralSubCategory = [];
										if(!empty($courseSubCategoryPreferences)){
											foreach($courseSubCategoryPreferences as $sub){
												$userCentralSubCategory[] = $sub['sub_category_id'];
											}
										}
										$catids=$this->db
											->select('distinct(category_type)')
											->where_in('category_type',$userCentralSubCategory)
											->where('year',$year)
											->where('college_id',$collegeDetail['id'])
											->where('course_id',$courseid['course_id'])
											->where('branch_id',$branchid['branch_id'])
											->get('tbl_cutfoff_marks_data')
											->result_array(); 
										// echo $this->db->last_query();
											
										if(!empty($catids)){
										foreach($catids as $catid){
											$branchdetaildata=$this->db->select('*')->where('id',$catid['category_type'])->get('tbl_sub_category')->result_array();
											$R1=$this->db->select('*')->where('college_id',$collegeDetail['id'])->where('course_id',$courseid['course_id'])->where('branch_id',$branchid['branch_id'])->where('category_type',$catid['category_type'])->where('year',$year)->where('round_one',1)->get('tbl_cutfoff_marks_data')->result_array();
											
									
											$R2=$this->db->select('*')->where('college_id',$collegeDetail['id'])->where('course_id',$courseid['course_id'])->where('branch_id',$branchid['branch_id'])->where('category_type',$catid['category_type'])->where('year',$year)->where('round_two',1)->get('tbl_cutfoff_marks_data')->result_array(); 
											$R3=$this->db->select('*')->where('college_id',$collegeDetail['id'])->where('course_id',$courseid['course_id'])->where('branch_id',$branchid['branch_id'])->where('category_type',$catid['category_type'])->where('year',$year)->where('round_three',1)->get('tbl_cutfoff_marks_data')->result_array(); 
											$R4=$this->db->select('*')->where('college_id',$collegeDetail['id'])->where('course_id',$courseid['course_id'])->where('branch_id',$branchid['branch_id'])->where('category_type',$catid['category_type'])->where('year',$year)->where('round_four',1)->get('tbl_cutfoff_marks_data')->result_array(); 
											$R5=$this->db->select('*')->where('college_id',$collegeDetail['id'])->where('course_id',$courseid['course_id'])->where('branch_id',$branchid['branch_id'])->where('category_type',$catid['category_type'])->where('year',$year)->where('round_five',1)->get('tbl_cutfoff_marks_data')->result_array(); 
										?>
											<tr>
												<th><?=$branchdetaildata[0]['sub_category_name'];?></th>
												<th><table class="table table-bordered">
													<?php if (count($R1)>0): ?>
													<tr>
														<th><?= $year; ?><?=$R1[0]['air']!=""?$R1[0]['air']:"0";?></th>
														<th><?=$R1[0]['sr']!=""?$R1[0]['sr']:"0";?></th>
														<th><?=$R1[0]['marks']!=""?$R1[0]['marks']:"0";?></th>
													</tr>
													<?php endif ?>
												</table></th>
												<th><table class="table table-bordered">
													<?php if (count($R2)>0): ?>
													<tr>
														<th><?=$R2[0]['air']!=""?$R2[0]['air']:"0";?></th>
														<th><?=$R2[0]['sr']!=""?$R2[0]['sr']:"0";?></th>
														<th><?=$R2[0]['marks']!=""?$R2[0]['marks']:"0";?></th>
													</tr>
													<?php endif ?>
												</table></th><th><table class="table table-bordered">
													<?php if (count($R3)>0): ?>
													<tr>
														<th><?=$R3[0]['air']!=""?$R3[0]['air']:"0";?></th>
														<th><?=$R3[0]['sr']!=""?$R3[0]['sr']:"0";?></th>
														<th><?=$R3[0]['marks']!=""?$R3[0]['marks']:"0";?></th>
													</tr>
													<?php endif ?>
												</table></th><th><table class="table table-bordered">
													<?php if (count($R4)>0): ?>
													<tr>
														<th><?=$R4[0]['air']!=""?$R4[0]['air']:"0";?></th>
														<th><?=$R4[0]['sr']!=""?$R4[0]['sr']:"0";?></th>
														<th><?=$R4[0]['marks']!=""?$R4[0]['marks']:"0";?></th>
													</tr>
													<?php endif ?>
												</table></th><th><table class="table table-bordered">
													<?php if (count($R5)>0): ?>
													<tr>
														<th><?=$R5[0]['air']!=""?$R5[0]['air']:"0";?></th>
														<th><?=$R5[0]['sr']!=""?$R5[0]['sr']:"0";?></th>
														<th><?=$R5[0]['marks']!=""?$R5[0]['marks']:"0";?></th>
													</tr>
													<?php endif ?>
												</table></th>
												
											</tr>
										<?php } }?>
										<!-- <?php

										// $catids=$this->db->select('distinct(cat_id)')->where('college_id',$collegeDetail['id'])->where('course_id',$courseid['course_id'])->where('branch_id',$branchid['branch_id'])->get('tbl_cutfoff_marks_data')->result_array(); 
										// foreach($catids as $catid){
										// 	$subcategorydatas=$this->db->select('distinct(category_type)')->where('college_id',$collegeDetail['id'])->where('course_id',$courseid['course_id'])->where('branch_id',$branchid['branch_id'])->where('cat_id',$catid['cat_id'])->get('tbl_cutfoff_marks_data')->result_array(); 
										// 	print_r($subcategorydatas);
										// }
									}
									?> -->
								</table>