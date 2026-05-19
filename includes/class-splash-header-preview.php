<?php

class Splash_Header_Preview
{
    /**
     * Echo the preview markup for wp-admin contexts.
     *
     * @return void
     */
    public static function sp_preview()
    {
        require_once plugin_dir_path(__FILE__) . 'class-splash-header-renderer.php';

        echo wp_kses_post(Splash_Header_Renderer::render(true));
    }
}
