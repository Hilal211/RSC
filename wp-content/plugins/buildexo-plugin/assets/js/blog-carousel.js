(function($) {
	
	"use strict";
	var theme_carousel_js = function($scope, $) {
		
		// portfolio slider	
		if ($(".blog__slide").length > 0) {
			var slider_attr = $('#yt-blog-slider').data('slider');
			var bannerSlider = new Swiper('.blog__slide', {
				spaceBetween: slider_attr.spacebetween,
			slidesPerView: slider_attr.slidesperview,
			roundLengths: true,
			loop: slider_attr.loop,
			loopAdditionalSlides: 30,
			autoplay: {
				enabled: true,
				delay: 6000
			},
			speed: 400,
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
			navigation: {
				nextEl: ".blog-button-next",
				prevEl: ".blog-button-prev",
			},
			breakpoints: {
				'1600': {
					slidesPerView: slider_attr.slidesperview,
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
				'576': {
					slidesPerView: 1,
				},
				'0': {
					slidesPerView: 1,
				},
			},
				
			});
		}		
		
	};
	
	$(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/turner_news_carousel.default', theme_carousel_js);
    });	

})(window.jQuery);