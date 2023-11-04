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
                            <?php if(empty($singleCategory)) { ?>
                              <li class="breadcrumb-item active">Add Category</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit Category</li>
                            <?php } ?>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
           <div class="col-lg-8">
              <div class="card">
                 <div class="card-header">
                    <?php if(empty($singleCategory)) { ?>
                      <h4 class="card-title mb-0">Add Category</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit Category</h4>
                    <?php } ?>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/category'); ?>" class="btn btn-success add-btn" > List</a>
                             </div>
                          </div>
                          <?php if(empty($singleCategory)) { ?>
                            <form action="<?= base_url('admin/save-category') ?>" method="POST" enctype="multipart/form-data">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-category') ?>" method="POST" enctype="multipart/form-data">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Category Name</label>
                                          <input type="text" class="form-control" id="basiInput" placeholder="Category Name" name="category_name" value="<?php if(!empty($singleCategory)) { echo $singleCategory['category_name']; }?>">
                                          <input type="hidden" class="form-control" id="basiInput" placeholder="Category Name" name="category_id" value="<?php if(!empty($singleCategory)) { echo $singleCategory['id']; }?>">
                                          <?php echo form_error('category_name','<p class="text-danger">','</p>'); ?>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="labelInput" class="form-label">Category Icon</label>
                                          <input class="form-control" type="file" id="formFileMultiple" name="category_icon" >
                                          <?php echo form_error('category_icon','<p class="text-danger">','</p>'); ?>
                                       </div>
                                       <?php if(!empty($singleCategory)) {  ?>
                                        <img src="<?= base_url('assets/uploads/category'.'/'.$singleCategory['icon']) ?>" height="100" width="100" class="rounded-circle">
                                        <input type="hidden" class="form-control" id="basiInput" placeholder="Category Name" name="existing_category_icon" value="<?php if(!empty($singleCategory)) { echo $singleCategory['icon']; }?>">
                                       <?php } ?>
                                    </div>
                                  </div>
                                  
                                  <div class="row" style="margin-top:15px;">
                                    <div class="col-md-6">
                                       <div>
                                        <?php if(empty($singleCategory)) { ?>
                                          <button type="submit" class="btn rounded-pill btn-success waves-effect waves-light">Save</button>
                                        <?php } else{  ?>
                                          <button type="submit" class="btn rounded-pill btn-success waves-effect waves-light">Update</button>
                                        <?php } ?>
                                          
                                       </div>
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