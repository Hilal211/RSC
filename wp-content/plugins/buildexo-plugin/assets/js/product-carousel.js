(function($) {
	
	"use strict";
	var product_carousel_js = function($scope, $) {
		
		// portfolio slider	
		if ($(".shop-slider-active").length > 0) {
			var slider_attr = $('#yt-product-slider').data('slider');
			var bannerSlider = new Swiper('.shop-slider-active', {
				spaceBetween: slider_attr.spacebetween,
				slidesPerView: slider_attr.slidesperview,
				roundLengths: true,
				loop: slider_attr.loop,
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
						slidesPerView: slider_attr.slidesperview,
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
		}		
		
	};
	
	$(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/turner_product_carousel.default', product_carousel_js);
    });	

})(window.jQuery);