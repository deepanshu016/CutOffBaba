<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= @$title; ?></title>
     <link href="<?=base_url('assets/site/css/bootstrap.css')?>" rel="stylesheet">
      <link href="<?=base_url('assets/site/css/style.css')?>" rel="stylesheet">
      <link href="<?=base_url('assets/site/css/custom.css')?>" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="<?=base_url('assets/admin/adapters/jquery.js')?>"></script>
      <link href="<?=base_url('assets/admin/css/toastr.css')?>" rel="stylesheet" type="text/css">
      <style type="text/css">
        
        .add{width: 52px;text-align: center;}
        label,input{color: #fff !important}
      </style>
  </head>
  <body class="bglg">
   <section style="height: 100vh;">
   <div class="container">
      <div class="row">
         <div class="col-12 col-sm-12">
            <div class="h0px ">
               <img class="img-fluid" src="<?=base_url('assets/site/img/forgot.png')?>">
               <h1 class="text-white">Forgot your Password</h1>
               <form action="<?= base_url('/send-otp') ?>" method="POST" class="all-form">
                   <div class="input-group has-validation">
                       <span class="input-group-text add" style="font-weight: bold;">+91</span>
                       <div class="form-floating is-invalid">
                         <input type="text" class="form-control inPut " id="floatingInput" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="phone">
                         <label for="floatingInputGroup2">Enter Your Phone</label>
                       </div>
                       <div class="invalid-feedback" id="phone"></div>
                     </div>
                  <button type="submit" class="w-100 btn btn-primary p6t">Send OTP</button>
               </form>
               <div class="acSing">
                  <span class="text-white "> Already have an account? <a class="text-white" href="<?= base_url('/'); ?>">Login</a> </span>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
   <script src="<?=base_url('/')?>assets/admin/js/toastr.js"></script>
   <script src="<?=base_url('/')?>assets/admin/js/custom.js"></script>
   <?php $this->load->view('common/alert'); ?>
  </body>
</html>