<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*** Functions which enhance the administrative part of the theme by hooking into WordPress ***/

/** ------------------------------------------------------------------------------------------------------------------ *
 * Theme Admin Page functions
 *
 * Do not edit anything in this file unless you know what you're doing
 * ----------------------------------------------------------------------------------------------------------------- **/

/**
 * Set theme admin domain constant
 */
if ( ! defined( 'WL_THEME_ADMIN_DOMAIN' ) ) {
	define( 'WL_THEME_ADMIN_DOMAIN', 'wl-admin' );
}

/**
 * Set theme admin path constant
 */
if ( ! defined( 'WL_THEME_ADMIN_DIR' ) ) {
	define( 'WL_THEME_ADMIN_DIR', get_stylesheet_directory() . '/admin/' );
}

/**
 * Set theme admin url constant
 */
if ( ! defined( 'WL_THEME_ADMIN_URL' ) ) {
	define( 'WL_THEME_ADMIN_URL', get_template_directory_uri() . '/admin/' );
}

/**
 * Include theme admin settings page.
 */
require_once WL_THEME_ADMIN_DIR . 'page-settings.php';

/**
 * Include widgets theme admin functions.
 */
require_once WL_THEME_ADMIN_DIR . 'functions-widgets.php';

/**
 * Include WooCommerce theme admin functions.
 */
require_once WL_THEME_ADMIN_DIR . 'functions-woocommerce.php';

/**
 * Make admin available for translation.
 * Translations can be filed in the /admin/languages/ directory.
 */
load_theme_textdomain( WL_THEME_ADMIN_DOMAIN, WL_THEME_ADMIN_DIR . 'languages' );

if ( isset( get_option( 'wl_theme_options_main' )['disable_theme_functions'] ) ) {
	return;
}

/**
 * Set revision limit.
 */
add_filter( 'wp_revisions_to_keep', function () {
	return 3;
} );

/**
 * Applied a limit of "3" post revisions.
 */
if ( ! defined( 'WP_POST_REVISIONS' ) ) {
	define( 'WP_POST_REVISIONS', 3 );
}

/**
 * Own logo in the admin panel.
 */
if ( has_custom_logo() ) {
	if ( ! function_exists( 'wl_change_admin_logo_image_function' ) ) {
		function wl_change_admin_logo_image_function() {
			$custom_logo_url = wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'medium' ); ?>
            <style type="text/css">
                .login h1 a {
                    background: url("<?php echo $custom_logo_url; ?>") center /contain no-repeat !important;
                    max-width: 300px !important;
                    width: 300px !important;
                }
            </style>
		<?php }

		add_action( 'login_enqueue_scripts', 'wl_change_admin_logo_image_function' );
	}
	if ( ! function_exists( 'wl_change_admin_logo_url_function' ) ) {
		function wl_change_admin_logo_url_function() {
			return home_url( '/' );
		}

		add_filter( 'login_headerurl', 'wl_change_admin_logo_url_function' );
	}
}

/**
 * Create menu pages.
 */
if ( ! function_exists( 'wl_create_menu_pages_function' ) ) {
	function wl_create_menu_pages_function() {
		add_menu_page(
			esc_html__( 'Menu' ),
			esc_html__( 'Menu' ),
			'administrator',
			'nav-menus.php',
			'',
			'dashicons-menu-alt',
			59
		);
	}

	add_action( 'admin_menu', 'wl_create_menu_pages_function' );
}

/**
 * Not show post_tag and category taxonomies in nav_menus
 */
if ( ! function_exists( 'wl_edit_show_in_nav_menus_taxonomies_function' ) ) {
	function wl_edit_show_in_nav_menus_taxonomies_function( $args, $taxonomy, $object_type ) {
		$taxonomies = array( 'post_tag', 'category' );
		if ( in_array( $taxonomy, $taxonomies, true ) ) {
			$args['show_in_nav_menus'] = false;
		}

		return $args;
	}

	//add_filter( 'register_taxonomy_args', 'wl_edit_show_in_nav_menus_taxonomies_function', 10, 3 );
}

/**
 * Change copyright text in the footer admin panel.
 */
