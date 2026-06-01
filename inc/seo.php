<?php
/**
 * SEO, social metadata, and schema helpers.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Check whether a dedicated SEO plugin should own metadata output.
 *
 * @return bool
 */
function langit_has_seo_plugin() {
	return defined( 'RANK_MATH_VERSION' )
		|| defined( 'WPSEO_VERSION' )
		|| defined( 'AIOSEO_VERSION' )
		|| class_exists( 'RankMath' )
		|| class_exists( 'WPSEO_Frontend' );
}

/**
 * Normalize text for meta descriptions and JSON-LD values.
 *
 * @param string $text Raw text.
 * @param int    $limit Character limit.
 * @return string
 */
function langit_seo_clean_text( $text, $limit = 160 ) {
	$text = trim( preg_replace( '/\s+/', ' ', wp_strip_all_tags( $text ) ) );

	if ( function_exists( 'mb_strlen' ) && mb_strlen( $text ) > $limit ) {
		$text = mb_substr( $text, 0, $limit - 1 ) . '...';
	} elseif ( strlen( $text ) > $limit ) {
		$text = substr( $text, 0, $limit - 1 ) . '...';
	}

	return $text;
}

/**
 * Build the best available meta description for the current request.
 *
 * @return string
 */
function langit_meta_description() {
	if ( is_singular() ) {
		$post = get_queried_object();

		if ( $post instanceof WP_Post ) {
			if ( has_excerpt( $post->ID ) ) {
				return langit_seo_clean_text( get_the_excerpt( $post ) );
			}

			return langit_seo_clean_text( $post->post_content );
		}
	}

	if ( is_archive() && get_the_archive_description() ) {
		return langit_seo_clean_text( get_the_archive_description() );
	}

	if ( is_search() ) {
		return langit_seo_clean_text( sprintf( __( 'Search results for %s.', 'langit' ), get_search_query() ) );
	}

	$description = get_bloginfo( 'description', 'display' );

	if ( empty( $description ) || 'Just another WordPress site' === $description ) {
		$description = esc_html__( 'PT Global Teknindo provides integrated building technology solutions including CCTV, networking infrastructure, fire alarm systems, audio systems, mechanical electrical systems, installation and maintenance services.', 'langit' );
	}

	return langit_seo_clean_text( $description );
}

/**
 * Override default title parts on front page/home.
 *
 * @param array $title_parts Title parts.
 * @return array
 */
function langit_document_title_parts( $title_parts ) {
	if ( is_front_page() || is_home() ) {
		$title_parts['title']   = esc_html__( 'PT Global Teknindo', 'langit' );
		$title_parts['tagline'] = esc_html__( 'Building Technology Systems', 'langit' );
	}
	return $title_parts;
}
add_filter( 'document_title_parts', 'langit_document_title_parts', 15 );

/**
 * Resolve a social sharing image.
 *
 * @return string
 */
function langit_social_image_url() {
	if ( is_singular() && has_post_thumbnail() ) {
		$image = wp_get_attachment_image_url( get_post_thumbnail_id(), 'langit-social' );

		if ( $image ) {
			return $image;
		}
	}

	return get_template_directory_uri() . '/assets/images/langit-project-1200.webp';
}

/**
 * Resolve the best available brand logo URL for schema.
 *
 * @return string
 */
function langit_schema_logo_url() {
	$logo_id = get_theme_mod( 'custom_logo' );

	if ( $logo_id ) {
		$logo = wp_get_attachment_image_url( $logo_id, 'full' );

		if ( $logo ) {
			return $logo;
		}
	}

	return get_template_directory_uri() . '/assets/images/langit-icon.svg';
}

/**
 * Output fallback SEO and social tags when no SEO plugin is active.
 */
