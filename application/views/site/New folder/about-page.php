<?php $this->load->view('site/header'); ?>
<main class="snnxbgs">
   <div class="position-relative overflow-hidden p-md-5 m-md-3 text-center bg-light">
      <div class="col-md-5 p-lg-5 p-3 mx-auto ">
         <h4 class=" fw-bold text-start txtColorss"> <img src="<?=base_url('assets/site/img/rightarrow.png')?>"> </h4>
         <h5 class="card-title barcCtxt">About Us</h5>
      </div>
   </div>
   </div>
   <section>
      <div class="container">
         <div class="row">
            <div class="col-12 ">
               <div class="lc-block">
                  <div class="d-flex px-1"> 
                     <div class="lc-block">
                        <?= @$settings['about_us']; ?>
                     </div>
                  </div>
               </div>
            </div> 
         </div>
      </div>
   </section>
</main>
      <main>
         <div class=" w-100 my-md-3 ps-md-3 bg-light">            
            <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center ">
               <a class="social" target="_blank" href="#!"> <i class="fa fa-facebook-official socialCs" aria-hidden="true"></i> </a>
               <a class="social" target="_blank" href="#!"> <i class="fa fa-instagram socialCs" aria-hidden="true"></i> </a>
               <a class="social" target="_blank" href="#!"> <i class="fa fa-twitter-square socialCs" aria-hidden="true"></i> </a>
               <a class="social" target="_blank" href="#!"> <i class="fa fa-youtube-square socialCs" aria-hidden="true"></i> </a>
            </div>
            <div  >
               <br>
              <div class="container">
              <!--  <div class="row">
                  <div class="col-md-12 col">
                     <h3><strong>Our testimonials</strong>
                        <span class="ssics"><a class="text-decoration-none" href="<?=base_url('testimonial-explore'); ?>">View All</a> </span>
                     </h3>
                  </div>
                   
               </div> -->
              <!--  <div class="row">
                  <div class="col-md-12">
                     <div id="testimonial-slider" class="owl-carousel">
                        <div class="testimonial csTest">
                           <ul class="liusss">
                              <li>
                                 <a href="#"><img src="img/uuus.png" alt=""></a> 
                              </li>
                              <li>
                                 <p class="testimonial-description dda">
                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium  
                                 </p>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div> -->
            </div>
         </div>
      </div>
   </main>
      <?php $this->load->view('site/footer'); ?>