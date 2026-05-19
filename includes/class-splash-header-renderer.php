<?php

/**
 * Shared renderer for frontend shortcode output and admin preview output.
 */
class Splash_Header_Renderer
{
    /**
     * Render the splash header markup.
     *
     * @param bool $force_enabled Whether to render even when the frontend toggle is disabled.
     * @return string
     */
    public static function render($force_enabled = false)
    {
        self::enqueue_assets();

        $state = self::get_state($force_enabled);

        if (!$state['enabled']) {
            return '';
        }

        $content = '<div id="splash-header" class="splash-header" style="' . esc_attr($state['container_style']) . '">';
        $content .= '<span>' . $state['date_content'] . $state['time_content'] . '</span>';
        $content .= '<div class="sh-col ' . esc_attr($state['column_class']) . '" style="' . esc_attr($state['column_widths'][1]) . '">';
        $content .= $state['title_html'] . $state['message_html'] . '</div>';

        if ($state['show_links_1']) {
            $content .= '<div class="sh-col ' . esc_attr($state['column_class']) . '" style="' . esc_attr($state['column_widths'][2]) . '">';
            $content .= self::render_links(1, 3);
            $content .= '</div>';
        }

        if ($state['show_links_2']) {
            $content .= '<div class="sh-col ' . esc_attr($state['column_class']) . '" style="' . esc_attr($state['column_widths'][3]) . '">';
            $content .= self::render_links(4, 6);
            $content .= '</div>';
        }

        if ($state['show_custom_code']) {
            $content .= '<div class="sh-col ' . esc_attr($state['column_class']) . '" style="' . esc_attr($state['column_widths'][4]) . '">';
            $content .= do_shortcode(get_option('sh_code_message'));
            $content .= '</div>';
        }

        $content .= '</div><div class="sh-clearfix"></div>';

        return $content;
    }

    /**
     * Enqueue shared frontend assets.
     *
     * @return void
     */
    private static function enqueue_assets()
    {
        wp_enqueue_style('splashheader', ZEE_SPLASHHEADER_ASSET_URL . 'css/splashheader.css', array(), ZEE_SPLASHHEADER_VERSION);
        wp_enqueue_style('style', 'https://use.fontawesome.com/releases/v6.7.1/css/all.css', array(), ZEE_SPLASHHEADER_VERSION, 'all');
    }

    /**
     * Build the renderer state.
     *
     * @param bool $force_enabled Whether to render when the display option is disabled.
     * @return array
     */
    private static function get_state($force_enabled)
    {
        $enabled = $force_enabled ? true : self::get_bool_option('sh_show');
        $show_links_1 = self::get_bool_option('sh_show_links_1');
        $show_links_2 = self::get_bool_option('sh_show_links_2');
        $show_custom_code = self::get_bool_option('sh_show_custom_code');
        $show_date = self::get_bool_option('sh_show_clock_date');
        $show_time = self::get_bool_option('sh_show_clock_time');

        $appearance = 0;
        if ($enabled) {
            $appearance++;
        }
        if ($show_links_1) {
            $appearance++;
        }
        if ($show_links_2) {
            $appearance++;
        }
        if ($show_custom_code) {
            $appearance++;
        }

        $column_widths = array('', '', '', '', '');
        for ($index = 1; $index <= 4; $index++) {
            $width = self::get_percentage_option('sh_col_width_' . $index);
            if ($width !== '') {
                $column_widths[$index] = 'width:' . $width . '%';
            }
        }

        $container_width = self::get_percentage_option('sh_width');
        if ($container_width === '') {
            $container_width = 85;
        }

        $container_style = array(
            'width:' . $container_width . '%',
            'margin:0 auto',
        );

        $border_color = self::get_color_option('sh_border_color');
        if ($border_color !== '') {
            $container_style[] = 'border-color:' . $border_color . '!important';
            $container_style[] = 'border-style:' . self::get_border_style_option('sh_border_style', 'solid') . '!important';
            $container_style[] = 'border-width:' . self::get_positive_int_option('sh_border_width', 1) . 'px!important';
        }

        $background_color = self::get_color_option('sh_bg_color');
        if ($background_color !== '') {
            $container_style[] = 'background-color:' . $background_color . '!important';
        }

        $title_html = '';
        $title = get_option('sh_title');
        if ($title !== '') {
            $title_html = '<h3 class="sh-title" style="' . esc_attr(self::join_styles(array(
                self::get_font_size_style('sh_title_font_size'),
                self::get_text_align_style('sh_title_text_align'),
                self::get_font_weight_style('sh_title_font_weight'),
                self::get_font_style_style('sh_title_font_style'),
                self::get_font_decoration_style('sh_title_font_decoration'),
                self::get_color_style('sh_title_color'),
                'margin:10px 0 0 0',
            ))) . '">' . esc_html($title) . '</h3>';
        }

        $message_html = '';
        $message = get_option('sh_message');
        if ($message !== '') {
            $message_html = '<div class="sh-message" style="' . esc_attr(self::join_styles(array(
                self::get_font_size_style('sh_message_font_size'),
                self::get_text_align_style('sh_message_text_align'),
                self::get_font_weight_style('sh_message_font_weight'),
                self::get_font_style_style('sh_message_font_style'),
                self::get_font_decoration_style('sh_message_font_decoration'),
                self::get_color_style('sh_message_color'),
                'margin:10px 0 0 0',
            ))) . '">' . esc_html($message) . '</div>';
        }

        return array(
            'enabled' => $enabled,
            'show_links_1' => $show_links_1,
            'show_links_2' => $show_links_2,
            'show_custom_code' => $show_custom_code,
            'title_html' => $title_html,
            'message_html' => $message_html,
            'column_class' => self::get_column_class($appearance),
            'column_widths' => $column_widths,
            'container_style' => self::join_styles($container_style),
            'date_content' => self::render_date_or_time('date', $show_date),
            'time_content' => self::render_date_or_time('time', $show_time),
        );
    }

