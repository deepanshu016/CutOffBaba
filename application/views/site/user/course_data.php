<div class="accordion accordion-flush" id="faqlist">
<?php
  if(!empty($coursesList)){
    foreach($coursesList as $key=>$course){ 
        if(!empty($course['category_data'])){
            $userPreferences = $this->db->select('*')->from('tbl_user_course_preferences')->where('user_id',$this->session->userdata('user')['id'])->where('course_id',$course['id'])->get()->result_array();
?>
    <div class="card">
        <h5 class="card-header"><?= $course["course"] ?><input type="hidden" class="form-control" name="profile[course_data][<?=$key; ?>][course_id]" value="<?= @$course['id'];?>"></h5>
        <div class="card-body">
            <div class="row">
                <?php 
                    if(!empty($levelData)){
                        foreach($levelData as $keys=>$level) { ?>
                        <div class="col-md-6 col-12 input-group mb-3 category-wrapper">
                            <select class="form-control raffss get-sub-category" data-key="<?= $key; ?>" data-keys="<?= $keys; ?>"  name="profile[course_data][<?=$key; ?>][category][<?=$keys; ?>][category_id]" id="">
                                <option value="">Select Central Category</option>
                                <?php 
                                    $categoryData = $this->db->select('*')->from('tbl_user_course_preferences')->where(['user_id'=>$user['id'],'course_id'=>$course['id']])->get()->row_array();

                                    foreach($course['category_data'] as $category) { 
                                        if (!empty($categoryData) && $categoryData['category_id'] == $category['id']) {
                                            $selected = 'selected';
                                        } else {
                                            $selected = '';
                                        }  
                                ?>
                                    <option value="<?= $category['id']; ?>" <?= $selected ?>><?= $category['category_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6 col-12  input-group mb-3 sub-category-data">
                           <?php
                                $subCategoryDatas = $this->db->select('*')->from('tbl_sub_category')->where(['category_id'=>$categoryData['category_id']])->get()->result_array();            
                           ?>
                            <select class="form-control raffss "  name="profile[course_data][<?=$key; ?>][category][<?=$keys; ?>][sub_category_id]" id="">
                                <option value="">Select State Category</option>
                                <?php 
                                    $subCategoryData = $this->db->select('*')->from('tbl_user_course_preferences')->where('sub_category_id','!=',NULL)->where(['user_id'=>$user['id'],'course_id'=>$course['id']])->get()->row_array();
                                    foreach($subCategoryDatas as $sub) { 
                                        if (!empty($subCategoryData) && $subCategoryData['sub_category_id'] == $sub['id']) {
                                            $selected = 'selected';
                                        } else {
                                            $selected = '';
                                        }  
                                ?>
                                    <option value="<?= $sub['id']; ?>" <?= $selected ?>><?= $sub['sub_category_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                <?php } } ?>
                    <div class="col-md-6 col-12  input-group mb-3 category-wrapper">
                        <select class="form-control raffss get-domicile-main-category" data-key="<?= $key; ?>"  name="profile[course_data][<?=$key; ?>][domicile_category_id][state_id]" id="">
                            <option value="">Select Domicile Central</option>
                            <?php 
                                foreach($domicileCategory as $domicile) { ?>
                                    <option value="<?= $domicile['id']; ?>"><?= $domicile['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6 col-12   input-group mb-3 category-wrapper domicile-main-category-data">
                            <?php
                                $userPreferenceDomiciliSubCategory = $this->db->select('*')->from('tbl_user_course_preferences')->where('domicile_state_category_id','>',0)->where(['user_id'=>$user['id'],'course_id'=>$course['id']])->get()->row_array();
                               
                                $domicileSubCategoryDatas = $this->db->select('*')->from('tbl_sub_category')->where(['category_id'=>$userPreferenceDomiciliSubCategory['domicile_state_category_id']])->get()->result_array();            
                           ?>
                            <select class="form-control raffss get-domicile-sub-category" data-key="<?= $key?>" name="profile[course_data][<?=$key; ?>][domicile_category_id][domicile_state_category_id]" id="">
                                <option value="">Select Domicile State Category</option>
                                <?php 
                                    $domicileSubCategoryData = $this->db->select('*')->from('tbl_user_course_preferences')->where('sub_category_id','!=',NULL)->where(['user_id'=>$user['id'],'course_id'=>$course['id']])->get()->row_array();
                                    foreach($domicileSubCategoryDatas as $subsub) { 
                                        if (!empty($domicileSubCategoryData) && $domicileSubCategoryData['domicile_state_sub_category_id'] == $subsub['id']) {
                                            $selected = 'selected';
                                        } else {
                                            $selected = '';
                                        }  
                                ?>
                                    <option value="<?= $subsub['id']; ?>" <?= $selected ?>><?= $subsub['sub_category_name']; ?></option>
                                <?php } ?>
                            </select>
                    </div>
                    <div class="col-md-12 col-12   input-group mb-3 get-domicile-subs-category"></div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } } ?>     

    
</div>