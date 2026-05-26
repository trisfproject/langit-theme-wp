<?php
/**
 * Maintenance and support page sections.
 *
 * @package Langit
 */

langit_page_hero(
	array(
		'eyebrow' => langit_theme_mod( 'maintenance_hero_eyebrow' ),
		'title'   => langit_theme_mod( 'maintenance_hero_title' ),
		'text'    => langit_theme_mod( 'maintenance_hero_description' ),
	)
);
?>

<?php if ( langit_theme_mod_enabled( 'show_maintenance_overview_section' ) ) : ?>
	<section class="section">
		<div class="container split-layout maintenance-overview-layout">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => langit_theme_mod( 'maintenance_overview_eyebrow' ),
					'title'   => langit_theme_mod( 'maintenance_overview_title' ),
					'text'    => langit_theme_mod( 'maintenance_overview_description' ),
					'class'   => 'stack',
				)
			);
			?>

			<div class="card maintenance-flow-card">
				<p class="card__meta"><?php esc_html_e( 'Support Flow', 'langit' ); ?></p>
				<ol class="quote-process-list">
					<li><?php esc_html_e( 'Inspection and issue identification.', 'langit' ); ?></li>
					<li><?php esc_html_e( 'Maintenance scope and priority review.', 'langit' ); ?></li>
					<li><?php esc_html_e( 'Corrective action or routine service execution.', 'langit' ); ?></li>
					<li><?php esc_html_e( 'Reporting, documentation, and follow-up support.', 'langit' ); ?></li>
				</ol>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if ( langit_theme_mod_enabled( 'show_maintenance_plans_section' ) ) : ?>
	<section class="section section--surface">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => langit_theme_mod( 'maintenance_plans_eyebrow' ),
					'title'   => langit_theme_mod( 'maintenance_plans_title' ),
					'text'    => langit_theme_mod( 'maintenance_plans_description' ),
					'center'  => true,
				)
			);
			?>
			<?php langit_maintenance_plan_cards(); ?>
		</div>
	</section>
<?php endif; ?>

<?php if ( langit_theme_mod_enabled( 'show_maintenance_coverage_section' ) ) : ?>
	<section class="section">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => langit_theme_mod( 'maintenance_coverage_eyebrow' ),
					'title'   => langit_theme_mod( 'maintenance_coverage_title' ),
					'text'    => langit_theme_mod( 'maintenance_coverage_description' ),
					'center'  => true,
				)
			);
			?>
			<?php langit_maintenance_coverage_cards(); ?>
		</div>
	</section>
<?php endif; ?>

<?php if ( langit_theme_mod_enabled( 'show_maintenance_sla_section' ) ) : ?>
	<section class="section section--surface">
		<div class="container stack">
			<?php
			langit_section_heading(
				array(
					'eyebrow' => langit_theme_mod( 'maintenance_sla_eyebrow' ),
					'title'   => langit_theme_mod( 'maintenance_sla_title' ),
					'text'    => langit_theme_mod( 'maintenance_sla_description' ),
					'center'  => true,
				)
			);
			?>
			<?php langit_maintenance_sla_cards(); ?>
		</div>
	</section>
<?php endif; ?>
