<?php
/**
 * Certifications custom post type and helpers.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Certifications post type and taxonomy.
 */
function langit_register_certifications() {
	register_post_type(
		'certification',
		array(
			'labels'       => array(
				'name'               => esc_html__( 'Certifications', 'langit' ),
				'singular_name'      => esc_html__( 'Certification', 'langit' ),
				'add_new_item'       => esc_html__( 'Add New Certification', 'langit' ),
				'edit_item'          => esc_html__( 'Edit Certification', 'langit' ),
				'new_item'           => esc_html__( 'New Certification', 'langit' ),
				'view_item'          => esc_html__( 'View Certification', 'langit' ),
				'search_items'       => esc_html__( 'Search Certifications', 'langit' ),
				'not_found'          => esc_html__( 'No certifications found', 'langit' ),
				'all_items'          => esc_html__( 'Certifications', 'langit' ),
				'menu_name'          => esc_html__( 'Certifications', 'langit' ),
				'featured_image'     => esc_html__( 'Certificate Image', 'langit' ),
				'set_featured_image' => esc_html__( 'Set certificate image', 'langit' ),
			),
			'public'       => true,
			'has_archive'  => 'certifications',
			'menu_icon'    => 'dashicons-awards',
			'rewrite'      => array(
				'slug'       => 'certifications',
				'with_front' => false,
			),
			'show_in_rest' => true,
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
		)
	);

	register_taxonomy(
		'certification_category',
		'certification',
		array(
			'labels'       => array(
				'name'          => esc_html__( 'Certification Categories', 'langit' ),
				'singular_name' => esc_html__( 'Certification Category', 'langit' ),
				'search_items'  => esc_html__( 'Search Certification Categories', 'langit' ),
				'all_items'     => esc_html__( 'Certification Categories', 'langit' ),
				'edit_item'     => esc_html__( 'Edit Certification Category', 'langit' ),
				'add_new_item'  => esc_html__( 'Add New Certification Category', 'langit' ),
			),
			'hierarchical' => true,
			'public'       => true,
			'rewrite'      => array(
				'slug'       => 'certification-category',
				'with_front' => false,
			),
			'show_in_rest' => true,
		)
	);

	$meta_fields = array(
		'langit_certification_issuer'      => 'string',
		'langit_certification_number'      => 'string',
		'langit_certification_valid_until' => 'string',
		'langit_certification_file_id'     => 'integer',
		'langit_certification_cta_text'    => 'string',
	);

	foreach ( $meta_fields as $meta_key => $type ) {
		register_post_meta(
			'certification',
			$meta_key,
			array(
				'type'              => $type,
				'single'            => true,
				'sanitize_callback' => 'integer' === $type ? 'absint' : 'sanitize_text_field',
				'show_in_rest'      => true,
				'auth_callback'     => function() {
					return current_user_can( 'edit_posts' );
				},
			)
		);
	}
}
add_action( 'init', 'langit_register_certifications' );

/**
 * Flush rewrites after theme switch so Certification URLs work immediately.
 */
function langit_flush_certification_rewrites() {
	langit_register_certifications();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'langit_flush_certification_rewrites' );

/**
 * Flush Certification rewrite rules once after route registration.
 */
function langit_maybe_flush_certification_rewrites() {
	$rewrite_version = '2026-05-17-certification-route';

	if ( get_option( 'langit_certification_rewrite_version' ) === $rewrite_version ) {
		return;
	}

	langit_register_certifications();
	flush_rewrite_rules();
	update_option( 'langit_certification_rewrite_version', $rewrite_version );
}
add_action( 'admin_init', 'langit_maybe_flush_certification_rewrites' );

/**
 * Seed default Certification categories.
 */
function langit_seed_certification_categories() {
	$seed_version = '2026-05-17';

	if ( get_option( 'langit_certification_category_seed_version' ) === $seed_version ) {
		return;
	}

	$categories = array(
		'Safety',
		'Electrical',
		'Networking',
		'Fire Alarm',
		'Security System',
		'Industry Compliance',
	);

	foreach ( $categories as $category ) {
		if ( ! term_exists( $category, 'certification_category' ) ) {
			wp_insert_term( $category, 'certification_category' );
		}
	}

	update_option( 'langit_certification_category_seed_version', $seed_version );
}
add_action( 'admin_init', 'langit_seed_certification_categories' );

/**
 * Return Certifications archive URL.
 *
 * @return string
 */
function langit_get_certification_archive_url() {
	$archive_url = get_post_type_archive_link( 'certification' );

	return $archive_url ? $archive_url : home_url( '/certifications/' );
}

