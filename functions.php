<?php
/**
 * Theme Functions.
 *
 * @package Abovestate
 */



if ( ! defined( 'ABOVESTATE_DIR_PATH' ) ) {
	define( 'ABOVESTATE_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( ! defined( 'ABOVESTATE_DIR_URI' ) ) {
   define( 'ABOVESTATE_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

require_once ABOVESTATE_DIR_PATH . '/inc/helpers/autoloader.php';

function abovestate_get_theme_instance() {
	\ABOVESTATE_THEME\Inc\ABOVESTATE_THEME::get_instance();
}

abovestate_get_theme_instance();


