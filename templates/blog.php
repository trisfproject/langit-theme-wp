<?php
/**
 * Template Name: Blog
 * Template Post Type: page
 *
 * @package Langit
 */

get_header();
?>

<main id="primary" class="site-main">
	<section class="page-hero">
		<div class="container stack">
			<p class="section-eyebrow"><?php esc_html_e( 'Blog', 'langit' ); ?></p>
			<h1><?php the_title(); ?></h1>
			<p class="lede"><?php esc_html_e( 'Artikel profesional seputar teknologi gedung, sistem keamanan, jaringan, elektrikal, fire alarm, audio, instalasi, dan pemeliharaan fasilitas.', 'langit' ); ?></p>
		</div>
	</section>

	<div class="container blog-layout blog-layout--listing">
		<div class="blog-content">
			<div class="blog-grid">
				<?php
				$langit_paged = max( 1, (int) get_query_var( 'paged' ), (int) get_query_var( 'page' ) );

				$langit_blog_query = new WP_Query(
					array(
						'post_type'           => 'post',
						'posts_per_page'      => get_option( 'posts_per_page' ),
						'paged'               => $langit_paged,
						'orderby'             => 'date',
						'order'               => 'DESC',
						'ignore_sticky_posts' => true,
					)
				);

				if ( $langit_blog_query->have_posts() ) :
					while ( $langit_blog_query->have_posts() ) :
						$langit_blog_query->the_post();
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile;
					wp_reset_postdata();
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
			</div>

			<?php
			if ( $langit_blog_query->max_num_pages > 1 ) :
				$langit_pagination = paginate_links(
					array(
						'base'      => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
						'format'    => '?paged=%#%',
						'current'   => $langit_paged,
						'total'     => $langit_blog_query->max_num_pages,
						'prev_text' => esc_html__( 'Previous', 'langit' ),
						'next_text' => esc_html__( 'Next', 'langit' ),
						'type'      => 'list',
					)
				);
				?>
				<nav class="pagination" aria-label="<?php esc_attr_e( 'Blog pagination', 'langit' ); ?>">
					<?php echo wp_kses_post( $langit_pagination ); ?>
				</nav>
			<?php endif; ?>
		</div>
	</div>
</main>

<?php
get_footer();
