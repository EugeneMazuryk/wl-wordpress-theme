<?php
/**
 * Sets up basic WordPress settings
 */
if ( ! function_exists( 'wl_theme_setup_function' ) ) {
	function wl_theme_setup_function() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( THEME_DOMAIN, THEME_DIR . 'languages' );

		/**
		 * Post formats supported by the theme.
		 *
		 * Allowed formats ( standard, aside, gallery, link, image, quote, status, video, audio, chat )
		 */
		add_theme_support( 'post-formats', array( 'standard' ) );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}

	add_action( 'after_setup_theme', 'wl_theme_setup_function' );
}

/**
 * Remove theme default image sizes
 */
if ( ! function_exists( 'wl_remove_image_sizes' ) ) {
	function wl_remove_image_sizes( $sizes ) {
		unset( $sizes['medium_large'] );
		unset( $sizes['1536x1536'] );
		unset( $sizes['2048x2048'] );

		return $sizes;
	}

	add_filter( 'intermediate_image_sizes_advanced', 'wl_remove_image_sizes', 999 );
}

/**
 * Change theme image sizes
 */
if ( ! function_exists( 'wl_theme_custom_image_sizes_function' ) ) {
	function wl_theme_custom_image_sizes_function() {
		//Add lazy load image background
		add_image_size( 'wl-lazy-load', 20, 20, 0 );

		// Add new image sizes
		//add_image_size( 'custom-size', 280, 195, array( 'left', 'top' ) );
		//add_image_size( 'shop_thumbnail', 200, 200, true );

		// Update default sizes
		update_option( 'thumbnail_size_w', 100 );
		update_option( 'thumbnail_size_h', 100 );
		update_option( 'thumbnail_crop', true );
		update_option( 'large_size_w', 1024 );
		update_option( 'large_size_h', 0 );
	}

	add_action( 'after_setup_theme', 'wl_theme_custom_image_sizes_function' );
}
