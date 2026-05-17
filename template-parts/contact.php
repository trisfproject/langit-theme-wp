<?php
/**
 * Contact page sections.
 *
 * @package Langit
 */

$langit_icon_uri = get_template_directory_uri() . '/assets/icons/';
$langit_company  = langit_theme_mod( 'company_name' );
$langit_hero_text = str_replace( '{company_name}', $langit_company, langit_theme_mod( 'contact_hero_description' ) );

$langit_contacts = array(
	array(
		'label' => esc_html__( 'WhatsApp', 'langit' ),
		'value' => langit_theme_mod( 'contact_whatsapp_number' ),
		'text'  => esc_html__( 'Hubungi tim kami untuk konsultasi awal terkait kebutuhan proyek, survei lokasi, atau dukungan teknis.', 'langit' ),
		'icon'  => $langit_icon_uri . 'contact.svg',
	),
	array(
		'label' => esc_html__( 'Email', 'langit' ),
		'value' => langit_theme_mod( 'contact_email_address' ),
		'text'  => esc_html__( 'Kirimkan kebutuhan, dokumen proyek, atau permintaan penawaran melalui email resmi.', 'langit' ),
		'icon'  => $langit_icon_uri . 'contact.svg',
	),
	array(
		'label' => esc_html__( 'Office Address', 'langit' ),
		'value' => langit_theme_mod( 'company_address' ),
		'text'  => esc_html__( 'Tim kami melayani kebutuhan proyek untuk gedung komersial, industri, pemerintahan, dan fasilitas operasional lainnya.', 'langit' ),
		'icon'  => $langit_icon_uri . 'location.svg',
	),
	array(
		'label' => esc_html__( 'Working Hours', 'langit' ),
		'value' => langit_theme_mod( 'company_working_hours' ),
		'text'  => esc_html__( 'Tim kami siap membantu pada jam kerja dan merespons kebutuhan prioritas proyek.', 'langit' ),
		'icon'  => $langit_icon_uri . 'time.svg',
	),
);
?>

<?php
langit_page_hero(
	array(
		'eyebrow' => esc_html__( 'Contact', 'langit' ),
		'title'   => get_the_title(),
		'text'    => $langit_hero_text,
	)
);
?>

<section id="contact-information" class="section">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => langit_theme_mod( 'contact_info_eyebrow' ),
				'title'   => langit_theme_mod( 'contact_info_title' ),
			)
		);
		?>

		<div class="contact-info-grid">
			<?php foreach ( $langit_contacts as $langit_contact ) : ?>
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
</section>

<section class="section section--surface">
	<div class="container contact-form-layout">
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

		<div class="contact-form-stack">
			<?php langit_contact_form_area(); ?>
			<?php langit_whatsapp_quick_contact(); ?>
		</div>
	</div>
</section>

<section id="map" class="section">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => langit_theme_mod( 'contact_map_eyebrow' ),
				'title'   => langit_theme_mod( 'contact_map_title' ),
				'text'    => langit_theme_mod( 'contact_map_description' ),
			)
		);
		?>
		<?php langit_contact_map(); ?>
	</div>
</section>

<?php
langit_global_cta(
	'contact',
	array(
		'panel_class' => 'support-cta',
	)
);
?>
