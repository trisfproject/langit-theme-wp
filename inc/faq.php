<?php
/**
 * FAQ custom post type and helpers.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register FAQ post type and taxonomy.
 */
function langit_register_faq() {
	register_post_type(
		'faq',
		array(
			'labels'       => array(
				'name'               => esc_html__( 'FAQ', 'langit' ),
				'singular_name'      => esc_html__( 'FAQ', 'langit' ),
				'add_new_item'       => esc_html__( 'Add New FAQ', 'langit' ),
				'edit_item'          => esc_html__( 'Edit FAQ', 'langit' ),
				'new_item'           => esc_html__( 'New FAQ', 'langit' ),
				'view_item'          => esc_html__( 'View FAQ', 'langit' ),
				'search_items'       => esc_html__( 'Search FAQ', 'langit' ),
				'not_found'          => esc_html__( 'No FAQ found', 'langit' ),
				'all_items'          => esc_html__( 'FAQ', 'langit' ),
				'menu_name'          => esc_html__( 'FAQ', 'langit' ),
				'featured_image'     => esc_html__( 'FAQ Image', 'langit' ),
				'set_featured_image' => esc_html__( 'Set FAQ image', 'langit' ),
			),
			'public'       => true,
			'has_archive'  => 'faq',
			'menu_icon'    => 'dashicons-editor-help',
			'rewrite'      => array(
				'slug'       => 'faq',
				'with_front' => false,
			),
			'show_in_rest' => true,
			'supports'     => array( 'title', 'editor', 'excerpt', 'page-attributes' ),
		)
	);

	register_taxonomy(
		'faq_category',
		'faq',
		array(
			'labels'       => array(
				'name'          => esc_html__( 'FAQ Categories', 'langit' ),
				'singular_name' => esc_html__( 'FAQ Category', 'langit' ),
				'search_items'  => esc_html__( 'Search FAQ Categories', 'langit' ),
				'all_items'     => esc_html__( 'FAQ Categories', 'langit' ),
				'edit_item'     => esc_html__( 'Edit FAQ Category', 'langit' ),
				'add_new_item'  => esc_html__( 'Add New FAQ Category', 'langit' ),
			),
			'hierarchical' => true,
			'public'       => true,
			'rewrite'      => array(
				'slug'       => 'faq-category',
				'with_front' => false,
			),
			'show_in_rest' => true,
		)
	);

	register_post_meta(
		'faq',
		'langit_faq_related_service',
		array(
			'type'              => 'integer',
			'single'            => true,
			'sanitize_callback' => 'absint',
			'show_in_rest'      => true,
			'auth_callback'     => function() {
				return current_user_can( 'edit_posts' );
			},
		)
	);
}
add_action( 'init', 'langit_register_faq' );

/**
 * Flush rewrites after theme switch so FAQ URLs work immediately.
 */
function langit_flush_faq_rewrites() {
	langit_register_faq();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'langit_flush_faq_rewrites' );

/**
 * Flush FAQ rewrite rules once after route registration.
 */
function langit_maybe_flush_faq_rewrites() {
	$rewrite_version = '2026-05-17-faq-route';

	if ( get_option( 'langit_faq_rewrite_version' ) === $rewrite_version ) {
		return;
	}

	langit_register_faq();
	flush_rewrite_rules();
	update_option( 'langit_faq_rewrite_version', $rewrite_version );
}
add_action( 'admin_init', 'langit_maybe_flush_faq_rewrites' );

/**
 * Seed default FAQ categories for common service areas.
 */
function langit_seed_faq_categories() {
	$seed_version = '2026-05-17';

	if ( get_option( 'langit_faq_category_seed_version' ) === $seed_version ) {
		return;
	}

	$categories = array(
		'CCTV',
		'Networking',
		'Mechanical Electrical',
		'Fire Alarm',
		'Audio System',
		'Maintenance',
		'Consultation',
	);

	foreach ( $categories as $category ) {
		if ( ! term_exists( $category, 'faq_category' ) ) {
			wp_insert_term( $category, 'faq_category' );
		}
	}

	update_option( 'langit_faq_category_seed_version', $seed_version );
}
add_action( 'admin_init', 'langit_seed_faq_categories' );

/**
 * Return the public FAQ archive URL.
 *
 * @return string
 */
function langit_get_faq_archive_url() {
	$archive_url = get_post_type_archive_link( 'faq' );

	return $archive_url ? $archive_url : home_url( '/faq/' );
}