/**
 * Enqueue media tools on Certification edit screens.
 *
 * @param string $hook Current admin hook.
 */
function langit_certification_admin_assets( $hook ) {
	if ( 'post.php' !== $hook && 'post-new.php' !== $hook ) {
		return;
	}

	$screen = get_current_screen();
	if ( ! $screen || 'certification' !== $screen->post_type ) {
		return;
	}

	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'langit_certification_admin_assets' );

/**
 * Add Certification details metabox.
 */
function langit_add_certification_meta_boxes() {
	add_meta_box(
		'langit-certification-details',
		esc_html__( 'Certification Details', 'langit' ),
		'langit_certification_details_meta_box',
		'certification',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes_certification', 'langit_add_certification_meta_boxes' );

/**
 * Render Certification details metabox.
 *
 * @param WP_Post $post Current post.
 */
function langit_certification_details_meta_box( $post ) {
	$issuer      = get_post_meta( $post->ID, 'langit_certification_issuer', true );
	$number      = get_post_meta( $post->ID, 'langit_certification_number', true );
	$valid_until = get_post_meta( $post->ID, 'langit_certification_valid_until', true );
	$file_id     = absint( get_post_meta( $post->ID, 'langit_certification_file_id', true ) );
	$cta_text    = get_post_meta( $post->ID, 'langit_certification_cta_text', true );
	$file_url    = $file_id ? wp_get_attachment_url( $file_id ) : '';

	wp_nonce_field( 'langit_save_certification_details', 'langit_certification_details_nonce' );
	?>
	<p>
		<label for="langit_certification_issuer"><?php esc_html_e( 'Issuing Organization', 'langit' ); ?></label>
		<input id="langit_certification_issuer" class="widefat" type="text" name="langit_certification_issuer" value="<?php echo esc_attr( $issuer ); ?>">
	</p>
	<p>
		<label for="langit_certification_number"><?php esc_html_e( 'Certification Number', 'langit' ); ?></label>
		<input id="langit_certification_number" class="widefat" type="text" name="langit_certification_number" value="<?php echo esc_attr( $number ); ?>">
	</p>
	<p>
		<label for="langit_certification_valid_until"><?php esc_html_e( 'Valid Until', 'langit' ); ?></label>
		<input id="langit_certification_valid_until" class="widefat" type="date" name="langit_certification_valid_until" value="<?php echo esc_attr( $valid_until ); ?>">
	</p>
	<p>
		<label for="langit_certification_file_id"><?php esc_html_e( 'Certificate File Attachment ID', 'langit' ); ?></label>
		<input id="langit_certification_file_id" class="widefat" type="number" min="0" name="langit_certification_file_id" value="<?php echo esc_attr( (string) $file_id ); ?>">
	</p>
	<p>
		<button type="button" class="button" id="langit-certification-select-file"><?php esc_html_e( 'Select File', 'langit' ); ?></button>
		<button type="button" class="button" id="langit-certification-clear-file"><?php esc_html_e( 'Clear', 'langit' ); ?></button>
	</p>
	<p id="langit-certification-file-preview" class="description">
		<?php echo $file_url ? esc_html( basename( wp_parse_url( $file_url, PHP_URL_PATH ) ) ) : esc_html__( 'No file selected.', 'langit' ); ?>
	</p>
	<p>
		<label for="langit_certification_cta_text"><?php esc_html_e( 'Certificate CTA Text', 'langit' ); ?></label>
		<input id="langit_certification_cta_text" class="widefat" type="text" name="langit_certification_cta_text" value="<?php echo esc_attr( $cta_text ); ?>" placeholder="<?php esc_attr_e( 'View Certificate', 'langit' ); ?>">
	</p>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var selectButton = document.getElementById('langit-certification-select-file');
			var clearButton = document.getElementById('langit-certification-clear-file');
			var fileInput = document.getElementById('langit_certification_file_id');
			var preview = document.getElementById('langit-certification-file-preview');
			var frame;

			if (!selectButton || !fileInput || typeof wp === 'undefined' || !wp.media) {
				return;
			}

			selectButton.addEventListener('click', function(event) {
				event.preventDefault();

				if (frame) {
					frame.open();
					return;
				}

				frame = wp.media({
					title: '<?php echo esc_js( __( 'Select Certificate File', 'langit' ) ); ?>',
					button: { text: '<?php echo esc_js( __( 'Use this file', 'langit' ) ); ?>' },
					multiple: false
				});

				frame.on('select', function() {
					var attachment = frame.state().get('selection').first().toJSON();
					fileInput.value = attachment.id || '';
					preview.textContent = attachment.filename || attachment.url || '<?php echo esc_js( __( 'File selected.', 'langit' ) ); ?>';
				});

				frame.open();
			});

			if (clearButton) {
				clearButton.addEventListener('click', function(event) {
					event.preventDefault();
					fileInput.value = '';
					preview.textContent = '<?php echo esc_js( __( 'No file selected.', 'langit' ) ); ?>';
				});
			}
		});
	</script>
	<?php
}

