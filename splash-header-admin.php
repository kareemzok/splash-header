<?php

/*
  Plugin Name: Splash header
  Plugin URI:
  Description: Plugin to create splash header
  Version: 1.15.1
  Author: Zeesweb Team
  Author URI: http://zeesweb.com
  License: GPL2
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}
// define variables 
define('SPLASHHEADER__PLUGIN_URL', plugin_dir_url(__FILE__));
define('SPLASHHEADER__LANG_URL', plugin_basename(dirname(__FILE__)) . '/languages/');
define('ASSETS', 'assets/');
define('SPLASHHEADER_VERSION', '1.15.1');
//The text domain name is  used to form the name of the MO file for your plugin
define('TEXT_DOMAIN', 'splash-header');
//define the root url of the plugin
define('PLUGIN_SlUG', 'Splash_Header_Display');
// number of posts or pages
define('NUMBER', 100);
//define font size max
define('FONT_SIZE', 30);

// register fonctions 
register_activation_hook(__FILE__, 'splash_header_activate');
register_deactivation_hook(__FILE__, 'splash_header_deactivation');


if (isset($_GET['tab']))
    $tab = $_GET['tab'];
else
    $tab = 'general';

/**
 *  Plugin init .
 */
function splashheader_init() {

    add_action('admin_enqueue_scripts', 'load_resources');
    add_action('admin_menu', 'splash_header_admin_menu');
    load_plugin_textdomain(TEXT_DOMAIN, false, SPLASHHEADER__LANG_URL);
}

function splash_header_admin() {
    include('splash-header-admin-form.php');
}

/**
 *  Plugin admin menu .
 */
function splash_header_admin_menu() {

    global $tab;
    // get tabs label
    $tablabel = splashheader_get_tab_label($tab);
    // This adds the main menu page
    add_menu_page(__('Splash Header Display'), __('Splash Header'), 'manage_options', PLUGIN_SlUG, 'splash_header_admin', plugins_url('splash-header') . '/assets/menu-icon.png');
    add_submenu_page(PLUGIN_SlUG, $tablabel, __('General'), 'manage_options', PLUGIN_SlUG, 'splash_header_admin');
    add_submenu_page(PLUGIN_SlUG, __('Plugin Settings', TEXT_DOMAIN), __('Plugin Settings', TEXT_DOMAIN), 'manage_options', PLUGIN_SlUG . '&tab=homepage', 'splash_header_admin');
    add_submenu_page(PLUGIN_SlUG, __('Design Settings', TEXT_DOMAIN), __('Design Settings', TEXT_DOMAIN), 'manage_options', PLUGIN_SlUG . '&tab=design', 'splash_header_admin');
    add_submenu_page(PLUGIN_SlUG, __('Advanced Settings', TEXT_DOMAIN), __('Advanced Settings', TEXT_DOMAIN), 'manage_options', PLUGIN_SlUG . '&tab=advancedsettings', 'splash_header_admin');
}

/**
 *  Plugin load resources .
 */
function load_resources() {
    global $hook_suffix;
    if (in_array($hook_suffix, array(
                'toplevel_page_Splash_Header_Display',
            ))) {

        // Add the color picker css file       
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');

        wp_enqueue_style('thickbox');
        wp_register_style('sh-admin', SPLASHHEADER__PLUGIN_URL . ASSETS . 'css/sh-admin.css', array(), SPLASHHEADER_VERSION);
        wp_enqueue_style('sh-admin');
        // load media library
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');

        wp_register_script('splashheader', SPLASHHEADER__PLUGIN_URL . ASSETS . 'js/splashheader.js', array(), SPLASHHEADER_VERSION);
        wp_enqueue_script('splashheader');
        // load jquery ui 
    }
}

/**
 * Plugin activation
 */
