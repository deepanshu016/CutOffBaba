<?php $this->load->view('site/header'); ?>
      <main class="bg-white">
         <div class="position-relative overflow-hidden p-md-5 m-md-3 text-center bg-light">
            <div class="col-md-5 p-lg-5 p-3 mx-auto ">
               <h4 class="text-start y6Cfh"><a  href="<?= base_url('profile'); ?>"> <img src="<?=base_url('assets/site/img/rightarrow.png')?>"></a> </h4>
               <a class="float-end" href="<?= base_url('profile'); ?>"><img class="userCanv" src="<?= ($userData['image'] != '' && file_exists(FCPATH.'assets/uploads/users/'.$userData['image'])) ? base_url('assets/uploads/users/').'/'.$userData['image'] : base_url('assets/site/img/user.png');?>" alt=""></a>
            </div>
         </div>
        
         <style>
            .mansv{
                flex-wrap: nowrap;
            }
            .newsCss{
                    margin-top: 21px;
    margin-bottom: 23px;
            }
         </style>
         <section class="newsCss">
            <div class="container">
               <div class="row">
                <div class="col-12">
                <div class="scrollmenu">
                     <div class="nav mansv nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true" href="#!">All</a>
                        <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" href="#!">Latest</a>
                        <a class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false" href="#!">Popular</a>
                        <a class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false" href="#!">Counselling</a>
                        <a class="nav-link" id="nav-mstpop-tab" data-bs-toggle="tab" data-bs-target="#nav-mstpop" type="button" role="tab" aria-controls="nav-mstpop" aria-selected="false" href="#!">Most Popular</a>
                        
                     </div> 
                    </div>
                </div>
               </div>

               <div class="row">
                <div class="col-12">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                    <div class="card text-bg-dark ">
                        <img src="<?=base_url('assets/site/img/d43.png')?>" class="card-img" alt="...">
                        <div class="card-img-overlay mgOvTops">
                           <h5 class="card-title">AIEEE COUNSELLING START FRO...</h5>
                           <p class="card-text"><small>07 Feb 2024 - Cutoff Baba</small>  <span class="floatr">7 min read</span>  </p>
                        </div>
                     </div>
                     <div class="dibcsr">
                        <div class="swiper swiper-RANDOMID">
                           <div class="swiper-wrapper d-flex align-items-center text-center">
                            <?php
                                if(!empty($newsList)){ 
                                    foreach($newsList as $news){ ?>
                                    <div class="swiper-slide ">
                                        <div class="card text-bg-dark wi90ks">
                                            <img src="<?= ($news['image'] != '' && file_exists(FCPATH.'assets/uploads/news/'.$news['image'])) ? base_url('assets/uploads/news/').'/'.$news['image'] : base_url('assets/site/img/bw.png');?>" class="card-img" alt="...">
                                            <div class="card-img-overlay ">
                                            <h5 class="card-title aii5s"><?= $news['title']; ?></h5>
                                            <p class="card-text"><small><?= date('d M Y',strtotime($news['created_at'])); ?></small>  
                                            <!-- <span class="floatr">7 min read</span>   -->
                                            </p>
                                            </div>
                                        </div>
                                    </div>
                            <?php } } ?>
                           </div>
                        </div>
                     </div>
                     <div class="dibcsr">
                        <h4> <img src="<?=base_url('assets/site/img/vvs.png')?>" alt="">  Hot Topic Of The Day  <span class="flsyyu">View All</span>  </h4>
                        <?php
                            if(!empty($newsList)){ 
                                foreach($newsList as $newss){ ?>
                            <div class="divcouns">
                                <div class="row">
                                    <div class="col-8">
                                        <span class="spanCouns">COUNSELLING</span>
                                        <h3 class="f14ps"><?= $newss['title']; ?></h3>
                                        <p><?= $newss['short_description']; ?></p>
                                    </div>
                                    <div class="col-4">
                                        <img class="vImsh" height="100" width="100" src="<?= ($newss['image'] != '' && file_exists(FCPATH.'assets/uploads/news/'.$newss['image'])) ? base_url('assets/uploads/news/').'/'.$news['image'] : base_url('assets/site/img/njf.png');?>" alt="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="buyt6s">
                                        <div class="col-12">
                                            <a class="vghs" href="<?= base_url('news-detail').'/'.$news['id'].'/'.$news['slug'];?>">
                                            View More  
                                            <span class="vgArros">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                                    <path d="M14.1925 10.9422L7.94254 17.1922C7.88447 17.2502 7.81553 17.2963 7.73966 17.3277C7.66379 17.3592 7.58247 17.3753 7.50035 17.3753C7.41823 17.3753 7.33691 17.3592 7.26104 17.3277C7.18517 17.2963 7.11623 17.2502 7.05816 17.1922C7.00009 17.1341 6.95403 17.0652 6.9226 16.9893C6.89117 16.9134 6.875 16.8321 6.875 16.75C6.875 16.6679 6.89117 16.5865 6.9226 16.5107C6.95403 16.4348 7.00009 16.3659 7.05816 16.3078L12.8668 10.5L7.05816 4.69217C6.94088 4.57489 6.875 4.41583 6.875 4.24998C6.875 4.08413 6.94088 3.92507 7.05816 3.80779C7.17544 3.69052 7.3345 3.62463 7.50035 3.62463C7.6662 3.62463 7.82526 3.69052 7.94254 3.80779L14.1925 10.0578C14.2506 10.1158 14.2967 10.1848 14.3282 10.2606C14.3597 10.3365 14.3758 10.4178 14.3758 10.5C14.3758 10.5821 14.3597 10.6634 14.3282 10.7393C14.2967 10.8152 14.2506 10.8841 14.1925 10.9422Z" fill="#4B4B4B"/>
                                                </svg>
                                            </span>
                                            </a>
                                        </div>
                                        <div class="border_dot">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } } ?>
                     </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">.2..</div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">.3..</div>
                    <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">..4.</div>
                    <div class="tab-pane fade" id="nav-mstpop" role="tabpanel" aria-labelledby="nav-mstpop-tab" tabindex="0">..5.</div>
                    </div>
                </div>
               </div>
            </div>
         </section>
      </main>
      <?php $this->load->view('site/footer'); ?>