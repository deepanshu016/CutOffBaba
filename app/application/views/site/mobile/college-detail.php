<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>College Details Page</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <body class="snnxbgs">
      <style>
         .faCCnvs{
         font-size: 25px;
         }
         .bgts{
         margin-top: 11px;
         margin-left: 15px;
         }
         .cNva{
         margin-bottom: 27px;
         margin-top: 5px;
         }
         .divcc{
         background: #fff;
         margin-top: 14px;
         border-radius: 3px;
         }
      </style>
      <main>
         <!-- <h4 class=" fw-bold text-start txtColorss"> <img src="img/rightarrow.png"> </h4>
            <h5 class="card-title barcCtxt">State wise colleges</h5> -->
         <section class="canvaCssss">
            <div class="container">
               <div class="row">
                  <div class="col-2">
                     <h4 class=" fw-bold text-start cNva"> <img src="img/rightarrow.png"> </h4>
                  </div>
                  <div class="col-8">
                     <h5 class="card-title bgts">State wise colleges</h5>
                  </div>
                  <div class="col-2">
                     <button class="canvaCss faCCnvs" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="fa fa-filter" aria-hidden="true"></i></button>
                  </div>
                  <div class="col-md-12">
                     <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                        <div class="row">
                           <div class="canvDiv">
                              <div class="col-3">
                                 <div class="offcanvas-header bg-light" >
                                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel"> </h5>
                                    <button type="button" class="btn-close u7OffCan" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                 </div>
                              </div>
                              <div class="col-9">
                                 <a class="reSet" href="#!">Reset</a>
                              </div>
                           </div>
                        </div>
                        <div class="offcanvas-body bg-light">
                           <div>
                           </div>
                           <div class="divmain ">
                              <div class="row">
                                 <div class="col-4 col5No">
                                    <div class="divcc">
                                       <h6 class="cssDegre">Degree <i class="fa fa-arrow-right" aria-hidden="true"></i>  </h6>
                                       <ul class="list-group list-group-flush">
                                          <li class="list-group-item  bgColcanv">  State</li>
                                          <li class="list-group-item  bgColcanv">  City</li>
                                          <li class="list-group-item  bgColcanv">  Study Mode</li>
                                          <li class="list-group-item  bgColcanv">  Specialization</li>
                                          <li class="list-group-item  bgColcanv">  Institute Type</li>
                                          <li class="list-group-item  bgColcanv">  Exam</li>
                                          <li class="list-group-item  bgColcanv">  Hostel</li>
                                          <li class="list-group-item  bgColcanv">  Fee Range</li>
                                          <li class="list-group-item  bgColcanv">  Facilities</li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="col-8  ">
                                    <ul class="list-group list-group-flush">
                                       <div class="input-group">
                                          <input type="text" class="form-control bhRdiu" placeholder="Search" aria-label="Dollar amount (with dot and two decimal places)">
                                          <span class="input-group-text bgt5s"> <i class="fa fa-search" aria-hidden="true"></i> </span> 
                                       </div>
                                       <li class="list-group-item  bstyCol">
                                          <div class="form-check">
                                             <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                             <label class="form-check-label" for="flexRadioDefault1">
                                             B.Tech(Bachelor of <br> Technology) (498)
                                             </label>
                                          </div>
                                       </li>
                                       <li class="list-group-item  bstyCol">
                                          <div class="form-check">
                                             <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                             <label class="form-check-label" for="flexRadioDefault2">
                                             Diploma (498)
                                             </label>
                                          </div>
                                       </li>
                                       <li class="list-group-item  bstyCol">
                                          <div class="form-check">
                                             <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                                             <label class="form-check-label" for="flexRadioDefault3">
                                             M.Tech(Master of <br> Technology) (498)
                                             </label>
                                          </div>
                                       </li>
                                       <li class="list-group-item  bstyCol">
                                          <div class="form-check">
                                             <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                                             <label class="form-check-label" for="flexRadioDefault4">
                                             B.Arch(Bachelor of <br> Atchitecture) (498)
                                             </label>
                                          </div>
                                       </li>
                                       <li class="list-group-item  bstyCol">
                                          <div class="form-check">
                                             <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault5">
                                             <label class="form-check-label" for="flexRadioDefault5">
                                             Ph.D.(Doctor of <br> Philosophy) (498)
                                             </label>
                                          </div>
                                       </li>
                                       <li class="list-group-item  bstyCol">
                                          <div class="form-check">
                                             <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault6">
                                             <label class="form-check-label" for="flexRadioDefault6">
                                             Post Graduate Diploma (498) 
                                             </label>
                                          </div>
                                       </li>
                                       <li class="list-group-item  bstyCol">
                                          <div class="form-check">
                                             <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault7">
                                             <label class="form-check-label" for="flexRadioDefault7">
                                             Certificate (498)
                                             </label>
                                          </div>
                                       </li>
                                       <li class="list-group-item  bstyCol">
                                          <div class="form-check">
                                             <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault8">
                                             <label class="form-check-label" for="flexRadioDefault8">
                                             M. Arch.(Master of <br> Architecture) (498)
                                             </label>
                                          </div>
                                       </li>
                                       <li class="list-group-item  bstyCol">
                                          <div class="form-check">
                                             <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault9">
                                             <label class="form-check-label" for="flexRadioDefault9">
                                             B.Tech + M.B.A (498)
                                             </label>
                                          </div>
                                       </li>
                                       <li class="list-group-item  bstyCol">
                                          <div class="form-check">
                                             <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault10">
                                             <label class="form-check-label" for="flexRadioDefault10">
                                             M.Plan. (Master of Planning) (498)
                                             </label>
                                          </div>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         </div>
         <section >
            <div>
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-12 elInpa">
                        <h4 class="text-center"><strong>Top Engineering Colleges In Karnataka 2024</strong></h4>
                        <p class="text-center">Ut enim ad minima veniam, quis ullam suscipit exercitationem ullam corporis suscipit lorem.</p>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section>
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="pt-3 pt-md-5 px-md-5 text-center overflow-hidden">
                        <div class="card shaDo mb-3" style="max-width: 540px;">
                           <div class="row g-0">
                              <div class="col-3 col">
                                 <img src="img/iuid.png" class="img-fluid ins5t rounded-start" alt="...">
                              </div>
                              <div class="col-9 col">
                                 <div class="card-body nopad">
                                    <h5 class="card-title jainTxt">Jai Bharath College of Management & Engineering Technology</h5>
                                    <p class="card-text"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> 1994  &nbsp;  <i class="fa fa-map-marker" aria-hidden="true"></i> Bengaluru, Karnataka </p>
                                 </div>
                              </div>
                              <div class="row g-0 xButton">
                                 <div class="col-6">
                                    <a class="btn downFrees" href="#!">Download Brochure</a> 
                                 </div>
                                 <div class="col-6">
                                    <a class="btn downFrees" href="#!">Fee Structure</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="pt-md-5 px-md-5 text-center overflow-hidden">
                        <div class="card shaDo mb-3" style="max-width: 540px;">
                           <div class="row g-0">
                              <div class="col-3 col">
                                 <img src="img/iuid.png" class="img-fluid ins5t rounded-start" alt="...">
                              </div>
                              <div class="col-9 col">
                                 <div class="card-body nopad">
                                    <h5 class="card-title jainTxt">Jai Bharath College of Management & Engineering Technology</h5>
                                    <p class="card-text"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> 1994  &nbsp;  <i class="fa fa-map-marker" aria-hidden="true"></i> Bengaluru, Karnataka </p>
                                 </div>
                              </div>
                              <div class="row g-0 xButton">
                                 <div class="col-6">
                                    <a class="btn downFrees" href="#!">Download Brochure</a> 
                                 </div>
                                 <div class="col-6">
                                    <a class="btn downFrees" href="#!">Fee Structure</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="pt-md-5 px-md-5 text-center overflow-hidden">
                        <div class="card shaDo mb-3" style="max-width: 540px;">
                           <div class="row g-0">
                              <div class="col-3 col">
                                 <img src="img/iuid.png" class="img-fluid ins5t rounded-start" alt="...">
                              </div>
                              <div class="col-9 col">
                                 <div class="card-body nopad">
                                    <h5 class="card-title jainTxt">Jai Bharath College of Management & Engineering Technology</h5>
                                    <p class="card-text"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> 1994  &nbsp;  <i class="fa fa-map-marker" aria-hidden="true"></i> Bengaluru, Karnataka </p>
                                 </div>
                              </div>
                              <div class="row g-0 xButton">
                                 <div class="col-6">
                                    <a class="btn downFrees" href="#!">Download Brochure</a> 
                                 </div>
                                 <div class="col-6">
                                    <a class="btn downFrees" href="#!">Fee Structure</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="pt-md-5 px-md-5 text-center overflow-hidden">
                        <div class="card shaDo mb-3" style="max-width: 540px;">
                           <div class="row g-0">
                              <div class="col-3 col">
                                 <img src="img/iuid.png" class="img-fluid ins5t rounded-start" alt="...">
                              </div>
                              <div class="col-9 col">
                                 <div class="card-body nopad">
                                    <h5 class="card-title jainTxt">Jai Bharath College of Management & Engineering Technology</h5>
                                    <p class="card-text"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> 1994  &nbsp;  <i class="fa fa-map-marker" aria-hidden="true"></i> Bengaluru, Karnataka </p>
                                 </div>
                              </div>
                              <div class="row g-0 xButton">
                                 <div class="col-6">
                                    <a class="btn downFrees" href="#!">Download Brochure</a> 
                                 </div>
                                 <div class="col-6">
                                    <a class="btn downFrees" href="#!">Fee Structure</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="pt-md-5 px-md-5 text-center overflow-hidden">
                        <div class="card shaDo mb-3" style="max-width: 540px;">
                           <div class="row g-0">
                              <div class="col-3 col">
                                 <img src="img/iuid.png" class="img-fluid ins5t rounded-start" alt="...">
                              </div>
                              <div class="col-9 col">
                                 <div class="card-body nopad">
                                    <h5 class="card-title jainTxt">Jai Bharath College of Management & Engineering Technology</h5>
                                    <p class="card-text"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> 1994  &nbsp;  <i class="fa fa-map-marker" aria-hidden="true"></i> Bengaluru, Karnataka </p>
                                 </div>
                              </div>
                              <div class="row g-0 xButton">
                                 <div class="col-6">
                                    <a class="btn downFrees" href="#!">Download Brochure</a> 
                                 </div>
                                 <div class="col-6">
                                    <a class="btn downFrees" href="#!">Fee Structure</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="pt-md-5 px-md-5 text-center overflow-hidden">
                        <div class="card shaDo mb-3" style="max-width: 540px;">
                           <div class="row g-0">
                              <div class="col-3 col">
                                 <img src="img/iuid.png" class="img-fluid ins5t rounded-start" alt="...">
                              </div>
                              <div class="col-9 col">
                                 <div class="card-body nopad">
                                    <h5 class="card-title jainTxt">Jai Bharath College of Management & Engineering Technology</h5>
                                    <p class="card-text"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> 1994  &nbsp;  <i class="fa fa-map-marker" aria-hidden="true"></i> Bengaluru, Karnataka </p>
                                 </div>
                              </div>
                              <div class="row g-0 xButton">
                                 <div class="col-6">
                                    <a class="btn downFrees" href="#!">Download Brochure</a> 
                                 </div>
                                 <div class="col-6">
                                    <a class="btn downFrees" href="#!">Fee Structure</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="pt-md-5 px-md-5 text-center overflow-hidden">
                        <div class="card shaDo mb-3" style="max-width: 540px;">
                           <div class="row g-0">
                              <div class="col-3 col">
                                 <img src="img/iuid.png" class="img-fluid ins5t rounded-start" alt="...">
                              </div>
                              <div class="col-9 col">
                                 <div class="card-body nopad">
                                    <h5 class="card-title jainTxt">Jai Bharath College of Management & Engineering Technology</h5>
                                    <p class="card-text"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> 1994  &nbsp;  <i class="fa fa-map-marker" aria-hidden="true"></i> Bengaluru, Karnataka </p>
                                 </div>
                              </div>
                              <div class="row g-0 xButton">
                                 <div class="col-6">
                                    <a class="btn downFrees" href="#!">Download Brochure</a> 
                                 </div>
                                 <div class="col-6">
                                    <a class="btn downFrees" href="#!">Fee Structure</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
 
                  </div>
               </div>
            </div>
         </section>
         <footer >
            <ul class="nav justify-content-center border-bottom  mb-3 text-center">
               <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">   <img src="img/home.png"> <br> Home</a></li>
               <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">   <img src="img/start.png"> <br> Premium</a></li>
               <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">   <img src="img/serch.png"> <br> Search</a></li>
               <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">   <img src="img/Award.png"> <br> Award</a></li>
               <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">   <img src="img/Userss.png"> <br> Profile</a></li>
            </ul>
         </footer>
      </main>
      <script src="js/bootstrap.bundle.min.js"></script>
   </body>
</html>