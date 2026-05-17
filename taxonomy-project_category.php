<?php
/**
 * Project category archive template.
 *
 * @package Langit
 */

get_header();
?>

<main id="primary" class="site-main">
	<section class="page-hero">
		<div class="container stack">
			<p class="section-eyebrow"><?php esc_html_e( 'Project Category', 'langit' ); ?></p>
			<?php the_archive_title( '<h1>', '</h1>' ); ?>
			<?php the_archive_description( '<div class="lede">', '</div>' ); ?>
		</div>
	</section>

	<section class="section section--surface">
		<div class="container stack">
			<div class="blog-grid project-grid">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						langit_project_card( get_the_ID() );
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