if ( ! function_exists( 'wl_change_admin_footer_copyright_text_function' ) ) {
	function wl_change_admin_footer_copyright_text_function() {
		global $wp_theme;

		echo sprintf( __( 'Created %s with %s', WL_THEME_ADMIN_DOMAIN ),
			'<a href="' . esc_url( $wp_theme->get( 'AuthorURI' ) ) . '" target="_blank">' . esc_html( $wp_theme->get( 'Author' ) ) . '</a>',
			'<img style="max-height:18px;position:relative;top:4px" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDMyIDMyIiBoZWlnaHQ9IjMycHgiIHZlcnNpb249IjEuMSIgdmlld0JveD0iMCAwIDMyIDMyIiB3aWR0aD0iMzJweCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+PGcgaWQ9ImZsYWdfeDJDX19Va3JhaW5lX3gyQ19faGVhcnRfeDJDX19sb3ZlIj48ZyBpZD0iWE1MSURfNzg0XyI+PGcgaWQ9IlhNTElEXzEyMDFfIj48ZyBpZD0iWE1MSURfMTI0Nl8iPjxwYXRoIGQ9Ik0yMi41NjUsNC41MDhjLTIuNzMsMC01LjEzOSwxLjM4LTYuNTY1LDMuNDhjLTEuNDI3LTIuMTAxLTMuODM1LTMuNDgtNi41NjYtMy40OCAgICAgIEM1LjA1Miw0LjUwOCwxLjUsOC4wNiwxLjUsMTIuNDQyYzAsOS4zMDIsMTQuNSwxNy4wNSwxNC41LDE3LjA1czE0LjUtNy43NDgsMTQuNS0xNy4wNUMzMC41LDguMDYsMjYuOTQ4LDQuNTA4LDIyLjU2NSw0LjUwOHoiIGZpbGw9IiM4MEQ4RkYiLz48L2c+PGcgaWQ9IlhNTElEXzEyNDRfIj48cGF0aCBkPSJNMi4xODUsMTZDNS4wNTIsMjMuNjM5LDE2LDI5LjQ5MiwxNiwyOS40OTJTMjYuOTQ4LDIzLjYzOSwyOS44MTUsMTZjMCwwLTIuNDQsMi0xMy44MTUsMiAgICAgIFMyLjE4NSwxNiwyLjE4NSwxNnoiIGZpbGw9IiNGRkYxNzYiLz48L2c+PGcgaWQ9IlhNTElEXzEyMDRfIj48cGF0aCBkPSJNMjkuOTQ1LDkuNTQyQzI5Ljk3OSw5LjgzOCwzMCwxMC4xMzgsMzAsMTAuNDQyYzAsMy4zNDEtMS44NzEsNi40ODEtNC4yNjksOS4xMzUgICAgICBjLTUuNDc0LDYuMDU3LTE1LjEyNCw1Ljk3Ni0yMC41NjMtMC4xMTJjLTEuNTI4LTEuNzEtMi44MzEtMy42MTktMy41NTYtNS42NTFDMi45MTMsMjIuNDkyLDE2LDI5LjQ5MiwxNiwyOS40OTIgICAgICBzMTQuNS03Ljc0OCwxNC41LTE3LjA1QzMwLjUsMTEuNDE4LDMwLjI5OSwxMC40NDEsMjkuOTQ1LDkuNTQyeiIgZmlsbD0iIzY1QzdFQSIvPjwvZz48ZyBpZD0iWE1MSURfMTI1MV8iPjxwYXRoIGQ9Ik0yOS44MTUsMTZjMCwwLTAuNDY5LDAuMzg0LTEuOTUzLDAuODE1Yy0wLjYyNSwwLjk2NS0xLjM0NSwxLjg5Mi0yLjEzMSwyLjc2MiAgICAgIGMtNS40NzQsNi4wNTctMTUuMTI0LDUuOTc2LTIwLjU2My0wLjExMkM0LjMsMTguNDkyLDMuNTIsMTcuNDUsMi44NjIsMTYuMzYzQzIuMzc1LDE2LjE0OSwyLjE4NSwxNiwyLjE4NSwxNiAgICAgIEM1LjA1MiwyMy42MzksMTYsMjkuNDkyLDE2LDI5LjQ5MlMyNi45NDgsMjMuNjM5LDI5LjgxNSwxNnoiIGZpbGw9IiNFQUQ5NjAiLz48L2c+PC9nPjxnIGlkPSJYTUxJRF8xMjAyXyI+PHBhdGggZD0iTTMwLjMwMiwxMC42OTdjLTAuNzk2LTMuNTQyLTMuOTU0LTYuMTg5LTcuNzM2LTYuMTg5Yy0yLjczLDAtNS4xMzksMS4zOC02LjU2NSwzLjQ4ICAgICBjLTEuNDI3LTIuMTAxLTMuODM1LTMuNDgtNi41NjYtMy40OEM1LjA1Miw0LjUwOCwxLjUsOC4wNiwxLjUsMTIuNDQyYzAsMS4zMzMsMC4zMDUsMi42MzIsMC44MTQsMy44ODJsMC4wMDEsMC4wMDEgICAgIGMtMC40NC0xLjcyLTAuNDcyLTMuNTExLDAuMjQyLTUuMzUzQzMuNDcsOC42MTYsNS41MzQsNi44MjEsNy45OTIsNi4yMzhjMy4yNTMtMC43NzEsNi4yODMsMC40Niw4LjEwNiwyLjcxMSAgICAgYzAuMjAxLDAuMjQ3LDAuNTc4LDAuMjc4LDAuNzc4LDAuMDI5YzEuNDU0LTEuODEyLDMuNjg2LTIuOTcxLDYuMTg4LTIuOTcxQzI2LjI5MSw2LjAwOCwyOS4wNjEsNy45MzUsMzAuMzAyLDEwLjY5N3oiIGZpbGw9IiM5RkU2RkYiLz48L2c+PC9nPjxnIGlkPSJYTUxJRF8xMTk4XyI+PGcgaWQ9IlhNTElEXzEyMDBfIj48cGF0aCBkPSJNNS40NDgsNi4wOGMtMC4xNzMsMC0wLjM0MS0wLjA5LTAuNDM0LTAuMjVDNC44NzYsNS41OTEsNC45NTgsNS4yODUsNS4xOTgsNS4xNDdMNS4zNSw1LjA2MiAgICAgYzAuMjQzLTAuMTM3LDAuNTQ1LTAuMDQ1LDAuNjc5LDAuMTk2QzYuMTYyLDUuNSw2LjA3NCw1LjgwNCw1LjgzMiw1LjkzN0w1LjY5OCw2LjAxM0M1LjYxOSw2LjA1OSw1LjUzMyw2LjA4LDUuNDQ4LDYuMDh6IiBmaWxsPSIjNDU1QTY0Ii8+PC9nPjxnIGlkPSJYTUxJRF8xMTk5XyI+PHBhdGggZD0iTTE2LDI5Ljk5MmMtMC4wODEsMC0wLjE2Mi0wLjAyLTAuMjM2LTAuMDU5QzE1LjE2MiwyOS42MTEsMSwyMS45MzUsMSwxMi40NDIgICAgIGMwLTIuMzA4LDAuOTE0LTQuNDYyLDIuNTczLTYuMDY1QzMuNzcyLDYuMTg2LDQuMDg4LDYuMTksNC4yOCw2LjM4OWMwLjE5MiwwLjE5OSwwLjE4NywwLjUxNi0wLjAxMiwwLjcwNyAgICAgQzIuODA2LDguNTEsMiwxMC40MDgsMiwxMi40NDJjMCw4LjI2MSwxMi4xNDMsMTUuNDMxLDE0LDE2LjQ3OWMxLjg1NS0xLjA0OCwxNC04LjIyMywxNC0xNi40NzljMC00LjEtMy4zMzUtNy40MzUtNy40MzUtNy40MzUgICAgIGMtMi40NjUsMC00Ljc2NSwxLjIxOS02LjE1MiwzLjI2MmMtMC4xODcsMC4yNzMtMC42NDEsMC4yNzMtMC44MjcsMGMtMS4zODctMi4wNDMtMy42ODctMy4yNjItNi4xNTMtMy4yNjIgICAgIGMtMC42MDEsMC0xLjE5NywwLjA3MS0xLjc3MSwwLjIxMmMtMC4yNywwLjA2My0wLjUzOS0wLjA5OC0wLjYwNS0wLjM2NkM2Ljk5Miw0LjU4NSw3LjE1Niw0LjMxNCw3LjQyNCw0LjI0OSAgICAgYzAuNjUzLTAuMTYsMS4zMjktMC4yNDEsMi4wMS0wLjI0MWMyLjU2NCwwLDQuOTcxLDEuMTYyLDYuNTY2LDMuMTQyYzEuNTk1LTEuOTc5LDQuMDAxLTMuMTQyLDYuNTY1LTMuMTQyICAgICBjNC42NTEsMCw4LjQzNSwzLjc4NCw4LjQzNSw4LjQzNWMwLDkuNDkyLTE0LjE2MiwxNy4xNjktMTQuNzY0LDE3LjQ5MUMxNi4xNjIsMjkuOTczLDE2LjA4MSwyOS45OTIsMTYsMjkuOTkyeiIgZmlsbD0iIzQ1NUE2NCIvPjwvZz48L2c+PC9nPjwvc3ZnPg==" alt="Ukrainian love">'
		);

		echo '.&nbsp';

		echo sprintf( __( 'Powered by %s', WL_THEME_ADMIN_DOMAIN ),

			'<a href="http://wordpress.org" target="_blank">WordPress</a>.'
		);
	}

	add_filter( 'admin_footer_text', 'wl_change_admin_footer_copyright_text_function' );
}

