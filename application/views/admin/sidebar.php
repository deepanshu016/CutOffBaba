    <div id="scrollbar" >
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav" style="margin:50px 0">
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
                                <a href="<?= base_url('admin/degreetype'); ?>" class="nav-link" data-key="t-calendar"> Degree Type </a>
                            </li>
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
                           
                        </ul>
                    </div>
                </li>
                 <li class="nav-item">
                                <a href="<?= base_url('admin/exams'); ?>" class="nav-link" data-key="t-calendar"><i class="ri-apps-2-line"></i> <span data-key="t-apps"> Exam Master </span> </a>
                            </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarCourse" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCourse">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Course Master</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarCourse">
                        <ul class="nav nav-sm flex-column">
                           
                            
                            
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
                    <a class="nav-link menu-link"  href="<?= base_url('admin/college'); ?>">
                        <i class="ri-user-5-line"></i> <span data-key="t-landing">College Master</span>
                    </a>
                </li>
                
                  <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarcutoff" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarcutoff">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Cutoff Master</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarcutoff">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link"  href="<?= base_url('admin/counselling-level'); ?>" data-key="t-calendar">
                                    Counselling Level
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="<?= base_url('admin/cutoff-head-name'); ?>" data-key="t-calendar">
                                    Cutoff Head Name
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="<?= base_url('admin/category'); ?>" data-key="t-calendar">
                                    Category
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="<?= base_url('admin/sub-category'); ?>" data-key="t-calendar">
                                    Sub Category
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="<?= base_url('admin/special-category'); ?>" data-key="t-calendar">
                                    Special Category
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="<?= base_url('admin/sub-special-category'); ?>" data-key="t-calendar">
                                    Special Sub Category
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarFees" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarFees">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Fees Master</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarFees">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link"  href="<?= base_url('admin/feeshead'); ?>" data-key="t-calendar">
                                    Fees Heads
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="<?= base_url('admin/service-rules'); ?>" data-key="t-calendar">
                                    Service & Bond Rules
                                </a>
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
                        <a class="nav-link menu-link" href="#sidebarHospital" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarHospital">
                            <i class="ri-apps-2-line"></i> <span data-key="t-apps">Hospital Master</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarHospital">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link"  href="<?= base_url('admin/clinical-details'); ?>" data-key="t-calendar">
                                        Clinical Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"  href="<?= base_url('admin/facilities'); ?>" data-key="t-calendar">
                                        Facilities
                                    </a>
                                </li>
                            </ul>
                        </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link"  href="<?= base_url('admin/counselling-plan'); ?>">
                        <i class="ri-user-5-line"></i> <span data-key="t-landing">Counselling Plan Master</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link"  href="<?= base_url('admin/news'); ?>">
                        <i class="ri-user-5-line"></i> <span data-key="t-landing">News</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link"  href="<?= base_url('admin/settings'); ?>">
                        <i class="ri-settings-3-line"></i> <span data-key="t-landing">Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link"  href="<?= base_url('admin/logout'); ?>">
                        <i class="ri-logout-circle-line"></i> <span data-key="t-landing">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="vertical-overlay"></div>
<div class="main-content">