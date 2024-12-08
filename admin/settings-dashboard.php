<?php
/*** Settings WordPress Admin Dashboard theme preferences ***/

/**
 * Add default Options.
 */
if ( ! function_exists( 'wl_default_theme_options_dashboard' ) ) {
	function wl_default_theme_options_dashboard() {
		return array(
			'disable_admin_notices' => true,
			'change_toolbar'        => true,
			'remove_admin_widgets'  => true,
			'block_access_by_ip'    => null,
			'allowed_ip_addresses'  => '127.0.0.1',
			'disable_gutenberg'     => null,
		);
	}
}

/**
 * Initializes the WordPress dashboard options page.
 */
if ( ! function_exists( 'wl_init_theme_dashboard_settings_function' ) ) {
	function wl_init_theme_dashboard_settings_function() {
		add_settings_section(
			'wl_theme_options_dashboard',
			false,
			'wl_dashboard_section_description_callback',
			'wl_theme_options_dashboard'
		);

		add_settings_field(
			'disable_admin_notices',
			__( 'Disable dashboard notices', WL_THEME_ADMIN_DOMAIN ),
			'checkbox_disable_admin_notices_callback',
			'wl_theme_options_dashboard',
			'wl_theme_options_dashboard',
			array(
				__( 'Disable all dashboard notices in WordPress theme', WL_THEME_ADMIN_DOMAIN ),
			)
		);

		add_settings_field(
			'remove_admin_widgets',
			__( 'Disable dashboard widgets', WL_THEME_ADMIN_DOMAIN ),
			'checkbox_remove_admin_widgets_callback',
			'wl_theme_options_dashboard',
			'wl_theme_options_dashboard',
			array(
				__( 'Remove all dashboard widgets (except Site Health, Right Now, Activity and Woocommerce status)',
					WL_THEME_ADMIN_DOMAIN ),
			)
		);

		add_settings_field(
			'change_toolbar',
			__( 'Change Toolbar', WL_THEME_ADMIN_DOMAIN ),
			'checkbox_change_toolbar_callback',
			'wl_theme_options_dashboard',
			'wl_theme_options_dashboard',
			array(
				__( 'Change default WordPress Toolbar and clear menu items', WL_THEME_ADMIN_DOMAIN ),
			)
		);

		add_settings_field(
			'block_access_by_ip',
			__( 'Блокувати доступ по IP', WL_THEME_ADMIN_DOMAIN ),
			'checkbox_block_access_by_ip_callback',
			'wl_theme_options_dashboard',
			'wl_theme_options_dashboard',
			array(
				__( 'Доступ в адмін частину сайту буде дозволений тільки вказаним у списку IP адресам', WL_THEME_ADMIN_DOMAIN ),
			)
		);

		add_settings_field(
			'allowed_ip_addresses',
			__( 'Дозволені IP адреси:', WL_THEME_ADMIN_DOMAIN ),
			'textarea_allowed_ip_addresses_callback',
			'wl_theme_options_dashboard',
			'wl_theme_options_dashboard',
			array(
				__( 'Список IP адрес, яким буде дозволено переходити в адмін частину сайту', WL_THEME_ADMIN_DOMAIN ),
			)
		);

		add_settings_field(
			'disable_gutenberg',
			__( 'Disable Gutenberg', WL_THEME_ADMIN_DOMAIN ),
			'checkbox_disable_gutenberg_callback',
			'wl_theme_options_dashboard',
			'wl_theme_options_dashboard',
			array(
				__( 'Replace the Gutenberg editor with the classic WordPress editor', WL_THEME_ADMIN_DOMAIN ),
			)
		);

		if ( ! get_option( 'wl_theme_options_dashboard' ) ) {
			add_option( 'wl_theme_options_dashboard', wl_default_theme_options_dashboard() );
		}

		register_setting(
			'wl_theme_options_dashboard',
			'wl_theme_options_dashboard'
		);
	}

	add_action( 'admin_init', 'wl_init_theme_dashboard_settings_function' );
}

/** ------------------------------------------------------------------------------------------------------------------ *
 * Settings callback functions
 * ----------------------------------------------------------------------------------------------------------------- **/

