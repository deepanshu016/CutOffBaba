<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Reset OTP</title>
      <link href="<?=base_url('assets/site/css/bootstrap.css')?>" rel="stylesheet">
      <link href="<?=base_url('assets/site/css/custom.css')?>" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="<?=base_url('assets/admin/css/toastr.css')?>" rel="stylesheet" type="text/css">
      <script src="<?=base_url('assets/admin/adapters/jquery.js')?>"></script>
       <style type="text/css">
        
        .add{width: 52px;text-align: center;}
        label,input{color: #fff !important;text-align: center !important;max-height: 50px}
      </style>
   </head>
   <body class="bfsd">
       <section style="height: 100vh;">
         <div class="container">
            <div class="row">
               <div class="col-12 col-sm-12">
                  <div class="h0px yis text-center">
                     <img class="mx-auto w-50 mb-3 " src="<?=base_url('assets/site/img/verificatios.png')?>">
                     <h1 class="text-white">Reset Password</h1>
                     <span class="text-white">An 4 digit code has been sent to
                     <br> +91 <?= @$userData['mobile']; ?><br><br></span>
                     <form action="<?= base_url('/otp-verification') ?>" method="POST" id="verifyOtp">
                        <div class="row">
                           <input type="hidden" class="form-control inPut user_id" id="floatingInput" placeholder="" value="<?= $userData['id']; ?>" name="user_id" aria-describedby="basic-addon1">
                           <div class="col">
                            <input type="text" class="form-control specHeigh" id="first_digit" placeholder="*">
                           </div>
                           <div class="col">
                            <input type="text" class="form-control specHeigh" id="second_digit" placeholder="*">
                           </div>
                           <div class="col">
                            <input type="text" class="form-control specHeigh" id="third_digit" placeholder="*">
                           </div>
                           <div class="col">
                            <input type="text" class="form-control specHeigh" id="four_digit" placeholder="*">
                           </div>
                        </div> 
                        <button type="submit" class="w-100 btn btn-primary p6t mt-3">Verify OTP</button>
                     </form>
                     <p id="timer" style="color: white;">00:00</p>
                     <a id="resendButton" style="display:none;color: #5baef3;" onclick="resendOTP()">Resend OTP</a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <script src="<?=base_url('/')?>assets/admin/js/toastr.js"></script>
      <script src="<?=base_url('/')?>assets/site/js/CommonLib.js"></script>
      <script src="<?=base_url('/')?>assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script>
         $(document).ready(function(){

         });
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
   </body>
</html>
