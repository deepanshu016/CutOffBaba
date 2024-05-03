<?php $this->load->view('site/header'); ?>
<main class="snnxbgs">
   <div class="position-relative overflow-hidden p-md-5 m-md-3 text-center bg-light">
      <div class="col-md-5 p-lg-5 p-3 mx-auto ">
         <h4 class=" fw-bold text-start txtColorss"> <img src="<?=base_url('assets/site/img/rightarrow.png')?>"> </h4>
         <h5 class="card-title barcCtxt">Terms Condition</h5>
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
                        <?= @$settings['terms_condition']; ?>
                     </div>
                  </div>
               </div>
            </div> 
         </div>
      </div>
   </section>
</main>
<?php $this->load->view('site/footer'); ?>