/**
 * Simple description for the Other Settings page.
 */
function wl_dashboard_section_description_callback() {
	echo '<p>' . __( 'Select which dashboard settings to make it as easy as possible to configure it to suit your needs.',
			WL_THEME_ADMIN_DOMAIN ) . '</p><hr>';
}

/**
 * Other settings input fields.
 */
function checkbox_disable_admin_notices_callback( $args ) {
	$options = get_option( 'wl_theme_options_dashboard' );

	$html = '<input type="checkbox" id="disable_admin_notices" name="wl_theme_options_dashboard[disable_admin_notices]" value="1" ' . checked( 1,
			$options['disable_admin_notices'] ?? 0, false ) . '/>';
	$html .= '<label for="disable_admin_notices">&nbsp;' . $args[0] . '</label>';

	echo $html;
}

function checkbox_remove_admin_widgets_callback( $args ) {
	$options = get_option( 'wl_theme_options_dashboard' );

	$html = '<input type="checkbox" id="remove_admin_widgets" name="wl_theme_options_dashboard[remove_admin_widgets]" value="1" ' . checked( 1,
			$options['remove_admin_widgets'] ?? 0, false ) . '/>';
	$html .= '<label for="remove_admin_widgets">&nbsp;' . $args[0] . '</label>';

	echo $html;
}

function checkbox_change_toolbar_callback( $args ) {
	$options = get_option( 'wl_theme_options_dashboard' );

	$html = '<input type="checkbox" id="change_toolbar" name="wl_theme_options_dashboard[change_toolbar]" value="1" ' . checked( 1,
			$options['change_toolbar'] ?? 0, false ) . '/>';
	$html .= '<label for="change_toolbar">&nbsp;' . $args[0] . '</label>';

	echo $html;
}

function checkbox_block_access_by_ip_callback( $args ) {
	$options = get_option( 'wl_theme_options_dashboard' );

	$html = '<input type="checkbox" id="block_access_by_ip" name="wl_theme_options_dashboard[block_access_by_ip]" value="1" ' . checked( 1,
			$options['block_access_by_ip'] ?? 0, false ) . '/>';
	$html .= '<label for="block_access_by_ip">&nbsp;' . $args[0] . '</label>';

	echo $html;
}

function textarea_allowed_ip_addresses_callback( $args ) {
	$options = get_option( 'wl_theme_options_dashboard' );

	$html = '<p class="description">' . $args[0] . '</p>';
	$html .= '<textarea name="wl_theme_options_dashboard[allowed_ip_addresses]" id="allowed_ip_addresses" cols="60" rows="5">' . esc_html( $options['allowed_ip_addresses'] ?? '' ) . '</textarea>';
	$html .= '<p><a href="#" class="button button-small button-secondary">' . __( 'Додайте свій IP', WL_THEME_ADMIN_DOMAIN ) . '</a></p>';

	echo $html;
}

function checkbox_disable_gutenberg_callback( $args ) {
	$options = get_option( 'wl_theme_options_dashboard' );

	$html = '<input type="checkbox" id="disable_gutenberg" name="wl_theme_options_dashboard[disable_gutenberg]" value="1" ' . checked( 1,
			$options['disable_gutenberg'] ?? 0, false ) . '/>';
	$html .= '<label for="disable_gutenberg">&nbsp;' . $args[0] . '</label>';

	echo $html;
}

/** ------------------------------------------------------------------------------------------------------------------ *
 * Theme Other Settings functions
 * ----------------------------------------------------------------------------------------------------------------- **/

/**
 * Disable admin notices function
 */
if ( ! function_exists( 'wl_disable_admin_notices_function' ) ) {
	function wl_disable_admin_notices_function() {

		if ( isset( get_option( 'wl_theme_options_main' )['disable_theme_functions'] ) ) {
			return;
		}

		if ( isset( get_option( 'wl_theme_options_dashboard' )['disable_admin_notices'] ) ) {
			remove_all_actions( 'admin_notices' );
			remove_all_actions( 'all_admin_notices' );
		}
	}

	add_action( 'in_admin_header', 'wl_disable_admin_notices_function', 1000 );
}

