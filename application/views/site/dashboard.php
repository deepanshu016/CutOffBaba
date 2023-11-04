<?php include_once('header.php') ?>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'>
<style type="text/css">
	i{font-size: 24px !important}
	.form-control{border:1px solid #ccc !important;}
	.br-danger{border: 1px solid red !important}
	.v-100{height: 100vh}
	label.br-danger{border: none !important;text-align: left !important;margin: 0 !important;float: left;clear: both}
</style>

<section style="background:url(<?=base_url('assets/front/images/dashboard.png');?>) no-repeat;">
<div class="alert alert-danger text-center">
	<p>Your Email is Not Verified yet. Please Check your Email or <a href="<?=base_url('resend-email');?>"> Resend Verification Link</a></p>
</div>	
	<div class="container" >
		<div class="row">		
			<div class="col-md-12 col-12 v-100 mx-auto text-center">
			    <div class="text-center">
			        
			    </div>
			</div>
		</div>
	</div>
</section>
<?php include_once('footer.php') ?>