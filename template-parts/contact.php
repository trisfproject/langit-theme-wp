<?php
/**
 * Contact page sections.
 *
 * @package Langit
 */

$langit_icon_uri = get_template_directory_uri() . '/assets/icons/';

$langit_contacts = array(
	array(
		'label' => esc_html__( 'WhatsApp', 'langit' ),
		'value' => esc_html__( '+62 812 0000 0000', 'langit' ),
		'text'  => esc_html__( 'Hubungi tim kami untuk konsultasi awal terkait kebutuhan proyek, survei lokasi, atau dukungan teknis.', 'langit' ),
		'icon'  => $langit_icon_uri . 'contact.svg',
	),
	array(
		'label' => esc_html__( 'Email', 'langit' ),
		'value' => esc_html__( 'info@globalteknindo.co.id', 'langit' ),
		'text'  => esc_html__( 'Kirimkan kebutuhan, dokumen proyek, atau permintaan penawaran melalui email resmi.', 'langit' ),
		'icon'  => $langit_icon_uri . 'contact.svg',
	),
	array(
		'label' => esc_html__( 'Office Address', 'langit' ),
		'value' => esc_html__( 'Indonesia', 'langit' ),
		'text'  => esc_html__( 'Tim kami melayani kebutuhan proyek untuk gedung komersial, industri, pemerintahan, dan fasilitas operasional lainnya.', 'langit' ),
		'icon'  => $langit_icon_uri . 'location.svg',
	),
	array(
		'label' => esc_html__( 'Working Hours', 'langit' ),
		'value' => esc_html__( 'Monday - Friday', 'langit' ),
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
		'text'    => esc_html__( 'Hubungi PT Global Teknindo untuk konsultasi kebutuhan Mechanical Electrical, CCTV, jaringan, fire alarm, audio, instalasi, dan layanan pemeliharaan.', 'langit' ),
	)
);
?>

<section id="contact-information" class="section">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Contact Information', 'langit' ),
				'title'   => esc_html__( 'Reach our team through the right channel.', 'langit' ),
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
				'eyebrow' => esc_html__( 'Contact Form', 'langit' ),
				'title'   => esc_html__( 'Send your project inquiry.', 'langit' ),
				'text'    => esc_html__( 'Kirimkan informasi proyek, lokasi pekerjaan, layanan yang dibutuhkan, dan jadwal yang diharapkan agar tim kami dapat menindaklanjuti dengan tepat.', 'langit' ),
				'class'   => 'stack',
			)
		);
		?>

		<div class="form-placeholder">
			<div class="form-placeholder__fields" aria-hidden="true">
				<span><?php esc_html_e( 'Full Name', 'langit' ); ?></span>
				<span><?php esc_html_e( 'Company Name', 'langit' ); ?></span>
				<span><?php esc_html_e( 'Email Address', 'langit' ); ?></span>
				<span><?php esc_html_e( 'WhatsApp Number', 'langit' ); ?></span>
				<span><?php esc_html_e( 'Service Needed', 'langit' ); ?></span>
				<span class="form-placeholder__message"><?php esc_html_e( 'Message', 'langit' ); ?></span>
			</div>
			<div class="shortcode-placeholder">[fluentform id="1"]</div>
		</div>
	</div>
</section>

<section id="map" class="section">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Google Maps', 'langit' ),
				'title'   => esc_html__( 'Office and Project Coverage', 'langit' ),
			)
		);
		?>
		<div class="map-placeholder" role="img" aria-label="<?php esc_attr_e( 'Service area map', 'langit' ); ?>">
			<span><?php esc_html_e( 'Area layanan dan lokasi kantor dapat ditampilkan melalui integrasi Google Maps.', 'langit' ); ?></span>
		</div>
	</div>
</section>

<?php
langit_cta(
	array(
		'title'       => esc_html__( 'Need technical consultation for your project?', 'langit' ),
		'text'        => esc_html__( 'Tim Langit siap membantu meninjau kebutuhan sistem, menentukan solusi yang sesuai, dan menyiapkan langkah kerja berikutnya.', 'langit' ),
		'panel_class' => 'support-cta',
		'actions'     => array(
			array(
				'url'   => home_url( '/contact/' ),
				'label' => esc_html__( 'Contact Us', 'langit' ),
			),
			array(
				'url'     => 'https://wa.me/6281200000000',
				'label'   => esc_html__( 'WhatsApp', 'langit' ),
				'variant' => 'ghost',
			),
		),
	)
);
?>
