<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Weblorem Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

/** ------------------------------------------------------------------------------------------------------------------ *
 * Do not edit anything in this file unless you know what you're doing
 *
 * --------------------------------------------------------------------------------------------------------------------*
 * !!! All styles and scripts enqueue in /inc/assets.php file
 * ----------------------------------------------------------------------------------------------------------------- **/

$wp_theme = wp_get_theme();

/**
 * Add theme name constant
 *
 * Get theme name written in your style.css
 */
if ( ! defined( 'THEME_NAME' ) ) {
	define( 'THEME_NAME', $wp_theme->get( 'Name' ) );
}

/**
 * Add theme domain constant
 *
 * Get theme domain written in your style.css
 */
if ( ! defined( 'THEME_DOMAIN' ) ) {
	define( 'THEME_DOMAIN', $wp_theme->get( 'TextDomain' ) );
}

/**
 * Add theme version constant
 *
 * Get version written in your style.css
 */
if ( ! defined( 'THEME_VERSION' ) ) {
	define( 'THEME_VERSION', $wp_theme->get( 'Version' ) );
}

/**
 * Add theme path constant
 */
if ( ! defined( 'THEME_DIR' ) ) {
	define( 'THEME_DIR', get_theme_root() . '/' . get_template() . '/' );
}

/**
 * Add theme url constant
 */
if ( ! defined( 'THEME_URL' ) ) {
	define( 'THEME_URL', get_template_directory_uri() . '/' );
}

/**
 * Add theme assets path constant
 */
if ( ! defined( 'THEME_ASSETS_PATH' ) ) {
	define( 'THEME_ASSETS_PATH', THEME_DIR . 'assets/' );
}

/**
 * Add theme assets url constant
 */
if ( ! defined( 'THEME_ASSETS_URL' ) ) {
	define( 'THEME_ASSETS_URL', get_template_directory_uri() . '/assets/' );
}

/**
 * Add theme upload dir constant
 */
if ( ! defined( 'THEME_UPLOADS_DIR' ) ) {
	$upload_dir = wp_upload_dir();
	define( 'THEME_UPLOADS_DIR', $upload_dir['basedir'] . '/wl-uploads' );

	if ( ! file_exists( THEME_UPLOADS_DIR ) ) {
		wp_mkdir_p( THEME_UPLOADS_DIR );
		$fp = fopen( THEME_UPLOADS_DIR . '/index.php', 'w' );
		fwrite( $fp, "<?php \n\t // Silence is golden." );
		fclose( $fp );
	}
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
require_once THEME_DIR . 'inc/setup-theme.php';

/**
 * Include theme Admin functions.
 */
require_once THEME_DIR . 'admin/functions.php';

/**
 * Helper functions which enhance the theme.
 */
require_once THEME_DIR . 'inc/theme-helpers.php';

/**
 * Functions, actions and filters which enhance the theme.
 */
require_once THEME_DIR . 'inc/theme-functions.php';

/**
 * Functions for connecting theme styles and scripts.
 */
require_once THEME_DIR . 'inc/assets.php';

/**
 * Register custom post types.
 */
require_once THEME_DIR . 'inc/post-types.php';

/**
 * Register custom taxonomies.
 */
require_once THEME_DIR . 'inc/taxonomies.php';

/**
 * Functions which add or edit the nav_menus by hooking into WordPress.
 */
require_once THEME_DIR . 'inc/nav-menus.php';

/**
 * Functions which add or edit the sidebars by hooking into WordPress.
 */
require_once THEME_DIR . 'inc/sidebars.php';

/**
 * Functions which add or edit the pagination by hooking into WordPress.
 */
require_once THEME_DIR . 'inc/pagination.php';

/**
 * Functions which add or edit the breadcrumbs by hooking into WordPress.
 */
require_once THEME_DIR . 'inc/breadcrumbs.php';

/**
 * Ajax functions which enhance the theme.
 */
require_once THEME_DIR . 'inc/ajax.php';

/**
 * Shortcodes functions which enhance the theme.
 */
require_once THEME_DIR . 'inc/shortcodes.php';

/**
 * Forms functions which enhance the theme.
 */
require_once THEME_DIR . 'inc/forms.php';

/**
 * Load Advanced Custom Fields compatibility file.
 */
require_once THEME_DIR . 'inc/acf.php';

/**
 * Load Contact Form 7 compatibility file.
 */
require_once THEME_DIR . 'inc/cf7.php';

/**
 * Load Polylang compatibility file.
 */
require_once THEME_DIR . 'inc/polylang.php';

/**
 * Load The SEO Framework compatibility file.
 */
require_once THEME_DIR . 'inc/seo.php';

/**
 * Load WooCommerce compatibility file.
 */
require_once THEME_DIR . 'inc/woocommerce.php';

/**
 * Load custom theme cron tasks.
 */
require_once THEME_DIR . 'inc/cron.php';
