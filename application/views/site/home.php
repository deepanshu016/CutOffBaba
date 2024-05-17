<?php $this->load->view('site/header');?>
<style>
		.search-container {
            position: relative;
            width: 600px;
            margin: 50px auto;
            text-align: left;
        }

        #search {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .autocomplete-items {
            position: absolute;
            border: 1px solid #d4d4d4;
            border-top: none;
            z-index: 99;
            top: 100%;
            left: 0;
            right: 0;
            background-color: #fff;
            max-height: 200px;
            overflow-y: auto;
        }

        .autocomplete-items .item {
            padding: 10px;
            /* border-bottom: 1px solid #d4d4d4; */
            display: flex;
            justify-content: space-between;
        }

        .autocomplete-items .item:last-child {
            border-bottom: none;
        }

        .autocomplete-items .category {
            /* font-weight: bold; */
            color: #333;
            width: 80px;
			font-style: italic;
            flex-shrink: 0;
			font-size: 12px;

        }

        .autocomplete-items .suggestion {
            flex: 1;
            padding-left: 10px;
			color: black;
        }

        /* .autocomplete-items .item:hover {
            background-color: #e9e9e9;
        } */
        
</style>
	<main>
		<section class="hero_single version_4">
			<div class="wrapper">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-8">
					<h3>Find what you need!</h3>
					<p>Discover top rated College, Courses and Exams around the world</p>
					<form method="post" action="#">
						<div class="row g-0 custom-search-input-2 search-container">
							<div class="col-lg-10">
								<div class="form-group">
									<input class="form-control" id="search" type="text" placeholder="What are you looking for...">
									<i class="icon_search"></i>
								</div>
							</div>
							<div class="col-lg-2">
								<input type="submit" value="Search">
							</div>
							<div id="autocomplete-list" class="autocomplete-items">
								
							</div>
						</div>
						<!-- /row -->
					</form>
					</div>
					</div>
					<ul class="counter">
						<li><strong>256,020</strong> Locations</li>
						<li><strong>150,543</strong> Active users</li>
					</ul>
				</div>
			</div>
		</section>
			<div class="bg_color_1">
			<div class="container margin_80_55">
				<div class="row justify-content-center">
					<?php foreach ($streams as $stream) { ?>
						<div class="col-lg-4 col-md-6 " >
							<a href="<?=base_url('courses/').str_replace(" ","-",$stream['stream']);?>" class="box_cat_home text-left" style="background:url('<?=asset_url();?>stream/<?=$stream['stream_image'];?>') no-repeat;background-size: 100% 100%;">
								<h3 class="text-left"><?=$stream['stream'];?></h3>
								<p style="max-width:60%;padding:10px;background:rgba(0, 0, 0, 0.3);color:#fff;border-radius:10px "><?=$stream['description'];?></p>
								<?php $count=$this->db->select('*')->where('stream',$stream['id'])->get('tbl_college')->num_rows(); ?>
								<ul>
									<li><strong><?=$count;?></strong>Colleges </li>
								</ul>
							</a>
						</div>
					<?php } ?>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->	
		</div>
		<?php //print_r($colleges); ?>

		<!-- <div class="container-fluid margin_80_55">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Popular Colleges </h2>
			</div>
			<div id="reccomended" class="owl-carousel owl-theme">
				<?php foreach ($colleges as $college) { //print_r($college);

					?>
					<div class="item">
					<div class="strip grid">
						<figure>
							<a href="<?=base_url('college-detail/'.$college['slug']."/".$college['college_id']);?>"><img src="<?=asset_url()."college/banner/".$college['college_bannerfile'];?>" class="img-fluid" alt="" width="400" height="266"><div class="read_more"><span>Read more</span></div></a>
							<small><?=$college['full_name'];?></small>
						</figure>
						<div class="wrapper">
							<h3><a href="<?=base_url('college-detail/'.$college['slug']."/".$college['college_id']);?>"><?=$college['full_name'];?></a></h3>
							<p><?=$college['full_name'];?></p>
							<a class="address" href="<?=$college['full_name'];?>">Get directions</a>
						</div>
						<ul>
							<li><span class="loc_open">Estb. <?=$college['establishment'];?></span></li>
							<li><div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div></li>
						</ul>
					</div>
				</div>
				<?php } ?>
			</div>
		</div> -->
		<div class="container-fluid">
			<div class="row">
				<?php foreach ($colleges as $college) { $this->load->view('site/college-card',$college); } ?>
			</div>
		</div>
		<!-- <div class="call_section image_bg">
			<div class="wrapper">
				<div class="container margin_80_55">
					<div class="main_title_2">
						<span><em></em></span>
						<h2>How it Works</h2>
						<p></p>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="box_how wow">
								<i class="pe-7s-search"></i>
								<h3>Search Locations</h3>
								<p></p>
								<span></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="box_how">
								<i class="pe-7s-info"></i>
								<h3>View Location Info</h3>
								<p></p>
								<span></span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="box_how">
								<i class="pe-7s-like2"></i>
								<h3>Book, Reach or Call</h3>
								<p></p>
							</div>
						</div>
					</div>
					<p class="text-center add_top_30 wow bounceIn" data-wow-delay="0.5"><a href="register.html" class="btn_1 rounded">Register Now</a></p>
				</div>
			</div>
		</div> -->
	</main>
<?php $this->load->view('site/footer');?>
<script>
	$(function(){
		$('#search').on('keyup', function() {
			var query = $(this).val();
			if (query.length > 0) {
				$.ajax({
					url: 'get-search-filter', // Replace with the actual API endpoint
					method: 'GET',
					data: { search: query },
					dataType:'json',
					success: function(data) {
						console.log(data)
						// $('#autocomplete-list').empty();
						$('#autocomplete-list').html(data.html);
					}
				});
			} else {
				$('#autocomplete-list').empty();
			}
		});
		$(document).click(function(event) {
			if (!$(event.target).closest('.search-container').length) {
				$('#autocomplete-list').empty();
			}
		});
	});
</script>