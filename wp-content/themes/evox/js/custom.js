jQuery(window).load(function () {
    "use strict";
    jQuery('#tzloadding').remove();

    jQuery('.tz-header a[href^="#"]').on('click', function(event) {
        var target = jQuery(this.getAttribute('href'));
        if( target.length ) {
            event.preventDefault();
            jQuery('html, body').stop().animate({
                scrollTop: target.offset().top - 90
            }, 1500);
        }
    });

    jQuery('.tz_scrolldown').on('click', function () {
        jQuery('html, body').animate({
            scrollTop: jQuery("#tz_target").offset().top
        }, 800);
    });

    jQuery(".type-4.tz_rsize .tz_sw").on('click', function () {
        jQuery(".type-4.tz_rsize").toggleClass('active').siblings().removeClass('active');
    });

    jQuery(".tz-header-twomenu .tz_twomn").on('click', function () {
        jQuery(".tz_show").slideToggle("slow");
        jQuery(this).toggleClass('active').siblings().removeClass('active');
    });

    jQuery('.tz_icon_search').on('click', function () {
        jQuery(this).parent().find('.tz-header-search-form').addClass('tz-header-search-form-show');
        jQuery(this).css('display', 'none');
        jQuery(this).parent().find('.tz_icon_close').css('display', 'block');
    });
    jQuery('.icon_close').on('click', function () {
        jQuery(this).parent().find('.tz-header-search-form').removeClass('tz-header-search-form-show');
        jQuery(this).parent().find('.tz_icon_search').css('display', 'block');
        jQuery(this).css('display', 'none');
    });
    //Activie menu Tempalte home slide scroll
    jQuery(".tz_btn_toggle").on('click', function () {
        jQuery(".tz-home-left.tz_menu").toggleClass('active').siblings().removeClass('active');
    });
    // Active menu top
    jQuery(".Tz-item").on('click', function () {
        jQuery(this).toggleClass('active').siblings().removeClass('active');
    });
    /*  JS Scroll Menu  */


    jQuery(window).scroll(function () {

        var $_scrollTop = jQuery(window).scrollTop();

        var tz_top = jQuery('.tz-top');
        var $_height_top = 0;
        if (tz_top.length) {
            $_height_top = tz_top.height();
        }

        var tz_top_slider = jQuery('.tz-top-slider');
        var $_height_top_slider = 0;
        if (tz_top_slider.length) {
            $_height_top_slider = tz_top_slider.height();
        }

        var header = jQuery('.tz-header');
        var $_height_header = 0;
        if (header.length) {
            $_height_header = header.height();
        }

        var h_scroll = Math.floor($_height_header + $_height_top + 150);
        var h_scroll_5 = Math.floor($_height_header + $_height_top_slider + 150);
        var h_scroll_5_r = Math.floor($_height_header + $_height_top_slider - 100);


        if ($_scrollTop > 0) {
            jQuery('.header-type-2.fixed').addClass('tz-headereff');
        } else {
            jQuery('.header-type-2.fixed').removeClass('tz-headereff');
        }

        if ($_scrollTop > 0) {
            jQuery('.header-type-6.fixed').addClass('tz-headereff');
        } else {
            jQuery('.header-type-6.fixed').removeClass('tz-headereff');
        }
        //type 7
        if ($_scrollTop > 0) {
            jQuery('.header-type-7.fixed').addClass('tz-headereff');
        } else {
            jQuery('.header-type-7.fixed').removeClass('tz-headereff');
        }
        //type 11
        if ($_scrollTop > 0) {
            jQuery('.header-type-11.fixed .tz-menu-header').addClass('tz-headereff');
        } else {
            jQuery('.header-type-11.fixed .tz-menu-header').removeClass('tz-headereff');
        }

        if ($_scrollTop > h_scroll) {
            jQuery('.header-type-1.fixed.scroll').addClass("active");
        } else {
            jQuery('.header-type-1.fixed.scroll').removeClass("active");
        }
        if ($_scrollTop > $_height_top) {
            /*jQuery('.tz-header').addClass('tz-headereff');*/
            jQuery('.header-type-3.fixed').addClass('tz-headereff');
            jQuery('.header-type-4.fixed').addClass('tz-headereff');
        } else {
            /*jQuery('.tz-header').removeClass('tz-headereff');*/
            jQuery('.header-type-3.fixed').removeClass('tz-headereff');
            jQuery('.header-type-4.fixed').removeClass('tz-headereff');
        }

        if ($_scrollTop > h_scroll_5) {
            jQuery('.header-type-1.fixed.scroll').addClass("active");
        } else {
            jQuery('.header-type-1.fixed.scroll').removeClass("active");
        }
        //home 1 reponsive
        if ($_scrollTop > h_scroll_5) {
            jQuery('.header-type-1.fixed').addClass("active");
        } else {
            jQuery('.header-type-1.fixed').removeClass("active");
        }
        //home 5 reponsive
        if ($_scrollTop > h_scroll_5_r) {
            jQuery('.header-type-5.fixed').addClass("active");
        } else {
            jQuery('.header-type-5.fixed').removeClass("active");
        }
        //home 8
        if ($_scrollTop > 110) {
            jQuery('.Tz_shop_menu.fixed').addClass("tz-headereff");
        } else {
            jQuery('.Tz_shop_menu.fixed').removeClass("tz-headereff");
        }
        //home 10
        if ($_scrollTop > 10) {
            jQuery('.tz-header-twomenu.fixed').addClass("tz-headereff");
        } else {
            jQuery('.tz-header-twomenu.fixed').removeClass("tz-headereff");
        }
    });

    /* jQuery(".tnp-email").attr("placeholder", "Your email..");*/

    /* Add wishlist load more button click action on search result page  */
    if (jQuery('.btn-add-wishlist').length) {
        jQuery('.btn-add-wishlist').on('click', function (e) {
            e.preventDefault();
            var $t = jQuery(this);
            jQuery.ajax({
                url: evox_ajax.url,
                type: "POST",
                data: {
                    'action': 'add_to_wishlist',
                    'post_id': jQuery(this).data('post-id')
                },
                success: function (response) {
                    if (response.success == 1) {
                        $t.hide();
                        $t.siblings('.btn-remove-wishlist').show();
                        alert(response.result);
                    } else {
                        alert(response.result);
                    }
                }
            });
            return false;
        });
    }

    /* Remove wishlist load more button click action on search result page  */
    if (jQuery('.btn-remove-wishlist').length) {
        jQuery('.btn-remove-wishlist').on('click', function (e) {
            e.preventDefault();
            var $t = jQuery(this);
            jQuery.ajax({
                url: evox_ajax.url,
                type: "POST",
                data: {
                    'action': 'add_to_wishlist',
                    'post_id': jQuery(this).data('post-id'),
                    'remove': 1
                },
                success: function (response) {
                    if (response.success == 1) {
                        $t.hide();
                        $t.siblings('.btn-add-wishlist').show();
                        alert(response.result);
                    } else {
                        alert(response.result);
                    }
                }
            });
            return false;
        });
    }
    //Menu Button Mobile
    var $menu_item_has_children = jQuery('.tz-header .menu-item-has-children');

    if ($menu_item_has_children.length) {

        jQuery('.menu-item-has-children > a').after("<span class='icon_menu_item_mobile'></span>");

        var $icon_menu_item_mobile = jQuery('.icon_menu_item_mobile');

        $icon_menu_item_mobile.each(function () {

            jQuery(this).on("click", function () {

                var has_class_item_active_mobile = jQuery(this).hasClass('icon_menu_item_mobile_active');

                jQuery(this).toggleClass('icon_menu_item_mobile_active', 400);
                jQuery(this).parent().children('.sub-menu,.dropdown-mega').slideToggle("400");
            });
        });

    }

});


