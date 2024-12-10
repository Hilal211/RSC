(function($) {
	
	"use strict";
	var theme_carousel_js = function($scope, $) {
		
		let thmOwlCarousels = $(".thm-owl__carousel");
		if (thmOwlCarousels.length) {
			thmOwlCarousels.each(function () {
				let elm = $(this);
				let options = elm.data("owl-options");
				let thmOwlCarousel = elm.owlCarousel(
					"object" === typeof options ? options : JSON.parse(options)
				);
			});
		}
	
		let thmOwlNavCarousels = $(".thm-owl__carousel--custom-nav");
		if (thmOwlNavCarousels.length) {
			thmOwlNavCarousels.each(function () {
				let elm = $(this);
				let owlNavPrev = elm.data("owl-nav-prev");
				let owlNavNext = elm.data("owl-nav-next");
				$(owlNavPrev).on("click", function (e) {
					elm.trigger("prev.owl.carousel");
					e.preventDefault();
				});
	
				$(owlNavNext).on("click", function (e) {
					elm.trigger("next.owl.carousel");
					e.preventDefault();
				});
			});
		}
		
	};
	
	$(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/turner_our_services_2.default', theme_carousel_js);
    });	

})(window.jQuery);