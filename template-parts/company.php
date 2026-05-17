<?php
/**
 * Company page sections.
 *
 * @package Langit
 */

$langit_icon_uri     = get_template_directory_uri() . '/assets/icons/';
$langit_capabilities = array_values( array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', langit_theme_mod( 'company_capability_items' ) ) ) ) );
$langit_missions     = langit_company_missions();
$langit_values       = langit_company_card_rows( 'company_values', 'maintenance.svg' );
$langit_industries   = langit_company_card_rows( 'company_industries', 'network.svg' );
$langit_workflow     = langit_company_card_rows( 'company_workflow_items', 'document.svg' );

$langit_legalities = array(
	esc_html__( 'NIB', 'langit' ),
	esc_html__( 'NPWP', 'langit' ),
	esc_html__( 'Certifications', 'langit' ),
	esc_html__( 'Company Documents', 'langit' ),
);
?>

<?php
langit_page_hero(
	array(
		'eyebrow' => esc_html__( 'Company', 'langit' ),
		'title'   => langit_theme_mod( 'company_page_hero_title' ),
		'text'    => langit_theme_mod( 'company_page_hero_description' ),
	)
);
?>

<section id="company-overview" class="section">
	<div class="container company-overview">
		<div class="stack">
			<p class="section-eyebrow"><?php echo esc_html( langit_theme_mod( 'company_about_eyebrow' ) ); ?></p>
			<h2><?php echo esc_html( langit_theme_mod( 'company_about_title' ) ); ?></h2>
			<p><?php echo esc_html( langit_theme_mod( 'company_about_description' ) ); ?></p>
		</div>

		<?php if ( ! empty( $langit_capabilities ) ) : ?>
			<div class="capability-list">
				<?php foreach ( $langit_capabilities as $langit_capability ) : ?>
					<div class="capability-item"><?php echo esc_html( $langit_capability ); ?></div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>

<section id="vision-mission" class="section section--surface">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Vision & Mission', 'langit' ),
				'title'   => langit_theme_mod( 'company_vision_title' ),
				'center'  => true,
			)
		);
		?>

		<div class="vision-mission-grid">
			<article class="card statement-card statement-card--vision">
				<p class="card__meta"><?php esc_html_e( 'Vision', 'langit' ); ?></p>
				<p><?php echo esc_html( langit_theme_mod( 'company_vision_text' ) ); ?></p>
			</article>

			<article class="card statement-card">
				<p class="card__meta"><?php esc_html_e( 'Mission', 'langit' ); ?></p>
				<ol class="mission-list">
					<?php foreach ( $langit_missions as $langit_mission ) : ?>
						<li><?php echo esc_html( $langit_mission ); ?></li>
					<?php endforeach; ?>
				</ol>
			</article>
		</div>
	</div>
</section>

<section id="company-values" class="section">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Company Values', 'langit' ),
				'title'   => langit_theme_mod( 'company_value_title' ),
				'center'  => true,
			)
		);
		?>

		<div class="feature-grid">
			<?php foreach ( $langit_values as $langit_value ) : ?>
				<?php
				langit_card(
					array(
						'title'      => $langit_value['title'],
						'text'       => $langit_value['description'],
						'class'      => 'feature-card',
						'icon_class' => 'service-card__icon',
						'icon_url'   => $langit_icon_uri . $langit_value['icon'],
					)
				);
				?>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section id="industry-coverage" class="section section--surface">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Industry Coverage', 'langit' ),
				'title'   => langit_theme_mod( 'company_industry_title' ),
				'center'  => true,
			)
		);
		?>

		<div class="coverage-grid">
			<?php foreach ( $langit_industries as $langit_industry ) : ?>
				<article class="coverage-card solution-card">
					<h3><?php echo esc_html( $langit_industry['title'] ); ?></h3>
					<p><?php echo esc_html( $langit_industry['description'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section id="operational-workflow" class="section">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Operational Workflow', 'langit' ),
				'title'   => langit_theme_mod( 'company_workflow_title' ),
				'center'  => true,
			)
		);
		?>

		<div class="process-grid">
			<?php foreach ( $langit_workflow as $langit_index => $langit_step ) : ?>
				<article class="process-card">
					<span><?php echo esc_html( str_pad( (string) ( $langit_index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
					<h3><?php echo esc_html( $langit_step['title'] ); ?></h3>
					<p><?php echo esc_html( $langit_step['description'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section id="company-legality" class="section section--surface">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Company Legality', 'langit' ),
				'title'   => esc_html__( 'Prepared documentation for professional collaboration.', 'langit' ),
				'center'  => true,
			)
		);
		?>

		<div class="legality-grid">
			<?php foreach ( $langit_legalities as $langit_legality ) : ?>
				<article class="legality-card">
					<img src="<?php echo esc_url( $langit_icon_uri . 'document.svg' ); ?>" width="48" height="48" alt="" loading="lazy" decoding="async" aria-hidden="true">
					<h3><?php echo esc_html( $langit_legality ); ?></h3>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section">
	<div class="container stack">
		<?php
		langit_section_heading(
			array(
				'eyebrow' => esc_html__( 'Why Choose Us', 'langit' ),
				'title'   => langit_theme_mod( 'company_why_title' ),
				'center'  => true,
			)
		);
		?>

		<div class="feature-grid">
			<?php foreach ( array_slice( $langit_values, 0, 4 ) as $langit_value ) : ?>
				<?php
				langit_card(
					array(
						'title'      => $langit_value['title'],
						'text'       => $langit_value['description'],
						'class'      => 'feature-card',
						'icon_class' => 'service-card__icon',
						'icon_url'   => $langit_icon_uri . $langit_value['icon'],
					)
				);
				?>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
langit_cta(
	array(
		'title'   => langit_theme_mod( 'company_cta_title' ),
		'text'    => langit_theme_mod( 'company_cta_description' ),
		'actions' => langit_cta_actions_from_settings( 'company_cta' ),
	)
);
?>
