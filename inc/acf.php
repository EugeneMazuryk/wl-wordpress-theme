<?php
/**
 * Advanced Custom Field functions which enhance the theme by hooking into WordPress
 */

if ( ! class_exists( 'ACF' ) ) {
	return;
}

/**
 * Disable update notification
 */
if ( ! function_exists( 'wl_disable_plugin_updates_notification_acf_function' ) ) {
	function wl_disable_plugin_updates_notification_acf_function( $value ) {
		if ( $value ) {
			unset( $value->response['advanced-custom-fields-pro/acf.php'] );
		}

		return $value;
	}

	add_filter( 'site_transient_update_plugins', 'wl_disable_plugin_updates_notification_acf_function' );
}

/**
 * Disable plugin deactivation
 */
if ( ! function_exists( 'wl_disable_plugin_deactivation_acf_function' ) ) {
	function wl_disable_plugin_deactivation_acf_function( $actions, $plugin_file ) {
		unset( $actions['edit'] );

		$important_plugins = [
			'advanced-custom-fields-pro/acf.php',
		];

		if ( in_array( $plugin_file, $important_plugins ) ) {
			unset( $actions['deactivate'] );
			$actions['info'] = '<b class="musthave_js">' . esc_html__( 'Plugin is required for the site',
					THEME_DOMAIN ) . '</b>';
		}

		return $actions;
	}

	add_filter( 'plugin_action_links', 'wl_disable_plugin_deactivation_acf_function', 10, 2 );
}

/**
 * Delete group actions: deactivate and delete
 */
if ( ! function_exists( 'wl_disable_plugin_deactivation_hide_checkbox_acf_function' ) ) {
	function wl_disable_plugin_deactivation_hide_checkbox_acf_function( $actions ) {
		?>
        <script>
            jQuery(function ($) {
                $('.musthave_js').closest('tr').find('input[type="checkbox"]').remove();
            });
        </script>
		<?php
	}

	add_filter( 'admin_print_footer_scripts-plugins.php', 'wl_disable_plugin_deactivation_hide_checkbox_acf_function' );
}

/**
 * ACF options page "Theme settings" in admin menu
 */
if ( ! function_exists( 'wl_acf_init_options_page_function' ) ) {
	function wl_acf_init_options_page_function() {
		if ( function_exists( 'acf_add_options_page' ) ) {
			if ( ! function_exists( 'pll_the_languages' ) ) {
				acf_add_options_sub_page( array(
					'page_title'      => esc_html__( 'Theme Settings', WL_THEME_ADMIN_DOMAIN ),
					'menu_title'      => esc_html__( 'Edit Theme', WL_THEME_ADMIN_DOMAIN ),
					'menu_slug'       => 'theme-general-settings',
					'capability'      => 'edit_posts',
					'update_button'   => __( 'Update', 'acf' ),
					'updated_message' => __( 'Options Updated', 'acf' ),
					'parent'          => 'wl_theme_options',
					'position'        => 0,
				) );
			} else {
				if ( pll_default_language() ) {
					$languages = wp_list_sort( pll_the_languages(
						array(
							'hide_if_empty' => 0,
							'raw'           => 1
						)
					), 'current_lang', 'DESC' );

					$position = 0;
					foreach ( $languages as $lang ) {
						$lang_slug = $lang['slug'];
						$lang_name = $lang['name'];

						acf_add_options_sub_page( array(
							'page_title'      => esc_html__( 'Theme Settings', WL_THEME_ADMIN_DOMAIN ) . ' (' . $lang_name . ')',
							'menu_title'      => esc_html__( 'Edit Theme', WL_THEME_ADMIN_DOMAIN ) . ' (' . $lang_name . ')',
							'menu_slug'       => $lang['slug'] === pll_default_language() ? 'theme-general-settings' : 'theme-general-settings-' . $lang_slug,
							'capability'      => 'edit_posts',
							'update_button'   => __( 'Update', 'acf' ),
							'updated_message' => __( 'Options Updated', 'acf' ),
							'post_id'         => $lang['slug'] === pll_default_language() ? 'options' : 'options_' . $lang_slug,
							'parent'          => 'wl_theme_options',
							'position'        => $position ++
						) );
					}
				}
			}
		}
	}

	add_action( 'init', 'wl_acf_init_options_page_function' );
}

/**
 * Get ACF option field with Polylang
 *
 * @param bool $selector
 *
 * @return false|mixed
 */
function wl_get_option_field( $selector = false ) {
	$value = false;

	if ( $selector ) {
		if ( function_exists( 'pll_current_language' ) ) {
			$value = get_field( $selector,
				pll_default_language() === pll_current_language( 'slug' ) ? 'option' : 'options_' . pll_current_language( 'slug' ) );
		}

		if ( $value ) {
			return $value;
		} else {
			return get_field( $selector, 'option' );
		}
	}

	return false;
}

/**
 * Helper echo ACF link.
 */
if ( ! function_exists( 'wl_the_acf_link' ) ) {
	function wl_the_acf_link( $link, array $args = null, $before = null, $after = null ) {
		if ( $link ) {
			$html = '<a href="' . $link['url'] . '"';

			if ( $args ) {
				foreach ( $args as $name => $value ) {
					$html .= " $name=" . '"' . $value . '"';
				}
			}

			if ( $link['target'] ) {
				$html .= esc_attr( ' target="' . $link['target'] . '"' );
			}

			$html .= '>' . $before . esc_html( $link['title'] ) . $after . '</a>';

			echo $html;
		}

		return null;
	}
}

/**
 * Helper echo ACF repeater social links.
 */
