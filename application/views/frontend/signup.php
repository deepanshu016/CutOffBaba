<?php $this->load->view('frontend/header'); ?>
      <section class="bglg">
         <div class="container">
            <div class="row">
               <div class="col-12 col-sm-12">
                  <div class="h0px ">
                     <a href="<?= base_url('login'); ?>">
                     <img src="<?=base_url('assets/frontend/img/back-CTA.png')?>">
                     </a>
                     <h1 class="text-white my-3 p-3">Create your Profile</h1>
                     <form>
                        <div class="form-floating input-group mb-3"> 
                           <input type="text" class="form-control inPut " id="floatingInput" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                           <label class="text-white" for="floatingInput ">Your Name </label> 
                        </div>
                        <div class="form-floating input-group mb-3"> 
                           <input type="text" class="form-control inPut " id="floatingInput" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                           <label class="text-white" for="floatingInput ">Your Email </label> 
                        </div>
                        <div class="form-floating flts input-group mb-3">
                           <button class="btn btn-outline-secondary bg-white custCsss" type="button" id="button-addon1"> +91</button>
                           <input type="text" class="form-control inPut " id="floatingInput" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                           <label class="text-white" for="floatingInput ">Enter Your Phone </label>
                        </div>
                        <div class="form-floating input-group mb-3"> 
                           <input type="password" class="form-control inPut " id="floatingInput" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                           <label class="text-white" for="floatingInput ">Password </label> 
                        </div>
                        <div class="form-floating input-group mb-3"> 
                           <input type="password" class="form-control inPut " id="floatingInput" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                           <label class="text-white" for="floatingInput ">Confirm Password </label> 
                        </div>
                        <div class="">
                           <select class="form-select form-control slBgs" aria-label="Default select example">
                              <option selected>State Dropdown</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                           </select>
                        </div>
                        <button class="w-100 btn btn-primary p6t">Sign Up</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
<?php $this->load->view('frontend/footer'); ?>