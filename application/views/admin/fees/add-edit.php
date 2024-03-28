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
                            <?php if(empty($singleFees)) { ?>
                              <li class="breadcrumb-item active">Add Fees</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit Fees</li>
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
                    <?php if(empty($singleFees)) { ?>
                      <h4 class="card-title mb-0">Add Fees</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit Fees</h4>
                    <?php } ?>
                    <a href="<?= base_url('admin/fees'); ?>" class="btn btn-success add-btn" >  Fees List</a>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <?php if(empty($singleFees)) { ?>
                            <form action="<?= base_url('admin/save-fees') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-fees') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                          <input type="hidden" class="form-control" name="college_fees_id" value="<?= (!empty($singleFees)) ?  $singleFees['id'] : ''; ?>">
                              <div class="live-preview">
                                  <div class="row">
                                      <div class="col-lg-6">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">College</label>
                                              <select class="form-control college_id js-example-basic-multiple form-select" name="college_id" required onchange="getcourses();">
                                                  <option value="">Select</option>
                                                  <?php
                                                  $collegeList = get_master_data('tbl_college',[]);
                                                  if(!empty($collegeList)){
                                                      foreach($collegeList as $college){ ?>
                                                          <option value="<?= $college['id']; ?>" <?= (!empty($singleFees) && $college['id'] == $singleFees['college_id']) ? 'selected' : ''; ?>><?= $college['full_name']; ?></option>
                                                      <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="college_id"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-3">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Course</label>
                                              <select class="form-control course_id form-select" name="course_id" required>
                                                  <option value="">Select</option> 
                                                  <?php
                                                  if(!empty($singleFees)){
                                                    $singleFeesx = $this->master->singleRecord('tbl_college',array('id'=>$singleFees['college_id']));
                                                      $courses=explode(',',$singleFeesx['course_offered']);
                                                    $data='';
                                                    foreach($courses as $course){
                                                        $coursename=$this->master->singleRecord('tbl_course',array('id'=>$course));
                                                        if ($singleFees['course_id']==$course) {
                                                           $data.="<option value='".$course."' selected>".$coursename['course']."</option>";
                                                        }else{
                                                           $data.="<option value='".$course."'>".$coursename['course']."</option>";
                                                        }
                                                       
                                                    }
                                                    echo $data; } ?>                
                                              </select>
                                              <span class="text-danger" id="course_id"></span>
                                          </div>
                                      </div>
                                      <div class="col-lg-3">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Year</label>
                                              <select class="form-control form-select" name="year" required>
                                                  <option value="2024" <?= (!empty($singleFees) && $singleFees['year']=='2024') ? 'selected' : ''; ?>>2024</option>
                                                  <option value="2025" <?= (!empty($singleFees) && $singleFees['year']=='2025') ? 'selected' : ''; ?>>2025</option>
                                              </select>
                                              <span class="text-danger" id="year"></span>
                                          </div>
                                      </div>
                                      <div class="col-12">
                                          <div class="form-group">
                                              <label for="basiInput" class="form-label">Fee Head</label>
                                              <select class="form-control fee_head_id js-example-basic-multiple form-select" required name="fee_head_id" onchange="getfeedetail();">
                                                  <option value="">Select</option>
                                                  <?php
                                                  $feeHeadList = get_master_data('tbl_feeshead',[]);
                                                  if(!empty($feeHeadList)){
                                                      foreach($feeHeadList as $feehead){ ?>
                                                          <option value="<?= $feehead['id']; ?>" <?= (!empty($singleFees) && $feehead['id'] == $singleFees['fee_head_id']) ? 'selected' : ''; ?>><?= $feehead['fee_head_name']; ?></option>
                                                      <?php } } ?>
                                              </select>
                                              <span class="text-danger" id="fee_head_id"></span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12 details" style="margin-top: 15px;">
                                      <?php 
                                      if (!empty($singleFees)) {
                                            echo '<div class="row">
                                                  <div class="col-lg-12">
                                                      <div class="form-group">
                                                          <label for="basiInput" class="form-label">Tution Fees</label>
                                                          <textarea class="form-control" name="tution_fees" id="tution_feess">'.$singleFees['tution_fees'].'</textarea>
                                                          <span class="text-danger" id="tution_fees"></span>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-lg-12">
                                                      <div class="form-group">
                                                          <label for="basiInput" class="form-label">Hostel Fees</label>
                                                          <textarea class="form-control" name="hostel_fees" id="hostel_fees">'.$singleFees['hostel_fees'].'</textarea>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-lg-12">
                                                      <div class="form-group">
                                                          <label for="basiInput" class="form-label">Miscellaneous Fees</label>
                                                          <textarea class="form-control" name="misc_fees" id="misc_fees">'.$singleFees['misc_fees'].'</textarea>
                                                      </div>
                                                  </div>
                                              </div>

                                              <div class="row">
                                                  <div class="col-lg-12">
                                                      <div class="form-group">
                                                          <label for="basiInput" class="form-label">Bank Details 1</label>
                                                          <textarea class="form-control" name="bank_details_1" id="bank_details_1">'.$singleFees['bank_details_1'].'</textarea>
                                                      </div>
                                                  </div>
                                              </div>

                                              <div class="row">
                                                  <div class="col-lg-12">
                                                      <div class="form-group">
                                                          <label for="basiInput" class="form-label">Bank Details 2</label>
                                                          <textarea class="form-control" name="bank_details_2" id="bank_details_2">'.$singleFees['bank_details_2'].'</textarea>
                                                      </div>
                                                  </div>
                                              </div>


                                              <div class="row">
                                                  <div class="col-lg-12">
                                                      <div class="form-group">
                                                          <label for="basiInput" class="form-label">Demand Draft Name</label>
                                                          <input class="form-control" type="text" name="demand_draft_name"  placeholder="Demand Draft Name" value="'.$singleFees['demand_draft_name'].'">
                                                      </div>
                                                  </div>
                                              </div>
                                               <div class="row">
                                                  <div class="col-lg-12">
                                                      <div class="form-group">
                                                          <label for="basiInput" class="form-label">Service & Bond Rules</label>
                                                          <textarea class="form-control" name="bondrule" id="bondrule">'.$singleFees['bondrule'].'</textarea>
                                                      </div>
                                                  </div>
                                              </div>


                                              <div class="row">
                                                  <div class="col-lg-6 col-12">
                                                      <div class="form-group">
                                                          <label for="basiInput" class="form-label">Seat Indemnity Charges</label>
                                                          <input class="form-control" type="text" name="seat_indentity_charges"  placeholder="Seat Indemnity Charges" value="'.$singleFees['seat_indentity_charges'].'">
                                                      </div>
                                                  </div>
                                                  <div class="col-lg-6 col-12">
                                                      <div class="form-group">
                                                          <label for="basiInput" class="form-label">Upgradation Processing Fees</label>
                                                          <input class="form-control" type="text" name="upgradation_processing_fees"  placeholder="Upgradation Processing Fees" value="'.$singleFees['upgradation_processing_fees'].'">
                                                      </div>
                                                  </div>
                                              </div><div class="row">
                                              <div class="col-lg-12">
                                                  <div class="form-group">
                                                      <label for="basiInput" class="form-label">Other Fees</label>
                                                      <textarea class="form-control" name="otfee" id="otfee">'.$singleFees['otfee'].'</textarea>
                                                  </div>
                                              </div>
                                          </div>'; }?>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12" style="margin-top: 15px;">
                                        <?php if(empty($singleFees)) { ?>
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
              </div>
           </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/footer'); ?>
<script type="text/javascript">
function getfeedetail() {
  var id = $(".fee_head_id option:selected").val();
      if (id!="") {
        $.ajax({
        type: 'POST',
        url: "<?=base_url('Admin/fees/getheadetail/');?>"+id,
        data:{'id':id},
        dataType: 'html',
        processData: false,
        contentType: false,
        success: function(data){
            $('.details').html(data);
            $("textarea").each(function () {
        let id = $(this).attr('id');
         CKEDITOR.replace(id);
    });
        }
    }); 
      }
}
function getcourses() {
  var id = $(".college_id option:selected").val();
      if (id!="") {
        $.ajax({
        type: 'POST',
        url: "<?=base_url('Admin/fees/getcourses/');?>"+id,
        data:{'id':id},
        dataType: 'html',
        processData: false,
        contentType: false,
        success: function(data){
            $('.course_id').html(data);
        }
    }); 
      }
}
</script>