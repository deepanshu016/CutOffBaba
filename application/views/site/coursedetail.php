<?php $this->load->view('site/header');?>
<style>
	.sr-only{
		display: none!important;
	}
</style>
<div class="sub_header_in sticky_header">
	<div class="container">
		<h1><?=$courseDetail['course_full_name'];?> ( <?=$courseDetail['course'];?> )</h1>
	</div>
</div>
<?php //echo '<pre>';print_r($courseDetail); ?>

	<main>
	<div class=" w-100 my-md-3 ps-md-3 bg-light pb-5 mb-5">
   <?php if(!empty($courseLists)) { 
      foreach($courseLists as $course) { ?>
         <div class=" me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="card shaDo mb-3" style="max-width: 540px;background: url('<?= ($course['course_icon'] != '' && file_exists(FCPATH.'assets/uploads/course/'.$course['course_icon'])) ? base_url('assets/uploads/course/').'/'.$course['course_icon'] : base_url('assets/site/img/medical-tr.png');?>');background-size: 100% 100%;">
               <div class="row g-0">
                  <div class="col-8 col pb-3">
                     <div class="card-body nopad">
                        <h5 class="card-title"><?= $course['course']; ?></h5>
                        <p class="card-text nop"><?= $course['course_full_name']; ?></p>
                        <a class="btn btn-primary" href="<?= base_url('course').'/'.$course['id']; ?>">Explore More  <i class="fa fa-angle-right"></i> </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class=" w-100   bg-light">
            <div class="lc-block text-center">
               <div id="carouselTestimonial" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner innscr ">
                     <div class="carousel-item active">
                        <div class="p-2  text-center overflow-hidden">
                           <div class="row">
                              <div class="col col-sm-6">
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <a href="<?= base_url('course').'/'.$course['id']; ?>">
                                          <h5 class="card-title smTxt">About <?=  $course['course']; ?></h5>
                                          <p class="card-text">Nemo enim ipsam voluptatem </p>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <a href="<?= base_url('states').'/'.$course['id']; ?>">
                                       <h5 class="card-title smTxt">State Wise Colleges</h5>
                                       <p class="card-text">Nemo enim ipsam voluptatem </p>
                                    </a>
                                    </div>
                                 </div>
                              </div>
                               <div class="col col-sm-6">
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <a href="<?= base_url('college-info').'/branch'.'/'.$course['id']; ?>">
                                          <h5 class="card-title smTxt">Branches & Seats</h5>
                                          <p class="card-text">Nemo enim ipsam voluptatem </p>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <a href="<?= base_url('college-info').'/fee-expenses'.'/'.$course['id']; ?>">
                                          <h5 class="card-title smTxt">Fees & Expenses</h5>
                                          <p class="card-text">Nemo enim ipsam voluptatem </p>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="p-2 text-center overflow-hidden">
                           <div class="row">
                             
                              <div class="col col-sm-6">
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <a href="<?= base_url('college-info').'/clinic-exposure'.'/'.$course['id']; ?>">
                                          <h5 class="card-title smTxt">Clinic Exposure</h5>
                                          <p class="card-text">Nemo enim ipsam voluptatem </p>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <a href="<?= base_url('college-info').'/service-bond-rules'.'/'.$course['id']; ?>">
                                          <h5 class="card-title smTxt">Service & Bond Rules</h5>
                                          <p class="card-text">Nemo enim ipsam voluptatem </p>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                               <div class="col col-sm-6">
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <a href="<?= base_url('college-info').'/reviews'.'/'.$course['id']; ?>">
                                          <h5 class="card-title smTxt">College Reviews</h5>
                                          <p class="card-text">Nemo enim ipsam voluptatem </p>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <a href="<?= base_url('college-info').'/central-cutoff'.'/'.$course['id']; ?>">
                                          <h5 class="card-title smTxt">Central Cutoff</h5>
                                          <p class="card-text">Nemo enim ipsam voluptatem </p>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="p-2 text-center overflow-hidden">
                           <div class="row">
                               <div class="col col-sm-6">
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <a href="<?= base_url('college-info').'/reviews'.'/'.$course['id']; ?>">
                                          <h5 class="card-title smTxt">College Reviews</h5>
                                          <p class="card-text">Nemo enim ipsam voluptatem </p>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <a href="<?= base_url('college-info').'/state-cutoff'.'/'.$course['id']; ?>">
                                          <h5 class="card-title smTxt">State Cutoff</h5>
                                          <p class="card-text">Nemo enim ipsam voluptatem </p>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                               <div class="col col-sm-6">
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <a href="<?= base_url('college-info').'/cutoff-comparison'.'/'.$course['id']; ?>">
                                          <h5 class="card-title smTxt">Cutoff Comparison</h5>
                                          <p class="card-text">Nemo enim ipsam voluptatem </p>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <a href="<?= base_url('college-info').'/faq'.'/'.$course['id']; ?>">
                                          <h5 class="card-title smTxt">FAQs</h5>
                                          <p class="card-text">Nemo enim ipsam voluptatem </p>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="p-2 text-center overflow-hidden">
                           <div class="row">
                               <div class="col col-sm-6">
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <a href="<?= base_url('college-info').'/college-predictor'.'/'.$course['id']; ?>">
                                          <h5 class="card-title smTxt">College Predictor</h5>
                                          <p class="card-text">Nemo enim ipsam voluptatem </p>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <a href="<?= base_url('college-info').'/college-gallery'.'/'.$course['id']; ?>">
                                          <h5 class="card-title smTxt">College Gallery</h5>
                                          <p class="card-text">Nemo enim ipsam voluptatem </p>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="col col-sm-6">
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <a href="<?= base_url('college-info').'/college-updates'.'/'.$course['id']; ?>">
                                          <h5 class="card-title smTxt">Counselling Updates</h5>
                                          <p class="card-text">Nemo enim ipsam voluptatem </p>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="card shaDo noHis">
                                    <div class="card-body mbbsCss">
                                       <a href="<?= base_url('college-info').'/recommended-colleges'.'/'.$course['id']; ?>">
                                          <h5 class="card-title smTxt">Recommended College</h5>
                                          <p class="card-text">Nemo enim ipsam voluptatem </p>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
   <?php } } ?>
