<?php
/**
 * Assets Class
 * Handles all frontend styles and scripts for the Morphix theme.
 */

namespace Morphix\Core;

defined( 'ABSPATH' ) || exit;

class Assets {

	/**
	 * Initialize hooks
	 */
	public static function init() {
		add_action( 'wp_enqueue_scripts', [ __CLASS__, 'enqueue_frontend_assets' ] );
	}

	/**
	 * Enqueue frontend styles and scripts
	 */
public static function enqueue_frontend_assets() {
	// Main stylesheet
	wp_enqueue_style(
		'morphix-style',
		get_template_directory_uri() . '/style.css',
		[],
		filemtime( get_template_directory() . '/style.css' ) // Cache-busting version
	);

	// Main JS
	wp_enqueue_script(
		'morphix-script',
		get_template_directory_uri() . '/assets/js/main.js',
		[ 'jquery' ],
		filemtime( get_template_directory() . '/assets/js/main.js' ), // Cache-busting version
		true
	);

	wp_enqueue_style('morphix-header', get_template_directory_uri() . '/assets/css/header.css', array(), '1.0.0');
}


}
