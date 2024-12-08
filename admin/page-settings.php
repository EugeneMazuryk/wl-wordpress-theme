<?php
/*** Theme general settings page ***/

/**
 * Load file Main theme admin settings.
 */
require WL_THEME_ADMIN_DIR . 'settings-main.php';

/**
 * Load file Dashboard theme admin settings.
 */
require WL_THEME_ADMIN_DIR . 'settings-dashboard.php';

/**
 * Load file Dashboard Side Menu theme settings.
 */
require WL_THEME_ADMIN_DIR . 'settings-dashboard-menu.php';

/**
 * Load file Other theme admin settings.
 */
require WL_THEME_ADMIN_DIR . 'settings-other.php';

/**
 * Load file WooCommerce theme admin settings.
 */
require WL_THEME_ADMIN_DIR . 'settings-woocommerce.php';


/** ------------------------------------------------------------------------------------------------------------------ *
 * Settings Page
 * ----------------------------------------------------------------------------------------------------------------- **/

/**
 * Theme options into the 'Settings' menu 'Theme settings' submenu.
 */
if ( ! function_exists( 'wl_register_theme_options_admin_menu_function' ) ) {
	function wl_register_theme_options_admin_menu_function() {
		add_menu_page(
			esc_html__( 'General settings', WL_THEME_ADMIN_DOMAIN ),
			esc_html__( 'Theme', WL_THEME_ADMIN_DOMAIN ),
			'manage_options',
			'wl_theme_options',
			'wl_render_theme_general_options_page',
			'dashicons-align-left',
			1000
		);
		add_submenu_page(
			'wl_theme_options',
			esc_html__( 'General settings', WL_THEME_ADMIN_DOMAIN ),
			esc_html__( 'Settings' ),
			'manage_options',
			'wl_theme_options'
		);

		add_submenu_page(
			'wl_theme_options',
			esc_html__( 'Documentation' ),
			esc_html__( 'Documentation' ),
			'manage_options',
			WL_THEME_ADMIN_URL . 'documentation'
		);
	}

	add_action( 'admin_menu', 'wl_register_theme_options_admin_menu_function' );
}

/**
 * Renders a simple page to display for the theme menu.
 */
if ( ! function_exists( 'wl_render_theme_general_options_page' ) ) {
	function wl_render_theme_general_options_page() {
		// Check active menu tab
		$active_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'main_options';
		?>
        <div class="wrap">
            <h2><?php esc_attr_e( get_admin_page_title() ); ?></h2>
            <h2 class="nav-tab-wrapper">
                <a href="?page=wl_theme_options&tab=main_options" class="nav-tab<?php echo 'main_options' === $active_tab ? ' nav-tab-active' : ''; ?>">
		            <?php esc_attr_e( 'Налаштування теми', WL_THEME_ADMIN_DOMAIN ); ?>
                </a>
                <a href="?page=wl_theme_options&tab=dashboard_options" class="nav-tab<?php echo 'dashboard_options' === $active_tab ? ' nav-tab-active' : ''; ?>">
		            <?php esc_attr_e( 'Dashboard settings', WL_THEME_ADMIN_DOMAIN ); ?>
                </a>
                <a href="?page=wl_theme_options&tab=dashboard_menu_options" class="nav-tab<?php echo 'dashboard_menu_options' === $active_tab ? ' nav-tab-active' : ''; ?>">
					<?php esc_attr_e( 'Dashboard menu', WL_THEME_ADMIN_DOMAIN ); ?>
                </a>
	            <?php if ( class_exists( 'WooCommerce' ) ) { ?>
                    <a href="?page=wl_theme_options&tab=woocommerce_options" class="nav-tab<?php echo 'woocommerce_options' === $active_tab ? ' nav-tab-active' : ''; ?>">
			            <?php esc_attr_e( 'WooCommerce settings', WL_THEME_ADMIN_DOMAIN ); ?>
                    </a>
	            <?php } ?>
                <a href="?page=wl_theme_options&tab=other_options" class="nav-tab<?php echo 'other_options' === $active_tab ? ' nav-tab-active' : ''; ?>">
					<?php esc_attr_e( 'Other settings', WL_THEME_ADMIN_DOMAIN ); ?>
                </a>
            </h2>
            <form method="post" action="options.php">
                <div class="wrap">
                    <div id="poststuff">
                        <div id="post-body" class="metabox-holder columns-2">

                            <!-- main content -->
                            <div id="post-body-content">
                                <div class="postbox">
                                    <div class="inside">
										<?php
										switch ( $active_tab ) {
											case 'main_options':
												settings_fields( 'wl_theme_options_main' );
												do_settings_sections( 'wl_theme_options_main' );
												break;
											case 'dashboard_options':
												settings_fields( 'wl_theme_options_dashboard' );
												do_settings_sections( 'wl_theme_options_dashboard' );
												break;
											case 'dashboard_menu_options':
												settings_fields( 'wl_theme_options_dashboard_menu' );
												do_settings_sections( 'wl_theme_options_dashboard_menu' );
												break;
											case 'other_options':
												settings_fields( 'wl_theme_options_other' );
												do_settings_sections( 'wl_theme_options_other' );
												break;
											case 'woocommerce_options':
												settings_fields( 'wl_theme_options_woocommerce' );
												do_settings_sections( 'wl_theme_options_woocommerce' );
												break;
										}
										?>
                                    </div>
                                </div>
                            </div>

                            <!-- sidebar -->
                            <div id="postbox-container-1" class="postbox-container">
                                <div class="postbox">
                                    <div class="inside" style="display:flex;justify-content:center">
										<?php submit_button(); ?>
                                    </div>
                                </div>
                            </div>

							<?php submit_button(); ?>

                        </div>
                        <br class="clear">
                    </div>
                </div>
            </form>
        </div>
		<?php
	}
}
