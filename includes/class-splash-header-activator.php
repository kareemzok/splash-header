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
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Splash_Header_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

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
		add_option('sh_title_text_align');
		add_option('sh_title_font_weight');
		add_option('sh_title_font_style');
		add_option('sh_title_font_decoration');
		add_option('sh_message_font_size');
		add_option('sh_message_text_align');
		add_option('sh_message_font_weight');
		add_option('sh_message_font_style');
		add_option('sh_message_font_decoration');
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
		add_option('sh_date_font_weight');
		add_option('sh_date_font_color');
		add_option('sh_date_font_style');
		add_option('sh_date_font_decoration');

		add_option('sh_time_format');
		add_option('sh_time_position');
		add_option('sh_time_font_size');
		add_option('sh_time_font_color');
		add_option('sh_time_font_weight');
		add_option('sh_time_font_style');
		add_option('sh_time_font_decoration');

		for ($i = 1; $i <= 6; $i++) {

			add_option('sh_link_title_' . $i);
			add_option('sh_link_url_' . $i);
			add_option('sh_link_title_color_' . $i);
			add_option('sh_link_font_size_' . $i);
			add_option('sh_link_text_align_' . $i);
			add_option('sh_font_icon_' . $i);
			add_option('sh_link_open_' . $i);
			add_option('sh_link_font_weight_' . $i);
			add_option('sh_link_font_style_' . $i);
			add_option('sh_link_font_decoration_' . $i);

			if ($i <= 4) {

				add_option('sh_col_width_' . $i);
			}
		}
	
	
	}

}
