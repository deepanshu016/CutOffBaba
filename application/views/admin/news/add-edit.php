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
                            <?php if(empty($singleNews)) { ?>
                              <li class="breadcrumb-item active">Add News</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit News</li>
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
                    <?php if(empty($singleNews)) { ?>
                      <h4 class="card-title mb-0">Add News</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit News</h4>
                    <?php } ?>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/news'); ?>" class="btn btn-success add-btn" > List</a>
                             </div>
                          </div>
                          <?php if(empty($singleNews)) { ?>
                            <form action="<?= base_url('admin/save-news') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-news') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">News Title</label>
                                              <input type="text" class="form-control" placeholder="News Title" name="title" value="<?= (!empty($singleNews)) ? $singleNews['title'] : ''; ?>">
                                              <input type="hidden" class="form-control" name="news_id" value="<?= (!empty($singleNews)) ? $singleNews['id'] : ''; ?>">
                                              <input type="hidden" class="form-control" name="old_news_image" value="<?= (!empty($singleNews)) ? $singleNews['image'] : ''; ?>">
                                              <span class="text-danger" id="title"></span>
                                          </div>
                                      </div>

                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Course</label>
                                              <select class="form-control" name="course_id">
                                                  <option value="">Select Course</option>
                                                  <?php
                                                  $courseList = get_master_data('tbl_course',[]);
                                                  if(!empty($courseList)){
                                                      foreach($courseList as $course){ ?>
                                                          <option value="<?= $course['id']; ?>" <?= (!empty($singleNews) && $course['id'] == $singleNews['course_id']) ? 'selected' : ''; ?>><?= $course['course']; ?></option>
                                                      <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="course_id"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">News Image</label>
                                              <input type="file" class="form-control" placeholder="News Image" accept="image/*" name="news_image">
                                              <?php if(!empty($singleNews['image'])) {  ?>
                                                  <img src="<?= base_url('assets/uploads/news'.'/'.$singleNews['image']) ?>" height="100" width="100" class="rounded-circle">
                                              <?php } ?>
                                              <span class="text-danger" id="news_image"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Short Description</label>
                                              <textarea name="short_description" class="form-control" placeholder="Short Description" rows="5" cols="15"><?= (!empty($singleNews)) ? $singleNews['short_description'] : ''; ?></textarea>
                                              <span class="text-danger" id="short_description"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Full Description</label>
                                              <textarea name="full_description" class="form-control" placeholder="Full Description" rows="5" cols="15" id="full_description"><?= (!empty($singleNews)) ? $singleNews['full_description'] : ''; ?></textarea>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <?php if(empty($singleNews)) { ?>
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
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
    $('.keywords').tagify();
    $('.tags').tagify();
</script>
<?php $this->load->view('admin/footer'); ?>