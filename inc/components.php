<?php
/**
 * Reusable component helpers.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'langit_component' ) ) {
	/**
	 * Load a component template part with arguments.
	 *
	 * @param string $slug Component filename without extension.
	 * @param array  $args Component arguments.
	 */
	function langit_component( $slug, $args = array() ) {
		get_template_part( 'template-parts/components/' . $slug, null, $args );
	}
}

if ( ! function_exists( 'langit_class_names' ) ) {
	/**
	 * Join class names while filtering empty values.
	 *
	 * @param array $classes Class names.
	 * @return string
	 */
	function langit_class_names( $classes ) {
		$prepared = array();

		foreach ( (array) $classes as $class ) {
			foreach ( preg_split( '/\s+/', (string) $class ) as $name ) {
				if ( '' !== $name ) {
					$prepared[] = sanitize_html_class( $name );
				}
			}
		}

		return trim( implode( ' ', array_filter( $prepared ) ) );
	}
}

if ( ! function_exists( 'langit_button' ) ) {
	/**
	 * Render a Langit button.
	 *
	 * @param array $args Button arguments.
	 */
	function langit_button( $args = array() ) {
		langit_component( 'button', $args );
	}
}

if ( ! function_exists( 'langit_section_heading' ) ) {
	/**
	 * Render a reusable section heading block.
	 *
	 * @param array $args Heading arguments.
	 */
	function langit_section_heading( $args = array() ) {
		langit_component( 'section-heading', $args );
	}
}

if ( ! function_exists( 'langit_page_hero' ) ) {
	/**
	 * Render a standard page hero.
	 *
	 * @param array $args Hero arguments.
	 */
	function langit_page_hero( $args = array() ) {
		langit_component( 'page-hero', $args );
	}
}

if ( ! function_exists( 'langit_cta' ) ) {
	/**
	 * Render a CTA panel.
	 *
	 * @param array $args CTA arguments.
	 */
	function langit_cta( $args = array() ) {
		langit_component( 'cta', $args );
	}
}

if ( ! function_exists( 'langit_card' ) ) {
	/**
	 * Render a reusable card.
	 *
	 * @param array $args Card arguments.
	 */
	function langit_card( $args = array() ) {
		langit_component( 'card', $args );
	}
}

if ( ! function_exists( 'langit_responsive_image' ) ) {
	/**
	 * Render a lightweight responsive image wrapper.
	 *
	 * @param array $args Image arguments.
	 */
	function langit_responsive_image( $args = array() ) {
		langit_component( 'responsive-image', $args );
	}
}
