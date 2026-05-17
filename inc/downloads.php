<?php
/**
 * Downloads custom post type and helpers.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Downloads post type and taxonomy.
 */
function langit_register_downloads() {
	register_post_type(
		'download',
		array(
			'labels'       => array(
				'name'               => esc_html__( 'Downloads', 'langit' ),
				'singular_name'      => esc_html__( 'Download', 'langit' ),
				'add_new_item'       => esc_html__( 'Add New Document', 'langit' ),
				'edit_item'          => esc_html__( 'Edit Document', 'langit' ),
				'new_item'           => esc_html__( 'New Document', 'langit' ),
				'view_item'          => esc_html__( 'View Document', 'langit' ),
				'search_items'       => esc_html__( 'Search Downloads', 'langit' ),
				'not_found'          => esc_html__( 'No downloads found', 'langit' ),
				'all_items'          => esc_html__( 'Downloads', 'langit' ),
				'menu_name'          => esc_html__( 'Downloads', 'langit' ),
				'featured_image'     => esc_html__( 'Document Cover', 'langit' ),
				'set_featured_image' => esc_html__( 'Set document cover', 'langit' ),
			),
			'public'       => true,
			'has_archive'  => 'downloads',
			'menu_icon'    => 'dashicons-download',
			'rewrite'      => array(
				'slug'       => 'downloads',
				'with_front' => false,
			),
			'show_in_rest' => true,
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
		)
	);

	register_taxonomy(
		'download_category',
		'download',
		array(
			'labels'       => array(
				'name'          => esc_html__( 'Download Categories', 'langit' ),
				'singular_name' => esc_html__( 'Download Category', 'langit' ),
				'search_items'  => esc_html__( 'Search Download Categories', 'langit' ),
				'all_items'     => esc_html__( 'Download Categories', 'langit' ),
				'edit_item'     => esc_html__( 'Edit Download Category', 'langit' ),
				'add_new_item'  => esc_html__( 'Add New Download Category', 'langit' ),
			),
			'hierarchical' => true,
			'public'       => true,
			'rewrite'      => array(
				'slug'       => 'download-category',
				'with_front' => false,
			),
			'show_in_rest' => true,
		)
	);

	$meta_fields = array(
		'langit_download_file_id'   => 'integer',
		'langit_download_file_type' => 'string',
		'langit_download_file_size' => 'string',
		'langit_download_cta_text'  => 'string',
	);

	foreach ( $meta_fields as $meta_key => $type ) {
		register_post_meta(
			'download',
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
add_action( 'init', 'langit_register_downloads' );

/**
 * Flush rewrites after theme switch so Downloads URLs work immediately.
 */
function langit_flush_download_rewrites() {
	langit_register_downloads();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'langit_flush_download_rewrites' );

/**
 * Flush Download rewrite rules once after route registration.
 */
function langit_maybe_flush_download_rewrites() {
	$rewrite_version = '2026-05-17-download-route';

	if ( get_option( 'langit_download_rewrite_version' ) === $rewrite_version ) {
		return;
	}

	langit_register_downloads();
	flush_rewrite_rules();
	update_option( 'langit_download_rewrite_version', $rewrite_version );
}
add_action( 'admin_init', 'langit_maybe_flush_download_rewrites' );

/**
 * Seed default Download categories.
 */
function langit_seed_download_categories() {
	$seed_version = '2026-05-17';

	if ( get_option( 'langit_download_category_seed_version' ) === $seed_version ) {
		return;
	}

	$categories = array(
		'Company Profile',
		'Product Catalog',
		'Brochure',
		'Technical Datasheet',
		'Certification',
		'Maintenance Guide',
	);

	foreach ( $categories as $category ) {
		if ( ! term_exists( $category, 'download_category' ) ) {
			wp_insert_term( $category, 'download_category' );
		}
	}

	update_option( 'langit_download_category_seed_version', $seed_version );
}
add_action( 'admin_init', 'langit_seed_download_categories' );

/**
 * Return Downloads archive URL.
 *
 * @return string
 */
function langit_get_download_archive_url() {
	$archive_url = get_post_type_archive_link( 'download' );

	return $archive_url ? $archive_url : home_url( '/downloads/' );
}

/**
 * Enqueue media tools on Download edit screens.
 *
 * @param string $hook Current admin hook.
 */
function langit_download_admin_assets( $hook ) {
	if ( 'post.php' !== $hook && 'post-new.php' !== $hook ) {
		return;
	}

	$screen = get_current_screen();
	if ( ! $screen || 'download' !== $screen->post_type ) {
		return;
	}

	wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'langit_download_admin_assets' );

/**
 * Add Download details metabox.
 */
function langit_add_download_meta_boxes() {
	add_meta_box(
		'langit-download-details',
		esc_html__( 'Download Details', 'langit' ),
		'langit_download_details_meta_box',
		'download',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes_download', 'langit_add_download_meta_boxes' );

/**
 * Render Download details metabox.
 *
 * @param WP_Post $post Current post.
 */
function langit_download_details_meta_box( $post ) {
	$file_id  = absint( get_post_meta( $post->ID, 'langit_download_file_id', true ) );
	$type     = get_post_meta( $post->ID, 'langit_download_file_type', true );
	$size     = get_post_meta( $post->ID, 'langit_download_file_size', true );
	$cta_text = get_post_meta( $post->ID, 'langit_download_cta_text', true );
	$file_url = $file_id ? wp_get_attachment_url( $file_id ) : '';

	wp_nonce_field( 'langit_save_download_details', 'langit_download_details_nonce' );
	?>
	<p>
		<label for="langit_download_file_id"><?php esc_html_e( 'File Attachment ID', 'langit' ); ?></label>
		<input id="langit_download_file_id" class="widefat" type="number" min="0" name="langit_download_file_id" value="<?php echo esc_attr( (string) $file_id ); ?>">
	</p>
	<p>
		<button type="button" class="button" id="langit-download-select-file"><?php esc_html_e( 'Select File', 'langit' ); ?></button>
		<button type="button" class="button" id="langit-download-clear-file"><?php esc_html_e( 'Clear', 'langit' ); ?></button>
	</p>
	<p id="langit-download-file-preview" class="description">
		<?php echo $file_url ? esc_html( basename( wp_parse_url( $file_url, PHP_URL_PATH ) ) ) : esc_html__( 'No file selected.', 'langit' ); ?>
	</p>
	<p>
		<label for="langit_download_file_type"><?php esc_html_e( 'File Type Override', 'langit' ); ?></label>
		<input id="langit_download_file_type" class="widefat" type="text" name="langit_download_file_type" value="<?php echo esc_attr( $type ); ?>" placeholder="<?php esc_attr_e( 'PDF', 'langit' ); ?>">
	</p>
	<p>
		<label for="langit_download_file_size"><?php esc_html_e( 'File Size Override', 'langit' ); ?></label>
		<input id="langit_download_file_size" class="widefat" type="text" name="langit_download_file_size" value="<?php echo esc_attr( $size ); ?>" placeholder="<?php esc_attr_e( '2 MB', 'langit' ); ?>">
	</p>
	<p>
		<label for="langit_download_cta_text"><?php esc_html_e( 'Download CTA Text', 'langit' ); ?></label>
		<input id="langit_download_cta_text" class="widefat" type="text" name="langit_download_cta_text" value="<?php echo esc_attr( $cta_text ); ?>" placeholder="<?php esc_attr_e( 'Download Document', 'langit' ); ?>">
	</p>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var selectButton = document.getElementById('langit-download-select-file');
			var clearButton = document.getElementById('langit-download-clear-file');
			var fileInput = document.getElementById('langit_download_file_id');
			var preview = document.getElementById('langit-download-file-preview');
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
					title: '<?php echo esc_js( __( 'Select Download File', 'langit' ) ); ?>',
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
 * Save Download details.
 *
 * @param int $post_id Current post ID.
 */
function langit_save_download_details( $post_id ) {
	if ( ! isset( $_POST['langit_download_details_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['langit_download_details_nonce'] ) ), 'langit_save_download_details' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array(
		'langit_download_file_id'   => 'absint',
		'langit_download_file_type' => 'sanitize_text_field',
		'langit_download_file_size' => 'sanitize_text_field',
		'langit_download_cta_text'  => 'sanitize_text_field',
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
add_action( 'save_post_download', 'langit_save_download_details' );

/**
 * Return Download metadata prepared for display.
 *
 * @param int $post_id Download post ID.
 * @return array<string,string>
 */
function langit_download_meta( $post_id ) {
	$file_id   = absint( get_post_meta( $post_id, 'langit_download_file_id', true ) );
	$file_url  = $file_id ? wp_get_attachment_url( $file_id ) : '';
	$file_path = $file_id ? get_attached_file( $file_id ) : '';
	$type      = get_post_meta( $post_id, 'langit_download_file_type', true );
	$size      = get_post_meta( $post_id, 'langit_download_file_size', true );
	$cta_text  = get_post_meta( $post_id, 'langit_download_cta_text', true );

	if ( ! $type && $file_id ) {
		$type = strtoupper( pathinfo( (string) get_attached_file( $file_id ), PATHINFO_EXTENSION ) );
	}

	if ( ! $size && $file_path && file_exists( $file_path ) ) {
		$size = size_format( filesize( $file_path ) );
	}

	return array(
		'file_id'  => (string) $file_id,
		'url'      => $file_url ? $file_url : get_permalink( $post_id ),
		'type'     => $type ? $type : esc_html__( 'Document', 'langit' ),
		'size'     => $size ? $size : esc_html__( 'File size unavailable', 'langit' ),
		'cta_text' => $cta_text ? $cta_text : esc_html__( 'Download Document', 'langit' ),
	);
}

/**
 * Render a Download card.
 *
 * @param int $post_id Download post ID.
 */
function langit_download_card( $post_id ) {
	$terms    = get_the_terms( $post_id, 'download_category' );
	$category = ( ! is_wp_error( $terms ) && ! empty( $terms ) ) ? $terms[0]->name : esc_html__( 'Downloads', 'langit' );
	$meta     = langit_download_meta( $post_id );
	?>
	<article class="download-card card">
		<a class="download-card__cover" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" aria-label="<?php echo esc_attr( get_the_title( $post_id ) ); ?>">
			<?php if ( has_post_thumbnail( $post_id ) ) : ?>
				<?php echo get_the_post_thumbnail( $post_id, 'medium_large', array( 'loading' => 'lazy', 'decoding' => 'async' ) ); ?>
			<?php else : ?>
				<span aria-hidden="true"><?php echo esc_html( $meta['type'] ); ?></span>
			<?php endif; ?>
		</a>
		<div class="download-card__body">
			<p class="card__meta"><?php echo esc_html( $category ); ?></p>
			<h3><a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>"><?php echo esc_html( get_the_title( $post_id ) ); ?></a></h3>
			<?php if ( has_excerpt( $post_id ) ) : ?>
				<p><?php echo esc_html( get_the_excerpt( $post_id ) ); ?></p>
			<?php endif; ?>
			<div class="download-card__meta">
				<span><?php echo esc_html( $meta['type'] ); ?></span>
				<span><?php echo esc_html( $meta['size'] ); ?></span>
			</div>
			<a class="button button--outline" href="<?php echo esc_url( $meta['url'] ); ?>" <?php echo (string) get_permalink( $post_id ) !== (string) $meta['url'] ? 'download' : ''; ?>>
				<?php echo esc_html( $meta['cta_text'] ); ?>
			</a>
		</div>
	</article>
	<?php
}
