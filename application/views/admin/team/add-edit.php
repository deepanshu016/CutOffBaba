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
                            <?php if(empty($singleTeam)) { ?>
                              <li class="breadcrumb-item active">Add Team</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit Team</li>
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
                    <?php if(empty($singleTeam)) { ?>
                      <h4 class="card-title mb-0">Add Team</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit Team</h4>
                    <?php } ?>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/team'); ?>" class="btn btn-success add-btn" > List</a>
                             </div>
                          </div>
                          <?php if(empty($singleTeam)) { ?>
                            <form action="<?= base_url('admin/save-team') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-team') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Name</label>
                                          <input class="form-control" type="text" name="name"  placeholder="Name" value="<?php if(!empty($singleTeam)) { echo $singleTeam['name']; }?>">
                                          <input type="hidden" class="form-control" name="team_id" value="<?php if(!empty($singleTeam)) { echo $singleTeam['id']; }?>">
                                          <span class="text-danger" id="name"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Group</label>
                                          <select class="form-control" name="group_id">
                                            <option value="">-----Select------</option>
                                            <option value="1">Core Team</option>
                                            <option value="2">Mentors & Advisory</option>
                                          </select>
                                          <span class="text-danger" id="department_id"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Designation</label>
                                          <input class="form-control" type="text" name="designation"  placeholder="Designation" value="<?php if(!empty($singleTeam)) { echo $singleTeam['designation']; }?>">
                                          <span class="text-danger" id="designation"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Image</label>
                                          <input class="form-control" type="file" name="image">
                                          <?php if(!empty($singleTeam)) {  ?>
                                          <img src="<?= base_url('assets/uploads/teams'.'/'.$singleTeam['image']) ?>" height="100" width="100" class="rounded-circle">
                                         <?php } ?>
                                          <span class="text-danger" id="image"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">About</label>
                                          <textarea class="form-control" type="text" name="about" rows="5"><?php if(!empty($singleTeam)) { echo $singleTeam['about']; }?></textarea> 
                                          <span class="text-danger" id="about"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <fieldset>
                                    <legend>Social Links</legend>
                                    <div class="row">
                                      <div class="col-lg-6">
                                         <div class="form-group">
                                            <label for="basiInput" class="form-label">Facebook</label>
                                           <input class="form-control" type="text" name="facebook"  placeholder="Facebook" value="<?php if(!empty($singleTeam)) { echo $singleTeam['facebook']; }?>">
                                            <span class="text-danger" id="facebook"></span>
                                         </div>
                                      </div>
                                      <div class="col-lg-6">
                                         <div class="form-group">
                                            <label for="basiInput" class="form-label">Twitter</label>
                                           <input class="form-control" type="text" name="twitter"  placeholder="Twitter" value="<?php if(!empty($singleTeam)) { echo $singleTeam['twitter']; }?>">
                                            <span class="text-danger" id="twitter"></span>
                                         </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-6">
                                         <div class="form-group">
                                            <label for="basiInput" class="form-label">Linkedin</label>
                                           <input class="form-control" type="text" name="linkedin"  placeholder="Linkedin" value="<?php if(!empty($singleTeam)) { echo $singleTeam['linkedin']; }?>">
                                            <span class="text-danger" id="linkedin"></span>
                                         </div>
                                      </div>
                                      <div class="col-lg-6">
                                         <div class="form-group">
                                            <label for="basiInput" class="form-label">Youtube</label>
                                           <input class="form-control" type="text" name="youtube"  placeholder="Youtube" value="<?php if(!empty($singleTeam)) { echo $singleTeam['youtube']; }?>">
                                            <span class="text-danger" id="youtube"></span>
                                         </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-6">
                                         <div class="form-group">
                                            <label for="basiInput" class="form-label">Website</label>
                                           <input class="form-control" type="text" name="website"  placeholder="Website" value="<?php if(!empty($singleTeam)) { echo $singleTeam['website']; }?>">
                                            <span class="text-danger" id="website"></span>
                                         </div>
                                      </div>
                                      <div class="col-lg-6">
                                         <div class="form-group">
                                            <label for="basiInput" class="form-label">Instagram</label>
                                           <input class="form-control" type="text" name="instagram"  placeholder="Instagram" value="<?php if(!empty($singleTeam)) { echo $singleTeam['instagram']; }?>">
                                            <span class="text-danger" id="instagram"></span>
                                         </div>
                                      </div>
                                    </div>
                                  </fieldset>
                                  <div class="row">
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <?php if(empty($singleTeam)) { ?>
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