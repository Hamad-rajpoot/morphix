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
            wp_get_theme()->get( 'Version' )
        );

        // Custom stylesheet
        wp_enqueue_style(
            'morphix-custom',
            get_template_directory_uri() . '/assets/css/custom.css',
            [],
            wp_get_theme()->get( 'Version' )
        );

        // Main JS file (loaded in footer)
        wp_enqueue_script(
            'morphix-script',
            get_template_directory_uri() . '/assets/js/main.js',
            [ 'jquery' ],
            wp_get_theme()->get( 'Version' ),
            true
        );

        wp_enqueue_style(
	'morphix-customizer-style',
	get_stylesheet_directory_uri() . '/assets/css/customizer.css',
	[],
	filemtime( get_stylesheet_directory() . '/assets/css/customizer.css' )
);
    }
}
