<footer class="plus_border">
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<h3 data-bs-target="#collapse_ft_1">Quick Links</h3>
					<div class="collapse dont-collapse-sm" id="collapse_ft_1">
						<ul class="links">
							<li><a href="<?=base_url('about-us');?>">About us</a></li>
							<li><a href="#0">Faq</a></li>
							<li><a href="#0">Help</a></li>
							<li><a href="#0">My account</a></li>
							<li><a href="#0">Create account</a></li>
							<li><a href="#0">Contacts</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<h3 data-bs-target="#collapse_ft_2">Streams</h3>
					<div class="collapse dont-collapse-sm" id="collapse_ft_2">
						<ul class="links">
							<?php foreach($streams as $stream){ ?>
						        <li><span><a href="<?=base_url('courses/').str_replace(" ","-",$stream['stream']);?>"><?=$stream['stream'];?></a></span></li>
						    <?php } ?>	 
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<h3 data-bs-target="#collapse_ft_3">Contacts</h3>
					<div class="collapse dont-collapse-sm" id="collapse_ft_3">
						<ul class="contacts">
							<li><i class="ti-home"></i><?=$siteSettings['address'];?></li>
							<li><i class="ti-headphone-alt"></i><?=$siteSettings['mobile_no'];?></li>
							<li><i class="ti-email"></i><a href="#0"><?=$siteSettings['email'];?></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<h3 data-bs-target="#collapse_ft_4">Keep in touch</h3>
					<div class="collapse dont-collapse-sm" id="collapse_ft_4">
						<div id="newsletter">
							<div id="message-newsletter"></div>
							<form method="post" action="#" name="newsletter_form" id="newsletter_form">
								<div class="form-group">
									<input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
									<input type="submit" value="Submit" id="submit-newsletter">
								</div>
							</form>
						</div>
						<div class="follow_us">
							<h5>Follow Us</h5>
							<ul>
								<li><a href="#0"><i class="ti-facebook"></i></a></li>
								<li><a href="#0"><i class="ti-twitter-alt"></i></a></li>
								<li><a href="#0"><i class="ti-google"></i></a></li>
								<li><a href="#0"><i class="ti-pinterest"></i></a></li>
								<li><a href="#0"><i class="ti-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	</div>
	<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
		<div class="small-dialog-header">
			<h3>Sign In</h3>
		</div>
		<form method="post" action="<?=base_url('loginchk');?>" class="all-form">
			<div class="sign-in-wrapper">
				<div class="form-group">
					<label>Mobile</label>
					<input type="number" class="form-control" name="phone" id="phone">
					<i class="icon_phone"></i>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" id="password" value="">
					<i class="icon_lock_alt"></i>
				</div>
				<div class="clearfix add_bottom_15">
					<div class="checkboxes float-start">
						<label class="container_check">Remember me
						  <input type="checkbox">
						  <span class="checkmark"></span>
						</label>
					</div>
					<div class="float-end mt-1"><a id="forgot" href="<?=base_url('forget');?>">Forgot Password?</a></div>
				</div>
				<div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>
				<div class="text-center">
					Don’t have an account? <a href="<?=base_url('signup');?>">Sign up</a>
				</div>
			</div>
		</form>
	</div>	
	<div id="toTop"></div>
	    
    <script src="<?=base_url('assets/js');?>/common_scripts.js"></script>
	<script src="<?=base_url('assets/js');?>/functions.js"></script>
	<script src="<?=base_url('/app/')?>assets/admin/js/toastr.js"></script>
    <script src="<?=base_url('/app/')?>assets/admin/js/custom.js"></script>
	<script src="<?=base_url('assets/js');?>/validate.js"></script>
</body>
</html>