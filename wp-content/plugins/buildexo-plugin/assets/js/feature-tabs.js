(function($) {
	
	"use strict";
	var theme_carousel_js = function($scope, $) {
		
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
	
	};
	
	$(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/turner_feature_tabs.default', theme_carousel_js);
    });	

})(window.jQuery);