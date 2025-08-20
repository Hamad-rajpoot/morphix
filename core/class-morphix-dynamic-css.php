<?php

namespace Morphix\Core;
/**
 * Outputs and saves dynamic CSS based on Redux theme options.
 *
 * @package Morphix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Morphix_Dynamic_CSS {

	/**
	 * Initialize the class
	 */
	public static function init() {
		add_action( 'after_switch_theme', [ __CLASS__, 'generate_dynamic_css_file' ] );
		add_action( 'redux/options/morphix_options/saved', [ __CLASS__, 'generate_dynamic_css_file' ] );
		add_action( 'wp_enqueue_scripts', [ __CLASS__, 'enqueue_dynamic_css' ], 20 );
	}

	/**
	 * Generate the CSS and save to a file
	 */
	public static function generate_dynamic_css_file() {
		$css = self::generate_dynamic_css();
		$file_path = get_template_directory() . '/css/dynamic.css';

		// Ensure directory exists
		if ( ! file_exists( dirname( $file_path ) ) ) {
			wp_mkdir_p( dirname( $file_path ) );
		}

		// Save CSS
		file_put_contents( $file_path, $css );
	}

	/**
	 * Enqueue the generated CSS file
	 */
	public static function enqueue_dynamic_css() {
		$file_uri = get_template_directory_uri() . '/css/dynamic.css';
		$file_path = get_template_directory() . '/css/dynamic.css';

		if ( file_exists( $file_path ) ) {
			wp_enqueue_style( 'morphix-dynamic-css', $file_uri, [], filemtime( $file_path ) );
		}
	}

	/**
	 * Generate dynamic CSS
	 */
	private static function generate_dynamic_css() {
		$primary_color     = \morphix_get_option( 'primary_color', '#35a000' );
		$secondary_color   = \morphix_get_option( 'secondary_color', '#000000' );
		$background_color  = \morphix_get_option( 'background_color', '#ffffff' );
		$container_width   = \morphix_get_option( 'container_width', 1200 );
		$button_radius     = \morphix_get_option( 'button_radius', 4 );
		$body_typo         = \morphix_get_option( 'body_typography', [] );
		$heading_typo      = \morphix_get_option( 'heading_typography', [] );
		$hover_effect      = \morphix_get_option( 'button_hover_effect', 'darken' );
		$footer_columns   = \morphix_get_option( 'footer_columns', '4' );
		

		ob_start();
		?>

		:root {
			--morphix-primary: <?php echo esc_attr( $primary_color ); ?>;
			--morphix-secondary: <?php echo esc_attr( $secondary_color ); ?>;
			--morphix-bg: <?php echo esc_attr( $background_color ); ?>;
			--morphix-container: <?php echo intval( $container_width ); ?>px;
			--morphix-radius: <?php echo intval( $button_radius ); ?>px;
		}

		body {
			background-color: var(--morphix-bg);
			color: <?php echo esc_attr( $body_typo['color'] ?? '#333' ); ?>;
			font-family: <?php echo esc_attr( $body_typo['font-family'] ?? 'Roboto' ); ?>;
			font-size: <?php echo esc_attr( $body_typo['font-size'] ?? '16px' ); ?>;
			line-height: <?php echo esc_attr( $body_typo['line-height'] ?? '1.6' ); ?>;
		}

		h1, h2, h3, h4, h5, h6 {
			font-family: <?php echo esc_attr( $heading_typo['font-family'] ?? 'Poppins' ); ?>;
			font-weight: <?php echo esc_attr( $heading_typo['font-weight'] ?? '600' ); ?>;
			color: <?php echo esc_attr( $heading_typo['color'] ?? '#111' ); ?>;
		}

		.container {
			max-width: var(--morphix-container);
			margin-left: auto;
			margin-right: auto;
		}

		button,
		.button,
		.wp-block-button__link {
			border-radius: var(--morphix-radius);
		}

	<?php if ( $hover_effect === 'grow' ) : ?>
    button:hover,
    .button:hover,
    .wp-block-button__link:hover {
        transform: scale(1.08);
        transition: transform 0.3s ease;
    }
<?php elseif ( $hover_effect === 'shrink' ) : ?>
    button:hover,
    .button:hover,
    .wp-block-button__link:hover {
        transform: scale(0.92);
        transition: transform 0.3s ease;
    }
<?php elseif ( $hover_effect === 'glow' ) : ?>
    button:hover,
    .button:hover,
    .wp-block-button__link:hover {
        box-shadow: 0 0 12px var(--morphix-primary);
        transition: box-shadow 0.3s ease;
    }
<?php endif; ?>

.site-footer .footer-inner {
    display: grid;
    grid-template-columns: repeat(<?php echo intval( $footer_columns ); ?>, 1fr);
    gap: 30px;
    margin-top: 40px;
    padding: 40px 0;
    background: #f9f9f9;
}

.site-footer .footer-col {
    font-size: 14px;
    color: #666;
}


		<?php
		return ob_get_clean();
	}
}
