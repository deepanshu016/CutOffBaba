<?php $this->load->view('small/frontend/header'); ?>
 <header class="site-header sticky-top py-1 bg-light">
 <nav class="container bg-light d-flex flex-column flex-md-row justify-content-between">
    <nav class="navbar bg-light">
       <div class="container-fluid">
          <a class="navbar-brand" href="#!" aria-label="Product">
          <img class="logoCs" src="<?=base_url('assets/frontend/img/logo.png')?>"> <span class="cutCss">Cutoff Baba</span>
          </a>
          <a class="navbar-brand ctaTxt" href="#!">CTA inte</a>
          <?php if($this->session->userdata('user')) { ?>
            <a class="navbar-brand" href="#!"> <img src="<?=base_url('assets/frontend/img/user.png')?>"> </a>
          <?php } ?>
       </div>
    </nav>
 </nav>
</header>
<main>
 <div class="position-relative overflow-hidden   p-md-5 m-md-3 text-center bg-light">
    <section>
       <div class="container">
          <div class="row">
             <div class="col-md-12 col">
                <div class="card card-body cutSCards">
                </div>
                <div class="alert altp alert-warning alert-dismissible fade show" role="alert">
                   <strong class="youTxt">Your profile is not completed. Please Complete first! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong>
                   <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
             </div>
          </div>
       </div>
    </section>
    <div class="col-md-5 p-lg-5 p-3 mx-auto ">
       <h4 class=" fw-bold text-start txtColor">Welcome to Cutoff Baba</h4>
       <div class="card radius">
          <img src="<?=base_url('assets/frontend/img/doc-pic.png')?>" class="card-img cuys " alt="doc-pic">
          <div class="card-img-overlay cardOverlay">
             <h5 class="card-title">Selected Stream</h5>
             <p class="card-text">Lorem ipsum dolor sit <br> amet, consectetur adipiscing <br> elit, sed do eiusmod tempor <br> incididunt ut labore .</p>
          </div>
       </div>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
 </div>
 <div class=" w-100 my-md-3 ps-md-3 bg-light">
    <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
       <div class="card shaDo mb-3" style="max-width: 540px;">
          <div class="row g-0">
             <div class="col-md-9 col">
                <div class="card-body nopad">
                   <h5 class="card-title">Explore MBBS</h5>
                   <p class="card-text nop">Sed ut perspiciatis unde omnis </p>
                   <a class="text-dark text-decoration-none" href="">Select CTA  <img src="<?=base_url('assets/frontend/img/CaretRight.png')?>"> </a>
                </div>
             </div>
             <div class="col-md-3 col">
                <img src="<?=base_url('assets/frontend/img/medical-tr.png')?>" class="img-fluid rounded-start" alt="...">
             </div>
          </div>
       </div>
    </div>
    <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
       <div class="row">
          <div class="col col-sm-6">
             <div class="card shaDo bgmbs text-white">
                <div class="card-body mbbsCss">
                   <img src="<?=base_url('assets/frontend/img/Rectangle.png')?>" class="img-fluid rounded-start" alt="...">
                   <h5 class="card-title mbbsFonts">MBBS</h5>
                   <p class="card-text nop">Sed ut perspiciatis Sed ut perspiciatis Sed ut perspiciatis</p>
                </div>
             </div>
          </div>
          <div class="col col-sm-6">
             <div class="card shaDo noHis">
                <div class="card-body mbbsCss">
                   <h5 class="card-title smTxt">About MBBS</h5>
                   <p class="card-text">Nemo enim ipsam voluptatem </p>
                </div>
             </div>
             <div class="card shaDo noHis">
                <div class="card-body mbbsCss">
                   <h5 class="card-title smTxt">State Wise Colloeges</h5>
                   <p class="card-text">Nemo enim ipsam voluptatem </p>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
       <div class="card shaDo mb-3" style="max-width: 540px;">
          <div class="row g-0">
             <div class="col-md-9 col">
                <div class="card-body nopad">
                   <h5 class="card-title">Explore MD/MS</h5>
                   <p class="card-text nop">Sed ut perspiciatis unde omnis </p>
                   <a class="text-dark text-decoration-none" href="">Select CTA  <img src="<?=base_url('assets/frontend/img/CaretRight.png')?>"> </a>
                </div>
             </div>
             <div class="col-md-3 col">
                <img src="<?=base_url('assets/frontend/img/medical-tr.png')?>" class="img-fluid rounded-start" alt="...">
             </div>
          </div>
       </div>
    </div>
    <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
       <div class="row">
          <div class="col col-sm-6">
             <div class="card shaDo bgmbs text-white">
                <div class="card-body mbbsCss">
                   <img src="<?=base_url('assets/frontend/img/Rectangle.png')?>" class="img-fluid rounded-start" alt="...">
                   <h5 class="card-title mbbsFonts">MD/MS</h5>
                   <p class="card-text nop">Sed ut perspiciatis Sed ut perspiciatis Sed ut perspiciatis</p>
                </div>
             </div>
          </div>
          <div class="col col-sm-6">
             <div class="card shaDo noHis">
                <div class="card-body mbbsCss">
                   <h5 class="card-title smTxt">About MBBS</h5>
                   <p class="card-text">Nemo enim ipsam voluptatem </p>
                </div>
             </div>
             <div class="card shaDo noHis">
                <div class="card-body mbbsCss">
                   <h5 class="card-title smTxt">State Wise Colloeges</h5>
                   <p class="card-text">Nemo enim ipsam voluptatem </p>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
       <div class="card shaDo mb-3" style="max-width: 540px;">
          <div class="row g-0">
             <div class="col-md-9 col">
                <div class="card-body nopad">
                   <h5 class="card-title">Explore PG Diploma</h5>
                   <p class="card-text nop">Sed ut perspiciatis unde omnis </p>
                   <a class="text-dark text-decoration-none" href="">Select CTA  <img src="<?=base_url('assets/frontend/img/CaretRight.png')?>"> </a>
                </div>
             </div>
             <div class="col-md-3 col">
                <img src="<?=base_url('assets/frontend/img/medical-tr.png')?>" class="img-fluid rounded-start" alt="...">
             </div>
          </div>
       </div>
    </div>
    <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
       <div class="card shaDo mb-3" style="max-width: 540px;">
          <div class="row g-0">
             <div class="col-md-9 col">
                <div class="card-body nopad">
                   <h5 class="card-title">College Predictor</h5>
                   <p class="card-text nop">Sed ut perspiciatis unde omnis </p>
                   <a class="text-dark text-decoration-none" href="">Select CTA  <img src="<?=base_url('assets/frontend/img/CaretRight.png')?>"> </a>
                </div>
             </div>
             <div class="col-md-3 col">
                <img src="<?=base_url('assets/frontend/img/medical-tr.png')?>" class="img-fluid rounded-start" alt="...">
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
                   <a class="text-dark text-decoration-none" href="">Select CTA  <img src="<?=base_url('assets/frontend/img/CaretRight.png')?>"> </a>
                </div>
             </div>
             <div class="col-md-3 col">
                <img src="<?=base_url('assets/frontend/img/medical-tr.png')?>" class="img-fluid rounded-start" alt="...">
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
                   <a class="text-dark text-decoration-none" href="">Select CTA  <img src="<?=base_url('assets/frontend/img/CaretRight.png')?>"> </a>
                </div>
             </div>
             <div class="col-md-3 col">
                <img src="<?=base_url('assets/frontend/img/medical-tr.png')?>" class="img-fluid rounded-start" alt="...">
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
                   <a class="text-dark text-decoration-none" href="">Select CTA  <img src="<?=base_url('assets/frontend/img/CaretRight.png')?>"> </a>
                </div>
             </div>
             <div class="col-md-3 col">
                <img src="<?=base_url('assets/frontend/img/medical-tr.png')?>" class="img-fluid rounded-start" alt="...">
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
                   <a class="text-dark text-decoration-none" href="">Select CTA  <img src="<?=base_url('assets/frontend/img/CaretRight.png')?>"> </a>
                </div>
             </div>
             <div class="col-md-3 col">
                <img src="<?=base_url('assets/frontend/img/medical-tr.png')?>" class="img-fluid rounded-start" alt="...">
             </div>
          </div>
       </div>
    </div>
 </div>
 <footer >
    <ul class="nav justify-content-center border-bottom  mb-3 text-center">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">   <img src="<?=base_url('assets/frontend/img/home.png')?>"> <br> Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">   <img src="<?=base_url('assets/frontend/img/start.png')?>"> <br> Premium</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">   <img src="<?=base_url('assets/frontend/img/serch.png')?>"> <br> Search</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">   <img src="<?=base_url('assets/frontend/img/Award.png')?>"> <br> Award</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">   <img src="<?=base_url('assets/frontend/img/Userss.png')?>"> <br> Profile</a></li>
    </ul>
 </footer>
</main>
<?php $this->load->view('small/frontend/footer'); ?>