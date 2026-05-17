<?php
/**
 * Analytics, tracking, and lightweight marketing integrations.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sanitize provider IDs while avoiding hardcoded assumptions.
 *
 * @param string $value Raw tracking ID.
 * @return string
 */
function langit_sanitize_tracking_id( $value ) {
	return preg_replace( '/[^A-Za-z0-9_-]/', '', (string) $value );
}

/**
 * Sanitize numeric pixel IDs.
 *
 * @param string $value Raw pixel ID.
 * @return string
 */
function langit_sanitize_pixel_id( $value ) {
	return preg_replace( '/[^0-9]/', '', (string) $value );
}

/**
 * Sanitize custom tracking snippets for trusted administrators.
 *
 * @param string $value Raw script value.
 * @return string
 */
function langit_sanitize_tracking_snippet( $value ) {
	if ( ! current_user_can( 'unfiltered_html' ) ) {
		return '';
	}

	$allowed = array(
		'script'   => array(
			'async'       => true,
			'defer'       => true,
			'id'          => true,
			'src'         => true,
			'type'        => true,
			'crossorigin' => true,
			'integrity'   => true,
			'data-*'      => true,
		),
		'noscript' => array(),
		'iframe'   => array(
			'height' => true,
			'width'  => true,
			'style'  => true,
			'src'    => true,
			'title'  => true,
		),
		'img'      => array(
			'alt'    => true,
			'height' => true,
			'width'  => true,
			'style'  => true,
			'src'    => true,
		),
	);

	return wp_kses( (string) $value, $allowed );
}

/**
 * Determine whether a major SEO plugin is likely handling schema output.
 *
 * @return bool
 */
function langit_has_schema_plugin() {
	return defined( 'RANK_MATH_VERSION' )
		|| defined( 'WPSEO_VERSION' )
		|| class_exists( 'RankMath' )
		|| class_exists( 'WPSEO_Frontend' );
}

/**
 * Output configured analytics snippets in wp_head.
 */
