<?php
/**
 * Services custom post type and helpers.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Services post type and taxonomy.
 */
function langit_register_services() {
	register_post_type(
		'service',
		array(
			'labels'       => array(
				'name'                  => esc_html__( 'Services', 'langit' ),
				'singular_name'         => esc_html__( 'Service', 'langit' ),
				'add_new_item'          => esc_html__( 'Add New Service', 'langit' ),
				'edit_item'             => esc_html__( 'Edit Service', 'langit' ),
				'new_item'              => esc_html__( 'New Service', 'langit' ),
				'view_item'             => esc_html__( 'View Service', 'langit' ),
				'search_items'          => esc_html__( 'Search Services', 'langit' ),
				'not_found'             => esc_html__( 'No services found', 'langit' ),
				'all_items'             => esc_html__( 'Services', 'langit' ),
				'menu_name'             => esc_html__( 'Services', 'langit' ),
				'featured_image'        => esc_html__( 'Service Image or Icon', 'langit' ),
				'set_featured_image'    => esc_html__( 'Set service image or icon', 'langit' ),
				'remove_featured_image' => esc_html__( 'Remove service image or icon', 'langit' ),
			),
			'public'       => true,
			'has_archive'  => 'services',
			'menu_icon'    => 'dashicons-hammer',
			'rewrite'      => array(
				'slug'       => 'services',
				'with_front' => false,
			),
			'show_in_rest' => true,
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
		)
	);

	register_taxonomy(
		'service_category',
		'service',
		array(
			'labels'       => array(
				'name'          => esc_html__( 'Service Categories', 'langit' ),
				'singular_name' => esc_html__( 'Service Category', 'langit' ),
				'search_items'  => esc_html__( 'Search Service Categories', 'langit' ),
				'all_items'     => esc_html__( 'All Service Categories', 'langit' ),
				'edit_item'     => esc_html__( 'Edit Service Category', 'langit' ),
				'add_new_item'  => esc_html__( 'Add New Service Category', 'langit' ),
			),
			'hierarchical' => true,
			'public'       => true,
			'rewrite'      => array(
				'slug'       => 'service-category',
				'with_front' => false,
			),
			'show_in_rest' => true,
		)
	);

	register_post_meta(
		'service',
		'langit_service_cta_url',
		array(
			'type'              => 'string',
			'single'            => true,
			'sanitize_callback' => 'esc_url_raw',
			'show_in_rest'      => true,
			'auth_callback'     => function() {
				return current_user_can( 'edit_posts' );
			},
		)
	);

	register_post_meta(
		'service',
		'langit_service_cta_label',
		array(
			'type'              => 'string',
			'single'            => true,
			'sanitize_callback' => 'sanitize_text_field',
			'show_in_rest'      => true,
			'auth_callback'     => function() {
				return current_user_can( 'edit_posts' );
			},
		)
	);
}
add_action( 'init', 'langit_register_services' );

/**
 * Flush rewrites after theme switch so service URLs work immediately.
 */
function langit_flush_service_rewrites() {
	langit_register_services();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'langit_flush_service_rewrites' );

/**
 * Flush service rewrite rules once after service route updates.
 */
function langit_maybe_flush_service_rewrites() {
	$rewrite_version = '2026-05-17-services-route';

	if ( get_option( 'langit_service_rewrite_version' ) === $rewrite_version ) {
		return;
	}

	langit_register_services();
	flush_rewrite_rules();
	update_option( 'langit_service_rewrite_version', $rewrite_version );
}
add_action( 'admin_init', 'langit_maybe_flush_service_rewrites' );

/**
 * Return the public Services archive URL.
 *
 * @return string
 */
function langit_get_services_archive_url() {
	$archive_url = get_post_type_archive_link( 'service' );

	return $archive_url ? $archive_url : home_url( '/services/' );
}

/**
 * Return a service permalink by slug with a stable fallback.
 *
 * @param string $slug Service slug.
 * @return string
 */
