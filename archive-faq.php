<?php
/**
 * FAQ archive template.
 *
 * @package Langit
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	langit_page_hero(
		array(
			'eyebrow' => esc_html__( 'Knowledge Base', 'langit' ),
			'title'   => post_type_archive_title( '', false ),
			'text'    => esc_html__( 'Pertanyaan umum seputar konsultasi, instalasi, integrasi, dan maintenance sistem teknologi gedung.', 'langit' ),
		)
	);
	?>

	<section class="section section--surface">
		<div class="container faq-layout">
			<div class="faq-list">
				<?php
				if ( have_posts() ) :
					$langit_index = 0;
					while ( have_posts() ) :
						the_post();
						langit_faq_item( get_the_ID(), 0 === $langit_index );
						$langit_index++;
					endwhile;
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
			</div>

			<?php the_posts_navigation(); ?>
		</div>
	</section>
</main>

<?php
get_footer();
