$(document).ready(function(){
  const heroSlider = new Swiper(".hero-slider", {
     loop: true,
     effect: 'fade',
     observeParents: true,

     observer: true,
    // autoplay: {
    //     delay: 4500,
    // },
    fadeEffect: {
      crossFade: true,
    },
  });
  const swiperQuiz = new Swiper(".animeslide", {
  // Optional parameters
  effect: "fade",
  loop: true,
  // speed: 900,
  //   autoplay: {
  //       delay: 4500,
  //   },
  centeredSlides: true,
 
  
  scrollbar: {
 
    draggable: true
  },
  keyboard: {
    enabled: true,
    onlyInViewport: false
  },
  runCallbacksOnInit: true
});

   
  var sliderSelector = ".slider-1 .swiper-container",
    options = {
      init: true,
      loop: true,
      speed: 300,
      slidesPerView: 3,
      slideToClickedSlide: true,
     /* autoplay: {
        delay: 5000,
      },*/
      dynamicBullets: true,
      centeredSlides: true,
      observer: true,
      observeParents: true,
      effect: "coverflow",
      coverflowEffect: {
        rotate:0,
        depth: 350,
        modifier: 1,
        slideShadows: true,
      },
      grabCursor: false,
      parallax: true,
      navigation: {
        nextEl: ".slider-1 .swiper-button-next",
        prevEl: ".slider-1 .swiper-button-prev",
      },
      // navigation arrows
      nextButton: "#js-prev1",
      prevButton: "#js-next1",
      breakpoints: {
        1023: {
          slidesPerView: 1,
          //spaceBetween: 0
        },
        767: {
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
  var mySwiper = new Swiper(sliderSelector, options);
  mySwiper.init();

  // var sliderSelector2 = ".slider-2 .swiper-container",
  //   options2 = {
  //     init: false,
  //     loop: true,
  //     speed: 800,
  //     slidesPerView: 3,
  //     slideToClickedSlide: true,
  //     observer: true,
  //     observeParents: true,
  //     dynamicBullets: true,
  //     centeredSlides: true,
  //     effect: "coverflow",
  //     coverflowEffect: {
  //       rotate: 120,
  //       depth: 350,
  //       modifier: 1,
  //       slideShadows: true,
  //     },
  //     grabCursor: false,
  //     parallax: true,
  //     pagination: {
  //         el: '.slider-2 .swiper-pagination',
  //         clickable: true,
  //     },
  //     navigation: {
  //       nextEl: ".slider-2 .swiper-button-next",
  //       prevEl: ".slider-2 .swiper-button-prev",
  //     },
  //     // navigation arrows
  //     nextButton: "#js-prev2",
  //     prevButton: "#js-next2",
  //     breakpoints: {
  //       1023: {
  //         slidesPerView: 1,
  //         //spaceBetween: 0
  //       },
  //     },
  //     // Events
  //     on: {
  //       imagesReady: function () {
  //         this.el.classList.remove("loading");
  //       },
  //       slideChange: function () {
  //         var activeIndex = this.activeIndex;
  //         var realIndex = this.slides
  //           .eq(activeIndex)
  //           .attr("data-swiper-slide-index");
  //         $(".slider-2 .swiper-slide").removeClass(
  //           "swiper-slide-nth-prev-2 swiper-slide-nth-next-2"
  //         );
  //         $(
  //           '.slider-2 .swiper-slide[data-swiper-slide-index="' +
  //             realIndex +
  //             '"]'
  //         )
  //           .prev()
  //           .prev()
  //           .addClass("swiper-slide-nth-prev-2");
  //         $(
  //           '.slider-2 .swiper-slide[data-swiper-slide-index="' +
  //             realIndex +
  //             '"]'
  //         )
  //           .next()
  //           .next()
  //           .addClass("swiper-slide-nth-next-2");
  //       },
  //     },
  //   };
  // var mySwiper2 = new Swiper(sliderSelector2, options2);
  // mySwiper2.init();

  // var sliderSelector3 = ".slider-3 .swiper-container",
  //   options3 = {
  //     init: false,
  //     loop: true,
  //     speed: 800,
  //     observer: true,
  //     observeParents: true,
  //     slidesPerView: 3,
  //     slideToClickedSlide: true,
  //     // dynamicBullets: true,
  //     centeredSlides: true,
  //     effect: "coverflow",
  //     coverflowEffect: {
  //       rotate: 70,
  //       depth: 350,
  //       modifier: 1,
  //       slideShadows: false,
  //     },
  //     grabCursor: false,
  //     parallax: true,
  //     // pagination: {
  //     //     el: '.slider-3 .swiper-pagination',
  //     //     clickable: true,
  //     // },
  //     navigation: {
  //       nextEl: ".slider-3 .swiper-button-next",
  //       prevEl: ".slider-3 .swiper-button-prev",
  //     },
  //     // navigation arrows
  //     nextButton: "#js-prev3",
  //     prevButton: "#js-next3",
  //     breakpoints: {
  //       1023: {
  //         slidesPerView: 1,
  //         //spaceBetween: 0
  //       },
  //     },
  //     // Events
  //     on: {
  //       imagesReady: function () {
  //         this.el.classList.remove("loading");
  //       },
  //       slideChange: function () {
  //         var activeIndex = this.activeIndex;
  //         var realIndex = this.slides
  //           .eq(activeIndex)
  //           .attr("data-swiper-slide-index");
  //         $(".slider-3 .swiper-slide").removeClass(
  //           "swiper-slide-nth-prev-2 swiper-slide-nth-next-2"
  //         );
  //         $(
  //           '.slider-3 .swiper-slide[data-swiper-slide-index="' +
  //             realIndex +
  //             '"]'
  //         )
  //           .prev()
  //           .prev()
  //           .addClass("swiper-slide-nth-prev-2");
  //         $(
  //           '.slider-3 .swiper-slide[data-swiper-slide-index="' +
  //             realIndex +
  //             '"]'
  //         )
  //           .next()
  //           .next()
  //           .addClass("swiper-slide-nth-next-2");
  //       },
  //     },
  //   };
  // var mySwiper3 = new Swiper(sliderSelector3, options3);
  // mySwiper3.init();

  // var sliderSelector4 = ".slider-4 .swiper-container",
  // options4 = {
  //     loop: true,
  //     slidesPerView: 3,
  //     slideToClickedSlide: true,
  //     autoplay: {
  //       delay: 5000,
  //     },
  //     // dynamicBullets: true,
  //     centeredSlides: true,
  //     observer: true,
  //     observeParents: true,
  //     effect: "coverflow",
  //     coverflowEffect: {
  //       rotate: 0,
  //       depth: 350,
  //       modifier: 1,
  //       slideShadows: false,
  //     },
  //     grabCursor: false,
  //     parallax: true,
  //     // pagination: {
  //     //     el: '.slider-1 .swiper-pagination',
  //     //     clickable: true,
  //     // },
  //     navigation: {
  //       nextEl: ".slider-4 .swiper-button-next",
  //       prevEl: ".slider-4 .swiper-button-prev",
  //     },
  //     // navigation arrows
  //     nextButton: "#js-prev4",
  //     prevButton: "#js-next4",
  //     breakpoints: {
  //        640: {
  //         slidesPerView: 1,
  //         spaceBetween: 20,
  //       },
  //       768: {
  //         slidesPerView: 1,
  //         spaceBetween: 40,
  //       },
  //       1024: {
  //         slidesPerView: 2,
  //         spaceBetween: 50,
  //       },
  //     },
  //     // Events
  //     on: {
  //       imagesReady: function () {
  //         this.el.classList.remove("loading");
  //       },
  //       slideChange: function () {
  //         var activeIndex = this.activeIndex;
  //         var realIndex = this.slides
  //           .eq(activeIndex)
  //           .attr("data-swiper-slide-index");
  //         $(".slider-4 .swiper-slide").removeClass(
  //           "swiper-slide-nth-prev-2 swiper-slide-nth-next-2"
  //         );
  //         $(
  //           '.slider-4 .swiper-slide[data-swiper-slide-index="' +
  //             realIndex +
  //             '"]'
  //         )
  //           .prev()
  //           .prev()
  //           .addClass("swiper-slide-nth-prev-2");
  //         $(
  //           '.slider-4 .swiper-slide[data-swiper-slide-index="' +
  //             realIndex +
  //             '"]'
  //         )
  //           .next()
  //           .next()
  //           .addClass("swiper-slide-nth-next-2");
  //       },
  //     },
  //   };
  // var mySwiper4 = new Swiper(sliderSelector4, options4);
  // mySwiper4.init();
/////////////////////////////TESTIMONIAL//////////////////////
  // var sliderSelector5 = ".slider-5 .swiper-container",
  //  options5 = {
  //     init: false,
  //     loop: true,
  //     speed: 800,
  //     slidesPerView: 3,
  //     slideToClickedSlide: true,
  //     autoplay: {
  //       delay: 2000,
  //     },
  //     // dynamicBullets: true,
  //     centeredSlides: true,
  //     observer: true,
  //     observeParents: true,
  //     effect: "coverflow",
  //     coverflowEffect: {
  //       rotate: 0,
  //       depth: 350,
  //       modifier: 1,
  //       slideShadows: false,
  //     },
  //     grabCursor: false,
  //     parallax: true,
  //     // pagination: {
  //     //     el: '.slider-1 .swiper-pagination',
  //     //     clickable: true,
  //     // },
  //     navigation: {
  //       nextEl: ".slider-5 .swiper-button-next",
  //       prevEl: ".slider-5 .swiper-button-prev",
  //     },
  //     // navigation arrows
  //     nextButton: "#js-prev5",
  //     prevButton: "#js-next5",
  //     breakpoints: {
  //       1023: {
  //         slidesPerView: 1,
  //         //spaceBetween: 0
  //       },
  //     },
  //     // Events
  //     on: {
  //       imagesReady: function () {
  //         this.el.classList.remove("loading");
  //       },
  //       slideChange: function () {
  //         var activeIndex = this.activeIndex;
  //         var realIndex = this.slides
  //           .eq(activeIndex)
  //           .attr("data-swiper-slide-index");
  //         $(".slider-5 .swiper-slide").removeClass(
  //           "swiper-slide-nth-prev-2 swiper-slide-nth-next-2"
  //         );
  //         $(
  //           '.slider-5 .swiper-slide[data-swiper-slide-index="' +
  //             realIndex +
  //             '"]'
  //         )
  //           .prev()
  //           .prev()
  //           .addClass("swiper-slide-nth-prev-2");
  //         $(
  //           '.slider-5 .swiper-slide[data-swiper-slide-index="' +
  //             realIndex +
  //             '"]'
  //         )
  //           .next()
  //           .next()
  //           .addClass("swiper-slide-nth-next-2");
  //       },
  //     },
  //   };
  // var mySwiper5 = new Swiper(sliderSelector5, options5);
  // mySwiper5.init();

/////////////////////////////TESTIMONIAL END//////////////////////

});
