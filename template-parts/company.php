<?php
/**
 * Company page sections.
 *
 * @package Langit
 */

$langit_icon_uri = get_template_directory_uri() . '/assets/icons/';

$langit_missions = array(
	esc_html__( 'Meningkatkan kualitas pelayanan kepada pelanggan, baik dalam pengadaan produk maupun layanan jasa secara profesional dan berkelanjutan.', 'langit' ),
	esc_html__( 'Memberikan solusi yang tepat, efektif, dan inovatif guna membantu menyelesaikan permasalahan pelanggan melalui produk dan layanan yang kami tawarkan.', 'langit' ),
	esc_html__( 'Melaksanakan pelatihan dan pengembangan kompetensi bagi teknisi maupun tenaga ahli agar memiliki kemampuan dan standar profesional sesuai bidangnya.', 'langit' ),
	esc_html__( 'Memberikan layanan purna jual (after sales service) yang responsif, cepat, tepat waktu, dan terpercaya.', 'langit' ),
);

$langit_features = array(
	array(
		'title'       => esc_html__( 'Professional Installation', 'langit' ),
		'description' => esc_html__( 'Pekerjaan instalasi dilakukan secara rapi, terukur, dan memperhatikan standar teknis agar sistem siap digunakan dalam operasional harian.', 'langit' ),
		'icon'        => 'maintenance.svg',
	),
	array(
		'title'       => esc_html__( 'Integrated System Approach', 'langit' ),
		'description' => esc_html__( 'Solusi dirancang untuk menghubungkan kebutuhan security system, jaringan, electrical, alarm, audio, instalasi, dan maintenance dalam satu pendekatan kerja yang terstruktur.', 'langit' ),
		'icon'        => 'network.svg',
	),
	array(
		'title'       => esc_html__( 'Reliable Maintenance Support', 'langit' ),
		'description' => esc_html__( 'Dukungan pemeliharaan membantu menjaga performa sistem tetap stabil, terdokumentasi, dan mudah ditindaklanjuti saat terjadi kebutuhan teknis.', 'langit' ),
		'icon'        => 'time.svg',
	),
	array(
		'title'       => esc_html__( 'Scalable Infrastructure', 'langit' ),
		'description' => esc_html__( 'Infrastruktur disiapkan agar dapat berkembang mengikuti kebutuhan gedung, fasilitas, area kerja, dan skala operasional client.', 'langit' ),
		'icon'        => 'electrical.svg',
	),
	array(
		'title'       => esc_html__( 'Technical Consultation', 'langit' ),
		'description' => esc_html__( 'Tim membantu proses konsultasi, survey, perencanaan teknis, serta rekomendasi solusi agar kebutuhan proyek lebih jelas sejak awal.', 'langit' ),
		'icon'        => 'contact.svg',
	),
	array(
		'title'       => esc_html__( 'Operational Reliability', 'langit' ),
		'description' => esc_html__( 'Setiap solusi diarahkan untuk mendukung keamanan, efisiensi, koordinasi, dan keandalan operasional jangka panjang.', 'langit' ),
		'icon'        => 'document.svg',
	),
);

$langit_industries = array(
	array(
		'title'       => esc_html__( 'Industrial', 'langit' ),
		'description' => esc_html__( 'Sistem untuk area produksi, gudang, dan operasional lapangan.', 'langit' ),
	),
	array(
		'title'       => esc_html__( 'Commercial Building', 'langit' ),
		'description' => esc_html__( 'Infrastruktur gedung kantor, retail, dan area publik modern.', 'langit' ),
	),
	array(
		'title'       => esc_html__( 'Government', 'langit' ),
		'description' => esc_html__( 'Implementasi untuk fasilitas pemerintahan dan layanan publik.', 'langit' ),
	),
	array(
		'title'       => esc_html__( 'Residential', 'langit' ),
		'description' => esc_html__( 'Integrasi keamanan dan jaringan untuk hunian modern.', 'langit' ),
	),
);

