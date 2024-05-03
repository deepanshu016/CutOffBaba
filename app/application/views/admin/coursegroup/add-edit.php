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
                            <?php if(empty($singleCoursegroup)) { ?>
                              <li class="breadcrumb-item active">Add Course Group</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit Course Group</li>
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
                    <?php if(empty($singleCoursegroup)) { ?>
                      <h4 class="card-title mb-0">Add Course Group</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit Course Group</h4>
                    <?php } ?>
                    <a href="<?= base_url('admin/coursegroup'); ?>" class="btn btn-success add-btn" > List</a>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <?php if(empty($singleCoursegroup)) { ?>
                            <form action="<?= base_url('admin/save-coursegroup') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-coursegroup') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Course Group</label>
                                          <input class="form-control" type="text" name="title"  placeholder="Course Group" value="<?php if(!empty($singleCoursegroup)) { echo $singleCoursegroup['title']; }?>">
                                          <input type="hidden" class="form-control" name="coursegroup_id" value="<?php if(!empty($singleCoursegroup)) { echo $singleCoursegroup['id']; }?>">
                                          <span class="text-danger" id="title"></span>
                                       </div>
                                    </div>
                                    <div class="col-md-6" style="margin-top: 25px;">
                                        <?php if(empty($singleCoursegroup)) { ?>
                                          <button type="submit" class="btn w-100 btn-success waves-effect waves-light">Save</button>
                                        <?php } else{  ?>
                                          <button type="submit" class="btn w-100 btn-success waves-effect waves-light">Update</button>
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