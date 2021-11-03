<?php
/**
 * ReduxFramework Config File
 * TemPlaza Plazart Default Theme
 */
if (!class_exists('Redux')) {
    return;
}

// This is your option name where all the Redux data is stored.
$evox_opt_name = "evox_options";

/*  Get All Menu    */
$evox_menus = get_terms('nav_menu', array('hide_empty' => true));
global $evox_menuArray;
$evox_menuArray = array(
    'choose' => esc_html__('Choose Menu', 'evox'),
);
if (isset($evox_menus) && !empty($evox_menus)) {
    foreach ($evox_menus as $evox_menu) {
        $evox_menuArray[$evox_menu->slug] = $evox_menu->name;
    }
}

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * */

$evox_theme = wp_get_theme(); // For use with some settings. Not necessary.

$evox_args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name' => $evox_opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name' => $evox_theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version' => $evox_theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type' => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu' => false,
    // Show the sections below the admin menu item or not
    'menu_title' => esc_html__('Theme Options', 'evox'),
    'page_title' => esc_html__('Theme Options', 'evox'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key' => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography' => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar' => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon' => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority' => 50,
    // Choose an priority for the admin bar menu
    'global_variable' => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode' => false,
    // Show the time the page took to load, etc
    'update_notice' => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer' => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority' => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent' => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions' => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon' => '',
    // Specify a custom URL to an icon
    'last_tab' => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon' => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug' => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults' => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show' => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark' => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time' => 60 * MINUTE_IN_SECONDS,
    'output' => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag' => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database' => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn' => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints' => array(
        'icon' => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color' => 'lightgray',
        'icon_size' => 'normal',
        'tip_style' => array(
            'color' => 'red',
            'shadow' => true,
            'rounded' => false,
            'style' => '',
        ),
        'tip_position' => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect' => array(
            'show' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'mouseover',
            ),
            'hide' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'click mouseleave',
            ),
        ),
    )
);
Redux::setArgs($evox_opt_name, $evox_args);
/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START HELP TABS
 */

$evox_tabs = array(
    array(
        'id' => 'redux-help-tab-1',
        'title' => esc_html__('Theme Information 1', 'evox'),
        'content' => esc_html__('<p>This is the tab content, HTML is allowed.</p>', 'evox')
    ),
    array(
        'id' => 'redux-help-tab-2',
        'title' => esc_html__('Theme Information 2', 'evox'),
        'content' => esc_html__('<p>This is the tab content, HTML is allowed.</p>', 'evox')
    )
);
Redux::setHelpTab($evox_opt_name, $evox_tabs);

// Set the help sidebar
$evox_content = esc_html__('<p>This is the sidebar content, HTML is allowed.</p>', 'evox');
Redux::setHelpSidebar($evox_opt_name, $evox_content);


/*
 * <--- END HELP TABS
 */

/* EXT LOADER */
if (!function_exists('redux_register_custom_extension_loader')) :
    function redux_register_custom_extension_loader($ReduxFramework)
    {
        $path = dirname(__FILE__) . '/';
//        var_dump($path);
        $folders = scandir($path, 1);
        foreach ($folders as $folder) {
            if ($folder === '.' or $folder === '..' or !is_dir($path . $folder)) {
                continue;
            }
            $extension_class = 'ReduxFramework_Extension_' . $folder;
            if (!class_exists($extension_class)) {
                // In case you wanted override your override, hah.
                $class_file = $path . $folder . '/extension_' . $folder . '.php';
                $class_file = apply_filters('redux/extension/' . $ReduxFramework->args['opt_name'] . '/' . $folder, $class_file);
                if ($class_file) {
                    require_once($class_file);
                    $extension = new $extension_class($ReduxFramework);
                }
            }
        }
    }

    // Modify {$redux_opt_name} to match your opt_name
    add_action("redux/extensions/" . $evox_opt_name . "/before", 'redux_register_custom_extension_loader', 0);
endif;

/*
 * ---> START SECTIONS
 */

/*
 *  As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for
 */

// -> START option background

Redux::setSection($evox_opt_name, array(
    'id' => 'evox_TemPlaza',
    'title' => esc_html__('Evox 2.0', 'evox'),
    'desc' => esc_html__('Evox – Travelling WordPress Theme, coming with elegant and modest appearance, will be a meaningful WordPress theme for Travelling, Journey Blog. Its stunning beauty, fashionable clean look and proper execution, accompanying with making use of Visual Composer, Evox and Revolution Slider plugin, will help you to own an awesome travelling site for your journey. Evox will adapt automatically to the screen size of the device and display all the content in an intuitive and simple way.', 'evox'),
    'customizer_width' => '400px',
    'icon' => '',
));

// -> END option background

// -> START General Options

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('General Options', 'evox'),
    'id' => 'evox_general',
    'desc' => esc_html__('General all config', 'evox'),
    'customizer_width' => '400px',
    'icon' => 'el el-th-large',
));

//Favicon Config

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Favicon', 'evox'),
    'id' => 'evox_favicon_config',
    'desc' => '',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'evox_favicon_upload',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload Favicon Image', 'evox'),
            'subtitle' => esc_html__('Favicon image for your website', 'evox'),
            'desc' => '',
            'default' => false,
        ),
    )
));

//Loading config
Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Loading config', 'evox'),
    'id' => 'evox_general_loading',
    'desc' => '',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'evox_general_show_loading',
            'type' => 'switch',
            'title' => esc_html__('Loading On/Off', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_general_image_loading',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload image loading', 'evox'),
            'subtitle' => esc_html__('Upload image .gif', 'evox'),
            'default' => '',
            'required' => array('evox_general_show_loading', '=', true),
        ),
    )
));

// -> START Background Options

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Background', 'evox'),
    'id' => 'evox_background',
    'desc' => esc_html__('Background all config', 'evox'),
    'customizer_width' => '400px',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'evox_background_body',
            'output' => '#bd',
            'type' => 'background',
            'clone' => 'true',
            'title' => esc_html__('Body background', 'evox'),
            'subtitle' => esc_html__('Body background with image, color, etc.', 'evox'),
            'hint' => array(
                'content' => 'This is a <b>hint</b> tool-tip for the text field.<br/><br/>Add any HTML based text you like here.',
            )
        ),
    ),
));

// -> END Background Options

// -> END General Options

// -> START Header Options
Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Header', 'evox'),
    'id' => 'evox_header',
    'desc' => esc_html__('Header all config', 'evox'),
    'customizer_width' => '400px',
    'icon' => 'el el-arrow-up',
));

// Header Select Type
Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Header Select Type', 'evox'),
    'id' => 'evox_header_select_type',
    'desc' => '',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'evox_header_type_select',
            'type' => 'select',
            'title' => esc_html__('Header Type', 'evox'),
            'subtitle' => esc_html__('select type for header', 'evox'),
            'options' => array(
                '0' => esc_html__('Header Type 1', 'evox'),
                '1' => esc_html__('Header Type 2', 'evox'),
                '2' => esc_html__('Header Type 3', 'evox'),
                '3' => esc_html__('Header Type 4', 'evox'),
                '4' => esc_html__('Header Type 5', 'evox'),
                '5' => esc_html__('Header Type 6', 'evox'),
                '6' => esc_html__('Header Type 7', 'evox'),
                '7' => esc_html__('Header Type 8', 'evox'),
                '8' => esc_html__('Header Type 9', 'evox'),
                '9' => esc_html__('Header Type 10', 'evox'),
                '10' => esc_html__('Header Type 11', 'evox'),
            ),
            'default' => '0'
        ),

        array(
            'id' => 'evox_header_type_1_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 1', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/header-1.jpg'
                ),
            ),
            'required' => array(
                array('evox_header_type_select', 'equals', '0'),
            ),
        ),
        array(
            'id' => 'evox_header_type_2_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 2', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/header-2.jpg'
                ),
            ),
            'required' => array(
                array('evox_header_type_select', 'equals', '1'),
            ),
        ),
        array(
            'id' => 'evox_header_type_3_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 3', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/header-3.jpg'
                ),
            ),
            'required' => array(
                array('evox_header_type_select', 'equals', '2'),
            ),
        ),
        array(
            'id' => 'evox_header_type_4_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 4', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/header-4.jpg'
                ),
            ),
            'required' => array(
                array('evox_header_type_select', 'equals', '3'),
            ),
        ),
        array(
            'id' => 'evox_header_type_5_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 5', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/header-5.jpg'
                ),
            ),
            'required' => array(
                array('evox_header_type_select', 'equals', '4'),
            ),
        ),
        array(
            'id' => 'evox_header_type_6_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 6', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/header-6.jpg'
                ),
            ),
            'required' => array(
                array('evox_header_type_select', 'equals', '5'),
            ),
        ),
        array(
            'id' => 'evox_header_type_7_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 7', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/header-7.jpg'
                ),
            ),
            'required' => array(
                array('evox_header_type_select', 'equals', '6'),
            ),
        ),
        array(
            'id' => 'evox_header_type_8_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 8', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/header-8.jpg'
                ),
            ),
            'required' => array(
                array('evox_header_type_select', 'equals', '7'),
            ),
        ),
        array(
            'id' => 'evox_header_type_9_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 9', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/header-9.jpg'
                ),
            ),
            'required' => array(
                array('evox_header_type_select', 'equals', '8'),
            ),
        ),
        array(
            'id' => 'evox_header_type_10_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 10', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/header-10.jpg'
                ),
            ),
            'required' => array(
                array('evox_header_type_select', 'equals', '9'),
            ),
        ),
        array(
            'id' => 'evox_header_type_11_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 11', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/header-11.jpg'
                ),
            ),
            'required' => array(
                array('evox_header_type_select', 'equals', '10'),
            ),
        ),
    )

));

// Header Type 1 Options
Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Header Type 1 Options', 'evox'),
    'id' => 'evox_header_type_1_options',
    'desc' => '',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'evox_header_type_1_options_preview',
            'type' => 'image_select',
            'title' => esc_html__('Header Type 1 Preview', 'evox'),
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 1', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/header-1.jpg'
                ),
            ),
        ),

        array(
            'id' => 'evox_header_type_1_menu_locations',
            'type' => 'select',
            'title' => esc_html__('Menu Location', 'evox'),
            'subtitle' => '',
            'desc' => esc_html__('Select Menu Location. Defaut: Primary Menu', 'evox'),
            'data' => 'menu_locations'
        ),

        array(
            'id' => 'evox_header_type_1_top_display',
            'type' => 'switch',
            'title' => esc_html__('Header Top Display', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_header_type_1_top_email',
            'type' => 'text',
            'title' => esc_html__('Email', 'evox'),
            'desc' => '',
            'default' => esc_html__('info@evox.com ', 'evox'),
            'placeholder' => esc_html__('info@evox.com ', 'evox'),
            'required' => array('evox_header_type_1_top_display', '=', true),
        ),
        array(
            'id' => 'evox_header_type_1_top_phone',
            'type' => 'text',
            'title' => esc_html__('Phone', 'evox'),
            'desc' => '',
            'default' => esc_html__('+1-888-66-5555', 'evox'),
            'placeholder' => esc_html__('+1-888-66-5555', 'evox'),
            'required' => array('evox_header_type_1_top_display', '=', true),
        ),
        array(
            'id' => 'evox_header_type_1_top_address',
            'type' => 'text',
            'title' => esc_html__('Address', 'evox'),
            'desc' => '',
            'default' => esc_html__('8 Boulevard du Palais, 75001 Paris, France', 'evox'),
            'placeholder' => esc_html__('8 Boulevard du Palais, 75001 Paris, France', 'evox'),
            'required' => array('evox_header_type_1_top_display', '=', true),
        ),
        array(
            'id' => 'evox_header_type_1_top_menu',
            'type' => 'select',
            'title' => esc_html__('Choose Menu', 'evox'),
            'desc' => esc_html__('This option is used to add a navigation or a custom link created in Appearance > Menus to the top bar', 'evox'),
            'default' => 'choose',
            'options' => $evox_menuArray,
            'required' => array('evox_header_type_1_top_display', '=', true),
        ),
        array(
            'id' => 'evox_header_type_1_top_randl',
            'type' => 'switch',
            'title' => esc_html__('Register/Login', 'evox'),
            'desc' => '',
            'default' => true,
            'required' => array('evox_header_type_1_top_display', '=', true),
        ),
        array(
            'id' => 'evox_header_type_1_logo_option',
            'type' => 'select',
            'title' => esc_html__('Logo Type', 'evox'),
            'subtitle' => esc_html__('select type for logo', 'evox'),
            'default' => 'logo_image',
            'options' => array(
                'logo_text' => esc_html__('Logo Text', 'evox'),
                'logo_image' => esc_html__('Logo Image', 'evox'),
            )
        ),
        array(
            'id' => 'evox_header_type_1_logo_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload Logo Image', 'evox'),
            'subtitle' => esc_html__('logo image for your website', 'evox'),
            'desc' => '',
            'default' => false,
            'required' => array('evox_header_type_1_logo_option', '=', array('logo_image'))
        ),
        array(
            'id' => 'evox_header_type_1_logo_size',
            'type' => 'dimensions',
            'units' => array('em', 'px', '%'),    // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',  // Allow users to select any type of unit
            'title' => esc_html__('Set width/height for logo image', 'evox'),
            'subtitle' => '',
            'default' => array(
                'width' => '',
                'height' => '',
            ),
            'output' => array('.tz_logo img'),
            'required' => array('evox_header_type_1_logo_option', '=', array('logo_image'))
        ),
        array(
            'id' => 'evox_header_type_1_logo_text',
            'type' => 'text',
            'title' => esc_html__('Logo Text', 'evox'),
            'subtitle' => esc_html__('logo text for your website', 'evox'),
            'desc' => esc_html__('', 'evox'),
            'output' => '',
            'default' => esc_html__('evox', 'evox'),
            'placeholder' => esc_html__('evox', 'evox'),
            'required' => array('evox_header_type_1_logo_option', '=', array('logo_text'))
        ),
        array(
            'id' => 'evox_header_type_1_logo_text_color',
            'type' => 'color',
            'title' => esc_html__('Color Logo Text', 'evox'),
            'desc' => '',
            'output' => '.tz_logo .tz-logo-text',
            'default' => '#000',
            'placeholder' => esc_html__('evox', 'evox'),
            'required' => array('evox_header_type_1_logo_option', '=', array('logo_text'))
        ),
        array(
            'id' => 'evox_header_type_1_cart',
            'type' => 'switch',
            'title' => esc_html__('Cart Display', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_header_type_1_search',
            'type' => 'switch',
            'title' => esc_html__('Search Display', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_header_type_1_sticky',
            'type' => 'switch',
            'title' => esc_html__('Sticky Menu', 'evox'),
            'default' => true,
        ),

    )
));

// Header Type 2 Options
Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Header Type 2 Options', 'evox'),
    'id' => 'evox_header_type_2_options',
    'desc' => '',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'evox_header_type_2_options_preview',
            'type' => 'image_select',
            'title' => esc_html__('Header Type 2 Preview', 'evox'),
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 2', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/header-2.jpg'
                ),
            ),
        ),

        array(
            'id' => 'evox_header_type_2_menu_locations',
            'type' => 'select',
            'title' => esc_html__('Menu Location', 'evox'),
            'subtitle' => '',
            'desc' => esc_html__('Select Menu Location. Defaut: Primary Menu', 'evox'),
            'data' => 'menu_locations'
        ),

        array(
            'id' => 'evox_header_type_2_logo_option',
            'type' => 'select',
            'title' => esc_html__('Logo Type', 'evox'),
            'subtitle' => esc_html__('select type for logo', 'evox'),
            'default' => 'logo_image',
            'options' => array(
                'logo_text' => esc_html__('Logo Text', 'evox'),
                'logo_image' => esc_html__('Logo Image', 'evox'),
            )
        ),
        array(
            'id' => 'evox_header_type_2_logo_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload Logo Image', 'evox'),
            'subtitle' => esc_html__('logo image for your website', 'evox'),
            'desc' => '',
            'default' => false,
            'required' => array('evox_header_type_2_logo_option', '=', array('logo_image'))
        ),
        array(
            'id' => 'evox_header_type_2_logo_size',
            'type' => 'dimensions',
            'units' => array('em', 'px', '%'),    // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',  // Allow users to select any type of unit
            'title' => esc_html__('Set width/height for logo image', 'evox'),
            'subtitle' => '',
            'default' => array(
                'width' => '',
                'height' => '',
            ),
            'output' => array('.tz_logo img'),
            'required' => array('evox_header_type_2_logo_option', '=', array('logo_image'))
        ),
        array(
            'id' => 'evox_header_type_2_logo_text',
            'type' => 'text',
            'title' => esc_html__('Logo Text', 'evox'),
            'subtitle' => esc_html__('logo text for your website', 'evox'),
            'desc' => esc_html__('', 'evox'),
            'output' => '',
            'default' => esc_html__('evox', 'evox'),
            'placeholder' => esc_html__('evox', 'evox'),
            'required' => array('evox_header_type_2_logo_option', '=', array('logo_text'))
        ),
        array(
            'id' => 'evox_header_type_2_logo_text_color',
            'type' => 'color',
            'title' => esc_html__('Color Logo Text', 'evox'),
            'desc' => '',
            'output' => '.tz_logo .tz-logo-text',
            'default' => '#000',
            'placeholder' => esc_html__('evox', 'evox'),
            'required' => array('evox_header_type_2_logo_option', '=', array('logo_text'))
        ),
        array(
            'id' => 'evox_header_type_2_cart',
            'type' => 'switch',
            'title' => esc_html__('Cart Display', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_header_type_2_search',
            'type' => 'switch',
            'title' => esc_html__('Search Display', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_header_type_2_sticky',
            'type' => 'switch',
            'title' => esc_html__('Sticky Menu', 'evox'),
            'default' => true,
        ),

    )
));

