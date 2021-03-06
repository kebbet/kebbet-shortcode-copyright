<?php
/**
 * Plugin Name:       Kebbet plugins - Shortcode: [copyright]
 * Plugin URI:        https://github.com/kebbet/kebbet-shortcode-copyright
 * Description:       Add a shortcode returning copyright info with year.
 * Version:           1.0.0
 * Author:            Erik Betshammar
 * Author URI:        https://verkan.se
 * Requires at least: 5.0
 *
 * @package kebbet-shortcode-copyright
 * @author Erik Betshammar
 */

namespace kebbet\shortcode\copyright;

/**
 * Add the shortcode `copyright` which returns copyright info with year.
 */
add_shortcode( 'copyright', __NAMESPACE__ . '\output' );

/**
 * Return the copyright string. Accepts attribute `holder`.
 *
 * @param array $attributes The attributes.
 * @return string
 */
function output( $attributes ) {

	$holder             = false;
	$short_code_att     = array(
		'holder' => false,
	);
	$attributes_extract = shortcode_atts( $short_code_att, $attributes );

	if ( esc_attr( $attributes_extract['holder'] ) ) {
		$holder = ' ' . esc_attr( $attributes_extract['holder'] );
	};

	$output = \sprintf(
		/* translators: 1: copyright year, 2: optional, copyright holder name */
		__( '&copy;  %1$s%2$s' ),
		wp_date( 'Y' ),
		$holder
	);
	return $output;
}
