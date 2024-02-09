
<?php $this->load->view('small/frontend/header'); ?>
      <section class="bglg">
         <div class="container">
            <div class="row">
               <div class="col-12 col-sm-12">
                  <div class="h0px ">
                     <a href="<?=base_url('login')?>">
                     <img src="<?=base_url('assets/frontend/img/back-CTA.png')?>">
                     </a>
                     <img class="img-fluid" src="<?=base_url('assets/frontend/img/forgot.png')?>">
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
<?php $this->load->view('small/frontend/footer'); ?>