// Header Type 3 Options
Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Header Type 3 Options', 'evox'),
    'id' => 'evox_header_type_3_options',
    'desc' => '',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'evox_header_type_3_options_preview',
            'type' => 'image_select',
            'title' => esc_html__('Header Type 3 Preview', 'evox'),
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 3', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/header-3.jpg'
                ),
            ),
        ),

        array(
            'id' => 'evox_header_type_3_menu_locations',
            'type' => 'select',
            'title' => esc_html__('Menu Location', 'evox'),
            'subtitle' => '',
            'desc' => esc_html__('Select Menu Location. Defaut: Primary Menu', 'evox'),
            'data' => 'menu_locations'
        ),

        array(
            'id' => 'evox_header_type_3_top_display',
            'type' => 'switch',
            'title' => esc_html__('Header Top Display', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_header_type_3_top_email',
            'type' => 'text',
            'title' => esc_html__('Email', 'evox'),
            'desc' => '',
            'default' => esc_html__('info@evox.com ', 'evox'),
            'placeholder' => esc_html__('info@evox.com ', 'evox'),
            'required' => array('evox_header_type_3_top_display', '=', true),
        ),
        array(
            'id' => 'evox_header_type_3_top_phone',
            'type' => 'text',
            'title' => esc_html__('Phone', 'evox'),
            'desc' => '',
            'default' => esc_html__('+1-888-66-5555', 'evox'),
            'placeholder' => esc_html__('+1-888-66-5555', 'evox'),
            'required' => array('evox_header_type_3_top_display', '=', true),
        ),
        array(
            'id' => 'evox_header_type_3_top_address',
            'type' => 'text',
            'title' => esc_html__('Address', 'evox'),
            'desc' => '',
            'default' => esc_html__('8 Boulevard du Palais, 75001 Paris, France', 'evox'),
            'placeholder' => esc_html__('8 Boulevard du Palais, 75001 Paris, France', 'evox'),
            'required' => array('evox_header_type_3_top_display', '=', true),
        ),
        array(
            'id' => 'evox_header_type_3_top_menu',
            'type' => 'select',
            'title' => esc_html__('Choose Menu', 'evox'),
            'desc' => esc_html__('This option is used to add a navigation or a custom link created in Appearance > Menus to the top bar', 'evox'),
            'default' => 'choose',
            'options' => $evox_menuArray,
            'required' => array('evox_header_type_3_top_display', '=', true),
        ),
        array(
            'id' => 'evox_header_type_3_top_randl',
            'type' => 'switch',
            'title' => esc_html__('Register/Login', 'evox'),
            'desc' => '',
            'default' => true,
            'required' => array('evox_header_type_3_top_display', '=', true),
        ),
        array(
            'id' => 'evox_header_type_3_logo_option',
            'type' => 'select',
            'title' => esc_html__('Logo Type', 'evox'),
            'subtitle' => esc_html__('select type for logo', 'evox'),
            'default' => 'logo_image',
            'options' => array(
                'logo_text' => esc_html__('Logo Text', 'evox'),
                'logo_image' => esc_html__('Logo Image', 'evox'),
            )
        ),
        array(
            'id' => 'evox_header_type_3_logo_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload Logo Image', 'evox'),
            'subtitle' => esc_html__('logo image for your website', 'evox'),
            'desc' => '',
            'default' => false,
            'required' => array('evox_header_type_3_logo_option', '=', array('logo_image'))
        ),
        array(
            'id' => 'evox_header_type_3_logo_size',
            'type' => 'dimensions',
            'units' => array('em', 'px', '%'),    // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',  // Allow users to select any type of unit
            'title' => esc_html__('Set width/height for logo image', 'evox'),
            'subtitle' => '',
            'default' => array(
                'width' => '',
                'height' => '',
            ),
            'output' => array('.tz_logo img'),
            'required' => array('evox_header_type_3_logo_option', '=', array('logo_image'))
        ),
        array(
            'id' => 'evox_header_type_3_logo_text',
            'type' => 'text',
            'title' => esc_html__('Logo Text', 'evox'),
            'subtitle' => esc_html__('logo text for your website', 'evox'),
            'desc' => esc_html__('', 'evox'),
            'output' => '',
            'default' => esc_html__('evox', 'evox'),
            'placeholder' => esc_html__('evox', 'evox'),
            'required' => array('evox_header_type_3_logo_option', '=', array('logo_text'))
        ),
        array(
            'id' => 'evox_header_type_3_logo_text_color',
            'type' => 'color',
            'title' => esc_html__('Color Logo Text', 'evox'),
            'desc' => '',
            'output' => '.tz_logo .tz-logo-text',
            'default' => '#000',
            'placeholder' => esc_html__('evox', 'evox'),
            'required' => array('evox_header_type_3_logo_option', '=', array('logo_text'))
        ),
        array(
            'id' => 'evox_header_type_3_cart',
            'type' => 'switch',
            'title' => esc_html__('Cart Display', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_header_type_3_search',
            'type' => 'switch',
            'title' => esc_html__('Search Display', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_header_type_3_sticky',
            'type' => 'switch',
            'title' => esc_html__('Sticky Menu', 'evox'),
            'default' => true,
        ),

    )
));

// Header Type 4 Options
Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Header Type 4 Options', 'evox'),
    'id' => 'evox_header_type_4_options',
    'desc' => '',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'evox_header_type_4_options_preview',
            'type' => 'image_select',
            'title' => esc_html__('Header Type 4 Preview', 'evox'),
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 4', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/header-4.jpg'
                ),
            ),
        ),

        array(
            'id' => 'evox_header_type_4_menu_locations',
            'type' => 'select',
            'title' => esc_html__('Menu Location', 'evox'),
            'subtitle' => '',
            'desc' => esc_html__('Select Menu Location. Defaut: Primary Menu', 'evox'),
            'data' => 'menu_locations'
        ),

        array(
            'id' => 'evox_header_type_4_logo_option',
            'type' => 'select',
            'title' => esc_html__('Logo Type', 'evox'),
            'subtitle' => esc_html__('select type for logo', 'evox'),
            'default' => 'logo_image',
            'options' => array(
                'logo_text' => esc_html__('Logo Text', 'evox'),
                'logo_image' => esc_html__('Logo Image', 'evox'),
            )
        ),
        array(
            'id' => 'evox_header_type_4_logo_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload Logo Image', 'evox'),
            'subtitle' => esc_html__('logo image for your website', 'evox'),
            'desc' => '',
            'default' => false,
            'required' => array('evox_header_type_4_logo_option', '=', array('logo_image'))
        ),
        array(
            'id' => 'evox_header_type_4_logo_size',
            'type' => 'dimensions',
            'units' => array('em', 'px', '%'),    // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',  // Allow users to select any type of unit
            'title' => esc_html__('Set width/height for logo image', 'evox'),
            'subtitle' => '',
            'default' => array(
                'width' => '',
                'height' => '',
            ),
            'output' => array('.tz_logo img'),
            'required' => array('evox_header_type_4_logo_option', '=', array('logo_image'))
        ),
        array(
            'id' => 'evox_header_type_4_logo_text',
            'type' => 'text',
            'title' => esc_html__('Logo Text', 'evox'),
            'subtitle' => esc_html__('logo text for your website', 'evox'),
            'desc' => esc_html__('', 'evox'),
            'output' => '',
            'default' => esc_html__('evox', 'evox'),
            'placeholder' => esc_html__('evox', 'evox'),
            'required' => array('evox_header_type_4_logo_option', '=', array('logo_text'))
        ),
        array(
            'id' => 'evox_header_type_4_logo_text_color',
            'type' => 'color',
            'title' => esc_html__('Color Logo Text', 'evox'),
            'desc' => '',
            'output' => '.tz_logo .tz-logo-text',
            'default' => '#000',
            'placeholder' => esc_html__('evox', 'evox'),
            'required' => array('evox_header_type_4_logo_option', '=', array('logo_text'))
        ),
        array(
            'id' => 'evox_header_type_4_cart',
            'type' => 'switch',
            'title' => esc_html__('Cart Display', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_header_type_4_search',
            'type' => 'switch',
            'title' => esc_html__('Search Display', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_header_type_4_sticky',
            'type' => 'switch',
            'title' => esc_html__('Sticky Menu', 'evox'),
            'default' => true,
        ),

    )
));

// Header Type 5 Options
Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Header Type 5 Options', 'evox'),
    'id' => 'evox_header_type_5_options',
    'desc' => '',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'evox_header_type_5_options_preview',
            'type' => 'image_select',
            'title' => esc_html__('Header Type 5 Preview', 'evox'),
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 5', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/header-5.jpg'
                ),
            ),
        ),

        array(
            'id' => 'evox_header_type_5_revolution_slider',
            'type' => 'text',
            'title' => esc_html__('Alias Of Revolution Slider', 'evox'),
            'desc' => esc_html__('Insert the alias of slider revolution here', 'evox'),
            'default' => '',
        ),

        array(
            'id' => 'evox_header_type_5_search_options',
            'type' => 'button_set',
            'title' => esc_html__('Search Box Option', 'evox'),
            'subtitle' => esc_html__('Show or hide search box section.', 'evox'),
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '2' => esc_html__('Hide', 'evox'),
            ),
            'default' => '2'
        ),

        // Field Name
        array(
            'id' => 'evox_header_type_5_field_name_option',
            'type' => 'button_set',
            'title' => esc_html__('Field Name Option', 'evox'),
            'subtitle' => esc_html__('Show or hide field name of search box.', 'evox'),
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '2' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1',
            'required' => array('evox_header_type_5_search_options', '=', '1'),
        ),
        array(
            'id' => 'evox_header_type_5_field_name_label',
            'type' => 'text',
            'title' => esc_html__('Field Name Label', 'evox'),
            'desc' => '',
            'default' => esc_html__('Keywords', 'evox'),
            'required' => array('evox_header_type_5_field_name_option', '=', '1'),
        ),

        // Field Destination
        array(
            'id' => 'evox_header_type_5_field_destination_option',
            'type' => 'button_set',
            'title' => esc_html__('Field Destination Option', 'evox'),
            'subtitle' => esc_html__('Show or hide field Destination of search box.', 'evox'),
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '2' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1',
            'required' => array('evox_header_type_5_search_options', '=', '1'),
        ),
        array(
            'id' => 'evox_header_type_5_field_destination_label',
            'type' => 'text',
            'title' => esc_html__('Field Destination Label', 'evox'),
            'desc' => '',
            'default' => esc_html__('Destination', 'evox'),
            'required' => array('evox_header_type_5_field_destination_option', '=', '1'),
        ),

        // Field Date
        array(
            'id' => 'evox_header_type_5_field_date_option',
            'type' => 'button_set',
            'title' => esc_html__('Field Date Option', 'evox'),
            'subtitle' => esc_html__('Show or hide field Date of search box.', 'evox'),
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '2' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1',
            'required' => array('evox_header_type_5_search_options', '=', '1'),
        ),
        array(
            'id' => 'evox_header_type_5_field_date_label',
            'type' => 'text',
            'title' => esc_html__('Field Date Label', 'evox'),
            'desc' => '',
            'default' => esc_html__('Date', 'evox'),
            'required' => array('evox_header_type_5_field_date_option', '=', '1'),
        ),

        // Field Duration
        array(
            'id' => 'evox_header_type_5_field_duration_option',
            'type' => 'button_set',
            'title' => esc_html__('Field Duration Option', 'evox'),
            'subtitle' => esc_html__('Show or hide field duration of search box.', 'evox'),
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '2' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1',
            'required' => array('evox_header_type_5_search_options', '=', '1'),
        ),
        array(
            'id' => 'evox_header_type_5_field_duration_label',
            'type' => 'text',
            'title' => esc_html__('Field Duration Label', 'evox'),
            'desc' => '',
            'default' => esc_html__('Category', 'evox'),
            'required' => array('evox_header_type_5_field_duration_option', '=', '1'),
        ),

        // Field Category
        array(
            'id' => 'evox_header_type_5_field_category_option',
            'type' => 'button_set',
            'title' => esc_html__('Field Category Option', 'evox'),
            'subtitle' => esc_html__('Show or hide field category of search box.', 'evox'),
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '2' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1',
            'required' => array('evox_header_type_5_search_options', '=', '1'),
        ),
        array(
            'id' => 'evox_header_type_5_field_category_label',
            'type' => 'text',
            'title' => esc_html__('Field Category Label', 'evox'),
            'desc' => '',
            'default' => esc_html__('Category', 'evox'),
            'required' => array('evox_header_type_5_field_category_option', '=', '1'),
        ),

        // Field Language
        array(
            'id' => 'evox_header_type_5_field_language_option',
            'type' => 'button_set',
            'title' => esc_html__('Field Language Option', 'evox'),
            'subtitle' => esc_html__('Show or hide field language of search box.', 'evox'),
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '2' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1',
            'required' => array('evox_header_type_5_search_options', '=', '1'),
        ),
        array(
            'id' => 'evox_header_type_5_field_language_label',
            'type' => 'text',
            'title' => esc_html__('Field Language Label', 'evox'),
            'desc' => '',
            'default' => esc_html__('Language', 'evox'),
            'required' => array('evox_header_type_5_field_language_option', '=', '1'),
        ),

        // Button Search
        array(
            'id' => 'evox_header_type_5_search_button',
            'type' => 'text',
            'title' => esc_html__('Button Search', 'evox'),
            'desc' => '',
            'default' => esc_html__('Search', 'evox'),
            'required' => array('evox_header_type_5_search_options', '=', '1'),
        ),

        array(
            'id' => 'evox_header_type_5_menu_locations',
            'type' => 'select',
            'title' => esc_html__('Menu Location', 'evox'),
            'subtitle' => '',
            'desc' => esc_html__('Select Menu Location. Defaut: Primary Menu', 'evox'),
            'data' => 'menu_locations'
        ),

        array(
            'id' => 'evox_header_type_5_logo_option',
            'type' => 'select',
            'title' => esc_html__('Logo Type', 'evox'),
            'subtitle' => esc_html__('select type for logo', 'evox'),
            'default' => 'logo_image',
            'options' => array(
                'logo_text' => esc_html__('Logo Text', 'evox'),
                'logo_image' => esc_html__('Logo Image', 'evox'),
            )
        ),
        array(
            'id' => 'evox_header_type_5_logo_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload Logo Image', 'evox'),
            'subtitle' => esc_html__('logo image for your website', 'evox'),
            'desc' => '',
            'default' => false,
            'required' => array('evox_header_type_5_logo_option', '=', array('logo_image'))
        ),
        array(
            'id' => 'evox_header_type_5_logo_size',
            'type' => 'dimensions',
            'units' => array('em', 'px', '%'),    // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',  // Allow users to select any type of unit
            'title' => esc_html__('Set width/height for logo image', 'evox'),
            'subtitle' => '',
            'default' => array(
                'width' => '',
                'height' => '',
            ),
            'output' => array('.tz_logo img'),
            'required' => array('evox_header_type_5_logo_option', '=', array('logo_image'))
        ),
        array(
            'id' => 'evox_header_type_5_logo_text',
            'type' => 'text',
            'title' => esc_html__('Logo Text', 'evox'),
            'subtitle' => esc_html__('logo text for your website', 'evox'),
            'desc' => esc_html__('', 'evox'),
            'output' => '',
            'default' => esc_html__('evox', 'evox'),
            'placeholder' => esc_html__('evox', 'evox'),
            'required' => array('evox_header_type_5_logo_option', '=', array('logo_text'))
        ),
        array(
            'id' => 'evox_header_type_5_logo_text_color',
            'type' => 'color',
            'title' => esc_html__('Color Logo Text', 'evox'),
            'desc' => '',
            'output' => '.tz_logo .tz-logo-text',
            'default' => '#000',
            'placeholder' => esc_html__('evox', 'evox'),
            'required' => array('evox_header_type_5_logo_option', '=', array('logo_text'))
        ),
        array(
            'id' => 'evox_header_type_5_cart',
            'type' => 'switch',
            'title' => esc_html__('Cart Display', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_header_type_5_search',
            'type' => 'switch',
            'title' => esc_html__('Search Display', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_header_type_5_sticky',
            'type' => 'switch',
            'title' => esc_html__('Sticky Menu', 'evox'),
            'default' => true,
        ),

    )
));

