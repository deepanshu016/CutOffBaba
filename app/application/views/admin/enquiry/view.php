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
                            <li class="breadcrumb-item active">Enquiry Details</li>
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
                    <h4 class="card-title mb-0">Enquiry Details</h4>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                            <div class="live-preview">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="basiInput" class="form-label">Name</label>
                                            <span><?= $singleEnquiry['name']; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="basiInput" class="form-label">Email</label>
                                            <span><?= $singleEnquiry['email']; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="basiInput" class="form-label">Phone</label>
                                            <span><?= $singleEnquiry['phone']; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="basiInput" class="form-label">Subject</label>
                                            <span><?= $singleEnquiry['subject']; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <form action="<?= base_url('admin/update-enquiry') ?>" method="POST" class="all-form">
                                    <input type="hidden" class="form-control" name="id" value="<?= $singleEnquiry['id']; ?>">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="basiInput" class="form-label">Message</label>
                                                <span><?= $singleEnquiry['message']; ?></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="basiInput" class="form-label">Status</label>
                                                <select class="form-control form-select" name="status">
                                                    <option value="">Select Status</option>
                                                    <option value="0" <?= ($singleEnquiry['status'] == '0') ? 'selected' : '' ?>>Pending</option>    
                                                    <option value="1" <?= ($singleEnquiry['status'] == '1') ? 'selected' : '' ?>>Resolved</option>    
                                                </select>
                                                <span class="text-danger" id="status"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6" style="margin-top: 15px;">
                                                <button type="submit" class="btn rounded-pill w-100 btn-success waves-effect waves-light">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
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