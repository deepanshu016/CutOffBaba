<?php $this->load->view('site/header');?>
<main>		
	<!-- <style type="text/css">
.hero_in.restaurant_detail:before{background: url('') no-repeat;background-size: 100% 100%;background-position: center;}
	</style> -->
		<div class="hero_in restaurant_detail" style="no-repeat;background-size: 100% 100%;background-position: center; background-image:url('<?=asset_url()."college/banner/".$collegeDetail['college_banner'];?>');">
			<div class="wrapper">
				<span class="magnific-gallery">
					
				</span>
			</div>
		</div>
		<!--/hero_in-->

		<section class="main_posyion d-none d-sm-block d-sm-none d-md-block">
			<div class="container">
				<div class="row">
					<div class="col-md-2">
						<img class="lofcss" src="<?=asset_url()."college/logo/".$collegeDetail['college_logo'];?>"> 
					</div>
					<div class="col-md-5">
						<h4 class="text-white"><?=$collegeDetail['full_name'];?> ( <?=$collegeDetail['short_name'];?> )</h4> 
						<p class="leftsss"> <i class="fa fa-location-arrow" aria-hidden="true"></i> Amritsar, Punjab  <span> <i class="fa fa-star-o text-white" aria-hidden="true"></i> ESTD 1969 </span>  <span> <i class="fa fa-bookmark-o" aria-hidden="true"></i> Affiliated College : </span> of Baba Farid University of Health Sciences, Faridkot</p>
					</div>
					<div class="col-md-3"><a style="float: right;" href="<?=asset_url()."college/banner/".$collegeDetail['college_logo'];?>" class="btn btn-primary" title="Photo title" >Download Brouchure</a></div>
				</div>
			</div>
		</section>
		
		<nav class="secondary_nav sticky_horizontal_2">
			<div class="container">
				<ul class="clearfix d-flex scrollmenuss justify-content-between">
					<li><a href="#basic" class="active">Overviews</a></li>
					<li><a href="#fees">Courses & Fees</a></li>
					<li><a href="#seat_matrix">Seat Matrix</a></li>
					<li><a href="#rank">Cutoff & Rank</a></li>
					<li><a href="#placement">Placement</a></li>
					<li><a href="#gallery">Gallery</a></li>
					<li><a href="#admission">Admission</a></li>
					<li><a href="#hospital">Hospital Details</a></li>
					<li><a href="#contacts">Contact Us</a></li>

					<li><a href="#reviews">Reviews</a></li>
				</ul>
			</div>
		</nav>
		<?php //echo '<pre>';print_r($collegeDetail); ?>

		<div class="container margin_60_35">
				<div class="row">
					<div class="col-lg-12">
						<section id="basic">
							<div class="row">
							<div class="col-md-9">
								<div class="card card-body">
								<div class="row">
								<div class="col-md-12">
									<h4 class="mainShorst">Short Information</h4>
								</div>
								<div class="clearfix"></div>
								<div class="col-md-4 col-12">
									<div class="form-group">
										<div class="why-choose-box">
											<div class="icon">
											<img src="https://cutoffbaba.com/Icon/ownership.png">
											</div>
											<div class="content">
											<div class="sp-text-second"><b>Ownership</b></div>
											<div id="tdownership1" class="text-justify">Government</div>
											<input type="hidden" name="hfcollegeamt" id="hfcollegeamt" value="0">
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-5 col-12">
									<div class="form-group">
										<div class="why-choose-box">
											<div class="icon">
											<img src="https://cutoffbaba.com/Icon/approved.png">
											</div>
											<div class="content">
											<div class="sp-text-second"><b>Approval</b></div>
											<div id="tdapproval">ECFMG (USA), NMC (Former MCI), WHO</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 col-5">
									<div class="form-group">
										<div class="why-choose-box">
											<div class="icon">
											<img src="https://cutoffbaba.com/Icon/hostel.png">
											</div>
											<div class="content">
											<div class="sp-text-second"><b>Hostel</b></div>
											<div id="tdhostel" class="text-justify">Yes</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4 col-7">
									<div class="why-choose-box">
										<div class="icon">
											<img src="https://cutoffbaba.com/Icon/toilets.png">
										</div>
										<div class="content">
											<div class="sp-text-second"><b>Gender Accepted</b></div>
											<div id="tdgender" class="text-justify">Male &amp; Female</div>
										</div>
									</div>
								</div>
								<div class="col-md-8 col-sm-12">
									<div class="why-choose-box">
										<div class="icon">
											<img src="https://cutoffbaba.com/Icon/university.png">
										</div>
										<div class="content">
											<div class="sp-text-second"><b>University</b></div>
											<div id="tdaffiliated" class="text-justify">West Bengal University of Health Sciences,Kolkata</div>
										</div>
									</div>
								</div>
								</div>
								<div class="row mt-4">
								<div class="col-md-9">Popular Name:&nbsp; <b id="tdpopularname">Govt Medical College Burdwan</b></div>
								<div class="col-md-3">Estd Year:&nbsp; <b id="tdestdyear">1969</b></div>
								<div class="col-md-12">Course Offered:&nbsp; <b id="tdcourse">MBBS, PG Diploma, MD/MS, DM / M.Ch</b></div>
								<div id="tdother1" class="col-md-6"></div>
								<div id="tdother2" class="col-md-6"></div>
							</div>
                        </div>
                     </div>
                     <div class="col-md-3"></div>
                  </div>
							<div class="detail_title_1">
								<h1><?=$collegeDetail['full_name'];?> ( <?=$collegeDetail['short_name'];?> )</h1>
								<a class="address" href="https://www.google.com/maps/dir//Assistance+–+Hôpitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x47e66e1de36f4147:0xb6615b4092e0351f!2sAssistance+Publique+-+Hôpitaux+de+Paris+(AP-HP)+-+Siège!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361"><?=$collegeDetail['full_name'];?></a>
							</div>
							<?=$collegeDetail['short_description'];?>
							<div class="opening">
                                <h4>Basic Details</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul>
                                            <li>Estd. Year : <span><?=$collegeDetail['establishment'];?></span></li>
                                            
                                            <li>Affliated From : <span><?=$collegeDetail['university_name'];?></span></li>
                                            <li>University : <span><?=$collegeDetail['university_name'];?></span></li>
                                            <li>Approved By : <span>9 AM - 5 PM</span></li>
                                             
                                        </ul>
                                    </div>
                                </div>
                            </div>
						</section>
						<section class="hhismns" id="fees">	
							<h3>Course & Fees</h3>
							<?php 
							$courses=explode(",", $collegeDetail['course_offered']);
							 
							$dtype=$this->db->select('distinct(degree_type)')->where_in('id',$courses)->get('tbl_course')->result_array();
							 
							foreach ($dtype as $key => $value) {
								$degree_type=$this->db->select('*')->where_in('id',$value['degree_type'])->get('tbl_degree_type')->result_array();
								?>
								<div role="tablist" class="add_bottom_45 accordion_2" id="payment">
									<div class="card">
										<div class="card-header" role="tab">
											<h5 class="mb-0">
												<a data-bs-toggle="collapse" href="#collapse<?=$key;?>" aria-expanded="true"><i class="indicator ti-minus"></i><?php echo $degree_type[0]['degreetype']; ?></a>
											</h5>
										</div>

										<div id="collapse<?=$key;?>" class="collapse show" role="tabpanel" data-bs-parent="#payment">
											<div class="card-body">
												<?php $courselist=$this->db->select('*')->where('degree_type',$value['degree_type'])->where_in('id',$courses)->get('tbl_course')->result_array();
												foreach ($courselist as $course) {
													$collegeFeesWithCourse = $this->db->select('*')->where('college_id',$course['id'])->where('year',date('Y'))->get('tbl_college_fees')->row_array();
												?>
												<h5 class="title"><?=$course['course_full_name']."( ".$course['course']." )";?></h5>
												<?=$course['course_fees'];?>

												<?= ($collegeFeesWithCourse && $collegeFeesWithCourse['tution_fees']) ? $collegeFeesWithCourse['tution_fees'] : ''; ?>
												<?= ($collegeFeesWithCourse && $collegeFeesWithCourse['hostel_fees']) ? $collegeFeesWithCourse['hostel_fees'] : ''; ?>		
												<?= ($collegeFeesWithCourse && $collegeFeesWithCourse['misc_fees']) ? $collegeFeesWithCourse['misc_fees'] : ''; ?>		
												<?= ($collegeFeesWithCourse && $collegeFeesWithCourse['seat_indentity_charges']) ? $collegeFeesWithCourse['seat_indentity_charges'] : ''; ?>		
												<?= ($collegeFeesWithCourse && $collegeFeesWithCourse['upgradation_processing_fees']) ? $collegeFeesWithCourse['upgradation_processing_fees'] : ''; ?>		
											<?php } ?>
												
											</div>
										</div>
									</div>

								</div>
							<?php } ?>
						</section>
						<section id="seat_matrix">
							<h3>Seat Matrix</h3>
							<?php  
								$coursess=explode(",", $collegeDetail['course_offered']);
								$degreeType=$this->db->select('distinct(degree_type)')->where_in('id',$courses)->get('tbl_course')->result_array();
								foreach ($degreeType as $key => $degree) {		
									$degree_types=$this->db->select('*')->where_in('id',$degree['degree_type'])->get('tbl_degree_type')->result_array();			
							?>	
								<div role="tablist" class="add_bottom_45 accordion_2" id="payment">
									<div class="card">
										<div class="card-header" role="tab">
											<h5 class="mb-0">
												<a data-bs-toggle="collapse" href="#collapse<?=$key;?>" aria-expanded="true"><i class="indicator ti-minus"></i><?php echo $degree_types[0]['degreetype']; ?></a>
											</h5>
										</div>
										<div id="collapse<?=$key;?>" class="collapse show" role="tabpanel" data-bs-parent="#payment">
											<div class="card-body">
												<table class="table">
													<thead>
														<tr>
															<th scope="col">Course</th>
															<th scope="col">Branches & Seats</th>
														</tr>
													</thead>
													<tbody>
														<?php $courselist=$this->db->select('*')->where('degree_type',$degree['degree_type'])->where_in('id',$coursess)->get('tbl_course')->result_array();
															foreach ($courselist as $course) {
																$branchList = $this->db->select('*')->where('courses',$course['id'])->get('tbl_branch')->result_array();
														?>
															<tr>
																<td><?= $course['course']; ?></td>
																<td>
																	<?php 
																	if(!empty($branchList)){
																		foreach($branchList as $branch){ 
																			$SeatMatrixData = $this->db->select('*')->from('tbl_college_seat_matrix_data')->where(['college_id'=>$collegeDetail['id'],'degree_type_id'=>$degree_types[0]['id'],'course_id'=>$course['id'],'branch_id'=>$branch['id']])->get()->row_array();
																			
																	?>
																		<p><?= $branch['branch'] ?> : <?= !empty($SeatMatrixData) ? '<b>'.$SeatMatrixData['seat'].' Seats </b>': '0'; ?></p>	
																	<?php } } ?>
																</td>
															</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</section>
						<div role="tablist" class="add_bottom_45 accordion_2" id="payment">
						<?php 
							$courseids=$this->db->select('distinct(course_id)')->where('college_id',$collegeDetail['id'])->get('tbl_cutfoff_marks_data')->result_array(); 
							foreach($courseids as $courseid){
								$coursedetaildata=$this->db->select('*')->where('id',$courseid['course_id'])->get('tbl_course')->result_array();
								if (count($coursedetaildata)>0) {
									$coursedetaildata=$coursedetaildata[0];
						?>
							<div class="card">
								<div class="card-header" role="tab">
									<h5 class="mb-0">
										<a data-bs-toggle="collapse" href="#course<?=$coursedetaildata['id'];?>" aria-expanded="true"><i class="indicator ti-minus"></i><?php echo $coursedetaildata['course_full_name']; ?></a>
									</h5>
								</div>
								<div id="course<?=$coursedetaildata['id'];?>" class="collapse show parent_data" role="tabpanel" data-bs-parent="#payment">
									<div class="card-body table-responsive">
										<h3>CENTRAL COUNSELLING</h3>
										<div class="d-flex justify-content-between">
											<div>
												<input type="hidden" name="course_id" class="course_id" value="<?= $courseid['course_id']; ?>">
												<input type="hidden" name="college_id" class="college_id" value="<?= $collegeDetail['id']; ?>">
												<select class="form-control form-select get_cutoff_matrix">
													<option>Year</option>
													<?php
													// Get the current year
													$currentYear = date("Y");

													// Loop to display the last 4 years
													for ($i = $currentYear; $i >= $currentYear - 3; $i--) {
														echo "<option value='$i'>$i</option>";
													}
													?>
												</select>
											</div>
											<!-- <div>
												<select class="form-control form-select">
													<option>Sub Category</option>
												</select>
											</div> -->
										</div>
										<div class="cutoff_matrix">
											<?php
											$year = 2023;
											?>
											<?php $this->load->view('site/show_college_matrix',['collegeDetail'=>$collegeDetail,'courseid'=>$courseid,'year'=>$year]); ?>
										</div>		
									</div>
								</div>
							</div>
						<?php } } ?>

						<table>

							<tr>

							</tr>
						</table>


						<section id="reviews">
							<h2>Reviews</h2>
							<div class="reviews-container add_bottom_30">
								<div class="row">
									<div class="col-lg-3">
										<div id="review_summary">
											<strong>8.5</strong>
											<em>Superb</em>
											<small>Based on 4 reviews</small>
										</div>
									</div>
									<div class="col-lg-9">
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>5 stars</strong></small></div>
										</div>
										<!-- /row -->
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>4 stars</strong></small></div>
										</div>
										<!-- /row -->
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>3 stars</strong></small></div>
										</div>
										<!-- /row -->
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>2 stars</strong></small></div>
										</div>
										<!-- /row -->
										<div class="row">
											<div class="col-lg-10 col-9">
												<div class="progress">
													<div class="progress-bar" role="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
											<div class="col-lg-2 col-3"><small><strong>1 stars</strong></small></div>
										</div>
										<!-- /row -->
									</div>
								</div>
								<!-- /row -->
							</div>

							<div class="reviews-container">

								<div class="review-box clearfix">
									<figure class="rev-thumb"><img src="img/avatar1.jpg" alt="">
									</figure>
									<div class="rev-content">
										<div class="rating">
											<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
										</div>
										<div class="rev-info">
											Admin – April 03, 2016:
										</div>
										<div class="rev-text">
											<p>
												Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
											</p>
										</div>
									</div>
								</div>
								<!-- /review-box -->
								<div class="review-box clearfix">
									<figure class="rev-thumb"><img src="img/avatar2.jpg" alt="">
									</figure>
									<div class="rev-content">
										<div class="rating">
											<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
										</div>
										<div class="rev-info">
											Ahsan – April 01, 2016:
										</div>
										<div class="rev-text">
											<p>
												Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
											</p>
										</div>
									</div>
								</div>
								<!-- /review-box -->
								<div class="review-box clearfix">
									<figure class="rev-thumb"><img src="img/avatar3.jpg" alt="">
									</figure>
									<div class="rev-content">
										<div class="rating">
											<i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
										</div>
										<div class="rev-info">
											Sara – March 31, 2016:
										</div>
										<div class="rev-text">
											<p>
												Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
											</p>
										</div>
									</div>
								</div>
								<!-- /review-box -->
							</div>
							<!-- /review-container -->
						</section>
						<section id="gallery">
							<h2>College gallery</h2>
							<div class="col-md-12">
								<div class="row">
									<?php if(!empty($collegeGallery)){
										foreach($collegeGallery as $gallery){ ?>
									<div class="col-md-4">
										<div class="gallery-item" style="padding: 15px 5px 5px;margin-left: -10px;">
											<img style="max-height: 200px;" src="<?= base_url('app/assets/uploads/media/image/').$gallery['file_name'];?>" alt="">
										</div>
									</div>
									<?php } } ?> 
								</div>
							</div>	
							
						</section>
						<!-- /section -->
						<hr>

							<div class="add-review">
								<h5>Leave a Review</h5>
								<form>
									<div class="row">
										<div class="form-group col-md-6">
											<label>Name and Lastname *</label>
											<input type="text" name="name_review" id="name_review" placeholder="" class="form-control">
										</div>
										<div class="form-group col-md-6">
											<label>Email *</label>
											<input type="email" name="email_review" id="email_review" class="form-control">
										</div>
										<div class="form-group col-md-6">
											<label>Rating </label>
											<div class="custom-select-form">
											<select name="rating_review" id="rating_review" class="wide">
												<option value="1">1 (lowest)</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5" selected>5 (medium)</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10 (highest)</option>
											</select>
											</div>
										</div>
										<div class="form-group col-md-12">
											<label>Your Review</label>
											<textarea name="review_text" id="review_text" class="form-control" style="height:130px;"></textarea>
										</div>
										<div class="form-group col-md-12 add_top_20 add_bottom_30">
											<input type="submit" value="Submit" class="btn_1" id="submit-review">
										</div>
									</div>
								</form>
							</div>
					</div>
					<!-- /col -->
					
					<!-- <aside class="col-lg-4" id="sidebar">
						<div class="box_detail booking">
							<div class="price">
								<h5 class="d-inline">Book Now</h5>
								<div class="score"><span>Good<em>350 Reviews</em></span><strong>7.0</strong></div>
							</div>

							<div class="form-group" id="input-dates">
								<input class="form-control" type="text" name="dates" placeholder="When..">
								<i class="icon_calendar"></i>
							</div>
							
							<div class="dropdown">
								<a href="#" data-bs-toggle="dropdown">Guests <span id="qty_total">0</span></a>
								<div class="dropdown-menu dropdown-menu-right">
									<div class="dropdown-menu-content">
										<label>Adults</label>
										<div class="qty-buttons">
											<input type="button" value="+" class="qtyplus" name="adults">
											<input type="text" name="adults" id="adults" value="0" class="qty">
											<input type="button" value="-" class="qtyminus" name="adults">
										</div>
									</div>
									<div class="dropdown-menu-content">
										<label>Childrens</label>
										<div class="qty-buttons">
											<input type="button" value="+" class="qtyplus" name="child">
											<input type="text" name="child" id="child" value="0" class="qty">
											<input type="button" value="-" class="qtyminus" name="child">
										</div>
									</div>
								</div>
							</div>
							<div class="form-group clearfix">
								<div class="custom-select-form">
									<select class="wide">
										<option>Time</option>	
										<option>Lunch</option>
										<option>Dinner</option>
									</select>
								</div>
							</div>
							<a href="checkout.html" class=" add_top_30 btn_1 full-width purchase">Purchase</a>
							<a href="wishlist.html" class="btn_1 full-width outline wishlist"><i class="icon_heart"></i> Add to wishlist</a>
							<div class="text-center"><small>No money charged in this step</small></div>
						</div>
						<ul class="share-buttons">
							<li><a class="fb-share" href="#0"><i class="social_facebook"></i> Share</a></li>
							<li><a class="twitter-share" href="#0"><i class="social_twitter"></i> Share</a></li>
							<li><a class="gplus-share" href="#0"><i class="social_googleplus"></i> Share</a></li>
						</ul>
					</aside> -->
				</div>
		</div>
	</main>

<?php $this->load->view('site/footer');?>
<script>
	$(function() {
		$("body").on("change",".get_cutoff_matrix",function(e){
			var year = $(this).val();
			var course_id = $("input[name='course_id']").val();
			var college_id = $('.college_id').val();
			$.ajax({
				url: "<?php echo base_url('get-cutoff-matrix'); ?>",
				type: "POST",
				data: {year:year,course_id:course_id,college_id:college_id},
				dataType: 'json',
				success: function(data){
					$(this).closest('.card-body').find('.cutoff_matrix').html(data.html);
				}
			});
		});
	});
</script>