// Header Type 6 Options
Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Header Type 6 Options', 'evox'),
    'id' => 'evox_header_type_6_options',
    'desc' => '',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'evox_header_type_6_options_preview',
            'type' => 'image_select',
            'title' => esc_html__('Header Type 6 Preview', 'evox'),
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 6', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/header-2.jpg'
                ),
            ),
        ),

        array(
            'id' => 'evox_header_type_6_menu_locations',
            'type' => 'select',
            'title' => esc_html__('Menu Location', 'evox'),
            'subtitle' => '',
            'desc' => esc_html__('Select Menu Location. Defaut: Primary Menu', 'evox'),
            'data' => 'menu_locations'
        ),

        array(
            'id' => 'evox_header_type_6_logo_option',
            'type' => 'select',
            'title' => esc_html__('Logo Type', 'evox'),
            'subtitle' => esc_html__('select type for logo', 'evox'),
            'default' => 'logo_image',
            'options' => array(
                'logo_text' => esc_html__('Logo Text', 'evox'),
                'logo_image' => esc_html__('Logo Image', 'evox'),
            )
        ),
        array(
            'id' => 'evox_header_type_6_logo_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload Logo Image', 'evox'),
            'subtitle' => esc_html__('logo image for your website', 'evox'),
            'desc' => '',
            'default' => false,
            'required' => array('evox_header_type_6_logo_option', '=', array('logo_image'))
        ),
        array(
            'id' => 'evox_header_type_6_logo_size',
            'type' => 'dimensions',
            'units' => array('em', 'px', '%'),    // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',  // Allow users to select any type of unit
            'title' => esc_html__('Set width/height for logo image', 'evox'),
            'subtitle' => '',
            'default' => array(
                'width' => '',
                'height' => '',
            ),
            'output' => array('.tz_logo img'),
            'required' => array('evox_header_type_6_logo_option', '=', array('logo_image'))
        ),
        array(
            'id' => 'evox_header_type_6_logo_text',
            'type' => 'text',
            'title' => esc_html__('Logo Text', 'evox'),
            'subtitle' => esc_html__('logo text for your website', 'evox'),
            'desc' => esc_html__('', 'evox'),
            'output' => '',
            'default' => esc_html__('evox', 'evox'),
            'placeholder' => esc_html__('evox', 'evox'),
            'required' => array('evox_header_type_6_logo_option', '=', array('logo_text'))
        ),
        array(
            'id' => 'evox_header_type_6_logo_text_color',
            'type' => 'color',
            'title' => esc_html__('Color Logo Text', 'evox'),
            'desc' => '',
            'output' => '.tz_logo .tz-logo-text',
            'default' => '#000',
            'placeholder' => esc_html__('evox', 'evox'),
            'required' => array('evox_header_type_6_logo_option', '=', array('logo_text'))
        ),
        array(
            'id' => 'evox_header_type_6_cart',
            'type' => 'switch',
            'title' => esc_html__('Cart Display', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_header_type_6_search',
            'type' => 'switch',
            'title' => esc_html__('Search Display', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_header_type_6_sticky',
            'type' => 'switch',
            'title' => esc_html__('Sticky Menu', 'evox'),
            'default' => true,
        ),

    )
));

// Header Type 7 Options
Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Header Type 7 Options', 'evox'),
    'id' => 'evox_header_type_7_options',
    'desc' => '',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'evox_header_type_7_options_preview',
            'type' => 'image_select',
            'title' => esc_html__('Header Type 7 Preview', 'evox'),
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 7', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/header-7.jpg'
                ),
            ),
        ),

        array(
            'id' => 'evox_header_type_7_menu_locations',
            'type' => 'select',
            'title' => esc_html__('Menu Location', 'evox'),
            'subtitle' => '',
            'desc' => esc_html__('Select Menu Location. Defaut: Primary Menu', 'evox'),
            'data' => 'menu_locations'
        ),

        array(
            'id' => 'evox_header_type_7_logo_option',
            'type' => 'select',
            'title' => esc_html__('Logo Type', 'evox'),
            'subtitle' => esc_html__('select type for logo', 'evox'),
            'default' => 'logo_image',
            'options' => array(
                'logo_text' => esc_html__('Logo Text', 'evox'),
                'logo_image' => esc_html__('Logo Image', 'evox'),
            )
        ),
        array(
            'id' => 'evox_header_type_7_logo_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload Logo Image', 'evox'),
            'subtitle' => esc_html__('logo image for your website', 'evox'),
            'desc' => '',
            'default' => false,
            'required' => array('evox_header_type_7_logo_option', '=', array('logo_image'))
        ),
        array(
            'id' => 'evox_header_type_7_logo_size',
            'type' => 'dimensions',
            'units' => array('em', 'px', '%'),    // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',  // Allow users to select any type of unit
            'title' => esc_html__('Set width/height for logo image', 'evox'),
            'subtitle' => '',
            'default' => array(
                'width' => '',
                'height' => '',
            ),
            'output' => array('.tz_logo img'),
            'required' => array('evox_header_type_7_logo_option', '=', array('logo_image'))
        ),
        array(
            'id' => 'evox_header_type_7_logo_text',
            'type' => 'text',
            'title' => esc_html__('Logo Text', 'evox'),
            'subtitle' => esc_html__('logo text for your website', 'evox'),
            'desc' => esc_html__('', 'evox'),
            'output' => '',
            'default' => esc_html__('evox', 'evox'),
            'placeholder' => esc_html__('evox', 'evox'),
            'required' => array('evox_header_type_7_logo_option', '=', array('logo_text'))
        ),
        array(
            'id' => 'evox_header_type_7_logo_text_color',
            'type' => 'color',
            'title' => esc_html__('Color Logo Text', 'evox'),
            'desc' => '',
            'output' => '.tz_logo .tz-logo-text',
            'default' => '#000',
            'placeholder' => esc_html__('evox', 'evox'),
            'required' => array('evox_header_type_7_logo_option', '=', array('logo_text'))
        ),
        array(
            'id' => 'evox_header_type_7_cart',
            'type' => 'switch',
            'title' => esc_html__('Cart Display', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_header_type_7_search',
            'type' => 'switch',
            'title' => esc_html__('Search Display', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_header_type_7_sticky',
            'type' => 'switch',
            'title' => esc_html__('Sticky Menu', 'evox'),
            'default' => true,
        ),


    )
));
// Header Type 8 Options
Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Header Type 8 Options', 'evox'),
    'id' => 'evox_header_type_8_options',
    'desc' => '',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'evox_header_type_8_options_preview',
            'type' => 'image_select',
            'title' => esc_html__('Header Type 8 Preview', 'evox'),
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 8', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/header-8.jpg'
                ),
            ),
        ),

        array(
            'id' => 'evox_header_type_8_menu_locations',
            'type' => 'select',
            'title' => esc_html__('Menu Location', 'evox'),
            'subtitle' => '',
            'desc' => esc_html__('Select Menu Location. Defaut: Menu Shop', 'evox'),
            'data' => 'menu_locations'
        ),

        array(
            'id' => 'evox_header_type_8_logo_option',
            'type' => 'select',
            'title' => esc_html__('Logo Type', 'evox'),
            'subtitle' => esc_html__('select type for logo', 'evox'),
            'default' => 'logo_image',
            'options' => array(
                'logo_text' => esc_html__('Logo Text', 'evox'),
                'logo_image' => esc_html__('Logo Image', 'evox'),
            )
        ),
        array(
            'id' => 'evox_header_type_8_logo_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload Logo Image', 'evox'),
            'subtitle' => esc_html__('logo image for your website', 'evox'),
            'desc' => '',
            'default' => false,
            'required' => array('evox_header_type_8_logo_option', '=', array('logo_image'))
        ),
        array(
            'id' => 'evox_header_type_8_logo_size',
            'type' => 'dimensions',
            'units' => array('em', 'px', '%'),    // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',  // Allow users to select any type of unit
            'title' => esc_html__('Set width/height for logo image', 'evox'),
            'subtitle' => '',
            'default' => array(
                'width' => '',
                'height' => '',
            ),
            'output' => array('.tz_logo img'),
            'required' => array('evox_header_type_8_logo_option', '=', array('logo_image'))
        ),
        array(
            'id' => 'evox_header_type_8_logo_text',
            'type' => 'text',
            'title' => esc_html__('Logo Text', 'evox'),
            'subtitle' => esc_html__('logo text for your website', 'evox'),
            'desc' => esc_html__('', 'evox'),
            'output' => '',
            'default' => esc_html__('evox', 'evox'),
            'placeholder' => esc_html__('evox', 'evox'),
            'required' => array('evox_header_type_8_logo_option', '=', array('logo_text'))
        ),
        array(
            'id' => 'evox_header_type_8_logo_text_color',
            'type' => 'color',
            'title' => esc_html__('Color Logo Text', 'evox'),
            'desc' => '',
            'output' => '.tz_logo .tz-logo-text',
            'default' => '#000',
            'placeholder' => esc_html__('evox', 'evox'),
            'required' => array('evox_header_type_8_logo_option', '=', array('logo_text'))
        ),
        array(
            'id' => 'evox_header_type_8_top_display',
            'type' => 'switch',
            'title' => esc_html__('Phone Display', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_header_type_8_top_phone',
            'type' => 'text',
            'title' => esc_html__('Phone Label', 'evox'),
            'desc' => '',
            'default' => esc_html__('Call us for free', 'evox'),
            'placeholder' => esc_html__('Call us for free', 'evox'),
            'required' => array('evox_header_type_8_top_display', '=', true),
        ),
        array(
            'id' => 'evox_header_type_8_top_phone_nb',
            'type' => 'text',
            'title' => esc_html__('Phone Number', 'evox'),
            'desc' => '',
            'default' => esc_html__('123-456-7890', 'evox'),
            'placeholder' => esc_html__('123-456-7890', 'evox'),
            'required' => array('evox_header_type_8_top_display', '=', true),
        ),
        array(
            'id' => 'evox_header_type_8_top_phone_lk',
            'type' => 'text',
            'title' => esc_html__('Phone Link', 'evox'),
            'desc' => '',
            'default' => esc_html__('', 'evox'),
            'placeholder' => esc_html__('Ex: 123456789', 'evox'),
            'description' => esc_html__('Enter A Phone Number', 'evox'),
            'required' => array('evox_header_type_8_top_display', '=', true),
        ),
        array(
            'id' => 'evox_header_type_8_filter',
            'type' => 'switch',
            'title' => esc_html__('Shipping Display', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_header_type_8_top_filter',
            'type' => 'text',
            'title' => esc_html__('Shipping Label', 'evox'),
            'desc' => '',
            'default' => esc_html__('On order over $50.00', 'evox'),
            'placeholder' => esc_html__('EX:On order over $50.00', 'evox'),
            'required' => array('evox_header_type_8_filter', '=', true),
        ),
        array(
            'id' => 'evox_header_type_8_top_filter_tt',
            'type' => 'text',
            'title' => esc_html__('Shipping Title', 'evox'),
            'desc' => '',
            'default' => esc_html__('Free Shipping', 'evox'),
            'placeholder' => esc_html__('Free Shipping', 'evox'),
            'required' => array('evox_header_type_8_filter', '=', true),
        ),
        array(
            'id' => 'evox_header_type_8_top_flk',
            'type' => 'text',
            'title' => esc_html__('Shipping Link', 'evox'),
            'desc' => '',
            'default' => esc_html__('', 'evox'),
            'placeholder' => esc_html__('Link ', 'evox'),
            'required' => array('evox_header_type_8_filter', '=', true),
        ),
        array(
            'id' => 'evox_header_type_8_cart',
            'type' => 'switch',
            'title' => esc_html__('Cart Display', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_header_type_8_search',
            'type' => 'switch',
            'title' => esc_html__('Search Display', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_header_type_8_sticky',
            'type' => 'switch',
            'title' => esc_html__('Sticky Menu', 'evox'),
            'default' => true,
        ),


    )
));
// Header Type 9 Options
Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Header Type 9 Options', 'evox'),
    'id' => 'evox_header_type_9_options',
    'desc' => '',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'evox_header_type_9_options_preview',
            'type' => 'image_select',
            'title' => esc_html__('Header Type 9 Preview', 'evox'),
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 9', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/header-9.jpg'
                ),
            ),
        ),

        array(
            'id' => 'evox_header_type_9_menu_locations',
            'type' => 'select',
            'title' => esc_html__('Menu Location', 'evox'),
            'subtitle' => '',
            'desc' => esc_html__('Select Menu Location. Defaut: Primary Menu', 'evox'),
            'data' => 'menu_locations'
        ),

        array(
            'id' => 'evox_header_type_9_logo_option',
            'type' => 'select',
            'title' => esc_html__('Logo Type', 'evox'),
            'subtitle' => esc_html__('select type for logo', 'evox'),
            'default' => 'logo_image',
            'options' => array(
                'logo_text' => esc_html__('Logo Text', 'evox'),
                'logo_image' => esc_html__('Logo Image', 'evox'),
            )
        ),
        array(
            'id' => 'evox_header_type_9_logo_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload Logo Image', 'evox'),
            'subtitle' => esc_html__('logo image for your website', 'evox'),
            'desc' => '',
            'default' => false,
            'required' => array('evox_header_type_9_logo_option', '=', array('logo_image'))
        ),
        array(
            'id' => 'evox_header_type_9_logo_size',
            'type' => 'dimensions',
            'units' => array('em', 'px', '%'),    // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',  // Allow users to select any type of unit
            'title' => esc_html__('Set width/height for logo image', 'evox'),
            'subtitle' => '',
            'default' => array(
                'width' => '',
                'height' => '',
            ),
            'output' => array('.tz_logo img'),
            'required' => array('evox_header_type_9_logo_option', '=', array('logo_image'))
        ),
        array(
            'id' => 'evox_header_type_9_logo_text',
            'type' => 'text',
            'title' => esc_html__('Logo Text', 'evox'),
            'subtitle' => esc_html__('logo text for your website', 'evox'),
            'desc' => esc_html__('', 'evox'),
            'output' => '',
            'default' => esc_html__('evox', 'evox'),
            'placeholder' => esc_html__('evox', 'evox'),
            'required' => array('evox_header_type_9_logo_option', '=', array('logo_text'))
        ),
        array(
            'id' => 'evox_header_type_9_logo_text_color',
            'type' => 'color',
            'title' => esc_html__('Color Logo Text', 'evox'),
            'desc' => '',
            'output' => '.tz_logo .tz-logo-text',
            'default' => '#000',
            'placeholder' => esc_html__('evox', 'evox'),
            'required' => array('evox_header_type_9_logo_option', '=', array('logo_text'))
        ),
        array(
            'id' => 'evox_header_type_9_sticky',
            'type' => 'switch',
            'title' => esc_html__('Sticky Menu', 'evox'),
            'default' => true,
        ),
    )
));
// Header Type 10 Options
Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Header Type 10 Options', 'evox'),
    'id' => 'evox_header_type_10_options',
    'desc' => '',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'evox_header_type_10_options_preview',
            'type' => 'image_select',
            'title' => esc_html__('Header Type 10 Preview', 'evox'),
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 10', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/header-10.jpg'
                ),
            ),
        ),

        array(
            'id' => 'evox_header_type_10_menu_locations_left',
            'type' => 'select',
            'title' => esc_html__('Menu Location Left', 'evox'),
            'subtitle' => '',
            'desc' => esc_html__('Select Menu Location. Defaut: Menu Left', 'evox'),
            'data' => 'menu_locations'
        ),

        array(
            'id' => 'evox_header_type_10_menu_locations_right',
            'type' => 'select',
            'title' => esc_html__('Menu Location Right', 'evox'),
            'subtitle' => '',
            'desc' => esc_html__('Select Menu Location. Defaut: Menu Right', 'evox'),
            'data' => 'menu_locations'
        ),

        array(
            'id' => 'evox_header_type_10_logo_option',
            'type' => 'select',
            'title' => esc_html__('Logo Type', 'evox'),
            'subtitle' => esc_html__('select type for logo', 'evox'),
            'default' => 'logo_image',
            'options' => array(
                'logo_text' => esc_html__('Logo Text', 'evox'),
                'logo_image' => esc_html__('Logo Image', 'evox'),
            )
        ),
        array(
            'id' => 'evox_header_type_10_logo_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload Logo Image', 'evox'),
            'subtitle' => esc_html__('logo image for your website', 'evox'),
            'desc' => '',
            'default' => false,
            'required' => array('evox_header_type_10_logo_option', '=', array('logo_image'))
        ),
        array(
            'id' => 'evox_header_type_10_logo_size',
            'type' => 'dimensions',
            'units' => array('em', 'px', '%'),    // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',  // Allow users to select any type of unit
            'title' => esc_html__('Set width/height for logo image', 'evox'),
            'subtitle' => '',
            'default' => array(
                'width' => '',
                'height' => '',
            ),
            'output' => array('.tz_logo img'),
            'required' => array('evox_header_type_10_logo_option', '=', array('logo_image'))
        ),
        array(
            'id' => 'evox_header_type_10_logo_text',
            'type' => 'text',
            'title' => esc_html__('Logo Text', 'evox'),
            'subtitle' => esc_html__('logo text for your website', 'evox'),
            'desc' => esc_html__('', 'evox'),
            'output' => '',
            'default' => esc_html__('evox', 'evox'),
            'placeholder' => esc_html__('evox', 'evox'),
            'required' => array('evox_header_type_10_logo_option', '=', array('logo_text'))
        ),
        array(
            'id' => 'evox_header_type_10_logo_text_color',
            'type' => 'color',
            'title' => esc_html__('Color Logo Text', 'evox'),
            'desc' => '',
            'output' => '.tz_logo .tz-logo-text',
            'default' => '#000',
            'placeholder' => esc_html__('evox', 'evox'),
            'required' => array('evox_header_type_10_logo_option', '=', array('logo_text'))
        ),
        array(
            'id' => 'evox_header_type_10_sticky',
            'type' => 'switch',
            'title' => esc_html__('Sticky Menu', 'evox'),
            'default' => true,
        ),
        array(
            'id' => 'evox_header_type_10_search_r',
            'type' => 'switch',
            'title' => esc_html__('Search Display On Menu Right', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_header_type_10_cart_r',
            'type' => 'switch',
            'title' => esc_html__('Cart Display On Menu Right', 'evox'),
            'default' => false,
        ),

    )
));
// Header Type 11 Options
Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Header Type 11 Options', 'evox'),
    'id' => 'evox_header_type_11_options',
    'desc' => '',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'evox_header_type_11_options_preview',
            'type' => 'image_select',
            'title' => esc_html__('Header Type 11 Preview', 'evox'),
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Header Type 11', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/header-11.jpg'
                ),
            ),
        ),

        array(
            'id' => 'evox_header_type_11_menu_locations',
            'type' => 'select',
            'title' => esc_html__('Menu Location', 'evox'),
            'subtitle' => '',
            'desc' => esc_html__('Select Menu Location. Defaut: Primary Menu', 'evox'),
            'data' => 'menu_locations'
        ),

        array(
            'id' => 'evox_header_type_11_top_display',
            'type' => 'switch',
            'title' => esc_html__('Header Top Display', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_header_type_11_top_email',
            'type' => 'text',
            'title' => esc_html__('Email', 'evox'),
            'desc' => '',
            'default' => esc_html__('info@evox.com ', 'evox'),
            'placeholder' => esc_html__('info@evox.com ', 'evox'),
            'required' => array('evox_header_type_11_top_display', '=', true),
        ),
        array(
            'id' => 'evox_header_type_11_top_phone',
            'type' => 'text',
            'title' => esc_html__('Phone', 'evox'),
            'desc' => '',
            'default' => esc_html__('+1-888-66-5555', 'evox'),
            'placeholder' => esc_html__('+1-888-66-5555', 'evox'),
            'required' => array('evox_header_type_11_top_display', '=', true),
        ),
        array(
            'id' => 'evox_header_type_11_top_randl',
            'type' => 'switch',
            'title' => esc_html__('Register/Login', 'evox'),
            'desc' => '',
            'default' => true,
            'required' => array('evox_header_type_11_top_display', '=', true),
        ),
        array(
            'id' => 'evox_header_type_11_logo_option',
            'type' => 'select',
            'title' => esc_html__('Logo Type', 'evox'),
            'subtitle' => esc_html__('select type for logo', 'evox'),
            'default' => 'logo_image',
            'options' => array(
                'logo_text' => esc_html__('Logo Text', 'evox'),
                'logo_image' => esc_html__('Logo Image', 'evox'),
            )
        ),
        array(
            'id' => 'evox_header_type_11_logo_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload Logo Image', 'evox'),
            'subtitle' => esc_html__('logo image for your website', 'evox'),
            'desc' => '',
            'default' => false,
            'required' => array('evox_header_type_11_logo_option', '=', array('logo_image'))
        ),
        array(
            'id' => 'evox_header_type_11_logo_size',
            'type' => 'dimensions',
            'units' => array('em', 'px', '%'),    // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',  // Allow users to select any type of unit
            'title' => esc_html__('Set width/height for logo image', 'evox'),
            'subtitle' => '',
            'default' => array(
                'width' => '',
                'height' => '',
            ),
            'output' => array('.tz_logo img'),
            'required' => array('evox_header_type_11_logo_option', '=', array('logo_image'))
        ),
        array(
            'id' => 'evox_header_type_11_logo_text',
            'type' => 'text',
            'title' => esc_html__('Logo Text', 'evox'),
            'subtitle' => esc_html__('logo text for your website', 'evox'),
            'desc' => esc_html__('', 'evox'),
            'output' => '',
            'default' => esc_html__('evox', 'evox'),
            'placeholder' => esc_html__('evox', 'evox'),
            'required' => array('evox_header_type_11_logo_option', '=', array('logo_text'))
        ),
        array(
            'id' => 'evox_header_type_11_logo_text_color',
            'type' => 'color',
            'title' => esc_html__('Color Logo Text', 'evox'),
            'desc' => '',
            'output' => '.tz_logo .tz-logo-text',
            'default' => '#000',
            'placeholder' => esc_html__('evox', 'evox'),
            'required' => array('evox_header_type_11_logo_option', '=', array('logo_text'))
        ),
        array(
            'id' => 'evox_header_type_11_cart',
            'type' => 'switch',
            'title' => esc_html__('Cart Display', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_header_type_11_search',
            'type' => 'switch',
            'title' => esc_html__('Search Display', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_header_type_11_sticky',
            'type' => 'switch',
            'title' => esc_html__('Sticky Menu', 'evox'),
            'default' => true,
        ),

    )
));
// -> END Header Options

