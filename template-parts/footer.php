<?php
/**
 * Global site footer.
 *
 * @package Langit
 */

$footer_company = array(
	esc_html__( 'About Company', 'langit' )    => home_url( '/company/#company-overview' ),
	esc_html__( 'Vision & Mission', 'langit' ) => home_url( '/company/#vision-mission' ),
	esc_html__( 'Legality', 'langit' )         => home_url( '/company/#company-legality' ),
	esc_html__( 'Contact', 'langit' )          => home_url( '/contact/' ),
);

$footer_products = array(
	esc_html__( 'CCTV & Security System', 'langit' )     => home_url( '/products/#cctv-security-system' ),
	esc_html__( 'Networking Infrastructure', 'langit' )  => home_url( '/products/#networking-infrastructure' ),
	esc_html__( 'Mechanical Electrical', 'langit' )      => home_url( '/products/#mechanical-electrical' ),
	esc_html__( 'Fire Alarm System', 'langit' )          => home_url( '/products/#fire-alarm-system' ),
	esc_html__( 'Audio & Public Address', 'langit' )     => home_url( '/products/#audio-public-address' ),
	esc_html__( 'Installation & Maintenance', 'langit' ) => home_url( '/products/#installation-maintenance' ),
);

$footer_contact = array(
	langit_theme_mod( 'contact_whatsapp_number' ) => langit_contact_whatsapp_url(),
	langit_theme_mod( 'contact_email_address' )   => 'mailto:' . langit_theme_mod( 'contact_email_address' ),
	langit_theme_mod( 'company_address' )         => langit_theme_mod( 'contact_google_maps_url' ),
	langit_theme_mod( 'company_working_hours' )   => home_url( '/contact/#contact-information' ),
);

$footer_social = array_filter(
	array(
		esc_html__( 'Instagram', 'langit' ) => langit_theme_mod( 'social_instagram_url' ),
		esc_html__( 'Facebook', 'langit' )  => langit_theme_mod( 'social_facebook_url' ),
		esc_html__( 'LinkedIn', 'langit' )  => langit_theme_mod( 'social_linkedin_url' ),
		esc_html__( 'YouTube', 'langit' )   => langit_theme_mod( 'social_youtube_url' ),
	)
);

$footer_contact = array_merge( $footer_contact, $footer_social );

$footer_copyright = str_replace(
	array( '{year}', '{site_name}' ),
	array( date_i18n( 'Y' ), get_bloginfo( 'name' ) ),
	langit_theme_mod( 'footer_copyright_text' )
);
?>

<section class="footer-cta">
	<div class="container footer-cta__inner">
		<h2><?php echo esc_html( langit_theme_mod( 'footer_cta_title' ) ); ?></h2>
		<a class="button" href="<?php echo esc_url( langit_theme_mod( 'footer_cta_button_url' ) ); ?>"><?php echo esc_html( langit_theme_mod( 'footer_cta_button_text' ) ); ?></a>
	</div>
</section>

<footer id="colophon" class="site-footer">
	<div class="site-footer__inner">
		<div class="site-footer__brand">
			<a class="site-footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/footer-logo.png' ); ?>" width="256" height="256" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
			</a>
			<p class="site-footer__company"><?php echo esc_html( langit_theme_mod( 'company_name' ) ); ?></p>
			<p><?php echo esc_html( langit_theme_mod( 'company_short_description' ) ); ?></p>
		</div>

		<div class="site-footer__grid">
			<nav class="footer-column" aria-label="<?php esc_attr_e( 'Company footer links', 'langit' ); ?>">
				<h3><?php esc_html_e( 'Company', 'langit' ); ?></h3>
				<?php langit_footer_link_list( $footer_company ); ?>
			</nav>

			<nav class="footer-column" aria-label="<?php esc_attr_e( 'Products footer links', 'langit' ); ?>">
				<h3><?php esc_html_e( 'Products', 'langit' ); ?></h3>
				<?php langit_footer_link_list( $footer_products ); ?>
			</nav>

			<nav class="footer-column" aria-label="<?php esc_attr_e( 'Contact footer links', 'langit' ); ?>">
				<h3><?php esc_html_e( 'Contact', 'langit' ); ?></h3>
				<?php langit_footer_link_list( $footer_contact ); ?>
			</nav>
		</div>
	</div>

	<div class="site-footer__bottom">
		<div class="site-footer__bottom-inner">
			<p>
				<?php echo esc_html( $footer_copyright ); ?>
			</p>
			<nav aria-label="<?php esc_attr_e( 'Footer secondary menu', 'langit' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_class'     => 'footer-bottom-menu',
						'container'      => false,
						'depth'          => 1,
						'fallback_cb'    => 'langit_footer_bottom_menu_fallback',
					)
				);
				?>
			</nav>
		</div>
	</div>
</footer>
