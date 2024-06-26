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
                            <li class="breadcrumb-item active">Clinical Facility</li>
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
                    <h4 class="card-title mb-0">Clinical Facility</h4>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4">
                          <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/add-clinical-facility'); ?>" class="btn btn-success add-btn" ><i class="ri-add-line align-bottom me-1"></i> Add</a>
                                 <a href="<?= base_url('admin/import-clinical-facility'); ?>" class="btn btn-primary add-btn" ><i class="ri-upload-2-line"></i> Import </a>
                                 <a href="<?= base_url('admin/export-clinical-facility'); ?>" class="btn btn-primary add-btn" ><i class="ri-download-2-line"></i> Export </a>

                              </div>
                          </div>
                       </div>

                       <div class="table-responsive table-card mt-3 mb-1">
                           <table class="table align-middle table-nowrap datatables">
                             <thead class="table-light">
                                <tr>
                                   <th class="sort" data-sort="customer_name">S.No.</th>
                                   <th class="sort" data-sort="id">ID</th>
                                   <th class="sort" data-sort="logo">Logo</th>
                                    <th class="sort" data-sort="email">Clinical Facility</th>
                                   <th class="sort" data-sort="action">Action</th>
                                </tr>
                             </thead>
                             <tbody class="list form-check-all">
                                <?php if(!empty($clinicalFacilityList)) {
                                      foreach($clinicalFacilityList as $key=>$facility){
                                ?>
                                    <tr>
                                        <td><?= $key+1; ?></td>
                                        <td><?= $facility['id']; ?></td>
                                        <td>
                                          <?php if($facility['clinical_facility_logo'] != '' && file_exists(FCPATH.'assets/uploads/clinicalfacility/'.$facility['clinical_facility_logo'])){?>
                                             <img src="<?= base_url('assets/uploads/clinicalfacility/').$facility['clinical_facility_logo'];?>" height="100" width="100">
                                          <?php }else{ ?>
                                             <span class="text-danger">Not Uploaded</span>
                                          <?php } ?>
                                       </td>
                                        <td><?= $facility['facility']; ?></td>
                                        <td>
                                           <div class="hstack gap-3 flex-wrap">
                                              <a href="<?= base_url('admin/edit-clinical-facility'.'/'.$facility['id']) ?>" class="link-success fs-15"><i class="ri-edit-box-line"></i></a>
                                              <a href="javascript:void(0);" class="link-danger fs-15 delete-data" data-id="<?= $facility['id']; ?>" url="<?= base_url('admin/delete-clinical-facility'); ?>"><i class="ri-delete-bin-6-fill"></i></a>
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