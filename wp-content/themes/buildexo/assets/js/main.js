(function ($) {
	"use strict";

	jQuery(window).on('scroll', function() {
		if (jQuery(window).scrollTop() > 250) {
			jQuery('.tur-header-section').addClass('sticky-on')
		} else {
			jQuery('.tur-header-section').removeClass('sticky-on')
		}
	});
	$('.open_mobile_menu').on("click", function() {
		$('.mobile_menu_wrap').toggleClass("mobile_menu_on");
	});
	$('.open_mobile_menu').on('click', function () {
		$('body').toggleClass('mobile_menu_overlay_on');
	});
	if($('.mobile_menu li.dropdown ul').length){
		$('.mobile_menu li.dropdown').append('<div class="dropdown-btn"><span class="fas fa-caret-right"></span></div>');
		$('.mobile_menu li.dropdown .dropdown-btn').on('click', function() {
			$(this).prev('ul').slideToggle(500);
		});
	}
	$(".dropdown-btn").on("click", function () {
		$(this).toggleClass("toggle-open");
	});

	// preloader

	$(window).on('load', function(){
		$('#tx-loadding').fadeOut('slow',function(){$(this).remove();});
	});


	//=======================
	// header search
	$(".header-search-btn").on("click", function (e) {
		e.preventDefault();
		$(".header-search-form-wrapper").addClass("open");
		$('.header-search-form-wrapper input[type="search"]').focus();
		$('.body-overlay').addClass('active');
	});
	$(".tx-search-close").on("click", function (e) {
		e.preventDefault();
		$(".header-search-form-wrapper").removeClass("open");
		$("body").removeClass("active");
		$('.body-overlay').removeClass('active');
	});
	//=======================


	// mobile menu start
	$('#mobile-menu-active').metisMenu();

	$('#mobile-menu-active .dropdown > a').on('click', function (e) {
		e.preventDefault();
	});

	$(".hamburger_menu > a").on("click", function (e) {
		e.preventDefault();
		$(".slide-bar").toggleClass("show");
		$("body").addClass("on-side");
		$('.body-overlay').addClass('active');
		$(this).addClass('active');
	});

	$(".close-mobile-menu > a").on("click", function (e) {
		e.preventDefault();
		$(".slide-bar").removeClass("show");
		$("body").removeClass("on-side");
		$('.body-overlay').removeClass('active');
		$('.hamburger_menu > a').removeClass('active');
	});
	// mobile menu end

	// testimonial
	var swiper = new Swiper(".testimonial__nav", {
		loop: true,
		spaceBetween: 20,
		speed: 500,
		slidesPerView: 2,
		direction: "vertical",
		navigation: {
			nextEl: ".testimonial-button-next",
			prevEl: ".testimonial-button-prev",
		  },
		autoplay: {
			enabled: true,
			delay: 6000
		},
		breakpoints: {
			'1400': {
				slidesPerView: 2,
			},
			'1200': {
				slidesPerView: 2,
			},
			'992': {
				slidesPerView: 2,
			},
			'768': {
				slidesPerView: 2,
			},
			'577': {
				slidesPerView: 2,
			},
			'0': {
				slidesPerView: 2,
				direction: "horizontal",
			},
		},
	  });
	  var swiper2 = new Swiper(".testimonial__active", {
		loop: true,
		spaceBetween: 10,
		speed: 500,
		effect: 'fade',
		navigation: {
			nextEl: ".testimonial-button-next",
			prevEl: ".testimonial-button-prev",
		  },
		autoplay: {
			enabled: true,
			delay: 6000
		},
		slidesPerView: 1,
		thumbs: {
		  swiper: swiper,
		},
	  });

	  // testimonial
	var swiper = new Swiper(".testimonial__thumb-active", {
		loop: true,
		spaceBetween: 20,
		speed: 500,
		slidesPerView: 2,
		direction: "vertical",
		centeredSlides: true,
		navigation: {
			nextEl: ".testimonial-button-next",
			prevEl: ".testimonial-button-prev",
		  },
		autoplay: {
			enabled: true,
			delay: 6000
		},
		breakpoints: {
			'1400': {
				slidesPerView: 3,
			},
			'1200': {
				slidesPerView: 3,
			},
			'992': {
				slidesPerView: 3,
			},
			'768': {
				slidesPerView: 3,
			},
			'577': {
				slidesPerView: 3,
			},
			'0': {
				slidesPerView: 3,
			},
		},
	  });
	  var swiper2 = new Swiper(".testimonial__content-active", {
		loop: true,
		spaceBetween: 10,
		speed: 500,
		effect: 'fade',
		navigation: {
			nextEl: ".testimonial-button-next",
			prevEl: ".testimonial-button-prev",
		  },
		autoplay: {
			enabled: true,
			delay: 6000
		},
		slidesPerView: 1,
		thumbs: {
		  swiper: swiper,
		},
	  });



	// body overlay
	$('.body-overlay').on('click', function () {
		$(this).removeClass('active');
		$(".slide-bar").removeClass("show");
		$("body").removeClass("on-side");
		$('.hamburger-menu > a').removeClass('active');
		$(".header-search-form-wrapper").removeClass("open");
	});


	// Off Canvas - Start
	// --------------------------------------------------
	$(document).ready(function () {
		$('.cart_close_btn, .body-overlay').on('click', function () {
		$('.cart_sidebar').removeClass('active');
		$('.body-overlay').removeClass('active');
		});

		$('.header-cart-btn').on('click', function () {
		$('.cart_sidebar').addClass('active');
		$('.body-overlay').addClass('active');
		});
	});


	// sidebar info start
	// --------------------------------------------------
	$(document).ready(function () {
		$('.sidebar-menu-close, .body-overlay').on('click', function () {
		$('.offcanvas-sidebar').removeClass('active');
		$('.body-overlay').removeClass('active');
		});

		$('.offcanvas-sidebar-btn').on('click', function () {
		$('.offcanvas-sidebar').addClass('active');
		$('.body-overlay').addClass('active');
		});
	});






	//data background
	$("[data-background]").each(function () {
		$(this).css("background-image", "url(" + $(this).attr("data-background") + ") ")
	})

	// data bg color
	$("[data-bg-color]").each(function () {
		$(this).css("background-color", $(this).attr("data-bg-color"));

	});


	// Elements Animation
	if($('.wow').length){
		var wow = new WOW(
		  {
			boxClass:     'wow',      // animated element css class (default is wow)
			animateClass: 'animated', // animation css class (default is animated)
			offset:       0,          // distance to the element when triggering the animation (default is 0)
			mobile:       true,       // trigger animations on mobile devices (default is true)
			live:         true       // act on asynchronously loaded content (default is true)
		  }
		);
		wow.init();
	}

	// shop slider
	var slider = new Swiper('.shop-slider-active', {
		spaceBetween: 50,
		slidesPerView: 3,
		roundLengths: true,
		loop: true,
		autoplay: {
			enabled: true,
			delay: 6000
		},
		speed: 400,
		navigation: {
			nextEl: ".tx-button-next",
			prevEl: ".tx-button-prev",
		},
		breakpoints: {
			'1600': {
				slidesPerView: 3,
			},
			'1200': {
				slidesPerView: 3,
			},
			'992': {
				slidesPerView: 2,
			},
			'768': {
				slidesPerView: 2,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});




	  if ($(".progress-bar").length) {
		var $progress_bar = $('.progress-bar');
		$progress_bar.appear();
		$(document.body).on('appear', '.progress-bar', function() {
			var current_item = $(this);
			if (!current_item.hasClass('appeared')) {
				var percent = current_item.data('percent');
				current_item.css('width', percent + '%').addClass('appeared').parent().append('<span>' + percent + '%' + '</span>');
			}

		});
	}

	if($('.progress-line').length){
		$('.progress-line').appear(function(){
			var el = $(this);
			var percent = el.data('width');
			$(el).css('width',percent+'%');
		},{accY: 0});
	}

	// banner paralax
	jQuery('.jarallax').jarallax({
		speed: 0.5,
	});

	// Accordion Box start
	if ($(".accordion_box").length) {
		$(".accordion_box").on("click", ".acc-btn", function () {
			var outerBox = $(this).parents(".accordion_box");
			var target = $(this).parents(".accordion");

			if ($(this).next(".acc_body").is(":visible")) {
				$(this).removeClass("active");
				$(this).next(".acc_body").slideUp(300);
				$(outerBox).children(".accordion").removeClass("active-block");
			} else {
				$(outerBox).find(".accordion .acc-btn").removeClass("active");
				$(this).addClass("active");
				$(outerBox).children(".accordion").removeClass("active-block");
				$(outerBox).find(".accordion").children(".acc_body").slideUp(300);
				target.addClass("active-block");
				$(this).next(".acc_body").slideDown(300);
			}
		});
	}
	// Accordion Box end

	// isotop
	$('.grid').imagesLoaded( function() {
		// init Isotope
		var $grid = $('.grid').isotope({
		itemSelector: '.grid-item',
		percentPosition: true,
		masonry: {
			// use outer width of grid-sizer for columnWidth
			columnWidth: '.grid-item',
		}
		});

	// filter items on button click
		$('.portfolio__menu').on( 'click', 'button', function() {
			var filterValue = $(this).attr('data-filter');
			$grid.isotope({ filter: filterValue });
		});
	});

	//for menu active class
	$('.portfolio__menu button').on('click', function(event) {
		$(this).siblings('.active').removeClass('active');
		$(this).addClass('active');
		event.preventDefault();
	});



	/* magnificPopup img view */
	$('.popup-image').magnificPopup({
		type: 'image',
		gallery: {
			enabled: true
		}
	});

	/* magnificPopup video view */
	$('.popup-video').magnificPopup({
		type: 'iframe',
		mainClass: 'mfp-zoom-in',
	});

	$(document).ready(function() {

	var progressPath = document.querySelector('.progress-wrap path');
		var pathLength = progressPath.getTotalLength();
		progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
		progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
		progressPath.style.strokeDashoffset = pathLength;
		progressPath.getBoundingClientRect();
		progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
		var updateProgress = function () {
			var scroll = $(window).scrollTop();
			var height = $(document).height() - $(window).height();
			var progress = pathLength - (scroll * pathLength / height);
			progressPath.style.strokeDashoffset = progress;
		}
		updateProgress();
		$(window).scroll(updateProgress);
		var offset = 50;
		var duration = 550;
		jQuery(window).on('scroll', function() {
			if (jQuery(this).scrollTop() > offset) {
				jQuery('.progress-wrap').addClass('active-progress');
			} else {
				jQuery('.progress-wrap').removeClass('active-progress');
			}
		});
		jQuery('.progress-wrap').on('click', function(event) {
			event.preventDefault();
			jQuery('html, body').animate({scrollTop: 0}, duration);
			return false;
		})

	});

	$(document).ready(function() {
		var st = $(".tx-split-text");
        if(st.length == 0) return;
        gsap.registerPlugin(SplitText);
        st.each(function(index, el) {
            el.split = new SplitText(el, {
                type: "lines,words,chars",
                linesClass: "split-line"
            });
            gsap.set(el, { perspective: 400 });

            if( $(el).hasClass('split-in-fade') ){
                gsap.set(el.split.chars, {
                    opacity: 0,
                    ease: "Back.easeOut",
                });
            }
            if( $(el).hasClass('split-in-right') ){
                gsap.set(el.split.chars, {
                    opacity: 0,
                    x: "50",
                    ease: "Back.easeOut",
                });
            }
            if( $(el).hasClass('split-in-left') ){
                gsap.set(el.split.chars, {
                    opacity: 0,
                    x: "-50",
                    ease: "circ.out",
                });
            }
            if( $(el).hasClass('split-in-up') ){
                gsap.set(el.split.chars, {
                    opacity: 0,
                    y: "80",
                    ease: "circ.out",
                });
            }
            if( $(el).hasClass('split-in-down') ){
                gsap.set(el.split.chars, {
                    opacity: 0,
                    y: "-80",
                    ease: "circ.out",
                });
            }
            if( $(el).hasClass('split-in-rotate') ){
                gsap.set(el.split.chars, {
                    opacity: 0,
                    rotateX: "50deg",
                    ease: "circ.out",
                });
            }
            if( $(el).hasClass('split-in-scale') ){
                gsap.set(el.split.chars, {
                    opacity: 0,
                    scale: "0.5",
                    ease: "circ.out",
                });
            }
            el.anim = gsap.to(el.split.chars, {
                scrollTrigger: {
                    trigger: el,
                    // toggleActions: "restart pause resume reverse",
                    start: "top 90%",
                },
                x: "0",
                y: "0",
                rotateX: "0",
                scale: 1,
                opacity: 1,
                duration: 0.8,
                stagger: 0.02,
            });
        });
	});

	/*----------------------------
	= SHOP PRICE SLIDER
    ------------------------------ */
    if($("#slider-range").length) {
        $("#slider-range").slider({
            range: true,
            min: 12,
            max: 200,
            values: [0, 100],
            slide: function(event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });

        $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));
    }




	/*------------------------------------------
    = TOUCHSPIN FOR PRODUCT SINGLE PAGE
    -------------------------------------------*/
    if ($("input.product-count").length) {
        $("input.product-count").TouchSpin({
            min: 1,
            max: 1000,
            step: 1,
            buttondown_class: "btn btn-link",
            buttonup_class: "btn btn-link",
        });
    }


	$(window).on('load', function(){
		const boxes = gsap.utils.toArray('.tx-animation-style1,.feature-img-animation');
		boxes.forEach(img => {
			gsap.to(img, {
				scrollTrigger: {
					trigger: img,
					start: "top 70%",
					end: "bottom bottom",
					toggleClass: "active",
					once: true,
				}
			});
		});
	});

	// Sponsor slider
	function sponsorFourActive($scope, $) {
	var slider = new Swiper('.tur-sponsor-slider', {
		spaceBetween: 30,
		slidesPerView: 5,
		roundLengths: true,
		loop: true,
		loopAdditionalSlides: 30,
		autoplay: {
			enabled: true,
			delay: 6000
		},
		speed: 400,
		breakpoints: {
			'1600': {
				slidesPerView: 5,
			},
			'1200': {
				slidesPerView: 4,
			},
			'992': {
				slidesPerView: 4,
			},
			'768': {
				slidesPerView: 4,
			},
			'576': {
				slidesPerView: 3,
			},
			'0': {
				slidesPerView: 2,
			},
		},
	});}
	function serviceCarouselActive($scope, $) {
	var slider = new Swiper('.tur-service-slider', {
		spaceBetween: 30,
		slidesPerView: 4,
		roundLengths: true,
		loop: true,
		loopAdditionalSlides: 30,
		autoplay: {
			enabled: true,
			delay: 6000
		},
		speed: 400,
		navigation: {
			nextEl: ".tur-service-button-next",
			prevEl: ".tur-service-button-prev",
		},
		breakpoints: {
			'1600': {
				slidesPerView: 4,
			},
			'1200': {
				slidesPerView: 4,
			},
			'992': {
				slidesPerView: 3,
			},
			'768': {
				slidesPerView: 2,
			},
			'576': {
				slidesPerView: 2,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});}

	$(document).on('click', '.tur-faq-accordion .accordion-item', function(){
		$(this).addClass('faq_on').siblings().removeClass('faq_on')
	});

	// CTA slider
	function ctaSLiderActive($scope, $) {
	var slider = new Swiper('.tur-cta-slider', {
		loop: true,
		spaceBetween: 0,
		slidesPerView: 1.4,
		centeredSlides: true,
		speed: 800,
		navigation: {
			nextEl: ".tur-cta-button-next",
			prevEl: ".tur-cta-button-prev",
		},
	});}

	function backgroundImageActive($scope, $) {
	$("[data-background]").each(function () {
		$(this).css("background-image", "url(" + $(this).attr("data-background") + ") ")
	})}



// Project slider
function projectActive($scope, $) {
var slider = new Swiper('.tur-project-slider', {
	spaceBetween: 30,
	slidesPerView: 3,
	roundLengths: true,
	loop: true,
	loopAdditionalSlides: 30,
	autoplay: {
		enabled: true,
		delay: 6000
	},
	speed: 400,
	navigation: {
		nextEl: ".tur-project-button-next",
		prevEl: ".tur-project-button-prev",
	},
	breakpoints: {
		'1600': {
			slidesPerView: 3,
		},
		'1200': {
			slidesPerView: 3,
		},
		'992': {
			slidesPerView: 2,
		},
		'768': {
			slidesPerView: 2,
		},
		'576': {
			slidesPerView: 1,
		},
		'0': {
			slidesPerView: 1,
		},
	},
});}

	// Main Slider
	function herosliderActive($scope, $) {
	var slider = new Swiper('.main-slider', {
		slidesPerView: 1,
		spaceBetween: 0,
		loop: false,
		autoplay: {
			enabled: true,
			delay: 6000
		},
		// Navigation arrows
		navigation: {
			nextEl: '.main-slider_button-next',
			prevEl: '.main-slider_button-prev',
			clickable: true,
		},
		//Pagination
		pagination: {
			el: ".main-slider_pagination",
			clickable: true,
		},
		speed: 500,
		breakpoints: {
			'1600': {
				slidesPerView: 1,
			},
			'1200': {
				slidesPerView: 1,
			},
			'992': {
				slidesPerView: 1,
			},
			'768': {
				slidesPerView: 1,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});}

	function serviceSliderTwoActive($scope, $) {
		// Services Carousel
	var slider = new Swiper('.services-carousel', {
		slidesPerView: 3,
		spaceBetween: 30,
		loop: true,
		autoplay: {
			enabled: true,
			delay: 6000
		},
		// Navigation arrows
		navigation: {
			nextEl: '.service-one_button-next',
			prevEl: '.service-one_button-prev',
			clickable: true,
		},

		//Pagination
		pagination: {
			el: ".service-one_pagination",
			clickable: true,
			renderBullet: function (index, className) {
			  return '<span class="' + className + '">' + (index + 1) + "</span>.";
			},
		  },
		speed: 500,
		breakpoints: {
			'1600': {
				slidesPerView: 3,
			},
			'1200': {
				slidesPerView: 4,
			},
			'992': {
				slidesPerView: 3,
			},
			'768': {
				slidesPerView: 2,
			},
			'650': {
				slidesPerView: 2,
			},
			'600': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});
	}

	// Testimonial Carousel
	function testimonialActiveTwo($scope, $) {
	var slider = new Swiper('.testimonial-one_carousel', {
		slidesPerView: 1,
		spaceBetween: 0,
		loop: true,
		autoplay: {
			enabled: true,
			delay: 6000
		},
		// Navigation arrows
		navigation: {
			nextEl: '.testimonial-one_button-next',
			prevEl: '.testimonial-one_button-prev',
			clickable: true,
		},

		//Pagination
		pagination: {
			el: ".testimonial-one_pagination",
			clickable: true,
			renderBullet: function (index, className) {
			  return '<span class="' + className + '">' + (index + 1) + "</span>.";
			},
		  },
		speed: 500,
		breakpoints: {
			'1600': {
				slidesPerView: 1,
			},
			'1200': {
				slidesPerView: 1,
			},
			'992': {
				slidesPerView: 1,
			},
			'768': {
				slidesPerView: 1,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});}


	function projectCarouselActive($scope, $) {
	var slider = new Swiper('.project-one_carousel', {
		slidesPerView: 3,
		spaceBetween: 20,
		centeredSlides:true,
		loop: true,
		autoplay: {
			enabled: true,
			delay: 6000
		},
		// Navigation arrows
		navigation: {
			nextEl: '.project-one_button-next',
			prevEl: '.project-one_button-prev',
			clickable: true,
		},

		//Pagination
		pagination: {
			el: ".project-one_pagination",
			clickable: true,
			renderBullet: function (index, className) {
			  return '<span class="' + className + '">' + (index + 1) + "</span>.";
			},
		  },
		speed: 500,
		breakpoints: {
			'1600': {
				slidesPerView: 3,
			},
			'1200': {
				slidesPerView: 3,
			},
			'992': {
				slidesPerView: 3,
			},
			'768': {
				slidesPerView: 2,
			},
			'650': {
				slidesPerView: 2,
			},
			'620': {
				slidesPerView: 1,
			},
			'599': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});}

	if($('.count-box').length){
		$('.count-box').appear(function(){

			var $t = $(this),
				n = $t.find(".count-text").attr("data-stop"),
				r = parseInt($t.find(".count-text").attr("data-speed"), 10);

			if (!$t.hasClass("counted")) {
				$t.addClass("counted");
				$({
					countNum: $t.find(".count-text").text()
				}).animate({
					countNum: n
				}, {
					duration: r,
					easing: "linear",
					step: function() {
						$t.find(".count-text").text(Math.floor(this.countNum));
					},
					complete: function() {
						$t.find(".count-text").text(this.countNum);
					}
				});
			}

		},{accY: 0});
	}



	$('.odometer').appear();
	$(document.body).on('appear', '.odometer', function(e) {
		var odo = $(".odometer");
		odo.each(function() {
			var countNumber = $(this).attr("data-count");
			$(this).html(countNumber);
		});
		window.odometerOptions = {
			format: 'd',
		};
	});

	$(window).on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction('frontend/element_ready/turner_client_carousel.default', sponsorFourActive);
		elementorFrontend.hooks.addAction('frontend/element_ready/turner_service_carousel.default', serviceCarouselActive);
		elementorFrontend.hooks.addAction('frontend/element_ready/turner_cta_slider.default', ctaSLiderActive);
		elementorFrontend.hooks.addAction('frontend/element_ready/turner_cta_slider.default', backgroundImageActive);
		elementorFrontend.hooks.addAction('frontend/element_ready/turner_award_tab.default', backgroundImageActive);
		elementorFrontend.hooks.addAction('frontend/element_ready/turner_project_carousel.default', projectActive);
		elementorFrontend.hooks.addAction('frontend/element_ready/turner_Hero_Slider.default', herosliderActive);
		elementorFrontend.hooks.addAction('frontend/element_ready/turner_Service_Carousel_Two.default', serviceSliderTwoActive);
		elementorFrontend.hooks.addAction('frontend/element_ready/turner_Testimonial_Carousel_Two.default', testimonialActiveTwo);
		elementorFrontend.hooks.addAction('frontend/element_ready/turner_project_carousel_two.default', projectCarouselActive);
	});


})(jQuery);
