<?php
/**
 * Morphix Theme Bootstrap File
 *
 * @package Morphix
 */

defined( 'ABSPATH' ) || exit;

// Load helper function first so morphix_get_option() is available globally
require_once get_template_directory() . '/inc/helper/helper.php';

// Redux config (registers $opt_name = 'morphix_options')
require_once get_template_directory() . '/inc/redux/redux-config.php';

// Load Redux Options
if ( class_exists( 'Redux' ) ) {
	global $morphix_theme_options;
	$morphix_theme_options = get_option( 'morphix_options' );
}

// Load core theme classes
require_once get_template_directory() . '/core/class-morphix-init.php';
require_once get_template_directory() . '/core/class-morphix-assets.php';
require_once get_template_directory() . '/core/class-morphix-widget-areas.php';
require_once get_template_directory() . '/core/class-morphix-dynamic-css.php';

// Initialize components
\Morphix\Core\Morphix_Dynamic_CSS::init();
\Morphix\Core\Theme_Init::get_instance();
\Morphix\Core\Widget_Init::init();
\Morphix\Core\Assets::init();
