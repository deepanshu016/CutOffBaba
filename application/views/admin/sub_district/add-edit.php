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
                            <?php if(empty($singleSubDistrict)) { ?>
                              <li class="breadcrumb-item active">Add Sub District</li>
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
                    <?php if(empty($singleSubDistrict)) { ?>
                      <h4 class="card-title mb-0">Add Sub District</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit Sub District</h4>
                    <?php } ?>
                    <a href="<?= base_url('admin/sub-district'); ?>" class="btn btn-success add-btn" > <i class="ri-list-unordered align-bottom me-1"></i> List Sub Distict</a>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <?php if(empty($singleSubDistrict)) { ?>
                            <form action="<?= base_url('admin/save-sub-district') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-sub-district') ?>" method="POST" enctype="multipart/form-data" class="all-form">
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
                                                          <option value="<?= $country['id']; ?>" <?= (!empty($singleSubDistrict) && $country['id'] == $singleSubDistrict['country']) ? 'selected' : ''; ?>><?= $country['name']; ?></option>
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
                                                  if(!empty($singleSubDistrict)){
                                                      $stateList = get_master_data('tbl_state',['country_id'=>$singleSubDistrict['country']]);
                                                      if(!empty($stateList)){
                                                          foreach($stateList as $state){ ?>
                                                              <option value="<?= $state['id']; ?>" <?= (!empty($singleSubDistrict) && $state['id'] == $singleSubDistrict['state']) ? 'selected' : ''; ?>><?= $state['name']; ?></option>
                                                          <?php } } } ?>
                                              </select>
                                              <span class="text-danger" id="state"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">District</label>
                                              <select class="form-control form-select city-wrapper" name="district">
                                                  <option value="">Select District</option>
                                                  <?php
                                                  if(!empty($singleSubDistrict)){
                                                      $cityList = get_master_data('tbl_city',['state_id'=>$singleSubDistrict['state']]);
                                                      if(!empty($cityList)){
                                                          foreach($cityList as $city){ ?>
                                                              <option value="<?= $city['id']; ?>" <?= (!empty($singleSubDistrict) && $city['id'] == $singleSubDistrict['district']) ? 'selected' : ''; ?>><?= $city['city']; ?></option>
                                                          <?php } } } ?>
                                              </select>
                                              <span class="text-danger" id="district"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                           <div class="form-group">
                                              <label for="basiInput" class="form-label">Sub District Name</label>
                                              <input class="form-control" type="text" name="sub_district"  placeholder="Sub District Name" value="<?= (!empty($singleSubDistrict)) ? $singleSubDistrict['sub_district'] : '';?>">
                                              <input class="form-control" type="hidden" name="sub_district_id"   value="<?= (!empty($singleSubDistrict)) ? $singleSubDistrict['id'] : '';?>">
                                              <span class="text-danger" id="sub_district"></span>
                                           </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <?php if(empty($singleSubDistrict)) { ?>
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