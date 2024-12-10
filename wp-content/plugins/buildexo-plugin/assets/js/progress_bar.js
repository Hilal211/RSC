(function($) {
	
	"use strict";
	var progress_bar_js = function($scope, $) {
		
		if ($(".count-bar").length) {

			$(".count-bar").appear(
	
				function () {
	
					var el = $(this);
	
					var percent = el.data("percent");
	
					$(el).css("width", percent).addClass("counted");
	
				}, {
	
					accY: -50
	
				}
	
			);
	
		}
	
		if ($(".count-bar--no-appear").length) {
	
			$(".count-bar--no-appear").each(
	
				function () {
	
					var el = $(this);
	
					var percent = el.data("percent");
	
					$(el).css("width", percent).addClass("counted");
	
				}
	
			);
	
		}
		
	};
	
	$(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/turner_skills_widget.default', progress_bar_js);
    });	

})(window.jQuery);