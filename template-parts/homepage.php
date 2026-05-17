<?php
/**
 * Homepage sections.
 *
 * @package Langit
 */

$langit_image_uri      = get_template_directory_uri() . '/assets/images/';
$langit_services_query = null;
$langit_projects_query = null;
$langit_testimonials_query = null;
$langit_team_query = null;
$langit_faq_query = null;
$langit_downloads_query = null;
$langit_industries     = langit_theme_mod_enabled( 'show_industry_section' ) ? langit_homepage_industries() : array();

if ( langit_theme_mod_enabled( 'show_services_section' ) ) {
	$langit_featured_service = langit_theme_mod_id_list( 'featured_service_ids' );
	$langit_service_args     = array(
		'post_type'              => 'service',
		'post_status'            => 'publish',
		'posts_per_page'         => absint( langit_theme_mod( 'featured_service_count' ) ),
		'orderby'                => array(
			'menu_order' => 'ASC',
			'title'      => 'ASC',
		),
		'no_found_rows'          => true,
		'update_post_meta_cache' => true,
		'update_post_term_cache' => true,
	);

	if ( ! empty( $langit_featured_service ) ) {
		$langit_service_args['post__in'] = $langit_featured_service;
		$langit_service_args['orderby']  = 'post__in';
	}

	$langit_services_query = new WP_Query( $langit_service_args );
}

if ( langit_theme_mod_enabled( 'show_projects_section' ) ) {
	$langit_featured_project = langit_theme_mod_id_list( 'featured_project_ids' );
	$langit_project_args     = array(
		'post_type'              => 'project',
		'post_status'            => 'publish',
		'posts_per_page'         => absint( langit_theme_mod( 'featured_project_count' ) ),
		'orderby'                => array(
			'menu_order' => 'ASC',
			'date'       => 'DESC',
		),
		'no_found_rows'          => true,
		'update_post_meta_cache' => true,
		'update_post_term_cache' => true,
	);

	if ( ! empty( $langit_featured_project ) ) {
		$langit_project_args['post__in'] = $langit_featured_project;
		$langit_project_args['orderby']  = 'post__in';
	}

	$langit_projects_query = new WP_Query( $langit_project_args );
}

if ( langit_theme_mod_enabled( 'show_testimonials_section' ) || langit_theme_mod_enabled( 'show_client_logo_section' ) ) {
	$langit_featured_testimonial = langit_theme_mod_id_list( 'featured_testimonial_ids' );
	$langit_testimonial_args     = array(
		'post_type'              => 'testimonial',
		'post_status'            => 'publish',
		'posts_per_page'         => absint( langit_theme_mod( 'featured_testimonial_count' ) ),
		'orderby'                => array(
			'menu_order' => 'ASC',
			'date'       => 'DESC',
		),
		'no_found_rows'          => true,
		'update_post_meta_cache' => true,
		'update_post_term_cache' => true,
	);

	if ( ! empty( $langit_featured_testimonial ) ) {
		$langit_testimonial_args['post__in'] = $langit_featured_testimonial;
		$langit_testimonial_args['orderby']  = 'post__in';
	}

	$langit_testimonials_query = new WP_Query( $langit_testimonial_args );
}

if ( langit_theme_mod_enabled( 'show_team_section' ) ) {
	$langit_featured_team = langit_theme_mod_id_list( 'featured_team_ids' );
	$langit_team_args     = array(
		'post_type'              => 'team',
		'post_status'            => 'publish',
		'posts_per_page'         => absint( langit_theme_mod( 'featured_team_count' ) ),
		'orderby'                => array(
			'menu_order' => 'ASC',
			'title'      => 'ASC',
		),
		'no_found_rows'          => true,
		'update_post_meta_cache' => true,
		'update_post_term_cache' => true,
	);

	if ( ! empty( $langit_featured_team ) ) {
		$langit_team_args['post__in'] = $langit_featured_team;
		$langit_team_args['orderby']  = 'post__in';
	}

	$langit_team_query = new WP_Query( $langit_team_args );
}

