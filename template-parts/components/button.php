<?php
/**
 * Button component.
 *
 * @package Langit
 */

$args = wp_parse_args(
	$args,
	array(
		'url'     => '',
		'label'   => '',
		'variant' => 'primary',
		'class'   => '',
		'attrs'   => array(),
	)
);

if ( empty( $args['url'] ) || empty( $args['label'] ) ) {
	return;
}

$classes = array( 'button', 'button--' . $args['variant'], $args['class'] );
$attrs   = '';

foreach ( (array) $args['attrs'] as $name => $value ) {
	if ( '' === $value || null === $value ) {
		continue;
	}

	$attrs .= sprintf( ' %1$s="%2$s"', esc_attr( $name ), esc_attr( $value ) );
}
?>

<a class="<?php echo esc_attr( langit_class_names( $classes ) ); ?>" href="<?php echo esc_url( $args['url'] ); ?>"<?php echo $attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<?php echo esc_html( $args['label'] ); ?>
</a>
