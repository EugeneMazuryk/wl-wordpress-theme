<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Weblorem_Theme
 */

/**
 * Register menu location.
 */
if ( ! function_exists( 'wl_register_nav_menus_function' ) ) {
	function wl_register_nav_menus_function() {
		register_nav_menus(
			array(
				'main-menu' => esc_html__( 'Main menu', THEME_DOMAIN ),
			)
		);
	}

	add_action( 'after_setup_theme', 'wl_register_nav_menus_function' );
}

/**
 * Set nav menu arguments
 */
if ( ! function_exists( 'wl_wp_nav_menu_args_function' ) ) {
	function wl_wp_nav_menu_args_function( $args ) {

		// Main menu
		if ( 'main-menu' === $args['theme_location'] ) {
			$args['container']            = 'div';
			$args['container_class']      = '';
			$args['container_id']         = '';
			$args['container_aria_label'] = '';
			$args['menu_class']           = 'menu';
			$args['menu_id']              = '';
			$args['echo']                 = true;
			$args['before']               = '';
			$args['after']                = '';
			$args['link_before']          = '';
			$args['link_after']           = '';
			$args['items_wrap']           = '<ul id="%1$s" class="%2$s">%3$s</ul>';
			$args['item_spacing']         = 'preserve';
			$args['depth']                = 0;
			$args['walker']               = new Theme_Walker_Nav_Menu();
			$args['fallback_cb']          = '__return_empty_string';
		}

		return $args;
	}

	add_filter( 'wp_nav_menu_args', 'wl_wp_nav_menu_args_function' );
}

/**
 * Set nav submenu ul classes
 */
if ( ! function_exists( 'wl_change_wp_nav_submenu_class_function' ) ) {
	function wl_change_wp_nav_submenu_class_function( $classes, $args, $depth ) {
		// Main menu
		if ( 'main-menu' === $args->theme_location ) {
			$classes[] = '';
		}

		return $classes;
	}

	add_filter( 'nav_menu_submenu_css_class', 'wl_change_wp_nav_submenu_class_function', 10, 3 );
}

/**
 * Set nav menu li item classes
 */
if ( ! function_exists( 'wl_change_wp_nav_menu_item_class_function' ) ) {
	function wl_change_wp_nav_menu_item_class_function( $classes, $item, $args, $depth ) {
		// Main menu
		if ( 'main-menu' === $args->theme_location ) {
			$classes[] = '';

			// Active item class
			if ( in_array( 'current-menu-item', $classes, true ) ) {
				$classes[] = 'active';
			}
		}

		return $classes;
	}

	add_filter( 'nav_menu_css_class', 'wl_change_wp_nav_menu_item_class_function', 10, 4 );
}

/**
 * Set nav menu a item classes
 */
if ( ! function_exists( 'wl_change_wp_nav_menu_item_link_class_function' ) ) {
	function wl_change_wp_nav_menu_item_link_class_function( $atts, $item, $args, $depth ) {
		// Main menu
		if ( 'main-menu' === $args->theme_location ) {
			$atts['class'] = '';
		}

		if ( '#' == $atts['href'] ) {
			$atts['href'] = '';
		}

		return $atts;
	}

	add_filter( 'nav_menu_link_attributes', 'wl_change_wp_nav_menu_item_link_class_function', 10, 4 );
}

/**
 * Theme custom nav menu walker
 */
class Theme_Walker_Nav_Menu extends Walker_Nav_Menu {

	/**
	 * Starts the list before the elements are added.
	 *
	 * public function start_lvl( &$output, $depth = 0, $args = null )
	 */

	/**
	 * Ends the list of after the elements are added.
	 *
	 * public function end_lvl( &$output, $depth = 0, $args = null )
	 */

	/**
	 * Starts the element output.
	 *
	 * public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 )
	 */

	/**
	 * Ends the element output, if needed.
	 *
	 * public function end_el( &$output, $item, $depth = 0, $args = null )
	 */

}
