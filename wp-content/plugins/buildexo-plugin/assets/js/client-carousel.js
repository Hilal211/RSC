(function($) {
	
	"use strict";
	var theme_carousel_js = function($scope, $) {
		
		if ($(".brand__active").length > 0) {
			var slider_attr = $('#yt-client-slider').data('slider');
			var bannerSlider = new Swiper('.brand__active', {
				loop: slider_attr.loop,
				slidesPerView: slider_attr.slidesperview,
				speed: 500,
				roundLengths: true,
				spaceBetween: slider_attr.spacebetween,
				autoplay: {
					enabled: true,
					delay: 6000
				},
				//Pagination
				pagination: {
					el: ".swiper-pagination",
					clickable: true,
				},
				// Navigation arrows
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev',
					clickable: true,
				},
				breakpoints: {
					'1600': {
						items:slider_attr.item_show
					},
					'1200': {
						slidesPerView: 5,
					},
					'992': {
						slidesPerView: 4,
					},
					'768': {
						slidesPerView: 3,
					},
					'576': {
						slidesPerView: 2,
					},
					'0': {
						slidesPerView: 2,
					},
				},
				
			});
		}
				
	};
	
	$(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/turner_client_carousel.default', theme_carousel_js);
    });	

})(window.jQuery);