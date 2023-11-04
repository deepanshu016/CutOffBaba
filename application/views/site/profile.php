<?php include_once('header.php') ?>

<section>
<?php
	$userData=$this->db->select('*')->where('id',$this->session->userdata('user')['id'])->get('tbl_users')->row_array();
	if(!empty($userData) && $userData['email_verified'] == 0){
?>
<div class="alert alert-danger text-center">
	<p>Your Email is Not Verified yet. Please Check your Email or <a href="<?=base_url('resend-email');?>"> Resend Verification Link</a></p>
</div>
<?php } ?>
	<div class="container-fluid" >
		<div class="row">		
			<?php include_once('user-sidebar.php');?>
			<div class="col-md-8 col-12 mt-3 mb-3 mx-4">
				<div class="w-100 p-5" style="border-radius: 50px;background: linear-gradient(117deg, #FFF 2.08%, rgba(239, 242, 254, 0.00) 94.55%);box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);">
				<form class="all-form container" method="POST" action="<?= base_url('update-user-profile'); ?>" enctype="multipart/form-data">

				<div class="row">
						<div class="col-md-2">
						   <div class="position-relative ">
						      <div style="position:absolute;background:#fff;border-radius:50%;padding:10px;left:80px;bottom:20px"> <input type="file" name="profile_image" class="position-absolute" style="opacity:0;width:100px"> <i class="fa fa-camera"></i></div>

						      <img src="<?= (empty($userDetails['image'])) ? base_url('assets/front/images/logo-left.png') : base_url('assets/uploads/users').'/'.$userDetails['image']; ?>" class="rounded-circle" style="width: 100px;height: 100px;margin: auto;">
						   </div>
						</div>
						<div class="col-md-10">
								<p class="title">Basic Information</p>
								<div class="row">
								<div class="form-group mb-3 col-md-4">
									   <input type="radio" name="profile_type" id="profile_type" value="1" <?= (!empty($userDetails) && $userDetails['profile_type'] == '1') ? 'checked' : ''; ?>><label for="profile_type"> Passionate Photographer</label>
									</div>
									<div class="form-group mb-3 col-md-4">
									   <input type="radio" name="profile_type"  id="profile_type1" value="2" <?= (!empty($userDetails) && $userDetails['profile_type'] == '2') ? 'checked' : ''; ?>><label for="profile_type1"> Professional Photographer</label>
									</div>
									<div class="form-group mb-3 col-md-4">
									   <input type="radio" name="profile_type"  id="profile_type2" value="3" <?= (!empty($userDetails) && $userDetails['profile_type'] == '3') ? 'checked' : ''; ?>><label for="profile_type2"> 19th August Participants</label>
									</div>
									</div>
								</div>
								<span id="profile_type" style="color: red;"></span>
								<div class="form-group mb-3">
									<label for="">Name<span class="text-danger">*</span></label>
									<input type="text" name="name" placeholder="Name" class="form-control" value="<?= @$userDetails['name']; ?>">
									<input type="hidden" name="user_id"class="form-control" value="<?= @$userDetails['id']; ?>">
								</div>
								<div class="form-group mb-3">
								<label for="">Mobile<span class="text-danger">*</span></label>
									<input type="text" name="mobile" placeholder="Mobile No." class="form-control" value="<?= @$userDetails['mobile']; ?>">
								</div>
								<div class="form-group mb-3">
								<label for="">Email<span class="text-danger">*</span></label>
									<input type="text" name="email" placeholder="Email ID" class="form-control" value="<?= @$userDetails['email']; ?>">
								</div>
								<?php

									$citiesPermanent= $this->db->select('*')->where('state_id',$userDetails['permanent_state'])->get('cities')->result_array();
									$citiesCurrent= $this->db->select('*')->where('state_id',$userDetails['current_state'])->get('cities')->result_array();
								?>
								<p class="title mb-4">Contact Information</p>
								<div class="gradient-border">
								<p style="margin-top:-35px;background:#fff;padding:0 10px;width:180px">Permanent Address</p>
								<div class="form-group mb-3 mt-2 permanent-address">
									<label for="">Address<span class="text-danger">*</span></label>
										<input type="text" name="address_permanent" placeholder="Address" class="form-control" value="<?= @$userDetails['permanent_address']; ?>" id="address_permanent">
									</div>
									<div class="form-group mb-3 mt-2 permanent-others">
										<div class="row">
											<div class="col-md-4">
												<label for="">State<span class="text-danger">*</span></label>
												<select name="state_permanent" class="form-control form-select get-city" id="state_permanent" data-wrapper=".city-wrapper-permanent">
													<option value="">--------</option>
													<?php if(!empty($stateList)){ 
														foreach($stateList as $state){ ?>
															<option value="<?= $state['id']; ?>" <?= (!empty($userDetails) && $userDetails['permanent_state'] == $state['id']) ? 'selected' : ''; ?>><?= $state['name']; ?></option>
													<?php } } ?> 
												</select>
											</div>
											<div class="col-md-4">
												<label for="">City<span class="text-danger">*</span></label>
												<select name="city_permanent" class="form-control form-select city-wrapper-permanent" id="city_permanent">
													<?php if(!empty($citiesPermanent)){ 
														foreach($citiesPermanent as $city){ ?>
															<option value="<?= $city['id']; ?>" <?= (!empty($userDetails) && $userDetails['permanent_city'] == $city['id']) ? 'selected' : ''; ?>><?= $city['city']; ?></option>
													<?php } } ?> 
												</select>
											</div>
											<div class="col-md-4">
												<label for="">Pincode<span class="text-danger">*</span></label>
												<input type="text" name="pincode_permanent" placeholder="Pincode" class="form-control" value="<?= @$userDetails['permanent_pincode']; ?>">
												<span id="pincode_permanent" style="color: red;"></span>
											</div>
										</div>
										
									</div>
								
								</div>
								<div class="form-group mb-4 mt-3">
								<input type="checkbox" name="is_address_same" id="checkadd" value="1" class="is_address_same" <?= (!empty($userDetails) && $userDetails['is_address_same'] == '1') ? 'checked' : ''; ?>><label for="checkadd"> Current address is same as Permanent Address</label>
								</div>
								<div class="gradient-border">
								<p style="margin-top:-35px;background:#fff;padding:0 10px;width:150px">Current Address</p>
								<?php if(@$userDetails['is_address_same'] == '1') { ?>
								<div class="form-group mb-3 mt-2 current-address">
									<label for="">Address<span class="text-danger">*</span></label>
										<input type="text" name="address_current" placeholder="Address" class="form-control" value="<?= @$userDetails['permanent_address']; ?>" id="address_current">
									</div>
								<div class="form-group mb-3 mt-2 current-others">
									<div class="row">
										<div class="col-md-4">
											<label for="">State<span class="text-danger">*</span></label>
											<select name="state_current" class="form-control form-select get-city" id="state_current" data-wrapper=".city-wrapper-current">
												<option value="">--------</option>
												<?php if(!empty($stateList)){ 
													foreach($stateList as $state){ ?>
														<option value="<?= $state['id']; ?>" <?= (!empty($userDetails) && $userDetails['permanent_state'] == $state['id']) ? 'selected' : ''; ?>><?= $state['name']; ?></option>
												<?php } } ?> 
											</select>
										</div>
										<div class="col-md-4">
											<label for="">City<span class="text-danger">*</span></label>
											<select name="city_current" class="form-control form-select city-wrapper-current" id="city_current">
												<?php if(!empty($citiesPermanent)){ 
													foreach($citiesPermanent as $city){ ?>
														<option value="<?= $city['id']; ?>" <?= (!empty($userDetails) && $userDetails['permanent_city'] == $city['id']) ? 'selected' : ''; ?>><?= $city['city']; ?></option>
												<?php } } ?> 
											</select>
										</div>
										<div class="col-md-4">
											<label for="">Pincode<span class="text-danger">*</span></label>
											<input type="text" name="pincode_current" placeholder="Pincode" class="form-control" value="<?= @$userDetails['permanent_pincode']; ?>">
											<span id="pincode_current" style="color: red;"></span>
										</div>
									</div>
									
								</div>
								<?php } else{ ?>

									<div class="form-group mb-3 mt-2 current-address">
									<label for="">Address<span class="text-danger">*</span></label>
										<input type="text" name="address_current" placeholder="Address" class="form-control" value="<?= @$userDetails['current_address']; ?>" id="address_current">
									</div>
									<div class="form-group mb-3 mt-2 current-others">
									<div class="row">
										<div class="col-md-4">
											<label for="">State<span class="text-danger">*</span></label>
											<select name="state_current" class="form-control form-select get-city" id="state_current"data-wrapper=".city-wrapper-current">
												<option value="">--------</option>
												<?php if(!empty($stateList)){ 
													foreach($stateList as $state){ ?>
														<option value="<?= $state['id']; ?>" <?= (!empty($userDetails) && $userDetails['current_state'] == $state['id']) ? 'selected' : ''; ?>><?= $state['name']; ?></option>
												<?php } } ?> 
											</select>
										</div>
										<div class="col-md-4">
											<label for="">City<span class="text-danger">*</span></label>
											<select name="city_current" class="form-control form-select city-wrapper-current" id="city_current">
												<?php if(!empty($citiesCurrent)){ 
													foreach($citiesCurrent as $cities){ ?>
														<option value="<?= $cities['id']; ?>" <?= (!empty($userDetails) && $userDetails['current_city'] == $cities['id']) ? 'selected' : ''; ?>><?= $cities['city']; ?></option>
												<?php } } ?> 
											</select>
										</div>
										<div class="col-md-4">
											<label for="">Pincode<span class="text-danger">*</span></label>
											<input type="text" name="pincode_current" placeholder="Pincode" class="form-control" value="<?= @$userDetails['current_pincode']; ?>">
											<span id="pincode_current" style="color: red;"></span>
										</div>
									</div>
									
								</div>
								<?php } ?>	
								</div>
								
								<div class="form-group mb-3 d-flex justify-content-end mt-5">
									<button type="submit" class="btn btn-success">Update</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			    
			</div>
		</div>
	</div>
</section>
<?php include_once('footer.php') ?>