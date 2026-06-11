<?php
/**
 * Search results template.
 *
 * @package Langit
 */

get_header();
?>

<main id="primary" class="site-main">
	<section class="page-hero">
		<div class="container stack">
			<p class="section-eyebrow"><?php esc_html_e( 'Search', 'langit' ); ?></p>
			<h1>
				<?php
				printf(
					esc_html__( 'Search Results for: %s', 'langit' ),
					'<span>' . esc_html( get_search_query() ) . '</span>'
				);
				?>
			</h1>
			<div class="search-hero-form-wrapper">
				<?php get_search_form(); ?>
			</div>
		</div>
	</section>

	<div class="container blog-layout blog-layout--listing">
		<div class="blog-content">
			<div class="blog-grid">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content' );
					endwhile;
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
			</div>

			<?php the_posts_navigation(); ?>
		</div>
	</div>
</main>

<?php
get_footer();
