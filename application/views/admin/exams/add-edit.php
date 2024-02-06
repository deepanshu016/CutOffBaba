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
                            <?php if(empty($singleExam)) { ?>
                              <li class="breadcrumb-item active">Add Exam</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit Exam</li>
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
                 <div class="card-header">
                    <?php if(empty($singleExam)) { ?>
                      <h4 class="card-title mb-0">Add Exam</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit Exam</h4>
                    <?php } ?>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/exams'); ?>" class="btn btn-success add-btn" > List</a>
                             </div>
                          </div>
                          <?php if(empty($singleExam)) { ?>
                            <form action="<?= base_url('admin/save-exams') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-exams') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Exam Name</label>
                                              <input class="form-control" type="text" name="exam"  placeholder="Exam" value="<?php if(!empty($singleExam)) { echo $singleExam['exam']; }?>">
                                              <input type="hidden" class="form-control" name="exam_id" value="<?php if(!empty($singleExam)) { echo $singleExam['id']; }?>">
                                              <span class="text-danger" id="exam"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Exam Full Name</label>
                                              <input class="form-control" type="text" name="exam_full_name"  placeholder="Exam Full Name" value="<?php if(!empty($singleExam)) { echo $singleExam['exam_full_name']; }?>">
                                              <span class="text-danger" id="exam_full_name"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Exam Short Name</label>
                                              <input class="form-control" type="text" name="exam_short_name"  placeholder="Exam Short Name" value="<?php if(!empty($singleExam)) { echo $singleExam['exam']; }?>">
                                              <span class="text-danger" id="exam_short_name"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Degree Type</label>
                                              <select class="form-control js-example-basic-multiple" name="degree_type[]" multiple>
                                                  <?php
                                                  $degreeTypeList = get_master_data('tbl_degree_type',[]);
                                                   if(!empty($singleExam)){
                                                      $degreeType = explode("|",$singleExam['degree_type']);
                                                  };
                                                  if(!empty($degreeTypeList)){
                                                      foreach($degreeTypeList as $degree){ ?>
                                                          <option value="<?= $degree['id']; ?>" <?= (!empty($singleExam) && in_array($degree['id'],$degreeType)) ? 'selected' : ''; ?>><?= $degree['degreetype']; ?></option>
                                                      <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="degree_type"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Exam Eligibility</label>
                                              <textarea class="form-control" name="eligibility" id="eligibility"><?= (!empty($singleExam)) ? $singleExam['eligibility'] : '';?></textarea>
                                              <span class="text-danger" id="eligibility"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-4">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Exam Duration</label>
                                              <input class="form-control" type="text" name="exam_duration"  placeholder="Exam Duration" value="<?= (!empty($singleExam)) ? $singleExam['exam_duration'] : ''; ?>">
                                              <span class="text-danger" id="exam_duration"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-4">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Maximum Marks</label>
                                              <input class="form-control" type="text" name="maximum_marks"  placeholder="Maximum Marks" value="<?= (!empty($singleExam)) ? $singleExam['maximum_marks'] : ''; ?>">
                                              <span class="text-danger" id="maximum_marks"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-4">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Passing Marks</label>
                                              <input class="form-control" type="text" name="passing_marks"  placeholder="Passing Marks" value="<?= (!empty($singleExam)) ? $singleExam['passing_marks'] : ''; ?>">
                                              <span class="text-danger" id="passing_marks"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-4">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Qualifying Marks</label>
                                              <input class="form-control" type="text" name="qualifying_marks"  placeholder="Qualifying Marks" value="<?= (!empty($singleExam)) ? $singleExam['qualifying_marks'] : ''; ?>">
                                              <span class="text-danger" id="qualifying_marks"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-4">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Exam Held In</label>
                                              <select class="form-control js-example-basic-multiple" name="exam_held_in[]" multiple>
                                                  <option value="">Select</option>
                                                  <?php
                                                  $monthList = show_months();
                                                  $selectedMonths = [];
                                                  if(!empty($singleExam)){
                                                      $selectedMonths = explode("|",$singleExam['exam_held_in']);
                                                  };
                                                  if(!empty($monthList)){
                                                      foreach($monthList as $month){ ?>
                                                          <option value="<?= $month['id']; ?>" <?= (!empty($singleExam) && in_array($month['id'],$selectedMonths)) ? 'selected' : ''; ?>><?= $month['label']; ?></option>
                                                      <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="exam_held_in"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-4">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Registration Starts from</label>
                                              <input class="form-control" type="date" name="registration_starts"  placeholder="Registration Starts from" value="<?= (!empty($singleExam)) ? $singleExam['registration_starts'] : ''; ?>">
                                              <span class="text-danger" id="registration_starts"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-4">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Registration Ends</label>
                                              <input class="form-control" type="date" name="registration_ends"  placeholder="Registration Ends from" value="<?= (!empty($singleExam)) ? $singleExam['registration_ends'] : ''; ?>">
                                              <span class="text-danger" id="registration_ends"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-4">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Stream Accepting</label>
                                              <select class="form-control js-example-basic-multiple" name="stream[]" multiple>
                                                  <option value="">Select</option>
                                                  <?php
                                                  $streamList = get_master_data('tbl_stream',[]);
                                                  $selectedStreams = [];
                                                  if(!empty($singleExam)){
                                                      $selectedStreams = explode("|",$singleExam['stream']);
                                                  };
                                                  if(!empty($streamList)){
                                                      foreach($streamList as $stream){ ?>
                                                          <option value="<?= $stream['id']; ?>" <?= (!empty($singleExam) && in_array($stream['id'],$selectedStreams)) ? 'selected' : ''; ?>><?= $stream['stream']; ?></option>
                                                  <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="stream"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-4">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Course Accepting</label>
                                              <select class="form-control js-example-basic-multiple" name="course_accepting[]" multiple>
                                                  <option value="">Select</option>
                                                  <?php
                                                  $courseList = get_master_data('tbl_course',[]);
                                                  $selectedCourse = [];
                                                  if(!empty($singleExam)){
                                                      $selectedCourse = explode("|",$singleExam['course_accepting']);
                                                  };
                                                  if(!empty($courseList)){
                                                      foreach($courseList as $course){ ?>
                                                          <option value="<?= $course['id']; ?>" <?= (!empty($singleExam) && in_array($course['id'],$selectedCourse)) ? 'selected' : ''; ?>><?= $course['course']; ?></option>
                                                      <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="course_accepting"></span>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-md-12" style="margin-top: 15px;">
                                        <?php if(empty($singleExam)) { ?>
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
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
<?php $this->load->view('admin/footer'); ?>