<div class="col-md-12">
    <?php 
    if(!empty($stateWiseColleges)) {
        foreach($stateWiseColleges as $college) { ?>
        <div class="pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="card shaDo mb-3" style="max-width: 540px;">
                
                    <div class="row g-0">
                        <div class="col-3 col">
                        <img src="<?= ($college['college_logo'] != '' && file_exists(FCPATH.'assets/uploads/college/logo/'.$college['college_logo'])) ? base_url('assets/uploads/college/logo/').$college['college_logo'] : base_url('assets/site/img/Frame-5.png');?>" class="img-fluid ins5t rounded-start" alt="...">
                        </div>
                        <div class="col-9 col">
                        <div class="card-body nopad">
                            <a href="<?= base_url('college-details').'/'.$college['college_id']; ?>">
                                <h5 class="card-title jainTxt"><?= $college['full_name']; ?></h5>
                            </a>
                            <p class="card-text"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> <?= date('Y',strtotime($college['establishment'])); ?>  &nbsp;  <i class="fa fa-map-marker" aria-hidden="true"></i> <?= $college['city_name']; ?>, <?= $college['state_name']; ?> </p>
                        </div>
                        </div>
                        <div class="row g-0 xButton">
                        <div class="col-6">
                            <a class="btn downFrees" href="#!">Download Brochure</a> 
                        </div>
                        <div class="col-6">
                            <a class="btn downFrees" href="#!">Fee Structure</a>
                        </div>
                        </div>
                    </div>
            </div>
        </div>
    <?php } } else{ ?>
        <div class="text-danger" role="alert">No Data Found.</div>
    <?php } ?>
</div>