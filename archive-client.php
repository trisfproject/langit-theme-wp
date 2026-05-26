<?php
/**
 * Clients archive template.
 *
 * @package Langit
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	langit_page_hero(
		array(
			'eyebrow' => esc_html__( 'Operational Sectors', 'langit' ),
			'title'   => esc_html__( 'Deployment Environments', 'langit' ),
			'text'    => esc_html__( 'Area penerapan sistem keamanan, jaringan, alarm, audio, elektrikal, instalasi, dan dukungan operasional PT Global Teknindo.', 'langit' ),
		)
	);
	?>

	<section class="section section--surface client-sector-archive">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => esc_html__( 'Coverage Capability', 'langit' ),
					'title'   => esc_html__( 'Infrastructure support across active building environments.', 'langit' ),
					'text'    => esc_html__( 'Setiap sektor memiliki kebutuhan lapangan yang berbeda, mulai dari monitoring, jaringan, kontrol akses, fire alarm, audio, hingga maintenance sistem.', 'langit' ),
					'center'  => true,
				)
			);
			?>

			<div class="client-grid">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						langit_client_card( get_the_ID() );
					endwhile;
				else :
					foreach ( langit_default_client_sectors() as $langit_sector ) {
						langit_client_sector_card( $langit_sector );
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
