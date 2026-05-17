<?php
/**
 * Default post content card.
 *
 * @package Langit
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'card post-card' ); ?> itemscope itemtype="https://schema.org/BlogPosting">
	<a class="post-card__media" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'langit-card', array_merge( langit_featured_image_attrs(), array( 'itemprop' => 'image' ) ) ); ?>
		<?php else : ?>
			<span></span>
		<?php endif; ?>
	</a>

	<header class="post-card__header">
		<?php langit_post_modified_meta(); ?>
		<meta itemprop="author" content="<?php echo esc_attr( get_the_author() ); ?>">
		<div class="post-card__term">
			<?php
			$langit_categories = get_the_category();
			if ( ! empty( $langit_categories ) ) {
				printf(
					'<a href="%1$s" rel="category tag">%2$s</a>',
					esc_url( get_category_link( $langit_categories[0]->term_id ) ),
					esc_html( $langit_categories[0]->name )
				);
			} else {
				esc_html_e( 'Article', 'langit' );
			}
			?>
		</div>
		<div class="entry-meta">
			<?php langit_posted_on(); ?>
		</div>
		<?php the_title( '<h2 class="post-card__title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>
	</header>

	<div class="entry-summary" itemprop="description">
		<?php the_excerpt(); ?>
	</div>

	<a class="read-more-link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'langit' ); ?></a>
</article>
