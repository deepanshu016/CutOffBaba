<?php $this->load->view('site/header'); ?>
   <style>
            .mansv{
                flex-wrap: nowrap;
            }
            .newsCss{
                    margin-top: 21px;
    margin-bottom: 23px;
            }
         </style>
      <main class="bg-white">
         <div class="position-relative overflow-hidden p-md-5 m-md-3 text-center bg-light">
            <div class="col-md-5 p-lg-5 p-3 mx-auto ">
               <h4 class="text-start y6Cfh"> <a href="<?= base_url('news'); ?>"> <img src="<?=base_url('assets/site/img/rightarrow.png')?>"></a> </h4>
               <a class="float-end" href="<?= base_url('profile'); ?>"><img class="rounded" height="100" width="100" src="<?= ($userData['image'] != '' && file_exists(FCPATH.'assets/uploads/users/'.$userData['image'])) ? base_url('assets/uploads/users/').'/'.$userData['image'] : base_url('assets/site/img/user.png');?>" alt=""></a>
            </div>
         </div>
         <section class="sectionNews">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <h4 class="fateCds"><?= $newsData['title']; ?></h4>
                     <span class="spaExpoire">On  <?=date('d M Y, l, h:ia', strtotime($newsData['created_at'])); ?></span>
                     <p><?= $newsData['full_description']; ?> </p>
                     <!-- <p>Also read :  <a class="upCon" href="#!">GATE 2024 upcoming news</a> </p> -->
                  </div>
               </div>
               <div class="row mt-3">
                  <!-- <div class="col-12">
                     <h5 class="wasCss">Was this article helpful?</h5>
                     <div class="diDie">
                     <div class="divImags">
                        <div class="row">
                           <div class="col-2">
                              <div class="imgSlas">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M21.9375 7.51125C21.7263 7.27193 21.4666 7.08028 21.1757 6.94903C20.8847 6.81778 20.5692 6.74994 20.25 6.75H15V5.25C15 4.25544 14.6049 3.30161 13.9017 2.59835C13.1984 1.89509 12.2446 1.5 11.25 1.5C11.1107 1.4999 10.9741 1.53862 10.8555 1.61181C10.7369 1.685 10.6411 1.78977 10.5787 1.91438L7.03687 9H3C2.60218 9 2.22064 9.15804 1.93934 9.43934C1.65804 9.72064 1.5 10.1022 1.5 10.5V18.75C1.5 19.1478 1.65804 19.5294 1.93934 19.8107C2.22064 20.092 2.60218 20.25 3 20.25H19.125C19.6732 20.2502 20.2025 20.0503 20.6137 19.6878C21.0249 19.3253 21.2896 18.8251 21.3581 18.2812L22.4831 9.28125C22.523 8.9644 22.495 8.64268 22.4009 8.3375C22.3068 8.03232 22.1488 7.75066 21.9375 7.51125ZM3 10.5H6.75V18.75H3V10.5ZM20.9944 9.09375L19.8694 18.0938C19.8465 18.275 19.7583 18.4418 19.6212 18.5626C19.4842 18.6834 19.3077 18.7501 19.125 18.75H8.25V9.92719L11.6916 3.04313C12.2016 3.14521 12.6606 3.4209 12.9903 3.82326C13.32 4.22562 13.5001 4.7298 13.5 5.25V7.5C13.5 7.69891 13.579 7.88968 13.7197 8.03033C13.8603 8.17098 14.0511 8.25 14.25 8.25H20.25C20.3564 8.24996 20.4616 8.27258 20.5587 8.31634C20.6557 8.36011 20.7423 8.42402 20.8127 8.50383C20.8831 8.58363 20.9357 8.67752 20.967 8.77923C20.9984 8.88094 21.0077 8.98816 20.9944 9.09375Z" fill="#1D1D1D"/>
                                 </svg>
                              </div>
                           </div>
                           <div class="col-2">
                              <div class="imgSlas">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M22.4831 14.7188L21.3581 5.71875C21.2896 5.17489 21.0249 4.67475 20.6137 4.31224C20.2025 3.94974 19.6732 3.74981 19.125 3.75H3C2.60218 3.75 2.22064 3.90804 1.93934 4.18934C1.65804 4.47064 1.5 4.85218 1.5 5.25V13.5C1.5 13.8978 1.65804 14.2794 1.93934 14.5607C2.22064 14.842 2.60218 15 3 15H7.03687L10.5787 22.0856C10.6411 22.2102 10.7369 22.315 10.8555 22.3882C10.9741 22.4614 11.1107 22.5001 11.25 22.5C12.2446 22.5 13.1984 22.1049 13.9017 21.4016C14.6049 20.6984 15 19.7446 15 18.75V17.25H20.25C20.5693 17.2501 20.8849 17.1823 21.176 17.051C21.467 16.9197 21.7268 16.728 21.938 16.4885C22.1492 16.2491 22.3071 15.9675 22.4011 15.6623C22.4951 15.3572 22.523 15.0355 22.4831 14.7188ZM6.75 13.5H3V5.25H6.75V13.5ZM20.8125 15.4959C20.7426 15.5763 20.6561 15.6407 20.5591 15.6845C20.462 15.7284 20.3565 15.7507 20.25 15.75H14.25C14.0511 15.75 13.8603 15.829 13.7197 15.9697C13.579 16.1103 13.5 16.3011 13.5 16.5V18.75C13.5001 19.2702 13.32 19.7744 12.9903 20.1767C12.6606 20.5791 12.2016 20.8548 11.6916 20.9569L8.25 14.0728V5.25H19.125C19.3077 5.24994 19.4842 5.31658 19.6212 5.43742C19.7583 5.55825 19.8465 5.72496 19.8694 5.90625L20.9944 14.9062C21.0084 15.0118 20.9994 15.1192 20.9681 15.221C20.9367 15.3228 20.8836 15.4166 20.8125 15.4959Z" fill="#1D1D1D"/>
                                 </svg>
                              </div>
                           </div>
                        </div>
                     </div>
                     </div>
                  </div>

                  <div class="mt-3">
                     <div>
                     <div class="card text-bg-dark ">
                        <img src="img/d43.png" class="card-img" alt="...">
                        <div class="card-img-overlay mgOvTops">
                           <h5 class="card-title">AIEEE COUNSELLING START FRO...</h5>
                           <p class="card-text"><small>07 Feb 2024 - Cutoff Baba</small>  <span class="floatr">7 min read</span>  </p>
                        </div>
                     </div>
                     </div>
                  </div> -->


                  <div class="mt-3">  

                   <div class="recenCss">
                     <h4 class="rtsTx">Recent News</h4>
                   </div>
                  
                     <ul class="list-group list-group-flush">
                     <?php
                        if(!empty($newsList)){ 
                            foreach($newsList as $newss){ ?>
                        <li class="list-group-item"> <a class="vghs" href="<?= base_url('news-detail').'/'.$newss['id'].'/'.$newss['slug'];?>"><?= $newss['title'];?></a></li>
                    <?php } } ?>
                     </ul>
                   

                  </div>

               </div>
            </div>
         </section>
      </main>
      
      <?php $this->load->view('site/footer'); ?>