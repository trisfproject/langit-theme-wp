<?php
/**
 * Products page sections.
 *
 * @package Langit
 */

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

$langit_services_query = new WP_Query(
	array(
		'post_type'              => 'service',
		'post_status'            => 'publish',
		'posts_per_page'         => -1,
		'orderby'                => array(
			'menu_order' => 'ASC',
			'title'      => 'ASC',
		),
		'no_found_rows'          => true,
		'update_post_meta_cache' => true,
		'update_post_term_cache' => true,
	)
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
			<?php if ( $langit_services_query->have_posts() ) : ?>
				<?php
				while ( $langit_services_query->have_posts() ) :
					$langit_services_query->the_post();
					langit_service_card( get_the_ID() );
				endwhile;
				wp_reset_postdata();
				?>
			<?php else : ?>
				<?php
				foreach ( langit_default_services() as $langit_service ) {
					langit_service_card( $langit_service );
				}
				?>
			<?php endif; ?>
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
langit_inquiry( 'service' );
?>
