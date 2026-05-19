<div id="fb-root"></div>

<h3><?php echo esc_html__("Splash Header", ZEE_SPLASHHEADER_DOMAIN); ?></h3>

<?php settings_errors(); ?>

<?php
//The text domain name is  used to form the name of the MO file for your plugin

$tab = zee_splash_header_get_current_tab();

// check which current tab is and add actvate class 

zee_splash_header_admin_tabs($tab);


$splashheader_settings_data = Splash_Header_Settings::get_page_options_csv('settings');
$splashheader_design_data = Splash_Header_Settings::get_page_options_csv('design');
$splashheader_advanced_settings = Splash_Header_Settings::get_page_options_csv('advanced');
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

                                            <div class="survey-wrapper"><a href="https://goo.gl/forms/lf71KyVdnTrudXpx1" target="_blank"><?php echo esc_html__("Help us improving our plugin by taking this survey", ZEE_SPLASHHEADER_DOMAIN); ?> !</a> </div>

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
                                            <span><?php echo esc_html__("Plugin Info", ZEE_SPLASHHEADER_DOMAIN); ?></span>
                                        </div>
                                    </div>

                                    <div class="inside">

                                        <p><a href="https://www.zeesweb.com/our-products/#1597485098433-bdfd2e81-64ac" target="_blank"><?php echo esc_html__("Name: Splash header", ZEE_SPLASHHEADER_DOMAIN); ?></a></p>


                                        <p><a href="http://www.zeesweb.com" target="_blank"><?php echo esc_html__("Author: Zeesweb team", ZEE_SPLASHHEADER_DOMAIN); ?><a /></p>

                                        <p><?php echo esc_html__("Email", ZEE_SPLASHHEADER_DOMAIN); ?>: <a href="mailto:info@zeesweb.com" target="_blank">info@zeesweb.com</a></p>

                                        <p><?php echo esc_html__("Contact", ZEE_SPLASHHEADER_DOMAIN); ?>: <a href="http://www.zeesweb.com/#contact" target="_blank"><?php echo esc_html("Contact Us", ZEE_SPLASHHEADER_DOMAIN); ?></a></p>

                                    </div>


                                </div>
                                <!--

                                <div class="postbox">
                                    <div class="postbox-header">
                                        <div class="hndle ui-sortable-handle box-title">
                                            <span><?php echo esc_html__("Try our new social app", ZEE_SPLASHHEADER_DOMAIN); ?></span>
                                        </div>
                                    </div>
                                    <div class="inside">

                                        <a href="https://www.sociabatt.com/" target="_blank"><img src="<?php echo esc_url(ZEE_SPLASHHEADER_ASSET_URL . 'img/sociabatt.png'); ?>" /></a>
                                        <p><b><?php echo esc_html__("SociaBatt is a social network app that allows users to create limited time online battles or debates - similar to voting but with your choice.", ZEE_SPLASHHEADER_DOMAIN); ?></b></p>

                                    </div>


                                    </div>
                                            -->
                                <div class="postbox">
                                    <div class="postbox-header">
                                        <div class="hndle ui-sortable-handle box-title">
                                            <span><?php echo esc_html__("Take our survey", ZEE_SPLASHHEADER_DOMAIN); ?></span>
                                        </div>
                                    </div>


                                    <div class="inside">

                                        <a href="https://goo.gl/forms/lf71KyVdnTrudXpx1" target="_blank"><img src="<?php echo esc_url(ZEE_SPLASHHEADER_ASSET_URL . 'img/survey.png'); ?>" /></a>

                                        <p><b> <?php echo esc_html__("Help us improve the plugin", ZEE_SPLASHHEADER_DOMAIN); ?></b></p>

                                    </div>

                                    <!-- .inside -->

                                </div>

                                <!-- .postbox -->

                                <div class="postbox">

                                    <div id="fb-root"></div>

                                    <div class="postbox-header">
                                        <div class="hndle ui-sortable-handle box-title">
                                            <span><?php echo esc_html__("Zeesweb on Facebook", ZEE_SPLASHHEADER_DOMAIN); ?></span>
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
                                            <span><?php echo esc_html__("Zeesweb on Twitter", ZEE_SPLASHHEADER_DOMAIN); ?></span>
                                        </div>
                                    </div>
                                    <div class="inside">

                                        <a class="twitter-timeline" data-height="500" href="https://twitter.com/ZeeSWEB"><?php echo esc_html__("Tweets by ZeeSWEB", ZEE_SPLASHHEADER_DOMAIN); ?>
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