function langit_output_seo_meta() {
	if ( langit_has_seo_plugin() ) {
		return;
	}

	$title       = wp_get_document_title();
	$description = langit_meta_description();
	$request_uri = isset( $_SERVER['REQUEST_URI'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : '/';
	$url         = is_singular() ? get_permalink() : home_url( $request_uri );
	$image       = langit_social_image_url();
	$type        = is_singular( 'post' ) ? 'article' : 'website';
	$site_name   = get_bloginfo( 'name', 'display' );
	?>
	<meta name="description" content="<?php echo esc_attr( $description ); ?>">
	<meta property="og:locale" content="<?php echo esc_attr( get_locale() ); ?>">
	<meta property="og:type" content="<?php echo esc_attr( $type ); ?>">
	<meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
	<meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
	<meta property="og:url" content="<?php echo esc_url( $url ); ?>">
	<meta property="og:site_name" content="<?php echo esc_attr( $site_name ); ?>">
	<meta property="og:image" content="<?php echo esc_url( $image ); ?>">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>">
	<meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>">
	<meta name="twitter:image" content="<?php echo esc_url( $image ); ?>">
	<?php
}
add_action( 'wp_head', 'langit_output_seo_meta', 4 );

/**
 * Output conservative JSON-LD when no SEO plugin is active.
 */
function langit_output_schema() {
	if ( langit_has_seo_plugin() ) {
		return;
	}

	$schema = array(
		'@context' => 'https://schema.org',
		'@graph'   => array(
			array(
				'@type' => 'Organization',
				'@id'   => home_url( '/#organization' ),
				'name'  => get_bloginfo( 'name', 'display' ),
				'url'   => home_url( '/' ),
				'logo'  => langit_schema_logo_url(),
			),
			array(
				'@type'       => 'WebSite',
				'@id'         => home_url( '/#website' ),
				'url'         => home_url( '/' ),
				'name'        => get_bloginfo( 'name', 'display' ),
				'description' => langit_meta_description(),
				'publisher'   => array(
					'@id' => home_url( '/#organization' ),
				),
			),
			array(
				'@type'      => 'LocalBusiness',
				'@id'        => home_url( '/#localbusiness' ),
				'name'       => 'PT Global Teknindo',
				'image'      => langit_social_image_url(),
				'logo'       => langit_schema_logo_url(),
				'url'        => home_url( '/' ),
				'telephone'  => langit_theme_mod( 'contact_whatsapp_number' ),
				'email'      => langit_theme_mod( 'contact_email_address' ),
				'priceRange' => '$$',
				'address'    => array(
					'@type'           => 'PostalAddress',
					'streetAddress'   => langit_theme_mod( 'company_address' ),
					'addressLocality' => 'Bekasi',
					'addressRegion'   => 'Jawa Barat',
					'postalCode'      => '17147',
					'addressCountry'  => 'ID',
				),
			),
		),
	);

	if ( is_singular( 'post' ) ) {
		$schema['@graph'][] = array(
			'@type'            => 'BlogPosting',
			'headline'         => get_the_title(),
			'description'      => langit_meta_description(),
			'url'              => get_permalink(),
			'datePublished'    => get_the_date( DATE_W3C ),
			'dateModified'     => get_the_modified_date( DATE_W3C ),
			'image'            => langit_social_image_url(),
			'mainEntityOfPage' => get_permalink(),
			'author'           => array(
				'@type' => 'Person',
				'name'  => get_the_author(),
			),
			'publisher'        => array(
				'@id' => home_url( '/#organization' ),
			),
		);
	}

	if ( is_singular( 'service' ) ) {
		$service_id = get_the_ID();
		$scope_str  = get_post_meta( $service_id, 'langit_service_scope', true );
		$scope_list = ! empty( $scope_str ) ? array_map( 'trim', explode( ',', $scope_str ) ) : array();

		$service_schema = array(
			'@type'       => 'Service',
			'@id'         => get_permalink() . '#service',
			'name'        => get_the_title(),
			'description' => langit_meta_description(),
			'provider'    => array(
				'@id' => home_url( '/#organization' ),
			),
			'areaServed'  => 'Indonesia',
		);

		if ( ! empty( $scope_list ) ) {
			$service_schema['hasPart'] = array();
			foreach ( $scope_list as $step ) {
				$service_schema['hasPart'][] = array(
					'@type' => 'CreativeWork',
					'name'  => $step,
				);
			}
		}

		$schema['@graph'][] = $service_schema;
	}

	printf(
		'<script type="application/ld+json">%s</script>' . "\n",
		wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE )
	);
}
add_action( 'wp_head', 'langit_output_schema', 30 );
