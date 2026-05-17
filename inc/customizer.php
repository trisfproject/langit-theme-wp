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
		'company_short_intro'         => __( 'Company Introduction', 'langit' ),
		'company_description'         => __( 'PT Global Teknindo berfokus pada perencanaan, instalasi, integrasi, dan pemeliharaan sistem teknologi gedung. Setiap pekerjaan dijalankan dengan standar kerja terukur, dokumentasi yang jelas, serta hasil instalasi yang mudah dioperasikan dan dirawat dalam jangka panjang.', 'langit' ),
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
		'company_description' => array(
			'label'    => esc_html__( 'Company Description Section', 'langit' ),
			'section'  => 'langit_company_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
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
