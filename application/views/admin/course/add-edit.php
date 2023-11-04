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
                 <div class="card-header">
                    <?php if(empty($singleCourse)) { ?>
                      <h4 class="card-title mb-0">Add Course</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit Course</h4>
                    <?php } ?>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/course'); ?>" class="btn btn-success add-btn" > List</a>
                             </div>
                          </div>
                          <?php if(empty($singleCourse)) { ?>
                            <form action="<?= base_url('admin/save-course') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-course') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Course Title</label>
                                          <input class="form-control" type="text" name="course_title"  placeholder="Course Title" value="<?php if(!empty($singleCourse)) { echo $singleCourse['course_title']; }?>">
                                          <input type="hidden" class="form-control" name="course_id" value="<?php if(!empty($singleCourse)) { echo $singleCourse['id']; }?>">
                                          <span class="text-danger" id="course_title"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Course Thumbnail</label>
                                          <input class="form-control" type="file" name="course_thumbnail">
                                          <?php if(!empty($singleCourse)) {  ?>
                                          <img src="<?= base_url('assets/uploads/courses'.'/'.$singleCourse['course_thumbnail']) ?>" height="100" width="100" class="rounded-circle">
                                         <?php } ?>
                                          <span class="text-danger" id="course_thumbnail"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Price</label>
                                          <input class="form-control" type="text" name="course_price"  placeholder="Price" value="<?php if(!empty($singleCourse)) { echo $singleCourse['course_price']; }?>">
                                          <span class="text-danger" id="course_price"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                          <label for="basiInput" class="form-label">Discounted Price</label>
                                          <input class="form-control" type="text" name="discount_price"  placeholder="Discounted Price" value="<?php if(!empty($singleCourse)) { echo $singleCourse['discount_price']; }?>">
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">SEO Title</label>
                                          <input class="form-control" type="text" name="seo_title"  placeholder="SEO Title" value="<?php if(!empty($singleCourse)) { echo $singleCourse['course_seo_title']; }?>">
                                          <span class="text-danger" id="seo_title"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                          <label for="basiInput" class="form-label">SEO Description</label>
                                          <textarea class="form-control" type="text" name="seo_description" rows="5"><?php if(!empty($singleCourse)) { echo $singleCourse['course_seo_description']; }?></textarea> 
                                          <span class="text-danger" id="seo_description"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Short Description</label>
                                          <textarea class="form-control" type="text" name="short_description" rows="5"><?php if(!empty($singleCourse)) { echo $singleCourse['short_description']; }?></textarea> 
                                          <span class="text-danger" id="short_description"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Long Description</label>
                                            <textarea class="form-control" aria-label="With textarea" name="long_description" id="privacy_policy_editor"><?php if(!empty($singleCourse)) { echo $singleCourse['long_description']; }?></textarea>
                                            <span class="text-danger" id="long_description"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Status</label>
                                          <div class="form-check form-switch form-switch-lg" dir="ltr">
                                              <input type="checkbox" class="form-check-input" id="customSwitchsizelg" name="status"<?php if(!empty($singleCourse) && $singleCourse['status'] == 1) { echo 'checked'; } ?>>
                                          </div>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <?php if(empty($singleCourse)) { ?>
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