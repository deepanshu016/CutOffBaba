<div class="col-md-3">
	<div class="strip grid">
		<figure>
			<a href="<?=base_url('college-detail/'.$slug."/".$college_id);?>"><img src="<?=asset_url()."media/image/".$college_bannerfile;?>" class="img-fluid" alt="" width="400" height="266"><div class="read_more"><span>Read more</span></div></a>
							<small><?=$full_name;?></small>
		</figure>
		<div class="wrapper">
			<h3><a href="<?=base_url('college-detail/'.$slug."/".$college_id);?>"><?=$full_name;?></a></h3>
			<small>27 Old Gloucester St</small>
			<p><?=$full_name;?></p>
			<a class="address" href="<?=$full_name;?>">Get directions</a>
		</div>
		<ul>
			<li><span class="loc_open">Estb. <?=$establishment;?></span></li>
			<li><div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div></li>
		</ul>
	</div>
</div>