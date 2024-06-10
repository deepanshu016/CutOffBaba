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