/**
 * Additional column with the image in the admin panel.
 */
if ( ! function_exists( 'wl_add_thumbnail_image_column_in_admin_list_table_function' ) ) {
	function wl_add_thumbnail_image_column_in_admin_list_table_function() {
		$post_type = 'post';
		// Add new column
		add_filter( 'manage_' . $post_type . '_posts_columns', function ( $columns ) {
			$new_columns = [];
			$i           = 0;
			foreach ( $columns as $key => $value ) {
				if ( $i == 1 ) {
					$new_columns['post_thumbs'] = __( 'Image' );
				}
				$new_columns[ $key ] = $value;
				$i ++;
			}

			return $new_columns;
		} );
		// Add image
		add_action( 'manage_' . $post_type . '_posts_custom_column', function ( $column_name, $id ) {
			if ( 'post_thumbs' === $column_name ) {
				$image_url = wp_get_attachment_image_url( get_post_thumbnail_id(), 'thumbnail' );
				echo '<img src="' . $image_url . '" height=40 />';
			}
		}, 10, 2 );
		//Add column style
		add_action( 'admin_head', function () {
			echo '<style type="text/css">#post_thumbs{text-align: center}.column-post_thumbs{text-align:center;width:7%!important;overflow:hidden}</style>';
		} );
	}

	add_action( 'admin_init', 'wl_add_thumbnail_image_column_in_admin_list_table_function' );
}

