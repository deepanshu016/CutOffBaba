window.onload=()=>{function calcHeaderHeight(){document.querySelector("body").style.setProperty("--header-height",document.querySelector(".navbar-area").clientHeight+"px");}
calcHeaderHeight();window.onresize=()=>{calcHeaderHeight();};(function setScrollPosition(){window.onscroll=()=>{let scrollPosition=window.scrollY;if(scrollPosition>0){document.querySelector(".navbar-area").classList.add("sticky");}else{document.querySelector(".navbar-area").classList.remove("sticky");}};})();if(window.location.pathname=="/ImazeWorld/"){}};$(function(){"use strict";$(window).on("load",function(event){$(".preloader").delay(500).fadeOut(500);});var scrollLink=$(".page-scroll");$(window).scroll(function(){var scrollbarLocation=$(this).scrollTop();scrollLink.each(function(){var sectionOffset=$(this.hash).offset().top-73;if(sectionOffset<=scrollbarLocation){$(this).parent().addClass("active");$(this).parent().siblings().removeClass("active");}});});$('[data-toggle="sidebar"], .overlay-right').on("click",function(event){event.preventDefault();if($(".sidebar-right, .overlay-right").hasClass("open")){$(".sidebar-right, .overlay-right").removeClass("open");}else{$(".sidebar-right, .overlay-right").addClass("open");}
if(event.currentTarget.classList.contains("participate-btn")&&document.querySelectorAll("form").length==0){if(window.location.pathname.includes("ImazeWorld")){window.location.href="/ImazeWorld";}else{window.location.href="/";}}});new WOW().init();});function onlyNumberKey(evt){var ASCIICode=evt.which?evt.which:evt.keyCode;if(ASCIICode>31&&(ASCIICode<48||ASCIICode>57))return false;return true;}