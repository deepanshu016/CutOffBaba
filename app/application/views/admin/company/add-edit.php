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
                            <?php if(empty($singleCompany)) { ?>
                              <li class="breadcrumb-item active">Add Company</li>
                            <?php } else{  ?>
                              <li class="breadcrumb-item active">Edit Company</li>
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
                    <?php if(empty($singleCompany)) { ?>
                      <h4 class="card-title mb-0">Add Company</h4>
                    <?php } else{  ?>
                      <h4 class="card-title mb-0">Edit Company</h4>
                    <?php } ?>
                 </div>
                 <!-- end card header -->
                 <div class="card-body">
                    <div id="customerList">
                       <div class="row g-4 mb-3">
                          <div class="col-sm-auto">
                             <div>
                                <a href="<?= base_url('admin/company'); ?>" class="btn btn-success add-btn" > List</a>
                             </div>
                          </div>
                          <?php if(!empty($singleCompany)) {  
                              $CI =& get_instance();
                              $CI->load->model('User');
                              $userDetails = $CI->User->singleRecord('tbl_users',array('id'=>$singleCompany['user_id']));
                           } ?>
                          <?php if(empty($singleCompany)) { ?>
                            <form action="<?= base_url('admin/save-company') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } else{  ?>
                            <form action="<?= base_url('admin/update-company') ?>" method="POST" enctype="multipart/form-data" class="all-form">
                          <?php } ?>
                              <div class="live-preview">
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Company Name</label>
                                          <input class="form-control" type="text" name="company_name"  placeholder="Company Name" value="<?php if(!empty($singleCompany)) { echo $singleCompany['company_name']; }?>">
                                          <input type="hidden" class="form-control" name="company_id" value="<?php if(!empty($singleCompany)) { echo $singleCompany['id']; }?>">
                                          <span class="text-danger" id="company_name"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Company Email</label>
                                          <input class="form-control" type="text" name="company_email" placeholder="Company Email" value="<?php if(!empty($singleCompany)) { echo $singleCompany['email']; }?>">
                                          <span class="text-danger" id="company_email"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Company Mobile</label>
                                          <input class="form-control" type="text" name="company_mobile" placeholder="Company Mobile" value="<?php if(!empty($singleCompany)) { echo $singleCompany['mobile']; }?>">
                                          <span class="text-danger" id="company_mobile"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Company Address</label>
                                          <textarea class="form-control" type="text" name="company_address" rows="5"><?php if(!empty($singleCompany)) { echo $singleCompany['address']; }?></textarea> 
                                          <span class="text-danger" id="company_address"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="labelInput" class="form-label">Company Logo</label>
                                          <input class="form-control" type="file" id="formFileMultiple" name="company_logo">
                                          <span class="text-danger" id="company_logo"></span>
                                       </div>
                                       <?php if(!empty($singleCompany)) {  ?>
                                        <img src="<?= base_url('assets/uploads/company'.'/'.$singleCompany['logo']) ?>" height="100" width="100" class="rounded-circle">
                                       <?php } ?>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="labelInput" class="form-label">Date of Establishment</label>
                                          <input class="form-control" type="date" id="exampleInputdate" name="established_at" value="<?php if(!empty($singleCompany)) { echo $singleCompany['established_at']; }?>" >
                                          <span class="text-danger" id="established_at"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="labelInput" class="form-label">Company Type</label>
                                          <select class="form-control" name="company_type">
                                            <option value="">------Select------</option>
                                              <option value="Sole Proprietorships" <?php if(!empty($singleCompany) && $singleCompany['company_type'] == "Sole Proprietorships") { echo 'selected'; }?>>Sole Proprietorships</option>
                                              <option value="Limited Liability Corporations (LLCs)" <?php if(!empty($singleCompany) && $singleCompany['company_type'] == "Limited Liability Corporations (LLCs)") { echo 'selected'; }?>>Limited Liability Corporations (LLCs)</option>
                                              <option value="S corporations (S-corps)" <?php if(!empty($singleCompany) && $singleCompany['company_type'] == "S corporations (S-corps)") { echo 'selected'; }?>>S corporations (S-corps)</option>
                                              <option value="C corporations (C-corps))"  <?php if(!empty($singleCompany) && $singleCompany['company_type'] == "C corporations (C-corps)") { echo 'selected'; }?>>C corporations (C-corps))</option>
                                          </select>
                                          <span class="text-danger" id="company_type"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="labelInput" class="form-label">Company Service</label>
                                          <select class="form-control" name="company_service">
                                            <option value="">------Select------</option>
                                              <option value="IT Services" <?php if(!empty($singleCompany) && $singleCompany['company_service'] == "IT Services") { echo 'selected'; }?>>IT Services</option>
                                              <option value="Security Services" <?php if(!empty($singleCompany) && $singleCompany['company_service'] == "Security Services") { echo 'selected'; }?>>Security Services</option>
                                              <option value="Product Based" <?php if(!empty($singleCompany) && $singleCompany['company_service'] == "Product Base") { echo 'selected'; }?>>Product Based</option>
                                              <option value="Recruitment Serves" <?php if(!empty($singleCompany) && $singleCompany['company_service'] == "Recruitment Serves") { echo 'selected'; }?>>Recruitment Serves</option>
                                          </select>
                                          <span class="text-danger" id="company_service"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Contact Person Name</label>
                                          <input class="form-control" type="text" name="contact_person_name"  placeholder="Contact Person Name" value="<?php if(!empty($userDetails)) { echo $userDetails['first_name']; }?>">
                                          <span class="text-danger" id="contact_person_name"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Contact Person Designation</label>
                                          <input class="form-control" type="text" name="contact_person_designation"  placeholder="Contact Person Designation" value="<?php if(!empty($singleCompany)) { echo $singleCompany['contact_person_designation']; }?>"> 
                                          <span class="text-danger" id="contact_person_designation"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Contact Person Email</label>
                                          <input class="form-control" type="text" name="contact_person_email"  placeholder="Contact Person Email" value="<?php if(!empty($userDetails)) { echo $userDetails['email']; }?>">
                                          <span class="text-danger" id="contact_person_email"></span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Contact Person Mobile</label>
                                          <input class="form-control" type="text" name="contact_person_mobile"  placeholder="Contact Person Mobile" value="<?php if(!empty($userDetails)) { echo $userDetails['mobile']; }?>">
                                          <input class="form-control" type="hidden" name="user_id"  value="<?php if(!empty($userDetails)) { echo $userDetails['id']; }?>">
                                          <span class="text-danger" id="contact_person_mobile"></span>
                                       </div>
                                    </div>
                                  </div>
                                  <?php if(empty($singleCompany)) {  ?>
                                  <div class="col-12">
                                       <div>
                                          <label for="basiInput" class="form-label">Password</label>
                                            <input class="form-control" type="password" name="password"  placeholder="Contact Person Password">
                                          <span class="text-danger" id="password"></span>
                                       </div>
                                  </div>
                                  <?php } ?>
                                  <div class="col-12">
                                       <div>
                                          <label for="basiInput" class="form-label">About Company</label>
                                            <textarea class="form-control" aria-label="With textarea" rows="5" name="about_company" id="privacy_policy_editor"><?php if(!empty($singleCompany)) { echo $singleCompany['about_company']; }?></textarea>
                                            <span class="text-danger" id="about_company"></span>
                                       </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                          <label for="basiInput" class="form-label">Status</label>
                                          <div class="form-check form-switch form-switch-lg" dir="ltr">
                                              <input type="checkbox" class="form-check-input" id="customSwitchsizelg" name="status"<?php if(!empty($singleCompany) && $singleCompany['status'] == 1) { echo 'checked'; } ?>>
                                          </div>
                                       </div>
                                       <span class="text-danger" id="status"></span>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6" style="margin-top: 15px;">
                                        <?php if(empty($singleCompany)) { ?>
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