<?php
/**
 * Products page sections.
 *
 * @package Langit
 */

$langit_solutions = array(
	esc_html__( 'Industrial Solutions', 'langit' ),
	esc_html__( 'Commercial Building Solutions', 'langit' ),
	esc_html__( 'Government Solutions', 'langit' ),
	esc_html__( 'Residential Solutions', 'langit' ),
);

$langit_process = array(
	esc_html__( 'Consultation', 'langit' ),
	esc_html__( 'Planning', 'langit' ),
	esc_html__( 'Installation', 'langit' ),
	esc_html__( 'Maintenance', 'langit' ),
);

// Define products catalog array
$product_categories = array(
	'cctv' => array(
		'title' => esc_html__( 'CCTV & Security System', 'langit' ),
		'products' => array(
			array(
				'name'        => 'Hikvision ColorVu Camera',
				'description' => 'Kamera pengawas warna 24 jam untuk kondisi cahaya rendah.',
				'spec'        => '4MP / Full-Color / IP67',
				'image'       => 'cctv_colorvu.webp',
			),
			array(
				'name'        => 'PTZ Surveillance Camera',
				'description' => 'Kamera pemantauan dengan kendali putar dan zoom area luas.',
				'spec'        => '25x Zoom / 1080p / IR 150m',
				'image'       => 'cctv_ptz.webp',
			),
			array(
				'name'        => 'Indoor Dome Camera',
				'description' => 'Kamera pengawas kubah untuk instalasi plafon ruangan kantor.',
				'spec'        => '2MP / Wide Angle / PoE',
				'image'       => 'cctv_dome.webp',
			),
			array(
				'name'        => 'Outdoor Bullet Camera',
				'description' => 'Kamera pengawas tahan cuaca untuk area luar ruangan.',
				'spec'        => '4MP / IR 30m / Weatherproof',
				'image'       => 'cctv_bullet.webp',
			),
			array(
				'name'        => 'AI Smart CCTV',
				'description' => 'Kamera cerdas dengan fitur deteksi objek dan analisis video.',
				'spec'        => 'AI Human/Vehicle Detection',
				'image'       => 'cctv_ai.webp',
			),
		),
	),
	'networking' => array(
		'title' => esc_html__( 'Networking Infrastructure', 'langit' ),
		'products' => array(
			array(
				'name'        => 'MikroTik Core Router',
				'description' => 'Router utama untuk manajemen bandwidth dan perutean jaringan kantor.',
				'spec'        => '10x Gigabit Ports / SFP+',
				'image'       => 'net_router.webp',
			),
			array(
				'name'        => 'UniFi Access Point',
				'description' => 'Perangkat pemancar Wi-Fi untuk konektivitas nirkabel gedung perkantoran.',
				'spec'        => 'Wi-Fi 6 / Dual-Band / 300+ Clients',
				'image'       => 'net_ap.webp',
			),
			array(
				'name'        => 'Managed PoE Switch',
				'description' => 'Switch PoE terkelola untuk distribusi daya dan data kamera.',
				'spec'        => '24-Port / Gigabit / 370W PoE',
				'image'       => 'net_poe_switch.webp',
			),
			array(
				'name'        => 'Fiber Optic Distribution Panel',
				'description' => 'Panel terminal serat optik untuk backbone jaringan gedung.',
				'spec'        => '24-Port LC Duplex / 1U Rackmount',
				'image'       => 'net_fodp.webp',
			),
		),
	),
	'fire-alarm' => array(
		'title' => esc_html__( 'Fire Alarm System', 'langit' ),
		'products' => array(
			array(
				'name'        => 'Smoke Detector',
				'description' => 'Detektor asap untuk peringatan awal potensi kebakaran ruangan.',
				'spec'        => 'Photoelectric / Addressable / UL Listed',
				'image'       => 'fire_smoke.webp',
			),
			array(
				'name'        => 'Addressable Fire Alarm Panel',
				'description' => 'Panel kontrol utama untuk memantau status seluruh detektor gedung.',
				'spec'        => '2-Loop / 500 Devices / LCD Display',
				'image'       => 'fire_panel.webp',
			),
			array(
				'name'        => 'Heat Detector',
				'description' => 'Detektor kenaikan suhu panas untuk area dapur dan mekanikal.',
				'spec'        => 'Rate-of-Rise / Addressable',
				'image'       => 'fire_heat.webp',
			),
			array(
				'name'        => 'Manual Call Point',
				'description' => 'Tombol darurat manual untuk mengaktifkan sirine kebakaran.',
				'spec'        => 'Break Glass / Resettable',
				'image'       => 'fire_mcp.webp',
			),
		),
	),
	'audio' => array(
		'title' => esc_html__( 'Audio & Public Address', 'langit' ),
		'products' => array(
			array(
				'name'        => 'TOA Ceiling Speaker',
				'description' => 'Speaker plafon untuk pengumuman dan musik latar ruangan.',
				'spec'        => '6W / 100V Line / 6-inch',
				'image'       => 'audio_ceiling.webp',
			),
			array(
				'name'        => 'Paging Microphone',
				'description' => 'Mikrofon panggilan dengan tombol pemilih zona suara gedung.',
				'spec'        => 'Gooseneck / Zone Selector / Chime',
				'image'       => 'audio_mic.webp',
			),
			array(
				'name'        => 'Mixer Amplifier',
				'description' => 'Penguat daya audio dengan kontrol pencampuran input suara.',
				'spec'        => '240W / 100V / 5 Zone Selectors',
				'image'       => 'audio_mixer.webp',
			),
			array(
				'name'        => 'Wall Mount Speaker',
				'description' => 'Speaker dinding untuk kebutuhan distribusi suara koridor gedung.',
				'spec'        => '15W / 2-Way System / Bracket Included',
				'image'       => 'audio_wall.webp',
			),
		),
	),
	'electrical' => array(
		'title' => esc_html__( 'Mechanical Electrical', 'langit' ),
		'products' => array(
			array(
				'name'        => 'Electrical Distribution Panel',
				'description' => 'Panel pembagi daya listrik utama untuk instalasi gedung.',
				'spec'        => '3-Phase / 400V / IP54 Enclosure',
				'image'       => 'me_panel.webp',
			),
			array(
				'name'        => 'ATS AMF Panel',
				'description' => 'Panel otomatis pemindah daya listrik dari PLN ke genset.',
				'spec'        => 'Automatic Transfer Switch / 100kVA',
				'image'       => 'me_ats_amf.webp',
			),
			array(
				'name'        => 'Industrial Cable Tray',
				'description' => 'Jalur kabel logam terstruktur untuk instalasi kabel gedung.',
				'spec'        => 'Hot-Dip Galvanized / Ladder Type',
				'image'       => 'me_cable_tray.webp',
			),
			array(
				'name'        => 'Smart Power Monitoring',
				'description' => 'Sistem pemantauan daya listrik digital untuk efisiensi energi.',
				'spec'        => 'RS485 Modbus / LCD Power Meter',
				'image'       => 'me_monitoring.webp',
			),
		),
	),
);
?>

