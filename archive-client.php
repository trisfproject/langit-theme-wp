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
			'eyebrow' => esc_html__( 'Enterprise Trust', 'langit' ),
			'title'   => esc_html__( 'Client References', 'langit' ),
			'text'    => esc_html__( 'Referensi pelanggan dan lingkungan operasional yang tercantum dalam dokumen company profile, mencakup kawasan industri, fasilitas komersial, rumah sakit, apartemen, hotel, dan instansi.', 'langit' ),
		)
	);
	?>

	<section class="section section--surface client-sector-archive">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => esc_html__( 'Operational Trust', 'langit' ),
					'title'   => esc_html__( 'Real customer references across industrial and facility environments.', 'langit' ),
					'text'    => esc_html__( 'Daftar berikut menggunakan nama pelanggan dari dokumen company profile sebagai referensi pengalaman kerja dan cakupan operasional perusahaan.', 'langit' ),
					'center'  => true,
				)
			);
			?>

			<div class="client-grid client-grid--references">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						langit_client_card( get_the_ID() );
					endwhile;
				else :
					foreach ( langit_default_client_references() as $langit_client ) {
						langit_client_reference_card( $langit_client );
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
