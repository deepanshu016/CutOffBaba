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
                            <?php if(empty($singleGalleryHeads)) { ?>
                              <li class="breadcrumb-item active">Add Gallery Heads</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit Gallery Heads</li>
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
                    <?php if(empty($singleGalleryHeads)) { ?>
                      <h4 class="card-title mb-0">Add Gallery Heads</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit Gallery Heads</h4>
                    <?php } ?>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/gallery-heads'); ?>" class="btn btn-success add-btn" > List</a>
                             </div>
                          </div>
                          <?php if(empty($singleGalleryHeads)) { ?>
                            <form action="<?= base_url('admin/save-gallery-heads') ?>" method="POST" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-gallery-heads') ?>" method="POST" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Head Name</label>
                                              <input class="form-control" type="text" name="head_name"  placeholder="Head Name" value="<?php if(!empty($singleGalleryHeads)) { echo $singleGalleryHeads['head_name']; }?>">
                                              <input type="hidden" class="form-control" name="head_id" value="<?php if(!empty($singleGalleryHeads)) { echo $singleGalleryHeads['id']; }?>">
                                              <span class="text-danger" id="head_name"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <?php if(empty($singleGalleryHeads)) { ?>
                                          <button type="submit" class="btn rounded-pill w-100 btn-success waves-effect waves-light">Save</button>
                                        <?php } else{  ?>
                                          <button type="submit" class="btn rounded-pill w-100 btn-success waves-effect waves-light">Update</button>
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