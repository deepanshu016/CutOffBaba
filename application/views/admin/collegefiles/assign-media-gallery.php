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
                                <li class="breadcrumb-item active">Assign Media</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-xxl-6">
                        <h5 class="mb-3">Assign Media</h5>
                        <div class="card">
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="basiInput" class="form-label">Gallery Heads</label>
                                                <input type="hidden" class="college_id" value="<?= @$college_id; ?>">
                                                <select class="form-control gallery_heads" name="gallery_heads">
                                                    <option value="">Select</option>
                                                    <?php
                                                    $galleryHeads = get_master_data('tbl_gallery_heads',[]);
                                                    if(!empty($galleryHeads)){
                                                        foreach($galleryHeads as $head){

                                                            ?>
                                                            <option value="<?= $head['id']; ?>"><?= $head['head_name']; ?></option>
                                                        <?php } } ?>
                                                    <option value="college_logo">College Logo</option>
                                                    <option value="college_banner">College Banner</option>
                                                    <option value="prospectus_file">Prospectus File</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-auto">
                                            <div>
                                                <a href="javascript:void(0);" class="btn btn-success add-btn save-button submit-button" style="display: none;"> Save Data</a>
                                            </div>
                                        </div>
                                        <div class="col-sm-auto">
                                            <div>
                                                <a href="javascript:void(0);" class="btn btn-success add-btn delete-media-button" style="display: none;"> Delete Media</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav nav-pills nav-justified mb-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link waves-effect waves-light active" data-bs-toggle="tab" href="#pill-justified-home-1" role="tab">
                                            Images
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link waves-effect waves-light" data-bs-toggle="tab" href="#pill-justified-profile-1" role="tab">
                                            Video
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link waves-effect waves-light" data-bs-toggle="tab" href="#pill-justified-messages-1" role="tab">
                                            Documents
                                        </a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content text-muted">
                                    <div class="tab-pane active" id="pill-justified-home-1" role="tabpanel">
                                        <div class="d-flex">
                                            <div class="flex-grow-1 ms-2">
                                                <div class="col-md-12">
                                                    <div class="row media-data-with-checkbox">
                                                        <?php if(!empty($imageData)) {
                                                            foreach($imageData as $image){

                                                        ?>
                                                            <div class="col-md-2">
                                                                <input type="checkbox" name="photo_id[]" value="<?= $image['id']; ?>" class="checkbox" data-file="<?= $image['file_name']; ?>">
                                                                <img src="<?= base_url('assets/uploads/media/image'.'/'.$image['file_name']) ?>" height="100" width="100">
                                                            </div>
                                                        <?php } } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="pill-justified-profile-1" role="tabpanel">
                                        <div class="d-flex">
                                            <div class="flex-grow-1 ms-2">
                                                <div class="col-md-12">
                                                    <div class="row media-data-with-checkbox">
                                                        <?php if(!empty($videoData)) {
                                                            foreach($videoData as $video){

                                                                ?>
                                                                <div class="col-md-2">
                                                                    <input type="checkbox" name="photo_id[]" value="<?= $video['id']; ?>" class="checkbox" data-file="<?= $video['file_name']; ?>">
                                                                    <img src="<?= base_url('assets/uploads/media/video'.'/'.$video['file_name']) ?>" height="100" width="100">
                                                                </div>
                                                            <?php } } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="pill-justified-messages-1" role="tabpanel">
                                        <div class="d-flex">
                                            <div class="flex-grow-1 ms-2">
                                                <div class="col-md-12">
                                                    <div class="row media-data-with-checkbox">
                                                        <?php if(!empty($docData)) {
                                                            foreach($docData as $doc){

                                                                ?>
                                                                <div class="col-md-2">
                                                                    <input type="checkbox" name="photo_id[]" value="<?= $doc['id']; ?>" class="checkbox" data-file="<?= $doc['file_name']; ?>">
                                                                    <img src="<?= base_url('assets/uploads/media/doc'.'/'.$doc['file_name']) ?>" height="100" width="100">
                                                                </div>
                                                            <?php } } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- end card-body -->
                        </div><!-- end card -->
                    </div>
                </div>
                <!-- end col -->
            </div>

        </div>
        <!-- container-fluid -->
    </div>
<?php $this->load->view('admin/footer'); ?>