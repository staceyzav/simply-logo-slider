<?php
/**
 * Plugin Name: Simply Logo Slider
 * Plugin URI:  https://simplydesign.com
 * Description: Auto-scrolling logo strip. Grayscale by default, color on hover, pauses on hover. Only animates when logos exceed container width.
 * Author:      Simply Design
 * Author URI:  https://simplydesign.com
 * Version:     1.1.0
 * License:     GPL-2.0-or-later
 * Text Domain: simply-logo-slider
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'SLS_VERSION', '1.1.0' );
define( 'SLS_PATH',    plugin_dir_path( __FILE__ ) );
define( 'SLS_URL',     plugin_dir_url( __FILE__ ) );

require_once SLS_PATH . 'includes/cpt.php';
require_once SLS_PATH . 'includes/shortcode.php';
require_once SLS_PATH . 'admin/settings.php';

add_action( 'wp_enqueue_scripts', 'sls_enqueue' );

function sls_enqueue() {
	wp_enqueue_style(
		'simply-logo-slider',
		SLS_URL . 'assets/css/simply-logo-slider.css',
		array(),
		SLS_VERSION
	);
	wp_enqueue_script(
		'simply-logo-slider',
		SLS_URL . 'assets/js/simply-logo-slider.js',
		array(),
		SLS_VERSION,
		true
	);
}
