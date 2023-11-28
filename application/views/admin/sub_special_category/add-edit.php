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
                                <?php if(empty($singleSubSpecialCategory)) { ?>
                                    <li class="breadcrumb-item active">Add Special Sub Category</li>
                                <?php } else{  ?>
                                    <li class="breadcrumb-item active">Edit Special Sub Category</li>
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
                            <?php if(empty($singleSubSpecialCategory)) { ?>
                                <h4 class="card-title mb-0">Add Special Sub Category</h4>
                            <?php } else{  ?>
                                <h4 class="card-title mb-0">Edit Special Sub Category</h4>
                            <?php } ?>
                        </div>
                        <!-- end card header -->
                        <div class="card-body">
                            <div id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <a href="<?= base_url('admin/sub-special-category'); ?>" class="btn btn-success add-btn" > List</a>
                                        </div>
                                    </div>
                                    <?php if(empty($singleSubSpecialCategory)) { ?>
                                    <form action="<?= base_url('admin/save-sub-special-category') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                                        <?php } else{  ?>
                                        <form action="<?= base_url('admin/update-sub-special-category') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                                            <?php } ?>
                                            <div class="live-preview">

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="basiInput" class="form-label">Special Sub Category Name</label>
                                                            <input class="form-control" type="text" name="sub_special_category_name"  placeholder="Special Sub Category Name" value="<?= (!empty($singleSubSpecialCategory)) ? $singleSubSpecialCategory['sub_special_category_name'] : '';?>">
                                                            <input class="form-control" type="hidden" name="sub_special_category_id"   value="<?= (!empty($singleSubSpecialCategory)) ? $singleSubSpecialCategory['id'] : '';?>">
                                                            <span class="text-danger" id="sub_special_category_name"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="basiInput" class="form-label">Special Category</label>
                                                            <select class="form-control" name="special_id">
                                                                <option value="">Select Special Category</option>
                                                                <?php
                                                                $specialCategoryList = get_master_data('tbl_special_category',[]);
                                                                if(!empty($specialCategoryList)){
                                                                    foreach($specialCategoryList as $special){ ?>
                                                                        <option value="<?= $special['id']; ?>" <?= (!empty($singleSubSpecialCategory) && $special['id'] == $singleSubSpecialCategory['special_id']) ? 'selected' : ''; ?>><?= $special['special_category_name']; ?></option>
                                                                    <?php } } ?>
                                                            </select>
                                                            <span class="text-danger" id="special_id"></span>
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
                                                                        <option value="<?= $head['id']; ?>" <?= (!empty($singleSubSpecialCategory) && $head['id'] == $singleSubSpecialCategory['head_id']) ? 'selected' : ''; ?>><?= $head['head_name']; ?></option>
                                                                    <?php } } ?>
                                                            </select>
                                                            <span class="text-danger" id="head_id"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="basiInput" class="form-label">Short Name</label>
                                                            <input class="form-control" type="text" name="short_name"  placeholder="Short Name" value="<?= (!empty($singleSubSpecialCategory)) ? $singleSubSpecialCategory['short_name'] : '';?>">
                                                            <span class="text-danger" id="short_name"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="basiInput" class="form-label">Opens</label>
                                                            <select class="form-control" name="open_id">
                                                                <option value="">Select Open</option>
                                                                <?php
                                                                $openList = get_master_data('tbl_opens',[]);
                                                                if(!empty($openList)){
                                                                    foreach($openList as $open){ ?>
                                                                        <option value="<?= $open['id']; ?>" <?= (!empty($singleSubSpecialCategory) && $open['id'] == $singleSubSpecialCategory['open_id']) ? 'selected' : ''; ?>><?= $open['opens']; ?></option>
                                                                    <?php } } ?>
                                                            </select>
                                                            <span class="text-danger" id="open_id"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6" style="margin-top: 15px;">
                                                        <?php if(empty($singleSubSpecialCategory)) { ?>
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