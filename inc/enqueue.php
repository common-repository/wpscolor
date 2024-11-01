<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// Enqueue scripts and styles for the frontend
function wpsc_color_enqueue_scripts() {
    // Enqueue jQuery if not loaded by default
    wp_enqueue_script('jquery');




    // Enqueue styles
    wp_enqueue_style('wps-presentation-style', WPSC_COLOR_PLUGIN_URL . 'assets/css/style.css');
    wp_enqueue_style('wps-presentation-color-panel', WPSC_COLOR_PLUGIN_URL . 'assets/css/color-panel.css');
    
    // Enqueue main script
    wp_enqueue_script('wps-presentation-script', WPSC_COLOR_PLUGIN_URL . 'assets/js/script.js', array('jquery'), '', true);

    // Pass PHP data to script
    wp_localize_script('wps-presentation-script', 'wpsPresentationData', array(
        'siteDirectory' => get_option('siteurl'), // or provide your actual site directory if not in the root
        'colors' => get_option('wpsc_color_colors', array()),
    ));

    // Enqueue additional scripts
    wp_enqueue_script('wps-presentation-jquery-cookie', WPSC_COLOR_PLUGIN_URL . 'assets/js/jquery.cookie.js', array('jquery'), '', true);
	
	
	

	
$wpsc_color_activate_first_color = get_option('wpsc_color_activate_first_color');
if (!$wpsc_color_activate_first_color) {
    wp_enqueue_script('wps-presentation-themepanel', WPSC_COLOR_PLUGIN_URL . 'assets/js/themepanel.js', array('jquery'), '', true);
} else {
    wp_enqueue_script('wps-presentation-themepanelnew', WPSC_COLOR_PLUGIN_URL . 'assets/js/themepanelnew.js', array('jquery'), '', true);
}
	

    // Enqueue JavaScript for repeater functionality
    wp_enqueue_script('wpsc_color_repeater_script', WPSC_COLOR_PLUGIN_URL . 'assets/js/repeater.js', array('jquery', 'wp-color-picker'), '', true);

    // Enqueue WordPress Color Picker styles
    wp_enqueue_style('wp-color-picker');
}

// Enqueue scripts and styles for admin
function wpsc_color_enqueue_admin_scripts() {
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wps-presentation-color-picker', WPSC_COLOR_PLUGIN_URL . 'assets/js/color-picker.js', array('wp-color-picker'), '', true);
    wp_enqueue_style('wps-admin_css', WPSC_COLOR_PLUGIN_URL . 'assets/css/admin_css.css');
    wp_enqueue_script('wpsc_color_repeater_script', WPSC_COLOR_PLUGIN_URL . 'assets/js/repeater.js', array('jquery', 'wp-color-picker'), '', true);
    wp_enqueue_style('wp-color-picker');
}

// Hook to enqueue scripts and styles on the frontend
add_action('wp_enqueue_scripts', 'wpsc_color_enqueue_scripts');

// Hook to enqueue scripts and styles in the admin
add_action('admin_enqueue_scripts', 'wpsc_color_enqueue_admin_scripts');
?>
