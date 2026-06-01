<?php
/**
 * Global site footer.
 *
 * @package Langit
 */

$footer_company = array(
	esc_html__( 'About Company', 'langit' )    => home_url( '/company/#company-overview' ),
	esc_html__( 'Vision & Mission', 'langit' ) => home_url( '/company/#vision-mission' ),
	esc_html__( 'Clients', 'langit' )          => langit_get_clients_archive_url(),
);

$footer_services = array();
$langit_services_posts = get_posts(
	array(
		'post_type'      => 'service',
		'post_status'    => 'publish',
		'posts_per_page' => 5,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
	)
);
if ( ! empty( $langit_services_posts ) ) {
	foreach ( $langit_services_posts as $langit_service ) {
		$footer_services[ get_the_title( $langit_service ) ] = get_permalink( $langit_service );
	}
} else {
	$footer_services = array(
		esc_html__( 'CCTV & Security System', 'langit' )    => home_url( '/service/cctv-security-system/' ),
		esc_html__( 'Networking Infrastructure', 'langit' ) => home_url( '/service/networking-infrastructure/' ),
		esc_html__( 'Mechanical Electrical', 'langit' )     => home_url( '/service/mechanical-electrical/' ),
		esc_html__( 'Fire Alarm System', 'langit' )         => home_url( '/service/fire-alarm-system/' ),
		esc_html__( 'Audio & Public Address', 'langit' )     => home_url( '/service/audio-public-address/' ),
	);
}

$footer_projects = array();
$langit_projects_posts = get_posts(
	array(
		'post_type'      => 'project',
		'post_status'    => 'publish',
		'posts_per_page' => 5,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
	)
);
if ( ! empty( $langit_projects_posts ) ) {
	foreach ( $langit_projects_posts as $langit_project ) {
		$client_name = get_post_meta( $langit_project->ID, 'langit_project_client', true );
		$display_name = ! empty( $client_name ) ? $client_name : get_the_title( $langit_project );
		$footer_projects[ $display_name ] = get_permalink( $langit_project );
	}
} else {
	$footer_projects = array(
		esc_html__( 'Fire Alarm Integration', 'langit' ) => home_url( '/project/fire-alarm-system-integration/' ),
		esc_html__( 'Audio & Public Address', 'langit' ) => home_url( '/project/audio-public-address-installation/' ),
		esc_html__( 'CCTV Surveillance', 'langit' )      => home_url( '/project/cctv-installation-commercial-building/' ),
		esc_html__( 'Network Deployment', 'langit' )     => home_url( '/project/network-infrastructure-deployment/' ),
	);
}

$footer_contact = array(
	langit_theme_mod( 'contact_whatsapp_number' ) => langit_contact_whatsapp_url(),
	langit_theme_mod( 'contact_email_address' )   => 'mailto:' . langit_theme_mod( 'contact_email_address' ),
	esc_html__( 'View Location Details', 'langit' ) => home_url( '/contact/#contact-information' ),
	esc_html__( 'View Business Hours', 'langit' )   => home_url( '/contact/#contact-information' ),
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
		<div class="site-footer__brand">
			<p class="site-footer__company"><?php echo esc_html( langit_theme_mod( 'company_name' ) ); ?></p>
			<p><?php echo esc_html( langit_theme_mod( 'company_short_description' ) ); ?></p>
		</div>

		<div class="site-footer__grid">
			<nav class="footer-column" aria-label="<?php esc_attr_e( 'Company footer links', 'langit' ); ?>">
				<h3><?php esc_html_e( 'Company', 'langit' ); ?></h3>
				<?php langit_footer_link_list( $footer_company ); ?>
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
