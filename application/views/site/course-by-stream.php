<?php $this->load->view('site/header');?>
	<div class="sub_header_in sticky_header">
		<div class="container">
			<h1><?=$this->uri->segment('2');?></h1>
		</div>
	</div>
	<main>
		<div class="container margin_60_35">
			<div class="row">
				<aside class="col-lg-4" id="sidebar">
					<div id="filters_col">
						<a data-bs-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt">Filters </a>
						<div class="collapse show" id="collapseFilters">
							<div class="filter_type">
								<?php foreach($courseByStreams[0]['degreetype'] as $degreetype){ ?>
									<h6><?=$degreetype['degreetype'];?></h6>
									<ul>
										<?php $i=0;foreach($degreetype['courses'] as $courses){ ?>
											<?php $count=$this->db->select('*')->where('course_offered like',"%".$courses['id']."%")->get('tbl_college')->num_rows(); 
											if($count>0){?>
											<li>
												<a href="<?=base_url('course/').$courses['id'];?>"><label class="container_check"><?=$courses['course'];?> ( <?=$count;?> Colleges )
												  <input type="checkbox">
												  <span class="checkmark"></span>
												</label></a>
											</li>
										<?php }} ?>											
									</ul>
								<?php } ?>
							</div>
						</div>
						<!--/collapse -->
					</div>
					<!--/filters col-->
				</aside>
				<!-- /aside -->

				<div class="col-lg-9">
					<?php /*foreach ($colleges as $college){
						$this->load->view('site/college-list',$college);
					}*/ ?>
					
				</div>
			</div>		
		</div>
	</main>
	<?php $this->load->view('site/footer');?>