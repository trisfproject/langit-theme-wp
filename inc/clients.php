<?php
/**
 * Clients and partners custom post type.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Clients post type and category taxonomy.
 */
function langit_register_clients() {
	register_post_type(
		'client',
		array(
			'labels'       => array(
				'name'                  => esc_html__( 'Clients', 'langit' ),
				'singular_name'         => esc_html__( 'Client', 'langit' ),
				'add_new_item'          => esc_html__( 'Add New Client', 'langit' ),
				'edit_item'             => esc_html__( 'Edit Client', 'langit' ),
				'new_item'              => esc_html__( 'New Client', 'langit' ),
				'view_item'             => esc_html__( 'View Client', 'langit' ),
				'search_items'          => esc_html__( 'Search Clients', 'langit' ),
				'not_found'             => esc_html__( 'No clients found', 'langit' ),
				'all_items'             => esc_html__( 'Clients', 'langit' ),
				'menu_name'             => esc_html__( 'Clients', 'langit' ),
				'featured_image'        => esc_html__( 'Environment Image', 'langit' ),
				'set_featured_image'    => esc_html__( 'Set environment image', 'langit' ),
				'remove_featured_image' => esc_html__( 'Remove environment image', 'langit' ),
			),
			'public'       => true,
			'has_archive'  => 'clients',
			'menu_icon'    => 'dashicons-groups',
			'rewrite'      => array(
				'slug'       => 'clients',
				'with_front' => false,
			),
			'show_in_rest' => true,
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
		)
	);

	register_taxonomy(
		'client_category',
		'client',
		array(
			'labels'       => array(
				'name'          => esc_html__( 'Client Categories', 'langit' ),
				'singular_name' => esc_html__( 'Client Category', 'langit' ),
				'search_items'  => esc_html__( 'Search Client Categories', 'langit' ),
				'all_items'     => esc_html__( 'All Client Categories', 'langit' ),
				'edit_item'     => esc_html__( 'Edit Client Category', 'langit' ),
				'add_new_item'  => esc_html__( 'Add New Client Category', 'langit' ),
			),
			'hierarchical' => true,
			'public'       => true,
			'rewrite'      => array(
				'slug'       => 'client-category',
				'with_front' => false,
			),
			'show_in_rest' => true,
		)
	);

	$client_meta = array(
		'langit_client_website_url'         => 'esc_url_raw',
		'langit_client_related_project_ids' => 'langit_sanitize_id_list',
		'langit_client_partnership_status'  => 'sanitize_text_field',
	);

	foreach ( $client_meta as $meta_key => $sanitize_callback ) {
		register_post_meta(
			'client',
			$meta_key,
			array(
				'type'              => 'string',
				'single'            => true,
				'sanitize_callback' => $sanitize_callback,
				'show_in_rest'      => true,
				'auth_callback'     => function() {
					return current_user_can( 'edit_posts' );
				},
			)
		);
	}
}
add_action( 'init', 'langit_register_clients' );

/**
 * Flush rewrites after theme switch so client URLs work immediately.
 */
function langit_flush_client_rewrites() {
	langit_register_clients();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'langit_flush_client_rewrites' );

/**
 * Flush client rewrite rules once after route updates.
 */
function langit_maybe_flush_client_rewrites() {
	$rewrite_version = '2026-05-17-clients-route';

	if ( get_option( 'langit_client_rewrite_version' ) === $rewrite_version ) {
		return;
	}

	langit_register_clients();
	flush_rewrite_rules();
	update_option( 'langit_client_rewrite_version', $rewrite_version );
}
add_action( 'admin_init', 'langit_maybe_flush_client_rewrites' );

/**
 * Seed default client categories for editor convenience.
 */
function langit_seed_client_categories() {
	$seed_version = '2026-05-26-real-client-references';

	if ( get_option( 'langit_client_category_seed_version' ) === $seed_version ) {
		return;
	}

	$categories = array(
		'Kawasan Industri EJIP',
		'Kawasan Industri Hyundai dan Delta Silicon',
		'Kawasan Industri GIIC',
		'Kawasan Industri Jababeka',
		'Kawasan Industri MM2100',
		'Kawasan Industri KIIC',
		'Kawasan Mitra Karawang',
		'Kawasan Industri Surya Cipta',
		'Rumah Sakit, Perkantoran, Apartemen dan Hotel',
	);

	foreach ( $categories as $category ) {
		if ( ! term_exists( $category, 'client_category' ) ) {
			wp_insert_term( $category, 'client_category' );
		}
	}

	update_option( 'langit_client_category_seed_version', $seed_version );
}
add_action( 'admin_init', 'langit_seed_client_categories' );

