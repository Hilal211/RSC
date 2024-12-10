(function($) {
	
	"use strict";
	var theme_carousel_js = function($scope, $) {
		
		// Testimonial Slider
		if ($(".testimonial__nav").length > 0) {
			var slider_attr = $('.testimonial__nav').data('slider');
			var bannerSlider = new Swiper('.testimonial__nav', {
				loop: slider_attr.loop,
				slidesPerView: slider_attr.slidesperview,
				speed: 500,
				spaceBetween: slider_attr.spacebetween,
				autoplay: {
					enabled: true,
					delay: 6000
				},
				direction: "vertical",
				// Navigation arrows
				navigation: {
					nextEl: ".testimonial-button-next",
					prevEl: ".testimonial-button-prev",
				},
				//Pagination
				pagination: {
					el: ".swiper-pagination",
					clickable: true,
				},
				breakpoints: {
					'1600': {
						items:slider_attr.item_show
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
		}
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
		  
		  // Testimonial Slider
		if ($(".testimonial__thumb-active").length > 0) {
			var slider_attr = $('#yt-testi-slider-v2').data('slider');
			var bannerSlider = new Swiper('.testimonial__thumb-active', {
				loop: slider_attr.loop,
				slidesPerView: slider_attr.slidesperview,
				speed: 500,
				spaceBetween: slider_attr.spacebetween,
				autoplay: {
					enabled: true,
					delay: 6000
				},
				direction: "vertical",
				// Navigation arrows
				navigation: {
					nextEl: ".testimonial-button-next",
					prevEl: ".testimonial-button-prev",
				},
				//Pagination
				pagination: {
					el: ".swiper-pagination",
					clickable: true,
				},
				breakpoints: {
					'1400': {
						items:slider_attr.item_show
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
		}
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
		
	};
	
	$(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/turner_testimonial_carousel.default', theme_carousel_js);
    });	

})(window.jQuery);