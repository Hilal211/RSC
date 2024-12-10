(function($) {
	
	"use strict";
	var cs_counter_js = function($scope, $) {
		
		// odometer counter start
		if ($(".odometer").length) {
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
		}
		// odometer counter end
		
	};
	$(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/turner_icon_box.default', cs_counter_js);
    });	

})(window.jQuery);



