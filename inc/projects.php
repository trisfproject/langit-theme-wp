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
