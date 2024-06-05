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
						<form method="post" action="<?= base_url('save-enquiry'); ?>" id="contactForm" autocomplete="off">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Name</label>
										<input class="form-control" type="text" id="name_contact" name="name" placeholder="Name">
										<span id="name" class="text-danger"></span>
									</div>
								</div>
							</div>
							<!-- /row -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Email</label>
										<input class="form-control" type="text" id="email_contact" name="email" placeholder="Email">
										<span id="email" class="text-danger"></span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Telephone</label>
										<input class="form-control" type="text" id="phone_contact" name="phone"  placeholder="Telephone">
										<span id="phone" class="text-danger"></span>
									</div>
								</div>
							</div>
							<!-- /row -->
							<div class="form-group">
								<label>Subject</label>
								<input class="form-control" type="text" id="phone_contact" name="subject" placeholder="Subject">
								<span id="subject" class="text-danger"></span>
							</div>
							<div class="form-group">
								<label>Message</label>
								<textarea class="form-control" id="message_contact" name="message" style="height:150px;" placeholder="Message"></textarea>
								<span id="message" class="text-danger"></span>
							</div>
							<p class="add_top_30"><input type="submit" value="Submit" class="btn_1 rounded" id="submit-contact"></p>
						</form>
				</div>
				<div class="col-xl-6 col-lg-6 pl-xl-5">
					<div class="box_contacts">
						<i class="ti-support"></i>
						<h2>Need Help?</h2>
						<a href="#0"><?=$siteSettings['mobile_no'];?></a>
					</div>
					<div class="box_contacts">
						<i class="ti-help-alt"></i>
						<h2>Questions?</h2><a href="#0"><?=$siteSettings['email'];?></a>
					</div>
					<div class="box_contacts">
						<i class="ti-home"></i>
						<h2>Address</h2>
						<a href="#0"><?=$siteSettings['address'];?></a>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php $this->load->view('site/footer');?>
	<script src="<?=base_url('/')?>app/assets/site/js/CommonLib.js"></script>
	<script>
    $("body").on("submit","#contactForm",function(e){
        e.preventDefault();
        var currentWrapper = $(this);
        var url = currentWrapper.attr('action');
        var method = currentWrapper.attr('method');
        var formData = $('#contactForm')[0];
        formData = new FormData(formData);
        CommonLib.ajaxForm(formData,method,url).then(d=>{
            if(d.status === 200){
                console.log(d.status)
                CommonLib.notification.success(d.message);
                setTimeout(() => {
                window.location = d.url;
            }, 1000);
            }else if(d.status == 401){
                $.each(d.errors, function(key, value) {
                    $('#'+key).addClass('is-invalid');
                    $('#'+key).html(value);
                });  
            }else{
                CommonLib.notification.error(d.errors);
            }
        }).catch(e=>{
                CommonLib.notification.error(e.responseJSON.errors);
        });
    });
</script>