// -> START Breadcrumbs Options

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Breadcrumbs', 'evox'),
    'id' => 'evox_breadcrumbs',
    'desc' => '',
    'customizer_width' => '400px',
    'icon' => 'el el-caret-right',
    'fields' => array(

        array(
            'id' => 'evox_breadcrumbs_options',
            'type' => 'button_set',
            'title' => esc_html__('Breadcrumbs Options', 'evox'),
            'subtitle' => esc_html__('Show or hide breadcrumb section.', 'evox'),
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '2' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1'
        ),
        array(
            'id' => 'evox_breadcrumb_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Image Background', 'evox'),
            'subtitle' => esc_html__('Image background for your breadcrumb', 'evox'),
            'required' => array('evox_breadcrumbs_options', '=', '1'),
        ),
        array(
            'id' => 'evox_breadcrumbs_title',
            'type' => 'button_set',
            'title' => esc_html__('Title', 'evox'),
            'subtitle' => esc_html__('Show or hide title of breadcrumb section.', 'evox'),
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '2' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1',
            'required' => array('evox_breadcrumbs_options', '=', '1'),
        ),
        array(
            'id' => 'evox_breadcrumbs_link',
            'type' => 'button_set',
            'title' => esc_html__('Breadcrumb', 'evox'),
            'subtitle' => esc_html__('Show or hide breadcrumb.', 'evox'),
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '2' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1',
            'required' => array('evox_breadcrumbs_options', '=', '1'),
        ),

        array(
            'id' => 'evox_breadcrumb_margin',
            'type' => 'spacing',
            'output' => array('.tz-Breadcrumb .tzOverlayBreadcrumb'),
            'mode' => 'padding',
            'right' => false,     // Disable the right
            'left' => false,     // Disable the left
            'units' => array('em', 'px', '%'),
            'title' => esc_html__('Breadcrumb Padding', 'evox'),
            'subtitle' => esc_html__('Controls the top/bottom padding for breadcrumb.', 'evox'),
            'desc' => esc_html__('Enter values including any valid CSS unit, ex: 55px, 40px.', 'evox'),
            'default' => array(
                'margin-top' => '0',
                'margin-bottom' => '0',
            )
        )

    )
));

// -> END Breadcrumbs Options

// -> START Newsletter Options
Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Newsletter', 'evox'),
    'id' => 'evox_newsletter',
    'desc' => esc_html__('Newsletter all config', 'evox'),
    'customizer_width' => '400px',
    'icon' => 'el el-envelope',
    'fields' => array(
        array(
            'id' => 'evox_newsletter_type_select',
            'type' => 'select',
            'title' => esc_html__('Newsletter Type', 'evox'),
            'subtitle' => esc_html__('select type for newsletter', 'evox'),
            'options' => array(
                '0' => esc_html__('Newsletter Type 1', 'evox'),
                '1' => esc_html__('Newsletter Type 2', 'evox'),
                '3' => esc_html__('Newsletter Type 3', 'evox'),
                '4' => esc_html__('Newsletter Type 4', 'evox'),
                '2' => esc_html__('Hide Newsletter', 'evox'),

            ),
            'default' => '0'
        ),

        array(
            'id' => 'evox_newsletter_type_1_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Newsletter Type 1', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/newsletter-type-1.jpg'
                ),
            ),
            'required' => array('evox_newsletter_type_select', 'equals', '0'),
        ),
        array(
            'id' => 'evox_newsletter_type_2_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Newsletter Type 2', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/newsletter-type-2.jpg'
                ),
            ),
            'required' => array('evox_newsletter_type_select', 'equals', '1'),
        ),
        array(
            'id' => 'evox_newsletter_type_3_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Newsletter Type 3', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/newsletter-type-3.jpg'
                ),
            ),
            'required' => array('evox_newsletter_type_select', 'equals', '3'),
        ),
        array(
            'id' => 'evox_newsletter_type_4_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Newsletter Type 4', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/newsletter-type-4.jpg'
                ),
            ),
            'required' => array('evox_newsletter_type_select', 'equals', '4'),
        ),

        array(
            'id' => 'evox_newsletter_title',
            'type' => 'text',
            'title' => esc_html__('Title', 'evox'),
            'desc' => esc_html__('', 'evox'),
            'default' => esc_html__('Submit your newsletter', 'evox'),
            'required' => array('evox_newsletter_type_select', 'equals', array('0', '1', '3', '4')),
        ),

        array(
            'id' => 'evox_newsletter_subtitle',
            'type' => 'text',
            'title' => esc_html__('Subtitle', 'evox'),
            'desc' => esc_html__('', 'evox'),
            'default' => esc_html__('Register now! We will send you best offers for your trip.', 'evox'),
            'required' => array('evox_newsletter_type_select', 'equals', array('0', '1', '3', '4')),
        ),

        array(
            'id' => 'evox_newsletter_background',
            'type' => 'background',
            'title' => esc_html__('Background Option', 'evox'),
            'output' => '.Tz_background',
            'desc' => esc_html__('Option background for newsletter section', 'evox'),
            'required' => array('evox_newsletter_type_select', 'equals', array('0', '1', '3', '4')),
        )
    )
));

// -> END Newsletter Options

// -> START Footer Options
Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Footer', 'evox'),
    'id' => 'evox_footer',
    'desc' => esc_html__('Footer all config', 'evox'),
    'customizer_width' => '400px',
    'icon' => 'el el-arrow-down'
));

//Footer Content

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Footer Content', 'evox'),
    'id' => 'evox_footer_content',
    'desc' => '',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'evox_footer_type',
            'type' => 'select',
            'title' => esc_html__('Footer Type', 'evox'),
            'subtitle' => esc_html__('Select type of footer', 'evox'),
            'options' => array(
                '0' => esc_html__('Type 1', 'evox'),
                '1' => esc_html__('Type 2', 'evox'),
                '2' => esc_html__('Type 3', 'evox'),
            ),
            'default' => '0',
        ),

        array(
            'id' => 'evox_footer_type_1_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('Footer Type 1', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/footer-type-1.jpg'
                ),
            ),
            'required' => array(
                array('evox_footer_type', 'equals', '0'),
            ),
        ),
        array(
            'id' => 'evox_footer_type_2_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '2' => array(
                    'alt' => esc_html__('Footer Type 2', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/footer-type-2.jpg'
                ),
            ),
            'required' => array(
                array('evox_footer_type', 'equals', '1'),
            ),
        ),
        array(
            'id' => 'evox_footer_type_3_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '2' => array(
                    'alt' => esc_html__('Footer Type 3', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/footer-type-3.png'
                ),
            ),
            'required' => array(
                array('evox_footer_type', 'equals', '2'),
            ),
        ),

        array(
            'id' => 'evox_footer_background',
            'type' => 'background',
            'title' => esc_html__('Footer Type 2 Background', 'evox'),
            'output' => '.tz-footer.tz-footer-type-2',
            'desc' => esc_html__('Option background for footer type 2', 'evox'),
            'required' => array(
                array('evox_footer_type', 'equals', '1'),
            ),
        ),

        array(
            'id' => 'evox_footer_background_type_select',
            'type' => 'select',
            'title' => esc_html__('Footer Background', 'evox'),
            'subtitle' => esc_html__('select type for footer', 'evox'),
            'options' => array(
                '0' => esc_html__('On', 'evox'),
                '1' => esc_html__('Off', 'evox'),
            ),
            'required' => array(
                array('evox_footer_type', 'equals', '0'),
            ),
            'default' => '0'

        ),

        array(
            'id' => 'evox_footer_background_overlay',
            'type' => 'switch',
            'title' => esc_html__('Overlay', 'evox'),
            'desc' => esc_html__('Show/Hide Overlay', 'evox'),
            'default' => true,
            'required' => array(
                array('evox_footer_background_type_select', 'equals', '0'),
            ),
        ),

        array(
            'id' => 'evox_footer_backgrounds',
            'type' => 'background',
            'title' => esc_html__('Footer Type 1 Background', 'evox'),
            'output' => '.tz-footer-type-1.tz_bgft',
            'desc' => esc_html__('Option background for footer type 1', 'evox'),
            'required' => array(
                array('evox_footer_background_type_select', 'equals', '0'),
            ),
        ),

        array(
            'id' => 'evox_footer_column_col',
            'type' => 'select',
            'title' => esc_html__('Number of Footer Columns', 'evox'),
            'subtitle' => esc_html__('Controls the number of columns in the footer', 'evox'),
            'options' => array(
                '0' => esc_html__('No Footer', 'evox'),
                '1' => esc_html__('Footer 1 Column', 'evox'),
                '2' => esc_html__('Footer 2 Column', 'evox'),
                '3' => esc_html__('Footer 3 Column', 'evox'),
                '4' => esc_html__('Footer 4 Column', 'evox'),
                '5' => esc_html__('Footer 5 Column', 'evox'),
            ),
            'default' => '4',
        ),

        array(
            'id' => 'evox_footer_0column_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('No Footer', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/no-footer.jpg'
                ),
            ),
            'required' => array(
                array('evox_footer_column_col', 'equals', '0'),
            ),
        ),
        array(
            'id' => 'evox_footer_1column_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('Footer 1 Column', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/footer_1col.jpg'
                ),
            ),
            'required' => array(
                array('evox_footer_column_col', 'equals', '1'),
            ),
        ),
        array(
            'id' => 'evox_footer_2column_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '2' => array(
                    'alt' => esc_html__('Footer 2 Column', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/footer_2col.jpg'
                ),
            ),
            'required' => array(
                array('evox_footer_column_col', 'equals', '2'),
            ),
        ),
        array(
            'id' => 'evox_footer_3column_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Footer 3 Column', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/footer_3col.jpg'
                ),
            ),
            'required' => array(
                array('evox_footer_column_col', 'equals', '3'),
            ),
        ),
        array(
            'id' => 'evox_footer_4column_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Footer 4 Column', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/footer_4col.jpg'
                ),
            ),
            'required' => array(
                array('evox_footer_column_col', 'equals', '4'),
            ),
        ),
        array(
            'id' => 'evox_footer_5column_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Footer 5 Column', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/footer_5col.jpg'
                ),
            ),
            'required' => array(
                array('evox_footer_column_col', 'equals', '5'),
            ),
        ),

        array(
            'id' => 'evox_footer_column_w1',
            'type' => 'slider',
            'title' => esc_html__('Footer width 1', 'evox'),
            'subtitle' => esc_html__('Select the number of columns to display in the footer', 'evox'),
            'desc' => esc_html__('Min: 1, max: 12, default value: 1', 'evox'),
            'default' => 1,
            'min' => 1,
            'step' => 1,
            'max' => 12,
            'display_value' => 'label',
            'required' => array(
                array('evox_footer_column_col', 'equals', '1', '2', '3', '4', '5'),
                array('evox_footer_column_col', '!=', '0'),
            )
        ),

        array(
            'id' => 'evox_footer_column_w2',
            'type' => 'slider',
            'title' => esc_html__('Footer width 2', 'evox'),
            'subtitle' => esc_html__('Select the number of columns to display in the footer', 'evox'),
            'desc' => esc_html__('Min: 1, max: 12, default value: 1', 'evox'),
            'default' => 1,
            'min' => 1,
            'step' => 1,
            'max' => 12,
            'display_value' => 'label',
            'required' => array(
                array('evox_footer_column_col', 'equals', '2', '3', '4', '5'),
                array('evox_footer_column_col', '!=', '1'),
                array('evox_footer_column_col', '!=', '0'),
            )
        ),

        array(
            'id' => 'evox_footer_column_w3',
            'type' => 'slider',
            'title' => esc_html__('Footer width 3', 'evox'),
            'subtitle' => esc_html__('Select the number of columns to display in the footer', 'evox'),
            'desc' => esc_html__('Min: 1, max: 12, default value: 1', 'evox'),
            'default' => 1,
            'min' => 1,
            'step' => 1,
            'max' => 12,
            'display_value' => 'label',
            'required' => array(
                array('evox_footer_column_col', 'equals', '3', '4', '5'),
                array('evox_footer_column_col', '!=', '1'),
                array('evox_footer_column_col', '!=', '2'),
                array('evox_footer_column_col', '!=', '0'),
            )
        ),
        array(
            'id' => 'evox_footer_column_w4',
            'type' => 'slider',
            'title' => esc_html__('Footer width 4', 'evox'),
            'subtitle' => esc_html__('Select the number of columns to display in the footer', 'evox'),
            'desc' => esc_html__('Min: 1, max: 12, default value: 1', 'evox'),
            'default' => 1,
            'min' => 1,
            'step' => 1,
            'max' => 12,
            'display_value' => 'label',
            'required' => array(
                array('evox_footer_column_col', 'equals', '4', '5'),
                array('evox_footer_column_col', '!=', '1'),
                array('evox_footer_column_col', '!=', '2'),
                array('evox_footer_column_col', '!=', '3'),
                array('evox_footer_column_col', '!=', '0'),
            )
        ),
        array(
            'id' => 'evox_footer_column_w5',
            'type' => 'slider',
            'title' => esc_html__('Footer width 5', 'evox'),
            'subtitle' => esc_html__('Select the number of columns to display in the footer', 'evox'),
            'desc' => esc_html__('Min: 1, max: 12, default value: 1', 'evox'),
            'default' => 1,
            'min' => 1,
            'step' => 1,
            'max' => 12,
            'display_value' => 'label',
            'required' => array(
                array('evox_footer_column_col', 'equals', '5'),
                array('evox_footer_column_col', '!=', '1'),
                array('evox_footer_column_col', '!=', '2'),
                array('evox_footer_column_col', '!=', '3'),
                array('evox_footer_column_col', '!=', '4'),
                array('evox_footer_column_col', '!=', '0'),
            )
        ),

        array(
            'id' => 'opt-gallery',
            'type' => 'gallery',
            'title' => __('Add/Edit Gallery', 'redux-framework-demo'),
            'subtitle' => __('Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader', 'redux-framework-demo'),
            'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
            'required' => array(
                array('evox_footer_type', 'equals', '2'),
            ),
        ),


        array(
            'id' => 'evox_footer_type_1_logo',
            'type' => 'media',
            'title' => esc_html__('Footer Logo Type 1', 'evox'),
            'subtitle' => esc_html__('Upload logo for footer type 1', 'evox'),
            'required' => array(
                array('evox_footer_type', 'equals', '0'),
            ),
        ),

        array(
            'id' => 'evox_footer_type_2_logo',
            'type' => 'media',
            'title' => esc_html__('Footer Logo Type 2', 'evox'),
            'subtitle' => esc_html__('Upload logo for footer type 2', 'evox'),
            'required' => array(
                array('evox_footer_type', 'equals', '1'),
            ),
        ),
        array(
            'id' => 'evox_footer_type_3_logo',
            'type' => 'media',
            'title' => esc_html__('Footer Logo Type 3', 'evox'),
            'subtitle' => esc_html__('Upload logo for footer type 3', 'evox'),
            'required' => array(
                array('evox_footer_type', 'equals', '2'),
            ),
        ),
    )

));

