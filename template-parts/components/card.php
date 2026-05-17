<?php
/**
 * Card component.
 *
 * @package Langit
 */

$args = wp_parse_args(
	$args,
	array(
		'title'       => '',
		'text'        => '',
		'meta'        => '',
		'class'       => '',
		'id'          => '',
		'icon_class'  => '',
		'icon_url'    => '',
		'icon_alt'    => '',
		'visual'      => '',
		'action'      => array(),
		'heading_tag' => 'h3',
	)
);

if ( empty( $args['title'] ) && empty( $args['text'] ) && empty( $args['meta'] ) ) {
	return;
}

$heading_tag = in_array( $args['heading_tag'], array( 'h2', 'h3', 'h4' ), true ) ? $args['heading_tag'] : 'h3';
$classes     = array( 'card', $args['class'] );
?>

<article<?php echo empty( $args['id'] ) ? '' : ' id="' . esc_attr( $args['id'] ) . '"'; ?> class="<?php echo esc_attr( langit_class_names( $classes ) ); ?>">
	<?php if ( ! empty( $args['visual'] ) ) : ?>
		<?php echo wp_kses_post( $args['visual'] ); ?>
	<?php elseif ( ! empty( $args['icon_url'] ) ) : ?>
		<img class="<?php echo esc_attr( $args['icon_class'] ? $args['icon_class'] : 'card-icon' ); ?>" src="<?php echo esc_url( $args['icon_url'] ); ?>" width="48" height="48" alt="<?php echo esc_attr( $args['icon_alt'] ); ?>" loading="lazy" decoding="async">
	<?php elseif ( ! empty( $args['icon_class'] ) ) : ?>
		<div class="<?php echo esc_attr( $args['icon_class'] ); ?>" aria-hidden="true"></div>
	<?php endif; ?>

	<?php if ( ! empty( $args['meta'] ) ) : ?>
		<p class="card__meta"><?php echo esc_html( $args['meta'] ); ?></p>
	<?php endif; ?>

	<?php if ( ! empty( $args['title'] ) ) : ?>
		<<?php echo esc_attr( $heading_tag ); ?>><?php echo esc_html( $args['title'] ); ?></<?php echo esc_attr( $heading_tag ); ?>>
	<?php endif; ?>

	<?php if ( ! empty( $args['text'] ) ) : ?>
		<p><?php echo esc_html( $args['text'] ); ?></p>
	<?php endif; ?>

	<?php
	if ( ! empty( $args['action'] ) ) {
		langit_button( $args['action'] );
	}
	?>
</article>
