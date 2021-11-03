<?php
global $evox_options;

$evox_register_page = ((!isset($evox_options['evox_register_page'])) || empty($evox_options['evox_register_page'])) ? '' : $evox_options['evox_register_page'];
if ($evox_register_page != '') {
    $evox_register_url = add_query_arg('action', 'register', evox_get_permalink_clang($evox_register_page));
} else {
    $evox_register_url = wp_registration_url();
}

/* Header Select Type */
$evox_header_theme_select = ((!isset($evox_options['evox_header_type_select'])) || empty($evox_options['evox_header_type_select'])) ? '0' : $evox_options['evox_header_type_select'];
$evox_header_page_option = evox_metabox('evox_header_page_option', '', '', 'default');
$evox_header_page_select = evox_metabox('evox_header_page_type', '', '', '0');

/* Header Type 1*/
$evox_header_type_1_location_menu = ((!isset($evox_options['evox_header_type_1_menu_locations'])) || empty($evox_options['evox_header_type_1_menu_locations'])) ? 'primary' : $evox_options['evox_header_type_1_menu_locations'];
$evox_header_type_1_top_display = ((!isset($evox_options['evox_header_type_1_top_display'])) || empty($evox_options['evox_header_type_1_top_display'])) ? '0' : $evox_options['evox_header_type_1_top_display'];
$evox_header_type_1_top_email = ((!isset($evox_options['evox_header_type_1_top_email'])) || empty($evox_options['evox_header_type_1_top_email'])) ? 'info@evox.com' : $evox_options['evox_header_type_1_top_email'];
$evox_header_type_1_top_phone = ((!isset($evox_options['evox_header_type_1_top_phone'])) || empty($evox_options['evox_header_type_1_top_phone'])) ? '+1-888-66-5555' : $evox_options['evox_header_type_1_top_phone'];
$evox_header_type_1_top_address = ((!isset($evox_options['evox_header_type_1_top_address'])) || empty($evox_options['evox_header_type_1_top_address'])) ? '8 Boulevard du Palais, 75001 Paris, France' : $evox_options['evox_header_type_1_top_address'];
$evox_header_type_1_top_randl = ((!isset($evox_options['evox_header_type_1_top_randl'])) || empty($evox_options['evox_header_type_1_top_randl'])) ? '0' : $evox_options['evox_header_type_1_top_randl'];
$evox_header_type_1_top_menu = ((!isset($evox_options['evox_header_type_1_top_menu'])) || empty($evox_options['evox_header_type_1_top_menu'])) ? 'choose' : $evox_options['evox_header_type_1_top_menu'];

$evox_header_type_1_logo_type = ((!isset($evox_options['evox_header_type_1_logo_option'])) || empty($evox_options['evox_header_type_1_logo_option'])) ? 'logo_image' : $evox_options['evox_header_type_1_logo_option'];
$evox_header_type_1_logo_image = ((!isset($evox_options['evox_header_type_1_logo_image'])) || empty($evox_options['evox_header_type_1_logo_image'])) ? '' : $evox_options['evox_header_type_1_logo_image'];
$evox_header_type_1_logo_text = ((!isset($evox_options['evox_header_type_1_logo_text'])) || empty($evox_options['evox_header_type_1_logo_text'])) ? '' : $evox_options['evox_header_type_1_logo_text'];
$evox_header_type_1_cart = ((!isset($evox_options['evox_header_type_1_cart'])) || empty($evox_options['evox_header_type_1_cart'])) ? '' : $evox_options['evox_header_type_1_cart'];
$evox_header_type_1_search = ((!isset($evox_options['evox_header_type_1_search'])) || empty($evox_options['evox_header_type_1_search'])) ? '' : $evox_options['evox_header_type_1_search'];
$evox_header_type_1_sticky = ((!isset($evox_options['evox_header_type_1_sticky'])) || empty($evox_options['evox_header_type_1_sticky'])) ? '' : $evox_options['evox_header_type_1_sticky'];

/* Header Type 2*/
$evox_header_type_2_location_menu = ((!isset($evox_options['evox_header_type_2_menu_locations'])) || empty($evox_options['evox_header_type_2_menu_locations'])) ? 'primary' : $evox_options['evox_header_type_2_menu_locations'];
$evox_header_type_2_logo_type = ((!isset($evox_options['evox_header_type_2_logo_option'])) || empty($evox_options['evox_header_type_2_logo_option'])) ? 'logo_image' : $evox_options['evox_header_type_2_logo_option'];
$evox_header_type_2_logo_image = ((!isset($evox_options['evox_header_type_2_logo_image'])) || empty($evox_options['evox_header_type_2_logo_image'])) ? '' : $evox_options['evox_header_type_2_logo_image'];
$evox_header_type_2_logo_text = ((!isset($evox_options['evox_header_type_2_logo_text'])) || empty($evox_options['evox_header_type_2_logo_text'])) ? '' : $evox_options['evox_header_type_2_logo_text'];
$evox_header_type_2_cart = ((!isset($evox_options['evox_header_type_2_cart'])) || empty($evox_options['evox_header_type_2_cart'])) ? '' : $evox_options['evox_header_type_2_cart'];
$evox_header_type_2_search = ((!isset($evox_options['evox_header_type_2_search'])) || empty($evox_options['evox_header_type_2_search'])) ? '' : $evox_options['evox_header_type_2_search'];
$evox_header_type_2_sticky = ((!isset($evox_options['evox_header_type_2_sticky'])) || empty($evox_options['evox_header_type_2_sticky'])) ? '' : $evox_options['evox_header_type_2_sticky'];

/* Header Type 3*/
$evox_header_type_3_location_menu = ((!isset($evox_options['evox_header_type_3_menu_locations'])) || empty($evox_options['evox_header_type_3_menu_locations'])) ? 'primary' : $evox_options['evox_header_type_3_menu_locations'];
$evox_header_type_3_top_display = ((!isset($evox_options['evox_header_type_3_top_display'])) || empty($evox_options['evox_header_type_3_top_display'])) ? '0' : $evox_options['evox_header_type_3_top_display'];
$evox_header_type_3_top_email = ((!isset($evox_options['evox_header_type_3_top_email'])) || empty($evox_options['evox_header_type_3_top_email'])) ? 'info@evox.com' : $evox_options['evox_header_type_3_top_email'];
$evox_header_type_3_top_phone = ((!isset($evox_options['evox_header_type_3_top_phone'])) || empty($evox_options['evox_header_type_3_top_phone'])) ? '+1-888-66-5555' : $evox_options['evox_header_type_3_top_phone'];
$evox_header_type_3_top_address = ((!isset($evox_options['evox_header_type_3_top_address'])) || empty($evox_options['evox_header_type_3_top_address'])) ? '8 Boulevard du Palais, 75001 Paris, France' : $evox_options['evox_header_type_3_top_address'];
$evox_header_type_3_top_randl = ((!isset($evox_options['evox_header_type_3_top_randl'])) || empty($evox_options['evox_header_type_3_top_randl'])) ? '0' : $evox_options['evox_header_type_3_top_randl'];
$evox_header_type_3_top_menu = ((!isset($evox_options['evox_header_type_3_top_menu'])) || empty($evox_options['evox_header_type_3_top_menu'])) ? 'choose' : $evox_options['evox_header_type_3_top_menu'];
$evox_header_type_3_logo_type = ((!isset($evox_options['evox_header_type_3_logo_option'])) || empty($evox_options['evox_header_type_3_logo_option'])) ? 'logo_image' : $evox_options['evox_header_type_3_logo_option'];
$evox_header_type_3_logo_image = ((!isset($evox_options['evox_header_type_3_logo_image'])) || empty($evox_options['evox_header_type_3_logo_image'])) ? '' : $evox_options['evox_header_type_3_logo_image'];
$evox_header_type_3_logo_text = ((!isset($evox_options['evox_header_type_3_logo_text'])) || empty($evox_options['evox_header_type_3_logo_text'])) ? '' : $evox_options['evox_header_type_3_logo_text'];
$evox_header_type_3_cart = ((!isset($evox_options['evox_header_type_3_cart'])) || empty($evox_options['evox_header_type_3_cart'])) ? '' : $evox_options['evox_header_type_3_cart'];
$evox_header_type_3_search = ((!isset($evox_options['evox_header_type_3_search'])) || empty($evox_options['evox_header_type_3_search'])) ? '' : $evox_options['evox_header_type_3_search'];
$evox_header_type_3_sticky = ((!isset($evox_options['evox_header_type_3_sticky'])) || empty($evox_options['evox_header_type_3_sticky'])) ? '' : $evox_options['evox_header_type_3_sticky'];

