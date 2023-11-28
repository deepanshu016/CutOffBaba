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
                            <?php if(empty($singleCounsellingHead)) { ?>
                              <li class="breadcrumb-item active">Add Cutoff Head Name</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit Cutoff Head Name</li>
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
                    <?php if(empty($singleCounsellingHead)) { ?>
                      <h4 class="card-title mb-0">Add Cutoff Head Name</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit Cutoff Head Name</h4>
                    <?php } ?>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/cutoff-head-name'); ?>" class="btn btn-success add-btn" > List</a>
                             </div>
                          </div>
                          <?php if(empty($singleCounsellingHead)) { ?>
                            <form action="<?= base_url('admin/save-cutoff-head-name') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-cutoff-head-name') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                              <div class="live-preview">

                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Head Name</label>
                                              <input class="form-control" type="text" name="head_name"  placeholder="Head Name" value="<?= (!empty($singleCounsellingHead)) ? $singleCounsellingHead['head_name'] : '';?>">
                                              <input class="form-control" type="hidden" name="head_id"   value="<?= (!empty($singleCounsellingHead)) ? $singleCounsellingHead['id'] : '';?>">
                                              <span class="text-danger" id="head_name"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Course</label>
                                              <select class="form-control" name="course_id">
                                                  <option value="">Select Course</option>
                                                  <?php
                                                  $courseList = get_master_data('tbl_course',[]);
                                                  if(!empty($courseList)){
                                                      foreach($courseList as $course){ ?>
                                                          <option value="<?= $course['id']; ?>" <?= (!empty($singleCounsellingHead) && $course['id'] == $singleCounsellingHead['course_id']) ? 'selected' : ''; ?>><?= $course['course']; ?></option>
                                                      <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="course_id"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Counselling Level</label>
                                              <select class="form-control" name="level_id">
                                                  <option value="">Select Counselling Level</option>
                                                  <?php
                                                  $counsellingLevelList = get_master_data('tbl_counselling_level',[]);
                                                  if(!empty($counsellingLevelList)){
                                                      foreach($counsellingLevelList as $level){ ?>
                                                          <option value="<?= $level['id']; ?>" <?= (!empty($singleCounsellingHead) && $level['id'] == $singleCounsellingHead['level_id']) ? 'selected' : ''; ?>><?= $level['level']; ?></option>
                                                      <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="level_id"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Exams</label>
                                              <select class="form-control js-example-basic-multiple" name="exam_id[]" multiple>
                                                  <option value="">Select Exams</option>
                                                  <?php
                                                  $examList = get_master_data('tbl_exam',[]);
                                                  if(!empty($examList)){
                                                      if(!empty($singleCounsellingHead)){
                                                          $examLists = explode('|',$singleCounsellingHead['exams']);

                                                      }
                                                      foreach($examList as $exam){ ?>
                                                          <option value="<?= $exam['id']; ?>" <?= (!empty($singleCounsellingHead) && in_array($exam['id'],$examLists)) ? 'selected' : ''; ?>><?= $exam['exam']; ?></option>
                                                      <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="exam_id"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">State</label>
                                              <select class="form-control" name="state">
                                                  <option value="">Select State</option>
                                                  <?php
                                                      $stateList = get_master_data('tbl_state',[]);
                                                      if(!empty($stateList)){
                                                          foreach($stateList as $state){ ?>
                                                              <option value="<?= $state['id']; ?>" <?= (!empty($singleCounsellingHead) && $state['id'] == $singleCounsellingHead['state_id']) ? 'selected' : ''; ?>><?= $state['name']; ?></option>
                                                          <?php } }  ?>
                                              </select>
                                              <span class="text-danger" id="state"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <?php if(empty($singleCounsellingHead)) { ?>
                                          <button type="submit" class="btn rounded-pill btn-success waves-effect waves-light">Save</button>
                                        <?php } else{  ?>
                                          <button type="submit" class="btn rounded-pill btn-success waves-effect waves-light">Update</button>
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