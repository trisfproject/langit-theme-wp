<?php
/**
 * Advanced navigation helpers.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Labels that can receive optional mega-menu styling when used in the primary menu.
 *
 * @return array<string,string>
 */
function langit_mega_menu_labels() {
	return array(
		'products'  => 'products',
		'services'  => 'services',
		'projects'  => 'projects',
		'resources' => 'resources',
	);
}

/**
 * Add optional mega-menu classes to scalable top-level menu groups.
 *
 * Editors can still manage menus normally from Appearance > Menus.
 *
 * @param array<string> $classes Menu item classes.
 * @param WP_Post       $item    Menu item object.
 * @param stdClass      $args    Menu arguments.
 * @param int           $depth   Menu depth.
 * @return array<string>
 */
function langit_navigation_menu_classes( $classes, $item, $args, $depth ) {
	if ( empty( $args->theme_location ) || 'primary' !== $args->theme_location || 0 !== (int) $depth ) {
		return $classes;
	}

	$key = sanitize_title( preg_replace( '/^all\s+/i', '', $item->title ) );

	if ( isset( langit_mega_menu_labels()[ $key ] ) && in_array( 'menu-item-has-children', $classes, true ) ) {
		$classes[] = 'langit-mega-menu';
		$classes[] = 'langit-menu-' . $key;
	}

	return array_values( array_unique( $classes ) );
}
add_filter( 'nav_menu_css_class', 'langit_navigation_menu_classes', 10, 4 );

/**
 * Add accessible relationship attributes to primary menu parent links.
 *
 * @param array<string,string> $atts  Link attributes.
 * @param WP_Post             $item  Menu item object.
 * @param stdClass            $args  Menu arguments.
 * @param int                 $depth Menu depth.
 * @return array<string,string>
 */
function langit_navigation_link_attributes( $atts, $item, $args, $depth ) {
	if ( empty( $args->theme_location ) || 'primary' !== $args->theme_location || 0 !== (int) $depth ) {
		return $atts;
	}

	if ( in_array( 'menu-item-has-children', (array) $item->classes, true ) ) {
		$atts['aria-haspopup'] = 'true';
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'langit_navigation_link_attributes', 10, 4 );

/**
 * Render the enhanced Products fallback dropdown.
 */
function langit_render_products_mega_menu() {
	$products = langit_get_core_service_links();
	$chunks   = array_chunk( $products, 3, true );
	$groups   = array(
		esc_html__( 'Security & Infrastructure', 'langit' ),
		esc_html__( 'Building Systems', 'langit' ),
	);

	echo '<ul class="sub-menu langit-mega-panel">';

	foreach ( $chunks as $index => $links ) {
		$group_label = isset( $groups[ $index ] ) ? $groups[ $index ] : esc_html__( 'Services', 'langit' );

		printf(
			'<li class="langit-mega-group"><span class="langit-mega-group__title">%s</span><ul class="langit-mega-list">',
			esc_html( $group_label )
		);

		foreach ( $links as $label => $url ) {
			printf( '<li><a href="%1$s">%2$s</a></li>', esc_url( $url ), esc_html( $label ) );
		}

		echo '</ul></li>';
	}

	printf(
		'<li class="langit-mega-cta"><a href="%1$s"><strong>%2$s</strong><span>%3$s</span></a></li>',
		esc_url( home_url( '/quote/' ) ),
		esc_html__( 'Request Consultation', 'langit' ),
		esc_html__( 'Diskusikan kebutuhan proyek, integrasi sistem, dan dukungan maintenance dengan tim kami.', 'langit' )
	);

	echo '</ul>';
}
