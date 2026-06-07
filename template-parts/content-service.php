<?php
/**
 * Single service content.
 *
 * @package Langit
 */

$langit_service_cta = langit_get_service_cta_url( get_the_ID(), 'contact' );
$langit_terms       = get_the_terms( get_the_ID(), 'service_category' );
$langit_related_services = new WP_Query(
	array(
		'post_type'              => 'service',
		'post_status'            => 'publish',
		'posts_per_page'         => 3,
		'post__not_in'           => array( get_the_ID() ),
		'orderby'                => 'rand',
		'no_found_rows'          => true,
		'update_post_meta_cache' => true,
		'update_post_term_cache' => true,
	)
);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Service">
	<header class="single-hero">
		<div class="single-hero__content stack">
			<div class="single-hero__meta-row">
				<span class="section-eyebrow"><?php esc_html_e( 'Service Detail', 'langit' ); ?></span>
				<?php if ( ! is_wp_error( $langit_terms ) && ! empty( $langit_terms ) ) : ?>
					<span class="single-hero__category">
						<?php
						$langit_term_links = array();
						foreach ( $langit_terms as $langit_term ) {
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
			<?php the_title( '<h1 class="entry-title" itemprop="name">', '</h1>' ); ?>
			<?php if ( has_excerpt() ) : ?>
				<p class="lede" itemprop="description"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
		</div>
	</header>

	<div class="container single-service-grid<?php echo has_post_thumbnail() ? ' has-image' : ''; ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="single-service-grid__image">
				<figure class="single-featured-image">
					<?php the_post_thumbnail( 'langit-social', array_merge( langit_featured_image_attrs( true ), array( 'itemprop' => 'image' ) ) ); ?>
				</figure>
			</div>
		<?php endif; ?>

		<div class="single-service-grid__content single-content" itemprop="description">
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

	<?php
	$langit_scope_str = get_post_meta( get_the_ID(), 'langit_service_scope', true );
	
	// Default process steps with title and description
	$langit_default_process = array(
		array(
			'title' => esc_html__( 'Site Survey', 'langit' ),
			'desc'  => esc_html__( 'Requirement assessment and field verification.', 'langit' ),
		),
		array(
			'title' => esc_html__( 'System Design', 'langit' ),
			'desc'  => esc_html__( 'System planning and technical preparation.', 'langit' ),
		),
		array(
			'title' => esc_html__( 'Installation', 'langit' ),
			'desc'  => esc_html__( 'Deployment according to approved design.', 'langit' ),
		),
		array(
			'title' => esc_html__( 'Configuration', 'langit' ),
			'desc'  => esc_html__( 'Device setup and integration.', 'langit' ),
		),
		array(
			'title' => esc_html__( 'Testing', 'langit' ),
			'desc'  => esc_html__( 'Functional and performance validation.', 'langit' ),
		),
		array(
			'title' => esc_html__( 'Maintenance', 'langit' ),
			'desc'  => esc_html__( 'Ongoing support and preventive maintenance.', 'langit' ),
		),
	);

	if ( ! empty( $langit_scope_str ) ) {
		$langit_scopes_raw = array_map( 'trim', explode( ',', $langit_scope_str ) );
		$langit_scopes = array();
		
		// Map descriptions if they match standard steps, otherwise leave description empty
		$desc_map = array(
			'site survey'   => esc_html__( 'Requirement assessment and field verification.', 'langit' ),
			'system design' => esc_html__( 'System planning and technical preparation.', 'langit' ),
			'installation'  => esc_html__( 'Deployment according to approved design.', 'langit' ),
			'configuration' => esc_html__( 'Device setup and integration.', 'langit' ),
			'testing'       => esc_html__( 'Functional and performance validation.', 'langit' ),
			'maintenance'   => esc_html__( 'Ongoing support and preventive maintenance.', 'langit' ),
		);
		
		foreach ( $langit_scopes_raw as $raw_step ) {
			$lower_step = strtolower( $raw_step );
			$desc = isset( $desc_map[ $lower_step ] ) ? $desc_map[ $lower_step ] : '';
			
			// Fallback: search for substring match
			if ( empty( $desc ) ) {
				foreach ( $desc_map as $key => $val ) {
					if ( strpos( $lower_step, $key ) !== false || strpos( $key, $lower_step ) !== false ) {
						$desc = $val;
						break;
					}
				}
			}
			
			$langit_scopes[] = array(
				'title' => $raw_step,
				'desc'  => $desc,
			);
		}
	} else {
		$langit_scopes = $langit_default_process;
	}
	?>
	<section class="section section--compact service-scope-section">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => esc_html__( 'Our Methodology', 'langit' ),
					'title'   => esc_html__( 'Our Delivery Process', 'langit' ),
					'center'  => true,
				)
			);
			?>
			<div class="scope-checklist">
				<?php foreach ( $langit_scopes as $langit_index => $langit_step ) : ?>
					<div class="checklist-item">
						<span class="checklist-item__num"><?php echo esc_html( sprintf( '%02d', $langit_index + 1 ) ); ?></span>
						<div class="checklist-item__content">
							<h4 class="checklist-item__title"><?php echo esc_html( $langit_step['title'] ); ?></h4>
							<?php if ( ! empty( $langit_step['desc'] ) ) : ?>
								<p class="checklist-item__desc"><?php echo esc_html( $langit_step['desc'] ); ?></p>
							<?php endif; ?>
							<span class="checklist-item__check">✓ Active Scope</span>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php if ( $langit_related_services->have_posts() ) : ?>
		<section class="section section--surface related-services-section">
			<div class="container stack">
				<?php
				langit_section_heading(
					array(
						'eyebrow' => esc_html__( 'Related Services', 'langit' ),
						'title'   => esc_html__( 'Explore other service capabilities.', 'langit' ),
						'center'  => true,
					)
				);
				?>

				<div class="related-service-grid">
					<?php
					while ( $langit_related_services->have_posts() ) :
						$langit_related_services->the_post();
						langit_related_service_card( get_the_ID() );
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</div>
		</section>
	<?php else : ?>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>
</article>
