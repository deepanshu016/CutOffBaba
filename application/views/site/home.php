<?php $this->load->view('site/header');?>
<main>
	<section class="hero_single version_4">
		<div class="wrapper">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8">
						<h3>Find what you need!</h3>
						<p>Discover Top Rated College, Courses And Exams Around The World</p>
						<form method="post" action="#">
							<div class="row g-0 custom-search-input-2 search-container">
								<div class="col-lg-10">
									<div class="form-group">
										<input class="form-control" id="search" type="text" placeholder="What are you looking for...">
										<i class="icon_search"></i>
									</div>
								</div>
								<div class="col-lg-2">
									<input type="submit" value="Search">
								</div>
								<div id="autocomplete-list" class="autocomplete-items"></div>
							</div>
						</form>
					</div>
				</div>
				<ul class="counter">
					<li><strong>256,020</strong> Locations</li>
					<li><strong>150,543</strong> Active users</li>
				</ul>
			</div>
		</div>
	</section>
	
		
	<div class="container margin_30_5">
		<div class="main_title_2">
			<span><em></em></span>
			<h2>Popular Streams </h2>
		</div>
		<div class="row justify-content-center">
			<?php foreach ($streams as $stream) { ?>
				<?php $count=$this->db->select('*')->where('stream',$stream['id'])->get('tbl_college')->num_rows(); if($count>0){?>
				<div class="col-lg-4 col-md-6 " >
					<a href="<?=base_url('courses/').str_replace(" ","-",$stream['stream']).'/'.$stream['id'];?>" class="box_cat_home text-left" style="background:url('<?=asset_url();?>stream/<?=$stream['stream_image'];?>') no-repeat;background-size: 100% 100%;">
						<h3 class="text-left"><?=$stream['stream'];?></h3>
						<p style="max-width:50%;padding:10px;background:rgb(0 0 0 / 50%);color:#fff;border-radius:2px "><?=substr($stream['description'],0,80);?></p>
						
						<ul>
							<li><strong><?=$count;?></strong>Colleges </li>
						</ul>
					</a>
				</div>
			<?php } }?>
		</div>
	</div>
	<div class="call_section pattern">
			<div class="wrapper">
				<div class="container margin_80_55">
					<div class="main_title_2">
						<span><em></em></span>
						<h2>How it Works</h2>
						<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="box_how">
								<i class="pe-7s-search"></i>
								<h3>Search Locations</h3>
								<p>An nec placerat repudiare scripserit, temporibus complectitur at sea, vel ignota fierent eloquentiam id.</p>
								<span></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="box_how">
								<i class="pe-7s-info"></i>
								<h3>View Location Info</h3>
								<p>An nec placerat repudiare scripserit, temporibus complectitur at sea, vel ignota fierent eloquentiam id.</p>
								<span></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="box_how">
								<i class="pe-7s-like2"></i>
								<h3>Book, Reach or Call</h3>
								<p>An nec placerat repudiare scripserit, temporibus complectitur at sea, vel ignota fierent eloquentiam id.</p>
							</div>
						</div>
					</div>
					<!-- /row -->
					<p class="text-center add_top_30 wow bounceIn" data-wow-delay="0.5"><a href="account.html" class="btn_1 rounded">Register Now</a></p>
				</div>
			</div>
			<!-- /wrapper -->
		</div>
		<div class="main_categories">
			<div class="container">
				<ul class="clearfix">
					<?php foreach ($courses as $course) { //print_r($course);?>
						<li >
						<a href="<?=base_url('course/').$course['id'];?>"class="img-thumbnail m-2">
							<img src="<?=$course['course_icon']!=""?asset_url()."course/".$course['course_icon']:base_url('assets/img/no-image.jpg');?>"  style="max-height: 150px;width: 100%;margin-bottom: 20px;">
							<label ><?=$course['course'];?></label></a>
					</li>
					<?php  }?>
				</ul>
			</div>
			<!-- /container -->
		</div>
		<div class="container margin_60_35">
			<div class="main_title_2">
			<span><em></em></span>
			<h2>Our Counselling Plans </h2>
		</div>
			<div class="pricing-container cd-has-margins">
			<ul class="pricing-list bounce-invert">
				<li>
					<ul class="pricing-wrapper">
						<li data-type="monthly" class="is-visible">
							<header class="pricing-header">
								<h2>Basic</h2>

								<div class="price">
									<span class="currency">$</span>
									<span class="price-value">30</span>
									<span class="price-duration">mo</span>
								</div>
							</header>
							<!-- /pricing-header -->
							<div class="pricing-body">
								<ul class="pricing-features">
									<li><em>One Time</em> Fee</li>
									<li><em>1</em> User</li>
									<li><em>Lifetime</em> Availability</li>
									<li><em>Non</em> Featured</li>
									<li><em>30 days</em> Listing</li>
									<li><em>24/7</em> Support</li>
								</ul>
							</div>
							<!-- /pricing-body -->
							<footer class="pricing-footer">
								<a class="select-plan" href="#0">Select</a>
							</footer>
						</li>
						<li data-type="yearly" class="is-hidden">
							<header class="pricing-header">
								<h2>Basic</h2>

								<div class="price">
									<span class="currency">$</span>
									<span class="price-value">320</span>
									<span class="price-duration">yr</span>
								</div>
							</header>
							<!-- /pricing-header -->
							<div class="pricing-body">
								<ul class="pricing-features">
									<li><em>One Time</em> Fee</li>
									<li><em>1</em> User</li>
									<li><em>Lifetime</em> Availability</li>
									<li><em>Non</em> Featured</li>
									<li><em>30 days</em> Listing</li>
									<li><em>24/7</em> Support</li>
								</ul>
							</div> 
							<!-- /pricing-body -->
							<footer class="pricing-footer">
								<a class="select-plan" href="#0">Select</a>
							</footer>
						</li>
					</ul>
					<!-- /pricing-wrapper -->
				</li>
				<li class="popular">
					<ul class="pricing-wrapper">
						<li data-type="monthly" class="is-visible">
							<header class="pricing-header">
								<h2>Popular</h2>
								<div class="price">
									<span class="currency">$</span>
									<span class="price-value">60</span>
									<span class="price-duration">mo</span>
								</div>
							</header>
							<!-- /pricing-header -->
							<div class="pricing-body">
								<ul class="pricing-features">
									<li><em>One Time</em> Fee</li>
									<li><em>3</em> User</li>
									<li><em>Lifetime</em> Availability</li>
									<li><em>Non</em> Featured</li>
									<li><em>30 days</em> Listing</li>
									<li><em>24/7</em> Support</li>
								</ul>
							</div>
							<!-- /pricing-body -->
							<footer class="pricing-footer">
								<a class="select-plan" href="#0">Select</a>
							</footer>
						</li>
						<li data-type="yearly" class="is-hidden">
							<header class="pricing-header">
								<h2>Popular</h2>

								<div class="price">
									<span class="currency">$</span>
									<span class="price-value">630</span>
									<span class="price-duration">yr</span>
								</div>
							</header>
							<!-- /pricing-header -->
							<div class="pricing-body">
								<ul class="pricing-features">
									<li><em>One Time</em> Fee</li>
									<li><em>3</em> User</li>
									<li><em>Lifetime</em> Availability</li>
									<li><em>Non</em> Featured</li>
									<li><em>30 days</em> Listing</li>
									<li><em>24/7</em> Support</li>
								</ul>
							</div>
							<!-- /pricing-body -->
							<footer class="pricing-footer">
								<a class="select-plan" href="#0">Select</a>
							</footer>
						</li>
					</ul>
					<!-- /cd-pricing-wrapper -->
				</li>
				<li>
					<ul class="pricing-wrapper">
						<li data-type="monthly" class="is-visible">
							<header class="pricing-header">
								<h2>Premier</h2>
								<div class="price">
									<span class="currency">$</span>
									<span class="price-value">90</span>
									<span class="price-duration">mo</span>
								</div>
							</header>
							<!-- /pricing-header -->
							<div class="pricing-body">
								<ul class="pricing-features">
									<li><em>One Time</em> Fee</li>
									<li><em>5</em> User</li>
									<li><em>Lifetime</em> Availability</li>
									<li><em>Non</em> Featured</li>
									<li><em>30 days</em> Listing</li>
									<li><em>24/7</em> Support</li>
								</ul>
							</div>
							<!-- /pricing-body -->
							<footer class="pricing-footer">
								<a class="select-plan" href="#0">Select</a>
							</footer>
						</li>
						<li data-type="yearly" class="is-hidden">
							<header class="pricing-header">
								<h2>Premier</h2>

								<div class="price">
									<span class="currency">$</span>
									<span class="price-value">950</span>
									<span class="price-duration">yr</span>
								</div>
							</header>
							<!-- /pricing-header -->
							<div class="pricing-body">
								<ul class="pricing-features">
									<li><em>One Time</em> Fee</li>
									<li><em>5</em> User</li>
									<li><em>Lifetime</em> Availability</li>
									<li><em>Non</em> Featured</li>
									<li><em>30 days</em> Listing</li>
									<li><em>24/7</em> Support</li>
								</ul>
							</div>
							<!-- /pricing-body -->
							<footer class="pricing-footer">
								<a class="select-plan" href="#0">Select</a>
							</footer>
						</li>
					</ul>
					<!-- /pricing-wrapper -->
				</li>
			</ul>
			<!-- /pricing-list -->
		</div>
		<!-- /pricing-container -->	
		</div>
	<div class="container-fluid margin_80_55">
		<div class="main_title_2">
			<span><em></em></span>
			<h2>Popular Colleges </h2>
		</div>
		<div id="reccomended" class="owl-carousel owl-theme">
			<?php foreach ($colleges as $college) { //print_r($college);

				?>
				<div class="item">
				<?php $this->load->view('site/college-card',$college); ?>
			</div>
			<?php } ?>
		</div>
	</div>
</main>
<?php $this->load->view('site/footer');?>
