<?php
/**
 * Single client content.
 *
 * @package Langit
 */

$langit_client_terms     = get_the_terms( get_the_ID(), 'client_category' );
$langit_client_details   = langit_get_client_details( get_the_ID() );
$langit_related_projects = array_filter( array_map( 'absint', explode( ',', get_post_meta( get_the_ID(), 'langit_client_related_project_ids', true ) ) ) );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="single-hero">
		<div class="single-hero__content stack">
			<p class="section-eyebrow"><?php esc_html_e( 'Client Reference', 'langit' ); ?></p>
			<?php if ( ! is_wp_error( $langit_client_terms ) && ! empty( $langit_client_terms ) ) : ?>
				<div class="post-card__term">
					<?php
					$langit_term_links = array();
					foreach ( $langit_client_terms as $langit_term ) {
						$langit_term_links[] = sprintf(
							'<a href="%1$s" rel="tag">%2$s</a>',
							esc_url( get_term_link( $langit_term ) ),
							esc_html( $langit_term->name )
						);
					}
					echo wp_kses_post( implode( ', ', $langit_term_links ) );
					?>
				</div>
			<?php endif; ?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php if ( has_excerpt() ) : ?>
				<p class="lede"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
		</div>
	</header>

	<section class="section section--compact">
		<div class="container client-detail-grid">
			<div class="stack">
				<div class="card client-profile-card">
					<div class="client-profile-card__logo">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'medium_large', array( 'loading' => 'eager', 'decoding' => 'async' ) ); ?>
						<?php else : ?>
							<span><?php the_title(); ?></span>
						<?php endif; ?>
					</div>
				</div>

				<?php if ( ! empty( $langit_client_details ) ) : ?>
					<div class="card client-panel">
						<p class="section-eyebrow"><?php esc_html_e( 'Reference Information', 'langit' ); ?></p>
						<dl class="client-meta-list">
							<?php foreach ( $langit_client_details as $langit_label => $langit_value ) : ?>
								<div>
									<dt><?php echo esc_html( $langit_label ); ?></dt>
									<dd><?php echo esc_html( $langit_value ); ?></dd>
								</div>
							<?php endforeach; ?>
						</dl>
					</div>
				<?php endif; ?>
			</div>

			<div class="stack">
				<p class="section-eyebrow"><?php esc_html_e( 'Operational Overview', 'langit' ); ?></p>
				<div class="single-content">
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
	</section>

	<section class="section section--surface">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => esc_html__( 'Related Projects', 'langit' ),
					'title'   => esc_html__( 'Project experience connected to sector and operational requirements.', 'langit' ),
					'center'  => true,
				)
			);

			$langit_project_args = array(
				'post_type'              => 'project',
				'post_status'            => 'publish',
				'posts_per_page'         => 3,
				'orderby'                => array(
					'menu_order' => 'ASC',
					'date'       => 'DESC',
				),
				'no_found_rows'          => true,
				'update_post_meta_cache' => true,
				'update_post_term_cache' => true,
			);

			if ( ! empty( $langit_related_projects ) ) {
				$langit_project_args['post__in'] = $langit_related_projects;
				$langit_project_args['orderby']  = 'post__in';
			}

			$langit_project_query = new WP_Query( $langit_project_args );
			?>

			<?php if ( $langit_project_query->have_posts() ) : ?>
				<div class="blog-grid project-grid">
					<?php
					while ( $langit_project_query->have_posts() ) :
						$langit_project_query->the_post();
						langit_project_card( get_the_ID() );
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			<?php else : ?>
				<p class="lede"><?php esc_html_e( 'Tambahkan proyek terkait untuk menampilkan portofolio yang relevan secara otomatis.', 'langit' ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<section class="section">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => esc_html__( 'Related Services', 'langit' ),
					'title'   => esc_html__( 'Service capabilities for deployment and operational support.', 'langit' ),
					'center'  => true,
				)
			);

			$langit_service_query = new WP_Query(
				array(
					'post_type'              => 'service',
					'post_status'            => 'publish',
					'posts_per_page'         => 3,
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

			<?php if ( $langit_service_query->have_posts() ) : ?>
				<div class="service-grid">
					<?php
					while ( $langit_service_query->have_posts() ) :
						$langit_service_query->the_post();
						langit_service_summary_card( get_the_ID() );
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			<?php else : ?>
				<p class="lede"><?php esc_html_e( 'Tambahkan layanan untuk menampilkan kapabilitas yang relevan pada sektor ini.', 'langit' ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<?php langit_global_cta( 'contact' ); ?>
</article>
