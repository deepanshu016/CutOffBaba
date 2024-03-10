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
         label,input{color: #fff !important}
      </style>
  </head>
  <body class="bglg">
      <section  style="height: 100vh;">
         <div class="container">
            <div class="row">
               <div class="col-12 col-sm-12">
                  <div class="text-center pt-3">
                     <h1 class="text-white pb-2">Create Your Profile</h1>
                     <form action="<?= base_url('/register') ?>" method="POST" class="all-form">
                        <div class="form-floating input-group mb-3"> 
                           
                           <input type="text" class="form-control inPut " id="floatingInput" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="name">
                           <div class="text-danger" id="name"></div>
                           <label class="text-white" for="floatingInput ">Your Name </label> <br/>
                           
                        </div>
                        <div class="form-floating input-group mb-3"> 
                           <input type="text" class="form-control inPut " id="floatingInput" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="email">
                           <label class="text-white" for="floatingInput ">Your Email </label> <br/>
                           <div class="text-danger" id="email"></div>
                        </div>
                         <div class="input-group has-validation">
                          <span class="input-group-text add" style="font-weight: bold;">+91</span>
                          <div class="form-floating is-invalid">
                            <input type="text" class="form-control inPut " id="floatingInput" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="phone">
                            <label for="floatingInputGroup2">Enter Your Phone</label>
                          </div>
                          <div class="invalid-feedback" id="phone"></div>
                        </div>
                        <div class="form-floating input-group mb-3"> 
                           <input type="password" class="form-control inPut " id="floatingInput" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="password">
                           <label class="text-white" for="floatingInput ">Password </label> <br/>
                           <div class="text-danger" id="password"></div>
                        </div>
                        <div class="form-floating input-group mb-3"> 
                           <input type="password" class="form-control inPut " id="floatingInput" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="confirm_password">
                           <label class="text-white" for="floatingInput ">Confirm Password </label> <br/>
                           <div class="text-danger" id="confirm_password"></div>
                        </div>
                        <div class="">
                           <select class="form-select form-control slBgs" aria-label="Default select example" name="state">
                              <option value="">State</option>
                              <?php if(!empty($stateList)){ 
                                 foreach($stateList as $state){  ?>
                                    <option value="<?= $state['id'];?>"><?= $state['name']; ?></option>
                              <?php   }
                              } ?>
                           </select>
                           
                           <div class="text-danger" id="state"></div>
                        </div>
                        <button type="submit" class="w-100 btn btn-primary p6t">Sign Up</button>
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