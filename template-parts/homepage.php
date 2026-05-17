<?php
/**
 * Homepage sections.
 *
 * @package Langit
 */

$langit_image_uri = get_template_directory_uri() . '/assets/images/';
$langit_icon_uri  = get_template_directory_uri() . '/assets/icons/';

$langit_services = array(
	array(
		'title' => esc_html__( 'CCTV & Security System', 'langit' ),
		'icon'  => $langit_icon_uri . 'cctv.svg',
	),
	array(
		'title' => esc_html__( 'Networking Infrastructure', 'langit' ),
		'icon'  => $langit_icon_uri . 'network.svg',
	),
	array(
		'title' => esc_html__( 'Mechanical Electrical', 'langit' ),
		'icon'  => $langit_icon_uri . 'electrical.svg',
	),
	array(
		'title' => esc_html__( 'Fire Alarm System', 'langit' ),
		'icon'  => $langit_icon_uri . 'fire.svg',
	),
	array(
		'title' => esc_html__( 'Audio & Public Address', 'langit' ),
		'icon'  => $langit_icon_uri . 'audio.svg',
	),
	array(
		'title' => esc_html__( 'Installation & Maintenance', 'langit' ),
		'icon'  => $langit_icon_uri . 'maintenance.svg',
	),
);

$langit_industries = array(
	esc_html__( 'Industrial', 'langit' ),
	esc_html__( 'Commercial Building', 'langit' ),
	esc_html__( 'Government', 'langit' ),
	esc_html__( 'Residential', 'langit' ),
);
?>

<section class="hero hero--home">
	<div class="container hero-grid">
		<div class="hero__content stack">
			<p class="section-eyebrow"><?php esc_html_e( 'Langit Industrial Technology', 'langit' ); ?></p>
			<h1><?php esc_html_e( 'Reliable Building Technology Systems', 'langit' ); ?></h1>
			<p class="lede"><?php esc_html_e( 'PT Global Teknindo membantu perusahaan, fasilitas industri, dan bangunan komersial membangun sistem keamanan, jaringan, elektrikal, alarm, audio, instalasi, dan pemeliharaan yang rapi serta andal.', 'langit' ); ?></p>
			<div class="cluster">
				<?php
				langit_button(
					array(
						'url'   => home_url( '/products/' ),
						'label' => esc_html__( 'Our Services', 'langit' ),
					)
				);
				langit_button(
					array(
						'url'     => home_url( '/contact/' ),
						'label'   => esc_html__( 'Contact Us', 'langit' ),
						'variant' => 'ghost',
					)
				);
				?>
			</div>
		</div>

		<div class="hero-panel hero-panel--image" aria-hidden="true">
			<picture>
				<source
					type="image/webp"
					srcset="<?php echo esc_url( $langit_image_uri . 'langit-project-720.webp' ); ?> 720w, <?php echo esc_url( $langit_image_uri . 'langit-project-1200.webp' ); ?> 1200w"
					sizes="(min-width: 901px) 42vw, calc(100vw - 2.5rem)"
				>
				<img src="<?php echo esc_url( $langit_image_uri . 'langit-project-1200.jpg' ); ?>" width="1200" height="676" alt="">
			</picture>
			<div class="hero-panel__badge">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
</section>

<section class="section section--surface">
	<div class="container split-layout">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Company Introduction', 'langit' ),
				'title'   => esc_html__( 'Technology Partner for Modern Facilities', 'langit' ),
				'text'    => esc_html__( 'PT Global Teknindo berfokus pada perencanaan, instalasi, integrasi, dan pemeliharaan sistem teknologi gedung. Setiap pekerjaan dijalankan dengan standar kerja terukur, dokumentasi yang jelas, serta hasil instalasi yang mudah dioperasikan dan dirawat dalam jangka panjang.', 'langit' ),
				'class'   => 'stack',
			)
		);

		langit_responsive_image(
			array(
				'src'     => $langit_image_uri . 'langit-project-1200.jpg',
				'sources' => array(
					array(
						'type'   => 'image/webp',
						'srcset' => esc_url( $langit_image_uri . 'langit-project-720.webp' ) . ' 720w, ' . esc_url( $langit_image_uri . 'langit-project-1200.webp' ) . ' 1200w',
					),
				),
				'sizes'   => '(min-width: 901px) 38vw, calc(100vw - 2.5rem)',
				'width'   => '1200',
				'height'  => '676',
				'alt'     => esc_attr__( 'Teknisi Langit mengerjakan instalasi CCTV, jaringan, fire alarm, dan audio gedung.', 'langit' ),
			)
		);
		?>
	</div>
</section>

<section class="section">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Our Services', 'langit' ),
				'title'   => esc_html__( 'Integrated Services for Building Infrastructure', 'langit' ),
			)
		);
		?>

		<div class="service-grid">
			<?php foreach ( $langit_services as $langit_service ) : ?>
				<?php
				langit_card(
					array(
						'title'      => $langit_service['title'],
						'text'       => esc_html__( 'Solusi dirancang sesuai kebutuhan area, standar operasional, dan target keandalan sistem agar proyek berjalan efektif sejak tahap perencanaan hingga dukungan purna jual.', 'langit' ),
						'class'      => 'service-card',
						'icon_class' => 'service-card__icon',
						'icon_url'   => $langit_service['icon'],
					)
				);
				?>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section section--surface">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Industry Coverage', 'langit' ),
				'title'   => esc_html__( 'Built for Diverse Operating Environments', 'langit' ),
			)
		);
		?>

		<div class="coverage-grid">
			<?php foreach ( $langit_industries as $langit_industry ) : ?>
				<article class="coverage-card">
					<h3><?php echo esc_html( $langit_industry ); ?></h3>
					<p><?php esc_html_e( 'Dukungan sistem dapat disesuaikan dengan skala bangunan, pola operasional, dan kebutuhan keamanan di lapangan.', 'langit' ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
langit_cta(
	array(
		'eyebrow' => esc_html__( 'Start a Project', 'langit' ),
		'title'   => esc_html__( 'Discuss Your Building Technology Requirements', 'langit' ),
		'text'    => esc_html__( 'Sampaikan kebutuhan proyek Anda kepada tim kami untuk mendapatkan arahan solusi, estimasi ruang lingkup, dan langkah kerja yang tepat.', 'langit' ),
		'actions' => array(
			array(
				'url'   => home_url( '/contact/' ),
				'label' => esc_html__( 'Contact Us', 'langit' ),
			),
		),
	)
);
?>
