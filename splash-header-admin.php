<?php

/*
  Plugin Name: Splash header
  Plugin URI:
  Description: Plugin to create splash header
  Version: 2.1.4
  Author: Zeesweb Team
  Text Domain: splash-header
  Author URI: http://zeesweb.com
  License: GPL2
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}
require_once plugin_dir_path(__FILE__) . 'includes/splash-header-constants.php';


// register fonctions 
register_activation_hook(__FILE__, 'zee_splash_header_activate');
register_deactivation_hook(__FILE__, 'zee_splash_header_deactivation');

if (isset($_GET['tab']))
    $tab = sanitize_title_for_query($_GET['tab']);
else
    $tab = 'general';

/**
 *  Plugin init .
 */
function zee_splashheader_init() {

    add_action('admin_enqueue_scripts', 'zee_splash_header_load_resources');

    add_action('admin_menu', 'zee_splash_header_admin_menu');

    load_plugin_textdomain('splash-header', false, ZEE_SPLASHHEADER__LANG_URL);


}

function zee_splash_header_admin() {

    include('splash-header-admin-form.php');
}

/**
 *  Plugin admin menu .
 */
function zee_splash_header_admin_menu() {

    global $tab;

    // get tabs label

    $tablabel = zee_splashheader_get_tab_label($tab);

    // This adds the main menu page

    add_menu_page(__('Splash Header Display'), __('Splash Header'), 'manage_options', ZEE_SPLASHHEADER_PLUGIN_SlUG, 'zee_splash_header_admin', plugins_url('splash-header') . '/assets/menu-icon.png');

    add_submenu_page(ZEE_SPLASHHEADER_PLUGIN_SlUG, $tablabel, __('General'), 'manage_options', ZEE_SPLASHHEADER_PLUGIN_SlUG, 'zee_splash_header_admin');

    add_submenu_page(ZEE_SPLASHHEADER_PLUGIN_SlUG, __('Plugin Settings', ZEE_SPLASHHEADER_DOMAIN), __('Plugin Settings', ZEE_SPLASHHEADER_DOMAIN), 'manage_options', ZEE_SPLASHHEADER_PLUGIN_SlUG . '&tab=homepage', 'zee_splash_header_admin');

    add_submenu_page(ZEE_SPLASHHEADER_PLUGIN_SlUG, __('Design Settings', ZEE_SPLASHHEADER_DOMAIN), __('Design Settings', ZEE_SPLASHHEADER_DOMAIN), 'manage_options', ZEE_SPLASHHEADER_PLUGIN_SlUG . '&tab=design', 'zee_splash_header_admin');

    add_submenu_page(ZEE_SPLASHHEADER_PLUGIN_SlUG, __('Advanced Settings', ZEE_SPLASHHEADER_DOMAIN), __('Advanced Settings', ZEE_SPLASHHEADER_DOMAIN), 'manage_options', ZEE_SPLASHHEADER_PLUGIN_SlUG . '&tab=advancedsettings', 'zee_splash_header_admin');
}

/**
 *  Plugin load resources .
 */
function zee_splash_header_load_resources() {

    global $hook_suffix;

    if (in_array($hook_suffix, array(
                'toplevel_page_splash-header',
            ))) {

        // Add the color picker css file       
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_style('thickbox');
        wp_register_style('splash-header', ZEE_SPLASHHEADER__PLUGIN_URL . ZEE_SPLASHHEADER_ASSETS . 'css/sh-admin.css?t='.time(), array(), ZEE_SPLASHHEADER_VERSION);
        wp_enqueue_style(ZEE_SPLASHHEADER_DOMAIN);
        // load media library
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_register_script('splash-header', ZEE_SPLASHHEADER__PLUGIN_URL . ZEE_SPLASHHEADER_ASSETS . 'js/splashheader.js', array(), ZEE_SPLASHHEADER_VERSION);
        wp_enqueue_script(ZEE_SPLASHHEADER_DOMAIN);
    }
}

/*
 * Plugin activation
 */

function zee_splash_header_activate() {


    require_once plugin_dir_path(__FILE__) . 'includes/class-splash-header-activator.php';
    Splash_Header_Activator::activate();
}

