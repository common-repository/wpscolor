<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// Add an admin menu

function wpsc_color_admin_menu() {
    add_menu_page(
        'Wps Color',
        'Wps Color',
        'manage_options',
        'wpsc_color_settings',
        'wpsc_color_settings_page',
        'dashicons-color-picker', // Icon
       30 // Position (1 for top of the menu)
    );
}
add_action('admin_menu', 'wpsc_color_admin_menu');



// Create the admin settings page
function wpsc_color_settings_page() {
    ?>
    <div class="wrap wps_adming_area">
   
      <h2><?php echo esc_html__('Wps Color Settings', 'wpscolor'); ?></h2>
  
		
		<?php
        // Display success message if set
        if (isset($_GET['settings-updated']) && $_GET['settings-updated']) {
            ?>
            <div id="message" class="updated notice is-dismissible">
                <p><?php esc_html_e('Settings saved successfully!', 'wpscolor'); ?></p>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    setTimeout(function () {
                        document.getElementById("message").style.display = "none";
                    }, 3000); // Hide after 3 seconds
                });
            </script>
            <?php
        }
	
        ?>

         <form method="post" action="options.php">
            <?php settings_fields('wpsc_color_options_group'); ?>
            <?php do_settings_sections('wpsc_color_settings'); ?>
            <?php submit_button(); ?>
        </form>
		
    </div>
    <?php
}
// Register and define admin settings
function wpsc_color_register_settings() {
 
//input text and URL    
    register_setting('wpsc_color_options_group', 'wpsc_color_input_one_text', 'sanitize_text_field');
    register_setting('wpsc_color_options_group', 'wpsc_color_input_one_url', 'esc_url');
	register_setting('wpsc_color_options_group', 'wpsc_color_input_one_icon', 'sanitize_text_field');

    register_setting('wpsc_color_options_group', 'wpsc_color_input_two_text', 'sanitize_text_field');
    register_setting('wpsc_color_options_group', 'wpsc_color_input_two_url', 'esc_url');
	register_setting('wpsc_color_options_group', 'wpsc_color_input_two_icon', 'sanitize_text_field');

    register_setting('wpsc_color_options_group', 'wpsc_color_input_three_text', 'sanitize_text_field');
    register_setting('wpsc_color_options_group', 'wpsc_color_input_three_url', 'esc_url');
	register_setting('wpsc_color_options_group', 'wpsc_color_input_three_icon', 'sanitize_text_field');

    register_setting('wpsc_color_options_group', 'wpsc_color_input_four_text', 'sanitize_text_field');
    register_setting('wpsc_color_options_group', 'wpsc_color_input_four_url', 'esc_url');
	register_setting('wpsc_color_options_group', 'wpsc_color_input_four_icon', 'sanitize_text_field');
//Check box to hide front End color 
register_setting('wpsc_color_options_group', 'wpsc_color_hide_frontend_color_switcher', 'wpsc_sanitize_checkbox');
	
	
// Checkbox to activate or deactivate the first color
register_setting('wpsc_color_options_group', 'wpsc_color_activate_first_color', 'wpsc_sanitize_checkbox');
	

//Color
    register_setting('wpsc_color_options_group', 'wpsc_color_colors', 'wpsc_color_sanitize_colors');

//custom CSS
    
register_setting('wpsc_color_options_group', 'wpsc_color_bg_custom_css', 'sanitize_textarea_field');
register_setting('wpsc_color_options_group', 'wpsc_color_custom_css', 'sanitize_textarea_field');
	
register_setting('wpsc_color_options_group', 'wpsc_color_custom_css_admin', 'sanitize_textarea_field');    
    
add_settings_section('wpsc_color_section', 'All Settings', 'wpsc_color_section_callback', 'wpsc_color_settings');
     
    // Add fields for Input One
    add_settings_field('wpsc_color_input_one_text', 'Input One Text', 'wpsc_color_input_one_text_callback', 'wpsc_color_settings', 'wpsc_color_section');
    add_settings_field('wpsc_color_input_one_url', 'Input One URL', 'wpsc_color_input_one_url_callback', 'wpsc_color_settings', 'wpsc_color_section');
	add_settings_field('wpsc_color_input_one_icon', 'Input Icon', 'wpsc_color_input_one_icon_callback', 'wpsc_color_settings', 'wpsc_color_section');

    // Add fields for Input Two
    add_settings_field('wpsc_color_input_two_text', 'Input Two Text', 'wpsc_color_input_two_text_callback', 'wpsc_color_settings', 'wpsc_color_section');
    add_settings_field('wpsc_color_input_two_url', 'Input Two URL', 'wpsc_color_input_two_url_callback', 'wpsc_color_settings', 'wpsc_color_section');
	add_settings_field('wpsc_color_input_two_icon', 'Input Icon', 'wpsc_color_input_two_icon_callback', 'wpsc_color_settings', 'wpsc_color_section');

    // Add fields for Input Three
    add_settings_field('wpsc_color_input_three_text', 'Input Three Text', 'wpsc_color_input_three_text_callback', 'wpsc_color_settings', 'wpsc_color_section');
    add_settings_field('wpsc_color_input_three_url', 'Input Three URL', 'wpsc_color_input_three_url_callback', 'wpsc_color_settings', 'wpsc_color_section');
add_settings_field('wpsc_color_input_three_icon', 'Input Icon', 'wpsc_color_input_three_icon_callback', 'wpsc_color_settings', 'wpsc_color_section');
    // Add fields for Input Four
    add_settings_field('wpsc_color_input_four_text', 'Input Four Text', 'wpsc_color_input_four_text_callback', 'wpsc_color_settings', 'wpsc_color_section');
    add_settings_field('wpsc_color_input_four_url', 'Input Four URL', 'wpsc_color_input_four_url_callback', 'wpsc_color_settings', 'wpsc_color_section');
	add_settings_field('wpsc_color_input_four_icon', 'Input Icon', 'wpsc_color_input_four_icon_callback', 'wpsc_color_settings', 'wpsc_color_section');
    
  
	
	// This is for color change
    
    add_settings_section('wpsc_color_color_section', 'Color Options', 'wpsc_color_color_section_callback', 'wpsc_color_settings');

      // Add color picker fields
    for ($i = 1; $i <= 12; $i++) {
        add_settings_field(
        'wpsc_color_colors_repeater',
        'Colors- First Color is Set as theme Default Color ',
        'wpsc_color_colors_repeater_callback',
        'wpsc_color_settings',
        'wpsc_color_color_section'
    );
    }
	

  

add_settings_field('wpsc_color_bg_custom_css', 'Add Background Class', 'wpsc_color_bg_custom_css_callback', 'wpsc_color_settings', 'wpsc_color_section');
add_settings_field('wpsc_color_custom_css', 'Add Color Class', 'wpsc_color_custom_css_callback', 'wpsc_color_settings', 'wpsc_color_section');
add_settings_field('wpsc_color_custom_css_admin', 'Add CSS with value', 'wpsc_color_custom_css_admin_callback', 'wpsc_color_settings', 'wpsc_color_section');	
	
	
  // This is Check box 
     add_settings_field(
        'wpsc_color_hide_frontend_color_switcher',
        'Hide Frontend Color Switcher',
        'wpsc_color_hide_frontend_color_switcher_callback',
        'wpsc_color_settings',
        'wpsc_color_section'
    );
	
  add_settings_field(
        'wpsc_color_activate_first_color',
        'Hide First Color as Active Color',
        'wpsc_color_activate_first_color_callback',
        'wpsc_color_settings',
        'wpsc_color_section'
    );	
		
	
  
}
add_action('admin_init', 'wpsc_color_register_settings');



