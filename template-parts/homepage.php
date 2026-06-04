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
$langit_certifications_query = null;
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
	$langit_project_count    = absint( langit_theme_mod( 'featured_project_count' ) );

	if ( 3 === $langit_project_count ) {
		$langit_project_count = 4;
	}

	$langit_project_args     = array(
		'post_type'              => 'project',
		'post_status'            => 'publish',
		'posts_per_page'         => $langit_project_count,
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

if ( langit_theme_mod_enabled( 'show_testimonials_section' ) ) {
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

if ( langit_theme_mod_enabled( 'show_certifications_section' ) ) {
	$langit_featured_certification = langit_theme_mod_id_list( 'featured_certification_ids' );
	$langit_certification_args     = array(
		'post_type'              => 'certification',
		'post_status'            => 'publish',
		'posts_per_page'         => absint( langit_theme_mod( 'featured_certification_count' ) ),
		'orderby'                => array(
			'menu_order' => 'ASC',
			'date'       => 'DESC',
		),
		'no_found_rows'          => true,
		'update_post_meta_cache' => true,
		'update_post_term_cache' => true,
	);

	if ( ! empty( $langit_featured_certification ) ) {
		$langit_certification_args['post__in'] = $langit_featured_certification;
		$langit_certification_args['orderby']  = 'post__in';
	}

	$langit_certifications_query = new WP_Query( $langit_certification_args );
}
?>

<?php if ( langit_theme_mod_enabled( 'show_hero_section' ) ) : ?>
	<?php
	/* Hero V2 — force V2 content. Customizer values used as overrideable fallbacks. */
	$langit_hero_primary_url   = langit_theme_mod( 'hero_primary_button_url' ) ?: '#services';

	/* V2 canonical content — DB values override only if explicitly set in Customizer */
	$langit_hero_eyebrow       = langit_theme_mod( 'hero_eyebrow' )            ?: 'INTEGRATED BUILDING TECHNOLOGY';
	$langit_hero_title         = langit_theme_mod( 'hero_title' )               ?: 'Integrated Building Technology Solutions';
	if ( 'Integrated Building Technology Solutions' === $langit_hero_title ) {
		$langit_hero_title = '<span class="hero-v2__headline-line">Integrated Building</span><br class="hero-v2__desktop-br"><span class="hero-v2__headline-line">Technology Solutions</span>';
	}
	$langit_hero_description   = langit_theme_mod( 'hero_description' )         ?: 'PT Global Teknindo menghadirkan solusi terintegrasi untuk keamanan, jaringan, elektrikal, fire alarm, audio, instalasi, dan pemeliharaan melalui konsultasi, implementasi, serta dukungan teknis yang menjaga operasional fasilitas tetap andal.';
	$langit_hero_btn_primary   = langit_theme_mod( 'hero_primary_button_text' ) ?: 'Explore Services';
	$langit_hero_btn_secondary = langit_theme_mod( 'hero_secondary_button_text' ) ?: 'Contact Us';

	// Hero Background Slideshow Settings
	$langit_slideshow_enabled  = langit_theme_mod_enabled( 'hero_slideshow_enabled' );
	$langit_slide_duration     = (int) langit_theme_mod( 'hero_slideshow_duration' ) ?: 10;
	$langit_overlay_strength   = (int) langit_theme_mod( 'hero_overlay_strength' ) ?: 75;

	$langit_hero_slides = array();
	for ( $i = 1; $i <= 6; $i++ ) {
		$slide_img = langit_theme_mod( 'hero_background_' . $i );
		if ( ! empty( $slide_img ) ) {
			$langit_hero_slides[] = $slide_img;
		}
	}

	// Fallback to default if no images uploaded
	if ( empty( $langit_hero_slides ) ) {
		$langit_hero_slides[] = get_template_directory_uri() . '/assets/images/hero/hero-01.webp';
	}

	// Restrict to single slide if slideshow disabled
	if ( ! $langit_slideshow_enabled ) {
		$langit_hero_slides = array( $langit_hero_slides[0] );
	}

	$langit_num_slides = count( $langit_hero_slides );
	?>
	<style id="langit-hero-dynamic-css">
		.hero--v2 .hero-v2__bg-overlay {
			opacity: <?php echo esc_html( $langit_overlay_strength / 100 ); ?> !important;
		}
		<?php if ( $langit_num_slides > 1 ) : 
			$langit_total_time = $langit_num_slides * $langit_slide_duration;
			$langit_transition_time = 2; // 2s crossfade
			$langit_slot_pct = 100 / $langit_num_slides;
			$langit_transition_pct = ( $langit_transition_time / $langit_total_time ) * 100;
			$langit_visible_pct = $langit_slot_pct - $langit_transition_pct;
			$langit_fade_in_start = 100 - $langit_transition_pct;
			?>
			@keyframes hero-slideshow-custom {
				0%, <?php echo esc_html( $langit_visible_pct ); ?>% {
					opacity: 1;
				}
				<?php echo esc_html( $langit_slot_pct ); ?>%, <?php echo esc_html( $langit_fade_in_start ); ?>% {
					opacity: 0;
				}
				100% {
					opacity: 1;
				}
			}
			.hero--v2 .hero-v2__bg-slide {
				display: block;
				position: absolute;
				inset: 0;
				width: 100%;
				height: 100%;
				object-fit: cover;
				object-position: center center;
				opacity: 0;
				animation: hero-slideshow-custom <?php echo esc_html( $langit_total_time ); ?>s linear infinite !important;
			}
			<?php for ( $i = 0; $i < $langit_num_slides; $i++ ) : 
				$langit_delay = -1 * ( ( $langit_num_slides - $i ) % $langit_num_slides ) * $langit_slide_duration;
				?>
				.hero--v2 .hero-v2__bg-slide--<?php echo esc_html( $i + 1 ); ?> {
					animation-delay: <?php echo esc_html( $langit_delay ); ?>s !important;
				}
			<?php endfor; ?>
		<?php else : ?>
			.hero--v2 .hero-v2__bg-slide {
				display: none !important;
			}
			.hero--v2 .hero-v2__bg-slide--1 {
				display: block !important;
				opacity: 1 !important;
				animation: none !important;
			}
		<?php endif; ?>
	</style>
	<section class="hero hero--home hero--v2" aria-label="<?php esc_attr_e( 'Homepage Hero', 'langit' ); ?>" data-langit-hero="v2">
		<!-- Background Layer -->
		<div class="hero-v2__bg-layer" aria-hidden="true">
			<div class="hero-v2__bg-slides">
				<?php foreach ( $langit_hero_slides as $index => $slide_url ) : 
					$slide_class = 'hero-v2__bg-slide hero-v2__bg-slide--' . ( $index + 1 );
					$loading = ( 0 === $index ) ? 'eager' : 'lazy';
					$fetchpriority = ( 0 === $index ) ? 'fetchpriority="high"' : '';
					?>
					<img class="<?php echo esc_attr( $slide_class ); ?>" src="<?php echo esc_url( $slide_url ); ?>" alt="" loading="<?php echo esc_attr( $loading ); ?>" <?php echo $fetchpriority; ?> decoding="async">
				<?php endforeach; ?>
			</div>
			<div class="hero-v2__bg-overlay"></div>
		</div>

		<!-- Content Layer -->
		<div class="hero-v2__content-layer">
			<div class="hero-v2__content-inner">
				<p class="hero-v2__badge">
					<span class="hero-v2__badge-dot" aria-hidden="true"></span>
					<?php echo esc_html( $langit_hero_eyebrow ); ?>
				</p>

				<h1 class="hero-v2__headline"><?php echo wp_kses( $langit_hero_title, array( 'br' => array( 'class' => array() ), 'span' => array( 'class' => array() ) ) ); ?></h1>

				<p class="hero-v2__description"><?php echo esc_html( $langit_hero_description ); ?></p>

				<div class="hero-v2__cta cluster">
					<?php
					langit_button(
						array(
							'url'   => $langit_hero_primary_url,
							'label' => $langit_hero_btn_primary,
							'class' => 'button--hero-primary',
						)
					);
					langit_button(
						array(
							'url'              => langit_theme_mod( 'hero_secondary_button_url' ),
							'label'            => $langit_hero_btn_secondary,
							'variant'          => 'ghost',
							'class'            => 'button--hero-ghost',
							'whatsapp_context' => 'hero',
						)
					);
					?>
				</div>
			</div>
		</div>
	</section>

	<?php if ( langit_theme_mod_enabled( 'show_partners_section' ) ) : ?>
		<!-- Partner Section -->
		<section class="section home-section home-section--partners" aria-label="<?php esc_attr_e( 'Technology Partners', 'langit' ); ?>">
			<div class="partners-container">
				<p class="partners-title"><?php echo esc_html( langit_theme_mod( 'partners_section_eyebrow' ) ?: 'TRUSTED TECHNOLOGY PARTNERS' ); ?></p>
				<div class="partners-marquee">
					<div class="partners-marquee__track">
						<!-- Group 1 -->
						<div class="partner-logo-item partner-logo-item--hikvision" title="Hikvision">
							<svg viewBox="0 0 160 48" width="100%" height="100%" fill="currentColor"><text x="50%" y="32" font-family="'Montserrat', 'Inter', sans-serif" font-size="20" font-weight="900" text-anchor="middle" letter-spacing="0.04em">HIKVISION</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--dahua" title="Dahua">
							<svg viewBox="0 0 160 48" width="100%" height="100%" fill="currentColor"><text x="50%" y="32" font-family="'Montserrat', 'Inter', sans-serif" font-size="20" font-weight="800" text-anchor="middle" letter-spacing="0.02em">dahua</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--uniview" title="Uniview">
							<svg viewBox="0 0 160 48" width="100%" height="100%" fill="currentColor"><text x="50%" y="32" font-family="'Montserrat', 'Inter', sans-serif" font-size="20" font-weight="800" text-anchor="middle" letter-spacing="0.04em">uniview</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--zkteco" title="ZKTeco">
							<svg viewBox="0 0 160 48" width="100%" height="100%" fill="currentColor"><text x="50%" y="32" font-family="'Montserrat', 'Inter', sans-serif" font-size="20" font-weight="800" text-anchor="middle" letter-spacing="0.06em">ZKTeco</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--mikrotik" title="MikroTik">
							<svg viewBox="0 0 180 48" width="100%" height="100%" fill="currentColor"><polygon points="12,12 36,12 24,36" fill="currentColor" opacity="0.85" /><polygon points="20,24 44,24 32,48" fill="currentColor" opacity="0.65" /><text x="52" y="32" font-family="'Montserrat', 'Inter', sans-serif" font-size="19" font-weight="800">MikroTik</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--ubiquiti" title="Ubiquiti">
							<svg viewBox="0 0 180 48" width="100%" height="100%" fill="currentColor"><circle cx="24" cy="24" r="12" fill="none" stroke="currentColor" stroke-width="3" /><circle cx="24" cy="24" r="6" fill="currentColor" /><text x="48" y="32" font-family="'Montserrat', 'Inter', sans-serif" font-size="18" font-weight="800" letter-spacing="0.05em">UBIQUITI</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--ruijie" title="Ruijie">
							<svg viewBox="0 0 160 48" width="100%" height="100%" fill="currentColor"><text x="50%" y="32" font-family="'Montserrat', 'Inter', sans-serif" font-size="20" font-weight="900" text-anchor="middle" letter-spacing="0.02em">Ruijie</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--toa" title="TOA">
							<svg viewBox="0 0 160 48" width="100%" height="100%" fill="currentColor"><text x="50%" y="32" font-family="'Impact', 'Arial Black', sans-serif" font-style="italic" font-size="26" font-weight="900" text-anchor="middle" letter-spacing="0.06em">TOA</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--inter-m" title="Inter-M">
							<svg viewBox="0 0 160 48" width="100%" height="100%" fill="currentColor"><text x="50%" y="32" font-family="'Montserrat', 'Inter', sans-serif" font-size="20" font-weight="800" text-anchor="middle" letter-spacing="0.04em">Inter-M</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--yamaha" title="Yamaha">
							<svg viewBox="0 0 180 48" width="100%" height="100%" fill="currentColor"><circle cx="20" cy="24" r="10" fill="none" stroke="currentColor" stroke-width="2.5"/><line x1="20" y1="14" x2="20" y2="34" stroke="currentColor" stroke-width="2.5"/><line x1="10" y1="24" x2="30" y2="24" stroke="currentColor" stroke-width="2.5"/><text x="44" y="32" font-family="'Times New Roman', 'Georgia', serif" font-size="22" font-weight="900" letter-spacing="0.08em">YAMAHA</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--bosch" title="Bosch">
							<svg viewBox="0 0 160 48" width="100%" height="100%" fill="currentColor"><circle cx="24" cy="24" r="10" fill="none" stroke="currentColor" stroke-width="3" /><line x1="24" y1="14" x2="24" y2="34" stroke="currentColor" stroke-width="3" /><text x="44" y="32" font-family="'Century Gothic', sans-serif" font-size="22" font-weight="900" letter-spacing="0.04em">BOSCH</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--honeywell" title="Honeywell">
							<svg viewBox="0 0 160 48" width="100%" height="100%" fill="currentColor"><text x="50%" y="32" font-family="'Helvetica Neue', Arial, sans-serif" font-size="20" font-weight="900" text-anchor="middle" letter-spacing="-0.02em">Honeywell</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--techma" title="TECHMA">
							<svg viewBox="0 0 160 48" width="100%" height="100%" fill="currentColor"><text x="50%" y="32" font-family="'Montserrat', 'Inter', sans-serif" font-size="20" font-weight="900" text-anchor="middle" letter-spacing="0.05em">TECHMA</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--schneider-electric" title="Schneider Electric">
							<svg viewBox="0 0 200 48" width="100%" height="100%" fill="currentColor"><polygon points="12,14 26,14 26,28 12,28" fill="none" stroke="currentColor" stroke-width="3" /><circle cx="19" cy="21" r="4" fill="currentColor" /><text x="36" y="30" font-family="'Helvetica Neue', Arial, sans-serif" font-size="16" font-weight="700" letter-spacing="0.02em">Schneider</text></svg>
						</div>

						<!-- Group 2 (Duplicate for loop) -->
						<div class="partner-logo-item partner-logo-item--hikvision" title="Hikvision" aria-hidden="true">
							<svg viewBox="0 0 160 48" width="100%" height="100%" fill="currentColor"><text x="50%" y="32" font-family="'Montserrat', 'Inter', sans-serif" font-size="20" font-weight="900" text-anchor="middle" letter-spacing="0.04em">HIKVISION</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--dahua" title="Dahua" aria-hidden="true">
							<svg viewBox="0 0 160 48" width="100%" height="100%" fill="currentColor"><text x="50%" y="32" font-family="'Montserrat', 'Inter', sans-serif" font-size="20" font-weight="800" text-anchor="middle" letter-spacing="0.02em">dahua</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--uniview" title="Uniview" aria-hidden="true">
							<svg viewBox="0 0 160 48" width="100%" height="100%" fill="currentColor"><text x="50%" y="32" font-family="'Montserrat', 'Inter', sans-serif" font-size="20" font-weight="800" text-anchor="middle" letter-spacing="0.04em">uniview</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--zkteco" title="ZKTeco" aria-hidden="true">
							<svg viewBox="0 0 160 48" width="100%" height="100%" fill="currentColor"><text x="50%" y="32" font-family="'Montserrat', 'Inter', sans-serif" font-size="20" font-weight="800" text-anchor="middle" letter-spacing="0.06em">ZKTeco</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--mikrotik" title="MikroTik" aria-hidden="true">
							<svg viewBox="0 0 180 48" width="100%" height="100%" fill="currentColor"><polygon points="12,12 36,12 24,36" fill="currentColor" opacity="0.85" /><polygon points="20,24 44,24 32,48" fill="currentColor" opacity="0.65" /><text x="52" y="32" font-family="'Montserrat', 'Inter', sans-serif" font-size="19" font-weight="800">MikroTik</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--ubiquiti" title="Ubiquiti" aria-hidden="true">
							<svg viewBox="0 0 180 48" width="100%" height="100%" fill="currentColor"><circle cx="24" cy="24" r="12" fill="none" stroke="currentColor" stroke-width="3" /><circle cx="24" cy="24" r="6" fill="currentColor" /><text x="48" y="32" font-family="'Montserrat', 'Inter', sans-serif" font-size="18" font-weight="800" letter-spacing="0.05em">UBIQUITI</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--ruijie" title="Ruijie" aria-hidden="true">
							<svg viewBox="0 0 160 48" width="100%" height="100%" fill="currentColor"><text x="50%" y="32" font-family="'Montserrat', 'Inter', sans-serif" font-size="20" font-weight="900" text-anchor="middle" letter-spacing="0.02em">Ruijie</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--toa" title="TOA" aria-hidden="true">
							<svg viewBox="0 0 160 48" width="100%" height="100%" fill="currentColor"><text x="50%" y="32" font-family="'Impact', 'Arial Black', sans-serif" font-style="italic" font-size="26" font-weight="900" text-anchor="middle" letter-spacing="0.06em">TOA</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--inter-m" title="Inter-M" aria-hidden="true">
							<svg viewBox="0 0 160 48" width="100%" height="100%" fill="currentColor"><text x="50%" y="32" font-family="'Montserrat', 'Inter', sans-serif" font-size="20" font-weight="800" text-anchor="middle" letter-spacing="0.04em">Inter-M</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--yamaha" title="Yamaha" aria-hidden="true">
							<svg viewBox="0 0 180 48" width="100%" height="100%" fill="currentColor"><circle cx="20" cy="24" r="10" fill="none" stroke="currentColor" stroke-width="2.5"/><line x1="20" y1="14" x2="20" y2="34" stroke="currentColor" stroke-width="2.5"/><line x1="10" y1="24" x2="30" y2="24" stroke="currentColor" stroke-width="2.5"/><text x="44" y="32" font-family="'Times New Roman', 'Georgia', serif" font-size="22" font-weight="900" letter-spacing="0.08em">YAMAHA</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--bosch" title="Bosch" aria-hidden="true">
							<svg viewBox="0 0 160 48" width="100%" height="100%" fill="currentColor"><circle cx="24" cy="24" r="10" fill="none" stroke="currentColor" stroke-width="3" /><line x1="24" y1="14" x2="24" y2="34" stroke="currentColor" stroke-width="3" /><text x="44" y="32" font-family="'Century Gothic', sans-serif" font-size="22" font-weight="900" letter-spacing="0.04em">BOSCH</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--honeywell" title="Honeywell" aria-hidden="true">
							<svg viewBox="0 0 160 48" width="100%" height="100%" fill="currentColor"><text x="50%" y="32" font-family="'Helvetica Neue', Arial, sans-serif" font-size="20" font-weight="900" text-anchor="middle" letter-spacing="-0.02em">Honeywell</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--techma" title="TECHMA" aria-hidden="true">
							<svg viewBox="0 0 160 48" width="100%" height="100%" fill="currentColor"><text x="50%" y="32" font-family="'Montserrat', 'Inter', sans-serif" font-size="20" font-weight="900" text-anchor="middle" letter-spacing="0.05em">TECHMA</text></svg>
						</div>
						<div class="partner-logo-item partner-logo-item--schneider-electric" title="Schneider Electric" aria-hidden="true">
							<svg viewBox="0 0 200 48" width="100%" height="100%" fill="currentColor"><polygon points="12,14 26,14 26,28 12,28" fill="none" stroke="currentColor" stroke-width="3" /><circle cx="19" cy="21" r="4" fill="currentColor" /><text x="36" y="30" font-family="'Helvetica Neue', Arial, sans-serif" font-size="16" font-weight="700" letter-spacing="0.02em">Schneider</text></svg>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>
<?php endif; ?>


<?php if ( langit_theme_mod_enabled( 'show_company_section' ) ) : ?>
	<?php
	$langit_company_page       = get_page_by_path( 'company' );
	$langit_company_url        = langit_theme_mod( 'company_intro_button_url' );
	$langit_company_url        = $langit_company_url ? $langit_company_url : ( $langit_company_page ? get_permalink( $langit_company_page ) : home_url( '/company/' ) );
	$langit_company_image      = langit_theme_mod( 'company_intro_image' );
	$langit_company_image      = $langit_company_image ? $langit_company_image : $langit_image_uri . 'langit-project-1200.jpg';
	$langit_company_image_args = array(
		'src'    => $langit_company_image,
		'sizes'  => '(min-width: 901px) 38vw, calc(100vw - 2.5rem)',
		'width'  => '1200',
		'height' => '676',
		'alt'    => esc_attr__( 'Teknisi Langit mengerjakan instalasi CCTV, jaringan, fire alarm, dan audio gedung.', 'langit' ),
	);

	if ( $langit_company_image === $langit_image_uri . 'langit-project-1200.jpg' ) {
		$langit_company_image_args['sources'] = array(
			array(
				'type'   => 'image/webp',
				'srcset' => esc_url( $langit_image_uri . 'langit-project-720.webp' ) . ' 720w, ' . esc_url( $langit_image_uri . 'langit-project-1200.webp' ) . ' 1200w',
			),
		);
	}
	?>

	<section class="section home-section home-section--company">
		<div class="container split-layout">
			<div class="stack">
				<?php
				langit_section_heading(
					array(
						'eyebrow' => langit_theme_mod( 'company_short_intro' ),
						'title'   => langit_theme_mod( 'company_section_title' ),
						'text'    => langit_theme_mod( 'company_description' ),
					)
				);
				?>

				<?php if ( langit_theme_mod( 'company_intro_closing_text' ) ) : ?>
					<p><?php echo esc_html( langit_theme_mod( 'company_intro_closing_text' ) ); ?></p>
				<?php endif; ?>
				<?php
				langit_button(
					array(
						'url'   => $langit_company_url,
						'label' => langit_theme_mod( 'company_intro_button_text' ),
					)
				);
				?>
			</div>

			<?php
			langit_responsive_image( $langit_company_image_args );
			?>
		</div>
	</section>
<?php endif; ?>

<?php if ( langit_theme_mod_enabled( 'show_trust_section' ) ) : ?>
	<section class="section home-section home-section--trust">
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
						<?php if ( ! empty( $langit_stat['value'] ) ) : ?>
							<strong><?php echo esc_html( $langit_stat['value'] ); ?></strong>
						<?php endif; ?>
						<h3><?php echo esc_html( $langit_stat['label'] ); ?></h3>
						<p><?php echo esc_html( $langit_stat['description'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if ( langit_theme_mod_enabled( 'show_services_section' ) ) : ?>
	<section id="services" class="section home-section home-section--services">
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
	<section class="section home-section home-section--industry">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => langit_theme_mod( 'industry_section_eyebrow' ),
					'title'   => langit_theme_mod( 'industry_section_title' ),
					'center'  => true,
					'class'   => 'section-heading--industry',
				)
			);
			?>

			<div class="coverage-grid">
				<?php foreach ( $langit_industries as $langit_industry ) :
					$langit_industry_slug = sanitize_title( $langit_industry['title'] );
					?>
					<article class="<?php echo esc_attr( langit_class_names( array( 'coverage-card', 'coverage-card--' . $langit_industry_slug ) ) ); ?>">
						<div class="coverage-card__content stack">
							<?php echo langit_get_industry_icon( $langit_industry['title'] ); ?>
							<h3><?php echo esc_html( $langit_industry['title'] ); ?></h3>
							<p><?php echo esc_html( $langit_industry['description'] ); ?></p>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if ( $langit_projects_query instanceof WP_Query && $langit_projects_query->have_posts() ) : ?>
	<section class="section home-section home-section--projects">
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


<?php if ( $langit_team_query instanceof WP_Query && $langit_team_query->have_posts() ) : ?>
	<section class="section home-section home-section--team">
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
		<section class="section home-section home-section--testimonials">
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

<?php endif; ?>



<?php if ( $langit_faq_query instanceof WP_Query && $langit_faq_query->have_posts() ) : ?>
	<section class="section home-section home-section--faq">
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
	<section class="section home-section home-section--downloads">
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

<?php if ( $langit_certifications_query instanceof WP_Query && $langit_certifications_query->have_posts() ) : ?>
	<section class="section home-section home-section--certifications">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => langit_theme_mod( 'certifications_section_eyebrow' ),
					'title'   => langit_theme_mod( 'certifications_section_title' ),
					'text'    => langit_theme_mod( 'certifications_section_description' ),
					'center'  => true,
				)
			);
			?>

			<div class="certification-grid">
				<?php
				while ( $langit_certifications_query->have_posts() ) :
					$langit_certifications_query->the_post();
					langit_certification_card( get_the_ID() );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</section>
<?php endif; ?>
