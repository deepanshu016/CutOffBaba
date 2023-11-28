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
                            <?php if(empty($singleServiceRule)) { ?>
                              <li class="breadcrumb-item active">Add Service  & Bond Rules</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit Service  & Bond Rules</li>
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
                    <?php if(empty($singleServiceRule)) { ?>
                      <h4 class="card-title mb-0">Add Service  & Bond Rules</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit Service  & Bond Rules</h4>
                    <?php } ?>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/service-rules'); ?>" class="btn btn-success add-btn" > List</a>
                             </div>
                          </div>
                          <?php if(empty($singleServiceRule)) { ?>
                            <form action="<?= base_url('admin/save-service-rules') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-service-rules') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Service  & Bond Rules Name</label>
                                              <input class="form-control" type="text" name="service_bond"  placeholder="Service  & Bond Rules Name" value="<?= (!empty($singleServiceRule)) ? $singleServiceRule['service_bond'] : ''; ?>">
                                              <input type="hidden" class="form-control" name="service_id" value="<?= (!empty($singleServiceRule)) ?  $singleServiceRule['id'] : ''; ?>">
                                              <span class="text-danger" id="service_bond"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Seat Indemnity Charges</label>
                                              <input class="form-control" type="text" name="seat_indentity_charges"  placeholder="Seat Indemnity Charges" value="<?= (!empty($singleServiceRule)) ? $singleServiceRule['seat_indentity_charges'] : ''; ?>">
                                              <span class="text-danger" id="seat_indentity_charges"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Upgradation Processing Fees</label>
                                              <input class="form-control" type="text" name="upgradation_processing_fees"  placeholder="Upgradation Processing Fees" value="<?= (!empty($singleServiceRule)) ? $singleServiceRule['upgradation_processing_fees'] : ''; ?>">
                                              <span class="text-danger" id="upgradation_processing_fees"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12" style="margin-top: 15px;">
                                        <?php if(empty($singleServiceRule)) { ?>
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