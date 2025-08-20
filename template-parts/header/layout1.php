<?php
/**
 * Header Layout 1
 */
$logo_id  = morphix_get_option( 'header_logo' );
$logo_url = $logo_id ? wp_get_attachment_image_url( $logo_id, 'full' ) : get_template_directory_uri() . '/assets/images/default-logo.png';
?>
<header class="header header-layout1">
	<div class="container header-inner">
		<div class="site-branding">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-link">
				<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="site-logo" />
			</a>
		</div>
		<nav class="main-navigation">
			<?php
			wp_nav_menu( [
				'theme_location' => 'primary',
				'menu_id'        => 'primary-menu',
				'container'      => false,
				'menu_class'     => 'nav-menu',
				'fallback_cb'    => false,
			] );
			?>
		</nav>
	</div>
</header>
