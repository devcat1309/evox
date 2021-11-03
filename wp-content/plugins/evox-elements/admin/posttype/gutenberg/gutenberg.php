<?php
if ( ! class_exists( 'TemplazaGutenberg' ) ):
	class TemplazaGutenberg {
		private static $instance;

		public static function get_instance() {
			if ( null === static::$instance ) {
				static::$instance = new static();
			}

			return static::$instance;
		}

		private function __construct() {
			add_action( 'init', array( $this, 'register_block' ) );
			/* add_action( 'enqueue_block_editor_assets',  array( $this, 'enqueue_editor_assets' ) ); */

			global $wp_version;
			if( function_exists('vp_pfui_post_admin_setup') && ( 5 <= $wp_version ) ) {
				require_once dirname( __FILE__ ) . '/metaboxes.php';
				add_filter( 'admin_body_class', array( $this,'custom_admin_body_class' ) );
			}
		}

		function register_block() {
			if( is_admin() ){
				wp_enqueue_style( 'templaza-gutenberg', PLUGIN_PATH . 'admin/posttype/gutenberg/style.css', array( 'wp-edit-blocks' ), '6.2' );
			}
		}

		function custom_admin_body_class( $classes ) {
			$classes .= ' templaza-gutenberg-vp-pfui';

			return $classes;
		}
	}

    TemplazaGutenberg::get_instance();
endif;
