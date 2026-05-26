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
					'eyebrow' => esc_html__( 'Industrial Ecosystem', 'langit' ),
					'title'   => esc_html__( 'Deployment coverage across operational zones.', 'langit' ),
					'text'    => esc_html__( 'Referensi pelanggan disusun berdasarkan kawasan dan lingkungan operasional agar cakupan pengalaman terlihat lebih terstruktur, matang, dan relevan untuk kebutuhan industri.', 'langit' ),
					'center'  => true,
				)
			);
			?>

			<div class="client-ecosystem-list">
				<?php
				foreach ( langit_get_client_ecosystems() as $langit_ecosystem ) {
					langit_client_ecosystem_section( $langit_ecosystem );
				}
				?>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
