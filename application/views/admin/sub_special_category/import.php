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
                                <li class="breadcrumb-item active">Import Special Sub Category</li>
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
                            <h4 class="card-title mb-0">Import Special Sub Category</h4>
                        </div>
                        <!-- end card header -->
                        <div class="card-body">
                            <div id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <a href="<?= base_url('admin/sub-special-category'); ?>" class="btn btn-success add-btn" ><i class="ri-list-check"></i> List</a>
                                            <a href="<?= base_url('admin/export-sub-special-category'); ?>" class="btn btn-primary add-btn" ><i class="ri-download-2-line"></i> Sample File </a>
                                        </div>
                                    </div>
                                    <span class="">Notes:-</span>
                                    <ul style="color:red;margin-left: 15px;">
                                        <li>Please fill all details properly in excel file which you need to upload</li>
                                        <li>'sub_special_category_name' field is required while uploading special category dta </li>
                                        <li>special_id ,head_id,open_id  required dynamic IDs</li>
                                    </ul>
                                    <form action="<?= base_url('admin/import-sub-special-category-by-excel') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                                        <div class="live-preview">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="basiInput" class="form-label">Excel File</label>
                                                        <input type="file" class="form-control" name="excel_file">
                                                        <span class="text-danger" id="excel_file"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6" style="margin-top: 15px;">
                                                    <button type="submit" class="btn rounded-pill btn-success waves-effect waves-light">Upload</button>
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