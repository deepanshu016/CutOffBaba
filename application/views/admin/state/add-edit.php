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
                            <?php if(empty($singleState)) { ?>
                              <li class="breadcrumb-item active">Add State</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit State</li>
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
                    <?php if(empty($singleState)) { ?>
                      <h4 class="card-title mb-0">Add State</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit State</h4>
                    <?php } ?>
                    <a href="<?= base_url('admin/state'); ?>" class="btn btn-success add-btn" > <i class="ri-list-unordered align-bottom me-1"></i> List State</a>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <?php if(empty($singleState)) { ?>
                            <form action="<?= base_url('admin/save-state') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-state') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Country</label>
                                              <select class="form-control form-select" name="country_id">
                                                <option value="">--Select--</option>
                                                 <?php if(!empty($countryList)):
                                                    foreach($countryList as $country): ?>
                                                    <option value="<?= $country['id'];?>" <?php if(!empty($singleState) && $singleState['country_id'] == $country['id']){ echo'selected'; }?>><?= $country['name'];?></option>
                                                <?php endforeach; endif;?>
                                              </select>
                                              <input type="hidden" class="form-control" name="state_id" value="<?php if(!empty($singleState)) { echo $singleState['id']; }?>">
                                              <input type="hidden" class="form-control" name="old_state_logo" value="<?= (!empty($singleState)) ? $singleState['state_logo'] : ''; ?>">
                                              <span class="text-danger" id="country_id"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                           <div class="form-group">
                                              <label for="basiInput" class="form-label">State Logo</label>
                                              <input class="form-control" type="file" name="state_logo"  placeholder="State Logo" accept="image/*">
                                              <?php if(!empty($singleNews['image'])) {  ?>
                                                  <img src="<?= base_url('assets/uploads/state'.'/'.$singleState['state_logo']) ?>" height="100" width="100" class="rounded-circle">
                                              <?php } ?>
                                              <span class="text-danger" id="state_logo"></span>
                                           </div>
                                      </div>
                                      <div class="col-lg-6">
                                           <div class="form-group">
                                              <label for="basiInput" class="form-label">State Name</label>
                                              <input class="form-control" type="text" name="name"  placeholder="State Name" value="<?php if(!empty($singleState)) { echo $singleState['name']; }?>">
                                              <span class="text-danger" id="name"></span>
                                           </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <?php if(empty($singleState)) { ?>
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