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

// Start the theme
\Morphix\Core\Theme_Init::get_instance();
Morphix\Core\Widget_Init::init();