</div>
		<div class="container margin_60_35">
			<div class="row">
				<aside class="col-lg-3" id="sidebar">
					<div id="filters_col">
						<a data-bs-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt">Filters </a>
						<div class="collapse show" id="collapseFilters">
							<div class="filter_type">
								<h6>Affiliation</h6>
								<ul>
									<?php if(!empty($ownerList)) { 
										foreach($ownerList as $owner){ 
										$ownerCollegeCount = $this->db->select('*')->from('tbl_college')->where("FIND_IN_SET(" . $courseDetail['id'] . ", course_offered) > 0", NULL, FALSE)->where("FIND_IN_SET(" . $owner['id'] . ", affiliated_by) > 0", NULL, FALSE)->get()->num_rows();	
									?>
									<li>
										<label class="container_check"><?= $owner['title']; ?> <small><?= $ownerCollegeCount; ?></small>
										  <input type="checkbox" name="ownership[]" value="<?= $owner['id']; ?>"  class="filter_checkbox">
										  <span class="checkmark"></span>
										</label>
									</li>
									<?php } } ?>
								</ul>
							</div>
							<div class="filter_type">
								<h6>Approvals</h6>
								<ul>
									<?php if(!empty($approvalList)) { 
										foreach($approvalList as $approval){ 
											$approvalCollegeCount = $this->db->select('*')->from('tbl_college')->where("FIND_IN_SET(" . $courseDetail['id'] . ", course_offered) > 0", NULL, FALSE)->where("FIND_IN_SET(" . $approval['id'] . ", approved_by) > 0", NULL, FALSE)->get()->num_rows();	
									?>
									<li>
										<label class="container_check"><?= $approval['approval']; ?> <small><?= $approvalCollegeCount; ?></small>
										  <input type="checkbox" name="approval[]" value="<?= $approval['id']; ?>"  class="filter_checkbox">
										  <span class="checkmark"></span>
										</label>
									</li>
									<?php } } ?>
								</ul>
							</div>
							<div class="filter_type">
								<h6>Gender</h6>
								<ul>
									<?php if(!empty($genderList)) { 
										foreach($genderList as $gender){ 
											$genderCollegeCount = $this->db->select('*')->from('tbl_college')->where("FIND_IN_SET(" . $courseDetail['id'] . ", course_offered) > 0", NULL, FALSE)->where("gender_accepted", $gender['id'])->get()->num_rows();	
									?>
									<li>
										<label class="container_check"><?= $gender['gender']; ?> <small><?= $genderCollegeCount; ?></small>
										  <input type="checkbox" name="gender[]" value="<?= $gender['id']; ?>"  class="filter_checkbox">
										  <span class="checkmark"></span>
										</label>
									</li>
									<?php } } ?>
								</ul>
							</div>
							<div class="filter_type">
								<h6>States</h6>
								<ul>
									<?php if(!empty($stateList)) { 
										foreach($stateList as $state){ 
											$stateCollegeCount = $this->db->select('*')->from('tbl_college')->where("FIND_IN_SET(" . $courseDetail['id'] . ", course_offered) > 0", NULL, FALSE)->where("state", $state['id'])->get()->num_rows();	
									?>
									<li>
										<label class="container_check"><?= $state['name']; ?> <small><?= $stateCollegeCount; ?></small>
										  <input type="checkbox" name="state[]" value="<?= $state['id']; ?>" class="filter_checkbox">
										  <span class="checkmark"></span>
										</label>
									</li>
									<?php } } ?>
								</ul>
							</div>
						</div>
						<!--/collapse -->
					</div>
					<!--/filters col-->
				</aside>
				<!-- /aside -->

				<div class="col-lg-9">
					<div id='college_pagination'></div>
					<div id='pagination'></div>  
				</div>
				<!-- /col -->
			</div>		
		</div>
		<!-- /container -->
		
	</main>
	