/**
 *  Plugin deactivation action .
 */
function zee_splash_header_deactivation() {

    require_once plugin_dir_path(__FILE__) . 'includes/class-splash-header-deactivator.php';
    Splash_Header_Deactivator::deactivate();
}


add_action('init', 'zee_splashheader_init');

/**

 *  Plugin setting page link .

 */
function zee_add_splashheader_settings_link($links) {

    $settings_link = '<a href="admin.php?page=' . ZEE_SPLASHHEADER_PLUGIN_SlUG . '">' . __('Settings', ZEE_SPLASHHEADER_DOMAIN) . '</a>';

    array_unshift($links, $settings_link);

    return $links;
}

$plugin = plugin_basename(__FILE__);

add_filter("plugin_action_links_$plugin", 'zee_add_splashheader_settings_link');

/**

 * Plugin short code .

 */
function zee_splashheader_shortcode() {

    require_once plugin_dir_path(__FILE__) . 'includes/class-splash-header-shortcodes.php';
    Splash_Header_Shortcodes::splash_header_short_code();
}

add_shortcode('splashheader', 'zee_splashheader_shortcode');

/**

 * return tab labels  .

 */
function zee_splashheader_get_tab_label($tabname) {

    switch ($tabname) {

        case "general":

            $label = __('General Splash Header', ZEE_SPLASHHEADER_DOMAIN);

            break;

        case "homepage":

            $label = __('Plugin Settings', ZEE_SPLASHHEADER_DOMAIN);

            break;

        case "design":

            $label = __('Design Design', ZEE_SPLASHHEADER_DOMAIN);

            break;

        case "advancedsettings":

            $label = __('Advanced Settings', ZEE_SPLASHHEADER_DOMAIN);

            break;
    }

    return $label;
}

/*

 * @param Integer $counter element id counter

 * return recent list of wordpress posts

 */

