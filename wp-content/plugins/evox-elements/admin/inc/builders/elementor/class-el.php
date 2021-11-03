<?php
/**
 * Evox_Elements Elementor class
 *
 * @version     1.0.0
 * @author      TemPlaza
 * @package     Evox_Elements/Classes
 * @category    Classes
 */

use Elementor\Plugin;

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit;

if ( !class_exists( 'Evox_Elements_El' ) ) {
	/**
	 * Class Evox_Elements_El
	 */
	class Evox_Elements_El {

		/**
		 * @var null
		 */
		private static $instance = null;

		/**
		 * Evox_Elements_El constructor.
		 */
		public function __construct() {

			// Require auto loader
			require_once __DIR__.'/includes/autoloader.php';

			// mapping params
			require_once( Evox_Elements_ELEMENTOR_PATH . '/class-el-mapping.php' );

			$this -> load_ajax_widgets();

			// add widget categories
			add_action( 'elementor/init', array( $this, 'register_categories' ), 99 );
//			add_action( 'elementor/elements/categories_registered', array( $this, 'register_categories' ) );
			// load widget
			add_action( 'elementor/widgets/widgets_registered', array( $this, 'load_widgets' ) );
		}

		/**
		 * Add widget categories
		 */
		public function register_categories() {
			$result = Plugin::instance()->elements_manager->add_category(
				'evox-elements',
				array(
					'title' => apply_filters( 'templaza_shortcode_group_name', esc_html__( 'TemPlaza', 'evox-elements' ) ),
					'icon'  => 'fa fa-plug'
				)
			);
		}

		/**
		 * @param $widgets_manager Elementor\Widgets_Manager
		 *
		 * @throws Exception
		 */
		public function load_widgets( $widgets_manager ) {

			// parent class
			require_once( Evox_Elements_ELEMENTOR_PATH . '/class-el-widget.php' );

			$widgets = Evox_Elements_Builders_Helper::get_elements();
			foreach ( $widgets as $group => $_widgets ) {
				foreach ( $_widgets as $widget ) {
					if ( $group != 'widgets' ) {
						$file = apply_filters( 'evox-elements/el-widget-file', Evox_Elements_BUILDERS_WIDGETS_PATH . "/$widget/class-el-$widget.php", $widget );

						if ( file_exists( $file ) ) {
							include_once $file;
							$class = '\Evox_Elements_El_' . str_replace( '-', '_', ucfirst( $widget ) );

							if ( class_exists( $class ) ) {
								$widgets_manager->register_widget_type( new $class() );
							}
						}
					}
				}
			}
		}

		/**
		 * Instance.
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}
		}

		/**
		 *
		 * @throws Exception
		 */
		public function load_ajax_widgets() {

			$widgets = Evox_Elements_Builders_Helper::get_elements();
			foreach ( $widgets as $group => $_widgets ) {
				foreach ( $_widgets as $widget ) {
					if ( $group != 'widgets' ) {

						$file = apply_filters( 'evox-elements/el-widget-file', Evox_Elements_BUILDERS_WIDGETS_PATH . "/$widget/ajax.php", $widget );

						if ( file_exists( $file ) ) {
							include_once $file;
						}
					}
				}
			}
		}
	}
}

new Evox_Elements_El();