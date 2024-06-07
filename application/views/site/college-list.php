<div class="strip list_view">
	<div class="row g-0">
		<div class="col-lg-5">
			<figure>
				<a href="<?=base_url('college-detail/'.$slug."/".$college_id);?>"><img src="<?=asset_url()."college/banner/".$banner;?>" class="img-fluid" alt="" width="400" height="266"><div class="read_more"><span>Read more</span></div></a><small><?=$full_name;?></small>
			</figure>
		</div>
		<div class="col-lg-7">
			<div class="wrapper">
				<a href="#0" class="wish_bt"></a>
					<h3><a href="<?=base_url('college-detail/'.$slug."/".$college_id);?>">
					<?php if(!empty($ownership)){ ?>
						<small><?=$ownership['title'];?></small>
					<?php } ?>
				</a></h3>
				<small><?=$university_name; ?></small>
				<p></p>
				<a class="address" href="#" target="_blank">Get directions</a>
			</div>
			<ul>
				<li><span class="loc_open">Estb. <?=$establishment;?></span></li>
				<li><div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div></li>
			</ul>
		</div>
	</div>
</div>

<script>
        document.addEventListener('DOMContentLoaded', function () {
		var locationName = "<?=$full_name;?>"; // Replace with your location name
		var encodedLocationName = encodeURIComponent(locationName);
		var googleMapsUrl = 'https://www.google.com/maps/search/?api=1&query=' + encodedLocationName;
		
		var mapLinks = document.getElementsByClassName('address');
		// Loop through the elements and update each one
		for (var i = 0; i < mapLinks.length; i++) {
			mapLinks[i].href = googleMapsUrl;
			// mapLinks[i].innerText = 'Open ' + locationName + ' in Google Maps';
		}
	});
</script>