    /**
     * Render one date/time block.
     *
     * @param string $type Either date or time.
     * @param bool   $enabled Whether the block should render.
     * @return string
     */
    private static function render_date_or_time($type, $enabled)
    {
        if (!$enabled) {
            return '';
        }

        if ($type === 'date') {
            $content = zee_splash_header_get_date(get_option('sh_date_format'));
            $class_name = 'splash-header-date';
            $styles = array(
                self::get_text_align_style('sh_date_position'),
                self::get_font_size_style('sh_date_font_size'),
                self::get_color_style('sh_date_font_color'),
                self::get_font_weight_style('sh_date_font_weight'),
                self::get_font_style_style('sh_date_font_style'),
                self::get_font_decoration_style('sh_date_font_decoration'),
            );
        } else {
            $content = zee_splash_header_get_time(get_option('sh_time_format'));
            $class_name = 'splash-header-time';
            $styles = array(
                self::get_text_align_style('sh_time_position'),
                self::get_font_size_style('sh_time_font_size'),
                self::get_color_style('sh_time_font_color'),
                self::get_font_weight_style('sh_time_font_weight'),
                self::get_font_style_style('sh_time_font_style'),
                self::get_font_decoration_style('sh_time_font_decoration'),
            );
        }

        return '<div class="' . esc_attr($class_name) . '" style="' . esc_attr(self::join_styles($styles)) . '">' . esc_html($content) . '</div>';
    }

    /**
     * Render the configured links block.
     *
     * @param int $start Start index.
     * @param int $end End index.
     * @return string
     */
    private static function render_links($start, $end)
    {
        $content = '';

        for ($index = $start; $index <= $end; $index++) {
            $title = get_option('sh_link_title_' . $index);
            $url = get_option('sh_link_url_' . $index);

            if ($title === '' || $url === '') {
                continue;
            }

            $link_styles = array(
                self::get_font_size_style('sh_link_font_size_' . $index, false),
                self::get_text_align_style('sh_link_text_align_' . $index, false),
                self::get_font_weight_style('sh_link_font_weight_' . $index, false),
                self::get_font_style_style('sh_link_font_style_' . $index, false),
                self::get_font_decoration_style('sh_link_font_decoration_' . $index, false),
                self::get_color_style('sh_link_title_color_' . $index, false),
            );

            $target = self::get_bool_option('sh_link_open_' . $index) ? '_blank' : '_self';
            $icon_html = self::render_icon(get_option('sh_font_icon_' . $index));

            $content .= '<div class="sh-links">' . $icon_html . '<a style="' . esc_attr(self::join_styles($link_styles)) . '" href="' . esc_url($url) . '" target="' . esc_attr($target) . '">' . esc_html($title) . '</a></div>';
        }

        return $content;
    }

    /**
     * Render a Font Awesome icon span when configured.
     *
     * @param string $classes Icon classes.
     * @return string
     */
    private static function render_icon($classes)
    {
        $classes = self::sanitize_icon_classes($classes);

        if ($classes === '') {
            return '';
        }

        return '<span class="' . esc_attr($classes) . '"></span>';
    }

    /**
     * Join a list of CSS declarations.
     *
     * @param array $styles CSS declarations.
     * @return string
     */
    private static function join_styles($styles)
    {
        $clean = array();

        foreach ($styles as $style) {
            if ($style !== '') {
                $clean[] = $style;
            }
        }

        return implode(';', $clean);
    }

    /**
     * Get bool option.
     *
     * @param string $key Option key.
     * @return bool
     */
    private static function get_bool_option($key)
    {
        return (bool) get_option($key);
    }

    /**
     * Get a positive integer option.
     *
     * @param string   $key Option key.
     * @param int|null $default Default value.
     * @return string
     */
    private static function get_positive_int_option($key, $default = null)
    {
        $value = get_option($key);

        if ($value === '' || $value === null) {
            return $default === null ? '' : (string) $default;
        }

        $value = intval($value);

        if ($value < 0) {
            $value = 0;
        }

        return (string) $value;
    }

