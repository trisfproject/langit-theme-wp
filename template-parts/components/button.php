<?php
/**
 * Button component.
 *
 * @package Langit
 */

$args = wp_parse_args(
	$args,
	array(
		'url'              => '',
		'label'            => '',
		'variant'          => 'primary',
		'class'            => '',
		'attrs'            => array(),
		'whatsapp_context' => '',
		'service_name'     => '',
	)
);

if ( empty( $args['url'] ) || empty( $args['label'] ) ) {
	return;
}

// Intercept "Contact Us" links and redirect to WhatsApp with contextual messages
$is_contact_url = ( false !== strpos( $args['url'], '/contact/' ) || '/contact' === $args['url'] || home_url( '/contact/' ) === $args['url'] || home_url( '/contact' ) === $args['url'] );
$is_anchor      = ( false !== strpos( $args['url'], '#' ) );
$is_whatsapp    = ( false !== strpos( $args['url'], 'wa.me' ) || false !== strpos( $args['url'], 'whatsapp.com' ) );

if ( ( $is_contact_url && ! $is_anchor ) || ! empty( $args['whatsapp_context'] ) ) {
	$context = ! empty( $args['whatsapp_context'] ) ? $args['whatsapp_context'] : '';

	if ( empty( $context ) ) {
		// Infer context automatically from current page
		if ( is_front_page() ) {
			$context = 'cta';
		} elseif ( is_page( 'company' ) ) {
			$context = 'company';
		} elseif ( is_page( 'contact' ) ) {
			$context = 'contact';
		} elseif ( is_singular( 'service' ) ) {
			$context = 'service';
		} elseif ( is_singular( 'project' ) ) {
			$context = 'project';
		}
	}

	$message = '';
	switch ( $context ) {
		case 'hero':
			$message = esc_html__( 'Halo Global Teknindo, saya ingin konsultasi kebutuhan sistem teknologi gedung.', 'langit' );
			break;
		case 'service':
		case 'services':
			$service_name = ! empty( $args['service_name'] ) ? $args['service_name'] : '';
			if ( empty( $service_name ) && is_singular( 'service' ) ) {
				$service_name = get_the_title();
			}
			if ( ! empty( $service_name ) ) {
				// phpcs:ignore WordPress.WP.I18n.NonSingularStringLiteralSingle, WordPress.WP.I18n.NonSingularStringLiteralFormat
				$message = sprintf( esc_html__( 'Halo Global Teknindo, saya tertarik dengan layanan %s.', 'langit' ), $service_name );
			} else {
				$message = esc_html__( 'Halo Global Teknindo, saya tertarik dengan layanan yang ditawarkan.', 'langit' );
			}
			break;
		case 'project':
		case 'projects':
			$message = esc_html__( 'Halo Global Teknindo, saya ingin konsultasi project serupa.', 'langit' );
			break;
		case 'cta':
			$message = esc_html__( 'Halo Global Teknindo, saya ingin diskusi kebutuhan infrastruktur dan teknologi gedung.', 'langit' );
			break;
		case 'company':
			$message = esc_html__( 'Halo Global Teknindo, saya ingin mengetahui lebih lanjut mengenai layanan dan solusi yang tersedia.', 'langit' );
			break;
		case 'contact':
			$message = esc_html__( 'Halo Global Teknindo, saya ingin menghubungi tim support dan konsultasi.', 'langit' );
			break;
		default:
			$message = esc_html__( 'Halo Global Teknindo, saya ingin konsultasi kebutuhan sistem teknologi gedung.', 'langit' );
			break;
	}

	$args['url'] = langit_contact_whatsapp_url( $message );
	$is_whatsapp = true;
}

if ( $is_whatsapp ) {
	$args['attrs']['target'] = '_blank';
	$args['attrs']['rel']    = 'noopener noreferrer';
}

if ( function_exists( 'langit_button_tracking_attributes' ) ) {
	$args['attrs'] = array_merge( langit_button_tracking_attributes( $args ), (array) $args['attrs'] );
	$args['class'] = trim( $args['class'] . ' langit-trackable-cta' );
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
	<?php if ( $is_whatsapp ) : ?>
		<svg class="button__icon button__icon--whatsapp" viewBox="0 0 24 24" width="18" height="18" fill="currentColor" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
			<path d="M19.05 4.91A9.816 9.816 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01zm-7.01 15.24c-1.48 0-2.93-.4-4.18-1.15l-.3-.18-3.12.82.83-3.04-.2-.31a8.212 8.212 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24 2.2 0 4.27.86 5.82 2.42a8.177 8.177 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.24 8.23zm4.52-6.16c-.25-.12-1.47-.72-1.69-.81-.23-.08-.39-.12-.56.12-.17.25-.64.81-.78.97-.14.17-.29.19-.54.06-1.54-.77-2.6-1.37-3.64-3.16-.27-.47.27-.44.78-1.46.08-.17.04-.31-.02-.44-.06-.12-.56-1.35-.77-1.85-.2-.5-.4-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.87.85-.87 2.07 0 1.22.89 2.4 1.01 2.56.12.17 1.75 2.67 4.23 3.74.59.26 1.05.41 1.41.52.59.19 1.13.16 1.56.1.48-.07 1.47-.6 1.67-1.18.21-.58.21-1.07.14-1.18s-.22-.16-.47-.28z"/>
		</svg>
	<?php endif; ?>
	<span><?php echo esc_html( $args['label'] ); ?></span>
</a>
