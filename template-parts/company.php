<?php
/**
 * Company page sections.
 *
 * @package Langit
 */

$langit_icon_uri = get_template_directory_uri() . '/assets/icons/';

$langit_capabilities = array(
	esc_html__( 'Mechanical Electrical', 'langit' ),
	esc_html__( 'CCTV & Security System', 'langit' ),
	esc_html__( 'Networking Infrastructure', 'langit' ),
	esc_html__( 'Fire Alarm System', 'langit' ),
	esc_html__( 'Audio & Public Address', 'langit' ),
	esc_html__( 'Installation & Maintenance Service', 'langit' ),
);

$langit_missions = array(
	esc_html__( 'Meningkatkan kualitas pelayanan kepada pelanggan, baik dalam pengadaan produk maupun layanan jasa secara profesional dan berkelanjutan.', 'langit' ),
	esc_html__( 'Memberikan solusi yang tepat, efektif, dan inovatif guna membantu menyelesaikan permasalahan pelanggan melalui produk dan layanan yang kami tawarkan.', 'langit' ),
	esc_html__( 'Melaksanakan pelatihan dan pengembangan kompetensi bagi teknisi maupun tenaga ahli agar memiliki kemampuan dan standar profesional sesuai bidangnya.', 'langit' ),
	esc_html__( 'Memberikan layanan purna jual (after sales service) yang responsif, cepat, tepat waktu, dan terpercaya.', 'langit' ),
);

$langit_legalities = array(
	esc_html__( 'NIB', 'langit' ),
	esc_html__( 'NPWP', 'langit' ),
	esc_html__( 'Certifications', 'langit' ),
	esc_html__( 'Company Documents', 'langit' ),
);

$langit_team = array(
	esc_html__( 'Project Management', 'langit' ),
	esc_html__( 'Engineering Team', 'langit' ),
	esc_html__( 'Field Technicians', 'langit' ),
);

$langit_features = array(
	esc_html__( 'Professional Service', 'langit' ),
	esc_html__( 'Fast Response', 'langit' ),
	esc_html__( 'Experienced Team', 'langit' ),
	esc_html__( 'After Sales Support', 'langit' ),
);
?>

<?php
langit_page_hero(
	array(
		'eyebrow' => esc_html__( 'Company', 'langit' ),
		'title'   => get_the_title(),
		'text'    => esc_html__( 'Profil perusahaan, nilai kerja, legalitas, dan kapabilitas PT Global Teknindo dalam mendukung kebutuhan teknologi gedung serta fasilitas industri.', 'langit' ),
	)
);
?>

<section id="company-overview" class="section">
	<div class="container company-overview">
		<div class="stack">
			<p class="section-eyebrow"><?php esc_html_e( 'Company Overview', 'langit' ); ?></p>
			<h2><?php esc_html_e( 'Integrated technology partner for building and industrial systems.', 'langit' ); ?></h2>
			<p><?php esc_html_e( 'PT Global Teknindo merupakan perusahaan profesional yang menyediakan solusi Mechanical Electrical, CCTV & Security System, Networking Infrastructure, Fire Alarm System, Audio & Public Address, serta Installation & Maintenance Service untuk kebutuhan industri, gedung komersial, pemerintahan, dan fasilitas lainnya.', 'langit' ); ?></p>
		</div>

		<div class="capability-list">
			<?php foreach ( $langit_capabilities as $langit_capability ) : ?>
				<div class="capability-item"><?php echo esc_html( $langit_capability ); ?></div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section id="vision-mission" class="section section--surface">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Vision & Mission', 'langit' ),
				'title'   => esc_html__( 'Clear direction for reliable long-term partnership.', 'langit' ),
				'center'  => true,
			)
		);
		?>

		<div class="vision-mission-grid">
			<article class="card statement-card statement-card--vision">
				<p class="card__meta"><?php esc_html_e( 'Vision', 'langit' ); ?></p>
				<p><?php esc_html_e( 'Menjadi perusahaan profesional dan terpercaya yang mampu menjadi mitra usaha dalam memenuhi kebutuhan Mechanical Electrical, Elektronik, Audio System, CCTV, IT System, serta berbagai kebutuhan industri dan gedung lainnya.', 'langit' ); ?></p>
			</article>

			<article class="card statement-card">
				<p class="card__meta"><?php esc_html_e( 'Mission', 'langit' ); ?></p>
				<ol class="mission-list">
					<?php foreach ( $langit_missions as $langit_mission ) : ?>
						<li><?php echo esc_html( $langit_mission ); ?></li>
					<?php endforeach; ?>
				</ol>
			</article>
		</div>
	</div>
</section>

<section id="company-legality" class="section">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Company Legality', 'langit' ),
				'title'   => esc_html__( 'Prepared documentation for professional collaboration.', 'langit' ),
				'center'  => true,
			)
		);
		?>

		<div class="legality-grid">
			<?php foreach ( $langit_legalities as $langit_legality ) : ?>
				<article class="legality-card">
					<img src="<?php echo esc_url( $langit_icon_uri . 'document.svg' ); ?>" width="48" height="48" alt="" loading="lazy" decoding="async" aria-hidden="true">
					<h3><?php echo esc_html( $langit_legality ); ?></h3>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section section--surface">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Professional Team', 'langit' ),
				'title'   => esc_html__( 'Structured team for planning, execution, and support.', 'langit' ),
				'text'    => esc_html__( 'Tim kami disiapkan untuk menangani kebutuhan proyek dari perencanaan teknis, instalasi lapangan, dokumentasi pekerjaan, hingga layanan pemeliharaan berkelanjutan.', 'langit' ),
				'center'  => true,
			)
		);
		?>

		<div class="team-grid">
			<?php foreach ( $langit_team as $langit_role ) : ?>
				<?php
				langit_card(
					array(
						'title'  => $langit_role,
						'text'   => esc_html__( 'Peran tim disusun untuk menjaga koordinasi teknis, mutu pekerjaan, keselamatan instalasi, dan kelancaran dukungan selama proyek berlangsung.', 'langit' ),
						'class'  => 'team-card',
						'visual' => '<div class="team-card__visual" aria-hidden="true"><img src="' . esc_url( $langit_icon_uri . 'team.svg' ) . '" width="48" height="48" alt="" loading="lazy" decoding="async"></div>',
					)
				);
				?>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Why Choose Us', 'langit' ),
				'title'   => esc_html__( 'Practical advantages for demanding project environments.', 'langit' ),
				'center'  => true,
			)
		);
		?>

		<div class="feature-grid">
			<?php foreach ( $langit_features as $langit_feature ) : ?>
				<?php
				langit_card(
					array(
						'title'      => $langit_feature,
						'text'       => esc_html__( 'Pendekatan kerja yang terstruktur, responsif, dan berorientasi pada keandalan operasional pelanggan.', 'langit' ),
						'class'      => 'feature-card',
						'icon_class' => 'service-card__icon',
						'icon_url'   => $langit_icon_uri . 'maintenance.svg',
					)
				);
				?>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
langit_cta(
	array(
		'title'   => esc_html__( 'Ready to discuss your company requirements?', 'langit' ),
		'text'    => esc_html__( 'Tim kami siap membantu meninjau kebutuhan teknis dan menyiapkan rekomendasi solusi yang sesuai dengan kondisi proyek.', 'langit' ),
		'actions' => array(
			array(
				'url'   => home_url( '/contact/' ),
				'label' => esc_html__( 'Contact Us', 'langit' ),
			),
		),
	)
);
?>
