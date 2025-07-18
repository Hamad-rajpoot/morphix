<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
    <h1><?php bloginfo( 'name' ); ?></h1>
    <p><?php bloginfo( 'description' ); ?></p>

    <nav class="primary-navigation">
    <?php
    wp_nav_menu([
        'theme_location' => 'primary_menu',
        'container'      => 'ul',
        'menu_class'     => 'main-menu',
    ]);
    ?>
</nav>
</header>