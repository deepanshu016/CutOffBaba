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
                                <?php if(empty($singleCounsellingPlan)) { ?>
                                    <li class="breadcrumb-item active">Add Counselling Plan</li>
                                <?php } else{  ?>
                                    <li class="breadcrumb-item active">Edit Counselling Plan</li>
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
                            <?php if(empty($singleCounsellingPlan)) { ?>
                                <h4 class="card-title mb-0">Add Counselling Plan</h4>
                            <?php } else{  ?>
                                <h4 class="card-title mb-0">Edit Counselling Plan</h4>
                            <?php } ?>
                        </div>
                        <!-- end card header -->
                        <div class="card-body">
                            <div id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto">
                                        <div>
                                            <a href="<?= base_url('admin/counselling-pla'); ?>" class="btn btn-success add-btn" > List</a>
                                        </div>
                                    </div>
                                    <?php if(empty($singleCounsellingPlan)) { ?>
                                    <form action="<?= base_url('admin/save-counselling-plan') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                                        <?php } else{  ?>
                                        <form action="<?= base_url('admin/update-counselling-plan') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                                            <?php } ?>
                                            <div class="live-preview">

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="basiInput" class="form-label">Plan Name</label>
                                                            <input class="form-control" type="text" name="plan_name"  placeholder="Plan Name" value="<?= (!empty($singleCounsellingPlan)) ? $singleCounsellingPlan['plan_name'] : '';?>">
                                                            <input class="form-control" type="hidden" name="plan_id"   value="<?= (!empty($singleCounsellingPlan)) ? $singleCounsellingPlan['id'] : '';?>">
                                                            <span class="text-danger" id="plan_name"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="basiInput" class="form-label">Degree Type</label>
                                                            <select class="form-control" name="degree_type_id">
                                                                <option value="">Select Degree Type</option>
                                                                <?php
                                                                $degreeType = get_master_data('tbl_degree_type',[]);
                                                                if(!empty($degreeType)){
                                                                    foreach($degreeType as $degree){ ?>
                                                                        <option value="<?= $degree['id']; ?>" <?= (!empty($singleCounsellingPlan) && $degree['id'] == $singleCounsellingPlan['degree_type_id']) ? 'selected' : ''; ?>><?= $degree['degreetype']; ?></option>
                                                                    <?php } } ?>
                                                            </select>
                                                            <span class="text-danger" id="degree_type_id"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="basiInput" class="form-label">Course</label>
                                                            <select class="form-control" name="course_id">
                                                                <option value="">Select Course</option>
                                                                <?php
                                                                $courseList = get_master_data('tbl_course',[]);
                                                                if(!empty($courseList)){
                                                                    foreach($courseList as $course){ ?>
                                                                        <option value="<?= $course['id']; ?>" <?= (!empty($singleCounsellingPlan) && $course['id'] == $singleCounsellingPlan['course_id']) ? 'selected' : ''; ?>><?= $course['course']; ?></option>
                                                                    <?php } } ?>
                                                            </select>
                                                            <span class="text-danger" id="course_id"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="basiInput" class="form-label">Discounted Percentage</label>
                                                            <input type="text" class="form-control" placeholder="Discounted Percentage" name="discount_percentage" value="<?= (!empty($singleCounsellingPlan)) ? $singleCounsellingPlan['discount_percentage'] : '';?>">
                                                            <span class="text-danger" id="discount_percentage"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="basiInput" class="form-label">Discounted Price</label>
                                                            <input type="text" class="form-control" placeholder="Discounted Price" name="discounted_price" value="<?= (!empty($singleCounsellingPlan)) ? $singleCounsellingPlan['discounted_price'] : '';?>">
                                                            <span class="text-danger" id="discounted_price"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="basiInput" class="form-label">Description</label>
                                                            <textarea class="form-control"  name="description" placeholder="Description"><?= (!empty($singleCounsellingPlan)) ? $singleCounsellingPlan['description'] : '';?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="basiInput" class="form-label">Terms & Condition</label>
                                                            <textarea class="form-control"  name="terms_condition" id="terms_condition" placeholder="Terms & Condition"> <?= (!empty($singleCounsellingPlan)) ? $singleCounsellingPlan['terms_condition'] : '';?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="basiInput" class="form-label">Paid Counselling Registration</label>
                                                            <textarea class="form-control"  name="paid_counselling_registration" id="paid_counselling_registration" placeholder="Paid Counselling Registration"> <?= (!empty($singleCounsellingPlan)) ? $singleCounsellingPlan['paid_counselling_registration'] : '';?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="basiInput" class="form-label">Payment Info</label>
                                                            <textarea class="form-control"  name="payment_info" id="payment_info" placeholder="Payment Info"><?= (!empty($singleCounsellingPlan)) ? $singleCounsellingPlan['payment_info'] : '';?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6" style="margin-top: 15px;">
                                                        <?php if(empty($singleCounsellingPlan)) { ?>
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