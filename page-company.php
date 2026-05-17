<?php
/**
 * Company page template.
 *
 * Automatically loads for a WordPress page using the "company" slug.
 *
 * @package Langit
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php get_template_part( 'template-parts/company' ); ?>
</main>

<?php
get_footer();
