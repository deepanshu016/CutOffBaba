<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?= @$title; ?></title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Madimi+One&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
      <link href="<?=base_url('assets/site/css/bootstrap.css')?>" rel="stylesheet">
      <link href="<?=base_url('assets/site/css/style.css')?>" rel="stylesheet">
      <link href="<?=base_url('assets/site/css/custom.css')?>" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="<?=base_url('assets/admin/css/toastr.css')?>" rel="stylesheet" type="text/css">
      <script src="<?=base_url('assets/admin/adapters/jquery.js')?>"></script>
      <style>
         .lc-block li {
            color: white;
         }
      </style>
   </head>
   <body>
      <main>
         <div class="position-relative overflow-hidden p-md-5 m-md-3 text-center bg-light">
            <div class="row">
               <div class="col-2">
                  <img class="uyesrs" src="<?=base_url('assets/site/img/rightarrow.png')?>">
               </div>
               <div class="col-7">
                  <h4 class=" fw-bold text-start cfCols">  Paid Counselling</h4>
               </div>
               <div class="col-2">
                  <img src="<?=base_url('assets/site/img/uyesr.png')?>" alt="">
               </div>
            </div>
         </div>
         </div>
         <section class="uivc">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <h5>Lorem Ipsum Dollor SIte Amet.</h5>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore </p>
                  </div>
               </div>
            </div>
         </section>
         <section>
            <div class="container py-6">
               <div class="row align-items-center py-2">
                  <div class="position-relative">
                     <img src="https://cdn.livecanvas.com/media/svg/fffuel/svg-shape-11.svg" width="256" height="256" srcset="" sizes="" alt="Made by fffuel.com" class="d-none d-xl-block position-absolute top-0 start-0 translate-middle mt wp-image-2412" loading="lazy">
                     <!-- Slider main container -->
                     <div class="swiper mySwiper-RANDOMID position-relative">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper mb-5">
                           <!-- Slides -->
                           <?php if(!empty($planList)){
                             foreach($planList as $plan){ ?>
                           <div class="swiper-slide lc-block">
                              <div>
                                 <div class="lc-block card h-100 p-4 py-xl-6 shadow border-0" style="background-image: url(<?=base_url('assets/site/img/catdsbg.png')?>); background-size: cover; background-repeat: round;">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                       <div>
                                          <div class="lc-block  text-center ">
                                             <h3 editable="inline" class="fw-bolder d-inline rfs-30 ls-n2"><?= $plan['plan_name']; ?></h3>
                                          </div>
                                          <!-- <center>
                                             <h4 class="off10rs">10% OFF</h4>
                                          </center> -->
                                          <div class="text-center usitxt">
                                             <h1 class="text-white">₹ <?= $plan['price']; ?>  <span class="srups">₹<?= $plan['discounted_price']; ?></span></h1>
                                          </div>
                                          <!-- <ul>
                                             <li> sdjhj</li>
                                             <li> sdjhj</li>
                                             <li> sdjhj</li>
                                             </ul> -->
                                          <div class="lc-block ">
                                             <?= $plan['description']; ?> 
                                          </div>
                                       </div>
                                       <div class="lc-block d-grid">
                                          <a class="btn btn-primary btn-lg srpais purchase_now" href="javascript:void(0);" data-id="<?= $plan['id']; ?>" data-amount="<?= $plan['discounted_price']; ?>">Select Package</a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <?php } } ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <footer>
            <ul class="nav justify-content-center border-bottom  text-center">
               <li class="nav-item"><a href="<?= base_url('streams'); ?>" class="nav-link px-2 text-muted">   <img src="<?=base_url('assets/site/img/home.png')?>"> <br> Home</a></li>
               <li class="nav-item"><a href="<?= base_url('plan'); ?>" class="nav-link px-2 text-muted">   <img src="<?=base_url('assets/site/img/start.png')?>"> <br> Premium</a></li>
               <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">   <img src="<?=base_url('assets/site/img/serch.png')?>"> <br> Search</a></li>
               <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">   <img src="<?=base_url('assets/site/img/Award.png')?>"> <br> Award</a></li>
               <li class="nav-item"><a href="<?= base_url('profile'); ?>" class="nav-link px-2 text-muted">   <img src="<?=base_url('assets/site/img/Userss.png')?>"> <br> Profile</a></li>
            </ul>
         </footer>
      </main>
      <script src="<?=base_url('assets/admin/js/bootstrap.min.js')?>"></script>
      <!-- lazily load the Swiper CSS file -->
      <link rel="preload" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
      <!-- lazily load the Swiper JS file -->
      <script defer="defer" src="https://unpkg.com/swiper@8/swiper-bundle.min.js" onload="initializeSwiperRANDOMID();"></script>
      <!-- lc-needs-hard-refresh -->
      <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
      <script>
         function initializeSwiperRANDOMID(){
             // Launch SwiperJS  
            const swiper = new Swiper(".mySwiper-RANDOMID", {
                  slidesPerView: 1,
                  grabCursor: true,
                  spaceBetween: 30,
                  pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                  },
                  breakpoints: {
                  640: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                  },
                  768: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                  },
                  1024: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                  },
               },
            });
         }
      </script>
      <script>
         var SITEURL = "<?php echo base_url() ?>";
            $('body').on('click', '.purchase_now', function(e){
               var totalAmount = $(this).attr("data-amount");
               var plan_id =  $(this).attr("data-id");
               var options = {
               "key": "rzp_test_q2ifqqk3pzoTyk",
               "amount": (totalAmount*100), // 2000 paise = INR 20
               "name": "CUTOFFBABA",
               "description": "Plan Purchase",
               "image": "http://cutoffbaba/assets/site/img/uyesr.png",
               "handler": function (response){
                     $.ajax({
                        url: SITEURL + 'payment/pay-success',
                        type: 'post',
                        dataType: 'json',
                        data: {
                           razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,plan_id : plan_id,
                        }, 
                        success: function (msg) {
                           window.location.href = msg.url;
                        }
                  });
               
               },
               "theme": {
                  "color": "#528FF0"
               }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
             e.preventDefault();
         });
      </script>
   </body>
</html>