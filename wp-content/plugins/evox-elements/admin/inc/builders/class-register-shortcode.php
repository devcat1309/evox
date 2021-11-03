<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'TemplazaElements_Builder' ) ) {
    /**
     * Class TemplazaElements_Builder
     */
    final class TemplazaElements_Builder {

        /**
         * @var null
         */
        private static $_instance = null;

        protected static $_core_els    = array();

        /**
         * BuilderPress constructor.
         */
        public function __construct() {
            if ( ! function_exists( 'is_plugin_active' ) ) {
                include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
            }
            // Require auto loader file
            require_once __DIR__.'/includes/autoloader.php';

            self::$_core_els  = array(
                'general' => array(
                    'list-post'
                )
            );

//            if(!wp_style_is('templaza-element-fancybox')){
//                wp_register_style('templaza-element-fancybox', Evox_Elements_BUILDERS_PLUGIN_URI.'/assets/js/jquery.fancybox.js');
//            }

//            if(!wp_style_is('templaza-element-font-icon-pe7')){
//                wp_register_style('templaza-element-font-icon-pe7', Evox_Elements_BUILDERS_PLUGIN_URI
//                    .'/assets/vendor/font-pe-icon-7/pe-icon-7-stroke.css');
//            }

            $this->init_hooks();
        }


        /**
         * Init hook.
         */
        public function init_hooks() {
            add_action( 'after_setup_theme', array( $this, 'init_elements' ) );
        }

        /**
         * Init elements config.
         */
        public function init_elements() {
            // edit folder shortcode and widget in theme and child theme by tuanta
            $folder_elements = apply_filters( 'evox_elements_custom_folder_shortcodes', 'shortcodes' );

//            define( 'TP_THEME_ELEMENTS_THIM_DIR', trailingslashit( get_template_directory() . '/inc/' . $folder_elements . '/' ) );
//            define( 'TP_THEME_ELEMENTS_THIM_URI', trailingslashit( get_template_directory_uri() . '/inc/' . $folder_elements . '/' ) );
//            define( 'TP_CHILD_THEME_ELEMENTS_THIM_DIR', trailingslashit( get_stylesheet_directory() . '/inc/' . $folder_elements . '/' ) );
//            define( 'TP_CHILD_THEME_ELEMENTS_THIM_URI', trailingslashit( get_stylesheet_directory_uri() . '/inc/' . $folder_elements . '/' ) );


            $elements = self::get_elements();

            if ( empty( $elements ) ) {
                return;
            }

            require_once( Evox_Elements_BUILDERS_PATH . '/class-abstract-config.php' );

            // elementor
            if ( is_plugin_active( 'elementor/elementor.php' ) ) {
                if(file_exists(Evox_Elements_BUILDERS_PATH . '/elementor/class-el.php')) {
                    require_once(Evox_Elements_BUILDERS_PATH . '/elementor/class-el.php');
                }
            }
            // widgets
            if(file_exists(Evox_Elements_BUILDERS_PATH . '/siteorigin/class-so.php')) {
                require_once(Evox_Elements_BUILDERS_PATH . '/siteorigin/class-so.php');
            }

            // visual composer
            if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
                if(file_exists(Evox_Elements_BUILDERS_PATH . '/visual-composer/class-vc.php')) {
                    require_once( Evox_Elements_BUILDERS_PATH . '/visual-composer/class-vc.php' );
                }
            }

//            require_once( THIM_CORE_INC_PATH . '/builders/functions.php' );

            foreach ( $elements as $plugin => $group ) {
                foreach ( $group as $element ) {
//                    if ( thim_builder_folder_group()) {
//                        $file_config = TP_THEME_ELEMENTS_THIM_DIR . "$plugin/$element/config.php";
//                    } else {
                        $file_config = Evox_Elements_BUILDERS_WIDGETS_PATH.'/' . $element . "/config.php";
//                    }
//                    var_dump($file_config); die();
                    if ( file_exists( $file_config ) ) {
                        require_once $file_config;
                    }
                }
            }

        }

        /**
         * Get all features.
         *
         * @return mixed
         */
        public static function get_elements() {
//            $elements = apply_filters( 'evox_elements_register_shortcode', self::$_core_els );
            $elements = apply_filters( 'evox_elements_register_shortcode', self::get_elements_from_path() );

            // disable elements when depends plugin not active
            foreach ( $elements as $plugin => $_elements ) {
                if ( $plugin == 'general' || $plugin == 'widgets' ) {
                    continue;
                }

                if ( ! class_exists( $plugin ) ) {
                    unset( $elements[$plugin] );
                }
            }

            return $elements;
        }

        /*
         * Get all widgets from path
         * return mixed
         * */
        public static function get_elements_from_path(){
            $elements   = self::$_core_els;
            $core_path  = Evox_Elements_BUILDERS_WIDGETS_PATH;
            $folders = glob( $core_path . '/*', GLOB_ONLYDIR );
            if(count($folders)) {
                foreach ( $folders as $path ) {
                    $folder = basename($path);
                    if(!in_array($folder, self::$_core_els['general'])) {
                        self::$_core_els['general'][] = $folder;
                    }
                }
            }
            return self::$_core_els;
        }


        /**
         * @return null|TemplazaElements_Builder
         */
        public static function instance() {
            if ( ! self::$_instance ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }
    }
}


$GLOBALS['TemplazaElements_Builder'] = TemplazaElements_Builder::instance();