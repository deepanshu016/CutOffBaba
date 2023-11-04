 <section class="d-none d-md-block">
      <div class="swiper animeslide">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->

          <?php if(!empty($sliderList)) { 
            foreach($sliderList as $list) { 
          ?>
          <div
            class="swiper-slide animeslide-slide"
            style="background-image: url(<?=base_url('assets/uploads/slider/'.$list['background_image_for_large']);?>);"
          >
            <div class="container">
              <?php if ($list['banner_title_large']!="") { ?>
              <h2 data-animate="" class="animeslide-heading"><span><?= @$list['banner_title_large']; ?></span>
              </h2> 
            <?php } ?>
            <?php if ($list['banner_sub_title_large']!="") { ?>
              <p data-animate="" class="animeslide-heading"><?= @$list['banner_sub_title_large']; ?></p>
            <?php } ?>
            <?php if (file_exists(FCPATH.'assets/uploads/slider/'.$list['left_image_for_large'])  && $list['left_image_for_large']!=""): ?>
              
            
              <img data-animate="" src="<?=base_url('assets/uploads/slider/'.$list['left_image_for_large']);?>" style="width: 550px;">
              <?php endif ?>
              <?php if (file_exists(FCPATH.'assets/uploads/slider/'.$list['right_image_for_large']) && $list['right_image_for_large']!=""): ?>
              <img data-animate="" src="<?=base_url('assets/uploads/slider/'.$list['right_image_for_large']);?>" style="width: 700px;position: absolute;right:0px;top:50px;height: 450px;">
              <?php endif ?>
                <?php if (file_exists(FCPATH.'assets/uploads/slider/'.$list['button_title_large'])  && $list['button_title_large']!=""): ?>
              <a href="<?= @$list['button_link_large']; ?>"><img data-animate="" src="<?=base_url('assets/uploads/slider/'.$list['button_title_large']);?>" style="width: 150px;position: absolute;left:120px;bottom:-100px;"></a>
              <?php endif ?>
            </div>
          </div>
          <?php } } ?>
       
        </div>
      </div>
    </section>
     <section class="d-block d-md-none">
      <div class="swiper animeslide">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->
          <?php if(!empty($sliderList)) { 
            foreach($sliderList as $list) { 
          ?>
          <div
            class="swiper-slide animeslide-slide"
            style="background-image: url(<?=base_url('assets/uploads/slider/'.$list['background_image_for_small']);?>);">
            <div class="container">
              <h2 data-animate="" class="animeslide-heading mb-4 mt-3" style="font-size:21px;text-align:left"><?= @$list['banner_title_small']; ?>
              </h2> 
              <p data-animate="" class="animeslide-heading m-0 mb-2" style="font-size:24px;text-align:left"><?= @$list['banner_sub_title_right']; ?></p>
              <img data-animate="" src="<?=base_url('assets/uploads/slider/'.$list['right_image_for_small']);?>" style="width: 100%;">
              <h3 data-animate="" class="animeslide-heading" style="font-size:21px;margin:20px 0;padding: 0;font-weight: bold;">Powered By</h3>

              <img data-animate="" src="<?=base_url('assets/uploads/slider/'.$list['left_image_for_small']);?>" style="width: 550px;">
              <div class="d-flex justify-content-between mt-5">
              <a href="<?= @$list['button_link_small']; ?>" class="mx-auto" ><img data-animate="" src="<?=base_url('assets/uploads/slider/'.$list['button_title_small']);?>" style="width: 160px;"></a>
              </div>
               
            </div>
          </div>
         <?php } } ?>
       
        </div>
      </div>
    </section>
    <style type="text/css">html {
  font-family: sans-serif;
  line-height: 1.15;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
}
p {
    margin-bottom: 1rem;
    font-size: inherit;
    line-height: 1.6;
    text-rendering: optimizeLegibility;
}

