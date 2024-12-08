<?php
/*** Functions which enhance the dashboard widgets of the theme by hooking into WordPress ***/

/** ------------------------------------------------------------------------------------------------------------------ *
 * Include theme dashboard Widgets
 * ----------------------------------------------------------------------------------------------------------------- **/

/**
 * Include admin dashboard 'Informer' widget.
 */
require_once WL_THEME_ADMIN_DIR . 'widgets/informer.php';

/**
 * Include admin dashboard 'Weather' widget.
 */
require_once WL_THEME_ADMIN_DIR . 'widgets/weather.php';

/**
 * Include admin dashboard 'ChatGPT' widget.
 */
require_once WL_THEME_ADMIN_DIR . 'widgets/chat-gpt.php';

/** ------------------------------------------------------------------------------------------------------------------ *
 * Theme Other Dashboard Widgets functions
 * ----------------------------------------------------------------------------------------------------------------- **/

/**
 * Allowed dashboard widgets
 */
if ( ! function_exists( 'wl_get_allowed_dashboard_widgets' ) ) {
	function wl_get_allowed_dashboard_widgets() {
		return array(
			//'dashboard_site_health',
			'dashboard_right_now',
			'dashboard_activity',
			'woocommerce_dashboard_status',
			'wl_informer_dashboard_widget',
			'wl_whether_dashboard_widget',
			'wl_chat_gpt_dashboard_widget',
		);
	}
}

/**
 * Adding custom post type counts in 'Right now' Dashboard widget.
 */
if ( ! function_exists( 'wl_add_custom_post_type_in_glance_items_function' ) ) {
	function wl_add_custom_post_type_in_glance_items_function() {
		$glances = array();

		$args = array(
			'public'   => true,  // Showing public post types only
			'_builtin' => false,  // Except the build-in wp post types (page, post, attachments)
		);

		// Getting your custom post types
		$post_types = get_post_types( $args, 'object', 'and' );

		foreach ( $post_types as $post_type ) {
			$num_posts = wp_count_posts( $post_type->name );
			$num       = number_format_i18n( $num_posts->publish );
			$text      = _n( $post_type->labels->singular_name, $post_type->labels->name,
				intval( $num_posts->publish ) );

			if ( current_user_can( 'edit_posts' ) ) {
				$glance = '<a class="' . $post_type->name . '-count" href="' . admin_url( 'edit.php?post_type=' . $post_type->name ) . '">' . $num . ' ' . $text . '</a>';
			} else {
				$glance = '<span class="' . $post_type->name . '-count">' . $num . ' ' . $text . '</span>';
			}

			$glances[] = $glance;
		}

		return $glances;
	}

	add_action( 'dashboard_glance_items', 'wl_add_custom_post_type_in_glance_items_function' );
}
