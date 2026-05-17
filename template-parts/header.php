<?php
/**
 * Global site header.
 *
 * @package Langit
 */

$langit_description = get_bloginfo( 'description', 'display' );
?>

<header id="masthead" class="site-header">
	<div class="site-header__inner">
		<div class="site-branding">
			<?php langit_site_logo(); ?>
			<div class="site-branding__text">
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>

				<?php if ( $langit_description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo esc_html( $langit_description ); ?></p>
				<?php endif; ?>
			</div>
		</div>

		<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'langit' ); ?>">
			<button class="menu-toggle" type="button" aria-controls="primary-menu" aria-expanded="false" data-nav-toggle>
				<span class="screen-reader-text"><?php esc_html_e( 'Toggle menu', 'langit' ); ?></span>
				<span class="menu-toggle__bar" aria-hidden="true"></span>
			</button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'menu_class'     => 'primary-menu',
					'container'      => false,
					'items_wrap'     => '<ul id="%1$s" class="%2$s" data-primary-menu>%3$s</ul>',
					'fallback_cb'    => 'langit_primary_menu_fallback',
				)
			);
			?>
		</nav>
	</div>
</header>
