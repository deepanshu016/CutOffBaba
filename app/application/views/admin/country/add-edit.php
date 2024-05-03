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
                            <?php if(empty($singleCountry)) { ?>
                              <li class="breadcrumb-item active">Add Country</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit Country</li>
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
                    <?php if(empty($singleCountry)) { ?>
                      <h4 class="card-title mb-0">Add Country</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit Country</h4>
                    <?php } ?>
                    <a href="<?= base_url('admin/country'); ?>" class="btn btn-success add-btn" ><i class="ri-list-unordered align-bottom me-1"></i> List Country</a>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <?php if(empty($singleCountry)) { ?>
                            <form action="<?= base_url('admin/save-country') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-country') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Country Code</label>
                                              <input class="form-control" type="text" name="country_code"  placeholder="Country Code" value="<?php if(!empty($singleCountry)) { echo $singleCountry['countryCode']; }?>">
                                              <input type="hidden" class="form-control" name="country_id" value="<?php if(!empty($singleCountry)) { echo $singleCountry['id']; }?>">
                                              <span class="text-danger" id="country_code"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                           <div class="form-group">
                                              <label for="basiInput" class="form-label">Country Name</label>
                                              <input class="form-control" type="text" name="name"  placeholder="Country Name" value="<?php if(!empty($singleCountry)) { echo $singleCountry['name']; }?>">
                                              <span class="text-danger" id="name"></span>
                                           </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <?php if(empty($singleCountry)) { ?>
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