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

if ( ! function_exists( 'langit_get_industry_icon' ) ) {
	/**
	 * Map an industry title to its clean, responsive vector SVG icon.
	 *
	 * @param string $title Industry title.
	 * @return string Inline SVG HTML.
	 */
	function langit_get_industry_icon( $title ) {
		$title = strtolower( trim( $title ) );
		switch ( $title ) {
			case 'manufacturing':
			case 'industri':
			case 'industrial':
				return '<svg class="coverage-card__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>';
			case 'warehouse & logistics':
			case 'warehouse':
			case 'logistics':
				return '<svg class="coverage-card__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>';
			case 'commercial building':
			case 'commercial':
			case 'building':
				return '<svg class="coverage-card__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"/><line x1="9" y1="22" x2="9" y2="16"/><line x1="15" y1="22" x2="15" y2="16"/><line x1="9" y1="16" x2="15" y2="16"/><path d="M9 6h.01M15 6h.01M9 10h.01M15 10h.01"/></svg>';
			case 'government':
			case 'pemerintahan':
				return '<svg class="coverage-card__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>';
			case 'education':
			case 'pendidikan':
				return '<svg class="coverage-card__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5-10 5z"/><path d="M6 12v5c0 2 2.67 3 6 3s6-1 6-3v-5"/></svg>';
			case 'healthcare':
			case 'kesehatan':
				return '<svg class="coverage-card__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>';
			default:
				return '<svg class="coverage-card__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><rect x="9" y="9" width="6" height="6"/></svg>';
		}
	}
}
