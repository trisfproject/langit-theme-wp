<?php
/**
 * Testimonials custom post type and trust helpers.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Testimonials post type and taxonomy.
 */
function langit_register_testimonials() {
	register_post_type(
		'testimonial',
		array(
			'labels'       => array(
				'name'                  => esc_html__( 'Testimonials', 'langit' ),
				'singular_name'         => esc_html__( 'Testimonial', 'langit' ),
				'add_new_item'          => esc_html__( 'Add New Testimonial', 'langit' ),
				'edit_item'             => esc_html__( 'Edit Testimonial', 'langit' ),
				'new_item'              => esc_html__( 'New Testimonial', 'langit' ),
				'view_item'             => esc_html__( 'View Testimonial', 'langit' ),
				'search_items'          => esc_html__( 'Search Testimonials', 'langit' ),
				'not_found'             => esc_html__( 'No testimonials found', 'langit' ),
				'all_items'             => esc_html__( 'Testimonials', 'langit' ),
				'menu_name'             => esc_html__( 'Testimonials', 'langit' ),
				'featured_image'        => esc_html__( 'Client Logo or Image', 'langit' ),
				'set_featured_image'    => esc_html__( 'Set client logo or image', 'langit' ),
				'remove_featured_image' => esc_html__( 'Remove client logo or image', 'langit' ),
			),
			'public'       => true,
			'has_archive'  => 'testimonials',
			'menu_icon'    => 'dashicons-format-quote',
			'rewrite'      => array(
				'slug'       => 'testimonials',
				'with_front' => false,
			),
			'show_in_rest' => true,
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
		)
	);

	register_taxonomy(
		'testimonial_industry',
		'testimonial',
		array(
			'labels'       => array(
				'name'          => esc_html__( 'Industry Types', 'langit' ),
				'singular_name' => esc_html__( 'Industry Type', 'langit' ),
				'search_items'  => esc_html__( 'Search Industry Types', 'langit' ),
				'all_items'     => esc_html__( 'All Industry Types', 'langit' ),
				'edit_item'     => esc_html__( 'Edit Industry Type', 'langit' ),
				'add_new_item'  => esc_html__( 'Add New Industry Type', 'langit' ),
			),
			'hierarchical' => true,
			'public'       => true,
			'rewrite'      => array(
				'slug'       => 'testimonial-industry',
				'with_front' => false,
			),
			'show_in_rest' => true,
		)
	);

	$testimonial_meta = array(
		'langit_testimonial_company'  => 'sanitize_text_field',
		'langit_testimonial_position' => 'sanitize_text_field',
		'langit_testimonial_rating'   => 'langit_sanitize_testimonial_rating',
	);

	foreach ( $testimonial_meta as $meta_key => $sanitize_callback ) {
		register_post_meta(
			'testimonial',
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
add_action( 'init', 'langit_register_testimonials' );

/**
 * Flush rewrites after theme switch so testimonial URLs work immediately.
 */
function langit_flush_testimonial_rewrites() {
	langit_register_testimonials();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'langit_flush_testimonial_rewrites' );

/**
 * Sanitize testimonial rating values.
 *
 * @param mixed $value Rating value.
 * @return string
 */
function langit_sanitize_testimonial_rating( $value ) {
	$rating = absint( $value );

	if ( $rating < 1 || $rating > 5 ) {
		return '';
	}

	return (string) $rating;
}

/**
 * Add testimonial details metabox.
 */
function langit_add_testimonial_meta_boxes() {
	add_meta_box(
		'langit-testimonial-details',
		esc_html__( 'Testimonial Details', 'langit' ),
		'langit_testimonial_details_meta_box',
		'testimonial',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes_testimonial', 'langit_add_testimonial_meta_boxes' );

/**
 * Render testimonial details metabox.
 *
 * @param WP_Post $post Current post.
 */
function langit_testimonial_details_meta_box( $post ) {
	$fields = array(
		'langit_testimonial_company'  => esc_html__( 'Company Name', 'langit' ),
		'langit_testimonial_position' => esc_html__( 'Position / Role', 'langit' ),
	);

	wp_nonce_field( 'langit_save_testimonial_details', 'langit_testimonial_details_nonce' );

	foreach ( $fields as $key => $label ) :
		$value = get_post_meta( $post->ID, $key, true );
		?>
		<p>
			<label for="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $label ); ?></label>
			<input type="text" id="<?php echo esc_attr( $key ); ?>" name="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $value ); ?>" class="widefat">
		</p>
		<?php
	endforeach;

	$rating = get_post_meta( $post->ID, 'langit_testimonial_rating', true );
	?>
	<p>
		<label for="langit_testimonial_rating"><?php esc_html_e( 'Rating', 'langit' ); ?></label>
		<select id="langit_testimonial_rating" name="langit_testimonial_rating" class="widefat">
			<option value=""><?php esc_html_e( 'No rating', 'langit' ); ?></option>
			<?php for ( $i = 1; $i <= 5; $i++ ) : ?>
				<option value="<?php echo esc_attr( (string) $i ); ?>" <?php selected( (string) $i, $rating ); ?>><?php echo esc_html( $i . '/5' ); ?></option>
			<?php endfor; ?>
		</select>
	</p>
	<?php
}

/**
 * Save testimonial details metabox.
 *
 * @param int $post_id Current post ID.
 */
function langit_save_testimonial_details( $post_id ) {
	if ( ! isset( $_POST['langit_testimonial_details_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['langit_testimonial_details_nonce'] ) ), 'langit_save_testimonial_details' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array(
		'langit_testimonial_company',
		'langit_testimonial_position',
		'langit_testimonial_rating',
	);

	foreach ( $fields as $field ) {
		if ( ! isset( $_POST[ $field ] ) ) {
			continue;
		}

		$value = 'langit_testimonial_rating' === $field
			? langit_sanitize_testimonial_rating( wp_unslash( $_POST[ $field ] ) )
			: sanitize_text_field( wp_unslash( $_POST[ $field ] ) );

		if ( '' === $value ) {
			delete_post_meta( $post_id, $field );
		} else {
			update_post_meta( $post_id, $field, $value );
		}
	}
}
add_action( 'save_post_testimonial', 'langit_save_testimonial_details' );

/**
 * Use a clearer title placeholder for testimonial client names.
 *
 * @param string  $title Placeholder text.
 * @param WP_Post $post  Current post.
 * @return string
 */
function langit_testimonial_title_placeholder( $title, $post ) {
	if ( 'testimonial' !== $post->post_type ) {
		return $title;
	}

	return esc_html__( 'Client Name', 'langit' );
}
add_filter( 'enter_title_here', 'langit_testimonial_title_placeholder', 10, 2 );

/**
 * Get a testimonial excerpt.
 *
 * @param int $post_id Testimonial post ID.
 * @return string
 */
function langit_get_testimonial_excerpt( $post_id ) {
	$excerpt = get_the_excerpt( $post_id );

	if ( ! empty( $excerpt ) ) {
		return $excerpt;
	}

	return wp_trim_words( wp_strip_all_tags( get_post_field( 'post_content', $post_id ) ), 34 );
}

/**
 * Render a testimonial card.
 *
 * @param int $post_id Testimonial post ID.
 */
function langit_testimonial_card( $post_id ) {
	$company  = get_post_meta( $post_id, 'langit_testimonial_company', true );
	$position = get_post_meta( $post_id, 'langit_testimonial_position', true );
	$rating   = get_post_meta( $post_id, 'langit_testimonial_rating', true );
	$terms    = get_the_terms( $post_id, 'testimonial_industry' );
	$industry = ( ! is_wp_error( $terms ) && ! empty( $terms ) ) ? $terms[0]->name : '';
	?>
	<article <?php post_class( 'card testimonial-card', $post_id ); ?>>
		<header class="testimonial-card__header">
			<?php if ( has_post_thumbnail( $post_id ) ) : ?>
				<div class="testimonial-card__logo">
					<?php echo get_the_post_thumbnail( $post_id, 'thumbnail', array( 'loading' => 'lazy', 'decoding' => 'async' ) ); ?>
				</div>
			<?php endif; ?>

			<div>
				<?php if ( ! empty( $industry ) ) : ?>
					<p class="post-card__term"><?php echo esc_html( $industry ); ?></p>
				<?php endif; ?>
				<h3><?php echo esc_html( get_the_title( $post_id ) ); ?></h3>
				<?php if ( ! empty( $position ) || ! empty( $company ) ) : ?>
					<p class="testimonial-card__meta"><?php echo esc_html( implode( ', ', array_filter( array( $position, $company ) ) ) ); ?></p>
				<?php endif; ?>
			</div>
		</header>

		<blockquote>
			<p><?php echo esc_html( langit_get_testimonial_excerpt( $post_id ) ); ?></p>
		</blockquote>

		<?php if ( ! empty( $rating ) ) : ?>
			<p class="testimonial-card__rating"><?php echo esc_html( $rating . '/5' ); ?></p>
		<?php endif; ?>
	</article>
	<?php
}

/**
 * Return editable homepage trust stats.
 *
 * @return array<int,array<string,string>>
 */
function langit_trust_stats() {
	return array(
		array(
			'value'       => langit_theme_mod( 'trust_stat_1_value' ),
			'label'       => langit_theme_mod( 'trust_stat_1_label' ),
			'description' => langit_theme_mod( 'trust_stat_1_description' ),
		),
		array(
			'value'       => langit_theme_mod( 'trust_stat_2_value' ),
			'label'       => langit_theme_mod( 'trust_stat_2_label' ),
			'description' => langit_theme_mod( 'trust_stat_2_description' ),
		),
		array(
			'value'       => langit_theme_mod( 'trust_stat_3_value' ),
			'label'       => langit_theme_mod( 'trust_stat_3_label' ),
			'description' => langit_theme_mod( 'trust_stat_3_description' ),
		),
		array(
			'value'       => langit_theme_mod( 'trust_stat_4_value' ),
			'label'       => langit_theme_mod( 'trust_stat_4_label' ),
			'description' => langit_theme_mod( 'trust_stat_4_description' ),
		),
	);
}