function splash_header_activate() {


    add_option('sh_title');
    add_option('sh_message');
    add_option('sh_show');
    add_option('sh_show_links_1');
    add_option('sh_show_links_2');
    add_option('sh_show_custom_code');
    add_option('sh_bg_color');
    add_option('sh_title_color');
    add_option('sh_message_color');
    add_option('sh_title_font_size');
    add_option('sh_message_font_size');
    add_option('sh_code_message');
    add_option('sh_width');
    add_option('sh_border_color');
    add_option('sh_border_style');
    add_option('sh_border_width');
    add_option('sh_show_clock_date');
    add_option('sh_show_clock_time');
    add_option('sh_date_format');
    add_option('sh_date_position');
    add_option('sh_date_font_size');
    add_option('sh_date_font_color');

    for ($i = 1; $i <= 6; $i++) {
        add_option('sh_link_title_' . $i);
        add_option('sh_link_url_' . $i);
        add_option('sh_link_title_color_' . $i);
        add_option('sh_link_font_size_' . $i);
        add_option('sh_link_thumb_img_' . $i);
        add_option('sh_font_icon_' . $i);
        add_option('sh_link_open_' . $i);
        if ($i <= 4) {
            add_option('sh_col_width_' . $i);
        }
    }
}

/**
 *  Plugin deactivation action .
 */
function splash_header_deactivation() {

    /*
      delete_option('sh_show');
      delete_option('sh_title');
      delete_option('sh_show_links_1');
      delete_option('sh_show_links_2');
      delete_option('sh_show_custom_code');
      delete_option('sh_message');
      delete_option('sh_bg_color');
      delete_option('sh_title_color');
      delete_option('sh_message_color');
      delete_option('sh_title_font_size');
      delete_option('sh_message_font_size');
      delete_option('sh_code_message');
      delete_option('sh_width');
      delete_option('sh_border_color');
      delete_option('sh_border_style');
      delete_option('sh_border_width');
      delete_option('sh_show_clock_date');
      delete_option('sh_show_clock_time');
      delete_option('sh_date_format');
      delete_option('sh_date_position');
      for ($i = 1; $i <= 6; $i++) {
      delete_option('sh_link_title_' . $i);
      delete_option('sh_link_url_' . $i);
      delete_option('sh_link_title_color_' . $i);
      delete_option('sh_link_font_size_' . $i);
      delete_option('sh_link_thumb_img_' . $i);
      if ($i <= 4) {
      delete_option('sh_col_width_' . $i);
      }
      }
     */
}

add_action('init', 'splashheader_init');

/**
 *  Plugin setting page link .
 */
function add_splashheader_settings_link($links) {
    $settings_link = '<a href="admin.php?page=Splash_Header_Display">' . __('Settings', TEXT_DOMAIN) . '</a>';
    array_unshift($links, $settings_link);
    return $links;
}

$plugin = plugin_basename(__FILE__);
add_filter("plugin_action_links_$plugin", 'add_splashheader_settings_link');

/**
 * Plugin short code .
 */