/* Header Type 4*/
$evox_header_type_4_location_menu = ((!isset($evox_options['evox_header_type_4_menu_locations'])) || empty($evox_options['evox_header_type_4_menu_locations'])) ? 'primary' : $evox_options['evox_header_type_4_menu_locations'];
$evox_header_type_4_logo_type = ((!isset($evox_options['evox_header_type_4_logo_option'])) || empty($evox_options['evox_header_type_4_logo_option'])) ? 'logo_image' : $evox_options['evox_header_type_4_logo_option'];
$evox_header_type_4_logo_image = ((!isset($evox_options['evox_header_type_4_logo_image'])) || empty($evox_options['evox_header_type_4_logo_image'])) ? '' : $evox_options['evox_header_type_4_logo_image'];
$evox_header_type_4_logo_text = ((!isset($evox_options['evox_header_type_4_logo_text'])) || empty($evox_options['evox_header_type_4_logo_text'])) ? '' : $evox_options['evox_header_type_4_logo_text'];
$evox_header_type_4_cart = ((!isset($evox_options['evox_header_type_4_cart'])) || empty($evox_options['evox_header_type_4_cart'])) ? '' : $evox_options['evox_header_type_4_cart'];
$evox_header_type_4_search = ((!isset($evox_options['evox_header_type_4_search'])) || empty($evox_options['evox_header_type_4_search'])) ? '' : $evox_options['evox_header_type_4_search'];
$evox_header_type_4_sticky = ((!isset($evox_options['evox_header_type_4_sticky'])) || empty($evox_options['evox_header_type_4_sticky'])) ? '' : $evox_options['evox_header_type_4_sticky'];

/* Header Type 5*/
$evox_header_type_5_revolution_slider = ((!isset($evox_options['evox_header_type_5_revolution_slider'])) || empty($evox_options['evox_header_type_5_revolution_slider'])) ? '' : $evox_options['evox_header_type_5_revolution_slider'];
$evox_header_type_5_search_options = ((!isset($evox_options['evox_header_type_5_search_options'])) || empty($evox_options['evox_header_type_5_search_options'])) ? '2' : $evox_options['evox_header_type_5_search_options'];
$evox_header_type_5_field_name_option = ((!isset($evox_options['evox_header_type_5_field_name_option'])) || empty($evox_options['evox_header_type_5_field_name_option'])) ? '1' : $evox_options['evox_header_type_5_field_name_option'];
$evox_header_type_5_field_name_label = ((!isset($evox_options['evox_header_type_5_field_name_label'])) || empty($evox_options['evox_header_type_5_field_name_label'])) ? '' : $evox_options['evox_header_type_5_field_name_label'];
$evox_header_type_5_field_destination_option = ((!isset($evox_options['evox_header_type_5_field_destination_option'])) || empty($evox_options['evox_header_type_5_field_destination_option'])) ? '1' : $evox_options['evox_header_type_5_field_destination_option'];
$evox_header_type_5_field_destination_label = ((!isset($evox_options['evox_header_type_5_field_destination_label'])) || empty($evox_options['evox_header_type_5_field_destination_label'])) ? '' : $evox_options['evox_header_type_5_field_destination_label'];
$evox_header_type_5_field_date_option = ((!isset($evox_options['evox_header_type_5_field_date_option'])) || empty($evox_options['evox_header_type_5_field_date_option'])) ? '1' : $evox_options['evox_header_type_5_field_date_option'];
$evox_header_type_5_field_date_label = ((!isset($evox_options['evox_header_type_5_field_date_label'])) || empty($evox_options['evox_header_type_5_field_date_label'])) ? '' : $evox_options['evox_header_type_5_field_date_label'];
$evox_header_type_5_field_duration_option = ((!isset($evox_options['evox_header_type_5_field_duration_option'])) || empty($evox_options['evox_header_type_5_field_duration_option'])) ? '1' : $evox_options['evox_header_type_5_field_duration_option'];
$evox_header_type_5_field_duration_label = ((!isset($evox_options['evox_header_type_5_field_duration_label'])) || empty($evox_options['evox_header_type_5_field_duration_label'])) ? '' : $evox_options['evox_header_type_5_field_duration_label'];
$evox_header_type_5_field_category_option = ((!isset($evox_options['evox_header_type_5_field_category_option'])) || empty($evox_options['evox_header_type_5_field_category_option'])) ? '1' : $evox_options['evox_header_type_5_field_category_option'];
$evox_header_type_5_field_category_label = ((!isset($evox_options['evox_header_type_5_field_category_label'])) || empty($evox_options['evox_header_type_5_field_category_label'])) ? '' : $evox_options['evox_header_type_5_field_category_label'];
$evox_header_type_5_field_language_option = ((!isset($evox_options['evox_header_type_5_field_language_option'])) || empty($evox_options['evox_header_type_5_field_language_option'])) ? '1' : $evox_options['evox_header_type_5_field_language_option'];
$evox_header_type_5_field_language_label = ((!isset($evox_options['evox_header_type_5_field_language_label'])) || empty($evox_options['evox_header_type_5_field_language_label'])) ? '' : $evox_options['evox_header_type_5_field_language_label'];
$evox_header_type_5_search_button = ((!isset($evox_options['evox_header_type_5_search_button'])) || empty($evox_options['evox_header_type_5_search_button'])) ? '' : $evox_options['evox_header_type_5_search_button'];
$evox_header_type_5_cart = ((!isset($evox_options['evox_header_type_5_cart'])) || empty($evox_options['evox_header_type_5_cart'])) ? '' : $evox_options['evox_header_type_5_cart'];
$evox_header_type_5_search = ((!isset($evox_options['evox_header_type_5_search'])) || empty($evox_options['evox_header_type_5_search'])) ? '' : $evox_options['evox_header_type_5_search'];
$evox_header_type_5_sticky = ((!isset($evox_options['evox_header_type_5_sticky'])) || empty($evox_options['evox_header_type_5_sticky'])) ? '' : $evox_options['evox_header_type_5_sticky'];

$evox_header_type_5_location_menu = ((!isset($evox_options['evox_header_type_5_menu_locations'])) || empty($evox_options['evox_header_type_5_menu_locations'])) ? 'primary' : $evox_options['evox_header_type_5_menu_locations'];
$evox_header_type_5_logo_type = ((!isset($evox_options['evox_header_type_5_logo_option'])) || empty($evox_options['evox_header_type_5_logo_option'])) ? 'logo_image' : $evox_options['evox_header_type_5_logo_option'];
$evox_header_type_5_logo_image = ((!isset($evox_options['evox_header_type_5_logo_image'])) || empty($evox_options['evox_header_type_5_logo_image'])) ? '' : $evox_options['evox_header_type_5_logo_image'];
$evox_header_type_5_logo_text = ((!isset($evox_options['evox_header_type_5_logo_text'])) || empty($evox_options['evox_header_type_5_logo_text'])) ? '' : $evox_options['evox_header_type_5_logo_text'];