// Callback function for hiding the frontend color switcher checkbox
function wpsc_color_hide_frontend_color_switcher_callback() {
    $value = get_option('wpsc_color_hide_frontend_color_switcher');
    ?>
    <input type="checkbox" id="wpsc_color_hide_frontend_color_switcher" name="wpsc_color_hide_frontend_color_switcher" value="1" <?php checked(1, $value); ?> />
    <label for="wpsc_color_hide_frontend_color_switcher"><?php esc_html_e('Use as Theme Color Settings Options', 'wpscolor'); ?></label>
    <?php
}

// Sanitize checkbox function
function wpsc_sanitize_checkbox($input) {
    return (isset($input) && $input == 1) ? 1 : 0;
}




// Add fields for colors repeater
function wpsc_color_colors_callback() {
    $colors = get_option('wpsc_color_colors', array());
    ?>
    <label for="wpsc_color_colors"><?php esc_html_e('Repeater Color Picker:', 'wpscolor'); ?></label>
<div id="wpsc_color_colors_container">
    <?php foreach ($colors as $key => $color): ?>
        <input type="text" name="wpsc_color_colors[<?php echo absint($key); ?>]" class="color-picker" value="<?php echo sanitize_hex_color($color); ?>" />
    <?php endforeach; ?>
</div>

    <button type="button" class="button" id="wpsc_color_add_color"><?php esc_html_e('Add Color', 'wpscolor'); ?></button>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var colorContainer = document.getElementById('wpsc_color_colors_container');
            var addColorButton = document.getElementById('wpsc_color_add_color');

            addColorButton.addEventListener('click', function () {
                var input = document.createElement('input');
                input.type = 'text';
                input.name = 'wpsc_color_colors[]';
                input.className = 'color-picker';
                colorContainer.appendChild(input);
            });
        });
    </script>
    <?php
}

