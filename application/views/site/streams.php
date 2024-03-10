<?php $this->load->view('site/header'); ?>
      <main class="bgebeef6s">
         <section class="uiTops">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <center><img class="img-fluid" src="<?=base_url('assets/site/img/cutoff-baba-logo 1.png')?>"></center>
                  </div>
               </div>
            </div>
         </section>
         <section>
            <div class="container">
               <div class="col-md-12 col-sm-12">
                  <h3 class="text-center text-dark">Welcome to <span class="cusSpanm">Cutoff Baba</span> </h3>
                  <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod. </p>
               </div>
            </div>
         </section>
         <section>
            <div class="container mb-5 pb-5">
               <?php if(!empty($stream)){ 
                  foreach($stream as $stream) { ?> 
                     <div class="shaDo m-2 pb-3" style="background:url('<?= ($stream['stream_image'] != '' && file_exists(FCPATH.'assets/uploads/stream/'.$stream['stream_image'])) ? base_url('assets/uploads/stream/').'/'.$stream['stream_image'] : base_url('assets/site/img/Frame-5.png');?>'); background-size: 100% 100%;">
                        <div class="row">
                           <div class="col-9">
                              <div class="nopadSty">
                                 <h5 class="card-title"><strong><?= @$stream['stream']; ?></strong></h5>
                                 <p class="card-text"><?= @excerpt($stream['description'],80); ?></p>
                                 <a class="btn btn-primary" href="<?= base_url('courses').'/'.$stream['id']; ?>">Select CTA  <i class="fa fa-angle-right"></i> </a>
                              </div>
                           </div>
                        </div>
                     </div>
               <?php } } ?>
            </div>
         </section>
      </main>
      <?php $this->load->view('site/footer'); ?>