<?php
/**
 * Contact page sections.
 *
 * @package Langit
 */

$langit_whatsapp_url = langit_contact_whatsapp_url();
$langit_phone_number = langit_theme_mod( 'contact_whatsapp_number' );
$langit_phone_url    = 'tel:' . preg_replace( '/[^0-9+]/', '', $langit_phone_number );
$langit_email        = langit_theme_mod( 'contact_email_address' );
$langit_address      = langit_theme_mod( 'company_address' );
?>
<?php
langit_page_hero(
	array(
		'eyebrow' => esc_html__( 'CONTACT INFORMATION', 'langit' ),
		'title'   => esc_html__( 'Reach Our Team', 'langit' ),
		'text'    => esc_html__( 'Hubungi tim Global Teknindo untuk konsultasi proyek, permintaan survey, kebutuhan maintenance, maupun dukungan teknis untuk sistem keamanan, jaringan, elektrikal, fire alarm, dan infrastruktur bangunan.', 'langit' ),
	)
);
?>

<section class="contact-bar-section">
	<div class="container contact-bar">
		<div class="contact-bar__item">
			<span class="contact-bar__label"><?php esc_html_e( 'Office Phone', 'langit' ); ?></span>
			<a href="<?php echo esc_url( $langit_phone_url ); ?>" class="contact-bar__value"><?php echo esc_html( $langit_phone_number ); ?></a>
		</div>
		<div class="contact-bar__item">
			<span class="contact-bar__label"><?php esc_html_e( 'Email', 'langit' ); ?></span>
			<a href="mailto:<?php echo esc_attr( $langit_email ); ?>" class="contact-bar__value"><?php echo esc_html( $langit_email ); ?></a>
		</div>
		<div class="contact-bar__item">
			<span class="contact-bar__label"><?php esc_html_e( 'Office Address', 'langit' ); ?></span>
			<span class="contact-bar__value"><?php echo esc_html( $langit_address ); ?></span>
		</div>
		<div class="contact-bar__actions">
			<?php
			langit_button(
				array(
					'url'   => $langit_whatsapp_url,
					'label' => esc_html__( 'Chat via WhatsApp', 'langit' ),
				)
			);

			if ( ! empty( $langit_phone_number ) ) {
				langit_button(
					array(
						'url'     => $langit_phone_url,
						'label'   => esc_html__( 'Call Office', 'langit' ),
						'variant' => 'ghost',
					)
				);
			}
			?>
		</div>
	</div>
</section>

<section id="contact-form-section" class="section section--surface">
	<div class="container contact-page-grid">
		<div class="contact-panel contact-panel--form contact-form-stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => langit_theme_mod( 'contact_form_eyebrow' ),
					'title'   => langit_theme_mod( 'contact_form_title' ),
					'text'    => langit_theme_mod( 'contact_form_description' ),
					'class'   => 'stack',
				)
			);
			?>
			<?php langit_contact_form_area(); ?>
		</div>
	</div>
</section>
