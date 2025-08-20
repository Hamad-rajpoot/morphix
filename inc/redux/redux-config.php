<?php
if (!class_exists('Redux')) {
    return;
}

$opt_name = "morphix_options";

Redux::setArgs($opt_name, array(
    'opt_name'             => $opt_name,
    'display_name'         => 'Morphix Theme Options',
    'menu_title'           => 'Theme Options',
    'page_title'           => 'Morphix Options',
    'menu_type'            => 'menu',
    'allow_sub_menu'       => false,
    'admin_bar'            => true,
    'admin_bar_icon'       => 'dashicons-admin-generic',
    'admin_bar_priority'   => 50,
    'dev_mode'             => false,
    'update_notice'        => false,
    'customizer'           => true,
    'menu_icon'            => 'dashicons-admin-settings',
    'page_priority'        => 2,
    'page_slug'            => 'morphix-options',
    'save_defaults'        => true,
    'default_show'         => true,
    'default_mark'         => '*',
));

// GENERAL SETTINGS
Redux::setSection($opt_name, array(
    'title'  => 'General Settings',
    'id'     => 'general_settings',
    'icon'   => 'el el-home',
    'fields' => array(
        array(
            'id'       => 'site_layout',
            'type'     => 'select',
            'title'    => 'Site Layout',
            'options'  => array(
                'full'  => 'Full Width',
                'boxed' => 'Boxed',
            ),
            'default'  => 'full',
        ),
        array(
            'id'       => 'container_width',
            'type'     => 'slider',
            'title'    => 'Container Width (px)',
            'default'  => 1200,
            'min'      => 500,
            'max'      => 1920,
            'step'     => 10,
        ),
    ),
));

// TYPOGRAPHY
Redux::setSection($opt_name, array(
    'title'  => 'Typography',
    'id'     => 'typography',
    'icon'   => 'el el-font',
    'fields' => array(
        array(
            'id'          => 'body_typography',
            'type'        => 'typography',
            'title'       => 'Body Typography',
            'google'      => true,
            'default'     => array(
                'font-family' => 'Roboto',
                'font-size'   => '16px',
                'line-height' => '1.6',
                'color'       => '#333',
            ),
        ),
        array(
            'id'          => 'heading_typography',
            'type'        => 'typography',
            'title'       => 'Heading Typography',
            'google'      => true,
            'default'     => array(
                'font-family' => 'Poppins',
                'font-weight' => '600',
                'color'       => '#111',
            ),
        ),
    ),
));

// COLORS
Redux::setSection($opt_name, array(
    'title'  => 'Colors',
    'id'     => 'colors',
    'icon'   => 'el el-tint',
    'fields' => array(
        array(
            'id'       => 'primary_color',
            'type'     => 'color',
            'title'    => 'Primary Color',
            'default'  => '#0073aa',
        ),
        array(
            'id'       => 'secondary_color',
            'type'     => 'color',
            'title'    => 'Secondary Color',
            'default'  => '#222',
        ),
        array(
            'id'       => 'background_color',
            'type'     => 'color',
            'title'    => 'Body Background Color',
            'default'  => '#ffffff',
        ),
    ),
));

// BUTTONS
Redux::setSection($opt_name, array(
    'title'  => 'Buttons',
    'id'     => 'buttons',
    'icon'   => 'el el-circle-arrow-right',
    'fields' => array(
        array(
            'id'       => 'button_radius',
            'type'     => 'slider',
            'title'    => 'Button Radius',
            'default'  => 4,
            'min'      => 0,
            'max'      => 30,
            'step'     => 1,
        ),
        array(
            'id'       => 'button_hover_effect',
            'type'     => 'select',
            'title'    => 'Button Hover Effect',
            'options'  => array(
                'grow'      => 'Grow',
                'shrink'    => 'Shrink',
                'glow'      => 'Glow',
            ),
            'default'  => 'grow',
        ),
    ),
));

// HEADER OPTIONS
Redux::setSection($opt_name, array(
    'title'  => 'Header',
    'id'     => 'header',
    'icon'   => 'el el-website',
    'fields' => array(
        array(
            'id'       => 'show_top_bar',
            'type'     => 'switch',
            'title'    => 'Enable Top Bar',
            'default'  => true,
        ),
        array(
            'id'       => 'header_logo',
            'type'     => 'media',
            'title'    => __( 'Logo Upload', 'morphix' ),
        ),

    ),
));

Redux::setSection( $opt_name, array(
    'title'  => 'Header Layout',
    'id'     => 'header_layout_section',
    'desc'   => 'Select header layout version',
    'icon'   => 'el el-website',
    'fields' => array(
        array(
            'id'       => 'morphix_header_layout',
            'type'     => 'image_select',
            'title'    => 'Choose Header Layout',
            'options'  => array(
                'layout1' => array('alt' => 'Layout 1', 'img' => get_template_directory_uri() . '/assets/images/header-layout1.png'),
                'layout2' => array('alt' => 'Layout 2', 'img' => get_template_directory_uri() . '/assets/images/header-layout2.png'),
                'layout3' => array('alt' => 'Layout 3', 'img' => get_template_directory_uri() . '/assets/images/header-layout3.png'),
            ),
            'default'  => 'layout1',
        ),
    )
));


// FOOTER OPTIONS
Redux::setSection($opt_name, array(
    'title'  => 'Footer',
    'id'     => 'footer',
    'icon'   => 'el el-arrow-down',
    'fields' => array(
        array(
            'id'       => 'footer_columns',
            'type'     => 'select',
            'title'    => 'Footer Columns',
            'options'  => array(
                '1' => '1 Column',
                '2' => '2 Columns',
                '3' => '3 Columns',
                '4' => '4 Columns',
            ),
            'default'  => '4',
        ),
    ),
));

// PERFORMANCE OPTIONS
Redux::setSection($opt_name, array(
    'title'  => 'Performance',
    'id'     => 'performance',
    'icon'   => 'el el-dashboard',
    'fields' => array(
        array(
            'id'       => 'enable_lazyload',
            'type'     => 'switch',
            'title'    => 'Enable Lazy Load',
            'default'  => true,
        ),
        array(
            'id'       => 'minify_assets',
            'type'     => 'switch',
            'title'    => 'Minify CSS & JS',
            'default'  => false,
        ),
    ),
));
