<?php
/**
 * Single service content.
 *
 * @package Langit
 */

$langit_service_cta = langit_get_service_cta_url( get_the_ID(), 'contact' );
$langit_terms       = get_the_terms( get_the_ID(), 'service_category' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="single-hero">
		<div class="single-hero__content stack">
			<p class="section-eyebrow"><?php esc_html_e( 'Service Detail', 'langit' ); ?></p>
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
			<?php
			langit_button(
				array(
					'url'   => $langit_service_cta,
					'label' => langit_theme_mod( 'inquiry_primary_text' ),
				)
			);
			?>
		</div>
	</header>

	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="single-featured-image">
			<?php the_post_thumbnail( 'langit-social' ); ?>
		</figure>
	<?php endif; ?>

	<div class="container single-content">
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
					'eyebrow' => esc_html__( 'Related Services', 'langit' ),
					'title'   => esc_html__( 'Explore other service capabilities.', 'langit' ),
					'center'  => true,
				)
			);

			$langit_related_args = array(
				'post_type'              => 'service',
				'post_status'            => 'publish',
				'posts_per_page'         => 3,
				'post__not_in'           => array( get_the_ID() ),
				'no_found_rows'          => true,
				'update_post_meta_cache' => true,
				'update_post_term_cache' => true,
			);

			if ( ! is_wp_error( $langit_terms ) && ! empty( $langit_terms ) ) {
				$langit_related_args['tax_query'] = array(
					array(
						'taxonomy' => 'service_category',
						'field'    => 'term_id',
						'terms'    => wp_list_pluck( $langit_terms, 'term_id' ),
					),
				);
			}

			$langit_related_services = new WP_Query( $langit_related_args );
			?>

			<?php if ( $langit_related_services->have_posts() ) : ?>
				<div class="service-grid">
					<?php
					while ( $langit_related_services->have_posts() ) :
						$langit_related_services->the_post();
						langit_service_card( get_the_ID() );
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			<?php else : ?>
				<p class="lede"><?php esc_html_e( 'Tambahkan layanan lain untuk menampilkan rekomendasi layanan terkait secara otomatis.', 'langit' ); ?></p>
			<?php endif; ?>
		</div>
	</section>
</article>
