<?php
/**
 * Download category archive template.
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
			'eyebrow' => esc_html__( 'Download Category', 'langit' ),
			'title'   => single_term_title( '', false ),
			'text'    => ! empty( $langit_term->description )
				? wp_strip_all_tags( $langit_term->description )
				: esc_html__( 'Kumpulan dokumen berdasarkan kategori untuk mendukung kebutuhan informasi perusahaan, produk, teknis, dan operasional.', 'langit' ),
		)
	);
	?>

	<section class="section section--surface">
		<div class="container stack">
			<div class="download-grid">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						langit_download_card( get_the_ID() );
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
