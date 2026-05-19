<?php

class Splash_Header_Shortcodes
{
    /**
     * Build shortcode output.
     *
     * @return string
     */
    public static function splash_header_short_code()
    {
        require_once plugin_dir_path(__FILE__) . 'class-splash-header-renderer.php';

        return wp_kses_post(Splash_Header_Renderer::render(false));
    }
}
