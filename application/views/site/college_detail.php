<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Branch & Seats</title>
      <link href="<?=base_url('assets/site/css/bootstrap.min.css')?>" rel="stylesheet">
      <link href="<?=base_url('assets/site/css/style.css')?>" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css"> 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <body class="bg-white">
      <main>
         <div class="position-relative overflow-hidden p-md-5 m-md-3 text-center bg-light">
            <div class="col-md-5 p-lg-5 p-3 mx-auto ">
               <h4 class=" fw-bold text-start txtColorss"> <img src="<?=base_url('assets/site/img/rightarrow.png')?>"> </h4>
               <h5 class="card-title barcCtxt">Branch & Seats</h5>
            </div>
         </div>
         </div>
         <section >
            <div class="collgeTx">
               <div class="container">
                  <div class="row">
                     <div class="col-12 ">
                        <div class="lc-block bgfosb">
                           <div class="d-flex px-1">
                              <div>
                                 <img class="sf9js" src="<?=base_url('assets/site/img/logocollege.png')?>" alt="">
                              </div>
                              <div class="lc-block ps-2">
                                 <div editable="rich">
                                    <h3 class="h6 "><strong><?= $collegeData['full_name']; ?></strong><br></h3>
                                    <img class="bsnXs" src="<?=base_url('assets/site/img/locations.png')?>" alt=""> <span class="loPts"><?= @$collegeData['city_name'].', '; ?> <?= @$collegeData['state_name'].', '; ?>, <?= @$collegeData['country_name']; ?></span>  <br/>
                                    <img class="bsnXs" src="<?=base_url('assets/site/img/emailsss.png')?>" alt=""> <span class="loPts"><?= @$collegeData['email']; ?></span> <br>  <img class="bsnXs" src="<?=base_url('assets/site/img/website.png')?>" alt=""> <span class="loPts"> <?= @$collegeData['website']; ?> </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php 
                     $genderAccepted = explode(',', $collegeData['gender_accepted']);
                     $genderData = $this->db->select('gender')->from('tbl_gender')->where_in('id',$genderAccepted)->get()->result_array();
                     $genderData = (!empty($genderData)) ?  implode('/',array_column($genderData,'gender')): [];
                  ?>
                  <div class="row">
                     <div class="col-12">
                        <div class="maiPoint"> <img src="<?=base_url('assets/site/img/sign1.png')?>" alt=""> <span class="apnsFonts"><?= @$collegeData['popular_name_one']; ?></span>
                           <img src="<?=base_url('assets/site/img/sign1.png')?>" alt=""> <span class="apnsFonts">Alternate</span>
                           <img src="<?=base_url('assets/site/img/estd.png')?>" alt=""> <span class="apnsFonts">Estd.<?= @date('Y',strtotime($collegeData['establishment'])); ?></span>
                           <img src="<?=base_url('assets/site/img/patsh.png')?>" alt=""> <span class="apnsFonts">AKU, Patna</span>
                           <img src="<?=base_url('assets/site/img/mci.png')?>" alt=""> <span class="apnsFonts"><?= @$collegeData['approval']; ?> Approved</span>
                           <img src="<?=base_url('assets/site/img/yess.png')?>" alt=""> <span class="apnsFonts">Yes</span>
                           <img src="<?=base_url('assets/site/img/mals.png')?>" alt=""> <span class="apnsFonts"><?= @$genderData; ?></span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section>
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="scrollmenu " id="pills-tab" role="tablist">
                        <a class="active text-primary" href="#home" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Info</a>
                        <a href="#news" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Course & Seats</a>
                        <a href="#contact" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Courses & CutOff</a>
                        <a href="#about" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false">Courses & Fee</a>
                        <a href="#support" id="pills-hopspital-tab" data-bs-toggle="pill" data-bs-target="#pills-hopspital" type="button" role="tab" aria-controls="pills-hopspital" aria-selected="false">Hospital Details</a>
                        <a href="#blog" id="pills-college-tab" data-bs-toggle="pill" data-bs-target="#pills-college" type="button" role="tab" aria-controls="pills-college" aria-selected="false">College Reviews</a>
                        <a href="#tools" id="pills-gallery-tab" data-bs-toggle="pill" data-bs-target="#pills-gallery" type="button" role="tab" aria-controls="pills-gallery" aria-selected="false">College Gallery</a>  
                        <a href="#base" id="pills-deta-tab" data-bs-toggle="pill" data-bs-target="#pills-deta" type="button" role="tab" aria-controls="pills-deta" aria-selected="false">College Cont. Deta</a>
                        <a href="#custom" id="pills-paid-tab" data-bs-toggle="pill" data-bs-target="#pills-paid" type="button" role="tab" aria-controls="pills-paid" aria-selected="false">Paid Counselling</a>
                        <a href="#more" id="pills-adverTise-tab" data-bs-toggle="pill" data-bs-target="#pills-adverTise" type="button" role="tab" aria-controls="pills-adverTise" aria-selected="false">Advertise</a>
                        <a href="#logo" id="pills-counselling-tab" data-bs-toggle="pill" data-bs-target="#pills-counselling" type="button" role="tab" aria-controls="pills-counselling" aria-selected="false">Counselling</a>
                        <a href="#friends" id="pills-simi-tab" data-bs-toggle="pill" data-bs-target="#pills-simi" type="button" role="tab" aria-controls="pills-simi" aria-selected="false">Top/Simi Col</a> 
                     </div>
                     <div class="tab-content tsyTops" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                           <h4>About The College</h4>
                           <p>PMCH Patna is one of the oldest medical schools in the country and is featured among Top Medical Colleges in India. PMC is popularly known for its MBBS program admissions to which are granted on the basis of candidate’s merit in NEET-UG entrance exam. Candidates in order to be eligible for MBBS at PMC must also have passed 10+2 with PCB as compulsory subjects</p>
                           <div class="text-center">
                              <a  href="#!" class="text-decoration-none txtDdf">View all details</a>
                           </div>
                        </div>
                        <div class="tab-pane fade " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                           <div class="input-group mb-3">
                              <span class="input-group-text appendCXCss raformsss" id="basic-addon1"> <img class="img-fluid useHsih" src="<?=base_url('assets/site/img/colls.png')?>" alt=""> </span>
                              <select class="form-control raformsss"  name="" id="">
                                 <option value="">Select College</option>
                              </select>
                           </div>
                           <div class="input-group mb-3">
                              <span class="input-group-text appendCXCss raformsss" id="basic-addon1"> <img class="img-fluid useHsih" src="<?=base_url('assets/site/img/coou.png')?>" alt=""> </span>
                              <select class="form-control raformsss"  name="" id="">
                                 <option value="">Select Courses</option>
                              </select>
                           </div>
                           <h5 class="cnTxtcou">Course & Seats</h5>
                           <div class="table-responsive">
                              <table class="table table-bordered ">
                                 <thead class="trgBgs">
                                    <tr>
                                       <th scope="col">Stream</th>
                                       <th scope="col">Deg. Type</th>
                                       <th scope="col">Course</th>
                                       <th scope="col">Branch</th>
                                       <th scope="col">Seats</th>
                                       <th scope="col">Estd.</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>Stream1</td>
                                       <td>U.G</td>
                                       <td>MBBS</td>
                                       <td>Branch1</td>
                                       <td>115</td>
                                       <td>1895</td>
                                    </tr>
                                    <tr>
                                       <td class="bgColosmn" colspan="3"> </td>
                                       <td>Branch2</td>
                                       <td>84</td>
                                       <td class="bgColosmn" colspan="1"> </td>
                                    </tr>
                                    <tr>
                                       <td>Stream2</td>
                                       <td>Deg. Type</td>
                                       <td>Course</td>
                                       <td>Branch</td>
                                       <td>99</td>
                                       <td>1994</td>
                                    </tr>
                                    <tr>
                                       <td>Stream3</td>
                                       <td>Deg. Type</td>
                                       <td>Course</td>
                                       <td>Branch</td>
                                       <td>111</td>
                                       <td>2000</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <br>
                           <div class="text-center">
                              <a  href="#!" class="text-decoration-none txtDdf">View all details</a>
                           </div>
                        </div>
                        <div class="tab-pane fade " id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                        <div class="row">
                              <div class="input-group mb-3 col">
                                 <span class="input-group-text appendCXCss raformsss" id="basic-addon1"> <img class="img-fluid useHsih" src="<?=base_url('assets/site/img/colls.png')?>" alt=""> </span>
                                 <select class="form-control raformsss"  name="" id="">
                                    <option value="">Select Degree Type</option>
                                 </select>
                              </div>
                              <div class="input-group mb-3 col">
                                 <span class="input-group-text appendCXCss raformsss" id="basic-addon1"> <img class="img-fluid useHsih" src="<?=base_url('assets/site/img/coou.png')?>" alt=""> </span>
                                 <select class="form-control raformsss"  name="" id="">
                                    <option value="">Select Courses</option>
                                 </select>
                              </div>
                           </div>
                           <h5 class="cnTxtcou">Course & Fee</h5>
                           <div class="table-responsive">
                              <table class="table table-bordered ">
                                 <thead class="trgBgs">
                                    <tr>
                                       <th scope="col">Stream</th>
                                       <th scope="col">Deg_Type</th>
                                       <th scope="col">Course</th>
                                       <th scope="col">Branch</th>
                                       <th scope="col">Seats</th>
                                       <th scope="col">Estd.</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>Stream1</td>
                                       <td>U.G</td>
                                       <td>MBBS</td>
                                       <td>Branch1</td>
                                       <td>115</td>
                                       <td>1895</td>
                                    </tr>
                                    <tr>
                                       <td class="bgColosmn" colspan="3"> </td>
                                       <td>Branch2</td>
                                       <td>84</td>
                                       <td class="bgColosmn" colspan="1"> </td>
                                    </tr>
                                    <tr>
                                       <td>Stream2</td>
                                       <td>Deg. Type</td>
                                       <td>Course</td>
                                       <td>Branch</td>
                                       <td>99</td>
                                       <td>1994</td>
                                    </tr>
                                    <tr>
                                       <td>Stream3</td>
                                       <td>Deg. Type</td>
                                       <td>Course</td>
                                       <td>Branch</td>
                                       <td>111</td>
                                       <td>2000</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <br>
                           <div class="text-center">
                              <a  href="#!" class="text-decoration-none txtDdf">View all details</a>
                           </div>
                        </div>
                        <div class="tab-pane fade " id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">
                           <div class="row">
                              <div class="input-group mb-3 col">
                                 <span class="input-group-text appendCXCss raformsss" id="basic-addon1"> <img class="img-fluid useHsih" src="<?=base_url('assets/site/img/colls.png')?>" alt=""> </span>
                                 <select class="form-control raformsss"  name="" id="">
                                    <option value="">Select Degree Type</option>
                                 </select>
                              </div>
                              <div class="input-group mb-3 col">
                                 <span class="input-group-text appendCXCss raformsss" id="basic-addon1"> <img class="img-fluid useHsih" src="<?=base_url('assets/site/img/coou.png')?>" alt=""> </span>
                                 <select class="form-control raformsss"  name="" id="">
                                    <option value="">Select Courses</option>
                                 </select>
                              </div>
                           </div>
                           <h5 class="cnTxtcou">Course & Fee</h5>
                           <div class="table-responsive">
                              <table class="table table-bordered ">
                                 <thead class="trgBgs">
                                    <tr>
                                       <th scope="col">Stream</th>
                                       <th scope="col">Deg_Type</th>
                                       <th scope="col">Course</th>
                                       <th scope="col">Branch</th>
                                       <th scope="col">Seats</th>
                                       <th scope="col">Estd.</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>Stream1</td>
                                       <td>U.G</td>
                                       <td>MBBS</td>
                                       <td>Branch1</td>
                                       <td>115</td>
                                       <td>1895</td>
                                    </tr>
                                    <tr>
                                       <td class="bgColosmn" colspan="3"> </td>
                                       <td>Branch2</td>
                                       <td>84</td>
                                       <td class="bgColosmn" colspan="1"> </td>
                                    </tr>
                                    <tr>
                                       <td>Stream2</td>
                                       <td>Deg. Type</td>
                                       <td>Course</td>
                                       <td>Branch</td>
                                       <td>99</td>
                                       <td>1994</td>
                                    </tr>
                                    <tr>
                                       <td>Stream3</td>
                                       <td>Deg. Type</td>
                                       <td>Course</td>
                                       <td>Branch</td>
                                       <td>111</td>
                                       <td>2000</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <br>
                           <div class="text-center">
                              <a  href="#!" class="text-decoration-none txtDdf">View all details</a>
                           </div>
                        </div>
                        <div class="tab-pane fade " id="pills-hopspital" role="tabpanel" aria-labelledby="pills-hopspital-tab" tabindex="0">
                           <h5 class="clinkTxt">Clinical Details</h5>
                           <div class="container">
                              <div class="row ">
                                 <div class="col col-md-2">
                                    <div class="CustoScollShet" >
                                       <img src="<?=base_url('assets/site/img/bedllust.png')?>" class="card-img-top resPis" alt="..."> 
                                    </div>
                                    <div class="besdTxt">
                                       <h5 class="card-title toptaTx">Total Bed</h5>
                                    </div>
                                 </div>

                                 <div class="col col-md-2 ">
                                    <div class="CustoScollShet" >
                                       <img src="<?=base_url('assets/site/img/inpatientillust.png')?>" class="card-img-top resPis" alt="..."> 
                                    </div>
                                    <div class="besdTxt">
                                       <h5 class="card-title toptaTx">Out Patient</h5>
                                    </div>
                                 </div>
                                 <div class="col col-md-2">
                                    <div class="CustoScollShet" >
                                       <img src="<?=base_url('assets/site/img/papap.png')?>" class="card-img-top resPis" alt="..."> 
                                    </div>
                                    <div class="besdTxt">
                                       <h5 class="card-title toptaTx">Out Patient</h5>
                                    </div>
                                 </div>
                                 <div class="col col-md-2">
                                    <div class="CustoScollShet" >
                                       <img src="<?=base_url('assets/site/img/Breastfeeding.png')?>" class="card-img-top resPis" alt="..."> 
                                    </div>
                                    <div class="besdTxt">
                                       <h5 class="card-title toptaTx">Out Patient</h5>
                                    </div>
                                 </div>
                                 <div class="col col-md-2">
                                    <div class="CustoScollShet" >
                                       <img src="<?=base_url('assets/site/img/deathllust.png')?>" class="card-img-top resPis" alt="..."> 
                                    </div>
                                    <div class="besdTxt">
                                       <h5 class="card-title toptaTx">Born</h5>
                                    </div>
                                 </div>
                                 <div class="col col-md-2">
                                    <div class="CustoScollShet" >
                                       <img src="<?=base_url('assets/site/img/BORillust.png')?>" class="card-img-top resPis" alt="..."> 
                                    </div>
                                    <div class="besdTxt">
                                       <h5 class="card-title toptaTx">Death</h5>
                                    </div>
                                 </div>




                              </div>
                           </div>

                           <h5 class="clinkTxt">Clinical Details</h5>
                           <div class="container">
                              <div class="row ">
                                 <div class="col col-md-2">
                                    <div class="CustoScollShet" >
                                       <img src="<?=base_url('assets/site/img/bedllust.png')?>" class="card-img-top resPis" alt="..."> 
                                    </div>
                                    <div class="besdTxt">
                                       <h5 class="card-title toptaTx">Total Bed</h5>
                                    </div>
                                 </div>

                                 <div class="col col-md-2 ">
                                    <div class="CustoScollShet" >
                                       <img src="<?=base_url('assets/site/img/inpatientillust.png')?>" class="card-img-top resPis" alt="..."> 
                                    </div>
                                    <div class="besdTxt">
                                       <h5 class="card-title toptaTx">Out Patient</h5>
                                    </div>
                                 </div>
                                 <div class="col col-md-2">
                                    <div class="CustoScollShet" >
                                       <img src="<?=base_url('assets/site/img/papap.png')?>" class="card-img-top resPis" alt="..."> 
                                    </div>
                                    <div class="besdTxt">
                                       <h5 class="card-title toptaTx">Out Patient</h5>
                                    </div>
                                 </div>
                                 <div class="col col-md-2">
                                    <div class="CustoScollShet" >
                                       <img src="<?=base_url('assets/site/img/Breastfeeding.png')?>" class="card-img-top resPis" alt="..."> 
                                    </div>
                                    <div class="besdTxt">
                                       <h5 class="card-title toptaTx">Out Patient</h5>
                                    </div>
                                 </div>
                                 <div class="col col-md-2">
                                    <div class="CustoScollShet" >
                                       <img src="<?=base_url('assets/site/img/deathllust.png')?>" class="card-img-top resPis" alt="..."> 
                                    </div>
                                    <div class="besdTxt">
                                       <h5 class="card-title toptaTx">Born</h5>
                                    </div>
                                 </div>
                                 <div class="col col-md-2">
                                    <div class="CustoScollShet" >
                                       <img src="<?=base_url('assets/site/img/BORillust.png')?>" class="card-img-top resPis" alt="..."> 
                                    </div>
                                    <div class="besdTxt">
                                       <h5 class="card-title toptaTx">Death</h5>
                                    </div>
                                 </div>




                              </div>
                           </div>


                        </div>
                        <div class="tab-pane fade " id="pills-college" role="tabpanel" aria-labelledby="pills-college-tab" tabindex="0">

                        <h5 class="clinkTxt">Review & Rating</h5>

                         
  
    
                              <div class="container">
                                  
                                 <div class="row">
                                    <div class="col-md-6 py-4">
                                       <div class="lc-block"><img alt="" class="rounded-circle float-start me-4" src="https://images.unsplash.com/photo-1574698550747-3f839e813107?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=772&amp;q=80" style="width:10vh;" loading="lazy">
                                          <div editable="rich">
                                             <h5><strong>Sahil SIngh</strong></h5>
                                          </div>

                                          <small editable="inline" class="text-secondary" style="letter-spacing:1px">AIEEE Mentee</small>

                                          <div editable="rich">
                                             <p>  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo con</p>
                                          </div>
                                       </div>

                                       <div class="lc-block float-start ">

                                          <a class="text-dark text-decoration-none reviCdss" href="#!"> <i class="fa fa-thumbs-up" aria-hidden="true"></i> </a>
                                          <a class="text-dark text-decoration-none reviCdss" href="#!"> <i class="fa fa-thumbs-down" aria-hidden="true"></i> </a>
                                          <a class="text-dark text-decoration-none reviCdss" href="#!"> <i class="fa fa-share" aria-hidden="true"></i> </a>
                                          <a class="text-dark text-decoration-none reviCdss" href="#!"> Reply </a>
                                       </div>
                                    </div>
                                     
                                 </div>

                                 <div class="row">
                                    <div class="col-md-6 py-4">
                                       <div class="lc-block"><img alt="" class="rounded-circle float-start me-4" src="https://images.unsplash.com/photo-1574698550747-3f839e813107?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=772&amp;q=80" style="width:10vh;" loading="lazy">
                                          <div editable="rich">
                                             <h5><strong>Sahil SIngh</strong></h5>
                                          </div>

                                          <small editable="inline" class="text-secondary" style="letter-spacing:1px">AIEEE Mentee</small>

                                          <div editable="rich">
                                             <p>  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo con</p>
                                          </div>
                                       </div>

                                       <div class="lc-block float-start ">

                                          <a class="text-dark text-decoration-none reviCdss" href="#!"> <i class="fa fa-thumbs-up" aria-hidden="true"></i> </a>
                                          <a class="text-dark text-decoration-none reviCdss" href="#!"> <i class="fa fa-thumbs-down" aria-hidden="true"></i> </a>
                                          <a class="text-dark text-decoration-none reviCdss" href="#!"> <i class="fa fa-share" aria-hidden="true"></i> </a>
                                          <a class="text-dark text-decoration-none reviCdss" href="#!"> Reply </a>
                                       </div>
                                    </div>
                                     
                                 </div>

                                 <div class="row">
                                    <div class="col-md-6 py-4">
                                       <div class="lc-block"><img alt="" class="rounded-circle float-start me-4" src="https://images.unsplash.com/photo-1574698550747-3f839e813107?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=772&amp;q=80" style="width:10vh;" loading="lazy">
                                          <div editable="rich">
                                             <h5><strong>Sahil SIngh</strong></h5>
                                          </div>

                                          <small editable="inline" class="text-secondary" style="letter-spacing:1px">AIEEE Mentee</small>

                                          <div editable="rich">
                                             <p>  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo con</p>
                                          </div>
                                       </div>

                                       <div class="lc-block float-start ">

                                          <a class="text-dark text-decoration-none reviCdss" href="#!"> <i class="fa fa-thumbs-up" aria-hidden="true"></i> </a>
                                          <a class="text-dark text-decoration-none reviCdss" href="#!"> <i class="fa fa-thumbs-down" aria-hidden="true"></i> </a>
                                          <a class="text-dark text-decoration-none reviCdss" href="#!"> <i class="fa fa-share" aria-hidden="true"></i> </a>
                                          <a class="text-dark text-decoration-none reviCdss" href="#!"> Reply </a>
                                       </div>
                                    </div>
                                     
                                 </div>

                                 <div class="row">  
                                    <div class="col-md-12">
                                    <h5 class="clinkTxt">Comment</h5>
                                    <div class="mb-3"> 
                                     <textarea name="" id="" cols="10" rows="5" class="form-control" placeholder="Write your message"></textarea>
                                      </div>

                                      <h5 class="clinkTxt">How likely are you to......</h5>
                                      <div class="starRating">
                                        <a class="startDex" href="#!"> <i class="fa fa-star"></i> </a>
                                        <a class="startDex" href="#!"> <i class="fa fa-star"></i> </a>
                                        <a class="startDex" href="#!"> <i class="fa fa-star"></i> </a>
                                        <a class="startDex" href="#!"> <i class="fa fa-star"></i> </a>
                                        <a class="startDex" href="#!"> <i class="fa fa-star-half"></i> </a>
                                    </div>


                                    </div>
                                    <br>
                                    <button class="w-100 btn btn-primary p6t">Submit</button>

                                 </div>
                                 


                              </div>
                              
                              
                              



                        </div>
                        <div class="tab-pane fade " id="pills-gallery" role="tabpanel" aria-labelledby="pills-gallery-tab" tabindex="0">

                        <h5 class="clinkTxt">College Building</h5>

                        
                     <div class="photo-gallery">
                        <div class="container">
                              
                              <div class="row photos">
                                 <div class="col-sm-6 col-md-4 col-lg-3 col item"><a href="<?=base_url('assets/site/img/coll1.png')?>" data-lightbox="photos"><img class="img-fluid" src="<?=base_url('assets/site/img/coll1.png')?>"></a></div>
                                 <div class="col-sm-6 col-md-4 col-lg-3 col item"><a href="<?=base_url('assets/site/img/coll2.png')?>" data-lightbox="photos"><img class="img-fluid" src="<?=base_url('assets/site/img/coll2.png')?>"></a></div>
                              </div>
                              <div class="row photos">
                                 <div class="col-sm-6 col-md-4 col-lg-3 col item"><a href="<?=base_url('assets/site/img/coll3.png')?>" data-lightbox="photos"><img class="img-fluid" src="<?=base_url('assets/site/img/coll3.png')?>"></a></div>
                                 <div class="col-sm-6 col-md-4 col-lg-3 col item"><a href="<?=base_url('assets/site/img/coll4.png')?>" data-lightbox="photos"><img class="img-fluid" src="<?=base_url('assets/site/img/coll4.png')?>"></a></div>
                              </div>
                        </div>
                     </div> 


                     <h5 class="clinkTxt">College Library</h5>

                        
                     <div class="photo-gallery">
                        <div class="container">
                              
                              <div class="row photos">
                                 <div class="col-sm-6 col-md-4 col-lg-3 col item"><a href="<?=base_url('assets/site/img/coll5.png')?>" data-lightbox="photos"><img class="img-fluid" src="<?=base_url('assets/site/img/coll5.png')?>"></a></div>
                                 <div class="col-sm-6 col-md-4 col-lg-3 col item"><a href="<?=base_url('assets/site/img/coll6.png')?>" data-lightbox="photos"><img class="img-fluid" src="<?=base_url('assets/site/img/coll6.png')?>"></a></div>
                              </div>
                              <div class="row photos">
                                 <div class="col-sm-6 col-md-4 col-lg-3 col item"><a href="<?=base_url('assets/site/img/coll7.png')?>" data-lightbox="photos"><img class="img-fluid" src="<?=base_url('assets/site/img/coll7.png')?>"></a></div>
                                 <div class="col-sm-6 col-md-4 col-lg-3 col item"><a href="<?=base_url('assets/site/img/uiis.png')?>" data-lightbox="photos"><img class="img-fluid" src="<?=base_url('assets/site/img/uiis.png')?>"></a></div>
                              </div>
                        </div>
                     </div> 

                     <h5 class="clinkTxt">College Events</h5>

                        
                        <div class="photo-gallery">
                           <div class="container">
                                 
                                 <div class="row photos">
                                    <div class="col-sm-6 col-md-4 col-lg-3 col item"><a href="<?=base_url('assets/site/img/evt1.png')?>" data-lightbox="photos"><img class="img-fluid" src="<?=base_url('assets/site/img/evt1.png')?>"></a></div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 col item"><a href="<?=base_url('assets/site/img/evt2.png')?>" data-lightbox="photos"><img class="img-fluid" src="<?=base_url('assets/site/img/evt2.png')?>"></a></div>
                                 </div>
                                 <div class="row photos">
                                    <div class="col-sm-6 col-md-4 col-lg-3 col item"><a href="<?=base_url('assets/site/img/evt3.png')?>" data-lightbox="photos"><img class="img-fluid" src="<?=base_url('assets/site/img/evt3.png')?>"></a></div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 col item"><a href="<?=base_url('assets/site/img/evt4.png')?>" data-lightbox="photos"><img class="img-fluid" src="<?=base_url('assets/site/img/evt4.png')?>"></a></div>
                                 </div>
                           </div>
                        </div> 


                        <h5 class="clinkTxt">College Activity</h5>

                        
                        <div class="photo-gallery">
                           <div class="container">
                                 
                                 <div class="row photos">
                                    <div class="col-sm-6 col-md-4 col-lg-3 col item"><a href="<?=base_url('assets/site/img/evt1.png')?>" data-lightbox="photos"><img class="img-fluid" src="<?=base_url('assets/site/img/evt1.png')?>"></a></div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 col item"><a href="<?=base_url('assets/site/img/evt2.png')?>" data-lightbox="photos"><img class="img-fluid" src="<?=base_url('assets/site/img/evt2.png')?>"></a></div>
                                 </div>
                                 <div class="row photos">
                                    <div class="col-sm-6 col-md-4 col-lg-3 col item"><a href="<?=base_url('assets/site/img/evt3.png')?>" data-lightbox="photos"><img class="img-fluid" src="<?=base_url('assets/site/img/evt3.png')?>"></a></div>
                                    <div class="col-sm-6 col-md-4 col-lg-3 col item"><a href="<?=base_url('assets/site/img/evt4.png')?>" data-lightbox="photos"><img class="img-fluid" src="<?=base_url('assets/site/img/evt4.png')?>"></a></div>
                                 </div>
                           </div>
                        </div> 
                        


                        </div>
                        <div class="tab-pane fade " id="pills-deta" role="tabpanel" aria-labelledby="pills-deta-tab" tabindex="0">

                        <h5 class="clinkTxt">College Details</h5> 

                        



                        <ul class="list-group list-group-flush">
                           
                        <li class="list-group-item"> <img src="<?=base_url('assets/site/img/mamps.png')?>" alt=""> Ashok Rajpath, Patna University Campus,Patna, Bihar, India - 800001</li>
                        <li class="list-group-item"> <img src="<?=base_url('assets/site/img/Phone.png')?>" alt=""> Admission Cell - 0612-2300343</li>
                        <li class="list-group-item"> <img src="<?=base_url('assets/site/img/Phone.png')?>" alt=""> Enquiry Cell - 0612-284443</li>
                        <li class="list-group-item"> </li> 
                        </ul>
                        

                        <div class="maos shadow">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3597.5184192849442!2d85.15581068885493!3d25.620914200000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ed58e59b047959%3A0x59dab447f5633075!2sPatna%20Medical%20College%20-%20PMC!5e0!3m2!1sen!2sin!4v1708429282015!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>





                        </div>
                        <div class="tab-pane fade " id="pills-paid" role="tabpanel" aria-labelledby="pills-paid-tab" tabindex="0">

                         
                        <img class="img-fluid" src="<?=base_url('assets/site/img/ddd.png')?>" alt="">
                        <br>
                        <br>
                        <h5 class="counTxt">Lorem ipsum dolor sit amet</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore  </p>
                        
                        <img class="img-fluid" src="<?=base_url('assets/site/img/ddd.png')?>" alt="">
                        <br>
                        <br>
                        <h5 class="counTxt">Lorem ipsum dolor sit amet</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore  </p>
                        <img class="img-fluid" src="<?=base_url('assets/site/img/ddd.png')?>" alt="">
                        <br>
                        <br>
                        <h5 class="counTxt">Lorem ipsum dolor sit amet</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore  </p>

                       
                        <div class="position-relative">
                     
                     <div class="swiper mySwiper-RANDOMID position-relative">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper  ">
                          
                           <div class="swiper-slide lc-block">
                              <div>
                                 <div class="lc-block card py-xl-6 border-0">
                                    <div class="d-flex flex-column justify-content-between">
                                    <img src="<?=base_url('assets/site/img/imsh.png')?>" alt="">
                                     <div class="mcidis">
                                     <h5 class="counTxt">Lorem ipsum dolor sit amet</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor Lorem ipsum.</p>
                                     </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="swiper-slide lc-block">
                           <div>
                                 <div class="lc-block card h-100 py-xl-6 border-0">
                                    <div class="d-flex flex-column justify-content-between">
                                    <img src="<?=base_url('assets/site/img/imsh.png')?>" alt="">
                                     <div class="mcidis">
                                     <h5 class="counTxt">Lorem ipsum dolor sit amet</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor Lorem ipsum.</p>
                                     </div>
                                    </div>
                                 </div>
                              </div>
                        </div>
                     </div>
                  </div>


                        </div>
                        <div class="tab-pane fade" id="pills-adverTise" role="tabpanel" aria-labelledby="pills-adverTise-tab" tabindex="0"> 

                           <div class="card card-body shadow bg-black">
                           <h2>Bg Red</h2>
                           </div>


                        </div>
                        <div class="tab-pane fade" id="pills-counselling" role="tabpanel" aria-labelledby="pills-counselling-tab" tabindex="0">counselling</div>
                        <div class="tab-pane fade" id="pills-simi" role="tabpanel" aria-labelledby="pills-simi-tab" tabindex="0">simi</div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <footer>
            <ul class="nav justify-content-center border-bottom  text-center">
                <li class="nav-item"><a href="<?= base_url('streams'); ?>" class="nav-link px-2 text-muted">   <img src="<?=base_url('assets/site/img/home.png')?>"> <br> Home</a></li>
                <li class="nav-item"><a href="<?= base_url('plan'); ?>" class="nav-link px-2 text-muted">   <img src="<?=base_url('assets/site/img/start.png')?>"> <br> Premium</a></li>
                <li class="nav-item"><a href="<?= base_url('search'); ?>" class="nav-link px-2 text-muted">   <img src="<?=base_url('assets/site/img/serch.png')?>"> <br> Search</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">   <img src="<?=base_url('assets/site/img/Award.png')?>"> <br> Award</a></li>
                <li class="nav-item"><a href="<?= base_url('profile'); ?>" class="nav-link px-2 text-muted">   <img src="<?=base_url('assets/site/img/Userss.png')?>"> <br> Profile</a></li>
            </ul>
        </footer>
      </main>
      <script src="<?=base_url('assets/site/js/bootstrap.bundle.min.js')?>"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
      <link rel="preload" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
      <!-- lazily load the Swiper JS file -->
      <script defer="defer" src="https://unpkg.com/swiper@8/swiper-bundle.min.js" onload="initializeSwiperRANDOMID();"></script>
      <!-- lc-needs-hard-refresh -->
      <script>
         function initializeSwiperRANDOMID(){
             // Launch SwiperJS  
             const swiper = new Swiper(".mySwiper-RANDOMID", {
                     slidesPerView: 1,
                     grabCursor: true,
                     spaceBetween: 30,
                     pagination: {
                         el: ".swiper-pagination",
                         clickable: true,
                     },
                     breakpoints: {
                     640: {
                         slidesPerView: 1,
                         spaceBetween: 20,
                     },
                     768: {
                         slidesPerView: 2,
                         spaceBetween: 30,
                     },
                     1024: {
                         slidesPerView: 3,
                         spaceBetween: 30,
                     },
                 },
             });
         }
      </script>
   </body>
</html>