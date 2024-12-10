<?php
/**
 * Register theme shortcodes
 */

/**
 * Tooltip editor shortcode
 *
 * use [tooltip placement="top" title="Tooltip title" content="Tooltip content"]
 */
if ( ! function_exists( 'wl_add_shortcode_tooltip_function' ) ) {
	function wl_add_shortcode_tooltip_function( $atts ) {

		// get the attributes
		$atts = shortcode_atts(
			array(
				'placement' => 'top',
				'title'     => '',
				'content'   => ''
			),
			$atts,
			'tooltip'
		);

		$title   = $atts['title'] ? esc_html( $atts['title'] ) : '';
		$content = $atts['content'] ? esc_html( $atts['content'] ) : '';

		// return HTML
		return '<span class="tooltipspan">' . $title . '<div class="tooltipspantext">' . $content . '</div></span>';
	}

	//add_shortcode( 'tooltip', 'wl_add_shortcode_tooltip_function' );
}
