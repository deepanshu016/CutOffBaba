<?php $this->load->view('small/frontend/header'); ?>
      <section class="bglg">
         <div class="container">
            <div class="row">
               <div class="col-12 col-sm-12">
                  <div class="h0px ">
                     <a href="<?= base_url('login'); ?>">
                     <img src="<?=base_url('assets/frontend/img/back-CTA.png')?>">
                     </a>
                     <h1 class="text-white my-3 p-3">Create your Profile</h1>
                     <form action="<?= base_url('/signup') ?>" method="POST" class="all-form">
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
                        <div class="form-floating flts input-group mb-3">
                           <button class="btn btn-outline-secondary bg-white custCsss" type="button" id="button-addon1"> +91</button>
                           <input type="text" class="form-control inPut " id="floatingInput" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="phone">
                           <label class="text-white" for="floatingInput ">Enter Your Phone </label><br/>
                           <div class="text-danger" id="phone"></div>
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
                  </div>
               </div>
            </div>
         </div>
      </section>
<?php $this->load->view('small/frontend/footer'); ?>