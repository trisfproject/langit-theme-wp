<?php
/**
 * Theme Customizer settings.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return editable theme defaults.
 *
 * @return array<string,string>
 */
function langit_customizer_defaults() {
	return array(
		'hero_eyebrow'                => __( 'INTEGRATED BUILDING TECHNOLOGY', 'langit' ),
		'hero_title'                  => __( 'Reliable Building Technology Systems', 'langit' ),
		'hero_description'            => __( 'PT Global Teknindo menghadirkan solusi terintegrasi untuk keamanan, jaringan, elektrikal, fire alarm, audio, instalasi, dan pemeliharaan melalui konsultasi, implementasi, serta dukungan teknis yang menjaga operasional fasilitas tetap andal.', 'langit' ),
		'hero_primary_button_text'    => __( 'Our Services', 'langit' ),
		'hero_primary_button_url'     => home_url( '/products/' ),
		'hero_secondary_button_text'  => __( 'Contact Us', 'langit' ),
		'hero_secondary_button_url'   => home_url( '/contact/' ),
		'show_hero_section'           => '1',
		'show_company_section'        => '1',
		'show_services_section'       => '1',
		'show_industry_section'       => '1',
		'show_projects_section'       => '1',
		'show_cta_section'            => '1',
		'company_short_intro'         => __( 'Company Introduction', 'langit' ),
		'company_section_title'       => __( 'Technology Partner for Modern Facilities', 'langit' ),
		'company_description'         => __( 'PT Global Teknindo berfokus pada perencanaan, instalasi, integrasi, dan pemeliharaan sistem teknologi gedung. Setiap pekerjaan dijalankan dengan standar kerja terukur, dokumentasi yang jelas, serta hasil instalasi yang mudah dioperasikan dan dirawat dalam jangka panjang.', 'langit' ),
		'services_section_eyebrow'    => __( 'Our Services', 'langit' ),
		'services_section_title'      => __( 'Integrated Services for Building Infrastructure', 'langit' ),
		'featured_service_ids'        => '',
		'featured_service_count'      => '6',
		'industry_section_eyebrow'    => __( 'Industry Coverage', 'langit' ),
		'industry_section_title'      => __( 'Built for Diverse Operating Environments', 'langit' ),
		'industry_items'              => __( "Industrial | Dukungan sistem dapat disesuaikan dengan skala bangunan, pola operasional, dan kebutuhan keamanan di lapangan.\nCommercial Building | Dukungan sistem dapat disesuaikan dengan skala bangunan, pola operasional, dan kebutuhan keamanan di lapangan.\nGovernment | Dukungan sistem dapat disesuaikan dengan skala bangunan, pola operasional, dan kebutuhan keamanan di lapangan.\nResidential | Dukungan sistem dapat disesuaikan dengan skala bangunan, pola operasional, dan kebutuhan keamanan di lapangan.", 'langit' ),
		'projects_section_eyebrow'    => __( 'Featured Projects', 'langit' ),
		'projects_section_title'      => __( 'Selected work for industrial and commercial facilities.', 'langit' ),
		'featured_project_ids'        => '',
		'featured_project_count'      => '3',
		'cta_eyebrow'                 => __( 'Start a Project', 'langit' ),
		'cta_title'                   => __( 'Discuss Your Building Technology Requirements', 'langit' ),
		'cta_description'             => __( 'Sampaikan kebutuhan proyek Anda kepada tim kami untuk mendapatkan arahan solusi, estimasi ruang lingkup, dan langkah kerja yang tepat.', 'langit' ),
		'cta_button_text'             => __( 'Contact Us', 'langit' ),
		'cta_button_url'              => home_url( '/contact/' ),
		'company_name'                => __( 'PT Global Teknindo', 'langit' ),
		'company_short_description'   => __( 'PT Global Teknindo menyediakan solusi terintegrasi di bidang teknologi, security system, mechanical electrical, networking, installation service, serta maintenance service yang profesional dan terpercaya.', 'langit' ),
		'company_address'             => __( 'Indonesia', 'langit' ),
		'company_working_hours'       => __( 'Monday - Friday', 'langit' ),
		'contact_whatsapp_number'     => '+62 812 0000 0000',
		'contact_whatsapp_url'        => '',
		'contact_email_address'       => 'info@globalteknindo.co.id',
		'contact_google_maps_url'     => home_url( '/contact/#map' ),
		'social_instagram_url'        => '',
		'social_facebook_url'         => '',
		'social_linkedin_url'         => '',
		'social_youtube_url'          => '',
		'footer_copyright_text'       => __( 'Copyright {year} {site_name}. All rights reserved.', 'langit' ),
	);
}