if ( langit_theme_mod_enabled( 'show_faq_section' ) ) {
	$langit_featured_faq = langit_theme_mod_id_list( 'featured_faq_ids' );
	$langit_faq_args     = array(
		'post_type'              => 'faq',
		'post_status'            => 'publish',
		'posts_per_page'         => absint( langit_theme_mod( 'featured_faq_count' ) ),
		'orderby'                => array(
			'menu_order' => 'ASC',
			'title'      => 'ASC',
		),
		'no_found_rows'          => true,
		'update_post_meta_cache' => true,
		'update_post_term_cache' => true,
	);

	if ( ! empty( $langit_featured_faq ) ) {
		$langit_faq_args['post__in'] = $langit_featured_faq;
		$langit_faq_args['orderby']  = 'post__in';
	}

	$langit_faq_query = new WP_Query( $langit_faq_args );
}

if ( langit_theme_mod_enabled( 'show_downloads_section' ) ) {
	$langit_featured_download = langit_theme_mod_id_list( 'featured_download_ids' );
	$langit_download_args     = array(
		'post_type'              => 'download',
		'post_status'            => 'publish',
		'posts_per_page'         => absint( langit_theme_mod( 'featured_download_count' ) ),
		'orderby'                => array(
			'menu_order' => 'ASC',
			'date'       => 'DESC',
		),
		'no_found_rows'          => true,
		'update_post_meta_cache' => true,
		'update_post_term_cache' => true,
	);

	if ( ! empty( $langit_featured_download ) ) {
		$langit_download_args['post__in'] = $langit_featured_download;
		$langit_download_args['orderby']  = 'post__in';
	}

	$langit_downloads_query = new WP_Query( $langit_download_args );
}
?>

<?php if ( langit_theme_mod_enabled( 'show_hero_section' ) ) : ?>
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
					<img src="<?php echo esc_url( $langit_image_uri . 'langit-project-1200.jpg' ); ?>" width="1200" height="676" alt="" loading="eager" decoding="async" fetchpriority="high">
				</picture>
				<div class="hero-panel__badge">
					<span></span>
					<span></span>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if ( langit_theme_mod_enabled( 'show_company_section' ) ) : ?>
	<section class="section section--surface">
		<div class="container split-layout">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => langit_theme_mod( 'company_short_intro' ),
					'title'   => langit_theme_mod( 'company_section_title' ),
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
<?php endif; ?>

<?php if ( langit_theme_mod_enabled( 'show_services_section' ) ) : ?>
	<section class="section">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => langit_theme_mod( 'services_section_eyebrow' ),
					'title'   => langit_theme_mod( 'services_section_title' ),
				)
			);
			?>

			<div class="service-grid">
				<?php if ( $langit_services_query instanceof WP_Query && $langit_services_query->have_posts() ) : ?>
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
<?php endif; ?>

