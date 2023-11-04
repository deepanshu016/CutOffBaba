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
                            <?php if(empty($singleBlog)) { ?>
                              <li class="breadcrumb-item active">Add News / Blog</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit News / Blog</li>
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
                    <?php if(empty($singleBlog)) { ?>
                      <h4 class="card-title mb-0">Add News / Blog</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit News / Blog</h4>
                    <?php } ?>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/blog'); ?>" class="btn btn-success add-btn" > List</a>
                             </div>
                          </div>
                          <?php if(empty($singleBlog)) { ?>
                            <form action="<?= base_url('admin/save-blog') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-blog') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Blog Name</label>
                                          <input class="form-control" type="text" name="blog_title"  placeholder="Blog Name" value="<?php if(!empty($singleBlog)) { echo $singleBlog['blog_title']; }?>">
                                          <input type="hidden" class="form-control" name="blog_id" value="<?php if(!empty($singleBlog)) { echo $singleBlog['id']; }?>">
                                          <span class="text-danger" id="blog_title"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Blog Image</label>
                                          <input class="form-control" type="file" name="blog_image">
                                          <?php if(!empty($singleBlog)) {  ?>
                                          <img src="<?= base_url('assets/uploads/blogs'.'/'.$singleBlog['blog_image']) ?>" height="100" width="100" class="rounded-circle">
                                         <?php } ?>
                                          <span class="text-danger" id="blog_image"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Short Description</label>
                                          <textarea class="form-control" type="text" name="blog_description" rows="5"><?php if(!empty($singleBlog)) { echo $singleBlog['blog_description']; }?></textarea> 
                                          <span class="text-danger" id="blog_description"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Category</label>
                                          <select class="form-control" name="category_id">
                                            <option value="">-----</option>
                                            <?php if(!empty($categories)) { 
                                              foreach($categories as $key=>$category) { ?>
                                                <option value="<?= $category['id']; ?>"  <?php if(!empty($singleBlog) && $singleBlog['category_id'] == $category['id']) { echo 'selected'; }?>><?= $category['category_name']; ?></option>
                                            <?php } } ?>
                                          </select>
                                          <span class="text-danger" id="category_id"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Full Description</label>
                                            <textarea class="form-control" aria-label="With textarea" name="full_description" id="privacy_policy_editor"><?php if(!empty($singleBlog)) { echo $singleBlog['full_description']; }?></textarea>
                                            <span class="text-danger" id="full_description"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Status</label>
                                          <div class="form-check form-switch form-switch-lg" dir="ltr">
                                              <input type="checkbox" class="form-check-input" id="customSwitchsizelg" name="status"<?php if(!empty($singleBlog) && $singleBlog['status'] == 1) { echo 'checked'; } ?>>
                                          </div>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <?php if(empty($singleBlog)) { ?>
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