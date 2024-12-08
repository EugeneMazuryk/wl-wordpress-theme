<?php
/**
 * Functions for connecting theme styles and scripts
 *
 * @package Weblorem_Theme
 */

/**
 * Enqueue scripts and styles.
 *
 * Example connection styles and scripts:
 * wp_enqueue_style('wl-styles-name', THEME_ASSETS_URL . 'URL', array(), wl_dynamic_version( 'URL' ));
 * wp_enqueue_script('wl-scripts-name', THEME_ASSETS_URL . 'URL', array(), wl_dynamic_version( 'URL' ), array( 'in_footer' => true ) );
 */
if ( ! function_exists( 'wl_enqueue_theme_scripts_function' ) ) {
	function wl_enqueue_theme_scripts_function() {
		//----- Connection styles -----//

		// Main styles
		if ( is_child_theme() ) {
			$theme = wp_get_theme();
			wp_enqueue_style( 'parent-styles', get_template_directory_uri() . '/style.css', array(),
				$theme->parent()->get( 'Version' ) );
			wp_enqueue_style( 'wl-child-styles', get_stylesheet_uri(), array( 'parent-styles' ), wl_dynamic_version( get_stylesheet_uri() ) );
		} else {
			wp_enqueue_style( 'wl-styles', get_stylesheet_uri(), array(), wl_dynamic_version( get_stylesheet_uri() ) );
		}

		// Other styles
		//wp_enqueue_style('', THEME_ASSETS_URL . 'URL', array(), wl_dynamic_version( 'URL' ));

		// Comments styles
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		//----- Connection scripts -----//

		// JQuery
		//wp_deregister_script( 'jquery' );
		//wp_register_script( 'jquery',  'URL', false, wl_dynamic_version( 'URL' ), array( 'in_footer' => true ) );
		//wp_enqueue_script( 'jquery' );

		// Other scripts
		//wp_enqueue_script('', THEME_ASSETS_URL . 'URL', array(), wl_dynamic_version( 'URL' ), array( 'in_footer' => true ) );

		// Main scripts
		wp_enqueue_script( 'wl-scripts', THEME_URL . 'script.js', array( 'jquery' ), wl_dynamic_version( THEME_URL . 'script.js' ), array( 'in_footer' => true ) );

		// Theme localize scripts
		wp_localize_script(
			'wl-scripts',
			'wl_localize_vars',
			array(
				'ajax_url'   => admin_url( 'admin-ajax.php' ),
				'assets_url' => THEME_ASSETS_URL,
			)
		);
	}

	add_action( 'wp_enqueue_scripts', 'wl_enqueue_theme_scripts_function' );
}

/**
 * Dynamic assets file version
 */
if ( ! function_exists( 'wl_dynamic_version' ) ) {
	function wl_dynamic_version( $url ) {
		$relative_path      = wp_make_link_relative( $url );
		$site_path          = realpath( ABSPATH );
		$expected_site_path = dirname( $site_path );

		if ( basename( $site_path ) !== basename( $expected_site_path ) ) {
			$root_path = $expected_site_path;
		} else {
			$root_path = $site_path;
		}

		$file_absolute_path = $root_path . $relative_path;

		return file_exists( $file_absolute_path ) ? THEME_VERSION . '.' . filemtime( $file_absolute_path ) : THEME_VERSION;
	}
}

/**
 * Adds the GTM code in the head.
 */
if ( ! function_exists( 'wl_add_gtm_code_in_head_function' ) ) {
	function wl_add_gtm_code_in_head_function() {
		$gtm_id        = 'GTM-XXXXXX';
		$html_gtm_head = '	<!-- Google Tag Manager -->' . PHP_EOL . "	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','" . $gtm_id . "');</script>" . PHP_EOL . '	<!-- End Google Tag Manager -->' . PHP_EOL;
		if ( defined( 'WP_ENV' ) && 'development' !== WP_ENV ) {
			echo $html_gtm_head;
		}
	}

	//add_action( 'wp_head', 'wl_add_gtm_code_in_head_function', 2 );
}

/**
 * Adds the GTM code in the body.
 */
if ( ! function_exists( 'wl_add_gtm_code_in_body_function' ) ) {
	function wl_add_gtm_code_in_body_function() {
		$gtm_id        = 'GTM-XXXXXX';
		$html_gtm_body = '	<!-- Google Tag Manager (noscript) -->' . PHP_EOL . '	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=' . $gtm_id . '" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>' . PHP_EOL . '	<!-- End Google Tag Manager (noscript) -->' . PHP_EOL;
		if ( defined( 'WP_ENV' ) && 'development' !== WP_ENV ) {
			echo $html_gtm_body;
		}
	}

	//add_action( 'wp_body_open', 'wl_add_gtm_code_in_body_function', 1 );
}

/**
 * Load Async CSS styles.
 */
if ( ! function_exists( 'wl_add_async_attribute_styles_function' ) ) {
	function wl_add_async_attribute_styles_function( $tag, $handle ) {
		// style handles
		$styles_to_async = array( 'wp-styles', 'omisoft-main-custom-styles' );

		foreach ( $styles_to_async as $async_style ) {
			if ( $async_style === $handle ) {
				$tag = str_replace( "rel='stylesheet'", "rel='preload stylesheet' as='style'", $tag );
				$tag = str_replace( 'media=\'all\'', 'media="print" onload="this.media=\'all\'"', $tag );
			}
		}

		return $tag;
	}

	//add_filter( 'style_loader_tag', 'wl_add_async_attribute_styles_function', 10, 2 );
}

/**
 * Load Async JS scripts.
 */
if ( ! function_exists( 'wl_add_async_attribute_scripts_function' ) ) {
	function wl_add_async_attribute_scripts_function( $tag, $handle ) {

		// script handles
		$scripts_to_async = array( 'jquery', 'jquery-core', 'jquery-migrate' );

		foreach ( $scripts_to_async as $async_script ) {
			if ( $async_script === $handle ) {
				return str_replace( ' src', ' async="async" src', $tag );
			}
		}

		return $tag;
	}

	//add_filter( 'script_loader_tag', 'wl_add_async_attribute_scripts_function', 10, 2 );
}
