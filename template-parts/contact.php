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


$langit_contacts_row1 = array(
	array(
		'label' => esc_html__( 'WhatsApp', 'langit' ),
		'value' => langit_theme_mod( 'contact_whatsapp_number' ),
		'text'  => '',
		'icon'  => $langit_icon_uri . 'contact.svg',
	),
	array(
		'label' => esc_html__( 'Phone', 'langit' ),
		'value' => $langit_phone_number,
		'text'  => '',
		'icon'  => $langit_icon_uri . 'time.svg',
	),
	array(
		'label' => esc_html__( 'Email', 'langit' ),
		'value' => langit_theme_mod( 'contact_email_address' ),
		'text'  => '',
		'icon'  => $langit_icon_uri . 'contact.svg',
	),
);

$langit_contacts_row2 = array(
	array(
		'label' => esc_html__( 'Office Address', 'langit' ),
		'value' => langit_theme_mod( 'company_address' ),
		'text'  => '',
		'icon'  => $langit_icon_uri . 'location.svg',
	),
	array(
		'label' => esc_html__( 'Working Hours', 'langit' ),
		'value' => langit_theme_mod( 'company_working_hours' ),
		'text'  => esc_html__( 'Respons konsultasi mengikuti jam operasional.', 'langit' ),
		'icon'  => $langit_icon_uri . 'time.svg',
	),
);
?>

<section id="contact-information" class="section section--surface">
	<div class="container contact-page-grid">
		<div class="contact-panel contact-panel--info stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => langit_theme_mod( 'contact_info_eyebrow' ),
					'title'   => langit_theme_mod( 'contact_info_title' ),
					'text'    => esc_html__( 'Pilih jalur komunikasi yang paling sesuai untuk konsultasi proyek, permintaan survey, kebutuhan maintenance, atau koordinasi teknis.', 'langit' ),
				)
			);
			?>

			<div class="contact-info-block">

				<!-- Row 1: WhatsApp · Phone · Email (3 equal columns) -->
				<div class="contact-info-row contact-info-row--channels">
					<?php foreach ( $langit_contacts_row1 as $langit_contact ) : ?>
						<?php
						langit_card(
							array(
								'meta'       => $langit_contact['label'],
								'title'      => $langit_contact['value'],
								'text'       => $langit_contact['text'],
								'class'      => 'contact-card',
								'icon_class' => 'contact-card__icon',
								'icon_url'   => $langit_contact['icon'],
							)
						);
						?>
					<?php endforeach; ?>
				</div>

				<!-- Row 2: Office Address · Working Hours (2 equal columns) -->
				<div class="contact-info-row contact-info-row--location">
					<?php foreach ( $langit_contacts_row2 as $langit_contact ) : ?>
						<?php
						langit_card(
							array(
								'meta'       => $langit_contact['label'],
								'title'      => $langit_contact['value'],
								'text'       => $langit_contact['text'],
								'class'      => 'contact-card',
								'icon_class' => 'contact-card__icon',
								'icon_url'   => $langit_contact['icon'],
							)
						);
						?>
					<?php endforeach; ?>
				</div>

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
