   <script src="<?=base_url('assets/frontend/js/bootstrap.bundle.min.js')?>"></script>
   <script src="<?=base_url('assets/admin/adapters/jquery.js')?>"></script>
    <script src="<?=base_url('assets/admin/js/popper.min.js')?>"></script>
    <script src="<?=base_url('assets/admin/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('/')?>assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url('/')?>assets/admin/libs/simplebar/simplebar.min.js"></script>
    <script src="<?=base_url('/')?>assets/admin/js/toastr.js"></script>
    <script src="<?=base_url('/')?>assets/admin/js/custom.js"></script>
    <?php $this->load->view('common/alert'); ?>
   <script>
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
   </script>
   </body>
</html>