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
                            <?php if(empty($singleBanner)) { ?>
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
                    <?php if(empty($singleBanner)) { ?>
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
                                <a href="<?= base_url('admin/banner'); ?>" class="btn btn-success add-btn" > List</a>
                             </div>
                          </div>
                          <?php if(empty($singleBanner)) { ?>
                            <form action="<?= base_url('admin/save-banner') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-banner') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Banner Title</label>
                                          <input class="form-control" type="text" name="banner_title"  placeholder="Banner Title" value="<?php if(!empty($singleBanner)) { echo $singleBanner['title']; }?>">
                                          <input type="hidden" class="form-control" name="banner_id" value="<?php if(!empty($singleBanner)) { echo $singleBanner['id']; }?>">
                                          <span class="text-danger" id="banner_title"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Banner Image</label>
                                          <input class="form-control" type="file" name="banner_image">
                                          <?php if(!empty($singleBanner)) {  ?>
                                          <img src="<?= base_url('assets/uploads/banners'.'/'.$singleBanner['image']) ?>" height="100" width="100" class="rounded-circle">
                                         <?php } ?>
                                          <span class="text-danger" id="banner_image"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Small Banner Image</label>
                                          <input class="form-control" type="file" name="banner_image_small">
                                          <?php if(!empty($singleBanner)) {  ?>
                                          <img src="<?= base_url('assets/uploads/banners'.'/'.$singleBanner['image_small']) ?>" height="100" width="100" class="rounded-circle">
                                         <?php } ?>
                                          <span class="text-danger" id="banner_image_small"></span>
                                       </div>
                                    </div>
                                     <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Status</label>
                                          <div class="form-check form-switch form-switch-lg" dir="ltr">
                                              <input type="checkbox" class="form-check-input" id="customSwitchsizelg" name="status"<?php if(!empty($singleBanner) && $singleBanner['status'] == 1) { echo 'checked'; } ?>>
                                          </div>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Description</label>
                                          <textarea class="form-control" type="text" name="description" rows="5"><?php if(!empty($singleBanner)) { echo $singleBanner['description']; }?></textarea> 
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <?php if(empty($singleBanner)) { ?>
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