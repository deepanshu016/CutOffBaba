<?php $this->load->view('admin/header'); ?>
<?php $this->load->view('admin/sidebar'); ?>
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
                            <?php if(empty($singleCourse)) { ?>
                              <li class="breadcrumb-item active">Add Course</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit Course</li>
                            <?php } ?>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
           <div class="col-lg-12">
              <div class="card">
                 <div class="card-header d-flex justify-content-between">
                    <?php if(empty($singleCourse)) { ?>
                      <h4 class="card-title mb-0">Add Course</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit Course</h4>
                    <?php } ?>
                    <a href="<?= base_url('admin/course'); ?>" class="btn btn-success add-btn" > List</a>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <?php if(empty($singleCourse)) { ?>
                            <form action="<?= base_url('admin/save-course') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-course') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Course Name</label>
                                              <input class="form-control" type="text" name="course"  placeholder="Course Name" value="<?= (!empty($singleCourse)) ? $singleCourse['course'] : ''; ?>">
                                              <input type="hidden" class="form-control" name="course_id" value="<?= (!empty($singleCourse)) ? $singleCourse['id'] : ''; ?>">
                                              <span class="text-danger" id="course"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Course Full Name</label>
                                              <input class="form-control" type="text" name="course_full_name"  placeholder="Course Full Name" value="<?= (!empty($singleCourse)) ? $singleCourse['course_full_name'] : ''; ?>">
                                              <span class="text-danger" id="course_full_name"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Course Short Name</label>
                                              <input class="form-control" type="text" name="course_short_name"  placeholder="Course Short Name" value="<?= (!empty($singleCourse)) ? $singleCourse['course_short_name'] : ''; ?>">
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Course Icon</label>
                                              <input class="form-control" type="file" name="course_icon"  accept="image/*">
                                              <?php if(!empty($singleCourse)) { ?>
                                                  <img  src="<?= base_url('assets/uploads/course/').$singleCourse['course_icon']; ?>" style="height:100px;width: 100px;">
                                                  <input type="hidden" class="form-control" name="old_media" value="<?= (!empty($singleCourse)) ? $singleCourse['course_icon'] : ''; ?>">
                                              <?php } ?>
                                              <span class="text-danger" id="course_icon"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Stream</label>
                                              <select class="form-control form-select" name="stream">
                                                  <option value="">Select</option>
                                                  <?php
                                                  $streamList = get_master_data('tbl_stream',[]);
                                                  if(!empty($streamList)){
                                                      foreach($streamList as $stream){ ?>
                                                          <option value="<?= $stream['id']; ?>" <?= (!empty($singleCourse) && $stream['id'] == $singleCourse['stream']) ? 'selected' : ''; ?>><?= $stream['stream']; ?></option>
                                                      <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="stream"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Degree Type</label>
                                              <select class="form-control form-select" name="degree_type">
                                                  <option value="">Select</option>
                                                  <?php
                                                  $degreeTypeList = get_master_data('tbl_degree_type',[]);
                                                  if(!empty($degreeTypeList)){
                                                      foreach($degreeTypeList as $degree){ ?>
                                                          <option value="<?= $degree['id']; ?>" <?= (!empty($singleCourse) && $degree['id'] == $singleCourse['degree_type']) ? 'selected' : ''; ?>><?= $degree['degreetype']; ?></option>
                                                      <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="degree_type"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Course Duration</label>
                                              <input class="form-control" type="text" name="course_duration"  placeholder="Course Duration" value="<?= (!empty($singleCourse)) ? $singleCourse['course_duration'] : ''; ?>">
                                              <span class="text-danger" id="course_duration"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Entrance Exam</label>
                                              <select class="form-control form-select js-example-basic-multiple" name="exam[]" multiple>
                                                  <?php
                                                  $examList = get_master_data('tbl_exam',[]);
                                                  $selectedExam = [];
                                                  if(!empty($singleCourse)){
                                                      $selectedExam = explode("|",$singleCourse['exam']);
                                                  };
                                                  if(!empty($examList)){
                                                      foreach($examList as $exam){ ?>
                                                          <option value="<?= $exam['id']; ?>" <?= (!empty($singleCourse) && in_array($exam['id'],$selectedExam)) ? 'selected' : ''; ?>><?= $exam['exam']; ?></option>
                                                      <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="exam"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Course Eligibility</label>
                                              <textarea class="form-control" name="course_eligibility" id="course_eligibility"><?= (!empty($singleCourse)) ? $singleCourse['course_eligibility'] : '';?></textarea>
                                              <span class="text-danger" id="course_eligibility"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Course Job Opportunity</label>
                                              <textarea class="form-control" name="course_opportunity" id="course_opportunity"><?= (!empty($singleCourse)) ? $singleCourse['course_opportunity'] : '';?></textarea>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Expected Salary</label>
                                              <textarea class="form-control" name="expected_salary" id="expected_salary"><?= (!empty($singleCourse)) ? $singleCourse['expected_salary'] : '';?></textarea>
                                          </div>
                                      </div>
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Course Fees (Approx)</label>
                                              <textarea class="form-control" name="course_fees" id="course_fees"><?= (!empty($singleCourse)) ? $singleCourse['course_fees'] : '';?></textarea>
                                          </div>
                                      </div>

                                  </div>
                                  <div class="row">
                                      <div class="col-lg-4">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Colleges</label>
                                              <select class="form-control js-example-basic-multiple" name="college[]" multiple>
                                                  <option value="">Select</option>
                                                  <?php
                                                  $selectedCollege = [];
                                                  if(!empty($singleCourse)){
                                                      $selectedCollege = explode("|",$singleCourse['college']);
                                                  };
                                                  $collegeList = get_master_data('tbl_college',[]);
                                                  if(!empty($collegeList)){
                                                      foreach($collegeList as $college){ ?>
                                                          <option value="<?= $college['id']; ?>" <?= (!empty($singleCourse) && in_array($college['id'],$selectedCollege)) ? 'selected' : ''; ?>><?= $college['full_name']; ?></option>
                                                      <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="college"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-4">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Counselling Authority</label>
                                              <input class="form-control" type="text" name="counselling_authority"  placeholder="Counselling Authority" value="<?= (!empty($singleCourse)) ? $singleCourse['counselling_authority'] : ''; ?>">
                                          </div>
                                      </div>
                                      <div class="col-lg-4">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Nature/Group</label>
                                              <select class="form-control form-select js-example-basic-multiple" name="branch_type[]" multiple>
                                                  <option value="">Select</option>
                                                  <?php

                                                  $branch_type=explode("|",$singleCourse['branch_type']);
                                                  if(!empty($branchType)){
                                                      foreach($branchType as $branch){ ?>
                                                          <option value="<?= $branch['id']; ?>" <?= (!empty($singleCourse) && in_array($branch['id'],$branch_type)) ? 'selected' : ''; ?>><?= $branch['nature']; ?></option>
                                                      <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="branch_type"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12" style="margin-top: 15px;">
                                        <?php if(empty($singleCourse)) { ?>
                                          <button type="submit" class="btn w-100 rounded-pill btn-success waves-effect waves-light">Save</button>
                                        <?php } else{  ?>
                                          <button type="submit" class="btn w-100 rounded-pill btn-success waves-effect waves-light">Update</button>
                                        <?php } ?>
                                    </div>
                                  </div>
                              </div>
                          </form>
                       </div>
                    </div>
                 </div>
                 <!-- end card -->
              </div>
              <!-- end col -->
           </div>
           <!-- end col -->
        </div>

    </div>
    <!-- container-fluid -->
</div>
<?php $this->load->view('admin/footer'); ?>