/**
 * Return real client/customer references extracted from the company profile PDF.
 *
 * @return array<int,array<string,string>>
 */
function langit_client_reference_data() {
	return array(
		array( 'name' => 'PT. Tempo Scan Pasific Tbk.', 'category' => 'Kawasan Industri EJIP' ),
		array( 'name' => 'PT. Tempo Natural Product', 'category' => 'Kawasan Industri EJIP' ),
		array( 'name' => 'PT. Supra Ferbindo', 'category' => 'Kawasan Industri EJIP' ),
		array( 'name' => 'PT. Asno Horee Plant 1 & 2', 'category' => 'Kawasan Industri EJIP' ),
		array( 'name' => 'PT. Sakura Java Indonesia', 'category' => 'Kawasan Industri EJIP' ),
		array( 'name' => 'PT. Aisan Nasmoco Industry 1 & 2', 'category' => 'Kawasan Industri EJIP' ),
		array( 'name' => 'PT. SIK Indonesia 1 & 2', 'category' => 'Kawasan Industri EJIP' ),
		array( 'name' => 'PT. SMT Indonesia', 'category' => 'Kawasan Industri EJIP' ),
		array( 'name' => 'PT Otic Indonesia', 'category' => 'Kawasan Industri EJIP' ),
		array( 'name' => 'PT. Cabinindo Indonesia Plant EJIP', 'category' => 'Kawasan Industri EJIP' ),
		array( 'name' => 'PT. Hung A Indonesia', 'category' => 'Kawasan Industri Hyundai dan Delta Silicon' ),
		array( 'name' => 'PT. Artekindo Jaya Pratama', 'category' => 'Kawasan Industri Hyundai dan Delta Silicon' ),
		array( 'name' => 'PT. Nippo Mechantronik', 'category' => 'Kawasan Industri Hyundai dan Delta Silicon' ),
		array( 'name' => 'PT. Hankook Tire Indonesia', 'category' => 'Kawasan Industri Hyundai dan Delta Silicon' ),
		array( 'name' => 'PT. Samindo', 'category' => 'Kawasan Industri Hyundai dan Delta Silicon' ),
		array( 'name' => 'PT. Weldpart Indonesia', 'category' => 'Kawasan Industri Hyundai dan Delta Silicon' ),
		array( 'name' => 'PT. Che Il Indonesia', 'category' => 'Kawasan Industri Hyundai dan Delta Silicon' ),
		array( 'name' => 'PT. Nitto Indonesia', 'category' => 'Kawasan Industri Hyundai dan Delta Silicon' ),
		array( 'name' => 'PT. Ohkuma Indonesia Plant 1', 'category' => 'Kawasan Industri Hyundai dan Delta Silicon' ),
		array( 'name' => 'PT. Goko Spring Indonesia', 'category' => 'Kawasan Industri Hyundai dan Delta Silicon' ),
		array( 'name' => 'PT. Electra Mobilitas Indonesia', 'category' => 'Kawasan Industri Hyundai dan Delta Silicon' ),
		array( 'name' => 'PT. Unggul Semesta', 'category' => 'Kawasan Industri Hyundai dan Delta Silicon' ),
		array( 'name' => 'PT. MAXXIS Indonesia', 'category' => 'Kawasan Industri GIIC' ),
		array( 'name' => 'PT. NHK Spring Indonesia', 'category' => 'Kawasan Industri GIIC' ),
		array( 'name' => 'PT. Mitsubishi Motor Kramayudha Indonesia (MMKI)', 'category' => 'Kawasan Industri GIIC' ),
		array( 'name' => 'PT. Sankin Indonesia', 'category' => 'Kawasan Industri GIIC' ),
		array( 'name' => 'PT. Daiho Indonesia', 'category' => 'Kawasan Industri GIIC' ),
		array( 'name' => 'PT. Ohkuma Indonesia Plant 2', 'category' => 'Kawasan Industri GIIC' ),
		array( 'name' => 'PT. Vontera', 'category' => 'Kawasan Industri GIIC' ),
		array( 'name' => 'PT. Bumjin', 'category' => 'Kawasan Industri Jababeka' ),
		array( 'name' => 'PT. Samudra Ocean Indonesia', 'category' => 'Kawasan Industri Jababeka' ),
		array( 'name' => 'PT. Unilever Indonesia', 'category' => 'Kawasan Industri Jababeka' ),
		array( 'name' => 'PT. Anugrah Argon Medica', 'category' => 'Kawasan Industri Jababeka' ),
		array( 'name' => 'PT. Sari Roti', 'category' => 'Kawasan Industri Jababeka' ),
		array( 'name' => 'PT. Akzonobel Indonesia', 'category' => 'Kawasan Industri Jababeka' ),
		array( 'name' => 'PT. Astrazeneca Indonesia', 'category' => 'Kawasan Industri Jababeka' ),
		array( 'name' => 'PT. Nippon Steel Indonesia', 'category' => 'Kawasan Industri Jababeka' ),
		array( 'name' => 'PT. Metal Sinergi', 'category' => 'Kawasan Industri Jababeka' ),
		array( 'name' => 'PT. Fusoh Indonesia', 'category' => 'Kawasan Industri Jababeka' ),
		array( 'name' => 'Kantor Bea Cukai Kab. Bekasi', 'category' => 'Kawasan Industri Jababeka' ),
		array( 'name' => 'PT. Toyoseal Indonesia', 'category' => 'Kawasan Industri MM2100' ),
		array( 'name' => 'PT. PHC Indonesia', 'category' => 'Kawasan Industri MM2100' ),
		array( 'name' => 'PT. M Sonic Indonesia', 'category' => 'Kawasan Industri MM2100' ),
		array( 'name' => 'PT. Shenyang', 'category' => 'Kawasan Industri MM2100' ),
		array( 'name' => 'PT. Daido SP Indonesia', 'category' => 'Kawasan Industri MM2100' ),
		array( 'name' => 'PT. Chuhatsu Indonesia', 'category' => 'Kawasan Industri MM2100' ),
		array( 'name' => 'PT. Kawasaki motor Indonesia', 'category' => 'Kawasan Industri MM2100' ),
		array( 'name' => 'PT. Denso Manufacturing', 'category' => 'Kawasan Industri MM2100' ),
		array( 'name' => 'PT. Hitachi Construction', 'category' => 'Kawasan Industri MM2100' ),
		array( 'name' => 'PT. AHM Plant MM2100', 'category' => 'Kawasan Industri MM2100' ),
		array( 'name' => 'PT. MMC Metal', 'category' => 'Kawasan Industri MM2100' ),
		array( 'name' => 'PT. Miura Indonesia.', 'category' => 'Kawasan Industri KIIC' ),
		array( 'name' => 'PT. Tsuzuki Indonesia', 'category' => 'Kawasan Industri KIIC' ),
		array( 'name' => 'PT. Ajino Moto', 'category' => 'Kawasan Industri KIIC' ),
		array( 'name' => 'PT. FCC Indonesia', 'category' => 'Kawasan Industri KIIC' ),
		array( 'name' => 'PT. Saitama Stamping Indonesia', 'category' => 'Kawasan Industri KIIC' ),
		array( 'name' => 'PT. Kimberli (Softex)', 'category' => 'Kawasan Industri KIIC' ),
		array( 'name' => 'PT. Unicorn Indonesia', 'category' => 'Kawasan Industri KIIC' ),
		array( 'name' => 'PT. P&G (Rejoice)', 'category' => 'Kawasan Industri KIIC' ),
		array( 'name' => 'PT. Glico Indonesia', 'category' => 'Kawasan Industri KIIC' ),
		array( 'name' => 'PT. Fine Sinter Indonesia', 'category' => 'Kawasan Mitra Karawang' ),
		array( 'name' => 'PT. Tokai Rubber Indonesia', 'category' => 'Kawasan Mitra Karawang' ),
		array( 'name' => 'PT. Astra Juoku Indonesia', 'category' => 'Kawasan Mitra Karawang' ),
		array( 'name' => 'PT. EATI Indonesia', 'category' => 'Kawasan Mitra Karawang' ),
		array( 'name' => 'PT. Chuhatsu Indonesia', 'category' => 'Kawasan Industri Surya Cipta' ),
		array( 'name' => 'PT. Kiyokuni High Precision Indonesia', 'category' => 'Kawasan Industri Surya Cipta' ),
		array( 'name' => 'PT. Atsumitec Indonesia', 'category' => 'Kawasan Industri Surya Cipta' ),
		array( 'name' => 'PT. Dipsol Indonesia', 'category' => 'Kawasan Industri Surya Cipta' ),
		array( 'name' => 'PT. Daiho Indonesia', 'category' => 'Kawasan Industri Surya Cipta' ),
		array( 'name' => 'PT. Moriroku Technology Indonesia', 'category' => 'Kawasan Industri Surya Cipta' ),
		array( 'name' => 'PT. Uyemura Indonesia', 'category' => 'Kawasan Industri Surya Cipta' ),
		array( 'name' => 'Apartemen Metro Sunter', 'category' => 'Rumah Sakit, Perkantoran, Apartemen dan Hotel' ),
		array( 'name' => 'Hotel Novotel Mangga Dua Jakarta', 'category' => 'Rumah Sakit, Perkantoran, Apartemen dan Hotel' ),
		array( 'name' => 'Apartemen Meikarta', 'category' => 'Rumah Sakit, Perkantoran, Apartemen dan Hotel' ),
		array( 'name' => 'Rumah Sakit Izza Karawang', 'category' => 'Rumah Sakit, Perkantoran, Apartemen dan Hotel' ),
		array( 'name' => 'Rumah Sakit Hermina Bekasi', 'category' => 'Rumah Sakit, Perkantoran, Apartemen dan Hotel' ),
		array( 'name' => 'Pusat Laboratorium Forensik (PUSLABFOR POLRI) Sentul Bogor', 'category' => 'Rumah Sakit, Perkantoran, Apartemen dan Hotel' ),
		array( 'name' => 'Asrama Brimob Halim Perdana Kusuma Jakarta', 'category' => 'Rumah Sakit, Perkantoran, Apartemen dan Hotel' ),
	);
}

