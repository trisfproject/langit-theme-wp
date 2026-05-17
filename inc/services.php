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
				'all_items'             => esc_html__( 'All Services', 'langit' ),
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
	$cta_url = get_post_meta( $post->ID, 'langit_service_cta_url', true );
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
		<article id="<?php echo esc_attr( sanitize_title( $service['title'] ) ); ?>" class="card product-card">
			<div class="product-card__visual" aria-hidden="true">
				<img src="<?php echo esc_url( $service['icon'] ); ?>" width="48" height="48" alt="" loading="lazy" decoding="async">
			</div>
			<div class="product-card__body">
				<h3><?php echo esc_html( $service['title'] ); ?></h3>
				<p><?php echo esc_html( $service['description'] ); ?></p>
			</div>
			<?php
			langit_button(
				array(
					'url'     => home_url( '/contact/' ),
					'label'   => esc_html__( 'Request Info', 'langit' ),
					'variant' => 'ghost',
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
	?>
	<article id="<?php echo esc_attr( get_post_field( 'post_name', $post_id ) ); ?>" <?php post_class( 'card product-card', $post_id ); ?>>
		<div class="product-card__visual" aria-hidden="true">
			<?php if ( has_post_thumbnail( $post_id ) ) : ?>
				<?php echo get_the_post_thumbnail( $post_id, 'thumbnail', array( 'loading' => 'lazy', 'decoding' => 'async' ) ); ?>
			<?php else : ?>
				<span></span>
			<?php endif; ?>
		</div>
		<div class="product-card__body">
			<p class="card__meta"><?php echo esc_html( $meta ); ?></p>
			<h3><?php echo esc_html( get_the_title( $post_id ) ); ?></h3>
			<p><?php echo esc_html( langit_get_service_excerpt( $post_id ) ); ?></p>
		</div>
		<?php
		langit_button(
			array(
				'url'     => langit_get_service_cta_url( $post_id ),
				'label'   => esc_html__( 'Request Info', 'langit' ),
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
		langit_card(
			array(
				'title'      => $service['title'],
				'text'       => $service['description'],
				'class'      => 'service-card',
				'icon_class' => 'service-card__icon',
				'icon_url'   => $service['icon'],
			)
		);
		return;
	}

	$post_id  = absint( $service );
	$icon_url = has_post_thumbnail( $post_id ) ? get_the_post_thumbnail_url( $post_id, 'thumbnail' ) : '';

	langit_card(
		array(
			'title'      => get_the_title( $post_id ),
			'text'       => langit_get_service_excerpt( $post_id ),
			'class'      => 'service-card',
			'icon_class' => 'service-card__icon',
			'icon_url'   => $icon_url,
		)
	);
}
