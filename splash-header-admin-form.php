<div id="fb-root"></div>

<h3><?php echo esc_html("Splash Header", ZEE_SPLASHHEADER_DOMAIN); ?></h3>

<?php settings_errors(); ?>

<?php
//The text domain name is  used to form the name of the MO file for your plugin

global $tab;

// check which current tab is and add actvate class 

zee_splash_header_admin_tabs($tab);


$splashheader_settings_data = array('sh_title,sh_message,sh_show,sh_show_links_1,sh_show_links_2,sh_code_message,sh_show_custom_code');

$splashheader_design_data = array('sh_title_color,sh_bg_color,sh_message_color,sh_title_font_size,sh_title_text_align, sh_title_font_weight,sh_title_font_style,sh_title_font_decoration,sh_message_font_size,sh_message_text_align,sh_message_font_weight,sh_message_font_style,sh_message_font_decoration,sh_border_width,sh_border_color,sh_border_style');

$splashheader_advanced_settings = array('sh_width', 'sh_show_clock_date', 'sh_show_clock_time', 'sh_date_format', 'sh_date_position', 'sh_date_font_size', 'sh_date_font_color', 'sh_date_font_weight', 'sh_date_font_style', 'sh_date_font_decoration', 'sh_time_format', 'sh_time_position', 'sh_time_font_size', 'sh_time_font_color', 'sh_time_font_weight', 'sh_time_font_style', 'sh_time_font_decoration');


for ($i = 1; $i <= 6; $i++) {

    if ($i <= 4) {

        array_push($splashheader_advanced_settings, 'sh_col_width_' . $i);
    }

    array_push($splashheader_settings_data, 'sh_link_title_' . $i, 'sh_link_url_' . $i, 'sh_font_icon_' . $i, 'sh_link_open_' . $i);

    array_push($splashheader_design_data, 'sh_link_title_color_' . $i, 'sh_link_font_size_' . $i, 'sh_link_text_align_' . $i, 'sh_link_font_weight_' . $i, 'sh_link_font_style_' . $i, 'sh_link_font_decoration_' . $i);
}


$splashheader_settings_data = implode(",", $splashheader_settings_data);

$splashheader_design_data = implode(",", $splashheader_design_data);

$splashheader_advanced_settings = implode(",", $splashheader_advanced_settings);
?>

