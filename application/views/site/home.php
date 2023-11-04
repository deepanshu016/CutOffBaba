<?php include_once('header.php') ?>
<?php include_once('banner-slider.php') ?>
<div class="container pt-5">
	<div class="row">
		<div class="col-12 col-md-9 mx-auto">

			<h3  class="lead-text text-center pb-4 text-sm-left">Who We Are</h3>
			<?= @$siteSettings['return_refund']; ?>
			<!--<p class="lead-text text-center text-sm-left" style="font-weight: bold;">"Your Digital Marketplace for an Enhanced Photography Experience, Connecting Photo Enthusiasts with Talented Photographers."</p>-->
			<!--<p class="lead-text text-center text-sm-left" style="font-weight: bold;">"Seamless Booking Technology Unites Photo-Lovers and Photographers on <br> Our Platform, Offering Convenience to Both."</p>-->
		</div>
	</div>
</div>
<div id="slider-section" class="container overflow-hidden py-5">
	<h3  class="lead-text text-center pb-4 text-sm-left">UPDATES</h3>
	<!-- <ul class="nav nav-tabs" id="slider-tabs" role="tablist">
		<li class="nav-item" role="presentation">
			<button class="nav-link active" id="slider-1-tab" data-bs-toggle="tab" data-bs-target="#slider-1" type="button" role="tab" aria-controls="slider-1" aria-selected="true">About</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link" id="slider-2-tab" data-bs-toggle="tab" data-bs-target="#slider-2" type="button" role="tab" aria-controls="slider-2" aria-selected="true">Recognition</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link" id="slider-3-tab" data-bs-toggle="tab" data-bs-target="#slider-3" type="button" role="tab" aria-controls="slider-3" aria-selected="true">Core Team</button>
		</li>
	</ul> -->
	<div class="tab-content" id="sliderTabsContent">
		<div class="tab-pane fade show active" id="slider-1" role="tabpanel" aria-labelledby="slider-1-tab">
			<div class="inspire__slider slider-1 inspire__slider--desktop inview">
				<div class="swiper-container swiper-container-coverflow swiper-container-3d swiper-container-horizontal">
					<ul class="swiper-wrapper inspire__slider--owl">
					    <?php $banners=$this->db->select('*')->get('tbl_banner')->result_array();foreach($banners as $banner){?>
						<li class="swiper-slide">
							<div class="cardstack-animate-card">
								<div class="flip_img_parent">
									<img src="<?=base_url('assets/uploads/banners/'.$banner['image']);?>">
								</div>
							</div>
						</li>
						<?php } ?>
						
					</ul>
					<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
				</div>
				<a href="#1" id="js-next1" class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"></a>
				<a href="#1" id="js-prev1" class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"></a>
			</div>
		</div>
		<!-- <div class="tab-pane fade" id="slider-2" role="tabpanel" aria-labelledby="slider-2-tab">
			<div class="inspire__slider slider-2 inspire__slider--desktop inview">
				<div class="swiper-container swiper-container-coverflow swiper-container-3d swiper-container-horizontal">
					<ul class="swiper-wrapper inspire__slider--owl">
						<li class="swiper-slide">
							<div class="cardstack-animate-card">
								<div class="flip_img_parent">
									<img src="<?=base_url('assets/front/');?>/images/1.png">
								</div>
							</div>
						</li>
						<li class="swiper-slide">
							<div class="cardstack-animate-card">
								<div class="flip_img_parent">
									<img src="<?=base_url('assets/front/');?>/images/2.png">
								</div>
							</div>
						</li>
						<li class="swiper-slide">
							<div class="cardstack-animate-card">
								<div class="flip_img_parent">
									<img src="<?=base_url('assets/front/');?>/images/5.png">
								</div>
							</div>
						</li>
						<li class="swiper-slide">
							<div class="cardstack-animate-card">
								<div class="flip_img_parent">
									<img src="<?=base_url('assets/front/');?>/images/4.png">
								</div>
							</div>
						</li>
						<li class="swiper-slide">
							<div class="cardstack-animate-card">
								<div class="flip_img_parent">
									<img src="<?=base_url('assets/front/');?>/images/3.png">
								</div>
							</div>
						</li>
					</ul>
					<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
				</div>
				<a href="#2" id="js-next2" class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"></a>
				<a href="#2" id="js-prev2" class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"></a>
			</div>
		</div>
		<div class="tab-pane fade" id="slider-3" role="tabpanel" aria-labelledby="slider-3-tab">
			<div class="inspire__slider slider-3 inspire__slider--desktop inview">
				<div class="swiper-container swiper-container-coverflow swiper-container-3d swiper-container-horizontal">
					<ul class="swiper-wrapper inspire__slider--owl">
						<li class="swiper-slide">
							<div class="cardstack-animate-card">
								<div class="flip_img_parent">
									<img src="<?=base_url('assets/front/');?>/images/1.png">
								</div>
							</div>
						</li>
						<li class="swiper-slide">
							<div class="cardstack-animate-card">
								<div class="flip_img_parent">
									<img src="<?=base_url('assets/front/');?>/images/2.png">
								</div>
							</div>
						</li>
						<li class="swiper-slide">
							<div class="cardstack-animate-card">
								<div class="flip_img_parent">
									<img src="<?=base_url('assets/front/');?>/images/5.png">
								</div>
							</div>
						</li>
						<li class="swiper-slide">
							<div class="cardstack-animate-card">
								<div class="flip_img_parent">
									<img src="<?=base_url('assets/front/');?>/images/4.png">
								</div>
							</div>
						</li>
						<li class="swiper-slide">
							<div class="cardstack-animate-card">
								<div class="flip_img_parent">
									<img src="<?=base_url('assets/front/');?>/images/3.png">
								</div>
							</div>
						</li>
					</ul>
					<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
				</div>
				<a href="#3" id="js-next3" class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"></a>
				<a href="#3" id="js-prev3" class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"></a>
			</div>
		</div> -->
	</div>
