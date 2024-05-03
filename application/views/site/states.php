<?php $this->load->view('site/header');?>
<div class="sub_header_in sticky_header">
	<div class="container">
		<h1><?=$title;?></h1>
	</div>
</div>
<main>
	<div class="container margin_60_35">		
		<div class="row">
			<?php foreach ($states as $key) {//print_r($key);?>
				<div class="col-xl-2 col-lg-4 col-md-6">
					<div class="strip grid">
						<figure>
							<a href="<?=base_url('states/').$key->state_id;?>"><img src="<?=asset_url().'state/'.$key->statelogo;?>" class="img-fluid" alt=""><div class="read_more"><span>View more</span></div></a>
						</figure>
						<div class="wrapper">
							<h5 class="f14ps" style="font-size: 16px;text-align: center;"><a href="<?=base_url('states/').$key->state_id;?>"><?=$key->state_name;?></a></h5>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		
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