/**
 * Get a Customizer value with a default fallback.
 *
 * @param string $key Setting key without prefix.
 * @return string
 */
function langit_theme_mod( $key ) {
	$defaults = langit_customizer_defaults();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
	$value    = get_theme_mod( 'langit_' . $key, $default );

	if ( '' === $value ) {
		return $default;
	}

	return $value;
}

/**
 * Sanitize textarea content.
 *
 * @param string $value Input value.
 * @return string
 */
function langit_sanitize_textarea( $value ) {
	return sanitize_textarea_field( $value );
}

/**
 * Sanitize checkbox-like Customizer values.
 *
 * @param mixed $value Input value.
 * @return string
 */
function langit_sanitize_checkbox( $value ) {
	return $value ? '1' : '0';
}

/**
 * Sanitize positive integer fields.
 *
 * @param mixed $value Input value.
 * @return string
 */
function langit_sanitize_positive_int( $value ) {
	return (string) max( 1, absint( $value ) );
}

/**
 * Sanitize a comma-separated list of post IDs.
 *
 * @param string $value Input value.
 * @return string
 */
function langit_sanitize_id_list( $value ) {
	$ids = array_filter( array_map( 'absint', explode( ',', (string) $value ) ) );

	return implode( ',', array_unique( $ids ) );
}

/**
 * Check whether a Customizer toggle is enabled.
 *
 * @param string $key Setting key without prefix.
 * @return bool
 */
function langit_theme_mod_enabled( $key ) {
	return '1' === (string) langit_theme_mod( $key );
}

/**
 * Parse a comma-separated post ID setting.
 *
 * @param string $key Setting key without prefix.
 * @return array<int,int>
 */
function langit_theme_mod_id_list( $key ) {
	return array_values( array_filter( array_map( 'absint', explode( ',', langit_theme_mod( $key ) ) ) ) );
}

/**
 * Parse homepage industry rows.
 *
 * Expected row format: Title | Description.
 *
 * @return array<int,array<string,string>>
 */
function langit_homepage_industries() {
	$rows       = preg_split( '/\r\n|\r|\n/', langit_theme_mod( 'industry_items' ) );
	$industries = array();

	foreach ( $rows as $row ) {
		$row = trim( $row );
		if ( '' === $row ) {
			continue;
		}

		$parts        = array_map( 'trim', explode( '|', $row, 2 ) );
		$industries[] = array(
			'title'       => $parts[0],
			'description' => isset( $parts[1] ) && '' !== $parts[1] ? $parts[1] : __( 'Dukungan sistem dapat disesuaikan dengan skala bangunan, pola operasional, dan kebutuhan keamanan di lapangan.', 'langit' ),
		);
	}

	return $industries;
}