section {
  padding: 0;
}
h2 {
  font-size: 2.5rem;
  line-height: 1.4;
  margin-top:0;
}
h3 {
text-transform: uppercase;
font-size: 28px;
 font-family: 'Poppins', sans-serif;
  color: #ff8000;
  font-weight: 400;
  margin-bottom: 20px;
}
.flex {
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.cell {
  padding-right: 0.9375rem;
  padding-left: 0.9375rem;
}
.medium {
  width:50%;
}
.small {
  width:25%;
}
.container {
  max-width:80rem;
  margin: 0 auto;
  padding-left:15px;
  padding-right:15px;
}
.animeslide-slide {
  color:#fff;
}

.animeslide-slide {
  position: relative;
  padding: 15px 0;
  min-height: 700px;
  background-size: cover;
}
.animeslide-slide .container {
  position: relative;
}
.animeslide-slide.swiper-slide-active [data-animate] {
  opacity: 1;
  transform: none;
}
.animeslide-slide.swiper-slide-active .animeslide-heading {
  transition-delay: 0.6s;
}
.animeslide-slide.swiper-slide-active .animeslide-desc {
  transition-delay: 1s;
}
h2.animeslide-heading {
   font-size: 33px;
  margin-top: 50px;
  margin-bottom: 5px;
  transition-delay: 3s;
  font-family: 'Poppins', sans-serif;
  color: #004aad;
}
p.animeslide-heading {
   font-size: 30px;
  margin-top: 5px;
  margin-bottom: 25px;
  transition-delay: 3s;
  font-family: 'Poppins', sans-serif;
   color: #ff8000;
}

h3.lead-text{
font-family: 'Poppins', sans-serif;
  border-radius: 8px;
  font-weight: bold;
  }
  p.lead-text{
font-family: 'Poppins', sans-serif;
  border-radius: 8px;
  font-weight: normal;
  font-size: 1.4em;
  letter-spacing: 1.25px;
  }
.animeslide-desc {
  padding: 15px 22px;
  border-radius: 8px;
  background-color: #202238;
  max-width: 480px;
  opacity: 0.9;
}

[data-animate] {
  opacity: 0;
  transition: all 0.8s ease-out;
}
[data-animate="first"] {
  transform: translate3d(1000px, 15px, 0);
  transition: all 0.8s ease-out;
}
[data-animate="second"] {
  transform: translate3d(2000px, 15px, 0);
  transition: all 2s ease-out;
}
[data-animate="third"] {
  transform: translate3d(-3000px, 150px, 0);
  transition: all 3s ease-out;
}
[data-animate="fourth"] {
  transform: translate3d(-3000px, 150px, 0);
  transition: all 4s ease-out;
}
[data-animate="fifth"] {
  transform: translate3d(3000px, 150px, 0);
  transition: all 4s ease-out;
}
[data-animate="sixth"] {
  transform: translate3d(-4000px, 150px, 0);
  transition: all 5s ease-out;
}
[data-animate="seventh"] {
  transform: translate3d(4000px, 150px, 0);
  transition: all 5s ease-out;
}

.animeslide-bottom {
  position: absolute;
  display: none;
  bottom: 0;
  width: 100%;
  border-radius: 8px;
  background-color: #202238;
  max-width: 600px;
  z-index: 1;
  padding: 35px 35px;
  right: 0;
  font-size: 14px;
}
.animeslide-bottom .cell {
  position: relative;
  opacity: 1;
  z-index: 2;
  height: 40px;
  bottom: inherit;
}
.animeslide-bottom .animeslide-scrollbar {
  margin-top: 16px;
}
.animeslide-bottom .animeslide-scrollbar-drag {
  height: 6px;
}
.animeslide-bottom .animeslide-pagination {
  font-size: 25px;
  bottom: inherit;
  color:#fff;
}
.animeslide-bottom .animeslide-pagination b {
  font-size: 28px;
  margin-top: -5px;
}

.animeslide-bottom .animeslide-pagination span {
  padding-left: 5px;
  padding-right: 5px;
}
.animeslide-button-next,
.animeslide-button-prev {
  outline: none;
}
.animeslide-button-next::after,
.animeslide-button-prev::after {
  font-size: 22px;
  color: #fff;
}










.course-full-width {
    width: 100%;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    position: relative;
    top: 0;
    transition: top ease .5s;
}
[data-aos^=fade][data-aos^=fade].aos-animate {
    opacity: 1;
    width: 100%;
    transform: translateZ(0);
}
.online-course {
    border-radius: 20px;
    padding: 25px;
    position: relative;
    background: #fff;
}

</style>
<!-- <section class="s-hero-slider">
	<div class="hero-slider__outer-wrap">
		<div class="hero-slider__inner-wrap">
			<div id="heroSlider" class="carousel slide" data-bs-ride="carousel">
				
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img alt="#Imaze World" src="<?=base_url('assets/front/');?>/images/d-banner-1.png" class="w-100 animated hero-slider__img d-none d-lg-block" />
						<img alt="#Imaze World" src="<?=base_url('assets/front/');?>/images/d-banner-1.png" class="w-100 animated hero-slider__img d-none d-md-block d-lg-none" />
						<img alt="#Imaze World" src="<?=base_url('assets/front/');?>/images/d-banner-1.png" class="w-100 animated hero-slider__img d-md-none" />
					</div>
					<div class="carousel-item ">
						<img alt="#Imaze World" src="<?=base_url('assets/front/');?>/images/d-banner-2.png" class="w-100 animated hero-slider__img d-none d-lg-block" />
						<img alt="#Imaze World" src="<?=base_url('assets/front/');?>/images/d-banner-2.png" class="w-100 animated hero-slider__img d-none d-md-block d-lg-none" />
						<img alt="#Imaze World" src="<?=base_url('assets/front/');?>/images/d-banner-2.png" class="w-100 animated hero-slider__img d-md-none" />
					</div>
					<div class="carousel-item ">
						<img alt="#Imaze World" src="<?=base_url('assets/front/');?>/images/d-banner-3.png" class="w-100 animated hero-slider__img d-none d-lg-block" />
						<img alt="#Imaze World" src="<?=base_url('assets/front/');?>/images/d-banner-3.png" class="w-100 animated hero-slider__img d-none d-md-block d-lg-none" />
						<img alt="#Imaze World" src="<?=base_url('assets/front/');?>/images/d-banner-3.png" class="w-100 animated hero-slider__img d-md-none" />
					</div>
				</div>
				<div class="carousel-indicators">
					<button type="button" data-bs-target="#heroSlider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
					<button type="button" data-bs-target="#heroSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
					<button type="button" data-bs-target="#heroSlider" data-bs-slide-to="2" aria-label="Slide 3"></button>
				</div>
			</div>
		</div>
			</div>
	</div>
	
</section>

 -->