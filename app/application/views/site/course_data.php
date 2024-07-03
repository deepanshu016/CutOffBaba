<div class="accordion accordion-flush" id="faqlist">
<?php
  if(!empty($coursesList)){
    foreach($coursesList as $key=>$course){ 
        if(!empty($course['category_data'])){
            $userPreferences = $this->db->select('*')->from('tbl_user_course_preferences')->where('user_id',$this->session->userdata('user')['id'])->where('course_id',$course['id'])->get()->result_array();
?>
    <div class="accordion-item">
    <input type="hidden" name="course_id" class="course_id" value="<?= $course['id']; ?>">
        <h2 class="accordion-header">
            <button class="accordion-buttonCss collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-<?= $key; ?>">
           <?= $course["course"] ?>
           <input type="hidden" class="form-control" name="profile[course_data][<?=$key; ?>][course_id]" value="<?= @$course['id'];?>">
            </button>
        </h2>
        <div id="faq-content-<?= $key; ?>" class="accordion-collapse collapse <?= (empty($userPreferences)) ? 'show' : ''; ?>" data-bs-parent="#faqlist">
            <div class="accordion-body fcXvcs">
            <div class="accordion" id="accordionExample" style="background-color:#141414!important;">
                <div class="accordion-item"> 
                <?php 
                    if(!empty($levelData)){
                        foreach($levelData as $keys=>$level) { 
                            $categoryDatas = $this->db->select('*')->from('tbl_user_course_preferences')->where(['user_id'=>$user['id'],'course_id'=>$course['id']])->get()->row_array();       
                    ?>
                        <div class="input-group mb-3 category-wrapper">
                            <span class="input-group-text appendCXCss raffss" id="basic-addon1"> <img class="img-fluid useHsih" src="<?=base_url('assets/site/img/exmas.png')?>" alt=""> </span>
                            <select class="form-control raffss get-sub-category" data-key="<?= $key; ?>" data-keys="<?= $keys; ?>"  name="profile[course_data][<?=$key; ?>][category][<?=$keys; ?>][category_id]" id="" <?= (!empty($categoryDatas) && $categoryDatas['category_id'] != '0')?'disabled':'';?>>
                                <option value="">Select Central Category</option>
                                <?php 
                                    foreach($course['category_data'] as $category) { 
                                        $categoryData = $this->db->select('*')->from('tbl_user_course_preferences')->where(['user_id'=>$user['id'],'category_id'=>$category['id'],'course_id'=>$course['id']])->get()->row_array();
                                        if (!empty($categoryData)) {
                                            $selected = 'selected';
                                        } else {
                                            $selected = '';
                                        }  
                                ?>
                                    <option value="<?= $category['id']; ?>" <?= $selected ?>><?= $category['category_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-group mb-3 sub-category-data"></div>
                <?php } } ?>
                    <div class="input-group mb-3 category-wrapper">
                    <?php
                             $domicileCategoryDatas = $this->db->select('*')->from('tbl_user_course_preferences')->where(['user_id'=>$user['id'],'course_id'=>$course['id']])->get()->row_array();
                        ?>
                        <span class="input-group-text appendCXCss raffss" id="basic-addon1"> <img class="img-fluid useHsih" src="<?=base_url('assets/site/img/exmas.png')?>" alt=""> </span>
                        <select class="form-control raffss get-domicile-main-category" data-key="<?= $key; ?>"  name="profile[course_data][<?=$key; ?>][domicile_category_id][state_id]" id="" <?= (!empty($domicileCategoryDatas) && $domicileCategoryDatas['state_id'] != '0')?'disabled':'';?>>
                            <option value="">Select Domicile Central</option>
                            <?php 
                                foreach($domicileCategory as $domicile) { 
                                    
                                    $domicileCategoryData = $this->db->select('*')->from('tbl_user_course_preferences')->where(['user_id'=>$user['id'],'state_id'=>$domicile['id'],'course_id'=>$course['id']])->get()->row_array();
                                    if (!empty($domicileCategoryData)) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    }
                                    ?>
                                    <option value="<?= $domicile['id']; ?>" <?=$selected; ?>><?= $domicile['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="input-group mb-3 category-wrapper domicile-main-category-data"></div>
                    <div class="input-group mb-3 get-domicile-subs-category"></div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } } ?>     

    
</div>