if ( ! function_exists( 'wl_the_acf_social_links' ) ) {
	function wl_the_acf_social_links( $repeater ) {
		if ( $repeater ) {
			$html = '';

			foreach ( $repeater as $item ) {
				switch ( $item['site'] ) {
					case 'facebook' :
						$html .= '<a href="' . esc_url( $item['url'] ) . '" target="_blank" rel="nofollow">' . esc_html( $item['title'] ) . '</a>';
						break;
					case 'instagram' :
						$html .= '<a href="' . esc_url( $item['url'] ) . '" target="_blank" rel="nofollow">' . esc_html( $item['title'] ) . '</a>';
						break;
					case 'twitter' :
						$html .= '<a href="' . esc_url( $item['url'] ) . '" target="_blank" rel="nofollow">' . esc_html( $item['title'] ) . '</a>';
						break;
					case 'linkedIn' :
						$html .= '<a href="' . esc_url( $item['url'] ) . '" target="_blank" rel="nofollow">' . esc_html( $item['title'] ) . '</a>';
						break;
					case 'telegram' :
						$html .= '<a href="' . esc_url( $item['url'] ) . '" target="_blank" rel="nofollow">' . esc_html( $item['title'] ) . '</a>';
						break;
					case 'viber' :
						$html .= '<a href="' . esc_url( $item['url'] ) . '" target="_blank" rel="nofollow">' . esc_html( $item['title'] ) . '</a>';
						break;
					case 'pinterest' :
						$html .= '<a href="' . esc_url( $item['url'] ) . '" target="_blank" rel="nofollow">' . esc_html( $item['title'] ) . '</a>';
						break;
					case 'youtube' :
						$html .= '<a href="' . esc_url( $item['url'] ) . '" target="_blank" rel="nofollow">' . esc_html( $item['title'] ) . '</a>';
						break;
					case 'behance' :
						$html .= '<a href="' . esc_url( $item['url'] ) . '" target="_blank" rel="nofollow">' . esc_html( $item['title'] ) . '</a>';
						break;
					case 'tiktok' :
						$html .= '<a href="' . esc_url( $item['url'] ) . '" target="_blank" rel="nofollow">' . esc_html( $item['title'] ) . '</a>';
						break;
				}
			}

			echo $html;
		}

		return null;
	}
}

/**
 * Helper copy ACF fields to posts.
 */
if ( ! function_exists( 'wl_copy_acf_fields' ) ) {
	function wl_copy_acf_fields( $source_post_id, $target_post_ids = array(), $acf_fields = array(), $post_type = '', $lang = '' ) {
		if ( ! get_post( $source_post_id ) ) {
			return;
		}

		if ( empty( $acf_fields ) ) {
			$acf_fields = array_keys( get_field_objects( $source_post_id ) );
		}

		if ( empty( $target_post_ids ) && ! empty( $post_type ) ) {
			$args = array(
				'post_type'      => $post_type,
				'post__not_in'   => array( $source_post_id ),
				'posts_per_page' => - 1,
			);

			if ( ! empty( $lang ) ) {
				$args['lang'] = $lang;
			}

			$target_posts = get_posts( $args );

			foreach ( $target_posts as $post ) {
				$target_post_ids[] = $post->ID;
			}
		}

		if ( empty( $target_post_ids ) ) {
			return;
		}

		foreach ( $acf_fields as $field_key ) {
			$field_value = get_field( $field_key, $source_post_id );

			foreach ( $target_post_ids as $target_post_id ) {
				if ( get_post_type( $target_post_id ) === $post_type && ( empty( $lang ) || pll_get_post_language( $target_post_id ) === $lang ) ) {
					update_field( $field_key, $field_value, $target_post_id );
				}
			}
		}
	}
}

/**
 * Output thumbnails in the Relationship type field from the ACF
 */
if ( ! function_exists( 'wl_acf_relationship_thumbnails_function' ) ) {
	function wl_acf_relationship_thumbnails_function( $title, $post, $field, $the_post ) {
		$image = '';
		if ( $post->post_type == 'attachment' ) {
			$image = wp_get_attachment_image( $post->ID, 'acf-thumb' );
		} else {
			if ( $post->post_type == 'project' ) {
				$image = wp_get_attachment_image_url( get_field( 'imgs', $post->ID )[0] );
				$image = '<img src="' . $image . '" alt="">';
			} else {
				$image = get_the_post_thumbnail( $post->ID, 'acf-thumb' );
			}
		}
		$title = preg_replace( "/(.*\<div class=\"thumbnail\"\>)(.*)(\<\/div\>.*)/", "$1$image$3", $title );

		return $title;
	}

	//add_filter( 'acf/fields/relationship/result', 'wl_acf_relationship_thumbnails_function', 10, 4 );
}

/**
 * Custom ACF css styles
 */
if ( ! function_exists( 'wl_acf_admin_custom_styles_function' ) ) {
	function wl_acf_admin_custom_styles_function() {
		?>
        <style type="text/css">

            /* Editor */
            .acf-editor-wrap iframe {
                height: 200px !important;
                min-height: 200px;
            }

            /* Image */
            .acf-field-image .acf-input {
                display: flex;
                justify-content: center;
            }

            /* Gallery */
            .acf-gallery {
                height: 235px !important;
            }

            /* Flexible content */
            /*
            .acf-flexible-content .layout .acf-fc-layout-handle {
                background-color: #202428;
                color: #eee;
            }
            */

        </style>
		<?php
	}

	add_action( 'acf/input/admin_footer', 'wl_acf_admin_custom_styles_function' );
}
