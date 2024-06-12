<?php $this->load->view('site/header');?>
<style>
    .sr-only {
        display: none !important;
    }
</style>
<div class="sub_header_in sticky_header">
    <div class="container">
        <h1>
            <?= @$streamDetails['stream'];?>
        </h1>
    </div>
</div>
<main>
    <div class="container-fluid my-md-3 ps-md-3 bg-light pb-5 mb-5">
        <?php if(!empty($courseLists)) { 
      foreach($courseLists as $course) { ?>
        <div class="card mb-3">
        <div class=" card-header d-flex justify-content-between p-3 bg-white">
            <div>
                <h5 class="card-title">
                    <?= $course['course']; ?>
                </h5>
                <p class="card-text nop">
                    <?= $course['course_full_name']; ?>
                </p>

            </div>
            <div><a class="btn btn-primary" href="<?= base_url('course').'/'.$course['id']; ?>">Explore More  <i class="fa fa-angle-right"></i> </a>
            </div>
        </div>
            <div class="row">
                <div class="col">
                    <div class="card shaDo noHis">
                        <div class="card-body mbbsCss">
                            <a href="<?= base_url('course').'/'.$course['id']; ?>">
                                <h5 class="card-title smTxt">About
                                    <?=  $course['course']; ?>
                                </h5>
                                
                            </a>
                        </div>
                    </div>
                    <div class="card shaDo noHis">
                        <div class="card-body mbbsCss">
                            <a href="<?= base_url('course-with-state-wise-college').'/'.$course['id'].'/'.'state-wise-college'; ?>">
                                <h5 class="card-title smTxt">State Wise Colleges</h5>
                                
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shaDo noHis">
                        <div class="card-body mbbsCss">
                            <a href="<?= base_url('college-info').'/branch'.'/'.$course['id']; ?>">
                                <h5 class="card-title smTxt">Branches & Seats</h5>
                                
                            </a>
                        </div>
                    </div>
                    <div class="card shaDo noHis">
                        <div class="card-body mbbsCss">
                            <a href="<?= base_url('college-info').'/fee-expenses'.'/'.$course['id']; ?>">
                                <h5 class="card-title smTxt">Fees & Expenses</h5>
                                
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shaDo noHis">
                        <div class="card-body mbbsCss">
                            <a href="<?= base_url('college-info').'/clinic-exposure'.'/'.$course['id']; ?>">
                                <h5 class="card-title smTxt">Clinic Exposure</h5>
                                
                            </a>
                        </div>
                    </div>
                    <div class="card shaDo noHis">
                        <div class="card-body mbbsCss">
                            <a href="<?= base_url('college-info').'/service-bond-rules'.'/'.$course['id']; ?>">
                                <h5 class="card-title smTxt">Service & Bond Rules</h5>
                                
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shaDo noHis">
                        <div class="card-body mbbsCss">
                            <a href="<?= base_url('college-info').'/reviews'.'/'.$course['id']; ?>">
                                <h5 class="card-title smTxt">College Reviews</h5>
                                
                            </a>
                        </div>
                    </div>
                    <div class="card shaDo noHis">
                        <div class="card-body mbbsCss">
                            <a href="<?= base_url('college-info').'/central-cutoff'.'/'.$course['id']; ?>">
                                <h5 class="card-title smTxt">Central Cutoff</h5>
                                
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shaDo noHis">
                        <div class="card-body mbbsCss">
                            <a href="<?= base_url('college-info').'/reviews'.'/'.$course['id']; ?>">
                                <h5 class="card-title smTxt">College Reviews</h5>
                                
                            </a>
                        </div>
                    </div>
                    <div class="card shaDo noHis">
                        <div class="card-body mbbsCss">
                            <a href="<?= base_url('college-info').'/state-cutoff'.'/'.$course['id']; ?>">
                                <h5 class="card-title smTxt">State Cutoff</h5>
                                
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shaDo noHis">
                        <div class="card-body mbbsCss">
                            <a href="<?= base_url('college-info').'/cutoff-comparison'.'/'.$course['id']; ?>">
                                <h5 class="card-title smTxt">Cutoff Comparison</h5>
                                
                            </a>
                        </div>
                    </div>
                    <div class="card shaDo noHis">
                        <div class="card-body mbbsCss">
                            <a href="<?= base_url('college-info').'/faq'.'/'.$course['id']; ?>">
                                <h5 class="card-title smTxt">FAQs</h5>
                                
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shaDo noHis">
                        <div class="card-body mbbsCss">
                            <a href="<?= base_url('college-info').'/college-predictor'.'/'.$course['id']; ?>">
                                <h5 class="card-title smTxt">College Predictor</h5>
                                
                            </a>
                        </div>
                    </div>
                    <div class="card shaDo noHis">
                        <div class="card-body mbbsCss">
                            <a href="<?= base_url('college-info').'/college-gallery'.'/'.$course['id']; ?>">
                                <h5 class="card-title smTxt">College Gallery</h5>
                                
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shaDo noHis">
                        <div class="card-body mbbsCss">
                            <a href="<?= base_url('college-info').'/college-updates'.'/'.$course['id']; ?>">
                                <h5 class="card-title smTxt">Counselling Updates</h5>
                                
                            </a>
                        </div>
                    </div>
                    <div class="card shaDo noHis">
                        <div class="card-body mbbsCss">
                            <a href="<?= base_url('college-info').'/recommended-colleges'.'/'.$course['id']; ?>">
                                <h5 class="card-title smTxt">Recommended College</h5>
                                
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } } ?>
    </div>
    <div class="container margin_60_35">
        <div class="row">
            <aside class="col-lg-3" id="sidebar">
                <div id="filters_col">
                    <a data-bs-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt">Filters </a>
                    <div class="collapse show" id="collapseFilters">
                        <div class="filter_type mb-3">
                            <?php foreach($courseByStreams[0]['degreetype'] as $degreetype){ 
									?>
                            <h6>
                                <?=$degreetype['degreetype'];?>
                            </h6>
                            <ul>
                                <?php $i=0;foreach($degreetype['courses'] as $courses){ 
											$courseCollegeCount = $this->db->select('*')->from('tbl_college')->where("FIND_IN_SET(" . $courses['id'] . ", course_offered) > 0", NULL, FALSE)->where('stream',$streamDetails['id'])->get()->num_rows();	
										?>
                                <?php $count=$this->db->select('*')->where('course_offered like',"%".$courses['id']."%")->get('tbl_college')->num_rows(); 
											if($count>0){?>
                                <li>
                                    <a href="<?=base_url('course/').$courses['id'];?>"><label class="container_check"><?=$courses['course'];?> ( <?=$courseCollegeCount;?> Colleges )
												  <input type="checkbox" name="courses[]" value="<?= $courses['id']; ?>"  class="filter_checkbox">
												  <span class="checkmark"></span>
												</label></a>
                                </li>
                                <?php }} ?>
                            </ul>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div id="filters_col">
                    <div class="collapse show" id="collapseFilters">
                        <h6>Affiliation</h6>
                        <div class="filter_type">

                            <ul>
                                <?php if(!empty($ownerList)) { 
										foreach($ownerList as $owner){ 
										$ownerCollegeCount = $this->db->select('*')->from('tbl_college')->where('stream',$streamDetails['id'])->where("FIND_IN_SET(" . $owner['id'] . ", affiliated_by) > 0", NULL, FALSE)->get()->num_rows();	
									?>
                                <li>
                                    <label class="container_check"><?= $owner['title']; ?> <small><?= $ownerCollegeCount; ?></small>
										  <input type="checkbox" name="ownership[]" value="<?= $owner['id']; ?>"  class="filter_checkbox">
										  <span class="checkmark"></span>
										</label>
                                </li>
                                <?php } } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="filters_col">
                    <div class="collapse show" id="collapseFilters">
                        <div class="filter_type">
                            <h6>Approvals</h6>
                            <ul>
                                <?php if(!empty($approvalList)) { 
										foreach($approvalList as $approval){ 
											$approvalCollegeCount = $this->db->select('*')->from('tbl_college')->where('stream',$streamDetails['id'])->where("FIND_IN_SET(" . $approval['id'] . ", approved_by) > 0", NULL, FALSE)->get()->num_rows();	
									?>
                                <li>
                                    <label class="container_check"><?= $approval['approval']; ?> <small><?= $approvalCollegeCount; ?></small>
										  <input type="checkbox" name="approval[]" value="<?= $approval['id']; ?>"  class="filter_checkbox">
										  <span class="checkmark"></span>
										</label>
                                </li>
                                <?php } } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="filters_col">
                    <div class="collapse show" id="collapseFilters">
                        <div class="filter_type">
                            <h6>Gender</h6>
                            <ul>
                                <?php if(!empty($genderList)) { 
										foreach($genderList as $gender){ 
											$genderCollegeCount = $this->db->select('*')->from('tbl_college')->where('stream',$streamDetails['id'])->where("gender_accepted", $gender['id'])->get()->num_rows();	
									?>
                                <li>
                                    <label class="container_check"><?= $gender['gender']; ?> <small><?= $genderCollegeCount; ?></small>
										  <input type="checkbox" name="gender[]" value="<?= $gender['id']; ?>"  class="filter_checkbox">
										  <span class="checkmark"></span>
										</label>
                                </li>
                                <?php } } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="filters_col">
                    <div class="collapse show" id="collapseFilters">
                        <div class="filter_type">
                            <h6>States</h6>
                            <ul>
                                <?php if(!empty($stateList)) { 
										foreach($stateList as $state){ 
											$stateCollegeCount = $this->db->select('*')->from('tbl_college')->where('stream',$streamDetails['id'])->where("state", $state['id'])->get()->num_rows();	
									?>
                                <li>
                                    <label class="container_check"><?= $state['name']; ?> <small><?= $stateCollegeCount; ?></small>
										  <input type="checkbox" name="state[]" value="<?= $state['id']; ?>" class="filter_checkbox">
										  <span class="checkmark"></span>
										</label>
                                </li>
                                <?php } } ?>
                            </ul>
                        </div>
                    </div>
                    <!--/collapse -->
                </div>
                <!--/filters col-->
            </aside>
            <!-- /aside -->

            <div class="col-lg-9">
                <div id='college_paginations'></div>
                <div id='paginations'></div>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('site/footer');?>
<script type='text/javascript'>
    $(function() {
        var url = "<?=base_url('college-detail'); ?>";
        var image_url = "<?=asset_url(); ?>";

        $('body').on('change', '.filter_checkbox', function(e) {
            var ownership = $("input[name='ownership[]']:checked").map(function() {
                return $(this).val();
            }).get();
            var approval = $("input[name='approval[]']:checked").map(function() {
                return $(this).val();
            }).get();
            var gender = $("input[name='gender[]']:checked").map(function() {
                return $(this).val();
            }).get();
            var state = $("input[name='state[]']:checked").map(function() {
                return $(this).val();
            }).get();
            var courses = $("input[name='courses[]']:checked").map(function() {
                return $(this).val();
            }).get();
            loadPagination(0, ownership, approval, gender, state, courses);
        });
        $('#paginations').on('click', 'a', function(e) {
            e.preventDefault();
            var ownership = $("input[name='ownership[]']:checked").map(function() {
                return $(this).val();
            }).get();
            var approval = $("input[name='approval[]']:checked").map(function() {
                return $(this).val();
            }).get();
            var gender = $("input[name='gender[]']:checked").map(function() {
                return $(this).val();
            }).get();
            var state = $("input[name='state[]']:checked").map(function() {
                return $(this).val();
            }).get();
            var courses = $("input[name='courses[]']:checked").map(function() {
                return $(this).val();
            }).get();
            var pageno = $(this).attr('data-ci-pagination-page');
            loadPagination(pageno, ownership, approval, gender, state, courses);
        });

        loadPagination(0);

        function loadPagination(pageno, ownership = '', approval = '', gender = '', state = '', courses = '') {
            $.ajax({
                url: '/get-college-data-by-stream/' + "<?=$streamDetails['id'];?>" + '/' + pageno,
                type: 'POST',
                data: {
                    ownership: ownership,
                    approval: approval,
                    gender: gender,
                    state: state,
                    courses: courses
                },
                dataType: 'json',
                success: function(response) {
                    $('#paginations').html(response.pagination);
                    createTable(response.html, response.row);
                }
            });
        }

        function createTable(result, sno) {
            console.log(result)
            $('#college_paginations').empty();
            $('#college_paginations').append(result);
        }
    });
</script>