<?php
/**
 * Company page helpers.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Parse editable card rows.
 *
 * Expected row format: Title | Indonesian description | optional icon filename.
 *
 * @param string $key Setting key without prefix.
 * @param string $default_icon Default icon filename.
 * @return array<int,array<string,string>>
 */
function langit_company_card_rows( $key, $default_icon = 'maintenance.svg' ) {
	$rows  = preg_split( '/\r\n|\r|\n/', langit_theme_mod( $key ) );
	$items = array();

	foreach ( $rows as $row ) {
		$row = trim( $row );

		if ( '' === $row ) {
			continue;
		}

		$parts   = array_map( 'trim', explode( '|', $row ) );
		$items[] = array(
			'title'       => isset( $parts[0] ) ? $parts[0] : '',
			'description' => isset( $parts[1] ) ? $parts[1] : '',
			'icon'        => isset( $parts[2] ) && '' !== $parts[2] ? sanitize_file_name( $parts[2] ) : sanitize_file_name( $default_icon ),
		);
	}

	return $items;
}

/**
 * Parse mission rows.
 *
 * @return array<int,string>
 */
function langit_company_missions() {
	$rows = preg_split( '/\r\n|\r|\n/', langit_theme_mod( 'company_mission_text' ) );

	return array_values( array_filter( array_map( 'trim', $rows ) ) );
}
