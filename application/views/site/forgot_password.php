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
        .centerbody{
          position: absolute;
          top:50%;
          left: 50%;
          transform: translate(-50%, -50%);
        }</style>
  </head>
  <body>
   <section class="bglg">
   <div class="container">
      <div class="row">
         <div class="col-12 col-sm-12">
            <div class="h0px ">
               <a href="<?=base_url('login')?>">
               <img src="<?=base_url('assets/site/img/back-CTA.png')?>">
               </a>
               <img class="img-fluid" src="<?=base_url('assets/site/img/forgot.png')?>">
               <h1 class="text-white">Forgot your Password</h1>
               <form action="<?= base_url('/send-otp') ?>" method="POST" class="all-form">
                  <div class="form-floating flts input-group mb-3">
                     <button class="btn btn-outline-secondary bg-white custCsss" type="button" id="button-addon1"> +91</button>
                     <input type="text" class="form-control inPut " id="floatingInput" placeholder="" aria-label="Username" aria-describedby="basic-addon1"  name="phone">
                     <label class="text-white" for="floatingInput ">Enter Your Phone </label>
                     <div class="text-danger" id="phone"></div>
                  </div>
                  <button type="submit" class="w-100 btn btn-primary p6Wht">Send OTP</button>
               </form>
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