<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Reset OTP</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/custom.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <body class="bfsd">
      <section class="bglg">
         <div class="container">
            <div class="row">
               <div class="col-12 col-sm-12">
                  <div class="h0px yis">
                     <a href="login.php">
                     <img src="img/back-CTA.png">
                     </a>
                     <img class="img-fluid mb-3" src="img/verificatios.png">
                     <h1 class="text-white">Reset Password</h1>
                     <span class="text-white">An 4 digit code has been sent to
                     <br> +91 <?= @$userData['mobile']; ?><br><br></span>
                     <form>
                        <div class="row">
                          <div class="col">
                            <input type="text" class="form-control specHeigh" placeholder=" " aria-label="First name">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control specHeigh" placeholder=" " aria-label="Last name">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control specHeigh" placeholder=" " aria-label="First name">
                          </div>
                          <div class="col">
                            <input type="text" class="form-control specHeigh" placeholder=" " aria-label="Last name">
                          </div>
                        </div> 
                        <button class="w-100 btn btn-primary p6t">Verify OTP</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <script src="js/bootstrap.bundle.min.js"></script>
   </body>
</html>