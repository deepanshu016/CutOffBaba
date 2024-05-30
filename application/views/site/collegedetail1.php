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
                                    <div id="tdownership1" class="text-justify"><?= @$collegeDetail['o_title'];?></div>
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
                                    
                                    <div id="tdapproval">
                                    <?php
                                       if(!empty($collegeDetail['approved_by'])){
                                          $approvals = '';
                                          $approval_ids = explode(',',$collegeDetail['approved_by']);
                                          foreach ($approval_ids as $approval) {
                                             $approvalBy = $this->db->select('approval')->where('id',$approval)->get('tbl_approval')->row_array();
                                             $approvals .= $approvalBy['approval'].',';
                                          }
                                       }
                                       echo replace_last_comma($approvals,',');
                                    ?>
                                    
                                    </div>
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
                                 <div id="tdgender" class="text-justify">
                                 <?php
                                       if(!empty($collegeDetail['gender_accepted'])){
                                          $genders = '';
                                          $genders_ids = explode(',',$collegeDetail['gender_accepted']);
                                          foreach ($genders_ids as $gender) {
                                             $genderBy = $this->db->select('gender')->where('id',$gender)->get('tbl_gender')->row_array();
                                             $genders .= $genderBy['gender'].'&';
                                          }
                                       }
                                       echo replace_last_comma($genders,'&');
                                    ?>
                                 </div>
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
                                 <div id="tdaffiliated" class="text-justify"><?= @$collegeDetail['university_name']; ?></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row mt-4">
                        <div class="col-md-9">Popular Name:&nbsp; <b id="tdpopularname"><?= @$collegeDetail['popular_name_one']; ?></b></div>
                        <div class="col-md-3">Estd Year:&nbsp; <b id="tdestdyear"><?= @$collegeDetail['establishment']; ?></b></div>
                        <div class="col-md-12">Course Offered:&nbsp; <b id="tdcourse">
                        <?php
                           if(!empty($collegeDetail['course_offered'])){
                              $courses = '';
                              $course_ids = explode(',',$collegeDetail['course_offered']);
                              foreach ($course_ids as $course) {
                                 $courseBy = $this->db->select('course')->where('id',$course)->get('tbl_course')->row_array();
                                 $courses .= $courseBy['course'].',';
                              }
                           }
                           echo replace_last_comma($courses,',');
                        ?>
                        </b></div>
                        <div id="tdother1" class="col-md-6"></div>
                        <div id="tdother2" class="col-md-6"></div>
                     </div>

                     

                  </div>


                  <section class="card card-body">
                     <div class="row">
                        <h4 class="mainShorst"><?= @$collegeDetail['full_name']; ?></h4>
                        <p><?= @$collegeDetail['full_name']; ?></p>
                     </div>

                     <table class="table table-bordered">
                     <tbody>
                        <tr>
                           <th><font>Particulars</font></th>
                           <th><font>Statistics</font></th>
                        </tr>
                        <tr>
                           <td>Campus Location</td>
                           <td>
                              <?php
                                 $states = $this->db->select('name')->where('id',$collegeDetail['state'])->get('tbl_state')->row_array();
                                 $city = $this->db->select('city')->where('id',$collegeDetail['city'])->get('tbl_city')->row_array();
                                 echo $city['city'].',',$states['name'];
                              ?>
                           </td>
                        </tr>
                        <tr>
                           <td>Courses Offered</td>
                           <td>
                           <?php
                           if(!empty($collegeDetail['course_offered'])){
                              $courses = '';
                              $course_ids = explode(',',$collegeDetail['course_offered']);
                              foreach ($course_ids as $course) {
                                 $courseBy = $this->db->select('course')->where('id',$course)->get('tbl_course')->row_array();
                                 $courses .= $courseBy['course'].',';
                              }
                           }
                           echo replace_last_comma($courses,',');
                           ?>
                           </td>
                        </tr>
                        <tr>
                           <td>No. of Seats</td>
                           <td>
                              <?php
                                 $SeatMatrixData = $this->db->select('*')->from('tbl_college_seat_matrix_data')->where(['college_id'=>$collegeDetail['id']])->get()->num_rows();
                                 echo $SeatMatrixData;
                              ?>
                           </td>
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


                   <section id="seat_matrix" class="card card-body">
                     <div class="row">
                        <h4 class="mainShorst">Seat Matrix</h4>
                        <table class="table table-bordered">
                        <?php  
                           $courses=explode(",", $collegeDetail['course_offered']);
                           $degreeType=$this->db->select('distinct(degree_type)')->where_in('id',$courses)->get('tbl_course')->result_array();
                          
                           foreach ($degreeType as $key => $degree) {		
                              $degree_types=$this->db->select('*')->where_in('id',$degree['degree_type'])->get('tbl_degree_type')->result_array();			
							   ?>
                           <tbody>
                              <tr>
                                 <td>
                                    <div>
                                       <span><?= $degree_types[0]['degreetype']; ?></span>
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
                                             <?php 
                                                $courselist=$this->db->select('*')->where('degree_type',$degree['degree_type'])->where_in('id',$courses)->get('tbl_course')->result_array();
                                                foreach ($courselist as $course) {
                                                   $branchList = $this->db->select('*')->where('courses',$course['id'])->get('tbl_branch')->result_array();
                                                foreach($branchList as $key=>$branch){
                                                   $SeatMatrixData = $this->db->select('*')->from('tbl_college_seat_matrix_data')->where(['college_id'=>$collegeDetail['id'],'degree_type_id'=>$degree_types[0]['id'],'course_id'=>$course['id'],'branch_id'=>$branch['id']])->get()->row_array();
                                             ?>
                                             <tr>
                                                <td><?= $key+1; ?></td>
                                                <td><?= $course['course']; ?></td>

                                                <td><?= $branch['branch']; ?></td>
                                                <td><?= !empty($SeatMatrixData) ? $SeatMatrixData['seat']: '0'; ?></td>
                                                <td>Recognised</td>
                                             </tr>
                                             <?php } } ?>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        <?php } ?>
                        </table>
                     </div>
                  </section>


                  <section id="rank" class="card card-body">
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


                  <section class="card card-body">
                     <div class="row">
                        
                        <img class="img-fluid" src="https://cutoffbaba.com/images/RegularUpdates.jpeg">

                     </div>
                  </section>

                   <section id="hospital" class="card card-body rs-counter">
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

                  <section id="fees" class="card card-body">
                     <div class="row">
                        <h4 class="mainShorst">Courses Offered</h4>
                        <p><?= $collegeDetail['full_name']; ?> offers quality medical programs under highly qualified faculty and state-of-the-art infrastructure. The College is famous for its undergraduate medical programs, which are five years long, and postgraduate programs, which are three years long.</p>
                        <?php
                        if(!empty($collegeDetail['course_offered'])){
                           $courses = '';
                           $course_ids = explode(',',$collegeDetail['course_offered']);
                           foreach ($course_ids as $course) {
                              $courseData = $this->db->select('*')->where('id',$course)->get('tbl_course')->row_array(); 
                              $courseSeats = $this->db->select('seat')->where('course_id',$course)->get('tbl_college_seat_matrix_data')->row_array();
                        ?>                          
                        <h5><?= $courseData['course']; ?> Duration & Intake</h5>
                        <p>Here, you can learn about the undergraduate courses by <?= $collegeDetail['full_name']; ?>, including the duration and number of seats.</p>
                        <table class="table table-bordered">
                           <tbody>
                              <tr>
                                 <td><strong>Course</strong></td>
                                 <td><strong>Duration</strong></td>
                                 <td><strong>Intake</strong></td>
                              </tr>
                              <tr>
                                 <td><?= $courseData['course']; ?></td>
                                 <td><?= $courseData['course_duration']; ?></td>
                                 <td><?= ($courseSeats) ? $courseSeats['seat'] : 0; ?></td>
                              </tr>
                           </tbody>
                        </table>
                        <?php } } ?>
                        <!-- <h5>MDS Duration & Intake</h5>
                        <p>Here, you can learn about the postgraduate courses by Punjab Govt Dental College Amritsar, including the duration and number of seats.</p>
                         <table class="table table-bordered"><tbody><tr><td><strong>Course</strong></td><td><strong>Speciality</strong></td><td><strong>Duration</strong></td><td><strong>Intake</strong></td></tr><tr><td>MDS</td><td>Prosthodontics and Crown &amp; Bridge</td><td>3 Years</td><td>3</td></tr><tr><td>MDS</td><td>Pediatric and Preventive Dentistry</td><td>3 Years </td><td>6</td></tr><tr><td>MDS</td><td>Oral and Maxillofacial Surgery</td><td>3 Years </td><td>3</td></tr><tr><td>MDS</td><td>Conservative Dentistry &amp; Endodontics</td><td>3 Years </td><td>3</td></tr><tr><td>MDS</td><td>Periodontology</td><td>3 Years </td><td>3</td></tr></tbody></table>

                         <h5>MDS Admission 2024-24</h5>
                         <p>If you want admission to Govt Dental College Amritsar, you must follow the college admission procedure; here in this Section, we provide detailed information about the Punjab Govt Dental College and Hospital Amritsar PG Medical Course Admission Process.</p>

                         <table class="table table-bordered"><thead><tr><th>Particular</th><th>Description</th></tr></thead><tbody><tr><td>Entrance Exam </td><td>Candidates must qualify for the <a href="#!" target="_blank" rel="dofollow noopener"></a><a href="#!" target="_blank" rel="dofollow noopener">NEET MDS</a> entrance exam conducted by NBEMS.</td></tr><tr><td>Counselling Procedure</td><td>After the Qualify the NEET entrance exam, candidates must participate in the <a href="#!" target="_blank" rel="dofollow noopener">Punjab NEET MDS Counselling</a>, conducted by the Baba Farid University of Health Sciences (BFUHS), Faridkot. </td></tr></tbody></table> -->

                         <!-- <h5>Eligibility Criteria</h5>
                         <p>If you want admission to Punjab Govt Dental College Amritsar, you must follow the college eligibility criteria; in this section, we provide detailed information about the eligibility criteria.</p>
                         <table class="table table-bordered"><tbody><tr><td><strong>Courses</strong></td><td><strong>Eligibility Criteria</strong></td></tr><tr><td>BDS</td><td>10+2 examination or its equivalent examination with 50% marks.</td></tr><tr><td>MDS</td><td>BDS degree or its equivalent degree.</td></tr></tbody></table> -->



                     </div>
                  </section>


                  <section class="card card-body">
                     <div class="row">
                        <h4 class="mainShorst">Eligibility Criteria</h4>
                        <p>If you want admission to Punjab Govt Dental College Amritsar, you must follow the college eligibility criteria; in this section, we provide detailed information about the eligibility criteria.</p>
                        <table class="table table-bordered">
                           <tbody>
                              <tr>
                                 <td><strong>Courses</strong></td>
                                 <td><strong>Eligibility Criteria</strong></td>
                              </tr>
                              <?php
                              if(!empty($collegeDetail['course_offered'])){
                                 $courses = '';
                                 $course_ids = explode(',',$collegeDetail['course_offered']);
                                 foreach ($course_ids as $course) {
                                    $courseDatas = $this->db->select('*')->where('id',$course)->get('tbl_course')->row_array(); 
                              ?>     
                              <tr>
                                 <td><?= $courseDatas['course']; ?></td>
                                 <td><?= ($courseDatas['course_eligibility']) ? $courseDatas['course_eligibility'] : '-'; ?></td>
                              </tr>
                              <?php } } ?>
                           </tbody>
                        </table>        

                     </div>
                  </section>

                  <section class="card card-body">
                     <div class="row">
                        <h4 class="mainShorst">Fee Structure</h4>
                        <p>The Govt Dental College Amritsar fee structure for the undergraduate and postgraduate medical courses is mentioned below.</p>

                        <h6><strong>For BDS Fees</strong></h6>

                        <table class="table table-bordered"><tbody><tr><td><strong>BDS Course</strong></td><td><strong>Fees</strong></td></tr><tr><td>1st Year</td><td>80,000/-</td></tr><tr><td>2nd Year</td><td>90,000/-</td></tr><tr><td>3rd Year</td><td>1,00,000/-</td></tr><tr><td>4th Year</td><td>1,10,000/-</td></tr></tbody></table>

                        <h6><strong>For MDS Fees</strong></h6>
                        <table class="table table-bordered"><tbody><tr><td><strong>Course</strong></td><td><strong>Fees (Annual)</strong></td></tr><tr><td>MDS</td><td>1,25,000/-</td></tr></tbody></table>

                     </div>
                  </section>



                  <section id="placement" class="card card-body">
                     <div class="row">
                        <h4 class="mainShorst">Placements</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <table class="table table-bordered">
                        <tbody>
                        <tr>
                        <td>
                        Clove Dental 
                        </td>
                        <td>
                        Innodata 
                        </td>
                        </tr>
                        <tr>
                        <td>
                        I.T.S Centre for Dental Studies and Research 
                        </td>
                        <td>&nbsp;</td>
                        </tr>
                        </tbody>
                        </table>

                     </div>
                  </section>

                  <section id="gallery" class="card card-body">
                     <div class="row">
                        <h4 class="mainShorst"><strong>College Gallery</strong></h4>
                        <br>
                        <div class="grid-gallery">
                           <ul class="magnific-gallery">
                           <?php if(!empty($collegeGallery)){
										foreach($collegeGallery as $gallery){ ?>
                              <li>
                                 <figure>
                                    <img src="<?= base_url('app/assets/uploads/media/image/').$gallery['file_name'];?>" alt="">
                                    <figcaption>
                                       <div class="caption-content">
                                          <a href="<?= base_url('app/assets/uploads/media/image/').$gallery['file_name'];?>" title="Photo title" data-effect="mfp-zoom-in">
                                             <i class="pe-7s-albums"></i> 
                                          </a>
                                       </div>
                                    </figcaption>
                                 </figure>
                              </li>
                              <?php } } ?> 
                           </ul>
                        </div>  
                     </div>
                  </section>

                  <section id="admission" class="card card-body">
                     <div class="row">
                        <h4 class="mainShorst">Admission</h4>
                        <p>The highlights of the admission details of Punjab College are given in the table below </p>
                        <table class="table table-bordered">
                           <tbody>
                              <tr>
                                 <td>
                                    Name of Institute 
                                 </td>
                                 <td>
                                     <?= $collegeDetail['full_name']; ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    Location 
                                 </td>
                                 <td>
                                 <?= $city['city']; ?>,<?= $states['name']; ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                     Type of Institute 
                                 </td>
                                 <td>
                                    Private 
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    Courses Offered 
                                 </td>
                                 <td>
                                 <?php
                                 if(!empty($collegeDetail['course_offered'])){
                                    $coursesDatas = '';
                                    $course_ids = explode(',',$collegeDetail['course_offered']);
                                    foreach ($course_ids as $course) {
                                       $courseBy = $this->db->select('course')->where('id',$course)->get('tbl_course')->row_array();
                                       $coursesDatas .= $courseBy['course'].',';
                                    }
                                 }
                                 echo replace_last_comma($coursesDatas,',');
                                 ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                     Mode of Application 
                                 </td>
                                 <td>
                                     Online 
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    Entrance Examination 
                                 </td>
                                 <td>
                                    NEET 
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                     Mode of Examination 
                                 </td>
                                 <td>
                                     Offline 
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                     Selection Criteria 
                                 </td>
                                 <td>
                                     50% in English, Physics, Chemistry and Biology and 40% for SC, ST, OBC 
                                 </td>
                              </tr>
                           </tbody>
                        </table>




                     </div>
                  </section>


                   <section id="admission" class="card card-body">
                     <div class="row">
                        <h4 class="mainShorst">Clinical Details</h4>
                        <p>The highlights of the admission details of Punjab College are given in the table below </p>
                        <div class="row">
                           <div class="col-lg-3 col-md-6">
                              <a class="box_topic" href="#0">
                                   <img class="iconsss" src="https://cdn-icons-png.flaticon.com/128/5259/5259079.png">  
                                 <h3>Total Bed</h3> 
                              </a>
                           </div>
                           <div class="col-lg-3 col-md-6">
                              <a class="box_topic" href="#0">
                                   <img class="iconsss" src="https://cdn-icons-png.flaticon.com/128/5259/5259079.png">  
                                 <h3>Our Patients</h3> 
                              </a>
                           </div>
                           <div class="col-lg-3 col-md-6">
                              <a class="box_topic" href="#0">
                                   <img class="iconsss" src="https://cdn-icons-png.flaticon.com/128/5259/5259079.png">  
                                 <h3>Out Patients</h3> 
                              </a>
                           </div>
                           <div class="col-lg-3 col-md-6">
                              <a class="box_topic" href="#0">
                                   <img class="iconsss" src="https://cdn-icons-png.flaticon.com/128/5259/5259079.png">  
                                 <h3>Baby Born</h3> 
                              </a>
                           </div>
                           <div class="col-lg-3 col-md-6">
                              <a class="box_topic" href="#0">
                                   <img class="iconsss" src="https://cdn-icons-png.flaticon.com/128/5259/5259079.png">  
                                 <h3>Total Bed</h3> 
                              </a>
                           </div>
                           <div class="col-lg-3 col-md-6">
                              <a class="box_topic" href="#0">
                                   <img class="iconsss" src="https://cdn-icons-png.flaticon.com/128/5259/5259079.png">  
                                 <h3>Total Bed</h3> 
                              </a>
                           </div>
                           <div class="col-lg-3 col-md-6">
                              <a class="box_topic" href="#0">
                                   <img class="iconsss" src="https://cdn-icons-png.flaticon.com/128/5259/5259079.png">  
                                 <h3>Total Bed</h3> 
                              </a>
                           </div>
                           <div class="col-lg-3 col-md-6">
                              <a class="box_topic" href="#0">
                                   <img class="iconsss" src="https://cdn-icons-png.flaticon.com/128/5259/5259079.png">  
                                 <h3>Total Bed</h3> 
                              </a>
                           </div>
                        </div>

                     </div>
                  </section>


                   <section id="contacts" class="card card-body">
                     <div class="row">
                        <h4 class="mainShorst">Contact Us</h4>
                        <div class="form_container"> 
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Full Name*">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email ID*">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Location*">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="email" id="email" placeholder="State*">
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <textarea class="form-control" placeholder="Message"></textarea>
                                 </div>
                              </div>
                           </div>
                           
                            
                           <div class="text-center"><input type="submit" value="Submit Now" class="btn_1 full-width"></div>
                            
                        </div>

                     </div>
                  </section>

                  <section id="reviews" class="card card-body">
                     <div class="row">
                        <h4 class="mainShorst">College Reviews</h4>
                        <section id="reviews">
                      
                     <div class="reviews-container add_bottom_30">
                        <div class="row">
                           <div class="col-lg-3">
                              <div id="review_summary">
                                 <strong>8.5</strong>
                                 <em>Superb</em>
                                 <small>Based on 4 reviews</small>
                              </div>
                           </div>
                           <div class="col-lg-9">
                              <div class="row">
                                 <div class="col-lg-10 col-9">
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </div>
                                 <div class="col-lg-2 col-3"><small><strong>5 stars</strong></small></div>
                              </div>
                              <!-- /row -->
                              <div class="row">
                                 <div class="col-lg-10 col-9">
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </div>
                                 <div class="col-lg-2 col-3"><small><strong>4 stars</strong></small></div>
                              </div>
                              <!-- /row -->
                              <div class="row">
                                 <div class="col-lg-10 col-9">
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </div>
                                 <div class="col-lg-2 col-3"><small><strong>3 stars</strong></small></div>
                              </div>
                              <!-- /row -->
                              <div class="row">
                                 <div class="col-lg-10 col-9">
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </div>
                                 <div class="col-lg-2 col-3"><small><strong>2 stars</strong></small></div>
                              </div>
                              <!-- /row -->
                              <div class="row">
                                 <div class="col-lg-10 col-9">
                                    <div class="progress">
                                       <div class="progress-bar" role="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                 </div>
                                 <div class="col-lg-2 col-3"><small><strong>1 stars</strong></small></div>
                              </div>
                              <!-- /row -->
                           </div>
                        </div>
                        <!-- /row -->
                     </div>

                     <div class="reviews-container">

                        <div class="review-box clearfix">
                           <figure class="rev-thumb"><img src="https://www.ansonika.com/sparker/img/avatar1.jpg" alt="">
                           </figure>
                           <div class="rev-content">
                              <div class="rating">
                                 <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                              </div>
                              <div class="rev-info">
                                 Admin – April 03, 2016:
                              </div>
                              <div class="rev-text">
                                 <p>
                                    Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
                                 </p>
                              </div>
                           </div>
                        </div>
                        <!-- /review-box -->
                        <div class="review-box clearfix">
                           <figure class="rev-thumb"><img src="https://www.ansonika.com/sparker/img/avatar1.jpg" alt="">
                           </figure>
                           <div class="rev-content">
                              <div class="rating">
                                 <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                              </div>
                              <div class="rev-info">
                                 Ahsan – April 01, 2016:
                              </div>
                              <div class="rev-text">
                                 <p>
                                    Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
                                 </p>
                              </div>
                           </div>
                        </div>
                        <!-- /review-box -->
                        <div class="review-box clearfix">
                           <figure class="rev-thumb"><img src="https://www.ansonika.com/sparker/img/avatar1.jpg" alt="">
                           </figure>
                           <div class="rev-content">
                              <div class="rating">
                                 <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                              </div>
                              <div class="rev-info">
                                 Sara – March 31, 2016:
                              </div>
                              <div class="rev-text">
                                 <p>
                                    Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
                                 </p>
                              </div>
                           </div>
                        </div>
                        <!-- /review-box -->
                     </div>
                     <!-- /review-container -->
                  </section>

                  <div class="add-review">
                        <h5>Leave a Review</h5>
                        <form>
                           <div class="row">
                              <div class="form-group col-md-6">
                                 <label>Name and Lastname *</label>
                                 <input type="text" name="name_review" id="name_review" placeholder="" class="form-control">
                              </div>
                              <div class="form-group col-md-6">
                                 <label>Email *</label>
                                 <input type="email" name="email_review" id="email_review" class="form-control">
                              </div>
                              <div class="form-group col-md-12">
                                 <label>Rating </label>
                                 <div class="custom-select-form">
                                 <select name="rating_review" id="rating_review" class="wide" style="display: none;">
                                    <option value="1">1 (lowest)</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5" selected="">5 (medium)</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10 (highest)</option>
                                 </select><div class="nice-select wide" tabindex="0"><span class="current">5 (medium)</span><ul class="list"><li data-value="1" class="option">1 (lowest)</li><li data-value="2" class="option">2</li><li data-value="3" class="option">3</li><li data-value="4" class="option">4</li><li data-value="5" class="option selected">5 (medium)</li><li data-value="6" class="option">6</li><li data-value="7" class="option">7</li><li data-value="8" class="option">8</li><li data-value="9" class="option">9</li><li data-value="10" class="option">10 (highest)</li></ul></div>
                                 </div>
                              </div>
                              <div class="form-group col-md-12">
                                 <label>Your Review</label>
                                 <textarea name="review_text" id="review_text" class="form-control" style="height:130px;"></textarea>
                              </div>
                              <div class="form-group col-md-12 add_top_20 add_bottom_30">
                                 <input type="submit" value="Submit" class="btn_1" id="submit-review">
                              </div>
                           </div>
                        </form>
                     </div>


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
         <br>
         <br>
         <section>
          <div class="container">
            <div class=" ">
         <span><em></em></span>
         <h2 class="text-center">OUR PAID COUNSELLING SERVICES </h2>
         <br>
         <br>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable">
                    <div class="pricingTable-header">
                     <h6 class="qilck">Quick Info</h6>
                        <h3 class="title">ECONOMY PLAN</h3>
                    </div>
                    <div class="price-value">
                        <span class="amount">₹ 119.00</span>
                        <span class="month">10% OFF ₹ 132</span>
                    </div>
                    <ul class="pricing-content">
                        <li>Tuition Fees Info <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span> </li>
                        <li>Seat Matrix Info <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                        <li>Approved Colleges Info <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                        <li>Cutoff Info <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                        <li>Category Info <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li> 
                        <li>Counselling Dates <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                        <li>Counselling Dates <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                        <!-- <li class="disable">15 Subdomains <span class="floaIli text-danger"><i class="fa fa-times" aria-hidden="true"></i> </span>  </li>
                        <li class="disable">20 Domains <span class="floaIli text-danger"><i class="fa fa-times" aria-hidden="true"></i> </span></li> -->
                    </ul>
                    <a href="#" class="pricingTable-signup">Sign Up</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable magenta">
                    <div class="pricingTable-header">
                     <h6 class="qilck">Expertise Info</h6>
                        <h3 class="title">STANDARD PLAN</h3>
                    </div>
                    <div class="price-value">
                        <span class="amount">₹ 999.00</span>
                        <span class="month">10% OFF ₹ 1110</span>
                    </div>
                    <ul class="pricing-content">
                        <li>All Quick Info <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span> </li>
                        <li>Counselling Procedures <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                        <li>Counselling Eligibility <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li> 
                        <li>College Selection Guidance <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                        <li>Bonds & Service Rules <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span> </li>
                        <li>How To Apply For <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                        <li>Counselling Of Other States <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                         
                    </ul>
                    <a href="#" class="pricingTable-signup">Sign Up</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable ">
                     <div class="pricingTable-header">
                     <h6 class="qilck">Counselling Package</h6>
                        <h3 class="title">PREMIUM PLAN</h3>
                    </div>
                    <div class="price-value">
                        <span class="amount">₹ 29,999</span>
                        <span class="month">10% OFF ₹ 33333</span>
                    </div>
                    <ul class="pricing-content">
                        <li>Unlimited Quick Info <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span> </li>
                        <li>Unlimited Expert Info <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                        <li>Access To Counselling Tools <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li> 
                        <li>Access To College Predictor <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                        <li>Full Support In Counselling <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span> </li>
                        <li>Option & Choice Entry <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                        <li>Post Seat Allocation <span class="floaIli"><i class="fa fa-check" aria-hidden="true"></i></span></li>
                    </ul>
                    <a href="#" class="pricingTable-signup">Sign Up</a>
                </div>
            </div>
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