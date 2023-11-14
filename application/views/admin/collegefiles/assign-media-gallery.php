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
                                                    <div class="row">
                                                        <?php if(!empty($imageData)) {
                                                            foreach($imageData as $image){
                                                        ?>
                                                            <div class="col-md-2">
                                                                <input type="checkbox" name="photo_id[]" value="<?= $image['id']; ?>">
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
                                            <div class="flex-shrink-0">
                                                <i class="ri-checkbox-circle-fill text-success"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                In some designs, you might adjust your tracking to create a certain artistic effect. It can also help you fix fonts that are poorly spaced to begin with.
                                            </div>
                                        </div>
                                        <div class="d-flex mt-2">
                                            <div class="flex-shrink-0">
                                                <i class="ri-checkbox-circle-fill text-success"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="pill-justified-messages-1" role="tabpanel">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <i class="ri-checkbox-circle-fill text-success"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                Each design is a new, unique piece of art birthed into this world, and while you have the opportunity to be creative and make your own style choices.
                                            </div>
                                        </div>
                                        <div class="d-flex mt-2">
                                            <div class="flex-shrink-0">
                                                <i class="ri-checkbox-circle-fill text-success"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                For that very reason, I went on a quest and spoke to many different professional graphic designers and asked them what graphic design tips they live.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="pill-justified-settings-1" role="tabpanel">
                                        <div class="d-flex mt-2">
                                            <div class="flex-shrink-0">
                                                <i class="ri-checkbox-circle-fill text-success"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                For that very reason, I went on a quest and spoke to many different professional graphic designers and asked them what graphic design tips they live.
                                            </div>
                                        </div>
                                        <div class="d-flex mt-2">
                                            <div class="flex-shrink-0">
                                                <i class="ri-checkbox-circle-fill text-success"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-2">
                                                After gathering lots of different opinions and graphic design basics, I came up with a list of 30 graphic design tips that you can start implementing.
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