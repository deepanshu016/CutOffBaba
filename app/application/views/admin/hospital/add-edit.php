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
                            <?php if(empty($singleHospital)) { ?>
                              <li class="breadcrumb-item active">Add Hospital</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit Hospital</li>
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
                    <?php if(empty($singleHospital)) { ?>
                      <h4 class="card-title mb-0">Add Hospital</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit Hospital</h4>
                    <?php } ?>
                    <a href="<?= base_url('admin/hospital'); ?>" class="btn btn-success add-btn" > List</a>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <?php if(empty($singleHospital)) { ?>
                            <form action="<?= base_url('admin/save-hospital') ?>" method="POST" enctype="multipart/form-data" class="all-form" >
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-hospital') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Hospital Name<span class="text-danger">*</span></label>
                                              <input type="text" class="form-control" placeholder="Hospital Name" name="hospital_name" value="<?= (!empty($singleHospital)) ? $singleHospital['hospital_name'] : ''; ?>">
                                              <input type="hidden" class="form-control hospital_id" name="hospital_id" value="<?= (!empty($singleHospital)) ? $singleHospital['id'] : ''; ?>">
                                              <span class="text-danger" id="hospital_name"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">College<span class="text-danger">*</span></label>
                                              <select class="form-control get_college_facilities" name="college_id">
                                                  <option value="">Select College</option>
                                                  <?php
                                                  if(!empty($collegeList)){
                                                      foreach($collegeList as $college){ ?>
                                                        <option value="<?= $college['id']; ?>" <?= (!empty($singleHospital) && $college['id'] == $singleHospital['college_id']) ? 'selected' : ''; ?>><?= $college['full_name']; ?></option>
                                                  <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="college_id"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12 facility_data">
                                        
                                        <?php
                                           if(!empty($singleHospital)){  
                                            $this->load->view('admin/hospital/facility_data',['facilitiesList'=>$facilitiesList,'singleHospital'=>$singleHospital]);   
                                        
                                        } ?>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <?php if(empty($singleHospital)) { ?>
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

<script src="<?=base_url('/')?>assets/site/js/CommonLib.js"></script>
<script type="text/javascript">
$(document).on('click','div',function(){
  $('.cke_toolbar_break').remove();
  //alert('');
});
$("body").on("change",".get_college_facilities",function(){
        var currentWrapper = $(this);
        var id = currentWrapper.val();
        var hospital_id = $(".hospital_id").val();
        var url ="<?= base_url('admin/get-college-facilities'); ?>"
        var method = 'POST';
        var formData = new FormData();
        formData.append('id',id);
        formData.append('hospital_id',hospital_id);
        CommonLib.ajaxForm(formData,method,url).then(d=>{
            console.log(d)
            if(d.status === 200){
                $(".facility_data").html(d.html);
            }else{
                CommonLib.notification.error(d.message);
            }
        }).catch(e=>{
                CommonLib.notification.error(e.responseJSON.errors);
        });
    });
</script>