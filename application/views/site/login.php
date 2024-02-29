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
                     <a href="<?= base_url('/app-info') ?>">
                     <img src="<?=base_url('assets/site/img/back-CTA.png')?>">
                     </a>
                     <h1 class="text-white my-3 p-3">Login to continue</h1>
                     <img class="img-fluid" src="<?=base_url('assets/site/img/unlocked.png')?>">
                     <form action="<?= base_url('/loginchk') ?>" method="POST" class="all-form">
                        <div class="form-floating flts input-group mb-3">
                           <button class="btn btn-outline-secondary bg-white custCsss" type="button" id="button-addon1"> +91</button>
                           <input type="text" class="form-control inPut " id="floatingInput" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="phone">
                           <label class="text-white" for="floatingInput ">Enter Your Phone </label>
                           <div class="text-danger" id="phone"></div>
                        </div>
                        <div class="form-floating flts input-group mb-3"> 
                           <button class="btn btn-outline-secondary bg-white custCs" type="button" id="button-addon1"><i class="fa fa-lock" aria-hidden="true"></i></button>
                           <input type="password" class="form-control inPut" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="password">
                           <label class="text-white" for="floatingInput">Enter Password</label>
                           <div class="text-danger" id="password"></div>
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