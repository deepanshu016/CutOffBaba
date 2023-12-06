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
                            <li class="breadcrumb-item active">Location</li>
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
                    <h4 class="card-title mb-0">Location</h4>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                           <div class="col-sm-auto">
                               <div>
                                   <a href="<?= base_url('admin/feeshead'); ?>" class="btn btn-success add-btn" ><i class="ri-add-line align-bottom me-1"></i> Fees Head</a>
                                   <a href="<?= base_url('admin/feesdescription'); ?>" class="btn btn-success add-btn" ><i class="ri-add-line align-bottom me-1"></i> Fees Description</a>
                                   <a href="<?= base_url('admin/fees'); ?>" class="btn btn-success add-btn" ><i class="ri-add-line align-bottom me-1"></i> Add Fees</a>
                               </div>
                           </div>
                       </div>
                       <div class="table-responsive table-card mt-3 mb-1">
                           <table class="table align-middle table-nowrap datatables">
                             <thead class="table-light">
                                <tr>
                                   <th class="sort" data-sort="customer_name">S.No.</th>
                                   <th class="sort" data-sort="email">Banner Title</th>
                                   <th class="sort" data-sort="phone">Banner Image</th>
                                   <th class="sort" data-sort="phone">Status</th>
                                   <th class="sort" data-sort="action">Action</th>
                                </tr>
                             </thead>
                             <tbody class="list form-check-all">
                                <?php if(!empty($bannerList)) { 
                                      foreach($bannerList as $key=>$banner){
                                ?>
                                    <tr>
                                        <td><?= $key+1; ?></td>
                                        <td><?= $banner['title']; ?></td>
                                        <td><img src="<?= base_url('assets/uploads/banners'.'/'.$banner['image']) ?>" height="100" width="100" class="rounded-circle"></td>
                                        <?php if($banner['status'] == 0) { ?>
                                            <td><span class="badge bg-danger">Inactive</span></td>
                                        <?php } else { ?>
                                            <td><span class="badge bg-success">Active</span></td>
                                        <?php } ?>
                                        <td>
                                           <div class="hstack gap-3 flex-wrap">
                                              <a href="<?= base_url('admin/edit-banner'.'/'.$banner['id'].'/'.$banner['slug']) ?>" class="link-success fs-15"><i class="ri-edit-box-line"></i></a>
                                              <a href="javascript:void(0);" class="link-danger fs-15 delete-data" data-id="<?= $banner['id']; ?>" url="<?= base_url('admin/delete-banner'); ?>"><i class="ri-delete-bin-6-fill"></i></a>
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