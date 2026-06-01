<?php
/**
 * Global site footer.
 *
 * @package Langit
 */

$footer_company_nav = array(
	esc_html__( 'About Company', 'langit' )    => home_url( '/company/#company-overview' ),
	esc_html__( 'Vision & Mission', 'langit' ) => home_url( '/company/#vision-mission' ),
	esc_html__( 'Clients', 'langit' )          => home_url( '/company/#clients' ),
);

$footer_contact = array(
	langit_theme_mod( 'contact_whatsapp_number' ) => langit_contact_whatsapp_url(),
	langit_theme_mod( 'contact_email_address' )   => 'mailto:' . langit_theme_mod( 'contact_email_address' ),
);
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

		<!-- Left column: brand + navigation -->
		<div class="site-footer__left">
			<div class="site-footer__brand">
				<p class="site-footer__company"><?php echo esc_html( langit_theme_mod( 'company_name' ) ); ?></p>
				<p><?php echo esc_html( langit_theme_mod( 'company_short_description' ) ); ?></p>
			</div>

			<nav class="site-footer__nav" aria-label="<?php esc_attr_e( 'Footer company navigation', 'langit' ); ?>">
				<?php langit_footer_link_list( $footer_company_nav ); ?>
			</nav>
		</div>

		<!-- Right column: contact -->
		<div class="site-footer__right">
			<nav class="footer-column" aria-label="<?php esc_attr_e( 'Contact footer links', 'langit' ); ?>">
				<h3><?php esc_html_e( 'Contact', 'langit' ); ?></h3>
				<?php langit_footer_link_list( $footer_contact ); ?>
			</nav>
		</div>

	</div>

	<div class="site-footer__bottom">
		<div class="site-footer__bottom-inner">
			<p>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> PT Global Teknindo. All Rights Reserved.</p>
		</div>
	</div>
</footer>
