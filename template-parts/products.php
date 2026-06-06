<?php
/**
 * Products page sections.
 *
 * @package Langit
 */

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
			array(
				'name'        => 'Voice Evacuation System',
				'description' => 'Sistem audio evakuasi darurat yang terintegrasi dengan fire alarm untuk memberikan instruksi otomatis saat kondisi emergency.',
				'spec'        => 'EMERGENCY AUDIO / EVACUATION',
				'image'       => 'audio_voice_evac.webp',
			),
			array(
				'name'        => 'Automatic Bell System',
				'description' => 'Sistem bel otomatis untuk kantor, pabrik, sekolah, dan fasilitas operasional.',
				'spec'        => 'AUTOMATED SCHEDULE / ALERT',
				'image'       => 'audio_auto_bell.webp',
			),
			array(
				'name'        => 'Car Call System',
				'description' => 'Sistem pemanggil kendaraan atau sopir untuk area lobby, warehouse, dan loading dock.',
				'spec'        => 'VEHICLE CALLING / LOBBY',
				'image'       => 'audio_car_call.webp',
			),
		),
	),
	'led-display' => array(
		'title'   => esc_html__( 'LED & Digital Display', 'langit' ),
		'eyebrow' => esc_html__( 'DISPLAY TECHNOLOGY', 'langit' ),
		'products' => array(
			array(
				'name'        => 'Running Text LED',
				'description' => 'Display LED untuk informasi operasional, produksi, dan area publik.',
				'spec'        => 'LED SIGNAGE / INFORMATION',
				'image'       => 'led_running_text.webp',
			),
			array(
				'name'        => 'LED Videotron',
				'description' => 'Layar LED indoor maupun outdoor untuk kebutuhan informasi dan promosi visual.',
				'spec'        => 'FULL COLOR / DISPLAY WALL',
				'image'       => 'led_videotron.webp',
			),
			array(
				'name'        => 'Digital Clock System',
				'description' => 'Jam digital industri dan sistem penunjuk waktu untuk kantor, pabrik, dan fasilitas publik.',
				'spec'        => 'TIME MANAGEMENT / DIGITAL',
				'image'       => 'led_digital_clock.webp',
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
			array(
				'name'        => 'Industrial Lighting System',
				'description' => 'Lampu industri, lampu jalan, lampu gudang, dan area produksi.',
				'spec'        => 'INDUSTRIAL LIGHTING',
				'image'       => 'me_industrial_lighting.webp',
			),
			array(
				'name'        => 'Industrial Exhaust Fan',
				'description' => 'Exhaust fan gedung dan area produksi untuk menjaga sirkulasi udara yang optimal.',
				'spec'        => 'VENTILATION / AIRFLOW',
				'image'       => 'me_exhaust_fan.webp',
			),
		),
	),
);
?>
<?php
langit_page_hero(
	array(
		'eyebrow' => esc_html__( 'PRODUCT CATALOG', 'langit' ),
		'title'   => esc_html__( 'Technology Systems & Equipment', 'langit' ),
		'text'    => esc_html__( 'Pilihan perangkat dan sistem teknologi bangunan yang telah digunakan pada berbagai implementasi komersial, industri, dan fasilitas operasional modern.', 'langit' ),
	)
);
?>
<section class="section product-nav-section">
	<div class="container">
		<nav class="product-category-nav" aria-label="<?php esc_attr_e( 'Product categories navigation', 'langit' ); ?>">
			<div class="product-category-nav__list">
				<?php foreach ( $product_categories as $langit_key => $langit_cat ) : ?>
					<a href="#<?php echo esc_attr( $langit_key ); ?>" class="product-category-nav__link" data-category-link="<?php echo esc_attr( $langit_key ); ?>">
						<span><?php echo esc_html( $langit_cat['title'] ); ?></span>
					</a>
				<?php endforeach; ?>
			</div>
		</nav>
	</div>
</section>


<?php
foreach ( $product_categories as $langit_key => $langit_cat ) :
	?>
	<section id="<?php echo esc_attr( $langit_key ); ?>" class="section products-section products-section--<?php echo esc_attr( $langit_key ); ?>">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => ! empty( $langit_cat['eyebrow'] ) ? $langit_cat['eyebrow'] : esc_html__( 'Product Catalog', 'langit' ),
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
