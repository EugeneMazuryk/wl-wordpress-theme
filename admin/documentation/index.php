<?php
/**
 * Load WordPress library.
 */
if ( file_exists( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' ) ) {
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
} else {
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp/wp-load.php' );
}

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*** Functions which enhance the administrative part of the theme by hooking into WordPress ***/

/** ------------------------------------------------------------------------------------------------------------------ *
 * Theme Documentation Page functions
 *
 * Do not edit anything in this file unless you know what you're doing
 * ----------------------------------------------------------------------------------------------------------------- **/

/**
 * Set theme documentation domain constant
 */
if ( ! defined( 'WL_THEME_DOCUMENTATION_DOMAIN' ) ) {
	define( 'WL_THEME_DOCUMENTATION_DOMAIN', 'wl-documentation' );
}

/**
 * Set theme documentation path constant
 */
if ( ! defined( 'WL_THEME_DOCUMENTATION_DIR' ) ) {
	define( 'WL_THEME_DOCUMENTATION_DIR', get_stylesheet_directory() . '/admin/documentation/' );
}

/**
 * Set theme documentation url constant
 */
if ( ! defined( 'WL_THEME_DOCUMENTATION_URL' ) ) {
	define( 'WL_THEME_DOCUMENTATION_URL', get_template_directory_uri() . '/admin/documentation/' );
}

/**
 * Set theme documentation assets url constant
 */
if ( ! defined( 'WL_THEME_DOCUMENTATION_ASSETS_URL' ) ) {
	define( 'WL_THEME_DOCUMENTATION_ASSETS_URL', get_template_directory_uri() . '/admin/documentation/assets/' );
}

/**
 * Make documentation available for translation.
 * Translations can be filed in the /documentation/languages/ directory.
 */
load_theme_textdomain( WL_THEME_DOCUMENTATION_DOMAIN, WL_THEME_DOCUMENTATION_DIR . 'languages' );

/**
 * Set user locale in documentation page
 */
if ( is_user_logged_in() ) {
	if ( get_locale() != get_user_locale() ) {
		switch_to_locale( get_user_locale() );
	}
}

/**
 * Include theme Documentation template view.
 */
require_once WL_THEME_DOCUMENTATION_DIR . 'layout.php';
