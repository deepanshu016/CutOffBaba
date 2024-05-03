<?php $this->load->view('site/header');?>
	
	<div class="sub_header_in sticky_header">
		<div class="container">
			<h1><?=$title;?></h1>
		</div>
		<!-- /container -->
	</div>
	<!-- /sub_header -->
	
	<main>
		<div class="container margin_60_35">
			
			<div class="row">
				<?php foreach ($colleges as $college) { //print_r($college);

					?>
					<div class="col-xl-4 col-lg-6 col-md-6">
						<div class="strip grid">
							<figure>
								<a href="<?=base_url('college-detail/'.$college->slug."/".$college->college_id);?>"><img src="<?=asset_url()."media/image/".$college->college_bannerfile;?>" class="img-fluid" alt="" width="400" height="266"><div class="read_more"><span>Read more</span></div></a>
								<small><?=$college->full_name;?></small>
							</figure>
							<div class="wrapper">
								<h3><a href="<?=base_url('college-detail/'.$college->slug."/".$college->college_id);?>"><?=$college->full_name;?></a></h3>
								<p><?=$college->full_name;?></p>
								<a class="address" href="<?=$college->full_name;?>">Get directions</a>
							</div>
							<ul>
								<li><span class="loc_open">Estb. <?=$college->establishment;?></span></li>
								<li><div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div></li>
							</ul>
						</div>
					</div>
				<?php } ?>
				<div class="col-xl-4 col-lg-6 col-md-6">
					<div class="strip grid">
						<figure>
							<a href="#0" class="wish_bt liked"></a>
							<a href="detail.html"><img src="img/location_1.jpg" class="img-fluid" alt=""><div class="read_more"><span>Read more</span></div></a>
							<small>Restaurant</small>
						</figure>
						<div class="wrapper">
							<h3><a href="detail.html">Da Alfredo</a></h3>
							<small>27 Old Gloucester St</small>
							<p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
							<a class="address" href="https://www.google.com/maps/dir//Assistance+–+Hôpitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x47e66e1de36f4147:0xb6615b4092e0351f!2sAssistance+Publique+-+Hôpitaux+de+Paris+(AP-HP)+-+Siège!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank">Get directions</a>
						</div>
						<ul>
							<li><span class="loc_open">Now Open</span></li>
							<li><div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div></li>
						</ul>
					</div>
				</div>
				<!-- /strip grid -->
				<div class="col-xl-4 col-lg-6 col-md-6">
					<div class="strip grid">
						<figure>
							<a href="#0" class="wish_bt liked"></a>
							<a href="detail.html"><img src="img/location_2.jpg" class="img-fluid" alt=""><div class="read_more"><span>Read more</span></div></a>
							<small>Bar</small>
						</figure>
						<div class="wrapper">
							<h3><a href="detail.html">Limon Bar</a></h3>
							<small>438 Rush Green Road, Romford</small>
							<p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
							<a class="address" href="https://www.google.com/maps/dir//Assistance+–+Hôpitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x47e66e1de36f4147:0xb6615b4092e0351f!2sAssistance+Publique+-+Hôpitaux+de+Paris+(AP-HP)+-+Siège!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank">Get directions</a>
						</div>
						<ul>
							<li><span class="loc_open">Now Open</span></li>
							<li><div class="score"><span>Good<em>350 Reviews</em></span><strong>7.0</strong></div></li>
						</ul>
					</div>
				</div>
				<!-- /strip grid -->
				<div class="col-xl-4 col-lg-6 col-md-6">
					<div class="strip grid">
						<figure>
							<a href="#0" class="wish_bt liked"></a>
							<a href="detail.html"><img src="img/location_3.jpg" class="img-fluid" alt=""><div class="read_more"><span>Read more</span></div></a>
							<small>Shop</small>
						</figure>
						<div class="wrapper">
							<h3><a href="detail.html">Mary Boutique</a></h3>
							<small>43 Stephen Road, Bexleyheath</small>
							<p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
							<a class="address" href="https://www.google.com/maps/dir//Assistance+–+Hôpitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x47e66e1de36f4147:0xb6615b4092e0351f!2sAssistance+Publique+-+Hôpitaux+de+Paris+(AP-HP)+-+Siège!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank">Get directions</a>
						</div>
						<ul>
							<li><span class="loc_closed">Now Closed</span></li>
							<li><div class="score"><span>Good<em>350 Reviews</em></span><strong>7.0</strong></div></li>
						</ul>
					</div>
				</div>
				<!-- /strip grid -->
				<div class="col-xl-4 col-lg-6 col-md-6">
					<div class="strip grid">
						<figure>
							<a href="#0" class="wish_bt liked"></a>
							<a href="detail.html"><img src="img/location_4.jpg" class="img-fluid" alt=""><div class="read_more"><span>Read more</span></div></a>
							<small>Bar</small>
						</figure>
						<div class="wrapper">
							<h3><a href="detail.html">Garden Bar</a></h3>
							<small>40 Beechwood Road, Sanderstead</small>
							<p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
							<a class="address" href="https://www.google.com/maps/dir//Assistance+–+Hôpitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x47e66e1de36f4147:0xb6615b4092e0351f!2sAssistance+Publique+-+Hôpitaux+de+Paris+(AP-HP)+-+Siège!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank">Get directions</a>
						</div>
						<ul>
							<li><span class="loc_closed">Now Closed</span></li>
							<li><div class="score"><span>Superb<em>350 Reviews</em></span><strong>9.0</strong></div></li>
						</ul>
					</div>
				</div>
				<!-- /strip grid -->
				<div class="col-xl-4 col-lg-6 col-md-6">
					<div class="strip grid">
						<figure>
							<a href="#0" class="wish_bt liked"></a>
							<a href="detail.html"><img src="img/location_5.jpg" class="img-fluid" alt=""><div class="read_more"><span>Read more</span></div></a>
							<small>Hotel</small>
						</figure>
						<div class="wrapper">
							<h3><a href="detail.html">Mariott Hotel</a></h3>
							<small>213 Malden Road, New Malden</small>
							<p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
							<a class="address" href="https://www.google.com/maps/dir//Assistance+–+Hôpitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x47e66e1de36f4147:0xb6615b4092e0351f!2sAssistance+Publique+-+Hôpitaux+de+Paris+(AP-HP)+-+Siège!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank">Get directions</a>
						</div>
						<ul>
							<li><span class="loc_open">Now Open</span></li>
							<li><div class="score"><span>Good<em>350 Reviews</em></span><strong>7.5</strong></div></li>
						</ul>
					</div>
				</div>
				<!-- /strip grid -->
				<div class="col-xl-4 col-lg-6 col-md-6">
					<div class="strip grid">
						<figure>
							<a href="#0" class="wish_bt liked"></a>
							<a href="detail.html"><img src="img/location_6.jpg" class="img-fluid" alt=""><div class="read_more"><span>Read more</span></div></a>
							<small>Event</small>
						</figure>
						<div class="wrapper">
							<h3><a href="detail.html">Six Pistols</a></h3>
							<small>Coverdale Road, Willesden</small>
							<p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
							<a class="address" href="https://www.google.com/maps/dir//Assistance+–+Hôpitaux+De+Paris,+3+Avenue+Victoria,+75004+Paris,+Francia/@48.8606548,2.3348734,14z/data=!4m15!1m6!3m5!1s0x47e66e1de36f4147:0xb6615b4092e0351f!2sAssistance+Publique+-+Hôpitaux+de+Paris+(AP-HP)+-+Siège!8m2!3d48.8568376!4d2.3504305!4m7!1m0!1m5!1m1!1s0x47e67031f8c20147:0xa6a9af76b1e2d899!2m2!1d2.3504327!2d48.8568361" target="_blank">Get directions</a>
						</div>
						<ul>
							<li><span class="loc_open">Now Open</span></li>
							<li><div class="score"><span>Good<em>350 Reviews</em></span><strong>7.8</strong></div></li>
						</ul>
					</div>
				</div>
				<!-- /strip grid -->
			</div>
			<!-- /row -->
			
		</div>
		<!-- /container -->
		
		<div class="bg_color_1">
			<div class="container margin_60_35">
				<div class="row">
					<div class="col-lg-4">
						<a href="#0" class="boxed_list">
							<i class="pe-7s-help2"></i>
							<h4>Need Help? Contact us</h4>
							<p>Cum appareat maiestatis interpretaris et, et sit.</p>
						</a>
					</div>
					<div class="col-lg-4">
						<a href="#0" class="boxed_list">
							<i class="pe-7s-wallet"></i>
							<h4>Payments</h4>
							<p>Qui ea nemore eruditi, magna prima possit eu mei.</p>
						</a>
					</div>
					<div class="col-lg-4">
						<a href="#0" class="boxed_list">
							<i class="pe-7s-note2"></i>
							<h4>Cancel Policy</h4>
							<p>Hinc vituperata sed ut, pro laudem nonumes ex.</p>
						</a>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
	</main>
	<?php $this->load->view('site/footer');?>