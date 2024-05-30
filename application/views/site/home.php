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
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable">
                    <div class="pricingTable-header">
                    	<h6 class="qilck">Quick Info</h6>
                        <h3 class="title">ECONOMY PLAN</h3>
                    </div>
                    <div class="price-value">
                        <span class="amount">₹ 119.00</span>
                        <span class="month">10% OFF ₹ 132</span>
                    </div>
                    <ul class="pricing-content">
                        <li>Tuition Fees Info <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span> </li>
                        <li>Seat Matrix Info <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                        <li>Approved Colleges Info <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                        <li>Cutoff Info <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                        <li>Category Info <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li> 
                        <li>Counselling Dates <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                        <li>Counselling Dates <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                        <!-- <li class="disable">15 Subdomains <span class="floaIli text-danger"><i class="fa fa-times" aria-hidden="true"></i> </span>  </li>
                        <li class="disable">20 Domains <span class="floaIli text-danger"><i class="fa fa-times" aria-hidden="true"></i> </span></li> -->
                    </ul>
                    <a href="#" class="pricingTable-signup">Sign Up</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable magenta">
                    <div class="pricingTable-header">
                    	<h6 class="qilck">Expertise Info</h6>
                        <h3 class="title">STANDARD PLAN</h3>
                    </div>
                    <div class="price-value">
                        <span class="amount">₹ 999.00</span>
                        <span class="month">10% OFF ₹ 1110</span>
                    </div>
                    <ul class="pricing-content">
                        <li>All Quick Info <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span> </li>
                        <li>Counselling Procedures <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                        <li>Counselling Eligibility <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li> 
                        <li>College Selection Guidance <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                        <li>Bonds & Service Rules <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span> </li>
                        <li>How To Apply For <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                        <li>Counselling Of Other States <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                         
                    </ul>
                    <a href="#" class="pricingTable-signup">Sign Up</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable ">
                     <div class="pricingTable-header">
                    	<h6 class="qilck">Counselling Package</h6>
                        <h3 class="title">PREMIUM PLAN</h3>
                    </div>
                    <div class="price-value">
                        <span class="amount">₹ 29,999</span>
                        <span class="month">10% OFF ₹ 33333</span>
                    </div>
                    <ul class="pricing-content">
                        <li>Unlimited Quick Info <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span> </li>
                        <li>Unlimited Expert Info <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                        <li>Access To Counselling Tools <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li> 
                        <li>Access To College Predictor <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                        <li>Full Support In Counselling <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span> </li>
                        <li>Option & Choice Entry <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                        <li>Post Seat Allocation <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                    </ul>
                    <a href="#" class="pricingTable-signup">Sign Up</a>
                </div>
            </div>
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
				<div class="col-lg-6">
					<a class="box_news" href="#!">
						<figure><img src="assets/news_home_1.jpg" alt=""></figure>
						<ul>
							<li>Restaurants</li>
							<li>20.11.2017</li>
						</ul>
						<h4>Pri oportere scribentur eu</h4>
						<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
					</a>
				</div>
				<!-- /box_news -->
				<div class="col-lg-6">
					<a class="box_news" href="#!">
						<figure><img src="assets/news_home_1.jpg" alt=""></figure>
						<ul>
							<li>Shops</li>
							<li>20.11.2017</li>
						</ul>
						<h4>Duo eius postea suscipit ad</h4>
						<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
					</a>
				</div>
				<!-- /box_news -->
				<div class="col-lg-6">
					<a class="box_news" href="#!">
						<figure><img src="assets/news_home_1.jpg" alt=""></figure>
						<ul>
							<li>Shops</li>
							<li>20.11.2017</li>
						</ul>
						<h4>Elitr mandamus cu has</h4>
						<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
					</a>
				</div>
				<!-- /box_news -->
				<div class="col-lg-6">
					<a class="box_news" href="#!">
						<figure><img src="assets/news_home_1.jpg" alt=""></figure>
						<ul>
							<li>Bars</li>
							<li>20.11.2017</li>
						</ul>
						<h4>Id est adhuc ignota delenit</h4>
						<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
					</a>
				</div>
				<!-- /box_news -->
			</div>
			<!-- /row -->
			<p class="btn_home_align"><a href="#!" class="btn_1 rounded">View all news</a></p>
		</div>


</main>
<?php $this->load->view('site/footer');?>
