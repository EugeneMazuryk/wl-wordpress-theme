<?php
/*** Settings WordPress sidebar dashboard menu preferences ***/

/**
 * Initializes the theme's admin menu options page.
 */
if ( ! function_exists( 'wl_init_theme_dashboard_menu_settings_function' ) ) {
	function wl_init_theme_dashboard_menu_settings_function() {
		global $menu;

		if ( is_array( $menu ) || is_object( $menu ) ) {
			foreach ( $menu as $menu_item ) {
				if ( isset( $menu_item[5] ) && 'toplevel_page_wl_theme_options' !== $menu_item[5] ) {

					if ( ! isset( get_option( 'wl_theme_options_main' )['disable_theme_functions'] ) && isset( get_option( 'wl_theme_options_dashboard_menu' )[ $menu_item[5] . '_hide' ] ) && get_option( 'wl_theme_options_dashboard_menu' )[ $menu_item[5] . '_hide' ] ) {
						remove_menu_page( $menu_item[2] );
						if ( 'menu-comments' === $menu_item[5] ) {
							wl_remove_comments_function();
						}
					}

					add_settings_field(
						$menu_item[5] . '_hide',
						__( preg_replace( '/\d/u', '', $menu_item[0] ) ),
						function ( $args ) use ( $menu_item ) {
							$options = get_option( 'wl_theme_options_dashboard_menu' );

							$html = '<input type="checkbox" id="' . $menu_item[5] . '_hide" name="wl_theme_options_dashboard_menu[' . $menu_item[5] . '_hide]" value="1" ' . checked( 1,
									isset( $options[ $menu_item[5] . '_hide' ] ) ? $options[ $menu_item[5] . '_hide' ] : 0,
									false ) . '/>';
							$html .= '<label for="' . $menu_item[5] . '_hide">&nbsp;' . $args[0] . '</label>';

							echo $html;
						},
						'wl_theme_options_dashboard_menu',
						'wl_theme_options_dashboard_menu',
						array(
							__( 'Hide menu item', WL_THEME_ADMIN_DOMAIN ) . ' ' . __( preg_replace( '/\d/u', '', $menu_item[0] ) ),
						),
					);
				}
			}
		}

		add_settings_section(
			'wl_theme_options_dashboard_menu',
			false,
			'wl_dashboard_menu_section_description_callback',
			'wl_theme_options_dashboard_menu'
		);

		register_setting(
			'wl_theme_options_dashboard_menu',
			'wl_theme_options_dashboard_menu'
		);
	}

	add_action( 'admin_init', 'wl_init_theme_dashboard_menu_settings_function' );
}

/** ------------------------------------------------------------------------------------------------------------------ *
 * Settings callback functions
 * ----------------------------------------------------------------------------------------------------------------- **/

/**
 * Simple description for the Other Settings page.
 */
function wl_dashboard_menu_section_description_callback() {
	echo '<p>' . __( 'Select which menu items you wish to hide in the WordPress dashboard menu.',
			WL_THEME_ADMIN_DOMAIN ) . '</p><hr>';
}

/** ------------------------------------------------------------------------------------------------------------------ *
 * Theme admin menu functions
 * ----------------------------------------------------------------------------------------------------------------- **/

if ( ! function_exists( 'wl_remove_comments_function' ) ) {
	function wl_remove_comments_function() {
		// Removes from post and pages
		function wl_remove_comment_support_function() {
			remove_post_type_support( 'post', 'comments' );
			remove_post_type_support( 'page', 'comments' );
		}

		add_action( 'init', 'wl_remove_comment_support_function', 100 );

		// Removes from admin bar
		function wl_remove_comments_in_admin_bar_function() {
			global $wp_admin_bar;
			$wp_admin_bar->remove_menu( 'comments' );
		}

		add_action( 'wp_before_admin_bar_render', 'wl_remove_comments_in_admin_bar_function' );

		// Removes from columns
		function wl_remove_comments_columns_function( $columns ) {
			unset( $columns['comments'] );

			return $columns;
		}

		add_filter( 'manage_posts_columns', 'wl_remove_comments_columns_function', 10, 2 );
		add_filter( 'manage_pages_columns', 'wl_remove_comments_columns_function', 10, 2 );
	}
}