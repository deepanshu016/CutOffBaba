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
                            <li class="breadcrumb-item active">State</li>
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
                    <h4 class="card-title mb-0">State</h4>
                    <div class="col-sm-auto">
                       <div>
                          <a href="<?= base_url('admin/add-state'); ?>" class="btn btn-success add-btn" ><i class="ri-add-line align-bottom me-1"></i> Add State</a>
                           <a href="<?= base_url('admin/country'); ?>" class="btn btn-primary add-btn" ><i class="ri-list-unordered align-bottom me-1"></i> List Country</a>
                           <a href="<?= base_url('admin/district'); ?>" class="btn btn-primary add-btn" > <i class="ri-list-unordered align-bottom me-1"></i> List District</a>
                           <a href="<?= base_url('admin/sub-district'); ?>" class="btn btn-primary add-btn" ><i class="ri-list-unordered align-bottom me-1"></i> Sub District</a>
                           <a href="<?= base_url('admin/import-state'); ?>" class="btn btn-primary add-btn" ><i class="ri-upload-2-line"></i> Import </a>
                           <a href="<?= base_url('admin/export-state'); ?>" class="btn btn-primary add-btn" ><i class="ri-download-2-line"></i> Export </a>

                        </div>
                     </div>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="table-responsive table-card mt-3 mb-1">
                           <table class="table align-middle table-nowrap datatables">
                             <thead class="table-light">
                                <tr>
                                   <th class="sort" data-sort="customer_name">S.No.</th>
                                   <th class="sort" data-sort="id">ID</th>
                                    <th class="sort" data-sort="email">Logo</th>
                                    <th class="sort" data-sort="email">Country</th>
                                   <th class="sort" data-sort="email">State</th>
                                   <th class="sort" data-sort="action">Action</th>
                                </tr>
                             </thead>
                             <tbody class="list form-check-all">
                                <?php if(!empty($stateList)) {
                                      foreach($stateList as $key=>$state){
                                          $countryData = $this->db->get_where('tbl_country',array('id'=>$state['country_id']))->row_array();
                                ?>
                                    <tr>
                                        <td><?= $key+1; ?></td>
                                        <td><?= $state['id'] ?></td>
                                        <td>
                                          <?php if($state['state_logo'] != '' && file_exists(FCPATH.'assets/uploads/state/'.$state['state_logo'])){?>
                                             <img src="<?= base_url('assets/uploads/state/').$state['state_logo'];?>" height="100" width="100">
                                          <?php }else{ ?>
                                             <span class="text-danger">Not Uploaded</span>
                                          <?php } ?>
                                       </td>
                                        <td><?= ($countryData) ? $countryData['name'] : ''; ?></td>
                                        <td><?= $state['name']; ?></td>
                                        <td>
                                           <div class="hstack gap-3 flex-wrap">
                                              <a href="<?= base_url('admin/edit-state'.'/'.$state['id']) ?>" class="link-success fs-15"><i class="ri-edit-box-line"></i></a>
                                              <a href="javascript:void(0);" class="link-danger fs-15 delete-data" data-id="<?= $state['id']; ?>" url="<?= base_url('admin/delete-state'); ?>"><i class="ri-delete-bin-6-fill"></i></a>
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