/**
 * Seed real customer references from the company profile PDF into the Clients CPT.
 */
function langit_seed_client_references() {
	$seed_version = '2026-05-26-compro-real-clients';

	if ( get_option( 'langit_client_reference_seed_version' ) === $seed_version ) {
		return;
	}

	foreach ( langit_client_reference_data() as $index => $client ) {
		$existing_posts = get_posts(
			array(
				'post_type'              => 'client',
				'title'                  => $client['name'],
				'post_status'            => 'any',
				'posts_per_page'         => 1,
				'fields'                 => 'ids',
				'no_found_rows'          => true,
				'update_post_meta_cache' => false,
				'update_post_term_cache' => false,
			)
		);

		if ( ! empty( $existing_posts ) ) {
			wp_set_object_terms( (int) $existing_posts[0], $client['category'], 'client_category', true );
			continue;
		}

		$post_id = wp_insert_post(
			array(
				'post_type'    => 'client',
				'post_status'  => 'publish',
				'post_title'   => $client['name'],
				'post_excerpt' => sprintf(
					/* translators: %s: client category. */
					esc_html__( 'Referensi pelanggan dari %s.', 'langit' ),
					$client['category']
				),
				'post_content' => sprintf(
					/* translators: %s: client category. */
					esc_html__( 'Nama pelanggan ini tercantum dalam dokumen company profile sebagai bagian dari pengalaman pekerjaan dan cakupan operasional pada %s.', 'langit' ),
					$client['category']
				),
				'menu_order'   => $index,
			)
		);

		if ( is_wp_error( $post_id ) || 0 === $post_id ) {
			continue;
		}

		wp_set_object_terms( $post_id, $client['category'], 'client_category' );
		update_post_meta( $post_id, 'langit_client_partnership_status', 'Operational Reference' );
	}

	update_option( 'langit_client_reference_seed_version', $seed_version );
}
add_action( 'admin_init', 'langit_seed_client_references' );

