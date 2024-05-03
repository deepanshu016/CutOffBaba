<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">
<head>

    <meta charset="utf-8" />
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?=base_url('/')?>assets/admin/js/layout.js"></script>
    <link href="<?=base_url('/')?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('/')?>assets/admin/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('/')?>assets/admin/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('/')?>assets/admin/css/custom.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('/')?>assets/admin/css/toastr.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="auth-page-wrapper pt-5">
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>
            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="<?= base_url('admin'); ?>" class="d-inline-block auth-logo" style="color: white;font-size: 25px;font-weight: 600;">
                                    CUTOFFBABA
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="<?= base_url('admin/admin-login')?>" method="POST" class="all-form">

                                        <div class="mb-3">
                                            <label for="username" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="username" placeholder="Enter Email" name="email">
                                            <span class="text-danger" id="email"></span>
                                        </div>

                                        <div class="mb-3">
                                            <div class="float-end">
                                                <a href="auth-pass-reset-basic.html" class="text-muted">Forgot password?</a>
                                            </div>
                                            <label class="form-label" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5" placeholder="Enter password" id="password-input" name="password">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                            <span class="text-danger" id="password"></span>
                                        </div>
                                        <div class="mt-4">
                                            <button class="btn btn-success w-100" type="submit">Sign In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?=base_url('assets/admin/adapters/jquery.js')?>"></script>
    <script src="<?=base_url('assets/admin/js/popper.min.js')?>"></script>
    <script src="<?=base_url('assets/admin/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('/')?>assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url('/')?>assets/admin/libs/simplebar/simplebar.min.js"></script>
    <script src="<?=base_url('/')?>assets/admin/js/toastr.js"></script>
    <script src="<?=base_url('/')?>assets/admin/js/custom.js"></script>
    <?php $this->load->view('common/alert'); ?>
</body>
</html>