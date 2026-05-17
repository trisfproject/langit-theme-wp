<?php
/**
 * Contact page sections.
 *
 * @package Langit
 */

$langit_icon_uri = get_template_directory_uri() . '/assets/icons/';
$langit_whatsapp_url = langit_contact_whatsapp_url();
$langit_phone_number = langit_theme_mod( 'contact_whatsapp_number' );
$langit_phone_url    = 'tel:' . preg_replace( '/[^0-9+]/', '', $langit_phone_number );

$langit_contacts = array(
	array(
		'label' => esc_html__( 'WhatsApp', 'langit' ),
		'value' => langit_theme_mod( 'contact_whatsapp_number' ),
		'text'  => esc_html__( 'Hubungi tim kami untuk konsultasi awal terkait kebutuhan proyek, survei lokasi, atau dukungan teknis.', 'langit' ),
		'icon'  => $langit_icon_uri . 'contact.svg',
		'class' => '',
	),
	array(
		'label' => esc_html__( 'Phone', 'langit' ),
		'value' => $langit_phone_number,
		'text'  => esc_html__( 'Gunakan panggilan telepon untuk koordinasi cepat terkait jadwal survey, instalasi, atau support operasional.', 'langit' ),
		'icon'  => $langit_icon_uri . 'time.svg',
		'class' => '',
	),
	array(
		'label' => esc_html__( 'Email', 'langit' ),
		'value' => langit_theme_mod( 'contact_email_address' ),
		'text'  => esc_html__( 'Kirimkan kebutuhan, dokumen proyek, atau permintaan penawaran melalui email resmi.', 'langit' ),
		'icon'  => $langit_icon_uri . 'contact.svg',
		'class' => '',
	),
	array(
		'label' => esc_html__( 'Office Address', 'langit' ),
		'value' => langit_theme_mod( 'company_address' ),
		'text'  => esc_html__( 'Tim kami melayani kebutuhan proyek untuk gedung komersial, industri, pemerintahan, dan fasilitas operasional lainnya.', 'langit' ),
		'icon'  => $langit_icon_uri . 'location.svg',
		'class' => '',
	),
	array(
		'label' => esc_html__( 'Working Hours', 'langit' ),
		'value' => langit_theme_mod( 'company_working_hours' ),
		'text'  => esc_html__( 'Tim kami siap membantu pada jam kerja dan merespons kebutuhan prioritas proyek.', 'langit' ),
		'icon'  => $langit_icon_uri . 'time.svg',
		'class' => 'contact-card--wide',
	),
);
?>

<section id="contact-information" class="section section--surface">
	<div class="container contact-page-grid">
		<div class="stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => langit_theme_mod( 'contact_info_eyebrow' ),
					'title'   => langit_theme_mod( 'contact_info_title' ),
					'text'    => esc_html__( 'Pilih jalur komunikasi yang paling sesuai untuk konsultasi proyek, permintaan survey, kebutuhan maintenance, atau koordinasi teknis.', 'langit' ),
				)
			);
			?>

			<div class="contact-info-grid contact-info-grid--enterprise">
				<?php foreach ( $langit_contacts as $langit_contact ) : ?>
					<?php
					langit_card(
						array(
							'meta'       => $langit_contact['label'],
							'title'      => $langit_contact['value'],
							'text'       => $langit_contact['text'],
							'class'      => langit_class_names( array( 'contact-card', $langit_contact['class'] ) ),
							'icon_class' => 'contact-card__icon',
							'icon_url'   => $langit_contact['icon'],
						)
					);
					?>
				<?php endforeach; ?>
			</div>

			<div class="cluster contact-page-actions">
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
							'label'   => esc_html__( 'Call Now', 'langit' ),
							'variant' => 'ghost',
						)
					);
				}
				?>
			</div>
		</div>

		<div class="contact-form-stack">
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
