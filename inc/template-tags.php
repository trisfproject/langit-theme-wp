<?php
/**
 * Template helper functions.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'langit_site_logo' ) ) {
	/**
	 * Render the global site logo from the native Custom Logo source.
	 *
	 * @param string $class Link class.
	 * @param string $image_class Image class.
	 */
	function langit_site_logo( $class = 'custom-logo-link', $image_class = 'custom-logo' ) {
		$logo_id   = get_theme_mod( 'custom_logo' );
		$site_name = get_bloginfo( 'name' );

		if ( $logo_id ) {
			$logo = wp_get_attachment_image(
				$logo_id,
				'full',
				false,
				array(
					'class'    => $image_class,
					'alt'      => $site_name,
					'decoding' => 'async',
				)
			);
		} else {
			$logo = sprintf(
				'<img class="%1$s" src="%2$s" width="64" height="64" alt="%3$s" decoding="async">',
				esc_attr( $image_class ),
				esc_url( get_template_directory_uri() . '/assets/images/langit-icon.svg' ),
				esc_attr( $site_name )
			);
		}

		printf(
			'<a class="%1$s" href="%2$s" rel="home" aria-label="%3$s">%4$s</a>',
			esc_attr( $class ),
			esc_url( home_url( '/' ) ),
			esc_attr( $site_name ),
			$logo // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		);
	}
}

if ( ! function_exists( 'langit_posted_on' ) ) {
	/**
	 * Print a compact post date.
	 */
	function langit_posted_on() {
		printf(
			'<time class="entry-date" datetime="%1$s" itemprop="datePublished">%2$s</time>',
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);
	}
}

if ( ! function_exists( 'langit_post_modified_meta' ) ) {
	/**
	 * Print machine-readable modified date metadata.
	 */
	function langit_post_modified_meta() {
		printf(
			'<meta itemprop="dateModified" content="%1$s">',
			esc_attr( get_the_modified_date( DATE_W3C ) )
		);
	}
}

if ( ! function_exists( 'langit_posted_by' ) ) {
	/**
	 * Print the post author.
	 */
	function langit_posted_by() {
		printf(
			'<span class="byline" itemprop="author" itemscope itemtype="https://schema.org/Person">%1$s <a href="%2$s" itemprop="url"><span itemprop="name">%3$s</span></a></span>',
			esc_html__( 'By', 'langit' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	}
}

if ( ! function_exists( 'langit_primary_menu_fallback' ) ) {
	/**
	 * Output starter navigation before a menu is assigned.
	 */
	function langit_primary_menu_fallback() {
		$products = langit_get_core_service_links();

		echo '<ul id="primary-menu" class="primary-menu" data-primary-menu>';
		printf( '<li><a href="%1$s">%2$s</a></li>', esc_url( home_url( '/' ) ), esc_html__( 'Home', 'langit' ) );
		printf( '<li><a href="%1$s">%2$s</a></li>', esc_url( home_url( '/company/' ) ), esc_html__( 'Company', 'langit' ) );
		printf( '<li class="menu-item-has-children"><a href="%1$s">%2$s</a><ul class="sub-menu">', esc_url( home_url( '/products/' ) ), esc_html__( 'Products', 'langit' ) );
		foreach ( $products as $label => $url ) {
			printf( '<li><a href="%1$s">%2$s</a></li>', esc_url( $url ), esc_html( $label ) );
		}
		echo '</ul></li>';
		printf( '<li><a href="%1$s">%2$s</a></li>', esc_url( langit_get_services_archive_url() ), esc_html__( 'Services', 'langit' ) );
		printf( '<li><a href="%1$s">%2$s</a></li>', esc_url( langit_get_projects_archive_url() ), esc_html__( 'Projects', 'langit' ) );
		printf( '<li><a href="%1$s">%2$s</a></li>', esc_url( home_url( '/blog/' ) ), esc_html__( 'Blog', 'langit' ) );
		printf( '<li><a href="%1$s">%2$s</a></li>', esc_url( home_url( '/contact/' ) ), esc_html__( 'Contact', 'langit' ) );
		echo '</ul>';
	}
}

if ( ! function_exists( 'langit_footer_menu_fallback' ) ) {
	/**
	 * Output starter footer navigation before a menu is assigned.
	 */
	function langit_footer_menu_fallback() {
		$items = array(
			esc_html__( 'Home', 'langit' )     => home_url( '/' ),
			esc_html__( 'Company', 'langit' )  => home_url( '/company/' ),
			esc_html__( 'Products', 'langit' ) => home_url( '/products/' ),
			esc_html__( 'Services', 'langit' ) => langit_get_services_archive_url(),
			esc_html__( 'Projects', 'langit' ) => langit_get_projects_archive_url(),
			esc_html__( 'Clients', 'langit' )  => langit_get_clients_archive_url(),
			esc_html__( 'Contact', 'langit' )  => home_url( '/contact/' ),
		);

		echo '<ul class="footer-menu">';
		foreach ( $items as $label => $url ) {
			printf(
				'<li><a href="%1$s">%2$s</a></li>',
				esc_url( $url ),
				esc_html( $label )
			);
		}
		echo '</ul>';
	}
}

if ( ! function_exists( 'langit_footer_link_list' ) ) {
	/**
	 * Print a footer link list.
	 *
	 * @param array $items Associative array of labels and URLs.
	 */
	function langit_footer_link_list( $items ) {
		echo '<ul class="footer-menu">';
		foreach ( $items as $label => $url ) {
			printf(
				'<li><a href="%1$s">%2$s</a></li>',
				esc_url( $url ),
				esc_html( $label )
			);
		}
		echo '</ul>';
	}
}

if ( ! function_exists( 'langit_footer_bottom_menu_fallback' ) ) {
	/**
	 * Output compact bottom footer links.
	 */
	function langit_footer_bottom_menu_fallback() {
		$items = array(
			esc_html__( 'Company', 'langit' ) => home_url( '/company/' ),
			esc_html__( 'Products', 'langit' ) => home_url( '/products/' ),
			esc_html__( 'Services', 'langit' ) => langit_get_services_archive_url(),
			esc_html__( 'Projects', 'langit' ) => langit_get_projects_archive_url(),
			esc_html__( 'Clients', 'langit' ) => langit_get_clients_archive_url(),
			esc_html__( 'Contact', 'langit' ) => home_url( '/contact/' ),
		);

		echo '<ul class="footer-bottom-menu">';
		foreach ( $items as $label => $url ) {
			printf(
				'<li><a href="%1$s">%2$s</a></li>',
				esc_url( $url ),
				esc_html( $label )
			);
		}
		echo '</ul>';
	}
}

/**
 * Normalize archive menu labels for a cleaner frontend navigation.
 *
 * @param array    $items Menu item objects.
 * @param stdClass $args  Menu arguments.
 * @return array
 */
function langit_normalize_navigation_labels( $items, $args ) {
	$labels = array(
		'services'     => esc_html__( 'Services', 'langit' ),
		'projects'     => esc_html__( 'Projects', 'langit' ),
		'testimonials' => esc_html__( 'Testimonials', 'langit' ),
		'clients'      => esc_html__( 'Clients', 'langit' ),
	);

	foreach ( $items as $item ) {
		$key = sanitize_title( preg_replace( '/^all\s+/i', '', $item->title ) );

		if ( isset( $labels[ $key ] ) ) {
			$item->title = $labels[ $key ];
		}
	}

	return $items;
}
add_filter( 'wp_nav_menu_objects', 'langit_normalize_navigation_labels', 10, 2 );
