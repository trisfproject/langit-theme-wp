<?php
/**
 * Maintenance and support helpers.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return the Maintenance page URL fallback.
 *
 * @return string
 */
function langit_get_maintenance_url() {
	$page = get_page_by_path( 'maintenance' );

	return $page ? get_permalink( $page ) : home_url( '/maintenance/' );
}

/**
 * Parse Maintenance rows.
 *
 * Expected row format: Title | Description | Meta.
 *
 * @param string $key Customizer setting key.
 * @return array<int,array<string,string>>
 */
function langit_maintenance_rows( $key ) {
	$rows  = preg_split( '/\r\n|\r|\n/', langit_theme_mod( $key ) );
	$items = array();

	foreach ( $rows as $row ) {
		$parts = array_map( 'trim', explode( '|', $row ) );

		if ( empty( $parts[0] ) ) {
			continue;
		}

		$items[] = array(
			'title'       => $parts[0],
			'description' => isset( $parts[1] ) ? $parts[1] : '',
			'meta'        => isset( $parts[2] ) ? $parts[2] : '',
		);
	}

	return $items;
}

/**
 * Render maintenance plan cards.
 */
function langit_maintenance_plan_cards() {
	$plans = langit_maintenance_rows( 'maintenance_plan_items' );

	if ( empty( $plans ) ) {
		return;
	}
	?>
	<div class="maintenance-plan-grid">
		<?php foreach ( $plans as $plan ) : ?>
			<article class="card maintenance-plan-card">
				<?php if ( ! empty( $plan['meta'] ) ) : ?>
					<p class="card__meta"><?php echo esc_html( $plan['meta'] ); ?></p>
				<?php endif; ?>
				<h3><?php echo esc_html( $plan['title'] ); ?></h3>
				<?php if ( ! empty( $plan['description'] ) ) : ?>
					<p><?php echo esc_html( $plan['description'] ); ?></p>
				<?php endif; ?>
			</article>
		<?php endforeach; ?>
	</div>
	<?php
}

/**
 * Render maintenance support coverage cards.
 */
function langit_maintenance_coverage_cards() {
	$coverage = langit_maintenance_rows( 'maintenance_coverage_items' );

	if ( empty( $coverage ) ) {
		return;
	}
	?>
	<div class="maintenance-coverage-grid">
		<?php foreach ( $coverage as $item ) : ?>
			<article class="card maintenance-coverage-card">
				<div class="card-icon" aria-hidden="true"></div>
				<h3><?php echo esc_html( $item['title'] ); ?></h3>
				<?php if ( ! empty( $item['description'] ) ) : ?>
					<p><?php echo esc_html( $item['description'] ); ?></p>
				<?php endif; ?>
			</article>
		<?php endforeach; ?>
	</div>
	<?php
}

/**
 * Render maintenance SLA cards.
 */
function langit_maintenance_sla_cards() {
	$sla_items = langit_maintenance_rows( 'maintenance_sla_items' );

	if ( empty( $sla_items ) ) {
		return;
	}
	?>
	<div class="maintenance-sla-grid">
		<?php foreach ( $sla_items as $item ) : ?>
			<article class="card maintenance-sla-card">
				<?php if ( ! empty( $item['meta'] ) ) : ?>
					<strong><?php echo esc_html( $item['meta'] ); ?></strong>
				<?php endif; ?>
				<h3><?php echo esc_html( $item['title'] ); ?></h3>
				<?php if ( ! empty( $item['description'] ) ) : ?>
					<p><?php echo esc_html( $item['description'] ); ?></p>
				<?php endif; ?>
			</article>
		<?php endforeach; ?>
	</div>
	<?php
}
