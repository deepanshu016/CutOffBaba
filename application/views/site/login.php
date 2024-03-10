<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=@$title; ?></title>
     <link href="<?=base_url('assets/site/css/bootstrap.css')?>" rel="stylesheet">
      <link href="<?=base_url('assets/site/css/style.css')?>" rel="stylesheet">
      <link href="<?=base_url('assets/site/css/custom.css')?>" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="<?=base_url('assets/admin/adapters/jquery.js')?>"></script>
      <link href="<?=base_url('assets/admin/css/toastr.css')?>" rel="stylesheet" type="text/css">
      
  </head>
  <body>
      <section class="bglg" style="height: 100vh;">
         <div class="container">
            <div class="row">
               <div class="col-12 col-sm-12">
                  <div class="text-center">                     
                     <img class="mx-auto width:100px" src="<?=base_url('assets/site/img/unlocked.png')?>">
                     <h1 class="text-white">Login to continue</h1>
                     <form action="<?= base_url('/loginchk') ?>" method="POST" class="all-form">
                        <div class="input-group has-validation">
                          <span class="input-group-text" style="font-weight: bold;">+91</span>
                          <div class="form-floating is-invalid">
                            <input type="text" class="form-control inPut " id="floatingInput" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="phone">
                            <label for="floatingInputGroup2">Enter Your Phone</label>
                          </div>
                          <div class="invalid-feedback" id="phone"></div>
                        </div>
                        <div class="input-group has-validation">
                          <span class="input-group-text"><i class="fa fa-lock fa-2x" aria-hidden="true"></i></span>
                          <div class="form-floating is-invalid">
                            <input type="password" class="form-control inPut" placeholder="" name="password">
                            <label for="floatingInputGroup2">Enter Password</label>
                          </div>
                          <div class="invalid-feedback" id="password"></div>
                        </div>
                        <span class="rights"> <a class="text-white" href="<?= base_url('forgot-password') ?>">Forgot Password?</a> </span>
                        <button type="submit" class="w-100 btn btn-primary p6t">Sign In</button>
                     </form>
                     <div class="acSing">
                        <span class="text-white "> Don’t have an account? <a class="text-white" href="<?= base_url('signup'); ?>">Signup</a> </span>
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