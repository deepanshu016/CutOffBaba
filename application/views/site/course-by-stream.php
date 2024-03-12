<?php $this->load->view('site/header'); ?>

 <header class="site-header sticky-top py-1 bg-light">
 <nav class="container bg-light d-flex flex-column flex-md-row justify-content-between">
    <nav class="navbar bg-light">
       <div class="container-fluid">
          <a class="text-decoration-none" href="javascript:void(0);" aria-label="Product">
          <img class="logoCs" src="<?=base_url('assets/site/img/logo.png')?>"> <span class="cutCss">Cutoff Baba</span>
          </a>
          <?php if($this->session->userdata('user')) { ?>
            <a  href="<?= base_url('profile'); ?>"> <img src="<?=base_url('assets/site/img/user.png')?>"> </a>
          <?php } ?>
       </div>
    </nav>
 </nav>
</header>
<main>
 <div class="position-relative overflow-hidden   p-md-5 m-md-3 text-center bg-light">
    <section>
       <div class="container">
          <div class="row">
             <div class="col-md-12 col">
                <div class="alert altp alert-warning alert-dismissible fade show " role="alert">
                  <div class="p-2 d-flex justify-content-between">
                   <strong class="youTxt">Your profile is not completed. Please Complete first!</strong>
                   <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <div class="col-md-5 p-lg-5 p-3 mx-auto ">
       <h4 class=" fw-bold text-start txtColor">Welcome to Cutoff Baba</h4>
       <div class="card radius">
          <img src="<?=base_url('assets/site/img/doc-pic.png')?>" class="card-img cuys " alt="doc-pic">
          <div class="card-img-overlay cardOverlay">
             <h5 class="card-title"><?= @$selectedStream['stream']; ?></h5>
             <p class="card-text">Lorem ipsum dolor sit <br> amet, consectetur adipiscing <br> elit, sed do eiusmod tempor <br> incididunt ut labore .</p>
          </div>
       </div>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
 </div>
 <div class=" w-100 my-md-3 ps-md-3 bg-light">
   <?php if(!empty($courseLists)) { 
      foreach($courseLists as $course) { ?>
         <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="card shaDo mb-3" style="max-width: 540px;">
               <div class="row g-0">
                  <div class="col-md-9 col">
                     <div class="card-body nopad">
                        <h5 class="card-title"><?= $course['course']; ?></h5>
                        <p class="card-text nop"><?= $course['course_full_name']; ?></p>
                        <a class="btn btn-primary" href="">Select CTA  <i class="fa fa-angle-right"></i> </a>
                     </div>
                  </div>
                  <div class="col-md-3 col">
                     <img src="<?= ($course['course_icon'] != '' && file_exists(FCPATH.'assets/uploads/course/'.$course['course_icon'])) ? base_url('assets/uploads/course/').'/'.$course['course_icon'] : base_url('assets/site/img/medical-tr.png');?>" class="img-fluid rounded-start" alt="...">
                  </div>
               </div>
            </div>
         </div>
         <div class=" w-100   bg-light">
            <div class="lc-block text-center">
               <div id="carouselTestimonial" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner innscr ">
                     <div class="carousel-item active">
                        <div class="p-2  text-center overflow-hidden">
                           <div class="row">
                              <div class="col col-sm-6">
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <a href="<?= base_url('about-course').'/'.$course['id']; ?>">
                                          <h5 class="card-title smTxt">About MBBS</h5>
                                          <p class="card-text">Nemo enim ipsam voluptatem </p>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <a href="<?= base_url('states').'/'.$course['id']; ?>">
                                       <h5 class="card-title smTxt">State Wise Colloeges</h5>
                                       <p class="card-text">Nemo enim ipsam voluptatem </p>
                                    </a>
                                    </div>
                                 </div>
                              </div>
                               <div class="col col-sm-6">
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <h5 class="card-title smTxt">Branches & Seats</h5>
                                       <p class="card-text">Nemo enim ipsam voluptatem </p>
                                    </div>
                                 </div>
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <h5 class="card-title smTxt">Fees & Expances</h5>
                                       <p class="card-text">Nemo enim ipsam voluptatem </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="p-2 text-center overflow-hidden">
                           <div class="row">
                             
                              <div class="col col-sm-6">
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <h5 class="card-title smTxt">Clinic Exposure</h5>
                                       <p class="card-text">Nemo enim ipsam voluptatem </p>
                                    </div>
                                 </div>
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <h5 class="card-title smTxt">Service & Bond Rules</h5>
                                       <p class="card-text">Nemo enim ipsam voluptatem </p>
                                    </div>
                                 </div>
                              </div>
                               <div class="col col-sm-6">
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <h5 class="card-title smTxt">College Reviews</h5>
                                       <p class="card-text">Nemo enim ipsam voluptatem </p>
                                    </div>
                                 </div>
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <h5 class="card-title smTxt">Central Curoff</h5>
                                       <p class="card-text">Nemo enim ipsam voluptatem </p>
                                    </div>
                                 </div>
                              </div>
                              </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="p-2 text-center overflow-hidden">
                           <div class="row">
                               <div class="col col-sm-6">
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <h5 class="card-title smTxt">College Reviews</h5>
                                       <p class="card-text">Nemo enim ipsam voluptatem </p>
                                    </div>
                                 </div>
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <h5 class="card-title smTxt">State Cutoff</h5>
                                       <p class="card-text">Nemo enim ipsam voluptatem </p>
                                    </div>
                                 </div>
                              </div>
                               <div class="col col-sm-6">
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <h5 class="card-title smTxt">Cutoff Comparison</h5>
                                       <p class="card-text">Nemo enim ipsam voluptatem </p>
                                    </div>
                                 </div>
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <h5 class="card-title smTxt">FAQs</h5>
                                       <p class="card-text">Nemo enim ipsam voluptatem </p>
                                    </div>
                                 </div>
                              </div>
                              </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="p-2 text-center overflow-hidden">
                           <div class="row">
                               <div class="col col-sm-6">
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <h5 class="card-title smTxt">College Predictor</h5>
                                       <p class="card-text">Nemo enim ipsam voluptatem </p>
                                    </div>
                                 </div>
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <h5 class="card-title smTxt">College Gallery</h5>
                                       <p class="card-text">Nemo enim ipsam voluptatem </p>
                                    </div>
                                 </div>
                              </div>
                              <div class="col col-sm-6">
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <h5 class="card-title smTxt">Counselling Updates</h5>
                                       <p class="card-text">Nemo enim ipsam voluptatem </p>
                                    </div>
                                 </div>
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <h5 class="card-title smTxt">Recommended College</h5>
                                       <p class="card-text">Nemo enim ipsam voluptatem </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
   <?php } } ?>
         </div>
   
 </div>
</main>
<?php $this->load->view('site/footer'); ?>