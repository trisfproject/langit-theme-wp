<?php
/**
 * Team custom post type and helpers.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Team post type and taxonomy.
 */
function langit_register_team() {
	register_post_type(
		'team',
		array(
			'labels'       => array(
				'name'                  => esc_html__( 'Team', 'langit' ),
				'singular_name'         => esc_html__( 'Team Member', 'langit' ),
				'add_new_item'          => esc_html__( 'Add New Team Member', 'langit' ),
				'edit_item'             => esc_html__( 'Edit Team Member', 'langit' ),
				'new_item'              => esc_html__( 'New Team Member', 'langit' ),
				'view_item'             => esc_html__( 'View Team Member', 'langit' ),
				'search_items'          => esc_html__( 'Search Team', 'langit' ),
				'not_found'             => esc_html__( 'No team members found', 'langit' ),
				'all_items'             => esc_html__( 'Team', 'langit' ),
				'menu_name'             => esc_html__( 'Team', 'langit' ),
				'featured_image'        => esc_html__( 'Profile Photo', 'langit' ),
				'set_featured_image'    => esc_html__( 'Set profile photo', 'langit' ),
				'remove_featured_image' => esc_html__( 'Remove profile photo', 'langit' ),
			),
			'public'       => true,
			'has_archive'  => 'team',
			'menu_icon'    => 'dashicons-groups',
			'rewrite'      => array(
				'slug'       => 'team',
				'with_front' => false,
			),
			'show_in_rest' => true,
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
		)
	);

	register_taxonomy(
		'team_department',
		'team',
		array(
			'labels'       => array(
				'name'          => esc_html__( 'Team Departments', 'langit' ),
				'singular_name' => esc_html__( 'Team Department', 'langit' ),
				'search_items'  => esc_html__( 'Search Team Departments', 'langit' ),
				'all_items'     => esc_html__( 'Team Departments', 'langit' ),
				'edit_item'     => esc_html__( 'Edit Team Department', 'langit' ),
				'add_new_item'  => esc_html__( 'Add New Team Department', 'langit' ),
			),
			'hierarchical' => true,
			'public'       => true,
			'rewrite'      => array(
				'slug'       => 'team-department',
				'with_front' => false,
			),
			'show_in_rest' => true,
		)
	);

	$team_meta = array(
		'langit_team_position'  => 'sanitize_text_field',
		'langit_team_expertise' => 'sanitize_textarea_field',
		'langit_team_experience' => 'sanitize_text_field',
		'langit_team_linkedin'  => 'esc_url_raw',
		'langit_team_email'     => 'sanitize_email',
	);

	foreach ( $team_meta as $meta_key => $sanitize_callback ) {
		register_post_meta(
			'team',
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
add_action( 'init', 'langit_register_team' );

/**
 * Flush rewrites after theme switch so team URLs work immediately.
 */
function langit_flush_team_rewrites() {
	langit_register_team();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'langit_flush_team_rewrites' );

/**
 * Flush team rewrite rules once after route registration.
 */
function langit_maybe_flush_team_rewrites() {
	$rewrite_version = '2026-05-17-team-route';

	if ( get_option( 'langit_team_rewrite_version' ) === $rewrite_version ) {
		return;
	}

	langit_register_team();
	flush_rewrite_rules();
	update_option( 'langit_team_rewrite_version', $rewrite_version );
}
add_action( 'admin_init', 'langit_maybe_flush_team_rewrites' );

/**
 * Return the public Team archive URL.
 *
 * @return string
 */
function langit_get_team_archive_url() {
	$archive_url = get_post_type_archive_link( 'team' );

	return $archive_url ? $archive_url : home_url( '/team/' );
}

/**
 * Add team details metabox.
 */
function langit_add_team_meta_boxes() {
	add_meta_box(
		'langit-team-details',
		esc_html__( 'Team Member Details', 'langit' ),
		'langit_team_details_meta_box',
		'team',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes_team', 'langit_add_team_meta_boxes' );

/**
 * Render team details metabox.
 *
 * @param WP_Post $post Current post.
 */
function langit_team_details_meta_box( $post ) {
	$fields = array(
		'langit_team_position'   => esc_html__( 'Position / Role', 'langit' ),
		'langit_team_experience' => esc_html__( 'Experience', 'langit' ),
		'langit_team_linkedin'   => esc_html__( 'LinkedIn URL', 'langit' ),
		'langit_team_email'      => esc_html__( 'Email Address', 'langit' ),
	);

	wp_nonce_field( 'langit_save_team_details', 'langit_team_details_nonce' );

	foreach ( $fields as $key => $label ) :
		$value = get_post_meta( $post->ID, $key, true );
		$type  = false !== strpos( $key, 'email' ) ? 'email' : ( false !== strpos( $key, 'linkedin' ) ? 'url' : 'text' );
		?>
		<p>
			<label for="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $label ); ?></label>
			<input type="<?php echo esc_attr( $type ); ?>" id="<?php echo esc_attr( $key ); ?>" name="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $value ); ?>" class="widefat">
		</p>
		<?php
	endforeach;

	$expertise = get_post_meta( $post->ID, 'langit_team_expertise', true );
	?>
	<p>
		<label for="langit_team_expertise"><?php esc_html_e( 'Experience / Expertise', 'langit' ); ?></label>
		<textarea id="langit_team_expertise" name="langit_team_expertise" class="widefat" rows="5"><?php echo esc_textarea( $expertise ); ?></textarea>
	</p>
	<p class="description"><?php esc_html_e( 'Use one expertise item per line for cleaner frontend display.', 'langit' ); ?></p>
	<?php
}

/**
 * Save team details.
 *
 * @param int $post_id Current post ID.
 */
function langit_save_team_details( $post_id ) {
	if ( ! isset( $_POST['langit_team_details_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['langit_team_details_nonce'] ) ), 'langit_save_team_details' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array(
		'langit_team_position'   => 'sanitize_text_field',
		'langit_team_expertise'  => 'sanitize_textarea_field',
		'langit_team_experience' => 'sanitize_text_field',
		'langit_team_linkedin'   => 'esc_url_raw',
		'langit_team_email'      => 'sanitize_email',
	);

	foreach ( $fields as $field => $sanitize_callback ) {
		if ( ! isset( $_POST[ $field ] ) ) {
			continue;
		}

		$value = call_user_func( $sanitize_callback, wp_unslash( $_POST[ $field ] ) );

		if ( '' === $value ) {
			delete_post_meta( $post_id, $field );
		} else {
			update_post_meta( $post_id, $field, $value );
		}
	}
}
add_action( 'save_post_team', 'langit_save_team_details' );

/**
 * Use a clearer title placeholder for team member names.
 *
 * @param string  $title Placeholder text.
 * @param WP_Post $post  Current post.
 * @return string
 */
function langit_team_title_placeholder( $title, $post ) {
	if ( 'team' !== $post->post_type ) {
		return $title;
	}

	return esc_html__( 'Team Member Name', 'langit' );
}
add_filter( 'enter_title_here', 'langit_team_title_placeholder', 10, 2 );

/**
 * Get a team excerpt.
 *
 * @param int $post_id Team member post ID.
 * @return string
 */
function langit_get_team_excerpt( $post_id ) {
	$excerpt = get_the_excerpt( $post_id );

	if ( ! empty( $excerpt ) ) {
		return $excerpt;
	}

	return wp_trim_words( wp_strip_all_tags( get_post_field( 'post_content', $post_id ) ), 26 );
}

/**
 * Parse expertise rows for display.
 *
 * @param int $post_id Team member post ID.
 * @return array<int,string>
 */
function langit_get_team_expertise_items( $post_id ) {
	$expertise = get_post_meta( $post_id, 'langit_team_expertise', true );
	$items     = preg_split( '/\r\n|\r|\n/', $expertise );

	return array_values( array_filter( array_map( 'trim', (array) $items ) ) );
}

/**
 * Render a team member card.
 *
 * @param int $post_id Team member post ID.
 */
function langit_team_card( $post_id ) {
	$position = get_post_meta( $post_id, 'langit_team_position', true );
	$terms    = get_the_terms( $post_id, 'team_department' );
	$meta     = ( ! is_wp_error( $terms ) && ! empty( $terms ) ) ? $terms[0]->name : esc_html__( 'Team', 'langit' );
	$link     = get_permalink( $post_id );
	?>
	<article <?php post_class( 'card team-card team-card--profile', $post_id ); ?>>
		<a class="team-card__visual" href="<?php echo esc_url( $link ); ?>" aria-label="<?php echo esc_attr( get_the_title( $post_id ) ); ?>">
			<?php if ( has_post_thumbnail( $post_id ) ) : ?>
				<?php echo get_the_post_thumbnail( $post_id, 'langit-card', array( 'class' => 'team-card__photo', 'loading' => 'lazy', 'decoding' => 'async' ) ); ?>
			<?php else : ?>
				<img class="team-card__icon" src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/team.svg' ); ?>" width="48" height="48" alt="" loading="lazy" decoding="async">
			<?php endif; ?>
		</a>
		<p class="card__meta"><?php echo esc_html( $meta ); ?></p>
		<h3><a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( get_the_title( $post_id ) ); ?></a></h3>
		<?php if ( ! empty( $position ) ) : ?>
			<p class="team-card__role"><?php echo esc_html( $position ); ?></p>
		<?php endif; ?>
		<p><?php echo esc_html( langit_get_team_excerpt( $post_id ) ); ?></p>
	</article>
	<?php
}
