<?php
/**
 * 404 template.
 *
 * @package Langit
 */

get_header();
?>

<main id="primary" class="site-main">
	<section class="section">
		<div class="container stack">
			<p class="hero__eyebrow"><?php esc_html_e( '404', 'langit' ); ?></p>
			<h1><?php esc_html_e( 'Page Not Found', 'langit' ); ?></h1>
			<p class="lede"><?php esc_html_e( 'Halaman yang Anda cari mungkin sudah dipindahkan atau tidak lagi tersedia.', 'langit' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</section>
</main>

<?php
get_footer();
