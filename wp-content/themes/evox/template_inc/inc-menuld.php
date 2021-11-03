<?php
global $evox_options;

$evox_register_page = ((!isset($evox_options['evox_register_page'])) || empty($evox_options['evox_register_page'])) ? '' : $evox_options['evox_register_page'];
if ($evox_register_page != '') {
    $evox_register_url = add_query_arg('action', 'register', evox_get_permalink_clang($evox_register_page));
} else {
    $evox_register_url = wp_registration_url();
}

/* Header Landing Page */
$evox_header_land_menu_locations = ((!isset($evox_options['evox_header_land_menu_locations'])) || empty($evox_options['evox_header_land_menu_locations'])) ? 'custom-menu-3' : $evox_options['evox_header_land_menu_locations'];
$evox_header_land_logo_option = ((!isset($evox_options['evox_header_land_logo_option'])) || empty($evox_options['evox_header_land_logo_option'])) ? 'logo_image' : $evox_options['evox_header_land_logo_option'];
$evox_header_land_logo_image = ((!isset($evox_options['evox_header_land_logo_image'])) || empty($evox_options['evox_header_land_logo_image'])) ? '' : $evox_options['evox_header_land_logo_image'];
$evox_header_land_logo_text = ((!isset($evox_options['evox_header_land_logo_text'])) || empty($evox_options['evox_header_land_logo_text'])) ? '' : $evox_options['evox_header_land_logo_text'];
$evox_header_land_btn_text = ((!isset($evox_options['evox_header_land_btn_text'])) || empty($evox_options['evox_header_land_btn_text'])) ? '' : $evox_options['evox_header_land_btn_text'];
$evox_header_land_sticky = ((!isset($evox_options['evox_header_land_sticky'])) || empty($evox_options['evox_header_land_sticky'])) ? '' : $evox_options['evox_header_land_sticky'];
$evox_header_btn_link = ((!isset($evox_options['evox_header_btn_link'])) || empty($evox_options['evox_header_btn_link'])) ? '' : $evox_options['evox_header_btn_link'];


$evox_location_menu = $evox_header_land_menu_locations;
$evox_logotype = $evox_header_land_logo_option;
$evox_img_url = $evox_header_land_logo_image;
$evox_text = $evox_header_land_logo_text;
$evox_btn = $evox_header_land_btn_text;
$evox_btn_lk = $evox_header_btn_link;
$evox_sticky = $evox_header_land_sticky;

if($evox_sticky == 1){
    $mnld_class = ' fixed';
}
?>
<header class="STD_Menu<?php echo $mnld_class; ?>">
    <div class="STD_width">
        <button class="navbar-toggle collapsed STD_navmenu" type="button" data-target="#tz-navbar-collapse"
                data-toggle="collapse">
            <i class="fa fa-bars"></i>
        </button>
        <a class="STD_logo pull_left" href="<?php echo esc_url(get_home_url('/')); ?>"
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
        <nav class="nav-collapse STD_landingmenu">
            <?php
            if (has_nav_menu($evox_location_menu)) :
                wp_nav_menu(array(
                    'theme_location' => $evox_location_menu,
                    'menu_class' => 'nav navbar-nav collapse navbar-collapse landingmenu',
                    'menu_id' => 'tz-navbar-collapse',
                    'container' => false,
                ));
            endif;
            ?>
        </nav>
        <div class="STD_Btn  pull-right">
            <a class="btn_style" href="<?php echo esc_attr($evox_btn_lk); ?>" target="_blank"><?php echo esc_attr($evox_btn); ?></a>
        </div>
    </div>
</header>