<?php
/**
 * Single Download content.
 *
 * @package Langit
 */

$langit_terms = get_the_terms( get_the_ID(), 'download_category' );
$langit_meta  = langit_download_meta( get_the_ID() );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="single-hero">
		<div class="single-hero__content stack">
			<p class="section-eyebrow"><?php esc_html_e( 'Download Detail', 'langit' ); ?></p>
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
		<div class="container download-detail-grid">
			<div class="download-preview card">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'large', array( 'loading' => 'eager', 'decoding' => 'async' ) ); ?>
				<?php else : ?>
					<span aria-hidden="true"><?php echo esc_html( $langit_meta['type'] ); ?></span>
				<?php endif; ?>
			</div>

			<aside class="download-panel card">
				<p class="card__meta"><?php esc_html_e( 'Document Metadata', 'langit' ); ?></p>
				<h2><?php esc_html_e( 'Download Information', 'langit' ); ?></h2>
				<dl class="download-meta-list">
					<div>
						<dt><?php esc_html_e( 'File Type', 'langit' ); ?></dt>
						<dd><?php echo esc_html( $langit_meta['type'] ); ?></dd>
					</div>
					<div>
						<dt><?php esc_html_e( 'File Size', 'langit' ); ?></dt>
						<dd><?php echo esc_html( $langit_meta['size'] ); ?></dd>
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
					'eyebrow' => esc_html__( 'Related Documents', 'langit' ),
					'title'   => esc_html__( 'More resources for project planning.', 'langit' ),
					'center'  => true,
				)
			);

			$langit_related_args = array(
				'post_type'              => 'download',
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
						'taxonomy' => 'download_category',
						'field'    => 'term_id',
						'terms'    => wp_list_pluck( $langit_terms, 'term_id' ),
					),
				);
			}

			$langit_related_downloads = new WP_Query( $langit_related_args );
			?>

			<?php if ( $langit_related_downloads->have_posts() ) : ?>
				<div class="download-grid">
					<?php
					while ( $langit_related_downloads->have_posts() ) :
						$langit_related_downloads->the_post();
						langit_download_card( get_the_ID() );
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			<?php else : ?>
				<p class="lede"><?php esc_html_e( 'Tambahkan dokumen lain untuk menampilkan referensi terkait secara otomatis.', 'langit' ); ?></p>
			<?php endif; ?>
		</div>
	</section>

</article>
