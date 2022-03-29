<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

/**
 * Fired during plugin runing .
 *
 * This class defines all code necessary for previwing the splash header in dashboard.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Splash_Header_Preview {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function sp_preview() {
		
		wp_enqueue_style('splashheader', ZEE_SPLASHHEADER__PLUGIN_URL . ZEE_SPLASHHEADER_ASSETS . 'css/splashheader.css', array(), ZEE_SPLASHHEADER_VERSION);

    wp_enqueue_style('font-awesome', ZEE_SPLASHHEADER__PLUGIN_URL . ZEE_SPLASHHEADER_ASSETS . 'css/font-awesome.css', array(), ZEE_SPLASHHEADER_VERSION);

    wp_enqueue_style('style', 'https://use.fontawesome.com/releases/v5.15.1/css/all.css', array(), ZEE_SPLASHHEADER_VERSION, 'all');

	$sh_message_bgcolor = "";
	$sh_border_style = "";
	$sh_border_width = "";
	$sh_border_color  = "";
	$date_content = "";
	$time_content = "";
	$col_width_style = "";
	$title_div = "";
	$message_div = "";
	$font_size_1 = "";
	$font_color_1 = "";
	$font_weight_1 = "";
	$font_decoration_1  = "";
	$font_text_align_1  = "";
	$style_1 = "";
	$font_text_align_1 = "";
	$font_style_1 = "";
	$border_style = "";
	$border_width = "";
	$style_message = "";
	
	$font_size_2 = "";
	$font_color_2 = "";
	$font_weight_2 = "";
	$font_decoration_2  = "";
	$font_text_align_2  = "";
	$style_2 = "";
	$font_text_align_2 = "";
	$font_style_2 = "";
	$col_width_style = array("","","","","");
    $col_class = "";
	$sh_date_font_color  = ""; 
	$sh_time_font_color  = "";
	$content  = "";
	
    $enabled = 1;

    $enabled_links_1 = get_option('sh_show_links_1');
    $enabled_links_2 = get_option('sh_show_links_2');
    $enabled_custom_code = get_option('sh_show_custom_code');
    $enabled_date = get_option('sh_show_clock_date');
    $enabled_time = get_option('sh_show_clock_time');
    $date_position = get_option('sh_date_position');
    $date_font_size = get_option('sh_date_font_size');
    $date_font_color = get_option('sh_date_font_color');
    $date_format = get_option('sh_date_format');
    $time_format = get_option('sh_time_format');
    $color_element = 'color:';
    $font_size_element = 'font-size:';
    $text_align_element = 'text-align:';
    $font_weight_element = 'font-weight:';
    $font_style_element = 'font-style:';
    $font_decoration_element = 'text-decoration:';
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

        $title = htmlspecialchars(get_option('sh_title'));
        $message = htmlspecialchars(get_option('sh_message'));
        $title_font_size = get_option('sh_title_font_size');
        $message_font_size = get_option('sh_message_font_size');
        $title_text_align = get_option('sh_title_text_align');
        $message_text_align = get_option('sh_message_text_align');
        $title_font_weight = get_option('sh_title_font_weight');
        $message_font_weight = get_option('sh_message_font_weight');
        $title_font_style = get_option('sh_title_font_style');
        $message_font_style = get_option('sh_message_font_style');
        $title_font_decoration = get_option('sh_title_font_decoration');
        $message_font_decoration = get_option('sh_message_font_decoration');
        $title_color = get_option('sh_title_color');
        $message_color = get_option('sh_message_color');
        $bg_color = get_option('sh_bg_color');
        $custom_code = get_option('sh_code_message');

        //set splash header border color , style and width 

        if ($border_color != '') {
            $sh_border_color = 'border-color:' . $border_color . '!important;';
        }

        if ($border_style != '') {
            $sh_border_style = 'border-style:' . $border_style . '!important;';
        }

        if ($border_width != '') {
            $sh_border_width = 'border-width:' . $border_width . 'px!important;';
        }

        // set background color for splach header

        if ($bg_color != '') {
            $sh_message_bgcolor = 'background-color:' . $bg_color . '!important;';
        }

        // set font color and size for title and message 

        if ($title_font_size != '')
            $title_font_size = $font_size_element . $title_font_size . 'px!important;';

        if ($title_text_align != '')
            $title_text_align = $text_align_element . $title_text_align . '!important;';

        if ($title_font_weight != '')
            $title_font_weight = $font_weight_element . $title_font_weight . '!important;';

        if ($title_font_style != '')
            $title_font_style = $font_style_element . $title_font_style . '!important;';

        if ($title_font_decoration != '')
            $title_font_decoration = $font_decoration_element . $title_font_decoration . '!important;';

        if ($title_color != '')
            $title_color = $color_element . $title_color . '!important;';

        if ($message_font_size != '')
            $message_font_size = $font_size_element . $message_font_size . 'px!important;';

        if ($message_text_align != '')
            $message_text_align = $text_align_element . $message_text_align . 'px!important;';

        if ($message_font_weight != '')
            $message_font_weight = $font_weight_element . $message_font_weight . '!important;';

        if ($message_font_style != '')
            $message_font_style = $font_style_element . $message_font_style . '!important;';

        if ($message_font_decoration != '')
            $message_font_decoration = $font_decoration_element . $message_font_decoration . '!important;';

        if ($message_color != '')
            $message_color = $color_element . $message_color . ';';

        if ($message_font_size != '' || $message_color != '' || $message_font_weight != '' || $message_font_style != '' || $message_font_decoration != '' || $message_text_align != '')
            $style_message = $message_font_size . $message_color . $message_font_weight . $message_font_style . $message_font_decoration;
    }

    if ($enabled_links_1) {
        $appearence++;
    }

    if ($enabled_links_2) {
        $appearence++;
    }

    if ($enabled_custom_code ) {
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
        $title_div = '<h3 class="sh-title" style="' . $title_color . $title_font_size . $title_font_weight . $title_font_style . $title_font_decoration . 'margin:10px 0 0 0">' . $title . '</h3>';
    }

    if ($message != '') {
        $message_div = ' <div class="sh-message" style="' . $style_message . 'margin:10px 0 0 0">' . $message . '</div>';
    }

    $current_date = zee_splash_header_get_date($date_format);
    $current_time = zee_splash_header_get_time($time_format);

    $date_position = get_option('sh_date_position');
    $time_position = get_option('sh_time_position');

    $date_font_size = get_option('sh_date_font_size');
    $time_font_size = get_option('sh_time_font_size');

    $date_font_color = get_option('sh_date_font_color');
    $time_font_color = get_option('sh_time_font_color');

    $date_font_weight = get_option('sh_date_font_weight');
    $time_font_weight = get_option('sh_time_font_weight');

    $date_font_style = get_option('sh_date_font_style');
    $time_font_style = get_option('sh_time_font_style');

    $date_font_decoration = get_option('sh_date_font_decoration');
    $time_font_decoration = get_option('sh_time_font_decoration');

    // date section 
    if ($date_position != '') {
        $sh_date_position = 'text-align:' . $date_position . '!important;';
    }

    if ($date_font_size != '') {
        $sh_date_font_size = 'font-size:' . $date_font_size . 'px!important;';
    }

    if ($date_font_color != '') {
        $sh_date_font_color = 'color:' . $date_font_color . '!important;';
    }
    if ($date_font_weight != '') {
        $sh_date_font_weight = 'font-weight:' . $date_font_weight . '!important;';
    }

    if ($date_font_style != '') {
        $sh_date_font_style = 'font-style:' . $date_font_style . '!important;';
    }

    if ($date_font_decoration != '') {
        $sh_date_font_decoration = 'text-decoration:' . $date_font_decoration . '!important;';
    }

    if ($enabled_date) {
        $date_content = '<div class="splash-header-date" style="' . $sh_date_position . $sh_date_font_size . $sh_date_font_color . $sh_date_font_weight . $sh_date_font_style . $sh_date_font_decoration . '">' . $current_date . '</div>';
    }

    // time section 
    if ($time_position != '') {
        $sh_time_position = 'text-align:' . $time_position . '!important;';
    }

    if ($time_font_size != '') {
        $sh_time_font_size = 'font-size:' . $time_font_size . 'px!important;';
    }

    if ($time_font_color != '') {
        $sh_time_font_color = 'color:' . $time_font_color . '!important;';
    }

    if ($time_font_weight != '') {
        $sh_time_font_weight = 'font-weight:' . $time_font_weight . '!important;';
    }

    if ($time_font_style != '') {
        $sh_time_font_style = 'font-style:' . $time_font_style . '!important;';
    }

    if ($time_font_decoration != '') {
        $sh_time_font_decoration = 'text-decoration:' . $time_font_decoration . '!important;';
    }

    if ($enabled_time) {
        $time_content = '<div class="splash-header-time" style="' . $sh_time_position . $sh_time_font_size . $sh_time_font_color . $sh_time_font_weight . $sh_time_font_style . $sh_time_font_decoration . '">' . $current_time . '</div>';
    }

    $content .= '<div id="splash-header" class="splash-header" style="width:' . $sh_width . '%;' . $sh_message_bgcolor . $sh_border_style . $sh_border_width . 'margin:0 auto;' . $sh_border_color . '">'
            . '<span>' . $date_content . $time_content . '</span><div class="sh-col ' . $col_class . '" style="' . $col_width_style[1] . '">' . $title_div . '' . $message_div . '</div>';

    if ($enabled_links_1) {

        $content .= '<div class="sh-col ' . $col_class . '" style="' . $col_width_style[2] . '">';

        //set up links 1 section 

        for ($i = 1; $i <= 3; $i++) {

            $img_element_1 = "";

            // set font size 

            if (get_option('sh_link_font_size_' . $i) != '') {
                $font_size_1 = $font_size_element . get_option('sh_link_font_size_' . $i) . "px;";
            }

            // set text align 
            if (get_option('sh_link_text_align_' . $i) != '') {
                $text_align_1 = $text_align_element . get_option('sh_link_text_align_' . $i) . ";";
            }

            // set font weight 
            if (get_option('sh_link_font_weight_' . $i) != '') {
                $font_weight_1 = $font_weight_element . get_option('sh_link_font_weight_' . $i) . ";";
            }

            // set font style 
            if (get_option('sh_link_font_style_' . $i) != '') {
                $font_style_1 = $font_style_element . get_option('sh_link_font_style_' . $i) . ";";
            }
            // set font decoration 

            if (get_option('sh_link_font_decoration_' . $i) != '') {
                $font_decoration_1 = $font_decoration_element . get_option('sh_link_font_decoration_' . $i) . ";";
            }
            // set font color 

            if (get_option('sh_link_title_color_' . $i) != '') {
                $font_color_1 = $color_element . get_option('sh_link_title_color_' . $i) . ";";
            }
            // set font style

            if ($font_size_1 != '' || $font_color_1 != '' || $font_weight_1 != '' || $font_style_1 != '' || $font_decoration_1 != '') {
                $style_1 = 'style="' . $font_size_1 . $font_color_1 . $font_weight_1 . $font_style_1 . $font_decoration_1 . '"';
            }
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
                $content .= '<div class="sh-links">' . $img_element_1 . '<a ' . $style_1 . ' href="' . get_option('sh_link_url_' . $i) . '" ' . $target . '>' . htmlspecialchars(get_option('sh_link_title_' . $i)) . '</a></div>';
        }

        $content .= '</div>';
    }

    if ($enabled_links_2) {

        $content .= '<div class="sh-col ' . $col_class . '" style="' . $col_width_style[3] . '">';

        //set up links 2 sections
        for ($i = 4; $i <= 6; $i++) {

            // set font size 
            if (get_option('sh_link_font_size_' . $i) != '') {
                $font_size_2 = $font_size_element . get_option('sh_link_font_size_' . $i) . "px;";
            }

            // set text align 
            if (get_option('sh_link_text_align_' . $i) != '') {
                $text_align_2 = $text_align_element . get_option('sh_link_text_align_' . $i) . ";";
            }

            // set font weight 
            if (get_option('sh_link_font_weight_' . $i) != '') {
                $font_weight_2 = $font_weight_element . get_option('sh_link_font_weight_' . $i) . ";";
            }

            // set font style 
            if (get_option('sh_link_font_style_' . $i) != '') {
                $font_style_2 = $font_style_element . get_option('sh_link_font_style_' . $i) . ";";
            }
            // set font decoration 

            if (get_option('sh_link_font_decoration_' . $i) != '') {
                $font_decoration_2 = $font_decoration_element . get_option('sh_link_font_decoration_' . $i) . ";";
            }
            // set font color 

            if (get_option('sh_link_title_color_' . $i) != '') {
                $font_color_2 = $color_element . get_option('sh_link_title_color_' . $i) . ";";
            }
            // set font style  
            if ($font_size_2 != '' || $font_color_2 != '' || $font_weight_2 != '' || $font_style_2 != '' || $font_decoration_2 != '') {
                $style_2 = 'style="' . $font_size_2 . $font_color_2 . $font_weight_2 . $font_style_2 . $font_decoration_2 . '"';
            }
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
                $content .= '<div class="sh-links">' . $img_element_2 . '<a ' . $style_2 . '  href="' . get_option('sh_link_url_' . $i) . '"  ' . $target . '>' . htmlspecialchars(get_option('sh_link_title_' . $i)) . '</a></div>';
        }

        $content .= '</div>';
    }

    if ($enabled_custom_code) {

        $content .= '

    <div class="sh-col ' . $col_class . '" style="' . $col_width_style[4] . '">' . do_shortcode(get_option('sh_code_message')) . '</div>

    </div><div class="sh-clearfix"></div>';
    }

    $content .= '</div>';

    if ($enabled == 0) {

        $content = '';
    }

    echo wp_kses_post($content);

	}

}
