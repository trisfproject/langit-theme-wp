<?php
/**
 * Quote request page sections.
 *
 * @package Langit
 */

langit_page_hero(
	array(
		'eyebrow' => langit_theme_mod( 'quote_hero_eyebrow' ),
		'title'   => langit_theme_mod( 'quote_hero_title' ),
		'text'    => langit_theme_mod( 'quote_hero_description' ),
	)
);
?>

<?php if ( langit_theme_mod_enabled( 'show_quote_intro_section' ) ) : ?>
	<section class="section">
		<div class="container split-layout quote-intro-layout">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => langit_theme_mod( 'quote_intro_eyebrow' ),
					'title'   => langit_theme_mod( 'quote_intro_title' ),
					'text'    => langit_theme_mod( 'quote_intro_description' ),
					'class'   => 'stack',
				)
			);
			?>

			<div class="quote-process-card card">
				<p class="card__meta"><?php esc_html_e( 'Consultation Flow', 'langit' ); ?></p>
				<ol class="quote-process-list">
					<li><?php esc_html_e( 'Submit your project requirements.', 'langit' ); ?></li>
					<li><?php esc_html_e( 'Our team reviews the service scope.', 'langit' ); ?></li>
					<li><?php esc_html_e( 'Technical discussion or survey is scheduled.', 'langit' ); ?></li>
					<li><?php esc_html_e( 'Quotation and implementation direction are prepared.', 'langit' ); ?></li>
				</ol>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if ( langit_theme_mod_enabled( 'show_quote_services_section' ) ) : ?>
	<section class="section section--surface">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => langit_theme_mod( 'quote_services_eyebrow' ),
					'title'   => langit_theme_mod( 'quote_services_title' ),
					'text'    => langit_theme_mod( 'quote_services_description' ),
					'center'  => true,
				)
			);
			?>
			<?php langit_quote_service_selection(); ?>
		</div>
	</section>
<?php endif; ?>

<?php if ( langit_theme_mod_enabled( 'show_quote_form_section' ) ) : ?>
	<section class="section">
		<div class="container contact-form-layout quote-form-layout">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => langit_theme_mod( 'quote_form_eyebrow' ),
					'title'   => langit_theme_mod( 'quote_form_title' ),
					'text'    => langit_theme_mod( 'quote_form_description' ),
					'class'   => 'stack',
				)
			);
			?>

			<div class="contact-form-stack">
				<?php langit_quote_form_area(); ?>
				<aside class="quick-contact-card quote-whatsapp-card">
					<p class="section-eyebrow"><?php echo esc_html( langit_theme_mod( 'quote_whatsapp_eyebrow' ) ); ?></p>
					<h3><?php echo esc_html( langit_theme_mod( 'quote_whatsapp_title' ) ); ?></h3>
					<p><?php echo esc_html( langit_theme_mod( 'quote_whatsapp_description' ) ); ?></p>
					<?php
					langit_button(
						array(
							'url'   => langit_quote_whatsapp_url(),
							'label' => langit_theme_mod( 'quote_whatsapp_button_text' ),
						)
					);
					?>
				</aside>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if ( langit_theme_mod_enabled( 'show_quote_support_section' ) ) : ?>
	<section class="section section--surface">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => langit_theme_mod( 'quote_support_eyebrow' ),
					'title'   => langit_theme_mod( 'quote_support_title' ),
					'text'    => langit_theme_mod( 'quote_support_description' ),
					'center'  => true,
				)
			);
			?>
			<?php langit_quote_consultation_cards(); ?>
		</div>
	</section>
<?php endif; ?>

<?php
langit_cta(
	array(
		'eyebrow' => langit_theme_mod( 'quote_cta_eyebrow' ),
		'title'   => langit_theme_mod( 'quote_cta_title' ),
		'text'    => langit_theme_mod( 'quote_cta_description' ),
		'variant' => 'consultation',
		'actions' => array(
			array(
				'url'   => langit_theme_mod( 'quote_cta_primary_url' ),
				'label' => langit_theme_mod( 'quote_cta_primary_text' ),
			),
			array(
				'url'     => langit_quote_whatsapp_url(),
				'label'   => langit_theme_mod( 'quote_cta_secondary_text' ),
				'variant' => 'ghost',
			),
		),
	)
);
?>
