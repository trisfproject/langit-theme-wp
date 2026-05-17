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

$footer_blog = array(
	esc_html__( 'Latest Articles', 'langit' ) => home_url( '/blog/' ),
	esc_html__( 'Categories', 'langit' )      => home_url( '/category/news/' ),
);

$footer_contact = array(
	esc_html__( 'WhatsApp', 'langit' )      => 'https://wa.me/6281200000000',
	esc_html__( 'Email', 'langit' )         => 'mailto:info@globalteknindo.co.id',
	esc_html__( 'Address', 'langit' )       => home_url( '/contact/#map' ),
	esc_html__( 'Working Hours', 'langit' ) => home_url( '/contact/#contact-information' ),
);
?>

<section class="footer-cta">
	<div class="container footer-cta__inner">
		<h2><?php esc_html_e( 'Ready to build a reliable building technology system?', 'langit' ); ?></h2>
		<a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact Us', 'langit' ); ?></a>
	</div>
</section>

<footer id="colophon" class="site-footer">
	<div class="site-footer__inner">
		<div class="site-footer__brand">
			<a class="site-footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/langit-logo-light.svg' ); ?>" width="220" height="64" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
			</a>
			<p class="site-footer__company"><?php esc_html_e( 'PT Global Teknindo', 'langit' ); ?></p>
			<p><?php esc_html_e( 'Perusahaan teknologi gedung yang menyediakan solusi Mechanical Electrical, CCTV, jaringan, fire alarm, audio, instalasi, dan pemeliharaan dengan pendekatan profesional serta terstruktur.', 'langit' ); ?></p>
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

			<nav class="footer-column" aria-label="<?php esc_attr_e( 'Blog footer links', 'langit' ); ?>">
				<h3><?php esc_html_e( 'Blog', 'langit' ); ?></h3>
				<?php langit_footer_link_list( $footer_blog ); ?>
			</nav>

			<nav class="footer-column" aria-label="<?php esc_attr_e( 'Contact footer links', 'langit' ); ?>">
				<h3><?php esc_html_e( 'Contact', 'langit' ); ?></h3>
				<?php langit_footer_link_list( $footer_contact ); ?>
			</nav>
		</div>

		<?php if ( is_active_sidebar( 'footer-widgets' ) ) : ?>
			<div class="site-footer__widgets">
				<?php dynamic_sidebar( 'footer-widgets' ); ?>
			</div>
		<?php endif; ?>
	</div>

	<div class="site-footer__bottom">
		<div class="site-footer__bottom-inner">
			<p>
				<?php
				printf(
					esc_html__( 'Copyright %1$s %2$s. All rights reserved.', 'langit' ),
					esc_html( date_i18n( 'Y' ) ),
					esc_html( get_bloginfo( 'name' ) )
				);
				?>
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
