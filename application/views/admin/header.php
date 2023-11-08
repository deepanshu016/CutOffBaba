<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">
<head>
    <meta charset="utf-8" />
    <title>CUTOFFBABA | Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=
    base_url('assets/uploads/settings/'.$siteSettings['favicon']) ?>">
    <link href="<?=base_url('assets/admin/libs/jsvectormap/css/jsvectormap.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/admin/libs/swiper/swiper-bundle.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/admin/libs/sweetalert2/sweetalert2.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/admin/css/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/admin/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />

    <link href="<?=base_url('assets/admin/css/magic.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/admin/css/magicsuggest.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/admin/css/icons.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/admin/css/app.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/admin/css/toastr.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=base_url('assets/admin/css/custom.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/admin/css/select2.min.css')?>" rel="stylesheet" type="text/css">
    <script src="<?=base_url('assets/admin/adapters/jquery.js')?>"></script>
    <script src="<?=base_url('assets/admin/js/popper.min.js')?>"></script>
    <script src="<?=base_url('assets/admin/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('/')?>assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url('/')?>assets/admin/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('/')?>assets/admin/css/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url('assets/admin/js/dataTables.buttons.min.js')?>"></script>
    <script src="<?=base_url('assets/admin/js/jszip.min.js')?>"></script>
    <script src="<?=base_url('assets/admin/js/pdfmake.min.js')?>"></script>
    <script src="<?=base_url('assets/admin/js/buttons.html5.min.js')?>"></script>
    <script src="<?=base_url('assets/admin/js/buttons.print.min.js')?>"></script>
    <script src="<?=base_url('/')?>assets/admin/libs/simplebar/simplebar.min.js"></script>
    <script src="<?=base_url('/')?>assets/admin/libs/node-waves/waves.min.js"></script>
    <script src="<?=base_url('/')?>assets/admin/libs/feather-icons/feather.min.js"></script>
    <script src="<?=base_url('/')?>assets/admin/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?=base_url('/')?>assets/admin/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- App js -->
    <script src="<?=base_url('/')?>assets/admin/js/app.js"></script>
    <script src="<?=base_url('assets/admin/js/toastr.js')?>"></script>
    <script src="<?=base_url('assets/admin/js/custom.js')?>"></script>
    <script src="<?=base_url('/')?>assets/admin/libs/prismjs/prism.js"></script>

    <!-- rater-js plugin -->
    <script src="<?=base_url('/')?>assets/admin/libs/rater-js/index.js"></script>
    <!-- rating init -->
    <script src="<?=base_url('/')?>assets/admin/js/pages/rating.init.js"></script>

    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script src="<?=base_url('assets/admin/js/select2.min.js')?>"></script>
    <script src="<?=base_url('/')?>assets/admin/js/magic.js"></script>
    <style type="text/css">
        .logo-lg img{
            max-width: 100%
        }
        .dataTables_info{
              display: none !important;
        }
        .paging_simple_numbers{
          display: none !important;
        }
        .dt-buttons{
            margin-left: 15px
        }
        input.form-control.form-control-sm {
            border-color: var(--vz-input-border);
            background-color: var(--vz-input-bg);
            color: var(--vz-body-color);
            line-height: 1.5;
            border-radius: 0.25rem;
            font-size: .8125rem;
            appearance: none;
            outline-offset: -2px;
            width: 250px;
            box-sizing: border-box;
            margin: -13px;
            margin-right: 9px;
            margin-top: -12px;
            font-family: inherit;
            padding: 8px 78px 2px;
        }
        button.dt-button.buttons-print {
            color: #fff;
            background-color: #d29c40;
            border-color: #c6933c;
            position: relative;
            cursor: pointer;
            display: inline-block;
            overflow: hidden;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -webkit-tap-highlight-color: transparent;
            display: inline-block;
            font-weight: 400;
            line-height: 1.5;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            border: 1px solid transparent;
            padding: 0.5rem 0.9rem;
            font-size: .8125rem;
            border-radius: 0.25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
        }
        button.dt-button.buttons-pdf {
            color: #fff;
            background-color: #099885;
            border-color: #088f7d;
            position: relative;
            cursor: pointer;
            display: inline-block;
            overflow: hidden;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -webkit-tap-highlight-color: transparent;
            display: inline-block;
            font-weight: 400;
            line-height: 1.5;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            border: 1px solid transparent;
            padding: 0.5rem 0.9rem;
            font-size: .8125rem;
            border-radius: 0.25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
        }
        button.dt-button.buttons-excel {
            color: #fff;
            background-color: #cc563d;
            border-color: #c0513a;
            position: relative;
            cursor: pointer;
            display: inline-block;
            overflow: hidden;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -webkit-tap-highlight-color: transparent;
            display: inline-block;
            font-weight: 400;
            line-height: 1.5;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            border: 1px solid transparent;
            padding: 0.5rem 0.9rem;
            font-size: .8125rem;
            border-radius: 0.25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
        }

    </style>
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                    </div>

                    <div class="d-flex align-items-center">

                        
                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user" src="<?=base_url('assets/admin/img/noimg.jpg')?>"  alt="Admin">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?php if(!empty($admin_session)) { echo $admin_session['name']; }?></span>
                                        <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Admin</span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome <?php if(!empty($admin_session)) { echo $admin_session['name']; }?>!</h6>
                                <a class="dropdown-item" href="<?= base_url('admin/logout'); ?>"><i
                                        class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="<?= base_url('admin/dashboard') ?>" class="logo logo-dark">
                     <span class="logo-sm">
                        <img src="<?= base_url('assets/uploads/settings/'.$siteSettings['favicon']) ?>">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('assets/uploads/settings/'.$siteSettings['logo']) ?>">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="<?= base_url('admin/dashboard') ?>" class="logo logo-light">
                     <span class="logo-sm">
                        <img src="<?= base_url('assets/uploads/settings/'.$siteSettings['favicon']) ?>">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('assets/uploads/settings/'.$siteSettings['logo']) ?>">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>