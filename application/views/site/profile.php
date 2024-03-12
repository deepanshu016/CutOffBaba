<?php $this->load->view('site/header'); ?>
<style>
    .input-group{
        background-color: #183e65;
    }
    .add{width: 52px;text-align: center;}
        label,input,.form-control{color: #fff !important}
</style>
      <main>
         <div class="position-relative overflow-hidden p-md-5 m-md-3 text-center bg-light" style="background-image: url(<?=base_url('assets/site/img/profileheader-bg.png')?>);
            height: 289px;
            background-size: contain;
            background-repeat: no-repeat;">
            <div class="col-md-5 p-lg-5 p-3 mx-auto ">
               <h4 class=" fw-bold text-start txtColor">    <a href="<?=base_url('profile')?>"> <img src="<?=base_url('assets/site/img/rightarrow.png')?>"></a> </h4>
               <h5 class="card-title text-white noProf">Profile</h5>
               <center>
               <img src="<?=base_url('assets/site/img/userrss.png')?>" alt="Avatar" class="avatar">
               </center>
            </div>
         </div>
         </div>
        <form action="<?= base_url('update-profile'); ?>" class="profile-form"  method="POST" id="profileForm">
        <div class="perTxt bg-white">
            <h4 class="f16px">Personal Information</h4>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <div class="input-group mb-3">
                        <span class="input-group-text appendCXCss raforms" id="basic-addon1"> <img class="img-fluid useHsih" src="<?=base_url('assets/site/img/Vector.png')?>" alt=""> </span>
                        <input type="text" class="form-control raforms" placeholder="Full Name*" name="profile[user][name]" aria-label="Username" aria-describedby="basic-addon1" value="<?= @$user['name']; ?>">
                        <input type="hidden" class="form-control raforms" placeholder="Full Name*" name="profile[user][id]" aria-label="Username" aria-describedby="basic-addon1" value="<?= @$user['id']; ?>">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text appendCXCss " id="basic-addon1"> <img class="img-fluid useHsih" src="<?=base_url('assets/site/img/ststse.png')?>" alt=""> </span>
                        <select class="form-control "  name="profile[user][current_state]" id="">
                            <option value="">Select State</option>
                            <?php 
                            if(!empty($states)){
                                foreach($states as $state) { ?>
                                <option value="<?= $state['id']; ?>" <?= (!empty($user) && $user['current_state'] == $state['id']) ? 'selected' : ''; ?>><?= $state['name']; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text appendCXCss " id="basic-addon1"> <img class="img-fluid useHsih" src="<?=base_url('assets/site/img/Vectorss.png')?>" alt=""> </span>
                        <select class="form-control " name="profile[user][current_city]" id="">
                            <option value="">City & District</option>
                            <?php 
                            if(!empty($district)){
                                foreach($district as $district) { ?>
                                <option value="<?= $district['id']; ?>" <?= (!empty($user) && $user['current_city'] == $district['id']) ? 'selected' : ''; ?>><?= $district['city']; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text appendCXCss " id="basic-addon1"> <img class="img-fluid useHsih" src="<?=base_url('assets/site/img/callls.png')?>" alt=""> </span>
                        <input type="text" class="form-control " placeholder="123-456-7890" aria-label="Username" aria-describedby="basic-addon1" value="<?= @$user['mobile']; ?>" name="profile[user][mobile]">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text appendCXCss raforms" id="basic-addon1"> <img class="img-fluid useHsih" src="<?=base_url('assets/site/img/emails.png')?>" alt=""> </span>
                        <input type="text" class="form-control raforms" placeholder="Email Address*" aria-label="Username" aria-describedby="basic-addon1" value="<?= @$user['email']; ?>" name="profile[user][email]">
                    </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="sectionbgs">
            <div class="container">
                <div class="row">
                <div class="col-md-12">
                  <h4 class="f16spx">Examination</h4>
                    <div class="input-group mb-3">
                        <span class="input-group-text appendCXCss raffss" id="basic-addon1"> <img class="img-fluid useHsih" src="<?=base_url('assets/site/img/exmas.png')?>" alt=""> </span>
                        <select class="form-control raffss get-courses"  name="profile[user][selected_exam]" id="">
                            <option value="">Select Exam</option>
                            <?php 
                            if(!empty($exams)){
                                foreach($exams as $exam) { ?>
                                <option value="<?= $exam['id']; ?>" <?= (!empty($user) && $user['selected_exam'] == $exam['id']) ? 'selected' : ''; ?>><?= $exam['exam_full_name']; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                </div>
                <div class="rankTest">
                    <div class="row">
                        <div class="col-4 ">
                            <input type="text" class="form-control" placeholder="Enter AIR" name="profile[user][air]" value="<?= @$user['air']; ?>"> 
                        </div>
                        <div class="col-4 ">
                            <input type="text" class="form-control" placeholder="Enter SR" name="profile[user][sr]" value="<?= @$user['sr']; ?>">
                        </div>
                        <div class="col-4 ">
                            <input type="text" class="form-control" placeholder="Enter Marks"name="profile[user][marks]" value="<?= @$user['marks']; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 course-data">
                    <h4 class="f16spx">Reservation Details</h4>
                    <?php if(!empty($coursesList)) { 
                        $this->load->view('site/course_data', ['coursesList'=>$coursesList,'levelData'=>$levelData,'domicileCategory'=>$domicileCategory,'user'=>$user]);
                    } ?>
                </div>
                <button type="submit" class="w-100 btn btn-primary sProfil">Submit</button>
            </div>
        </div>
        </form>
    </div>
</main>
<?php $this->load->view('site/footer'); ?>
<script>
    $("body").on("change", ".get-courses", function(e){
       var val = $(this).val();
       var url = "<?= base_url('get-exam-courses'); ?>";
       var formData = new FormData();
       formData.append('id',val);
        CommonLib.ajaxForm(formData,'POST',url).then(d=>{
            if(d.status === 200){
                $(".course-data").html(d.html);
            }else{
                CommonLib.notification.error(d.msg);
            }
        }).catch(e=>{
            CommonLib.notification.error(e.responseJSON.errors);
        });
    });
    $("body").on("change",".get-sub-category",function(){
        var currentWrapper = $(this);
        var catId=currentWrapper.val();
        var key=currentWrapper.data('key');
        var keys=currentWrapper.data('keys');
        var url = "<?= base_url('get-sub-category'); ?>";
        var formData = new FormData();
        formData.append('id',catId);
        formData.append('key',key);
        formData.append('keys',keys);
        CommonLib.ajaxForm(formData,'POST',url).then(d=>{
            console.log("Response",d);
            if(d.status === 200){
                currentWrapper.closest('.category-wrapper').next('.sub-category-data').html(d.html);
            }else{
                currentWrapper.closest('.category-wrapper').next('.sub-category-data').html('');
                CommonLib.notification.error(d.message);
            }
        }).catch(e=>{
            console.error("Error:", e);
            currentWrapper.closest('.category-wrapper').next('.sub-category-data').html('');
            CommonLib.notification.error(e.responseJSON.errors);
        });
    });
    $("body").on("change",".get-domicile-sub-category",function(){
        var currentWrapper = $(this);
        var catId=currentWrapper.val();
        var key=currentWrapper.data('key');
        var keys=currentWrapper.data('keys');
        var url = "<?= base_url('get-domicile-sub-category'); ?>";
        var formData = new FormData();
        formData.append('id',catId);
        formData.append('key',key);
        formData.append('keys',keys);
        CommonLib.ajaxForm(formData,'POST',url).then(d=>{
            console.log("Response",d);
            if(d.status === 200){
                currentWrapper.closest('.category-wrapper').next('.sub-category-data').html(d.html);
            }else{
                currentWrapper.closest('.category-wrapper').next('.sub-category-data').html('');
                CommonLib.notification.error(d.message);
            }
        }).catch(e=>{
            console.error("Error:", e);
            currentWrapper.closest('.category-wrapper').next('.sub-category-data').html('');
            CommonLib.notification.error(e.responseJSON.errors);
        });
    });
    $("body").on("submit","#profileForm",function(e){
        e.preventDefault();
        var currentWrapper = $(this);
        var url = currentWrapper.attr('action');
        var method = currentWrapper.attr('method');
        const form = document.getElementById('profileForm');
        const formData = new FormData(form);
        CommonLib.ajaxForm(formData,method,url).then(d=>{
            console.log("Response",d);
            if(d.status === 200){
                CommonLib.notification.success(d.message);
                setTimeout(function(){
                    window.location.href = d.url;
                },2000);
            }else{
                currentWrapper.closest('.category-wrapper').next('.sub-category-data').html('');
                CommonLib.notification.error(d.message);
            }
        }).catch(e=>{
            console.error("Error:", e);
            currentWrapper.closest('.category-wrapper').next('.sub-category-data').html('');
            CommonLib.notification.error(e.responseJSON.errors);
        });
    });
</script>