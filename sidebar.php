<?php
/**
 * Blog sidebar.
 *
 * @package Langit
 */
?>

<aside class="blog-sidebar" aria-label="<?php esc_attr_e( 'Blog sidebar', 'langit' ); ?>">
	<?php if ( is_single() ) : ?>
		<!-- 1. Search Form Widget -->
		<section class="blog-widget widget_search">
			<?php get_search_form(); ?>
		</section>

		<!-- 2. Daftar Isi Blog Widget -->
		<section class="blog-widget widget_blog_toc" id="widget-toc">
			<h3 class="blog-widget__title"><?php esc_html_e( 'Daftar Isi Blog', 'langit' ); ?></h3>
			<div class="blog-toc-content">
				<ul>
					<?php
					$current_post_id = get_the_ID();
					$toc_posts = get_posts(
						array(
							'post_type'      => 'post',
							'post_status'    => 'publish',
							'posts_per_page' => 15,
							'orderby'        => 'date',
							'order'          => 'DESC',
						)
					);

					if ( ! empty( $toc_posts ) ) {
						foreach ( $toc_posts as $toc_post ) {
							$is_active = ( $toc_post->ID === $current_post_id );
							$active_class = $is_active ? 'class="active-toc-post"' : '';
							echo '<li ' . $active_class . '>';
							echo '<a href="' . esc_url( get_permalink( $toc_post->ID ) ) . '">';
							echo esc_html( get_the_title( $toc_post->ID ) );
							echo '</a>';
							echo '</li>';
						}
					} else {
						echo '<li>' . esc_html__( 'No posts found.', 'langit' ) . '</li>';
					}
					?>
				</ul>
			</div>
		</section>

		<!-- 3. Recent Posts Widget -->
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

	<?php elseif ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'blog-sidebar' ); ?>
	<?php else : ?>
		<?php if ( ! is_search() ) : ?>
			<section class="blog-widget widget_search">
				<?php get_search_form(); ?>
			</section>
		<?php endif; ?>

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
	<?php endif; ?>
</aside>
