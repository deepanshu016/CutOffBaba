    <div id="scrollbar" >
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav" style="margin-bottom:50px">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link"  href="<?= base_url('admin/dashboard'); ?>">
                        <i class="ri-rocket-line"></i> <span data-key="t-landing">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">General Master</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= base_url('admin/country'); ?>" class="nav-link" data-key="t-calendar">Location </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/ownership'); ?>" class="nav-link" data-key="t-calendar"> Ownership </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/approval'); ?>" class="nav-link" data-key="t-calendar">Approvals  </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/recognition'); ?>" class="nav-link" data-key="t-calendar">Recognition Status   </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/gender'); ?>" class="nav-link" data-key="t-calendar">Gender Accepted   </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/exams'); ?>" class="nav-link" data-key="t-calendar">Exams   </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarCourse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCourse">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Course Master</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarCourse">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= base_url('admin/stream'); ?>" class="nav-link" data-key="t-calendar">Streams </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/opens'); ?>" class="nav-link" data-key="t-calendar">Opens </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/visibility'); ?>" class="nav-link" data-key="t-calendar">Visibility </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/clinicdetails'); ?>" class="nav-link" data-key="t-calendar">Clinic Details </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/clinical-facility'); ?>" class="nav-link" data-key="t-calendar">Clinical Facility </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/degreetype'); ?>" class="nav-link" data-key="t-calendar"> Degree Type </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/nature'); ?>" class="nav-link" data-key="t-calendar">Nature/Group  </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/course'); ?>" class="nav-link" data-key="t-calendar">Course   </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/branch'); ?>" class="nav-link" data-key="t-calendar">Branches   </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarGallery" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarGallery">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Gallery Master</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarGallery">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link"  href="<?= base_url('admin/gallery-heads'); ?>" data-key="t-calendar">
                                    Gallery Heads
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="<?= base_url('admin/college-files'); ?>" data-key="t-calendar">
                                    Upload College File
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link"  href="<?= base_url('admin/college'); ?>">
                        <i class="ri-user-5-line"></i> <span data-key="t-landing">College Master</span>
                    </a>

                <li class="nav-item">
                    <a class="nav-link menu-link"  href="<?= base_url('admin/fees'); ?>">
                        <i class="ri-user-5-line"></i> <span data-key="t-landing">Fees Master</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link"  href="<?= base_url('admin/banner'); ?>">
                        <i class="ri-user-5-line"></i> <span data-key="t-landing">Central Cutoff Master</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link"  href="<?= base_url('admin/banner'); ?>">
                        <i class="ri-user-5-line"></i> <span data-key="t-landing">State Cutoff Master</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link"  href="<?= base_url('admin/banner'); ?>">
                        <i class="ri-user-5-line"></i> <span data-key="t-landing">Hospital Master</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link"  href="<?= base_url('admin/banner'); ?>">
                        <i class="ri-user-5-line"></i> <span data-key="t-landing">Counselling Tools Master</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link"  href="<?= base_url('admin/banner'); ?>">
                        <i class="ri-user-5-line"></i> <span data-key="t-landing">News Master</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link"  href="<?= base_url('admin/banner'); ?>">
                        <i class="ri-user-5-line"></i> <span data-key="t-landing">College Predictor Master</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link"  href="<?= base_url('admin/banner'); ?>">
                        <i class="ri-user-5-line"></i> <span data-key="t-landing">Paid Counselling</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link"  href="<?= base_url('admin/banner'); ?>">
                        <i class="ri-user-5-line"></i> <span data-key="t-landing">Advertisement Master</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link"  href="<?= base_url('admin/banner'); ?>">
                        <i class="ri-user-5-line"></i> <span data-key="t-landing">Top College Master</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link"  href="<?= base_url('admin/banner'); ?>">
                        <i class="ri-user-5-line"></i> <span data-key="t-landing">Testimonial  Master</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link"  href="<?= base_url('admin/banner'); ?>">
                        <i class="ri-user-5-line"></i> <span data-key="t-landing">Enquiry Form Master</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link"  href="<?= base_url('admin/banner'); ?>">
                        <i class="ri-user-5-line"></i> <span data-key="t-landing">Student Profile Master</span>
                    </a>
                </li>
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">-->
                <!--        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Course Master</span>-->
                <!--    </a>-->
                <!--    <div class="collapse menu-dropdown" id="sidebarApps">-->
                <!--        <ul class="nav nav-sm flex-column">-->
                <!--            <li class="nav-item">-->
                <!--                <a href="<?= base_url('admin/course-category'); ?>" class="nav-link" data-key="t-calendar"> Course Category </a>-->
                <!--            </li>-->
                <!--            <li class="nav-item">-->
                <!--                <a class="nav-link"  href="<?= base_url('admin/courses'); ?>" data-key="t-landing">Courses</a>-->
                <!--            </li>-->
                <!--        </ul>-->
                <!--    </div>-->
                <!--</li>-->
                <li class="nav-item">
                    <a class="nav-link menu-link"  href="<?= base_url('admin/settings'); ?>">
                        <i class="ri-settings-3-line"></i> <span data-key="t-landing">Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link"  href="<?= base_url('admin/logout'); ?>">
                        <i class="ri-lock-3-line"></i> <span data-key="t-landing">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="vertical-overlay"></div>
<div class="main-content">