</div>
<!-- <div class="container pt-5">
	<div class="row">
		<div class="col-md-10 col-xl-8 mx-auto">
			<h3  class="lead-text text-center pb-4">News & Events</h3>
		</div>
	</div>
</div>
<div id="slider-section" class="container overflow-hidden">
	<div class="inspire__slider slider-4 inspire__slider--desktop inview">
		<div class="swiper-container swiper-container-coverflow swiper-container-3d swiper-container-horizontal">
			<ul class="swiper-wrapper inspire__slider--owl">
				<li class="swiper-slide ">
					<div class="cardstack-animate-card card">
						<img src="<?=base_url('assets/front/');?>/images/blog1.png" style="max-height: 350px !important;">
						<div class="card-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. </p>
							<div class="d-flex justify-content-between pt-5 pb-4">
								<p>Lorem ipsum dolor sit amet</p>
								<div class="text-warning"> <i class="lni lni-wechat"></i> 10 </div>
								<div class="text-warning"> <i class="lni lni-eye"></i> 240 </div>
							</div>
							<p>September 10,2023</p>
						</div>
					</div>
				</li>
				<li class="swiper-slide ">
					<div class="cardstack-animate-card card">
						<img src="<?=base_url('assets/front/');?>/images/blog2.png" style="max-height: 350px !important;">
						<div class="card-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. </p>
							<div class="d-flex justify-content-between pt-5 pb-4">
								<p>Lorem ipsum dolor sit amet</p>
								<div class="text-warning"> <i class="lni lni-wechat"></i> 10 </div>
								<div class="text-warning"> <i class="lni lni-eye"></i> 240 </div>
							</div>
							<p>September 10,2023</p>
						</div>
					</div>
				</li>
				<li class="swiper-slide ">
					<div class="cardstack-animate-card card">
						<img src="<?=base_url('assets/front/');?>/images/blog1.png" style="max-height: 350px !important;">
						<div class="card-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. </p>
							<div class="d-flex justify-content-between pt-5 pb-4">
								<p>Lorem ipsum dolor sit amet</p>
								<div class="text-warning"> <i class="lni lni-wechat"></i> 10 </div>
								<div class="text-warning"> <i class="lni lni-eye"></i> 240 </div>
							</div>
							<p>September 10,2023</p>
						</div>
					</div>
				</li>
				<li class="swiper-slide ">
					<div class="cardstack-animate-card card">
						<img src="<?=base_url('assets/front/');?>/images/blog3.png" style="max-height: 350px !important;">
						<div class="card-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. </p>
							<div class="d-flex justify-content-between pt-5 pb-4">
								<p>Lorem ipsum dolor sit amet</p>
								<div class="text-warning"> <i class="lni lni-wechat"></i> 10 </div>
								<div class="text-warning"> <i class="lni lni-eye"></i> 240 </div>
							</div>
							<p>September 10,2023</p>
						</div>
					</div>
				</li>
				<li class="swiper-slide ">
					<div class="cardstack-animate-card card">
						<img src="<?=base_url('assets/front/');?>/images/blog2.png" style="max-height: 350px !important;">
						<div class="card-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. </p>
							<div class="d-flex justify-content-between pt-5 pb-4">
								<p>Lorem ipsum dolor sit amet</p>
								<div class="text-warning"> <i class="lni lni-wechat"></i> 10 </div>
								<div class="text-warning"> <i class="lni lni-eye"></i> 240 </div>
							</div>
							<p>September 10,2023</p>
						</div>
					</div>
				</li>
			</ul>
			<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
		</div>
		<a href="#1" id="js-next4" class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"></a>
		<a href="#1" id="js-prev4" class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"></a>
	</div>
	<div class="d-flex justify-content-center mt-5">
	<a  class="btn btn-warning btn-lg text-light" href="#">View All</a >
	</div>
