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

<section class="section section--surface related-posts-section">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Related Posts', 'langit' ),
				'title'   => esc_html__( 'More insights from Langit', 'langit' ),
				'center'  => true,
			)
		);
		?>

		<?php if ( $langit_related->have_posts() ) : ?>
			<div class="blog-grid">
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
	</div>
</section>