/**
 * Keep client archive ordering consistent with seeded customer references.
 *
 * @param WP_Query $query Current query.
 */
function langit_client_archive_query( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( ! $query->is_post_type_archive( 'client' ) && ! $query->is_tax( 'client_category' ) ) {
		return;
	}

	$query->set( 'posts_per_page', 24 );
	$query->set(
		'orderby',
		array(
			'menu_order' => 'ASC',
			'title'      => 'ASC',
		)
	);
}
add_action( 'pre_get_posts', 'langit_client_archive_query' );

/**
 * Return the public Clients archive URL.
 *
 * @return string
 */
function langit_get_clients_archive_url() {
	$archive_url = get_post_type_archive_link( 'client' );

	return $archive_url ? $archive_url : home_url( '/clients/' );
}

/**
 * Add client detail metabox.
 */
function langit_add_client_meta_boxes() {
	add_meta_box(
		'langit-client-details',
		esc_html__( 'Reference Details', 'langit' ),
		'langit_client_details_meta_box',
		'client',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes_client', 'langit_add_client_meta_boxes' );

/**
 * Render client details metabox.
 *
 * @param WP_Post $post Current post.
 */
function langit_client_details_meta_box( $post ) {
	$website_url = get_post_meta( $post->ID, 'langit_client_website_url', true );
	$status      = get_post_meta( $post->ID, 'langit_client_partnership_status', true );
	$project_ids = get_post_meta( $post->ID, 'langit_client_related_project_ids', true );
	$statuses    = array(
		''                       => esc_html__( 'Select status', 'langit' ),
		'Supported Sector'       => esc_html__( 'Supported Sector', 'langit' ),
		'Deployment Environment' => esc_html__( 'Deployment Environment', 'langit' ),
		'Operational Coverage'   => esc_html__( 'Operational Coverage', 'langit' ),
		'Project Experience'     => esc_html__( 'Project Experience', 'langit' ),
		'Operational Reference'  => esc_html__( 'Operational Reference', 'langit' ),
	);

	wp_nonce_field( 'langit_save_client_details', 'langit_client_details_nonce' );
	?>
	<p>
		<label for="langit_client_website_url"><?php esc_html_e( 'Reference URL', 'langit' ); ?></label>
		<input type="url" id="langit_client_website_url" name="langit_client_website_url" value="<?php echo esc_attr( $website_url ); ?>" class="widefat">
	</p>
	<p>
		<label for="langit_client_partnership_status"><?php esc_html_e( 'Coverage Status', 'langit' ); ?></label>
		<select id="langit_client_partnership_status" name="langit_client_partnership_status" class="widefat">
			<?php foreach ( $statuses as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $status ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
		</select>
	</p>
	<p>
		<label for="langit_client_related_project_ids"><?php esc_html_e( 'Related Project IDs', 'langit' ); ?></label>
		<input type="text" id="langit_client_related_project_ids" name="langit_client_related_project_ids" value="<?php echo esc_attr( $project_ids ); ?>" class="widefat" placeholder="<?php esc_attr_e( 'Example: 12, 18, 24', 'langit' ); ?>">
	</p>
	<?php
}

/**
 * Save client details metabox.
 *
 * @param int $post_id Current post ID.
 */
function langit_save_client_details( $post_id ) {
	if ( ! isset( $_POST['langit_client_details_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['langit_client_details_nonce'] ) ), 'langit_save_client_details' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array(
		'langit_client_website_url',
		'langit_client_related_project_ids',
		'langit_client_partnership_status',
	);

	foreach ( $fields as $field ) {
		if ( ! isset( $_POST[ $field ] ) ) {
			continue;
		}

		$raw_value = wp_unslash( $_POST[ $field ] );
		if ( 'langit_client_website_url' === $field ) {
			$value = esc_url_raw( $raw_value );
		} elseif ( 'langit_client_related_project_ids' === $field ) {
			$value = langit_sanitize_id_list( $raw_value );
		} else {
			$value = sanitize_text_field( $raw_value );
		}

		if ( '' === $value ) {
			delete_post_meta( $post_id, $field );
		} else {
			update_post_meta( $post_id, $field, $value );
		}
	}
}
add_action( 'save_post_client', 'langit_save_client_details' );

/**
 * Use a clearer title placeholder for client names.
 *
 * @param string  $title Placeholder text.
 * @param WP_Post $post  Current post.
 * @return string
 */
function langit_client_title_placeholder( $title, $post ) {
	if ( 'client' !== $post->post_type ) {
		return $title;
	}

	return esc_html__( 'Client or Facility Name', 'langit' );
}
add_filter( 'enter_title_here', 'langit_client_title_placeholder', 10, 2 );

/**
 * Return a fallback image URL for a client reference category.
 *
 * @param string $category Client category.
 * @return string
 */
function langit_get_client_category_image_url( $category ) {
	$slug   = sanitize_title( $category );
	$images = array(
		'kawasan-industri-ejip'                            => 'industries/industry-industrial.webp',
		'kawasan-industri-hyundai-dan-delta-silicon'       => 'projects/mechanical-electrical-panel.webp',
		'kawasan-industri-giic'                            => 'projects/network-infrastructure-deployment.webp',
		'kawasan-industri-jababeka'                        => 'industries/industry-industrial.webp',
		'kawasan-industri-mm2100'                          => 'projects/fire-alarm-integration.webp',
		'kawasan-industri-kiic'                            => 'projects/mechanical-electrical-panel.webp',
		'kawasan-mitra-karawang'                           => 'projects/network-infrastructure-deployment.webp',
		'kawasan-industri-surya-cipta'                     => 'industries/industry-industrial.webp',
		'rumah-sakit-perkantoran-apartemen-dan-hotel'      => 'industries/industry-commercial-building.webp',
		'industrial-facility'                              => 'industries/industry-industrial.webp',
		'commercial-building'                              => 'industries/industry-commercial-building.webp',
		'government-facility'                              => 'industries/industry-government.webp',
		'education-facility'                               => 'projects/audio-public-address-installation.webp',
		'warehouse-logistics'                              => 'projects/network-infrastructure-deployment.webp',
		'operational-infrastructure'                       => 'projects/mechanical-electrical-panel.webp',
	);

	$image = isset( $images[ $slug ] ) ? $images[ $slug ] : 'industries/industry-industrial.webp';

	return get_template_directory_uri() . '/assets/images/' . $image;
}

/**
 * Return real client reference data for the Clients archive fallback.
 *
 * @return array<int,array<string,string>>
 */
function langit_default_client_references() {
	$references = array();

	foreach ( langit_client_reference_data() as $client ) {
		$references[] = array(
			'title'       => $client['name'],
			'category'    => $client['category'],
			'description' => sprintf(
				/* translators: %s: client category. */
				esc_html__( 'Referensi pelanggan dari %s.', 'langit' ),
				$client['category']
			),
			'image'       => langit_get_client_category_image_url( $client['category'] ),
		);
	}

	return $references;
}

/**
 * Backward-compatible fallback for earlier sector archive calls.
 *
 * @return array<int,array<string,string>>
 */
function langit_default_client_sectors() {
	return langit_default_client_references();
}

/**
 * Return enterprise descriptions for each client ecosystem.
 *
 * @return array<string,string>
 */
function langit_client_ecosystem_descriptions() {
	return array(
		'Kawasan Industri EJIP'                       => esc_html__( 'Dukungan implementasi sistem keamanan, jaringan, dan infrastruktur operasional untuk berbagai fasilitas industri di kawasan EJIP.', 'langit' ),
		'Kawasan Industri Hyundai dan Delta Silicon'  => esc_html__( 'Cakupan pengalaman pada lingkungan manufaktur dan fasilitas produksi dengan kebutuhan sistem yang stabil, terpantau, dan siap operasional.', 'langit' ),
		'Kawasan Industri GIIC'                       => esc_html__( 'Pengalaman penerapan infrastruktur teknologi untuk fasilitas industri berskala besar dengan kebutuhan monitoring dan dukungan teknis berkelanjutan.', 'langit' ),
		'Kawasan Industri Jababeka'                   => esc_html__( 'Referensi pekerjaan pada area industri, kantor, dan fasilitas pendukung dengan kebutuhan keamanan, jaringan, dan elektrikal yang terstruktur.', 'langit' ),
		'Kawasan Industri MM2100'                     => esc_html__( 'Cakupan pelanggan pada ekosistem manufaktur dan operasional pabrik yang membutuhkan keandalan instalasi serta pemeliharaan sistem.', 'langit' ),
		'Kawasan Industri KIIC'                       => esc_html__( 'Pengalaman mendukung fasilitas produksi dan area industri dengan kebutuhan integrasi sistem, pemantauan, dan dukungan operasional.', 'langit' ),
		'Kawasan Mitra Karawang'                      => esc_html__( 'Referensi pelanggan pada lingkungan industri Karawang dengan kebutuhan infrastruktur teknologi yang rapi dan mudah dirawat.', 'langit' ),
		'Kawasan Industri Surya Cipta'                => esc_html__( 'Cakupan pekerjaan pada fasilitas industri dengan kebutuhan keamanan, jaringan operasional, elektrikal, dan support lapangan.', 'langit' ),
		'Rumah Sakit, Perkantoran, Apartemen dan Hotel' => esc_html__( 'Pengalaman pada fasilitas publik, gedung komersial, hunian vertikal, dan hospitality dengan kebutuhan sistem gedung yang aman dan terkoordinasi.', 'langit' ),
	);
}

/**
 * Return client ecosystem groups from CPT content, with PDF data as a safe fallback.
 *
 * @param string $category Optional category name.
 * @return array<int,array<string,mixed>>
 */
function langit_get_client_ecosystems( $category = '' ) {
	$descriptions = langit_client_ecosystem_descriptions();
	$groups       = array();
	$query_args   = array(
		'post_type'              => 'client',
		'post_status'            => 'publish',
		'posts_per_page'         => -1,
		'orderby'                => array(
			'menu_order' => 'ASC',
			'title'      => 'ASC',
		),
		'no_found_rows'          => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => true,
	);

	if ( '' !== $category ) {
		$query_args['tax_query'] = array(
			array(
				'taxonomy' => 'client_category',
				'field'    => 'name',
				'terms'    => $category,
			),
		);
	}

	$client_query = new WP_Query( $query_args );

	if ( $client_query->have_posts() ) {
		while ( $client_query->have_posts() ) {
			$client_query->the_post();
			$terms      = get_the_terms( get_the_ID(), 'client_category' );
			$group_name = ( ! is_wp_error( $terms ) && ! empty( $terms ) ) ? $terms[0]->name : esc_html__( 'Operational References', 'langit' );

			if ( '' !== $category && $group_name !== $category ) {
				continue;
			}

			if ( ! isset( $groups[ $group_name ] ) ) {
				$groups[ $group_name ] = array(
					'title'       => $group_name,
					'description' => isset( $descriptions[ $group_name ] ) ? $descriptions[ $group_name ] : esc_html__( 'Referensi pelanggan pada lingkungan operasional dengan kebutuhan sistem keamanan, jaringan, elektrikal, audio, instalasi, dan maintenance.', 'langit' ),
					'image'       => langit_get_client_category_image_url( $group_name ),
					'clients'     => array(),
				);
			}

			$groups[ $group_name ]['clients'][] = array(
				'name' => get_the_title(),
				'url'  => get_permalink(),
			);
		}
		wp_reset_postdata();
	}

	if ( empty( $groups ) ) {
		foreach ( langit_client_reference_data() as $client ) {
			if ( '' !== $category && $client['category'] !== $category ) {
				continue;
			}

			if ( ! isset( $groups[ $client['category'] ] ) ) {
				$groups[ $client['category'] ] = array(
					'title'       => $client['category'],
					'description' => isset( $descriptions[ $client['category'] ] ) ? $descriptions[ $client['category'] ] : esc_html__( 'Referensi pelanggan pada lingkungan operasional dengan kebutuhan sistem keamanan, jaringan, elektrikal, audio, instalasi, dan maintenance.', 'langit' ),
					'image'       => langit_get_client_category_image_url( $client['category'] ),
					'clients'     => array(),
				);
			}

			$groups[ $client['category'] ]['clients'][] = array(
				'name' => $client['name'],
				'url'  => '',
			);
		}
	}

	return array_values( $groups );
}

/**
 * Render a grouped industrial ecosystem panel.
 *
 * @param array<string,mixed> $ecosystem Ecosystem data.
 */
function langit_client_ecosystem_section( $ecosystem ) {
	$clients = isset( $ecosystem['clients'] ) && is_array( $ecosystem['clients'] ) ? $ecosystem['clients'] : array();
	?>
	<article class="client-ecosystem-card" style="--client-image: url('<?php echo esc_url( $ecosystem['image'] ); ?>');">
		<div class="client-ecosystem-card__visual" aria-hidden="true">
			<span><?php esc_html_e( 'Industrial Ecosystem', 'langit' ); ?></span>
		</div>

		<div class="client-ecosystem-card__content stack">
			<div class="client-ecosystem-card__header">
				<p class="section-eyebrow"><?php esc_html_e( 'Deployment Zone', 'langit' ); ?></p>
				<h2><?php echo esc_html( $ecosystem['title'] ); ?></h2>
				<p><?php echo esc_html( $ecosystem['description'] ); ?></p>
			</div>

			<div class="client-ecosystem-card__meta">
				<span><?php echo esc_html( count( $clients ) ); ?></span>
				<?php esc_html_e( 'documented references', 'langit' ); ?>
			</div>

			<div class="client-chip-grid" aria-label="<?php echo esc_attr( sprintf( /* translators: %s: ecosystem title. */ __( 'Client references in %s', 'langit' ), $ecosystem['title'] ) ); ?>">
				<?php foreach ( $clients as $client ) : ?>
					<?php if ( ! empty( $client['url'] ) ) : ?>
						<a class="client-chip" href="<?php echo esc_url( $client['url'] ); ?>"><?php echo esc_html( $client['name'] ); ?></a>
					<?php else : ?>
						<span class="client-chip"><?php echo esc_html( $client['name'] ); ?></span>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</article>
	<?php
}

/**
 * Return a client excerpt.
 *
 * @param int $post_id Client post ID.
 * @return string
 */
function langit_get_client_excerpt( $post_id ) {
	$excerpt = get_the_excerpt( $post_id );

	if ( ! empty( $excerpt ) ) {
		return $excerpt;
	}

	return wp_trim_words( wp_strip_all_tags( get_post_field( 'post_content', $post_id ) ), 26 );
}

/**
 * Return client metadata for display.
 *
 * @param int $post_id Client post ID.
 * @return array<string,string>
 */
function langit_get_client_details( $post_id ) {
	$terms    = get_the_terms( $post_id, 'client_category' );
	$industry = ( ! is_wp_error( $terms ) && ! empty( $terms ) ) ? $terms[0]->name : '';

	return array_filter(
		array(
			esc_html__( 'Operational Category', 'langit' ) => $industry,
			esc_html__( 'Reference Status', 'langit' )     => get_post_meta( $post_id, 'langit_client_partnership_status', true ),
		)
	);
}

/**
 * Return a visual image URL for a client/sector card.
 *
 * @param int $post_id Client post ID.
 * @return string
 */
function langit_get_client_sector_image_url( $post_id ) {
	if ( has_post_thumbnail( $post_id ) ) {
		return get_the_post_thumbnail_url( $post_id, 'langit-card' );
	}

	$terms = get_the_terms( $post_id, 'client_category' );
	$term  = ( ! is_wp_error( $terms ) && ! empty( $terms ) ) ? $terms[0]->name : get_the_title( $post_id );

	return langit_get_client_category_image_url( $term );
}

/**
 * Render a real client reference card.
 *
 * @param array<string,string> $client Client reference data.
 */
function langit_client_reference_card( $client ) {
	?>
	<article class="client-card client-card--reference" style="--client-image: url('<?php echo esc_url( $client['image'] ); ?>');">
		<div class="client-card__body">
			<p class="post-card__term"><?php echo esc_html( $client['category'] ); ?></p>
			<h3><?php echo esc_html( $client['title'] ); ?></h3>
			<?php if ( ! empty( $client['description'] ) ) : ?>
				<p><?php echo esc_html( $client['description'] ); ?></p>
			<?php endif; ?>
		</div>
	</article>
	<?php
}

/**
 * Backward-compatible renderer for earlier sector archive calls.
 *
 * @param array<string,string> $sector Sector data.
 */
function langit_client_sector_card( $sector ) {
	langit_client_reference_card( $sector );
}

/**
 * Render an image-led operational sector card.
 *
 * @param array<string,string> $sector Sector data.
 */
function langit_client_visual_card( $sector ) {
	?>
	<article class="client-card client-card--sector">
		<div class="client-card__visual" style="--client-image: url('<?php echo esc_url( $sector['image'] ); ?>');">
			<div class="client-card__body">
				<p class="post-card__term"><?php echo esc_html( $sector['category'] ); ?></p>
				<h3><?php echo esc_html( $sector['title'] ); ?></h3>
				<p><?php echo esc_html( $sector['description'] ); ?></p>
			</div>
		</div>
	</article>
	<?php
}

/**
 * Render a client archive card.
 *
 * @param int $post_id Client post ID.
 */
function langit_client_card( $post_id ) {
	$terms   = get_the_terms( $post_id, 'client_category' );
	$term    = ( ! is_wp_error( $terms ) && ! empty( $terms ) ) ? $terms[0]->name : esc_html__( 'Deployment Environment', 'langit' );
	$image   = langit_get_client_sector_image_url( $post_id );
	$excerpt = langit_get_client_excerpt( $post_id );
	?>
	<article <?php post_class( 'client-card client-card--reference', $post_id ); ?> style="--client-image: url('<?php echo esc_url( $image ); ?>');">
		<a class="client-card__body" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" aria-label="<?php echo esc_attr( get_the_title( $post_id ) ); ?>">
			<p class="post-card__term"><?php echo esc_html( $term ); ?></p>
			<h3><?php echo esc_html( get_the_title( $post_id ) ); ?></h3>
			<?php if ( '' !== $excerpt ) : ?>
				<p><?php echo esc_html( $excerpt ); ?></p>
			<?php endif; ?>
		</a>
	</article>
	<?php
}

/**
 * Render a compact logo item for homepage client showcases.
 *
 * @param int $post_id Client post ID.
 */
function langit_client_logo_item( $post_id ) {
	$image = langit_get_client_sector_image_url( $post_id );
	?>
	<a class="client-logo-item client-logo-item--link client-logo-item--sector" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" aria-label="<?php echo esc_attr( get_the_title( $post_id ) ); ?>" style="--client-image: url('<?php echo esc_url( $image ); ?>');">
		<span><?php echo esc_html( get_the_title( $post_id ) ); ?></span>
	</a>
	<?php
}
