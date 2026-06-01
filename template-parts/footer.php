<?php
/**
 * Global site footer.
 *
 * @package Langit
 */

$langit_footer_phone   = langit_theme_mod( 'contact_whatsapp_number' );
$langit_footer_email   = langit_theme_mod( 'contact_email_address' );
$langit_footer_wa_url  = langit_contact_whatsapp_url();
$langit_footer_address = langit_theme_mod( 'company_address' );
$langit_footer_hours   = langit_theme_mod( 'company_working_hours' );
?>

<section class="footer-cta">
	<div class="container footer-cta__inner">
		<h2><?php echo esc_html( langit_theme_mod( 'footer_cta_title' ) ); ?></h2>
		<p><?php echo esc_html( langit_theme_mod( 'footer_cta_description' ) ); ?></p>
		<?php
		langit_button(
			array(
				'url'   => langit_theme_mod( 'footer_cta_button_url' ),
				'label' => langit_theme_mod( 'footer_cta_button_text' ),
			)
		);
		?>
	</div>
</section>

<footer id="colophon" class="site-footer">
	<div class="site-footer__inner">

		<!-- Column 1: Company identity -->
		<div class="site-footer__col site-footer__col--company">
			<p class="site-footer__company"><?php echo esc_html( langit_theme_mod( 'company_name' ) ); ?></p>
			<p class="site-footer__tagline"><?php echo esc_html( langit_theme_mod( 'company_short_description' ) ); ?></p>
		</div>

		<!-- Column 2: Contact (phone + email) -->
		<div class="site-footer__col site-footer__col--contact">
			<h3 class="site-footer__col-heading"><?php esc_html_e( 'Contact', 'langit' ); ?></h3>

			<dl class="site-footer__detail-list">

				<?php if ( ! empty( $langit_footer_phone ) ) : ?>
				<div class="site-footer__detail-item">
					<dt><?php esc_html_e( 'Phone', 'langit' ); ?></dt>
					<dd><a href="<?php echo esc_url( $langit_footer_wa_url ); ?>"><?php echo esc_html( $langit_footer_phone ); ?></a></dd>
				</div>
				<?php endif; ?>

				<?php if ( ! empty( $langit_footer_email ) ) : ?>
				<div class="site-footer__detail-item">
					<dt><?php esc_html_e( 'Email', 'langit' ); ?></dt>
					<dd><a href="mailto:<?php echo esc_attr( $langit_footer_email ); ?>"><?php echo esc_html( $langit_footer_email ); ?></a></dd>
				</div>
				<?php endif; ?>

			</dl>
		</div>

		<!-- Column 3: Office (working hours + address) -->
		<div class="site-footer__col site-footer__col--office">
			<h3 class="site-footer__col-heading"><?php esc_html_e( 'Office', 'langit' ); ?></h3>

			<dl class="site-footer__detail-list">

				<?php if ( ! empty( $langit_footer_hours ) ) : ?>
				<div class="site-footer__detail-item">
					<dt><?php esc_html_e( 'Working Hours', 'langit' ); ?></dt>
					<dd><?php echo nl2br( esc_html( $langit_footer_hours ) ); ?></dd>
				</div>
				<?php endif; ?>

				<?php if ( ! empty( $langit_footer_address ) ) : ?>
				<div class="site-footer__detail-item">
					<dt><?php esc_html_e( 'Address', 'langit' ); ?></dt>
					<dd><?php echo nl2br( esc_html( $langit_footer_address ) ); ?></dd>
				</div>
				<?php endif; ?>

			</dl>
		</div>

	</div>

	<div class="site-footer__bottom">
		<div class="site-footer__bottom-inner">
			<p>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> PT Global Teknindo. All Rights Reserved.</p>
		</div>
	</div>
</footer>
