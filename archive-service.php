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
			'eyebrow' => esc_html__( 'PROFESSIONAL SERVICES', 'langit' ),
			'title'   => esc_html__( 'Integrated Building Solutions', 'langit' ),
			'text'    => esc_html__( 'Solusi terintegrasi mulai dari perencanaan, instalasi, implementasi hingga pemeliharaan sistem keamanan, jaringan, elektrikal, audio, dan infrastruktur gedung.', 'langit' ),
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
