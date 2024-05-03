<?php $this->load->view('site/header');?>
<div class="sub_header_in sticky_header">
	<div class="container">
		<h1><?=$courseDetail['course_full_name'];?> ( <?=$courseDetail['course'];?> )</h1>
	</div>
</div>
<?php //echo '<pre>';print_r($courseDetail); ?>
<?php $this->load->view('site/footer');?>