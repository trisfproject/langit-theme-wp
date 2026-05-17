<?php
/**
 * Page hero component.
 *
 * @package Langit
 */

$args = wp_parse_args(
	$args,
	array(
		'eyebrow' => '',
		'title'   => '',
		'text'    => '',
		'class'   => '',
	)
);

$classes = array( 'page-hero', $args['class'] );
?>

<section class="<?php echo esc_attr( langit_class_names( $classes ) ); ?>">
	<div class="container page-hero__content stack">
		<?php if ( ! empty( $args['eyebrow'] ) ) : ?>
			<p class="section-eyebrow"><?php echo esc_html( $args['eyebrow'] ); ?></p>
		<?php endif; ?>

		<?php if ( ! empty( $args['title'] ) ) : ?>
			<h1><?php echo esc_html( $args['title'] ); ?></h1>
		<?php endif; ?>

		<?php if ( ! empty( $args['text'] ) ) : ?>
			<p class="lede"><?php echo esc_html( $args['text'] ); ?></p>
		<?php endif; ?>
	</div>
</section>
