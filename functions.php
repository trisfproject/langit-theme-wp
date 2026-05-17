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
require_once LANGIT_DIR . '/inc/navigation.php';
require_once LANGIT_DIR . '/inc/performance.php';
require_once LANGIT_DIR . '/inc/seo.php';
require_once LANGIT_DIR . '/inc/components.php';
require_once LANGIT_DIR . '/inc/customizer.php';
require_once LANGIT_DIR . '/inc/analytics.php';
require_once LANGIT_DIR . '/inc/cta.php';
require_once LANGIT_DIR . '/inc/contact.php';
require_once LANGIT_DIR . '/inc/quote.php';
require_once LANGIT_DIR . '/inc/maintenance.php';
require_once LANGIT_DIR . '/inc/company.php';
require_once LANGIT_DIR . '/inc/patterns.php';
require_once LANGIT_DIR . '/inc/services.php';
require_once LANGIT_DIR . '/inc/projects.php';
require_once LANGIT_DIR . '/inc/testimonials.php';
require_once LANGIT_DIR . '/inc/clients.php';
require_once LANGIT_DIR . '/inc/team.php';
require_once LANGIT_DIR . '/inc/faq.php';
require_once LANGIT_DIR . '/inc/downloads.php';
require_once LANGIT_DIR . '/inc/certifications.php';
