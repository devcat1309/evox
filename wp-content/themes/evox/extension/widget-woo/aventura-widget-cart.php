<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class evox_WC_Widget_Cart extends WC_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->widget_cssclass    = 'woocommerce widget_shopping_cart';
		$this->widget_description =  esc_html__( "Display the user's Cart in the sidebar.", 'evox' );
		$this->widget_id          = 'woocommerce_widget_cart';
		$this->widget_name        =  esc_html__( 'WooCommerce Cart', 'evox' );
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'std'   =>  esc_html__( 'Cart', 'evox' ),
				'label' =>  esc_html__( 'Title', 'evox' )
			),
			'hide_if_empty' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' =>  esc_html__( 'Hide if cart is empty', 'evox' )
			)
		);

		parent::__construct();
	}

	/**
	 * widget function.
	 *
	 * @see WP_Widget
	 *
	 * @param array $evox_args
	 * @param array $evox_instance
	 */
	public function widget( $evox_args, $evox_instance ) {

		$evox_hide_if_empty = empty( $evox_instance['hide_if_empty'] ) ? 0 : 1;

		$this->widget_start( $evox_args, $evox_instance );

		if ( $evox_hide_if_empty ) {
			echo '<div class="hide_cart_widget_if_empty">';
		}

		echo '<div class="widget_shopping_cart_content"></div>';

		if ( $evox_hide_if_empty ) {
			echo '</div>';
		}

		$this->widget_end( $evox_args );
	}
}
