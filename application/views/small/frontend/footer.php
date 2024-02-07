   <script src="<?=base_url('assets/frontend/js/bootstrap.bundle.min.js')?>"></script>
   <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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