/* Header Type 6*/
$evox_header_type_6_location_menu = ((!isset($evox_options['evox_header_type_6_menu_locations'])) || empty($evox_options['evox_header_type_6_menu_locations'])) ? 'primary' : $evox_options['evox_header_type_6_menu_locations'];
$evox_header_type_6_logo_type = ((!isset($evox_options['evox_header_type_6_logo_option'])) || empty($evox_options['evox_header_type_6_logo_option'])) ? 'logo_image' : $evox_options['evox_header_type_6_logo_option'];
$evox_header_type_6_logo_image = ((!isset($evox_options['evox_header_type_6_logo_image'])) || empty($evox_options['evox_header_type_6_logo_image'])) ? '' : $evox_options['evox_header_type_6_logo_image'];
$evox_header_type_6_logo_text = ((!isset($evox_options['evox_header_type_6_logo_text'])) || empty($evox_options['evox_header_type_6_logo_text'])) ? '' : $evox_options['evox_header_type_6_logo_text'];
$evox_header_type_6_cart = ((!isset($evox_options['evox_header_type_6_cart'])) || empty($evox_options['evox_header_type_6_cart'])) ? '' : $evox_options['evox_header_type_6_cart'];
$evox_header_type_6_search = ((!isset($evox_options['evox_header_type_6_search'])) || empty($evox_options['evox_header_type_6_search'])) ? '' : $evox_options['evox_header_type_6_search'];
$evox_header_type_6_sticky = ((!isset($evox_options['evox_header_type_6_sticky'])) || empty($evox_options['evox_header_type_6_sticky'])) ? '' : $evox_options['evox_header_type_6_sticky'];
/* Header Type 7*/
$evox_header_type_7_location_menu = ((!isset($evox_options['evox_header_type_7_menu_locations'])) || empty($evox_options['evox_header_type_7_menu_locations'])) ? 'primary' : $evox_options['evox_header_type_7_menu_locations'];
$evox_header_type_7_logo_type = ((!isset($evox_options['evox_header_type_7_logo_option'])) || empty($evox_options['evox_header_type_7_logo_option'])) ? 'logo_image' : $evox_options['evox_header_type_7_logo_option'];
$evox_header_type_7_logo_image = ((!isset($evox_options['evox_header_type_7_logo_image'])) || empty($evox_options['evox_header_type_7_logo_image'])) ? '' : $evox_options['evox_header_type_7_logo_image'];
$evox_header_type_7_logo_text = ((!isset($evox_options['evox_header_type_7_logo_text'])) || empty($evox_options['evox_header_type_7_logo_text'])) ? '' : $evox_options['evox_header_type_7_logo_text'];
$evox_header_type_7_cart = ((!isset($evox_options['evox_header_type_7_cart'])) || empty($evox_options['evox_header_type_7_cart'])) ? '' : $evox_options['evox_header_type_7_cart'];
$evox_header_type_7_search = ((!isset($evox_options['evox_header_type_7_search'])) || empty($evox_options['evox_header_type_7_search'])) ? '' : $evox_options['evox_header_type_7_search'];
$evox_header_type_7_sticky = ((!isset($evox_options['evox_header_type_7_sticky'])) || empty($evox_options['evox_header_type_7_sticky'])) ? '' : $evox_options['evox_header_type_7_sticky'];
/* Header Type 8*/
$evox_header_type_8_location_menu = ((!isset($evox_options['evox_header_type_8_menu_locations'])) || empty($evox_options['evox_header_type_8_menu_locations'])) ? 'custom-menu-6' : $evox_options['evox_header_type_8_menu_locations'];
$evox_header_type_8_logo_type = ((!isset($evox_options['evox_header_type_8_logo_option'])) || empty($evox_options['evox_header_type_8_logo_option'])) ? 'logo_image' : $evox_options['evox_header_type_8_logo_option'];
$evox_header_type_8_logo_image = ((!isset($evox_options['evox_header_type_8_logo_image'])) || empty($evox_options['evox_header_type_8_logo_image'])) ? '' : $evox_options['evox_header_type_8_logo_image'];
$evox_header_type_8_logo_text = ((!isset($evox_options['evox_header_type_8_logo_text'])) || empty($evox_options['evox_header_type_8_logo_text'])) ? '' : $evox_options['evox_header_type_8_logo_text'];
$evox_header_type_8_cart = ((!isset($evox_options['evox_header_type_8_cart'])) || empty($evox_options['evox_header_type_8_cart'])) ? '' : $evox_options['evox_header_type_8_cart'];
$evox_header_type_8_search = ((!isset($evox_options['evox_header_type_8_search'])) || empty($evox_options['evox_header_type_8_search'])) ? '' : $evox_options['evox_header_type_8_search'];
$evox_header_type_8_sticky = ((!isset($evox_options['evox_header_type_8_sticky'])) || empty($evox_options['evox_header_type_8_sticky'])) ? '' : $evox_options['evox_header_type_8_sticky'];
$evox_header_type_8_top_phone = ((!isset($evox_options['evox_header_type_8_top_phone'])) || empty($evox_options['evox_header_type_8_top_phone'])) ? 'Call us for free' : $evox_options['evox_header_type_8_top_phone'];
$evox_header_type_8_top_phone_lk = ((!isset($evox_options['evox_header_type_8_top_phone_lk'])) || empty($evox_options['evox_header_type_8_top_phone_lk'])) ? '' : $evox_options['evox_header_type_8_top_phone_lk'];
$evox_header_type_8_top_phone_nb = ((!isset($evox_options['evox_header_type_8_top_phone_lk'])) || empty($evox_options['evox_header_type_8_top_phone_nb'])) ? '123-456-789' : $evox_options['evox_header_type_8_top_phone_nb'];
$evox_header_type_8_top_flk = ((!isset($evox_options['evox_header_type_8_top_flk'])) || empty($evox_options['evox_header_type_8_top_flk'])) ? '' : $evox_options['evox_header_type_8_top_flk'];
$evox_header_type_8_top_display = ((!isset($evox_options['evox_header_type_8_top_display'])) || empty($evox_options['evox_header_type_8_top_display'])) ? '0' : $evox_options['evox_header_type_8_top_display'];
$evox_header_type_8_filter = ((!isset($evox_options['evox_header_type_8_filter'])) || empty($evox_options['evox_header_type_8_filter'])) ? '0' : $evox_options['evox_header_type_8_filter'];
$evox_header_type_8_top_filter = ((!isset($evox_options['evox_header_type_8_top_filter'])) || empty($evox_options['evox_header_type_8_top_filter'])) ? 'On order over $50' : $evox_options['evox_header_type_8_top_filter'];
$evox_header_type_8_top_filter_tt = ((!isset($evox_options['evox_header_type_8_top_filter_tt'])) || empty($evox_options['evox_header_type_8_top_filter_tt'])) ? 'Free Shipping' : $evox_options['evox_header_type_8_top_filter_tt'];
/* Header Type 9*/
$evox_header_type_9_location_menu = ((!isset($evox_options['evox_header_type_9_menu_locations'])) || empty($evox_options['evox_header_type_9_menu_locations'])) ? 'primary' : $evox_options['evox_header_type_9_menu_locations'];
$evox_header_type_9_logo_type = ((!isset($evox_options['evox_header_type_9_logo_option'])) || empty($evox_options['evox_header_type_9_logo_option'])) ? 'logo_image' : $evox_options['evox_header_type_9_logo_option'];
$evox_header_type_9_logo_image = ((!isset($evox_options['evox_header_type_9_logo_image'])) || empty($evox_options['evox_header_type_9_logo_image'])) ? '' : $evox_options['evox_header_type_9_logo_image'];
$evox_header_type_9_logo_text = ((!isset($evox_options['evox_header_type_9_logo_text'])) || empty($evox_options['evox_header_type_9_logo_text'])) ? '' : $evox_options['evox_header_type_9_logo_text'];
$evox_header_type_9_sticky = ((!isset($evox_options['evox_header_type_9_sticky'])) || empty($evox_options['evox_header_type_9_sticky'])) ? '' : $evox_options['evox_header_type_9_sticky'];
/* Header Type 10*/
$evox_header_type_10_location_menu_left = ((!isset($evox_options['evox_header_type_10_menu_locations_left'])) || empty($evox_options['evox_header_type_10_menu_locations_left'])) ? 'custom-menu-4' : $evox_options['evox_header_type_10_menu_locations_left'];
$evox_header_type_10_location_menu_right = ((!isset($evox_options['evox_header_type_10_menu_locations_right'])) || empty($evox_options['evox_header_type_10_menu_locations_right'])) ? 'custom-menu-5' : $evox_options['evox_header_type_10_menu_locations_right'];
$evox_header_type_10_logo_type = ((!isset($evox_options['evox_header_type_10_logo_option'])) || empty($evox_options['evox_header_type_10_logo_option'])) ? 'logo_image' : $evox_options['evox_header_type_10_logo_option'];
$evox_header_type_10_logo_image = ((!isset($evox_options['evox_header_type_10_logo_image'])) || empty($evox_options['evox_header_type_10_logo_image'])) ? '' : $evox_options['evox_header_type_10_logo_image'];
$evox_header_type_10_logo_text = ((!isset($evox_options['evox_header_type_10_logo_text'])) || empty($evox_options['evox_header_type_10_logo_text'])) ? '' : $evox_options['evox_header_type_10_logo_text'];
$evox_header_type_10_sticky = ((!isset($evox_options['evox_header_type_10_sticky'])) || empty($evox_options['evox_header_type_10_sticky'])) ? '' : $evox_options['evox_header_type_10_sticky'];
$evox_header_type_10_search_r = ((!isset($evox_options['evox_header_type_10_search_r'])) || empty($evox_options['evox_header_type_10_search_r'])) ? '' : $evox_options['evox_header_type_10_search_r'];
$evox_header_type_10_cart_r = ((!isset($evox_options['evox_header_type_10_cart_r'])) || empty($evox_options['evox_header_type_10_cart_r'])) ? '' : $evox_options['evox_header_type_10_cart_r'];
/* Header Type 11*/
$evox_header_type_11_location_menu = ((!isset($evox_options['evox_header_type_11_menu_locations'])) || empty($evox_options['evox_header_type_11_menu_locations'])) ? 'primary' : $evox_options['evox_header_type_11_menu_locations'];
$evox_header_type_11_top_display = ((!isset($evox_options['evox_header_type_11_top_display'])) || empty($evox_options['evox_header_type_11_top_display'])) ? '0' : $evox_options['evox_header_type_11_top_display'];
$evox_header_type_11_top_email = ((!isset($evox_options['evox_header_type_11_top_email'])) || empty($evox_options['evox_header_type_11_top_email'])) ? 'info@evox.com' : $evox_options['evox_header_type_11_top_email'];
$evox_header_type_11_top_phone = ((!isset($evox_options['evox_header_type_11_top_phone'])) || empty($evox_options['evox_header_type_11_top_phone'])) ? '+1-888-66-5555' : $evox_options['evox_header_type_11_top_phone'];
$evox_header_type_11_top_address = ((!isset($evox_options['evox_header_type_11_top_address'])) || empty($evox_options['evox_header_type_11_top_address'])) ? '8 Boulevard du Palais, 75001 Paris, France' : $evox_options['evox_header_type_11_top_address'];
$evox_header_type_11_top_randl = ((!isset($evox_options['evox_header_type_11_top_randl'])) || empty($evox_options['evox_header_type_11_top_randl'])) ? '0' : $evox_options['evox_header_type_11_top_randl'];
$evox_header_type_11_top_menu = ((!isset($evox_options['evox_header_type_11_top_menu'])) || empty($evox_options['evox_header_type_11_top_menu'])) ? 'choose' : $evox_options['evox_header_type_11_top_menu'];
$evox_header_type_11_logo_type = ((!isset($evox_options['evox_header_type_11_logo_option'])) || empty($evox_options['evox_header_type_11_logo_option'])) ? 'logo_image' : $evox_options['evox_header_type_11_logo_option'];
$evox_header_type_11_logo_image = ((!isset($evox_options['evox_header_type_11_logo_image'])) || empty($evox_options['evox_header_type_11_logo_image'])) ? '' : $evox_options['evox_header_type_11_logo_image'];
$evox_header_type_11_logo_text = ((!isset($evox_options['evox_header_type_11_logo_text'])) || empty($evox_options['evox_header_type_11_logo_text'])) ? '' : $evox_options['evox_header_type_11_logo_text'];
$evox_header_type_11_cart = ((!isset($evox_options['evox_header_type_11_cart'])) || empty($evox_options['evox_header_type_11_cart'])) ? '' : $evox_options['evox_header_type_11_cart'];
$evox_header_type_11_search = ((!isset($evox_options['evox_header_type_11_search'])) || empty($evox_options['evox_header_type_11_search'])) ? '' : $evox_options['evox_header_type_11_search'];
$evox_header_type_11_sticky = ((!isset($evox_options['evox_header_type_11_sticky'])) || empty($evox_options['evox_header_type_11_sticky'])) ? '' : $evox_options['evox_header_type_11_sticky'];


