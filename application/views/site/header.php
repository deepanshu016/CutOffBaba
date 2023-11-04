<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="title" content="<?=$siteSettings['title'];?>">
	<meta name="description" content="<?=$siteSettings['title'];?>"> 
	<meta name="keywords" content="Platform for photographers, photographer community, platform for artists, photographer contest, national geographic photography contest">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
	<title><?=$siteSettings['title'];?></title>
	<link rel="apple-touch-icon" sizes="180x180" href="<?=base_url('assets/uploads/settings/').$siteSettings['favicon'];?>">
	<link rel="icon" type="image/png" sizes="32x32"	href="<?=base_url('assets/uploads/settings/').$siteSettings['favicon'];?>">
	<link rel="icon" type="image/png" sizes="16x16"	href="<?=base_url('assets/uploads/settings/').$siteSettings['favicon'];?>">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?=base_url('assets/front');?>/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />

	<link rel="stylesheet" href="<?=base_url('assets/front');?>/css/LineIcons.css">
	<link rel="stylesheet" href="<?=base_url('assets/front');?>/css/swiper-bundle.min.css">

	<link rel="stylesheet" href="<?=base_url('assets/front');?>/css/animate.css">
	<link rel="stylesheet" href="<?=base_url('assets/front');?>/css/default.css">
	<link rel="stylesheet" href="<?=base_url('assets/front');?>/css/style.css">
	<link rel="stylesheet" href="<?=base_url('assets/front');?>/css/magnific-popup.min.css">

	<link rel="stylesheet"	href="<?=base_url('assets/front');?>/css/lightgallery.min.css">
	<link rel="stylesheet"	href="<?=base_url('assets/front');?>/css/lg-thumbnail.min.css">
	<link href="<?=base_url('/')?>assets/admin/css/toastr.css" rel="stylesheet" type="text/css" />
	<script	src="<?=base_url('assets/front');?>/jsfront/vendor/jquery-3.6.4.min.js"></script>

	<script src="<?=base_url('assets/front');?>/jsfront/popper.min.js"></script>
	<script src="<?=base_url('assets/front');?>/jsfront/bootstrap.min.js"></script>
	<script src="<?=base_url('assets/front');?>/jsfront/swiper-bundle.min.js"></script>


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="<?=base_url('assets/admin/libs/sweetalert2/sweetalert2.min.css')?>" rel="stylesheet" type="text/css" />


<style>
    
    .bg-orange{
        background:#F68F45;
    }
    .v-100{
        min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
  
  display: flex;
  align-items: center;
    }
     a{text-decoration: none;}
</style>
	</head>

<body>
<div class="navbar-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<nav class="navbar navbar-expand-lg">
					<a class="navbar-brand" href="<?= base_url('/'); ?>">
						<img src="<?=base_url('assets/front');?>/images/logo-left.png" alt="Imaze World" class="mobile-logo">
						<img src="<?=base_url('assets/front');?>/images/logo-left.png" alt="Imaze World" class="logo-desk logo-desk--left">
					</a>
					
					<div class="navbar-btn ml-auto d-flex justify-content-between">
						<?php if ($this->session->userdata('user')) {?>
							 <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user" src="<?=base_url('assets/front/images/ankit.jpg')?>"  alt="Admin" style="max-width: 36px;">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?php if(!empty($this->session->userdata('user')['name'])) { echo $this->session->userdata('user')['name']; }?> <i
                                        class="fa fa-caret-down" style="font-size: 16px !important;"></i></span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome <?php if(!empty($this->session->userdata('user')['name'])) { echo $this->session->userdata('user')['name']; }?>!</h6>
                                <?php
                                	$userData=$this->db->select('*')->where('id',$this->session->userdata('user')['id'])->get('tbl_users')->row_array();
                                	if(!empty($userData) && $userData['quiz_status'] == 1 && $userData['quiz_result'] == 1){
                                ?>
                                <a class="dropdown-item" href="<?php echo base_url('profile'); ?>"><i
                                        class="fa fa-user" style="font-size: 16px !important;"></i> <span
                                        class="align-middle" data-key="t-logout">My Profile</span></a>
                                <?php }  ?>
                                <a class="dropdown-item" href="<?php echo base_url('logout'); ?>"><i
                                        class="fa fa-lock" style="font-size: 16px !important;"></i> <span
                                        class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
						<?php }else{ ?>
						<a href="<?=base_url('login');?>" style="margin-right: 30px;margin-top: 15px;float:left">Login/Register</a>
					<?php }?>
						<a class="menu-bar" data-toggle="sidebar" href="#"><img src="<?=base_url('assets/front');?>/images/bars.svg" width="24" /></a>
					</div>
				</nav>
			</div>
		</div>
	</div>
</div>
<div class="sidebar-right">
	<div class="sidebar-close">
		<a class="close" data-toggle="sidebar" href="#"><i class="lni lni-close"></i></a>
	</div>
	<div class="sidebar-content">
		<div class="sidebar-logo text-center">
			<a href="<?= base_url('/'); ?>"><img src="<?=base_url('assets/front');?>/images/logo-left.png" class="sidebar-logo-img" alt="ImazeWorld"></a>
		</div>
		<div class="sidebar-menu">
			<ul>
				<li><a href="<?=base_url();?>">Home</a></li>
				<li><a href="<?=base_url('about-us');?>">About Us</a></li>
				<li><a href="<?=base_url('futurewithus');?>">Future With Us</a></li>
				<li><a href="<?=base_url('login');?>">Login/Register</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="overlay-right"></div>