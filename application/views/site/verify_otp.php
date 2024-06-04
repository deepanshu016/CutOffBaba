<?php $this->load->view('site/header');?>
<div class="sub_header_in sticky_header">
		<div class="container">
			<h1>Verify OTP</h1>
		</div>
	</div>
	<main>
		<div class="container margin_60">
			<div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-8">
                    <div class="box_account">
                        <h3 class="client">Verify OTP</h3>
                        <div class="form_container">
                            <br>OTP sent on  +91 <?= @$userData['mobile']; ?><br><br></span>
                            <form method="post" action="<?= base_url('/user/otp-verification') ?>" class="all-form">
                                <div class="sign-in-wrapper">
                                    <div class="form-group">
                                        <label>OTP</label>
                                        <input type="number" class="form-control" name="otp" required>
                                        <input type="hidden" class="form-control" name="user_id" value="<?= $userData['id']; ?>">
                                    </div>
                                    <div class="text-center"><input type="submit" value="Verify OTP" class="btn_1 full-width"></div>
                                </div>
                            </form>
                            <p id="timer" style="color: black;">00:00</p>
                            <a id="resendButton" style="display:none;color: #5baef3;" onclick="resendOTP()">Resend OTP</a>
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
        
         $("body").on("submit","#verifyOtp",function(e){
            e.preventDefault();
            var currentWrapper = $(this);
            var url = currentWrapper.attr('action');
            var method = currentWrapper.attr('method');
            const first_digit = $("#first_digit").val();
            const second_digit = $("#second_digit").val();
            const third_digit = $("#third_digit").val();
            const four_digit = $("#four_digit").val();
            const otp = first_digit.toString() + second_digit.toString() + third_digit.toString() + four_digit.toString();
            var formData = $('#verifyOtp')[0];
            formData = new FormData(formData);
            formData.append('otp',otp);
            CommonLib.ajaxForm(formData,method,url).then(d=>{
                  if(d.status === 200){
                     CommonLib.notification.success(d.message);
                     setTimeout(() => {
                        window.location = d.url;
                    }, 1000);
                  }else{
                     console.log("Responsesss",d);
                     CommonLib.notification.error(d.errors);
                  }
            }).catch(e=>{
                  CommonLib.notification.error(e.responseJSON.errors);
            });
         });
      </script>
      <script>
         let timerInterval;
         let seconds = 30;
         // Initial setup
         updateTimerDisplay();
         // Start the timer on page load
         startTimer();
         function startTimer() {
            timerInterval = setInterval(updateTimer, 1000);
         }
         function updateTimer() {
            seconds--;
            if (seconds === 0) {
               clearInterval(timerInterval);
               document.getElementById('resendButton').style.display = 'block';
            }
            updateTimerDisplay();
         }
         function updateTimerDisplay() {
            const formattedTime = padNumber(Math.floor(seconds / 60)) + ':' + padNumber(seconds % 60);
            document.getElementById('timer').innerText = formattedTime;
         }
         function padNumber(num) {
            return num.toString().padStart(2, '0');
         }
         function resendOTP() {
            var user_id = $(".user_id").val();
            formData = new FormData();
            formData.append('user_id',user_id);
            CommonLib.ajaxForm(formData,'POST',"<?= base_url('resend-otp'); ?>").then(d=>{
                  if(d.status === 200){
                     CommonLib.notification.success(d.message);
                     setTimeout(() => {
                        window.location = d.url;
                    }, 1000);
                  }else{
                     CommonLib.notification.error(d.errors);
                  }
            }).catch(e=>{
                  CommonLib.notification.error(e.responseJSON.errors);
            });
         }
      </script>