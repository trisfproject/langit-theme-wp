<?php
/**
 * Projects custom post type and helpers.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Projects post type and taxonomy.
 */
function langit_register_projects() {
	register_post_type(
		'project',
		array(
			'labels'       => array(
				'name'                  => esc_html__( 'Projects', 'langit' ),
				'singular_name'         => esc_html__( 'Project', 'langit' ),
				'add_new_item'          => esc_html__( 'Add New Project', 'langit' ),
				'edit_item'             => esc_html__( 'Edit Project', 'langit' ),
				'new_item'              => esc_html__( 'New Project', 'langit' ),
				'view_item'             => esc_html__( 'View Project', 'langit' ),
				'search_items'          => esc_html__( 'Search Projects', 'langit' ),
				'not_found'             => esc_html__( 'No projects found', 'langit' ),
				'all_items'             => esc_html__( 'All Projects', 'langit' ),
				'menu_name'             => esc_html__( 'Projects', 'langit' ),
				'featured_image'        => esc_html__( 'Project Featured Image', 'langit' ),
				'set_featured_image'    => esc_html__( 'Set project featured image', 'langit' ),
				'remove_featured_image' => esc_html__( 'Remove project featured image', 'langit' ),
			),
			'public'       => true,
			'has_archive'  => 'projects',
			'menu_icon'    => 'dashicons-portfolio',
			'rewrite'      => array(
				'slug'       => 'projects',
				'with_front' => false,
			),
			'show_in_rest' => true,
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
		)
	);

	register_taxonomy(
		'project_category',
		'project',
		array(
			'labels'       => array(
				'name'          => esc_html__( 'Project Categories', 'langit' ),
				'singular_name' => esc_html__( 'Project Category', 'langit' ),
				'search_items'  => esc_html__( 'Search Project Categories', 'langit' ),
				'all_items'     => esc_html__( 'All Project Categories', 'langit' ),
				'edit_item'     => esc_html__( 'Edit Project Category', 'langit' ),
				'add_new_item'  => esc_html__( 'Add New Project Category', 'langit' ),
			),
			'hierarchical' => true,
			'public'       => true,
			'rewrite'      => array(
				'slug'       => 'project-category',
				'with_front' => false,
			),
			'show_in_rest' => true,
		)
	);

	$project_meta = array(
		'langit_project_location',
		'langit_project_year',
		'langit_project_service_type',
		'langit_project_client',
	);

	foreach ( $project_meta as $meta_key ) {
		register_post_meta(
			'project',
			$meta_key,
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
}
add_action( 'init', 'langit_register_projects' );

/**
 * Flush rewrites after theme switch so project URLs work immediately.
 */
function langit_flush_project_rewrites() {
	langit_register_projects();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'langit_flush_project_rewrites' );

/**
 * Flush project rewrite rules once after project route updates.
 */
function langit_maybe_flush_project_rewrites() {
	$rewrite_version = '2026-05-17-projects-route';

	if ( get_option( 'langit_project_rewrite_version' ) === $rewrite_version ) {
		return;
	}

	langit_register_projects();
	flush_rewrite_rules();
	update_option( 'langit_project_rewrite_version', $rewrite_version );
}
add_action( 'admin_init', 'langit_maybe_flush_project_rewrites' );

/**
 * Return the public Projects archive URL.
 *
 * @return string
 */
function langit_get_projects_archive_url() {
	$archive_url = get_post_type_archive_link( 'project' );

	return $archive_url ? $archive_url : home_url( '/projects/' );
}

/**
 * Add project details metabox.
 */
function langit_add_project_meta_boxes() {
	add_meta_box(
		'langit-project-details',
		esc_html__( 'Project Details', 'langit' ),
		'langit_project_details_meta_box',
		'project',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes_project', 'langit_add_project_meta_boxes' );

/**
 * Render project details metabox.
 *
 * @param WP_Post $post Current post.
 */
function langit_project_details_meta_box( $post ) {
	$fields = array(
		'langit_project_client'       => esc_html__( 'Client / Industry', 'langit' ),
		'langit_project_location'     => esc_html__( 'Location', 'langit' ),
		'langit_project_year'         => esc_html__( 'Completion Year', 'langit' ),
		'langit_project_service_type' => esc_html__( 'Service Type', 'langit' ),
	);

	wp_nonce_field( 'langit_save_project_details', 'langit_project_details_nonce' );

	foreach ( $fields as $key => $label ) :
		$value = get_post_meta( $post->ID, $key, true );
		?>
		<p>
			<label for="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $label ); ?></label>
			<input
				type="text"
				id="<?php echo esc_attr( $key ); ?>"
				name="<?php echo esc_attr( $key ); ?>"
				value="<?php echo esc_attr( $value ); ?>"
				class="widefat"
			>
		</p>
		<?php
	endforeach;
}

/**
 * Save project details metabox.
 *
 * @param int $post_id Current post ID.
 */
function langit_save_project_details( $post_id ) {
	if ( ! isset( $_POST['langit_project_details_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['langit_project_details_nonce'] ) ), 'langit_save_project_details' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array(
		'langit_project_client',
		'langit_project_location',
		'langit_project_year',
		'langit_project_service_type',
	);

	foreach ( $fields as $field ) {
		if ( ! isset( $_POST[ $field ] ) ) {
			continue;
		}

		$value = sanitize_text_field( wp_unslash( $_POST[ $field ] ) );
		if ( '' === $value ) {
			delete_post_meta( $post_id, $field );
		} else {
			update_post_meta( $post_id, $field, $value );
		}
	}
}
add_action( 'save_post_project', 'langit_save_project_details' );

/**
 * Return production project entries used by the initial content seeder.
 *
 * @return array<int,array<string,string|int>>
 */
function langit_seed_project_entries() {
	return array(
		array(
			'title'        => 'CCTV Installation for Commercial Building',
			'slug'         => 'cctv-installation-commercial-building',
			'category'     => 'CCTV Projects',
			'image'        => 'cctv-commercial-building.webp',
			'menu_order'   => 10,
			'client'       => 'Commercial Building',
			'location'     => 'Jakarta, Indonesia',
			'year'         => '2026',
			'service_type' => 'CCTV & Security System',
			'excerpt'      => 'Implementasi CCTV untuk area gedung komersial dengan perencanaan titik kamera, integrasi jaringan, dan pengujian sistem pemantauan.',
			'description'  => '<p>Proyek ini mencakup pekerjaan konsultasi, survei area, penentuan titik kamera, instalasi perangkat CCTV, integrasi jaringan, serta pengujian sistem pemantauan untuk kebutuhan gedung komersial.</p><p>Tim teknis memastikan jalur instalasi dibuat rapi, perangkat mudah diakses untuk pemeliharaan, dan area prioritas mendapatkan cakupan visual yang sesuai dengan kebutuhan operasional gedung.</p><p>Hasil pekerjaan diarahkan untuk membantu pengelola fasilitas meningkatkan keamanan area, memperkuat dokumentasi kejadian, dan menjaga sistem pemantauan tetap andal dalam penggunaan harian.</p>',
		),
		array(
			'title'        => 'Network Infrastructure Deployment',
			'slug'         => 'network-infrastructure-deployment',
			'category'     => 'Networking Projects',
			'image'        => 'network-infrastructure-deployment.webp',
			'menu_order'   => 20,
			'client'       => 'Corporate Office',
			'location'     => 'Bekasi, Indonesia',
			'year'         => '2026',
			'service_type' => 'Networking Infrastructure',
			'excerpt'      => 'Pembangunan jaringan data untuk kantor operasional dengan struktur kabel, terminasi, labeling, dan pengujian konektivitas.',
			'description'  => '<p>Network Infrastructure Deployment dilakukan untuk mendukung konektivitas data pada area kantor dan fasilitas operasional. Pekerjaan meliputi perencanaan jalur, penarikan kabel, terminasi, penataan perangkat, serta pengujian koneksi.</p><p>Setiap titik jaringan diberi dokumentasi dan labeling agar mudah ditelusuri saat terjadi pengembangan, perubahan layout, atau pekerjaan maintenance di kemudian hari.</p><p>Implementasi ini membantu pelanggan memperoleh jaringan yang lebih stabil, tertata, dan siap mendukung kebutuhan sistem keamanan, perangkat kerja, akses internet, serta integrasi operasional lainnya.</p>',
		),
		array(
			'title'        => 'Mechanical Electrical Panel Installation',
			'slug'         => 'mechanical-electrical-panel-installation',
			'category'     => 'Mechanical Electrical',
			'image'        => 'mechanical-electrical-panel.webp',
			'menu_order'   => 30,
			'client'       => 'Industrial Facility',
			'location'     => 'Tangerang, Indonesia',
			'year'         => '2025',
			'service_type' => 'Mechanical Electrical',
			'excerpt'      => 'Pekerjaan panel dan instalasi elektrikal pendukung fasilitas industri dengan fokus pada kerapian, keamanan, dan kemudahan pemeriksaan.',
			'description'  => '<p>Proyek Mechanical Electrical Panel Installation mencakup dukungan instalasi panel dan sistem elektrikal pendukung untuk kebutuhan fasilitas industri. Pekerjaan dilakukan dengan memperhatikan keamanan instalasi, keteraturan jalur, dan kemudahan inspeksi.</p><p>Tim melakukan koordinasi teknis mulai dari peninjauan kebutuhan daya, persiapan area kerja, instalasi perangkat pendukung, hingga pemeriksaan fungsi sebelum sistem digunakan secara operasional.</p><p>Dengan dokumentasi yang jelas dan pekerjaan yang terstruktur, pelanggan dapat memiliki instalasi elektrikal yang lebih mudah dirawat dan lebih siap mengikuti kebutuhan pengembangan fasilitas.</p>',
		),
		array(
			'title'        => 'Fire Alarm System Integration',
			'slug'         => 'fire-alarm-system-integration',
			'category'     => 'Fire Alarm Projects',
			'image'        => 'fire-alarm-integration.webp',
			'menu_order'   => 40,
			'client'       => 'Warehouse Facility',
			'location'     => 'Karawang, Indonesia',
			'year'         => '2025',
			'service_type' => 'Fire Alarm System',
			'excerpt'      => 'Integrasi fire alarm untuk area gudang dan fasilitas kerja dengan pemasangan perangkat deteksi, panel, serta pengujian fungsi.',
			'description'  => '<p>Fire Alarm System Integration disiapkan untuk meningkatkan kesiapan fasilitas dalam menghadapi kondisi darurat. Ruang lingkup pekerjaan meliputi penentuan titik perangkat, instalasi detector, manual call point, alarm output, panel, dan pengujian fungsi sistem.</p><p>Proses implementasi dilakukan secara terarah agar sistem peringatan dini dapat bekerja sesuai kebutuhan area dan membantu pengelola fasilitas merespons kondisi darurat dengan lebih cepat.</p><p>Selain instalasi, pekerjaan juga menekankan dokumentasi dan pemeriksaan fungsi sehingga sistem lebih mudah dipantau serta dirawat secara berkala.</p>',
		),
		array(
			'title'        => 'Audio & Public Address Installation',
			'slug'         => 'audio-public-address-installation',
			'category'     => 'Audio System Projects',
			'image'        => 'audio-public-address-installation.webp',
			'menu_order'   => 50,
			'client'       => 'Public Facility',
			'location'     => 'Bandung, Indonesia',
			'year'         => '2025',
			'service_type' => 'Audio & Public Address',
			'excerpt'      => 'Instalasi sistem audio dan public address untuk pengumuman area, komunikasi internal, dan distribusi informasi operasional.',
			'description'  => '<p>Proyek Audio & Public Address Installation mencakup pemasangan sistem audio, perangkat paging, speaker area, dan konfigurasi dasar untuk mendukung komunikasi internal fasilitas.</p><p>Perencanaan dilakukan dengan memperhatikan karakter ruang, pembagian zona, kebutuhan volume, dan kemudahan pengoperasian oleh tim pengelola gedung atau fasilitas.</p><p>Sistem yang terpasang membantu penyampaian informasi menjadi lebih jelas, terpusat, dan siap digunakan untuk kebutuhan pengumuman harian maupun komunikasi operasional.</p>',
		),
		array(
			'title'        => 'Preventive Maintenance Services',
			'slug'         => 'preventive-maintenance-services',
			'category'     => 'Maintenance Projects',
			'image'        => 'preventive-maintenance-services.webp',
			'menu_order'   => 60,
			'client'       => 'Operational Facility',
			'location'     => 'Surabaya, Indonesia',
			'year'         => '2026',
			'service_type' => 'Installation & Maintenance',
			'excerpt'      => 'Program maintenance berkala untuk menjaga performa sistem keamanan, jaringan, elektrikal, alarm, dan perangkat pendukung operasional.',
			'description'  => '<p>Preventive Maintenance Services dilakukan untuk membantu pelanggan menjaga sistem tetap stabil dan siap digunakan. Pekerjaan dapat mencakup pemeriksaan perangkat, pengecekan koneksi, pembersihan area instalasi, pengujian fungsi, dan rekomendasi tindak lanjut.</p><p>Pendekatan maintenance berkala membantu mendeteksi potensi gangguan lebih awal, mengurangi risiko downtime, dan memperpanjang usia penggunaan perangkat yang mendukung operasional fasilitas.</p><p>Tim menyusun hasil pemeriksaan secara terstruktur sehingga pelanggan dapat memahami kondisi sistem dan menentukan prioritas perbaikan atau pengembangan berikutnya.</p>',
		),
	);
}

/**
 * Create or update a seeded project image attachment.
 *
 * @param string $slug     Project slug.
 * @param string $filename Theme image filename.
 * @param string $title    Attachment title.
 * @return int Attachment ID.
 */
function langit_seed_project_image_attachment( $slug, $filename, $title ) {
	$existing = get_posts(
		array(
			'post_type'      => 'attachment',
			'post_status'    => 'inherit',
			'posts_per_page' => 1,
			'fields'         => 'ids',
			'meta_key'       => '_langit_seed_project_image',
			'meta_value'     => $slug,
		)
	);

	if ( ! empty( $existing ) ) {
		return absint( $existing[0] );
	}

	$source = trailingslashit( get_template_directory() ) . 'assets/images/projects/' . $filename;

	if ( ! file_exists( $source ) ) {
		return 0;
	}

	$uploads = wp_upload_dir();

	if ( ! empty( $uploads['error'] ) ) {
		return 0;
	}

	$target_dir = trailingslashit( $uploads['basedir'] ) . 'langit-projects';
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

	update_post_meta( $attachment_id, '_langit_seed_project_image', $slug );

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
 * Seed production project entries into the Projects CPT.
 */
function langit_seed_projects_content() {
	$seed_version = '2026-05-17';

	if ( get_option( 'langit_project_seed_version' ) === $seed_version ) {
		return;
	}

	foreach ( langit_seed_project_entries() as $project ) {
		$post = get_page_by_path( $project['slug'], OBJECT, 'project' );
		$args = array(
			'post_title'   => $project['title'],
			'post_name'    => $project['slug'],
			'post_type'    => 'project',
			'post_status'  => 'publish',
			'post_excerpt' => $project['excerpt'],
			'post_content' => $project['description'],
			'menu_order'   => absint( $project['menu_order'] ),
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

		$term = term_exists( $project['category'], 'project_category' );

		if ( 0 === $term || null === $term ) {
			$term = wp_insert_term( $project['category'], 'project_category' );
		}

		if ( ! is_wp_error( $term ) ) {
			wp_set_object_terms( $post_id, array( absint( is_array( $term ) ? $term['term_id'] : $term ) ), 'project_category', false );
		}

		update_post_meta( $post_id, 'langit_project_client', $project['client'] );
		update_post_meta( $post_id, 'langit_project_location', $project['location'] );
		update_post_meta( $post_id, 'langit_project_year', $project['year'] );
		update_post_meta( $post_id, 'langit_project_service_type', $project['service_type'] );

		$attachment_id = langit_seed_project_image_attachment( $project['slug'], $project['image'], $project['title'] );

		if ( $attachment_id ) {
			set_post_thumbnail( $post_id, $attachment_id );
		}
	}

	update_option( 'langit_project_seed_version', $seed_version );
}
add_action( 'admin_init', 'langit_seed_projects_content' );

/**
 * Get a project excerpt.
 *
 * @param int $post_id Project post ID.
 * @return string
 */
function langit_get_project_excerpt( $post_id ) {
	$excerpt = get_the_excerpt( $post_id );

	if ( ! empty( $excerpt ) ) {
		return $excerpt;
	}

	return wp_trim_words( wp_strip_all_tags( get_post_field( 'post_content', $post_id ) ), 24 );
}

/**
 * Get project details for display.
 *
 * @param int $post_id Project post ID.
 * @return array<string,string>
 */
function langit_get_project_details( $post_id ) {
	return array_filter(
		array(
			esc_html__( 'Client / Industry', 'langit' ) => get_post_meta( $post_id, 'langit_project_client', true ),
			esc_html__( 'Location', 'langit' )          => get_post_meta( $post_id, 'langit_project_location', true ),
			esc_html__( 'Completion Year', 'langit' )   => get_post_meta( $post_id, 'langit_project_year', true ),
			esc_html__( 'Service Type', 'langit' )      => get_post_meta( $post_id, 'langit_project_service_type', true ),
		)
	);
}

/**
 * Render a project card.
 *
 * @param int $post_id Project post ID.
 */
function langit_project_card( $post_id ) {
	$terms = get_the_terms( $post_id, 'project_category' );
	$meta  = ( ! is_wp_error( $terms ) && ! empty( $terms ) ) ? $terms[0]->name : esc_html__( 'Project', 'langit' );
	?>
	<article id="<?php echo esc_attr( get_post_field( 'post_name', $post_id ) ); ?>" <?php post_class( 'card post-card project-card', $post_id ); ?>>
		<a class="post-card__media" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" aria-label="<?php echo esc_attr( get_the_title( $post_id ) ); ?>">
			<?php if ( has_post_thumbnail( $post_id ) ) : ?>
				<?php echo get_the_post_thumbnail( $post_id, 'langit-card', array( 'loading' => 'lazy', 'decoding' => 'async' ) ); ?>
			<?php else : ?>
				<span></span>
			<?php endif; ?>
		</a>

		<header class="post-card__header">
			<div class="post-card__term"><?php echo esc_html( $meta ); ?></div>
			<h3 class="post-card__title">
				<a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>"><?php echo esc_html( get_the_title( $post_id ) ); ?></a>
			</h3>
		</header>

		<div class="entry-summary">
			<p><?php echo esc_html( langit_get_project_excerpt( $post_id ) ); ?></p>
		</div>

		<a class="read-more-link" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>"><?php esc_html_e( 'View Project', 'langit' ); ?></a>
	</article>
	<?php
}
