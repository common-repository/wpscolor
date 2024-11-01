<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function wpsc_color_print_custom_css() {
    $custom_css = get_option('wpsc_color_custom_css');
    $bg_custom_css = get_option('wpsc_color_bg_custom_css');
    
    $colors = get_option('wpsc_color_colors', array());
    $dynamic_selector = get_option('wpsc_color_custom_css');
    $dynamic_bgselector = get_option('wpsc_color_bg_custom_css');
	$input_custom_admin_css = get_option('wpsc_color_custom_css_admin');
	
?>

<style type="text/css" id="dynamic-color-css">
    <?php echo !empty($colors) ? '/* Dynamic CSS Rule: ' . esc_attr($colors[0]) . ' */' : ''; ?>
</style>

<style type="text/css" id="dynamic-bgcolor-css">
    <?php echo !empty($colors) ? '/* Dynamic CSS Rule: ' . esc_attr($colors[0]) . ' */' : ''; ?>
</style>

<style type="text/css" >
   <?php echo $input_custom_admin_css; ?>
</style>

<script>
    var dynamicSelector = <?php echo json_encode($dynamic_selector); ?>;
    var dynamicBgSelector = <?php echo json_encode($dynamic_bgselector); ?>;
    var defaultColor = <?php echo json_encode(!empty($colors) ? $colors[0] : ''); ?>;
</script>

<?php
}

add_action('wp_footer', 'wpsc_color_print_custom_css');







// Display links and text inputs in the footer
add_action('wp_footer', 'wpsc_color_input');

if (!function_exists('wpsc_color_input')) {
    function wpsc_color_input() {


        $input_one_text = sanitize_text_field(get_option('wpsc_color_input_one_text'));
        $input_one_url = esc_url(get_option('wpsc_color_input_one_url'));
		$input_one_icon = sanitize_text_field(get_option('wpsc_color_input_one_icon'));

        $input_two_text = sanitize_text_field(get_option('wpsc_color_input_two_text'));
        $input_two_url = esc_url(get_option('wpsc_color_input_two_url'));
		$input_two_icon = sanitize_text_field(get_option('wpsc_color_input_two_icon'));

        $input_three_text = sanitize_text_field(get_option('wpsc_color_input_three_text'));
        $input_three_url = esc_url(get_option('wpsc_color_input_three_url'));
		$input_three_icon = sanitize_text_field(get_option('wpsc_color_input_three_icon'));

        $input_four_text = sanitize_text_field(get_option('wpsc_color_input_four_text'));
        $input_four_url = esc_url(get_option('wpsc_color_input_four_url'));
		$input_four_icon = sanitize_text_field(get_option('wpsc_color_input_four_icon'));

        // Check if any of the input fields are empty
        if ($input_one_url || $input_two_url || $input_three_url || $input_four_url) {
            ?>
            <div class="wps_color footer-box">
                <div class="product-sidebar">
                    <div class="xs-sidebar-group info-group info-sidebar">
                        <ul class="social-links clearfix">
                            <?php if ($input_one_url): ?>
                                <li><a href="<?php echo $input_one_url; ?>" target="_blank"><i class="icon <?php echo $input_one_icon; ?>"></i><span><?php echo $input_one_text; ?></span></a></li>
                            <?php endif; ?>
                            <?php if ($input_two_url): ?>
                                <li><a href="<?php echo $input_two_url; ?>" target="_blank"><i class="icon <?php echo $input_two_icon; ?>"></i><span><?php echo $input_two_text; ?></span></a></li>
                            <?php endif; ?>
                            <?php if ($input_three_url): ?>
                                <li><a href="<?php echo $input_three_url; ?>" target="_blank"><i class="icon <?php echo $input_three_icon; ?>"></i><span><?php echo $input_three_text; ?></span></a></li>
                            <?php endif; ?>
                            <?php if ($input_four_url): ?>
                                <li><a href="<?php echo $input_four_url; ?>" target="_blank"><i class="icon <?php echo $input_four_icon; ?>"></i><span><?php echo $input_four_text; ?></span></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>




            <?php
        }       
    }
}




$hide_frontend_color_switcher = get_option('wpsc_color_hide_frontend_color_switcher');

if (!$hide_frontend_color_switcher) {
   
// Display links and text inputs in the footer
add_action('wp_footer', 'wpsc_color_input_color');

if (!function_exists('wpsc_color_input_color')) {
    function wpsc_color_input_color() {
        $colors = get_option('wpsc_color_colors', array());
        $custom_css = get_option('wpsc_color_custom_css');

        // Check if any color is set
        if (!empty($colors)) {
            ?>

<style>
    <?php foreach ($colors as $key => $color): ?>
        #color<?php echo absint($key + 1); ?> {
            background-color: <?php echo sanitize_hex_color($color); ?>;
        }
    <?php endforeach; ?>
</style>

            <?php
        }

        echo '<div class="wpscolor_container switcher">';
  
		echo '<div class="platte"><img class="fa-cog" src="' . plugin_dir_url( __FILE__ ) . 'img/color.png" alt="Color Palette"></div>';

        echo '<div class="colors-outer primary-color">';

        foreach ($colors as $key => $color) {
            echo '<div class="box" title="color' . ($key + 1) . '" id="color' . ($key + 1) . '">' . esc_html__('Color', 'wpscolor') . ' ' . ($key + 1) . '</div>';
        } ?>


<div class="layout2 layout-outer">
    <div class="layout-option"><a href="#" id="normal"><?php esc_html_e('Light', 'wpscolor'); ?></a></div>
    <div class="layout-option"><a href="#" id="dark"><?php esc_html_e('Dark', 'wpscolor'); ?></a></div>
    <i class="clearfix"></i>
</div>

   </div>
</div>

<?php
        // Add an element to the head for custom CSS
        echo '<style id="dynamic-custom-css"></style>';
    }
}
	
}