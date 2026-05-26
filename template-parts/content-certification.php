<?php
/**
 * Single Certification content.
 *
 * @package Langit
 */

$langit_terms = get_the_terms( get_the_ID(), 'certification_category' );
$langit_meta  = langit_certification_meta( get_the_ID() );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="single-hero">
		<div class="single-hero__content stack">
			<p class="section-eyebrow"><?php esc_html_e( 'Certification Detail', 'langit' ); ?></p>
			<?php if ( ! is_wp_error( $langit_terms ) && ! empty( $langit_terms ) ) : ?>
				<div class="post-card__term">
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
				</div>
			<?php endif; ?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php if ( has_excerpt() ) : ?>
				<p class="lede"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
		</div>
	</header>

	<section class="section section--surface">
		<div class="container certification-detail-grid">
			<div class="certification-preview card">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'large', array( 'loading' => 'eager', 'decoding' => 'async' ) ); ?>
				<?php else : ?>
					<span aria-hidden="true"><?php esc_html_e( 'CERT', 'langit' ); ?></span>
				<?php endif; ?>
			</div>

			<aside class="certification-panel card">
				<p class="card__meta"><?php esc_html_e( 'Compliance Metadata', 'langit' ); ?></p>
				<h2><?php esc_html_e( 'Certification Information', 'langit' ); ?></h2>
				<dl class="certification-meta-list">
					<?php if ( $langit_meta['issuer'] ) : ?>
						<div>
							<dt><?php esc_html_e( 'Issuing Organization', 'langit' ); ?></dt>
							<dd><?php echo esc_html( $langit_meta['issuer'] ); ?></dd>
						</div>
					<?php endif; ?>
					<?php if ( $langit_meta['number'] ) : ?>
						<div>
							<dt><?php esc_html_e( 'Certification Number', 'langit' ); ?></dt>
							<dd><?php echo esc_html( $langit_meta['number'] ); ?></dd>
						</div>
					<?php endif; ?>
					<div>
						<dt><?php esc_html_e( 'Valid Until', 'langit' ); ?></dt>
						<dd><?php echo esc_html( $langit_meta['valid_until'] ); ?></dd>
					</div>
				</dl>
				<a class="button button--primary" href="<?php echo esc_url( $langit_meta['url'] ); ?>" <?php echo (string) get_permalink() !== (string) $langit_meta['url'] ? 'download' : ''; ?>>
					<?php echo esc_html( $langit_meta['cta_text'] ); ?>
				</a>
			</aside>
		</div>
	</section>

	<div class="entry-content single-content">
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

	<section class="section section--surface">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => esc_html__( 'Related Certifications', 'langit' ),
					'title'   => esc_html__( 'More compliance references.', 'langit' ),
					'center'  => true,
				)
			);

			$langit_related_args = array(
				'post_type'              => 'certification',
				'post_status'            => 'publish',
				'posts_per_page'         => 3,
				'post__not_in'           => array( get_the_ID() ),
				'orderby'                => array(
					'menu_order' => 'ASC',
					'date'       => 'DESC',
				),
				'no_found_rows'          => true,
				'update_post_meta_cache' => true,
				'update_post_term_cache' => true,
			);

			if ( ! is_wp_error( $langit_terms ) && ! empty( $langit_terms ) ) {
				$langit_related_args['tax_query'] = array(
					array(
						'taxonomy' => 'certification_category',
						'field'    => 'term_id',
						'terms'    => wp_list_pluck( $langit_terms, 'term_id' ),
					),
				);
			}

			$langit_related_certifications = new WP_Query( $langit_related_args );
			?>

			<?php if ( $langit_related_certifications->have_posts() ) : ?>
				<div class="certification-grid">
					<?php
					while ( $langit_related_certifications->have_posts() ) :
						$langit_related_certifications->the_post();
						langit_certification_card( get_the_ID() );
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			<?php else : ?>
				<p class="lede"><?php esc_html_e( 'Tambahkan sertifikasi lain untuk menampilkan referensi kepatuhan terkait secara otomatis.', 'langit' ); ?></p>
			<?php endif; ?>
		</div>
	</section>

</article>
