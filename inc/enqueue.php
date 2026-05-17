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
	wp_enqueue_style(
		'langit-main',
		LANGIT_URI . '/assets/css/main.css',
		array(),
		LANGIT_VERSION
	);

	wp_enqueue_script(
		'langit-navigation',
		LANGIT_URI . '/assets/js/navigation.js',
		array(),
		LANGIT_VERSION,
		array(
			'in_footer' => true,
			'strategy'  => 'defer',
		)
	);
}
add_action( 'wp_enqueue_scripts', 'langit_enqueue_assets' );
