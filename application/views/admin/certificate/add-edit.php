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
                            <?php if(empty($singleCertificate)) { ?>
                              <li class="breadcrumb-item active">Add Certificate</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit Certificate</li>
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
                    <?php if(empty($singleCertificate)) { ?>
                      <h4 class="card-title mb-0">Add Certificate</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit Certificate</h4>
                    <?php } ?>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/certificate'); ?>" class="btn btn-success add-btn" > List</a>
                             </div>
                          </div>
                          <?php if(empty($singleCertificate)) { ?>
                            <form action="<?= base_url('admin/save-certificate') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-certificate') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Name</label>
                                          <input class="form-control" type="text" name="name"  placeholder="Name" value="<?php if(!empty($singleCertificate)) { echo $singleCertificate['name']; }?>">
                                          <input type="hidden" class="form-control" name="certificate_id" value="<?php if(!empty($singleCertificate)) { echo $singleCertificate['id']; }?>">
                                          <span class="text-danger" id="name"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Certificate Image</label>
                                          <input class="form-control" type="file" name="image">
                                          <?php if(!empty($singleCertificate)) {  ?>
                                          <img src="<?= base_url('assets/uploads/certificates'.'/'.$singleCertificate['image']) ?>" height="100" width="100" class="rounded-circle">
                                         <?php } ?>
                                          <span class="text-danger" id="image"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Department</label>
                                          <input class="form-control" type="text" name="department"  placeholder="Department" value="<?php if(!empty($singleCertificate)) { echo $singleCertificate['department']; }?>">
                                          <span class="text-danger" id="department"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Issue Date</label>
                                          <input class="form-control" type="date" name="issue_date"  placeholder="Issue Date" value="<?php if(!empty($singleCertificate)) { echo $singleCertificate['issue_date']; }?>">
                                          <span class="text-danger" id="issue_date"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Valid Till</label>
                                          <input class="form-control" type="date" name="valid_till"  placeholder="Valid Till" value="<?php if(!empty($singleCertificate)) { echo $singleCertificate['valid_till']; }?>">
                                          <span class="text-danger" id="valid_till"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Status</label>
                                          <div class="form-check form-switch form-switch-lg" dir="ltr">
                                              <input type="checkbox" class="form-check-input" id="customSwitchsizelg" name="status"<?php if(!empty($singleCertificate) && $singleCertificate['status'] == 1) { echo 'checked'; } ?>>
                                          </div>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <?php if(empty($singleCertificate)) { ?>
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