function zee_splash_header_recentposts_dropdown($counter) {

    $args = array('numberposts' => ZEE_SPLASHHEADER_NUMBER, 'post_status' => 'publish');

    $recent_posts = wp_get_recent_posts($args);

    $elem = '';

    $elem = '<select id="sh_recentpost_' . $counter . '" style="width:180px">

		<option  value="" selected>' . __('Select a post', ZEE_SPLASHHEADER_DOMAIN) . '<option>';

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

function zee_splash_header_recentpages_dropdown($counter) {

    $args = array('number' => ZEE_SPLASHHEADER_NUMBER, 'post_status' => 'publish');

    $recent_pages = get_pages($args);

    $elem = '';

    $elem = '<select id="sh_recentpages_' . $counter . '" style="width:180px">

		<option  value="" selected>' . __('Select a page', ZEE_SPLASHHEADER_DOMAIN) . '<option>';

    foreach ($recent_pages as $recent) {

        $elem .= '<option value="' . get_page_link($recent->ID) . '">' . $recent->post_title . '</option> ';
    }

    $elem .= '</select>';

    return $elem;
}

/**

 * admin tabs .

 */
function zee_splash_header_admin_tabs($current = 'general') {

    $tabs = array('general' => __('General'), 'homepage' => __('Plugin Settings', ZEE_SPLASHHEADER_DOMAIN), 'design' => __('Design Settings', ZEE_SPLASHHEADER_DOMAIN), 'advancedsettings' => __('Advanced Settings', ZEE_SPLASHHEADER_DOMAIN));

    $admin_tabs = '<div id="icon-themes" class="icon32"><br></div>';

    $admin_tabs .= '<h2 class="sh-nav-tab-wrapper">';
    $page = ZEE_SPLASHHEADER_PLUGIN_SlUG;
    foreach ($tabs as $tab => $name) {

        $class = ( $tab == $current ) ? ' nav-tab-active' : '';

        $admin_tabs .= "<a class='nav-tab $class' href='?page=$page&tab=$tab'>$name</a>";
    }

    $admin_tabs .= '</h2>';

    echo wp_kses_post($admin_tabs);
}

/**

 * Converts current time for given timezone (considering DST)

 *  to 14-digit UTC timestamp (YYYYMMDDHHMMSS)

 * DateTime requires PHP >= 5.2

 * @param $timezone timezone

 * @return string

 */
function zee_splash_header_get_date($format) {

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

/**

 * Converts current time for given timezone (considering DST)

 *  to 14-digit UTC timestamp (YYYYMMDDHHMMSS)

 * DateTime requires PHP >= 5.2

 * @param $timezone timezone

 * @return string

 */
function zee_splash_header_get_time($format) {

    // default wordpress format 

    $date = "";

    if (get_option('timezone_string') == '') {

        $timezone = date_default_timezone_get();
    } else {

        $timezone = get_option('timezone_string');
    }

    if ($format == '') {

        $format = get_option('time_format');
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
 * @param String $selected_value selected date by user
 * @return date selected
 */

function zee_splash_header_get_date_format($selected_value) {

    $format_arr = array(
        'F j, Y' => zee_splash_header_get_date('F j, Y'),
        'Y-m-d' => zee_splash_header_get_date('Y-m-d'),
        'm/d/Y' => zee_splash_header_get_date('m/d/Y'),
        'd/m/Y' => zee_splash_header_get_date('d/m/Y'),
        'm.d.y' => zee_splash_header_get_date('m.d.y'),
        'j, n, Y' => zee_splash_header_get_date('j, n, Y'),
        'D M j' => zee_splash_header_get_date('D M j'),
        'd/m/Y' => zee_splash_header_get_date('d/m/Y'),
    );

    $elem = '';

    $elem = '<select id="sh_date_format"  name="sh_date_format" style="width:220px">

		<option  value=""   >' . __('Select date format', ZEE_SPLASHHEADER_DOMAIN) . '<option>';

    // check if user has saved his timezone settings

    $bool = true;

    foreach ($format_arr as $key => $value) {

        $user_selection = '';

        if ($value == '') {

            $bool = false;
        } else {

            if ($selected_value == $key) {

                $user_selection = 'selected';
            }

            $elem .= '<option value="' . esc_html($key) . '"  ' . esc_html($user_selection) . '>' . esc_html($value) . '</option> ';
        }
    }

    $elem .= '</select>';

    if ($bool == false) {

        $elem = "";
    }

    return ($elem);
}

/*
 * @param String $selected_value selected time by user
 * @return time selected
 */

function zee_splash_header_get_time_format($selected_value) {

    $format_arr = array(
        'g:i a' => zee_splash_header_get_time('g:i a'),
        'g:i A' => zee_splash_header_get_time('g:i A'),
        'H:i' => zee_splash_header_get_time('H:i'),
        'H:i:s' => zee_splash_header_get_time('H:i:s'),
    );

    $elem = '';

    $elem = '<select id="sh_time_format"  name="sh_time_format" style="width:220px">

		<option  value=""   >' . __('Select time format', ZEE_SPLASHHEADER_DOMAIN) . '<option>';

    // check if user has saved his timezone settings

    $bool = true;

    foreach ($format_arr as $key => $value) {

        $user_selection = '';

        if ($value == '') {

            $bool = false;
        } else {
            if ($selected_value == $key) {
                $user_selection = 'selected';
            }
            $elem .= '<option value="' . esc_html($key) . '"  ' . esc_html($user_selection) . '>' . esc_html($value) . '</option> ';
        }
    }

    $elem .= '</select>';

    if ($bool == false) {

        $elem = "";
    }

    return ($elem);
}

/*
 * @param String $selected_value selected date position by user
 * @return date posiition ( left , right , center ) 
 */

function zee_splash_header_get_date_position($selected_value) {

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

        $elem .= '<option value="' . esc_html($key) . '" ' . esc_html($user_selection) . '>' . esc_html($value) . '</option> ';
    }

    $elem .= '</select>';

    return ($elem);
}

/*
 * @param String $selected_value selected time by user
 * @return time posiition ( left , right , center ) 
 */

function zee_splash_header_get_time_position($selected_value) {

    $positon_arr = array(
        'left' => __('Left'),
        'center' => __('Center'),
        'right' => __('Right'),
    );

    $elem = '';

    $elem = '<select id="sh_time_position"  name="sh_time_position" style="width:180px">';

    foreach ($positon_arr as $key => $value) {

        $user_selection = '';

        if ($selected_value == $key) {

            $user_selection = 'selected';
        }

        $elem .= '<option value="' . esc_html($key) . '" ' . esc_html($user_selection) . '>' . esc_html($value) . '</option> ';
    }

    $elem .= '</select>';

    return $elem;
}

/*
 * @param String $selected_value selected date font by user
 * @return  font weight  ( normal, bold , bolder ... ) 
 */

function zee_splash_header_get_date_font_weight($selected_value) {

    $weight_arr = array(
        'normal' => __('Normal'),
        'bold' => __('Bold'),
        'bolder' => __('Bolder'),
        'lighter' => __('Lighter'),
        '100' => __('100'),
        '200' => __('200'),
        '300' => __('300'),
        '400' => __('400'),
        '500' => __('500'),
        '600' => __('600'),
        '700' => __('700'),
        '800' => __('800'),
        '900' => __('900'),
    );

    $elem = '';

    $elem = '<select id="sh_date_font_weight"  name="sh_date_font_weight" style="width:180px">';

    foreach ($weight_arr as $key => $value) {

        $user_selection = '';

        if ($selected_value == $key) {

            $user_selection = 'selected';
        }

        $elem .= '<option value="' . esc_html($key) . '" ' . esc_html($user_selection) . '>' . esc_html($value) . '</option> ';
    }

    $elem .= '</select>';

    return $elem;
}

/*
 * @param String $selected_value selected time font by user
 * @return  font weight  ( normal, bold , bolder ... ) 
 */

function zee_splash_header_get_time_font_weight($selected_value) {

    $weight_arr = array(
        'normal' => __('Normal'),
        'bold' => __('Bold'),
        'bolder' => __('Bolder'),
        'lighter' => __('Lighter'),
        '100' => __('100'),
        '200' => __('200'),
        '300' => __('300'),
        '400' => __('400'),
        '500' => __('500'),
        '600' => __('600'),
        '700' => __('700'),
        '800' => __('800'),
        '900' => __('900'),
    );

    $elem = '';

    $elem = '<select id="sh_time_font_weight"  name="sh_time_font_weight" style="width:180px">';

    foreach ($weight_arr as $key => $value) {

        $user_selection = '';

        if ($selected_value == $key) {

            $user_selection = 'selected';
        }

        $elem .= '<option value="' . esc_html($key) . '" ' . esc_html($user_selection) . '>' . esc_html($value) . '</option> ';
    }

    $elem .= '</select>';

    return $elem;
}

/*
 * @param String $selected_value selected time font style by user
 * @return  font style  ( normal, bold , bolder ... ) 
 */

function zee_splash_header_get_time_font_style($selected_value) {

    $style_arr = array(
        'normal' => __('Normal'),
        'italic' => __('Italic'),
        'oblique' => __('Oblique'),
    );

    $elem = '';

    $elem = '<select id="sh_time_font_style"  name="sh_time_font_style" style="width:180px">';

    foreach ($style_arr as $key => $value) {

        $user_selection = '';

        if ($selected_value == $key) {

            $user_selection = 'selected';
        }

        $elem .= '<option value="' . esc_html($key) . '" ' . esc_html($user_selection) . '>' . esc_html($value) . '</option> ';
    }

    $elem .= '</select>';

    return $elem;
}

/*
 * @param String $selected_value selected time font by user
 * @return  font weight  ( normal, bold , bolder ... ) 
 */

function zee_splash_header_get_time_font_decoration($selected_value) {

    $decoration_arr = array(
        'none' => __('None'),
        'overline' => __('Overline'),
        'line-through' => __('Line through'),
        'underline' => __('Underline'),
        'underline overline' => __('Underline overline'),
    );

    $elem = '';

    $elem = '<select id="sh_time_font_decoration"  name="sh_time_font_decoration" style="width:180px">';

    foreach ($decoration_arr as $key => $value) {

        $user_selection = '';

        if ($selected_value == $key) {

            $user_selection = 'selected';
        }

        $elem .= '<option value="' . esc_html($key) . '" ' . esc_html($user_selection) . '>' . esc_html($value) . '</option> ';
    }

    $elem .= '</select>';

    return $elem;
}

/*
 * @param String $selected_value selected date font style by user
 * @return  font style  
 */

function zee_splash_header_get_date_font_style($selected_value) {

    $style_arr = array(
        'normal' => __('Normal'),
        'italic' => __('Italic'),
        'oblique' => __('Oblique'),
    );

    $elem = '';

    $elem = '<select id="sh_date_font_style"  name="sh_date_font_style" style="width:180px">';

    foreach ($style_arr as $key => $value) {

        $user_selection = '';

        if ($selected_value == $key) {

            $user_selection = 'selected';
        }

        $elem .= '<option value="' . esc_html($key) . '" ' . esc_html($user_selection) . '>' . esc_html($value) . '</option> ';
    }

    $elem .= '</select>';

    return $elem;
}

/*
 * @param String $selected_value selected time font by user
 * @return  font weight  ( normal, bold , bolder ... ) 
 */

function zee_splash_header_get_date_font_decoration($selected_value) {

    $decorationt_arr = array(
        'none' => __('None'),
        'overline' => __('Overline'),
        'line-through' => __('Line through'),
        'underline' => __('Underline'),
        'underline overline' => __('Underline overline'),
    );
    $elem = '';

    $elem = '<select id="sh_date_font_decoration"  name="sh_date_font_decoration" style="width:180px">';

    foreach ($decorationt_arr as $key => $value) {

        $user_selection = '';

        if ($selected_value == $key) {

            $user_selection = 'selected';
        }

        $elem .= '<option value="' . esc_html($key) . '" ' . esc_html($user_selection) . '>' . esc_html($value) . '</option> ';
    }

    $elem .= '</select>';

    return $elem;
}

/*
  function enqueue_plugin_scripts($plugin_array) {
  //enqueue TinyMCE plugin script with its ID.
  $plugin_array["splash_header"] = plugin_dir_url(__FILE__) . "assets/js/editor_plugin.js";
  return $plugin_array;
  }

 */

//add_filter("mce_external_plugins", "enqueue_plugin_scripts");

function zee_splash_header_register_buttons_editor($buttons) {
    //register buttons with their id.
    array_push($buttons, "shortcode");
    return $buttons;
}

add_filter("mce_buttons", "zee_splash_header_register_buttons_editor");

function ajax_splashheader_dashboard_welcome() {
    include(ZEE_SPLASHHEADER__PLUGIN_URL . '/views/wordpress-dashboard-welcome-page.php');
    exit;
}

add_action('wp_ajax_splashheader_dashboard_welcome', 'ajax_splashheader_dashboard_welcome');

add_action('wp_dashboard_setup', 'zee_splash_header_dashboard_widgets');

function zee_splash_header_dashboard_widgets() {
    global $wp_meta_boxes;
    wp_add_dashboard_widget('custom_help_widget', 'Splash Header Info', 'zee_splash_header_dashboard_help');
}

function zee_splash_header_preview() {


    require_once plugin_dir_path(__FILE__) . 'includes/class-splash-header-preview.php';
    Splash_Header_Preview::sp_preview();
}

function zee_splash_header_dashboard_help() {


    $dashboard = '<div class="survey-wrapper">
	<a style=" font-size:16px;"  href="https://goo.gl/forms/lf71KyVdnTrudXpx1" target="_blank">Help us improving our plugin by taking this survey!</a> 
	</div>';

    $dashboard .= '<div class="survey-wrapper"> <br/>
	<a style=" font-size:16px;color: red;" href="admin.php?page=' . ZEE_SPLASHHEADER_PLUGIN_SlUG . '&tab=general" target="_blank">Take a look of how the splash header is displayed</a> 
	</div>';

    $dashboard .= '<br/><br/>
        <div style="font-size:20px;margin-bottom:20px">Preview of your splash header:</div>';
    $allowed_html = array(
        'a' => array(
            'href' => array(),
            'title' => array(),
        ),
        'br' => array(),
        'em' => array(),
        'strong' => array(),
        'div' => array(
            'style' => array()
        ),
    );

    echo wp_kses_post($dashboard);

    zee_splash_header_preview();
}

?>