// Color Section callback
function wpsc_color_color_section_callback() {
    echo '<p>' . esc_html__('First Color Will be DEFAULT color. Check the Hide Button it will Hide fron Front Eend and This Will give the color Chagne option', 'wpscolor') . '</p>';
}

// Color repeater callback
function wpsc_color_colors_repeater_callback() {
    $colors = get_option('wpsc_color_colors', array());

    echo '<div class="wps-presentation-color-repeater">';

    if (!empty($colors)) {
        foreach ($colors as $index => $color) {
            echo "<div class='color-repeater-row'>";
            echo "<input type='text' id='wpsc_color_color_$index' name='wpsc_color_colors[$index]' class='color-picker' value='" . esc_attr($color) . "'  />";
            echo "<div class='color-picker-container' data-input-id='wpsc_color_color_$index'></div>";
            echo "<button type='button' class='button button-secondary wpsc_color_remove_color'>Remove Color</button>";
            echo "</div>";
        }
    } else {
        echo "<p>No colors added yet.</p>";
    }

    echo "</div>";
echo '<button type="button" class="button button-secondary" id="wpsc_color_add_color">' . esc_html__('Add Color', 'wpscolor') . '</button>';
   
}



// Callback function for Custom CSS
function wpsc_color_custom_css_callback() {
	 echo '<p>' . esc_html__('Set css CLASS that will be change the color and Border Color Example #title,.new_title>.text,.page a', 'wpscolor') . '</p>';
    $value = get_option('wpsc_color_custom_css');
    ?>
    <label for='wpsc_color_custom_css'></label>
    <textarea id='wpsc_color_custom_css' name='wpsc_color_custom_css' rows='5' cols='50'><?php echo esc_textarea($value); ?></textarea>
    <?php
}


function wpsc_color_bg_custom_css_callback() {
	 echo '<p>' . esc_html__('Set css CLASS that will be change the BACKGROUND color Example #title,.new_title>.text,.page a', 'wpscolor') . '</p>';
    $value = get_option('wpsc_color_bg_custom_css');
    ?>

    <label for='wpsc_color_bg_custom_css'></label>
    <textarea id='wpsc_color_bg_custom_css' name='wpsc_color_bg_custom_css' rows='5' cols='50'><?php echo esc_textarea($value); ?></textarea>
    <?php
}


// Custom CSS for Admin callback
function wpsc_color_custom_css_admin_callback() {
    echo '<p>' . esc_html__('Set Custom CSS for any changes on FrontEnd example #title{color:red;} ', 'wpscolor') . '</p>';
    $value = get_option('wpsc_color_custom_css_admin');
    ?>
    <label for='wpsc_color_custom_css_admin'></label>
    <textarea id='wpsc_color_custom_css_admin' name='wpsc_color_custom_css_admin' rows='5' cols='50'><?php echo esc_textarea($value); ?></textarea>
    <?php
}


// Section callback
function wpsc_color_section_callback() {
    echo '<p>' . esc_html__('Enter the  below Input For Sidebar Presentatin:', 'wpscolor') . '</p>';
	 echo '<b>' . esc_html__('If you do not want to Show keep EMPTY all the feilds', 'wpscolor') . '</b>';
}


