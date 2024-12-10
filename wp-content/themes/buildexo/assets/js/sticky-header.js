
(function (a) {
    "use strict";
    var e = "",
        g = 0,
        d,
        b,
        c;


        if (jQuery('.tx-header').length) {
            jQuery('.tx-header').addClass('original').clone(true).insertAfter('.tx-header').addClass('tx-header-area-sticky tx-sticky-stt').removeClass('original');
        }
    
        
    
        a(window).on("scroll", function () {
            (b = a(window).scrollTop()), (c = a(window).height()), (d = a(window).width()), b < g ? (e = "up") : (e = "down"), (g = b), h();
        }),
       
       
        jQuery(document).ajaxComplete(function (a, b, c) {
            f();
        }),
        jQuery(document).on("updated_wc_div", function () {
            f();
        });
    function h() {
        a("#tx-header-area").hasClass("is-sticky") &&
            (b > 100
                ? (a(".tx-header-area-sticky.tx-sticky-stb").addClass("tx-header-fixed"), a("#tx-header-mobile").addClass("tx-header-mobile-fixed"))
                : (a(".tx-header-area-sticky.tx-sticky-stb").removeClass("tx-header-fixed"), a("#tx-header-mobile").removeClass("tx-header-mobile-fixed")),
            e == "up" && b > 100 ? a(".tx-header-area-sticky.tx-sticky-stt").addClass("tx-header-fixed") : a(".tx-header-area-sticky.tx-sticky-stt").removeClass("tx-header-fixed")),
            a(".tx-header-area-sticky").parents("body").addClass("tx-header-sticky");
    }
})(jQuery);