// Copyright

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Footer Bottom', 'evox'),
    'id' => 'evox_footer_bottom',
    'desc' => '',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'evox_footer_copyright_editor',
            'type' => 'editor',
            'title' => esc_html__('Copyright', 'evox'),
            'full_width' => true,
            'default' => esc_html__('Copyright &amp; Templaza', 'evox'),
        ),
        array(
            'id' => 'evox_footer_type_select',
            'type' => 'select',
            'title' => esc_html__('Footer Type', 'evox'),
            'subtitle' => esc_html__('select type for footer', 'evox'),
            'options' => array(
                '0' => esc_html__('Footer Menu', 'evox'),
                '1' => esc_html__('Social', 'evox'),
                '2' => esc_html__('Logo Branch', 'evox'),
            ),
            'default' => '0'
        ),

        array(
            'id' => 'evox_footer_link',
            'type' => 'switch',
            'title' => esc_html__('Footer Menu', 'evox'),
            'desc' => esc_html__('Show/Hide Footer Menu', 'evox'),
            'default' => true,
            'required' => array(
                array('evox_footer_type_select', 'equals', '0'),
            ),
        ),
        array(
            'id' => 'evox_footer_menu_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Footer Menu', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/footer-menu.jpg'
                ),
            ),
            'required' => array(
                array('evox_footer_type_select', 'equals', '0'),
            ),
        ),
        array(
            'id' => 'evox_footer_social_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Social', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/footer-social.jpg'
                ),
            ),
            'required' => array(
                array('evox_footer_type_select', 'equals', '1'),
            ),
        ),
        array(
            'id' => 'evox_footer_social_facebook',
            'type' => 'text',
            'title' => esc_html__('Facebook Link', 'evox'),
            'desc' => '',
            'placeholder' => esc_html__('https://www.facebook.com/', 'evox'),
            'required' => array(
                array('evox_footer_type_select', 'equals', '1'),
            ),
        ),
        array(
            'id' => 'evox_footer_social_twitter',
            'type' => 'text',
            'title' => esc_html__('Twitter Link', 'evox'),
            'desc' => '',
            'placeholder' => esc_html__('https://twitter.com/', 'evox'),
            'required' => array(
                array('evox_footer_type_select', 'equals', '1'),
            ),
        ),
        array(
            'id' => 'evox_footer_social_instagram',
            'type' => 'text',
            'title' => esc_html__('Instagram Link', 'evox'),
            'desc' => '',
            'placeholder' => esc_html__('https://www.instagram.com/', 'evox'),
            'required' => array(
                array('evox_footer_type_select', 'equals', '1'),
            ),
        ),
        array(
            'id' => 'evox_footer_social_youtube',
            'type' => 'text',
            'title' => esc_html__('Youtube Link', 'evox'),
            'desc' => '',
            'placeholder' => esc_html__('https://www.youtube.com/', 'evox'),
            'required' => array(
                array('evox_footer_type_select', 'equals', '1'),
            ),
        ),
        array(
            'id' => 'evox_footer_social_vimeo',
            'type' => 'text',
            'title' => esc_html__('Vimeo Link', 'evox'),
            'desc' => '',
            'placeholder' => esc_html__('https://vimeo.com/', 'evox'),
            'required' => array(
                array('evox_footer_type_select', 'equals', '1'),
            ),
        ),
        array(
            'id' => 'evox_footer_social_flickr',
            'type' => 'text',
            'title' => esc_html__('Flickr Link', 'evox'),
            'desc' => '',
            'placeholder' => esc_html__('https://www.flickr.com/', 'evox'),
            'required' => array(
                array('evox_footer_type_select', 'equals', '1'),
            ),
        ),
        array(
            'id' => 'evox_footer_credit_preview',
            'type' => 'image_select',
            'title' => '',
            'subtitle' => '',
            'options' => array(
                '0' => array(
                    'alt' => esc_html__('Logo Branch', 'evox'),
                    'img' => get_template_directory_uri() . '/extension/assets/images/footer-credit.jpg'
                ),
            ),
            'required' => array(
                array('evox_footer_type_select', 'equals', '2'),
            ),
        ),
        array(
            'id' => 'opt-gallerys',
            'type' => 'gallery',
            'title' => __('Add/Edit Gallery', 'redux-framework-demo'),
            'subtitle' => __('Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader', 'redux-framework-demo'),
            'desc' => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
            'required' => array(
                array('evox_footer_type_select', 'equals', '2'),
            ),
        ),

    )
));

// -> END Footer Options

// -> START Breadcrumbs Options

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Theme Color', 'evox'),
    'id' => 'evox_theme_color',
    'desc' => '',
    'customizer_width' => '400px',
    'icon' => 'el el-brush',
    'fields' => array(

        array(
            'id' => 'evox_theme_color_primary',
            'type' => 'color',
            'title' => esc_html__('Color Primary', 'evox'),
            'subtitle' => esc_html__('Pick a color primary for the theme (default: #dc8051).', 'evox'),
            'default' => '#dc8051',
            'validate' => 'color',
        ),

        array(
            'id' => 'evox_theme_color_button_1',
            'type' => 'color',
            'title' => esc_html__('Color Button 1', 'evox'),
            'subtitle' => esc_html__('Pick a color for the button review (default: #bbcd77).', 'evox'),
            'default' => '#bbcd77',
            'validate' => 'color',
        ),

        array(
            'id' => 'evox_theme_color_button_2',
            'type' => 'color',
            'title' => esc_html__('Color Button 2', 'evox'),
            'subtitle' => esc_html__('Pick a color for the button book (default: #e36252).', 'evox'),
            'default' => '#e36252',
            'validate' => 'color',
        ),

        array(
            'id' => 'evox_theme_color_icon',
            'type' => 'color',
            'title' => esc_html__('Color Icon', 'evox'),
            'subtitle' => esc_html__('Pick a color for the icon. Color default: #fdb714 (yellow).', 'evox'),
            'default' => '#fdb714',
            'validate' => 'color',
        ),

        array(
            'id' => 'evox_theme_color_flag',
            'type' => 'color',
            'title' => esc_html__('Color Flag', 'evox'),
            'subtitle' => esc_html__('Pick a color for the flag. Color default: #f7941d (yellow dark).', 'evox'),
            'default' => '#f7941d',
            'validate' => 'color',
        ),
    )
));

// -> END Breadcrumbs Options

// -> START Typography Options

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Typography', 'evox'),
    'id' => 'evox_typography',
    'desc' => esc_html__('Typography all config', 'evox'),
    'customizer_width' => '400px',
    'icon' => 'el el-fontsize'
));

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Typography Style 1', 'evox'),
    'id' => 'evox_typography_style_1',
    'desc' => '',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'evox_typography_style_1_selectors',
            'type' => 'textarea',
            'title' => esc_html__('Selectors', 'evox'),
            'subtitle' => '',
            'desc' => esc_html__('Import selectors. You can import one or multi selector.Example: #selector1,#selector2,.selector3', 'evox'),
            'validate' => 'html_custom',
            'default' => '',
            'allowed_html' => array(
                'a' => array(
                    'href' => array(),
                    'title' => array()
                ),
                'br' => array(),
                'em' => array(),
                'strong' => array()
            )
        ),
        array(
            'id' => 'evox_typography_style_1_style',
            'type' => 'typography',
            'title' => esc_html__('Typography Style', 'evox'),
            'subtitle' => '',
            'google' => true,
            'default' => array(
                'font-size' => '14',
                'font-family' => 'Arial,Helvetica,sans-serif',
                'font-weight' => '400',
                'color' => '#000',
                'google' => true,
                'line-height' => '24',
            ),
            'output' => '',
        ),
    )
));

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Typography Style 2', 'evox'),
    'id' => 'evox_typography_style_2',
    'desc' => '',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'evox_typography_style_2_selectors',
            'type' => 'textarea',
            'title' => esc_html__('Selectors', 'evox'),
            'subtitle' => '',
            'desc' => esc_html__('Import selectors. You can import one or multi selector.Example: #selector1,#selector2,.selector3', 'evox'),
            'validate' => 'html_custom',
            'default' => '',
            'allowed_html' => array(
                'a' => array(
                    'href' => array(),
                    'title' => array()
                ),
                'br' => array(),
                'em' => array(),
                'strong' => array()
            )
        ),
        array(
            'id' => 'evox_typography_style_2_style',
            'type' => 'typography',
            'title' => esc_html__('Typography Style', 'evox'),
            'subtitle' => '',
            'google' => true,
            'default' => array(
                'font-size' => '14',
                'font-family' => 'Arial,Helvetica,sans-serif',
                'font-weight' => 'Normal',
                'color' => '#000',
            ),
            'output' => '',
        ),
    )
));

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Typography Style 3', 'evox'),
    'id' => 'evox_typography_style_3',
    'desc' => esc_html__('', 'evox'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'evox_typography_style_3_selectors',
            'type' => 'textarea',
            'title' => esc_html__('Selectors', 'evox'),
            'subtitle' => '',
            'desc' => esc_html__('Import selectors. You can import one or multi selector.Example: #selector1,#selector2,.selector3', 'evox'),
            'validate' => 'html_custom',
            'default' => '',
            'allowed_html' => array(
                'a' => array(
                    'href' => array(),
                    'title' => array()
                ),
                'br' => array(),
                'em' => array(),
                'strong' => array()
            )
        ),
        array(
            'id' => 'evox_typography_style_3_style',
            'type' => 'typography',
            'title' => esc_html__('Typography Style', 'evox'),
            'subtitle' => '',
            'google' => true,
            'default' => array(
                'font-size' => '14',
                'font-family' => 'Arial,Helvetica,sans-serif',
                'font-weight' => 'Normal',
                'color' => '#000',
            ),
            'output' => '',
        ),
    )
));

// -> END Typography Options

// -> START Blog Options

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Blog', 'evox'),
    'id' => 'evox_blog',
    'desc' => esc_html__('Blog all config', 'evox'),
    'customizer_width' => '400px',
    'icon' => 'el el-bold',
));

//Blog General

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Blog General', 'evox'),
    'id' => 'evox_blog_general',
    'desc' => '',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'evox_blog_general_sidebar',
            'type' => 'image_select',
            'title' => esc_html__('Sidebar Blog', 'evox'),
            'subtitle' => '',
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('None Sidebar', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                ),
                '2' => array(
                    'alt' => esc_html__('Sidebar Left', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                ),
                '3' => array(
                    'alt' => esc_html__('Sidebar Right', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                )
            ),
            'default' => 3,
        ),
        array(
            'id' => 'evox_blog_general_title',
            'type' => 'switch',
            'title' => esc_html__('Blog Title', 'evox'),
            'subtitle' => esc_html__('Show/Hide Blog Title', 'evox'),
            'default' => 1,
        ),
        array(
            'id' => 'evox_blog_general_date',
            'type' => 'switch',
            'title' => esc_html__('Blog Date', 'evox'),
            'subtitle' => esc_html__('Show/Hide Blog Date', 'evox'),
            'default' => 1,
        ),
        array(
            'id' => 'evox_blog_general_author',
            'type' => 'switch',
            'title' => esc_html__('Blog Author', 'evox'),
            'subtitle' => esc_html__('Show/Hide Blog Author', 'evox'),
            'default' => 1,
        ),
        array(
            'id' => 'evox_blog_general_tag',
            'type' => 'switch',
            'title' => esc_html__('Blog Category', 'evox'),
            'subtitle' => esc_html__('Show/Hide Blog Category', 'evox'),
            'default' => 1,
        ),
        array(
            'id' => 'evox_blog_general_cat',
            'type' => 'switch',
            'title' => esc_html__('Blog Category', 'evox'),
            'subtitle' => esc_html__('Show/Hide Blog Category', 'evox'),
            'default' => 1,
        ),
        array(
            'id' => 'evox_blog_general_content',
            'type' => 'switch',
            'title' => esc_html__('Blog Content', 'evox'),
            'subtitle' => esc_html__('Show/Hide Blog Content/Description', 'evox'),
            'default' => 1,
        ),
        array(
            'id' => 'evox_blog_general_pagination',
            'type' => 'switch',
            'title' => esc_html__('Pagination', 'evox'),
            'subtitle' => esc_html__('Show/Hide pagination', 'evox'),
            'default' => 1,
        ),
    )
));

//Blog Single

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Blog Single', 'evox'),
    'id' => 'evox_blog_single',
    'desc' => '',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'evox_blog_single_sidebar',
            'type' => 'image_select',
            'title' => esc_html__('Sidebar', 'evox'),
            'subtitle' => '',
            'options' => array(
                '1' => array(
                    'alt' => esc_html__('None Sidebar', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                ),
                '2' => array(
                    'alt' => esc_html__('Sidebar Left', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                ),
                '3' => array(
                    'alt' => esc_html__('Sidebar Right', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                )
            ),
            'default' => 3,
        ),

        array(
            'id' => 'evox_blog_single_title',
            'type' => 'switch',
            'title' => esc_html__('Title', 'evox'),
            'subtitle' => esc_html__('Show/hide blog title', 'evox'),
            'default' => 1,
        ),

        array(
            'id' => 'evox_blog_single_date',
            'type' => 'switch',
            'title' => esc_html__('Date', 'evox'),
            'subtitle' => esc_html__('Show/Hide Single Date', 'evox'),
            'default' => 1,
        ),
        array(
            'id' => 'evox_blog_single_author',
            'type' => 'switch',
            'title' => esc_html__('Author', 'evox'),
            'subtitle' => esc_html__('Show/Hide Single Author', 'evox'),
            'default' => 1,
        ),
        array(
            'id' => 'evox_blog_single_cat',
            'type' => 'switch',
            'title' => esc_html__('Category', 'evox'),
            'subtitle' => esc_html__('Show/Hide Single Category', 'evox'),
            'default' => 1,
        ),
        array(
            'id' => 'evox_blog_single_tag',
            'type' => 'switch',
            'title' => esc_html__('Tag', 'evox'),
            'subtitle' => esc_html__('Show/Hide Single Tag', 'evox'),
            'default' => 1,
        ),
        array(
            'id' => 'evox_blog_single_share',
            'type' => 'switch',
            'title' => esc_html__('Share', 'evox'),
            'subtitle' => esc_html__('Show/Hide Single Share', 'evox'),
            'default' => 1,
        ),
        array(
            'id' => 'evox_blog_single_related',
            'type' => 'switch',
            'title' => esc_html__('Related', 'evox'),
            'subtitle' => esc_html__('Show/Hide Single Related', 'evox'),
            'default' => 1,
        ),
    )
));

// -> END Blog Options

