<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/*** Functions which enhance the administrative part of the theme by hooking into WordPress ***/

//Composer Autoload
require_once __DIR__ . '/vendor/autoload.php';

// Initialization Theme Admin
$wl_admin = Wl\ThemeAdmin\WlAdmin::getInstance();

// Initialization Admin Configuration
$wl_admin->config->set( 'version', '1.0.0' ); /** Theme Admin Version **/
$wl_admin->config->set( 'domain', 'wl-admin' ); /** Theme Admin Domain **/

$wl_admin->init();