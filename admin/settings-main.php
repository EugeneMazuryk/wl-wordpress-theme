<?php
/*** Settings WordPress Admin Dashboard theme preferences ***/

/**
 * Add default Options.
 */
if ( ! function_exists( 'wl_default_theme_options_main' ) ) {
	function wl_default_theme_options_main() {
		return array(
			'enable_maintenance_page' => null,
			'disable_emojis'          => true,
			'disable_rss_feeds'       => true,
			'disable_search'          => null,
			'remove_archive'          => null,
			'disable_theme_functions' => null,
		);
	}
}

/**
 * Initializes the WordPress dashboard options page.
 */
if ( ! function_exists( 'wl_init_theme_main_settings_function' ) ) {
	function wl_init_theme_main_settings_function() {
		add_settings_section(
			'wl_theme_options_main',
			false,
			'wl_main_section_description_callback',
			'wl_theme_options_main'
		);

		add_settings_field(
			'enable_maintenance_page',
			__( 'Enable maintenance page', WL_THEME_ADMIN_DOMAIN ),
			'checkbox_enable_maintenance_page_callback',
			'wl_theme_options_main',
			'wl_theme_options_main',
			array(
				__( 'Enable maintenance page on WordPress site', WL_THEME_ADMIN_DOMAIN ),
			)
		);

		add_settings_field(
			'disable_emojis',
			__( 'Disable emojis', WL_THEME_ADMIN_DOMAIN ),
			'checkbox_disable_emojis_callback',
			'wl_theme_options_main',
			'wl_theme_options_main',
			array(
				__( 'Disable Emojis in WordPress theme', WL_THEME_ADMIN_DOMAIN ),
			)
		);

		add_settings_field(
			'disable_rss_feeds',
			__( 'Disable RSS Feeds', WL_THEME_ADMIN_DOMAIN ),
			'checkbox_disable_rss_feeds_callback',
			'wl_theme_options_main',
			'wl_theme_options_main',
			array(
				__( 'Disable RSS Feeds in WordPress theme', WL_THEME_ADMIN_DOMAIN ),
			)
		);

		add_settings_field(
			'disable_search',
			__( 'Disable search page', WL_THEME_ADMIN_DOMAIN ),
			'checkbox_disable_search_page_callback',
			'wl_theme_options_main',
			'wl_theme_options_main',
			array(
				__( 'Disable search page in WordPress theme and redirect all requests to 404 page', WL_THEME_ADMIN_DOMAIN ),
			)
		);

		add_settings_field(
			'remove_archive',
			__( 'Remove archives', WL_THEME_ADMIN_DOMAIN ),
			'checkbox_remove_archive_callback',
			'wl_theme_options_main',
			'wl_theme_options_main',
			array(
				__( 'Archive pages will be disabled and all links will be redirected to the main page', WL_THEME_ADMIN_DOMAIN ),
			)
		);

		add_settings_field(
			'disable_theme_functions',
			__( 'Вимкнути всі зміни', WL_THEME_ADMIN_DOMAIN ),
			'checkbox_disable_theme_functions_callback',
			'wl_theme_options_main',
			'wl_theme_options_main',
			array(
				__( 'Вимкнути всі зміни, які додаються темою і змінюють стандартну поведінку WordPress', WL_THEME_ADMIN_DOMAIN ),
			)
		);

		if ( ! get_option( 'wl_theme_options_main' ) ) {
			add_option( 'wl_theme_options_main', wl_default_theme_options_main() );
		}

		register_setting(
			'wl_theme_options_main',
			'wl_theme_options_main'
		);
	}

	add_action( 'admin_init', 'wl_init_theme_main_settings_function' );
}

/** ------------------------------------------------------------------------------------------------------------------ *
 * Settings callback functions
 * ----------------------------------------------------------------------------------------------------------------- **/

/**
 * Simple description for the Other Settings page.
 */
function wl_main_section_description_callback() {
	echo '<p>' . __( 'Select which theme settings to make it as easy as possible to configure it to suit your needs.',
			WL_THEME_ADMIN_DOMAIN ) . '</p><hr>';
}

/**
 * Main settings input fields.
 */