jQuery(document).ready(function () {
    "use strict";

    var $menu_item_has_children =   jQuery('.tz-home-croll .menu-item-has-children');

    if ( $menu_item_has_children.length ) {

        jQuery('.menu-item-has-children > a').after( "<span class='icon_menu_item_mobile'></span>" );

        var evox_window_width = jQuery(window).width();

        if(evox_window_width <= 992 ){
            var $icon_menu_item_mobile  =   jQuery('.icon_menu_item_mobile');

            $icon_menu_item_mobile.each(function () {

                jQuery(this).on( "click", function() {

                    var has_class_item_active_mobile    =   jQuery(this).hasClass('icon_menu_item_mobile_active');

                    jQuery(this).toggleClass('icon_menu_item_mobile_active', 400);
                    jQuery(this).parent().children('.sub-menu').slideToggle("400");
                });
            });
        }
    }
});



jQuery(document).ready(function () {
    jQuery(".vc_progress_bar").each(function () {

        var $el = jQuery(this);
        $el.find(".vc_single_bar").each(function (index) {

            var bar = jQuery(this).find(".vc_bar"),
                val = bar.data("percentage-value");
            setTimeout(function () {
                bar.css({
                    width: val + "%"
                });
            }, 200 * index);
        });

    });
    jQuery('.blank > a').on('click', function (e) {
        e.preventDefault();
        return false;
    });
});

jQuery(document).ready(function () {
    "use strict";
    jQuery('.partner-slider').each(function () {
        jQuery(this).owlCarousel({
            nav: false,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            dots: false,
            slideSpeed: 1000,
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            margin: 45,
            paginationSpeed: 1000,
            dotsData: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                992: {
                    items: 6
                },
                1200: {
                    items: 6
                }
            },
        });
    });
});