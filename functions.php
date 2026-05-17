<?php
/**
 * Langit theme functions.
 *
 * @package Langit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'LANGIT_VERSION', '1.0.0' );
define( 'LANGIT_DIR', get_template_directory() );
define( 'LANGIT_URI', get_template_directory_uri() );

require_once LANGIT_DIR . '/inc/setup.php';
require_once LANGIT_DIR . '/inc/enqueue.php';
require_once LANGIT_DIR . '/inc/template-tags.php';
require_once LANGIT_DIR . '/inc/components.php';
require_once LANGIT_DIR . '/inc/customizer.php';
require_once LANGIT_DIR . '/inc/cta.php';
require_once LANGIT_DIR . '/inc/patterns.php';
require_once LANGIT_DIR . '/inc/services.php';
require_once LANGIT_DIR . '/inc/projects.php';
