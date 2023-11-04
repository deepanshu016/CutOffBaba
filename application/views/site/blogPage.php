<?php $this->load->view('site/header');?>
    <div class="breadcrumbarea bg-dark">

            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb__content__wraper" data-aos="fade-up">
                            <div class="breadcrumb__title">
                                <h2 class="heading text-light">Blogs</h2>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

        </div>
        <div class="blogarea__2 sp_top_100 sp_bottom_100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <?php $blogs=$this->db->select('*')->get('tbl_blog')->result_array();foreach($blogs as $blog){ ?>
                        <div class="blog__content__wraper__2" data-aos="fade-up">
                            <div class="blogarae__img__2">
                                <img src="<?=base_url('assets/uploads/blogs/').$blog['blog_image'];?>" alt="blog">
                                <div class="blogarea__date__2">
                                    <span>19</span>
                                    <span class="blogarea__month">August</span>
                                </div>
                            </div>
                            <div class="blogarea__text__wraper__2">
                                <div class="blogarea__heading__2">
                                    <h3><a href="#"><?=$blog['blog_title'];?></a></h3>
                                </div>
                                <div class="blogarea__list__2">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="icofont-business-man-alt-2"></i> Ankit Gautam
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="blogarea__paragraph">
                                    <?=$blog['full_description'];?>
                                </div>
                            </div>


                        </div>
                      <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php $this->load->view('site/footer');?>