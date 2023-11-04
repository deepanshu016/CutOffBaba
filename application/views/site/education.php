<?php include_once('header.php') ?>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'>
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
							<form class="all-form container" method="POST" action="<?= base_url('add-education-details'); ?>" enctype="multipart/form-data">
							<p class="title">Educational Qualification</p>
							<div class="row">
								<div class="form-group col-md-6 mb-3">
									<label>Course/Degree <span class="text-danger"> * </span> </label>
									<input type="text" name="qualification" placeholder="Course/Degree" class="form-control" value="<?= (!empty($singleEducation)) ? $singleEducation['qualification'] : ''; ?>">
									<input type="hidden" name="user_id"class="form-control" value="<?= @$user_session['id']; ?>">
									<input type="hidden" name="education_id"class="form-control"  value="<?= (!empty($singleEducation)) ? $singleEducation['id'] : ''; ?>">
									<span id="qualification" style="color: red;"></span>
								</div>
								<div class="form-group col-md-6 mb-3">
									<label>Institute Name <span class="text-danger"> * </span> </label>
									<input type="text" name="institute_name" placeholder="Institute Name" class="form-control" value="<?= (!empty($singleEducation)) ? $singleEducation['institute_name'] : ''; ?>">
									<span id="institute_name" style="color: red;"></span>
								</div>
								<div class="form-group col-md-6 mb-3">
									<label>Course Name *</label>
									<select class="form-control" name="course_type">
										<option value="">-------</option>
										<option value="UG" <?= (!empty($singleEducation) && $singleEducation['degree'] == 'UG') ? 'selected' : ''; ?>>Under Graduate</option>
										<option value="PG" <?= (!empty($singleEducation) && $singleEducation['degree'] == 'PG') ? 'selected' : ''; ?>>Post Graduate</option>
										<option value="Matriculation" <?= (!empty($singleEducation) && $singleEducation['degree'] == 'Matriculation') ? 'selected' : ''; ?>>Matriculation</option>
										<option value="Intermediate" <?= (!empty($singleEducation) && $singleEducation['degree'] == 'Intermediate') ? 'selected' : ''; ?>>Intermediate</option>
									</select>
									<span id="course_type" style="color: red;"></span>
								</div>


								<div class="form-group col-md-6 mb-3">
									<label>Specialization *</label>
									<input type="text" name="specialization" placeholder="Specialization" class="form-control" value="<?= (!empty($singleEducation)) ? $singleEducation['specialization'] : ''; ?>">
									<span id="specialization" style="color: red;"></span>
								</div>	
								<div class="form-group col-md-6 mb-3">
									<label>Session Starts From *</label>
									<select class="form-control" name="start_year">
										<option value="">-------</option>
										<?php 
											for($i=1990;$i<=2030;$i++){
										?>
											<option value="<?= $i; ?>" <?= (!empty($singleEducation) && $singleEducation['start_year'] == $i) ? 'selected' : ''; ?>><?= $i; ?></option>
										<?php }  ?>
									</select>
									<span id="start_year" style="color: red;"></span>
								</div>


								<div class="form-group col-md-6 mb-3">
									<label>Passing Year *</label>
									<select class="form-control" name="end_year">
									<option value="">-------</option>
									<?php 
											for($i=1990;$i<=2030;$i++){
										?>
											<option value="<?= $i; ?>" <?= (!empty($singleEducation) && $singleEducation['end_year'] == $i) ? 'selected' : ''; ?>><?= $i; ?></option>
										<?php }  ?>
									</select>
									<span id="end_year" style="color: red;"></span>
								</div>
								
								<div class="form-group d-flex justify-content-end">
									<button type="submit" class="btn btn-success"><?= (empty($singleEducation)) ? 'Add' : 'Update'; ?></button>
								</div>
							</div>
							</form>
							<div class="row">
				<div class="col-12 mx-auto p-4">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>Course</th>
								<th>Institute</th>
								<th>Session</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php if(!empty($educationDetails)) { 
								foreach($educationDetails as $key=>$education){ ?>
							<tr>
								<td><?= $key+1; ?></td>
								<td><?= $education['qualification']; ?></td>
								<td><?= $education['institute_name']; ?></td>
								<td><?= $education['start_year']; ?> - <?= $education['end_year']; ?></td>
								<td> 
									<a href="<?= base_url('edit-education'.'/'.$education['id'].'/'.$education['slug']) ?>"> <i class="fa fa-edit fs-6"></i> </a>
									<a  href="javascript:void(0);" class="link-danger fs-15 delete-data" data-id="<?= $education['id']; ?>" url="<?= base_url('delete-education'); ?>"> <i class="fa fa-trash fs-6 text-danger mx-2"></i></a> 
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