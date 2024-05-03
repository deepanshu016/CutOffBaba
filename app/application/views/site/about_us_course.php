<?php $this->load->view('site/header'); ?>
      
      <main>
         <div class="position-relative overflow-hidden   p-md-5 m-md-3 text-center bg-light">
            
            <div class="col-md-5 p-lg-5 p-3 mx-auto ">
               <h4 class=" fw-bold text-start txtColor"> <img src="<?=base_url('assets/site/img/rightarrow.png')?>"> &nbsp;  Know about <?= $selectedCourse['course']; ?></h4>
               <div class="card radius">
                  <img src="<?= ($selectedCourse['stream_image'] != '' && file_exists(FCPATH.'assets/uploads/stream/'.$selectedCourse['stream_image'])) ? base_url('assets/uploads/stream/').'/'.$selectedCourse['stream_image'] : base_url('assets/site/img/medical-tr.png');?>" class="card-img cuys " alt="doc-pic">
                  <div class="card-img-overlay mbbsOverlay">
                     <h5 class="card-title text-dark"><?= $selectedCourse['course_full_name']; ?></h5>
                  </div>
               </div>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>

         </div>
         
         <div class=" w-100 my-md-3 ps-md-3 bg-light">
            <?php if(!empty($courseColleges)) { ?>
            <div class="container">
               <div class="row mb-4">
                  <div class="col-12 text-center">
                     <div class="lc-block">
                        <div editable="rich">
                           <h3 class="text-uppercase fw-bold text-start">Popular college</h3>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container pb-6">
               <div class="swiper swiper-RANDOMID">
                  <div class="swiper-wrapper d-flex align-items-center text-center">
                    <?php 
                    foreach($courseColleges as $college){ ?>
                     <div class="swiper-slide">
                        <div class="d-flex">
                           <div class="bg-white">
                              <div class="row justify-content-center">
                                 <div class="col-12 col-lg-8 col-xl-6 text-center">
                                    <div class="lc-block mb-2">
                                       <img class="img-fluid" alt="Photo by Sebastian Pichler" src="<?= ($college['college_logo'] == '' || !file_exists(base_url('assets/uploads/college/logo/').'/'.$college['college_logo'])) ? base_url('assets/site/img/Rectangless27.png') : base_url('assets/uploads/college/logo/').'/'.$college['college_logo'];?>">
                                    </div>
                                    <div class="lc-block mb-4">
                                       <div class="sy7u" editable="rich">
                                          <h5 class="fonSix"><?= $college['full_name']; ?></h5> 
                                           
                                            <ol class="list-group list-group-numbered">
                                              <li class=" d-flex justify-content-between align-items-start">
                                                <div class="me-auto">
                                                  <div class="fw-bold"><img src="<?=base_url('assets/site/img/calender.png')?>" alt=""> <?= date('Y',strtotime($college['establishment'])); ?></div> 
                                                </div> 
                                                <div class=" me-auto">
                                                  <div class="fw-bold"><img src="<?=base_url('assets/site/img/location.png')?>" alt=""> Patna</div> 
                                                </div> 
                                              </li>
                                            </ol>
                                          <!-- <p>  <img src="img/calender.png" alt=""> 1998 </p> -->
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php } ?>
                  </div>
               </div>
            </div>
            <?php } ?>
            <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
              <h4 class="text-start">About MBBS</h4>
              <p class="text-start" ><?= $selectedCourse['course_full_name']; ?></p>
            </div>
            <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
               <div class="    mb-3"  >
                   <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item shadow-sm">
                      <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                          Eligibility criteria for <?= $selectedCourse['course']; ?>
                        </button>
                      </h2>
                      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body"><?= $selectedCourse['course_eligibility']; ?></div>
                      </div>
                    </div>
                    <div class="accordion-item shadow-sm">
                      <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                          Job Opportunities
                        </button>
                      </h2>
                      <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body"><?= $selectedCourse['course_opportunity']; ?></div>
                      </div>
                    </div>
                    <div class="accordion-item shadow-sm">
                      <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                          Expected Salary
                        </button>
                      </h2>
                      <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body"><?= $selectedCourse['expected_salary']; ?></div>
                      </div>
                    </div>
                  </div>
               </div>
            </div> 

             <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
              <h4 class="text-start">State wise <?= $selectedCourse['course']; ?></h4>
            </div>

            <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden mb-5">
            <div class="row">
               <?php 
               if(!empty($stateList)) {
                  foreach($stateList as $state) { ?>
               <div class="col col-md-2 col-sm-2 lesCols">
                  <div class="card card-body">
                     <a href="<?= base_url('state-wise-colleges').'/'.$state['id'].'/'.$selectedCourse['id']; ?>">
                     <img src="<?=base_url('assets/site/img/gujarat.png')?>" class="card-img-top" alt="...">
                     <div class="card-body minPadding">
                        <p class="card-text"><?= $state['name']; ?></p>
                     </div>
                     </a>
                  </div>
               </div>
               <?php } } ?>
            </div>
                <br>
            </div>
         </div>
      </main>
<?php $this->load->view('site/footer'); ?>