<?php
langit_page_hero(
	array(
		'eyebrow' => esc_html__( 'Products', 'langit' ),
		'title'   => get_the_title(),
		'text'    => esc_html__( 'Katalog perangkat teknologi gedung untuk keamanan, jaringan, proteksi kebakaran, sistem audio, serta instalasi mekanikal elektrikal.', 'langit' ),
	)
);
?>

<section class="section">
	<div class="container company-overview">
		<div class="stack">
			<p class="section-eyebrow"><?php esc_html_e( 'Products Overview', 'langit' ); ?></p>
			<h2><?php esc_html_e( 'Integrated systems for modern building operations.', 'langit' ); ?></h2>
		</div>
		<div class="stack">
			<p><?php esc_html_e( 'PT Global Teknindo menyediakan beragam perangkat keras pendukung sistem teknologi gedung, mencakup produk CCTV & Security, Networking Infrastructure, Fire Alarm System, Audio & Public Address, serta Mechanical Electrical.', 'langit' ); ?></p>
			<p><?php esc_html_e( 'Setiap produk dipilih berdasarkan keandalan di lapangan, kepatuhan standar industri, dan kesiapan integrasi jangka panjang guna menjaga kontinuitas operasional fasilitas Anda.', 'langit' ); ?></p>
		</div>
	</div>
