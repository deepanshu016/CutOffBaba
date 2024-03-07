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
                            <?php if(empty($singleStream)) { ?>
                              <li class="breadcrumb-item active">Add Stream</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit Stream</li>
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
                    <?php if(empty($singleStream)) { ?>
                      <h4 class="card-title mb-0">Add Stream</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit Stream</h4>
                    <?php } ?>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/stream'); ?>" class="btn btn-success add-btn" > List</a>
                             </div>
                          </div>
                          <?php if(empty($singleStream)) { ?>
                            <form action="<?= base_url('admin/save-stream') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-stream') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Stream</label>
                                              <input class="form-control" type="text" name="stream"  placeholder="Stream" value="<?= (!empty($singleStream)) ? $singleStream['stream'] : ''; ?>">
                                              <input type="hidden" class="form-control" name="stream_id" value="<?= (!empty($singleStream)) ? $singleStream['id'] : ''; ?>">
                                              <span class="text-danger" id="stream"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Description</label>
                                              <textarea class="form-control"  name="description" id="description" placeholder="Description"><?= (!empty($singleStream)) ? $singleStream['description'] : '';?></textarea>
                                              <span class="text-danger" id="description"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Stream Image</label>
                                              <input class="form-control" type="file" name="stream_image" accept="images/*">
                                              <?php if(!empty($singleStream) && $singleStream['stream_image'] != '') { ?>
                                                <img src="<?= base_url('assets/uploads/stream/').$singleStream['stream_image'];?>" height="100" width="100">
                                              <?php } ?>
                                              <span class="text-danger" id="stream_image"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <?php if(empty($singleStream)) { ?>
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