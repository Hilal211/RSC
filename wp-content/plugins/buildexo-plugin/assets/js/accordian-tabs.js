(function($) {
	
	"use strict";
	var theme_carousel_js = function($scope, $) {
		
		// Accordion Box start
		
		// Accordion Box end	
	
	};
	
	$(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/turner_accordian.default', theme_carousel_js);
    });	

})(window.jQuery);