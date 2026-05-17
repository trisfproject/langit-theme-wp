<?php
/**
 * Gutenberg block pattern support.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Langit block pattern categories.
 */
function langit_register_pattern_categories() {
	if ( ! function_exists( 'register_block_pattern_category' ) ) {
		return;
	}

	register_block_pattern_category(
		'langit',
		array(
			'label'       => esc_html__( 'Langit', 'langit' ),
			'description' => esc_html__( 'Reusable corporate industrial sections for the Langit theme.', 'langit' ),
		)
	);
}
add_action( 'init', 'langit_register_pattern_categories' );
