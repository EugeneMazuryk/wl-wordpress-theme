<?php
/**
 * Ajax functions which enhance the theme by hooking into WordPress
 *
 * @package Weblorem
 */

/**
 * Test ajax function
 */
if ( ! function_exists( 'wl_ajax_test_function' ) ) {
	function wl_ajax_test_function() {
		$data['test_data'] = isset( $form_data['test_data'] ) ? sanitize_text_field( $form_data['test_data'] ) : null;

		if ( empty( $data['test_data'] ) ) {
			$errors['test_data'] = 'Empty test_data!';
		}

		if ( empty( $errors ) ) {
			$result['result'] = 'Ajax ok!';

			wp_send_json_success( $result );
		} else {
			$errors['message'] = __( 'Ajax Error!', THEME_DOMAIN );
			wp_send_json_error( $errors );
		}
	}

	add_action( 'wp_ajax_test_ajax', 'wl_ajax_test_function' );
	add_action( 'wp_ajax_nopriv_test_ajax', 'wl_ajax_test_function' );
}
