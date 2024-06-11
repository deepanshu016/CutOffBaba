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
				<div class="col-lg-3"></div>
				<div class="col-lg-9">
                    <form action="<?= base_url('go-to-college-details'); ?>" class="profile-form"  method="POST" id="collegeForm">
                        <div class="input-group mb-3">
                            <span class="input-group-text appendCXCss raformsss" id="basic-addon1"> 
                            <img class="img-fluid useHsih" src="<?=base_url('assets/site/img/ststse.png')?>" alt=""> </span>
                            <input type="hidden" name="tag" class="form-control tag" value="<?= $tag; ?>">
                            <input type="hidden" name="course_id" class="form-control course_id" value="<?= $course_id; ?>">
                            <select class="form-control raformsss college_id js-example-basic-multiple"  name="college_id" id="">
                                <option value="">Select College</option>
                                <?php if(!empty($courseWiseColleges)){
                                    foreach($courseWiseColleges as $key => $college) { ?>
                                    <option value="<?= $college['college_id']; ?>"><?= $college['full_name']; ?></option>
                                <?php } } ?>
                            </select>
                        </div>
                        <button class="w-100 btn btn-primary sProfil go-to-college-details">Know About It</button>
                    </form>
				</div>
				<!-- /col -->
			</div>		
		</div>
		<!-- /container -->
		
	</main>
	
<?php $this->load->view('site/footer');?>
<script src="<?=base_url('/')?>app/assets/site/js/CommonLib.js"></script>

<script type='text/javascript'>  
$(function(){  
    $("body").on("click",".go-to-college-details",function(e){
        e.preventDefault();
        var course_id = $(".course_id").val();
        var tag = $(".tag").val();
        var college_id = $(".college_id").val();
        if(college_id == ''){
            CommonLib.notification.error('Please select college');   
            return false; 
        }
        var url = "<?=base_url('college-details'); ?>"+'/' + tag+'/'+course_id+ '/' + college_id;
        window.location.href = url;
    });
});  
</script> 