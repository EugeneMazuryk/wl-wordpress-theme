<?php
/*** Settings WooCommerce theme preferences ***/

if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

/**
 * Add default Options.
 */
if ( ! function_exists( 'wl_default_theme_options_woocommerce' ) ) {
	function wl_default_theme_options_woocommerce() {
		return array(
			'wc_support_gallery_zoom'     => null,
			'wc_support_gallery_lightbox' => null,
			'wc_support_gallery_slider'   => null,
		);
	}
}

/**
 * Initializes the theme's WooCommerce settings page.
 */
if ( ! function_exists( 'wl_init_theme_woocommerce_settings_function' ) ) {
	function wl_init_theme_woocommerce_settings_function() {
		add_settings_section(
			'wl_theme_options_woocommerce',
			false,
			'wl_woocommerce_section_description_callback',
			'wl_theme_options_woocommerce'
		);

		add_settings_field(
			'support_gallery_zoom',
			__( 'Enable product image zoom', WL_THEME_ADMIN_DOMAIN ),
			'checkbox_support_gallery_zoom_callback',
			'wl_theme_options_woocommerce',
			'wl_theme_options_woocommerce',
			array(
				__( 'Product image zoom on mouseover for WooCommerce', WL_THEME_ADMIN_DOMAIN ),
			)
		);

		add_settings_field(
			'support_gallery_lightbox',
			__( 'Enable product gallery lightbox', WL_THEME_ADMIN_DOMAIN ),
			'checkbox_support_gallery_lightbox_callback',
			'wl_theme_options_woocommerce',
			'wl_theme_options_woocommerce',
			array(
				__( 'Display the entire product gallery in the default WooCommerce lightbox', WL_THEME_ADMIN_DOMAIN ),
			)
		);

		add_settings_field(
			'support_gallery_slider',
			__( 'Enable product gallery slider', WL_THEME_ADMIN_DOMAIN ),
			'checkbox_support_gallery_slider_callback',
			'wl_theme_options_woocommerce',
			'wl_theme_options_woocommerce',
			array(
				__( 'Product slider in WooCommerce default gallery section', WL_THEME_ADMIN_DOMAIN ),
			)
		);

		if ( ! get_option( 'wl_theme_options_woocommerce' ) ) {
			add_option( 'wl_theme_options_woocommerce', wl_default_theme_options_woocommerce() );
		}

		register_setting(
			'wl_theme_options_woocommerce',
			'wl_theme_options_woocommerce'
		);

	}

	add_action( 'admin_init', 'wl_init_theme_woocommerce_settings_function' );
}

/** ------------------------------------------------------------------------------------------------------------------ *
 * Settings callback functions
 * ----------------------------------------------------------------------------------------------------------------- **/

/**
 * Simple description for the WooCommerce Options page.
 */
function wl_woocommerce_section_description_callback() {
	echo '<p>' . __( 'Select which WooCommerce settings to make it as easy as possible to configure it to suit your needs.',
			THEME_DOMAIN ) . '</p><hr>';
}

/**
 * WooCommerce options input fields.
 */
function checkbox_support_gallery_zoom_callback( $args ) {
	$options = get_option( 'wl_theme_options_woocommerce' );

	$html = '<input type="checkbox" id="wc_support_gallery_zoom" name="wl_theme_options_woocommerce[wc_support_gallery_zoom]" value="1" ' . checked( 1,
			$options['wc_support_gallery_zoom'] ?? 0, false ) . '/>';
	$html .= '<label for="wc_support_gallery_zoom">&nbsp;' . $args[0] . '</label>';

	echo $html;
}

function checkbox_support_gallery_lightbox_callback( $args ) {
	$options = get_option( 'wl_theme_options_woocommerce' );

	$html = '<input type="checkbox" id="wc_support_gallery_lightbox" name="wl_theme_options_woocommerce[wc_support_gallery_lightbox]" value="1" ' . checked( 1,
			$options['wc_support_gallery_lightbox'] ?? 0, false ) . '/>';
	$html .= '<label for="wc_support_gallery_lightbox">&nbsp;' . $args[0] . '</label>';

	echo $html;

}

function checkbox_support_gallery_slider_callback( $args ) {
	$options = get_option( 'wl_theme_options_woocommerce' );

	$html = '<input type="checkbox" id="wc_support_gallery_slider" name="wl_theme_options_woocommerce[wc_support_gallery_slider]" value="1" ' . checked( 1,
			$options['wc_support_gallery_slider'] ?? 0, false ) . '/>';
	$html .= '<label for="wc_support_gallery_slider">&nbsp;' . $args[0] . '</label>';

	echo $html;
}

/** ------------------------------------------------------------------------------------------------------------------ *
 * Theme Settings WooCommerce functions
 * ----------------------------------------------------------------------------------------------------------------- **/

/**
 * WooCommerce settings Zoom, Lightbox, Slider in product gallery
 */
if ( ! function_exists( 'wl_woocommerce_setup_settings_function' ) ) {
	function wl_woocommerce_setup_settings_function() {

		if ( isset( get_option( 'wl_theme_options_main' )['disable_theme_functions'] ) ) {
			return;
		}

		if ( isset( get_option( 'wl_theme_options_woocommerce' )['wc_support_gallery_zoom'] ) ) {
			add_theme_support( 'wc-product-gallery-zoom' );
		} else {
			remove_theme_support( 'wc-product-gallery-zoom' );
		}
		if ( isset( get_option( 'wl_theme_options_woocommerce' )['wc_support_gallery_lightbox'] ) ) {
			add_theme_support( 'wc-product-gallery-lightbox' );
		} else {
			remove_theme_support( 'wc-product-gallery-lightbox' );
		}
		if ( isset( get_option( 'wl_theme_options_woocommerce' )['wc_support_gallery_slider'] ) ) {
			add_theme_support( 'wc-product-gallery-slider' );
		} else {
			remove_theme_support( 'wc-product-gallery-slider' );
		}
	}

	add_action( 'after_setup_theme', 'wl_woocommerce_setup_settings_function' );
}
