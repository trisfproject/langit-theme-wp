<?php
/**
 * Contact and inquiry helpers.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Render a configured contact form shortcode with a graceful placeholder.
 */
function langit_contact_form_area() {
	$shortcode       = trim( langit_theme_mod( 'contact_form_shortcode' ) );
	$shortcode_ready = false;

	if ( preg_match( '/\[([a-zA-Z0-9_-]+)/', $shortcode, $matches ) ) {
		$shortcode_ready = shortcode_exists( $matches[1] );
	}
	?>
	<div class="form-placeholder contact-form-panel">
		<?php if ( ! empty( $shortcode ) && $shortcode_ready ) : ?>
			<div class="contact-form-panel__shortcode fluentform">
				<?php echo do_shortcode( wp_kses_post( $shortcode ) ); ?>
			</div>
		<?php else : ?>
			<div class="form-placeholder__fields" aria-hidden="true">
				<span><?php esc_html_e( 'Full Name', 'langit' ); ?></span>
				<span><?php esc_html_e( 'Company Name', 'langit' ); ?></span>
				<span><?php esc_html_e( 'Email Address', 'langit' ); ?></span>
				<span><?php esc_html_e( 'WhatsApp Number', 'langit' ); ?></span>
				<span><?php esc_html_e( 'Service Needed', 'langit' ); ?></span>
				<span class="form-placeholder__message"><?php esc_html_e( 'Message', 'langit' ); ?></span>
			</div>
			<div class="shortcode-placeholder">
				<?php echo esc_html( ! empty( $shortcode ) ? $shortcode : __( 'Add a form shortcode in Appearance > Customize.', 'langit' ) ); ?>
			</div>
		<?php endif; ?>
	</div>
	<?php
}

/**
 * Render a reusable WhatsApp quick contact card.
 */
function langit_whatsapp_quick_contact() {
	?>
	<aside class="quick-contact-card">
		<p class="section-eyebrow"><?php echo esc_html( langit_theme_mod( 'contact_quick_eyebrow' ) ); ?></p>
		<h3><?php echo esc_html( langit_theme_mod( 'contact_quick_title' ) ); ?></h3>
		<p><?php echo esc_html( langit_theme_mod( 'contact_quick_description' ) ); ?></p>
		<?php
		langit_button(
			array(
				'url'   => langit_contact_whatsapp_url(),
				'label' => langit_theme_mod( 'contact_quick_button_text' ),
			)
		);
		?>
	</aside>
	<?php
}

/**
 * Render a responsive Google Maps embed or link fallback.
 */
function langit_contact_map() {
	$embed_url = langit_theme_mod( 'contact_google_maps_embed_url' );
	$link_url  = langit_theme_mod( 'contact_google_maps_url' );
	$address   = langit_theme_mod( 'company_address' );

	if ( ! empty( $embed_url ) ) :
		?>
		<div class="map-embed">
			<iframe
				src="<?php echo esc_url( $embed_url ); ?>"
				title="<?php echo esc_attr( langit_theme_mod( 'contact_map_title' ) ); ?>"
				loading="lazy"
				referrerpolicy="no-referrer-when-downgrade"
				allowfullscreen>
			</iframe>
		</div>
		<?php
		return;
	endif;
	?>
	<div class="map-placeholder" role="img" aria-label="<?php esc_attr_e( 'Service area map', 'langit' ); ?>">
		<a href="<?php echo esc_url( $link_url ); ?>" target="_blank" rel="noopener noreferrer">
			<?php echo esc_html( $address ); ?>
		</a>
	</div>
	<?php
}