function _splashheader_shortcode() {
    wp_enqueue_style('splashheader', SPLASHHEADER__PLUGIN_URL . ASSETS . 'css/splashheader.css', array(), SPLASHHEADER_VERSION);
    wp_enqueue_style('font-awesome', SPLASHHEADER__PLUGIN_URL . ASSETS . 'css/font-awesome.css', array(), SPLASHHEADER_VERSION);

// wp_enqueue_style('splashheader');
    $enabled = get_option('sh_show');
    $enabled_links_1 = get_option('sh_show_links_1');
    $enabled_links_2 = get_option('sh_show_links_2');
    $enabled_custom_code = get_option('sh_show_custom_code');
    $enabled_date = get_option('sh_show_clock_date');
    $date_position = get_option('sh_date_position');
    $date_font_size = get_option('sh_date_font_size');
    $date_font_color = get_option('sh_date_font_color');
    $date_format = get_option('sh_date_format');

    $color_element = 'color:';
    $font_size_element = 'font-size:';
    $appearence = 0;

    // get container width
    $sh_width = get_option('sh_width');
    // get cols width
    for ($w = 1; $w <= 4; $w++) {
        $sh_width_col = get_option('sh_col_width_' . $w);
        if ($sh_width_col != '') {
            $col_width_style[$w] = 'width:' . $sh_width_col . '%';
        }
    }
    
    if ($sh_width == '') {
        $sh_width = 85;
    }
    if ($enabled) {

        $appearence++;
        $border_color = get_option('sh_border_color');
        if ($border_color != '') {
            $border_style = get_option('sh_border_style');
            if ($border_style == '')
                $border_style = 'solid';
            $border_width = get_option('sh_border_width');
            if ($border_width == '')
                $border_width = '1';
        }
        $title = get_option('sh_title');
        $message = get_option('sh_message');
        $title_font_size = get_option('sh_title_font_size');
        $message_font_size = get_option('sh_message_font_size');
        $title_color = get_option('sh_title_color');
        $message_color = get_option('sh_message_color');
        $bg_color = get_option('sh_bg_color');
        $custom_code = get_option('sh_code_message');

        //set splash header border color , style and width 
        if ($border_color != '') {
            $sh_border_color = 'border-color:' . $border_color . ';';
        }

        if ($border_style != '') {
            $sh_border_style = 'border-style:' . $border_style . ';';
        }

        if ($border_width != '') {
            $sh_border_width = 'border-width:' . $border_width . 'px;';
        }
        // set background color for splach header
        if ($bg_color != '') {
            $sh_message_bgcolor = 'background-color:' . $bg_color . ';';
        }
        // set font color and size for title and message 
        if ($title_font_size != '')
            $title_font_size = $font_size_element . $title_font_size . 'px;';
        if ($title_color != '')
            $title_color = $color_element . $title_color . ';';

        if ($message_font_size != '')
            $message_font_size = $font_size_element . $message_font_size . 'px;';
        if ($message_color != '')
            $message_color = $color_element . $message_color . ';';

        if ($message_font_size != '' || $message_color != '')
            $style_message = $message_font_size . $message_color;
    }
    if ($enabled_links_1 && $sh_width_2 == '') {
        $appearence++;
    }
    if ($enabled_links_2 && $sh_width_3 == '') {
        $appearence++;
    }
    if ($enabled_custom_code && $sh_width_4 == '') {
        $appearence++;
    }
    if ($appearence == 4)
        $col_class = 'sh-col-25';
    else if ($appearence == 3)
        $col_class = 'sh-col-33';
    else if ($appearence == 2)
        $col_class = 'sh-col-50';
    else if ($appearence == 1)
        $col_class = 'sh-col-100';



    if ($title != '') {
        $title_div = '<h3 class="sh-title" style="' . $title_color . $title_font_size . 'margin:10px 0 0 0">' . $title . '</h3>';
    }
    if ($message != '') {
        $message_div = ' <div class="sh-message" style="' . $style_message . 'margin:10px 0 0 0">' . $message . '</div>';
    }
    $current_date = splash_header_get_date($date_format);

    $date_position = get_option('sh_date_position');
    $date_font_size = get_option('sh_date_font_size');
    $date_font_color = get_option('sh_date_font_color');

    if ($date_position != '') {
        $sh_date_position = 'text-align:' . $date_position . ';';
    }
    if ($date_font_size != '') {
        $sh_date_font_size = 'font-size:' . $date_font_size . 'px;';
    }
    if ($date_font_color != '') {
        $sh_date_font_color = 'color:' . $date_font_color . ';';
    }
    if ($enabled_date) {
        $date_content = '<div class="splash-header-date" style="' . $sh_date_position . $sh_date_font_size . $sh_date_font_color . '">' . $current_date . '</div>';
    }

    $content = '<div id="splash-header" class="splash-header" style="width:' . $sh_width . '%;' . $sh_message_bgcolor . $sh_border_style . $sh_border_width . 'margin:0 auto;' . $sh_border_color . '">'
            . $date_content . '<div class="sh-col ' . $col_class . '" style="' . $col_width_style[1] . '">' . $title_div . '' . $message_div . '</div>';
    if ($enabled_links_1) {
        $content.='<div class="sh-col ' . $col_class . '" style="' . $col_width_style[2] . '">';
        //set up links 1 section 
        for ($i = 1; $i <= 3; $i++) {
            $img_element_1 = "";
            // set font size 
            if (get_option('sh_link_font_size_' . $i) != '') {
                $font_size_1 = $font_size_element . get_option('sh_link_font_size_' . $i) . "px;";
            }
            // set font color 
            if (get_option('sh_link_title_color_' . $i) != '') {
                $font_color_1 = $color_element . get_option('sh_link_title_color_' . $i) . ";";
            }
            // set font style
            if ($font_size_1 != '' || $font_color_1 != '')
                $style_1 = 'style="' . $font_size_1 . $font_color_1 . '"';

            // set font awsome icon
            if (get_option('sh_font_icon_' . $i) != '') {

                $img_element_1 = '<span class="fa ' . get_option('sh_font_icon_' . $i) . '"></span>';
            }
            // set link target as _blank if its cheked
            if (get_option('sh_link_open_' . $i))
                $target = 'target="_blank"';
            else
                $target = 'target="_self"';

            if (get_option('sh_link_title_' . $i) != '' && get_option('sh_link_url_' . $i) != '')
                $content.= '<div class="sh-links">' . $img_element_1 . '<a ' . $style_1 . ' href="' . get_option('sh_link_url_' . $i) . '" ' . $target . '>' . get_option('sh_link_title_' . $i) . '</a></div>';
        }
        $content.='</div>';
    }
    if ($enabled_links_2) {

        $content.='<div class="sh-col ' . $col_class . '" style="' . $col_width_style[3] . '">';
        //set up links 2 sections
        for ($i = 4; $i <= 6; $i++) {
            // set font size 
            if (get_option('sh_link_font_size_' . $i) != '') {
                $font_size_2 = $font_size_element . get_option('sh_link_font_size_' . $i) . "px;";
            }
            // set font color 
            if (get_option('sh_link_title_color_' . $i) != '') {
                $font_color_2 = $color_element . get_option('sh_link_title_color_' . $i) . ";";
            }
            // set font style  
            if ($font_size_2 != '' || $font_color_2 != '')
                $style_2 = 'style="' . $font_size_2 . $font_color_2 . '"';

            // set font icon 
            if (get_option('sh_font_icon_' . $i) != '') {
                $img_element_2 = '<span class="fa ' . get_option('sh_font_icon_' . $i) . '"></span>';
            }
            // set link target as _blank if its cheked
            if (get_option('sh_link_open_' . $i))
                $target = 'target="_blank"';
            else
                $target = 'target="_self"';

            if (get_option('sh_link_title_' . $i) != '' && get_option('sh_link_url_' . $i) != '')
                $content.= '<div class="sh-links">' . $img_element_2 . '<a ' . $style_2 . '  href="' . get_option('sh_link_url_' . $i) . '"  ' . $target . '>' . get_option('sh_link_title_' . $i) . '</a></div>';
        }
        $content.='</div>';
    }
    if ($enabled_custom_code) {
        $content.='
    <div class="sh-col ' . $col_class . '" style="' . $col_width_style[4] . '">' . do_shortcode(get_option('sh_code_message')) . '</div>
    </div><div class="sh-clearfix"></div>';
    }
    $content.='</div>';
    if ($enabled == 0) {
        $content = '';
    }
    echo $content;
}

