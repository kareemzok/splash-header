<?php

/**
 * Central option definitions and sanitization rules.
 */
class Splash_Header_Settings
{
    /**
     * Register option sanitizers.
     *
     * @return void
     */
    public static function boot()
    {
        foreach (self::get_option_rules() as $option_name => $rule) {
            add_filter('pre_update_option_' . $option_name, array(__CLASS__, 'sanitize_option'), 10, 3);
        }
    }

    /**
     * Sanitize one option value.
     *
     * @param mixed  $value New value.
     * @param mixed  $old_value Previous value.
     * @param string $option_name Option name.
     * @return mixed
     */
    public static function sanitize_option($value, $old_value, $option_name)
    {
        $rules = self::get_option_rules();

        if (!isset($rules[$option_name])) {
            return $value;
        }

        $rule = $rules[$option_name];
        $type = $rule['type'];

        switch ($type) {
            case 'checkbox':
                return empty($value) ? '' : '1';

            case 'text':
                return sanitize_text_field($value);

            case 'textarea':
                return sanitize_textarea_field($value);

            case 'url':
                return esc_url_raw($value);

            case 'icon':
                return self::sanitize_icon_classes($value);

            case 'color':
                $color = sanitize_hex_color($value);
                return $color ? $color : '';

            case 'enum':
                return self::sanitize_enum($value, $rule['allowed']);

            case 'int':
                return self::sanitize_int($value, $rule);

            case 'code':
                if (current_user_can('unfiltered_html')) {
                    return (string) $value;
                }

                return wp_kses_post($value);
        }

        return $value;
    }

    /**
     * Get a CSV string of option names for a form section.
     *
     * @param string $section Section name.
     * @return string
     */
    public static function get_page_options_csv($section)
    {
        return implode(',', self::get_page_options($section));
    }

    /**
     * Get option names for a form section.
     *
     * @param string $section Section name.
     * @return array
     */
    public static function get_page_options($section)
    {
        $pages = self::get_page_map();

        return isset($pages[$section]) ? $pages[$section] : array();
    }

