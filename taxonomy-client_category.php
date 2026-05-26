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
			<div class="client-ecosystem-list">
				<?php
				$langit_current_term = get_queried_object();
				$langit_category     = $langit_current_term instanceof WP_Term ? $langit_current_term->name : '';

				foreach ( langit_get_client_ecosystems( $langit_category ) as $langit_ecosystem ) {
					langit_client_ecosystem_section( $langit_ecosystem );
				}
				?>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
