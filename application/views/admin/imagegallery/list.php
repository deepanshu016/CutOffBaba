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
                            <li class="breadcrumb-item active">Image Gallery List</li>
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
                    <h4 class="card-title mb-0">Image Gallery List</h4>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/add-image-gallery'); ?>" class="btn btn-success add-btn" ><i class="ri-add-line align-bottom me-1"></i> Add</a>
                             </div>
                          </div>
                       </div>
                       <div class="table-responsive table-card mt-3 mb-1">
                          <table class="table align-middle table-nowrap" id="customerTable">
                             <thead class="table-light">
                                <tr>
                                   <th class="sort" data-sort="s_no">S.No.</th>
                                   <th class="sort" data-sort="banner_title">Event Name</th>
                                   <th class="sort" data-sort="banner_title">Event Date</th>
                                   <th class="sort" data-sort="banner_image">Thumbnail</th>
                                   <th class="sort" data-sort="status">Status</th>
                                   <th class="sort" data-sort="action">Action</th>
                                </tr>
                             </thead>
                             <tbody class="list form-check-all">
                                <?php if(!empty($galleryList)) { 
                                    foreach($galleryList as $key=>$gallery){
                                ?>
                                    <tr>
                                        <td class="s_no"><?= $key+1; ?></td>
                                        <td class="banner_title"><?= $gallery['event_name']; ?></td>
                                        <td class="banner_title"><?= date('d M Y',strtotime($gallery['event_date'])); ?></td>
                                        <?php if(file_exists(FCPATH.'assets/uploads/image_gallery/thumbnail'.'/'.$gallery['thumbnail'])){ ?>
                                          <td class="banner_image"><img src="<?= base_url('assets/uploads/gallery/thumbnail'.'/'.$gallery['thumbnail']) ?>" height="100" width="100" class="rounded-circle"></td>
                                        <?php } else{ ?>
                                          <td class="logo">No Uploaded</td>
                                        <?php } ?>
                                        
                                        <?php if($gallery['status'] == 0) { ?>
                                            <td class="status"><span class="badge bg-danger">Inactive</span></td>
                                        <?php } else { ?>
                                            <td class="status"><span class="badge bg-success">Active</span></td>
                                        <?php } ?>
                                        <td class="action">
                                           <div class="hstack gap-3 flex-wrap">
                                              <a href="<?= base_url('admin/edit-image-gallery'.'/'.$gallery['id'].'/'.$gallery['slug']) ?>" class="link-success fs-15"><i class="ri-edit-box-line"></i></a>
                                              <a href="javascript:void(0);" class="link-danger fs-15 delete-data" data-id="<?= $gallery['id']; ?>" url="<?= base_url('admin/delete-image-gallery'); ?>"><i class="ri-delete-bin-6-fill"></i></a>
                                           </div>
                                        </td>
                                    </tr>
                                <?php } } ?>
                             </tbody>
                          </table>
                          <div class="noresult" style="display: none">
                             <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any orders for you search.</p>
                             </div>
                          </div>
                       </div>
                       <div class="d-flex justify-content-end">
                          <div class="pagination-wrap hstack gap-2">
                             <a class="page-item pagination-prev disabled" href="#">
                             Previous
                             </a>
                             <ul class="pagination listjs-pagination mb-0">
                                <li class="active"><a class="page" href="#" data-i="1" data-page="8">1</a></li>
                             </ul>
                             <a class="page-item pagination-next" href="#">
                             Next
                             </a>
                          </div>
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