function langit_get_service_url_by_slug( $slug ) {
	$service = get_page_by_path( $slug, OBJECT, 'service' );

	if ( $service instanceof WP_Post && 'publish' === get_post_status( $service ) ) {
		return get_permalink( $service );
	}

	return langit_get_services_archive_url() . '#' . sanitize_title( $slug );
}

/**
 * Return core service links for navigation and footer usage.
 *
 * @return array<string,string>
 */
function langit_get_core_service_links() {
	return array(
		esc_html__( 'CCTV & Security System', 'langit' )     => langit_get_service_url_by_slug( 'cctv-security-system' ),
		esc_html__( 'Networking Infrastructure', 'langit' )  => langit_get_service_url_by_slug( 'networking-infrastructure' ),
		esc_html__( 'Mechanical Electrical', 'langit' )      => langit_get_service_url_by_slug( 'mechanical-electrical' ),
		esc_html__( 'Fire Alarm System', 'langit' )          => langit_get_service_url_by_slug( 'fire-alarm-system' ),
		esc_html__( 'Audio & Public Address', 'langit' )     => langit_get_service_url_by_slug( 'audio-public-address' ),
		esc_html__( 'Installation & Maintenance', 'langit' ) => langit_get_service_url_by_slug( 'installation-maintenance' ),
	);
}

/**
 * Add service CTA metabox.
 */
