<?php
/**
 * Inquiry component.
 *
 * @package Langit
 */

$args = wp_parse_args(
	$args,
	array(
		'context'        => 'consultation',
		'title'          => '',
		'text'           => '',
		'actions'        => array(),
		'form_shortcode' => '',
		'show_form'      => false,
		'variant'        => 'consultation',
		'section_class'  => '',
		'panel_class'    => '',
	)
);

if ( empty( $args['title'] ) && empty( $args['text'] ) && empty( $args['actions'] ) ) {
	return;
}

$section_classes = array( 'section', $args['section_class'] );
$panel_classes   = array(
	'container',
	'cta-section',
	'inquiry-section',
	'cta-section--' . langit_cta_variant( $args['variant'] ),
	$args['panel_class'],
);
?>

<section class="<?php echo esc_attr( langit_class_names( $section_classes ) ); ?>">
	<div class="<?php echo esc_attr( langit_class_names( $panel_classes ) ); ?>" data-inquiry-context="<?php echo esc_attr( sanitize_key( $args['context'] ) ); ?>">
		<div class="cta-section__content stack">
			<p class="section-eyebrow"><?php esc_html_e( 'Inquiry', 'langit' ); ?></p>

			<?php if ( ! empty( $args['title'] ) ) : ?>
				<h2><?php echo esc_html( $args['title'] ); ?></h2>
			<?php endif; ?>

			<?php if ( ! empty( $args['text'] ) ) : ?>
				<p><?php echo esc_html( $args['text'] ); ?></p>
			<?php endif; ?>
		</div>

		<?php if ( ! empty( $args['actions'] ) || ( ! empty( $args['show_form'] ) && ! empty( $args['form_shortcode'] ) ) ) : ?>
			<div class="cta-section__actions inquiry-section__actions">
				<?php if ( ! empty( $args['actions'] ) ) : ?>
					<div class="cluster support-cta__actions">
						<?php
						foreach ( $args['actions'] as $action ) {
							langit_button( $action );
						}
						?>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $args['show_form'] ) && ! empty( $args['form_shortcode'] ) ) : ?>
					<div class="inquiry-section__form fluentform">
						<?php echo do_shortcode( wp_kses_post( $args['form_shortcode'] ) ); ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
