(function($) {
	
	"use strict";
	var theme_carousel_js = function($scope, $) {
		
		var design_one = $('.turner-main-slider-carousel'); 
        if(design_one.length){
            var slider_attr = $('#yt-slider').data('slider');
            $('.turner-main-slider-carousel').owlCarousel({
                animateOut: 'fadeOut',
    			animateIn: 'fadeIn',
				loop:slider_attr.infinite,
				margin:slider_attr.item_gap,
				nav:true,
				smartSpeed: slider_attr.autoplaySpeed,
				autoplay: slider_attr.autoplay,
				infinite: slider_attr.infinite,
				"navText": ["<span class=\"flaticon-left\"></span>","<span class=\"flaticon-right\"></span>"],			
                responsive:{
                   0:{
						items:1
					},
					600:{
						items:1
					},
					800:{
						items:1
					},
					1024:{
						items:1
					},		
					1200:{
						items:slider_attr.item_show
					}
                }
            });
        }
		
		var design_one = $('.turner-banner-single-item-carousel'); 
        if(design_one.length){
            var slider_attr = $('#yt-slider-v3').data('slider');
            $('.turner-banner-single-item-carousel').owlCarousel({
                loop:slider_attr.infinite,
				margin:slider_attr.item_gap,
				nav:true,
				smartSpeed: slider_attr.autoplaySpeed,
				autoplay: slider_attr.autoplay,
				infinite: slider_attr.infinite,
				"navText": ["<span class=\"flaticon-left\"></span>","<span class=\"flaticon-right\"></span>"],			
                responsive:{
                   0:{
						items:1
					},
					600:{
						items:1
					},
					800:{
						items:1
					},
					1024:{
						items:1
					},		
					1200:{
						items:slider_attr.item_show
					}
                }
            });
        }
		
		
		var design_one = $('.turner-banner-carousel'); 
        if(design_one.length){
            var slider_attr = $('#yt-slider-v2').data('slider');
            $('.turner-banner-carousel').owlCarousel({
                loop:slider_attr.infinite,
				margin:slider_attr.item_gap,
				nav:true,
				smartSpeed: slider_attr.autoplaySpeed,
				autoplay: slider_attr.autoplay,
				infinite: slider_attr.infinite,
				"navText": ["<span class=\"\"></span>","<span class=\"\"></span>"],			
                responsive:{
                   0:{
						items:1
					},
					600:{
						items:1
					},
					800:{
						items:1
					},
					1024:{
						items:1
					},	
					1200:{
						items:slider_attr.item_show
					}
                }
            });
        }
		
		var design_one = $('.turner-banner-carousel-two'); 
        if(design_one.length){
            var slider_attr = $('#yt-slider-v4').data('slider');
            $('.turner-banner-carousel-two').owlCarousel({
                loop:slider_attr.infinite,
				margin:slider_attr.item_gap,
				nav:true,
				smartSpeed: slider_attr.autoplaySpeed,
				autoplay: slider_attr.autoplay,
				infinite: slider_attr.infinite,
				"navText": ["<span class=\"\"></span>","<span class=\"\"></span>"],			
                responsive:{
                   0:{
						items:1
					},
					600:{
						items:1
					},
					800:{
						items:1
					},
					1024:{
						items:1
					},	
					1200:{
						items:slider_attr.item_show
					}
                }
            });
        }
		
	};
	
	$(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction('frontend/element_ready/turner_banner_carousel.default', theme_carousel_js);
    });	

})(window.jQuery);