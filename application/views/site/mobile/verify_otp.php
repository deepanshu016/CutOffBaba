<?php $this->load->view('site/header'); ?>
    <section class="bglg">  
            <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="h0px ">
                        <a href="login.php">
                        <img src="<?=base_url('assets/site/img/back-CTA.png')?>">
                        </a>
                        <img class="img-fluid" src="<?=base_url('assets/site/img/auto-verify.png')?>">
                        <h1 class="text-white">Verif OTP</h1>
                        <span class="text-white">An 4 digit code has been sent to
                        <br> +91 <?= @$userData['mobile']; ?> <br><br></span>
                        <form action="<?= base_url('/otp-verification') ?>" method="POST" class="all-form">
                            <div class="form-floating flts input-group mb-3">
                                <input type="text" class="form-control inPut " id="floatingInput" placeholder="OTP" aria-label="Username" name="otp" aria-describedby="basic-addon1">
                                <input type="hidden" class="form-control inPut " id="floatingInput" placeholder="" value="<?= $userData['id']; ?>" name="user_id" aria-describedby="basic-addon1">
                                <label class="text-white" for="floatingInput ">XXXX</label>
                                <div class="text-danger" id="otp"></div>
                            </div>
                            <span class="text-white"> <strong class="text-white"> 1 </strong> Auto verifying is in under process</span>
                            <button type="submit" class="w-100 btn btn-primary p6t">Verify OTP</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </section>
<?php $this->load->view('site/footer'); ?>