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
                            <?php if(empty($singleGallery)) { ?>
                              <li class="breadcrumb-item active">Add Gallery</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit Gallery</li>
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
                 <div class="card-header d-flex justify-content-between">
                    <?php if(empty($singleGallery)) { ?>
                      <h4 class="card-title mb-0">Add Gallery</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit Gallery</h4>
                    <?php } ?>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/gallery'); ?>" class="btn btn-success add-btn" > List</a>
                             </div>
                          </div>
                          <?php if(empty($singleGallery)) { ?>
                            <form action="<?= base_url('admin/save-gallery') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-gallery') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Gallery Section</label>
                                              <select class="form-control view-photo" name="gallery_head">
                                                    <option value="">------Select-----</option>
                                                    <option value="academic" <?= (!empty($singleGallery) && $singleGallery['head'] == 'academic') ? 'selected' : ''; ?>>Academic</option>
                                                    <option value="hostel" <?= (!empty($singleGallery) && $singleGallery['head'] == 'hostel') ? 'selected' : ''; ?>>Hostel</option>
                                                    <option value="hospital" <?= (!empty($singleGallery) && $singleGallery['head'] == 'hospital') ? 'selected' : ''; ?>>Hospital</option>
                                                    <option value="building" <?= (!empty($singleGallery) && $singleGallery['head'] == 'building') ? 'selected' : ''; ?>>Building</option>
                                                    <option value="classroom" <?= (!empty($singleGallery) && $singleGallery['head'] == 'classroom') ? 'selected' : ''; ?>>Classroom</option>
                                              </select>
                                              <input type="hidden" class="form-control" name="gallery_id" value="<?= (!empty($singleGallery)) ? $singleGallery['id'] : ''; ?>">
                                              <input type="hidden" class="form-control" name="old_media" value="<?= (!empty($singleGallery)) ? $singleGallery['media'] : ''; ?>">
                                              <span class="text-danger" id="gallery_head"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Gallery Type</label>
                                              <select class="form-control switch-photo-video" name="gallery_type">
                                                  <option value="">------Select-----</option>
                                                  <option value="photo" <?= (!empty($singleGallery) && $singleGallery['gallery_type'] == 'photo') ? 'selected' : ''; ?>>Photo</option>
                                                  <option value="video" <?= (!empty($singleGallery) && $singleGallery['gallery_type'] == 'video') ? 'selected' : ''; ?>>Video</option>
                                              </select>
                                              <span class="text-danger" id="gallery_type"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <?php
                                        if(!empty($singleGallery) && $singleGallery['gallery_type'] == 'photo'){
                                            $photoStyle = "display: block;";
                                        }else{
                                             $photoStyle = "display: none;";
                                        }
                                      ?>
                                      <div class="col-md-6 gallery-image-show" style="<?= $photoStyle; ?>">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Photo</label>
                                              <input type="file" name="gallery_image" class="form-control" accept="image/*">
                                              <span class="text-danger" id="gallery_image"></span>
                                          </div>
                                      </div>
                                      <?php if(!empty($singleGallery)  && $singleGallery['gallery_type'] == 'photo') { ?>
                                          <img  src="<?= base_url('assets/uploads/gallery_media/image/').$singleGallery['media']; ?>" style="height:100px;width: 100px;">
                                      <?php } ?>
                                      <?php
                                      if(!empty($singleGallery) && $singleGallery['gallery_type'] == 'video'){
                                          $videoStyle = "display: block;";
                                      }else{
                                          $videoStyle = "display: none;";
                                      }
                                      ?>
                                    <div class="col-md-6 gallery-video-show" style="<?= $videoStyle; ?>">
                                      <div class="form-group">
                                            <label for="basiInput" class="form-label">Video</label>
                                            <input type="file" name="gallery_video" class="form-control" accept="video/*">
                                            <span class="text-danger" id="gallery_video"></span>
                                       </div>
                                    </div>
                                  <?php if(!empty($singleGallery)  && $singleGallery['gallery_type'] == 'video') { ?>
                                      <video width="200" height="200" controls>
                                          <source src="<?= base_url('assets/uploads/gallery_media/video/').$singleGallery['media']; ?>">" type="video/mp4">
                                          <source src="<?= base_url('assets/uploads/gallery_media/video/').$singleGallery['media']; ?>" type="video/ogg">
                                      </video>
                                  <?php } ?>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <?php if(empty($singleApproval)) { ?>
                                          <button type="submit" class="btn rounded-pill w-100 btn-success waves-effect waves-light">Save</button>
                                        <?php } else{  ?>
                                          <button type="submit" class="btn rounded-pill w-100 btn-success waves-effect waves-light">Update</button>
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