// Input One Text callback
function wpsc_color_input_one_text_callback() {
    $value = sanitize_text_field(get_option('wpsc_color_input_one_text'));

    echo "<input type='text' id='wpsc_color_input_one_text' name='wpsc_color_input_one_text' value='" . esc_attr($value) . "' />";
}

// Input One URL callback
function wpsc_color_input_one_url_callback() {
    $value = esc_url(get_option('wpsc_color_input_one_url'));

    echo "<input type='url' id='wpsc_color_input_one_url' name='wpsc_color_input_one_url' value='" . esc_attr($value) . "' />";
}

// Input One Icon callback
function wpsc_color_input_one_icon_callback() {
    $value = sanitize_text_field(get_option('wpsc_color_input_one_icon'));

    echo "<div class='icon_input'><input type='text' id='wpsc_color_input_one_icon'  name='wpsc_color_input_one_icon' value='" . esc_attr($value) . "' /> </div>";
}






// Input Two Text callback
function wpsc_color_input_two_text_callback() {
    $value = sanitize_text_field(get_option('wpsc_color_input_two_text'));

    echo "<input type='text' id='wpsc_color_input_two_text' name='wpsc_color_input_two_text' value='" . esc_attr($value) . "'
  />";
}

// Input Two URL callback
function wpsc_color_input_two_url_callback() {
    $value = esc_url(get_option('wpsc_color_input_two_url'));
 
    echo "<input type='url' id='wpsc_color_input_two_url' name='wpsc_color_input_two_url' value='" . esc_attr($value) . "'
  />";
}
// Input Two Icon callback
function wpsc_color_input_two_icon_callback() {
    $value = sanitize_text_field(get_option('wpsc_color_input_two_icon'));

    echo "<div class='icon_input'><input type='text' id='wpsc_color_input_two_icon' name='wpsc_color_input_two_icon' value='" . esc_attr($value) . "'
  /></div>";
}








// Input Three Text callback
function wpsc_color_input_three_text_callback() {
    $value = sanitize_text_field(get_option('wpsc_color_input_three_text'));
   
    echo "<input type='text' id='wpsc_color_input_three_text' name='wpsc_color_input_three_text' value='" . esc_attr($value) . "'
 />";
}

// Input Three URL callback
function wpsc_color_input_three_url_callback() {
    $value = esc_url(get_option('wpsc_color_input_three_url'));
   
    echo "<input type='url' id='wpsc_color_input_three_url' name='wpsc_color_input_three_url' value='" . esc_attr($value) . "'
 />";
}
// Input three Icon callback
function wpsc_color_input_three_icon_callback() {
    $value = sanitize_text_field(get_option('wpsc_color_input_three_icon'));

    echo "<div class='icon_input'><input type='text' id='wpsc_color_input_three_icon' name='wpsc_color_input_three_icon' value='" . esc_attr($value) . "' /></div>";
}







// Input Four Text callback
function wpsc_color_input_four_text_callback() {
    $value = sanitize_text_field(get_option('wpsc_color_input_four_text'));
 
    echo "<input type='text' id='wpsc_color_input_four_text' name='wpsc_color_input_four_text' value='" . esc_attr($value) . "' />";
}

// Input Four URL callback
function wpsc_color_input_four_url_callback() {
    $value = esc_url(get_option('wpsc_color_input_four_url'));
   
    echo "<input type='url' id='wpsc_color_input_four_url' name='wpsc_color_input_four_url' value='" . esc_attr($value) . "' />";
}

// Input four Icon callback
function wpsc_color_input_four_icon_callback() {
    $value = sanitize_text_field(get_option('wpsc_color_input_four_icon'));

    echo "<div class='icon_input'><input type='text' id='wpsc_color_input_four_icon' name='wpsc_color_input_four_icon' value='" . esc_attr($value) . "' /></div>";
}





function wpsc_color_activate_first_color_callback() {
    $value = get_option('wpsc_color_activate_first_color');
    ?>
    <input type="checkbox" id="wpsc_color_activate_first_color" name="wpsc_color_activate_first_color" value="1" <?php checked(1, $value); ?> />
    <label for="wpsc_color_activate_first_color"><?php esc_html_e('If you Checked First color will not be as Active Color', 'wpscolor'); ?></label>
    <?php
}



