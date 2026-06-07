<?php
/**
 * Default post content card.
 *
 * @package Langit
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'card post-card' ); ?> itemscope itemtype="https://schema.org/BlogPosting">
	<a class="post-card__media" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
		<?php
		$langit_thumbnail_rendered = false;

		// Priority 1: Featured Image
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'large', array_merge( langit_featured_image_attrs(), array( 'itemprop' => 'image' ) ) );
			$langit_thumbnail_rendered = true;
		}

		// Priority 2: Extract first image from content
		if ( ! $langit_thumbnail_rendered ) {
			$langit_post = get_post();
			if ( $langit_post && ! empty( $langit_post->post_content ) ) {
				if ( preg_match( '/<img[^>]+?src=["\']([^"\']+)["\']/i', $langit_post->post_content, $matches ) ) {
					$first_image_url = esc_url( $matches[1] );
					if ( ! empty( $first_image_url ) ) {
						printf(
							'<img src="%1$s" alt="%2$s" itemprop="image" loading="lazy" decoding="async" />',
							$first_image_url,
							the_title_attribute( array( 'echo' => false ) )
						);
						$langit_thumbnail_rendered = true;
					}
				}
			}
		}

		// Priority 3: Fallback theme placeholder image
		if ( ! $langit_thumbnail_rendered ) {
			?>
			<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/langit-blog-placeholder.svg' ) ); ?>" alt="<?php the_title_attribute(); ?>" itemprop="image" />
			<?php
		}
		?>
	</a>

	<header class="post-card__header">
		<?php langit_post_modified_meta(); ?>
		<meta itemprop="author" content="<?php echo esc_attr( get_the_author() ); ?>">
		<?php the_title( '<h2 class="post-card__title blog-card-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>
	</header>

	<div class="entry-summary blog-card-excerpt" itemprop="description">
		<?php the_excerpt(); ?>
	</div>

	<div class="post-card__meta-row">
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
	</div>

	<a class="read-more-link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'langit' ); ?></a>
</article>
