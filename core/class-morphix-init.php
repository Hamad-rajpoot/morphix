<?php
/**
 * Theme Initialization Class
 *
 * Handles theme setup, features, and global hooks.
 *
 * @package Morphix
 */

namespace Morphix\Core;

defined( 'ABSPATH' ) || exit;

class Theme_Init {

    /**
     * The single instance of the class.
     *
     * @var Theme_Init|null
     */
    private static $instance = null;

    /**
     * Get the singleton instance of the class.
     *
     * @return Theme_Init
     */
    public static function get_instance(): Theme_Init {
        if ( null === self::$instance ) {
            self::$instance = new self();
            self::$instance->setup_hooks();
        }
        return self::$instance;
    }

    /**
     * Constructor — kept private to enforce singleton.
     */
    private function __construct() {}

    /**
     * Setup all theme hooks and features.
     *
     * @return void
     */
    private function setup_hooks(): void {
        add_action( 'after_setup_theme', [ $this, 'theme_supports' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
        add_action( 'after_setup_theme', [ $this, 'register_menus' ] );
    }

    /**
     * Add theme support features.
     *
     * @return void
     */
    public function theme_supports(): void {
        // Add default support for various WordPress features.
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ] );
        add_theme_support( 'custom-logo' );
    }

    /**
     * Enqueue theme CSS and JS files.
     *
     * @return void
     */
    public function enqueue_scripts(): void {
        // Replace with your actual file paths.
        wp_enqueue_style(
            'morphix-style',
            get_stylesheet_uri(),
            [],
            wp_get_theme()->get( 'Version' )
        );

        wp_enqueue_script(
            'morphix-main-js',
            get_template_directory_uri() . '/assets/js/main.js',
            [],
            wp_get_theme()->get( 'Version' ),
            true
        );
    }

    public function register_menus(): void {
    register_nav_menus([
        'primary_menu'   => __( 'Primary Menu', 'morphix' ),
        'footer_menu'    => __( 'Footer Menu', 'morphix' ),
    ]);
}
}
