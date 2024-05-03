<?php $this->load->view('site/header');?>
<div class="sub_header_in sticky_header">
		<div class="container">
			<h1>Login/Register</h1>
		</div>
	</div>
	<main>
		<div class="container margin_60">
			<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="client">Login</h3>
					<div class="form_container">
						<form method="post" action="<?=base_url('loginchk');?>" class="all-form">
			<div class="sign-in-wrapper">
				<div class="form-group">
					<label>Mobile</label>
					<input type="number" class="form-control" name="phone" required>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password"  required>
				</div>
				<div class="clearfix add_bottom_15">
					<div class="checkboxes float-start">
						<label class="container_check">Remember me
						  <input type="checkbox">
						  <span class="checkmark"></span>
						</label>
					</div>
					<div class="float-end mt-1"><a id="forgot" href="<?=base_url('forget');?>">Forgot Password?</a></div>
				</div>
				<div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>
			</div>
		</form>
					</div>
					<!-- /form_container -->
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="new_client">New User</h3> <small class="float-end pt-2">* Required Fields</small>
					<div class="form_container">
						 <form action="<?= base_url('/register') ?>" method="POST" class="all-form">
                        <div class="form-floating input-group mb-3"> 
                           
                           <input type="text" class="form-control inPut " id="floatingInput1" placeholder="" aria-label="Username" aria-describedby="basic-addon2" name="name" >
                           <label class="text-dark" for="floatingInput1 ">Your Name </label>
                        </div>
                        <div class="text-danger" id="name"></div>
                        <div class="form-floating input-group mb-3"> 
                           <input type="text" class="form-control inPut " id="floatingInput" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="email" >
                           <label class="text-dark" for="floatingInput ">Your Email </label>
                        </div>
                         <div class="text-danger" id="email"></div>
                         <div class="input-group has-validation mb-3">
                          <span class="input-group-text add" style="font-weight: bold;">+91</span>
                          <div class="form-floating is-invalid">
                            <input type="text" class="form-control inPut " id="floatingInput" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="phone" id="">
                            <label class="text-dark" for="floatingInputGroup2">Enter Your Phone</label>
                          </div>
                        </div>
                        <div class="text-danger" id="phone"></div>
                        <div class="form-floating input-group mb-3"> 
                           <input type="password" class="form-control inPut " id="floatingInput" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="password">
                           <label class="text-dark" for="floatingInput ">Password </label>
                        </div>
                        <div class="text-danger" id="password"></div>
                        <div class="form-floating input-group mb-3"> 
                           <input type="password" class="form-control inPut " id="floatingInput" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="confirm_password">
                           <label class="text-dark" for="floatingInput ">Confirm Password </label>
                        </div>
                        <div class="text-danger" id="confirm_password"></div>
                        <div class="mb-3">
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
                        <div class="mb-3">
                           <select class="form-select form-control slBgs" aria-label="Default select example" name="exam">
                              <option value="">Exam</option>
                              <?php if(!empty($examList)){ 
                                 foreach($examList as $exam){  ?>
                                    <option value="<?= $exam['id'];?>"><?= $exam['exam']; ?></option>
                              <?php   }
                              } ?>
                           </select>
                           
                           <div class="text-danger" id="exam"></div>
                        </div>
                        <button type="submit" class="w-100 btn btn-primary p6t">Sign Up</button>
                     </form>
						
					</div>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
			</div>
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>
<?php $this->load->view('site/footer');?>