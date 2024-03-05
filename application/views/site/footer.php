   <footer >
      <ul class="nav justify-content-center border-bottom  text-center">
         <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">   <img src="<?=base_url('assets/site/img/home.png')?>"> <br> Home</a></li>
         <li class="nav-item"><a href="<?= base_url('plan'); ?>" class="nav-link px-2 text-muted">   <img src="<?=base_url('assets/site/img/start.png')?>"> <br> Premium</a></li>
         <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">   <img src="<?=base_url('assets/site/img/serch.png')?>"> <br> Search</a></li>
         <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">   <img src="<?=base_url('assets/site/img/Award.png')?>"> <br> Award</a></li>
         <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">   <img src="<?=base_url('assets/site/img/Userss.png')?>"> <br> Profile</a></li>
      </ul>
   </footer>
   
    <script src="<?=base_url('assets/site/js/bootstrap.bundle.min.js')?>"></script>
   
    <script src="<?=base_url('assets/admin/js/popper.min.js')?>"></script>
    <script src="<?=base_url('assets/admin/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('/')?>assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url('/')?>assets/admin/libs/simplebar/simplebar.min.js"></script>
    <script src="<?=base_url('/')?>assets/admin/js/toastr.js"></script>
    <script src="<?=base_url('/')?>assets/admin/js/custom.js"></script>
    <script src="<?=base_url('/')?>assets/site/js/CommonLib.js"></script>
    <?php $this->load->view('common/alert'); ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
      <script type="text/javascript">
         $(document).ready(function(){
            $("#testimonial-slider").owlCarousel({
               items:3,
               itemsDesktop:[1000,2],
               itemsDesktopSmall:[979,2],
               itemsTablet:[767,1],
               pagination: true,
               autoPlay:true
            });
         });
      </script>
    <!-- lazily load the Swiper CSS file -->
    <link rel="preload" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
      <!-- lazily load the Swiper JS file -->
      <script defer="defer" src="https://unpkg.com/swiper@8/swiper-bundle.min.js" onload="initializeSwiperRANDOMID();"></script>
      <!-- lc-needs-hard-refresh -->
      <script>
         function initializeSwiperRANDOMID() {
         
             // Launch SwiperJS  
             const swiper = new Swiper('.swiper-RANDOMID', {
             // Default parameters
             slidesPerView: 2,
             spaceBetween: 10,
             grabCursor: true,
             
             // Responsive breakpoints
             breakpoints: {
             // when window width is >= 320px
             320: {
             slidesPerView: 2,
             spaceBetween: 20
             },
             // when window width is >= 480px
             480: {
             slidesPerView: 3,
             spaceBetween: 30
             },
             // when window width is >= 1200px
             1200: {
             slidesPerView: 6,
             spaceBetween: 40
             }
             }
           });
         }
      </script>
      
   </body>
</html>