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
                            <?php if(empty($singleCollege)) { ?>
                              <li class="breadcrumb-item active">Add College</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit College</li>
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
                    <?php if(empty($singleCollege)) { ?>
                      <h4 class="card-title mb-0">Add College</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit College</h4>
                    <?php } ?>
                    <a href="<?= base_url('admin/college'); ?>" class="btn btn-success add-btn" > List</a>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <?php if(empty($singleCollege)) { ?>
                            <form action="<?= base_url('admin/save-college') ?>" method="POST" enctype="multipart/form-data" class="all-form" >
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-college') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">College Full Name<span class="text-danger">*</span></label>
                                              <input type="text" class="form-control" placeholder="College Full Name" name="full_name" value="<?= (!empty($singleCollege)) ? $singleCollege['full_name'] : ''; ?>">
                                              <input type="hidden" class="form-control" name="college_id" value="<?= (!empty($singleCollege)) ? $singleCollege['id'] : ''; ?>">
                                              <input type="hidden" class="form-control" name="old_logo" value="<?= (!empty($singleCollege)) ? $singleCollege['college_logo'] : ''; ?>">
                                              <input type="hidden" class="form-control" name="old_banner" value="<?= (!empty($singleCollege)) ? $singleCollege['college_banner'] : ''; ?>">
                                              <input type="hidden" class="form-control" name="old_prospectus" value="<?= (!empty($singleCollege)) ? $singleCollege['prospectus_file'] : ''; ?>">
                                              <span class="text-danger" id="full_name"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">College Short Name<span class="text-danger">*</span></label>
                                              <input type="text" class="form-control" placeholder="College Short Name" name="short_name" value="<?= (!empty($singleCollege)) ? $singleCollege['short_name'] : ''; ?>">
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">College Popular Name 1</label>
                                              <input type="text" class="form-control" placeholder="College Popular Name 1" name="popular_name_one" value="<?= (!empty($singleCollege)) ? $singleCollege['popular_name_one'] : ''; ?>">
                                          </div>
                                      </div>
                                      
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">College Popular Name 2</label>
                                              <input type="text" class="form-control" placeholder="College Popular Name 2" name="popular_name_two" value="<?= (!empty($singleCollege)) ? $singleCollege['popular_name_two'] : ''; ?>">
                                          </div>
                                      </div>
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Short Description<span class="text-danger">*</span></label>
                                              <textarea name="short_description" id="short_description" class="form-control" placeholder="Short Description" rows="5" cols="15"><?= (!empty($singleCollege)) ? $singleCollege['short_description'] : ''; ?></textarea>
                                              <span class="text-danger" id="short_description"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-4">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Establishment Year</label>
                                              <input type="text" class="form-control" placeholder="Establishment Year" name="establishment" value="<?= (!empty($singleCollege)) ? $singleCollege['establishment'] : ''; ?>">
                                              <span class="text-danger" id="establishment"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-4">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Gender Accepted<span class="text-danger">*</span></label>
                                              <select class="form-control js-example-basic-multiple" name="gender_accepted[]" multiple>
                                                  <option value="">Select Gender</option>
                                                  <?php
                                                  $genderList = get_master_data('tbl_gender',[]);
                                                  $selectedGender = [];
                                                  if(!empty($singleCollege)){
                                                      $selectedGender = explode(",",$singleCollege['gender_accepted']);
                                                  }
                                                  if(!empty($genderList)){
                                                      foreach($genderList as $gender){ ?>
                                                  <option value="<?= $gender['id']; ?>" <?= (!empty($singleCollege) && in_array($gender['id'],$selectedGender)) ? 'selected' : ''; ?>><?= $gender['gender']; ?></option>
                                                  <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="gender_accepted"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-4">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Stream<span class="text-danger">*</span></label>
                                              <select class="form-control  form-select dynamic-data" name="stream" data-segment="get-course" data-wrapper=".course">
                                                  <option value="">Select Stream</option>
                                                  <?php
                                                  $countryList = get_master_data('tbl_stream',[]);
                                                  if(!empty($countryList)){
                                                      foreach($countryList as $country){ ?>
                                                          <option value="<?= $country['id']; ?>" <?= (!empty($singleCollege) && $country['id'] == $singleCollege['stream']) ? 'selected' : ''; ?>><?= $country['stream']; ?></option>
                                                  <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="stream"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Course Offered<span class="text-danger">*</span></label>
                                              <select class="form-control course js-example-basic-multiple" name="course_offered[]" multiple>
                                                  <option value="">Select Course</option>
                                                  <?php
                                                  $courseList = get_master_data('tbl_course',[]);
                                                  $selectedCourse = [];
                                                  if(!empty($singleCollege)){
                                                      $selectedCourse = explode(",",$singleCollege['course_offered']);
                                                  }
                                                  if(!empty($courseList)){
                                                      foreach($courseList as $course){ ?>
                                                          <option value="<?= $course['id']; ?>" <?= (!empty($singleCollege) && in_array($course['id'],$selectedCourse)) ? 'selected' : ''; ?>><?= $course['course']; ?></option>
                                                      <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="course_offered"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Country</label>
                                              <select class="form-control  form-select dynamic-data" name="country" data-segment="get-state" data-wrapper=".state-wrapper">
                                                  <option value="">Select Country<span class="text-danger">*</span></option>
                                                  <?php
                                                  $countryList = get_master_data('tbl_country',[]);
                                                  if(!empty($countryList)){
                                                      foreach($countryList as $country){ ?>
                                                          <option value="<?= $country['id']; ?>" <?= (!empty($singleCollege) && $country['id'] == $singleCollege['country']) ? 'selected' : ''; ?>><?= $country['name']; ?></option>
                                                  <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="country"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">State</label>
                                              <select class="form-control  form-select state-wrapper dynamic-data" name="state" data-segment="get-city" data-wrapper=".city-wrapper">
                                                      <option value="">Select State<span class="text-danger">*</span></option>
                                                      <?php
                                                      if(!empty($singleCollege)){
                                                          $stateList = get_master_data('tbl_state',['country_id'=>$singleCollege['country']]);
                                                          if(!empty($stateList)){
                                                          foreach($stateList as $state){ ?>
                                                          <option value="<?= $state['id']; ?>" <?= (!empty($singleCollege) && $state['id'] == $singleCollege['state']) ? 'selected' : ''; ?>><?= $state['name']; ?></option>
                                                      <?php } } } ?>
                                              </select>
                                              <span class="text-danger" id="state"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">District</label>
                                              <select class="form-control form-select city-wrapper dynamic-data" data-segment="get-subdistrict" data-wrapper=".subdistrict-wrapper" name="city">
                                                  <option value="">Select District<span class="text-danger">*</span></option>
                                                  <?php
                                                       if(!empty($singleCollege)){
                                                          $cityList = get_master_data('tbl_city',['state_id'=>$singleCollege['state']]);
                                                          if(!empty($cityList)){
                                                          foreach($cityList as $city){ ?>
                                                              <option value="<?= $city['id']; ?>" <?= (!empty($singleCollege) && $city['id'] == $singleCollege['city']) ? 'selected' : ''; ?>><?= $city['city']; ?></option>
                                                  <?php } } } ?>
                                              </select>
                                              <span class="text-danger" id="city"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Sub District</label>
                                              <select class="form-control form-select subdistrict-wrapper" name="subdistrict">
                                                  <option value="">Select Sub District<span class="text-danger">*</span></option>
                                                  <?php
                                                       if(!empty($singleCollege)){
                                                          $cityList = get_master_data('tbl_sub_district',['id'=>$singleCollege['sub_district']]);
                                                          if(!empty($cityList)){
                                                          foreach($cityList as $city){ ?>
                                                              <option value="<?= $city['id']; ?>" <?= (!empty($singleCollege) && $city['id'] == $singleCollege['sub_district']) ? 'selected' : ''; ?>><?= $city['sub_district']; ?></option>
                                                  <?php } } } ?>
                                              </select>
                                              <span class="text-danger" id="city"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Approved By<span class="text-danger">*</span></label>
                                              <select class="form-control js-example-basic-multiple" name="approved_by[]" multiple>
                                                  <?php
                                                  $appby=explode(',',$singleCollege['approved_by']);
                                                  $approvalList = get_master_data('tbl_approval',[]);
                                                  if(!empty($approvalList)){
                                                      foreach($approvalList as $approval){ ?>
                                                          <option value="<?= $approval['id']; ?>" <?= (!empty($singleCollege) && in_array($approval['id'],$appby)) ? 'selected' : ''; ?>><?= $approval['approval']; ?></option>
                                                      <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="approved_by"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">University Name</label>
                                              <input type="text" class="form-control" placeholder="University" name="university" value="<?= (!empty($singleCollege)) ? $singleCollege['university_name'] : ''; ?>">
                                              <span class="text-danger" id="university"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Facility<span class="text-danger">*</span></label>
                                              <select class="form-control  js-example-basic-multiple" name="facility[]" multiple>
                                                      <option value="">Select Facility</option>
                                                      <?php
                                                        $facby=explode(',',$singleCollege['facility']);
                                                        $facilitiesList = get_master_data('tbl_facilities',[]);
                                                          if(!empty($facilitiesList)){
                                                            foreach($facilitiesList as $facility){ ?>
                                                          <option value="<?= $facility['id']; ?>" <?= (!empty($singleCollege) && in_array($facility['id'],$facby)) ? 'selected' : ''; ?>><?= $facility['facility']; ?></option>
                                                      <?php } }  ?>
                                              </select>
                                              <span class="text-danger" id="facility"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">

                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">College Logo</label>
                                              <input type="file" class="form-control" placeholder="College Logo" accept="image/*" name="college_logo">
                                              <?php if(!empty($singleCollege['college_logo'])) {  ?>
                                                  <img src="<?= base_url('assets/uploads/college/logo'.'/'.$singleCollege['college_logo']) ?>" height="100" width="100" class="rounded-circle">
                                              <?php } ?>
                                              <span class="text-danger" id="college_logo"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Banner</label>
                                              <input type="file" class="form-control" placeholder="Banner" accept="image/*" name="college_banner">
                                              <?php if(!empty($singleCollege['college_banner'])) {  ?>
                                                  <img src="<?= base_url('assets/uploads/college/banner'.'/'.$singleCollege['college_banner']) ?>" height="100" width="100" class="rounded-circle">
                                              <?php } ?>
                                              <span class="text-danger" id="college_banner"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">

                                  </div>
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Prospectus File</label>
                                              <input type="file" class="form-control" placeholder="Prospectus File" name="prospectus_file">
                                              <?php if(!empty($singleCollege['prospectus_file'])) {  ?>
                                                  <i class="ri-links-line"></i> <a href="<?= base_url('assets/uploads/college/prospectus_file'.'/'.$singleCollege['prospectus_file']) ?>" download><?= $singleCollege['prospectus_file']; ?></a>
                                              <?php } ?>
                                              <span class="text-danger" id="prospectus_file"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Ownership<span class="text-danger">*</span></label>
                                              <select class="form-control" name="ownership">
                                                  <option value="">Select</option>
                                                  <?php
                                                  $ownerShip = get_master_data('tbl_ownership',[]);
                                                  if(!empty($ownerShip)){
                                                      foreach($ownerShip as $owner){ ?>
                                                          <option value="<?= $owner['id']; ?>" <?= (!empty($singleCollege) && $owner['id'] == $singleCollege['ownership']) ? 'selected' : ''; ?>><?= $owner['title']; ?></option>
                                                  <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="ownership"></span>
                                          </div>
                                      </div>

                                  </div>
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Website</label>
                                              <input type="text" class="form-control" placeholder="Website" name="website" value="<?= (!empty($singleCollege)) ? $singleCollege['website'] : ''; ?>">
                                              <span class="text-danger" id="website"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Email</label>
                                              <input type="text" class="form-control" placeholder="Email" name="email" value="<?= (!empty($singleCollege)) ? $singleCollege['email'] : ''; ?>">
                                              <span class="text-danger" id="email"></span>
                                          </div>
                                      </div>

                                  </div>
                                  <div class="row">
                                      <div class="col-lg-4">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Contact Number 1</label>
                                              <input type="text" class="form-control" placeholder="Contact Number 1" name="contact_one" value="<?= (!empty($singleCollege)) ? $singleCollege['contact_one'] : ''; ?>">
                                              <span class="text-danger" id="contact_one"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-4">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Contact Number 2</label>
                                              <input type="text" class="form-control" placeholder="Contact Number 2" name="contact_two" value="<?= (!empty($singleCollege)) ? $singleCollege['contact_two'] : ''; ?>">
                                          </div>
                                      </div>
                                      <div class="col-lg-4">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Contact Number 3</label>
                                              <input type="text" class="form-control" placeholder="Contact Number 3" name="contact_three" value="<?= (!empty($singleCollege)) ? $singleCollege['contact_three'] : ''; ?>">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Nodal Officer Name</label>
                                              <input type="text" class="form-control" placeholder="Nodal Officer Name" name="nodal_officer_name" value="<?= (!empty($singleCollege)) ? $singleCollege['nodal_officer_name'] : ''; ?>">
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Nodal Officer Number</label>
                                              <input type="text" class="form-control" placeholder="Nodal Officer Number" name="nodal_officer_no" value="<?= (!empty($singleCollege)) ? $singleCollege['nodal_officer_no'] : ''; ?>">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Keywords</label>
                                              <input type="text" class="form-control keywords" placeholder="Keywords" name="keywords[]" value="<?= (!empty($singleCollege)) ? $singleCollege['keywords'] : ''; ?>" >
                                          </div>
                                      </div>
                                      <div class="col-lg-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Tags</label>
                                              <input type="text" class="form-control tags" placeholder="Tags" name="tags[]" value="<?= (!empty($singleCollege)) ? $singleCollege['tags'] : ''; ?>">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <?php if(empty($singleCollege)) { ?>
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
<script type="text/javascript">
$(document).on('click','div',function(){
  $('.cke_toolbar_break').remove();
  //alert('');
})
</script>