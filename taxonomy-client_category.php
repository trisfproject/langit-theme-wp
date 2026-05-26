<?php
/**
 * Client category archive template.
 *
 * @package Langit
 */

get_header();
?>

<main id="primary" class="site-main">
	<section class="page-hero">
		<div class="container stack">
			<p class="section-eyebrow"><?php esc_html_e( 'Operational Category', 'langit' ); ?></p>
			<?php the_archive_title( '<h1>', '</h1>' ); ?>
			<?php the_archive_description( '<div class="lede">', '</div>' ); ?>
		</div>
	</section>

	<section class="section section--surface client-sector-archive">
		<div class="container stack">
			<div class="client-grid client-grid--references">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						langit_client_card( get_the_ID() );
					endwhile;
				else :
					foreach ( langit_default_client_references() as $langit_client ) {
						langit_client_reference_card( $langit_client );
					}
				endif;
				?>
			</div>

			<?php the_posts_navigation(); ?>
		</div>
	</section>
</main>

<?php
get_footer();