/**
 * Remove dashboard widgets function
 */
if ( ! function_exists( 'wl_remove_admin_widgets_function' ) ) {
	function wl_remove_admin_widgets_function() {

		if ( isset( get_option( 'wl_theme_options_main' )['disable_theme_functions'] ) ) {
			return;
		}

		if ( isset( get_option( 'wl_theme_options_dashboard' )['remove_admin_widgets'] ) ) {
			global $wp_meta_boxes;

			$except_widgets = wl_get_allowed_dashboard_widgets();

			foreach ( $wp_meta_boxes['dashboard'] as $box_key => $box ) {
				if ( 'normal' !== $box_key ) {
					unset( $wp_meta_boxes['dashboard'][ $box_key ] );
				} else {
					foreach ( $box as $key_inbox => $inbox ) {
						if ( 'core' !== $key_inbox ) {
							unset( $wp_meta_boxes['dashboard'][ $box_key ][ $key_inbox ] );
						}
					}
				}
			}

			$wp_meta_boxes['dashboard']['normal']['core'] = array_intersect_key(
				$wp_meta_boxes['dashboard']['normal']['core'],
				array_flip( $except_widgets )
			);

			remove_action( 'welcome_panel', 'wp_welcome_panel' );
		}
	}

	add_action( 'wp_dashboard_setup', 'wl_remove_admin_widgets_function', 99 );
}

/**
 * Change Toolbar function
 */
if ( ! function_exists( 'wl_change_toolbar_function' ) ) {
	function wl_change_toolbar_function() {

		if ( isset( get_option( 'wl_theme_options_main' )['disable_theme_functions'] ) ) {
			return;
		}

		if ( isset( get_option( 'wl_theme_options_dashboard' )['change_toolbar'] ) ) {
			// Disable admin bar items
			if ( ! function_exists( 'wl_disable_admin_bar_items_function' ) ) {
				function wl_disable_admin_bar_items_function() {
					global $wp_admin_bar;

					// Disable items
					$wp_admin_bar->remove_menu( 'about' );
					$wp_admin_bar->remove_menu( 'wporg' );
					$wp_admin_bar->remove_menu( 'support-forums' );
					$wp_admin_bar->remove_menu( 'feedback' );
				}

				add_action( 'wp_before_admin_bar_render', 'wl_disable_admin_bar_items_function' );
			}

			remove_action( 'wp_head', '_admin_bar_bump_cb' ); // html margin bumps
			add_action( 'wp_before_admin_bar_render', function () {
				if ( is_admin() ) {
					return;
				}
				ob_start();
				?>
                <style>
                    #wpadminbar {
                        background: 0 0;
                        float: left;
                        width: auto;
                        height: auto;
                        bottom: 0;
                        min-width: 0 !important
                    }

                    #wpadminbar > * {
                        float: left !important;
                        clear: both !important
                    }

                    #wpadminbar .ab-top-menu li {
                        float: none !important
                    }

                    #wpadminbar .ab-top-secondary {
                        float: none !important
                    }

                    #wpadminbar .ab-top-menu > .menupop > .ab-sub-wrapper {
                        top: 0;
                        left: 100%;
                        white-space: nowrap
                    }

                    #wpadminbar .quicklinks > ul > li > a {
                        padding-right: 17px
                    }

                    #wpadminbar .ab-top-secondary .menupop .ab-sub-wrapper {
                        left: 100%;
                        right: auto
                    }

                    html {
                        margin-top: 0 !important
                    }

                    #wpadminbar {
                        overflow: hidden;
                        width: 33px;
                        height: 30px
                    }

                    #wpadminbar:hover {
                        overflow: visible;
                        width: auto;
                        height: auto;
                        background: rgba(102, 102, 102, .9)
                    }

                    #wp-admin-bar-wp-logo {
                        display: none
                    }

                    #wp-admin-bar-search {
                        display: none
                    }
                </style>
				<?php
				$styles = ob_get_clean();

				echo preg_replace( '/[\n\t]/', '', $styles ) . "\n";
			} );
		}
	}

	add_action( 'admin_bar_init', 'wl_change_toolbar_function' );
}