// -> START Booking Options

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Booking Options', 'evox'),
    'id' => 'evox_booking',
    'desc' => '',
    'customizer_width' => '400px',
    'icon' => 'el el-address-book',
    'fields' => array(

        array(
            'id' => 'evox_woocommerce_integration',
            'type' => 'switch',
            'title' => esc_html__('Woocommerce Integration', 'evox'),
            'description' => esc_html__('If enable this option, you can use all WooCommerce features including Payment Gateways, Cart and Checkout system.', 'evox'),
            'default' => false
        ),
        array(
            'id' => 'evox_currency_options',
            'type' => 'select',
            'title' => esc_html__('Currency Options', 'evox'),
            'options' => array(
                'ALL' => esc_html__('Albanian Lek (L)', 'evox'),
                'DZD' => esc_html__('Algerian Dinar (د.ج)', 'evox'),
                'AFN' => esc_html__('Afghan Afghani (؋)', 'evox'),
                'ARS' => esc_html__('Argentine Peso ($)', 'evox'),
                'AUD' => esc_html__('Australian Dollar ($)', 'evox'),
                'AZN' => esc_html__('Azerbaijani Manat (AZN)', 'evox'),
                'BSD' => esc_html__('Bahamian Dollar ($)', 'evox'),
                'BHD' => esc_html__('Bahraini Dinar (.د.ب)', 'evox'),
                'BBD' => esc_html__('Barbadian Dollar ($)', 'evox'),
                'BDT' => esc_html__('Bangladeshi taka (৳ )', 'evox'),
                'BYR' => esc_html__('Belarusian Ruble (Br)', 'evox'),
                'BZD' => esc_html__('Belize Dollar ($)', 'evox'),
                'BMD' => esc_html__('Bermudian Dollar ($)', 'evox'),
                'BOB' => esc_html__('Bolivian Boliviano (Bs.)', 'evox'),
                'BAM' => esc_html__('Bosnia and Herzegovina Convertible Mark (KM)', 'evox'),
                'BWP' => esc_html__('Botswana Pula (P)', 'evox'),
                'BGN' => esc_html__('Bulgarian Lev (лв.)', 'evox'),
                'BRL' => esc_html__('Brazilian Real (R$)', 'evox'),
                'GBP' => esc_html__('British Pound (£)', 'evox'),
                'BND' => esc_html__('Brunei Dollar ($)', 'evox'),
                'KHR' => esc_html__('Cambodian Riel (៛)', 'evox'),
                'CAD' => esc_html__('Canadian dollar ($)', 'evox'),
                'KYD' => esc_html__('Cayman Islands Dollar ($)', 'evox'),
                'CLP' => esc_html__('Chilean Peso ($)', 'evox'),
                'CNY' => esc_html__('Chinese Yuan (¥)', 'evox'),
                'COP' => esc_html__('Colombian Peso ($)', 'evox'),
                'CRC' => esc_html__('Costa Rican colón (₡)', 'evox'),
                'HRK' => esc_html__('Croatian Kuna (Kn)', 'evox'),
                'CUP' => esc_html__('Cuban Peso ($)', 'evox'),
                'CZK' => esc_html__('Czech Koruna (Kč)', 'evox'),
                'DOP' => esc_html__('Dominican Peso (RD$)', 'evox'),
                'XCD' => esc_html__('East Caribbean Dollar ($)', 'evox'),
                'EGP' => esc_html__('Egyptian Pound (EGP)', 'evox'),
                'EUR' => esc_html__('Euro Member Countries (€)', 'evox'),
                'FKP' => esc_html__('Falkland Islands Pound (£)', 'evox'),
                'FJD' => esc_html__('Fijian Dollar ($)', 'evox'),
                'GHC' => esc_html__('Ghana Cedi (₵)', 'evox'),
                'GIP' => esc_html__('Gibraltar Pound (£)', 'evox'),
                'GTQ' => esc_html__('Guatemalan Quetzal (Q)', 'evox'),
                'GGP' => esc_html__('Guernsey Pound (£)', 'evox'),
                'GYD' => esc_html__('Guyanese Dollar ($)', 'evox'),
                'GEL' => esc_html__('Georgian Lari (ლ)', 'evox'),
                'HNL' => esc_html__('Honduran Lempira (L)', 'evox'),
                'HKD' => esc_html__('Hong Kong Dollar ($)', 'evox'),
                'HUF' => esc_html__('Hungarian Forint (Ft)', 'evox'),
                'ISK' => esc_html__('Icelandic Fróna (kr.)', 'evox'),
                'INR' => esc_html__('Indian Rupee (₹)', 'evox'),
                'IDR' => esc_html__('Indonesian Rupiah (Rp)', 'evox'),
                'IRR' => esc_html__('Iranian Rial (﷼)', 'evox'),
                'ILS' => esc_html__('Israeli New Shekel (₪)', 'evox'),
                'JMD' => esc_html__('Jamaican Dollar ($)', 'evox'),
                'JPY' => esc_html__('Japanese Yen (¥)', 'evox'),
                'JEP' => esc_html__('Jersey Pound (£)', 'evox'),
                'KZT' => esc_html__('Kazakhstani tenge (KZT)', 'evox'),
                'KPW' => esc_html__('North Korean won (₩)', 'evox'),
                'KRW' => esc_html__('South Korean won (₩)', 'evox'),
                'KGS' => esc_html__('Kyrgyzstani som (сом)', 'evox'),
                'KES' => esc_html__('Kenyan shilling (KSh)', 'evox'),
                'LAK' => esc_html__('Lao kip (₭)', 'evox'),
                'LBP' => esc_html__('Lebanese pound (ل.ل)', 'evox'),
                'LRD' => esc_html__('Liberian dollar ($)', 'evox'),
                'MKD' => esc_html__('Macedonian denar (ден)', 'evox'),
                'MYR' => esc_html__('Malaysian ringgit (RM)', 'evox'),
                'MUR' => esc_html__('Mauritian rupee (₨)', 'evox'),
                'MXN' => esc_html__('Mexican peso ($)', 'evox'),
                'MNT' => esc_html__('Mongolian tögrög (₮)', 'evox'),
                'MAD' => esc_html__('Moroccan dirham (د.م.)', 'evox'),
                'MZN' => esc_html__('Mozambican metical (MT)', 'evox'),
                'NAD' => esc_html__('Namibian dollar ($)', 'evox'),
                'NPR' => esc_html__('Nepalese rupee (₨)', 'evox'),
                'ANG' => esc_html__('Netherlands Antillean guilder (ƒ)', 'evox'),
                'NZD' => esc_html__('New Zealand dollar ($)', 'evox'),
                'NIO' => esc_html__('Nicaraguan córdoba (C$)', 'evox'),
                'NGN' => esc_html__('Nigerian naira (₦)', 'evox'),
                'NOK' => esc_html__('Norwegian krone (kr)', 'evox'),
                'OMR' => esc_html__('Omani rial (ر.ع.)', 'evox'),
                'PKR' => esc_html__('Pakistani rupee (₨)', 'evox'),
                'PAB' => esc_html__('Panamanian balboa (B/.)', 'evox'),
                'PYG' => esc_html__('Paraguayan guaraní (₲)', 'evox'),
                'PEN' => esc_html__('Peruvian nuevo sol (S/.)', 'evox'),
                'PHP' => esc_html__('Philippine peso (₱)', 'evox'),
                'PLN' => esc_html__('Polish złoty (zł)', 'evox'),
                'QAR' => esc_html__('Qatari riyal (ر.ق)', 'evox'),
                'RON' => esc_html__('Romanian leu (lei)', 'evox'),
                'RUB' => esc_html__('Russian ruble (₽)', 'evox'),
                'SHP' => esc_html__('Saint Helena pound (£)', 'evox'),
                'SAR' => esc_html__('Saudi riyal (ر.س)', 'evox'),
                'RSD' => esc_html__('Serbian dinar (дин.)', 'evox'),
                'SCR' => esc_html__('Seychellois rupee (₨)', 'evox'),
                'SGD' => esc_html__('Singapore dollar ($)', 'evox'),
                'SBD' => esc_html__('Solomon Islands dollar ($)', 'evox'),
                'SOS' => esc_html__('Somali shilling (Sh)', 'evox'),
                'ZAR' => esc_html__('South African rand (R)', 'evox'),
                'LKR' => esc_html__('Sri Lankan rupee (රු)', 'evox'),
                'SEK' => esc_html__('Swedish krona (kr)', 'evox'),
                'CHF' => esc_html__('Swiss franc (CHF)', 'evox'),
                'SRD' => esc_html__('Surinamese dollar ($)', 'evox'),
                'SYP' => esc_html__('Syrian pound (ل.س)', 'evox'),
                'TWD' => esc_html__('New Taiwan dollar (NT$)', 'evox'),
                'THB' => esc_html__('Thai baht (฿)', 'evox'),
                'TTD' => esc_html__('Trinidad and Tobago dollar ($)', 'evox'),
                'TRL' => esc_html__('Turkish lira (₺)', 'evox'),
                'UAH' => esc_html__('Ukrainian hryvnia (₴)', 'evox'),
                'AED' => esc_html__('United Arab Emirates dirham (د.إ)', 'evox'),
                'USD' => esc_html__('United States dollar ($)', 'evox'),
                'UYU' => esc_html__('Uruguayan peso ($)', 'evox'),
                'UZS' => esc_html__('Uzbekistani som (UZS)', 'evox'),
                'VEF' => esc_html__('Venezuelan bolívar (Bs F)', 'evox'),
                'VND' => esc_html__('Vietnamese đồng (₫)', 'evox'),
                'YER' => esc_html__('Yemeni rial (﷼)', 'evox'),
            ),
            'default' => esc_html__('USD', 'evox'),
            'required' => array('evox_woocommerce_integration', '=', false),
        ),
        array(
            'id' => 'evox_currency_symbol_position',
            'type' => 'select',
            'title' => esc_html__('Currency Symbol Position', 'evox'),
            'subtitle' => esc_html__("Select a Curency Symbol Position for Frontend", 'evox'),
            'desc' => '',
            'options' => array(
                'left' => esc_html__('Left ($99.99)', 'evox'),
                'right' => esc_html__('Right (99.99$)', 'evox'),
                'left_space' => esc_html__('Left with space ($ 99.99)', 'evox'),
                'right_space' => esc_html__('Right with space (99.99 $)', 'evox')
            ),
            'required' => array('evox_woocommerce_integration', '=', false),
            'default' => 'left'
        ),
        array(
            'id' => 'evox_currency_decimal_prec',
            'type' => 'select',
            'title' => esc_html__('Decimal Precision', 'evox'),
            'subtitle' => esc_html__('Please choose desimal precision', 'evox'),
            'desc' => '',
            'required' => array('evox_woocommerce_integration', '=', false),
            'options' => array(
                '0' => '0',
                '1' => '1',
                '2' => '2',
                '3' => '3',
            ),
            'default' => '2'
        ),
        array(
            'id' => 'evox_currency_thousands_sep',
            'type' => 'text',
            'title' => esc_html__('Thousand Separate', 'evox'),
            'subtitle' => esc_html__('This sets the thousand separator of displayed prices.', 'evox'),
            'default' => ',',
            'required' => array('evox_woocommerce_integration', '=', false),
        ),
        array(
            'id' => 'evox_currency_decimal_sep',
            'type' => 'text',
            'title' => esc_html__('Decimal Separate', 'evox'),
            'subtitle' => esc_html__('This sets the decimal separator of displayed prices.', 'evox'),
            'default' => '.',
            'required' => array('evox_woocommerce_integration', '=', false),
        ),
    )
));

// -> END Booking Options

// -> START Payment Options

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Payment', 'evox'),
    'id' => 'evox_payment',
    'desc' => '',
    'customizer_width' => '400px',
    'icon' => 'el el-credit-card',
    'fields' => array(

        array(
            'id' => 'evox_payment_in_cash',
            'type' => 'switch',
            'title' => esc_html__('Payment In Cash', 'evox'),
            'subtitle' => esc_html__('Enable payment in cash at company.', 'evox'),
            'default' => false
        ),

        array(
            'id' => 'evox_pay_paypal',
            'type' => 'switch',
            'title' => esc_html__('PayPal Integration', 'evox'),
            'subtitle' => esc_html__('Enable payment through PayPal in booking step.', 'evox'),
            'default' => false
        ),

        array(
            'id' => 'evox_credit_card',
            'type' => 'switch',
            'title' => esc_html__('Credit Card Payment', 'evox'),
            'subtitle' => esc_html__('Enable Credit Card payment through PayPal in booking step. Please note your paypal account should be business pro.', 'evox'),
            'default' => false,
            'required' => array('evox_pay_paypal', '=', true)
        ),

        array(
            'title' => esc_html__('Sandbox Mode', 'evox'),
            'subtitle' => esc_html__('Enable PayPal sandbox for testing.', 'evox'),
            'id' => 'evox_paypal_sandbox',
            'default' => false,
            'required' => array('evox_pay_paypal', '=', true),
            'type' => 'switch'),

        array(
            'title' => esc_html__('PayPal API Username', 'evox'),
            'subtitle' => esc_html__('Your PayPal Account API Username.', 'evox'),
            'id' => 'evox_paypal_api_username',
            'default' => '',
            'required' => array('evox_pay_paypal', '=', true),
            'type' => 'text'),

        array(
            'title' => esc_html__('PayPal API Password', 'evox'),
            'subtitle' => esc_html__('Your PayPal Account API Password.', 'evox'),
            'id' => 'evox_paypal_api_password',
            'default' => '',
            'required' => array('evox_pay_paypal', '=', true),
            'type' => 'text'),

        array(
            'title' => esc_html__('PayPal API Signature', 'evox'),
            'subtitle' => esc_html__('Your PayPal Account API Signature.', 'evox'),
            'id' => 'evox_paypal_api_signature',
            'default' => '',
            'required' => array('evox_pay_paypal', '=', true),
            'type' => 'text'),
    )
));

// -> END Payment Options

// -> START Email Confirm Options

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Email confirm', 'evox'),
    'id' => 'evox_email_confirm',
    'desc' => '',
    'customizer_width' => '400px',
    'icon' => 'el el-envelope',
));

//Email confirm send to customer

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Email Customer', 'evox'),
    'id' => 'evox_email_confirm_customer',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Subject', 'evox'),
            'subtitle' => esc_html__('Subject of email confirm send to customer.', 'evox'),
            'id' => 'evox_email_confirm_subject_customer',
            'default' => '',
            'type' => 'text'
        ),

        array(
            'title' => esc_html__('Content', 'evox'),
            'subtitle' => esc_html__('Content of email confirm send to customer.', 'evox'),
            'id' => 'evox_email_confirm_description_customer',
            'default' => '',
            'type' => 'editor'
        ),

        array(
            'title' => esc_html__('Order and Billing address option', 'evox'),
            'subtitle' => 'For email to customer',
            'id' => 'evox_email_confirm_customer_order_and_billing',
            'default' => true,
            'type' => 'switch'
        ),

        array(
            'id' => 'evox_email_confirm_customer_order_billing_position',
            'type' => 'select',
            'title' => esc_html__(' Position of Order and Billing Adress', 'evox'),
            'subtitle' => '',
            'default' => 'after',
            'options' => array(
                'after' => esc_html__('After Content', 'evox'),
                'before' => esc_html__('Before Content', 'evox'),
            ),
            'required' => array('evox_email_confirm_customer_order_and_billing', '=', true),
        ),
    ),
));

//Email confirm send to customer

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Email Admin', 'evox'),
    'id' => 'evox_email_confirm_admin',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Email option', 'evox'),
            'subtitle' => '',
            'id' => 'evox_email_confirm_to_admin',
            'default' => false,
            'type' => 'switch'
        ),

        array(
            'title' => esc_html__('Subject', 'evox'),
            'subtitle' => esc_html__('Subject of email confirm send to Admin.', 'evox'),
            'id' => 'evox_email_confirm_subject_admin',
            'default' => '',
            'type' => 'text',
            'required' => array('evox_email_confirm_to_admin', '=', true),
        ),

        array(
            'title' => esc_html__('Content', 'evox'),
            'subtitle' => esc_html__('Content of email confirm send to Admin.', 'evox'),
            'id' => 'evox_email_confirm_description_admin',
            'default' => '',
            'type' => 'editor',
            'required' => array('evox_email_confirm_to_admin', '=', true),
        ),

        array(
            'title' => esc_html__('Order and Billing address option', 'evox'),
            'subtitle' => 'For email to admin',
            'id' => 'evox_email_confirm_admin_order_and_billing',
            'default' => true,
            'type' => 'switch'
        ),

        array(
            'id' => 'evox_email_confirm_admin_order_billing_position',
            'type' => 'select',
            'title' => esc_html__(' Position of Order and Billing Adress', 'evox'),
            'subtitle' => '',
            'default' => 'after',
            'options' => array(
                'after' => esc_html__('After Content', 'evox'),
                'before' => esc_html__('Before Content', 'evox'),
            ),
            'required' => array('evox_email_confirm_admin_order_and_billing', '=', true),
        ),
    ),
));

// -> END Email Confirm Options

// -> START Tour Detail Options

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Tour Setting', 'evox'),
    'id' => 'evox_tour',
    'desc' => esc_html__('Tour all config', 'evox'),
    'customizer_width' => '400px',
    'icon' => 'el el-flag',
));