function langit_add_service_meta_boxes() {
	add_meta_box(
		'langit-service-details',
		esc_html__( 'Service Details', 'langit' ),
		'langit_service_details_meta_box',
		'service',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes_service', 'langit_add_service_meta_boxes' );

/**
 * Render service CTA metabox.
 *
 * @param WP_Post $post Current post.
 */
function langit_service_details_meta_box( $post ) {
	$cta_url   = get_post_meta( $post->ID, 'langit_service_cta_url', true );
	$cta_label = get_post_meta( $post->ID, 'langit_service_cta_label', true );
	wp_nonce_field( 'langit_save_service_details', 'langit_service_details_nonce' );
	?>
	<p>
		<label for="langit_service_cta_url"><?php esc_html_e( 'CTA Link', 'langit' ); ?></label>
		<input
			type="url"
			id="langit_service_cta_url"
			name="langit_service_cta_url"
			value="<?php echo esc_attr( $cta_url ); ?>"
			class="widefat"
			placeholder="<?php echo esc_attr( home_url( '/contact/' ) ); ?>"
		>
	</p>
	<p>
		<label for="langit_service_cta_label"><?php esc_html_e( 'CTA Label', 'langit' ); ?></label>
		<input
			type="text"
			id="langit_service_cta_label"
			name="langit_service_cta_label"
			value="<?php echo esc_attr( $cta_label ); ?>"
			class="widefat"
			placeholder="<?php esc_attr_e( 'Request Info', 'langit' ); ?>"
		>
	</p>
	<p class="description"><?php esc_html_e( 'Optional. Leave empty to link to the service detail page.', 'langit' ); ?></p>
	<?php
}

/**
 * Save service CTA metabox.
 *
 * @param int $post_id Current post ID.
 */
function langit_save_service_details( $post_id ) {
	if ( ! isset( $_POST['langit_service_details_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['langit_service_details_nonce'] ) ), 'langit_save_service_details' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['langit_service_cta_url'] ) ) {
		$cta_url = esc_url_raw( wp_unslash( $_POST['langit_service_cta_url'] ) );
		if ( empty( $cta_url ) ) {
			delete_post_meta( $post_id, 'langit_service_cta_url' );
		} else {
			update_post_meta( $post_id, 'langit_service_cta_url', $cta_url );
		}
	}

	if ( isset( $_POST['langit_service_cta_label'] ) ) {
		$cta_label = sanitize_text_field( wp_unslash( $_POST['langit_service_cta_label'] ) );
		if ( empty( $cta_label ) ) {
			delete_post_meta( $post_id, 'langit_service_cta_label' );
		} else {
			update_post_meta( $post_id, 'langit_service_cta_label', $cta_label );
		}
	}
}
add_action( 'save_post_service', 'langit_save_service_details' );

/**
 * Get default services used before dynamic service posts are created.
 *
 * @return array<int,array<string,string>>
 */
function langit_default_services() {
	$icon_uri = get_template_directory_uri() . '/assets/icons/';

	return array(
		array(
			'title'       => __( 'CCTV & Security System', 'langit' ),
			'description' => __( 'Perencanaan dan instalasi sistem kamera pengawas, perangkat keamanan, dan pemantauan area untuk meningkatkan perlindungan fasilitas secara terukur.', 'langit' ),
			'icon'        => $icon_uri . 'cctv.svg',
		),
		array(
			'title'       => __( 'Networking Infrastructure', 'langit' ),
			'description' => __( 'Pembangunan infrastruktur jaringan data untuk kantor, gedung, dan area operasional yang membutuhkan konektivitas stabil, rapi, dan mudah dikembangkan.', 'langit' ),
			'icon'        => $icon_uri . 'network.svg',
		),
		array(
			'title'       => __( 'Mechanical Electrical', 'langit' ),
			'description' => __( 'Dukungan sistem mekanikal elektrikal untuk bangunan dan fasilitas industri, termasuk integrasi perangkat pendukung operasional yang aman dan efisien.', 'langit' ),
			'icon'        => $icon_uri . 'electrical.svg',
		),
		array(
			'title'       => __( 'Fire Alarm System', 'langit' ),
			'description' => __( 'Instalasi sistem deteksi dan alarm kebakaran untuk mendukung kesiapsiagaan, keselamatan penghuni, dan kepatuhan area bangunan.', 'langit' ),
			'icon'        => $icon_uri . 'fire.svg',
		),
		array(
			'title'       => __( 'Audio & Public Address', 'langit' ),
			'description' => __( 'Solusi audio, paging, dan public address untuk komunikasi internal gedung, fasilitas umum, area produksi, dan kebutuhan pengumuman operasional.', 'langit' ),
			'icon'        => $icon_uri . 'audio.svg',
		),
		array(
			'title'       => __( 'Installation & Maintenance', 'langit' ),
			'description' => __( 'Layanan instalasi, pemeriksaan, perawatan, dan dukungan teknis berkala untuk menjaga sistem tetap optimal dan siap digunakan.', 'langit' ),
			'icon'        => $icon_uri . 'maintenance.svg',
		),
	);
}

/**
 * Return production service entries used by the initial content seeder.
 *
 * @return array<int,array<string,string|int>>
 */
function langit_seed_service_entries() {
	return array(
		array(
			'title'       => 'CCTV & Security System',
			'slug'        => 'cctv-security-system',
			'category'    => 'Security System',
			'image'       => 'cctv-security-system.webp',
			'menu_order'  => 10,
			'excerpt'     => 'Solusi CCTV dan sistem keamanan untuk pemantauan area, kontrol akses, serta perlindungan fasilitas secara lebih terukur dan mudah dikelola.',
			'description' => '<p>PT Global Teknindo menyediakan layanan konsultasi, perencanaan, instalasi, dan integrasi CCTV serta security system untuk gedung komersial, fasilitas industri, area operasional, kantor, dan lingkungan kerja yang membutuhkan pemantauan andal.</p><p>Setiap sistem dirancang dengan mempertimbangkan titik pengawasan, kebutuhan penyimpanan rekaman, kualitas gambar, akses pemantauan, serta kemudahan pemeliharaan. Pendekatan ini membantu pelanggan membangun sistem keamanan yang rapi, terdokumentasi, dan siap mendukung operasional harian.</p><p>Layanan dapat mencakup pemasangan kamera, penarikan kabel, konfigurasi perangkat perekam, integrasi jaringan, pengujian fungsi, serta dukungan maintenance berkala agar sistem tetap bekerja optimal.</p>',
		),
		array(
			'title'       => 'Networking Infrastructure',
			'slug'        => 'networking-infrastructure',
			'category'    => 'Network Infrastructure',
			'image'       => 'networking-infrastructure.webp',
			'menu_order'  => 20,
			'excerpt'     => 'Pembangunan infrastruktur jaringan data yang stabil, rapi, dan scalable untuk mendukung konektivitas kantor, gedung, dan area industri.',
			'description' => '<p>Layanan Networking Infrastructure mencakup perencanaan, instalasi, penataan, dan pengujian jaringan data untuk kebutuhan bisnis modern. Solusi disiapkan untuk mendukung konektivitas perangkat kerja, sistem keamanan, server, akses internet, serta integrasi antar area operasional.</p><p>PT Global Teknindo memperhatikan struktur kabel, jalur distribusi, titik akses, perangkat aktif, dokumentasi jaringan, dan kemudahan perawatan agar infrastruktur dapat berkembang mengikuti kebutuhan perusahaan.</p><p>Implementasi dilakukan dengan standar kerja yang rapi, mulai dari survei kebutuhan, penarikan kabel, terminasi, labeling, pengujian koneksi, hingga pendampingan teknis setelah pekerjaan selesai.</p>',
		),
		array(
			'title'       => 'Mechanical Electrical',
			'slug'        => 'mechanical-electrical',
			'category'    => 'Mechanical Electrical',
			'image'       => 'mechanical-electrical.webp',
			'menu_order'  => 30,
			'excerpt'     => 'Dukungan sistem mekanikal elektrikal untuk bangunan dan fasilitas operasional dengan instalasi yang aman, terstruktur, dan mudah dirawat.',
			'description' => '<p>Mechanical Electrical merupakan bagian penting dari keandalan operasional bangunan dan fasilitas industri. PT Global Teknindo membantu pelanggan dalam pekerjaan konsultasi, instalasi, integrasi, dan pemeliharaan sistem pendukung elektrikal sesuai kebutuhan area kerja.</p><p>Ruang lingkup layanan dapat disesuaikan dengan kondisi proyek, mulai dari distribusi daya, panel pendukung, jalur kabel, perangkat operasional, hingga koordinasi dengan sistem teknologi gedung lainnya.</p><p>Setiap pekerjaan diarahkan untuk menghasilkan instalasi yang aman, tertata, terdokumentasi, serta mudah diperiksa ketika dilakukan pengembangan atau maintenance di kemudian hari.</p>',
		),
		array(
			'title'       => 'Fire Alarm System',
			'slug'        => 'fire-alarm-system',
			'category'    => 'Safety System',
			'image'       => 'fire-alarm-system.webp',
			'menu_order'  => 40,
			'excerpt'     => 'Instalasi fire alarm system untuk mendukung deteksi dini, keselamatan penghuni, dan kesiapan fasilitas dalam kondisi darurat.',
			'description' => '<p>PT Global Teknindo menyediakan layanan Fire Alarm System untuk membantu bangunan dan fasilitas operasional memiliki sistem deteksi serta peringatan dini yang lebih siap digunakan. Solusi disiapkan berdasarkan kebutuhan area, fungsi ruangan, jalur evakuasi, dan prioritas keselamatan.</p><p>Pekerjaan dapat mencakup perencanaan titik perangkat, instalasi kabel, pemasangan detector, manual call point, bell atau sounder, panel kontrol, pengujian fungsi, serta dokumentasi hasil pekerjaan.</p><p>Dengan instalasi yang terstruktur dan pemeriksaan berkala, sistem fire alarm dapat mendukung kesiapsiagaan fasilitas sekaligus membantu pengelola menjaga standar keselamatan operasional.</p>',
		),
		array(
			'title'       => 'Audio & Public Address',
			'slug'        => 'audio-public-address',
			'category'    => 'Audio System',
			'image'       => 'audio-public-address.webp',
			'menu_order'  => 50,
			'excerpt'     => 'Solusi audio, paging, dan public address untuk kebutuhan komunikasi internal, pengumuman, serta informasi operasional di berbagai area.',
			'description' => '<p>Audio & Public Address mendukung komunikasi yang jelas di gedung, area produksi, fasilitas umum, ruang kerja, dan lingkungan operasional yang membutuhkan sistem pengumuman terpusat. PT Global Teknindo membantu merancang dan mengimplementasikan sistem audio sesuai karakter area serta kebutuhan penggunaan.</p><p>Layanan dapat mencakup pemilihan perangkat, perencanaan zona, instalasi speaker, amplifier, microphone, paging system, jalur kabel, konfigurasi dasar, hingga pengujian distribusi suara.</p><p>Solusi disiapkan agar komunikasi internal menjadi lebih efektif, mudah dioperasikan, dan dapat dirawat secara berkelanjutan sesuai kebutuhan fasilitas.</p>',
		),
		array(
			'title'       => 'Installation & Maintenance',
			'slug'        => 'installation-maintenance',
			'category'    => 'Maintenance Service',
			'image'       => 'installation-maintenance.webp',
			'menu_order'  => 60,
			'excerpt'     => 'Layanan instalasi dan maintenance untuk menjaga sistem teknologi gedung tetap rapi, stabil, dan siap mendukung operasional jangka panjang.',
			'description' => '<p>Installation & Maintenance Service membantu pelanggan memastikan sistem yang terpasang dapat berjalan stabil setelah implementasi. Layanan ini mencakup pekerjaan instalasi perangkat, pengecekan fungsi, perapihan jalur, dokumentasi, perawatan berkala, serta dukungan teknis ketika dibutuhkan.</p><p>PT Global Teknindo menempatkan maintenance sebagai bagian penting dari keandalan sistem. Pemeriksaan berkala membantu mendeteksi potensi gangguan lebih awal, menjaga performa perangkat, dan mendukung kontinuitas operasional fasilitas.</p><p>Layanan dapat diterapkan untuk CCTV, jaringan, elektrikal, fire alarm, audio, serta sistem pendukung lain yang membutuhkan penanganan teknis profesional dan responsif.</p>',
		),
	);
}

/**
 * Create or update a seeded service image attachment.
 *
 * @param string $slug     Service slug.
 * @param string $filename Theme image filename.
 * @param string $title    Attachment title.
 * @return int Attachment ID.
 */
function langit_seed_service_image_attachment( $slug, $filename, $title ) {
	$existing = get_posts(
		array(
			'post_type'      => 'attachment',
			'post_status'    => 'inherit',
			'posts_per_page' => 1,
			'fields'         => 'ids',
			'meta_key'       => '_langit_seed_service_image',
			'meta_value'     => $slug,
		)
	);

	if ( ! empty( $existing ) ) {
		return absint( $existing[0] );
	}

	$source = trailingslashit( get_template_directory() ) . 'assets/images/services/' . $filename;

	if ( ! file_exists( $source ) ) {
		return 0;
	}

	$uploads = wp_upload_dir();

	if ( ! empty( $uploads['error'] ) ) {
		return 0;
	}

	$target_dir = trailingslashit( $uploads['basedir'] ) . 'langit-services';
	wp_mkdir_p( $target_dir );

	$target = trailingslashit( $target_dir ) . $filename;

	if ( ! file_exists( $target ) ) {
		copy( $source, $target );
	}

	$filetype      = wp_check_filetype( $target, null );
	$attachment_id = wp_insert_attachment(
		array(
			'post_mime_type' => $filetype['type'],
			'post_title'     => $title,
			'post_content'   => '',
			'post_status'    => 'inherit',
		),
		$target
	);

	if ( is_wp_error( $attachment_id ) || ! $attachment_id ) {
		return 0;
	}

	update_post_meta( $attachment_id, '_langit_seed_service_image', $slug );

	if ( file_exists( ABSPATH . 'wp-admin/includes/image.php' ) ) {
		require_once ABSPATH . 'wp-admin/includes/image.php';
		$metadata = wp_generate_attachment_metadata( $attachment_id, $target );

		if ( ! is_wp_error( $metadata ) && ! empty( $metadata ) ) {
			wp_update_attachment_metadata( $attachment_id, $metadata );
		}
	}

	return absint( $attachment_id );
}

/**
 * Seed production service entries into the Services CPT.
 */
function langit_seed_services_content() {
	$seed_version = '2026-05-17';

	if ( get_option( 'langit_service_seed_version' ) === $seed_version ) {
		return;
	}

	foreach ( langit_seed_service_entries() as $service ) {
		$post = get_page_by_path( $service['slug'], OBJECT, 'service' );
		$args = array(
			'post_title'   => $service['title'],
			'post_name'    => $service['slug'],
			'post_type'    => 'service',
			'post_status'  => 'publish',
			'post_excerpt' => $service['excerpt'],
			'post_content' => $service['description'],
			'menu_order'   => absint( $service['menu_order'] ),
		);

		if ( $post instanceof WP_Post ) {
			$args['ID'] = $post->ID;
			$post_id   = wp_update_post( wp_slash( $args ), true );
		} else {
			$post_id = wp_insert_post( wp_slash( $args ), true );
		}

		if ( is_wp_error( $post_id ) || ! $post_id ) {
			continue;
		}

		$term = term_exists( $service['category'], 'service_category' );

		if ( 0 === $term || null === $term ) {
			$term = wp_insert_term( $service['category'], 'service_category' );
		}

		if ( ! is_wp_error( $term ) ) {
			wp_set_object_terms( $post_id, array( absint( is_array( $term ) ? $term['term_id'] : $term ) ), 'service_category', false );
		}

		update_post_meta( $post_id, 'langit_service_cta_url', home_url( '/contact/' ) );
		update_post_meta( $post_id, 'langit_service_cta_label', esc_html__( 'Request Consultation', 'langit' ) );

		$attachment_id = langit_seed_service_image_attachment( $service['slug'], $service['image'], $service['title'] );

		if ( $attachment_id ) {
			set_post_thumbnail( $post_id, $attachment_id );
		}
	}

	update_option( 'langit_service_seed_version', $seed_version );
}
add_action( 'admin_init', 'langit_seed_services_content' );

/**
 * Get a service CTA URL.
 *
 * @param int $post_id Service post ID.
 * @return string
 */
function langit_get_service_cta_url( $post_id, $fallback = 'permalink' ) {
	$cta_url = get_post_meta( $post_id, 'langit_service_cta_url', true );

	if ( $cta_url ) {
		return $cta_url;
	}

	if ( 'contact' === $fallback ) {
		return home_url( '/contact/' );
	}

	return get_permalink( $post_id );
}

/**
 * Get a service CTA label.
 *
 * @param int $post_id Service post ID.
 * @return string
 */
function langit_get_service_cta_label( $post_id ) {
	$cta_label = get_post_meta( $post_id, 'langit_service_cta_label', true );

	if ( ! empty( $cta_label ) ) {
		return $cta_label;
	}

	return esc_html__( 'Request Info', 'langit' );
}

/**
 * Get the original icon URL for a service title or slug.
 *
 * @param int|string $service Service post ID, title, or slug.
 * @return string
 */
function langit_get_service_icon_url( $service ) {
	$icon_uri = get_template_directory_uri() . '/assets/icons/';
	$key      = is_numeric( $service ) ? get_post_field( 'post_name', absint( $service ) ) : sanitize_title( $service );
	$icons    = array(
		'cctv-security-system'       => 'cctv.svg',
		'networking-infrastructure'  => 'network.svg',
		'mechanical-electrical'      => 'electrical.svg',
		'fire-alarm-system'          => 'fire.svg',
		'audio-public-address'       => 'audio.svg',
		'installation-maintenance'   => 'maintenance.svg',
		'installation-maintenance-service' => 'maintenance.svg',
	);

	return $icon_uri . ( isset( $icons[ $key ] ) ? $icons[ $key ] : 'maintenance.svg' );
}

/**
 * Get a service excerpt.
 *
 * @param int $post_id Service post ID.
 * @return string
 */
function langit_get_service_excerpt( $post_id ) {
	$excerpt = get_the_excerpt( $post_id );

	if ( ! empty( $excerpt ) ) {
		return $excerpt;
	}

	return wp_trim_words( wp_strip_all_tags( get_post_field( 'post_content', $post_id ) ), 24 );
}

/**
 * Render a service/product card.
 *
 * @param int|array $service Service post ID or fallback service data.
 */
function langit_service_card( $service ) {
	if ( is_array( $service ) ) {
		?>
		<article id="<?php echo esc_attr( sanitize_title( $service['title'] ) ); ?>" class="card product-card service-card service-card--archive">
			<p class="card__meta"><?php esc_html_e( 'Operational Service', 'langit' ); ?></p>
			<div class="product-card__visual service-card__visual" aria-hidden="true">
				<img src="<?php echo esc_url( $service['icon'] ); ?>" width="48" height="48" alt="" loading="lazy" decoding="async">
			</div>
			<div class="product-card__body service-card__body">
				<h3><?php echo esc_html( $service['title'] ); ?></h3>
				<p><?php echo esc_html( $service['description'] ); ?></p>
			</div>
			<?php
			langit_button(
				array(
					'url'              => home_url( '/contact/' ),
					'label'            => esc_html__( 'Request Info', 'langit' ),
					'variant'          => 'ghost',
					'whatsapp_context' => 'services',
					'service_name'     => $service['title'],
				)
			);
			?>
		</article>
		<?php
		return;
	}

	$post_id = absint( $service );
	$terms   = get_the_terms( $post_id, 'service_category' );
	$meta    = ( ! is_wp_error( $terms ) && ! empty( $terms ) ) ? $terms[0]->name : esc_html__( 'Service', 'langit' );
	$icon    = langit_get_service_icon_url( $post_id );
	$link    = get_permalink( $post_id );
	?>
	<article id="<?php echo esc_attr( get_post_field( 'post_name', $post_id ) ); ?>" <?php post_class( 'card product-card service-card service-card--archive', $post_id ); ?>>
		<p class="card__meta"><?php echo esc_html( $meta ); ?></p>
		<a class="product-card__visual service-card__visual" href="<?php echo esc_url( $link ); ?>" aria-label="<?php echo esc_attr( get_the_title( $post_id ) ); ?>">
			<img src="<?php echo esc_url( $icon ); ?>" width="48" height="48" alt="" loading="lazy" decoding="async">
		</a>
		<div class="product-card__body service-card__body">
			<h3><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( get_the_title( $post_id ) ); ?></a></h3>
			<p><?php echo esc_html( langit_get_service_excerpt( $post_id ) ); ?></p>
		</div>
		<?php
		langit_button(
			array(
				'url'     => $link,
				'label'   => esc_html__( 'View Service', 'langit' ),
				'variant' => 'ghost',
			)
		);
		?>
	</article>
	<?php
}

/**
 * Render a compact service summary card.
 *
 * @param int|array $service Service post ID or fallback service data.
 */
function langit_service_summary_card( $service ) {
	if ( is_array( $service ) ) {
		?>
		<article class="card service-card service-card--summary">
			<p class="card__meta"><?php esc_html_e( 'Operational Service', 'langit' ); ?></p>
			<img class="service-card__icon" src="<?php echo esc_url( $service['icon'] ); ?>" width="48" height="48" alt="" loading="lazy" decoding="async">
			<div class="service-card__body">
				<h3><?php echo esc_html( $service['title'] ); ?></h3>
				<p><?php echo esc_html( $service['description'] ); ?></p>
			</div>
		</article>
		<?php
		return;
	}

	$post_id  = absint( $service );
	$icon_url = langit_get_service_icon_url( $post_id );
	$terms    = get_the_terms( $post_id, 'service_category' );
	$meta     = ( ! is_wp_error( $terms ) && ! empty( $terms ) ) ? $terms[0]->name : esc_html__( 'Service', 'langit' );

	$link = get_permalink( $post_id );
	?>
	<article <?php post_class( 'card service-card service-card--summary', $post_id ); ?>>
		<p class="card__meta"><?php echo esc_html( $meta ); ?></p>
		<img class="service-card__icon" src="<?php echo esc_url( $icon_url ); ?>" width="48" height="48" alt="" loading="lazy" decoding="async">
		<div class="service-card__body">
			<h3><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( get_the_title( $post_id ) ); ?></a></h3>
			<p><?php echo esc_html( langit_get_service_excerpt( $post_id ) ); ?></p>
		</div>
		<?php
		langit_button(
			array(
				'url'     => $link,
				'label'   => esc_html__( 'View Service', 'langit' ),
				'variant' => 'ghost',
			)
		);
		?>
	</article>
	<?php
}