add_shortcode('splashheader', '_splashheader_shortcode');

/**
 * return tab labels  .
 */
function splashheader_get_tab_label($tabname) {

    switch ($tabname) {
        case "general":
            $label = __('General Splash Header', TEXT_DOMAIN);
            break;
        case "homepage":
            $label = __('Plugin Settings', TEXT_DOMAIN);
            break;
        case "design":
            $label = __('Design Design', TEXT_DOMAIN);
            break;
        case "advancedsettings":
            $label = __('Advanced Settings', TEXT_DOMAIN);
            break;
    }
    return $label;
}

/*
 * @param Integer $counter element id counter
 * return recent list of wordpress posts
 */

function splash_header_recentposts_dropdown($counter) {

    $args = array('numberposts' => NUMBER, 'post_status' => 'publish');
    $recent_posts = wp_get_recent_posts($args);
    $elem = '';
    $elem = '<select id="sh_recentpost_' . $counter . '" style="width:180px">
		<option  value="" selected>' . __('Select a post', TEXT_DOMAIN) . '<option>';
    foreach ($recent_posts as $recent) {
        $elem .= '<option value="' . get_permalink($recent["ID"]) . '">' . $recent["post_title"] . '</option> ';
    }
    $elem .= '</select>';
    return $elem;
}

/*
 * @param Integer $counter element id counter
 * @return recent pages of wordpress posts
 */

function splash_header_recentpages_dropdown($counter) {
    $args = array('number' => NUMBER, 'post_status' => 'publish');
    $recent_pages = get_pages($args);
    $elem = '';
    $elem = '<select id="sh_recentpages_' . $counter . '" style="width:180px">
		<option  value="" selected>' . __('Select a page', TEXT_DOMAIN) . '<option>';

    foreach ($recent_pages as $recent) {
        $elem .= '<option value="' . get_page_link($recent->ID) . '">' . $recent->post_title . '</option> ';
    }
    $elem .= '</select>';
    return $elem;
}

/**
 * admin tabs .
 */
