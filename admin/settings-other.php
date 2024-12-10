<?php
/*** Settings WordPress other theme preferences ***/

/**
 * Add default Options.
 */
if ( ! function_exists( 'wl_default_theme_options_other' ) ) {
	function wl_default_theme_options_other() {
		return array(
			'enable_minify'           => null,
		);
	}
}

/**
 * Initializes the theme's other options page.
 */
if ( ! function_exists( 'wl_init_theme_other_settings_function' ) ) {
	function wl_init_theme_other_settings_function() {
		add_settings_section(
			'wl_theme_options_other',
			false,
			'wl_other_section_description_callback',
			'wl_theme_options_other'
		);

		//		add_settings_field(
		//			'enable_minify',
		//			__( 'Minify styles and scripts', WL_THEME_ADMIN_DOMAIN ),
		//			'checkbox_enable_minify_callback',
		//			'wl_theme_options_other',
		//			'wl_theme_options_other',
		//			array(
		//				__( 'All styles and scripts connected to the theme will be minified', WL_THEME_ADMIN_DOMAIN ),
		//			)
		//		);

		if ( ! get_option( 'wl_theme_options_other' ) ) {
			add_option( 'wl_theme_options_other', wl_default_theme_options_other() );
		}

		register_setting(
			'wl_theme_options_other',
			'wl_theme_options_other'
		);
	}

	add_action( 'admin_init', 'wl_init_theme_other_settings_function' );
}

/** ------------------------------------------------------------------------------------------------------------------ *
 * Settings callback functions
 * ----------------------------------------------------------------------------------------------------------------- **/

/**
 * Simple description for the Other Settings page.
 */
function wl_other_section_description_callback() {
	echo '<p>' . __( 'Select which theme settings to make it as easy as possible to configure it to suit your needs.',
			WL_THEME_ADMIN_DOMAIN ) . '</p><hr>';
}

function checkbox_enable_minify_callback( $args ) {
	$options = get_option( 'wl_theme_options_other' );

	$html = '<input type="checkbox" id="enable_minify" name="wl_theme_options_other[enable_minify]" value="1" ' . checked( 1,
			$options['enable_minify'] ?? 0, false ) . '/>';
	$html .= '<label for="enable_minify">&nbsp;' . $args[0] . '</label>';

	echo $html;
}

/** ------------------------------------------------------------------------------------------------------------------ *
 * Theme Other Settings functions
 * ----------------------------------------------------------------------------------------------------------------- **/

/**
 * Enable minify styles and scripts function
 */
if ( ! function_exists( 'wl_enable_minify_function' ) ) {
	function wl_enable_minify_function() {

		if ( isset( get_option( 'wl_theme_options_main' )['disable_theme_functions'] ) ) {
			return;
		}

		$compressed_folder = THEME_DIR . 'assets/compressed';
		if ( ! file_exists( $compressed_folder ) ) {
			wp_mkdir_p( $compressed_folder );
			fopen( $compressed_folder . '/compressed-style.min.css', 'w' );
			fopen( $compressed_folder . '/compressed-script.min.js', 'w' );
		}

		// Minify CSS
		$minifier_css      = new MatthiasMullie\Minify\CSS();
		$registered_styles = wp_styles()->registered;
		$css_file_paths    = array();

		foreach ( $registered_styles as $style ) {
			if ( wp_style_is( $style->handle ) ) {
				$file_name = basename( $style->src );
				if ( file_exists( THEME_DIR . 'assets/css/' . $file_name ) && ! empty( $file_name ) ) {
					$css_file_paths[] = THEME_DIR . 'assets/css/' . $file_name;
					wp_dequeue_style( $style->handle );
				}
			}
		}

		foreach ( $css_file_paths as $css_file ) {
			$minifier_css->add( $css_file );
		}

		$compressed_file_css = THEME_DIR . 'assets/compressed/compressed-style.min.css';
		$minifier_css->minify( $compressed_file_css );

		wp_enqueue_style( 'wl-compressed-styles', THEME_ASSETS_URL . 'compressed/compressed-style.min.css', array(), THEME_VERSION );

		// Minify JS
		$minifier_js        = new MatthiasMullie\Minify\JS();
		$registered_scripts = wp_scripts()->registered;
		$js_file_paths      = array();

		foreach ( $registered_scripts as $script ) {
			if ( wp_script_is( $script->handle, 'enqueued' ) ) {
				$file_name = basename( $script->src );
				if ( file_exists( THEME_DIR . 'assets/js/' . $file_name ) && ! empty( $file_name ) ) {
					$js_file_paths[] = THEME_DIR . 'assets/js/' . $file_name;
					wp_dequeue_script( $script->handle );
				}
			}
		}

		foreach ( $js_file_paths as $js_file ) {
			$minifier_js->add( $js_file );
		}

		$compressed_file_js = THEME_DIR . 'assets/compressed/compressed-script.min.js';
		$minifier_js->minify( $compressed_file_js );

		wp_enqueue_script( 'wl-compressed-scripts', THEME_ASSETS_URL . 'compressed/compressed-script.min.js', array(), THEME_VERSION, true );

		dd( get_option( 'wl_theme_options_other' )['enable_minify'] );
		if ( isset( get_option( 'wl_theme_options_other' )['enable_minify'] ) ) {
			add_action( 'wp_enqueue_scripts', 'wl_enable_minify_function' );
		}
	}
}
