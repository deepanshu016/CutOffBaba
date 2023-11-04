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
                              <li class="breadcrumb-item active">Settings</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Site Settings</h4>
               
            </div>
            <!-- end card header -->
            <div class="card-body">
                <div class="live-preview">
                    <form action="<?= base_url('admin/update-site-settings'); ?>" method="POST" enctype="multipart/form-data" class="all-form">
                      <div class="row gy-4">
                          <div class="col-12 col-md-6">
                              <div>
                                  <label for="basiInput" class="form-label">Logo</label>
                                  <input type="file" class="form-control" id="basiInput" name="site_icon">
                                  <span class="text-danger" id="site_icon"></span>
                                  <?php if(!empty($siteSettings)) {  ?>
                                      <img src="<?= base_url('assets/uploads/settings'.'/'.$siteSettings['logo']) ?>" height="100" width="100%">
                                  <?php } ?>
                              </div>
                          </div>
                          <!--end col-->
                          <div class="col-12 col-md-6">
                              <div>
                                  <label for="labelInput" class="form-label">Favicon</label>
                                  <input type="file" class="form-control" id="labelInput" name="favicon">
                                  <span class="text-danger" id="favicon"></span>
                                  <?php if(!empty($siteSettings)) {  ?>
                                      <img src="<?= base_url('assets/uploads/settings'.'/'.$siteSettings['favicon']) ?>" height="100" width="100%">
                                  <?php } ?>
                              </div>
                          </div>
                          <!--end col-->
                          <div class="col-12">
                              <div>
                                  <label for="placeholderInput" class="form-label">Title</label>
                                  <input type="text" class="form-control" id="placeholderInput" placeholder="Title" name="title" value="<?php if(!empty($siteSettings)) { echo $siteSettings['title']; }?>">
                                  <span class="text-danger" id="title"></span>
                              </div>
                          </div>
                          <!--end col-->
                          <div class="col-12">
                              <div>
                                  <label for="valueInput" class="form-label">Description</label>
                                  <textarea class="form-control" aria-label="With textarea" rows="4" name="description"><?php if(!empty($siteSettings)) { echo $siteSettings['description']; }?></textarea>
                                  <span class="text-danger" id="description"></span>
                              </div>
                          </div>
                          <div class="col-12">
                              <div>
                                  <label for="exampleInputdate" class="form-label">Banner Image</label>
                                  <input type="file" class="form-control" id="exampleInputdate" name="banner_image">
                                  <span class="text-danger" id="banner_image"></span>
                                  <?php if(!empty($siteSettings)) {  ?>
                                      <img src="<?= base_url('assets/uploads/settings'.'/'.$siteSettings['banner_image']) ?>" height="100" width="100%">
                                  <?php } ?>
                              </div>
                          </div>
                          <div class="col-12">
                              <div>
                                  <label for="placeholderInput" class="form-label">Meta Title</label>
                                  <input type="text" class="form-control" id="placeholderInput" placeholder="Meta Title" name="meta_title" value="<?php if(!empty($siteSettings)) { echo $siteSettings['meta_title']; }?>">
                                  <span class="text-danger" id="meta_title"></span>
                              </div>
                          </div>
                          <!--end col-->
                          <div class="col-12">
                              <div>
                                  <label for="valueInput" class="form-label">Meta Description</label>
                                  <textarea class="form-control" aria-label="With textarea" rows="4" name="meta_description"><?php if(!empty($siteSettings)) { echo $siteSettings['meta_description']; }?></textarea>
                                  <span class="text-danger" id="meta_description"></span>
                              </div>
                          </div>
                          <!--end col-->
                          <div class="col-12">
                              <div>
                                  <label for="readonlyPlaintext" class="form-label">Keywords</label>
                                  <input type="text" class="form-control" id="readonlyPlaintext" placeholder="Keywords" name="keywords" multiple size="50">
                              </div>
                          </div>
                          <!--end col-->
                          <div class="col-12 col-md-6">
                              <div>
                                  <label for="readonlyInput" class="form-label">Mobile Number</label>
                                  <input type="text" class="form-control" id="readonlyInput" placeholder="Mobile Number" name="mobile_no" value="<?php if(!empty($siteSettings)) { echo $siteSettings['mobile_no']; }?>">
                                  <span class="text-danger" id="mobile_no"></span>
                              </div>
                          </div>
                          <!--end col-->
                          <div class="col-12 col-md-6">
                              <div>
                                  <label for="disabledInput" class="form-label">Email</label>
                                  <input type="text" class="form-control" id="disabledInput" placeholder="Email" name="email" value="<?php if(!empty($siteSettings)) { echo $siteSettings['email']; }?>">
                                  <span class="text-danger" id="email"></span>
                              </div>
                          </div>
                          <!--end col-->
                          <div class="col-12">
                              <div>
                                  <label for="valueInput" class="form-label">Address</label>
                                  <textarea class="form-control" aria-label="With textarea" rows="5" name="address"><?php if(!empty($siteSettings)) { echo $siteSettings['address']; }?></textarea>
                                  <span class="text-danger" id="address"></span>
                              </div>
                          </div>
                          <!--end col-->
                           <div class="col-12">
                              <div>
                                  <label for="exampleInputtime" class="form-label">Terms & Conditions</label>
                                  <textarea class="form-control" aria-label="With textarea" rows="5" name="terms_condition" id="terms_condition_editor"><?php if(!empty($siteSettings)) { echo $siteSettings['terms_condition']; }?></textarea>
                                  <span class="text-danger" id="terms_condition"></span>
                              </div>
                          </div>
                          
                          <!--end col-->
                          <div class="col-12">
                              <div>
                                  <label for="exampleInputdate" class="form-label">About Us</label>
                                  <textarea class="form-control" aria-label="With textarea" rows="5" name="about_us" id="about_us_editor"><?php if(!empty($siteSettings)) { echo $siteSettings['about_us']; }?></textarea>
                                  <span class="text-danger" id="about_us"></span>
                              </div>
                          </div>
                          <!--end col-->
                          <div class="col-12">
                              <div>
                                  <label for="exampleFormControlTextarea5" class="form-label">Who We Are</label>
                                  <textarea class="form-control" aria-label="With textarea" rows="5" name="return_refund" id="return_refund_editor"><?php if(!empty($siteSettings)) { echo $siteSettings['return_refund']; }?></textarea>
                                  <span class="text-danger" id="return_refund"></span>
                              </div>
                          </div>
                          <!--end col-->
                          <div class="col-12">
                              <div>
                                  <label for="exampleInputpassword" class="form-label">Privacy & Policy</label>
                                  <textarea class="form-control" aria-label="With textarea" rows="5" name="privacy_policy" id="privacy_policy_editor"><?php if(!empty($siteSettings)) { echo $siteSettings['privacy_policy']; }?></textarea>
                                  <span class="text-danger" id="privacy_policy"></span>
                              </div>
                          </div>
                          <!--end col-->
                          <div class="col-xxl-3 col-md-6">
                              <div>
                                  <label for="disabledInput" class="form-label">GST</label>
                                  <input type="text" class="form-control" id="disabledInput" placeholder="GST" name="gst" value="<?php if(!empty($siteSettings)) { echo $siteSettings['gst']; }?>">
                              </div>
                          </div>
                          
                          <!--end col-->
                          <div class="col-xxl-3 col-md-6">
                              <div>
                                  <label for="exampleInputdate" class="form-label">One Signal Salt</label>
                                  <input type="text" class="form-control" id="exampleInputdate" placeholder="One Signal Salt" name="onesignal_salt" value="<?php if(!empty($siteSettings)) { echo $siteSettings['onesignal_salt']; }?>">
                              </div>
                          </div>
                          <!--end col-->
                          <div class="col-xxl-3 col-md-6">
                              <div>
                                  <label for="exampleInputdate" class="form-label">One Signal Key</label>
                                  <input type="text" class="form-control" id="exampleInputdate" placeholder="One Signal Key" name="onesignal_key" value="<?php if(!empty($siteSettings)) { echo $siteSettings['onesignal_key']; }?>">
                              </div>
                          </div>
                          <div class="col-xxl-3 col-md-6">
                              <div>
                                  <label for="exampleInputdate" class="form-label">Razorpay Salt</label>
                                  <input type="text" class="form-control" id="exampleInputdate" placeholder="Razorpay Salt" name="razorpay_salt" value="<?php if(!empty($siteSettings)) { echo $siteSettings['razorpay_salt']; }?>">
                              </div>
                          </div>
                          <!--end col-->
                          <div class="col-12 col-md-6">
                              <div>
                                  <label for="exampleInputdate" class="form-label">Razorpay Key</label>
                                  <input type="text" class="form-control" id="exampleInputdate" placeholder="Razorpay Key" name="razorpay_key" value="<?php if(!empty($siteSettings)) { echo $siteSettings['razorpay_key']; }?>">
                              </div>
                          </div>
                          <div class="col-12 col-md-6">
                              <div>
                                  <label for="exampleInputdate" class="form-label">Map API Key</label>
                                  <input type="text" class="form-control" id="exampleInputdate" placeholder="Map API Key" name="map_api_key" value="<?php if(!empty($siteSettings)) { echo $siteSettings['map_api_key']; }?>">
                              </div>
                          </div>
                          <div class="col-12 col-md-6">
                              <div>
                                  <label for="exampleInputdate" class="form-label">Invoice Header Image</label>
                                  <input type="file" class="form-control" id="exampleInputdate" name="invoice_header_img">
                                  <span class="text-danger" id="invoice_header_img"></span>
                                  <?php if(!empty($siteSettings)) {  ?>
                                      <img src="<?= base_url('assets/uploads/settings'.'/'.$siteSettings['invoice_header_img']) ?>" height="100" width="100%">
                                  <?php } ?>
                              </div>
                          </div>
                         
                          <!--end col-->
                          <div class="col-12 col-md-6">
                              <div>
                                  <label for="exampleInputdate" class="form-label">Invoice Footer Image</label>
                                  <input type="file" class="form-control" id="exampleInputdate" name="invoice_footer_img">
                                  <span class="text-danger" id="invoice_footer_img"></span>
                                  <?php if(!empty($siteSettings)) {  ?>
                                      <img src="<?= base_url('assets/uploads/settings'.'/'.$siteSettings['invoice_footer_img']) ?>" height="100" width="100%">
                                  <?php } ?>
                              </div>
                          </div>
                          <div class="col-12">
                              <div>
                                  <label for="exampleInputdate" class="form-label">Invoice Term & Condition</label>
                                  <textarea class="form-control" aria-label="With textarea" rows="5" name="invoice_terms" id="invoice_editor"><?php if(!empty($siteSettings)) { echo $siteSettings['invoice_terms_condition']; }?></textarea>
                                  <span class="text-danger" id="invoice_terms"></span>
                              </div>
                          </div>
                          <div class="col-12">
                              <div>
                                  <label for="valueInput" class="form-label">Featured Course Price</label>
                                  <input class="form-control" placeholder="Featured Course Price" name="featured_course_price" value="<?php if(!empty($siteSettings)) { echo $siteSettings['featured_course_price']; }?>">
                                  <span class="text-danger" id="featured_course_price"></span>
                              </div>
                          </div>
                          <div class="col-12">
                              <div>
                                  <label for="exampleInputpassword" class="form-label">Google Anaytics Code</label>
                                  <textarea class="form-control" aria-label="With textarea" rows="5" name="analytics_code"><?php if(!empty($siteSettings)) { echo $siteSettings['analytics_code']; }?></textarea>
                                  <span class="text-danger" id="analytics_code"></span>
                              </div>
                          </div>
                      </div>
                      <div class="row gy-4">
                        <div class="col-md-3">
                          <div class="d-flex flex-wrap gap-2" style="margin-top:15px;">
                              <button type="submit" class="btn rounded-pill btn-primary waves-effect waves-light" id="update">Update</button>
                          </div>
                        </div>
                      </div>
                    </form>
                    <!--end row-->
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
</div>

    </div>
    <!-- container-fluid -->
</div>
<?php $this->load->view('admin/footer'); ?>