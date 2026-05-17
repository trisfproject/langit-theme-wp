<?php
/**
 * Services archive template.
 *
 * @package Langit
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	langit_page_hero(
		array(
			'eyebrow' => esc_html__( 'Services', 'langit' ),
			'title'   => post_type_archive_title( '', false ),
			'text'    => esc_html__( 'Jelajahi layanan teknologi gedung untuk keamanan, jaringan, elektrikal, alarm, audio, instalasi, dan pemeliharaan sistem.', 'langit' ),
		)
	);
	?>

	<section class="section section--surface">
		<div class="container stack">
			<div class="service-grid">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						langit_service_card( get_the_ID() );
					endwhile;
				else :
					foreach ( langit_default_services() as $langit_service ) {
						langit_service_card( $langit_service );
					}
				endif;
				?>
			</div>

			<?php the_posts_navigation(); ?>
		</div>
	</section>
</main>

<?php
get_footer();
