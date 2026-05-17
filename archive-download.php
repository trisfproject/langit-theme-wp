<?php
/**
 * Downloads archive template.
 *
 * @package Langit
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	langit_page_hero(
		array(
			'eyebrow' => esc_html__( 'Resources', 'langit' ),
			'title'   => post_type_archive_title( '', false ),
			'text'    => esc_html__( 'Dokumen perusahaan, profil, katalog, sertifikasi, dan referensi teknis yang dapat digunakan untuk mendukung kebutuhan konsultasi dan perencanaan proyek.', 'langit' ),
		)
	);
	?>

	<section class="section section--surface">
		<div class="container stack">
			<div class="download-grid">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						langit_download_card( get_the_ID() );
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
