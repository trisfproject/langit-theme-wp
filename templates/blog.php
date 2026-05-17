<?php
/**
 * Template Name: Blog
 * Template Post Type: page
 *
 * @package Langit
 */

get_header();
?>

<main id="primary" class="site-main">
	<section class="page-hero">
		<div class="container stack">
			<p class="section-eyebrow"><?php esc_html_e( 'Blog', 'langit' ); ?></p>
			<h1><?php the_title(); ?></h1>
			<p class="lede"><?php esc_html_e( 'Artikel profesional seputar teknologi gedung, sistem keamanan, jaringan, elektrikal, fire alarm, audio, instalasi, dan pemeliharaan fasilitas.', 'langit' ); ?></p>
		</div>
	</section>

	<div class="container blog-layout">
		<div class="blog-content">
			<?php get_template_part( 'template-parts/blog-featured' ); ?>
			<div class="blog-grid">
				<?php
				$langit_blog_query = new WP_Query(
					array(
						'post_type'           => 'post',
						'posts_per_page'      => 6,
						'ignore_sticky_posts' => true,
					)
				);

				if ( $langit_blog_query->have_posts() ) :
					while ( $langit_blog_query->have_posts() ) :
						$langit_blog_query->the_post();
						if ( isset( $GLOBALS['langit_featured_post_id'] ) && get_the_ID() === (int) $GLOBALS['langit_featured_post_id'] ) {
							continue;
						}
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile;
					wp_reset_postdata();
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
			</div>
		</div>

		<?php get_sidebar(); ?>
	</div>

	<?php get_template_part( 'template-parts/blog-cta' ); ?>
</main>

<?php
get_footer();
