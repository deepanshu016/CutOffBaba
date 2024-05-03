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
                            <?php if(empty($singleFeesHead)) { ?>
                              <li class="breadcrumb-item active">Add Fees Head</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit Fees Head</li>
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
                    <?php if(empty($singleFeesHead)) { ?>
                      <h4 class="card-title mb-0">Add Fees Head</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit Fees Head</h4>
                    <?php } ?>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/feeshead'); ?>" class="btn btn-success add-btn" > List</a>
                             </div>
                          </div>
                          <?php if(empty($singleFeesHead)) { ?>
                            <form action="<?= base_url('admin/save-feeshead') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-feeshead') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Fees Head Name</label>
                                              <input class="form-control" type="text" name="fee_head_name"  placeholder="Fees Head Name" value="<?= (!empty($singleFeesHead)) ? $singleFeesHead['fee_head_name'] : ''; ?>">
                                              <input type="hidden" class="form-control" name="name_id" value="<?= (!empty($singleFeesHead)) ?  $singleFeesHead['id'] : ''; ?>">
                                              <span class="text-danger" id="fee_head_name"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Tution Fees</label>
                                              <textarea class="form-control" name="tution_fees" id="tution_feess"><?= (!empty($singleFeesHead)) ? $singleFeesHead['tution_fees'] : '';?></textarea>
                                              <span class="text-danger" id="tution_fees"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Hostel Fees</label>
                                              <textarea class="form-control" name="hostel_fees" id="hostel_fees"><?= (!empty($singleFeesHead)) ? $singleFeesHead['hostel_fees'] : '';?></textarea>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Miscellaneous Fees</label>
                                              <textarea class="form-control" name="misc_fees" id="misc_fees"><?= (!empty($singleFeesHead)) ? $singleFeesHead['misc_fees'] : '';?></textarea>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Bank Details 1</label>
                                              <textarea class="form-control" name="bank_details_1" id="bank_details_1"><?= (!empty($singleFeesHead)) ? $singleFeesHead['bank_details_1'] : '';?></textarea>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Bank Details 2</label>
                                              <textarea class="form-control" name="bank_details_2" id="bank_details_2"><?= (!empty($singleFeesHead)) ? $singleFeesHead['bank_details_2'] : '';?></textarea>
                                          </div>
                                      </div>
                                  </div>


                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Demand Draft Name</label>
                                              <input class="form-control" type="text" name="demand_draft_name"  placeholder="Demand Draft Name" value="<?= (!empty($singleFeesHead)) ? $singleFeesHead['demand_draft_name'] : ''; ?>">
                                          </div>
                                      </div>
                                  </div>
                                   <div class="row">
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Service & Bond Rules</label>
                                              <textarea class="form-control" name="bondrule" id="bondrule"><?= (!empty($singleFeesHead)) ? $singleFeesHead['bondrule'] : '';?></textarea>
                                          </div>
                                      </div>
                                  </div>


                                  <div class="row">
                                      <div class="col-lg-6 col-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Seat Indemnity Charges</label>
                                              <input class="form-control" type="text" name="seat_indentity_charges"  placeholder="Seat Indemnity Charges" value="<?= (!empty($singleFeesHead)) ? $singleFeesHead['seat_indentity_charges'] : ''; ?>">
                                          </div>
                                      </div>
                                      <div class="col-lg-6 col-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Upgradation Processing Fees</label>
                                              <input class="form-control" type="text" name="upgradation_processing_fees"  placeholder="Upgradation Processing Fees" value="<?= (!empty($singleFeesHead)) ? $singleFeesHead['upgradation_processing_fees'] : ''; ?>">
                                          </div>
                                      </div>
                                  </div>
                                   <div class="row">
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Other Fees</label>
                                              <textarea class="form-control" name="otfee" id="otfee"><?= (!empty($singleFeesHead)) ? $singleFeesHead['otfee'] : '';?></textarea>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12" style="margin-top: 15px;">
                                        <?php if(empty($singleFeesHead)) { ?>
                                          <button type="submit" class="btn w-100 btn-success waves-effect waves-light">Save</button>
                                        <?php } else{  ?>
                                          <button type="submit" class="btn w-100 btn-success waves-effect waves-light">Update</button>
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