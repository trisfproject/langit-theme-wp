<?php
/**
 * Section heading component.
 *
 * @package Langit
 */

$args = wp_parse_args(
	$args,
	array(
		'eyebrow' => '',
		'title'   => '',
		'text'    => '',
		'level'   => 2,
		'center'  => false,
		'class'   => '',
	)
);

if ( empty( $args['eyebrow'] ) && empty( $args['title'] ) && empty( $args['text'] ) ) {
	return;
}

$level   = min( 6, max( 1, absint( $args['level'] ) ) );
$classes = array( 'section-heading', $args['center'] ? 'section-heading--center' : '', $args['class'] );
?>

<div class="<?php echo esc_attr( langit_class_names( $classes ) ); ?>">
	<?php if ( ! empty( $args['eyebrow'] ) ) : ?>
		<p class="section-eyebrow"><?php echo esc_html( $args['eyebrow'] ); ?></p>
	<?php endif; ?>

	<?php if ( ! empty( $args['title'] ) ) : ?>
		<h<?php echo esc_attr( (string) $level ); ?>><?php echo wp_kses( $args['title'], array( 'br' => array( 'class' => true ) ) ); ?></h<?php echo esc_attr( (string) $level ); ?>>
	<?php endif; ?>

	<?php if ( ! empty( $args['text'] ) ) : ?>
		<p><?php echo esc_html( $args['text'] ); ?></p>
	<?php endif; ?>
</div>
