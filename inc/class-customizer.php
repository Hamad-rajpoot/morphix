<?php

namespace Morphix\Core;

class Customizer {

    public static function init() {
        add_action('customize_register', [ __CLASS__, 'register_options' ]);
    }

    public static function register_options($wp_customize) {
        // Theme Color Setting
        $wp_customize->add_setting('morphix_theme_color', [
            'default'   => '#1e73be',
            'transport' => 'refresh',
        ]);

        $wp_customize->add_control(new \WP_Customize_Color_Control($wp_customize, 'morphix_theme_color', [
            'label'    => __('Theme Color', 'morphix'),
            'section'  => 'colors',
            'settings' => 'morphix_theme_color',
        ]));

        // Layout Width
        $wp_customize->add_section('morphix_layout', [
            'title' => __('Layout Settings', 'morphix'),
            'priority' => 30,
        ]);

        $wp_customize->add_setting('morphix_layout_width', [
            'default' => '1200px',
            'transport' => 'refresh',
        ]);

        $wp_customize->add_control('morphix_layout_width', [
            'label'   => __('Max Layout Width', 'morphix'),
            'section' => 'morphix_layout',
            'type'    => 'text',
        ]);

        // Button Radius
        $wp_customize->add_setting('morphix_button_radius', [
            'default' => '4px',
            'transport' => 'refresh',
        ]);

        $wp_customize->add_control('morphix_button_radius', [
            'label'   => __('Button Radius', 'morphix'),
            'section' => 'morphix_layout',
            'type'    => 'text',
        ]);
    }
}
