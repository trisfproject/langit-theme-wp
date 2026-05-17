<?php
/**
 * Related posts section.
 *
 * @package Langit
 */

$langit_related = new WP_Query(
	array(
		'post_type'           => 'post',
		'posts_per_page'      => 3,
		'post__not_in'        => array( get_the_ID() ),
		'ignore_sticky_posts' => true,
	)
);
?>

<section class="related-posts">
	<div class="section-heading">
		<p class="section-eyebrow"><?php esc_html_e( 'Related Posts', 'langit' ); ?></p>
		<h2><?php esc_html_e( 'More insights from Langit', 'langit' ); ?></h2>
	</div>

	<?php if ( $langit_related->have_posts() ) : ?>
		<div class="blog-grid blog-grid--related">
			<?php
			while ( $langit_related->have_posts() ) :
				$langit_related->the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	<?php else : ?>
		<div class="card">
			<p><?php esc_html_e( 'Artikel terkait akan tampil setelah publikasi konten tambahan seputar teknologi gedung, sistem keamanan, jaringan, dan pemeliharaan.', 'langit' ); ?></p>
		</div>
	<?php endif; ?>
</section>
