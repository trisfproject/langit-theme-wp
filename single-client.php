<?php
/**
 * Single client template.
 *
 * @package Langit
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', 'client' );
	endwhile;
	?>
</main>

<?php
get_footer();
