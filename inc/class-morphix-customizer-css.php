<?php
/**
 * Customizer CSS Generator for Morphix Theme
 *
 * @package Morphix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Morphix_Customizer_CSS {

	/**
	 * Initialize the class by hooking into customize_save_after
	 */
	public static function init() {
		add_action( 'customize_save_after', [ __CLASS__, 'generate_css_file' ] );
	}

	/**
	 * Generate and write dynamic CSS to a file when Customizer settings are saved.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer object.
	 */
	public static function generate_css_file( $wp_customize ) {

		// Get customizer settings
		$theme_color   = get_theme_mod( 'morphix_theme_color', '#0073aa' );
		$layout_width  = get_theme_mod( 'morphix_layout_width', '1200px' );
		$button_radius = get_theme_mod( 'morphix_button_radius', '4px' );

		// Build the CSS string
		$css = "
/* ===== Morphix Dynamic Customizer CSS ===== */
body {
	max-width: {$layout_width};
	margin: 0 auto;
}

a,
.btn,
button {
	background-color: {$theme_color};
	color: #fff;
}

.btn,
button {
	border-radius: {$button_radius};
}
";

		// Define the path to the CSS file
		$css_file_path = get_stylesheet_directory() . '/assets/css/customizer.css';

		// Ensure the directory exists
		if ( ! file_exists( dirname( $css_file_path ) ) ) {
			wp_mkdir_p( dirname( $css_file_path ) );
		}

		// Save the CSS to the file
		file_put_contents( $css_file_path, $css );
	}
}
