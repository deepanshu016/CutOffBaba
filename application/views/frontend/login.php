<?php $this->load->view('small/frontend/header'); ?>
      <section class="bglg">
         <div class="container">
            <div class="row">
               <div class="col-12 col-sm-12">
                  <div class="h0px ">
                     <a href="splash-screen.php">
                     <img src="<?=base_url('assets/frontend/img/back-CTA.png')?>">
                     </a>
                     <h1 class="text-white my-3 p-3">Login to continue</h1>
                     <img class="img-fluid" src="<?=base_url('assets/frontend/img/unlocked.png')?>">
                     <form>
                        <div class="form-floating flts input-group mb-3">
                           <button class="btn btn-outline-secondary bg-white custCsss" type="button" id="button-addon1"> +91</button>
                           <input type="text" class="form-control inPut " id="floatingInput" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                           <label class="text-white" for="floatingInput ">Enter Your Phone </label>
                        </div>
                        <div class="form-floating flts input-group mb-3"> 
                           <button class="btn btn-outline-secondary bg-white custCs" type="button" id="button-addon1"><i class="fa fa-lock" aria-hidden="true"></i></button>
                           <input type="password" class="form-control inPut" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                           <label class="text-white" for="floatingInput">Enter Password</label>
                        </div>
                        <span class="rights"> <a class="text-white" href="forgot-password.php">Forgot Password?</a> </span>
                        <button class="w-100 btn btn-primary p6t">Sign In</button>
                     </form>
                     <div class="acSing">
                        <span class="text-white "> Don’t have an account? <a class="text-white" href="<?= base_url('signup'); ?>">Signup</a> </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
<?php $this->load->view('small/frontend/footer'); ?>