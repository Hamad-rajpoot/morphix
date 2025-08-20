<?php
/**
 * Theme Header
 *
 * @package Morphix
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
// 🔹 Top Bar (optional toggle from Redux)
$header_layout = morphix_get_option( 'morphix_header_layout', 'layout1' );

if ( morphix_get_option( 'show_top_bar', true ) && $header_layout === 'layout1' ) : ?>
	<div class="top-bar">
		<div class="container">
			<span>Welcome to Morphix Theme!</span>
		</div>
	</div>
<?php endif; ?>

<?php

// 🔹 Load template file dynamically
if ( in_array( $header_layout, [ 'layout1', 'layout2', 'layout3' ], true ) ) {
	get_template_part( 'template-parts/header/' . $header_layout );
} else {
	// fallback to layout1 if option is broken
	get_template_part( 'template-parts/header/layout1' );
}
