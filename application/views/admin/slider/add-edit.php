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
                            <?php if(empty($singleSlider)) { ?>
                              <li class="breadcrumb-item active">Add Banner</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit Banner</li>
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
                    <?php if(empty($singleSlider)) { ?>
                      <h4 class="card-title mb-0">Add Banner</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit NBanner</h4>
                    <?php } ?>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/slider'); ?>" class="btn btn-success add-btn" > List</a>
                             </div>
                          </div>
                          <?php if(empty($singleSlider)) { ?>
                            <form action="<?= base_url('admin/save-slider') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-slider') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Banner Title <small>(Large Screen)</small></label>
                                          <input class="form-control" type="text" name="banner_title_large"  placeholder="Banner Title" value="<?php if(!empty($singleSlider)) { echo $singleSlider['banner_title_large']; }?>">
                                          <input type="hidden" class="form-control" name="slider_id" value="<?php if(!empty($singleSlider)) { echo $singleSlider['id']; }?>">
                                          <span class="text-danger" id="banner_title_large"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Banner Title <small>(Small Screen)</small></label>
                                          <input class="form-control" type="text" name="banner_title_small"  placeholder="Banner Title" value="<?php if(!empty($singleSlider)) { echo $singleSlider['banner_title_small']; }?>">
                                          <span class="text-danger" id="banner_title_small"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Banner Sub Title <small>(Large Screen)</small></label>
                                          <input class="form-control" type="text" name="banner_sub_title_large"  placeholder="Banner Title" value="<?php if(!empty($singleSlider)) { echo $singleSlider['banner_sub_title_large']; }?>">
                                          <span class="text-danger" id="banner_sub_title_large"></span>
                                       </div>
                                    </div>
                                     <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Banner Sub Title <small>(Small Screen)</small></label>
                                          <input class="form-control" type="text" name="banner_sub_title_right"  placeholder="Banner Title" value="<?php if(!empty($singleSlider)) { echo $singleSlider['banner_sub_title_right']; }?>">
                                          <span class="text-danger" id="banner_sub_title_right"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Left Image <small>(Large Screen)</small></label>
                                          <input class="form-control" type="file" name="left_image_for_large">
                                          <?php if(!empty($singleSlider)) {  ?>
                                          <img src="<?= base_url('assets/uploads/slider'.'/'.$singleSlider['left_image_for_large']) ?>" height="100" width="100" class="rounded-circle">
                                         <?php } ?>
                                          <span class="text-danger" id="left_image_for_large"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Left Image <small>(Small Screen)</small></label>
                                          <input class="form-control" type="file" name="left_image_for_small">
                                          <?php if(!empty($singleSlider)) {  ?>
                                          <img src="<?= base_url('assets/uploads/slider'.'/'.$singleSlider['left_image_for_small']) ?>" height="100" width="100" class="rounded-circle">
                                         <?php } ?>
                                          <span class="text-danger" id="left_image_for_small"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Right Image <small>(Large Screen)</small></label>
                                          <input class="form-control" type="file" name="right_image_for_large">
                                          <?php if(!empty($singleSlider)) {  ?>
                                          <img src="<?= base_url('assets/uploads/slider'.'/'.$singleSlider['right_image_for_large']) ?>" height="100" width="100" class="rounded-circle">
                                         <?php } ?>
                                          <span class="text-danger" id="right_image_for_large"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Right Image <small>(Small Screen)</small></label>
                                          <input class="form-control" type="file" name="right_image_for_small">
                                          <?php if(!empty($singleSlider)) {  ?>
                                          <img src="<?= base_url('assets/uploads/slider'.'/'.$singleSlider['right_image_for_large']) ?>" height="100" width="100" class="rounded-circle">
                                         <?php } ?>
                                          <span class="text-danger" id="right_image_for_small"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Button Title <small>(Large Screen)</small></label>
                                          <input class="form-control" type="file" name="button_title_large">
                                          <?php if(!empty($singleSlider)) {  ?>
                                          <img src="<?= base_url('assets/uploads/slider'.'/'.$singleSlider['button_title_large']) ?>" height="100" width="100" class="rounded-circle">
                                         <?php } ?>
                                          <span class="text-danger" id="button_title_large"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Button Title <small>(Small Screen)</small></label>
                                           <input class="form-control" type="file" name="button_title_small">
                                          <?php if(!empty($singleSlider)) {  ?>
                                          <img src="<?= base_url('assets/uploads/slider'.'/'.$singleSlider['button_title_small']) ?>" height="100" width="100" class="rounded-circle">
                                         <?php } ?>
                                          <span class="text-danger" id="button_title_large"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Button Link <small>(Large Screen)</small></label>
                                          <input class="form-control" type="text" name="button_link_large"  placeholder="Button link" value="<?php if(!empty($singleSlider)) { echo $singleSlider['button_link_large']; }?>">
                                          <span class="text-danger" id="button_link_large"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Button link <small>(Small Screen)</small></label>
                                          <input class="form-control" type="text" name="button_link_small"  placeholder="Button link" value="<?php if(!empty($singleSlider)) { echo $singleSlider['button_link_small']; }?>">
                                          <span class="text-danger" id="button_link_small"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Background Image <small>(Large Screen)</small></label>
                                          <input class="form-control" type="file" name="background_image_for_large">
                                          <?php if(!empty($singleSlider)) {  ?>
                                          <img src="<?= base_url('assets/uploads/slider'.'/'.$singleSlider['background_image_for_large']) ?>" height="100" width="100" class="rounded-circle">
                                         <?php } ?>
                                          <span class="text-danger" id="background_image_for_large"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Background Image <small>(Small Screen)</small></label>
                                          <input class="form-control" type="file" name="background_image_for_small">
                                          <?php if(!empty($singleSlider)) {  ?>
                                          <img src="<?= base_url('assets/uploads/slider'.'/'.$singleSlider['background_image_for_small']) ?>" height="100" width="100" class="rounded-circle">
                                         <?php } ?>
                                          <span class="text-danger" id="background_image_for_small"></span>
                                       </div>
                                    </div>
                                  </div>
                                  
                                  <div class="row">
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <?php if(empty($singleSlider)) { ?>
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