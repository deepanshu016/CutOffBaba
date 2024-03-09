<?php $this->load->view('site/header'); ?>
      <main>
         <div class="position-relative overflow-hidden p-md-5 m-md-3 text-center bg-light" style="background-image: url(<?=base_url('assets/site/img/Rectbgs.png')?>); height: 300px;">
            <div class="col-md-5 p-lg-5 p-3 mx-auto ">
               <h4 class=" fw-bold text-start txtColorss"> <img src="<?=base_url('assets/site/img/rightarrow.png')?>"> </h4>
               <h5 class="card-title  text-white">Contact Us</h5> 
            </div>
            <h4 class="ltscss">Let’s touch with  <span class="cyuCs">CuttOff Baba</span> </h4>
            <p class="nscXss">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur ma</p>
         </div>
         
         <section >
         <div>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                             <div class="card card-body radisuForm shadow">
                             <form class="all-form" action="<?= base_url('post-enquiry'); ?>" method="POST">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Name*</label>
                                    <input type="text" class="form-control inpBttom" id="username" name="name" placeholder="Full Name" />
                                    <div class="text-danger" id="name"></div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Email*</label>
                                    <input type="text" class="form-control inpBttom" id="password" name="email" placeholder="Email Address" />
                                    <div class="text-danger" id="email"></div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Mobile*</label>
                                    <input type="text" class="form-control inpBttom" id="password" name="phone" placeholder="Mobile Number*" />
                                    <div class="text-danger" id="phone"></div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Subject*</label>
                                    <input type="text" class="form-control inpBttom" id="password" name="subject" placeholder="Brief about your concern" />
                                    <div class="text-danger" id="subject"></div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Message*</label>
                                    <input type="text" class="form-control inpBttom" id="password" name="message" placeholder="What’s this about?" />
                                    <div class="text-danger" id="message"></div>
                                </div>
                                <div class="modal-footer d-block"> 
                                    <button type="submit" class="w-100 btn btn-primary contsctButton">Submit</button>
                                </div>
                            </form>
                             </div> 
                        </div>
                    </div>
                </div>
            </div>
         </section>
      </main>
<?php $this->load->view('site/footer'); ?>