function langit_output_tracking_head() {
	static $printed = false;

	if ( $printed ) {
		return;
	}

	$printed = true;

	$gtm_id      = langit_theme_mod( 'tracking_gtm_id' );
	$ga_id       = langit_theme_mod( 'tracking_ga_id' );
	$meta_id     = langit_theme_mod( 'tracking_meta_pixel_id' );
	$clarity_id  = langit_theme_mod( 'tracking_clarity_id' );
	$head_script = langit_theme_mod( 'tracking_custom_head_scripts' );

	if ( ! empty( $gtm_id ) ) :
		?>
		<script data-langit-tracking="google-tag-manager">
			(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer',<?php echo wp_json_encode( $gtm_id ); ?>);
		</script>
		<?php
	endif;

	if ( ! empty( $ga_id ) ) :
		?>
		<script async src="<?php echo esc_url( 'https://www.googletagmanager.com/gtag/js?id=' . rawurlencode( $ga_id ) ); ?>" data-langit-tracking="google-analytics"></script>
		<script data-langit-tracking="google-analytics">
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', <?php echo wp_json_encode( $ga_id ); ?>);
		</script>
		<?php
	endif;

	if ( ! empty( $meta_id ) ) :
		?>
		<script data-langit-tracking="meta-pixel">
			!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
			n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
			n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
			t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
			document,'script','https://connect.facebook.net/en_US/fbevents.js');
			fbq('init', <?php echo wp_json_encode( $meta_id ); ?>);
			fbq('track', 'PageView');
		</script>
		<?php
	endif;

	if ( ! empty( $clarity_id ) ) :
		?>
		<script data-langit-tracking="microsoft-clarity">
			(function(c,l,a,r,i,t,y){c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
			t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
			y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
			})(window, document, "clarity", "script", <?php echo wp_json_encode( $clarity_id ); ?>);
		</script>
		<?php
	endif;

	if ( langit_theme_mod_enabled( 'tracking_schema_enabled' ) && ! langit_has_schema_plugin() ) {
		langit_output_organization_schema();
	}

	if ( ! empty( $head_script ) ) {
		echo "\n" . $head_script . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
add_action( 'wp_head', 'langit_output_tracking_head', 20 );

/**
 * Output configured analytics snippets in wp_footer.
 */
function langit_output_tracking_footer() {
	static $printed = false;

	if ( $printed ) {
		return;
	}

	$printed = true;

	$gtm_id        = langit_theme_mod( 'tracking_gtm_id' );
	$meta_id       = langit_theme_mod( 'tracking_meta_pixel_id' );
	$footer_script = langit_theme_mod( 'tracking_custom_footer_scripts' );

	if ( ! empty( $gtm_id ) ) :
		?>
		<noscript data-langit-tracking="google-tag-manager"><iframe src="<?php echo esc_url( 'https://www.googletagmanager.com/ns.html?id=' . rawurlencode( $gtm_id ) ); ?>" height="0" width="0" style="display:none;visibility:hidden" title="<?php esc_attr_e( 'Google Tag Manager', 'langit' ); ?>"></iframe></noscript>
		<?php
	endif;

	if ( ! empty( $meta_id ) ) :
		?>
		<noscript data-langit-tracking="meta-pixel"><img height="1" width="1" style="display:none" alt="" src="<?php echo esc_url( 'https://www.facebook.com/tr?id=' . rawurlencode( $meta_id ) . '&ev=PageView&noscript=1' ); ?>"></noscript>
		<?php
	endif;

	if ( ! empty( $footer_script ) ) {
		echo "\n" . $footer_script . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
add_action( 'wp_footer', 'langit_output_tracking_footer', 20 );

/**
 * Output optional Organization schema when SEO plugins are not handling it.
 */
function langit_output_organization_schema() {
	$logo_id  = get_theme_mod( 'custom_logo' );
	$logo_url = $logo_id ? wp_get_attachment_image_url( $logo_id, 'full' ) : get_template_directory_uri() . '/assets/images/langit-icon.svg';
	$schema   = array(
		'@context' => 'https://schema.org',
		'@type'    => 'LocalBusiness',
		'name'     => langit_theme_mod( 'company_name' ),
		'url'      => home_url( '/' ),
		'logo'     => $logo_url,
		'email'    => langit_theme_mod( 'contact_email_address' ),
		'telephone' => langit_theme_mod( 'contact_whatsapp_number' ),
		'address'  => array(
			'@type'           => 'PostalAddress',
			'streetAddress'   => langit_theme_mod( 'company_address' ),
			'addressCountry'  => 'ID',
		),
	);

	printf(
		'<script type="application/ld+json" data-langit-schema="organization">%s</script>' . "\n",
		wp_json_encode( array_filter( $schema ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE )
	);
}

/**
 * Return tracking-ready attributes for reusable CTA buttons.
 *
 * @param array<string,mixed> $args Button arguments.
 * @return array<string,string>
 */
function langit_button_tracking_attributes( $args ) {
	$url   = isset( $args['url'] ) ? (string) $args['url'] : '';
	$label = isset( $args['label'] ) ? (string) $args['label'] : '';
	$haystack = strtolower( $url . ' ' . $label );
	$type     = 'cta';

	if ( false !== strpos( $haystack, 'wa.me' ) || false !== strpos( $haystack, 'whatsapp' ) ) {
		$type = 'whatsapp';
	} elseif ( false !== strpos( $haystack, 'quote' ) ) {
		$type = 'quote-request';
	} elseif ( false !== strpos( $haystack, 'consult' ) ) {
		$type = 'consultation';
	} elseif ( false !== strpos( $haystack, 'contact' ) ) {
		$type = 'contact';
	}

	return array(
		'data-langit-track'       => 'cta',
		'data-langit-track-type'  => $type,
		'data-langit-track-label' => sanitize_text_field( $label ),
	);
}

/**
 * Add lightweight privacy policy starter text for configured tracking tools.
 */
function langit_add_privacy_policy_tracking_content() {
	if ( ! function_exists( 'wp_add_privacy_policy_content' ) ) {
		return;
	}

	$content = '<p>' . esc_html__( 'Tema ini menyediakan integrasi opsional untuk Google Analytics, Google Tag Manager, Meta Pixel, Microsoft Clarity, dan skrip pemasaran tepercaya. Integrasi hanya aktif ketika ID atau skrip diisi oleh administrator situs melalui Customizer.', 'langit' ) . '</p>';
	$content .= '<p>' . esc_html__( 'Situs dapat menggunakan cookie atau teknologi serupa dari layanan pihak ketiga tersebut untuk analitik, pengukuran konversi, dan peningkatan pengalaman pengguna. Pastikan konfigurasi tracking mengikuti kebijakan privasi, persetujuan cookie, dan regulasi yang berlaku.', 'langit' ) . '</p>';

	wp_add_privacy_policy_content( esc_html__( 'Langit Theme Tracking', 'langit' ), wp_kses_post( $content ) );
}
add_action( 'admin_init', 'langit_add_privacy_policy_tracking_content' );
