<?php
/**
 * Single post content.
 *
 * @package Langit
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/BlogPosting">
	<header class="single-hero">
		<div class="single-hero__content stack">
			<?php langit_post_modified_meta(); ?>
			<div class="post-card__term">
				<?php the_category( ', ' ); ?>
			</div>
			<div class="entry-meta">
				<?php langit_posted_on(); ?>
				<?php langit_posted_by(); ?>
			</div>
			<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
		</div>
	</header>

	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="single-featured-image">
			<?php the_post_thumbnail( 'langit-social', array_merge( langit_featured_image_attrs( true ), array( 'itemprop' => 'image' ) ) ); ?>
		</figure>
	<?php endif; ?>

	<div class="entry-content single-content" itemprop="articleBody">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'langit' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>

	<footer class="single-footer">
		<?php the_tags( '<div class="tag-list"><span>' . esc_html__( 'Tags:', 'langit' ) . '</span>', '', '</div>' ); ?>
	</footer>
</article>
