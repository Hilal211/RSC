(function($) {
	
	"use strict";
	var cs_counter_js = function($scope, $) {
		
		//  Countdown
		$('[data-countdown]').each(function () {
	
			var $this = $(this),
				finalDate = $(this).data('countdown');
			if (!$this.hasClass('countdown-full-format')) {
				$this.countdown(finalDate, function (event) {
					$this.html(event.strftime('<div class="single"><h1>%D</h1><p>Days</p></div> <div class="single"><h1>%H</h1><p>Hours</p></div> <div class="single"><h1>%M</h1><p>Minutes</p></div> <div class="single"><h1>%S</h1><p>Second</p></div>'));
				});
			} else {
				$this.countdown(finalDate, function (event) {
					$this.html(event.strftime('<div class="single"><h1>%Y</h1><p>Years</p></div> <div class="single"><h1>%m</h1><p>Months</p></div> <div class="single"><h1>%W</h1><p>Weeks</p></div> <div class="single"><h1>%d</h1><p>Days</p></div> <div class="single"><h1>%H</h1><p>Hours</p></div> <div class="single"><h1>%M</h1><p>Minutes</p></div> <div class="single"><h1>%S</h1><p>Second</p></div>'));
				});
			}
		});
	};
	$(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/turner_coming_soon.default', cs_counter_js);
    });	

})(window.jQuery);



