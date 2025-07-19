<?php
/**
 * Morphix Theme Bootstrap File
 *
 * @package Morphix
 */

defined( 'ABSPATH' ) || exit;

// Autoload theme classes
require_once get_template_directory() . '/core/class-morphix-init.php';
require_once get_template_directory() . '/core/class-morphix-widget-areas.php';
require_once get_template_directory() . '/core/class-morphix-assets.php';
require_once get_template_directory() . '/inc/class-customizer.php';
require_once get_template_directory() . '/inc/class-morphix-customizer-css.php';

// Start the theme
\Morphix\Core\Theme_Init::get_instance();
Morphix\Core\Widget_Init::init();
Morphix\Core\Assets::init();
\Morphix\Core\Customizer::init();
Morphix_Customizer_CSS::init();


