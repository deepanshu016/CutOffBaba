<?php include_once('header.php') ?>
<div class="container pt-5 pb-3">
	<div class="row">
		<div class="col-md-10 mx-auto">
			<h3  class="lead-text text-center pb-4">About Us</h3>
			<p class="lead-text text-justify"><?= @$siteSettings['about_us']; ?></p>
		</div>
	</div>
</div>
<div class="container pt-5">
	<div class="row">
		<div class="col-md-10 col-xl-8 mx-auto">
			<h3  class="lead-text text-center pb-4">Our Expert Team</h3>
		</div>
	</div>
</div>
<div id="slider-section " class="overflow-hidden" >
	<h4 class="text-center">Core Team</h4>
	<div class="inspire__slider slider-1 inspire__slider--desktop inview container">
		<div class="swiper-container swiper-container-coverflow swiper-container-3d swiper-container-horizontal">
			<ul class="swiper-wrapper inspire__slider--owl">
				<?php foreach($coreList as $core){include('teambox.php');}  ?>
			</ul>
			<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
		</div>
	</div>
</div>
<div id="slider-section" class="overflow-hidden" >
	<h4 class="text-center">Mentors & Advisory</h4>
	<div class="inspire__slider slider-2 inspire__slider--desktop inview container">
		<div class="swiper-container swiper-container-coverflow swiper-container-3d swiper-container-horizontal">
			<ul class="swiper-wrapper inspire__slider--owl">
				<?php foreach($mentorsList as $core){include('teambox.php');}  ?>
			</ul>
			<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
		</div>
	</div>
</div>
<!-- <div id="slider-section" class="overflow-hidden" >
	<h4 class="text-center">Out Source</h4>
	<div class="inspire__slider slider-3 inspire__slider--desktop inview">
		<div class="swiper-container swiper-container-coverflow swiper-container-3d swiper-container-horizontal">
			<ul class="swiper-wrapper inspire__slider--owl">
				<?php for($i=0;$i<=5;$i++){ include('teambox.php'); } ?>
			</ul>
			<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
		</div>
	</div>
</div> -->
<?php if(!empty($certificateList)){ ?>
<div class="container pt-4 pb-4 bg-white">
	<div class="row">
		<div class="col-md-10 col-xl-8 mx-auto">
			<h3  class="lead-text text-center pb-4">Our Recognition</h3>
		</div>
		<?php foreach($certificateList as $certificate) { ?>
		<img src="<?=base_url('assets/uploads/certificates/'.$certificate['image']);?>" class="pb-3">
		<?php } ?>
	</div>
</div>
<?php } ?>
<script src="<?=base_url('assets/front/');?>/jsfront/about.js"></script>
<?php include_once('footer.php') ?>