</div> -->
<!-- <div class="container pt-5">
	<div class="row">
		<div class="col-md-10 col-xl-8 mx-auto">
			<h3  class="lead-text text-center pb-4">Our Sponsors</h3>
		</div>
	</div>
</div> -->
<!-- <section class="bg-white sponsor">
<div class="container">
	<div class="inspire__slider hero-slider inspire__slider--desktop inview">
		<div class="swiper-container swiper-container-coverflow swiper-container-3d swiper-container-horizontal">
			<ul class="swiper-wrapper inspire__slider--owl">
				<li class="swiper-slide ">
					<img src="<?=base_url('assets/front/');?>/images/blog1.png" >
				</li>
				<li class="swiper-slide ">
					<img src="<?=base_url('assets/front/');?>/images/blog1.png" >
				</li>
				<li class="swiper-slide ">
					<img src="<?=base_url('assets/front/');?>/images/blog1.png" >
				</li>
				<li class="swiper-slide ">
					<img src="<?=base_url('assets/front/');?>/images/blog1.png" >
				</li>
				<li class="swiper-slide ">
					<img src="<?=base_url('assets/front/');?>/images/blog1.png" >
				</li>

				<li class="swiper-slide ">
					<img src="<?=base_url('assets/front/');?>/images/blog1.png" >
				</li>
			</ul>
			<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
		</div>
		<a href="#1" id="js-next6" class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"></a>
		<a href="#1" id="js-prev6" class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"></a>
	</div>
	</div>
</section> -->
<!-- <div class="container pt-5">
	<div class="row">
		<div class="col-md-10 col-xl-8 mx-auto">
			<h3  class="lead-text text-center pb-4">Testimonials</h3>
		</div>
	</div>
</div>
<div id="slider-section" class="overflow-hidden py-5" >
	<div class="inspire__slider slider-5 inspire__slider--desktop inview">
				<div class="swiper-container swiper-container-coverflow swiper-container-3d swiper-container-horizontal">
					<ul class="swiper-wrapper inspire__slider--owl">
						<li class="swiper-slide " style="margin-top: 150px;">
							<div class="cardstack-animate-card card teambox">
								<img src="<?=base_url('assets/front/');?>/images/blog1.png" style="height: 150px;width: 150px;border-radius: 50%;margin-left: auto; margin-right: auto;margin-top: -75px;z-index: 9999;">
								<div class="card-body p-5">
									<p><i class="lni lni-quotation text-warning"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua.  sed do eiusmod temp incididunt ut labore et dolore magna aliqua. <i class="lni lni-quotation text-warning"></i> </p>
									<div class="d-flex justify-content-center pt-5 pb-4">
										<p>Name</p>
										<p>:</p>
										<h4>Designation</h4>
									</div>
								</div>
							</div>
						</li>
						<li class="swiper-slide " style="margin-top: 150px;">
							<div class="cardstack-animate-card card teambox">
								<img src="<?=base_url('assets/front/');?>/images/u3.jpg" style="height: 150px;width: 150px;border-radius: 50%;margin-left: auto; margin-right: auto;margin-top: -75px;z-index: 9999;">
								<div class="card-body p-5">
									<p><i class="lni lni-quotation text-warning"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua.  sed do eiusmod temp incididunt ut labore et dolore magna aliqua. <i class="lni lni-quotation text-warning"></i> </p>
									<div class="d-flex justify-content-center pt-5 pb-4">
										<p>Name</p>
										<p>:</p>
										<h4>Designation</h4>
									</div>
								</div>
							</div>
						</li>
						<li class="swiper-slide " style="margin-top: 150px;">
							<div class="cardstack-animate-card card teambox">
								<img src="<?=base_url('assets/front/');?>/images/u4.jpeg" style="height: 150px;width: 150px;border-radius: 50%;margin-left: auto; margin-right: auto;margin-top: -75px;z-index: 9999;">
								<div class="card-body p-5">
									<p><i class="lni lni-quotation text-warning"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua.  sed do eiusmod temp incididunt ut labore et dolore magna aliqua. <i class="lni lni-quotation text-warning"></i> </p>
									<div class="d-flex justify-content-center pt-5 pb-4">
										<p>Name</p>
										<p>:</p>
										<h4>Designation</h4>
									</div>
								</div>
							</div>
						</li>
						<li class="swiper-slide " style="margin-top: 150px;">
							<div class="cardstack-animate-card card teambox">
								<img src="<?=base_url('assets/front/');?>/images/u2.jpeg" style="height: 150px;width: 150px;border-radius: 50%;margin-left: auto; margin-right: auto;margin-top: -75px;z-index: 9999;">
								<div class="card-body p-5">
									<p><i class="lni lni-quotation text-warning"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua.  sed do eiusmod temp incididunt ut labore et dolore magna aliqua. <i class="lni lni-quotation text-warning"></i> </p>
									<div class="d-flex justify-content-center pt-5 pb-4">
										<p>Name</p>
										<p>:</p>
										<h4>Designation</h4>
									</div>
								</div>
							</div>
						</li>
						<li class="swiper-slide " style="margin-top: 150px;">
							<div class="cardstack-animate-card card teambox">
								<img src="<?=base_url('assets/front/');?>/images/u1.png" style="height: 150px;width: 150px;border-radius: 50%;margin-left: auto; margin-right: auto;margin-top: -75px;z-index: 9999;">
								<div class="card-body p-5">
									<p><i class="lni lni-quotation text-warning"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua.  sed do eiusmod temp incididunt ut labore et dolore magna aliqua. <i class="lni lni-quotation text-warning"></i> </p>
									<div class="d-flex justify-content-center pt-5 pb-4">
										<p>Name</p>
										<p>:</p>
										<h4>Designation</h4>
									</div>
								</div>
							</div>
						</li>
					</ul>
					<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
				</div>
				<a href="#1" id="js-next5" class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"></a>
				<a href="#1" id="js-prev5" class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"></a>
			</div>
