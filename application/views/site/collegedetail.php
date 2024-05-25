<?php $this->load->view('site/header');?>
<main>
   <!-- <style type="text/css">
      .hero_in.restaurant_detail:before{background: url('') no-repeat;background-size: 100% 100%;background-position: center;}
      	</style> -->
   <div class="hero_in restaurant_detail" style="no-repeat;background-size: 100% 100%;background-position: center; background-image:url('<?=asset_url()."college/banner/".$collegeDetail['college_banner'];?>');">
      <div class="wrapper">
         <span class="magnific-gallery">
         </span>
      </div>
   </div>
   <!--/hero_in-->
   <section class="main_posyion d-none d-sm-block d-sm-none d-md-block">
      <div class="container">
         <div class="row">
            <div class="col-md-2">
               <img class="lofcss" src="<?=asset_url()."college/logo/".$collegeDetail['college_logo'];?>"> 
            </div>
            <div class="col-md-5">
               <h4 class="text-white"><?=$collegeDetail['full_name'];?> ( <?=$collegeDetail['short_name'];?> )</h4>
               <p class="leftsss"> <i class="fa fa-location-arrow" aria-hidden="true"></i> Amritsar, Punjab  <span> <i class="fa fa-star-o text-white" aria-hidden="true"></i> ESTD 1969 </span>  <span> <i class="fa fa-bookmark-o" aria-hidden="true"></i> Affiliated College : </span> of Baba Farid University of Health Sciences, Faridkot</p>
            </div>
            <div class="col-md-3"><a style="float: right;" href="<?=asset_url()."college/banner/".$collegeDetail['college_logo'];?>" class="btn btn-primary" title="Photo title" >Download Brouchure</a></div>
         </div>
      </div>
   </section>
   <nav class="secondary_nav sticky_horizontal_2">
      <div class="container">
         <ul class="clearfix d-flex scrollmenuss justify-content-between">
            <li><a href="#basic" class="active">Overviews</a></li>
            <li><a href="#fees">Courses & Fees</a></li>
            <li><a href="#seat_matrix">Seat Matrix</a></li>
            <li><a href="#rank">Cutoff & Rank</a></li>
            <li><a href="#placement">Placement</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#admission">Admission</a></li>
            <li><a href="#hospital">Hospital Details</a></li>
            <li><a href="#contacts">Contact Us</a></li>
            <li><a href="#reviews">Reviews</a></li>
         </ul>
      </div>
   </nav>
   <?php //echo '<pre>';print_r($collegeDetail); ?>
   <div class="container margin_60_35">
   <div class="row">
      <div class="col-lg-12">
         <section id="basic">
            <div class="row">
               <div class="col-md-9">
                  <div class="card card-body">
                     <div class="row">
                        <div class="col-md-12">
                           <h4 class="mainShorst">Short Information</h4>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-4 col-12">
                           <div class="form-group">
                              <div class="why-choose-box">
                                 <div class="icon">
                                    <img src="https://cutoffbaba.com/Icon/ownership.png">
                                 </div>
                                 <div class="content">
                                    <div class="sp-text-second"><b>Ownership</b></div>
                                    <div id="tdownership1" class="text-justify">Government</div>
                                    <input type="hidden" name="hfcollegeamt" id="hfcollegeamt" value="0">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-5 col-12">
                           <div class="form-group">
                              <div class="why-choose-box">
                                 <div class="icon">
                                    <img src="https://cutoffbaba.com/Icon/approved.png">
                                 </div>
                                 <div class="content">
                                    <div class="sp-text-second"><b>Approval</b></div>
                                    <div id="tdapproval">ECFMG (USA), NMC (Former MCI), WHO</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3 col-5">
                           <div class="form-group">
                              <div class="why-choose-box">
                                 <div class="icon">
                                    <img src="https://cutoffbaba.com/Icon/hostel.png">
                                 </div>
                                 <div class="content">
                                    <div class="sp-text-second"><b>Hostel</b></div>
                                    <div id="tdhostel" class="text-justify">Yes</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 col-7">
                           <div class="why-choose-box">
                              <div class="icon">
                                 <img src="https://cutoffbaba.com/Icon/toilets.png">
                              </div>
                              <div class="content">
                                 <div class="sp-text-second"><b>Gender Accepted</b></div>
                                 <div id="tdgender" class="text-justify">Male &amp; Female</div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-8 col-sm-12">
                           <div class="why-choose-box">
                              <div class="icon">
                                 <img src="https://cutoffbaba.com/Icon/university.png">
                              </div>
                              <div class="content">
                                 <div class="sp-text-second"><b>University</b></div>
                                 <div id="tdaffiliated" class="text-justify">West Bengal University of Health Sciences,Kolkata</div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row mt-4">
                        <div class="col-md-9">Popular Name:&nbsp; <b id="tdpopularname">Govt Medical College Burdwan</b></div>
                        <div class="col-md-3">Estd Year:&nbsp; <b id="tdestdyear">1969</b></div>
                        <div class="col-md-12">Course Offered:&nbsp; <b id="tdcourse">MBBS, PG Diploma, MD/MS, DM / M.Ch</b></div>
                        <div id="tdother1" class="col-md-6"></div>
                        <div id="tdother2" class="col-md-6"></div>
                     </div>

                     

                  </div>


                  <section class="card card-body">
                     <div class="row">
                        <h4 class="mainShorst">PB. Government Dental College And Hospital , AMRITSAR Highlights 2024</h4>
                        <p>PB. Government Dental College And Hospital , AMRITSAR has since established itself as a leading institution of higher learning in Amritsar, Punjab. With a focus on providing quality education, the institute presents a variety of PG and UG course options in full-time mode, which are approved by DCI. The institute's experienced faculty members are dedicated to imparting knowledge and skills in fields such as Medicine and Health Sciences, and more. The total seat intake for these courses is 68. The institute strives to make education accessible to all by setting the fee range at INR 320,000-375,000. At the PB. Government Dental College And Hospital , AMRITSAR, students can expect to receive a well-rounded education that prepares them for successful careers in their chosen fields. With a focus on affordability and accessibility, the institute provides a valuable education that is within reach of many students.</p>
                     </div>

                     <table class="table table-bordered">
                     <tbody>
                        <tr>
                           <th><font>Particulars</font></th>
                           <th><font>Statistics</font></th>
                        </tr>
                        <tr>
                           <td>Campus Location</td>
                           <td>Amritsar, Punjab</td>
                        </tr>
                        <tr>
                           <td>Courses Offered</td>
                           <td>PG and UG</td>
                        </tr>
                        <tr>
                           <td>No. of Seats</td>
                           <td>68</td>
                        </tr>
                        <tr>
                           <td>Median Salary</td>
                           <td>-</td>
                        </tr>
                        <tr>
                           <td>Fees Range</td>
                           <td>INR 320,000-375,000</td>
                        </tr>
                     </tbody>
                  </table>

                  </section>


                   <section class="card card-body">
                     <div class="row">
                        <h4 class="mainShorst">Seat Matrix</h4>
                        <table class="table table-bordered">
                           <tbody>
                              <tr>
                                 <td>
                                    <div>
                                       <span>Post Graduate</span>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div>
                                       <table class="table table-hover table-bordered">
                                          <tbody>
                                             <tr>
                                                <th>#</th>
                                                <th>Course</th>
                                                <th>Branch</th>
                                                <th>Seats</th>
                                                <th>Recognisation</th>
                                             </tr>
                                             <tr>
                                                <td>1</td>
                                                <td>MDS</td>
                                                <td>Conservative Dentistry &amp; Endodontics</td>
                                                <td>5</td>
                                                <td>Recognised</td>
                                             </tr>
                                             <tr>
                                                <td>2</td>
                                                <td>MDS</td>
                                                <td>Oral &amp; Maxillofacial Pathology and Oral Microbiology</td>
                                                <td>5</td>
                                                <td>Recognised</td>
                                             </tr>
                                             <tr>
                                                <td>3</td>
                                                <td>MDS</td>
                                                <td>Oral and Maxillofacial Surgery</td>
                                                <td>4</td>
                                                <td>Recognised</td>
                                             </tr>
                                             <tr>
                                                <td>4</td>
                                                <td>MDS</td>
                                                <td>Oral Medicine &amp; Radiology</td>
                                                <td>5</td>
                                                <td>Recognised</td>
                                             </tr>
                                             <tr>
                                                <td>5</td>
                                                <td>MDS</td>
                                                <td>Orthodonitics &amp; Dentofacial Orthopedics</td>
                                                <td>5</td>
                                                <td>Recognised</td>
                                             </tr>
                                             <tr>
                                                <td>6</td>
                                                <td>MDS</td>
                                                <td>Pediatric and Preventive Dentistry</td>
                                                <td>5</td>
                                                <td>Recognised</td>
                                             </tr>
                                             <tr>
                                                <td>7</td>
                                                <td>MDS</td>
                                                <td>Periodontology</td>
                                                <td>5</td>
                                                <td>Recognised</td>
                                             </tr>
                                             <tr>
                                                <td>8</td>
                                                <td>MDS</td>
                                                <td>Prosthodontics and Crown &amp; Bridge</td>
                                                <td>5</td>
                                                <td>Recognised</td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </section>


                  <section class="card card-body">
                     <div class="row">
                        <h4 class="mainShorst">Cutoff of Ahmedabad Dental College & Hospital, Gandhinagar</h4>

                        <h5 class="cnnyuc7us">Central Counselling Cutoff </h5> 
                        <a class=" btn-ddd" href="#!">VIEW CUTOFF</a>

                        <h5 class="cnnyuc7us"> State Counselling Cutoff </h5> 
                        <a class=" btn-ddd" href="#!">VIEW CUTOFF</a>

                     </div>
                  </section>

                  <section class="card card-body">
                     <div class="row">
                        <h4 class="mainShorst">Fees Structure of Ahmedabad Dental College & Hospital, Gandhinagar</h4>

                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th class="fcc1">Courses</th>
                                 <th class="fcc1">Tuition Fees</th>
                                 <th class="fcc1">Eligibility</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr class="">
                                 <td class="">
                                    <div>
                                       <a href="#!">BDS</a>
                                       <span class="_037f">
                                          ( 1  course )
                                       </span>
                                    </div>
                                 </td>
                                 <td class="">
                                    <div class="c390"> 3.2 L</div>
                                 </td>
                                 <td class="">
                                    <div class="_5ffb">
                                       <div>
                                          <span>10+2 : </span>
                                          <span>
                                             50 %
                                          </span>
                                       </div>
                                       <span>
                                          <div><span>Exams : </span><span class="c229"><a href="#!">NEET</a><a href="#!">Punjab NEET</a></span></div>
                                       </span>
                                    </div>
                                 </td>
                              </tr>
                              <tr class="">
                                 <td class="">
                                    <div>
                                       <a class="_69c7 ripple dark" uilpwidgetname="acp_section_fees_and_eligibility" widgetspecificlabel="MDS" href="/college/pb-government-dental-college-and-hospital-amritsar-62807/courses/mds-bc">MDS</a>
                                       <span class="_037f">
                                          (<!-- -->5<!-- --> courses<!-- -->)
                                       </span>
                                    </div>
                                 </td>
                                 <td class="">
                                    <div class="c390"> 3.8 L</div>
                                 </td>
                                 <td class="">
                                    <div class="_5ffb">
                                       <span>
                                          <div><span>Exams : </span><span class="c229"><a href="#!">NEET MDS</a><a href="#!">Punjab NEET PG</a></span></div>
                                       </span>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>

                     </div>
                  </section>

                   <section class="card card-body rs-counter">
                     <div class="row">
                        <h4 class="mainShorst">Hospital Details</h4>
                        <div class="row">
                           <div class="col">
                              <div class="rs-counter-list">
                                 <i class="fa fa-bed" style="font-size: 40px;"></i>
                                 <h1 id="H1" class="plus">0</h1>
                                 <h4 class="counter-desc">Total Beds</h4>
                              </div>
                           </div>
                           <div class="col">
                              <div class="rs-counter-list">
                                 <i class="fa fa-hospital-o" style="font-size: 40px;"></i>
                                 <h1 id="H2" class="plus">0</h1>
                                 <h4 class="counter-desc">IPD</h4>
                              </div>
                           </div>
                           <div class="col">
                              <div class="rs-counter-list">
                                 <i class="fa fa-hospital-o" style="font-size: 40px;"></i>
                                 <h1 id="H3" class="plus">0</h1>
                                 <h4 class="counter-desc">OPD</h4>
                              </div>
                           </div>
                           <div class="col">
                              <div class="rs-counter-list">
                                 <i class="fa fa-telegram" style="font-size: 40px;"></i>
                                 <h1 id="H4" class="plus">0</h1>
                                 <h4 class="counter-desc">BOR</h4>
                              </div>
                           </div>
                           <div class="col">
                              <div class="rs-counter-list">
                                 <i class="fa fa-plus-circle" style="font-size: 40px;"></i>
                                 <h1 id="H5" class="plus">0</h1>
                                 <h4 class="counter-desc">CASUALTIES</h4>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>

                  <section class="card card-body">
                     <div class="row">
                        <h4 class="mainShorst">Seat Matrix</h4>

                     </div>
                  </section>


               </div>
               <div class="col-md-3">

                  

                  <div class="course-features-info">
                       <h4 class="desc-title text-center" style="color: #000; margin-top: 0px;">SHARE THIS COLLEGE</h4>
                       <div class="text-center">
                           <a href="javascript:" onclick="return whatsappclick()" id="tdwhatsapp" class="ssSocil"><i class="fa fa-whatsapp"></i></a>
                           <a href="javascript:" onclick="fbs_click()" class="ssSocil"><i class="fa fa-facebook"></i></a>
                           <a href="javascript:" class="ssSocil"><i class="fa fa-twitter"></i></a>
                           <a href="javascript:" class="ssSocil"><i class="fa fa-youtube"></i></a>
                       </div> 
                   </div>
                   <div class="box_detail booking">
                     <div class="price">
                        <h5 class="text-center">Send Quick Enquiry</h5>
                        
                     </div>
                     <div class="form-group" id="input-dates">
                        <input class="form-control" type="text" name="dates" placeholder="Full Name"> 
                     </div>
                      <div class="form-group" id="input-dates">
                        <input class="form-control" type="text" name="dates" placeholder="Email Address"> 
                     </div>
                      <div class="form-group" id="input-dates">
                        <input class="form-control" type="text" name="dates" placeholder="Phone Number"> 
                     </div>
                     <div class="form-group clearfix">
                        <div class="custom-select-form">
                           <select class="wide">
                              <option>Location</option>
                              <option>Patna</option>
                              <option>Chapra</option>
                           </select>
                        </div>
                     </div>
                     <a href="#!" class="btn_1 full-width purchase">SEND NOW</a> 
                  </div>

                   <table class="table course-features-info">
                       <thead class="hhusCss">
                           <tr>
                               <th colspan="2" class="not-color1 text-white">NOTIFICATION
                               </th>
                           </tr>
                       </thead>
                       <tbody id="tdnotification"><tr><td class="text-center" colspan="2">NO DATA AVAILABLE</td></tr></tbody>
                   </table>

                   <div class="course-features-info text-center mt-4 mb-4">
                       <img src="https://cutoffbaba.com/Icon/ownership.png">
                       <h5 class="text__uppercase">Interested in this College ?</h5>
                       <button type="button" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn__dangerss"><i class="fa fa-user"></i>&nbsp;Apply Now For Admission</button>
                   </div>

                       <div class="hhusCss"> 
                        <h5 class="text-white">SIMILAR COLLEGE </h5> 
                       </div>

                       <div class="ssuuiwww">
                          <div class="ddds">
                          <div class="row ">
                          <div class="col-md-2">
                             <img src="https://cutoffbaba.com/Admin/Logo/5687353Adesh%20Medical%20College%20Bhatinda%20Cutoff.png" class="uui8sss">
                          </div>
                          <div class="col-md-10">
                             <a class="sss8iss" href="#!"> Guru Nanak Ayurvedic Medical College </a> 
                             <a class="sss8iss" href="#!"><span>Muktsar</span> , <span>PUNJAB</span></a>
                          </div>
                       </div>
                       </div>

                        <div class="ddds">
                          <div class="row ">
                          <div class="col-md-2">
                             <img src="https://cutoffbaba.com/Admin/Logo/5687353Adesh%20Medical%20College%20Bhatinda%20Cutoff.png" class="uui8sss">
                          </div>
                          <div class="col-md-10">
                             <a class="sss8iss" href="#!"> Guru Nanak Ayurvedic Medical College </a> 
                             <a class="sss8iss" href="#!"><span>Muktsar</span> , <span>PUNJAB</span></a>
                          </div>
                       </div>
                       </div>

                        <div class="ddds">
                          <div class="row ">
                          <div class="col-md-2">
                             <img src="https://cutoffbaba.com/Admin/Logo/5687353Adesh%20Medical%20College%20Bhatinda%20Cutoff.png" class="uui8sss">
                          </div>
                          <div class="col-md-10">
                             <a class="sss8iss" href="#!"> Guru Nanak Ayurvedic Medical College </a> 
                             <a class="sss8iss" href="#!"><span>Muktsar</span> , <span>PUNJAB</span></a>
                          </div>
                       </div>
                       </div>

                        <div class="ddds">
                          <div class="row ">
                          <div class="col-md-2">
                             <img src="https://cutoffbaba.com/Admin/Logo/5687353Adesh%20Medical%20College%20Bhatinda%20Cutoff.png" class="uui8sss">
                          </div>
                          <div class="col-md-10">
                             <a class="sss8iss" href="#!"> Guru Nanak Ayurvedic Medical College </a> 
                             <a class="sss8iss" href="#!"><span>Muktsar</span> , <span>PUNJAB</span></a>
                          </div>
                       </div>
                       </div>

                        <div class="ddds">
                          <div class="row ">
                          <div class="col-md-2">
                             <img src="https://cutoffbaba.com/Admin/Logo/5687353Adesh%20Medical%20College%20Bhatinda%20Cutoff.png" class="uui8sss">
                          </div>
                          <div class="col-md-10">
                             <a class="sss8iss" href="#!"> Guru Nanak Ayurvedic Medical College </a> 
                             <a class="sss8iss" href="#!"><span>Muktsar</span> , <span>PUNJAB</span></a>
                          </div>
                       </div>
                       </div>
                        <div class="ddds">
                          <div class="row ">
                          <div class="col-md-2">
                             <img src="https://cutoffbaba.com/Admin/Logo/5687353Adesh%20Medical%20College%20Bhatinda%20Cutoff.png" class="uui8sss">
                          </div>
                          <div class="col-md-10">
                             <a class="sss8iss" href="#!"> Guru Nanak Ayurvedic Medical College </a> 
                             <a class="sss8iss" href="#!"><span>Muktsar</span> , <span>PUNJAB</span></a>
                          </div>
                       </div>
                       </div>
                        <div class="ddds">
                          <div class="row ">
                          <div class="col-md-2">
                             <img src="https://cutoffbaba.com/Admin/Logo/5687353Adesh%20Medical%20College%20Bhatinda%20Cutoff.png" class="uui8sss">
                          </div>
                          <div class="col-md-10">
                             <a class="sss8iss" href="#!"> Guru Nanak Ayurvedic Medical College </a> 
                             <a class="sss8iss" href="#!"><span>Muktsar</span> , <span>PUNJAB</span></a>
                          </div>
                       </div>
                       </div>
                        <div class="ddds">
                          <div class="row ">
                          <div class="col-md-2">
                             <img src="https://cutoffbaba.com/Admin/Logo/5687353Adesh%20Medical%20College%20Bhatinda%20Cutoff.png" class="uui8sss">
                          </div>
                          <div class="col-md-10">
                             <a class="sss8iss" href="#!"> Guru Nanak Ayurvedic Medical College </a> 
                             <a class="sss8iss" href="#!"><span>Muktsar</span> , <span>PUNJAB</span></a>
                          </div>
                       </div>
                       </div>
                       </div>

                       <br>
                       <button type="button" class="btn dangerss" data-toggle="modal" data-target="#exampleModalCenter">APPLY NOW </button>

                       <button type="button" class="btn dangerss mb-2">DOWNLOAD BROCHURE  </button>

                       <table class="mt-15 table course-features-info scrollable">
                        <thead class="hhusCss">
                           <tr>
                              <th colspan="2" class="not-color1 text-white">Statewise MBBS College</th>
                           </tr>
                        </thead>
                        <tbody id="tdmed">
                           <tr>
                              <td style="border-bottom:3px dotted #fcd1d1;">&nbsp;&nbsp;<a href="#!"><i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;<span class="label neet-bold">ANDAMAN AND NICOBAR ISLANDS</span></a></td>
                           </tr>
                           <tr>
                              <td style="border-bottom:3px dotted #fcd1d1;">&nbsp;&nbsp;<a href="#!"><i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;<span class="label neet-bold">ANDHRA PRADESH</span></a></td>
                           </tr>
                           <tr>
                              <td style="border-bottom:3px dotted #fcd1d1;">&nbsp;&nbsp;<a href="#!"><i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;<span class="label neet-bold">ARUNACHAL PRADESH</span></a></td>
                           </tr>
                           <tr>
                              <td style="border-bottom:3px dotted #fcd1d1;">&nbsp;&nbsp;<a href="#!"><i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;<span class="label neet-bold">ASSAM</span></a></td>
                           </tr>
                           <tr>
                              <td style="border-bottom:3px dotted #fcd1d1;">&nbsp;&nbsp;<a href="morecollege.aspx?stateid=1"><i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;<span class="label neet-bold">BIHAR</span></a></td>
                           </tr>
                           <tr>
                              <td style="border-bottom:3px dotted #fcd1d1;">&nbsp;&nbsp;<a href="#!"><i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;<span class="label neet-bold">CHANDIGARH</span></a></td>
                           </tr>
                           <tr>
                              <td style="border-bottom:3px dotted #fcd1d1;">&nbsp;&nbsp;<a href="#!"><i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;<span class="label neet-bold">CHHATTISGARH</span></a></td>
                           </tr>
                           <tr>
                              <td style="border-bottom:3px dotted #fcd1d1;">&nbsp;&nbsp;<a href="#!"><i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;<span class="label neet-bold">DADRA AND NAGAR HAVELI</span></a></td>
                           </tr>
                           <tr>
                              <td style="border-bottom:3px dotted #fcd1d1;">&nbsp;&nbsp;<a href="#!"><i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;<span class="label neet-bold">DAMAN AND DIU</span></a></td>
                           </tr>
                           <tr>
                              <td style="border-bottom:3px dotted #fcd1d1;">&nbsp;&nbsp;<a href="#!"><i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;<span class="label neet-bold">DELHI</span></a></td>
                           </tr>
                            <tr>
                              <td style="border-bottom:3px dotted #fcd1d1;">&nbsp;&nbsp;<a href="#!"><i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;<span class="label neet-bold">ANDAMAN AND NICOBAR ISLANDS</span></a></td>
                           </tr>
                           <tr>
                              <td style="border-bottom:3px dotted #fcd1d1;">&nbsp;&nbsp;<a href="#!"><i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;<span class="label neet-bold">ANDHRA PRADESH</span></a></td>
                           </tr>
                           <tr>
                              <td style="border-bottom:3px dotted #fcd1d1;">&nbsp;&nbsp;<a href="#!"><i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;<span class="label neet-bold">ARUNACHAL PRADESH</span></a></td>
                           </tr>
                           <tr>
                              <td style="border-bottom:3px dotted #fcd1d1;">&nbsp;&nbsp;<a href="#!"><i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;<span class="label neet-bold">ASSAM</span></a></td>
                           </tr>
                           <tr>
                              <td style="border-bottom:3px dotted #fcd1d1;">&nbsp;&nbsp;<a href="morecollege.aspx?stateid=1"><i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;<span class="label neet-bold">BIHAR</span></a></td>
                           </tr>
                           <tr>
                              <td style="border-bottom:3px dotted #fcd1d1;">&nbsp;&nbsp;<a href="#!"><i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;<span class="label neet-bold">CHANDIGARH</span></a></td>
                           </tr>
                           <tr>
                              <td style="border-bottom:3px dotted #fcd1d1;">&nbsp;&nbsp;<a href="#!"><i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;<span class="label neet-bold">CHHATTISGARH</span></a></td>
                           </tr>
                           <tr>
                              <td style="border-bottom:3px dotted #fcd1d1;">&nbsp;&nbsp;<a href="#!"><i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;<span class="label neet-bold">DADRA AND NAGAR HAVELI</span></a></td>
                           </tr>
                           <tr>
                              <td style="border-bottom:3px dotted #fcd1d1;">&nbsp;&nbsp;<a href="#!"><i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;<span class="label neet-bold">DAMAN AND DIU</span></a></td>
                           </tr>
                           <tr>
                              <td style="border-bottom:3px dotted #fcd1d1;">&nbsp;&nbsp;<a href="#!"><i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;<span class="label neet-bold">DELHI</span></a></td>
                           </tr>
                        </tbody>
                     </table>

                    

                  
               </div>
            </div>
         </section>
         
      </div>
   </div>
</main>
<?php $this->load->view('site/footer');?>
<script>
   $(function() {
   	$("body").on("change",".get_cutoff_matrix",function(e){
   		var year = $(this).val();
   		var course_id = $("input[name='course_id']").val();
   		var college_id = $('.college_id').val();
   		$.ajax({
   			url: "<?php echo base_url('get-cutoff-matrix'); ?>",
   			type: "POST",
   			data: {year:year,course_id:course_id,college_id:college_id},
   			dataType: 'json',
   			success: function(data){
   				$(this).closest('.card-body').find('.cutoff_matrix').html(data.html);
   			}
   		});
   	});
   });
</script>