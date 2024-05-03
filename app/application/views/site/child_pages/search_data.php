<div class="row">
                <div class="col-md-12">
                    <h6 class="yourRes">Your search result of "<?= $keyword ?>"</h6>
                    <p><?= (count($coursesByKeyword) + count($stateByKeyword)  + count($stateWiseColleges)); ?>  Total results found</p>
                </div>
            </div>
            <?php if(!empty($stateWiseColleges)){  ?>
                <div class="row">
                    <?php $this->load->view('site/child_pages/college_data'); ?>
                    <center>
                    <!-- <a class="text-decoration-none" href="#">View More</a> -->
                    <a class="text-decoration-none" href="<?= base_url('all-colleges'); ?>">View More</a>
                    </center>
                </div>
            <?php }  ?> 
            <?php if(!empty($coursesByKeyword)){  ?>
            <div class="row">
                <div class="col-md-12">
                    <h6 class="collTxt">Courses</h6>
                    <div class="row">
                        <?php
                            foreach($coursesByKeyword as $key => $course){ ?>
                            <div class="col">
                                <div class="cardBodyShado">
                                    <h6><?= $course['course']; ?></h6>
                                </div>
                            </div>
                        <?php }  ?>
                    </div>
                    <br>
                    <center>
                    <a class="text-decoration-none" href="#!">View More</a>
                    </center>
                </div>
            </div> 
            <?php }  ?> 
            <?php if(!empty($stateByKeyword)){  ?>
            <div class="row">
                <div class="col-md-12">
                    <h6 class="collTxt">States</h6>
                    <div class="row">
                    <?php
                        foreach($stateByKeyword as $key => $state){ ?>
                        <div class="col">
                            <div class="cardBodyShado">
                                <h6><?= $state['name']; ?></h6>
                            </div>
                        </div>
                    <?php }  ?>
                    </div>
                    <br>
                    <center>
                    <a class="text-decoration-none" href="#!">View More</a>
                    </center>
                </div>
            </div>
            <?php }  ?> 