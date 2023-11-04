<?php include_once('header.php') ?>
<div class="container">
	<div class="row">

		
		<div class="col-md-8 col-12 pt-5 text-center pb-5 card">
			<div class="row d-flex text-center">
				<div class="col-md-6 col-12  mx-auto pb-5 pt-5">
		    <h2>Login to your Account</h2>
		    <p class="mb-5">Welcome back! Select method to log in:</p>
		    <form action="<?=base_url('user-login');?>" id="loginfrm">
		    	<p class="alert alert-danger" style="display:none;"></p>
		    	<div class="form-group mb-2">
		    		<input class="form-control" type="email" placeholder="Email" name="email">
		    	</div>
		    	<div class="form-group mb-2">
		    		<input class="form-control" type="password" placeholder="Password" name="password">
		    	</div>
		    	<div class="form-group mb-2 d-flex justify-content-between">
		    		<label for="remember">
		    			<input class="checkbox" id="remember" type="checkbox" value="Login"> Remember Me
			    	</label>
			    	<a href="<?=base_url('forgot-password');?>">Forgot Password ?</a>
		    	</div>
		    	<div class="form-group mb-5">
		    		<input class="btn btn-primary w-100" type="submit" value="Login">
		    	</div>
		    </form>
		    <div class="form-group mb-2 text-center">
		    		Don't Have a Account ? 
			    	<a href="<?=base_url('register');?>">Register Now</a>
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