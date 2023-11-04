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
                            <?php if(empty($singleTestimonial)) { ?>
                              <li class="breadcrumb-item active">Add Testimonial</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit Testimonial</li>
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
                    <?php if(empty($singleTestimonial)) { ?>
                      <h4 class="card-title mb-0">Add Testimonial</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit Testimonial</h4>
                    <?php } ?>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/testimonial'); ?>" class="btn btn-success add-btn" > List</a>
                             </div>
                          </div>
                          <?php if(empty($singleTestimonial)) { ?>
                            <form action="<?= base_url('admin/save-testimonial') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-testimonial') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Name</label>
                                          <input class="form-control" type="text" name="name"  placeholder="Name" value="<?php if(!empty($singleTestimonial)) { echo $singleTestimonial['name']; }?>">
                                          <input type="hidden" class="form-control" name="testimonial_id" value="<?php if(!empty($singleTestimonial)) { echo $singleTestimonial['id']; }?>">
                                          <span class="text-danger" id="name"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Rating</label>
                                          <input class="form-control" type="number" name="rating"  placeholder="Rating" value="<?php if(!empty($singleTestimonial)) { echo $singleTestimonial['rating']; }?>" maxlength="5">
                                          <span class="text-danger" id="rating"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Designation</label>
                                          <input class="form-control" type="text" name="designation"  placeholder="Designation" value="<?php if(!empty($singleTestimonial)) { echo $singleTestimonial['designation']; }?>">
                                          <span class="text-danger" id="designation"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Image</label>
                                          <input class="form-control" type="file" name="image">
                                          <?php if(!empty($singleTestimonial)) {  ?>
                                          <img src="<?= base_url('assets/uploads/testimonial'.'/'.$singleTestimonial['image']) ?>" height="100" width="100" class="rounded-circle">
                                         <?php } ?>
                                          <span class="text-danger" id="image"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Comment</label>
                                          <textarea class="form-control" type="text" name="comment" rows="5"><?php if(!empty($singleTestimonial)) { echo $singleTestimonial['comment']; }?></textarea> 
                                          <span class="text-danger" id="comment"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <?php if(empty($singleTestimonial)) { ?>
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