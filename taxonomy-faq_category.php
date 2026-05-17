<?php
/**
 * FAQ category archive template.
 *
 * @package Langit
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	$langit_term = get_queried_object();
	langit_page_hero(
		array(
			'eyebrow' => esc_html__( 'FAQ Category', 'langit' ),
			'title'   => single_term_title( '', false ),
			'text'    => ! empty( $langit_term->description )
				? wp_strip_all_tags( $langit_term->description )
				: esc_html__( 'Pertanyaan umum berdasarkan kategori layanan dan kebutuhan operasional pelanggan.', 'langit' ),
		)
	);
	?>

	<section class="section section--surface">
		<div class="container faq-layout">
			<div class="faq-list">
				<?php
				if ( have_posts() ) :
					$langit_index = 0;
					while ( have_posts() ) :
						the_post();
						langit_faq_item( get_the_ID(), 0 === $langit_index );
						$langit_index++;
					endwhile;
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
			</div>

			<?php the_posts_navigation(); ?>
		</div>
	</section>
</main>

<?php
get_footer();
