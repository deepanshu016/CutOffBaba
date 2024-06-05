<?php $this->load->view('site/header');?>
<div class="sub_header_in sticky_header">
		<div class="container">
			<h1>Reset Password</h1>
		</div>
	</div>
	<main>
		<div class="container margin_60">
			<div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-8">
                    <div class="box_account">
                        <h3 class="client">Reset Password</h3>
                        <div class="form_container">
                            <form method="post" action="<?= base_url('/user/reset-password') ?>" id="resetPassword">
                                <div class="sign-in-wrapper">
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="New Password">
                                        <input type="hidden" class="form-control" name="user_id" value="<?= $userData['id']; ?>">
                                        <span id="password" class="text-danger"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Retype Password</label>
                                        <input type="password" class="form-control" name="confirm_password" placeholder="Retype Password">
                                        <span id="confirm_password" class="text-danger"></span>
                                    </div>
                                    <div class="text-center"><input type="submit" value="Update" class="btn_1 full-width"></div>
                                </div>
                            </form>
                        </div>
                        <!-- /form_container -->
                    </div>
                </div>
		    </div>
		    <!-- /row -->
		</div>
		<!-- /container -->
	</main>
<?php $this->load->view('site/footer');?>

<script src="<?=base_url('/')?>app/assets/site/js/CommonLib.js"></script>
<script>
    $("body").on("submit","#resetPassword",function(e){
        e.preventDefault();
        var currentWrapper = $(this);
        var url = currentWrapper.attr('action');
        var method = currentWrapper.attr('method');
        var formData = $('#resetPassword')[0];
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
                console.log("Responsesss",d);
                CommonLib.notification.error(d.errors);
            }
        }).catch(e=>{
                CommonLib.notification.error(e.responseJSON.errors);
        });
    });
</script>