$evox_header_select = '';
$evox_header_type = '';
$evox_location_menu = '';
$evox_header_top = '';
$evox_top_email = '';
$evox_top_phone = '';
$evox_top_address = '';
$evox_logotype = '';
$evox_img_url = '';
$evox_text = '';


if (is_page() && $evox_header_page_option == 'custom'):
    $evox_header_select = $evox_header_page_select;
else:
    $evox_header_select = $evox_header_theme_select;
endif;

if ($evox_header_select == 0) {

    $evox_header_type = 'header-type-1';
    $evox_location_menu = $evox_header_type_1_location_menu;
    $evox_header_top = $evox_header_type_1_top_display;
    $evox_top_email = $evox_header_type_1_top_email;
    $evox_top_phone = $evox_header_type_1_top_phone;
    $evox_top_address = $evox_header_type_1_top_address;
    $evox_top_randl = $evox_header_type_1_top_randl;
    $evox_top_menu = $evox_header_type_1_top_menu;

    $evox_logotype = $evox_header_type_1_logo_type;
    $evox_img_url = $evox_header_type_1_logo_image;
    $evox_text = $evox_header_type_1_logo_text;
    $evox_cart = $evox_header_type_1_cart;
    $evox_search = $evox_header_type_1_search;
    $evox_sticky = $evox_header_type_1_sticky;

} elseif ($evox_header_select == 1) {

    $evox_header_type = 'header-type-2';
    $evox_location_menu = $evox_header_type_2_location_menu;
    $evox_logotype = $evox_header_type_2_logo_type;
    $evox_img_url = $evox_header_type_2_logo_image;
    $evox_text = $evox_header_type_2_logo_text;
    $evox_cart = $evox_header_type_2_cart;
    $evox_search = $evox_header_type_2_search;
    $evox_sticky = $evox_header_type_2_sticky;

} elseif ($evox_header_select == 2) {

    $evox_header_type = 'header-type-3';
    $evox_location_menu = $evox_header_type_3_location_menu;
    $evox_header_top = $evox_header_type_3_top_display;
    $evox_top_email = $evox_header_type_3_top_email;
    $evox_top_phone = $evox_header_type_3_top_phone;
    $evox_top_address = $evox_header_type_3_top_address;
    $evox_top_randl = $evox_header_type_3_top_randl;
    $evox_top_menu = $evox_header_type_3_top_menu;
    $evox_logotype = $evox_header_type_3_logo_type;
    $evox_img_url = $evox_header_type_3_logo_image;
    $evox_text = $evox_header_type_3_logo_text;
    $evox_cart = $evox_header_type_3_cart;
    $evox_search = $evox_header_type_3_search;
    $evox_sticky = $evox_header_type_3_sticky;

} elseif ($evox_header_select == 3) {

    $evox_header_type = 'header-type-4';
    $evox_location_menu = $evox_header_type_4_location_menu;
    $evox_logotype = $evox_header_type_4_logo_type;
    $evox_img_url = $evox_header_type_4_logo_image;
    $evox_text = $evox_header_type_4_logo_text;
    $evox_cart = $evox_header_type_4_cart;
    $evox_search = $evox_header_type_4_search;
    $evox_sticky = $evox_header_type_4_sticky;

} elseif ($evox_header_select == 4) {

    $evox_header_type = 'header-type-5';
    $evox_location_menu = $evox_header_type_5_location_menu;
    $evox_logotype = $evox_header_type_5_logo_type;
    $evox_img_url = $evox_header_type_5_logo_image;
    $evox_text = $evox_header_type_5_logo_text;
    $evox_cart = $evox_header_type_5_cart;
    $evox_search = $evox_header_type_5_search;
    $evox_sticky = $evox_header_type_5_sticky;

} elseif ($evox_header_select == 5) {

    $evox_header_type = 'header-type-6';
    $evox_location_menu = $evox_header_type_6_location_menu;
    $evox_logotype = $evox_header_type_6_logo_type;
    $evox_img_url = $evox_header_type_6_logo_image;
    $evox_text = $evox_header_type_6_logo_text;
    $evox_cart = $evox_header_type_6_cart;
    $evox_search = $evox_header_type_6_search;
    $evox_sticky = $evox_header_type_6_sticky;

} elseif ($evox_header_select == 6) {

    $evox_header_type = 'header-type-7';
    $evox_location_menu = $evox_header_type_7_location_menu;
    $evox_logotype = $evox_header_type_7_logo_type;
    $evox_img_url = $evox_header_type_7_logo_image;
    $evox_text = $evox_header_type_7_logo_text;
    $evox_cart = $evox_header_type_7_cart;
    $evox_search = $evox_header_type_7_search;
    $evox_sticky = $evox_header_type_7_sticky;

} elseif ($evox_header_select == 7) {

    $evox_header_type = 'header-type-8';
    $evox_location_menu = $evox_header_type_8_location_menu;
    $evox_logotype = $evox_header_type_8_logo_type;
    $evox_img_url = $evox_header_type_8_logo_image;
    $evox_text = $evox_header_type_8_logo_text;
    $evox_cart = $evox_header_type_8_cart;
    $evox_search = $evox_header_type_8_search;
    $evox_sticky = $evox_header_type_8_sticky;
    $evox_header_top = $evox_header_type_8_top_display;
    $evox_top_phone = $evox_header_type_8_top_phone;
    $evox_top_phone_lk = $evox_header_type_8_top_phone_lk;
    $evox_filter = $evox_header_type_8_filter;
    $evox_top_filer = $evox_header_type_8_top_filter;
    $evox_top_ft = $evox_header_type_8_top_filter_tt;
    $evox_top_flk = $evox_header_type_8_top_flk;
    $evox_top_phone_nb = $evox_header_type_8_top_phone_nb;

} elseif ($evox_header_select == 8) {

    $evox_header_type = 'header-type-9';
    $evox_location_menu = $evox_header_type_9_location_menu;
    $evox_logotype = $evox_header_type_9_logo_type;
    $evox_img_url = $evox_header_type_9_logo_image;
    $evox_text = $evox_header_type_9_logo_text;
    $evox_sticky = $evox_header_type_9_sticky;

} elseif ($evox_header_select == 9) {

    $evox_header_type = 'header-type-10';
    $evox_location_menu_left = $evox_header_type_10_location_menu_left;
    $evox_location_menu_right = $evox_header_type_10_location_menu_right;
    $evox_logotype = $evox_header_type_10_logo_type;
    $evox_img_url = $evox_header_type_10_logo_image;
    $evox_text = $evox_header_type_10_logo_text;
    $evox_sticky = $evox_header_type_10_sticky;
    $evox_cartr = $evox_header_type_10_cart_r;
    $evox_searchr = $evox_header_type_10_search_r;

} elseif ($evox_header_select == 10) {

    $evox_header_type = 'header-type-11';
    $evox_top = 'type-11';
    $evox_location_menu = $evox_header_type_11_location_menu;
    $evox_header_top = $evox_header_type_11_top_display;
    $evox_top_email = $evox_header_type_11_top_email;
    $evox_top_phone = $evox_header_type_11_top_phone;
    $evox_top_randl = $evox_header_type_11_top_randl;
    $evox_logotype = $evox_header_type_11_logo_type;
    $evox_img_url = $evox_header_type_11_logo_image;
    $evox_text = $evox_header_type_11_logo_text;
    $evox_cart = $evox_header_type_11_cart;
    $evox_search = $evox_header_type_11_search;
    $evox_sticky = $evox_header_type_11_sticky;

}
$evox_top_phone = preg_replace('!\s+!', ' ', $evox_top_phone);
$evox_top_email = preg_replace('!\s+!', ' ', $evox_top_email);
$evox_top_address = preg_replace('!\s+!', ' ', $evox_top_address);
?>
<?php if ($evox_header_type != 'header-type-2' && $evox_header_type != 'header-type-4' && $evox_header_type != 'header-type-6' && $evox_header_type != 'header-type-7' && $evox_header_type != 'header-type-5' && $evox_header_top == '1' && $evox_header_type != 'header-type-8' && $evox_header_type != 'header-type-9' && $evox_header_type != 'header-type-10' && $evox_header_type != 'header-type-11') { ?>
    <div class="tz-top">
        <div class="container">
            <div class="row">
                <div class="top-left pull-left">
                    <?php if ($evox_top_phone != ' '): ?>
                        <a id="tel" href="<?php echo esc_html__('tel:', 'evox') . esc_url($evox_top_phone); ?>">
                            <i class="fa fa-headphones"></i>
                            <?php echo esc_html__('Call Center:', 'evox') . esc_html($evox_top_phone); ?>
                        </a>
                        <span>|</span>
                    <?php endif; ?>

                    <?php if ($evox_top_email != ' '): ?>
                        <a id="mail"
                           href="<?php echo esc_html__('mailto:', 'evox') . esc_html($evox_top_email); ?>">
                            <i class="fa fa-envelope"></i>
                            <?php echo esc_html($evox_top_email); ?>
                        </a>
                    <?php endif; ?>

                </div>
                <div class="top-right pull-right">
                    <?php if ($evox_top_address != ' '): ?>
                        <a id="address" href="javascript:void(0);">
                            <i class="fa fa-map-marker"></i>
                            <?php echo esc_html($evox_top_address); ?>
                        </a>
                        <span id="space-login">|</span>
                    <?php endif; ?>
                    <?php
                    /*  Get Menu Topbar */
                    if ($evox_top_menu != 'choose') {
                        wp_nav_menu(array(
                            'menu' => $evox_top_menu,
                            'menu_class' => 'topbar-menu',
                            'menu_id' => '',
                            'container' => false
                        ));
                    }

                    /*  Get Login   */
                    if (!is_user_logged_in()):
                        if ($evox_top_randl == '1'):
                            ?>
                            <a id="login" href="<?php echo wp_login_url(); ?>">
                                <i class="fa fa-sign-in"></i>
                                <?php echo esc_html__('Login', 'evox') ?>
                            </a>
                            <?php if (get_option('users_can_register') == 1) : ?>

                            <a href="<?php echo $evox_register_url; ?>">
                                <i class="fa fa-user"></i>
                                <?php echo esc_html__('Register', 'evox') ?>
                            </a>
                        <?php
                        endif;
                        endif;
                    else:
                        if ($evox_top_randl == true): ?>

                            <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>">
                                <i class="fa fa-sign-out"></i>
                                <?php echo esc_html__('Logout', 'evox'); ?>
                            </a>
                        <?php
                        endif;
                    endif;

                    ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($evox_header_type == 'header-type-5' && $evox_header_type_5_revolution_slider != '') { ?>
    <div class="tz-top-slider">
        <?php
        putRevSlider($evox_header_type_5_revolution_slider);
        ?>
        <?php if ($evox_header_type_5_search_options == '1'): ?>
            <div class="tz-top-search-wrap">
                <div class="container">
                    <div class="tz-top-search">
                        <span class="tz-search-tour-mobile"><?php echo esc_html__('Search Tour', 'evox') ?><i
                                    class="fa fa-angle-double-up"></i></span>
                        <form class="tzElement_search_form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                            <div class="tzElement_search_field">
                                <input type="hidden" name="post_type" value="tour">

                                <?php if ($evox_header_type_5_field_name_option == '1'): ?>
                                    <div class="form-group form-name">
                                        <label>
                                            <?php
                                            if ($evox_header_type_5_field_name_label != ''):
                                                echo esc_html($evox_header_type_5_field_name_label);
                                            else:
                                                esc_html_e('Keywords', 'evox');
                                            endif;
                                            ?>
                                        </label>
                                        <div class="field-box">
                                            <input type="text" class="form-control" name="s"
                                                   placeholder="<?php echo esc_attr__('Enter a keyword here', 'evox') ?>">
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if ($evox_header_type_5_field_destination_option == '1'): ?>

                                    <div class="form-group form-destination">
                                        <label>
                                            <?php
                                            if ($evox_header_type_5_field_destination_label != ''):
                                                echo esc_html($evox_header_type_5_field_destination_label);
                                            else:
                                                esc_html_e('Destination', 'evox');
                                            endif;
                                            ?>
                                        </label>

                                        <div class="field-box">
                                            <select name="tour_destination[]">
                                                <option value=""><?php echo esc_html__('Any', 'evox'); ?></option>
                                                <?php

                                                $evox_args_destinations = array(
                                                    'post_type' => 'destination',
                                                    'post_status' => 'publish',
                                                    'orderby' => 'name',
                                                    'order' => 'ASC',
                                                    'posts_per_page' => -1
                                                );

                                                // The Query
                                                $evox_destinations_query = new WP_Query($evox_args_destinations);
                                                // The Loop
                                                if ($evox_destinations_query->have_posts()) {
                                                    while ($evox_destinations_query->have_posts()) {
                                                        $evox_destinations_query->the_post();
                                                        echo '<option  value="' . get_the_ID() . '">' . get_the_title() . '</option>';
                                                    }
                                                    /* Restore original Post Data */
                                                    wp_reset_postdata();
                                                } else {
                                                    // no posts found
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                <?php endif; ?>

                                <?php if ($evox_header_type_5_field_date_option == '1'): ?>
                                    <div class="form-group form-date">
                                        <label>
                                            <?php
                                            if ($evox_header_type_5_field_date_label != ''):
                                                echo esc_html($evox_header_type_5_field_date_label);
                                            else:
                                                esc_html_e('Departure Date', 'evox');
                                            endif;
                                            ?>
                                        </label>

                                        <div class="field-box">
                                            <input class="date-pick form-control" placeholder="Any"
                                                   data-date-format="mm/dd/yyyy" type="text" name="date">
                                        </div>

                                    </div>
                                <?php endif; ?>

                                <?php if ($evox_header_type_5_field_duration_option == '1'): ?>
                                    <div class="form-group form-duration">
                                        <label>
                                            <?php
                                            if ($evox_header_type_5_field_duration_label != ''):
                                                echo esc_html($evox_header_type_5_field_duration_label);
                                            else:
                                                esc_html_e('Duration', 'evox');
                                            endif;
                                            ?>
                                        </label>
                                        <div class="field-box">
                                            <select name="duration">
                                                <option value=""><?php esc_html_e('Any', 'evox'); ?></option>
                                                <option value="1"><?php esc_html_e('1 Day', 'evox'); ?></option>
                                                <option value="2"><?php esc_html_e('2 Days', 'evox'); ?></option>
                                                <option value="3"><?php esc_html_e('3 Days', 'evox'); ?></option>
                                                <option value="4"><?php esc_html_e('4 Days', 'evox'); ?></option>
                                                <option value="5"><?php esc_html_e('5 Days', 'evox'); ?></option>
                                                <option value="6"><?php esc_html_e('6 Days', 'evox'); ?></option>
                                                <option value="7"><?php esc_html_e('7 Days', 'evox'); ?></option>
                                                <option value="8"><?php esc_html_e('8 Days', 'evox'); ?></option>
                                                <option value="9"><?php esc_html_e('9 Days', 'evox'); ?></option>
                                                <option value="10"><?php esc_html_e('10 Days', 'evox'); ?></option>
                                                <option value="11"><?php esc_html_e('11 Days', 'evox'); ?></option>
                                                <option value="12"><?php esc_html_e('12 Days', 'evox'); ?></option>
                                                <option value="13"><?php esc_html_e('13 Days', 'evox'); ?></option>
                                                <option value="14"><?php esc_html_e('14 Days', 'evox'); ?></option>
                                                <option value="15"><?php esc_html_e('15 Days', 'evox'); ?></option>
                                            </select>
                                        </div>

                                    </div>

                                <?php endif; ?>

                                <?php if ($evox_header_type_5_field_category_option == '1'): ?>

                                    <div class="form-group form-category">
                                        <label>
                                            <?php
                                            if ($evox_header_type_5_field_category_label != ''):
                                                echo esc_html($evox_header_type_5_field_category_label);
                                            else:
                                                esc_html_e('Category', 'evox');
                                            endif;
                                            ?>
                                        </label>

                                        <div class="field-box">
                                            <select name="tour_categories[]">
                                                <option value=""><?php esc_html_e('Any', 'evox'); ?></option>
                                                <?php
                                                $evox_all_tour_categoies = get_terms('tour-category', array('hide_empty' => 0));
                                                if (!empty($evox_all_tour_categoies)) :
                                                    foreach ($evox_all_tour_categoies as $evox_tour_category) {
                                                        echo '<option  value="' . esc_attr($evox_tour_category->term_id) . '">' . esc_html($evox_tour_category->name) . '</option>';
                                                    }
                                                endif; ?>
                                                ?>
                                            </select>
                                        </div>

                                    </div>

                                <?php endif; ?>
                                <?php if ($evox_header_type_5_field_language_option == '1'): ?>
                                    <div class="form-group form-language">
                                        <label>
                                            <?php
                                            if ($evox_header_type_5_field_language_label != ''):
                                                echo esc_html($evox_header_type_5_field_language_label);
                                            else:
                                                esc_html_e('Language', 'evox');
                                            endif;
                                            ?>
                                        </label>
                                        <div class="field-box">
                                            <select name="tour_languages[]">
                                                <option value=""><?php esc_html_e('Any', 'evox'); ?></option>
                                                <?php
                                                $evox_all_tour_languages = get_terms('tour-language', array('hide_empty' => 0));
                                                if (!empty($evox_all_tour_languages)) :
                                                    foreach ($evox_all_tour_languages as $evox_tour_language) {
                                                        echo '<option  value="' . esc_attr($evox_tour_language->term_id) . '">' . esc_html($evox_tour_language->name) . '</option>';
                                                    }
                                                endif;
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>

                            <div class="tzElement_search_submit">
                                <button type="submit" class="btn btn-default tz-search-btn">
                                    <?php
                                    if ($evox_header_type_5_search_button != ''):
                                        echo esc_html($evox_header_type_5_search_button);
                                    else:
                                        esc_html_e('Search', 'evox');
                                    endif;
                                    ?>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php } ?>
<?php if ($evox_header_type != 'header-type-8' && $evox_header_type != 'header-type-9' && $evox_header_type != 'header-type-10' && $evox_header_type != 'header-type-11'): ?>
    <header class="tz-header <?php echo esc_attr($evox_header_type); ?> <?php if ($evox_sticky == '1') {
        echo 'fixed';
    } ?>">
        <?php if ($evox_header_type != 'header-type-2' && $evox_header_type != 'header-type-6' && $evox_header_type != 'header-type-7'): ?>
        <div class="container">
            <?php endif; ?>
            <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>"
               title="<?php bloginfo('name'); ?>">
                <?php

                if ($evox_logotype == 'logo_text') {
                    echo('<span class="tz-logo-text">' . esc_html($evox_text) . '</span>');
                } else {
                    if (isset($evox_img_url) && !empty($evox_img_url)) :
                        echo '<img src="' . esc_url($evox_img_url["url"]) . '" alt="' . get_bloginfo('title') . '" />';
                    else :
                        echo '<img src="' . esc_url(get_template_directory_uri()) . '/images/logo.png" alt="' . get_bloginfo('title') . '" />';
                    endif;
                }
                ?>
            </a>
            <nav class="nav-collapse pull-right">
                <?php
                if (has_nav_menu($evox_location_menu)) :
                    wp_nav_menu(array(
                        'theme_location' => $evox_location_menu,
                        'menu_class' => 'nav navbar-nav collapse navbar-collapse tz-nav',
                        'menu_id' => 'tz-navbar-collapse',
                        'container' => false,
                    ));
                endif;
                ?>
            </nav>
            <div class="tz_box__button pull-right">
                <?php if ($evox_search == '1'): ?>
                    <div class="tz-header-search Show">
                        <span class='icon_search tz_icon_search'></span>
                        <span class='icon_close tz_icon_close'></span>
                        <div class="tz-header-search-form">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($evox_cart == '1'): ?>
                    <?php if (class_exists('WooCommerce')) { ?>
                        <div class="tz-header-cart Show">
                            <?php do_action('evox_get_cart_item'); ?>
                            <div class="shop__widget-cart">
                                <?php the_widget('evox_WC_Widget_Cart', ''); ?>
                            </div>
                        </div>
                    <?php } ?>
                <?php endif; ?>
                <button class="navbar-toggle collapsed tz_icon_menu" type="button" data-target="#tz-navbar-collapse"
                        data-toggle="collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <?php if ($evox_header_type != 'header-type-2' && $evox_header_type != 'header-type-6' && $evox_header_type != 'header-type-7'){ ?>
        </div>
    <?php } ?>
    </header>
