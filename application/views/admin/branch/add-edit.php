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
                            <?php if(empty($singleBranch)) { ?>
                              <li class="breadcrumb-item active">Add Branch</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit Branch</li>
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
                    <?php if(empty($singleBranch)) { ?>
                      <h4 class="card-title mb-0">Add Branch</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit Branch</h4>
                    <?php } ?>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/branch'); ?>" class="btn btn-success add-btn" > List</a>
                             </div>
                          </div>
                          <?php if(empty($singleBranch)) { ?>
                            <form action="<?= base_url('admin/save-branch') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-branch') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                    <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Courses</label>
                                              <select class="form-control form-select dynamic-data" name="courses" data-segment="get-branches" data-wrapper=".branch-wrapper">
                                                  <?php
                                                  $courseList = get_master_data('tbl_course', []);
                                                  if (!empty($courseList)) {
                                                      foreach ($courseList as $course) {
                                                          $isSelected = (!empty($singleBranch) && in_array($course['id'], explode('|',$singleBranch['courses']))) ? 'selected' : '';
                                                          ?>
                                                          <option value="<?= $course['id']; ?>" <?= $isSelected; ?>>
                                                              <?= $course['course']; ?>
                                                          </option>
                                                          <?php
                                                      }
                                                  }
                                                  ?>
                                              </select>
                                              <span class="text-danger" id="courses"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Nature</label>
                                              <select class="form-control branch-wrapper form-select" name="branch_type">
                                                  <?php
                                                  //$branchList = branch_type_data();
                                                  if(!empty($branchList)){
                                                      foreach($branchList as $branch){ ?>
                                                          <option value="<?= $branch['id']; ?>" <?= (!empty($singleBranch) &&  $branch['id'] == $singleBranch['branch_type']) ? 'selected' : ''; ?>><?= $branch['nature']; ?></option>
                                                      <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="branch_type"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Branch Name</label>
                                              <input class="form-control" type="text" name="branch"  placeholder="Branch" value="<?= (!empty($singleBranch)) ? $singleBranch['branch'] : ''; ?>">
                                              <input type="hidden" class="form-control" name="branch_id" value="<?= (!empty($singleBranch)) ? $singleBranch['id'] : ''; ?>">
                                              <span class="text-danger" id="branch"></span>

                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Branch Short Name</label>
                                              <input class="form-control" type="text" name="short_branch_name"  placeholder="Branch Short Name" value="<?= (!empty($singleBranch)) ? $singleBranch['short_branch_name'] : ''; ?>">
                                              <span class="text-danger" id="short_branch_name"></span>

                                          </div>
                                      </div>
                                      
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Branch Name 1</label>
                                              <input class="form-control" type="text" name="branch_name_1"  placeholder="Branch Name 1" value="<?= (!empty($singleBranch)) ? $singleBranch['branch_name_1'] : ''; ?>">
                                              <span class="text-danger" id="branch_name_1"></span>

                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Branch Name 2</label>
                                              <input class="form-control" type="text" name="branch_name_2"  placeholder="Branch Name 2" value="<?= (!empty($singleBranch)) ? $singleBranch['branch_name_2'] : ''; ?>">
                                              <span class="text-danger" id="branch_name_2"></span>

                                          </div>
                                      </div>
                                      
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <?php if(empty($singleBranch)) { ?>
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
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
<?php $this->load->view('admin/footer'); ?>