//Blog General

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('General', 'evox'),
    'id' => 'evox_tour_page_setting',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'tour_cart_page',
            'type' => 'select',
            'title' => esc_html__('Tour Cart Page', 'evox'),
            'subtitle' => esc_html__('This sets the base page of your tour booking. Please add [tour_cart] shortcode in the page content.', 'evox'),
            'data' => 'pages',
            'args' => array(
                'sort_order' => esc_html__('asc', 'evox'),
                'sort_column' => esc_html__('post_title', 'evox'),
            ),
        ),
        array(
            'id' => 'tour_checkout_page',
            'type' => 'select',
            'title' => esc_html__('Tour Checkout Page', 'evox'),
            'subtitle' => esc_html__('This sets the tour Checkout Page. Please add [tour_checkout] shortcode in the page content.', 'evox'),
            'data' => 'pages',
            'args' => array(
                'sort_order' => esc_html__('asc', 'evox'),
                'sort_column' => esc_html__('post_title', 'evox'),
            ),
        ),
        array(
            'id' => 'tour_thankyou_page',
            'type' => 'select',
            'title' => esc_html__('Tour Booking Confirmation Page', 'evox'),
            'subtitle' => esc_html__('This sets the tour booking confirmation Page. Please add [tour_confirm] shortcode in the page content.', 'evox'),
            'data' => 'pages',
            'args' => array(
                'sort_order' => esc_html__('asc', 'evox'),
                'sort_column' => esc_html__('post_title', 'evox'),
            ),
        ),
        array(
            'id' => 'tour_thankyou_text_1',
            'type' => 'text',
            'title' => esc_html__('Tour Booking Confirmation Text', 'evox'),
            'subtitle' => esc_html__('This sets confirmation text1.', 'evox'),
            'default' => esc_html__('Lorem ipsum dolor sit amet, nostrud nominati vis ex, essent conceptam eam ad. Cu etiam comprehensam nec. Cibo delicata mei an, eum porro legere no. Te usu decore omnium, quem brute vis at, ius esse officiis legendos cu. Dicunt voluptatum at cum. Vel et facete equidem deterruisset, mei graeco cetero labores et. Accusamus inciderint eu mea.', 'evox'),
        ),
        array(
            'id' => 'tour_wishlist_page',
            'type' => 'select',
            'title' => esc_html__('Wishlist Page', 'evox'),
            'subtitle' => '',
            'data' => 'pages',
            'args' => array(
                'sort_order' => esc_html__('asc', 'evox'),
                'sort_column' => esc_html__('post_title', 'evox'),
            ),
        ),
    ),
));

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Contact', 'evox'),
    'id' => 'evox_tour_detail_contact',
    'desc' => esc_html__('', 'evox'),
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'evox_tour_detail_contact_option',
            'type' => 'button_set',
            'title' => esc_html__('Display Option', 'evox'),
            'subtitle' => esc_html__('Controls the site layout.', 'evox'),
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '2' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1'
        ),
        array(
            'id' => 'evox_tour_detail_contact_description',
            'type' => 'editor',
            'title' => esc_html__('Description', 'evox'),
            'default' => false,
            'required' => array('evox_tour_detail_contact_option', '=', '1'),
        ),
        array(
            'id' => 'evox_tour_detail_contact_form',
            'type' => 'select',
            'title' => esc_html__('Select Form Contact', 'evox'),
            'data' => 'posts',
            'args' => array(
                'post_type' => 'wpcf7_contact_form',
                'posts_per_page' => -1,
                'orderby' => 'title',
                'order' => 'ASC',
            ),
            'required' => array('evox_tour_detail_contact_option', '=', '1'),
        )
    )
));

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Tour Detail', 'evox'),
    'id' => 'evox_tour_detail',
    'desc' => '',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'evox_tour_detail_booking_sidebar',
            'type' => 'image_select',
            'title' => esc_html__('Select Booking Sidebar', 'evox'),
            'default' => 'right',
            'options' => array(
                'none' => array(
                    'alt' => esc_html__('None', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                ),
                'left' => array(
                    'alt' => esc_html__('Left', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                ),
                'right' => array(
                    'alt' => esc_html__('Right', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                )
            )
        ),

        array(
            'id' => 'evox_tour_detail_booking_head',
            'type' => 'button_set',
            'title' => esc_html__('Booking Head', 'evox'),
            'subtitle' => '',
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '2' => esc_html__('Hide', 'evox'),
            ),
            'required' => array('evox_tour_detail_booking_sidebar', '=', array('right', 'left')),
            'default' => '1'
        ),
        array(
            'id' => 'evox_tour_detail_slider',
            'type' => 'select',
            'title' => esc_html__('Select slider', 'evox'),
            'subtitle' => esc_html__('', 'evox'),
            'default' => 'flexslider',
            'options' => array(
                'flexslider' => esc_html__('FlexSlider', 'evox'),
                'owl' => esc_html__('Owl Carousel', 'evox'),
            ),
        ),

        array(
            'id' => 'evox_tour_detail_phone',
            'type' => 'text',
            'title' => esc_html__('Call Center', 'evox'),
            'subtitle' => esc_html__('Telephone number', 'evox'),
            'default' => '',
            'required' => array('evox_tour_detail_booking_head', '=', '1'),
        ),

        array(
            'id' => 'evox_tour_detail_price_box',
            'type' => 'button_set',
            'title' => esc_html__('Price Box', 'evox'),
            'subtitle' => '',
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '2' => esc_html__('Hide', 'evox'),
            ),
            'required' => array('evox_tour_detail_booking_head', '=', '1'),
            'default' => '1'
        ),

        array(
            'id' => 'evox_tour_detail_form_booking',
            'type' => 'button_set',
            'title' => esc_html__('Booking Form', 'evox'),
            'subtitle' => '',
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '2' => esc_html__('Hide', 'evox'),
            ),
            'required' => array('evox_tour_detail_booking_sidebar', '=', array('right', 'left')),
            'default' => '1'
        ),

        array(
            'id' => 'evox_tour_detail_first_name',
            'type' => 'button_set',
            'title' => esc_html__('First Name', 'evox'),
            'subtitle' => '',
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '2' => esc_html__('Hide', 'evox'),
            ),
            'required' => array('evox_tour_detail_form_booking', '=', '1'),
            'default' => '1'
        ),
        array(
            'id' => 'evox_tour_detail_first_name_label',
            'type' => 'text',
            'title' => esc_html__('First Name Label', 'evox'),
            'default' => esc_html__('First Name', 'evox'),
            'required' => array('evox_tour_detail_first_name', '=', array('1')),
        ),
        array(
            'id' => 'evox_tour_detail_last_name',
            'type' => 'button_set',
            'title' => esc_html__('Last Name', 'evox'),
            'subtitle' => '',
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '2' => esc_html__('Hide', 'evox'),
            ),
            'required' => array('evox_tour_detail_form_booking', '=', '1'),
            'default' => '1'
        ),
        array(
            'id' => 'evox_tour_detail_last_name_label',
            'type' => 'text',
            'title' => esc_html__('Last Name Label', 'evox'),
            'default' => esc_html__('Last Name', 'evox'),
            'required' => array('evox_tour_detail_last_name', '=', array('1')),
        ),
        array(
            'id' => 'evox_tour_detail_email',
            'type' => 'button_set',
            'title' => esc_html__('Email', 'evox'),
            'subtitle' => '',
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '2' => esc_html__('Hide', 'evox'),
            ),
            'required' => array('evox_tour_detail_form_booking', '=', '1'),
            'default' => '1'
        ),
        array(
            'id' => 'evox_tour_detail_email_label',
            'type' => 'text',
            'title' => esc_html__('Email Label', 'evox'),
            'default' => esc_html__('Email', 'evox'),
            'required' => array('evox_tour_detail_email', '=', array('1')),
        ),
        array(
            'id' => 'evox_tour_detail_field_phone',
            'type' => 'button_set',
            'title' => esc_html__('Phone', 'evox'),
            'subtitle' => '',
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '2' => esc_html__('Hide', 'evox'),
            ),
            'required' => array('evox_tour_detail_form_booking', '=', '1'),
            'default' => '1'
        ),
        array(
            'id' => 'evox_tour_detail_field_phone_label',
            'type' => 'text',
            'title' => esc_html__('Phone Label', 'evox'),
            'default' => esc_html__('Phone', 'evox'),
            'required' => array('evox_tour_detail_field_phone', '=', array('1')),
        ),
        array(
            'id' => 'evox_tour_detail_field_time',
            'type' => 'button_set',
            'title' => esc_html__('Departure Time', 'evox'),
            'subtitle' => '',
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '2' => esc_html__('Hide', 'evox'),
            ),
            'required' => array('evox_tour_detail_form_booking', '=', '1'),
            'default' => '1'
        ),

        array(
            'id' => 'evox_tour_detail_departure_time_label',
            'type' => 'text',
            'title' => esc_html__('Departure Time Label', 'evox'),
            'default' => esc_html__('Departure Time', 'evox'),
            'required' => array('evox_tour_detail_field_time', '=', array('1')),
        ),

        array(
            'id' => 'evox_tour_detail_departure_label',
            'type' => 'text',
            'title' => esc_html__('Departure Date Label', 'evox'),
            'default' => esc_html__('Departure Date', 'evox'),
            'required' => array('evox_tour_detail_form_booking', '=', '1'),
        ),

        array(
            'id' => 'evox_tour_detail_adults_label',
            'type' => 'text',
            'title' => esc_html__('Adults Label', 'evox'),
            'default' => esc_html__('Adults', 'evox'),
            'required' => array('evox_tour_detail_form_booking', '=', '1'),
        ),
        array(
            'id' => 'evox_tour_detail_max_adults',
            'type' => 'text',
            'title' => esc_html__('Max Adults', 'evox'),
            'subtitle' => esc_html__('Number is accepted here, not text', 'evox'),
            'validate' => 'numeric',
            'default' => '5',
            'required' => array('evox_tour_detail_form_booking', '=', '1'),
        ),
        array(
            'id' => 'evox_tour_detail_children_label',
            'type' => 'text',
            'title' => esc_html__('Children Label', 'evox'),
            'default' => esc_html__('Children', 'evox'),
            'required' => array('evox_tour_detail_form_booking', '=', '1'),
        ),
        array(
            'id' => 'evox_tour_detail_max_kids',
            'type' => 'text',
            'title' => esc_html__('Max Kids', 'evox'),
            'subtitle' => esc_html__('Number is accepted here, not text', 'evox'),
            'validate' => 'numeric',
            'default' => '2',
            'required' => array('evox_tour_detail_form_booking', '=', '1'),
        ),
        array(
            'id' => 'evox_tour_detail_button_text',
            'type' => 'text',
            'title' => esc_html__('Button Booking Text', 'evox'),
            'default' => esc_html__('Booking Now', 'evox'),
            'required' => array('evox_tour_detail_form_booking', '=', '1'),
        ),
        array(
            'id' => 'evox_tour_detail_itinerary_option',
            'type' => 'button_set',
            'title' => esc_html__('Itinerary Tab', 'evox'),
            'subtitle' => '',
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '2' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1'
        ),
        array(
            'id' => 'evox_tour_detail_location_option',
            'type' => 'button_set',
            'title' => esc_html__('Location Tab', 'evox'),
            'subtitle' => '',
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '2' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1'
        ),
        array(
            'id' => 'evox_tour_detail_reviews_option',
            'type' => 'button_set',
            'title' => esc_html__('Reviews Tab', 'evox'),
            'subtitle' => '',
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '2' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1'
        ),
        array(
            'id' => 'evox_tour_detail_other_option',
            'type' => 'button_set',
            'title' => esc_html__('Tour Other', 'evox'),
            'subtitle' => '',
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '2' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1'
        )
    )
));

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('List & Grid', 'evox'),
    'id' => 'evox_tour_archive',
    'desc' => '',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'evox_tour_archive_title_trim_words',
            'type' => 'text',
            'title' => esc_html__('Title Trim Words', 'evox'),
            'subtitle' => esc_html__('Limited number words of title.Full title if leave it blank.The value is number', 'evox'),
            'default' => ''
        ),
        array(
            'id' => 'evox_tour_archive_sort',
            'type' => 'checkbox',
            'title' => esc_html__('Sort Option', 'evox'),
            'options' => array(
                'name' => esc_html__('Name', 'evox'),
                'price' => esc_html__('Price', 'evox'),
                'rating' => esc_html__('Rating', 'evox'),
                'popularity' => esc_html__('Popularity', 'evox')
            ),
            'default' => array(
                'name' => '1',
                'price' => '1',
                'rating' => '1',
                'popularity' => '1'
            )
        ),
        array(
            'id' => 'evox_tour_archive_limit',
            'type' => 'spinner',
            'title' => esc_html__('Limit Tour Per Page', 'evox'),
            'subtitle' => '',
            'default' => '12',
            'min' => '5',
            'step' => '1',
            'max' => '100',
            'required' => array('evox_tour_archive_list_grid_type', '=', array('list-grid', 'grid'))
        ),
        array(
            'id' => 'evox_tour_archive_list_grid_type',
            'type' => 'select',
            'title' => esc_html__('Content Type', 'evox'),
            'subtitle' => '',
            'default' => 'list-grid',
            'options' => array(
                'list-grid' => esc_html__('List & Grid', 'evox'),
                'list' => esc_html__('Only List', 'evox'),
                'grid' => esc_html__('Only Grid', 'evox'),
            )
        ),
        array(
            'id' => 'evox_grid_desk_column',
            'type' => 'spinner',
            'title' => esc_html__('Grid Desktop Column', 'evox'),
            'subtitle' => esc_html__('Number of column on desktop (width > 1200px) ', 'evox'),
            'default' => '3',
            'min' => '2',
            'step' => '1',
            'max' => '12',
            'required' => array('evox_tour_archive_list_grid_type', '=', array('list-grid', 'grid'))
        ),
        array(
            'id' => 'evox_grid_tablet_column',
            'type' => 'spinner',
            'title' => esc_html__('Grid Tablet Column', 'evox'),
            'subtitle' => esc_html__('Number of column on tablet (width > 1200px) ', 'evox'),
            'default' => '2',
            'min' => '1',
            'step' => '1',
            'max' => '12',
            'required' => array('evox_tour_archive_list_grid_type', '=', array('list-grid', 'grid'))
        ),
        array(
            'id' => 'evox_grid_mobilelandscape_column',
            'type' => 'spinner',
            'title' => esc_html__('Grid Mobile Landscape Column', 'evox'),
            'subtitle' => esc_html__('Number of column on mobile landscape (480px < width < 768px) ', 'evox'),
            'default' => '1',
            'min' => '1',
            'step' => '1',
            'max' => '12',
            'required' => array('evox_tour_archive_list_grid_type', '=', array('list-grid', 'grid'))
        ),
        array(
            'id' => 'evox_grid_mobile_column',
            'type' => 'spinner',
            'title' => esc_html__('Grid Mobile Column', 'evox'),
            'subtitle' => esc_html__('Number of column on mobile (width < 480px) ', 'evox'),
            'default' => '1',
            'min' => '1',
            'step' => '1',
            'max' => '12',
            'required' => array('evox_tour_archive_list_grid_type', '=', array('list-grid', 'grid'))
        ),
        array(
            'id' => 'evox_filter_sidebar',
            'type' => 'image_select',
            'title' => esc_html__('Sidebar Filter', 'evox'),
            'subtitle' => '',
            'default' => 'right',
            'options' => array(
                'none' => array(
                    'alt' => esc_html__('None', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                ),
                'left' => array(
                    'alt' => esc_html__('Left', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                ),
                'right' => array(
                    'alt' => esc_html__('Right', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                )
            )
        ),
        array(
            'id' => 'evox_filter_sidebar_results',
            'type' => 'button_set',
            'title' => esc_html__('Filter Results', 'evox'),
            'subtitle' => '',
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '0' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1',
            'required' => array('evox_filter_sidebar', '=', array('left', 'right'))
        ),
        array(
            'id' => 'evox_filter_sidebar_price',
            'type' => 'button_set',
            'title' => esc_html__('Filter Price', 'evox'),
            'subtitle' => '',
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '0' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1',
            'required' => array('evox_filter_sidebar', '=', array('left', 'right'))
        ),
        array(
            'id' => 'evox_filter_sidebar_title_price',
            'type' => 'text',
            'title' => esc_html__('Filter Price Title', 'evox'),
            'subtitle' => '',
            'default' => esc_html__('Price', 'evox'),
            'required' => array('evox_filter_sidebar_price', '=', '1')
        ),

        array(
            'id' => 'evox_filter_sidebar_min_price',
            'type' => 'text',
            'title' => esc_html__('Filter Min Price', 'evox'),
            'subtitle' => '',
            'validate' => 'numeric',
            'default' => '0',
            'required' => array('evox_filter_sidebar_price', '=', '1')
        ),

        array(
            'id' => 'evox_filter_sidebar_max_price',
            'type' => 'text',
            'title' => esc_html__('Filter Max Price', 'evox'),
            'subtitle' => '',
            'validate' => 'numeric',
            'default' => '10000',
            'required' => array('evox_filter_sidebar_price', '=', '1')
        ),

        array(
            'id' => 'evox_filter_sidebar_rating',
            'type' => 'button_set',
            'title' => esc_html__('Filter User Rating', 'evox'),
            'subtitle' => '',
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '0' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1',
            'required' => array('evox_filter_sidebar', '=', array('left', 'right'))
        ),
        array(
            'id' => 'evox_filter_sidebar_title_rating',
            'type' => 'text',
            'title' => esc_html__('Filter Rating Title', 'evox'),
            'subtitle' => '',
            'default' => esc_html__('User Rating', 'evox'),
            'required' => array('evox_filter_sidebar_rating', '=', '1')
        ),
        array(
            'id' => 'evox_filter_sidebar_categories',
            'type' => 'button_set',
            'title' => esc_html__('Filter Tour Categories', 'evox'),
            'subtitle' => esc_html__('Categories tour here, not listed  categories with 0 tour', 'evox'),
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '0' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1',
            'required' => array('evox_filter_sidebar', '=', array('left', 'right'))
        ),
        array(
            'id' => 'evox_filter_sidebar_title_categories',
            'type' => 'text',
            'title' => esc_html__('Filter Categories Title', 'evox'),
            'subtitle' => '',
            'default' => esc_html__('Tour Categories', 'evox'),
            'required' => array('evox_filter_sidebar_categories', '=', '1')
        ),
        array(
            'id' => 'evox_filter_sidebar_destinations',
            'type' => 'button_set',
            'title' => esc_html__('Filter Tour Destinations', 'evox'),
            'subtitle' => esc_html__('Destinations tour here, not listed  categories with 0 tour', 'evox'),
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '0' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1',
            'required' => array('evox_filter_sidebar', '=', array('left', 'right'))
        ),
        array(
            'id' => 'evox_filter_sidebar_title_destinations',
            'type' => 'text',
            'title' => esc_html__('Filter Destinations Title', 'evox'),
            'subtitle' => esc_html__('', 'evox'),
            'default' => esc_html__('Tour Destinations', 'evox'),
            'required' => array('evox_filter_sidebar_destinations', '=', '1')
        ),
        array(
            'id' => 'evox_filter_sidebar_language',
            'type' => 'button_set',
            'title' => esc_html__('Filter Tour Language', 'evox'),
            'subtitle' => esc_html__('Language tour here, not listed  categories with 0 tour', 'evox'),
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '0' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1',
            'required' => array('evox_filter_sidebar', '=', array('left', 'right'))
        ),
        array(
            'id' => 'evox_filter_sidebar_title_language',
            'type' => 'text',
            'title' => esc_html__('Filter Language Title', 'evox'),
            'subtitle' => '',
            'default' => esc_html__('Host Language', 'evox'),
            'required' => array('evox_filter_sidebar_language', '=', '1')
        ),
        array(
            'id' => 'evox_filter_sidebar_search',
            'type' => 'button_set',
            'title' => esc_html__('Filter Search Form', 'evox'),
            'subtitle' => '',
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '0' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1',
            'required' => array('evox_filter_sidebar', '=', array('left', 'right'))
        ),
        array(
            'id' => 'evox_filter_sidebar_title_search',
            'type' => 'text',
            'title' => esc_html__('Search Form Title', 'evox'),
            'subtitle' => '',
            'default' => esc_html__('Search', 'evox'),
            'required' => array('evox_filter_sidebar_search', '=', '1')
        ),

        array(
            'id' => 'evox_order_date',
            'type' => 'button_set',
            'title' => esc_html__('Default order by Date DESC', 'evox'),
            'subtitle' => '',
            'options' => array(
                '1' => esc_html__('Yes', 'evox'),
                '0' => esc_html__('No', 'evox'),
            ),
            'default' => '0',
        ),
    )
));

