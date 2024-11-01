<?php
/**
 * Plugin Name: wpscolor
 * Plugin URI: https://wordpress.org/plugins/wpscolor/
 * Description: This Plugin is customize with any Elementor Based Theme.
 * Version: 1.0.4
 * Author: Rashid87
 * Text Domain: wpscolor
 * Domain Path: /languages/
 * Author URI: https://profiles.wordpress.org/rashid87/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */
 
 if ( ! defined( 'ABSPATH' ) ) exit;
$plugin_dir = plugin_dir_path(__FILE__);
defined('WPSC_COLOR_PLUGIN_DIR') || define('WPSC_COLOR_PLUGIN_DIR', $plugin_dir);
$plugin_url = plugins_url('wpscolor') . '/';
defined('WPSC_COLOR_PLUGIN_URL') || define('WPSC_COLOR_PLUGIN_URL', $plugin_url);

include_once(WPSC_COLOR_PLUGIN_DIR . 'inc/enqueue.php');
include_once(WPSC_COLOR_PLUGIN_DIR . 'inc/admin-menu.php');
include_once(WPSC_COLOR_PLUGIN_DIR . 'inc/outputcolor.php');

?>