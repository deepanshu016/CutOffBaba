<?php include_once('header.php') ?>

<style type="text/css">
	i{font-size: 24px !important}
	.form-control{border:1px solid #ccc !important;}
	.br-danger{border: 1px solid red !important}
	.v-100{height: 100vh;}
	label.br-danger{border: none !important;text-align: left !important;margin: 0 !important;float: left;clear: both}
	.nav-item{margin-bottom: 15px}
	.nav-item.active{border-radius: 50px;
background: linear-gradient(90deg, #1773EA -77.5%, #1773EA 99.94%);}
.nav-item i{color: #fff !important;font-weight: normal;}
</style>

<section>
<!-- <div class="alert alert-danger text-center">
	<p>Your Email is Not Verified yet. Please Check your Email or <a href="<?=base_url('resend-email');?>"> Resend Verification Link</a></p>
</div> -->	
	<div class="container-fluid" >
		<div class="row">		
		<?php include_once('user-sidebar.php');?>
		<div class="col-md-8 col-12 mt-3 mb-3 mx-4">
		<div class="w-100 p-5" style="border-radius: 50px;background: linear-gradient(117deg, #FFF 2.08%, rgba(239, 242, 254, 0.00) 94.55%);box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);">
				<form class="all-form container" method="POST" action="<?= base_url('add-work-experience'); ?>" enctype="multipart/form-data">
				<p class="title">Work Experience</p>
							<div class="row">
								<div class="form-group mb-3">
									<input type="checkbox" name="is_fresher" id="participate3" value="1" <?= (!empty($singleExperience) && $singleExperience['is_fresher'] == '1') ? 'checked' : ''; ?>>
									<label for="participate"> I am Fresher</label>
								</div>
								<div class="form-group mb-3">
									<input type="checkbox" name="is_fresher" id="participate2" value="0"  <?= (!empty($singleExperience) && $singleExperience['is_fresher'] == '0') ? 'checked' : ''; ?>>
									<label for="participate"> I am Experienced</label>
								</div>
								<span id="is_fresher" style="color: red;"></span>
								<div class="form-group col-md-6 mb-3">
									<label>Company Name <span class="text-danger"> * </span> </label>
										<!-- <select class="form-control js-example-tags">
										  <option>orange</option>
										  <option>white</option>
										  <option>purple</option>
										</select> -->

									<input type="text" name="company_name" placeholder="Company Name" class="form-control" value="<?= @$singleExperience['company_name']; ?>">
									<input type="hidden" name="user_id"class="form-control" value="<?= @$user_session['id']; ?>">
									<input type="hidden" name="experience_id"class="form-control"  value="<?= (!empty($singleExperience)) ? $singleExperience['id'] : ''; ?>">
									<span id="company_name" style="color: red;"></span>
								</div>
								<div class="form-group col-md-6 mb-3">
									<label>Job Role <span class="text-danger"> * </span> </label>
									<input type="text" name="job_role" placeholder="Job Role" class="form-control" value="<?= @$singleExperience['job_role']; ?>">
									<span id="job_role" style="color: red;"></span>
								</div>
								<div class="form-group col-12 mb-3">
									<label>Job Description </label>
									<textarea type="text" name="description" placeholder="Job Description" class="form-control"><?= @$singleExperience['description']; ?></textarea>
									<span id="description" style="color: red;"></span>
								</div>
								
								<div class="form-group col-md-6 mb-3">
									<label>From *</label>
									<input type="date" name="from" placeholder="From" class="form-control" value="<?= @$singleExperience['start_year']; ?>">
									<span id="from" style="color: red;"></span>
								</div>


								<div class="form-group col-md-6 mb-3">
									<label>To *</label>
									<input type="date" name="to_date" placeholder="Job Role" class="form-control" value="<?= @$singleExperience['end_year']; ?>">
									<span id="to_date" style="color: red;"></span>
								</div>
								
								<div class="form-group d-flex justify-content-end">
									<button type="submit" class="btn btn-success"><?= (empty($singleExperience)) ? 'Add' : 'Update'; ?></button>
								</div>
							</div>
							</form>
							<div class="row">
				<div class="col-12 mx-auto p-4">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Company Name</th>
								<th>Job Role</th>
								<th>Duration</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php if(!empty($experienceDetails)) { 
								foreach($experienceDetails as $key=>$experience){ ?>
							<tr>
								<td><?= $key+1; ?></td>
								<td><?= $experience['company_name']; ?></td>
								<td><?= $experience['job_role']; ?></td>
								<td><?= date('Y',strtotime($experience['start_year'])); ?> - <?= date('Y',strtotime($experience['end_year'])); ?></td>
								<td> 
									<a href="<?= base_url('edit-experience'.'/'.$experience['id'].'/'.$experience['slug']) ?>"> <i class="fa fa-edit fs-6"></i> </a>
									<a href="javascript:void(0);" class="link-danger fs-15 delete-data" data-id="<?= $experience['id']; ?>" url="<?= base_url('delete-experience'); ?>"> <i class="fa fa-trash fs-6 text-danger mx-2"></i></a> 
								</td>
							</tr>
							<?php } } ?>
						</tbody>
					</table>
				</div>
			</div>
						</div>
					</div>
				</div>
			    
			</div>
			
		</div>
	</div>
</section>
<?php include_once('footer.php') ?>