<?php if ( langit_theme_mod_enabled( 'show_industry_section' ) && ! empty( $langit_industries ) ) : ?>
	<section class="section section--surface">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => langit_theme_mod( 'industry_section_eyebrow' ),
					'title'   => langit_theme_mod( 'industry_section_title' ),
				)
			);
			?>

			<div class="coverage-grid">
				<?php foreach ( $langit_industries as $langit_industry ) : ?>
					<article class="coverage-card">
						<h3><?php echo esc_html( $langit_industry['title'] ); ?></h3>
						<p><?php echo esc_html( $langit_industry['description'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if ( $langit_projects_query instanceof WP_Query && $langit_projects_query->have_posts() ) : ?>
	<section class="section">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => langit_theme_mod( 'projects_section_eyebrow' ),
					'title'   => langit_theme_mod( 'projects_section_title' ),
					'center'  => true,
				)
			);
			?>

			<div class="blog-grid project-grid">
				<?php
				while ( $langit_projects_query->have_posts() ) :
					$langit_projects_query->the_post();
					langit_project_card( get_the_ID() );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if ( langit_theme_mod_enabled( 'show_trust_section' ) ) : ?>
	<section class="section section--surface">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => langit_theme_mod( 'trust_section_eyebrow' ),
					'title'   => langit_theme_mod( 'trust_section_title' ),
					'text'    => langit_theme_mod( 'trust_section_description' ),
					'center'  => true,
				)
			);
			?>

			<div class="trust-grid">
				<?php foreach ( langit_trust_stats() as $langit_stat ) : ?>
					<article class="card trust-card">
						<strong><?php echo esc_html( $langit_stat['value'] ); ?></strong>
						<h3><?php echo esc_html( $langit_stat['label'] ); ?></h3>
						<p><?php echo esc_html( $langit_stat['description'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if ( $langit_team_query instanceof WP_Query && $langit_team_query->have_posts() ) : ?>
	<section class="section">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => langit_theme_mod( 'team_section_eyebrow' ),
					'title'   => langit_theme_mod( 'team_section_title' ),
					'text'    => langit_theme_mod( 'team_section_description' ),
					'center'  => true,
				)
			);
			?>

			<div class="team-grid">
				<?php
				while ( $langit_team_query->have_posts() ) :
					$langit_team_query->the_post();
					langit_team_card( get_the_ID() );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if ( $langit_testimonials_query instanceof WP_Query && $langit_testimonials_query->have_posts() ) : ?>
	<?php if ( langit_theme_mod_enabled( 'show_testimonials_section' ) ) : ?>
		<section class="section">
			<div class="container stack">
				<?php
				langit_section_heading(
					array(
						'eyebrow' => langit_theme_mod( 'testimonials_section_eyebrow' ),
						'title'   => langit_theme_mod( 'testimonials_section_title' ),
						'text'    => langit_theme_mod( 'testimonials_section_description' ),
						'center'  => true,
					)
				);
				?>

				<div class="testimonial-grid">
					<?php
					while ( $langit_testimonials_query->have_posts() ) :
						$langit_testimonials_query->the_post();
						langit_testimonial_card( get_the_ID() );
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( langit_theme_mod_enabled( 'show_client_logo_section' ) ) : ?>
		<section class="section section--compact">
			<div class="container stack">
				<h2 class="client-logo-title"><?php echo esc_html( langit_theme_mod( 'client_logo_section_title' ) ); ?></h2>
				<div class="client-logo-grid">
					<?php
					$langit_testimonials_query->rewind_posts();
					while ( $langit_testimonials_query->have_posts() ) :
						$langit_testimonials_query->the_post();
						if ( ! has_post_thumbnail() ) {
							continue;
						}
						?>
						<div class="client-logo-item">
							<?php the_post_thumbnail( 'thumbnail', array( 'loading' => 'lazy', 'decoding' => 'async' ) ); ?>
						</div>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</div>
		</section>
	<?php endif; ?>
<?php endif; ?>

<?php if ( $langit_faq_query instanceof WP_Query && $langit_faq_query->have_posts() ) : ?>
	<section class="section section--surface">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => langit_theme_mod( 'faq_section_eyebrow' ),
					'title'   => langit_theme_mod( 'faq_section_title' ),
					'text'    => langit_theme_mod( 'faq_section_description' ),
					'center'  => true,
				)
			);
			?>

			<div class="faq-list">
				<?php
				$langit_faq_index = 0;
				while ( $langit_faq_query->have_posts() ) :
					$langit_faq_query->the_post();
					langit_faq_item( get_the_ID(), 0 === $langit_faq_index );
					++$langit_faq_index;
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if ( $langit_downloads_query instanceof WP_Query && $langit_downloads_query->have_posts() ) : ?>
	<section class="section">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => langit_theme_mod( 'downloads_section_eyebrow' ),
					'title'   => langit_theme_mod( 'downloads_section_title' ),
					'text'    => langit_theme_mod( 'downloads_section_description' ),
					'center'  => true,
				)
			);
			?>

			<div class="download-grid">
				<?php
				while ( $langit_downloads_query->have_posts() ) :
					$langit_downloads_query->the_post();
					langit_download_card( get_the_ID() );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if ( langit_theme_mod_enabled( 'show_cta_section' ) ) : ?>
	<?php
	langit_cta(
		array(
			'eyebrow' => langit_theme_mod( 'cta_eyebrow' ),
			'title'   => langit_theme_mod( 'cta_title' ),
			'text'    => langit_theme_mod( 'cta_description' ),
			'variant' => langit_cta_variant( langit_theme_mod( 'global_cta_variant' ) ),
			'actions' => array(
				array(
					'url'   => langit_theme_mod( 'cta_button_url' ),
					'label' => langit_theme_mod( 'cta_button_text' ),
				),
			),
		)
	);
	?>
<?php endif; ?>
