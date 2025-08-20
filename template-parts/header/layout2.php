<header class="header-layout2">
    <div class="container">
        <div class="logo">
            <?php if ( morphix_get_option( 'header_logo' ) ) : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo esc_url( morphix_get_option( 'header_logo' )['url'] ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                </a>
            <?php endif; ?>
        </div>
        <div class="menu-search">
            <nav class="main-menu">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'menu',
                ) );
                ?>
            </nav>
            <div class="header-search">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</header>
