<?php
/**
 * Featured article section.
 *
 * @package Langit
 */

$langit_featured = new WP_Query(
	array(
		'post_type'           => 'post',
		'posts_per_page'      => 1,
		'ignore_sticky_posts' => false,
	)
);

if ( $langit_featured->have_posts() ) :
	?>
	<section class="featured-article">
		<p class="section-eyebrow"><?php esc_html_e( 'Featured Article', 'langit' ); ?></p>
		<?php
		while ( $langit_featured->have_posts() ) :
			$langit_featured->the_post();
			$GLOBALS['langit_featured_post_id'] = get_the_ID();
			get_template_part( 'template-parts/content', get_post_type() );
		endwhile;
		wp_reset_postdata();
		?>
	</section>
	<?php
endif;
