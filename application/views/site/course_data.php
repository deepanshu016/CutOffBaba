<div class="accordion accordion-flush" id="faqlist">
<?php
  if(!empty($coursesList)){
    foreach($coursesList as $key=>$course){ 
        if(!empty($course['category_data'])){
?>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-buttonCss collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-<?= $key; ?>">
           <?= $course["course"] ?>
            </button>
        </h2>
        <div id="faq-content-<?= $key; ?>" class="accordion-collapse collapse show" data-bs-parent="#faqlist">
            <div class="accordion-body fcXvcs">
            <div class="accordion" id="accordionExample" style="background-color:#141414!important;">
                <div class="accordion-item"> 
                <?php 
                    if(!empty($levelData)){
                        foreach($levelData as $level) { ?>
                        <div class="input-group mb-3 category-wrapper">
                            <span class="input-group-text appendCXCss raffss" id="basic-addon1"> <img class="img-fluid useHsih" src="<?=base_url('assets/site/img/exmas.png')?>" alt=""> </span>
                            <select class="form-control raffss get-sub-category"  name="exam" id="">
                                <option value="">Select Category</option>
                                <?php 
                                    foreach($course['category_data'] as $category) { ?>
                                        <option value="<?= $category['id']; ?>"><?= $category['category_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="input-group mb-3 sub-category-data"></div>
                <?php } } ?>
                    <div class="input-group mb-3 category-wrapper">
                            <span class="input-group-text appendCXCss raffss" id="basic-addon1"> <img class="img-fluid useHsih" src="<?=base_url('assets/site/img/exmas.png')?>" alt=""> </span>
                            <select class="form-control raffss get-sub-category"  name="exam" id="">
                                <option value="">Select Domicile Category</option>
                                <?php 
                                    foreach($domicileCategory as $domicile) { ?>
                                        <option value="<?= $domicile['id']; ?>"><?= $domicile['category_name']; ?></option>
                                <?php } ?>
                            </select>
                    </div>
                <?php } ?>
                </div>
            </div>
            <!-- <div class="accordion msCs5t" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button cenCotCss" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                        Central level wise sub-category
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body ">
                        Central level wise sub-category
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion msCs5t" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button cenCotCss" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                        Domicile state wise category
                        </button>
                    </h2>
                </div>
            </div>
            <div class="accordion msCs5t" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button cenCotCss" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseOne">
                        State level wise category
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body ">
                        Central level wise sub-category
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion msCs5t" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button cenCotCss" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseOne">
                        State level wise sub-category
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body ">
                        State level wise sub-category
                        </div>
                    </div>
                </div>
            </div>
            </div> -->
        </div>
    </div>
<?php } } ?>     


<!-- 

    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-buttonCss collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
            PG Diploma
            </button>
        </h2>
        <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
            <div class="accordion-body aacbox">
            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here.
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-buttonCss collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
            DNB                
            </button>
        </h2>
        <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
            <div class="accordion-body aacbox">
            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-buttonCss collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
            DrNB
            </button>
        </h2>
        <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
            <div class="accordion-body aacbox">
            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.
            </div>
        </div>
    </div> -->
    <div class="rankTest">
        <div class="row">
            <div class="col-4 ">
            <select class="form-select leCols" aria-label="Default select example">
                <option selected>Enter AIR</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            </div>
            <div class="col-4 ">
            <select class="form-select leCols" aria-label="Default select example">
                <option selected>State Rank</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            </div>
            <div class="col-4 ">
            <select class="form-select leCols" aria-label="Default select example">
                <option selected>Marks</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            </div>
        </div>
    </div>
</div>