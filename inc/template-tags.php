<?php
/**
 * Template helper functions.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
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
		$products = array(
			esc_html__( 'CCTV & Security System', 'langit' )       => home_url( '/products/#cctv-security-system' ),
			esc_html__( 'Networking Infrastructure', 'langit' )    => home_url( '/products/#networking-infrastructure' ),
			esc_html__( 'Mechanical Electrical', 'langit' )        => home_url( '/products/#mechanical-electrical' ),
			esc_html__( 'Fire Alarm System', 'langit' )            => home_url( '/products/#fire-alarm-system' ),
			esc_html__( 'Audio & Public Address', 'langit' )       => home_url( '/products/#audio-public-address' ),
			esc_html__( 'Installation & Maintenance', 'langit' )   => home_url( '/products/#installation-maintenance' ),
		);

		echo '<ul id="primary-menu" class="primary-menu" data-primary-menu>';
		printf( '<li><a href="%1$s">%2$s</a></li>', esc_url( home_url( '/' ) ), esc_html__( 'Home', 'langit' ) );
		printf( '<li><a href="%1$s">%2$s</a></li>', esc_url( home_url( '/company/' ) ), esc_html__( 'Company', 'langit' ) );
		printf( '<li class="menu-item-has-children"><a href="%1$s">%2$s</a><ul class="sub-menu">', esc_url( home_url( '/products/' ) ), esc_html__( 'Products', 'langit' ) );
		foreach ( $products as $label => $url ) {
			printf( '<li><a href="%1$s">%2$s</a></li>', esc_url( $url ), esc_html( $label ) );
		}
		echo '</ul></li>';
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
