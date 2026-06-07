<?php
/**
 * Single project content.
 *
 * @package Langit
 */

$langit_project_terms   = get_the_terms( get_the_ID(), 'project_category' );
$langit_project_details = langit_get_project_details( get_the_ID() );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/CreativeWork">
	<header class="single-hero">
		<div class="single-hero__content stack">
			<div class="single-hero__meta-row">
				<span class="section-eyebrow"><?php esc_html_e( 'Project Detail', 'langit' ); ?></span>
				<?php if ( ! is_wp_error( $langit_project_terms ) && ! empty( $langit_project_terms ) ) : ?>
					<span class="single-hero__category">
						<?php
						$langit_term_links = array();
						foreach ( $langit_project_terms as $langit_term ) {
							$langit_term_links[] = sprintf(
								'<a href="%1$s" rel="tag">%2$s</a>',
								esc_url( get_term_link( $langit_term ) ),
								esc_html( $langit_term->name )
							);
						}
						echo wp_kses_post( implode( ', ', $langit_term_links ) );
						?>
					</span>
				<?php endif; ?>
			</div>
			<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
			<?php if ( has_excerpt() ) : ?>
				<p class="lede" itemprop="description"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
		</div>
	</header>

	<?php
	/* ── Project Overview Card – full-width, above image/description grid ── */
	$langit_client       = get_post_meta( get_the_ID(), 'langit_project_client', true );
	$langit_location     = get_post_meta( get_the_ID(), 'langit_project_location', true );
	$langit_year         = get_post_meta( get_the_ID(), 'langit_project_year', true );
	$langit_service_type = get_post_meta( get_the_ID(), 'langit_project_service_type', true );
	$langit_systems_str  = get_post_meta( get_the_ID(), 'langit_project_systems', true );

	$langit_has_details = ! empty( $langit_client ) || ! empty( $langit_location ) || ! empty( $langit_year ) || ! empty( $langit_service_type ) || ! empty( $langit_systems_str );

	if ( $langit_has_details ) : ?>
		<div class="container project-overview-section">
			<div class="card project-detail-card project-detail-card--horizontal">
				<p class="section-eyebrow"><?php esc_html_e( 'Project Overview', 'langit' ); ?></p>
				<dl class="project-meta-list project-meta-list--horizontal">
					<?php if ( ! empty( $langit_client ) ) : ?>
						<div>
							<dt><?php esc_html_e( 'Client', 'langit' ); ?></dt>
							<dd><?php echo esc_html( $langit_client ); ?></dd>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $langit_location ) ) : ?>
						<div>
							<dt><?php esc_html_e( 'Location', 'langit' ); ?></dt>
							<dd><?php echo esc_html( $langit_location ); ?></dd>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $langit_year ) ) : ?>
						<div>
							<dt><?php esc_html_e( 'Completion Year', 'langit' ); ?></dt>
							<dd><?php echo esc_html( $langit_year ); ?></dd>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $langit_service_type ) ) : ?>
						<div>
							<dt><?php esc_html_e( 'Service Type', 'langit' ); ?></dt>
							<dd><?php echo esc_html( $langit_service_type ); ?></dd>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $langit_systems_str ) ) :
						$langit_systems = array_filter( array_map( 'trim', explode( ',', $langit_systems_str ) ) );
						if ( ! empty( $langit_systems ) ) : ?>
							<div class="project-meta-list__systems">
								<dt><?php esc_html_e( 'Systems Implemented', 'langit' ); ?></dt>
								<dd>
									<div class="project-overview-tags">
										<?php foreach ( $langit_systems as $langit_sys ) : ?>
											<span class="project-tag"><?php echo esc_html( $langit_sys ); ?></span>
										<?php endforeach; ?>
									</div>
								</dd>
							</div>
						<?php endif;
					endif; ?>
				</dl>
			</div>
		</div>
	<?php endif; ?>

	<div class="container single-project-grid<?php echo has_post_thumbnail() ? ' has-image' : ''; ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="single-project-grid__image">
				<figure class="single-featured-image">
					<?php the_post_thumbnail( 'langit-social', array_merge( langit_featured_image_attrs( true ), array( 'itemprop' => 'image' ) ) ); ?>
				</figure>
			</div>
		<?php endif; ?>

		<div class="single-project-grid__content">
			<!-- Project Description -->
			<div class="stack project-description-wrapper">
				<p class="section-eyebrow"><?php esc_html_e( 'Project Description', 'langit' ); ?></p>
				<div class="single-content project-content" itemprop="description">
					<?php
					the_content();

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'langit' ),
							'after'  => '</div>',
						)
					);
					?>
				</div>
			</div>
		</div>
	</div>

	<section class="section section--surface">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => esc_html__( 'Related Services', 'langit' ),
					'title'   => esc_html__( 'Service capabilities connected to project delivery.', 'langit' ),
					'center'  => true,
				)
			);

			$langit_related_services = new WP_Query(
				array(
					'post_type'              => 'service',
					'post_status'            => 'publish',
					'posts_per_page'         => 3,
					'no_found_rows'          => true,
					'update_post_meta_cache' => true,
					'update_post_term_cache' => true,
				)
			);
			?>

			<?php if ( $langit_related_services->have_posts() ) : ?>
				<div class="service-grid">
					<?php
					while ( $langit_related_services->have_posts() ) :
						$langit_related_services->the_post();
						langit_service_summary_card( get_the_ID() );
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			<?php else : ?>
				<p class="lede"><?php esc_html_e( 'Tambahkan data layanan untuk menampilkan kapabilitas terkait pada halaman proyek.', 'langit' ); ?></p>
			<?php endif; ?>
		</div>
	</section>

</article>
