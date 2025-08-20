<header class="header-layout3">
    <div class="container">
        <div class="logo text-center">
            <?php if ( morphix_get_option( 'header_logo' ) ) : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo esc_url( morphix_get_option( 'header_logo' )['url'] ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                </a>
            <?php endif; ?>
        </div>
        <nav class="main-menu text-center">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'menu',
            ) );
            ?>
        </nav>
    </div>
</header>