</div> -->


<section class="section student-course mt-5 mb-5">
    <div class="container">
        <div class="course-widget">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="course-full-width">
                        <div class="blur-border course-radius align-items-center aos aos-init aos-animate" data-aos="fade-up">
                            <div class="online-course d-flex align-items-center" style="padding:10px;">
                                <div class="course-img" style="background:rgba(0,0, 0, 0.1);margin-right: 10px;padding:10px;border-radius: 30px;">
                                    <img src="<?=base_url('assets/front/');?>/images/workshop.png" alt="" style="width: 40px;height: 40px;">
                                </div>
                                <div class="course-inner-content">
                                    <h4 style="color:#FF8031;margin-top:10px"><span>101 </span>+</h4>
                                    <p style="color:#1773EA;">Workshop Attended</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="course-full-width">
                        <div class="blur-border course-radius aos aos-init aos-animate" data-aos="fade-up">
                            <div class="online-course d-flex align-items-center" style="padding:10px;"> 
                                 <div class="course-img" style="background:rgba(0,0, 0, 0.1);margin-right: 10px;padding:10px;border-radius: 30px;">
                                    <img src="<?=base_url('assets/front/');?>/images/certified.png" alt="" style="width: 40px;height: 40px;">
                                </div>
                                <div class="course-inner-content">
                                    <h4 style="color:#FF8031;margin-top:10px"><span>51 </span>+</h4>
                                    <p style="color:#1773EA;">Certified Photographer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="course-full-width">
                        <div class="blur-border course-radius aos aos-init aos-animate" data-aos="fade-up">
                            <div class="online-course d-flex align-items-center" style="padding:10px;">
                                 <div class="course-img" style="background:rgba(0,0, 0, 0.1);margin-right: 10px;padding:10px;border-radius: 30px;">
                                    <img src="<?=base_url('assets/front/');?>/images/community.png" alt="" style="width: 40px;height: 40px;">
                                </div>
                                <div class="course-inner-content">
                                    <h4 style="color:#FF8031;margin-top:10px"><span>111 </span>+</h4>
                                    <p style="color:#1773EA;">Social Community</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="course-full-width">
                        <div class="blur-border course-radius aos aos-init aos-animate" data-aos="fade-up">
                            <div class="online-course d-flex align-items-center" style="padding:10px;">
                                <div class="course-img" style="background:rgba(0,0, 0, 0.1);margin-right: 30px;padding:10px;border-radius: 30px;">
                                    <img src="<?=base_url('assets/front/');?>/images/sponsor.png" alt="" style="width: 40px;height: 40px;">
                                </div>
                                <div class="course-inner-content">
                                    <h4 style="color:#FF8031;margin-top:10px"><span>4 </span>+</h4>
                                    <p style="color:#1773EA;">Sponsers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?=base_url('assets/front/');?>/jsfront/homepage.js"></script>
<section class="join-our-newsletter mt-3">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-8 text-center mx-auto">
				<h2 class="text-light fs-1">TAKE OUR SURVEY</h2>
				<p class="text-light">Tell us how reclaiming features can grow to help vulnerable, Young Photographer</p>
				<a href="https://forms.gle/wPjTBQmCdi2vLyLD6" class=" btn  btn-lg text-light" style="background:#005d9a;border-radius:10px" > Take a Survey </a>
			</div>
		</div>
	</div>

</section>
<?php include_once('footer.php') ?>