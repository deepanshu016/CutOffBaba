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
                                <?php if(empty($singleSpecialCategory)) { ?>
                                    <li class="breadcrumb-item active">Add Special Category</li>
                                <?php } else{  ?>
                                    <li class="breadcrumb-item active">Edit Special Category</li>
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
                            <?php if(empty($singleSpecialCategory)) { ?>
                                <h4 class="card-title mb-0">Add Special Category</h4>
                            <?php } else{  ?>
                                <h4 class="card-title mb-0">Edit Special Category</h4>
                            <?php } ?>
                        </div>
                        <!-- end card header -->
                        <div class="card-body">
                            <div id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <a href="<?= base_url('admin/special-category'); ?>" class="btn btn-success add-btn" > List</a>
                                        </div>
                                    </div>
                                    <?php if(empty($singleSpecialCategory)) { ?>
                                    <form action="<?= base_url('admin/save-special-category') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                                        <?php } else{  ?>
                                        <form action="<?= base_url('admin/update-special-category') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                                            <?php } ?>
                                            <div class="live-preview">

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="basiInput" class="form-label">Special Category Name</label>
                                                            <input class="form-control" type="text" name="special_category_name"  placeholder="Special Category Name" value="<?= (!empty($singleSpecialCategory)) ? $singleSpecialCategory['special_category_name'] : '';?>">
                                                            <input class="form-control" type="hidden" name="special_category_id"   value="<?= (!empty($singleSpecialCategory)) ? $singleSpecialCategory['id'] : '';?>">
                                                            <span class="text-danger" id="special_category_name"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="basiInput" class="form-label">Counselling Head</label>
                                                            <select class="form-control" name="head_id">
                                                                <option value="">Select Course</option>
                                                                <?php
                                                                $headList = get_master_data('tbl_counselling_head',[]);
                                                                if(!empty($headList)){
                                                                    foreach($headList as $head){ ?>
                                                                        <option value="<?= $head['id']; ?>" <?= (!empty($singleSpecialCategory) && $head['id'] == $singleSpecialCategory['head_id']) ? 'selected' : ''; ?>><?= $head['head_name']; ?></option>
                                                                    <?php } } ?>
                                                            </select>
                                                            <span class="text-danger" id="head_id"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="basiInput" class="form-label">Short Name</label>
                                                            <input class="form-control" type="text" name="short_name"  placeholder="Short Name" value="<?= (!empty($singleSpecialCategory)) ? $singleSpecialCategory['short_name'] : '';?>">
                                                            <span class="text-danger" id="short_name"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="basiInput" class="form-label">Visibility</label>
                                                            <select class="form-control" name="visibility_id">
                                                                <option value="">Select Visibility</option>
                                                                <?php
                                                                $visibilityList = get_master_data('tbl_visibility',[]);
                                                                if(!empty($visibilityList)){
                                                                    foreach($visibilityList as $visible){ ?>
                                                                        <option value="<?= $visible['id']; ?>" <?= (!empty($singleSpecialCategory) && $visible['id'] == $singleSpecialCategory['visibility_id']) ? 'selected' : ''; ?>><?= $visible['visibility']; ?></option>
                                                                    <?php } } ?>
                                                            </select>
                                                            <span class="text-danger" id="visibility_id"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6" style="margin-top: 15px;">
                                                        <?php if(empty($singleSpecialCategory)) { ?>
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