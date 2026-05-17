<?php
/**
 * The main template file.
 *
 * @package Langit
 */

get_header();
?>

<main id="primary" class="site-main">
	<section class="page-hero">
		<div class="container stack">
			<p class="section-eyebrow"><?php esc_html_e( 'Blog', 'langit' ); ?></p>
			<h1><?php esc_html_e( 'Latest Updates', 'langit' ); ?></h1>
			<p class="lede"><?php esc_html_e( 'Pembaruan terbaru mengenai solusi teknologi gedung, keamanan, jaringan, elektrikal, dan layanan pemeliharaan.', 'langit' ); ?></p>
		</div>
	</section>

	<div class="container blog-layout">
		<div class="blog-content">
			<div class="blog-grid">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile;
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
			</div>

			<?php the_posts_navigation(); ?>
		</div>

		<?php get_sidebar(); ?>
	</div>
</main>

<?php
get_footer();
