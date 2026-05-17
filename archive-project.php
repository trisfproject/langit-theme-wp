<?php
/**
 * Projects archive template.
 *
 * @package Langit
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	langit_page_hero(
		array(
			'eyebrow' => esc_html__( 'Projects', 'langit' ),
			'title'   => post_type_archive_title( '', false ),
			'text'    => esc_html__( 'Portofolio pekerjaan teknologi gedung untuk kebutuhan keamanan, jaringan, elektrikal, alarm, audio, instalasi, dan pemeliharaan fasilitas.', 'langit' ),
		)
	);
	?>

	<section class="section section--surface">
		<div class="container stack">
			<div class="blog-grid project-grid">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						langit_project_card( get_the_ID() );
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
