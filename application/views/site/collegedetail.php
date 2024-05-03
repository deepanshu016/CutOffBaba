<?php $this->load->view('site/header');?>
<main>		
	<style type="text/css">
.hero_in.restaurant_detail:before{background: url('<?=asset_url()."media/image/".$collegeDetail['college_bannerfile'];?>') no-repeat;background-size: 100% 100%;background-position: center;}
	</style>
		<div class="hero_in restaurant_detail">
			<div class="wrapper">
				<span class="magnific-gallery">
					<a href="img/gallery/hotel_list_1.jpg" class="btn_photos" title="Photo title" >Download Brouchure</a>
				</span>
			</div>
		</div>
		<!--/hero_in-->
		
		<nav class="secondary_nav sticky_horizontal_2">
			<div class="container">
				<ul class="clearfix d-flex justify-content-between">
					<li><a href="#basic" class="active">Basic Information</a></li>
					<li><a href="#fees">Courses & Fees</a></li>
					<li><a href="#course">Courses & Seats</a></li>
					<li><a href="#rank">Cutoff & Rank</a></li>
					<li><a href="#placement">Placement</a></li>
					<li><a href="#gallery">Gallery</a></li>
					<li><a href="#admission">Admission</a></li>

					<li><a href="#reviews">Reviews</a></li>
				</ul>
			</div>
		</nav>
		<?php //echo '<pre>';print_r($collegeDetail); ?>

		<div class="container margin_60_35">
				<div class="row">
					<div class="col-lg-8">
						<section id="basic">
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
                                            <!-- <li>Gender Accepted : <span><?=$collegeDetail['gender'];?></span></li> -->
                                            <li>Affliated From : <span><?=$collegeDetail['university_name'];?></span></li>
                                            <li>University : <span><?=$collegeDetail['university_name'];?></span></li>
                                            <li>Approved By : <span>9 AM - 5 PM</span></li>
                                            <!-- <li>Ownership : <span><?=$collegeDetail['ownertitle'];?></span></li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
						</section>
						<section id="fees">	
							<h3>Course & Fees</h3>
							<?php 
							$courses=explode(",", $collegeDetail['course_offered']);
							//print_r($courses);
							$dtype=$this->db->select('distinct(degree_type)')->where_in('id',$courses)->get('tbl_course')->result_array();
							//print_r($dtype);
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
										?>
										<h5 class="title"><?=$course['course_full_name']."( ".$course['course']." )";?></h5>
										<?=$course['course_fees'];?>
									<?php } ?>
										
									</div>
								</div>
							</div>

						</div>
					<?php } ?>
						</section>
						<?php $cutoff=$this->db->select('distinct(course_id)')->where('college_id',$collegeDetail['id'])->get('tbl_cutfoff_marks_data')->result_array(); 
						echo '<pre>';
						print_r($cutoff);
						$cutoff2=$this->db->select('distinct(branch_id)')->where('college_id',$collegeDetail['id'])->where('course_id',$cutoff[0]['course_id'])->get('tbl_cutfoff_marks_data')->result_array(); 
						echo '<pre>';
						print_r($cutoff2);
						$cutoff3=$this->db->select('distinct(branch_id)')->where('college_id',$collegeDetail['id'])->where('course_id',$cutoff[0]['course_id'])->get('tbl_cutfoff_marks_data')->result_array(); 
						echo '<pre>';
						print_r($cutoff2);
						?>
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