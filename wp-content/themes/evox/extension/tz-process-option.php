<?php
if (!is_admin()):
    add_action('wp_enqueue_scripts', 'evox_config_theme', 99);

    function evox_config_theme()
    {
        global $evox_options;

        /* Typography Style 1 */
        $evox_typography_1_selectors = ((!isset($evox_options['evox_typography_style_1_selectors'])) || empty($evox_options['evox_typography_style_1_selectors'])) ? '' : $evox_options['evox_typography_style_1_selectors'];
        $evox_typography_1_font_family = ((!isset($evox_options['evox_typography_style_1_style']['font-family'])) || empty($evox_options['evox_typography_style_1_style']['font-family'])) ? '' : $evox_options['evox_typography_style_1_style']['font-family'];
        $evox_typography_1_font_weight = ((!isset($evox_options['evox_typography_style_1_style']['font-weight'])) || empty($evox_options['evox_typography_style_1_style']['font-weight'])) ? '' : $evox_options['evox_typography_style_1_style']['font-weight'];
        $evox_typography_1_font_size = ((!isset($evox_options['evox_typography_style_1_style']['font-size'])) || empty($evox_options['evox_typography_style_1_style']['font-size'])) ? '' : $evox_options['evox_typography_style_1_style']['font-size'];
        $evox_typography_1_line_height = ((!isset($evox_options['evox_typography_style_1_style']['line-height'])) || empty($evox_options['evox_typography_style_1_style']['line-height'])) ? '' : $evox_options['evox_typography_style_1_style']['line-height'];
        $evox_typography_1_color = ((!isset($evox_options['evox_typography_style_1_style']['color'])) || empty($evox_options['evox_typography_style_1_style']['color'])) ? '' : $evox_options['evox_typography_style_1_style']['color'];
        $evox_typography_1_google = ((!isset($evox_options['evox_typography_style_1_style']['google'])) || empty($evox_options['evox_typography_style_1_style']['google'])) ? '' : $evox_options['evox_typography_style_1_style']['google'];
        $evox_typography_1_text_align = ((!isset($evox_options['evox_typography_style_1_style']['text-align'])) || empty($evox_options['evox_typography_style_1_style']['text-align'])) ? '' : $evox_options['evox_typography_style_1_style']['text-align'];

        /* Typography Style 2 */
        $evox_typography_2_selectors = ((!isset($evox_options['evox_typography_style_2_selectors'])) || empty($evox_options['evox_typography_style_2_selectors'])) ? '' : $$evox_options['evox_typography_style_2_selectors'];
        $evox_typography_2_font_family = ((!isset($evox_options['evox_typography_style_2_style']['font-family'])) || empty($evox_options['evox_typography_style_2_style']['font-family'])) ? '' : $evox_options['evox_typography_style_2_style']['font-family'];
        $evox_typography_2_font_weight = ((!isset($evox_options['evox_typography_style_2_style']['font-weight'])) || empty($evox_options['evox_typography_style_2_style']['font-weight'])) ? '' : $evox_options['evox_typography_style_2_style']['font-weight'];
        $evox_typography_2_font_size = ((!isset($evox_options['evox_typography_style_2_style']['font-size'])) || empty($evox_options['evox_typography_style_2_style']['font-size'])) ? '' : $evox_options['evox_typography_style_2_style']['font-size'];
        $evox_typography_2_line_height = ((!isset($evox_options['evox_typography_style_2_style']['line-height'])) || empty($evox_options['evox_typography_style_2_style']['line-height'])) ? '' : $evox_options['evox_typography_style_2_style']['line-height'];
        $evox_typography_2_color = ((!isset($evox_options['evox_typography_style_2_style']['color'])) || empty($evox_options['evox_typography_style_2_style']['color'])) ? '' : $evox_options['evox_typography_style_2_style']['color'];
        $evox_typography_2_google = ((!isset($evox_options['evox_typography_style_2_style']['google'])) || empty($evox_options['evox_typography_style_2_style']['google'])) ? '' : $evox_options['evox_typography_style_2_style']['google'];
        $evox_typography_2_text_align = ((!isset($evox_options['evox_typography_style_2_style']['text-align'])) || empty($evox_options['evox_typography_style_2_style']['text-align'])) ? '' : $evox_options['evox_typography_style_2_style']['text-align'];

        /* Typography Style 3 */
        $evox_typography_3_selectors = ((!isset($evox_options['evox_typography_style_3_selectors'])) || empty($evox_options['evox_typography_style_3_selectors'])) ? '' : $evox_options['evox_typography_style_3_selectors'];
        $evox_typography_3_font_family = ((!isset($evox_options['evox_typography_style_3_style']['font-family'])) || empty($evox_options['evox_typography_style_3_style']['font-family'])) ? '' : $evox_options['evox_typography_style_3_style']['font-family'];
        $evox_typography_3_font_weight = ((!isset($evox_options['evox_typography_style_3_style']['font-weight'])) || empty($evox_options['evox_typography_style_3_style']['font-weight'])) ? '' : $evox_options['evox_typography_style_3_style']['font-weight'];
        $evox_typography_3_font_size = ((!isset($evox_options['evox_typography_style_3_style']['font-size'])) || empty($evox_options['evox_typography_style_3_style']['font-size'])) ? '' : $evox_options['evox_typography_style_3_style']['font-size'];
        $evox_typography_3_line_height = ((!isset($evox_options['evox_typography_style_3_style']['line-height'])) || empty($evox_options['evox_typography_style_3_style']['line-height'])) ? '' : $evox_options['evox_typography_style_3_style']['line-height'];
        $evox_typography_3_color = ((!isset($evox_options['evox_typography_style_3_style']['color'])) || empty($evox_options['evox_typography_style_3_style']['color'])) ? '' : $evox_options['evox_typography_style_3_style']['color'];
        $evox_typography_3_google = ((!isset($evox_options['evox_typography_style_3_style']['google'])) || empty($evox_options['evox_typography_style_3_style']['google'])) ? '' : $evox_options['evox_typography_style_3_style']['google'];
        $evox_typography_3_text_align = ((!isset($evox_options['evox_typography_style_3_style']['text-align'])) || empty($evox_options['evox_typography_style_3_style']['text-align'])) ? '' : $evox_options['evox_typography_style_3_style']['text-align'];

        /* Theme Color */

        $evox_color_primary = ((!isset($evox_options['evox_theme_color_primary'])) || empty($evox_options['evox_theme_color_primary'])) ? '' : $evox_options['evox_theme_color_primary'];
        $evox_color_button_1 = ((!isset($evox_options['evox_theme_color_button_1'])) || empty($evox_options['evox_theme_color_button_1'])) ? '' : $evox_options['evox_theme_color_button_1'];
        $evox_color_button_2 = ((!isset($evox_options['evox_theme_color_button_2'])) || empty($evox_options['evox_theme_color_button_2'])) ? '' : $evox_options['evox_theme_color_button_2'];
        $evox_color_icon = ((!isset($evox_options['evox_theme_color_icon'])) || empty($evox_options['evox_theme_color_icon'])) ? '' : $evox_options['evox_theme_color_icon'];
        $evox_color_flag = ((!isset($evox_options['evox_theme_color_flag'])) || empty($evox_options['evox_theme_color_flag'])) ? '' : $evox_options['evox_theme_color_flag'];

        $evox_custom_css = $evox_options['evox_custom_css_code'];
        $evox_style = '';

        if ($evox_typography_1_selectors != '' && ($evox_typography_1_font_family != '' || $evox_typography_1_font_weight != '' || $evox_typography_1_font_size != '' || $evox_typography_1_line_height != '' || $evox_typography_1_text_align != '' || $evox_typography_1_color != '')):
            $evox_style .= $evox_typography_1_selectors . '{';
            if ($evox_typography_1_font_family != ''):
                $evox_style .= 'font-family:' . $evox_typography_1_font_family . ';';
            endif;
            if ($evox_typography_1_font_weight != ''):
                $evox_style .= 'font-weight:' . $evox_typography_1_font_weight . ';';
            endif;
            if ($evox_typography_1_font_size != ''):
                $evox_style .= 'font-size:' . $evox_typography_1_font_size . ';';
            endif;
            if ($evox_typography_1_line_height != ''):
                $evox_style .= 'line-height:' . $evox_typography_1_line_height . ';';
            endif;
            if ($evox_typography_1_text_align != ''):
                $evox_style .= 'text-align:' . $evox_typography_1_text_align . ';';
            endif;
            if ($evox_typography_1_color != ''):
                $evox_style .= 'color:' . $evox_typography_1_color . ';';
            endif;
            $evox_style .= '}';
        endif;

        if ($evox_typography_2_selectors != '' && ($evox_typography_2_font_family != '' || $evox_typography_2_font_weight != '' || $evox_typography_2_font_size != '' || $evox_typography_2_line_height != '' || $evox_typography_2_text_align != '' || $evox_typography_2_color != '')):
            $evox_style .= $evox_typography_2_selectors . '{';
            if ($evox_typography_2_font_family != ''):
                $evox_style .= 'font-family:' . $evox_typography_2_font_family . ';';
            endif;
            if ($evox_typography_2_font_weight != ''):
                $evox_style .= 'font-weight:' . $evox_typography_2_font_weight . ';';
            endif;
            if ($evox_typography_2_font_size != ''):
                $evox_style .= 'font-size:' . $evox_typography_2_font_size . ';';
            endif;
            if ($evox_typography_2_line_height != ''):
                $evox_style .= 'line-height:' . $evox_typography_2_line_height . ';';
            endif;
            if ($evox_typography_2_text_align != ''):
                $evox_style .= 'text-align:' . $evox_typography_2_text_align . ';';
            endif;
            if ($evox_typography_2_color != ''):
                $evox_style .= 'color:' . $evox_typography_2_color . ';';
            endif;
            $evox_style .= '}';
        endif;

        if ($evox_typography_3_selectors != '' && ($evox_typography_3_font_family != '' || $evox_typography_3_font_weight != '' || $evox_typography_3_font_size != '' || $evox_typography_3_line_height != '' || $evox_typography_3_text_align != '' || $evox_typography_3_color != '')):
            $evox_style .= $evox_typography_3_selectors . '{';
            if ($evox_typography_3_font_family != ''):
                $evox_style .= 'font-family:' . $evox_typography_3_font_family . ';';
            endif;
            if ($evox_typography_3_font_weight != ''):
                $evox_style .= 'font-weight:' . $evox_typography_3_font_weight . ';';
            endif;
            if ($evox_typography_3_font_size != ''):
                $evox_style .= 'font-size:' . $evox_typography_3_font_size . ';';
            endif;
            if ($evox_typography_3_line_height != ''):
                $evox_style .= 'line-height:' . $evox_typography_3_line_height . ';';
            endif;
            if ($evox_typography_3_text_align != ''):
                $evox_style .= 'text-align:' . $evox_typography_3_text_align . ';';
            endif;
            if ($evox_typography_3_color != ''):
                $evox_style .= 'color:' . $evox_typography_3_color . ';';
            endif;
            $evox_style .= '}';
        endif;

        if ($evox_color_primary != ''):
            /* background color */
            $evox_style .= '.tz-top,
                .tzElement_Destination.type-1 .destination-top .view-more,
                .tzElement_Destination.type-1 .destination-slider .single-destination-item .content .tz-view-more,
                .tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-button a,
                .tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-button .tz-wishlist a.btn-remove-wishlist,
                .tzElement_Banner_Container .tzBannerItemOverlay .tzBannerSlider .tzBannerItem .tzBannerButton,
                .tzElement_Articles .Articles-top .view-more,
                .tzElement_Articles .tzArticle-item:hover .info,
                .tzElement_FeaturedTour.type-2 .tzTour-top .view-more,
                .tzElement_About .tzContent_About .button-about,
                .tz-home-slide .tz-home-right .tz-home-right-box .tz-home-search form.tzElement_search_form .tzElement_search_submit .tz-search-btn:hover,
                .tzElement_LatestTour.type-2 .tzLatest-top,
                .tz-tour-archive .tz-tour-sort .styled-select-filters .select-styled:hover::after,
                .tz-tour-archive .tz-tour-sort .styled-select-filters .select-styled:active::after,
                .tz-tour-archive .tz-tour-sort .styled-select-filters .select-styled:focus::after,
                .tz-tour-archive .tz-tour-sort .styled-select-filters .select-styled.active::after,
                .tz-tour-archive .tz-tour-sort .type-btn:hover,
                .tz-tour-archive .tz-tour-sort .type-btn.active,
                .tz-tour-archive .tz-tour-pagination ul li span.current,
                .tz-tour-archive .tz-tour-pagination ul li a:hover,
                .tz-tour-archive .tz-sidebar-filter .filter-item .filter-btn,
                .tz-tour-archive .tz-sidebar-filter .filter-item ul li label.checked,
                .tz-tour-archive .tz-sidebar-filter .filter-item ul li label:hover,
                .tz-tour-archive .tz-sidebar-filter .filter-item h5::after,
                .tz-tour-single .tz-tour-head .tz-tour-thumbnail .flex-control-paging li a::before,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-booking-head .tz-tour-contact-number,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-contact .tz-book-form .tz-contact-form form input.wpcf7-submit,
                .tz-tour-single .tz-tour-content .tab-content .tab-pane .reviews  .comment-form input.submit,
                .tzElement_Destination.type-4 .single-destination-item .content .tz-view-more,
                .tz-blog .blog-wrapper .tz-blog-item .tz-sticky-post,
                .navigation span.current,
                .navigation a:hover,
                .tz-sidebar .widget.widget_newsletterwidget .tnp-widget form .tnp-field-button input,
                .tz-sidebar .widget.widget_tag_cloud .tagcloud a:hover,
                .tz-blog-single .tzComments .comments-area .comment-respond .comment-form .form-submit .submit,
                .tz-wishlist .tz-tour-item .item-content .tz-info .tz-button .readmore,
                .tz_page_content .tz-about-text::after,
                .tz_page_content #tz-button .vc_btn3,
                .wpcf7-form input.wpcf7-submit,
                .tz-form-booking-ajax-content .tz-tour-booking .tz-tour-book-form .tz-tour-price,
                .tz-form-booking-ajax-content .tz-tour-booking .tz-tour-book-form .book-now,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-info .tz-button .readmore,
                .tz-reviews-ajax-content .reviews a.permalink,
                .tz-tour-cart .actions a:hover,
                .tz-tour-cart .book-now-btn:hover,
                .tz-tour-checkout .tz_payment .tz_paypal .book-now-btn,
                .tz-newsletter,
                .tz-top-slider .tz-top-search-wrap .tz-top-search form.tzElement_search_form .tzElement_search_submit .tz-search-btn,
                .tzElement_FeaturedTour.type-4 .tzTour-slider .tzTour-item .tzTour-info .tz-button a,
                .tzElement_FeaturedTour.type-5 .tzTour .tzTour-item .tzTour-item-box .tzTour-info .tz-button a,
                .tz-newsletter.tz-newsletter-type-2 .newsletter-right form .tnp-field-button input.tnp-button,
                .tzBranchs .tzBranchs-wrapper .tz-blog-item .tzBranchs-column.tzBranchs-info a.view-more,
                .tzBranchs-single .tz-blog-single-item .tzBranchs-bottom .tzBranchs-contact .tzBranchs-contact-box .tzBranchs-info,
                .tzBranchs-single .tzComments .comments-area .comment-respond .comment-form .form-submit .submit,
                .tz-shop-detail-wrapper .tz-shop-content div.product div.summary form.cart .button,
                .tz-shop-detail-wrapper .tz-shop-content div.product .panel #reviews #review_form #respond form.comment-form .form-submit input,
                .woocommerce .products ul.products li .tz-shop-product-thumb .tz-shop-product-button a.button,
                .woocommerce form.woocommerce-cart-form table.shop_table tbody tr td.actions .button,
                .woocommerce .cart-collaterals .cart_totals .wc-proceed-to-checkout a.checkout-button,
                .woocommerce-checkout .woocommerce form.checkout #order_review .woocommerce-checkout-payment .place-order button#place_order,
                .tz-shop-wrapper .tz-shop-content ul.products li .tz-shop-product-thumb .tz-shop-product-button a.button,
                .tz-shop-wrapper .tz-shop-content nav.woocommerce-pagination ul.page-numbers li span.page-numbers.current,
                .tz-shop-wrapper .tz-shop-content nav.woocommerce-pagination ul.page-numbers li a.page-numbers:hover,
                .tz-sidebar .widget.widget_price_filter form .price_slider_wrapper .price_slider_amount button.button,
                .tz-sidebar .widget.widget_product_search form.woocommerce-product-search button[type="submit"],
                .tz-destination-single .destination-tour h3 a,
                .tz-destination-single .destination-tour:after,
                .tz-tour-single .tz-tour-head .tz-tour-title .flex-control-paging li a:before,
                .xoo-qv-panel .xoo-qv-modal .xoo-qv-inner-modal .xoo-qv-container .xoo-qv-main .product .xoo-qv-summary form.cart .button,
                .xoo-qv-panel .xoo-qv-modal .xoo-qv-inner-modal .xoo-qv-container .xoo-qv-main .product .xoo-qv-summary .xoo-qv-plink a,
                header.tz-header.header-type-7 ul.tz-nav li:hover::before,
                .tzElement_Image_slide.slr_socials .slr_social a::before,
                .tzElement_Image_slide.slr_socials .slr_social a:hover::before,
                .tzElement_Image_slide.slr_socials .owl-dots .owl-dot:hover::before,
                .tzElement_Image_slide.slr_socials .owl-dots .owl-dot::before,
                .tz-header .tz-header-cart .widget_shopping_cart_content > p.buttons a.checkout:hover,
                div.tzElement-heading-title h2::before,
                div.tzElement_FeaturedTour.type-7 h2::after,div.tzElement_Articles.type-3 .Articles-top h2::before,
                .tzElement_FeaturedTour.type-7 div.tz-price,.tzElement_FeaturedTour.type-7 div.owl-nav i:hover,
                .tzElement_FeaturedTour.type-7 div.owl-dots .active::after,.tzElement_quote.tz_full_width .owl-dots div.owl-dot::before,
                .tzElement_Articles.type-3 div.infos h3::before,div.Tz_align_center::before,div.Tz_align_right::before,div.Tz_align_left::before,
                div.Tz_video_popup i::after,div.Tz_video_popup .video i,div.Tz_video_popup .video .title::before,
                .tzElement_Image_slide .tzImage_Slide_Item div.readmore:hover,.tzElement_Image_slide div.video:hover .play,
                .tzElement_Search.type-2 .tzElement_search_form div.tzElement_search_submit button,
                .tzElement_Destination.type-6 .destination-slider .owl-dots div.owl-dot.active,
                .tzElement_Destination.type-6 .destination-slider .owl-nav div.owl-next:hover,
                .tzElement_Destination.type-6 .destination-slider .owl-nav div.owl-prev:hover,
                .tzElement_FeaturedTour.type-6 .tzTour-top div.tour-title::after,
                .tzElement_FeaturedTour.type-6 .tzTour .tzTour-item .tzTour-info div.tz-price,
                .tz-header .tz-header-cart div.widget_shopping_cart_content::before,
                .tz-header .tz-header-cart div.widget_shopping_cart_content > p.buttons a:hover,
                .tzElement_FeaturedTour.type-6 .tzTour-top div.tour-title::after,
                .tz-footer.tz-footer-type-3 .tz-footer-bottom .tz-footer-bottom-box .tz-footer-social .evox-footer-bottom-left-box div.evox-footer-social-item:hover,
                .tzElement_FeaturedTour.type-6 .tzTour-bottom .tz-button div.alltour a:hover .icon,
                .tzElement_FeaturedTour.type-6 div.tzTour-top .tour-title::after,
                .tzElement_Articles.type-2 div.Articles-top .Articles-Title::after,
                .tz-newsletter.tz-newsletter-type-3 div.tnp-field.tnp-field-button input.tnp-button,
                .tzElement_Destination.type-1 .destination-slider .distination-item .content a.tz-view-more:hover,
                .tz-shop-wrapper .tz-shop-content ul.products li .tz-shop-product-thumb div.tz-shop-product-button a.added_to_cart:hover,
                 .tz-shop-wrapper .tz-shop-content ul.products li .tz-shop-product-thumb div.tz-shop-product-button a.added_to_cart,
                 .tzElement_Destination.type-4 .distination-item .content a.tz-view-more,
                 .tz-blog .tz-serach-notda div.page-content form input.submit,
                 .tzElement_quote .owl-dots div.owl-dot.active::after,.tz-header.tz-header-shop div.menu-bottom,
                 .Tz_woo_categories div.tz_cat_top,.Tz_woo_tags div.tz_cat_top,div.wpe__Hover a.button, div.wpe__Hover .added_to_cart,
                 .Tz_elm_shop_slider .tzshop_Slide_content div.Tz_btn a:hover,div.wpe__Hover a.button:hover,div.wpe__Hover .added_to_cart:hover,
                 .tz-header.tz-header-shop .menu-top .box-infor .woo_cart .widget_shopping_cart_content .woocommerce-mini-cart__buttons.buttons a:hover,
                 .tz-footer-bottom.tz_social .tz-footer-social .evox-footer-bottom-left-box div.evox-footer-social-item:hover,
                 .tz_page_login .login form.login-form button:hover,.tz_page_login .login form.login-form button,
                 .woocommerce-account div.woocommerce nav.woocommerce-MyAccount-navigation ul li.is-active,
                 .woocommerce-account div.woocommerce nav.woocommerce-MyAccount-navigation ul li:hover,
                 .woocommerce-account .woocommerce div.woocommerce-MyAccount-content table.my_account_orders tbody tr td a.button,
                 .woocommerce-account .woocommerce .woocommerce-MyAccount-content div.woocommerce-pagination a.button,
                 .woocommerce-account .woocommerce .woocommerce-MyAccount-content .woocommerce-Addresses header.woocommerce-Address-title a,
                 .woocommerce-account div.woocommerce form p button.button,.zoom-instagram-widget.widget .zoom-instagram-widget-user-info .zoom-instagram-widget-user-info-about-data a,
                 .zoom-instagram-widget.widget .zoom-instagram-widget__follow-me a:hover,.Tz_align_center::before,.Tz_align_right::before,.Tz_align_left::before,
                 .tzElement_Latest_Posts .tzElement_latest_Slide .owl-nav .owl-next:hover,
                 .tzElement_Latest_Posts .tzElement_latest_Slide .owl-nav .owl-prev:hover,
                 .tzElement_FeaturedTour.type-8 div.tz-price,.tzElement_FeaturedTour.type-8 div.owl-nav i:hover,
                 .tzElement_quote_Nbg .owl-dot.active::after,.TzElement_btn_type2 a,.tzElement_quote_imgat .owl-dots .owl-dot.active::after,
                 .tz-newsletter.tz-newsletter-type-4 .newsletter-right .tnp-field-button .tnp-button,
                 .tz-header.tz-header-twomenu .tz_twomn span';
            $evox_style .= '{background-color:' . $evox_color_primary . '}';
            //important

            $evox_style .= '.tzElement_Search.type-3 div.tzElement_search_submit button,
                .tzElement_Destination.type-6 .destination-top h3::after,
                .tz-footer div.tzwidget-social a:hover,
                .rev-btn,.revslider-initialised .tp-shape';
            $evox_style .= '{background-color:' . $evox_color_primary . '!important}';
            //
            $evox_style .= '.tzElement_FeaturedTour.type-7 div.owl-nav i:hover,.tzElement_Image_slide .tzImage_Slide_Item div.readmore:hover,
                .tzElement_Search.type-2 .tzElement_search_form div.tzElement_search_submit button::before,
                .tzElement_Destination.type-6 .destination-slider .owl-nav div.owl-next:hover,
                .tzElement_Destination.type-6 .destination-slider .owl-nav div.owl-prev:hover,
                .tz-footer.tz-footer-type-3 .tz-footer-bottom .tz-footer-bottom-box .tz-footer-social .evox-footer-bottom-left-box div.evox-footer-social-item:hover,
                nav.navigation span.current,.tz-blog .tz-serach-notda div.page-content form input.submit,
                .tzElement_Search.type-2 form.tzElement_search_form div.tzElement_search_submit button.tz-search-btn::before,
                div.Tz_woo_categories,div.Tz_woo_tags,.zoom-instagram-widget.widget .zoom-instagram-widget__follow-me a,
                .tzElement_FeaturedTour.type-8 div.owl-nav i:hover';
            $evox_style .= '{border-color:' . $evox_color_primary . '}';


            /* background opacity */
            $evox_style .= '.tzElement_Hotline .tzHotlineOverlay,
                .tzOur-team .tzOur-teamItem:hover .tz-bg a .tz-overlay::after,
                .tz-header .tz-header-cart .widget_shopping_cart_content > p.buttons a.checkout,
                .tz-newsletter.tz-newsletter-type-3 div.tnp-field.tnp-field-button input.tnp-button:hover,
                .tzElement_Destination.type-1 .destination-slider .distination-item .content a.tz-view-more,
                .tzElement_Destination.type-4 .distination-item .content a.tz-view-more:hover,
                .woocommerce-account .woocommerce div.woocommerce-MyAccount-content table.my_account_orders tbody tr td a.button:hover,
                .woocommerce-account .woocommerce .woocommerce-MyAccount-content div.woocommerce-pagination a.button:hover,
                .woocommerce-account .woocommerce .woocommerce-MyAccount-content .woocommerce-Addresses header.woocommerce-Address-title a:hover,
                .woocommerce-account div.woocommerce form p button.button:hover';

            $evox_style .= '{background-color:rgba(' . evox_hex2rgb($evox_color_primary, 0.8) . ')}';
            /* background opacity */
            $evox_style .= '.tzElement_Search.type-4 .tzElement_search_field';

            $evox_style .= '{background-color:rgba(' . evox_hex2rgb($evox_color_primary, 0.9) . ')}';
            /* color */
            $evox_style .= '.tz-header nav ul.tz-nav > li > a::before,.tz-header nav ul.tz-nav > li > a::after,
                .tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-time .tz-date .content p,
                .tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-time .tz-destination .content p,
                .tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-time .tz-price .price,
                .tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-time .tz-price .price .currency-symbol,
                .tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-button .tz-wishlist a.btn-add-wishlist:hover i,
                .tzElement_LatestTour.type-1 .tzLatest-item .tz-info .tz-price span,
                .tz-footer .tz-footer-top .footerattr .widget.dw_twitter .dw-twitter-inner .tweet-item::after,
                .tz-footer .tz-footer-top .footerattr .widget.dw_twitter .dw-twitter-inner .tweet-item .tweet-content a,
                .tzElement_FeaturedTour.type-2 .tzTour-slider .tzTour-item .tzTour-info .tz-price .price,
                .tzElement_FeaturedTour.type-2 .tzTour-slider .tzTour-item .tzTour-info .tz-price .price .currency-symbol,
                .tz-home-slide .tz-home-left .tz-home-left-box nav.vertical_menu ul.main-menu li .icon_menu_item_mobile,
                .tz-home-slide .tz-home-left .tz-home-left-box .sidebar-home-slide aside.widget a,
                .tz-home-slide .tz-home-left .tz-home-left-box .sidebar-home-slide aside.widget .tzwidget-social a:hover,
                .tz-home-slide .tz-home-left .tz-home-left-box nav.vertical_menu ul.main-menu li ul.sub-menu li.menu-item-has-children::after,
                .tzElement_Search form.tzElement_search_form .tzElement_search_submit .tz-search-btn,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .tzTour-item .tzTour-info .tz-time .tz-date .content p,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .tzTour-item .tzTour-info .tz-time .tz-destination .content p,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .tzTour-item .tzTour-info .tz-time .tz-duration .content p,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .owl-nav .owl-next:hover::before,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .owl-nav .owl-prev:hover::before,
                .tz-blog-single .tz-blog-thumbnail .content .tz-blog-meta span i,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-info .tz-price .price,
                .tz-destination-single .destination-tour .destination-tour-grid .destination-tour-item .item-content .tz-info .tz-price .price,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-info .tz-button .tz-btn-wishlist,
                .tz-destination-single .destination-tour .destination-tour-grid .destination-tour-item .item-content .tz-info .tz-button .tz-btn-wishlist,
                .tz-tour-archive .tz-sidebar-filter .filter-item.search_results p i,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-info .tz-title h4 a:hover,
                .tz-tour-single .tz-tour-content .tab-content .tab-pane .reviews ol li .comment-content .content a,
                .tz-tour-single .tz-tour-content .tab-content .tab-pane .reviews  .comment-form a,
                .tz-blog .blog-wrapper .tz-blog-item .tz-blog-content .tz-blog-title a:hover,
                .tz-blog .blog-wrapper .tz-blog-item .tz-blog-content .tz-blog-meta span i,
                .tz-blog .blog-wrapper .tz-blog-item .tz-blog-content .tz-blog-meta span a:hover,
                .tz-sidebar .widget.tz-recent-w ul li .tz-recent-content span i,
                .tz-sidebar .widget.widget_archive ul li,
                .tz-blog-single .tz-blog-thumbnail .content .tz-blog-meta span i,
                .tz-blog-single .tz-blog-single-item .tz-blog-content .tz-blog-share a:hover,
                .tz-blog-single .author .author-item .author-infor .social-author a:hover,
                .tz-blog-single .relatedposts .related .related-item .related-content .title a:hover,
                .tz-blog-single .tzComments .comments-area .comment-list .comments .comment-content h5 a,
                .tz-blog-single .tzComments .comments-area .comment-list .comments .comment-content .content .comment-edit-link,
                .tz-blog-single .tzComments .comments-area .comment-list .comments .comment-content .content .comment-reply-link,
                .tz-wishlist.tour-layout-list .tz-tour-item .item-content .tz-info .tz-time .tz-date p,
                .tz-wishlist.tour-layout-list .tz-tour-item .item-content .tz-info .tz-time .tz-depature p,
                .tz-wishlist .tz-tour-item .item-content .tz-info .tz-price .price,
                .tz-wishlist .tz-tour-item .item-content .tz-info .tz-button .tz-btn-wishlist,
                .tzOur-team .tzOur-teamItem .tz-content .tz-social a:hover,
                .tz_page_content .vc_pie_chart .tz-button:hover,
                .tzElement_Customer_Container .tzCustomerItem .content h3,
                .tz-tour-archive .tz-tour-content.tour-layout-list .tz-tour-item .item-content .tz-info .tz-time .tz-date p,
                .tz-tour-archive .tz-tour-content.tour-layout-list .tz-tour-item .item-content .tz-info .tz-time .tz-depature p,
                .tz-tour-cart table tbody tr p.total strong,
                .tz-tour-checkout .tz_order .box .box-item.total .price,
                .tparrows.tp-leftarrow:hover:before,
                .tparrows.tp-rightarrow:hover:before,
                .tzElement_Banner_Container .tzBannerItemOverlay .tzBannerSlider .owl-nav .owl-prev:hover:before,
                .tzElement_Banner_Container .tzBannerItemOverlay .tzBannerSlider .owl-nav .owl-next:hover:before,
                .tz-home-slide .tz-home-right .tz-home-right-box .tz-home-content .rev_slider_wrapper ul li a:hover,
                .tzElement_Destination.type-5 .destination-slider .single-destination-item .tz-destination-item-child .tz-destination-item-box .content h3 a:hover,
                .tzElement_Latest_Posts .tzElement_latest_Slide .tz_latest_item .tz_latest_item_child .tz_latest_item_box .tz_latest_info h3.tz_latest_title a:hover,
                .tzElement_FeaturedTour.type-5 .tzTour .tzTour-item .tzTour-item-box .tzTour-info .tzTour-info-right span.price,
                .tz-sidebar .widget.tz-instagram-feed .clear a,
                .tzBranchs .tzBranchs-wrapper .tz-blog-item .tzBranchs-column.tzBranchs-info h3.tzBranchs-title a:hover,
                .tz-shop-detail-wrapper .tz-shop-content div.product div.summary .price span,
                .tz-shop-detail-wrapper .tz-shop-content div.product .panel #reviews #comments ol.commentlist li .comment-text p.meta .woocommerce-review__author,
                .woocommerce .products ul.products li span.price span,
                .woocommerce-checkout .woocommerce .woocommerce-info a,
                .woocommerce-checkout .woocommerce .woocommerce-info:before,
                .tz-shop-wrapper .tz-shop-content ul.products li span.price span,
                .tz-shop-wrapper .tz-shop-content ul.products li h2.woocommerce-loop-product__title a:hover,
                .tz-sidebar .widget ul.product_list_widget li span.amount,
                .tz-tour-single .tz-tour-content .tab-content .tab-pane .content .tour-info .tour-info-box .tour-info-column .tour-info-item i,
                .tz-tour-confirm .form_title h3 i,
                .tz-destination-single .destination-tour .destination-tour-grid .destination-tour-item .item-content .tz-info .tz-title h4 a:hover,
                .woocommerce .products ul.products li h2.woocommerce-loop-product__title a:hover,
                .xoo-qv-panel .xoo-qv-modal .xoo-qv-inner-modal .xoo-qv-container .xoo-qv-main .product .xoo-qv-summary .price span,
                .woocommerce .cart-collaterals .cart_totals table.shop_table tbody tr td form.woocommerce-shipping-calculator a:hover,
                .tz-header .tz-header-cart .widget_shopping_cart_content,
                .tz-header .tz-header-cart .widget_shopping_cart_content ul.cart_list li span,
                .tz-header .tz-header-cart .widget_shopping_cart_content > p.total .amount,
                .tzElement_Image_slide.slr_socials:hover .slr_social a:hover,
                div.tzElement_Image_slide.slr_socials .tzImage_Slide_Item .readmores a:hover,
                div.tzElement_Search.type-3 .tzElement_search_submit button::before,
                div.tzElement_Counter.type3 .tzElement_counts,div.tzElement_Counter.type3 p,
                div.tzElement_FeaturedTour.type-7 h3 a:hover,.tzElement_Articles.type-3 div.tzArticle-item:hover h3 a,
                div.tzElement_Distination h3 a:hover,div.TzElement_btn_evox a::before,div.TzElement_btn_evox a:hover,
                div.Tz_video_popup a:hover .title,div.tzElement-heading-title a:hover,div.tzElement-heading-title a::after,
                .widget_newsletterwidgetminimal div.tnp-widget-minimal::after,div.tzElement_FeaturedTour.type-7 i,
                .tzElement_Image_slide .tzImage_Slide_Item .readmore:hover div.discover,
                .tzElement_Image_slide .video div.play i,
                .tzElement_FeaturedTour.type-6 .tzTour .tzTour-item .tzTour-info .tz-time .tz-destination span.icon i,
                .tz-header nav span.icon_menu_item_mobile,
                .tzElement_FeaturedTour.type-6 .tzTour .tzTour-item .tzTour-info .tz-time .tz-date span.icon i,
                .tzElement_FeaturedTour.type-6 .tzTour .tzTour-item .tzTour-info div.tz-title span i,
                .tzElement_FeaturedTour.type-6 .tzTour .tzTour-item .tzTour-info div.tz-title h4 a:hover,
                .tzElement_FeaturedTour.type-6 .tzTour-bottom .tz-button div.alltour a:hover .tz_txt,
                .tzElement_Articles.type-2 .Articles-top div.Articles-Title::after,
                .tzElement_Articles.type-2 .tzArticle-item .content-article h3.title a:hover,
                .tz-header.header-type-6 .nav-collapse ul.tz-nav li a:hover,
                .tzElement_Destination.type-5 .destination-slider .distination-item .tz-destination-item-child .tz-destination-item-box div.content h3 a:hover,
                .tzElement_FeaturedTour.type-4 .tzTour-slider .tzTour-item .tzTour-info .tz-time span.tz-address i,
                .tzElement_FeaturedTour.type-4 .tzTour-slider .tzTour-item .tzTour-info .tz-time span.tz-duration i,
                .tzElement_FeaturedTour.type-4 .tzTour-slider .tzTour-item .tzTour-info .tz-time span.tz-price i,
                .tz-footer.tz-footer-type-2 .tz-footer-top div.footerattr .widget ul li a:hover,
                .tz-footer.tz-footer-type-2 .tz-footer-bottom div.tz-footer-link ul li a:hover,
                .tz-header.tz-header-shop .menu-top .box-infor div.Tz-item i,
                .tz-header.tz-header-shop .menu-bottom .tz-search div.tz-header-search-form form span,
                .Tz_elm_shop_slider .tzshop_Slide_content h3.tz_subtitle,.Tz_woo_categories div.tz_catbottom a:hover, .Tz_woo_tags div.tz_catbottom a:hover,
                div.wpe__price,.tz-footer-bottom.tz_social .tz-footer-social .evox-footer-bottom-left-box div.evox-footer-social-item a i,
                .tz-header.tz-header-shop .menu-top .box-infor .woo_cart .widget_shopping_cart_content ul.cart_list li span,
                .tz-header.tz-header-shop .menu-top .box-infor .woo_cart .widget_shopping_cart_content .woocommerce-mini-cart__total.total span,
                .tz-footer ul.product_list_widget li .woocommerce-Price-amount.amount,.tz-footer ul.product_list_widget li ins,.tz-footer ul.product_list_widget li del,
                .woo-products-element .wpe__title a:hover,.wpe__Price,.tz-header .tz-header-cart .widget_shopping_cart_content ul.cart_list li a:hover,
                footer.tz-footer ul.product_list_widget li .woocommerce-Price-amount.amount,
                .tz-home-slide .tz-home-right .tz-home-right-box .tz-home-search span.tz-search-tour-mobile:hover,
                .tz-top-slider .tz-top-search-wrap .tz-top-search span.tz-search-tour-mobile:hover,
                .tz-header .nav-collapse ul.tz-nav li a:hover,
                .tz-tour-single .tz-tour-content .tab-content .tab-pane .reviews ol li div.comment-content h5,
                .tz-tour-checkout .tz_payment div.tz_paypal a,.tzElement_Latest_Posts.tz_lp .tz_content a:hover,
                div.tzElement_FeaturedTour.type-8 h3 a:hover,div.tzElement_FeaturedTour.type-8 i,
                .TzElement_btn_type3 a:hover,.tz_scrolldown:hover,.tz_scrolldown i,
                .tz-footer.tz-footer-type-1.tz_bgft ul li a:hover,.tz-footer.tz-footer-type-1.tz_bgft .tz-footer-bottom .tz-footer-link a:hover,
                .tz-shop-detail-wrapper .woocommerce-notices-wrapper .woocommerce-message::before,
                body .content-tour_category .title a:hover,
                body .tzElement_Destination.type-7 .destination-slider .distination-item .content .title a:hover';

            $evox_style .= '{color:' . $evox_color_primary . '}';

            $evox_style .= '.woocommerce form.woocommerce-cart-form table.shop_table tbody tr td.product-remove a:hover,
                .tzElement_Search.type-2 .tzElement_search_form .tzElement_search_field .form-date div.field-box::after,
                header.tz-header.header-type-7 .nav-collapse ul.tz-nav li ul.sub-menu li a:hover,
                .tzElement_Search.type-2 form.tzElement_search_form .tzElement_search_field .form-group.form-date div.field-box::after,
                 header.tz-header .nav-collapse ul.tz-nav li ul.sub-menu li a:hover,
                 .tz-header ul.tz-nav li ul.sub-menu li.current_page_item a,
                 .tz-header ul.tz-nav li.current_page_item a,.tz-footer.tz-footer-type-2 .tzwidget-social a,
                 .tz-header ul.tz-nav .current-menu-item a,.zoom-instagram-widget.widget .zoom-instagram-widget__follow-me a,
                 .tzElement_Search.type-3 .tzElement_search_form div.tzElement_search_field .form-group .field-box.tz_date::after';
            $evox_style .= '{color:' . $evox_color_primary . ' !important}';

            /* border color */
            $evox_style .= '.tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-button .tz-wishlist a.btn-add-wishlist:hover,
                .tzElement_About .tzContent_About .about-us::after,
                .tz-tour-archive .tz-tour-sort .type-btn:hover,
                .tz-tour-archive .tz-tour-sort .type-btn.active,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-info .tz-button .tz-btn-wishlist,
                .tz-destination-single .destination-tour .destination-tour-grid .destination-tour-item .item-content .tz-info .tz-button .tz-btn-wishlist,
                .tz-tour-archive .tz-tour-pagination ul li span.current,
                .tz-tour-archive .tz-tour-pagination ul li a:hover,
                .tz-tour-archive .tz-sidebar-filter .filter-item ul li label.checked,
                .tz-tour-archive .tz-sidebar-filter .filter-item ul li label:hover,
                .tz-blog .blog-wrapper .tz-blog-item .tz-blog-content::after,
                .navigation a:hover,
                .tz-sidebar .widget h3.title-widget::after,
                .tz-blog-single .relatedposts::after,
                .tz-wishlist .tz-tour-item .item-content .tz-info .tz-button .tz-btn-wishlist,
                .tzElement_Customer_Container .owl-dots .owl-dot.active span,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form input:hover,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form select:hover,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form textarea:hover,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form input:active,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form select:active,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form textarea:active,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form input:focus,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form select:focus,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form textarea:focus,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-contact .tz-book-form .tz-contact-form form input:hover,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-contact .tz-book-form .tz-contact-form form select:hover,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-contact .tz-book-form .tz-contact-form form textarea:hover,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-contact .tz-book-form .tz-contact-form form input:active,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-contact .tz-book-form .tz-contact-form form select:active,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-contact .tz-book-form .tz-contact-form form textarea:active,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-contact .tz-book-form .tz-contact-form form input:focus,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-contact .tz-book-form .tz-contact-form form select:focus,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-contact .tz-book-form .tz-contact-form form textarea:focus,
                .tz-tour-cart table thead tr th,
                .tz-tour-checkout .form_content .form-group input:hover,
                .tz-tour-checkout .form_content .form-group select:hover,
                .tz-tour-checkout .form_content .form-group input:active,
                .tz-tour-checkout .form_content .form-group select:active,
                .tz-tour-checkout .form_content .form-group input:focus,
                .tz-tour-checkout .form_content .form-group select:focus,
                .woocommerce form.woocommerce-cart-form table.shop_table thead tr th,
                .woocommerce-checkout .woocommerce .woocommerce-info,
                .tz-tour-confirm .form_title,
                .tz-shop-wrapper .tz-shop-content nav.woocommerce-pagination ul.page-numbers li span.page-numbers.current,
                .tz-shop-wrapper .tz-shop-content nav.woocommerce-pagination ul.page-numbers li a.page-numbers:hover,
                .tzElement_FeaturedTour.type-6 .tzTour-bottom .tz-button div.alltour a:hover .icon,
                .tz-header.header-type-7 ul.tz-nav li ul.sub-menu,
                .tz-header.tz-header-shop .menu-top div.widget_shopping_cart,
                .tz-footer-bottom.tz_social .tz-footer-social .evox-footer-bottom-left-box div.evox-footer-social-item:hover,
                .tz-footer.tz-footer-type-2 div.tzwidget-social a';
            $evox_style .= '{border-color:' . $evox_color_primary . '}';

            $evox_style .= '.tz-blog .blog-wrapper .tz-blog-item .tz-sticky-post::before,
                .tz-blog .blog-wrapper .tz-blog-item .tz-sticky-post::after,
                .tz-shop-detail-wrapper .tz-shop-content div.product .woocommerce-tabs ul.tabs li.active,
                .tz-shop-detail-wrapper .woocommerce-notices-wrapper .woocommerce-message';
            $evox_style .= '{border-top-color:' . $evox_color_primary . '}';

            $evox_style .= '.tz-sidebar .widget.widget_search form input.Tzsearchform';
            $evox_style .= '{border-color:rgba(' . evox_hex2rgb($evox_color_primary, 0.3) . ')}';

            /* hover */
            $evox_brightness = -0.9; // 90% darker
            $evox_color_hover = evox_colourBrightness($evox_color_primary, $evox_brightness);
            $evox_style .= '.tzElement_Destination.type-1 .destination-top .view-more:hover,
                .tzElement_Destination.type-1 .destination-slider .single-destination-item .content .tz-view-more:hover,
                .tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-button a:hover,
                .tzElement_Banner_Container .tzBannerItemOverlay .tzBannerSlider .tzBannerItem .tzBannerButton:hover,
                .tzElement_Articles .Articles-top .view-more:hover,
                .tzElement_FeaturedTour.type-2 .tzTour-top .view-more:hover,
                .tzElement_About .tzContent_About .button-about:hover,
                .tz-tour-archive .tz-sidebar-filter .filter-item .filter-btn:hover,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-contact .tz-book-form .tz-contact-form form input.wpcf7-submit:hover,
                .tz-tour-single .tz-tour-content .tab-content .tab-pane .reviews  .comment-form input.submit:hover,
                .tzElement_Destination.type-4 .single-destination-item .content .tz-view-more:hover,
                .tz-sidebar .widget.widget_newsletterwidget .tnp-widget form .tnp-field-button input:hover,
                .tz-blog-single .tzComments .comments-area .comment-respond .comment-form .form-submit .submit:hover,
                .tz-wishlist .tz-tour-item .item-content .tz-info .tz-button .readmore:hover,
                .tz_page_content #tz-button .vc_btn3:hover,
                .wpcf7-form input.wpcf7-submit:hover,
                .tz-form-booking-ajax-content .tz-tour-booking .tz-tour-book-form .book-now:hover,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-info .tz-button .readmore:hover,
                .tz-reviews-ajax-content .reviews a.permalink:hover,
                .tz-tour-checkout .tz_payment .tz_paypal .book-now-btn:hover,
                .tz-top-slider .tz-top-search-wrap .tz-top-search form.tzElement_search_form .tzElement_search_submit .tz-search-btn:hover,
                .tzElement_FeaturedTour.type-4 .tzTour-slider .tzTour-item .tzTour-info .tz-button a:hover,
                .tzElement_FeaturedTour.type-5 .tzTour .tzTour-item .tzTour-item-box .tzTour-info .tz-button a:hover,
                .tz-newsletter.tz-newsletter-type-2 .newsletter-right form .tnp-field-button input.tnp-button:hover,
                .tzBranchs .tzBranchs-wrapper .tz-blog-item .tzBranchs-column.tzBranchs-info a.view-more:hover,
                .tzBranchs-single .tzComments .comments-area .comment-respond .comment-form .form-submit .submit:hover,
                .tz-shop-detail-wrapper .tz-shop-content div.product .panel #reviews #review_form #respond form.comment-form .form-submit input:hover,
                .woocommerce .products ul.products li .tz-shop-product-thumb .tz-shop-product-button a.button:hover,
                .tz-shop-detail-wrapper .tz-shop-content div.product div.summary form.cart .button:hover,
                .woocommerce form.woocommerce-cart-form table.shop_table tbody tr td.actions .button:hover,
                .woocommerce .cart-collaterals .cart_totals .wc-proceed-to-checkout a.checkout-button:hover,
                .woocommerce-checkout .woocommerce form.checkout #order_review .woocommerce-checkout-payment .place-order button#place_order:hover,
                .tz-shop-wrapper .tz-shop-content ul.products li .tz-shop-product-thumb .tz-shop-product-button a.button:hover,
                .tz-sidebar .widget.widget_price_filter form .price_slider_wrapper .price_slider_amount button.button:hover,
                .tz-sidebar .widget.widget_product_search form.woocommerce-product-search button[type="submit"]:hover,
                .tz-destination-single .destination-tour h3 a:hover,
                .xoo-qv-panel .xoo-qv-modal .xoo-qv-inner-modal .xoo-qv-container .xoo-qv-main .product .xoo-qv-summary form.cart .button:hover,
                .xoo-qv-panel .xoo-qv-modal .xoo-qv-inner-modal .xoo-qv-container .xoo-qv-main .product .xoo-qv-summary .xoo-qv-plink a:hover,
                .TzElement_btn_type2 a:hover,.tz-newsletter.tz-newsletter-type-4 .newsletter-right .tnp-field-button .tnp-button:hover';
            $evox_style .= '{background-color:' . $evox_color_hover . '}';
        endif;

        if ($evox_color_button_1 != ''):
            /* background color */
            $evox_style .= '.tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-button .review,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-info .tz-button .review,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-info .tz-button .view,
                .tz-destination-single .destination-tour .destination-tour-grid .destination-tour-item .item-content .tz-info .tz-button .view,
                .tz-wishlist .tz-tour-item .item-content .tz-info .tz-button .review,
                .tz-tour-archive .range-slider .incl-range,
                a.xoo-qv-button,
                .tz-sidebar .widget.widget_price_filter form .price_slider_wrapper .price_slider.ui-slider-horizontal .ui-slider-range,
                div.wpe__Hover a.xoo-qv-button';
            $evox_style .= '{background-color:' . $evox_color_button_1 . '}';
            //
            /* hover */
            $evox_brightness_1 = -0.85; // 90% darker
            $evox_color_hover_1 = evox_colourBrightness($evox_color_button_1, $evox_brightness_1);
            $evox_style .= '.tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-button .review:hover,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-info .tz-button .review:hover,
                .tz-wishlist .tz-tour-item .item-content .tz-info .tz-button .review:hover,
                a.xoo-qv-button:hover';

            $evox_style .= '{background-color:' . $evox_color_hover_1 . '}';
        endif;


        if ($evox_color_button_2 != ''):
            /* background color */
            $evox_style .= '.tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-button .booking,
                .tzElement_FeaturedTour.type-2 .tzTour-slider .tzTour-item .tzImg-tour .tz-thumb .tz-tour-sold-out,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .tzTour-item .tzImg-tour .tz-thumb .tz-tour-sold-out,
                .tzElement_FeaturedTour.type-5 .tzTour .tzTour-item .tzTour-item-box .tzImg-tour .tz-thumb .tz-tour-sold-out,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-thumb .tz-tour-sold-out,
                .tz-destination-single .destination-tour .destination-tour-grid .destination-tour-item .item-content .tz-thumb .tz-tour-sold-out,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-info .tz-button .booking,
                .tz-destination-single .destination-tour .destination-tour-grid .destination-tour-item .item-content .tz-info .tz-button .booking,
                 .tz-tour-single .tz-tour-content .tz-tour-booking .btn-external,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form .book-now,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .tzTour-item .tzTour-info .tz-button .booking,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .tzTour-item .tzTour-info .tz-button .tz-price,
                .tz-wishlist .tz-tour-item .item-content .tz-info .tz-button .booking,
                .tzElement_FeaturedTour.type-4 .tzTour-slider .tzTour-item .tzTour-info .tz-button a.more-tour';
            $evox_style .= '{background-color:' . $evox_color_button_2 . '}';

            /* hover */
            $evox_brightness_2 = -0.9; // 90% darker
            $evox_color_hover_2 = evox_colourBrightness($evox_color_button_2, $evox_brightness_2);
            $evox_style .= '.tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-button .booking:hover,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-info .tz-button .booking:hover,
                .tz-destination-single .destination-tour .destination-tour-grid .destination-tour-item .item-content .tz-info .tz-button .booking:hover,
                 .tz-tour-single .tz-tour-content .tz-tour-booking .btn-external:hover,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form .book-now:hover,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .tzTour-item .tzTour-info .tz-button .booking:hover,
                .tz-wishlist .tz-tour-item .item-content .tz-info .tz-button .booking:hover,
                .tzElement_FeaturedTour.type-4 .tzTour-slider .tzTour-item .tzTour-info .tz-button a.more-tour:hover,
                .tz-wishlist .tz-tour-sold-out';

            $evox_style .= '{background-color:' . $evox_color_hover_2 . '}';
        endif;

        if ($evox_color_icon != ''):
            /* color */
            $evox_style .= '.tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-title span i,
                .tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-time .tz-destination .icon,
                .tzElement_FeaturedTour.type-2 .tzTour-slider .tzTour-item .tzTour-info .tz-title span i,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .tzTour-item .tzTour-info .tz-time .tz-date .icon,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .tzTour-item .tzTour-info .tz-time .tz-destination .icon,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .tzTour-item .tzTour-info .tz-time .tz-duration .icon,
                .tzElement_LatestTour.type-2 .latest-slider .tzLatest-item .tz-info .tz-title span i,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .tz-info .tz-title span i,
                .tz-tour-archive .tz-tour-content.tour-layout-list .tz-tour-item .item-content .tz-info .tz-time .tz-date .icon,
                .tz-tour-archive .tz-tour-content.tour-layout-list .tz-tour-item .item-content .tz-info .tz-time .tz-depature .icon,
                .tzElement_FeaturedTour.type-1 .tzTour-item .tzTour-info .tz-time .tz-date .icon,
                .tz-tour-single .tz-tour-other .tz-tour-item .other-title span i,
                .tz-wishlist .tz-tour-item .item-content .tz-info .tz-title span i,
                .tz-wishlist.tour-layout-list .tz-tour-item .item-content .tz-info .tz-time .tz-date .icon,
                .tz-wishlist.tour-layout-list .tz-tour-item .item-content .tz-info .tz-time .tz-depature .icon,
                .tzElement_FeaturedTour.type-4 .tzTour-slider .tzTour-item .tzTour-info .tz-time .tz-address i,
                .tzElement_FeaturedTour.type-4 .tzTour-slider .tzTour-item .tzTour-info .tz-time .tz-duration i,
                .tzElement_FeaturedTour.type-4 .tzTour-slider .tzTour-item .tzTour-info .tz-time .tz-price i,
                .wpe__rating div.star-rating,.wpe__ratings';
            $evox_style .= '{color:' . $evox_color_icon . '}';

            /* background color */
            $evox_style .= '.tz-tour-archive .tz-sidebar-filter .filter-item.search-filter .form-group .departure-date::after,
                .tz-tour-archive .tz-sidebar-filter .filter-item .select-styled::after,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form .book-departure-date::after,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form .st_adults_children .input-number-ticket .input-number-decrement,
                .tz-tour-single .tz-tour-content .tz-tour-booking .tz-tour-book-form .st_adults_children .input-number-ticket .input-number-increment,
                .tz-tour-cart table tbody tr .input-number-ticket .input-number-decrement,
                .tz-tour-cart table tbody tr .input-number-ticket .input-number-increment,
                .tzElement_FeaturedTour.type-3 .tzTour-slider .tzTour-item .tzTour-info .tz-title .trend,
                .tz-tour-archive .tz-sidebar-filter .filter-item .select-styled:after,
                .tz-tour-archive .tz-sidebar-filter .filter-item.search-filter .form-group .departure-date:after,
                .tz-form-booking-ajax-content .tz-tour-booking .tz-tour-book-form .book-departure-date::after,
                .tz-form-booking-ajax-content .tz-tour-booking .tz-tour-book-form .st_adults_children .input-number-ticket .input-number-decrement,
                .tz-form-booking-ajax-content .tz-tour-booking .tz-tour-book-form .st_adults_children .input-number-ticket .input-number-increment,
                .tz-tour-archive input[type=range]::-moz-range-thumb';
            $evox_style .= '{background-color:' . $evox_color_icon . '}';

            $evox_style .= '.tz-tour-archive input[type=range]::-webkit-slider-thumb';
            $evox_style .= '{background-color:' . $evox_color_icon . '}';

            $evox_style .= '.tz-tour-archive input[type=range]::-ms-thumb';
            $evox_style .= '{background-color:' . $evox_color_icon . '}';

        endif;

        if ($evox_color_flag != ''):
            /* background color */
            $evox_style .= '.tzElement_FeaturedTour.type-1 .tzTour-item .tzImg-tour .discount,
                .tzElement_LatestTour.type-1 .tzLatest-item .tz-thumb .discount,
                .tzElement_LatestTour.type-2 .tzLatest-top .view-more,
                .tzElement_FeaturedTour.type-2 .tzTour-slider .tzTour-item .tzImg-tour .discount,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .discount span,
                .tz-destination-single .destination-tour .destination-tour-grid .destination-tour-item .item-content .discount span,
                .tz-tour-single .tz-tour-other .tz-tour-item .other-discount span,
                .tz-wishlist .tz-tour-item .item-content .discount span';
            $evox_style .= '{background-color:' . $evox_color_flag . '}';

            $evox_style .= '.tzElement_FeaturedTour.type-1 .tzTour-item .tzImg-tour .discount::before,
                .tzElement_FeaturedTour.type-1 .tzTour-item .tzImg-tour .discount::after,
                .tzElement_LatestTour.type-1 .tzLatest-item .tz-thumb .discount::before,
                .tzElement_LatestTour.type-1 .tzLatest-item .tz-thumb .discount::after,
                .tzElement_FeaturedTour.type-2 .tzTour-slider .tzTour-item .tzImg-tour .discount::before,
                .tzElement_FeaturedTour.type-2 .tzTour-slider .tzTour-item .tzImg-tour .discount::after,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .discount::before,
                .tz-tour-archive .tz-tour-content .tz-tour-item .item-content .discount::after,
                .tz-tour-single .tz-tour-other .tz-tour-item .other-discount::before,
                .tz-tour-single .tz-tour-other .tz-tour-item .other-discount::after,
                .tz-wishlist .tz-tour-item .item-content .discount::before,
                .tz-wishlist .tz-tour-item .item-content .discount::after,
                .tz-destination-single .destination-tour .destination-tour-grid .destination-tour-item .item-content .discount:before,
                .tz-destination-single .destination-tour .destination-tour-grid .destination-tour-item .item-content .discount:after';
            $evox_style .= '{border-left-color:' . $evox_color_flag . '}';
            // color
            $evox_style .= '.tzElement_TourKind .tourKind-item .info .tz-price span.price';
            $evox_style .= '{color:' . $evox_color_flag . '}';
        endif;

        if ($evox_custom_css != '') {
            $evox_style .= $evox_custom_css;
        }

        if (!empty($evox_style)) {
            if (!is_child_theme()) {
                wp_add_inline_style('evox-style', $evox_style);
            } else {
                wp_add_inline_style('evox-child-style', $evox_style);
            }
        }

        if (!function_exists('has_site_icon') || !has_site_icon()) {
            global $evox_options;
            if($evox_options['evox_favicon_upload']){
                $evox_favicon = $evox_options['evox_favicon_upload']['url'];
                if ($evox_favicon) {
                    echo '<link rel="shortcut icon" href="' . esc_url($evox_favicon) . '" type="image/x-icon" />';
                }
            }
        }
    }
endif;
?>