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
                              <li class="breadcrumb-item active">Add Image Gallery</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit Image Gallery</li>
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
                    <?php if(empty($singleGallery)) { ?>
                      <h4 class="card-title mb-0">Add Image Gallery</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit Image Gallery</h4>
                    <?php } ?>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/image-gallery'); ?>" class="btn btn-success add-btn" > List</a>
                             </div>
                          </div>
                          <?php if(empty($singleGallery)) { ?>
                            <form action="<?= base_url('admin/save-image-gallery') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-image-gallery') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Event Name</label>
                                          <input class="form-control" type="text" name="event_name"  placeholder="Event Name" value="<?php if(!empty($singleGallery)) { echo $singleGallery['event_name']; }?>">
                                          <input type="hidden" class="form-control" name="gallery_id" value="<?php if(!empty($singleGallery)) { echo $singleGallery['id']; }?>">
                                          <span class="text-danger" id="event_name"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Media Thumnbail</label>
                                          <input class="form-control" type="file" name="thumbnail">
                                          <?php if(!empty($singleGallery)) {  ?>
                                          <img src="<?= base_url('assets/uploads/image_gallery/thumbnail'.'/'.$singleGallery['thumbnail']) ?>" height="100" width="100" class="rounded-circle">
                                         <?php } ?>
                                          <span class="text-danger" id="thumbnail"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Media Images</label>
                                          <input class="form-control" type="file" name="media_images[]" accept="image/*" multiple>
                                          <?php if(!empty($singleGallery)) {  
                                            $CI =& get_instance();
                                            $CI->load->model('MediaImages','images');
                                            $mediaImages = $CI->images->getRecords('tbl_media_images',array('media_id'=>$singleGallery['id']));
                                            foreach($mediaImages as $image){
                                          ?>
                                            <img src="<?= base_url('assets/uploads/video_gallery'.'/'.$image['image']) ?>" height="100" width="100" class="rounded-circle">
                                            <a href="javascript:void(0);" class="font-18 txt-grey pull-right sa-warning label label-danger delete-product-images" data-id="<?= $image['id']; ?>" data-img="<?= $image['image']; ?>" url="<?= base_url('admin/delete-image-gallery-image'); ?>" style='position: absolute;margin-left: -29px;margin-top: 7px;'>X</a>
                                          <?php } }?>
                                          <span class="text-danger" id="thumbnail"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Event Description</label>
                                          <textarea class="form-control" type="text" name="event_description" rows="5"><?php if(!empty($singleGallery)) { echo $singleGallery['event_description']; }?></textarea> 
                                          <span class="text-danger" id="event_description"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                          <label for="basiInput" class="form-label">Event Date</label>
                                          <input class="form-control" type="date" name="event_date" value="<?php if(!empty($singleGallery)) { echo $singleGallery['event_date']; }?>">
                                          <span class="text-danger" id="event_date"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Status</label>
                                          <div class="form-check form-switch form-switch-lg" dir="ltr">
                                              <input type="checkbox" class="form-check-input" id="customSwitchsizelg" name="status"<?php if(!empty($singleGallery) && $singleGallery['status'] == 1) { echo 'checked'; } ?>>
                                          </div>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <?php if(empty($singleGallery)) { ?>
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