    /**
     * Get a percentage option.
     *
     * @param string $key Option key.
     * @return string
     */
    private static function get_percentage_option($key)
    {
        $value = self::get_positive_int_option($key);

        if ($value === '') {
            return '';
        }

        $value = intval($value);

        if ($value > 100) {
            $value = 100;
        }

        return (string) $value;
    }

    /**
     * Get a safe color option.
     *
     * @param string $key Option key.
     * @return string
     */
    private static function get_color_option($key)
    {
        $value = trim((string) get_option($key));

        if ($value === '') {
            return '';
        }

        return preg_match('/^#[a-f0-9]{3,6}$/i', $value) ? $value : '';
    }

    /**
     * Get an allowed border style.
     *
     * @param string $key Option key.
     * @param string $default Default value.
     * @return string
     */
    private static function get_border_style_option($key, $default)
    {
        return self::get_enum_option($key, array('none', 'solid', 'dashed', 'dotted', 'double', 'groove', 'ridge', 'inset', 'outset'), $default);
    }

    /**
     * Get an allowed text-align option.
     *
     * @param string $key Option key.
     * @param bool   $important Whether to append !important.
     * @return string
     */
    private static function get_text_align_style($key, $important = true)
    {
        $value = self::get_enum_option($key, array('left', 'center', 'right', 'justify'));

        if ($value === '') {
            return '';
        }

        return 'text-align:' . $value . ($important ? '!important' : '');
    }

    /**
     * Get an allowed font size declaration.
     *
     * @param string $key Option key.
     * @param bool   $important Whether to append !important.
     * @return string
     */
    private static function get_font_size_style($key, $important = true)
    {
        $value = self::get_positive_int_option($key);

        if ($value === '') {
            return '';
        }

        return 'font-size:' . $value . 'px' . ($important ? '!important' : '');
    }

    /**
     * Get an allowed font weight declaration.
     *
     * @param string $key Option key.
     * @param bool   $important Whether to append !important.
     * @return string
     */
    private static function get_font_weight_style($key, $important = true)
    {
        $value = self::get_enum_option($key, array('normal', 'bold', 'bolder', 'lighter', '100', '200', '300', '400', '500', '600', '700', '800', '900'));

        if ($value === '') {
            return '';
        }

        return 'font-weight:' . $value . ($important ? '!important' : '');
    }

    /**
     * Get an allowed font style declaration.
     *
     * @param string $key Option key.
     * @param bool   $important Whether to append !important.
     * @return string
     */
    private static function get_font_style_style($key, $important = true)
    {
        $value = self::get_enum_option($key, array('normal', 'italic', 'oblique'));

        if ($value === '') {
            return '';
        }

        return 'font-style:' . $value . ($important ? '!important' : '');
    }

    /**
     * Get an allowed text-decoration declaration.
     *
     * @param string $key Option key.
     * @param bool   $important Whether to append !important.
     * @return string
     */
    private static function get_font_decoration_style($key, $important = true)
    {
        $value = self::get_enum_option($key, array('none', 'overline', 'line-through', 'underline', 'underline overline'));

        if ($value === '') {
            return '';
        }

        return 'text-decoration:' . $value . ($important ? '!important' : '');
    }

    /**
     * Get a color declaration.
     *
     * @param string $key Option key.
     * @param bool   $important Whether to append !important.
     * @return string
     */
    private static function get_color_style($key, $important = true)
    {
        $value = self::get_color_option($key);

        if ($value === '') {
            return '';
        }

        return 'color:' . $value . ($important ? '!important' : '');
    }

    /**
     * Get a whitelisted option value.
     *
     * @param string $key Option key.
     * @param array  $allowed Allowed values.
     * @param string $default Default value.
     * @return string
     */
    private static function get_enum_option($key, $allowed, $default = '')
    {
        $value = (string) get_option($key);

        if ($value === '' || !in_array($value, $allowed, true)) {
            return $default;
        }

        return $value;
    }

    /**
     * Get the column class for the visible sections count.
     *
     * @param int $appearance Visible sections.
     * @return string
     */
    private static function get_column_class($appearance)
    {
        if ($appearance >= 4) {
            return 'sh-col-25';
        }

        if ($appearance === 3) {
            return 'sh-col-33';
        }

        if ($appearance === 2) {
            return 'sh-col-50';
        }

        return 'sh-col-100';
    }

    /**
     * Sanitize icon classes to a basic safe subset.
     *
     * @param string $classes Icon classes.
     * @return string
     */
    private static function sanitize_icon_classes($classes)
    {
        $classes = preg_split('/\s+/', trim((string) $classes));
        $clean = array();

        foreach ($classes as $class_name) {
            if ($class_name !== '' && preg_match('/^[a-z0-9-]+$/i', $class_name)) {
                $clean[] = $class_name;
            }
        }

        return implode(' ', $clean);
    }
}
