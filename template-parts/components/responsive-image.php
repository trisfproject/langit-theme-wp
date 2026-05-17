<?php
/**
 * Responsive image component.
 *
 * @package Langit
 */

$args = wp_parse_args(
	$args,
	array(
		'src'     => '',
		'sources' => array(),
		'alt'     => '',
		'width'   => '',
		'height'  => '',
		'sizes'   => '',
		'class'   => '',
		'loading' => 'lazy',
	)
);

if ( empty( $args['src'] ) ) {
	return;
}

$classes = array( 'image-placeholder', 'media-frame', $args['class'] );
?>

<div class="<?php echo esc_attr( langit_class_names( $classes ) ); ?>">
	<picture>
		<?php foreach ( (array) $args['sources'] as $source ) : ?>
			<source
				<?php if ( ! empty( $source['type'] ) ) : ?>
					type="<?php echo esc_attr( $source['type'] ); ?>"
				<?php endif; ?>
				srcset="<?php echo esc_attr( $source['srcset'] ); ?>"
				<?php if ( ! empty( $args['sizes'] ) ) : ?>
					sizes="<?php echo esc_attr( $args['sizes'] ); ?>"
				<?php endif; ?>
			>
		<?php endforeach; ?>
		<img
			src="<?php echo esc_url( $args['src'] ); ?>"
			<?php if ( ! empty( $args['width'] ) ) : ?>
				width="<?php echo esc_attr( $args['width'] ); ?>"
			<?php endif; ?>
			<?php if ( ! empty( $args['height'] ) ) : ?>
				height="<?php echo esc_attr( $args['height'] ); ?>"
			<?php endif; ?>
			loading="<?php echo esc_attr( $args['loading'] ); ?>"
			decoding="async"
			alt="<?php echo esc_attr( $args['alt'] ); ?>"
		>
	</picture>
</div>
