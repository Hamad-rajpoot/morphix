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
    add_theme_support( 'custom-logo', [
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ] );
    add_theme_support( 'custom-background' );
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/editor-style.css' );
    }

    public function register_menus(): void {
    register_nav_menus([
        'primary_menu'   => __( 'Primary Menu', 'morphix' ),
        'footer_menu'    => __( 'Footer Menu', 'morphix' ),
    ]);
}
}