function checkbox_enable_maintenance_page_callback( $args ) {
	$options = get_option( 'wl_theme_options_main' );

	$html = '<input type="checkbox" id="enable_maintenance_page" name="wl_theme_options_main[enable_maintenance_page]" value="1" ' . checked( 1,
			$options['enable_maintenance_page'] ?? 0, false ) . '/>';
	$html .= '<label for="enable_maintenance_page">&nbsp;' . $args[0] . '</label>';

	echo $html;
}

function checkbox_disable_emojis_callback( $args ) {
	$options = get_option( 'wl_theme_options_main' );

	$html = '<input type="checkbox" id="disable_emojis" name="wl_theme_options_main[disable_emojis]" value="1" ' . checked( 1,
			$options['disable_emojis'] ?? 0, false ) . '/>';
	$html .= '<label for="disable_emojis">&nbsp;' . $args[0] . '</label>';

	echo $html;
}

function checkbox_disable_rss_feeds_callback( $args ) {
	$options = get_option( 'wl_theme_options_main' );

	$html = '<input type="checkbox" id="disable_rss_feeds" name="wl_theme_options_main[disable_rss_feeds]" value="1" ' . checked( 1,
			$options['disable_rss_feeds'] ?? 0, false ) . '/>';
	$html .= '<label for="disable_rss_feeds">&nbsp;' . $args[0] . '</label>';

	echo $html;
}

function checkbox_disable_search_page_callback( $args ) {
	$options = get_option( 'wl_theme_options_main' );

	$html = '<input type="checkbox" id="disable_search" name="wl_theme_options_main[disable_search]" value="1" ' . checked( 1,
			$options['disable_search'] ?? 0, false ) . '/>';
	$html .= '<label for="disable_search">&nbsp;' . $args[0] . '</label>';

	echo $html;
}

function checkbox_remove_archive_callback( $args ) {
	$options = get_option( 'wl_theme_options_main' );

	$html = '<input type="checkbox" id="remove_archive" name="wl_theme_options_main[remove_archive]" value="1" ' . checked( 1,
			$options['remove_archive'] ?? 0, false ) . '/>';
	$html .= '<label for="remove_archive">&nbsp;' . $args[0] . '</label>';

	echo $html;
}

function checkbox_disable_theme_functions_callback( $args ) {
	$options = get_option( 'wl_theme_options_main' );

	$html = '<input type="checkbox" id="disable_theme_functions" name="wl_theme_options_main[disable_theme_functions]" value="1" ' . checked( 1,
			$options['disable_theme_functions'] ?? 0, false ) . '/>';
	$html .= '<label for="disable_theme_functions">&nbsp;' . $args[0] . '</label>';

	echo $html;
}

/** ------------------------------------------------------------------------------------------------------------------ *
 * Theme Other Settings functions
 * ----------------------------------------------------------------------------------------------------------------- **/

/**
 * Enable maintenance page on site function
 */
if ( ! function_exists( 'wl_enable_site_maintenance_page_function' ) ) {
	function wl_enable_site_maintenance_page_function() {
		global $pagenow;

		if ( isset( get_option( 'wl_theme_options_main' )['disable_theme_functions'] ) ) {
			return;
		}

		if ( isset( get_option( 'wl_theme_options_main' )['enable_maintenance_page'] ) && ! is_user_logged_in() && $pagenow !== 'wp-login.php' && $pagenow !== 'wp-admin.php' ) {
			?>
            <!doctype html>
            <title>
				<?php esc_html_e( 'Website maintenance', WL_THEME_ADMIN_DOMAIN ); ?>
            </title>
            <style>
                body {
                    text-align: center;
                    padding: 150px;
                }

                h1 {
                    font-size: 50px;
                }

                body {
                    font: 20px Helvetica, sans-serif;
                    color: #333;
                }

                article {
                    display: block;
                    text-align: left;
                    width: 650px;
                    margin: 0 auto;
                }

                a {
                    color: #dc8100;
                    text-decoration: none;
                }

                a:hover {
                    color: #333;
                    text-decoration: none;
                }
            </style>

            <article>
                <h1>
					<?php esc_html_e( 'We&rsquo;ll be back soon!', WL_THEME_ADMIN_DOMAIN ); ?>
                </h1>
                <div>
                    <p>
						<?php esc_html_e( 'Sorry for the inconvenience but we&rsquo;re performing some maintenance at the moment. We&rsquo;ll be back online shortly!', WL_THEME_ADMIN_DOMAIN ); ?>
                    </p>
                    <p>
                        &mdash; <?php esc_html_e( get_bloginfo( 'name' ) ); ?>
                    </p>
                </div>
            </article>
			<?php
			exit;
		}
	}

	add_action( 'template_redirect', 'wl_enable_site_maintenance_page_function' );
}

