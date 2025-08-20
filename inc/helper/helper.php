<?php
if ( ! function_exists( 'morphix_get_option' ) ) {
	/**
	 * Get a value from theme options.
	 *
	 * @param string $key
	 * @param mixed $default
	 * @return mixed
	 */
	function morphix_get_option( $key, $default = '' ) {
		global $morphix_theme_options;

		if ( isset( $morphix_theme_options[ $key ] ) ) {
			return $morphix_theme_options[ $key ];
		}

		return $default;
	}
}