<div class="wrap splashheader">

    <div id="icon-options-general" class="icon32"></div>

    <div id="poststuff">

        <div id="post-body" class="metabox-holder columns-2">

            <!-- main content -->

            <div id="post-body-content">

                <div class="meta-box-sortables ui-sortable">

                    <div class="postbox">

                        <div id="post-body-content">

                            <div class="meta-box-sortables ui-sortable">

                                <div class="postbox">

                                    <!-- Toggle -->

                                    <div class="inside">

                                        <form id="form1" action="<?php echo esc_url(admin_url('options.php')) ?>" method="post">

                                            <?php wp_nonce_field('update-options'); ?>

                                            <div class="survey-wrapper"><a href="https://goo.gl/forms/lf71KyVdnTrudXpx1" target="_blank"><?php echo esc_html("Help us improving our plugin by taking this survey", ZEE_SPLASHHEADER_DOMAIN); ?> !</a> </div>

                                            <?php
                                            if ($tab == 'general') {

                                                require_once plugin_dir_path(__FILE__) . 'tabs/splash-header-general-tab.php';
                                            }
                                            ?>

                                            <?php
                                            if ($tab == 'homepage') {

                                                require_once plugin_dir_path(__FILE__) . 'tabs/splash-header-settings-tab.php';
                                            }
                                            ?>

                                            <?php
                                            if ($tab == 'design') {
                                                require_once plugin_dir_path(__FILE__) . 'tabs/splash-header-design-tab.php';
                                            }
                                            ?>

                                            <?php
                                            if ($tab == 'advancedsettings') {
                                                require_once plugin_dir_path(__FILE__) . 'tabs/splash-header-advanced-tab.php';
                                            }
                                            ?>

                                            <?php if ($tab != 'general') { ?>

                                                <input type="submit" name="splashheadersubmit" class="button-primary" value="<?php echo esc_html__("Save Changes", ZEE_SPLASHHEADER_DOMAIN); ?>">

                                            <?php } ?>

                                            <?php if ($tab == 'homepage') { ?>

                                                <input type="button" class="button-primary reset-btn" onClick="resetAllForms()" value="<?php echo esc_html__("Reset all", ZEE_SPLASHHEADER_DOMAIN); ?>">

                                            <?php } ?>

                                            <?php if ($tab == 'design') { ?>

                                                <input type="button" class="button-primary reset-btn" onClick="resetDesignForm(1, 6, 6)" value="<?php echo esc_html__("Reset to default", ZEE_SPLASHHEADER_DOMAIN); ?>">

                                            <?php } ?>

                                        </form>

                                    </div>

                                    <!-- .e -->

                                </div>

                                <!-- .postbox -->

                            </div>

                            <!-- .meta-box-sortables .ui-sortable -->

                        </div>

                        <!-- sidebar -->

                        <div id="postbox-container-1" class="postbox-container right-sidebar">

                            <div class="meta-box-sortables">

                                <div class="postbox">

                                    <div class="postbox-header">
                                        <div class="hndle ui-sortable-handle box-title">
                                            <span><?php echo esc_html("Plugin Info", ZEE_SPLASHHEADER_DOMAIN); ?></span>
                                        </div>
                                    </div>

                                    <div class="inside">

                                        <p><a href="https://www.zeesweb.com/our-products/#1597485098433-bdfd2e81-64ac" target="_blank"><?php echo esc_html("Name: Splash header", ZEE_SPLASHHEADER_DOMAIN); ?></a></p>


                                        <p><a href="http://www.zeesweb.com" target="_blank"><?php echo esc_html("Author: Zeesweb team", ZEE_SPLASHHEADER_DOMAIN); ?><a /></p>

                                        <p><?php echo esc_html("Email", ZEE_SPLASHHEADER_DOMAIN); ?>: <a href="mailto:info@zeesweb.com" target="_blank">info@zeesweb.com</a></p>

                                        <p><?php echo esc_html("Contact", ZEE_SPLASHHEADER_DOMAIN); ?>: <a href="http://www.zeesweb.com/#contact" target="_blank"><?php echo esc_html("Contact Us", ZEE_SPLASHHEADER_DOMAIN); ?></a></p>

                                    </div>

                                    <!-- .inside -->

                                </div>

                                <div class="postbox">
                                    <div class="postbox-header">
                                        <div class="hndle ui-sortable-handle box-title">
                                            <span><?php echo esc_html("Try our new social app", ZEE_SPLASHHEADER_DOMAIN); ?></span>
                                        </div>
                                    </div>
                                    <div class="inside">

                                        <a href="https://www.sociabatt.com/" target="_blank"><img src="<?php echo plugins_url('assets/img/sociabatt.png', __FILE__); ?>" /></a>
                                        <p><b><?php echo esc_html("SociaBatt is a social network app that allows users to create limited time online battles or debates - similar to voting but with your choice.", ZEE_SPLASHHEADER_DOMAIN); ?></b></p>

                                    </div>

                                    <!-- .inside -->

                                </div>

                                <div class="postbox">
                                    <div class="postbox-header">
                                        <div class="hndle ui-sortable-handle box-title">
                                            <span><?php echo esc_html("Take our survey", ZEE_SPLASHHEADER_DOMAIN); ?></span>
                                        </div>
                                    </div>


                                    <div class="inside">

                                        <a href="https://goo.gl/forms/lf71KyVdnTrudXpx1" target="_blank"><img src="<?php echo plugins_url('assets/img/survey.png', __FILE__); ?>" /></a>

                                        <p><b> <?php echo esc_html("Help us improve the plugin", ZEE_SPLASHHEADER_DOMAIN); ?></b></p>

                                    </div>

                                    <!-- .inside -->

                                </div>

                                <!-- .postbox -->

                                <div class="postbox">

                                    <div id="fb-root"></div>

                                    <div class="postbox-header">
                                        <div class="hndle ui-sortable-handle box-title">
                                            <span><?php echo esc_html("Zeesweb on Facebook", ZEE_SPLASHHEADER_DOMAIN); ?></span>
                                        </div>
                                    </div>


                                    <div class="inside">


                                        <div class="fb-page" data-href="https://www.facebook.com/zeesweb" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
                                            <div class="fb-xfbml-parse-ignore">
                                                <blockquote cite="https://www.facebook.com/zeesweb"><a href="https://www.facebook.com/zeesweb">Zeesweb</a></blockquote>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- .postbox -->

                                <div class="postbox">


                                    <!-- Toggle -->

                                    <div class="postbox-header">
                                        <div class="hndle ui-sortable-handle box-title">
                                            <span><?php echo esc_html("Zeesweb on Twitter", ZEE_SPLASHHEADER_DOMAIN); ?></span>
                                        </div>
                                    </div>
                                    <div class="inside">

                                        <a class="twitter-timeline" data-height="500" href="https://twitter.com/ZeeSWEB"><?php echo esc_html("Tweets by ZeeSWEB", ZEE_SPLASHHEADER_DOMAIN); ?>
                                        </a>

                                        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

                                    </div>

                                </div>


                            </div>

                        </div>

                        <br class="clear">

                    </div>

                    <!-- #poststuff -->

                </div> <!-- .wrap -->