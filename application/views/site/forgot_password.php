<?php $this->load->view('site/header');?>
    <div class="sub_header_in sticky_header">
        <div class="container">
            <h1>Forgot Password</h1>
        </div>
	</div>
	<main>
		<div class="container margin_60">
			<div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-8">
                    <div class="box_account">
                        <h3 class="client">Forgot Password</h3>
                        <div class="form_container">
                            <form method="POST" action="<?= base_url('/user/send-otp') ?>" class="send_otp">
                                <div class="sign-in-wrapper">
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="number" class="form-control" name="phone">
                                    </div>
                                    <div class="text-center">
                                        <input type="submit" value="Send OTP" class="btn_1 full-width">
                                    </div>
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
<script>
    $(document).on("submit",'.send_otp',function(e){
        e.preventDefault();
        var method = $(this).attr('method');
        var url = $(this).attr("action");
        alert(url)
        var form = $(this)[0];
        var form_data = new FormData(form);    
        $.ajax({
            type: method,
            url: url,
            data:form_data,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(data){
                if(data.status == 'error'){
                    $.each(data.errors, function(key, value) {
                        $('#'+key).addClass('is-invalid');
                        $('#'+key).html(value);
                    });  
                }
                if(data.status == 'success'){
                    showNotify(data.message,data.status,data.url);
                }
                if(data.status == 'errors'){
                    showNotify(data.message,data.status,data.url);
                }
            }
        }); 
    })
</script>