// -> END Tour Detail Options

// -> START Branchs Options

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Branch Setting', 'evox'),
    'id' => 'evox_branchs_setting',
    'desc' => esc_html__('Branchs all config', 'evox'),
    'customizer_width' => '400px',
    'icon' => 'el el-network',
));

// Branchs List

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Branch List', 'evox'),
    'id' => 'evox_branchs_list_setting',
    'desc' => esc_html__('', 'evox'),
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'evox_branchs_per_page',
            'type' => 'text',
            'title' => esc_html__('Branch pages show at most', 'evox'),
            'subtitle' => '',
            'validate' => 'numeric',
            'default' => '8'
        ),

        array(
            'id' => 'evox_branchs_list_sidebar',
            'type' => 'image_select',
            'title' => esc_html__('Sidebar Option', 'evox'),
            'default' => 'right',
            'options' => array(
                'none' => array(
                    'alt' => esc_html__('None', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                ),
                'left' => array(
                    'alt' => esc_html__('Left', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                ),
                'right' => array(
                    'alt' => esc_html__('Right', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                )
            )
        ),
    )
));

// Branchs Detail

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Branch Detail', 'evox'),
    'id' => 'evox_branchs_detail_setting',
    'desc' => esc_html__('', 'evox'),
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'evox_branchs_detail_sidebar',
            'type' => 'image_select',
            'title' => esc_html__('Sidebar Option', 'evox'),
            'default' => 'right',
            'options' => array(
                'none' => array(
                    'alt' => esc_html__('None', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                ),
                'left' => array(
                    'alt' => esc_html__('Left', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                ),
                'right' => array(
                    'alt' => esc_html__('Right', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                )
            )
        ),

        array(
            'id' => 'evox_branchs_detail_map',
            'type' => 'button_set',
            'title' => esc_html__('Map Option', 'evox'),
            'subtitle' => '',
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '0' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1',
        ),

        array(
            'id' => 'evox_branchs_detail_image',
            'type' => 'button_set',
            'title' => esc_html__('Image Option', 'evox'),
            'subtitle' => '',
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '0' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1',
        ),

        array(
            'id' => 'evox_branchs_detail_info',
            'type' => 'button_set',
            'title' => esc_html__('Info Option', 'evox'),
            'subtitle' => '',
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '0' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1',
        ),

        array(
            'id' => 'evox_branchs_detail_content',
            'type' => 'button_set',
            'title' => esc_html__('Content Option', 'evox'),
            'subtitle' => '',
            'options' => array(
                '1' => esc_html__('Show', 'evox'),
                '0' => esc_html__('Hide', 'evox'),
            ),
            'default' => '1',
        ),
    )
));

// -> END Branchs Options

// -> START Shop Options

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Shop Setting', 'evox'),
    'id' => 'evox_shop_setting',
    'desc' => esc_html__('Shop all config', 'evox'),
    'customizer_width' => '400px',
    'icon' => 'el el-shopping-cart',
));

// Shop List

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Shop List', 'evox'),
    'id' => 'evox_shop_list_setting',
    'desc' => esc_html__('', 'evox'),
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'evox_shop_breadcrumb_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Breacrumb Image', 'evox'),
            'subtitle' => esc_html__('Image background for your breadcrumb shop', 'evox')
        ),

        array(
            'id' => 'evox_shop_products_per_page',
            'type' => 'text',
            'title' => esc_html__('Products Per Page', 'evox'),
            'subtitle' => '',
            'validate' => 'numeric',
            'default' => '6'
        ),

        array(
            'id' => 'evox_shop_columns',
            'type' => 'image_select',
            'title' => esc_html__('Number Of Shop Columns', 'evox'),
            'default' => '3',
            'options' => array(
                '2' => array(
                    'alt' => esc_html__('2 column', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/2-col-portfolio.png'
                ),
                '3' => array(
                    'alt' => esc_html__('3 column', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/3-col-portfolio.png'
                ),
                '4' => array(
                    'alt' => esc_html__('4 column', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/4-col-portfolio.png'
                )
            )
        ),

        array(
            'id' => 'evox_shop_list_sidebar',
            'type' => 'image_select',
            'title' => esc_html__('Sidebar Shop Option', 'evox'),
            'default' => 'right',
            'options' => array(
                'none' => array(
                    'alt' => esc_html__('None', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                ),
                'left' => array(
                    'alt' => esc_html__('Left', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                ),
                'right' => array(
                    'alt' => esc_html__('Right', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                )
            )
        ),
    )
));

// Shop Detail

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Shop Detail', 'evox'),
    'id' => 'evox_shop_detail_setting',
    'desc' => esc_html__('', 'evox'),
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'evox_shop_detail_breadcrumb_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Breacrumb Image', 'evox'),
            'subtitle' => esc_html__('Image background for your breadcrumb shop detail', 'evox')
        ),

        array(
            'id' => 'evox_shop_detail_sidebar',
            'type' => 'image_select',
            'title' => esc_html__('Sidebar Shop Option', 'evox'),
            'default' => 'right',
            'options' => array(
                'none' => array(
                    'alt' => esc_html__('None', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                ),
                'left' => array(
                    'alt' => esc_html__('Left', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                ),
                'right' => array(
                    'alt' => esc_html__('Right', 'evox'),
                    'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                )
            )
        ),

        array(
            'id' => 'evox_shop_nav_thumbs_option',
            'type' => 'select',
            'title' => esc_html__('Nav Thumbs Type', 'evox'),
            'subtitle' => '',
            'options' => array(
                '0' => esc_html__('Vertical', 'evox'),
                '1' => esc_html__('Horizontal', 'evox'),
            ),
            'default' => '0'
        ),

//        array(
//            'id'       => 'evox_branchs_detail_map',
//            'type'     => 'button_set',
//            'title'    => esc_html__( 'Map Option', 'evox' ),
//            'subtitle' => '',
//            'options'  => array(
//                '1' => esc_html__('Show','evox'),
//                '0' => esc_html__('Hide','evox'),
//            ),
//            'default'  => '1',
//        ),
//
//        array(
//            'id'       => 'evox_branchs_detail_image',
//            'type'     => 'button_set',
//            'title'    => esc_html__( 'Image Option', 'evox' ),
//            'subtitle' => '',
//            'options'  => array(
//                '1' => esc_html__('Show','evox'),
//                '0' => esc_html__('Hide','evox'),
//            ),
//            'default'  => '1',
//        ),
//
//        array(
//            'id'       => 'evox_branchs_detail_info',
//            'type'     => 'button_set',
//            'title'    => esc_html__( 'Info Option', 'evox' ),
//            'subtitle' => '',
//            'options'  => array(
//                '1' => esc_html__('Show','evox'),
//                '0' => esc_html__('Hide','evox'),
//            ),
//            'default'  => '1',
//        ),
//
//        array(
//            'id'       => 'evox_branchs_detail_content',
//            'type'     => 'button_set',
//            'title'    => esc_html__( 'Content Option', 'evox' ),
//            'subtitle' => '',
//            'options'  => array(
//                '1' => esc_html__('Show','evox'),
//                '0' => esc_html__('Hide','evox'),
//            ),
//            'default'  => '1',
//        ),
    )
));

// -> END Shop Options

// -> START 404 Options

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('404 Options', 'evox'),
    'id' => 'evox_404',
    'desc' => esc_html__('404 page all config', 'evox'),
    'customizer_width' => '400px',
    'icon' => 'el el-warning-sign',
    'fields' => array(
        array(
            'id' => 'evox_404_title',
            'type' => 'text',
            'title' => esc_html__('404 Title', 'evox'),
            'default' => false,
        ),
        array(
            'id' => 'evox_404_editor',
            'type' => 'editor',
            'title' => esc_html__('404 Content', 'evox'),
            'default' => false,
        ),
    )
));

// -> END 404 Options

// -> START Login And Register Page

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Login And Register', 'evox'),
    'id' => 'evox_login_and_register',
    'desc' => esc_html__('Login and register all config', 'evox'),
    'customizer_width' => '400px',
    'icon' => 'el el-unlock',
    'fields' => array(

        array(
            'id' => 'evox_login_page',
            'type' => 'select',
            'title' => esc_html__('Login Page', 'evox'),
            'subtitle' => esc_html__('Select a Page login. You can leave this field blank if you don\'t need custom Login Page.', 'evox'),
            'data' => 'pages',
            'data' => 'pages',
            'args' => array(
                'sort_order' => esc_html__('asc', 'evox'),
                'sort_column' => esc_html__('post_title', 'evox'),
            ),
        ),

        array(
            'id' => 'evox_login_redirect_page',
            'type' => 'select',
            'title' => esc_html__('Page to Redirect to on login', 'evox'),
            'subtitle' => esc_html__('Select a Page to Redirect to on login.', 'evox'),
            'data' => 'pages',
            'data' => 'pages',
            'args' => array(
                'sort_order' => esc_html__('asc', 'evox'),
                'sort_column' => esc_html__('post_title', 'evox'),
            ),
        ),

        array(
            'id' => 'evox_register_page',
            'type' => 'select',
            'title' => esc_html__('Register Page', 'evox'),
            'subtitle' => esc_html__('Select a page register. You can leave this field blank if you don\'t need custom Register Page.', 'evox'),
            'data' => 'pages',
            'data' => 'pages',
            'args' => array(
                'sort_order' => esc_html__('asc', 'evox'),
                'sort_column' => esc_html__('post_title', 'evox'),
            ),
        ),

        array(
            'id' => 'evox_lostpassword_page',
            'type' => 'select',
            'title' => esc_html__('Lost Password Page', 'evox'),
            'subtitle' => esc_html__('Select a page lost password. You can leave this field blank if you don\'t need custom Lost Password Page.', 'evox'),
            'data' => 'pages',
            'data' => 'pages',
            'args' => array(
                'sort_order' => esc_html__('asc', 'evox'),
                'sort_column' => esc_html__('post_title', 'evox'),
            ),
        ),

        array(
            'id' => 'evox_login_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload Image', 'evox'),
            'subtitle' => esc_html__('Upload image for page Login/Register', 'evox'),
            'desc' => '',
            'default' => false,
        ),

    )
));

// -> END 404 Options

// -> START Custom Css Options

Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Custom Css', 'evox'),
    'id' => 'evox_custom_css',
    'customizer_width' => '400px',
    'icon' => 'el el-css',
    'fields' => array(
        array(
            'id' => 'evox_custom_css_code',
            'type' => 'ace_editor',
            'title' => esc_html__('CSS CODE', 'evox'),
            'desc' => esc_html__('Enter your CSS code in the field below. Do not include any tags or HTML in the field. Custom CSS entered here will override the theme CSS. In some cases, the !important tag may be needed. Don\'t URL encode image or svg paths. Contents of this field will be auto encoded.', 'evox'),
            'subtitle' => esc_html__('Select type color theme', 'evox'),
            'mode' => 'css',
            'theme' => 'chrome',
            'default' => ''
        ),
    )
));

// -> END Custom Css Options
// -> START Landing Page
Redux::setSection($evox_opt_name, array(
    'title' => esc_html__('Landing Page Options', 'evox'),
    'id' => 'evox_header_land_options',
    'desc' => '',
    'icon' => 'el el-child',
    'fields' => array(

        array(
            'id' => 'evox_header_land_menu_locations',
            'type' => 'select',
            'title' => esc_html__('Menu Location', 'evox'),
            'subtitle' => '',
            'desc' => esc_html__('Select Menu Location. Defaut custom-menu-3', 'evox'),
            'data' => 'menu_locations'
        ),

        array(
            'id' => 'evox_header_land_logo_option',
            'type' => 'select',
            'title' => esc_html__('Logo Type', 'evox'),
            'subtitle' => esc_html__('select type for logo', 'evox'),
            'default' => 'logo_image',
            'options' => array(
                'logo_text' => esc_html__('Logo Text', 'evox'),
                'logo_image' => esc_html__('Logo Image', 'evox'),
            )
        ),
        array(
            'id' => 'evox_header_land_logo_image',
            'type' => 'media',
            'url' => true,
            'title' => esc_html__('Upload Logo Image', 'evox'),
            'subtitle' => esc_html__('logo image for your website', 'evox'),
            'desc' => '',
            'default' => false,
            'required' => array('evox_header_type_1_logo_option', '=', array('logo_image'))
        ),
        array(
            'id' => 'evox_header_land_logo_size',
            'type' => 'dimensions',
            'units' => array('em', 'px', '%'),    // You can specify a unit value. Possible: px, em, %
            'units_extended' => 'true',  // Allow users to select any type of unit
            'title' => esc_html__('Set width/height for logo image', 'evox'),
            'subtitle' => '',
            'default' => array(
                'width' => '',
                'height' => '',
            ),
            'output' => array('.tz_logo img'),
            'required' => array('evox_header_land_logo_option', '=', array('logo_image'))
        ),
        array(
            'id' => 'evox_header_land_logo_text',
            'type' => 'text',
            'title' => esc_html__('Logo Text', 'evox'),
            'subtitle' => esc_html__('logo text for your website', 'evox'),
            'desc' => esc_html__('', 'evox'),
            'output' => '',
            'default' => esc_html__('evox', 'evox'),
            'placeholder' => esc_html__('evox', 'evox'),
            'required' => array('evox_header_land_logo_option', '=', array('logo_text'))
        ),
        array(
            'id' => 'evox_header_land_logo_text_color',
            'type' => 'color',
            'title' => esc_html__('Color Logo Text', 'evox'),
            'desc' => '',
            'output' => '.tz_logo .tz-logo-text',
            'default' => '#000',
            'placeholder' => esc_html__('evox', 'evox'),
            'required' => array('evox_header_land_logo_option', '=', array('logo_text'))
        ),
        array(
            'id' => 'evox_header_land_btn_text',
            'type' => 'text',
            'title' => esc_html__('Button Text', 'evox'),
            'subtitle' => esc_html__('Button Text Out Site', 'evox'),
            'desc' => esc_html__('', 'evox'),
            'output' => '',
            'default' => esc_html__('Purchase Now', 'evox'),
            'placeholder' => esc_html__('Purchase Now', 'evox'),
        ),
        array(
            'id' => 'evox_header_btn_link',
            'type' => 'text',
            'title' => esc_html__('Button Link', 'evox'),
            'subtitle' => esc_html__('Get Link', 'evox'),
            'desc' => esc_html__('', 'evox'),
            'output' => '',
        ),
        array(
            'id' => 'evox_header_land_sticky',
            'type' => 'switch',
            'title' => esc_html__('Sticky Menu', 'evox'),
            'default' => true,
        ),

    )
));
// -> END Landing Page