</section>

<?php
$langit_index = 0;
foreach ( $product_categories as $langit_key => $langit_cat ) :
	$langit_is_surface = ( $langit_index % 2 !== 0 );
	$langit_index++;
	?>
	<section id="<?php echo esc_attr( $langit_key ); ?>" class="section <?php echo $langit_is_surface ? 'section--surface' : ''; ?>">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => esc_html__( 'Product Catalog', 'langit' ),
					'title'   => $langit_cat['title'],
					'center'  => true,
				)
			);
			?>

			<div class="products-grid">
				<?php foreach ( $langit_cat['products'] as $langit_prod ) : ?>
					<article class="card post-card product-card">
						<div class="product-card__media">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/products/' . $langit_prod['image'] ); ?>" alt="<?php echo esc_attr( $langit_prod['name'] ); ?>" loading="lazy" decoding="async">
						</div>
						<header class="product-card__header">
							<?php if ( ! empty( $langit_prod['spec'] ) ) : ?>
								<div class="product-card__badge"><?php echo esc_html( $langit_prod['spec'] ); ?></div>
							<?php endif; ?>
							<h3 class="product-card__title"><?php echo esc_html( $langit_prod['name'] ); ?></h3>
						</header>
						<div class="entry-summary product-card__summary">
							<p><?php echo esc_html( $langit_prod['description'] ); ?></p>
						</div>
						<div class="product-card__actions">
							<?php
							langit_button(
								array(
									'url'              => home_url( '/contact/' ),
									'label'            => esc_html__( 'Consult via WhatsApp', 'langit' ),
									'variant'          => 'primary',
									'whatsapp_context' => 'product_inquiry',
									'service_name'     => $langit_prod['name'],
								)
							);
							?>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endforeach; ?>

<section class="section">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Featured Solutions', 'langit' ),
				'title'   => esc_html__( 'Adaptable solutions for different project environments.', 'langit' ),
				'center'  => true,
			)
		);
		?>

		<div class="coverage-grid">
			<?php foreach ( $langit_solutions as $langit_solution ) : ?>
				<article class="coverage-card solution-card">
					<h3><?php echo esc_html( $langit_solution ); ?></h3>
					<p><?php esc_html_e( 'Solusi dapat disesuaikan dengan kebutuhan area, skala proyek, prioritas keamanan, dan standar operasional pelanggan.', 'langit' ); ?></p>
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
				'eyebrow' => esc_html__( 'Process', 'langit' ),
				'title'   => esc_html__( 'Simple workflow from requirement to long-term support.', 'langit' ),
				'center'  => true,
			)
		);
		?>

		<div class="process-grid">
			<?php foreach ( $langit_process as $langit_index => $langit_step ) : ?>
				<article class="process-card">
					<span><?php echo esc_html( str_pad( (string) ( $langit_index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					<h3><?php echo esc_html( $langit_step ); ?></h3>
					<p><?php esc_html_e( 'Setiap tahap dilakukan secara terarah, mulai dari pengumpulan kebutuhan, penyusunan rencana teknis, pelaksanaan instalasi, hingga dukungan pemeliharaan.', 'langit' ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
langit_inquiry( 'service' );
