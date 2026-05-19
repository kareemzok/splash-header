<?php

/**
 * Central plugin bootstrap for hook registration.
 */
class Splash_Header_Plugin
{
    /**
     * Register all plugin hooks.
     *
     * @param string $plugin_file Main plugin file.
     * @return void
     */
    public static function boot($plugin_file)
    {
        if (class_exists('Splash_Header_Settings')) {
            Splash_Header_Settings::boot();
        }

        register_activation_hook($plugin_file, 'zee_splash_header_activate');
        register_deactivation_hook($plugin_file, 'zee_splash_header_deactivation');

        add_action('init', 'zee_splashheader_init');
        add_shortcode('splashheader', 'zee_splashheader_shortcode');
        add_filter('mce_buttons', 'zee_splash_header_register_buttons_editor');
        add_action('wp_ajax_splashheader_dashboard_welcome', 'ajax_splashheader_dashboard_welcome');
        add_action('wp_dashboard_setup', 'zee_splash_header_dashboard_widgets');

        $plugin = plugin_basename($plugin_file);
        add_filter("plugin_action_links_$plugin", 'zee_add_splashheader_settings_link');
    }
}
