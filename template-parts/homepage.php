<?php
/**
 * Homepage sections.
 *
 * @package Langit
 */

$langit_image_uri      = get_template_directory_uri() . '/assets/images/';
$langit_services_query = new WP_Query(
	array(
		'post_type'              => 'service',
		'post_status'            => 'publish',
		'posts_per_page'         => 6,
		'orderby'                => array(
			'menu_order' => 'ASC',
			'title'      => 'ASC',
		),
		'no_found_rows'          => true,
		'update_post_meta_cache' => true,
		'update_post_term_cache' => true,
	)
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
			<p class="section-eyebrow"><?php echo esc_html( langit_theme_mod( 'hero_eyebrow' ) ); ?></p>
			<h1><?php echo esc_html( langit_theme_mod( 'hero_title' ) ); ?></h1>
			<p class="lede"><?php echo esc_html( langit_theme_mod( 'hero_description' ) ); ?></p>
			<div class="cluster">
				<?php
				langit_button(
					array(
						'url'   => langit_theme_mod( 'hero_primary_button_url' ),
						'label' => langit_theme_mod( 'hero_primary_button_text' ),
					)
				);
				langit_button(
					array(
						'url'     => langit_theme_mod( 'hero_secondary_button_url' ),
						'label'   => langit_theme_mod( 'hero_secondary_button_text' ),
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
				'eyebrow' => langit_theme_mod( 'company_short_intro' ),
				'title'   => esc_html__( 'Technology Partner for Modern Facilities', 'langit' ),
				'text'    => langit_theme_mod( 'company_description' ),
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
			<?php if ( $langit_services_query->have_posts() ) : ?>
				<?php
				while ( $langit_services_query->have_posts() ) :
					$langit_services_query->the_post();
					langit_service_summary_card( get_the_ID() );
				endwhile;
				wp_reset_postdata();
				?>
			<?php else : ?>
				<?php
				foreach ( langit_default_services() as $langit_service ) {
					langit_service_summary_card( $langit_service );
				}
				?>
			<?php endif; ?>
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
