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
                            <?php if(empty($singleVisibility)) { ?>
                              <li class="breadcrumb-item active">Add Visibility</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit Visibility</li>
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
                    <?php if(empty($singleVisibility)) { ?>
                      <h4 class="card-title mb-0">Add Visibility</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit Visibility</h4>
                    <?php } ?>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/visibility'); ?>" class="btn btn-success add-btn" > List</a>
                             </div>
                          </div>
                          <?php if(empty($singleVisibility)) { ?>
                            <form action="<?= base_url('admin/save-visibility') ?>" method="POST" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-visibility') ?>" method="POST" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Visibility</label>
                                              <input class="form-control" type="text" name="visibility"  placeholder="Visibility" value="<?php if(!empty($singleVisibility)) { echo $singleVisibility['visibility']; }?>">
                                              <input type="hidden" class="form-control" name="visibility_id" value="<?php if(!empty($singleVisibility)) { echo $singleVisibility['id']; }?>">
                                              <span class="text-danger" id="visibility"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <?php if(empty($singleVisibility)) { ?>
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