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
		'footer_company_description'  => __( 'Menyediakan solusi teknologi gedung terintegrasi melalui konsultasi, instalasi, integrasi, dan pemeliharaan yang mendukung keandalan operasional fasilitas industri maupun komersial.', 'langit' ),
		'footer_copyright_text'       => __( 'Copyright {year} {site_name}. All rights reserved.', 'langit' ),
		'footer_whatsapp'             => '+62 812 0000 0000',
		'footer_email'                => 'info@globalteknindo.co.id',
		'footer_address'              => __( 'Office Address', 'langit' ),
		'footer_working_hours'        => __( 'Monday - Friday, 08.00 - 17.00', 'langit' ),
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
			'title' => esc_html__( 'Company Settings', 'langit' ),
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
		'footer_company_description' => array(
			'label'    => esc_html__( 'Footer Company Description', 'langit' ),
			'section'  => 'langit_footer_settings',
			'type'     => 'textarea',
			'sanitize' => 'langit_sanitize_textarea',
		),
		'footer_copyright_text' => array(
			'label'       => esc_html__( 'Footer Copyright Text', 'langit' ),
			'description' => esc_html__( 'Use {year} and {site_name} as optional placeholders.', 'langit' ),
			'section'     => 'langit_footer_settings',
		),
		'footer_whatsapp' => array(
			'label'   => esc_html__( 'WhatsApp', 'langit' ),
			'section' => 'langit_footer_settings',
		),
		'footer_email' => array(
			'label'    => esc_html__( 'Email', 'langit' ),
			'section'  => 'langit_footer_settings',
			'type'     => 'email',
			'sanitize' => 'sanitize_email',
		),
		'footer_address' => array(
			'label'   => esc_html__( 'Address', 'langit' ),
			'section' => 'langit_footer_settings',
		),
		'footer_working_hours' => array(
			'label'   => esc_html__( 'Working Hours', 'langit' ),
			'section' => 'langit_footer_settings',
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
