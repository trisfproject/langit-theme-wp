<?php
/**
 * Asset loading.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue front-end assets.
 */
function langit_enqueue_assets() {
	$main_css_path = LANGIT_DIR . '/assets/css/main.css';
	$main_js_path  = LANGIT_DIR . '/assets/js/navigation.js';

	wp_enqueue_style(
		'langit-main',
		LANGIT_URI . '/assets/css/main.css',
		array(),
		file_exists( $main_css_path ) ? filemtime( $main_css_path ) : LANGIT_VERSION
	);

	wp_enqueue_script(
		'langit-navigation',
		LANGIT_URI . '/assets/js/navigation.js',
		array(),
		file_exists( $main_js_path ) ? filemtime( $main_js_path ) : LANGIT_VERSION,
		array(
			'in_footer' => true,
			'strategy'  => 'defer',
		)
	);
}
add_action( 'wp_enqueue_scripts', 'langit_enqueue_assets' );
