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
                                <?php if(empty($singleSubCategory)) { ?>
                                    <li class="breadcrumb-item active">Add Sub Category</li>
                                <?php } else{  ?>
                                    <li class="breadcrumb-item active">Edit Sub Category</li>
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
                            <?php if(empty($singleSubCategory)) { ?>
                                <h4 class="card-title mb-0">Add Sub Category</h4>
                            <?php } else{  ?>
                                <h4 class="card-title mb-0">Edit Sub Category</h4>
                            <?php } ?>
                            <a href="<?= base_url('admin/sub-category'); ?>" class="btn btn-success add-btn" > List</a>
                        </div>
                        <!-- end card header -->
                        <div class="card-body">
                            <div id="customerList">
                                <div class="row g-4 mb-3">
                                    <?php if(empty($singleSubCategory)) { ?>
                                    <form action="<?= base_url('admin/save-sub-category') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                                        <?php } else{  ?>
                                        <form action="<?= base_url('admin/update-sub-category') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                                            <?php } ?>
                                            <div class="live-preview">

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="basiInput" class="form-label">Counselling Head</label>
                                                            <select class="form-control form-select dynamic-data" data-segment="get-catgeorybyhead" data-wrapper=".category_id-wrapper" name="head_id">
                                                                <option value="">Select Counselling Head</option>
                                                                <?php
                                                                $headList = get_master_data('tbl_counselling_head',[]);
                                                                if(!empty($headList)){
                                                                    foreach($headList as $head){ ?>
                                                                        <option value="<?= $head['id']; ?>" <?= (!empty($singleSubCategory) && $head['id'] == $singleSubCategory['head_id']) ? 'selected' : ''; ?>><?= $head['head_name']; ?></option>
                                                                    <?php } } ?>
                                                            </select>
                                                            <span class="text-danger" id="head_id"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="basiInput" class="form-label">Category</label>
                                                            <select class="form-control form-select category_id-wrapper" name="category_id" >
                                                                <option value="">Select Category</option>
                                                                <?php
                                                                $categoryList = get_master_data('tbl_category',[]);
                                                                if(!empty($categoryList)){
                                                                    foreach($categoryList as $category){ ?>
                                                                        <option value="<?= $category['id']; ?>" <?= (!empty($singleSubCategory) && $category['id'] == $singleSubCategory['category_id']) ? 'selected' : ''; ?>><?= $category['category_name']; ?></option>
                                                                    <?php } } ?>
                                                            </select>
                                                            <span class="text-danger" id="category_id"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="basiInput" class="form-label">Sub Category Name</label>
                                                            <input class="form-control" type="text" name="sub_category_name"  placeholder="Sub Category Name" value="<?= (!empty($singleSubCategory)) ? $singleSubCategory['sub_category_name'] : '';?>">
                                                            <input class="form-control" type="hidden" name="sub_category_id"   value="<?= (!empty($singleSubCategory)) ? $singleSubCategory['id'] : '';?>">
                                                            <span class="text-danger" id="sub_category_name"></span>
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="basiInput" class="form-label">Short Name</label>
                                                            <input class="form-control" type="text" name="short_name"  placeholder="Short Name" value="<?= (!empty($singleSubCategory)) ? $singleSubCategory['short_name'] : '';?>">
                                                            <span class="text-danger" id="short_name"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="basiInput" class="form-label">Opens</label>
                                                            <select class="form-control form-select" name="open_id">
                                                                <?php
                                                                $openList = get_master_data('tbl_opens',[]);
                                                                if(!empty($openList)){
                                                                    foreach($openList as $open){ ?>
                                                                        <option value="<?= $open['id']; ?>" <?= (!empty($singleSubCategory) && $open['id'] == $singleSubCategory['open_id']) ? 'selected' : ''; ?>><?= $open['opens']; ?></option>
                                                                    <?php } } ?>
                                                            </select>
                                                            <span class="text-danger" id="open_id"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6" style="margin-top: 15px;">
                                                        <?php if(empty($singleSubCategory)) { ?>
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