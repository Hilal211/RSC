(function($) {
	
	"use strict";
	var theme_carousel_js = function($scope, $) {
		
		// portfolio slider	
		if ($(".portfolio-active").length > 0) {
		
			// portfolio slider
			var slider = new Swiper('.portfolio-active', {
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
						slidesPerView: 1,
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
            elementorFrontend.hooks.addAction('frontend/element_ready/turner_projects_tab.default', theme_carousel_js);
    });	

})(window.jQuery);