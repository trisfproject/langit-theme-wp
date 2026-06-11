<?php
/**
 * Single post template.
 *
 * @package Langit
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container blog-layout blog-layout--single">
		<div class="blog-content">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', 'single' );
				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous', 'langit' ) . '</span><span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next', 'langit' ) . '</span><span class="nav-title">%title</span>',
					)
				);
			endwhile;
			?>
		</div>

		<?php get_sidebar(); ?>
	</div>

	<?php get_template_part( 'template-parts/related-posts' ); ?>
</main>

<?php
get_footer();
