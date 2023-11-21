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
                            <?php if(empty($singleCity)) { ?>
                              <li class="breadcrumb-item active">Add District</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit District</li>
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
                    <?php if(empty($singleCity)) { ?>
                      <h4 class="card-title mb-0">Add District</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit District</h4>
                    <?php } ?>
                    <a href="<?= base_url('admin/district'); ?>" class="btn btn-success add-btn" > <i class="ri-list-unordered align-bottom me-1"></i> List District</a>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <div class="col-sm-auto">
                             <div>
                                
                             </div>
                          </div>
                          <?php if(empty($singleCity)) { ?>
                            <form action="<?= base_url('admin/save-district') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-district') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Country</label>
                                              <select class="form-control form-select dynamic-data" name="country" data-segment="admin/get-state" data-wrapper=".state-wrapper">
                                                  <option value="">Select Country</option>
                                                  <?php
                                                  $countryList = get_master_data('tbl_country',[]);
                                                  if(!empty($countryList)){
                                                      foreach($countryList as $country){ ?>
                                                          <option value="<?= $country['id']; ?>" <?= (!empty($singleCity) && $country['id'] == $singleCity['country']) ? 'selected' : ''; ?>><?= $country['name']; ?></option>
                                                      <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="country"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">State</label>
                                              <select class="form-control form-select state-wrapper dynamic-data" name="state" data-segment="admin/get-city" data-wrapper=".city-wrapper">
                                                  <option value="">Select State</option>
                                                  <?php
                                                  if(!empty($singleCity)){
                                                      $stateList = get_master_data('tbl_state',['country_id'=>$singleCity['country']]);
                                                      if(!empty($stateList)){
                                                          foreach($stateList as $state){ ?>
                                                              <option value="<?= $state['id']; ?>" <?= (!empty($singleCity) && $state['id'] == $singleCity['state_id']) ? 'selected' : ''; ?>><?= $state['name']; ?></option>
                                                          <?php } } } ?>
                                              </select>
                                              <span class="text-danger" id="state"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-6">
                                           <div class="form-group">
                                              <label for="basiInput" class="form-label">District Name</label>
                                              <input class="form-control" type="text" name="city"  placeholder="District Name" value="<?= (!empty($singleCity)) ? $singleCity['city'] : '';?>">
                                              <input class="form-control" type="hidden" name="city_id"   value="<?= (!empty($singleCity)) ? $singleCity['id'] : '';?>">
                                              <span class="text-danger" id="city"></span>
                                           </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <?php if(empty($singleCity)) { ?>
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