    /**
     * Build the option rules map.
     *
     * @return array
     */
    private static function get_option_rules()
    {
        $rules = array(
            'sh_title' => array('type' => 'text'),
            'sh_message' => array('type' => 'textarea'),
            'sh_show' => array('type' => 'checkbox'),
            'sh_show_links_1' => array('type' => 'checkbox'),
            'sh_show_links_2' => array('type' => 'checkbox'),
            'sh_code_message' => array('type' => 'code'),
            'sh_show_custom_code' => array('type' => 'checkbox'),
            'sh_bg_color' => array('type' => 'color'),
            'sh_title_color' => array('type' => 'color'),
            'sh_message_color' => array('type' => 'color'),
            'sh_title_font_size' => array('type' => 'int', 'min' => 0, 'max' => ZEE_SPLASHHEADER_FONT_SIZE),
            'sh_title_text_align' => array('type' => 'enum', 'allowed' => self::get_text_align_values()),
            'sh_title_font_weight' => array('type' => 'enum', 'allowed' => self::get_font_weight_values()),
            'sh_title_font_style' => array('type' => 'enum', 'allowed' => self::get_font_style_values()),
            'sh_title_font_decoration' => array('type' => 'enum', 'allowed' => self::get_font_decoration_values()),
            'sh_message_font_size' => array('type' => 'int', 'min' => 0, 'max' => ZEE_SPLASHHEADER_FONT_SIZE),
            'sh_message_text_align' => array('type' => 'enum', 'allowed' => self::get_text_align_values()),
            'sh_message_font_weight' => array('type' => 'enum', 'allowed' => self::get_font_weight_values()),
            'sh_message_font_style' => array('type' => 'enum', 'allowed' => self::get_font_style_values()),
            'sh_message_font_decoration' => array('type' => 'enum', 'allowed' => self::get_font_decoration_values()),
            'sh_width' => array('type' => 'int', 'min' => 0, 'max' => 100),
            'sh_border_color' => array('type' => 'color'),
            'sh_border_style' => array('type' => 'enum', 'allowed' => self::get_border_style_values()),
            'sh_border_width' => array('type' => 'int', 'min' => 0, 'max' => ZEE_SPLASHHEADER_FONT_SIZE),
            'sh_show_clock_date' => array('type' => 'checkbox'),
            'sh_show_clock_time' => array('type' => 'checkbox'),
            'sh_date_format' => array('type' => 'enum', 'allowed' => self::get_date_format_values()),
            'sh_date_position' => array('type' => 'enum', 'allowed' => self::get_text_align_values()),
            'sh_date_font_size' => array('type' => 'int', 'min' => 0, 'max' => ZEE_SPLASHHEADER_FONT_SIZE),
            'sh_date_font_weight' => array('type' => 'enum', 'allowed' => self::get_font_weight_values()),
            'sh_date_font_color' => array('type' => 'color'),
            'sh_date_font_style' => array('type' => 'enum', 'allowed' => self::get_font_style_values()),
            'sh_date_font_decoration' => array('type' => 'enum', 'allowed' => self::get_font_decoration_values()),
            'sh_time_format' => array('type' => 'enum', 'allowed' => self::get_time_format_values()),
            'sh_time_position' => array('type' => 'enum', 'allowed' => self::get_text_align_values()),
            'sh_time_font_size' => array('type' => 'int', 'min' => 0, 'max' => ZEE_SPLASHHEADER_FONT_SIZE),
            'sh_time_font_color' => array('type' => 'color'),
            'sh_time_font_weight' => array('type' => 'enum', 'allowed' => self::get_font_weight_values()),
            'sh_time_font_style' => array('type' => 'enum', 'allowed' => self::get_font_style_values()),
            'sh_time_font_decoration' => array('type' => 'enum', 'allowed' => self::get_font_decoration_values()),
        );

        for ($index = 1; $index <= 6; $index++) {
            $rules['sh_link_title_' . $index] = array('type' => 'text');
            $rules['sh_link_url_' . $index] = array('type' => 'url');
            $rules['sh_font_icon_' . $index] = array('type' => 'icon');
            $rules['sh_link_open_' . $index] = array('type' => 'checkbox');
            $rules['sh_link_title_color_' . $index] = array('type' => 'color');
            $rules['sh_link_font_size_' . $index] = array('type' => 'int', 'min' => 0, 'max' => ZEE_SPLASHHEADER_FONT_SIZE);
            $rules['sh_link_text_align_' . $index] = array('type' => 'enum', 'allowed' => self::get_text_align_values());
            $rules['sh_link_font_weight_' . $index] = array('type' => 'enum', 'allowed' => self::get_font_weight_values());
            $rules['sh_link_font_style_' . $index] = array('type' => 'enum', 'allowed' => self::get_font_style_values());
            $rules['sh_link_font_decoration_' . $index] = array('type' => 'enum', 'allowed' => self::get_font_decoration_values());

            if ($index <= 4) {
                $rules['sh_col_width_' . $index] = array('type' => 'int', 'min' => 0, 'max' => 100);
            }
        }

        return $rules;
    }

