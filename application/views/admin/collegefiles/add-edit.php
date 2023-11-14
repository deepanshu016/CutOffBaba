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
                            <?php if(empty($singleCollegeFiles)) { ?>
                              <li class="breadcrumb-item active">Add College Files</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit College Files</li>
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
                    <?php if(empty($singleCollegeFiles)) { ?>
                      <h4 class="card-title mb-0">Add College Files</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit College Files</h4>
                    <?php } ?>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/college-files'); ?>" class="btn btn-success add-btn" > List</a>
                             </div>
                          </div>
                          <?php if(empty($singleCollegeFiles)) { ?>
                            <form action="<?= base_url('admin/save-college-files') ?>" method="POST" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-college-files') ?>" method="POST" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">College</label>
                                              <select class="form-control" name="college">
                                                  <option value="">Select</option>
                                                  <?php
                                                  $collegeList = get_master_data('tbl_college',[]);
                                                  if(!empty($collegeList)){
                                                      foreach($collegeList as $college){ ?>
                                                          <option value="<?= $college['id']; ?>" ><?= $college['full_name']; ?></option>
                                                      <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="college"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">File Type</label>
                                              <select class="form-control switch-file-type" name="file_type">
                                                  <option value="">Select</option>
                                                  <?php
                                                  $fileTypeData = file_type_data();
                                                  if(!empty($fileTypeData)){
                                                      foreach($fileTypeData as $type){ ?>
                                                          <option value="<?= $type['id']; ?>"><?= $type['name']; ?></option>
                                                      <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="file_type"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group image" style="display: none;">
                                              <label for="basiInput" class="form-label">Image</label>
                                              <input type="file" class="form-control" name="college_image[]" accept="image/*" multiple>
                                              <span class="text-danger" id="college_image"></span>
                                          </div>
                                          <div class="form-group video" style="display: none;">
                                              <label for="basiInput" class="form-label">Video</label>
                                              <input type="file" class="form-control" name="college_video[]" accept="video/*" multiple>
                                              <span class="text-danger" id="college_video"></span>
                                          </div>
                                          <div class="form-group documents" style="display: none;">
                                              <label for="basiInput" class="form-label">Documents</label>
                                              <input type="file" class="form-control" name="college_doc[]" multiple>
                                              <span class="text-danger" id="college_doc"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <?php if(empty($singleCollegeFiles)) { ?>
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