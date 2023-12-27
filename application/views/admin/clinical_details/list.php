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
                                <li class="breadcrumb-item active">Clinical Details</li>
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
                            <h4 class="card-title mb-0">Clinical Details</h4>
                        </div>
                        <!-- end card header -->
                        <div class="card-body">
                            <div id="customerList">
                                <div class="row g-4">
                                    <div class="col-sm-auto">
                                        <div>
                                            <a href="<?= base_url('admin/add-clinical-details'); ?>" class="btn btn-success add-btn" ><i class="ri-add-line align-bottom me-1"></i> Add</a>
                                            <a href="<?= base_url('admin/import-clinical-details'); ?>" class="btn btn-primary add-btn" ><i class="ri-upload-2-line"></i> Import </a>
                                            <a href="<?= base_url('admin/export-clinical-details'); ?>" class="btn btn-primary add-btn" ><i class="ri-download-2-line"></i> Export </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive table-card mt-3 mb-1">
                                    <table class="table align-middle table-nowrap datatables">
                                        <thead class="table-light">
                                        <tr>
                                            <th class="sort" data-sort="customer_name">S.No.</th>
                                            <th class="sort" data-sort="id">ID</th>
                                            <th class="sort" data-sort="email">Clinical Detail</th>
                                            <th class="sort" data-sort="action">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                        <?php if(!empty($clinicalDetailsList)) {
                                            foreach($clinicalDetailsList as $key=>$details){
                                                ?>
                                                <tr>
                                                    <td><?= $key+1; ?></td>
                                                    <td><?= $details['id'] ?></td>
                                                    <td><?= $details['clinical_detail']; ?></td>
                                                    <td>
                                                        <div class="hstack gap-3 flex-wrap">
                                                            <a href="<?= base_url('admin/edit-clinical-details'.'/'.$details['id']) ?>" class="link-success fs-15"><i class="ri-edit-box-line"></i></a>
                                                            <a href="javascript:void(0);" class="link-danger fs-15 delete-data" data-id="<?= $details['id']; ?>" url="<?= base_url('admin/delete-clinical-details'); ?>"><i class="ri-delete-bin-6-fill"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } } ?>
                                        </tbody>
                                    </table>

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