<?php
/**
 * @package Evox Elements
 */
/*
Plugin Name: Evox Elements
Plugin URI: http://evox.com/
Description: This is plugin for Evox Team. This plugin allows you to create post types, taxonomies and Visual Composer's shortcodes
Version: 1.0.0
Author: Evox
Author URI: http://evox.com/
License: GPLv2 or later
Text Domain: evox-elements
Domain Path: /languages/
*/
if ( !class_exists('Evox_Elements') ):

    class Evox_Elements{

        /*
         * This method loads other methods of the class.
         */
        public function __construct(){
            /* load languages */
            $this -> load_languages();

            /*load all plazart*/
            $this -> load_evox();

            /*load all script*/
            $this -> load_script();
        }

        /*
         * Load the languages before everything else.
         */
        public function load_languages(){
            add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
        }

        /*
         * Load the text domain.
         */
        public function load_textdomain(){
            load_plugin_textdomain( 'evox-elements', false, basename( dirname( __FILE__ ) ) . '/languages' );
        }

        /*
         * Load script
         */
        public function load_script(){
            if( is_admin() ){
                add_action('admin_enqueue_scripts', array( $this,'evox_elements_admin_scripts') );
            }else{
                add_action('wp_enqueue_scripts',array($this,'evox_elements_frontend_scripts'));
                add_action('wp_enqueue_scripts',array($this,'evox_elements_frontend_styles'));
            }
        }

        /*
         * Load TZPlazart on the 'after_setup_theme' action. Then filters will
         */
        public function load_evox(){

            $this -> constants();

            $this -> admin_includes();


        }

        /**
         * Constants
         */
        private function constants(){

            define('PLUGIN_PATH', plugin_dir_url( __FILE__ ));

            define('PLUGIN_SERVER_PATH',dirname( __FILE__ ) );

            define( 'PLUGIN_URL', untrailingslashit( plugins_url( basename( plugin_dir_path( __FILE__ ) ), basename( __FILE__ ) ) ) );
        }

        /*
         * Require file
         */
        public function  admin_includes(){
            require_once PLUGIN_SERVER_PATH.'/admin/admin-init.php';
        }

        /*
        * Require file
        */
        public function  evox_elements_admin_scripts(){
            global $pagenow;
            wp_enqueue_style('templaza-admin-style', PLUGIN_PATH. 'assets/css/admin.css');

        }

        public function evox_elements_frontend_scripts(){
            /* Register script for default elements */

            wp_register_script('evox-elements-script', PLUGIN_PATH . 'assets/js/evox-elements.js', false,false, $in_footer=true);
            wp_enqueue_script('evox-elements-script');
        }

        public function evox_elements_frontend_styles(){
            /* Register style for default elements */
            wp_register_style( 'evox-elements-style', PLUGIN_PATH . 'assets/css/evox-elements.css', false );
            wp_enqueue_style( 'evox-elements-style');
        }
    }
    $plugin_plazart = new Evox_Elements();

endif;
?>