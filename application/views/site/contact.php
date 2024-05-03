<?php $this->load->view('site/header');?>
	<div class="sub_header_in sticky_header">
		<div class="container">
			<h1>Contact Us</h1>
		</div>
	</div>
	<main>
		<div class="container margin_60_35">
			<div class="row justify-content-center">
				
				<div class="col-xl-6 col-lg-6 pr-xl-5 card p-5">
					<div class="main_title_3">
						<span></span>
						<h2>Send us a message</h2>
					</div>
					<div id="message-contact"></div>
						<form method="post" action="#" id="contactform" autocomplete="off">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Name</label>
										<input class="form-control" type="text" id="name_contact" name="name_contact">
									</div>
								</div>
							</div>
							<!-- /row -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Email</label>
										<input class="form-control" type="email" id="email_contact" name="email_contact">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Telephone</label>
										<input class="form-control" type="text" id="phone_contact" name="phone_contact">
									</div>
								</div>
							</div>
							<!-- /row -->
							<div class="form-group">
								<label>Message</label>
								<textarea class="form-control" id="message_contact" name="message_contact" style="height:150px;"></textarea>
							</div>
							<p class="add_top_30"><input type="submit" value="Submit" class="btn_1 rounded" id="submit-contact"></p>
						</form>
				</div>
				<div class="col-xl-6 col-lg-6 pl-xl-5">
					<div class="box_contacts">
						<i class="ti-support"></i>
						<h2>Need Help?</h2>
						<a href="#0"><?=$siteSettings->mobile_no;?></a>
					</div>
					<div class="box_contacts">
						<i class="ti-help-alt"></i>
						<h2>Questions?</h2><a href="#0"><?=$siteSettings->email;?></a>
					</div>
					<div class="box_contacts">
						<i class="ti-home"></i>
						<h2>Address</h2>
						<a href="#0"><?=$siteSettings->address;?></a>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php $this->load->view('site/footer');?>