/**
 * Disable Gutenberg editor function
 */
if ( ! function_exists( 'wl_disable_gutenberg_editor_function' ) ) {
	function wl_disable_gutenberg_editor_function( $can_edit, $post ) {

		if ( isset( get_option( 'wl_theme_options_main' )['disable_theme_functions'] ) ) {
			return;
		}

		// Page templates array
		$page_templates = array( 'template-pages/home.php' );
		if ( 'page' === $post->post_type ) {
			if ( in_array( get_page_template_slug( $post->ID ), $page_templates, true ) ) {
				return false;
			}
		}
		if ( isset( get_option( 'wl_theme_options_dashboard' )['disable_gutenberg'] ) ) {
			return false;
		}

		return $can_edit;
	}

	add_filter( 'use_block_editor_for_post', 'wl_disable_gutenberg_editor_function', 10, 2 );
}

/**
 * Admin panel access blocking by IP address.
 */
if ( ! function_exists( 'wl_admin_panel_blocking_by_ip_function' ) ) {
	function wl_admin_panel_blocking_by_ip_function() {

		if ( isset( get_option( 'wl_theme_options_main' )['disable_theme_functions'] ) || ! isset( get_option( 'wl_theme_options_dashboard' )['block_access_by_ip'] ) ) {
			return;
		}

		$ip_addresses = get_option( 'wl_theme_options_dashboard' )['allowed_ip_addresses'];

		if ( ! $ip_addresses ) {
			return;
		}

		$ip_addresses_array = explode( PHP_EOL, $ip_addresses );

		if ( ! in_array( wl_get_ip(), $ip_addresses_array ) && is_admin() && ! wp_doing_ajax() ) {
			?>
            <!doctype html>
            <title>
				<?php esc_html_e( 'Access Denied', WL_THEME_ADMIN_DOMAIN ); ?>
            </title>
            <style>
                html {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100%;
                    margin: 0;
                }

                h1 {
                    font-size: 50px;
                    color: #333;
                }

                body {
                    font: 20px Helvetica, sans-serif;
                    color: #333;
                    text-align: center;
                }
            </style>

            <article>
                <h1>
                    <span>
                        <svg width="32px" height="32px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="icon-114-lock" fill="#000000">
                                    <path d="M16,21.9146472 L16,24.5089948 C16,24.7801695 16.2319336,25 16.5,25 C16.7761424,25 17,24.7721195 17,24.5089948 L17,21.9146472 C17.5825962,21.708729 18,21.1531095 18,20.5 C18,19.6715728 17.3284272,19 16.5,19 C15.6715728,19 15,19.6715728 15,20.5 C15,21.1531095 15.4174038,21.708729 16,21.9146472 L16,21.9146472 Z M9,14.0000125 L9,10.499235 C9,6.35670485 12.3578644,3 16.5,3 C20.6337072,3 24,6.35752188 24,10.499235 L24,14.0000125 C25.6591471,14.0047488 27,15.3503174 27,17.0094776 L27,26.9905224 C27,28.6633689 25.6529197,30 23.991212,30 L9.00878799,30 C7.34559019,30 6,28.652611 6,26.9905224 L6,17.0094776 C6,15.339581 7.34233349,14.0047152 9,14.0000125 L9,14.0000125 L9,14.0000125 Z M12,14 L12,10.5008537 C12,8.0092478 14.0147186,6 16.5,6 C18.9802243,6 21,8.01510082 21,10.5008537 L21,14 L12,14 L12,14 L12,14 Z" id="lock"></path>
                                </g>
                            </g>
                        </svg>
                    </span>
					<?php esc_html_e( 'Access Denied', WL_THEME_ADMIN_DOMAIN ); ?>
                </h1>
                <p><?php esc_html_e( 'Access to the Admin Panel is denied for your IP address.', WL_THEME_ADMIN_DOMAIN ); ?></p>
            </article>
			<?php
			exit;
		}
	}

	add_action( 'init', 'wl_admin_panel_blocking_by_ip_function' );
}
