<?php $this->load->view('site/header'); ?>
      <main class="bg-white">
         <div class="position-relative overflow-hidden   p-md-5 m-md-3 text-center ">
          <div class="row">
            <div class="col-2">
            <img class="uyesrs" src="<?=base_url('assets/site/img/rightarrow.png')?>">
            </div>
            <div class="col-7">
            <h4 class=" fw-bold text-start cfCols">  College Predictor</h4>
            </div>
            <div class="col-2">
                <img src="<?=base_url('assets/site/img/uyesr.png')?>" alt="">
            </div>
          </div>
        
            <div class="col-md-5 p-lg-5 p-3 mx-auto "> 
               <div class="cardSs"> 
                  <div class="tsrAcfs">
                     <div class="flEdit"><a href="<?= base_url('edit-profile'); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></div>
                     <h6 class="card-title text-dark"> <strong>Name</strong> : <?= @$userData['name']; ?></h6>
                     <p class="card-text text-dark allpFs">  <strong>AIQ</strong> 125752 <strong>AIR</strong> 
                     855446 <strong>Marks</strong> 310 <strong>State </strong> <?= @$selectedState['name']; ?> 
                  </p>
                  </div>
               </div>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
         </div>
         <div class=" w-100 my-md-3 ps-md-3 bg-white">
            <?php 
               if(!empty($degreeTypeList)){
                  foreach($degreeTypeList as $key => $degree){ 
                     $courseList = $this->db->select('*')->from('tbl_course')->where('degree_type',$degree['id'])->get()->result_array();
            ?>
               <div class="container">
                  <div class="row">
                     <div class="col-12 text-center">
                        <div class="lc-block">
                           <div editable="rich">
                              <h3 class="allfsv text-start"><?= $degree['degreetype'];?></h3>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="container pb-6">
                  <div class="swiper swiper-RANDOMID">
                     <div class="swiper-wrapper d-flex align-items-center text-center">
                     <?php 
                        if(!empty($courseList)){
                           foreach($courseList as $key => $course){ 
                     ?>
                     <a href="<?= base_url('course-details').'/'.$selectedState['id'].'/'.$course['id']; ?>">
                        <div class="swiper-slide">
                           <div class="d-flex">
                              <div class="bg-white bsgPredoict">
                                 <div>
                                    <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                       <div class="lc-block mb-2">
                                          <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                       </div>
                                       <div class="lc-block mb-4">
                                          <div class="sy7u" editable="rich">
                                             <h5 class="cnetCss"><?= @$selectedState['name'] .' '. @$course['course'] .'  Predictor'; ?></h5>   
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </a>
                     <?php } } ?>
                     </div>
                  </div>
               </div>
            <?php } } ?>

            <!-- <div class="container">
               <div class="row">
                  <div class="col-12 text-center">
                     <div class="lc-block">
                        <div editable="rich">
                           <h3 class="allfsv text-start">PG/Diploma</h3>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container pb-6">
               <div class="swiper swiper-RANDOMID">
                  <div class="swiper-wrapper d-flex align-items-center text-center">
                     <div class="swiper-slide ">
                        <div class="d-flex">
                           <div class="bg-white bsgPredoict">
                              <div>
                                 <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="cnetCss">Bihar Predictor Counselling</h5>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide ">
                        <div class="d-flex">
                           <div class="bg-white bsgPredoict">
                              <div>
                                 <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="cnetCss">Bihar Predictor Counselling</h5>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide ">
                        <div class="d-flex">
                           <div class="bg-white bsgPredoict">
                              <div>
                                 <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="cnetCss">Bihar Predictor Counselling</h5>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide ">
                        <div class="d-flex">
                           <div class="bg-white bsgPredoict">
                              <div>
                                 <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="cnetCss">Bihar Predictor Counselling</h5>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide ">
                        <div class="d-flex">
                           <div class="bg-white bsgPredoict">
                              <div>
                                 <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="cnetCss">Bihar Predictor Counselling</h5>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide ">
                        <div class="d-flex">
                           <div class="bg-white bsgPredoict">
                              <div >
                                 <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="cnetCss">Bihar Predictor Counselling</h5>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     
                  </div>
               </div>
            </div>

            <div class="container">
               <div class="row">
                  <div class="col-12 text-center">
                     <div class="lc-block">
                        <div editable="rich">
                           <h3 class="allfsv text-start">Post Graduate</h3>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container pb-6">
               <div class="swiper swiper-RANDOMID">
                  <div class="swiper-wrapper d-flex align-items-center text-center">
                     <div class="swiper-slide ">
                        <div class="d-flex">
                           <div class="bg-white bsgPredoict">
                              <div>
                                 <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="cnetCss">Bihar Predictor Counselling</h5>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide ">
                        <div class="d-flex">
                           <div class="bg-white bsgPredoict">
                              <div>
                                 <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="cnetCss">Bihar Predictor Counselling</h5>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide ">
                        <div class="d-flex">
                           <div class="bg-white bsgPredoict">
                              <div>
                                 <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="cnetCss">Bihar Predictor Counselling</h5>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide ">
                        <div class="d-flex">
                           <div class="bg-white bsgPredoict">
                              <div>
                                 <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="cnetCss">Bihar Predictor Counselling</h5>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide ">
                        <div class="d-flex">
                           <div class="bg-white bsgPredoict">
                              <div>
                                 <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="cnetCss">Bihar Predictor Counselling</h5>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide ">
                        <div class="d-flex">
                           <div class="bg-white bsgPredoict">
                              <div >
                                 <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="cnetCss">Bihar Predictor Counselling</h5>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     
                  </div>
               </div>
            </div>

            <div class="container">
               <div class="row">
                  <div class="col-12 text-center">
                     <div class="lc-block">
                        <div editable="rich">
                           <h3 class="allfsv text-start">PhD</h3>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container pb-6">
               <div class="swiper swiper-RANDOMID">
                  <div class="swiper-wrapper d-flex align-items-center text-center">
                     <div class="swiper-slide ">
                        <div class="d-flex">
                           <div class="bg-white bsgPredoict">
                              <div>
                                 <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="cnetCss">Bihar Predictor Counselling</h5>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide ">
                        <div class="d-flex">
                           <div class="bg-white bsgPredoict">
                              <div>
                                 <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="cnetCss">Bihar Predictor Counselling</h5>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide ">
                        <div class="d-flex">
                           <div class="bg-white bsgPredoict">
                              <div>
                                 <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="cnetCss">Bihar Predictor Counselling</h5>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide ">
                        <div class="d-flex">
                           <div class="bg-white bsgPredoict">
                              <div>
                                 <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="cnetCss">Bihar Predictor Counselling</h5>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide ">
                        <div class="d-flex">
                           <div class="bg-white bsgPredoict">
                              <div>
                                 <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="cnetCss">Bihar Predictor Counselling</h5>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide ">
                        <div class="d-flex">
                           <div class="bg-white bsgPredoict">
                              <div >
                                 <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="cnetCss">Bihar Predictor Counselling</h5>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     
                  </div>
               </div>
            </div>

            <div class="container">
               <div class="row">
                  <div class="col-12 text-center">
                     <div class="lc-block">
                        <div editable="rich">
                           <h3 class="allfsv text-start">MBBS</h3>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container pb-6">
               <div class="swiper swiper-RANDOMID">
                  <div class="swiper-wrapper d-flex align-items-center text-center">
                     <div class="swiper-slide ">
                        <div class="d-flex">
                           <div class="bg-white bsgPredoict">
                              <div>
                                 <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="cnetCss">Bihar Predictor Counselling</h5>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide ">
                        <div class="d-flex">
                           <div class="bg-white bsgPredoict">
                              <div>
                                 <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="cnetCss">Bihar Predictor Counselling</h5>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide ">
                        <div class="d-flex">
                           <div class="bg-white bsgPredoict">
                              <div>
                                 <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="cnetCss">Bihar Predictor Counselling</h5>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide ">
                        <div class="d-flex">
                           <div class="bg-white bsgPredoict">
                              <div>
                                 <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="cnetCss">Bihar Predictor Counselling</h5>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide ">
                        <div class="d-flex">
                           <div class="bg-white bsgPredoict">
                              <div>
                                 <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="cnetCss">Bihar Predictor Counselling</h5>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide ">
                        <div class="d-flex">
                           <div class="bg-white bsgPredoict">
                              <div >
                                 <div class="col-12 col-lg-8 col-xl-6 text-center bxo9gss">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?=base_url('assets/site/img/biharC.png')?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="cnetCss">Bihar Predictor Counselling</h5>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     
                  </div>
               </div>
            </div> -->




            
            <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
               <div class="row ">
                   
                   <div class="col-md-12 text-center">
                     <a href="#!">Back to Predictor</a>
                   </div>
                   
               </div>
               
                
              
            </div>
         </div>
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
      <script src="<?=base_url('assets/site/js/bootstrap.bundle.min.js')?>"></script>
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
             slidesPerView: 3,
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