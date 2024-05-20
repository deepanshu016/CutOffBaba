<?php $this->load->view('site/header');?>
<main>
	<section class="hero_single version_4">
		<div class="wrapper">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8">
						<h3>Find what you need!</h3>
						<p>Discover top rated College, Courses and Exams around the world</p>
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
		<div class="row justify-content-center">
			<?php foreach ($streams as $stream) { ?>
				<?php $count=$this->db->select('*')->where('stream',$stream['id'])->get('tbl_college')->num_rows(); if($count>0){?>
				<div class="col-lg-4 col-md-6 " >
					<a href="<?=base_url('courses/').str_replace(" ","-",$stream['stream']).'/'.$stream['id'];?>" class="box_cat_home text-left" style="background:url('<?=asset_url();?>stream/<?=$stream['stream_image'];?>') no-repeat;background-size: 100% 100%;">
						<h3 class="text-left"><?=$stream['stream'];?></h3>
						<p style="max-width:50%;padding:10px;background:rgba(0, 0, 0, 0.3);color:#fff;border-radius:10px "><?=substr($stream['description'],0,80);?></p>
						
						<ul>
							<li><strong><?=$count;?></strong>Colleges </li>
						</ul>
					</a>
				</div>
			<?php } }?>
		</div>
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
