<?php include_once('header.php') ?>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-12 pt-5 text-center pb-5 card">
			<div class="row d-flex text-center">
				<div class="col-md-6 col-12  mx-auto pb-5 pt-5">
				    <h2>Forgot your Password</h2>
				    <p class="mb-5">Enter your email to get link for verification</p>
				    <form action="<?=base_url('request-to-forgot-password');?>" class="all-form" method="POST">
				    	<p class="alert alert-danger" style="display:none;"></p>
				    	<div class="form-group mb-2">
				    		<input class="form-control" type="text" placeholder="Email" name="email">
				    		<span id="email" style="color:red;"></span>
				    	</div>
				    	<div class="form-group mb-5">
				    		<input class="btn btn-primary w-100" type="submit" value="GET LINK">
				    	</div>
				    </form>
		    	</div>
		    </div>
		</div>
		<div class="col-md-4 col-12 bg-orange v-100">
		    <div class="text-center">
		        <img src="<?=base_url('assets/front/images/reg.png');?>" style="max-width:70%">
		    </div>
		</div>
	</div>
</div>
<?php include_once('footer.php') ?>