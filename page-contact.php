<?php
/**
 * Contact page template.
 *
 * Automatically loads for a WordPress page using the "contact" slug.
 *
 * @package Langit
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php get_template_part( 'template-parts/contact' ); ?>
</main>

<?php
get_footer();
