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
	<div class="container margin_60_35">
			<div class="main_title_2">
			<span><em></em></span>
			<h2>STATE WISE COLLEGE FEE STRUCTURE </h2>
		</div>
		<div class="pricing-container cd-has-margins">
			<ul class="pricing-list bounce-invert" >
				<li >
					<ul class="pricing-wrapper" >
						<li data-type="monthly" class="is-visible" >
							 
							<header class="pricing-header"> 
								<h1 class="econsicss">MBBS FEE STRUCTURE</h1>
								<div class="price"> 
									<span class="price-value"> BIHAR</span>  
								</div>
							</header>
							 
							<div class="pricing-body">
								<ul class="pricing-features ddPrics">
									<li><em>All India Institute of Medical</em> <span class="ssslhs">Fee:1350</span> </li>
									<li><em>Anugrah Narayan Magadh</em> <span class="ssslhs">Fee:1350</span> </li>
									<li><em>Darbhanga Medical College </em>  <span class="ssslhs">Fee:1350</span></li>
									<li><em>Government Medical College </em> <span class="ssslhs">Fee:1350</span> </li>
									<li><em>Indira Gandhi Institute of </em> <span class="ssslhs">Fee:1350</span> </li>
									 
								</ul>
							</div>
							 
							<footer class="pricing-footer">
								<a class="select-plan" href="#0">more College</a>
							</footer>
						</li>
						 
					</ul>
					 
				</li>
				<li >
					<ul class="pricing-wrapper" >
						<li data-type="monthly" class="is-visible" >
							 
							<header class="pricing-header"> 
								<h1 class="econsicss">MBBS FEE STRUCTURE</h1>
								<div class="price"> 
									<span class="price-value"> BIHAR</span>  
								</div>
							</header>
							 
							<div class="pricing-body">
								<ul class="pricing-features ddPrics">
									<li><em>All India Institute of Medical</em> <span class="ssslhs">Fee:1350</span> </li>
									<li><em>Anugrah Narayan Magadh</em> <span class="ssslhs">Fee:1350</span> </li>
									<li><em>Darbhanga Medical College </em>  <span class="ssslhs">Fee:1350</span></li>
									<li><em>Government Medical College </em> <span class="ssslhs">Fee:1350</span> </li>
									<li><em>Indira Gandhi Institute of </em> <span class="ssslhs">Fee:1350</span> </li>
									 
								</ul>
							</div>
							 
							<footer class="pricing-footer">
								<a class="select-plan" href="#0">more College</a>
							</footer>
						</li>
						 
					</ul>
					 
				</li>
				<li >
					<ul class="pricing-wrapper" >
						<li data-type="monthly" class="is-visible" >
							 
							<header class="pricing-header"> 
								<h1 class="econsicss">MBBS FEE STRUCTURE</h1>
								<div class="price"> 
									<span class="price-value"> BIHAR</span>  
								</div>
							</header>
							 
							<div class="pricing-body">
								<ul class="pricing-features ddPrics">
									<li><em>All India Institute of Medical</em> <span class="ssslhs">Fee:1350</span> </li>
									<li><em>Anugrah Narayan Magadh</em> <span class="ssslhs">Fee:1350</span> </li>
									<li><em>Darbhanga Medical College </em>  <span class="ssslhs">Fee:1350</span></li>
									<li><em>Government Medical College </em> <span class="ssslhs">Fee:1350</span> </li>
									<li><em>Indira Gandhi Institute of </em> <span class="ssslhs">Fee:1350</span> </li>
									 
								</ul>
							</div>
							 
							<footer class="pricing-footer">
								<a class="select-plan" href="#0">more College</a>
							</footer>
						</li>
						 
					</ul>
					 
				</li>
				 
				 
			</ul> 
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
						<li>
						<a href="<?=base_url('course/').$course['id'];?>"class="img-thumbnail m-2">
							<img class="courseResponsive" src="<?=$course['course_icon']!=""?asset_url()."course/".$course['course_icon']:base_url('assets/img/no-image.jpg');?>"  style="max-height: 150px;width: 100%;margin-bottom: 20px;">
							<label class="labeCsss"><?=$course['course'];?></label></a>
					</li>
					<?php  }?>
				</ul>
			</div>
			<!-- /container -->
		</div>
		<section>
		<div class="container">
			<div class=" ">
				<span><em></em></span>
					<h2 class="text-center">OUR PAID COUNSELLING SERVICES </h2>
				<br>
			<div class="row">
				<?php if(!empty($planList)) { 
					foreach($planList as $plan) { ?>
					<div class="col-md-4 col-sm-6">
						<div class="pricingTable">
							<div class="pricingTable-header">
								<h6 class="qilck">Quick Info</h6>
								<h3 class="title"><?= $plan['plan_name']; ?></h3>
							</div>
							<div class="price-value">
								<span class="amount">₹ <?= $plan['price']; ?></span>
								<span class="month">
									<!-- 10% OFF  -->
									₹ <?= $plan['discounted_price']; ?></span>
							</div>
							<?= $plan['description']; ?>
							<!-- <ul class="pricing-content"> -->
								<!-- <li>Tuition Fees Info <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span> </li>
								<li>Seat Matrix Info <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
								<li>Approved Colleges Info <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
								<li>Cutoff Info <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
								<li>Category Info <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li> 
								<li>Counselling Dates <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
								<li>Counselling Dates <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li> -->
								<!-- <li class="disable">15 Subdomains <span class="floaIli text-danger"><i class="fa fa-times" aria-hidden="true"></i> </span>  </li>
								<li class="disable">20 Domains <span class="floaIli text-danger"><i class="fa fa-times" aria-hidden="true"></i> </span></li> -->
							<!-- </ul> -->
							<?php if(!$this->session->userdata('user')) { ?>
								<a href="<?= base_url('/signup'); ?>" class="pricingTable-signup">Sign Up</a>
							<?php } else{ ?>
								<a href="#" class="pricingTable-signup purchase_now" data-id="<?= $plan['id']; ?>" data-amount="<?= $plan['discounted_price']; ?>">Proceed</a>
							<?php } ?>
						</div>
					</div>
				<?php } } ?>
			</div>
		</div>
		</section>


		 
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

	<section>
		
	</section>

		<div class="container margin_80_55">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>OUR BLOG</h2>
				<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
			</div>
			<div class="row">
				<?php 
					if(!empty($newsList)){
						foreach($newsList as $news) { 
						$courseData  = 	$this->db->select('course')->where('id',$news['course_id'])->get('tbl_course')->row_array();	
				?>
						<div class="col-lg-6">
							<a class="box_news" href="#!">
								<figure><img src="<?= base_url('app/assets/uploads/news').'/'.$news['image']; ?>" alt=""></figure>
								<ul>
									<li><?= $courseData['course']; ?></li>
									<li><?= date('d.M.Y',strtotime($news['created_at'])); ?></li>
								</ul>
								<h4><?= $news['title']; ?></h4>
								<p><?= $news['short_description']; ?></p>
							</a>
						</div>
				<?php } } ?>
			</div>
			<!-- /row -->
			<p class="btn_home_align"><a href="#!" class="btn_1 rounded">View all news</a></p>
		</div>


</main>
<?php $this->load->view('site/footer');?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
	var SITEURL = "<?php echo base_url() ?>";
	$('body').on('click', '.purchase_now', function(e){
		e.preventDefault();
		var totalAmount = $(this).attr("data-amount");
		var plan_id =  $(this).attr("data-id");
		var options = {
		"key": "rzp_test_q2ifqqk3pzoTyk",
		"amount": (totalAmount*100), // 2000 paise = INR 20
		"name": "CUTOFFBABA",
		"description": "Plan Purchase",
		"image": "http://cutoffbaba/assets/site/img/uyesr.png",
		"handler": function (response){
				$.ajax({
				url: SITEURL + 'payment/pay-success',
				type: 'post',
				dataType: 'json',
				data: {
					razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,plan_id : plan_id,
				}, 
				success: function (msg) {
					window.location.href = msg.url;
				}
			});
		
		},
		"theme": {
			"color": "#528FF0"
		}
	};
	var rzp1 = new Razorpay(options);
	rzp1.open();
		e.preventDefault();
	});
</script>