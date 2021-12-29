<?php

add_filter( 'templaza-framework-importer', 'evox_import_demos' );

function evox_import_demos($value)
{
    $value = array(
        'envatoid'      => 35057158,
        'productname'   => 'Golden Hearts WordPress Theme',
        'demo-imports'  => array(
            'wp_evox_pack' =>
                array(// Pack Info
                'slug' => 'wp_evox', // Produce code created on server
                'title' => esc_html__('Golden Hearts','evox'),
                'desc' => esc_html__('Golden Hearts Charity WordPress Theme.','evox'),
                'front_page' => true,
                'front_page_title'  => 'Home Version 1',
                'menu_locations'    => array(
                    array(
                        'title'     => 'Main Menu',
                        'location'  => 'primary'
                    ),
                ),
// Pack Data
                'thumb' => ''.get_stylesheet_directory_uri() .'/assets/images/home.jpg',
                'category' => 'wordpress',
                'demo_url' => 'https://golden-hearts.templaza.net',
                'doc_url' => 'https://document.templaza.com/golden-hearts/',
                'plugins' => array
                (

                    // This is an example of how to include a plugin pre-packaged with a theme
                    array(
                        'name' => esc_html__('TemPlaza Framework', 'evox'), /* The plugin name */
                        'slug' => 'templaza-framework', /* The plugin slug (typically the folder name) */
                        'source' => get_template_directory_uri() . '/plugins/templaza-framework.zip', /* The plugin source */
                        'required' => true, /* If false, the plugin is only 'recommended' instead of required */
                        'version' => '1.0.2', /* E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented */
                        'force_activation' => false, /* If true, plugin is activated upon theme activation and cannot be deactivated until theme switch */
                        'force_deactivation' => false, /* If true, plugin is deactivated upon theme switch, useful for theme-specific plugins */
                        'external_url' => '', /* If set, overrides default API URL and points to an external URL */
                    ),
                    array(
                        'name' => esc_html__('Redux Framework', 'evox'), /* The plugin name */
                        'slug' => 'redux-framework', /* The plugin slug (typically the folder name) */
                        'required' => true,
                    ),
                    array(
                        'name' => esc_html__('TemPlaza Elements', 'evox'), /* The plugin name */
                        'slug' => 'templaza-elements', /* The plugin slug (typically the folder name) */
                        'source' => get_template_directory_uri() . '/plugins/templaza-elements.zip', /* The plugin source */
                        'required' => true, /* If false, the plugin is only 'recommended' instead of required */
                        'version' => '1.0.0', /* E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented */
                        'force_activation' => false, /* If true, plugin is activated upon theme activation and cannot be deactivated until theme switch */
                        'force_deactivation' => false, /* If true, plugin is deactivated upon theme switch, useful for theme-specific plugins */
                        'external_url' => '', /* If set, overrides default API URL and points to an external URL */
                    ),
                    array(
                        'name'     				=> esc_html__('Slider Revolution','aventura'), // The plugin name
                        'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
                        'source'   				=> get_template_directory() . '/plugins/revslider.zip', // The plugin source
                        'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
                        'version' 				=> '6.5.12', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                        'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                        'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                        'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
                    ),
                    array(
                        'name' => 'Elementor Website Builder',
                        'slug' => 'elementor',
                        'required' => true,
                    ),
                    array(
                        'name' => 'WP Event Manager',
                        'slug' => 'wp-event-manager',
                        'required' => true,
                    ),
                    array(
                        'name' => 'Newsletter',
                        'slug' => 'newsletter',
                        'required' => true,
                    ),
                    array(
                        'name' => 'Contact Form by WPForms',
                        'slug' => 'wpforms-lite',
                        'required' => true,
                    ),
                ),

                'demo-datas' => array(
                    array(
                        'title' => esc_html__('Default Content', 'evox'),
                        'desc' => esc_html__('This will import posts, pages and menu', 'evox'),
                        'slug' => 'wp_evox_default',
                        'checked' => true,
                    ),
                    array(
                        'title' => esc_html__('Elementor Settings', 'evox'),
                        'desc' => esc_html__('This will import  Elementor settings', 'evox'),
                        'slug' => 'wp_evox_elementor',
                        'demo_type' => 'elementor',
                        'checked' => true,
                    ),
                    array(
                        'title' => esc_html__('Media', 'evox'),
                        'desc' => esc_html__('This will import Media data'),
                        'slug' => 'wp_evox_media',
                        'checked' => true,
                    ),
                    array(
                        'title' => esc_html__('Widgets', 'evox'),
                        'desc' => esc_html__('This will import default widgets presented in demo site of this content package.', 'evox'),
                        'slug' => 'wp_evox_widget',
                        'demo_type' => 'widget-importer',
                        'checked' => true,
                    ),

                    array(
                        'title' => esc_html__('Slider', 'evox'),
                        'desc' => esc_html__('This will import slider.', 'evox'),
                        'slug' => 'wp_evox_slider',
                        'demo_type' => 'revslider',
                        'checked' => true,
                    ),

                )
            ),

        )
    );
    return $value;
}