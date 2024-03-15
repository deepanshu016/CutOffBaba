<?php $this->load->view('site/header'); ?>
<main>
    <div class="position-relative overflow-hidden p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-5 p-lg-5 p-3 mx-auto ">
            <h4 class=" fw-bold text-start txtColorss"> <img src="<?=base_url('assets/site/img/rightarrow.png')?>"> </h4>
            <h5 class="card-title barCss">Branch & Seats</h5>
            <img src="<?=base_url('assets/site/img/college1.png')?>" alt="">
        </div>
    </div>
    <div class="perTxt bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
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
            </div>
        </div> 
    </div>
</main>
<?php $this->load->view('site/footer'); ?>
<script>
    $("body").on("click",".go-to-college-details",function(e){
        e.preventDefault();
        var course_id = $(".course_id").val();
        var tag = $(".tag").val();
        var college_id = $(".college_id").val();
        if(college_id == ''){
            CommonLib.notification.error('Please select college');   
            return false; 
        }
        var url = "<?=base_url('college-detail'); ?>"+'/' + tag+'/'+course_id+ '/' + college_id;
        window.location.href = url;
    });
</script>