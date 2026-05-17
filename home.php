<?php
/**
 * Blog home template.
 *
 * @package Langit
 */

get_header();
?>

<main id="primary" class="site-main">
	<section class="page-hero">
		<div class="container stack">
			<p class="section-eyebrow"><?php esc_html_e( 'Blog', 'langit' ); ?></p>
			<h1><?php esc_html_e( 'Insights and Updates', 'langit' ); ?></h1>
			<p class="lede"><?php esc_html_e( 'Artikel profesional seputar teknologi gedung, sistem keamanan, jaringan, elektrikal, fire alarm, audio, instalasi, dan pemeliharaan fasilitas.', 'langit' ); ?></p>
		</div>
	</section>

	<div class="container blog-layout blog-layout--listing">
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

			<?php the_posts_pagination(); ?>
		</div>
	</div>

	<?php get_template_part( 'template-parts/blog-cta' ); ?>
</main>

<?php
get_footer();
