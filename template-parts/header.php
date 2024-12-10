<?php
/**
 * Template part for displaying header
 */

/**
 * ACF Fields
 */


?>

<?php
/**
 * Theme logo added from customizer
 *
 * @see wl_customize_theme_logo_function in inc/theme-functions.php
 */
do_action( 'wl_theme_logo' );
?>

<?php
/**
 * Theme Navigation menu
 *
 * @see wl_register_nav_menus_function in inc/nav-menus.php
 */
wp_nav_menu( array( 'theme_location' => 'main-menu' ) );
?>

<?php
/**
 * Theme language switcher menu
 *
 * @see wl_language_switcher_function in inc/polylang.php
 */
do_action('wl_language_switcher');
?>
