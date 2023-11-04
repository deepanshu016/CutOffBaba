$(document).ready(function(){
/////////////////////////////TESTIMONIAL//////////////////////
  var sliderSelector1 = ".slider-1 .swiper-container",
   options1 = {
      init: false,
      loop: true,
      speed: 800,
      slidesPerView: 2,
      slideToClickedSlide: true,
      autoplay: {
        delay: 2000,
      },
      // dynamicBullets: true,
      centeredSlides: true,
      observer: true,
      observeParents: true,
      effect: "coverflow",
      coverflowEffect: {
        rotate: 0,
        depth: 350,
        modifier: 1,
        slideShadows: false,
      },
      grabCursor: false,
      parallax: true,
      navigation: {
        nextEl: ".slider-1 .swiper-button-next",
        prevEl: ".slider-1 .swiper-button-prev",
      },
      breakpoints: {
        1023: {
          slidesPerView: 1,
          //spaceBetween: 0
        },
      },
      // Events
      on: {
        imagesReady: function () {
          this.el.classList.remove("loading");
        },
        slideChange: function () {
          var activeIndex = this.activeIndex;
          var realIndex = this.slides
            .eq(activeIndex)
            .attr("data-swiper-slide-index");
          $(".slider-1 .swiper-slide").removeClass(
            "swiper-slide-nth-prev-2 swiper-slide-nth-next-2"
          );
          $(
            '.slider-1 .swiper-slide[data-swiper-slide-index="' +
              realIndex +
              '"]'
          )
            .prev()
            .prev()
            .addClass("swiper-slide-nth-prev-2");
          $(
            '.slider-1 .swiper-slide[data-swiper-slide-index="' +
              realIndex +
              '"]'
          )
            .next()
            .next()
            .addClass("swiper-slide-nth-next-2");
        },
      },
    };
  var mySwiper1 = new Swiper(sliderSelector1, options1);
  mySwiper1.init();

/////////////////////////////TESTIMONIAL END//////////////////////
/////////////////////////////TESTIMONIAL//////////////////////
  var sliderSelector2 = ".slider-2 .swiper-container",
   options2 = {
      init: false,
      loop: true,
      speed: 800,
      slidesPerView: 2,
      slideToClickedSlide: true,
      autoplay: {
        delay: 2000,
      },
      // dynamicBullets: true,
      centeredSlides: true,
      observer: true,
      observeParents: true,
      effect: "coverflow",
      coverflowEffect: {
        rotate: 0,
        depth: 350,
        modifier: 1,
        slideShadows: false,
      },
      grabCursor: false,
      parallax: true,
      navigation: {
        nextEl: ".slider-2 .swiper-button-next",
        prevEl: ".slider-2 .swiper-button-prev",
      },
      breakpoints: {
        1023: {
          slidesPerView: 1,
          //spaceBetween: 0
        },
      },
      // Events
      on: {
        imagesReady: function () {
          this.el.classList.remove("loading");
        },
        slideChange: function () {
          var activeIndex = this.activeIndex;
          var realIndex = this.slides
            .eq(activeIndex)
            .attr("data-swiper-slide-index");
          $(".slider-2 .swiper-slide").removeClass(
            "swiper-slide-nth-prev-2 swiper-slide-nth-next-2"
          );
          $(
            '.slider-2 .swiper-slide[data-swiper-slide-index="' +
              realIndex +
              '"]'
          )
            .prev()
            .prev()
            .addClass("swiper-slide-nth-prev-2");
          $(
            '.slider-2 .swiper-slide[data-swiper-slide-index="' +
              realIndex +
              '"]'
          )
            .next()
            .next()
            .addClass("swiper-slide-nth-next-2");
        },
      },
    };
  var mySwiper2 = new Swiper(sliderSelector2, options2);
  mySwiper2.init();

/////////////////////////////TESTIMONIAL END//////////////////////
  
  /////////////////////////////TESTIMONIAL//////////////////////
  var sliderSelector3 = ".slider-3 .swiper-container",
   options3 = {
      init: false,
      loop: true,
      speed: 800,
      slidesPerView: 3,
      slideToClickedSlide: true,
      autoplay: {
        delay: 2000,
      },
      // dynamicBullets: true,
      centeredSlides: true,
      observer: true,
      observeParents: true,
      effect: "coverflow",
      coverflowEffect: {
        rotate: 0,
        depth: 350,
        modifier: 1,
        slideShadows: false,
      },
      grabCursor: false,
      parallax: true,
      navigation: {
        nextEl: ".slider-3 .swiper-button-next",
        prevEl: ".slider-3 .swiper-button-prev",
      },
      breakpoints: {
        1023: {
          slidesPerView: 1,
          //spaceBetween: 0
        },
      },
      // Events
      on: {
        imagesReady: function () {
          this.el.classList.remove("loading");
        },
        slideChange: function () {
          var activeIndex = this.activeIndex;
          var realIndex = this.slides
            .eq(activeIndex)
            .attr("data-swiper-slide-index");
          $(".slider-3 .swiper-slide").removeClass(
            "swiper-slide-nth-prev-2 swiper-slide-nth-next-2"
          );
          $(
            '.slider-3 .swiper-slide[data-swiper-slide-index="' +
              realIndex +
              '"]'
          )
            .prev()
            .prev()
            .addClass("swiper-slide-nth-prev-2");
          $(
            '.slider-3 .swiper-slide[data-swiper-slide-index="' +
              realIndex +
              '"]'
          )
            .next()
            .next()
            .addClass("swiper-slide-nth-next-2");
        },
      },
    };
  var mySwiper3 = new Swiper(sliderSelector3, options3);
  mySwiper3.init();

/////////////////////////////TESTIMONIAL END//////////////////////
});
