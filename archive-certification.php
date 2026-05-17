<?php
/**
 * Certifications archive template.
 *
 * @package Langit
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	langit_page_hero(
		array(
			'eyebrow' => esc_html__( 'Compliance', 'langit' ),
			'title'   => post_type_archive_title( '', false ),
			'text'    => esc_html__( 'Daftar sertifikasi, standar kerja, dan dokumen kepatuhan yang mendukung profesionalisme layanan teknis PT Global Teknindo.', 'langit' ),
		)
	);
	?>

	<section class="section section--surface">
		<div class="container stack">
			<div class="certification-grid">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						langit_certification_card( get_the_ID() );
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