$langit_values = array(
	array(
		'title'       => esc_html__( 'Integrity', 'langit' ),
		'description' => esc_html__( 'Menjaga kepercayaan melalui komunikasi yang jelas, dokumentasi pekerjaan yang rapi, and tanggung jawab terhadap hasil layanan.', 'langit' ),
		'icon'        => 'document.svg',
	),
	array(
		'title'       => esc_html__( 'Reliability', 'langit' ),
		'description' => esc_html__( 'Mengutamakan sistem yang stabil, mudah dirawat, and mampu mendukung kebutuhan operasional client secara berkelanjutan.', 'langit' ),
		'icon'        => 'maintenance.svg',
	),
	array(
		'title'       => esc_html__( 'Professionalism', 'langit' ),
		'description' => esc_html__( 'Menjalankan setiap tahapan pekerjaan dengan standar kerja, koordinasi, and pendekatan teknis yang profesional.', 'langit' ),
		'icon'        => 'team.svg',
	),
	array(
		'title'       => esc_html__( 'Safety', 'langit' ),
		'description' => esc_html__( 'Memperhatikan keselamatan instalasi, kerapian jalur kerja, serta kesiapan sistem untuk lingkungan industri dan komersial.', 'langit' ),
		'icon'        => 'fire.svg',
	),
	array(
		'title'       => esc_html__( 'Efficiency', 'langit' ),
		'description' => esc_html__( 'Membantu client membangun sistem yang lebih terstruktur, mudah dipantau, and mendukung efisiensi operasional.', 'langit' ),
		'icon'        => 'network.svg',
	),
	array(
		'title'       => esc_html__( 'Innovation', 'langit' ),
		'description' => esc_html__( 'Menerapkan solusi teknologi yang scalable dan relevan dengan kebutuhan modern tanpa mengabaikan keandalan implementasi.', 'langit' ),
		'icon'        => 'electrical.svg',
	),
);

$langit_workflow = array(
	array(
		'title'       => esc_html__( 'Consultation', 'langit' ),
		'description' => esc_html__( 'Tim memahami kebutuhan awal, prioritas operasional, dan ruang lingkup pekerjaan.', 'langit' ),
	),
	array(
		'title'       => esc_html__( 'Survey', 'langit' ),
		'description' => esc_html__( 'Peninjauan lokasi pekerjaan untuk menentukan jalur instalasi dan titik perangkat.', 'langit' ),
	),
	array(
		'title'       => esc_html__( 'Design & Planning', 'langit' ),
		'description' => esc_html__( 'Penyusunan rencana teknis dan rekomendasi solusi sistem secara terstruktur.', 'langit' ),
	),
	array(
		'title'       => esc_html__( 'Installation', 'langit' ),
		'description' => esc_html__( 'Proses pemasangan perangkat dengan standar keselamatan dan kerapian instalasi.', 'langit' ),
	),
	array(
		'title'       => esc_html__( 'Testing', 'langit' ),
		'description' => esc_html__( 'Pengujian fungsi dan integrasi sistem untuk memastikan kesiapan operasional.', 'langit' ),
	),
	array(
		'title'       => esc_html__( 'Maintenance', 'langit' ),
		'description' => esc_html__( 'Dukungan pemeliharaan berkala untuk menjaga keandalan sistem jangka panjang.', 'langit' ),
	),
);
?>

<?php
langit_page_hero(
	array(
		'eyebrow' => esc_html__( 'Company', 'langit' ),
		'title'   => esc_html__( 'About PT Global Teknindo', 'langit' ),
		'text'    => esc_html__( 'Profil perusahaan, kapabilitas layanan, nilai kerja, dan alur operasional PT Global Teknindo dalam mendukung kebutuhan teknologi bangunan modern.', 'langit' ),
	)
);
?>

<section id="company-overview" class="section">
	<div class="container company-overview">
		<div class="stack">
			<p class="section-eyebrow"><?php esc_html_e( 'About Company', 'langit' ); ?></p>
			<h2><?php esc_html_e( 'About PT Global Teknindo', 'langit' ); ?></h2>
			<p><?php esc_html_e( 'PT Global Teknindo menyediakan solusi terintegrasi di bidang teknologi, security system, mechanical electrical, networking, installation service, serta maintenance service yang profesional dan terpercaya.', 'langit' ); ?></p>
			<p><?php esc_html_e( 'Kami membantu perusahaan, fasilitas industri, bangunan komersial, dan berbagai infrastruktur modern membangun sistem yang lebih aman, efisien, terstruktur, dan andal melalui pendekatan kerja profesional serta teknologi yang scalable.', 'langit' ); ?></p>
		</div>

		<div class="capability-list">
			<div class="capability-item"><?php esc_html_e( 'Security System', 'langit' ); ?></div>
			<div class="capability-item"><?php esc_html_e( 'Mechanical Electrical', 'langit' ); ?></div>
			<div class="capability-item"><?php esc_html_e( 'Networking', 'langit' ); ?></div>
			<div class="capability-item"><?php esc_html_e( 'Installation Service', 'langit' ); ?></div>
			<div class="capability-item"><?php esc_html_e( 'Maintenance Service', 'langit' ); ?></div>
		</div>
	</div>
