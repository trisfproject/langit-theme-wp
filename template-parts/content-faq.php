<?php
/**
 * Single FAQ content.
 *
 * @package Langit
 */

$langit_terms           = get_the_terms( get_the_ID(), 'faq_category' );
$langit_related_service = absint( get_post_meta( get_the_ID(), 'langit_faq_related_service', true ) );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Question">
	<header class="single-hero">
		<div class="single-hero__content stack">
			<p class="section-eyebrow"><?php esc_html_e( 'FAQ Detail', 'langit' ); ?></p>
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
			<?php the_title( '<h1 class="entry-title" itemprop="name">', '</h1>' ); ?>
		</div>
	</header>

	<div class="entry-content single-content" itemprop="acceptedAnswer" itemscope itemtype="https://schema.org/Answer">
		<div itemprop="text">
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

	<?php if ( $langit_related_service && 'publish' === get_post_status( $langit_related_service ) ) : ?>
		<section class="section section--surface">
			<div class="container stack">
				<?php
				langit_section_heading(
					array(
						'eyebrow' => esc_html__( 'Related Service', 'langit' ),
						'title'   => esc_html__( 'Service connected to this question.', 'langit' ),
						'center'  => true,
					)
				);
				?>
				<div class="service-grid">
					<?php langit_service_summary_card( $langit_related_service ); ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<section class="section section--surface">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => esc_html__( 'Related FAQ', 'langit' ),
					'title'   => esc_html__( 'More answers from the knowledge base.', 'langit' ),
					'center'  => true,
				)
			);

			$langit_related_args = array(
				'post_type'              => 'faq',
				'post_status'            => 'publish',
				'posts_per_page'         => 4,
				'post__not_in'           => array( get_the_ID() ),
				'orderby'                => array(
					'menu_order' => 'ASC',
					'title'      => 'ASC',
				),
				'no_found_rows'          => true,
				'update_post_meta_cache' => true,
				'update_post_term_cache' => true,
			);

			if ( ! is_wp_error( $langit_terms ) && ! empty( $langit_terms ) ) {
				$langit_related_args['tax_query'] = array(
					array(
						'taxonomy' => 'faq_category',
						'field'    => 'term_id',
						'terms'    => wp_list_pluck( $langit_terms, 'term_id' ),
					),
				);
			}

			$langit_related_faq = new WP_Query( $langit_related_args );
			?>

			<?php if ( $langit_related_faq->have_posts() ) : ?>
				<div class="faq-list">
					<?php
					while ( $langit_related_faq->have_posts() ) :
						$langit_related_faq->the_post();
						langit_faq_item( get_the_ID() );
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			<?php else : ?>
				<p class="lede"><?php esc_html_e( 'Tambahkan FAQ lain untuk menampilkan jawaban terkait secara otomatis.', 'langit' ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<?php langit_global_cta( 'contact' ); ?>
</article>
