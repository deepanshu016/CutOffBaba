<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$siteSettings['title'];?></title>
    <link rel="shortcut icon" href="<?=asset_url();?>settings/<?=$siteSettings['favicon'];?>" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <!-- BASE CSS -->
    <link href="<?=base_url('assets/css');?>/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url('assets/css');?>/style.css" rel="stylesheet">
	<link href="<?=base_url('assets/css');?>/vendors.css" rel="stylesheet">
	<link href="<?=base_url('app/assets/admin/css/toastr.css')?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('assets/css');?>/tables.css" rel="stylesheet">
</head>
<body>		
	<div id="page">
	<?php //print_r($streams) ?>
	<header class="header_in  is_sticky ">
		<div class="container">
		<div id="logo">
			<a href="<?=base_url();?>" title="<?=$siteSettings['title'];?>">
				<img src="<?=asset_url();?>settings/<?=$siteSettings['logo'];?>"  alt="" class="logo_normal" style="    max-width: 77px;">
			</a>
		</div>
		<ul id="top_menu">
			
				<?php if($this->session->userdata('user')) { ?>
					<li>
						<a href="<?= base_url('/user_dashboard'); ?>" class="p-3 m-3"><?= $this->session->userdata('user')['name']; ?></a>
					</li>
					<li>
						<a href="<?= base_url('/logout'); ?>" class="p-3 m-3">Logout</a>
					</li>
				<?php } else{ ?>
					<li>
						<a href="#sign-in-dialog" id="sign-in" title="Sign In" class="btn_add  p-3 m-3">Login/Register</a>
					</li>
				<?php } ?>
		</ul>
		<a href="#menu" class="btn_mobile">
			<div class="hamburger hamburger--spin" id="hamburger">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
		</a>
		<nav id="menu" class="main-menu p-3">
		    <ul>
		        <li><span><a href="<?=base_url();?>">Home</a></span></li>
		        <?php foreach($streams as $stream){ ?>
		        <li><span><a href="<?=base_url('courses/').str_replace(" ","-",$stream['stream']).'/'.$stream['id'];?>"><?=$stream['stream'];?></a></span>		        	
		            <ul>
		            	<?php foreach($stream['degreetype'] as $degreetype){ ?>
		                <li>
		                    <span><a href="#0"><?=$degreetype['degreetype'];?></a></span>
		                    <ul><?php $i=0;foreach($degreetype['courses'] as $courses){ ?>
		                    	<li><a href="<?=base_url('course/').$courses['id'];?>"><?=$courses['course'];?></a></li>
		                   		 <?php if($i>=6){echo '<li><a href="#0">View All</a></li>';break;}$i++;}	 ?>
		                    	
		                    </ul>
		                </li>	
		                 <?php } ?>	               
		            </ul>
		       

		        </li>
		         <?php } ?>	 
		        <li><span><a href="<?=base_url('contact');?>" target="_parent">Contact Us</a></span></li>
		    </ul>
		</nav>
		</div>
	</header>