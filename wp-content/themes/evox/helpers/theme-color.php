<?php

defined('TEMPLAZA_FRAMEWORK');

use TemPlazaFramework\Functions;
use TemPlazaFramework\Templates;
use TemPlazaFramework\CSS;
if ( class_exists( 'TemPlazaFramework\TemPlazaFramework' ) ) {
$options            = Functions::get_theme_options();
$evox_color = isset($options['theme-color'])?$options['theme-color']:'#FED23D';
$button_color           = isset($options['button-color'])?$options['button-color']:'';
$button_color_hover     = isset($options['button-color-hover'])?$options['button-color-hover']:'';
$button_bg_color        = isset($options['button-background-color'])?$options['button-background-color']:'';
$button_bg_color_hover  = isset($options['button-background-color-hover'])?$options['button-background-color-hover']:'';

$button_color           = CSS::make_color_rgba_redux($button_color);
$button_bg_color        = CSS::make_color_rgba_redux($button_bg_color);
$button_color_hover     = CSS::make_color_rgba_redux($button_color_hover);
$button_bg_color_hover  = CSS::make_color_rgba_redux($button_bg_color_hover);



    if ($evox_color != '') {
        $theme_color = CSS::make_color_rgba_redux($evox_color);
        $evox_css = '
        .elementor-widget-wp-widget-widget_upcoming_events .event_listings_class .wpem-single-event-widget .wpem-event-infomation .wpem-event-details .wpem-event-title h3.wpem-heading-text,        
        .elementor-widget-wp-widget-widget_upcoming_events .event_listings_class .wpem-single-event-widget .wpem-event-infomation .wpem-event-details .wpem-event-title h3.wpem-heading-text:hover,
        .elementor-widget-wp-widget-widget_upcoming_events .event_listings_class .wpem-single-event-widget:hover .wpem-event-infomation .wpem-event-details .wpem-event-title h3.wpem-heading-text,
        .evox-breadcrumb ul li.item-current span, .templaza-heading ul li.item-current span,
        .event_listings .event_listings.wpem-event-listings.wpem-event-listing-box-view .wpem-event-layout-wrapper .wpem-event-details .wpem-date-info .wpem-event-category i, .event_listings .event_listings.wpem-event-listings.wpem-event-listing-list-view .wpem-event-layout-wrapper .wpem-event-details .wpem-date-info .wpem-event-category i, .wpem-tab-pane .event_listings.wpem-event-listings.wpem-event-listing-box-view .wpem-event-layout-wrapper .wpem-event-details .wpem-date-info .wpem-event-category i, .wpem-tab-pane .event_listings.wpem-event-listings.wpem-event-listing-list-view .wpem-event-layout-wrapper .wpem-event-details .wpem-date-info .wpem-event-category i,
        .event_listings .event_listings.wpem-event-listings.wpem-event-listing-box-view .wpem-event-layout-wrapper .wpem-event-details .wpem-event-date-time::before, .event_listings .event_listings.wpem-event-listings.wpem-event-listing-box-view .wpem-event-layout-wrapper .wpem-event-details .wpem-event-location::before, .event_listings .event_listings.wpem-event-listings.wpem-event-listing-list-view .wpem-event-layout-wrapper .wpem-event-details .wpem-event-date-time::before, .event_listings .event_listings.wpem-event-listings.wpem-event-listing-list-view .wpem-event-layout-wrapper .wpem-event-details .wpem-event-location::before, .wpem-tab-pane .event_listings.wpem-event-listings.wpem-event-listing-box-view .wpem-event-layout-wrapper .wpem-event-details .wpem-event-date-time::before, .wpem-tab-pane .event_listings.wpem-event-listings.wpem-event-listing-box-view .wpem-event-layout-wrapper .wpem-event-details .wpem-event-location::before, .wpem-tab-pane .event_listings.wpem-event-listings.wpem-event-listing-list-view .wpem-event-layout-wrapper .wpem-event-details .wpem-event-date-time::before, .wpem-tab-pane .event_listings.wpem-event-listings.wpem-event-listing-list-view .wpem-event-layout-wrapper .wpem-event-details .wpem-event-location::before,
        blockquote.wp-block-quote::before,
        ul.wp-block-archives li.current-cat::before, ul.wp-block-archives li:hover::before, ul.widget_meta li.current-cat::before, ul.widget_meta li:hover::before, ul.wp-block-page-list li.current-cat::before, ul.wp-block-page-list li:hover::before, ul.wp-block-categories li.current-cat::before, ul.wp-block-categories li:hover::before, ul.wp-block-categories__list li.current-cat::before, ul.wp-block-categories__list li:hover::before,
        .header-block-item i, .top-header i,
        .uk-slider .uk-slidenav
        {color: ' . $theme_color . ';}';

        $evox_css .= '
        .cause-donate-progress .cause-donate-result span::before,
        .cause-donate-progress .cause-donate-result,
        .templaza-footer .templaza-social li a:hover,
        .event_listings .event_listings.wpem-event-listings.wpem-event-listing-box-view .wpem-event-layout-wrapper .wpem-event-banner .wpem-event-date .wpem-event-date-type .wpem-from-date, .event_listings .event_listings.wpem-event-listings.wpem-event-listing-list-view .wpem-event-layout-wrapper .wpem-event-banner .wpem-event-date .wpem-event-date-type .wpem-from-date, .wpem-tab-pane .event_listings.wpem-event-listings.wpem-event-listing-box-view .wpem-event-layout-wrapper .wpem-event-banner .wpem-event-date .wpem-event-date-type .wpem-from-date, .wpem-tab-pane .event_listings.wpem-event-listings.wpem-event-listing-list-view .wpem-event-layout-wrapper .wpem-event-banner .wpem-event-date .wpem-event-date-type .wpem-from-date,
        .event_listings .wpem-event-listings-header .wpem-event-layout-action-wrapper .wpem-event-layout-action .wpem-event-layout-icon.wpem-active-layout, .event_listings .wpem-event-listings-header .wpem-event-layout-action-wrapper .wpem-event-layout-action .wpem-event-layout-icon:hover, .wpem-tab-pane .wpem-event-listings-header .wpem-event-layout-action-wrapper .wpem-event-layout-action .wpem-event-layout-icon.wpem-active-layout, .wpem-tab-pane .wpem-event-listings-header .wpem-event-layout-action-wrapper .wpem-event-layout-action .wpem-event-layout-icon:hover,
        .comiseo-daterangepicker-buttonpanel button:not(:hover):not(:active):not(.has-background),
        .elementor-widget-tabs .elementor-tabs .elementor-tab-title.elementor-active::after, .elementor-widget-tabs .elementor-tabs .elementor-tab-title:hover::after,
        div.templaza-sidebar .widget:hover > h1::after, div.templaza-sidebar .widget:hover > h2::after, div.templaza-sidebar .widget:hover > h3::after, div.templaza-sidebar .widget:hover > h4::after, div.templaza-sidebar .widget:hover > h5::after, div.templaza-sidebar .widget:hover > h6::after,
        .templaza-single-tags a:hover, .templaza-blog-share a:hover ,
        div.templaza-sidebar .widget:hover .widget-content > h1::after, div.templaza-sidebar .widget:hover .widget-content > h2::after, div.templaza-sidebar .widget:hover .widget-content > h3::after, div.templaza-sidebar .widget:hover .widget-content > h4::after, div.templaza-sidebar .widget:hover .widget-content > h5::after, div.templaza-sidebar .widget:hover .widget-content > h6::after, div.templaza-sidebar .widget:hover .wp-block-group > h1::after, div.templaza-sidebar .widget:hover .wp-block-group > h2::after, div.templaza-sidebar .widget:hover .wp-block-group > h3::after, div.templaza-sidebar .widget:hover .wp-block-group > h4::after, div.templaza-sidebar .widget:hover .wp-block-group > h5::after, div.templaza-sidebar .widget:hover .wp-block-group > h6::after, div.templaza-sidebar .widget:hover .wp-block-group__inner-container > h1::after, div.templaza-sidebar .widget:hover .wp-block-group__inner-container > h2::after, div.templaza-sidebar .widget:hover .wp-block-group__inner-container > h3::after, div.templaza-sidebar .widget:hover .wp-block-group__inner-container > h4::after, div.templaza-sidebar .widget:hover .wp-block-group__inner-container > h5::after, div.templaza-sidebar .widget:hover .wp-block-group__inner-container > h6::after,
        .templaza-single-content .wpem-single-event-page .wpem-single-event-wrapper .wpem-single-event-body .wpem-single-event-body-sidebar .wpem-event-category a:hover,
        .uk-slider .uk-slidenav:hover       
        {background-color: ' . $theme_color . ';}';

        Templates::add_inline_style($evox_css);
    }
    $evox_btn_css = '';
    if($button_color !=''){
        $evox_btn_css .='
        .templaza-btn:not(:hover):not(:active):not(.has-text-color),
        body .wpem-theme-button:not(:hover):not(:active):not(.has-background),
        body .wpem-theme-button:hover span,
        .event_listings a.load_more_events, .wpem-tab-pane a.load_more_events,
        .templaza-single-content .wpem-single-event-page .wpem-single-event-wrapper .wpem-single-event-body .wpem-single-event-body-sidebar .registration_button
        
        {color: ' . $button_color . ';}';
    }
    if($button_color_hover !=''){
        $evox_btn_css .='
        .templaza-btn:hover,
        body .wpem-theme-button:hover span,
        .event_listings a.load_more_events:hover, .wpem-tab-pane a.load_more_events:hover,
        .templaza-single-content .wpem-single-event-page .wpem-single-event-wrapper .wpem-single-event-body .wpem-single-event-body-sidebar .registration_button:hover
        
        {color: ' . $button_color_hover . ';}';
    }
    if($button_bg_color !=''){
        $evox_btn_css .='
        .templaza-btn:not(:hover):not(:active):not(.has-text-color),
        body .wpem-theme-button:not(:hover):not(:active):not(.has-background),
        .event_listings a.load_more_events, .wpem-tab-pane a.load_more_events,
        .templaza-single-content .wpem-single-event-page .wpem-single-event-wrapper .wpem-single-event-body .wpem-single-event-body-sidebar .registration_button
        
        {background-color: ' . $button_bg_color . ';}';
    }
    if($button_bg_color_hover !=''){
        $evox_btn_css .='
        .templaza-btn:hover,
        body .wpem-theme-button:hover,
        .event_listings a.load_more_events:hover, .wpem-tab-pane a.load_more_events:hover,
        .templaza-single-content .wpem-single-event-page .wpem-single-event-wrapper .wpem-single-event-body .wpem-single-event-body-sidebar .registration_button:hover
        
        {background-color: ' . $button_bg_color_hover . ';}';
    }
    Templates::add_inline_style($evox_btn_css);
}