<?php 
	if(!empty($result)){
foreach ($result as $college){ 
	$ownership = $this->db->select('*')->where('id',$college['ownership'])->get('tbl_ownership')->row_array();
	?>
<div class="strip list_view">
	<div class="row g-0">
		<div class="col-lg-5">
			<figure>
				<a href="<?=base_url('college-detail/'.$college['slug']."/".$college['id']);?>">
				<img src="<?=asset_url()."college/banner/".$college['college_banner'];?>" class="img-fluid" alt="" width="400" height="266"><div class="read_more"><span>Read more</span></div></a>
				<?php if(!empty($ownership)){ ?>
						<small><?=$ownership['title'];?></small>
				<?php } ?>
			</figure>
		</div>
		<div class="col-lg-7">
			<div class="wrapper">
				<a href="#0" class="wish_bt"></a>
				<h3><a href="<?=base_url('college-detail/'.$college['slug']."/".$college['id']);?>"><?=$college['full_name'];?></a></h3>
				<small><?=$college['university_name']; ?></small>
				<p></p>
				<a class="address" href="#" target="_blank">Get directions</a>
			</div>
			<ul>
				<li><span class="loc_open">Estb. <?=$college['establishment'];?></span></li>
				<li><div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div></li>
			</ul>
		</div>
	</div>
</div>
<?php } } else{?>
	<div class="strip list_view">
		<div class="row g-0">
			No Colleges Found 
		</div>
	</div>
<?php } ?>