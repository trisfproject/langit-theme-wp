<?php
/**
 * Blog sidebar.
 *
 * @package Langit
 */
?>

<aside class="blog-sidebar" aria-label="<?php esc_attr_e( 'Blog sidebar', 'langit' ); ?>">
	<?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'blog-sidebar' ); ?>
	<?php else : ?>
		<section class="blog-widget">
			<h3 class="blog-widget__title"><?php esc_html_e( 'Categories', 'langit' ); ?></h3>
			<ul>
				<?php wp_list_categories( array( 'title_li' => '' ) ); ?>
			</ul>
		</section>

		<section class="blog-widget">
			<h3 class="blog-widget__title"><?php esc_html_e( 'Recent Posts', 'langit' ); ?></h3>
			<ul>
				<?php
				wp_get_archives(
					array(
						'type'            => 'postbypost',
						'limit'           => 5,
						'format'          => 'html',
						'show_post_count' => false,
					)
				);
				?>
			</ul>
		</section>

		<section class="blog-widget">
			<h3 class="blog-widget__title"><?php esc_html_e( 'Tags', 'langit' ); ?></h3>
			<div class="tag-cloud">
				<?php wp_tag_cloud( array( 'smallest' => 0.86, 'largest' => 0.86, 'unit' => 'rem' ) ); ?>
			</div>
		</section>

		<section class="blog-widget blog-widget--cta">
			<h3 class="blog-widget__title"><?php esc_html_e( 'Need a System Partner?', 'langit' ); ?></h3>
			<p><?php esc_html_e( 'Diskusikan kebutuhan teknologi gedung dan fasilitas Anda bersama Langit.', 'langit' ); ?></p>
			<a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact Us', 'langit' ); ?></a>
		</section>
	<?php endif; ?>
</aside>
