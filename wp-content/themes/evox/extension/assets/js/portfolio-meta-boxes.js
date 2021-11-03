/*global jQuery: false, themeprefix: false */

jQuery(document).ready(function(){
    "use strict";

    var $evox_checkpage = jQuery('#page_template').val();
    switch ($evox_checkpage){
        case 'template-homeslide.php':
            jQuery('#evox_home_slide_option').slideDown();
            jQuery('#evox_page_default_option').slideUp();
            jQuery('#evox_page_general_options').slideUp();
            jQuery('#evox_header_footer_page_options').slideUp();
            jQuery('#evox_newsletter_page_options').slideUp();
            jQuery('#evox_breadcrumb_page_options').slideUp();
            jQuery('#evox_footer_page_options').slideUp();
            break;
        case 'template-homepage.php':
            jQuery('#evox_home_slide_option').slideUp();
            jQuery('#evox_page_default_option').slideUp();
            jQuery('#evox_page_general_options').slideUp();
            jQuery('#evox_header_footer_page_options').slideDown();
            jQuery('#evox_newsletter_page_options').slideDown();
            jQuery('#evox_breadcrumb_page_options').slideUp();
            jQuery('#evox_footer_page_options').slideDown();
            break;
        case 'template-login.php':
            jQuery('#evox_home_slide_option').slideUp();
            jQuery('#evox_page_default_option').slideUp();
            jQuery('#evox_page_general_options').slideUp();
            jQuery('#evox_header_footer_page_options').slideDown();
            jQuery('#evox_newsletter_page_options').slideDown();
            jQuery('#evox_breadcrumb_page_options').slideDown();
            jQuery('#evox_footer_page_options').slideDown();
            break;
        case 'template-landingpage.php':
            jQuery('#evox_home_slide_option').slideUp();
            jQuery('#evox_page_default_option').slideUp();
            jQuery('#evox_page_general_options').slideUp();
            jQuery('#evox_header_footer_page_options').slideUp();
            jQuery('#evox_newsletter_page_options').slideUp();
            jQuery('#evox_breadcrumb_page_options').slideUp();
            jQuery('#evox_footer_page_options').slideUp();
            break;
        default :
            jQuery('#evox_home_slide_option').slideUp();
            jQuery('#evox_page_default_option').slideDown();
            jQuery('#evox_page_general_options').slideDown();
            jQuery('#evox_header_footer_page_options').slideDown();
            jQuery('#evox_newsletter_page_options').slideDown();
            jQuery('#evox_breadcrumb_page_options').slideDown();
            jQuery('#evox_footer_page_options').slideDown();
            break;
    }

    jQuery('#page_template').change(function(){
        var $evox_page_value = jQuery(this).val();
        switch ($evox_page_value){
            case 'template-homeslide.php':
                jQuery('#evox_home_slide_option').slideDown();
                jQuery('#evox_page_default_option').slideUp();
                jQuery('#evox_page_general_options').slideUp();
                jQuery('#evox_header_footer_page_options').slideUp();
                jQuery('#evox_newsletter_page_options').slideUp();
                jQuery('#evox_breadcrumb_page_options').slideUp();
                jQuery('#evox_footer_page_options').slideUp();
                break;
            case 'template-homepage.php':
                jQuery('#evox_home_slide_option').slideUp();
                jQuery('#evox_page_default_option').slideUp();
                jQuery('#evox_page_general_options').slideUp();
                jQuery('#evox_header_footer_page_options').slideDown();
                jQuery('#evox_newsletter_page_options').slideDown();
                jQuery('#evox_breadcrumb_page_options').slideUp();
                jQuery('#evox_footer_page_options').slideDown();
                break;
            case 'template-login.php':
                jQuery('#evox_home_slide_option').slideUp();
                jQuery('#evox_page_default_option').slideUp();
                jQuery('#evox_page_general_options').slideUp();
                jQuery('#evox_header_footer_page_options').slideDown();
                jQuery('#evox_newsletter_page_options').slideDown();
                jQuery('#evox_breadcrumb_page_options').slideDown();
                jQuery('#evox_footer_page_options').slideDown();
                break;
            case 'template-landingpage.php':
                jQuery('#evox_home_slide_option').slideUp();
                jQuery('#evox_page_default_option').slideUp();
                jQuery('#evox_page_general_options').slideUp();
                jQuery('#evox_header_footer_page_options').slideUp();
                jQuery('#evox_newsletter_page_options').slideUp();
                jQuery('#evox_breadcrumb_page_options').slideUp();
                jQuery('#evox_footer_page_options').slideUp();
                break;
            default :
                jQuery('#evox_home_slide_option').slideUp();
                jQuery('#evox_page_default_option').slideDown();
                jQuery('#evox_page_general_options').slideDown();
                jQuery('#evox_header_footer_page_options').slideDown();
                jQuery('#evox_newsletter_page_options').slideDown();
                jQuery('#evox_breadcrumb_page_options').slideDown();
                jQuery('#evox_footer_page_options').slideDown();
                break;
        }
    });

    // Tour type

    var $tour_type = jQuery('#evox_tour_type').val();
    if($tour_type == 'daily') {
        jQuery('#evox_departure_date').parent().parent().slideUp();
        jQuery('#evox_tour_start_date').parent().parent().slideDown();
        jQuery('#evox_tour_end_date').parent().parent().slideDown();
        jQuery('#evox_available_days').parent().parent().slideDown();
        jQuery('#evox_tour_external_note').parent().parent().slideUp();
        jQuery('#evox_tour_external_button').parent().parent().slideUp();
        jQuery('#evox_tour_external_link').parent().parent().slideUp();
    }else if($tour_type == 'external') {
        jQuery('#evox_departure_date').parent().parent().slideUp();
        jQuery('#evox_tour_start_date').parent().parent().slideUp();
        jQuery('#evox_tour_end_date').parent().parent().slideUp();
        jQuery('#evox_available_days').parent().parent().slideUp();
        jQuery('#evox_tour_external_note').parent().parent().slideDown();
        jQuery('#evox_tour_external_button').parent().parent().slideDown();
        jQuery('#evox_tour_external_link').parent().parent().slideDown();
    }else{
        jQuery('#evox_departure_date').parent().parent().slideDown();
        jQuery('#evox_tour_start_date').parent().parent().slideUp();
        jQuery('#evox_tour_end_date').parent().parent().slideUp();
        jQuery('#evox_available_days').parent().parent().slideUp();
        jQuery('#evox_tour_external_note').parent().parent().slideUp();
        jQuery('#evox_tour_external_button').parent().parent().slideUp();
        jQuery('#evox_tour_external_link').parent().parent().slideUp();
    }

    jQuery('#evox_tour_type').change(function(){
        if(jQuery(this).val() == 'daily') {
            jQuery('#evox_departure_date').parent().parent().slideUp();
            jQuery('#evox_tour_start_date').parent().parent().slideDown();
            jQuery('#evox_tour_end_date').parent().parent().slideDown();
            jQuery('#evox_available_days').parent().parent().slideDown();
            jQuery('#evox_tour_external_note').parent().parent().slideUp();
            jQuery('#evox_tour_external_button').parent().parent().slideUp();
            jQuery('#evox_tour_external_link').parent().parent().slideUp();
        }else if(jQuery(this).val() == 'external') {
            jQuery('#evox_departure_date').parent().parent().slideUp();
            jQuery('#evox_tour_start_date').parent().parent().slideUp();
            jQuery('#evox_tour_end_date').parent().parent().slideUp();
            jQuery('#evox_available_days').parent().parent().slideUp();
            jQuery('#evox_tour_external_note').parent().parent().slideDown();
            jQuery('#evox_tour_external_button').parent().parent().slideDown();
            jQuery('#evox_tour_external_link').parent().parent().slideDown();
        }else{
            jQuery('#evox_departure_date').parent().parent().slideDown();
            jQuery('#evox_tour_start_date').parent().parent().slideUp();
            jQuery('#evox_tour_end_date').parent().parent().slideUp();
            jQuery('#evox_available_days').parent().parent().slideUp();
            jQuery('#evox_tour_external_note').parent().parent().slideUp();
            jQuery('#evox_tour_external_button').parent().parent().slideUp();
            jQuery('#evox_tour_external_link').parent().parent().slideUp();
        }
    });

    /* Tour Booking Head */
    var $tour_booking_head = jQuery('#evox_tour_booking_head_option').val();
    if($tour_booking_head == 'custom') {
        jQuery('#evox_tour_booking_head_display').parent().parent().slideDown();
    }else{
        jQuery('#evox_tour_booking_head_display').parent().parent().slideUp();
    }

    jQuery('#evox_tour_booking_head_option').change(function(){
        if(jQuery(this).val() == 'custom') {
            jQuery('#evox_tour_booking_head_display').parent().parent().slideDown();
        }else{
            jQuery('#evox_tour_booking_head_display').parent().parent().slideUp();
        }
    });

    /* Tour Booking Form */
    var $tour_booking_form = jQuery('#evox_tour_booking_form_option').val();
    if($tour_booking_form == 'custom') {
        jQuery('#evox_tour_booking_form_display').parent().parent().slideDown();
    }else{
        jQuery('#evox_tour_booking_form_display').parent().parent().slideUp();
    }

    jQuery('#evox_tour_booking_form_option').change(function(){
        if(jQuery(this).val() == 'custom') {
            jQuery('#evox_tour_booking_form_display').parent().parent().slideDown();
        }else{
            jQuery('#evox_tour_booking_form_display').parent().parent().slideUp();
        }
    });

    /* Tour Contact */
    var $tour_contact = jQuery('#evox_tour_contact_option').val();
    if($tour_contact == 'custom') {
        jQuery('#evox_tour_contact_display').parent().parent().slideDown();
    }else{
        jQuery('#evox_tour_contact_display').parent().parent().slideUp();
    }

    jQuery('#evox_tour_contact_option').change(function(){
        if(jQuery(this).val() == 'custom') {
            jQuery('#evox_tour_contact_display').parent().parent().slideDown();
        }else{
            jQuery('#evox_tour_contact_display').parent().parent().slideUp();
        }
    });

    /* Tour Contact */
    var $tour_manager_people = jQuery('#evox_tour_manager_people').prop('checked');
    if($tour_manager_people){
        jQuery('#evox_tour_total_people').parent().parent().slideDown();
    }else{
        jQuery('#evox_tour_total_people').parent().parent().slideUp();
    }

    jQuery('#evox_tour_manager_people').change(function(){
        if(jQuery(this).prop('checked')) {
            jQuery('#evox_tour_total_people').parent().parent().slideDown();
        }else{
            jQuery('#evox_tour_total_people').parent().parent().slideUp();
        }
    });

    var $evox_logo_type = jQuery('#evox_home_slide_logo_type').val();
    if($evox_logo_type == 'image') {
        jQuery('#evox_home_slide_logo_text').parent().parent().slideUp();
        jQuery('input[name$="evox_home_slide_logo_image"]').parent().parent().slideDown();
    }else{
        jQuery('#evox_home_slide_logo_text').parent().parent().slideDown();
        jQuery('input[name$="evox_home_slide_logo_image"]').parent().parent().slideUp();
    }

    jQuery('#evox_home_slide_logo_type').change(function(){
        if(jQuery(this).val() == 'image') {
            jQuery('#evox_home_slide_logo_text').parent().parent().slideUp();
            jQuery('input[name$="evox_home_slide_logo_image"]').parent().parent().slideDown();
        }else{
            jQuery('#evox_home_slide_logo_text').parent().parent().slideDown();
            jQuery('input[name$="evox_home_slide_logo_image"]').parent().parent().slideUp();
        }
    });

    var $evox_search_option = jQuery('#evox_home_slide_search_option').val();
    if($evox_search_option == 'show') {
        jQuery('#evox_home_slide_search_field_name_option').parent().parent().slideDown();
        jQuery('#evox_home_slide_search_field_destination_option').parent().parent().slideDown();
        jQuery('#evox_home_slide_search_field_destination_label').parent().parent().slideDown();
        jQuery('#evox_home_slide_search_field_date_option').parent().parent().slideDown();
        jQuery('#evox_home_slide_search_field_date_label').parent().parent().slideDown();
        jQuery('#evox_home_slide_search_field_duration_option').parent().parent().slideDown();
        jQuery('#evox_home_slide_search_field_duration_label').parent().parent().slideDown();
        jQuery('#evox_home_slide_search_field_category_option').parent().parent().slideDown();
        jQuery('#evox_home_slide_search_field_category_label').parent().parent().slideDown();
        jQuery('#evox_home_slide_search_field_language_option').parent().parent().slideDown();
        jQuery('#evox_home_slide_search_field_language_label').parent().parent().slideDown();
    }else{
        jQuery('#evox_home_slide_search_field_name_option').parent().parent().slideUp();
        jQuery('#evox_home_slide_search_field_name_label').parent().parent().slideUp();
        jQuery('#evox_home_slide_search_field_destination_option').parent().parent().slideUp();
        jQuery('#evox_home_slide_search_field_destination_label').parent().parent().slideUp();
        jQuery('#evox_home_slide_search_field_date_option').parent().parent().slideUp();
        jQuery('#evox_home_slide_search_field_date_label').parent().parent().slideUp();
        jQuery('#evox_home_slide_search_field_duration_option').parent().parent().slideUp();
        jQuery('#evox_home_slide_search_field_duration_label').parent().parent().slideUp();
        jQuery('#evox_home_slide_search_field_category_option').parent().parent().slideUp();
        jQuery('#evox_home_slide_search_field_category_label').parent().parent().slideUp();
        jQuery('#evox_home_slide_search_field_language_option').parent().parent().slideUp();
        jQuery('#evox_home_slide_search_field_language_label').parent().parent().slideUp();
    }

    jQuery('#evox_home_slide_search_option').change(function(){
        if(jQuery(this).val() == 'show') {
            jQuery('#evox_home_slide_search_field_name_option').parent().parent().slideDown();
            jQuery('#evox_home_slide_search_field_name_label').parent().parent().slideDown();
            jQuery('#evox_home_slide_search_field_destination_option').parent().parent().slideDown();
            jQuery('#evox_home_slide_search_field_destination_label').parent().parent().slideDown();
            jQuery('#evox_home_slide_search_field_date_option').parent().parent().slideDown();
            jQuery('#evox_home_slide_search_field_date_label').parent().parent().slideDown();
            jQuery('#evox_home_slide_search_field_duration_option').parent().parent().slideDown();
            jQuery('#evox_home_slide_search_field_duration_label').parent().parent().slideDown();
            jQuery('#evox_home_slide_search_field_category_option').parent().parent().slideDown();
            jQuery('#evox_home_slide_search_field_category_label').parent().parent().slideDown();
            jQuery('#evox_home_slide_search_field_language_option').parent().parent().slideDown();
            jQuery('#evox_home_slide_search_field_language_label').parent().parent().slideDown();
        }else{
            jQuery('#evox_home_slide_search_field_name_option').parent().parent().slideUp();
            jQuery('#evox_home_slide_search_field_name_label').parent().parent().slideUp();
            jQuery('#evox_home_slide_search_field_destination_option').parent().parent().slideUp();
            jQuery('#evox_home_slide_search_field_destination_label').parent().parent().slideUp();
            jQuery('#evox_home_slide_search_field_date_option').parent().parent().slideUp();
            jQuery('#evox_home_slide_search_field_date_label').parent().parent().slideUp();
            jQuery('#evox_home_slide_search_field_duration_option').parent().parent().slideUp();
            jQuery('#evox_home_slide_search_field_duration_label').parent().parent().slideUp();
            jQuery('#evox_home_slide_search_field_category_option').parent().parent().slideUp();
            jQuery('#evox_home_slide_search_field_category_label').parent().parent().slideUp();
            jQuery('#evox_home_slide_search_field_language_option').parent().parent().slideUp();
            jQuery('#evox_home_slide_search_field_language_label').parent().parent().slideUp();
        }
    });

    var $evox_header_option = jQuery('#evox_header_page_option').val();
    if($evox_header_option == 'custom') {
        jQuery('#evox_header_page_type').parent().parent().slideDown();

    }else{
        jQuery('#evox_header_page_type').parent().parent().slideUp();
    }

    jQuery('#evox_header_page_option').change(function(){
        if(jQuery(this).val() == 'custom') {
            jQuery('#evox_header_page_type').parent().parent().slideDown();

        }else{
            jQuery('#evox_header_page_type').parent().parent().slideUp();
        }
    });

    var $evox_breadcrumb_option = jQuery('#evox_breadcrumb_page_option').val();
    if($evox_breadcrumb_option == 'custom') {
        jQuery('#evox_breadcrumb_page_show').parent().parent().slideDown();
        jQuery('input[name="evox_breadcrumb_page_bgimage"]').parent().parent().slideDown();
        jQuery('#evox_breadcrumb_page_title').parent().parent().slideDown();
        jQuery('#evox_breadcrumb_page_path').parent().parent().slideDown();
        jQuery('#evox_breadcrumb_page_padding_top').parent().parent().slideDown();
        jQuery('#evox_breadcrumb_page_padding_bottom').parent().parent().slideDown();

    }else{
        jQuery('#evox_breadcrumb_page_show').parent().parent().slideUp();
        jQuery('input[name="evox_breadcrumb_page_bgimage"]').parent().parent().slideUp();
        jQuery('#evox_breadcrumb_page_title').parent().parent().slideUp();
        jQuery('#evox_breadcrumb_page_path').parent().parent().slideUp();
        jQuery('#evox_breadcrumb_page_padding_top').parent().parent().slideUp();
        jQuery('#evox_breadcrumb_page_padding_bottom').parent().parent().slideUp();
    }

    jQuery('#evox_breadcrumb_page_option').change(function(){
        if(jQuery(this).val() == 'custom') {
            jQuery('#evox_breadcrumb_page_show').parent().parent().slideDown();
            jQuery('input[name="evox_breadcrumb_page_bgimage"]').parent().parent().slideDown();
            jQuery('#evox_breadcrumb_page_title').parent().parent().slideDown();
            jQuery('#evox_breadcrumb_page_path').parent().parent().slideDown();
            jQuery('#evox_breadcrumb_page_padding_top').parent().parent().slideDown();
            jQuery('#evox_breadcrumb_page_padding_bottom').parent().parent().slideDown();

        }else{
            jQuery('#evox_breadcrumb_page_show').parent().parent().slideUp();
            jQuery('input[name="evox_breadcrumb_page_bgimage"]').parent().parent().slideUp();
            jQuery('#evox_breadcrumb_page_title').parent().parent().slideUp();
            jQuery('#evox_breadcrumb_page_path').parent().parent().slideUp();
            jQuery('#evox_breadcrumb_page_padding_top').parent().parent().slideUp();
            jQuery('#evox_breadcrumb_page_padding_bottom').parent().parent().slideUp();
        }
    });
});
/* newsletter Js Metabox */
jQuery(window).load(function(){

    var $evox_newsletter_option = jQuery('#evox_newsletter_page_option').val();
    if($evox_newsletter_option == 'custom') {
        jQuery('#evox_newsletter_page_type').parent().parent().slideDown();
        jQuery('#evox_newsletter_page_title').parent().parent().slideDown();
        jQuery('#evox_newsletter_page_subtitle').parent().parent().slideDown();
        jQuery('input[name="evox_newsletter_page_bgimage"]').parent().parent().slideDown();
        jQuery('#evox_newsletter_page_bgcolo').parent().parent().parent().parent().slideDown();

    }else{
        jQuery('#evox_newsletter_page_type').parent().parent().slideUp();
        jQuery('#evox_newsletter_page_title').parent().parent().slideUp();
        jQuery('#evox_newsletter_page_subtitle').parent().parent().slideUp();
        jQuery('input[name="evox_newsletter_page_bgimage"]').parent().parent().slideUp();
        jQuery('#evox_newsletter_page_bgcolo').parent().parent().parent().parent().slideUp();
    }

    jQuery('#evox_newsletter_page_option').change(function(){
        if(jQuery(this).val() == 'custom') {
            jQuery('#evox_newsletter_page_type').parent().parent().slideDown();
            jQuery('#evox_newsletter_page_title').parent().parent().slideDown();
            jQuery('#evox_newsletter_page_subtitle').parent().parent().slideDown();
            jQuery('input[name="evox_newsletter_page_bgimage"]').parent().parent().slideDown();
            jQuery('#evox_newsletter_page_bgcolo').parent().parent().parent().parent().slideDown();

        }else{
            jQuery('#evox_newsletter_page_type').parent().parent().slideUp();
            jQuery('#evox_newsletter_page_title').parent().parent().slideUp();
            jQuery('#evox_newsletter_page_subtitle').parent().parent().slideUp();
            jQuery('input[name="evox_newsletter_page_bgimage"]').parent().parent().slideUp();
            jQuery('#evox_newsletter_page_bgcolo').parent().parent().parent().parent().slideUp();
        }
    });
});
/* Footer Js Metabox */
jQuery(window).load(function(){

    var $evox_footer_page_option = jQuery('#evox_footer_page_option').val();
    if($evox_footer_page_option == 'custom') {
        jQuery('#evox_footer_page_type').parent().parent().slideDown();
        jQuery('#evox_footer_one_option').parent().parent().slideDown();
        jQuery('input[name="evox_footer_page_bgimage"]').parent().parent().slideDown();
        jQuery('#evox_footer_page_bgcolo').parent().parent().parent().parent().slideDown();
        jQuery('#evox_footer_page_padding').parent().parent().slideDown();
        jQuery('#evox_footer_gallery_type').parent().parent().slideDown();

    }else{
        jQuery('#evox_footer_page_type').parent().parent().slideUp();
        jQuery('#evox_footer_one_option').parent().parent().slideUp();
        jQuery('input[name="evox_footer_page_bgimage"]').parent().parent().slideUp();
        jQuery('#evox_footer_page_bgcolo').parent().parent().parent().parent().slideUp();
        jQuery('#evox_footer_page_padding').parent().parent().slideUp();
        jQuery('#evox_footer_gallery_type').parent().parent().slideUp();
    }

    jQuery('#evox_footer_page_option').change(function(){
        if(jQuery(this).val() == 'custom') {
            jQuery('#evox_footer_page_type').parent().parent().slideDown();
            jQuery('#evox_footer_one_option').parent().parent().slideDown();
            jQuery('input[name="evox_footer_page_bgimage"]').parent().parent().slideDown();
            jQuery('#evox_footer_page_bgcolo').parent().parent().parent().parent().slideDown();
            jQuery('#evox_footer_page_padding').parent().parent().slideDown();
            jQuery('#evox_footer_gallery_type').parent().parent().slideDown();

        }else{
            jQuery('#evox_footer_page_type').parent().parent().slideUp();
            jQuery('#evox_footer_one_option').parent().parent().slideUp();
            jQuery('input[name="evox_footer_page_bgimage"]').parent().parent().slideUp();
            jQuery('#evox_footer_page_bgcolo').parent().parent().parent().parent().slideUp();
            jQuery('#evox_footer_page_padding').parent().parent().slideUp();
            jQuery('#evox_footer_gallery_type').parent().parent().slideUp();
        }
    });

    var $evox_footer_option = jQuery('#evox_footer_page_type').val();

    if($evox_footer_option == '1') {
        jQuery('#evox_footer_one_option').parent().parent().slideUp();
        jQuery('input[name="evox_footer_page_bgimage"]').parent().parent().slideDown();
        jQuery('#evox_footer_page_bgcolo').parent().parent().parent().parent().slideDown();
        jQuery('#evox_footer_page_padding').parent().parent().slideDown();
        jQuery('#evox_footer_gallery_type').parent().parent().slideUp();

    }else if($evox_footer_option == '0'){
        jQuery('#evox_footer_one_option').parent().parent().slideDown();
        jQuery('input[name="evox_footer_page_bgimage"]').parent().parent().slideDown();
        jQuery('#evox_footer_page_bgcolo').parent().parent().parent().parent().slideDown();
        jQuery('#evox_footer_page_padding').parent().parent().slideUp();
        jQuery('#evox_footer_gallery_type').parent().parent().slideUp();
    }else if($evox_footer_option == '2'){
        jQuery('#evox_footer_one_option').parent().parent().slideUp();
        jQuery('input[name="evox_footer_page_bgimage"]').parent().parent().slideUp();
        jQuery('#evox_footer_page_bgcolo').parent().parent().parent().parent().slideUp();
        jQuery('#evox_footer_page_padding').parent().parent().slideUp();
        jQuery('#evox_footer_gallery_type').parent().parent().slideDown();
    }else{
        jQuery('#evox_footer_one_option').parent().parent().slideUp();
        jQuery('input[name="evox_footer_page_bgimage"]').parent().parent().slideUp();
        jQuery('#evox_footer_page_bgcolo').parent().parent().parent().parent().slideUp();
        jQuery('#evox_footer_page_padding').parent().parent().slideUp();
        jQuery('#evox_footer_gallery_type').parent().parent().slideUp();
    }

    jQuery('#evox_footer_page_type').change(function(){
        if(jQuery(this).val() == '1') {
            jQuery('#evox_footer_one_option').parent().parent().slideUp();
            jQuery('input[name="evox_footer_page_bgimage"]').parent().parent().slideDown();
            jQuery('#evox_footer_page_bgcolo').parent().parent().parent().parent().slideDown();
            jQuery('#evox_footer_page_padding').parent().parent().slideDown();
            jQuery('#evox_footer_gallery_type').parent().parent().slideUp();

        }else if(jQuery(this).val() == '0'){
            jQuery('#evox_footer_one_option').parent().parent().slideDown();
            jQuery('input[name="evox_footer_page_bgimage"]').parent().parent().slideDown();
            jQuery('#evox_footer_page_bgcolo').parent().parent().parent().parent().slideDown();
            jQuery('#evox_footer_page_padding').parent().parent().slideUp();
            jQuery('#evox_footer_gallery_type').parent().parent().slideUp();
        }else if(jQuery(this).val() == '2'){
            jQuery('#evox_footer_one_option').parent().parent().slideUp();
            jQuery('input[name="evox_footer_page_bgimage"]').parent().parent().slideUp();
            jQuery('#evox_footer_page_bgcolo').parent().parent().parent().parent().slideUp();
            jQuery('#evox_footer_page_padding').parent().parent().slideUp();
            jQuery('#evox_footer_gallery_type').parent().parent().slideDown();
        }else{
            jQuery('#evox_footer_one_option').parent().parent().slideUp();
            jQuery('input[name="evox_footer_page_bgimage"]').parent().parent().slideUp();
            jQuery('#evox_footer_page_bgcolo').parent().parent().parent().parent().slideUp();
            jQuery('#evox_footer_page_padding').parent().parent().slideUp();
            jQuery('#evox_footer_gallery_type').parent().parent().slideUp();
        }
    });

    var $evox_footer_bt_option = jQuery('#evox_footer_bottom_page_option').val();

    if($evox_footer_bt_option == 'default') {
        jQuery('#evox_footer_bottom_page_type').parent().parent().slideUp();
    }else{
        jQuery('#evox_footer_bottom_page_type').parent().parent().slideDown();
    }

    jQuery('#evox_footer_bottom_page_option').change(function(){
        if(jQuery(this).val() == 'default') {
            jQuery('#evox_footer_bottom_page_type').parent().parent().slideUp();

        }else{
            jQuery('#evox_footer_bottom_page_type').parent().parent().slideDown();
        }
    });
});
