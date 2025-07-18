<?php
/**
 * Widget Initialization Class
 *
 * @package Morphix
 */

namespace Morphix\Core;

defined( 'ABSPATH' ) || exit;

class Widget_Init {

  public static function init(): void {
	add_action( 'widgets_init', [ self::class, 'register_widgets' ] );
  }


   public static function register_widgets(): void {
    $widget_areas = [
        [
            'name'        => esc_html__( 'Main Sidebar', 'morphix' ),
            'id'          => 'main-sidebar',
            'description' => esc_html__( 'Widgets in this area will appear in the main sidebar.', 'morphix' ),
        ],
        [
            'name'        => esc_html__( 'Footer Column 1', 'morphix' ),
            'id'          => 'footer-1',
            'description' => esc_html__( 'First column in the footer.', 'morphix' ),
        ],
        [
            'name'        => esc_html__( 'Footer Column 2', 'morphix' ),
            'id'          => 'footer-2',
            'description' => esc_html__( 'Second column in the footer.', 'morphix' ),
        ],
        [
            'name'        => esc_html__( 'Footer Column 3', 'morphix' ),
            'id'          => 'footer-3',
            'description' => esc_html__( 'Third column in the footer.', 'morphix' ),
        ],
    ];

    foreach ( $widget_areas as $area ) {
        register_sidebar( array_merge( $area, [
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ] ) );
    }
   }
}