    /**
     * Build the form section option lists.
     *
     * @return array
     */
    private static function get_page_map()
    {
        $pages = array(
            'settings' => array(
                'sh_title',
                'sh_message',
                'sh_show',
                'sh_show_links_1',
                'sh_show_links_2',
                'sh_code_message',
                'sh_show_custom_code',
            ),
            'design' => array(
                'sh_title_color',
                'sh_bg_color',
                'sh_message_color',
                'sh_title_font_size',
                'sh_title_text_align',
                'sh_title_font_weight',
                'sh_title_font_style',
                'sh_title_font_decoration',
                'sh_message_font_size',
                'sh_message_text_align',
                'sh_message_font_weight',
                'sh_message_font_style',
                'sh_message_font_decoration',
                'sh_border_width',
                'sh_border_color',
                'sh_border_style',
            ),
            'advanced' => array(
                'sh_width',
                'sh_show_clock_date',
                'sh_show_clock_time',
                'sh_date_format',
                'sh_date_position',
                'sh_date_font_size',
                'sh_date_font_color',
                'sh_date_font_weight',
                'sh_date_font_style',
                'sh_date_font_decoration',
                'sh_time_format',
                'sh_time_position',
                'sh_time_font_size',
                'sh_time_font_color',
                'sh_time_font_weight',
                'sh_time_font_style',
                'sh_time_font_decoration',
            ),
        );

        for ($index = 1; $index <= 6; $index++) {
            $pages['settings'][] = 'sh_link_title_' . $index;
            $pages['settings'][] = 'sh_link_url_' . $index;
            $pages['settings'][] = 'sh_font_icon_' . $index;
            $pages['settings'][] = 'sh_link_open_' . $index;

            $pages['design'][] = 'sh_link_title_color_' . $index;
            $pages['design'][] = 'sh_link_font_size_' . $index;
            $pages['design'][] = 'sh_link_text_align_' . $index;
            $pages['design'][] = 'sh_link_font_weight_' . $index;
            $pages['design'][] = 'sh_link_font_style_' . $index;
            $pages['design'][] = 'sh_link_font_decoration_' . $index;

            if ($index <= 4) {
                $pages['advanced'][] = 'sh_col_width_' . $index;
            }
        }

        return $pages;
    }

    /**
     * Sanitize icon class list.
     *
     * @param string $value Raw class list.
     * @return string
     */
    private static function sanitize_icon_classes($value)
    {
        $classes = preg_split('/\s+/', trim((string) $value));
        $clean = array();

        foreach ($classes as $class_name) {
            if ($class_name !== '' && preg_match('/^[a-z0-9-]+$/i', $class_name)) {
                $clean[] = $class_name;
            }
        }

        return implode(' ', $clean);
    }

    /**
     * Sanitize enum values.
     *
     * @param string $value Raw value.
     * @param array  $allowed Allowed values.
     * @return string
     */
    private static function sanitize_enum($value, $allowed)
    {
        $value = (string) $value;

        if ($value === '') {
            return '';
        }

        return in_array($value, $allowed, true) ? $value : '';
    }

    /**
     * Sanitize integer values.
     *
     * @param mixed $value Raw value.
     * @param array $rule Bounds.
     * @return string
     */
    private static function sanitize_int($value, $rule)
    {
        $value = trim((string) $value);

        if ($value === '') {
            return '';
        }

        $value = intval($value);

        if (isset($rule['min']) && $value < $rule['min']) {
            $value = $rule['min'];
        }

        if (isset($rule['max']) && $value > $rule['max']) {
            $value = $rule['max'];
        }

        return (string) $value;
    }

    /**
     * @return array
     */
    private static function get_text_align_values()
    {
        return array('left', 'center', 'right', 'justify');
    }

    /**
     * @return array
     */
    private static function get_font_weight_values()
    {
        return array('normal', 'bold', 'bolder', 'lighter', '100', '200', '300', '400', '500', '600', '700', '800', '900');
    }

    /**
     * @return array
     */
    private static function get_font_style_values()
    {
        return array('normal', 'italic', 'oblique');
    }

    /**
     * @return array
     */
    private static function get_font_decoration_values()
    {
        return array('none', 'overline', 'line-through', 'underline', 'underline overline');
    }

    /**
     * @return array
     */
    private static function get_border_style_values()
    {
        return array('solid', 'none', 'dotted', 'dashed', 'double', 'groove', 'inset', 'outset');
    }

    /**
     * @return array
     */
    private static function get_date_format_values()
    {
        return array('', 'F j, Y', 'Y-m-d', 'm/d/Y', 'd/m/Y', 'm.d.y', 'j, n, Y', 'D M j');
    }

    /**
     * @return array
     */
    private static function get_time_format_values()
    {
        return array('', 'g:i a', 'g:i A', 'H:i', 'H:i:s');
    }
}
