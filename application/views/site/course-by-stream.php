<?php $this->load->view('site/header');?>
	<div class="sub_header_in sticky_header">
		<div class="container">
			<h1><?=$this->uri->segment('2');?></h1>
		</div>
	</div>
	<main class="pattern">
		<div class="container margin_60_35">
			<?php //print_r($courseByStreams); ?>
			<?php foreach($courseByStreams[0]['degreetype'] as $degreetype){ ?>
			<div class="main_title_3">
				<span></span>
				<h2><?=$degreetype['degreetype'];?></h2>
			</div>
			<div class="row add_bottom_30">
				<?php $i=0;foreach($degreetype['courses'] as $courses){ ?>
					<div class="col-lg-2 col-md-6 " >
							<a href="<?=base_url('course/').$courses['id'];?>" class="box_cat_home text-center">
								<img src="<?=asset_url();?>course/<?=$courses['course_icon'];?>" class="w-50">
								<h3 class="text-center"><?=$courses['course'];?></h3>
								<?php $count=$this->db->select('*')->where('stream',$courses['id'])->get('tbl_college')->num_rows(); ?>
								<ul>
									<li><strong><?=$count;?></strong>Colleges </li>
								</ul>
							</a>
						</div>

				<?php } ?>	
			</div>
			<?php } ?>	
		</div>
	</main>
	
	<?php $this->load->view('site/footer');?>