<?php endif; ?>
<!--Header type 8-->
<?php if ($evox_header_type == 'header-type-8') : ?>
    <header class="tz-header tz-header-shop">
        <div class="container">
            <div class="menu-top">
                <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>"
                   title="<?php bloginfo('name'); ?>">
                    <?php

                    if ($evox_logotype == 'logo_text') {
                        echo('<span class="tz-logo-text">' . esc_html($evox_text) . '</span>');
                    } else {
                        if (isset($evox_img_url) && !empty($evox_img_url)) :
                            echo '<img src="' . esc_url($evox_img_url["url"]) . '" alt="' . get_bloginfo('title') . '" />';
                        else :
                            echo '<img src="' . esc_url(get_template_directory_uri()) . '/images/logo.png" alt="' . get_bloginfo('title') . '" />';
                        endif;
                    }
                    ?>
                </a>
                <div class="box-infor">
                    <?php if ($evox_header_top != '0'): ?>
                        <div class="Tz-item">
                            <i class="fas fa-phone-volume"></i>
                            <h4><?php echo esc_attr($evox_top_phone); ?>
                                <br><?php if ($evox_top_phone_lk != ''): ?><a
                                        href="tel:<?php echo esc_attr($evox_top_phone_lk); ?>"><?php endif; ?>
                                    <span><?php echo esc_attr($evox_top_phone_nb); ?></span>
                                    <?php if ($evox_top_phone_lk != ''): ?></a><?php endif; ?>
                            </h4>
                        </div>
                    <?php endif; ?>

                    <?php if ($evox_filter != '0'): ?>
                        <div class="Tz-item">
                            <i class="fas fa-shipping-fast"></i>
                            <h4><?php echo esc_attr($evox_top_filer); ?><br>
                                <?php if ($evox_top_flk != ''): ?><a
                                        href="<?php echo esc_attr($evox_top_flk); ?>"><?php endif; ?>
                                    <span><?php echo esc_attr($evox_top_ft); ?></span>
                                    <?php if ($evox_top_flk != ''): ?></a><?php endif; ?>
                            </h4></div>
                    <?php endif; ?>

                    <?php if ($evox_cart != 0 && class_exists('WooCommerce')) { ?>
                        <div class="Tz-item woo_cart">
                            <div class="tz-shop-cart">
                                <i class="fas fa-shopping-bag"></i>
                                <div class="woo_content">Shopping cart<br>
                                    <?php do_action('evox_get_cart_shop'); ?>
                                    <div class="shop__widget-cart">
                                        <?php the_widget('evox_WC_Widget_Cart', ''); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="Tz_shop_menu  <?php if ($evox_sticky == '1') {
            echo 'fixed';
        } ?> menu-bottom">
            <div class="container">
                <button class="navbar-toggle collapsed tz_icon_menu" type="button" data-target="#tz-navbar-collapse"
                        data-toggle="collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <nav class="nav-collapse pull-left menu-shop <?php if ($evox_search == 0): echo "tz_full"; endif; ?>">
                    <?php

                    if (has_nav_menu($evox_location_menu)) :
                        wp_nav_menu(array(
                            'theme_location' => $evox_location_menu,
                            'menu_class' => 'nav navbar-nav collapse navbar-collapse tz-nav',
                            'link_after' => '<i class="fas fa-caret-down"></i>',
                            'menu_id' => 'tz-navbar-collapse',
                            'container' => false,
                        ));
                    endif;

                    ?>
                </nav>
                <?php if ($evox_search != 0): ?>
                    <div class="tz-search pull-right">
                        <div class="tz-header-search-form">
                            <form role="search" method="get" class="searchform"
                                  action="<?php echo esc_url(home_url('/')); ?>">
                                <input type="search" class="field Tzsearchform inputbox search-query"
                                       placeholder="<?php echo esc_attr_x('Enter keyword here...', 'placeholder', ''); ?>"
                                       value="<?php echo get_search_query(); ?>" name="s"/>
                                <input type="submit" class="submit searchsubmit" name="submit" value="X">
                                <span aria-hidden="true" class="fa fa-search icon_search"></span>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </header>