/**
 * Add FAQ details metabox.
 */
function langit_add_faq_meta_boxes() {
	add_meta_box(
		'langit-faq-details',
		esc_html__( 'FAQ Details', 'langit' ),
		'langit_faq_details_meta_box',
		'faq',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes_faq', 'langit_add_faq_meta_boxes' );

/**
 * Render FAQ details metabox.
 *
 * @param WP_Post $post Current post.
 */
function langit_faq_details_meta_box( $post ) {
	$related_service = absint( get_post_meta( $post->ID, 'langit_faq_related_service', true ) );
	$services        = get_posts(
		array(
			'post_type'      => 'service',
			'post_status'    => 'publish',
			'posts_per_page' => 50,
			'orderby'        => array(
				'menu_order' => 'ASC',
				'title'      => 'ASC',
			),
		)
	);

	wp_nonce_field( 'langit_save_faq_details', 'langit_faq_details_nonce' );
	?>
	<p>
		<label for="langit_faq_related_service"><?php esc_html_e( 'Related Service', 'langit' ); ?></label>
		<select id="langit_faq_related_service" name="langit_faq_related_service" class="widefat">
			<option value="0"><?php esc_html_e( 'No related service', 'langit' ); ?></option>
			<?php foreach ( $services as $service ) : ?>
				<option value="<?php echo esc_attr( (string) $service->ID ); ?>" <?php selected( $related_service, $service->ID ); ?>>
					<?php echo esc_html( get_the_title( $service ) ); ?>
				</option>
			<?php endforeach; ?>
		</select>
	</p>
	<p class="description"><?php esc_html_e( 'Optional. Connect this FAQ to a service detail page.', 'langit' ); ?></p>
	<?php
}

/**
 * Save FAQ details.
 *
 * @param int $post_id Current post ID.
 */
function langit_save_faq_details( $post_id ) {
	if ( ! isset( $_POST['langit_faq_details_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['langit_faq_details_nonce'] ) ), 'langit_save_faq_details' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$related_service = isset( $_POST['langit_faq_related_service'] ) ? absint( wp_unslash( $_POST['langit_faq_related_service'] ) ) : 0;

	if ( $related_service ) {
		update_post_meta( $post_id, 'langit_faq_related_service', $related_service );
	} else {
		delete_post_meta( $post_id, 'langit_faq_related_service' );
	}
}
add_action( 'save_post_faq', 'langit_save_faq_details' );

/**
 * Use a clearer title placeholder for FAQ questions.
 *
 * @param string  $title Placeholder text.
 * @param WP_Post $post  Current post.
 * @return string
 */
function langit_faq_title_placeholder( $title, $post ) {
	if ( 'faq' !== $post->post_type ) {
		return $title;
	}

	return esc_html__( 'FAQ Question', 'langit' );
}
add_filter( 'enter_title_here', 'langit_faq_title_placeholder', 10, 2 );

/**
 * Render an FAQ accordion item.
 *
 * @param int  $post_id FAQ post ID.
 * @param bool $open    Whether the item is open by default.
 */
function langit_faq_item( $post_id, $open = false ) {
	$terms           = get_the_terms( $post_id, 'faq_category' );
	$category        = ( ! is_wp_error( $terms ) && ! empty( $terms ) ) ? $terms[0]->name : esc_html__( 'FAQ', 'langit' );
	$related_service = absint( get_post_meta( $post_id, 'langit_faq_related_service', true ) );
	?>
	<details id="<?php echo esc_attr( get_post_field( 'post_name', $post_id ) ); ?>" class="faq-item card" <?php echo $open ? 'open' : ''; ?>>
		<summary>
			<span class="card__meta"><?php echo esc_html( $category ); ?></span>
			<strong><?php echo esc_html( get_the_title( $post_id ) ); ?></strong>
		</summary>
		<div class="faq-item__content">
			<?php echo wp_kses_post( apply_filters( 'the_content', get_post_field( 'post_content', $post_id ) ) ); ?>
			<?php if ( $related_service && 'publish' === get_post_status( $related_service ) ) : ?>
				<a class="read-more-link" href="<?php echo esc_url( get_permalink( $related_service ) ); ?>"><?php esc_html_e( 'View Related Service', 'langit' ); ?></a>
			<?php endif; ?>
		</div>
	</details>
	<?php
}
