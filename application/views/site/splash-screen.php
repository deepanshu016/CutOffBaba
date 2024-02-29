<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=@$title; ?></title>
     <link href="<?=base_url('assets/site/css/bootstrap.css')?>" rel="stylesheet">
      <link href="<?=base_url('assets/site/css/style.css')?>" rel="stylesheet">
      <link href="<?=base_url('assets/site/css/custom.css')?>" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="<?=base_url('assets/admin/adapters/jquery.js')?>"></script>
      <link href="<?=base_url('assets/admin/css/toastr.css')?>" rel="stylesheet" type="text/css">
      <style type="text/css">
        .centerbody{
          position: absolute;
          top:50%;
          left: 50%;
          transform: translate(-50%, -50%);
        }</style>
  </head>
  <body>
   <section class="p-2 ">
     <div class="container">
       <div class="row">
         <div class="col-12 col-sm-12">
           <div class="d-flex align-items-center justify-content-between"> 
              <div class="bg-white me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                <div class="centerbody">
                  <div class="text-effect">
                    <span>C</span><span>U</span><span>T</span><span>O</span><span>F</span><span>F</span><span>B</span><span>A</span><span>B</span><span>A</span> 
                    
                </div>
                </div>
                 
              </div>
            </div>
         </div>
       </div>
     </div>
   </section> 
   <script type="text/javascript">
      $(document).ready(function(){
        <?php
        if ($this->session->has_userdata('user')) { ?>
          setTimeout(function () {
            window.location.href = '<?=base_url("streams");?>';
          },2500);
        <?php } else { ?>
            setTimeout(function () {
              window.location.href = '<?=base_url("app-info");?>';
            },2500);
        <?php } ?>
      });
   </script>
  </body>
</html>