<?php endif; ?>
<?php if ($evox_header_type == 'header-type-9') : ?>
    <header class="tz-home-slide tz-home-croll  <?php if ($evox_sticky == '') {
        echo 'tz_sticky';
    } ?>">
        <div class="tz-home-left tz_menu">
            <div class="bounceInLeft animated tz_btn_toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="tz-home-left-box">
                <div class="tz-home-logo">
                    <a class="tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>"
                       title="<?php bloginfo('name'); ?>">
                        <?php
                        if ($evox_logotype == 'logo_text') {
                            echo('<span class="tz-logo-text">' . esc_html($evox_text) . '</span>');
                        } else {
                            if (isset($evox_img_url) && !empty($evox_img_url)) :
                                echo '<img src="' . esc_url($evox_img_url["url"]) . '" alt="' . get_bloginfo('title') . '" />';
                            else :
                                echo '<img src="' . esc_url(get_template_directory_uri()) . '/images/logo.png" alt="' . get_bloginfo('title') . '" />';
                            endif;
                        }
                        ?>
                    </a>
                </div>

                <button class="navbar-toggle collapsed tz_icon_menu" type="button" data-target="#tz-main-menu"
                        data-toggle="collapse">
                    <i class="fa fa-bars"></i>
                </button>

                <nav class="nav-collapse vertical_menu">
                    <?php

                    if (has_nav_menu($evox_location_menu)) :
                        wp_nav_menu(array(
                            'theme_location' => $evox_location_menu,
                            'menu_class' => 'nav navbar-nav collapse navbar-collapse main-menu',
                            'menu_id' => 'tz-main-menu',
                            'container' => false,
                        ));
                    endif;

                    ?>
                </nav>

                <div class="sidebar-home-slide">
                    <?php
                    if (is_active_sidebar("tz-sidebar-home-slide")):
                        dynamic_sidebar("tz-sidebar-home-slide");
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </header>
<?php endif; ?>
<!--Header type 10-->
<?php if ($evox_header_type == 'header-type-10') : ?>
    <header class="tz-header tz-header-twomenu <?php if ($evox_sticky != '') {
        echo 'fixed';
    } ?>">
        <button class="navbar-toggle collapsed tz_icon_menu tz_twomn" type="button"
                data-target="#tz-navbar-collapse"
                data-toggle="collapse">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="tz_logomb">
            <a class="tz_logomb" href="<?php echo esc_url(get_home_url('/')); ?>"
               title="<?php bloginfo('name'); ?>">
                <?php
                if ($evox_logotype == 'logo_text') {
                    echo('<span class="tz-logo-text">' . esc_html($evox_text) . '</span>');
                } else {
                    if (isset($evox_img_url) && !empty($evox_img_url)) :
                        echo '<img src="' . esc_url($evox_img_url["url"]) . '" alt="' . get_bloginfo('title') . '" />';
                    else :
                        echo '<img src="' . esc_url(get_template_directory_uri()) . '/images/logo.png" alt="' . get_bloginfo('title') . '" />';
                    endif;
                }
                ?>
            </a>
        </div>
        <div class="box-menu">
            <div class="col-lg-5 tz_menu_left">
                <nav class="nav-collapse tz_onleft">
                    <?php

                    if (has_nav_menu($evox_location_menu_left)) :
                        wp_nav_menu(array(
                            'theme_location' => $evox_location_menu_left,
                            'menu_class' => 'nav navbar-nav navbar-collapse tz-nav tz_show',
                            'menu_id' => '',
                            'container' => false,
                        ));
                    endif;

                    ?>
                </nav>
            </div>
            <div class="col-lg-2 tz_logo">
                <a class="tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>"
                   title="<?php bloginfo('name'); ?>">
                    <?php
                    if ($evox_logotype == 'logo_text') {
                        echo('<span class="tz-logo-text">' . esc_html($evox_text) . '</span>');
                    } else {
                        if (isset($evox_img_url) && !empty($evox_img_url)) :
                            echo '<img src="' . esc_url($evox_img_url["url"]) . '" alt="' . get_bloginfo('title') . '" />';
                        else :
                            echo '<img src="' . esc_url(get_template_directory_uri()) . '/images/logo.png" alt="' . get_bloginfo('title') . '" />';
                        endif;
                    }
                    ?>
                </a>
            </div>
            <div class="col-lg-5 tz_menu_right">
                <nav class="nav-collapse tz_onright">
                    <?php

                    if (has_nav_menu($evox_location_menu_right)) :
                        wp_nav_menu(array(
                            'theme_location' => $evox_location_menu_right,
                            'menu_class' => 'nav navbar-nav navbar-collapse tz-nav tz_show',
                            'menu_id' => '',
                            'container' => false,
                        ));
                    endif;

                    ?>
                </nav>
                <?php if (($evox_cartr != 0 && class_exists('WooCommerce') || ($evox_searchr != 0))) { ?>
                <div class="tz_box_sc">
                    <?php if ($evox_cartr != 0 && class_exists('WooCommerce')) { ?>
                        <div class="tz-header-cart Show pull-right">
                            <?php do_action('evox_get_cart_item'); ?>
                            <div class="shop__widget-cart">
                                <?php the_widget('evox_WC_Widget_Cart', ''); ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($evox_searchr != 0) { ?>
                        <div class="tz-header-search Show pull-right">
                            <span class='icon_search tz_icon_search'></span>
                            <span class='icon_close tz_icon_close'></span>
                            <div class="tz-header-search-form">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
    </header>
<?php endif; ?>
<!--Header type 11-->
<?php if ($evox_header_type == 'header-type-11'): ?>
    <header class="tz-header <?php echo esc_attr($evox_header_type); ?> <?php if ($evox_sticky == '1') {
        echo 'fixed';
    } ?>">
        <div class="tz-top <?php echo $evox_top; ?>">
            <div class="container">
                <div class="row">
                    <div class="top-left pull-left">
                        <?php if ($evox_top_phone != ' ' && $evox_top_phone != ''): ?>
                            <a id="tel"
                               href="<?php echo esc_html__('tel:', 'evox') . esc_url($evox_top_phone); ?>">
                                <i class="fa fa-headphones"></i>
                                <?php echo esc_html__('Call Center:', 'evox') . esc_html($evox_top_phone); ?>
                            </a>
                            <span>|</span>
                        <?php endif; ?>

                        <?php if ($evox_top_email != ' ' && $evox_top_email != ''): ?>
                            <a id="mail"
                               href="<?php echo esc_html__('mailto:', 'evox') . esc_html($evox_top_email); ?>">
                                <i class="fa fa-envelope"></i>
                                <?php echo esc_html($evox_top_email); ?>
                            </a>
                        <?php endif; ?>

                    </div>
                    <div class="top-right pull-right">
                        <?php if ($evox_top_address != '' && $evox_top_address != ' '): ?>
                            <a id="address" href="javascript:void(0);">
                                <i class="fa fa-map-marker"></i>
                                <?php echo esc_html($evox_top_address); ?>
                            </a>
                        <?php endif; ?>
                        <?php
                        /*  Get Login   */
                        if (!is_user_logged_in()):
                            if ($evox_top_randl == '1'):
                                ?>
                                <a id="login" href="<?php echo wp_login_url(); ?>">
                                    <i class="fa fa-sign-in"></i>
                                    <?php echo esc_html__('Login', 'evox') ?>
                                </a>
                                <?php if (get_option('users_can_register') == 1) : ?>

                                <a href="<?php echo $evox_register_url; ?>">
                                    <i class="fa fa-user"></i>
                                    <?php echo esc_html__('Register', 'evox') ?>
                                </a>
                            <?php
                            endif;
                            endif;
                        else:
                            if ($evox_top_randl == true): ?>

                                <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>">
                                    <i class="fa fa-sign-out"></i>
                                    <?php echo esc_html__('Logout', 'evox'); ?>
                                </a>
                            <?php
                            endif;
                        endif;

                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="tz-menu-header">
            <div class="container">
                <button class="navbar-toggle collapsed tz_icon_menu" type="button" data-target="#tz-navbar-collapse"
                        data-toggle="collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="pull-left tz_logo" href="<?php echo esc_url(get_home_url('/')); ?>"
                   title="<?php bloginfo('name'); ?>">
                    <?php

                    if ($evox_logotype == 'logo_text') {
                        echo('<span class="tz-logo-text">' . esc_html($evox_text) . '</span>');
                    } else {
                        if (isset($evox_img_url) && !empty($evox_img_url)) :
                            echo '<img src="' . esc_url($evox_img_url["url"]) . '" alt="' . get_bloginfo('title') . '" />';
                        else :
                            echo '<img src="' . esc_url(get_template_directory_uri()) . '/images/logo.png" alt="' . get_bloginfo('title') . '" />';
                        endif;
                    }
                    ?>
                </a>

                <nav class="nav-collapse pull-right">
                    <?php
                    if (has_nav_menu($evox_location_menu)) :
                        wp_nav_menu(array(
                            'theme_location' => $evox_location_menu,
                            'menu_class' => 'nav navbar-nav collapse navbar-collapse tz-nav',
                            'menu_id' => 'tz-navbar-collapse',
                            'container' => false,
                        ));
                    endif;
                    ?>
                </nav>
                <div class="tz_box__button pull-right">
                    <?php if ($evox_search != 0) { ?>
                        <div class="tz-header-search Show">
                            <span class='icon_search tz_icon_search'></span>
                            <span class='icon_close tz_icon_close'></span>
                            <div class="tz-header-search-form">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($evox_cart == '1'): ?>
                        <?php if (class_exists('WooCommerce')) { ?>
                            <div class="tz-header-cart Show">
                                <?php do_action('evox_get_cart_item'); ?>
                                <div class="shop__widget-cart">
                                    <?php the_widget('evox_WC_Widget_Cart', ''); ?>
                                </div>
                            </div>
                        <?php } ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
<?php endif; ?>