<?php include_once('header.php') ?>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'>
<style type="text/css">
	i{font-size: 24px !important}
	.form-control{border:1px solid #ccc !important;}
	.br-danger{border: 1px solid red !important}
	label.br-danger{border: none !important;text-align: left !important;margin: 0 !important;float: left;clear: both}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-12 pt-5 text-center pb-5 card">
			<div class="row d-flex">
				<div class="col-md-6 col-12  mx-auto pb-5 pt-5">
		    <h2>Register Now</h2>
		    <p class="mb-5">Register as Photographer</p>
		    <form method="post" id="registerfrm" action="<?=base_url('newregistration');?>">
		    	<p class="alert alert-danger" style="display:none;"></p>
		    	<div class="input-group mb-2">
		    		 <div class="input-group-prepend">
		    		 	<span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i> </span>
		    		 </div>
		    		 <input class="form-control" type="text" placeholder="Enter Your Name" required name="name">		    		
		    	</div>
		    	<div class="input-group mb-2">
		    		 <div class="input-group-prepend">
		    		 	<span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i> </span>
		    		 </div>
		    		 <input class="form-control" type="email" placeholder="Enter Your Email" required name="email">    		
		    	</div>
		    	<div class="input-group mb-2">
		    		 <div class="input-group-prepend">
		    		 	<span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i> </span>
		    		 </div>
		    		 <input class="form-control" type="number" placeholder="Enter Your Mobile" required name="mobile">	    		
		    	</div>
		    	<div class="input-group mb-2">
		    		 <div class="input-group-prepend">
		    		 	<span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i> </span>
		    		 </div>
		    		 <input class="form-control" type="password" id="password" placeholder="Password" required name="password">    		
		    	</div>
		    	<div class="input-group mb-2">
		    		 <div class="input-group-prepend">
		    		 	<span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i> </span>
		    		 </div>
		    		 <input class="form-control" type="password" placeholder="Repeat Password"  required name="rptpassword">    		
		    	</div>

		    	
		    	<div class="form-group mb-2 d-flex justify-content-between w-100">
		    		<label for="remember">
		    			<input class="checkbox" checked required id="remember" type="checkbox" value="agree" name="agree"> I Agree <a href="https://docs.google.com/document/d/17mCruigdUjPbYzpuFEjKDGBgzUvzT8xgs8FDVmGliEo/edit?usp=sharing">Term & Condition</a>
			    	</label>
		    	</div>
		    	<div class="form-group mb-5">
		    		<input class="btn btn-primary w-100" type="submit" value="Register Now">
		    	</div>
		    </form>
		    <div class="form-group mb-2 text-center">
		    		Already Have a Account ? 
			    	<a href="<?=base_url('login');?>">Login Here</a>
		    	</div>
		    	</div></div>
		    
		</div>
		
		<div class="col-md-4 col-12 bg-orange v-100">
		    <div class="text-center">
		        <img src="<?=base_url('assets/front/images/reg.png');?>" style="max-width:70%">
		    </div>
		</div>
	</div>
</div>
<?php include_once('footer.php') ?>