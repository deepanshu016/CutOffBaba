   <footer >
      <ul class="nav justify-content-center border-bottom  text-center">
         <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">   <img src="<?=base_url('assets/site/img/home.png')?>"> <br> Home</a></li>
         <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">   <img src="<?=base_url('assets/site/img/start.png')?>"> <br> Premium</a></li>
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
    <?php $this->load->view('common/alert'); ?>
  <!--  <script>
      $(function(){
         var url = window.location.href;
         url = url.split('/');
         if(url[3] != 'small'){
            function isMobile() {
               const regex = /Mobi|Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i;
               return regex.test(navigator.userAgent);
            }
            if (isMobile()) {
                  window.location= "/small/home";
            } 
         }
      });
   </script> -->
   </body>
</html>