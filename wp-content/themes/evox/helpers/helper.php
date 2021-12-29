<?php
global $content_width;
if ( ! isset( $content_width ) ) {
	$content_width = 580;
}
if ( ! function_exists( 'evox_basic_fonts_url' ) ) {
	function evox_basic_fonts_url()
	{
		$evox_fonts_url = '';
		$evox_font_families = array();
		$font_subsets = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Barlow, translate this to 'off'. Do not translate into your own language. */
		if ('off' !== esc_html_x('on', 'Barlow Semi Condensed: on or off', 'evox')) {
			$evox_font_families[] = 'Barlow Semi Condensed:300,400,600';
		}
		/* translators: If there are characters in your language that are not supported by Saira, translate this to 'off'. Do not translate into your own language. */
		if ('off' !== esc_html_x('on', 'Inter font: on or off', 'evox')) {
			$evox_font_families[] = 'Inter:400,600';
		}
		/* translators: If there are characters in your language that are not supported by Saira, translate this to 'off'. Do not translate into your own language. */
		if ('off' !== esc_html_x('on', 'Merriweather: on or off', 'evox')) {
			$evox_font_families[] = 'Merriweather:300,400';
		}

		if ($evox_font_families) {

			$evox_query_args = array(
				'family' => urlencode(implode('|', $evox_font_families)),
				'subset' => urlencode($font_subsets),
			);

			$evox_fonts_url = add_query_arg($evox_query_args, 'https://fonts.googleapis.com/css');
		}
		return esc_url_raw($evox_fonts_url);
	}
}

if ( !function_exists('evox_basic_continue_reading_text') ) {
	function evox_basic_continue_reading_text() {
		$continue_reading = sprintf(
		/* translators: %s: Name of current post. */
			esc_html__( 'Continue reading %s', 'evox' ),
			the_title( '<span class="screen-reader-text">', '</span>', false )
		);

		return $continue_reading;
	}
}