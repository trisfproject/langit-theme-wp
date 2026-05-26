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
	$seed_version = '2026-05-26-sector-coverage';

	if ( get_option( 'langit_client_category_seed_version' ) === $seed_version ) {
		return;
	}

	$categories = array(
		'Industrial Facility',
		'Commercial Building',
		'Government Facility',
		'Education Facility',
		'Warehouse & Logistics',
		'Operational Infrastructure',
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
		esc_html__( 'Sector Details', 'langit' ),
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
		''                  => esc_html__( 'Select status', 'langit' ),
		'Supported Sector'       => esc_html__( 'Supported Sector', 'langit' ),
		'Deployment Environment' => esc_html__( 'Deployment Environment', 'langit' ),
		'Operational Coverage'   => esc_html__( 'Operational Coverage', 'langit' ),
		'Project Experience'     => esc_html__( 'Project Experience', 'langit' ),
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

	return esc_html__( 'Sector or Deployment Environment', 'langit' );
}
add_filter( 'enter_title_here', 'langit_client_title_placeholder', 10, 2 );

/**
 * Return default operational sector data for the Clients archive fallback.
 *
 * @return array<int,array<string,string>>
 */
function langit_default_client_sectors() {
	return array(
		array(
			'title'       => esc_html__( 'Industrial Facility', 'langit' ),
			'category'    => esc_html__( 'Industrial Facility', 'langit' ),
			'description' => esc_html__( 'Implementasi sistem keamanan, jaringan, dan dukungan operasional untuk area industri dan fasilitas produksi.', 'langit' ),
			'image'       => get_template_directory_uri() . '/assets/images/industries/industry-industrial.webp',
		),
		array(
			'title'       => esc_html__( 'Commercial Building', 'langit' ),
			'category'    => esc_html__( 'Commercial Building', 'langit' ),
			'description' => esc_html__( 'Infrastruktur teknologi gedung untuk area kantor, tenant, retail, hotel, dan fasilitas komersial.', 'langit' ),
			'image'       => get_template_directory_uri() . '/assets/images/industries/industry-commercial-building.webp',
		),
		array(
			'title'       => esc_html__( 'Government Facility', 'langit' ),
			'category'    => esc_html__( 'Government Facility', 'langit' ),
			'description' => esc_html__( 'Sistem keamanan, monitoring, jaringan, dan kontrol akses untuk fasilitas pemerintahan dan layanan publik.', 'langit' ),
			'image'       => get_template_directory_uri() . '/assets/images/industries/industry-government.webp',
		),
		array(
			'title'       => esc_html__( 'Education Facility', 'langit' ),
			'category'    => esc_html__( 'Education Facility', 'langit' ),
			'description' => esc_html__( 'Jaringan, CCTV, audio, dan sistem pendukung gedung untuk sekolah, kampus, dan fasilitas pembelajaran.', 'langit' ),
			'image'       => get_template_directory_uri() . '/assets/images/projects/audio-public-address-installation.webp',
		),
		array(
			'title'       => esc_html__( 'Warehouse & Logistics', 'langit' ),
			'category'    => esc_html__( 'Warehouse & Logistics', 'langit' ),
			'description' => esc_html__( 'Sistem pemantauan, jaringan operasional, alarm, dan kontrol akses untuk area gudang dan distribusi.', 'langit' ),
			'image'       => get_template_directory_uri() . '/assets/images/projects/network-infrastructure-deployment.webp',
		),
		array(
			'title'       => esc_html__( 'Operational Infrastructure', 'langit' ),
			'category'    => esc_html__( 'Operational Infrastructure', 'langit' ),
			'description' => esc_html__( 'Dukungan elektrikal, keamanan, jaringan, dan maintenance untuk fasilitas dengan aktivitas operasional aktif.', 'langit' ),
			'image'       => get_template_directory_uri() . '/assets/images/projects/mechanical-electrical-panel.webp',
		),
	);
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
			esc_html__( 'Sector Type', 'langit' )     => $industry,
			esc_html__( 'Coverage Status', 'langit' ) => get_post_meta( $post_id, 'langit_client_partnership_status', true ),
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
	$term  = ( ! is_wp_error( $terms ) && ! empty( $terms ) ) ? sanitize_title( $terms[0]->name ) : sanitize_title( get_the_title( $post_id ) );

	$images = array(
		'industrial-facility'        => 'industries/industry-industrial.webp',
		'industrial'                 => 'industries/industry-industrial.webp',
		'commercial-building'        => 'industries/industry-commercial-building.webp',
		'commercial'                 => 'industries/industry-commercial-building.webp',
		'government-facility'        => 'industries/industry-government.webp',
		'government'                 => 'industries/industry-government.webp',
		'education-facility'         => 'projects/audio-public-address-installation.webp',
		'education'                  => 'projects/audio-public-address-installation.webp',
		'warehouse-logistics'        => 'projects/network-infrastructure-deployment.webp',
		'warehouse-and-logistics'    => 'projects/network-infrastructure-deployment.webp',
		'operational-infrastructure' => 'projects/mechanical-electrical-panel.webp',
	);

	$image = isset( $images[ $term ] ) ? $images[ $term ] : 'industries/industry-industrial.webp';

	return get_template_directory_uri() . '/assets/images/' . $image;
}

/**
 * Render an operational sector card.
 *
 * @param array<string,string> $sector Sector data.
 */
function langit_client_sector_card( $sector ) {
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
	<article <?php post_class( 'client-card client-card--sector', $post_id ); ?>>
		<a class="client-card__visual" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" aria-label="<?php echo esc_attr( get_the_title( $post_id ) ); ?>" style="--client-image: url('<?php echo esc_url( $image ); ?>');">
			<div class="client-card__body">
				<p class="post-card__term"><?php echo esc_html( $term ); ?></p>
				<h3><?php echo esc_html( get_the_title( $post_id ) ); ?></h3>
				<?php if ( '' !== $excerpt ) : ?>
					<p><?php echo esc_html( $excerpt ); ?></p>
				<?php endif; ?>
			</div>
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
