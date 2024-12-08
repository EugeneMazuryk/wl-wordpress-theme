<?php
/*** Functions, actions and filters which enhance the theme ***/

/**
 * Theme customizer logo filter
 */
if ( ! function_exists( 'wl_customize_theme_logo_function' ) ) {
	function wl_customize_theme_logo_function( $class = null ) {
		$logo = get_theme_mod( 'custom_logo' );

		if ( $class ) {
			$class = array( 'class' => esc_html( $class ) );
		}

		$image = wp_get_attachment_image( $logo, 'full', false, $class );

		if ( is_front_page() ) {
			$logo = $image;
		} else {
			$logo = '<a href="' . home_url() . '">' . $image . '</a>';
		}

		echo wp_kses_post( $logo );
	}

	add_action( 'wl_theme_logo', 'wl_customize_theme_logo_function', 10, 1 );
}

/**
 * Show Open Graph meta tags
 */
if ( ! function_exists( 'wl_open_graph_function' ) ) {
	function wl_open_graph_function() {
		global $post;

		if ( is_single() ) {
			if ( has_post_thumbnail( $post->ID ) ) {
				$img_src = wp_get_attachment_image_url( get_post_thumbnail_id( $post->ID ), 'medium' );
			} else {
				$img_src = null;
			} ?>
            <meta property="og:title" content="<?php the_title(); ?>"/>
            <meta property="og:description" content="<?php echo esc_html( wp_trim_words( get_the_content(), 25 ) ); ?>"/>
            <meta property="og:type" content="article"/>
            <meta property="og:url" content="<?php the_permalink(); ?>"/>
            <meta property="og:site_name" content="<?php echo esc_html( get_bloginfo() ); ?>"/>
            <meta property="og:image" content="<?php echo esc_url( $img_src ); ?>"/>
			<?php
		} else {
			return null;
		}
	}

	add_action( 'theme_open_graph', 'wl_open_graph_function', 10 );
}
