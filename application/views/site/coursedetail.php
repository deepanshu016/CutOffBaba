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
								<h6>Category</h6>
								<ul>
									<li>
										<label class="container_check">Restaurants <small>123</small>
										  <input type="checkbox">
										  <span class="checkmark"></span>
										</label>
									</li>
									<li>
										<label class="container_check">Shops <small>33</small>
										  <input type="checkbox">
										  <span class="checkmark"></span>
										</label>
									</li>
									<li>
										<label class="container_check">Bars <small>56</small>
										  <input type="checkbox">
										  <span class="checkmark"></span>
										</label>
									</li>
									<li>
										<label class="container_check">Events <small>33</small>
										  <input type="checkbox">
										  <span class="checkmark"></span>
										</label>
									</li>
								</ul>
							</div>
							<div class="filter_type">
                                <h6>Distance</h6>
                                <div class="distance"> Radius around selected destination <span></span> km</div>
								<input type="range" min="10" max="100" step="10" value="30" data-orientation="horizontal">
                            </div>
							<div class="filter_type">
								<h6>Rating</h6>
								<ul>
									<li>
										<label class="container_check">Superb 9+ <small>21</small>
										  <input type="checkbox">
										  <span class="checkmark"></span>
										</label>
									</li>
									<li>
										<label class="container_check">Very Good 8+ <small>33</small>
										  <input type="checkbox">
										  <span class="checkmark"></span>
										</label>
									</li>
									<li>
										<label class="container_check">Good 7+ <small>213</small>
										  <input type="checkbox">
										  <span class="checkmark"></span>
										</label>
									</li>
									<li>
										<label class="container_check">Pleasant 6+ <small>23</small>
										  <input type="checkbox">
										  <span class="checkmark"></span>
										</label>
									</li>
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
     $('#pagination').on('click','a',function(e){  
       e.preventDefault();   
       var pageno = $(this).attr('data-ci-pagination-page');  
       loadPagination(pageno);  
     });  
   
     loadPagination(0);  
   
     function loadPagination(pagno){  
       $.ajax({  
         url: '/get-college-data/'+"<?=$courseDetail['id'];?>"+'/'+pagno,  
         type: 'get',  
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