/**
 * Allows selection only one taxonomy.
 */
if ( ! function_exists( 'wl_only_one_taxonomy_can_be_selected_function' ) ) {
	function wl_only_one_taxonomy_can_be_selected_function( $term, $taxonomy ) {
		$taxonomies = array( 'services_cat' );

		if ( in_array( $taxonomy, $taxonomies, true ) ) {
			$selected_terms = get_terms( $taxonomy, array( 'object_ids' => $term['object_id'] ) );

			// If more than one term is selected, we leave only the first selected term
			if ( count( $selected_terms ) > 1 ) {
				$term_to_keep = reset( $selected_terms );
				wp_set_object_terms( $term['object_id'], $term_to_keep->term_id, $taxonomy );
			}
		}

		return $term;
	}

	//add_filter( 'pre_insert_term', 'wl_only_one_taxonomy_can_be_selected_function', 10, 2 );
}

/**
 * Change checkbox to radio in taxonomies.
 */
if ( ! function_exists( 'wl_change_checkbox_to_radio_in_taxonomies_list_function' ) ) {
	function wl_change_checkbox_to_radio_in_taxonomies_list_function() {
		$taxonomies = [ 'category' ]; //for which taxonomy to apply
		$cs         = get_current_screen();
		if ( $cs->base === 'post' && ( $taxonomies = array_intersect( get_object_taxonomies( $cs->post_type ),
				$taxonomies ) ) ) {
			$taxonomy[] = implode( $taxonomies );
			?>
            <script>
				<?= json_encode( $taxonomy ) ?>.forEach(function (taxname) {
                    jQuery('#' + taxname + 'div input[type="checkbox"]').prop('type', 'radio');
                })
            </script>
			<?php
		}
	}

	//add_action( 'admin_print_footer_scripts', 'wl_change_checkbox_to_radio_in_taxonomies_list_function', 99 );
}

/**
 * Do not show the selected taxonomy at the top of the list.
 */
if ( ! function_exists( 'wl_not_show_checked_tax_on_top_list_function' ) ) {
	function wl_not_show_checked_tax_on_top_list_function( $args ) {
		if ( ! isset( $args['checked_ontop'] ) ) {
			$args['checked_ontop'] = false;
		}

		return $args;
	}

	add_filter( 'wp_terms_checklist_args', 'wl_not_show_checked_tax_on_top_list_function', 10 );
}

/**
 * Change default wp_editor settings based on the assigned post types .
 */
if ( ! function_exists( 'wl_change_wp_editor_settings_function' ) ) {
	function wl_change_wp_editor_settings_function( $settings ) {
		$current_screen = get_current_screen();

		// Post types for which not should be change settings.
		$post_types = array( 'post', 'page' );

		if ( ! $current_screen || in_array( $current_screen->post_type, $post_types, true ) ) {
			return $settings;
		}

		$settings['media_buttons'] = false; //remove media buttons
		$settings['teeny']         = true; //minimal editor config

		return $settings;
	}

	add_filter( 'wp_editor_settings', 'wl_change_wp_editor_settings_function' );
}

/**
 * Get IP address
 */
if ( ! function_exists( 'wl_get_ip' ) ) {
	function wl_get_ip( $default = '' ) {
		if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
			$value = $_SERVER['HTTP_CLIENT_IP'];
		} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
			$value = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} elseif ( ! empty( $_SERVER['REMOTE_ADDR'] ) ) {
			$value = $_SERVER['REMOTE_ADDR'];
		} else {
			return $default;
		}

		return $value;
	}
}