/**
 * Register Customizer settings.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function langit_customize_register( $wp_customize ) {
	$wp_customize->add_panel(
		'langit_theme_settings',
		array(
			'title'       => esc_html__( 'Langit Theme Settings', 'langit' ),
			'description' => esc_html__( 'Editable homepage and footer content for the Langit theme.', 'langit' ),
			'priority'    => 30,
		)
	);

	$wp_customize->add_section(
		'langit_hero_settings',
		array(
			'title' => esc_html__( 'Hero Settings', 'langit' ),
			'panel' => 'langit_theme_settings',
		)
	);

	$wp_customize->add_section(
		'langit_company_settings',
		array(
			'title' => esc_html__( 'Homepage Company Settings', 'langit' ),
			'panel' => 'langit_theme_settings',
		)
	);

	$wp_customize->add_section(
		'langit_homepage_sections',
		array(
			'title' => esc_html__( 'Homepage Sections', 'langit' ),
			'panel' => 'langit_theme_settings',
		)
	);

	$wp_customize->add_section(
		'langit_company_information',
		array(
			'title' => esc_html__( 'Company Information', 'langit' ),
			'panel' => 'langit_theme_settings',
		)
	);

	$wp_customize->add_section(
		'langit_contact_information',
		array(
			'title' => esc_html__( 'Contact Information', 'langit' ),
			'panel' => 'langit_theme_settings',
		)
	);

	$wp_customize->add_section(
		'langit_social_media',
		array(
			'title' => esc_html__( 'Social Media', 'langit' ),
			'panel' => 'langit_theme_settings',
		)
	);

	$wp_customize->add_section(
		'langit_footer_settings',
		array(
			'title' => esc_html__( 'Footer Settings', 'langit' ),
			'panel' => 'langit_theme_settings',
		)
	);

	$fields = array(
		'hero_eyebrow' => array(
			'label'   => esc_html__( 'Hero Eyebrow Text', 'langit' ),
			'section' => 'langit_hero_settings',
		),
		'show_hero_section' => array(
			'label'    => esc_html__( 'Show Hero Section', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'show_company_section' => array(
			'label'    => esc_html__( 'Show Company Introduction', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'show_services_section' => array(
			'label'    => esc_html__( 'Show Services Section', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'show_industry_section' => array(
			'label'    => esc_html__( 'Show Industry Coverage', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'show_projects_section' => array(
			'label'    => esc_html__( 'Show Featured Projects', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'show_cta_section' => array(
			'label'    => esc_html__( 'Show CTA Section', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'checkbox',
			'sanitize' => 'langit_sanitize_checkbox',
		),
		'hero_title' => array(
			'label'   => esc_html__( 'Hero Title', 'langit' ),
			'section' => 'langit_hero_settings',
		),
		'hero_description' => array(
			'label'    => esc_html__( 'Hero Description', 'langit' ),
			'section'  => 'langit_hero_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'hero_primary_button_text' => array(
			'label'   => esc_html__( 'Primary Button Text', 'langit' ),
			'section' => 'langit_hero_settings',
		),
		'hero_primary_button_url' => array(
			'label'    => esc_html__( 'Primary Button URL', 'langit' ),
			'section'  => 'langit_hero_settings',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'hero_secondary_button_text' => array(
			'label'   => esc_html__( 'Secondary Button Text', 'langit' ),
			'section' => 'langit_hero_settings',
		),
		'hero_secondary_button_url' => array(
			'label'    => esc_html__( 'Secondary Button URL', 'langit' ),
			'section'  => 'langit_hero_settings',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'company_short_intro' => array(
			'label'   => esc_html__( 'Company Short Introduction', 'langit' ),
			'section' => 'langit_company_settings',
		),
		'company_section_title' => array(
			'label'   => esc_html__( 'Company Section Title', 'langit' ),
			'section' => 'langit_company_settings',
		),
		'company_description' => array(
			'label'    => esc_html__( 'Company Description Section', 'langit' ),
			'section'  => 'langit_company_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'services_section_eyebrow' => array(
			'label'   => esc_html__( 'Services Eyebrow', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'services_section_title' => array(
			'label'   => esc_html__( 'Services Title', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'featured_service_ids' => array(
			'label'       => esc_html__( 'Featured Service IDs', 'langit' ),
			'description' => esc_html__( 'Optional comma-separated service post IDs. Order follows this list.', 'langit' ),
			'section'     => 'langit_homepage_sections',
			'sanitize'    => 'langit_sanitize_id_list',
		),
		'featured_service_count' => array(
			'label'    => esc_html__( 'Service Item Limit', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'number',
			'sanitize' => 'langit_sanitize_positive_int',
		),
		'industry_section_eyebrow' => array(
			'label'   => esc_html__( 'Industry Eyebrow', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'industry_section_title' => array(
			'label'   => esc_html__( 'Industry Title', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'industry_items' => array(
			'label'       => esc_html__( 'Industry Cards', 'langit' ),
			'description' => esc_html__( 'One item per line. Format: Title | Indonesian description.', 'langit' ),
			'section'     => 'langit_homepage_sections',
			'type'        => 'textarea',
			'sanitize'    => 'langit_sanitize_textarea',
		),
		'projects_section_eyebrow' => array(
			'label'   => esc_html__( 'Projects Eyebrow', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'projects_section_title' => array(
			'label'   => esc_html__( 'Projects Title', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'featured_project_ids' => array(
			'label'       => esc_html__( 'Featured Project IDs', 'langit' ),
			'description' => esc_html__( 'Optional comma-separated project post IDs. Order follows this list.', 'langit' ),
			'section'     => 'langit_homepage_sections',
			'sanitize'    => 'langit_sanitize_id_list',
		),
		'featured_project_count' => array(
			'label'    => esc_html__( 'Project Item Limit', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'number',
			'sanitize' => 'langit_sanitize_positive_int',
		),
		'cta_eyebrow' => array(
			'label'   => esc_html__( 'CTA Eyebrow', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'cta_title' => array(
			'label'   => esc_html__( 'CTA Title', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'cta_description' => array(
			'label'    => esc_html__( 'CTA Description', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'cta_button_text' => array(
			'label'   => esc_html__( 'CTA Button Text', 'langit' ),
			'section' => 'langit_homepage_sections',
		),
		'cta_button_url' => array(
			'label'    => esc_html__( 'CTA Button URL', 'langit' ),
			'section'  => 'langit_homepage_sections',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'company_name' => array(
			'label'   => esc_html__( 'Company Name', 'langit' ),
			'section' => 'langit_company_information',
		),
		'company_short_description' => array(
			'label'    => esc_html__( 'Company Short Description', 'langit' ),
			'section'  => 'langit_company_information',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'company_address' => array(
			'label'    => esc_html__( 'Company Address', 'langit' ),
			'section'  => 'langit_company_information',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'company_working_hours' => array(
			'label'   => esc_html__( 'Working Hours', 'langit' ),
			'section' => 'langit_company_information',
		),
		'contact_whatsapp_number' => array(
			'label'   => esc_html__( 'WhatsApp Number', 'langit' ),
			'section' => 'langit_contact_information',
		),
		'contact_whatsapp_url' => array(
			'label'       => esc_html__( 'WhatsApp URL', 'langit' ),
			'description' => esc_html__( 'Leave empty to generate a wa.me link from the WhatsApp number.', 'langit' ),
			'section'     => 'langit_contact_information',
			'type'        => 'url',
			'sanitize'    => 'esc_url_raw',
		),
		'contact_email_address' => array(
			'label'    => esc_html__( 'Email Address', 'langit' ),
			'section'  => 'langit_contact_information',
			'type'     => 'email',
			'sanitize' => 'sanitize_email',
		),
		'contact_google_maps_url' => array(
			'label'    => esc_html__( 'Google Maps URL', 'langit' ),
			'section'  => 'langit_contact_information',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'social_instagram_url' => array(
			'label'    => esc_html__( 'Instagram URL', 'langit' ),
			'section'  => 'langit_social_media',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'social_facebook_url' => array(
			'label'    => esc_html__( 'Facebook URL', 'langit' ),
			'section'  => 'langit_social_media',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'social_linkedin_url' => array(
			'label'    => esc_html__( 'LinkedIn URL', 'langit' ),
			'section'  => 'langit_social_media',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'social_youtube_url' => array(
			'label'    => esc_html__( 'YouTube URL', 'langit' ),
			'section'  => 'langit_social_media',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'footer_copyright_text' => array(
			'label'       => esc_html__( 'Footer Copyright Text', 'langit' ),
			'description' => esc_html__( 'Use {year} and {site_name} as optional placeholders.', 'langit' ),
			'section'     => 'langit_footer_settings',
		),
	);

	$defaults = langit_customizer_defaults();

	foreach ( $fields as $key => $field ) {
		$wp_customize->add_setting(
			'langit_' . $key,
			array(
				'default'           => $defaults[ $key ],
				'sanitize_callback' => isset( $field['sanitize'] ) ? $field['sanitize'] : 'sanitize_text_field',
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'langit_' . $key,
			array(
				'label'       => $field['label'],
				'description' => isset( $field['description'] ) ? $field['description'] : '',
				'section'     => $field['section'],
				'type'        => isset( $field['type'] ) ? $field['type'] : 'text',
			)
		);
	}
}
add_action( 'customize_register', 'langit_customize_register' );

/**
 * Build a telephone-friendly WhatsApp URL.
 *
 * @param string $number Visible WhatsApp number.
 * @return string
 */
function langit_whatsapp_url( $number ) {
	$digits = preg_replace( '/\D+/', '', $number );

	if ( empty( $digits ) ) {
		return home_url( '/contact/' );
	}

	return 'https://wa.me/' . $digits;
}

/**
 * Return the configured WhatsApp URL.
 *
 * @return string
 */
function langit_contact_whatsapp_url() {
	$url = langit_theme_mod( 'contact_whatsapp_url' );

	if ( ! empty( $url ) ) {
		return $url;
	}

	return langit_whatsapp_url( langit_theme_mod( 'contact_whatsapp_number' ) );
}
