<?php
/**
 * Products page sections.
 *
 * @package Langit
 */

$langit_icon_uri = get_template_directory_uri() . '/assets/icons/';

$langit_products = array(
	array(
		'title'       => esc_html__( 'CCTV & Security System', 'langit' ),
		'description' => esc_html__( 'Perencanaan dan instalasi sistem kamera pengawas, perangkat keamanan, dan pemantauan area untuk meningkatkan perlindungan fasilitas secara terukur.', 'langit' ),
		'icon'        => $langit_icon_uri . 'cctv.svg',
	),
	array(
		'title'       => esc_html__( 'Networking Infrastructure', 'langit' ),
		'description' => esc_html__( 'Pembangunan infrastruktur jaringan data untuk kantor, gedung, dan area operasional yang membutuhkan konektivitas stabil, rapi, dan mudah dikembangkan.', 'langit' ),
		'icon'        => $langit_icon_uri . 'network.svg',
	),
	array(
		'title'       => esc_html__( 'Mechanical Electrical', 'langit' ),
		'description' => esc_html__( 'Dukungan sistem mekanikal elektrikal untuk bangunan dan fasilitas industri, termasuk integrasi perangkat pendukung operasional yang aman dan efisien.', 'langit' ),
		'icon'        => $langit_icon_uri . 'electrical.svg',
	),
	array(
		'title'       => esc_html__( 'Fire Alarm System', 'langit' ),
		'description' => esc_html__( 'Instalasi sistem deteksi dan alarm kebakaran untuk mendukung kesiapsiagaan, keselamatan penghuni, dan kepatuhan area bangunan.', 'langit' ),
		'icon'        => $langit_icon_uri . 'fire.svg',
	),
	array(
		'title'       => esc_html__( 'Audio & Public Address', 'langit' ),
		'description' => esc_html__( 'Solusi audio, paging, dan public address untuk komunikasi internal gedung, fasilitas umum, area produksi, dan kebutuhan pengumuman operasional.', 'langit' ),
		'icon'        => $langit_icon_uri . 'audio.svg',
	),
	array(
		'title'       => esc_html__( 'Installation & Maintenance', 'langit' ),
		'description' => esc_html__( 'Layanan instalasi, pemeriksaan, perawatan, dan dukungan teknis berkala untuk menjaga sistem tetap optimal dan siap digunakan.', 'langit' ),
		'icon'        => $langit_icon_uri . 'maintenance.svg',
	),
);

$langit_solutions = array(
	esc_html__( 'Industrial Solutions', 'langit' ),
	esc_html__( 'Commercial Building Solutions', 'langit' ),
	esc_html__( 'Government Solutions', 'langit' ),
	esc_html__( 'Residential Solutions', 'langit' ),
);

$langit_process = array(
	esc_html__( 'Consultation', 'langit' ),
	esc_html__( 'Planning', 'langit' ),
	esc_html__( 'Installation', 'langit' ),
	esc_html__( 'Maintenance', 'langit' ),
);
?>

<?php
langit_page_hero(
	array(
		'eyebrow' => esc_html__( 'Products', 'langit' ),
		'title'   => get_the_title(),
		'text'    => esc_html__( 'Solusi teknologi gedung untuk keamanan, jaringan, elektrikal, alarm, audio, instalasi, dan pemeliharaan sistem yang mendukung operasional modern.', 'langit' ),
	)
);
?>

<section class="section">
	<div class="container company-overview">
		<div class="stack">
			<p class="section-eyebrow"><?php esc_html_e( 'Products Overview', 'langit' ); ?></p>
			<h2><?php esc_html_e( 'Integrated systems for modern building operations.', 'langit' ); ?></h2>
		</div>
		<div class="stack">
			<p><?php esc_html_e( 'PT Global Teknindo menyediakan solusi teknologi gedung meliputi CCTV & Security System, Networking Infrastructure, Mechanical Electrical, Fire Alarm System, Audio & Public Address, serta Installation & Maintenance Service.', 'langit' ); ?></p>
			<p><?php esc_html_e( 'Setiap layanan dirancang untuk membantu pelanggan membangun sistem yang rapi, terdokumentasi, mudah dirawat, dan sesuai kebutuhan operasional di lapangan.', 'langit' ); ?></p>
		</div>
	</div>
</section>

<section class="section section--surface">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Product & Service Grid', 'langit' ),
				'title'   => esc_html__( 'Core services for security, infrastructure, and facility systems.', 'langit' ),
				'center'  => true,
			)
		);
		?>

		<div class="service-grid">
			<?php foreach ( $langit_products as $langit_product ) : ?>
				<article id="<?php echo esc_attr( sanitize_title( $langit_product['title'] ) ); ?>" class="card product-card">
					<div class="product-card__visual" aria-hidden="true">
						<img src="<?php echo esc_url( $langit_product['icon'] ); ?>" width="48" height="48" alt="" loading="lazy" decoding="async">
					</div>
					<div class="product-card__body">
						<h3><?php echo esc_html( $langit_product['title'] ); ?></h3>
						<p><?php echo esc_html( $langit_product['description'] ); ?></p>
					</div>
					<?php
					langit_button(
						array(
							'url'     => home_url( '/contact/' ),
							'label'   => esc_html__( 'Request Info', 'langit' ),
							'variant' => 'ghost',
						)
					);
					?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Featured Solutions', 'langit' ),
				'title'   => esc_html__( 'Adaptable solutions for different project environments.', 'langit' ),
				'center'  => true,
			)
		);
		?>

		<div class="coverage-grid">
			<?php foreach ( $langit_solutions as $langit_solution ) : ?>
				<article class="coverage-card solution-card">
					<h3><?php echo esc_html( $langit_solution ); ?></h3>
					<p><?php esc_html_e( 'Solusi dapat disesuaikan dengan kebutuhan area, skala proyek, prioritas keamanan, dan standar operasional pelanggan.', 'langit' ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section section--surface">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Process', 'langit' ),
				'title'   => esc_html__( 'Simple workflow from requirement to long-term support.', 'langit' ),
				'center'  => true,
			)
		);
		?>

		<div class="process-grid">
			<?php foreach ( $langit_process as $langit_index => $langit_step ) : ?>
				<article class="process-card">
					<span><?php echo esc_html( str_pad( (string) ( $langit_index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					<h3><?php echo esc_html( $langit_step ); ?></h3>
					<p><?php esc_html_e( 'Setiap tahap dilakukan secara terarah, mulai dari pengumpulan kebutuhan, penyusunan rencana teknis, pelaksanaan instalasi, hingga dukungan pemeliharaan.', 'langit' ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
langit_cta(
	array(
		'title'   => esc_html__( 'Need the right system for your project?', 'langit' ),
		'actions' => array(
			array(
				'url'   => home_url( '/contact/' ),
				'label' => esc_html__( 'Contact Us', 'langit' ),
			),
		),
	)
);
?>