/**
 * Save Certification details.
 *
 * @param int $post_id Current post ID.
 */
function langit_save_certification_details( $post_id ) {
	if ( ! isset( $_POST['langit_certification_details_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['langit_certification_details_nonce'] ) ), 'langit_save_certification_details' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array(
		'langit_certification_issuer'      => 'sanitize_text_field',
		'langit_certification_number'      => 'sanitize_text_field',
		'langit_certification_valid_until' => 'sanitize_text_field',
		'langit_certification_file_id'     => 'absint',
		'langit_certification_cta_text'    => 'sanitize_text_field',
	);

	foreach ( $fields as $field => $sanitize_callback ) {
		$value = isset( $_POST[ $field ] ) ? wp_unslash( $_POST[ $field ] ) : '';
		$value = call_user_func( $sanitize_callback, $value );

		if ( '' !== $value && 0 !== $value ) {
			update_post_meta( $post_id, $field, $value );
		} else {
			delete_post_meta( $post_id, $field );
		}
	}
}
add_action( 'save_post_certification', 'langit_save_certification_details' );

/**
 * Return Certification metadata prepared for display.
 *
 * @param int $post_id Certification post ID.
 * @return array<string,string>
 */
function langit_certification_meta( $post_id ) {
	$file_id     = absint( get_post_meta( $post_id, 'langit_certification_file_id', true ) );
	$file_url    = $file_id ? wp_get_attachment_url( $file_id ) : '';
	$valid_until = get_post_meta( $post_id, 'langit_certification_valid_until', true );
	$cta_text    = get_post_meta( $post_id, 'langit_certification_cta_text', true );

	if ( $valid_until ) {
		$timestamp   = strtotime( $valid_until );
		$valid_until = $timestamp ? date_i18n( get_option( 'date_format' ), $timestamp ) : $valid_until;
	}

	return array(
		'issuer'      => get_post_meta( $post_id, 'langit_certification_issuer', true ),
		'number'      => get_post_meta( $post_id, 'langit_certification_number', true ),
		'valid_until' => $valid_until ? $valid_until : esc_html__( 'Validity not specified', 'langit' ),
		'file_id'     => (string) $file_id,
		'url'         => $file_url ? $file_url : get_permalink( $post_id ),
		'cta_text'    => $cta_text ? $cta_text : esc_html__( 'View Certificate', 'langit' ),
	);
}

/**
 * Render a Certification card.
 *
 * @param int $post_id Certification post ID.
 */
function langit_certification_card( $post_id ) {
	$terms    = get_the_terms( $post_id, 'certification_category' );
	$category = ( ! is_wp_error( $terms ) && ! empty( $terms ) ) ? $terms[0]->name : esc_html__( 'Certification', 'langit' );
	$meta     = langit_certification_meta( $post_id );
	?>
	<article class="certification-card card">
		<a class="certification-card__cover" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" aria-label="<?php echo esc_attr( get_the_title( $post_id ) ); ?>">
			<?php if ( has_post_thumbnail( $post_id ) ) : ?>
				<?php echo get_the_post_thumbnail( $post_id, 'medium_large', array( 'loading' => 'lazy', 'decoding' => 'async' ) ); ?>
			<?php else : ?>
				<span aria-hidden="true"><?php esc_html_e( 'CERT', 'langit' ); ?></span>
			<?php endif; ?>
		</a>
		<div class="certification-card__body">
			<p class="card__meta"><?php echo esc_html( $category ); ?></p>
			<h3><a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>"><?php echo esc_html( get_the_title( $post_id ) ); ?></a></h3>
			<?php if ( has_excerpt( $post_id ) ) : ?>
				<p><?php echo esc_html( get_the_excerpt( $post_id ) ); ?></p>
			<?php endif; ?>
			<div class="certification-card__meta">
				<?php if ( $meta['issuer'] ) : ?>
					<span><?php echo esc_html( $meta['issuer'] ); ?></span>
				<?php endif; ?>
				<span><?php echo esc_html( $meta['valid_until'] ); ?></span>
			</div>
			<a class="button button--outline" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>">
				<?php esc_html_e( 'View Details', 'langit' ); ?>
			</a>
		</div>
	</article>
	<?php
}
