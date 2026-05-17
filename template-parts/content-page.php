<?php
/**
 * Page content.
 *
 * @package Langit
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/WebPage">
	<header class="entry-header">
		<div class="container">
			<?php the_title( '<h1 class="entry-title" itemprop="name">', '</h1>' ); ?>
		</div>
	</header>

	<div class="entry-content" itemprop="mainContentOfPage">
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
</article>
