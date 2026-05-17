<?php
/**
 * Single project content.
 *
 * @package Langit
 */

$langit_project_terms   = get_the_terms( get_the_ID(), 'project_category' );
$langit_project_details = langit_get_project_details( get_the_ID() );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="single-hero">
		<div class="single-hero__content stack">
			<p class="section-eyebrow"><?php esc_html_e( 'Project Detail', 'langit' ); ?></p>
			<?php if ( ! is_wp_error( $langit_project_terms ) && ! empty( $langit_project_terms ) ) : ?>
				<div class="post-card__term">
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
				</div>
			<?php endif; ?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php if ( has_excerpt() ) : ?>
				<p class="lede"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
		</div>
	</header>

	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="single-featured-image">
			<?php the_post_thumbnail( 'langit-social' ); ?>
		</figure>
	<?php endif; ?>

	<section class="section section--compact">
		<div class="container project-detail-grid">
			<?php if ( ! empty( $langit_project_details ) ) : ?>
				<div class="card project-detail-card">
					<p class="section-eyebrow"><?php esc_html_e( 'Project Information', 'langit' ); ?></p>
					<dl class="project-meta-list">
						<?php foreach ( $langit_project_details as $langit_label => $langit_value ) : ?>
							<div>
								<dt><?php echo esc_html( $langit_label ); ?></dt>
								<dd><?php echo esc_html( $langit_value ); ?></dd>
							</div>
						<?php endforeach; ?>
					</dl>
				</div>
			<?php endif; ?>

			<div class="stack">
				<p class="section-eyebrow"><?php esc_html_e( 'Project Description', 'langit' ); ?></p>
				<div class="single-content project-content">
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

	<?php
	langit_cta(
		array(
			'title'       => esc_html__( 'Need support for a similar project?', 'langit' ),
			'text'        => esc_html__( 'Tim kami siap membantu meninjau kebutuhan proyek, menentukan ruang lingkup teknis, dan menyiapkan langkah kerja berikutnya.', 'langit' ),
			'panel_class' => 'support-cta',
			'actions'     => array(
				array(
					'url'   => home_url( '/contact/' ),
					'label' => esc_html__( 'Contact Us', 'langit' ),
				),
			),
		)
	);
	?>
</article>