<?php $this->load->view('site/footer');?>

<script type='text/javascript'>  
$(function(){  
	var url = "<?=base_url('college-detail'); ?>";
	var image_url = "<?=asset_url(); ?>";

	$('body').on('change','.filter_checkbox',function(e){
		var ownership = $("input[name='ownership[]']:checked").map(function() {
			return $(this).val();
		}).get();
		var approval = $("input[name='approval[]']:checked").map(function() {
			return $(this).val();
		}).get();
		var gender = $("input[name='gender[]']:checked").map(function() {
			return $(this).val();
		}).get();
		var state = $("input[name='state[]']:checked").map(function() {
			return $(this).val();
		}).get();
		loadPagination(0,ownership,approval,gender,state);
	});
     $('#pagination').on('click','a',function(e){  
       e.preventDefault();   
	   	var ownership = $("input[name='ownership[]']:checked").map(function() {
			return $(this).val();
		}).get();
		var approval = $("input[name='approval[]']:checked").map(function() {
			return $(this).val();
		}).get();
		var gender = $("input[name='gender[]']:checked").map(function() {
			return $(this).val();
		}).get();
		var state = $("input[name='state[]']:checked").map(function() {
			return $(this).val();
		}).get();
       var pageno = $(this).attr('data-ci-pagination-page');  
       loadPagination(pageno,ownership,approval,gender,state);  
     });  
   
     loadPagination(0);  
   
     function loadPagination(pageno,ownership='',approval='',gender='',state=''){  
       $.ajax({  
         url: '/get-college-data/'+"<?=$courseDetail['id'];?>"+'/'+pageno,  
         type: 'POST',
		 data:{ownership:ownership,approval:approval,gender:gender,state:state},
         dataType: 'json',  
         success: function(response){  
            $('#pagination').html(response.pagination);  
            createTable(response.html,response.row);  
         }  
       });  
     }  
   
	function createTable(result,sno){  
		console.log(result)
		$('#college_pagination').empty();
		$('#college_pagination').append(result); 
	}       
});  
</script>  
<script>
        document.addEventListener('DOMContentLoaded', function () {
		var locationName = "<?=$full_name;?>"; // Replace with your location name
		var encodedLocationName = encodeURIComponent(locationName);
		var googleMapsUrl = 'https://www.google.com/maps/search/?api=1&query=' + encodedLocationName;
		
		var mapLinks = document.getElementsByClassName('address');
		// Loop through the elements and update each one
		for (var i = 0; i < mapLinks.length; i++) {
			mapLinks[i].href = googleMapsUrl;
			// mapLinks[i].innerText = 'Open ' + locationName + ' in Google Maps';
		}
	});
</script>