/**
 * Disable emoji's function
 */
if ( ! function_exists( 'wl_disable_emojis_function' ) ) {
	function wl_disable_emojis_function() {

		if ( isset( get_option( 'wl_theme_options_main' )['disable_theme_functions'] ) ) {
			return;
		}

		if ( isset( get_option( 'wl_theme_options_main' )['disable_emojis'] ) ) {
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
			remove_action( 'admin_print_styles', 'print_emoji_styles' );
			remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
			remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
			remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

			/**
			 * Filter function used to remove the tinymce emoji plugin.
			 */
			add_filter( 'tiny_mce_plugins', 'wl_disable_emojis_tinymce_function' );
			function wl_disable_emojis_tinymce_function( $plugins ) {
				if ( is_array( $plugins ) ) {
					return array_diff( $plugins, array( 'wpemoji' ) );
				} else {
					return array();
				}
			}

			/**
			 * Remove emoji CDN hostname from DNS prefetching hints.
			 */
			add_filter( 'wp_resource_hints', 'wl_disable_emojis_remove_dns_prefetch_function', 10, 2 );
			function wl_disable_emojis_remove_dns_prefetch_function( $urls, $relation_type ) {
				if ( 'dns-prefetch' === $relation_type ) {
					/** This filter is documented in wp-includes/formatting.php */
					$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

					$urls = array_diff( $urls, array( $emoji_svg_url ) );
				}

				return $urls;
			}
		}
	}

	add_action( 'init', 'wl_disable_emojis_function' );
}

/**
 * Disable RSS Feeds
 */
if ( ! function_exists( 'wl_disable_rss_feeds_function' ) ) {
	function wl_disable_rss_feeds_function() {

		if ( isset( get_option( 'wl_theme_options_main' )['disable_theme_functions'] ) ) {
			return;
		}

		if ( isset( get_option( 'wl_theme_options_main' )['disable_rss_feeds'] ) ) {
			global $wp_rewrite;
			$wp_rewrite->feeds = array();

			add_action( 'wp_head', 'remove_feed_links_from_wp_head', 1 );
			function remove_feed_links_from_wp_head() {
				remove_action( 'wp_head', 'feed_links', 2 );
				remove_action( 'wp_head', 'feed_links_extra', 3 );
			}

			foreach ( array( 'rdf', 'rss', 'rss2', 'atom' ) as $feed ) {
				add_action( 'do_feed_' . $feed, 'remove_feeds', 1 );
			}

			unset( $feed );

			function remove_feeds() {
				wp_safe_redirect( home_url(), 302 );
				exit();
			}

			flush_rewrite_rules();
		}
	}

	add_action( 'init', 'wl_disable_rss_feeds_function' );
}

/**
 * Disable search page function
 */
if ( ! function_exists( 'wl_disable_search_page_function' ) ) {
	function wl_disable_search_page_function( $query ) {

		if ( isset( get_option( 'wl_theme_options_main' )['disable_theme_functions'] ) ) {
			return;
		}

		if ( isset( get_option( 'wl_theme_options_main' )['disable_search'] ) && ! is_admin() ) {
			if ( $query->is_search ) {
				$query->is_search = false;
				$query->set_404();
				status_header( 404 );
			}
		}
	}

	add_action( 'pre_get_posts', 'wl_disable_search_page_function' );
}

/**
 * Remove archives pages function
 */
if ( ! function_exists( 'wl_remove_archives_function' ) ) {
	function wl_remove_archives_function( $query ) {

		if ( isset( get_option( 'wl_theme_options_main' )['disable_theme_functions'] ) ) {
			return;
		}

		if ( isset( get_option( 'wl_theme_options_main' )['remove_archive'] ) && ! is_admin() ) {
			if ( is_date() || is_category() || is_tag() || is_author() || is_post_type_archive() ) {
				wp_redirect( home_url() );
				exit;
			}
		}
	}

	add_action( 'parse_query', 'wl_remove_archives_function' );
}
