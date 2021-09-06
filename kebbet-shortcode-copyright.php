<?php
/**
 * Plugin Name:       Kebbet plugins - Shortcode: [copyright]
 * Plugin URI:        https://github.com/kebbet/kebbet-shortcode-copyright
 * Description:       Add a shortcode returning copyright info with year.
 * Version:           20210906.01
 * Author:            Erik Betshammar
 * Author URI:        https://verkan.se
 * Requires at least: 5.3
 *
 * @package kebbet-shortcode-copyright
 * @author Erik Betshammar
 */

namespace kebbet\shortcode\copyright;

/**
 * Add the shortcode `year` which returns the current year.
 */
add_shortcode( 'copyright', __NAMESPACE__ . '\output' );

/**
 * Return the current year.
 *
 * @param array $atts The attributes.
 */
function output( $atts ) {

	$holder          = false;
	$short_code_atts = array(
		'holder' => false,
	);
	$attributes = shortcode_atts( $short_code_atts, $atts );

	if ( esc_attr( $attributes['holder'] ) ) {
		$holder = ' ' . esc_attr( $attributes['holder'] );
	};

	$output = \sprintf(
		__( '© %s%s' ),
		wp_date( 'Y' ),
		$holder
	);
	return $output;
}
