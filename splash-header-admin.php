<?php

/*
  Plugin Name: Splash header
  Plugin URI:
  Description: Plugin to create splash header
  Version: 1.0
  Author: Techwebies team
  Author URI: http://techwebies.com
  License: GPL2
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}
// define variables 
define('SPLASHHEADER__PLUGIN_URL', plugin_dir_url(__FILE__));
define('ASSETS', 'assets/');
define('SPLASHHEADER_VERSION', '1.0');

// register fonctions 
register_activation_hook(__FILE__, 'splash_header_activate');
register_deactivation_hook(__FILE__, 'splash_header_deactivation');

/**
 *  Plugin init .
 */
function splashheader_init() {
    add_action('admin_enqueue_scripts', 'load_resources');
    add_action('admin_menu', 'splash_header_admin_actions');
}

function splash_header_admin() {
    include('splash-header-admin-form.php');
}

function splash_header_admin_actions() {
    add_options_page("Splash Header Display", "Splash header", 1, "Splash_Header_Display", "splash_header_admin");
}

/**
 *  Plugin load resources .
 */
function load_resources() {
    global $hook_suffix;

    if (in_array($hook_suffix, array(
                'settings_page_Splash_Header_Display',
            ))) {

        // Add the color picker css file       
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_style('thickbox');
        wp_register_style('sh-admin', SPLASHHEADER__PLUGIN_URL . ASSETS . 'sh-admin.css', array(), SPLASHHEADER_VERSION);
        wp_enqueue_style('sh-admin');
        // load media library
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('jquery');


        wp_register_script('splashheader', SPLASHHEADER__PLUGIN_URL . ASSETS . 'splashheader.js', array(), SPLASHHEADER_VERSION);
        wp_enqueue_script('splashheader');
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
    add_option('sh_bg_color');
    add_option('sh_title_color');
    add_option('sh_message_color');
    add_option('sh_title_font_size');
    add_option('sh_message_font_size');
    add_option('sh_code_message');
    for ($i = 1; $i <= 6; $i++) {
        add_option('sh_link_title_' . $i);
        add_option('sh_link_url_' . $i);
        add_option('sh_link_title_color_' . $i);
        add_option('sh_link_font_size_' . $i);
        add_option('sh_link_thumb_img_' . $i);
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
    delete_option('sh_message');
    delete_option('sh_bg_color');
    delete_option('sh_title_color');
    delete_option('sh_message_color');
    delete_option('sh_title_font_size');
    delete_option('sh_message_font_size');
    delete_option('sh_code_message');
    for ($i = 1; $i <= 6; $i++) {
        delete_option('sh_link_title_' . $i);
        delete_option('sh_link_url_' . $i);
        delete_option('sh_link_title_color_' . $i);
        delete_option('sh_link_font_size_' . $i);
        delete_option('sh_link_thumb_img_' . $i);
    }
  */
     
}

add_action('init', 'splashheader_init');

/**
 *  Plugin setting page link .
 */
function add_splashheader_settings_link($links) {
    $settings_link = '<a href="options-general.php?page=Splash_Header_Display">Settings</a>';
    array_unshift($links, $settings_link);
    return $links;
}

$plugin = plugin_basename(__FILE__);
add_filter("plugin_action_links_$plugin", 'add_splashheader_settings_link');

/**
 * Plugin short code .
 */
function _splashheader_shortcode() {
    wp_enqueue_style('splashheader', SPLASHHEADER__PLUGIN_URL . ASSETS . 'splashheader.css', array(), SPLASHHEADER_VERSION);
    // wp_enqueue_style('splashheader');
    $enabled = get_option('sh_show');
    $enabled_links_1 = get_option('sh_show_links_1');
    $enabled_links_2 = get_option('sh_show_links_2');
    $color_element = 'color:';
    $font_size_element = 'font-size:';
    $appearence = 0 ;
    if ($enabled) {
          $appearence++;
        $title = get_option('sh_title');
        $message = get_option('sh_message');
        $title_font_size = get_option('sh_title_font_size');
        $message_font_size = get_option('sh_message_font_size');
        $title_color = get_option('sh_title_color');
        $message_color = get_option('sh_message_color');
        $bg_color = get_option('sh_bg_color');
        $custom_code =  get_option('sh_code_message'); 
        $target = 'target="_blank"';
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
            $style_message = $message_font_size . $message_color . ';';
    }
    if ($enabled_links_1) {
        $appearence++;
    }
    if ($enabled_links_2) {
        $appearence++;
    }
    if ($custom_code!='') {
        $appearence++;
    }
    if($appearence==4)
        $col_class = 'sh-col-25';
    else     if($appearence==3)
        $col_class = 'sh-col-33';
    else     if($appearence==2)
        $col_class = 'sh-col-50';
    else    if($appearence==1)
        $col_class = 'sh-col-100';
    $content = '
<div id="splash-header" class="splash-header" style="width:85%;margin:0 auto;background-color:' . $bg_color . ';">
<div class="sh-col '.$col_class.'">
<h3 class="sh-title" style="' . $title_color . $title_font_size . 'margin:10px 0 0 0">' . $title . '</h3>
    <div class="sh-message" style="' . $style_message . 'margin:10px 0 0 0">' . $message . '</div>
</div>';
    if ($enabled_links_1) {
        $content.='<div class="sh-col '.$col_class.'">';
        //set up links 1 section 
        for ($i = 1; $i <= 3; $i++) {
            if (get_option('sh_link_font_size_' . $i) != '') {
                $font_size_1 = $font_size_element . get_option('sh_link_font_size_' . $i) . "px;";
            }
            if (get_option('sh_link_title_color_' . $i) != '') {
                $font_color_1 = $color_element . get_option('sh_link_title_color_' . $i) . ";";
            }

            if ($font_size_1 != '' || $font_color_1 != '')
                $style_1 = 'style="' . $font_size_1 . $font_color_1 . '"';

            $thumg_url = get_option('sh_link_thumb_img_' . $i);
            if ($thumg_url != '') {
                $img_element_1= '<span class="icon"><img  src=' . $thumg_url . ' alt="" border="0" /></span>';
            }


            $content.= '<div class="sh-links">'.$img_element_1.'<a ' . $style_1 . ' href="' . get_option('sh_link_url_' . $i) . '" ' . $target . '>' . get_option('sh_link_title_' . $i) . '</a></div>';
        }
        $content.='</div>';
    }
    if ($enabled_links_2) {

        $content.='<div class="sh-col '.$col_class.'">';
        //set up links 2 sections
        for ($i = 4; $i <= 6; $i++) {
            if (get_option('sh_link_font_size_' . $i) != '') {
                $font_size_2 = $font_size_element . get_option('sh_link_font_size_' . $i) . "px;";
            }
            if (get_option('sh_link_title_color_' . $i) != '') {
                $font_color_2 = $color_element . get_option('sh_link_title_color_' . $i) . ";";
            }
            if ($font_size_2 != '' || $font_color_2 != '')
                $style_2 = 'style="' . $font_size_2 . $font_color_2 . '"';

            
             if ($thumg_url != '') {
                $img_element_2 = '<span class="icon"><img  src=' . $thumg_url . ' alt="" border="0" /></span>';
            }
            
            
            $content.= '<div class="sh-links">'.$img_element_2.'<a ' . $style_2 . '  href="' . get_option('sh_link_url_' . $i) . '"  ' . $target . '>' . get_option('sh_link_title_' . $i) . '</a></div>';
        }
        $content.='</div>';
    }
    $content.='
    <div class="sh-col '.$col_class.'">' . do_shortcode(get_option('sh_code_message')) . '</div>
    </div><div class="sh-clearfix"></div>';
    if ($enabled == 0) {
        $content = '';
    }
    echo $content;
}

add_shortcode('splashheader', '_splashheader_shortcode');

/**
 * admin tabs .
 */
function splash_header_admin_tabs($current = 'homepage') {
    $tabs = array('homepage' => 'Plugin Settings', 'design' => 'Design settings');
    echo '<div id="icon-themes" class="icon32"><br></div>';
    echo '<h2 class="nav-tab-wrapper">';
    foreach ($tabs as $tab => $name) {
        $class = ( $tab == $current ) ? ' nav-tab-active' : '';
        echo "<a class='nav-tab$class' href='?page=Splash_Header_Display&tab=$tab'>$name</a>";
    }
    echo '</h2>';
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