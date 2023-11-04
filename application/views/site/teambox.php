<li class="swiper-slide teamslider">
	<div class="cardstack-animate-card card teambox">
		<?php if($core['image'] != ''){ ?>
			<img src="<?=base_url('assets/uploads/teams/'.$core['image']);?>">
		<?php } else{  ?>
			<img src="<?=base_url('assets/dummy_image.png');?>">
		<?php } ?>
		<div class="card-body p-3">
			<div class="text-center">
				<h4><?=@$core['name'];?></h4>
				<p> <?=@$core['designation'];?></p>
				<p><?=@$core['about'];?></p>
				<ul class="social">
					<li><a href="<?= ($core['facebook']) ? $core['facebook'] : '#'; ?>"><i class="lni lni-facebook single_social"></i></a></li>
					<li><a href="<?= ($core['twitter']) ? $core['twitter'] : '#'; ?>"><i class="lni lni-twitter-original single_social"></i></a></li>
					<li><a href="<?= ($core['instagram']) ? $core['instagram'] : '#'; ?>"><i class="lni lni-instagram single_social"></i></a></li>
					<li><a href="<?= ($core['linkedin']) ? $core['linkedin'] : '#'; ?>"><i class="lni lni-linkedin single_social"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
</li>