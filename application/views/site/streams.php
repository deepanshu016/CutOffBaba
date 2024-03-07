<?php $this->load->view('site/header'); ?>
      <main class="bgebeef6s" style="margin-bottom: 70px;">
         <section class="uiTops">
            <!-- <img src="img/Mask-group.png" class="img-fluid"> -->
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
            <div class="container">
               <?php if(!empty($stream)){ 
                  foreach($stream as $stream) { ?> 
                  <div class=" me-md-3 pt-3 pt-md-5 px-md-5 text-center overflow-hidden">
                     <div class="bg-white shaDo mb-3">
                        <div class="row">
                           <div class="col-md-9 col">
                              <div class="nopadSty">
                                 <h5 class="card-title"><strong><?= @$stream['stream']; ?></strong></h5>
                                 <p class="card-text nop"><?= @excerpt($stream['description'],30); ?></p>
                                 <div class="lfeCuy">
                                    <a class="text-dark text-decoration-none cTacss" href="<?= base_url('courses').'/'.$stream['id']; ?>">Select CTA  <img src="<?=base_url('assets/site/img/CaretRight.png')?>"> </a>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3 col">
                              <img src="<?= ($stream['stream_image'] != '' && !file_exists(FCPATH.'assets/uploads/stream/'.$stream['stream_image'])) ? base_url('assets/site/img/Frame-5.png') : base_url('assets/uploads/stream/').'/'.$stream['stream_image'];?>" class="img-fluid riCds" alt="Frame">
                           </div>
                        </div>
                     </div>
                  </div>
               <?php } } ?>
            </div>
         </section>
      </main>
      <?php $this->load->view('site/footer'); ?>