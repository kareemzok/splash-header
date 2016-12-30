<div id="fb-root"></div>


<h3><?php echo _e("Splash Header"); ?></h3>
<?php
if (isset($_GET['tab']))
    splash_header_admin_tabs($_GET['tab']);
else
    splash_header_admin_tabs('general');
if (isset($_GET['tab']))
    $tab = $_GET['tab'];
else
    $tab = 'general';


$splashheader_settings_data = array('sh_title,sh_message,sh_show,sh_show_links_1,sh_show_links_2,sh_code_message,sh_show_custom_code');
$splashheader_design_data = array('sh_title_color,sh_bg_color,sh_message_color,sh_title_font_size,sh_message_font_size,sh_border_width,sh_border_color,sh_border_style');
$splashheader_advanced_settings = array('sh_width');

for ($i = 1; $i <= 6; $i++) {

    array_push($splashheader_settings_data, 'sh_link_title_' . $i, 'sh_link_url_' . $i, 'sh_font_icon_' . $i, 'sh_link_open_' . $i);
    array_push($splashheader_design_data, 'sh_link_title_color_' . $i, 'sh_link_font_size_' . $i);
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
                        <?php
                        switch ($tab) {

                            case 'general' :
                                ?>
                                <div class="handlediv" title="Click to toggle"><br></div>
                                <!-- Toggle -->
                                <div class="inside">
                                    <h3 class="handle"><?php echo _e("Instruction"); ?>
                                    </h3>


                                    <table cellspacing="0" class="widefat post ">

                                        <tbody> 
                                            <tr  > 
                                                <td>        

                                                    1. Fill in the forms in the settings tab <br/>
                                                    2. Use the shortcode [splashheader][/splashheader] or do_shortcode( '[splashheader]' );<br/>
                                                    in your theme to show the splash header

                                                </td>
                                            </tr>



                                        </tbody>
                                    </table>
                                    <h3 class="handle"><?php echo _e("Plugin Features"); ?>
                                    </h3>


                                    <table cellspacing="0" class="widefat post ">

                                        <tbody> 
                                            <tr  > 
                                                <td>        

                                                    * Welcome note with title and message<br/>
                                                    * Add up to 6 custom links with an option to insert an font icon instead of image<br/>
                                                    * Ability to chose if the links open in same or new browser tab<br/>
                                                    * Add a custom code such as html or wordpress shortcode code<br/>
                                                    * Ability to style the splash header with color, font size and border style<br/>


                                                </td>
                                            </tr>



                                        </tbody>
                                    </table>

                                    <?php break; ?>
                                <?php case 'homepage' :
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
                                                        <td colspan="2" ><input type="checkbox" name="sh_show_links_1" value="1" <?php echo $checked_1; ?>><?php echo _e("Display first links cols"); ?></td>

                                                    </tr>
                                                    <?php
                                                    for ($i = 1; $i <= 6; $i++) {
                                                        // check if link open in new window is checked 
                                                        if (get_option('sh_link_open_' . $i) == 1) {
                                                            $checked_open = 'checked';
                                                        } else {
                                                            $checked_open = '';
                                                        }
                                                        ?>
                                                        <?php
                                                        if ($i == 4) {

                                                            if (get_option('sh_show_links_2') == 1) {
                                                                $checked_2 = 'checked';
                                                            } else {
                                                                $checked_2 = '';
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td colspan="2" ><input type="checkbox" name="sh_show_links_2" value="1" <?php echo $checked_2; ?>><?php echo _e("Display second links cols"); ?></td>

                                                            </tr>
                                                        <?php } ?>
                                                        <tr>
                                                            <td style="" class="manage-column" scope="col"><input placeholder="<?php echo _e("Link Title " . $i . ": "); ?>" type="text" name="sh_link_title_<?php echo $i; ?>" value="<?php echo get_option('sh_link_title_' . $i); ?>" size="12"></td>
                                                            <td style="" class="manage-column" scope="col"><input placeholder="<?php echo _e("Link Url " . $i . ": "); ?>" type="text" name="sh_link_url_<?php echo $i; ?>" value="<?php echo get_option('sh_link_url_' . $i); ?>" size="25"></td>
                                                            <td style="" class="manage-column" scope="col"><input placeholder="<?php echo _e("Ex : fa-camera-retro fa-lg"); ?>" type="text" name="sh_font_icon_<?php echo $i; ?>" value="<?php echo get_option('sh_font_icon_' . $i); ?>" size="20"></td>

                                                            <td style="" class="manage-column" scope="col"><input type="checkbox" name="sh_link_open_<?php echo $i; ?>" value="1" <?php echo $checked_open; ?>><?php echo _e("Open in a new tab"); ?></td>

                                                        </tr>

                                                    <?php } ?>
                                                    <tr>
                                                        <td colspan="4">          
                                                            <p class="description"><?php _e("To use the Font Awesome for icons links please refere to the <a target='_blank' href='http://fontawesome.io/icons/'>documentation</a> v 4.6.3. Ex:fa-camera-retro"); ?>.</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table cellspacing="0" class="widefat post fixed">
                                                    <?php
                                                    if (get_option('sh_show_custom_code') == 1) {
                                                        $checked_custom_code = 'checked';
                                                    } else {
                                                        $checked_custom_code = '';
                                                    }
                                                    ?>
                                                    <tbody>
                                                        <tr style="font-weight: bold"> 
                                                            <th style="" class="manage-column sub-titles" scope="col"><?php _e("Custom shortcode"); ?></th>
                                                            <th style="" class="manage-column sub-titles" scope="col"> </th>
                                                            <th style="" class="manage-column" scope="col"></th>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" ><input type="checkbox" name="sh_show_custom_code" value="1" <?php echo $checked_custom_code; ?>><?php echo _e("Display custom code"); ?></td>

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
                                                                <td style="" class="manage-column" scope="col"><?php echo _e("Splash header backgound color"); ?></td>
                                                                <td style="" class="manage-column" scope="col"><input  type="text" class="sh-color-field" name="sh_bg_color" value="<?php echo get_option('sh_bg_color'); ?>"></td>

                                                            </tr>
                                                            <tr>
                                                                <td style="" class="manage-column" scope="col"><?php echo _e("Splash header border style"); ?></td>
                                                                <td style="" class="manage-column" scope="col">
                                                                    <select id="sh_border_style" >
                                                                        <?php
                                                                        $border_style_array = array('solid', 'none', 'dotted', 'dashed', 'double', 'groove', 'inset', 'outset');

                                                                        foreach ($border_style_array as $data) {
                                                                            $selected = '';

                                                                            if ($data == get_option('sh_border_style')) {
                                                                                $selected = 'selected';
                                                                            }
                                                                            echo '<option value="' . $data . '" ' . $selected . '>' . $data . '</option>';
                                                                            echo "\n";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <input type="hidden"  id="sh_hd_border_style" name="sh_border_style" value="<?php echo get_option('sh_border_style'); ?>" />

                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td style="" class="manage-column" scope="col"><?php echo _e("Splash header border color and width in pixel"); ?></td>
                                                                <td style="" class="manage-column" scope="col">
                                                                    <input  type="text" class="sh-color-field" name="sh_border_color" value="<?php echo get_option('sh_border_color'); ?>">
                                                                </td>
                                                                <td style="" class="manage-column" scope="col">

                                                                    <select id="sh_border_width" >
                                                                        <?php
                                                                        for ($j = 1; $j <= 11; $j++) {
                                                                            $selected = '';

                                                                            if ($j == get_option('sh_border_width')) {
                                                                                $selected = 'selected';
                                                                            }
                                                                            echo '<option value="' . $j . '" ' . $selected . '>' . $j . 'px</option>';
                                                                            echo "\n";
                                                                        }
                                                                        ?>
                                                                    </select>

                                                                    <input type="hidden"  id="sh_hd_border_width" name="sh_border_width" value="<?php echo get_option('sh_border_width'); ?>" />

                                                                </td>

                                                            </tr>
                                                            <tr>
                                                                <td style="" class="manage-column" scope="col"><?php echo _e("Title "); ?></td>
                                                                <td style="" class="manage-column" scope="col"><input  type="text" class="sh-color-field" name="sh_title_color" value="<?php echo get_option('sh_title_color'); ?>"></td>

                                                                <td style="" class="manage-column" scope="col">

                                                                    <select id="sh_title_font_size" >
                                                                        <?php
                                                                        for ($j = 11; $j <= 24; $j++) {
                                                                            $selected = '';

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



                                                        <?php
                                                        break;
                                                    case 'advancedsettings' :
                                                        ?>
                                                        <div class="handlediv" title="Click to toggle"><br></div>
                                                        <!-- Toggle -->

                                                        <h3 class="handle"><?php echo _e("Advanced options"); ?>
                                                        </h3>

                                                        <div class="inside">

                                                            <form method="post" action="options.php">
                                                                <?php
                                                                wp_nonce_field('update-options');
                                                                ?>
                                                                <input type="hidden" name="action" value="update" />
                                                                <input type="hidden" name="page_options" value="<?php echo $splashheader_advanced_settings; ?>"  />



                                                                <table cellspacing="0" class="widefat post ">

                                                                    <tbody>  <tr  style="font-weight: bold"> 
                                                                            <th style="" class="manage-column sub-titles" scope="col"><?php echo _e("Container Width: "); ?></th>
                                                                            <td><input type="text" name="sh_width" value="<?php echo get_option('sh_width'); ?>" size="10">%                                                     
                                                                            </td>
                                                                        </tr>
                                                                        <tr><td> 
                                                                                <p class="description"><?php _e("Default value ( field empty ) is 85% "); ?>.</p>                                                             
                                                                            </td></tr>


                                                                    </tbody>
                                                                </table>

                                                                </tr>
                                                                <?php break; ?>
                                                        <?php } ?>
                                                        <?php if ($tab != 'general') { ?>
                                                            <tr valign="top">
                                                                <td></td>
                                                                <td><input type="submit" name="splashheadersubmit" class="button-primary" value="Save Changes" ></td>
                                                            </tr>
                                                        <?php } ?>
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

                                                        <p>Author : Zeesweb team</p>
                                                        <p>Email : <a href="mailto:info@techwebies.com" target="_blank">info@zeesweb.com</a></p>
                                                        <p>Contact : <a href="http://www.zeesweb.com/#contact" target="_blank">Contact Us</a></p>
                                                    </div>
                                                    <!-- .inside -->
                                                </div>
                                                <!-- .postbox -->
                                                <div class="postbox">
                                                    <div id="fb-root"></div>
                                                    <div class="handlediv" title="Click to toggle"><br></div>
                                                    <!-- Toggle -->
                                                    <h3 class="inside">Zeesweb on facebook</h3>
                                                    <div class="inside">
                                                        <div class="fb-page" data-href="https://www.facebook.com/zeesweb" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/zeesweb"><a href="https://www.facebook.com/zeesweb">Zeesweb</a></blockquote></div></div>                                                

                                                    </div>
                                                </div>
                                                <!-- .postbox -->
                                                <div class="postbox">
                                                    <div class="handlediv" title="Click to toggle"><br></div>
                                                    <!-- Toggle -->
                                                    <h3 class="inside">Zeesweb on Twitter</h3>
                                                    <div class="inside">
													<a class="twitter-timeline" data-height="500" href="https://twitter.com/ZeeSWEB">Tweets by ZeeSWEB</a>
													<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
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