</section>

<section id="vision-mission" class="section section--surface">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Vision & Mission', 'langit' ),
				'title'   => esc_html__( 'Clear direction for modern infrastructure delivery.', 'langit' ),
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
				<ul class="mission-list">
					<?php foreach ( $langit_missions as $langit_mission ) : ?>
						<li><?php echo esc_html( $langit_mission ); ?></li>
					<?php endforeach; ?>
				</ul>
			</article>
		</div>
	</div>
</section>

<section id="why-choose-us" class="section">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Why Choose Us', 'langit' ),
				'title'   => esc_html__( 'Practical strengths for demanding operational environments.', 'langit' ),
				'center'  => true,
			)
		);
		?>

		<div class="why-choose-grid">
			<?php foreach ( $langit_features as $langit_feature ) : ?>
				<?php
				langit_card(
					array(
						'title'      => $langit_feature['title'],
						'text'       => $langit_feature['description'],
						'class'      => 'feature-card',
						'icon_class' => 'service-card__icon',
						'icon_url'   => $langit_icon_uri . $langit_feature['icon'],
					)
				);
				?>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section id="industry-coverage" class="section section--navy-gradient">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Industries We Serve', 'langit' ),
				'title'   => esc_html__( 'Technology support for enterprise facilities and operational spaces.', 'langit' ),
				'center'  => true,
			)
		);
		?>

		<div class="industries-serve-grid">
			<?php foreach ( $langit_industries as $langit_industry ) : ?>
				<article class="<?php echo esc_attr( langit_class_names( array( 'coverage-card', 'coverage-card--' . sanitize_title( $langit_industry['title'] ) ) ) ); ?>">
					<div class="coverage-card__content">
						<h3><?php echo esc_html( $langit_industry['title'] ); ?></h3>
						<p><?php echo esc_html( $langit_industry['description'] ); ?></p>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section id="company-values" class="section">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Company Values', 'langit' ),
				'title'   => esc_html__( 'Values that guide every project and partnership.', 'langit' ),
				'center'  => true,
			)
		);
		?>

		<div class="company-values-grid">
			<?php foreach ( $langit_values as $langit_value ) : ?>
				<?php
				langit_card(
					array(
						'title'      => $langit_value['title'],
						'text'       => $langit_value['description'],
						'class'      => 'feature-card',
						'icon_class' => 'service-card__icon',
						'icon_url'   => $langit_icon_uri . $langit_value['icon'],
					)
				);
				?>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section id="operational-workflow" class="section section--surface">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Operational Workflow', 'langit' ),
				'title'   => esc_html__( 'Structured process from consultation to long-term support.', 'langit' ),
				'center'  => true,
			)
		);
		?>

		<div class="workflow-grid">
			<?php foreach ( $langit_workflow as $langit_index => $langit_step ) : ?>
				<article class="process-card">
					<span><?php echo esc_html( str_pad( (string) ( $langit_index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					<h3><?php echo esc_html( $langit_step['title'] ); ?></h3>
					<p><?php echo esc_html( $langit_step['description'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
$langit_services_url = get_post_type_archive_link( 'services' );

langit_cta(
	array(
		'title'   => esc_html__( 'Ready to Build Reliable Technology Infrastructure?', 'langit' ),
		'text'    => esc_html__( 'Hubungi PT Global Teknindo untuk konsultasi, survey, instalasi, maupun pengembangan sistem teknologi bangunan yang profesional dan terpercaya.', 'langit' ),
		'variant' => 'split',
		'actions' => array(
			array(
				'url'   => home_url( '/contact/' ),
				'label' => esc_html__( 'Contact Us', 'langit' ),
			),
			array(
				'url'     => $langit_services_url ? $langit_services_url : home_url( '/services/' ),
				'label'   => esc_html__( 'Our Services', 'langit' ),
				'variant' => 'ghost',
			),
		),
	)
);
?>
