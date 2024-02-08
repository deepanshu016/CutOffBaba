<?php $this->load->view('small/frontend/header'); ?>
    <section class="bglg">  
            <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="h0px ">
                        <a href="login.php">
                        <img src="img/back-CTA.png">
                        </a>
                        <img class="img-fluid" src="img/auto-verify.png">
                        <h1 class="text-white">Forgot your Password</h1>
                        <span class="text-white">An 4 digit code has been sent to
                        <br> +91 123-456-7890 <br><br></span>
                        <form>
                        <div class="form-floating flts input-group mb-3">
                            <button class="btn btn-outline-secondary bg-white custCsss" type="button" id="button-addon1"> +91</button>
                            <input type="text" class="form-control inPut " id="floatingInput" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                            <label class="text-white" for="floatingInput ">123 456 78 90</label>
                        </div>
                        <span class="text-white"> <strong class="text-white"> 1 </strong> Auto verifying is in under process</span>
                        <button class="w-100 btn btn-primary p6t">Verify OTP</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $this->load->view('small/frontend/footer'); ?>