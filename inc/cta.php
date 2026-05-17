<?php
/**
 * Global CTA and inquiry helpers.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return a safe CTA variant.
 *
 * @param string $variant Variant name.
 * @return string
 */
function langit_cta_variant( $variant ) {
	$allowed = array( 'centered', 'split', 'contact', 'consultation' );

	return in_array( $variant, $allowed, true ) ? $variant : 'centered';
}

/**
 * Build reusable CTA actions from Customizer settings.
 *
 * @param string $prefix Setting key prefix.
 * @return array<int,array<string,string>>
 */
function langit_cta_actions_from_settings( $prefix ) {
	$actions = array();

	$primary_label = langit_theme_mod( $prefix . '_primary_text' );
	$primary_url   = langit_theme_mod( $prefix . '_primary_url' );

	if ( ! empty( $primary_label ) && ! empty( $primary_url ) ) {
		$actions[] = array(
			'label' => $primary_label,
			'url'   => $primary_url,
		);
	}

	$secondary_label = langit_theme_mod( $prefix . '_secondary_text' );
	$secondary_url   = langit_theme_mod( $prefix . '_secondary_url' );

	if ( empty( $secondary_url ) && in_array( $prefix, array( 'contact_cta', 'inquiry' ), true ) ) {
		$secondary_url = langit_contact_whatsapp_url();
	}

	if ( ! empty( $secondary_label ) && ! empty( $secondary_url ) ) {
		$actions[] = array(
			'label'   => $secondary_label,
			'url'     => $secondary_url,
			'variant' => 'ghost',
		);
	}

	return $actions;
}

/**
 * Resolve a CTA setting prefix by usage context.
 *
 * @param string $context CTA context.
 * @return string
 */
function langit_cta_prefix_for_context( $context ) {
	if ( in_array( $context, array( 'contact', 'footer' ), true ) ) {
		return 'contact_cta';
	}

	if ( in_array( $context, array( 'inquiry', 'service', 'services', 'project', 'projects', 'maintenance' ), true ) ) {
		return 'inquiry';
	}

	return 'global_cta';
}

/**
 * Render a reusable global CTA.
 *
 * @param string $context   CTA context.
 * @param array  $overrides Optional CTA argument overrides.
 */
function langit_global_cta( $context = 'global', $overrides = array() ) {
	$prefix = langit_cta_prefix_for_context( $context );
	$args   = array(
		'eyebrow' => langit_theme_mod( $prefix . '_eyebrow' ),
		'title'   => langit_theme_mod( $prefix . '_title' ),
		'text'    => langit_theme_mod( $prefix . '_description' ),
		'variant' => langit_cta_variant( langit_theme_mod( $prefix . '_variant' ) ),
		'actions' => langit_cta_actions_from_settings( $prefix ),
	);

	langit_cta( wp_parse_args( $overrides, $args ) );
}

/**
 * Render a reusable inquiry/consultation section.
 *
 * @param string $context   Inquiry context.
 * @param array  $overrides Optional inquiry argument overrides.
 */
function langit_inquiry( $context = 'consultation', $overrides = array() ) {
	$args = array(
		'context'        => $context,
		'title'          => langit_theme_mod( 'inquiry_title' ),
		'text'           => langit_theme_mod( 'inquiry_description' ),
		'variant'        => langit_cta_variant( langit_theme_mod( 'inquiry_variant' ) ),
		'actions'        => langit_cta_actions_from_settings( 'inquiry' ),
		'form_shortcode' => langit_theme_mod( 'inquiry_form_shortcode' ),
		'show_form'      => false,
	);

	langit_component( 'inquiry', wp_parse_args( $overrides, $args ) );
}
