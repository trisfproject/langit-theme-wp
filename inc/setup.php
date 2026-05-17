<?php
/**
 * Theme setup.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'langit_setup' ) ) {
	/**
	 * Configure theme supports, menus, and editor defaults.
	 */
	function langit_setup() {
		load_theme_textdomain( 'langit', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
		add_theme_support( 'custom-logo', array(
			'height'      => 64,
			'width'       => 220,
			'flex-height' => true,
			'flex-width'  => true,
		) );
		add_theme_support( 'align-wide' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'editor-styles' );

		add_editor_style( 'assets/css/editor.css' );
		add_image_size( 'langit-card', 768, 432, true );
		add_image_size( 'langit-social', 1200, 630, true );

		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'langit' ),
			'footer'  => esc_html__( 'Footer Menu', 'langit' ),
		) );
	}
}
add_action( 'after_setup_theme', 'langit_setup' );

/**
 * Set the content width for embeds and media.
 */
function langit_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'langit_content_width', 1120 );
}
add_action( 'after_setup_theme', 'langit_content_width', 0 );

/**
 * Register pattern categories.
 */
function langit_register_pattern_categories() {
	if ( function_exists( 'register_block_pattern_category' ) ) {
		register_block_pattern_category(
			'langit',
			array( 'label' => esc_html__( 'Langit', 'langit' ) )
		);
	}
}
add_action( 'init', 'langit_register_pattern_categories' );

/**
 * Register widget areas.
 */
function langit_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'langit' ),
			'id'            => 'blog-sidebar',
			'description'   => esc_html__( 'Optional sidebar for blog archives and single posts.', 'langit' ),
			'before_widget' => '<section id="%1$s" class="blog-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="blog-widget__title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets', 'langit' ),
			'id'            => 'footer-widgets',
			'description'   => esc_html__( 'Optional footer widgets displayed below the primary footer columns.', 'langit' ),
			'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="footer-widget__title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'langit_widgets_init' );

/**
 * Provide a theme favicon when no WordPress site icon is configured.
 */
function langit_favicon_links() {
	if ( function_exists( 'has_site_icon' ) && has_site_icon() ) {
		return;
	}

	$icon_url = get_template_directory_uri() . '/assets/images/langit-icon.svg';
	printf( '<link rel="icon" href="%1$s" type="image/svg+xml">' . "\n", esc_url( $icon_url ) );
	printf( '<link rel="apple-touch-icon" href="%1$s">' . "\n", esc_url( $icon_url ) );
}
add_action( 'wp_head', 'langit_favicon_links' );