function splash_header_admin_tabs($current = 'general') {
    $tabs = array('general' => __('General'), 'homepage' => __('Plugin Settings', TEXT_DOMAIN), 'design' => __('Design Settings', TEXT_DOMAIN), 'advancedsettings' => __('Advanced Settings', TEXT_DOMAIN));
    echo '<div id="icon-themes" class="icon32"><br></div>';
    echo '<h2 class="nav-tab-wrapper">';
    foreach ($tabs as $tab => $name) {
        $class = ( $tab == $current ) ? ' nav-tab-active' : '';
        echo "<a class='nav-tab$class' href='?page=Splash_Header_Display&tab=$tab'>$name</a>";
    }
    echo '</h2>';
}

/**
 * Converts current time for given timezone (considering DST)
 *  to 14-digit UTC timestamp (YYYYMMDDHHMMSS)
 *
 * DateTime requires PHP >= 5.2
 *
 * @param $timezone timezone
 * @return string
 */
function splash_header_get_date($format) {
    // default wordpress format 
    $date = "";

    if (get_option('timezone_string') == '') {
        $timezone = date_default_timezone_get();
    } else {
        $timezone = get_option('timezone_string');
    }
    if ($format == '') {
        $format = get_option('date_format');
    }
    if ($timezone != '') {
        $tz = $timezone;
        $timestamp = time();
        $dt = new DateTime("now", new DateTimeZone($tz));
        $dt->setTimestamp($timestamp);
        $date = $dt->format($format);
    }
    return $date;
}

/*
 * @param Integer $counter element id counter
 * @return recent pages of wordpress posts
 */

function splash_header_get_date_format($selected_value) {
    $format_arr = array(
        'F j, Y' => splash_header_get_date('F j, Y'),
        'Y-m-d' => splash_header_get_date('Y-m-d'),
        'm/d/Y' => splash_header_get_date('m/d/Y'),
        'd/m/Y' => splash_header_get_date('d/m/Y'),
        'm.d.y' => splash_header_get_date('m.d.y'),
        'j, n, Y' => splash_header_get_date('j, n, Y'),
        'D M j' => splash_header_get_date('D M j'),
        'd/m/Y' => splash_header_get_date('d/m/Y'),
    );

    $elem = '';
    $elem = '<select id="sh_date_format"  name="sh_date_format" style="width:220px">
		<option  value=""   >' . __('Select date format', TEXT_DOMAIN) . '<option>';
    // check if user has saved his timezone settings
    $bool = true;

    foreach ($format_arr as $key => $value) {
        $user_selection = '';
//echo 'boo'.$value.'<br>';
        if ($value == '') {
            $bool = false;
        } else {
            if ($selected_value == $key) {
                $user_selection = 'selected';
            }
            $elem .= '<option value="' . $key . '"  ' . $user_selection . '>' . $value . '</option> ';
        }
    }
    $elem .= '</select>';
    if ($bool == false) {
        $elem = "";
    }
    return $elem;
}

function splash_header_get_date_position($selected_value) {
    $positon_arr = array(
        'left' => __('Left'),
        'center' => __('Center'),
        'right' => __('Right'),
    );

    $elem = '';
    $elem = '<select id="sh_date_position"  name="sh_date_position" style="width:180px">';

    foreach ($positon_arr as $key => $value) {
        $user_selection = '';
        if ($selected_value == $key) {
            $user_selection = 'selected';
        }
        $elem .= '<option value="' . $key . '" ' . $user_selection . '>' . $value . '</option> ';
    }
    $elem .= '</select>';
    return $elem;
}

/**
 * Function that will validate all fields.
 */
//function validate_options( $fields ) { 
//     
//    $valid_fields = array();
//     
//    // Validate Title Field
//    $title = trim( $fields['title'] );
//    $valid_fields['title'] = strip_tags( stripslashes( $title ) );
//     
//    // Validate Background Color
//    $background = trim( $fields['background'] );
//    $background = strip_tags( stripslashes( $background ) );
//     
//    // Check if is a valid hex color
//    if( FALSE === $this->check_color( $background ) ) {
//     
//        // Set the error message
//        add_settings_error( 'cpa_settings_options', 'cpa_bg_error', 'Insert a valid color for Background', 'error' ); // $setting, $code, $message, $type
//         
//        // Get the previous valid value
//        $valid_fields['background'] = $this->options['background'];
//     
//    } else {
//     
//        $valid_fields['background'] = $background;  
//     
//    }
//     
//    return apply_filters( 'validate_options', $valid_fields, $fields);
//}
?>