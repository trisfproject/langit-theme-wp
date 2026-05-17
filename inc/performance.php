<?php
/**
 * Performance and media helpers.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shared featured image attributes.
 *
 * @param bool $priority Whether the image is above the fold.
 * @return array<string,string>
 */
function langit_featured_image_attrs( $priority = false ) {
	return array(
		'loading'       => $priority ? 'eager' : 'lazy',
		'decoding'      => 'async',
		'fetchpriority' => $priority ? 'high' : 'auto',
		'sizes'         => '(min-width: 1120px) 1120px, calc(100vw - 2.5rem)',
	);
}

/**
 * Add sensible default attributes to WordPress-generated images.
 *
 * @param array        $attr       Image attributes.
 * @param WP_Post      $attachment Attachment object.
 * @param string|array $size       Requested image size.
 * @return array
 */
function langit_image_attributes( $attr, $attachment, $size ) {
	if ( empty( $attr['decoding'] ) ) {
		$attr['decoding'] = 'async';
	}

	if ( in_array( $size, array( 'langit-card', 'thumbnail' ), true ) && empty( $attr['sizes'] ) ) {
		$attr['sizes'] = '(min-width: 901px) 33vw, calc(100vw - 2.5rem)';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'langit_image_attributes', 10, 3 );

/**
 * Preload the likely LCP image on key templates.
 */
function langit_preload_lcp_image() {
	if ( is_front_page() ) {
		if ( function_exists( 'langit_theme_mod_enabled' ) && ! langit_theme_mod_enabled( 'show_hero_section' ) ) {
			return;
		}

		printf(
			'<link rel="preload" as="image" href="%1$s" imagesrcset="%2$s 720w, %3$s 1200w" imagesizes="(min-width: 901px) 42vw, calc(100vw - 2.5rem)" type="image/webp" fetchpriority="high">' . "\n",
			esc_url( get_template_directory_uri() . '/assets/images/langit-project-1200.webp' ),
			esc_url( get_template_directory_uri() . '/assets/images/langit-project-720.webp' ),
			esc_url( get_template_directory_uri() . '/assets/images/langit-project-1200.webp' )
		);
		return;
	}

	if ( ! is_singular() || ! has_post_thumbnail() ) {
		return;
	}

	$image_id = get_post_thumbnail_id();
	$src      = wp_get_attachment_image_url( $image_id, 'langit-social' );
	$srcset   = wp_get_attachment_image_srcset( $image_id, 'langit-social' );
	$sizes    = '(min-width: 1120px) 1120px, calc(100vw - 2.5rem)';

	if ( ! $src ) {
		return;
	}

	printf(
		'<link rel="preload" as="image" href="%1$s"%2$s imagesizes="%3$s" fetchpriority="high">' . "\n",
		esc_url( $src ),
		$srcset ? ' imagesrcset="' . esc_attr( $srcset ) . '"' : '',
		esc_attr( $sizes )
	);
}
add_action( 'wp_head', 'langit_preload_lcp_image', 1 );
