<div id="fb-root"></div>


<h3><?php echo _e("Splash Header"); ?></h3>
<?php
if (isset($_GET['tab']))
    splash_header_admin_tabs($_GET['tab']);
else
    splash_header_admin_tabs('homepage');
if (isset($_GET['tab']))
    $tab = $_GET['tab'];
else
    $tab = 'homepage';


$splashheader_settings_data = ['sh_title,sh_message,sh_show,sh_show_links_1,sh_show_links_2,sh_code_message'];
$splashheader_design_data = ['sh_title_color,sh_bg_color,sh_message_color,sh_title_font_size,sh_message_font_size'];

for ($i = 1; $i <= 6; $i++) {

    array_push($splashheader_settings_data, 'sh_link_title_' . $i, 'sh_link_url_' . $i, 'sh_link_thumb_img_' . $i);
    array_push($splashheader_design_data, 'sh_link_title_color_' . $i, 'sh_link_font_size_' . $i);
}

$splashheader_settings_data = implode(",", $splashheader_settings_data);
$splashheader_design_data = implode(",", $splashheader_design_data);
?>


<div class="wrap splashheader">

    <div id="icon-options-general" class="icon32"></div>


    <div id="poststuff">

        <div id="post-body" class="metabox-holder columns-2">

            <!-- main content -->
            <div id="post-body-content">

                <div class="meta-box-sortables ui-sortable">

                    <div class="postbox">
                        <?php
                        switch ($tab) {
                            case 'homepage' :
                                ?>
                                <div class="handlediv" title="Click to toggle"><br></div>
                                <!-- Toggle -->

                                <h3 class="handle"><?php echo _e("General"); ?>
                                </h3>

                                <div class="inside">

                                    <form method="post" action="options.php">
                                        <?php
                                        wp_nonce_field('update-options');

                                        if (get_option('sh_show') == 1) {
                                            $checked = 'checked';
                                        } else {
                                            $checked = '';
                                        }
                                        ?>
                                        <input type="hidden" name="action" value="update" />
                                        <input type="hidden" name="page_options" value="<?php echo $splashheader_settings_data; ?>"  />

                                        <table cellspacing="0" class="widefat post fixed">


                                            <tbody>
                                                <?php
                                                if (get_option('sh_show') == 1) {
                                                    $checked = 'checked';
                                                } else {
                                                    $checked = '';
                                                }
                                                ?>

                                                <tr>
                                                    <td colspan="2" ><input type="checkbox" name="sh_show" value="1" <?php echo $checked; ?>><?php echo _e("Display Splash header welcome note"); ?></td>

                                                </tr>
                                                <tr><td colspan="2"><h3><?php echo _e("Welcome note"); ?></h3></td></tr>

                                            <table cellspacing="0" class="widefat post fixed">

                                                <tr  style="font-weight: bold"> 
                                                    <th style="" class="manage-column sub-titles" scope="col"><?php echo _e("Note title: "); ?></th>
                                                    <th style="" class="manage-column sub-titles" scope="col"><?php echo _e("Note message: "); ?></th>
                                                    <th style="" class="manage-column" scope="col"></th>
                                                </tr>
                                                <tr>
                                                    <td style="" class="manage-column" scope="col"><input type="text" name="sh_title" value="<?php echo get_option('sh_title'); ?>" size="30"></td>
                                                    <td style="" class="manage-column" scope="col"><textarea type="text" name="sh_message" cols="30" rows="10"><?php echo get_option('sh_message'); ?></textarea></td>
                                                    <td style="" class="manage-column" scope="col"></td>
                                                </tr>

                                            </table>

                                            </tr>


                                            <tr><td colspan="2"><h3><?php echo _e("Links settings"); ?></h3></td></tr>
                                            <?php
                                            if (get_option('sh_show_links_1') == 1) {
                                                $checked_1 = 'checked';
                                            } else {
                                                $checked_1 = '';
                                            }
                                            ?>

                                            <table cellspacing="0" class="widefat post ">
                                                <tr>
                                                    <td colspan="2" ><input type="checkbox" name="sh_show_links_1" value="1" <?php echo $checked_1; ?>><?php echo _e("Display first links coloumns"); ?></td>

                                                </tr>
                                                <?php for ($i = 1; $i <= 6; $i++) { ?>
                                                    <?php
                                                    if ($i == 4) {

                                                        if (get_option('sh_show_links_2') == 1) {
                                                            $checked_2 = 'checked';
                                                        } else {
                                                            $checked_2 = '';
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td colspan="2" ><input type="checkbox" name="sh_show_links_2" value="1" <?php echo $checked_2; ?>><?php echo _e("Display second links coloumns"); ?></td>

                                                        </tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <td style="" class="manage-column" scope="col"><?php echo _e("Link " . $i . ": "); ?></td>
                                                        <td style="" class="manage-column" scope="col"><input placeholder="<?php echo _e("Link Title " . $i . ": "); ?>" type="text" name="sh_link_title_<?php echo $i; ?>" value="<?php echo get_option('sh_link_title_' . $i); ?>" size="15"></td>
                                                        <td style="" class="manage-column" scope="col"><input placeholder="<?php echo _e("Link Url " . $i . ": "); ?>" type="text" name="sh_link_url_<?php echo $i; ?>" value="<?php echo get_option('sh_link_url_' . $i); ?>" size="30"></td>
                                                        <td style="" class="manage-column" scope="col">
                                                            <div id="sh_thumb_icon_<?php echo $i; ?>" class="sh_thumb_icon">
                                                                <?php
                                                                if (get_option('sh_link_thumb_img_' . $i) == '') {
                                                                    $thumg_url = plugins_url() . '/splash-header/assets/no-icon.png';
                                                                } else {
                                                                    $thumg_url = get_option('sh_link_thumb_img_' . $i);
                                                                }
                                                                echo $thumb_url;
                                                                ?>
                                                                <img id="" src="<?php echo $thumg_url; ?>" alt="" border="0" />
                                                            </div>
                                                            <input id="sh_link_thumb_img_btn_<?php echo $i; ?>" type="button" class="button" value="<?php _e("Upload icon"); ?>" />
                                                            <input type="hidden" id="sh_link_thumb_img_<?php echo $i; ?>" name="sh_link_thumb_img_<?php echo $i; ?>" value="<?php get_option('sh_link_thumb_img_' . $i); ?>" />

                                                        </td>
                                                    </tr>

                                                <?php } ?>
                                                <tr>
                                                    <td colspan="4">          
                                                        <p class="description"><?php _e("How-to: upload (or select) an image (32x32), set Size to Full and click on Upload. After it's done, hit on Apply to save changes"); ?>.</p>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table cellspacing="0" class="widefat post fixed">

                                                <tbody>
                                                    <tr style="font-weight: bold"> 
                                                        <th style="" class="manage-column sub-titles" scope="col"><?php _e("Custom shortcode"); ?></th>
                                                        <th style="" class="manage-column sub-titles" scope="col"> </th>
                                                        <th style="" class="manage-column" scope="col"></th>
                                                    </tr>
                                                    <tr>
                                                        <td style="" class="manage-column" scope="col"><textarea type="text" name="sh_code_message" cols="50" rows="5"><?php echo get_option('sh_code_message'); ?></textarea></td>
                                                        <td style="" class="manage-column" scope="col"></td>
                                                        <td style="" class="manage-column" scope="col"></td>
                                                    </tr>
     <tr>
                                                    <td colspan="4">          
                                                        <p class="description"><?php _e("Add custom shortcode for any form or html code"); ?>.</p>
                                                    </td>
                                                </tr>
                                                </tbody></table>
                                            </tr>
                                            <?php break; ?>
                                        <?php case 'design'; ?>
                                            <div class="handlediv" title="Click to toggle"><br></div>
                                            <!-- Toggle -->

                                            <h3 class="handle"><?php echo _e("Design"); ?>
                                            </h3>

                                            <div class="inside">
                                                <form method="post" action="options.php">

                                                    <?php wp_nonce_field('update-options'); ?>
                                                    <input type="hidden" name="action" value="update" />
                                                    <input type="hidden" name="page_options" value="<?php echo $splashheader_design_data; ?>"  />

                                                    <table cellspacing="0" class="widefat post ">

                                                        <tr>
                                                            <td style="" class="manage-column" scope="col"><?php echo _e("Backgound color"); ?></td>
                                                            <td style="" class="manage-column" scope="col"><input  type="text" class="sh-color-field" name="sh_bg_color" value="<?php echo get_option('sh_bg_color'); ?>"></td>

                                                        </tr>
                                                        <tr>
                                                            <td style="" class="manage-column" scope="col"><?php echo _e("Title "); ?></td>
                                                            <td style="" class="manage-column" scope="col"><input  type="text" class="sh-color-field" name="sh_title_color" value="<?php echo get_option('sh_title_color'); ?>"></td>

                                         <td style="" class="manage-column" scope="col">

                                                                    <select id="sh_title_font_size" >
                                                                        <?php   echo '>>'.get_option('sh_title_font_size');
                                                                        for ($j = 11; $j <= 24; $j++) {
                                                                            $selected = '';
                                                                            if ($j == 11) {
                                                                                //   $j=_e("Font size" );
                                                                            }
                                                                         
                                                                            if ($j == get_option('sh_title_font_size')) {
                                                                                $selected = 'selected';
                                                                            }
                                                                            echo '<option value="' . $j . '" ' . $selected . '>' . $j . 'px</option>';
                                                                            echo "\n";
                                                                        }
                                                                        ?>
                                                                    </select>

                                                                    <input type="hidden"  id="sh_hd_title_font_size" name="sh_title_font_size" value="<?php echo get_option('sh_title_font_size'); ?>" />

                                                                </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="" class="manage-column" scope="col"><?php echo _e("Message "); ?></td>
                                                            <td style="" class="manage-column" scope="col"><input  type="text" class="sh-color-field" name="sh_message_color" value="<?php echo get_option('sh_message_color'); ?>"></td>
                                         <td style="" class="manage-column" scope="col">

                                                                    <select id="sh_message_font_size" >
                                                                        <?php
                                                                        for ($j = 11; $j <= 24; $j++) {
                                                                            $selected = '';
                                                                            if ($j == 11) {
                                                                                //   $j=_e("Font size" );
                                                                            }
                                                                            if ($j == get_option('sh_message_font_size')) {
                                                                                $selected = 'selected';
                                                                            }
                                                                            echo '<option value="' . $j . '" ' . $selected . '>' . $j . 'px</option>';
                                                                            echo "\n";
                                                                        }
                                                                        ?>
                                                                    </select>

                                                                    <input type="hidden"  id="sh_hd_message_font_size" name="sh_message_font_size" value="<?php echo get_option('sh_message_font_size'); ?>" />

                                                                </td>
                                                        </tr>
                                                        <?php
                                                        for ($i = 1; $i <= 6; $i++) {
                                                            ?>
                                                            <tr>
                                                                <td style="" class="manage-column" scope="col"><?php echo _e("Link title  " . $i); ?></td>
                                                                <td style="" class="manage-column" scope="col"><input  type="text" class="sh-color-field" name="sh_link_title_color_<?php echo $i; ?>" value="<?php echo get_option('sh_link_title_color_' . $i); ?>"></td>
                                                                <td style="" class="manage-column" scope="col">

                                                                    <select id="sh_link_font_size_<?php echo $i; ?>" >
                                                                        <?php
                                                                        for ($j = 11; $j <= 24; $j++) {
                                                                            $selected = '';
                                                                            if ($j == 11) {
                                                                                //   $j=_e("Font size" );
                                                                            }
                                                                            if ($j == get_option('sh_link_font_size_' . $i)) {
                                                                                $selected = 'selected';
                                                                            }
                                                                            echo '<option value="' . $j . '" ' . $selected . '>' . $j . 'px</option>';
                                                                            echo "\n";
                                                                        }
                                                                        ?>
                                                                    </select>

                                                                    <input type="hidden"  id="sh_hd_link_font_size_<?php echo $i; ?>" name="sh_link_font_size_<?php echo $i; ?>" value="<?php echo get_option('sh_link_font_size_' . $i); ?>" />

                                                                </td>
                                                            </tr>

                                                        <?php } ?>

                                                    </table>



                                                    <?php break; ?>

                                            <?php } ?>

                                            <tr valign="top">
                                                <td></td>
                                                <td><input type="submit" name="splashheadersubmit" class="button-primary" value="Save Changes" ></td>
                                            </tr>
                                            </tbody>
                                            </table>
                                        </form>
                                    </div>
                                    <!-- .e -->

                                    </div>
                                    <!-- .postbox -->

                                    </div>
                                    <!-- .meta-box-sortables .ui-sortable -->

                                    </div>
                                    <!-- post-body-content -->

                                    <!-- sidebar -->
                                    <div id="postbox-container-1" class="postbox-container">

                                        <div class="meta-box-sortables">

                                            <div class="postbox">

                                                <div class="handlediv" title="Click to toggle"><br></div>
                                                <!-- Toggle -->
                                                <h3 class="hndle">Plugin Info</h3>

                                                <div class="inside">
                                                    <p><a href="http://www.kareemzok.com" target="_blank">Name : Splash header</a></p>

                                                    <p>Author : Techwebies team</p>
                                                    <p>Email : <a href="mailto:info@techwebies.com" target="_blank">info@techwebies.com</a></p>
                                                    <p>Contact : <a href="http://www.techwebies.com/contact-us" target="_blank">Contact Us</a></p>
                                                </div>
                                                <!-- .inside -->
                                            </div>
                                            <!-- .postbox -->
                                            <div class="postbox">
                                                <div id="fb-root"></div>
                                                <div class="handlediv" title="Click to toggle"><br></div>
                                                <!-- Toggle -->
                                                <h3 class="inside">Techwebies on facebook</h3>
                                                <div class="inside">
                                                    <div class="fb-page" data-href="https://www.facebook.com/techwebiies" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/techwebiies"><a href="https://www.facebook.com/techwebiies">TechWebies</a></blockquote></div></div>                                                

                                                </div>
                                            </div>
                                            <!-- .postbox -->
                                            <div class="postbox">
                                                <div class="handlediv" title="Click to toggle"><br></div>
                                                <!-- Toggle -->
                                                <h3 class="inside">Techwebies on Twitter</h3>
                                                <div class="inside">
                                                    <a class="twitter-timeline" href="https://twitter.com/TechWebies" data-widget-id="636631315291504640">Tweets by @TechWebies</a>
                                                    <script>!function (d, s, id) {
                                                            var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                                                            if (!d.getElementById(id)) {
                                                                js = d.createElement(s);
                                                                js.id = id;
                                                                js.src = p + "://platform.twitter.com/widgets.js";
                                                                fjs.parentNode.insertBefore(js, fjs);
                                                            }
                                                        }(document, "script", "twitter-wjs");</script>

                                                </div>
                                            </div>


                                        </div>
                                        <!-- .meta-box-sortables -->

                                    </div>
                                    <!-- #postbox-container-1 .postbox-container -->

                                    </div>
                                    <!-- #post-body .metabox-holder .columns-2 -->

                                    <br class="clear">
                                    </div>
                                    <!-- #poststuff -->

                                    </div> <!-- .wrap -->

