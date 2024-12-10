<?php
/**
 * Functions with custom WP_Crone
 */

/**
 * Register Cron Tasks
 */
if ( ! function_exists( 'wl_theme_cron_tasks_register' ) ) {
	function wl_theme_cron_tasks_register() {
		if ( ! wp_next_scheduled( 'wl_cron_daily_EXAMPLE_NANE' ) ) {
			wp_schedule_event( wl_helper_get_cron_run_timestamp(), 'daily', 'wl_cron_daily_EXAMPLE_NANE' );
		}
	}

	//add_action( 'wp', 'wl_theme_cron_tasks_register' );
}

/**
 * Remove Cron Tasks
 */
if ( ! function_exists( 'wl_theme_cron_tasks_remove' ) ) {
	function wl_theme_cron_tasks_remove() {
		if ( is_admin() ) {
			wp_unschedule_event( wp_next_scheduled( 'wl_cron_daily_EXAMPLE_NANE' ), 'wl_cron_daily_EXAMPLE_NANE' );
		}
	}

	//add_action( 'switch_theme', 'wl_theme_cron_tasks_remove' );
}

/**
 * Getting UNIX timestamp value for running cron
 */
if ( ! function_exists( 'wl_helper_get_cron_run_timestamp' ) ) {
	function wl_helper_get_cron_run_timestamp( $time = '00:00' ) {
		$timezone     = new DateTimeZone( get_option( 'timezone_string' ) );
		$current_time = new DateTime( 'now', $timezone );
		$run_time     = new DateTime( $time, $timezone );

		if ( $current_time > $run_time ) {
			$run_time->modify( '+1 day' );
		}

		return $run_time->getTimestamp();
	}
}

/** ------------------------------------------------------------------------------------------------------------------ *
 * Cron Tasks Functions
 * ----------------------------------------------------------------------------------------------------------------- **/

/**
 * Example Task Function
 */
if ( ! function_exists( 'wl_cron_task_function_EXAMPLE_NANE' ) ) {
	function wl_cron_task_function_EXAMPLE_NANE() {
		echo 'Cron Task Done!';
	}

	//add_action( 'wl_cron_daily_EXAMPLE_NANE', 'wl_cron_task_function_EXAMPLE_NANE' );
}
