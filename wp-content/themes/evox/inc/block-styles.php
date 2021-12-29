<?php

if ( function_exists( 'register_block_style' ) ) {

	function evox_basic_register_block_styles() {

		// Latest Posts: Dividers.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'templaza-latest-posts-dividers',
				'label' => esc_html__( 'Dividers', 'evox' ),
			)
		);

		// Latest Posts: Borders.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'templaza-latest-posts-borders',
				'label' => esc_html__( 'Borders', 'evox' ),
			)
		);

		// Media & Text: Borders.
		register_block_style(
			'core/media-text',
			array(
				'name'  => 'templaza-border',
				'label' => esc_html__( 'Borders', 'evox' ),
			)
		);

	}
	add_action( 'init', 'evox_basic_register_block_styles' );
}
