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
                                <?php if(empty($singleClinicalDetail)) { ?>
                                    <li class="breadcrumb-item active">Add Clinical Details</li>
                                <?php } else{  ?>
                                    <li class="breadcrumb-item active">Edit Clinical Details</li>
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
                            <?php if(empty($singleClinicalDetail)) { ?>
                                <h4 class="card-title mb-0">Add Clinical Details</h4>
                            <?php } else{  ?>
                                <h4 class="card-title mb-0">Edit Clinical Details</h4>
                            <?php } ?>
                        </div>
                        <!-- end card header -->
                        <div class="card-body">
                            <div id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <a href="<?= base_url('admin/clinical-details'); ?>" class="btn btn-success add-btn" > List</a>
                                        </div>
                                    </div>
                                    <?php if(empty($singleClinicalDetail)) { ?>
                                    <form action="<?= base_url('admin/save-clinical-details') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                                        <?php } else{  ?>
                                        <form action="<?= base_url('admin/update-clinical-details') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                                            <?php } ?>
                                            <div class="live-preview">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="basiInput" class="form-label">Clinical Detail</label>
                                                            <input class="form-control" type="text" name="clinical_detail"  placeholder="Clinical Detail" value="<?php if(!empty($singleClinicalDetail)) { echo $singleClinicalDetail['clinical_detail']; }?>">
                                                            <input type="hidden" class="form-control" name="clinical_detail_id" value="<?php if(!empty($singleClinicalDetail)) { echo $singleClinicalDetail['id']; }?>">
                                                            <span class="text-danger" id="clinical_detail"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6" style="margin-top: 15px;">
                                                        <?php if(empty($singleClinicalDetail)) { ?>
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