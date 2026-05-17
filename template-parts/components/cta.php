<?php
/**
 * CTA component.
 *
 * @package Langit
 */

$args = wp_parse_args(
	$args,
	array(
		'eyebrow'       => '',
		'title'         => '',
		'text'          => '',
		'actions'       => array(),
		'variant'       => 'centered',
		'section_class' => '',
		'panel_class'   => '',
	)
);

if ( empty( $args['title'] ) && empty( $args['text'] ) && empty( $args['actions'] ) ) {
	return;
}

$section_classes = array( 'section', $args['section_class'] );
$panel_classes   = array( 'container', 'cta-section', 'cta-section--' . langit_cta_variant( $args['variant'] ), $args['panel_class'] );
?>

<section class="<?php echo esc_attr( langit_class_names( $section_classes ) ); ?>">
	<div class="<?php echo esc_attr( langit_class_names( $panel_classes ) ); ?>">
		<div class="cta-section__content stack">
			<?php if ( ! empty( $args['eyebrow'] ) ) : ?>
				<p class="section-eyebrow"><?php echo esc_html( $args['eyebrow'] ); ?></p>
			<?php endif; ?>

			<?php if ( ! empty( $args['title'] ) ) : ?>
				<h2><?php echo esc_html( $args['title'] ); ?></h2>
			<?php endif; ?>

			<?php if ( ! empty( $args['text'] ) ) : ?>
				<p><?php echo esc_html( $args['text'] ); ?></p>
			<?php endif; ?>
		</div>

		<?php if ( ! empty( $args['actions'] ) ) : ?>
			<div class="cta-section__actions">
				<?php if ( 1 === count( $args['actions'] ) ) : ?>
					<?php
					foreach ( $args['actions'] as $action ) {
						langit_button( $action );
					}
					?>
				<?php else : ?>
					<div class="cluster support-cta__actions">
						<?php
						foreach ( $args['actions'] as $action ) {
							langit_button( $action );
						}
						?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
