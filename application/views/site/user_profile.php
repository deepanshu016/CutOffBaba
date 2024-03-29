<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>User Profile</title>
      <link href="<?=base_url('assets/site/css/bootstrap.min.css')?>" rel="stylesheet">
      <link href="<?=base_url('assets/site/css/style.css')?>" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <body class="snnxbgs">
      <style>
         .card-horizontal {
         display: flex;
         flex: 1 1 auto;
         }
      </style>
      <main>
         <section class="canvaCssss">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <button class=" canvaCss" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="fa fa-bars" aria-hidden="true"></i></button>
                     <a class="float-end ccsFv" href="#!"><img class="userCanv rounded" height="50" width="50" src="<?= ($userData['image'] != '' && file_exists(FCPATH.'assets/uploads/users/'.$userData['image'])) ? base_url('assets/uploads/users/').'/'.$userData['image'] : base_url('assets/site/img/user.png');?>" alt=""></a>
                     <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                        <div class="offcanvas-header bg-light">
                           <h5 class="offcanvas-title" id="offcanvasScrollingLabel"> </h5>
                           <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body bg-light">
                           <div>
                              <div class="onnXcard">
                                 <div class="card-horizontal">
                                    <div class="img-square-wrapper">
                                       <img height="50" class="rounded" width="50" src="<?= ($userData['image'] != '' && file_exists(FCPATH.'assets/uploads/users/'.$userData['image'])) ? base_url('assets/uploads/users/').'/'.$userData['image'] : base_url('assets/site/img/user.png');?>"  alt="">
                                       <p class="peditsc"> <a class="ediCss" href="<?= base_url('edit-profile'); ?>"> Edit <i class="fa fa-pencil-square-o edics" aria-hidden="true"></i> </a> </p>
                                    </div>
                                    <div class="radhaCss">
                                       <h4 class="card-title tiCuts"> <img src="<?=base_url('assets/site/img/uuts.png')?>" alt=""> <?= @$userData['name']; ?></h4>
                                       <ul class="list-group list-group-flush">
                                       <li class="list-group-item"> </li>
                                       <li class="list-group-item itmsvfx"> <img src="<?=base_url('assets/site/img/cllas.png')?>" alt=""> <?= @$userData['mobile']; ?></li>
                                       <?php
                                          $selectedExam = ($userData && $userData['selected_exam']) ? $this->db->select('*')->from('tbl_exam')->where(['id'=>$userData['selected_exam']])->get()->row_array() : [];
                                       ?>
                                       <?php 
                                       if(!empty($selectedExam)) { ?>
                                          <li class="list-group-item itmsvfx"> <img src="<?=base_url('assets/site/img/edy.png')?>" alt=""> <?= $selectedExam['exam'];?></li>
                                       <?php } ?>
                                       <li class="list-group-item"> </li>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="divmain ">
                              <ul class="list-group list-group-flush">
                                 <li class="list-group-item bgnonecss"><img src="<?=base_url('assets/site/img/homeiocns.png')?>" alt=""><a href="<?= base_url('streams'); ?>"> Home</a></li>
                                 <li class="list-group-item bgnonecss"><img src="<?=base_url('assets/site/img/collgepre.png')?>" alt=""><a href="<?= base_url('college-predictor'); ?>"> College Predictor </a></li>
                                 <li class="list-group-item bgnonecss"><img src="<?=base_url('assets/site/img/seat.png')?>" alt=""> Seat Matrics</li>
                                 <li class="list-group-item bgnonecss"><img src="<?=base_url('assets/site/img/news.png')?>" alt=""> News & Updates</li>
                                 <li class="list-group-item bgnonecss"><img src="<?=base_url('assets/site/img/notis.png')?>" alt=""> Notifications</li>
                                 <li class="list-group-item bgnonecss"><img src="<?=base_url('assets/site/img/papy.png')?>" alt=""> <a href="<?= base_url('payments'); ?>">Payments</a></li>
                                 <li class="list-group-item bgnonecss"><img src="<?=base_url('assets/site/img/privacyss.png')?>" alt=""> <a href="<?= base_url('privacy-policy'); ?>">Privacy Policy</a></li>
                                 <li class="list-group-item bgnonecss"><img src="<?=base_url('assets/site/img/ttrs.png')?>" alt=""> <a href="<?= base_url('terms-condition'); ?>">Terms & Conditions</a></li>
                              </ul>
                           </div>
                           <div class="logouts">
                              <a class="loFxt" href="<?= base_url('logout'); ?>"><img src="<?=base_url('assets/site/img/lllo.png')?>" alt=""> Log Out </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="bodyCtion">
            <div class="container">
               <div class="row">
               <?php if(!empty($coursesList)) { 
                  foreach($coursesList as $course) { ?>
                  <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                     <div class="card shaDo mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                           <div class="col-md-9 col">
                              <div class="card-body nopad">
                                 <h5 class="card-title">Explore <?= @$course['course']; ?></h5>
                                 <p class="card-text nop"><?= $course['course_full_name']; ?></p>
                                 <a class="text-dark text-decoration-none" href="<?= base_url('about-course').'/'.$course['id']; ?>">Explore More  <img src="<?=base_url('assets/site/img/CaretRight.png')?>"> </a>
                              </div>
                           </div>
                           <div class="col-md-3 col">
                              <img src="<?= ($course['course_icon'] != '' && file_exists(FCPATH.'assets/uploads/course/'.$course['course_icon'])) ? base_url('assets/uploads/course/').'/'.$course['course_icon'] : base_url('assets/site/img/medical-tr.png');?>" class="img-fluid rounded-start" alt="...">
                           </div>
                        </div>
                     </div>
                  </div>
               <?php } } ?>
               <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
               <div class="card shaDo mb-3" style="max-width: 540px;">
                  <div class="row g-0">
                     <div class="col-md-9 col">
                        <div class="card-body nopad">
                           <h5 class="card-title">College Predictor</h5>
                           <p class="card-text nop">Sed ut perspiciatis unde omnis </p>
                           <a class="text-dark text-decoration-none" href="<?= base_url('college-predictor'); ?>">Select CTA  <img src="<?=base_url('assets/site/img/CaretRight.png')?>"> </a>
                        </div>
                     </div>
                     <div class="col-md-3 col">
                        <img src="<?= base_url('assets/site/img/medical-tr.png'); ?>" class="img-fluid rounded-start" alt="...">
                     </div>
                  </div>
               </div>
            </div>
            <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
               <div class="card shaDo mb-3" style="max-width: 540px;">
                  <div class="row g-0">
                     <div class="col-md-9 col">
                        <div class="card-body nopad">
                           <h5 class="card-title">Our Paid Counselling</h5>
                           <p class="card-text nop">Sed ut perspiciatis unde omnis </p>
                           <a class="text-dark text-decoration-none" href="<?= base_url('plan'); ?>">Select CTA  <img src="<?=base_url('assets/site/img/CaretRight.png')?>"> </a>
                        </div>
                     </div>
                     <div class="col-md-3 col">
                        <img src="<?= base_url('assets/site/img/medical-tr.png'); ?>" class="img-fluid rounded-start" alt="...">
                     </div>
                  </div>
               </div>
            </div>
            <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
               <div class="card shaDo mb-3" style="max-width: 540px;">
                  <div class="row g-0">
                     <div class="col-md-9 col">
                        <div class="card-body nopad">
                           <h5 class="card-title">College CutOff</h5>
                           <p class="card-text nop">Sed ut perspiciatis unde omnis </p>
                           <a class="text-dark text-decoration-none" href="">Select CTA  <img src="<?=base_url('assets/site/img/CaretRight.png')?>"> </a>
                        </div>
                     </div>
                     <div class="col-md-3 col">
                        <img src="<?= base_url('assets/site/img/medical-tr.png'); ?>" class="img-fluid rounded-start" alt="...">
                     </div>
                  </div>
               </div>
            </div>
            <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
               <div class="card shaDo mb-3" style="max-width: 540px;">
                  <div class="row g-0">
                     <div class="col-md-9 col">
                        <div class="card-body nopad">
                           <h5 class="card-title">College Reviews</h5>
                           <p class="card-text nop">Sed ut perspiciatis unde omnis </p>
                           <a class="text-dark text-decoration-none" href="<?= base_url('testimonial-explore'); ?>">Select CTA  <img src="<?=base_url('assets/site/img/CaretRight.png')?>"> </a>
                        </div>
                     </div>
                     <div class="col-md-3 col">
                        <img src="<?= base_url('assets/site/img/medical-tr.png'); ?>" class="img-fluid rounded-start" alt="...">
                     </div>
                  </div>
               </div>
            </div>
            <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
               <div class="card shaDo mb-3" style="max-width: 540px;">
                  <div class="row g-0">
                     <div class="col-md-9 col">
                        <div class="card-body nopad">
                           <h5 class="card-title">Other Courses</h5>
                           <p class="card-text nop">Sed ut perspiciatis unde omnis </p>
                           <a class="text-dark text-decoration-none" href="">Select CTA  <img src="<?=base_url('assets/site/img/CaretRight.png')?>"> </a>
                        </div>
                     </div>
                     <div class="col-md-3 col">
                        <img src="<?= base_url('assets/site/img/medical-tr.png'); ?>" class="img-fluid rounded-start" alt="...">
                     </div>
                  </div>
               </div>
            </div>
               </div>
            </div>
         </section>
         <section class="paymentList">  
         <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Payment History</h4>
                    <div> 
                    <table class="table table-bordered">
                    <thead class="bgCutTbale">
                        <tr>

                        <th scope="col">Date</th>
                        <th scope="col">Txn ID</th>
                        <th scope="col">Amount</th> 
                        </tr>
                    </thead>
                    <tbody class="text-center">
                     <?php if(!empty($paymentsData)) {
                        foreach($paymentsData as $payment) { ?>
                        <tr> 
                           <td><?= date('d M Y',strtotime($payment['purchased_date'])); ?></td>
                           <td><?= $payment['txn_id']; ?></td>
                           
                           <td>₹ <?= $payment['amount']; ?></td>
                        </tr>
                     <?php } } ?>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
         </div>
         </div>
         <?php $this->load->view('site/footer'); ?>
      </main>