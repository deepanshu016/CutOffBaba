<?php $this->load->view('site/header'); ?>
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
         a.open-filter-tabs {
            color: #212529;
            text-decoration: auto;
         }
      </style>
      <main>
         <section class="canvaCssss">
            <div class="container">
               <div class="row">
                  <div class="col-2">
                     <h4 class=" fw-bold text-start cNva"> <img src="<?=base_url('assets/site/img/rightarrow.png')?>"> </h4>
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
                                    <button type="button" class="btn-close u7OffCan close-filter-box" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                 </div>
                              </div>
                              <div class="col-6">
                                 <a class="reSet" href="#!">Reset</a>
                              </div>
                           </div>
                        </div>
                        <div class="offcanvas-body bg-light">
                           <div>
                           </div>
                           <div class="divmain">
                              <div class="row">
                                 <div class="col-4 col5No">
                                    <div class="divcc">
                                       <ul class="list-group list-group-flush main-selector">
                                          <li class="list-group-item  bgColcanv">  <a href="#degreeList" class="open-filter-tabs">Degree </a><i class="fa fa-arrow-right" aria-hidden="true"></i></li>
                                          <li class="list-group-item  bgColcanv">  <a href="#stateList" class="open-filter-tabs">State</a></li>
                                          <li class="list-group-item  bgColcanv">  <a href="#cityList" class="open-filter-tabs">City</a></li>
                                          <li class="list-group-item  bgColcanv">  <a href="#branchList" class="open-filter-tabs">Specialization</a></li>
                                          <li class="list-group-item  bgColcanv">  <a href="#ownershipList" class="open-filter-tabs">Institute Type</a></li>
                                          <li class="list-group-item  bgColcanv">  <a href="#examList" class="open-filter-tabs">Exam</a></li>
                                          <li class="list-group-item  bgColcanv">  <a href="#cityList" class="open-filter-tabs">Hostel</a></li>
                                          <li class="list-group-item  bgColcanv">  <a href="#cityList" class="open-filter-tabs">Fee Range</a></li>
                                          <li class="list-group-item  bgColcanv">  <a href="#facilityList" class="open-filter-tabs">Facilities</a></li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="col-8 tab-content clearfix filter-container-wrapper">
                                    <form id="filterFormCollege" method="POST" action="<?= base_url('filter-college') ?>">
                                       <input type="hidden" class="state_id" name="state_id" value="<?= @$selectedState['id']; ?>">
                                       <input type="hidden" class="course_id" name="course_id" value="<?= @$selectedCourse['id']; ?>">
                                       <ul class="list-group list-group-flush" id="degreeList">
                                          <div class="input-group">
                                             <input type="text" class="form-control bhRdiu" placeholder="Search" aria-label="Dollar amount (with dot and two decimal places)">
                                             <span class="input-group-text bgt5s"> <i class="fa fa-search" aria-hidden="true"></i> </span> 
                                          </div>
                                          <?php
                                          if(!empty($degreeTypeList)){ 
                                             foreach($degreeTypeList as $degree){ 
                                             $courseData = $this->db->select('id')->from('tbl_course')->where('degree_type',$degree['id'])->get()->result_array();
                                             if(!empty($courseData)){
                                                $course_ids = array_column($courseData,'id');
                                                $course_ids[] = $selectedCourse['id'];
                                                $query = $this->db->select('*')->from('tbl_college');
                                                foreach ($course_ids as $course_id) {
                                                   $query = $query->or_where("FIND_IN_SET($course_id, course_offered) > 0");
                                                }
                                                $degree['count'] = $query->group_by('id')->get()->num_rows();
                                             }else{
                                                $degree['count'] = 0;
                                             }
                                          ?>
                                             <li class="list-group-item  bstyCol">
                                                <div class="form-check">
                                                   <input class="form-check-input" type="radio" name="degree_type" id="flexRadioDefault1" value="<?= $degree['id']; ?>">
                                                   <label class="form-check-label" for="flexRadioDefault1">
                                                   <?= $degree['degreetype']; ?>(<?=$degree['count'] ; ?>)
                                                   </label>
                                                </div>
                                             </li>
                                          <?php } } ?>
                                       </ul>
                                       <ul class="list-group list-group-flush d-none" id="stateList">
                                          <div class="input-group">
                                             <input type="text" class="form-control bhRdiu" placeholder="Search" aria-label="Dollar amount (with dot and two decimal places)">
                                             <span class="input-group-text bgt5s"> <i class="fa fa-search" aria-hidden="true"></i> </span> 
                                          </div>
                                          <?php
                                          if(!empty($stateList)){ 
                                             foreach($stateList as $state){ 
                                                $state['count'] = $this->db->select('id')->from('tbl_college')->where('state',$state['id'])->where("FIND_IN_SET(" . $selectedCourse['id'] . ", course_offered) > 0", NULL, FALSE)->get()->num_rows();
                                          ?>
                                             <li class="list-group-item  bstyCol">
                                                <div class="form-check">
                                                   <input class="form-check-input" type="radio" name="states" id="flexRadioDefault1" value="<?= $state['id']; ?>">
                                                   <label class="form-check-label" for="flexRadioDefault1">
                                                   <?= $state['name']; ?>(<?= $state['count']; ?>)
                                                   </label>
                                                </div>
                                             </li>
                                          <?php } } ?>
                                       </ul>
                                       <ul class="list-group list-group-flush d-none" id="cityList">
                                          <?php
                                          if(!empty($cityList)){ 
                                             foreach($cityList as $city){ 
                                                $city['count'] = $this->db->select('id')->from('tbl_college')->where('city',$city['id'])->where("FIND_IN_SET(" . $selectedCourse['id'] . ", course_offered) > 0", NULL, FALSE)->get()->num_rows();
                                          ?>
                                             <li class="list-group-item  bstyCol">
                                                <div class="form-check">
                                                   <input class="form-check-input" type="radio" name="city" id="flexRadioDefault1" value="<?= $city['id']; ?>">
                                                   <label class="form-check-label" for="flexRadioDefault1">
                                                   <?= $city['city']; ?>(<?= $city['count']; ?>)
                                                   </label>
                                                </div>
                                             </li>
                                          <?php } } ?>
                                       </ul>
                                       <ul class="list-group list-group-flush d-none" id="examList">
                                          <?php
                                          if(!empty($examList)){ 
                                             foreach($examList as $exam){ 
                                                $courseData = $this->db->select('id')->from('tbl_course')->where("FIND_IN_SET(" . $exam['id'] . ", exam) > 0", NULL, FALSE)->get()->result_array();
                                                if(!empty($courseData)){
                                                   $course_ids = array_column($courseData,'id');
                                                   $course_ids[] = $selectedCourse['id'];
                                                   $query = $this->db->select('*')->from('tbl_college');
                                                   foreach ($course_ids as $course_id) {
                                                      $query = $query->or_where("FIND_IN_SET($course_id, course_offered) > 0");
                                                   }
                                                   $exam['count'] = $query->group_by('id')->get()->num_rows();
                                                }else{
                                                   $exam['count'] = 0;
                                                }
                                          ?>
                                             <li class="list-group-item  bstyCol">
                                                <div class="form-check">
                                                   <input class="form-check-input" type="radio" name="exam" id="flexRadioDefault1" value="<?= $exam['id']; ?>">
                                                   <label class="form-check-label" for="flexRadioDefault1">
                                                   <?= $exam['exam']; ?>(<?= $exam['count']; ?>)
                                                   </label>
                                                </div>
                                             </li>
                                          <?php } } ?>
                                       </ul>
                                       <ul class="list-group list-group-flush d-none" id="facilityList">
                                          <?php
                                          if(!empty($facilityList)){ 
                                             foreach($facilityList as $facility){ ?>
                                             <li class="list-group-item  bstyCol">
                                                <div class="form-check">
                                                   <input class="form-check-input" type="radio" name="facility" id="flexRadioDefault1" value="<?= $facility['id']; ?>">
                                                   <label class="form-check-label" for="flexRadioDefault1">
                                                   <?= $facility['facility']; ?>(0)
                                                   </label>
                                                </div>
                                             </li>
                                          <?php } } ?>
                                       </ul>
                                       <ul class="list-group list-group-flush d-none" id="branchList">
                                          <?php
                                          if(!empty($branchList)){ 
                                             foreach($branchList as $branch){ ?>
                                             <li class="list-group-item  bstyCol">
                                                <div class="form-check">
                                                   <input class="form-check-input" type="radio" name="branch" id="flexRadioDefault1" value="<?= $branch['id']; ?>">
                                                   <label class="form-check-label" for="flexRadioDefault1">
                                                   <?= $branch['branch']; ?>(0)
                                                   </label>
                                                </div>
                                             </li>
                                          <?php } } ?>
                                       </ul>
                                       <ul class="list-group list-group-flush d-none" id="ownershipList">
                                          <?php
                                          if(!empty($ownershipList)){ 
                                             foreach($ownershipList as $ownership){ 
                                                $ownership['count'] = $this->db->select('id')->from('tbl_college')->where('ownership',$ownership['id'])->where("FIND_IN_SET(" . $selectedCourse['id'] . ", course_offered) > 0", NULL, FALSE)->get()->num_rows();      
                                          ?>
                                             <li class="list-group-item  bstyCol">
                                                <div class="form-check">
                                                   <input class="form-check-input" type="radio" name="ownership" id="flexRadioDefault1" value="<?= $ownership['id']; ?>">
                                                   <label class="form-check-label" for="flexRadioDefault1">
                                                   <?= $ownership['title']; ?>(<?= $ownership['count']; ?>)
                                                   </label>
                                                </div>
                                             </li>
                                          <?php } } ?>
                                       </ul>
                                       <div class="form-group">
                                          <button type="submit" class="btn btn-primary">Filter</button>
                                       </div>
                                    </form>
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
         <section>
            <div>
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-12 elInpa">
                        <h4 class="text-center"><strong>Top Engineering Colleges In <?= $selectedState['name']; ?></strong></h4>
                        <p class="text-center">Ut enim ad minima veniam, quis ullam suscipit exercitationem ullam corporis suscipit lorem.</p>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section>
            <div class="container">
               <div class="row college-container">
                  <?php $this->load->view('site/child_pages/college_data'); ?>
               </div>
            </div>
         </section>
        <?php $this->load->view('site/footer'); ?>
      </main>
      <script>
         $(function(){
            $("body").on("click",".open-filter-tabs",function(e){
               e.preventDefault();
               var wrapper = $(this).attr('href');
               $(".filter-container-wrapper").find('ul').addClass('d-none');
               $(wrapper).removeClass('d-none');
               $(this).addClass('active');
               $(".main-selector .fa-arrow-right").remove();
               $(this).append('<i class="fa fa-arrow-right" aria-hidden="true"></i>');
            });
            $("body").on("submit","#filterFormCollege",function(e){
               e.preventDefault();
               var currentWrapper = $(this);
               var url = currentWrapper.attr('action');
               var method = currentWrapper.attr('method');
               var formData = $('#filterFormCollege')[0];
               formData = new FormData(formData);
               CommonLib.ajaxForm(formData,method,url).then(d=>{
                     if(d.status == 200){
                        $(".close-filter-box").click();
                        $(".college-container").html(d.html);
                     }else{
                        CommonLib.notification.error(d.errors);
                     }
               }).catch(e=>{
                     CommonLib.notification.error(e.responseJSON.errors);
               });
            });
         });
      </script>