<div id="fb-root"></div>
<h3><?php echo esc_html_e("Splash Header"); ?>

</h3>
<?php settings_errors(); ?>
<?php
//The text domain name is  used to form the name of the MO file for your plugin

global $tab;
// check which current tab is and add actvate class 
splash_header_admin_tabs($tab);


$splashheader_settings_data = array('sh_title,sh_message,sh_show,sh_show_links_1,sh_show_links_2,sh_code_message,sh_show_custom_code');
$splashheader_design_data = array('sh_title_color,sh_bg_color,sh_message_color,sh_title_font_size,sh_message_font_size,sh_border_width,sh_border_color,sh_border_style');
$splashheader_advanced_settings = array('sh_width', 'sh_show_clock_date', 'sh_show_clock_time', 'sh_date_format', 'sh_date_position', 'sh_date_font_size', 'sh_date_font_color');


for ($i = 1; $i <= 6; $i++) {

    array_push($splashheader_settings_data, 'sh_link_title_' . $i, 'sh_link_url_' . $i, 'sh_font_icon_' . $i, 'sh_link_open_' . $i);
    array_push($splashheader_design_data, 'sh_link_title_color_' . $i, 'sh_link_font_size_' . $i);
}

$splashheader_settings_data = implode(",", $splashheader_settings_data);
$splashheader_design_data = implode(",", $splashheader_design_data);
$splashheader_advanced_settings = implode(",", $splashheader_advanced_settings);
//echo splash_header_recentposts_dropdown();
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

                                        <form action="<?php echo esc_url(admin_url('options.php')) ?>" method="post" >
                                            <?php wp_nonce_field('update-options'); ?>
                                            <?php if ($tab == 'general') { ?>

                                                <h3 class="handle"><?php echo esc_html_e("Instruction", TEXT_DOMAIN); ?> </h3>
                                                <table cellspacing="0" class="widefat post">
                                                    <tbody> 
                                                        <tr  > 
                                                            <td>        

                                                                1.<?php echo esc_html_e("Fill in the forms in all tabs", TEXT_DOMAIN); ?> <br/>
                                                                2.<?php echo esc_html_e("Use the shortcode", TEXT_DOMAIN); ?> [splashheader][/splashheader] or do_shortcode( '[splashheader]' );<br/>
                                                                <?php echo esc_html_e("in your theme to show the", TEXT_DOMAIN) . " splash header"; ?> 

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <h3 class="handle"><?php echo esc_html_e("Plugin Features", TEXT_DOMAIN); ?></h3>
                                                <table cellspacing="0" class="widefat post">

                                                    <tbody> 
                                                        <tr  > 
                                                            <td>        

                                                                * <?php echo esc_html_e("Welcome note with title and message", TEXT_DOMAIN); ?> <br/>
                                                                * <?php echo esc_html_e("Add up to 6 custom links with an option to insert font icon instead of image", TEXT_DOMAIN); ?> <br/>
                                                                * <?php echo esc_html_e("Ability to choose if the links open in same or new browser tab", TEXT_DOMAIN); ?> <br/>
                                                                * <?php echo esc_html_e("Add a custom code such as html or wordpress shortcode code", TEXT_DOMAIN); ?> <br/>
                                                                * <?php echo esc_html_e("Ability to style the splash header with color, font size and border style", TEXT_DOMAIN); ?><br/> 
                                                                * <?php echo esc_html_e("Ability to add current date in different format", TEXT_DOMAIN); ?> 
																
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                                <h3 class="handle"><?php echo esc_html_e("To do in next releases", TEXT_DOMAIN); ?></h3>
                                                <table cellspacing="0" class="widefat post">
                                                    <tbody> 
                                                        <tr  > 
                                                            <td>        

                                                                * <?php echo esc_html_e("Multiple splash header", TEXT_DOMAIN); ?> <br/>
                                                                * <?php echo esc_html_e("Add reset link or button to reset the form", TEXT_DOMAIN); ?> <br/>
                                                                * <?php echo esc_html_e("Add option in advanced setting : width for col 1 and col 2", TEXT_DOMAIN); ?> <br/>
                                                                * <?php echo esc_html_e("Add time display as analog, digital or text", TEXT_DOMAIN); ?> <br/>

                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            <?php } ?>

                                            <?php if ($tab == 'homepage') { ?>
                                                <?php
                                                if (get_option('sh_show') == 1) {
                                                    $checked = 'checked';
                                                } else {
                                                    $checked = '';
                                                }
                                                ?>
                                                <input type="hidden" name="action" value="update" />
                                                <input type="hidden" name="page_options" value="<?php echo $splashheader_settings_data; ?>"  />

                                                <h3 class="handle"><?php echo esc_html_e("General", TEXT_DOMAIN); ?> </h3>
                                                <p><input type="checkbox" name="sh_show" value="1" <?php echo $checked; ?>><?php echo esc_html_e("Display Splash header welcome note", TEXT_DOMAIN); ?></p>
                                                <table cellspacing="0" class="widefat post">
                                                    <tbody> 

                                                        <tr><td colspan="2"><h3><?php echo esc_html_e("Welcome note", TEXT_DOMAIN); ?></h3></td></tr>
                                                        <tr  style="font-weight: bold"> 
                                                            <th style="" class="manage-column sub-titles" scope="col"><?php echo esc_html_e("Note title", TEXT_DOMAIN); ?>: </th>
                                                            <th style="" class="manage-column sub-titles" scope="col"><?php echo esc_html_e("Note message", TEXT_DOMAIN); ?>: </th>
                                                            <th style="" class="manage-column" scope="col"></th>
                                                        </tr>
                                                        <tr>
                                                            <td style="" class="manage-column" scope="col"><input type="text" name="sh_title" value="<?php echo get_option('sh_title'); ?>" size="30"></td>
                                                            <td style="" class="manage-column" scope="col"><textarea type="text" name="sh_message" cols="50" rows="10"><?php echo get_option('sh_message'); ?></textarea></td>
                                                            <td style="" class="manage-column" scope="col"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <h3><?php echo esc_html_e("Links settings", TEXT_DOMAIN); ?></h3>
                                                <?php
                                                if (get_option('sh_show_links_1') == 1) {
                                                    $checked_1 = 'checked';
                                                } else {
                                                    $checked_1 = '';
                                                }
                                                ?>
                                                <div id="tabs-links-setting">
                                                    <ul>
                                                        <li onclick="openTabs('tabs-links-1')"><a class="nav-tab" href="#tabs-links-1"><?php echo esc_html_e('First links cols', TEXT_DOMAIN); ?></a>
                                                        <li  onclick="openTabs('tabs-links-2')"><a class="nav-tab" href="#tabs-links-2"><?php echo esc_html_e('Second links cols', TEXT_DOMAIN); ?></a>
                                                    </ul>
                                                    <div class="wrap">
                                                        <table cellspacing="0" class="widefat post fixed">
                                                            <tr>
                                                                <td colspan="4">      
                                                                    <p class="description">
                                                                        *<?php
                                                                        printf(
                                                                                __('To use the Font Awesome for icons links please refer to the <a target="_blank" href="%s">documentation</a> v 4.6.3. Ex:fa-camera-retro', 'your-text-domain'), 'http://fontawesome.io/icons/');
                                                                        ?>
                                                                    </p>
                                                                    <p class="description">* <?php esc_html_e("Link of the selected post or page dropdown will be inserted into Link Url field", TEXT_DOMAIN); ?>.</p>

                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <div id="tabs-links-1" class="splash-header-tabs">
                                                            <p>


                                                            <table cellspacing="0" class="widefat post">
                                                                <tr>
                                                                    <td colspan="2" ><input type="checkbox" name="sh_show_links_1" value="1" <?php echo $checked_1; ?>><?php echo esc_html_e("Display first links cols", TEXT_DOMAIN); ?></td>

                                                                </tr>
                                                                <?php
                                                                for ($i = 1; $i <= 3; $i++) {
                                                                    // check if link open in new window is checked 
                                                                    if (get_option('sh_link_open_' . $i) == 1) {
                                                                        $checked_open = 'checked';
                                                                    } else {
                                                                        $checked_open = '';
                                                                    }
                                                                    ?>

                                                                    <tr>
                                                                        <td style="" class="manage-column" scope="col">
                                                                            <table cellspacing="0" class="widefat post single-link">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td  class="label-link-title"><?php echo esc_html_e('Link', TEXT_DOMAIN) . ' ' . $i; ?></td>
                                                                                        <td><input type="checkbox" name="sh_link_open_<?php echo $i; ?>" value="1" <?php echo $checked_open; ?>><?php echo esc_html_e("Open in a new tab", TEXT_DOMAIN); ?></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td  ><input placeholder="<?php echo esc_html_e("Link title", TEXT_DOMAIN) . ' ' . $i; ?>" type="text" name="sh_link_title_<?php echo $i; ?>" value="<?php echo get_option('sh_link_title_' . $i); ?>" size="30"></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td  ><input class="sh_link_url" placeholder="<?php echo esc_html_e("Link url", TEXT_DOMAIN) . ' ' . $i; ?>" type="text" id="sh_link_url_<?php echo $i; ?>"  name="sh_link_url_<?php echo $i; ?>" value="<?php echo get_option('sh_link_url_' . $i); ?>" size="30"></td>
                                                                                        <td><?php echo splash_header_recentposts_dropdown($i); ?> <?php echo esc_html_e('-'); ?> <?php echo splash_header_recentpages_dropdown($i); ?></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td  ><input placeholder="<?php echo esc_html_e("Ex : fa-camera-retro fa-lg", TEXT_DOMAIN); ?>" type="text" name="sh_font_icon_<?php echo $i; ?>" value="<?php echo get_option('sh_font_icon_' . $i); ?>" size="30"></td>
                                                                                        <td> 
                                                                                        </td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>

                                                                <?php } ?>

                                                            </table>
                                                            </p>
                                                        </div>
                                                        <div id="tabs-links-2" class="splash-header-tabs" style="display:none">
                                                            <p>

                                                            <table cellspacing="0" class="widefat post">
                                                                <?php
                                                                if (get_option('sh_show_links_2') == 1) {
                                                                    $checked_2 = 'checked';
                                                                } else {
                                                                    $checked_2 = '';
                                                                }
                                                                ?>
                                                                <tr>
                                                                    <td colspan="2" ><input type="checkbox" name="sh_show_links_2" value="1" <?php echo $checked_2; ?>><?php echo esc_html_e("Display second links cols", TEXT_DOMAIN); ?></td>

                                                                </tr>
                                                                <?php
                                                                for ($i = 4; $i <= 6; $i++) {
                                                                    // check if link open in new window is checked 
                                                                    if (get_option('sh_link_open_' . $i) == 1) {
                                                                        $checked_open = 'checked';
                                                                    } else {
                                                                        $checked_open = '';
                                                                    }
                                                                    ?>

                                                                    <tr>
                                                                        <td style="" class="manage-column" scope="col">
                                                                            <table cellspacing="0" class="widefat post single-link">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td  class="label-link-title"><?php echo esc_html_e('Link') . ' ' . $i; ?></td>
                                                                                        <td><input type="checkbox" name="sh_link_open_<?php echo $i; ?>" value="1" <?php echo $checked_open; ?>><?php echo esc_html_e("Open in a new tab", TEXT_DOMAIN); ?></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td  ><input placeholder="<?php echo esc_html_e("Link title", TEXT_DOMAIN) . ' ' . $i; ?>" type="text" name="sh_link_title_<?php echo $i; ?>" value="<?php echo get_option('sh_link_title_' . $i); ?>" size="30"></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td  ><input class="sh_link_url" placeholder="<?php echo esc_html_e("Link url", TEXT_DOMAIN) . ' ' . $i; ?>" type="text" id="sh_link_url_<?php echo $i; ?>"  name="sh_link_url_<?php echo $i; ?>" value="<?php echo get_option('sh_link_url_' . $i); ?>" size="30"></td>
                                                                                        <td><?php echo splash_header_recentposts_dropdown($i); ?> <?php echo esc_html_e('-'); ?> <?php echo splash_header_recentpages_dropdown($i); ?></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td  ><input placeholder="<?php echo esc_html_e("Ex : fa-camera-retro fa-lg", TEXT_DOMAIN); ?>" type="text" name="sh_font_icon_<?php echo $i; ?>" value="<?php echo get_option('sh_font_icon_' . $i); ?>" size="30"></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>

                                                                <?php } ?>

                                                            </table>


                                                            </p>
                                                        </div>
                                                        <table cellspacing="0" class="widefat post fixed">
                                                            <tr>
                                                                <td colspan="4">          
                                                                    <p class="description">
                                                                        *<?php
                                                                        printf(
                                                                                __('To use the Font Awesome for icons links please refer to the <a target="_blank" href="%s">documentation</a> v 4.6.3. Ex:fa-camera-retro', 'your-text-domain'), 'http://fontawesome.io/icons/');
                                                                        ?>

                                                                    </p>
                                                                    <p class="description">* <?php esc_html_e("Link of the selected post or page dropdown will be inserted into Link Url field", TEXT_DOMAIN); ?>.</p>

                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <br/>
                                                    </div>
                                                </div>
                                                <h3><?php esc_html_e("Custom shortcode", TEXT_DOMAIN); ?></h3>
                                                <?php
                                                if (get_option('sh_show_custom_code') == 1) {
                                                    $checked_custom_code = 'checked';
                                                } else {
                                                    $checked_custom_code = '';
                                                }
                                                ?>

                                                <table cellspacing="0" class="widefat post fixed">
                                                    <tbody>

                                                        <tr>
                                                            <td colspan="2" ><input type="checkbox" name="sh_show_custom_code" value="1" <?php echo $checked_custom_code; ?>><?php echo esc_html_e("Display custom code", TEXT_DOMAIN); ?></td>

                                                        </tr>
                                                        <tr>
                                                            <td style="" class="manage-column" scope="col"><textarea type="text" name="sh_code_message" cols="100" rows="7"><?php echo get_option('sh_code_message', TEXT_DOMAIN); ?></textarea></td>
                                                            <td style="" class="manage-column" scope="col"></td>
                                                            <td style="" class="manage-column" scope="col"></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4">          
                                                                <p class="description"><?php esc_html_e("Add custom shortcode for any form or html code", TEXT_DOMAIN); ?>.</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>


                                            <?php } ?>


                                            <?php if ($tab == 'design') { ?>
                                                <input type="hidden" name="action" value="update" />
                                                <input type="hidden" name="page_options" value="<?php echo $splashheader_design_data; ?>"  />

                                                <h3 class="handle"><?php echo esc_html_e("Design", TEXT_DOMAIN); ?></h3>
                                                <table cellspacing="0" class="widefat post">

                                                    <tr>
                                                        <td style="" class="manage-column" scope="col"><?php echo esc_html_e("Splash header background color", TEXT_DOMAIN); ?></td>
                                                        <td style="" class="manage-column" scope="col"><input  type="text" class="sh-color-field" name="sh_bg_color" value="<?php echo get_option('sh_bg_color'); ?>"></td>

                                                    </tr>
                                                    <tr>
                                                        <td style="" class="manage-column" scope="col"><?php echo esc_html_e("Splash header border style", TEXT_DOMAIN); ?></td>
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
                                                        <td style="" class="manage-column" scope="col"><?php echo esc_html_e("Splash header border color and width in pixel", TEXT_DOMAIN); ?></td>
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
                                                        <td style="" class="manage-column" scope="col"><?php echo esc_html_e("Title", TEXT_DOMAIN); ?></td>
                                                        <td style="" class="manage-column" scope="col"><input  type="text" class="sh-color-field" name="sh_title_color" value="<?php echo get_option('sh_title_color'); ?>"></td>

                                                        <td style="" class="manage-column" scope="col">

                                                            <select id="sh_title_font_size" >
                                                                <?php
                                                                for ($j = 11; $j <= FONT_SIZE; $j++) {
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
                                                        <td style="" class="manage-column" scope="col"><?php echo esc_html_e("Message", TEXT_DOMAIN); ?></td>
                                                        <td style="" class="manage-column" scope="col"><input  type="text" class="sh-color-field" name="sh_message_color" value="<?php echo get_option('sh_message_color'); ?>"></td>
                                                        <td style="" class="manage-column" scope="col">

                                                            <select id="sh_message_font_size" >
                                                                <?php
                                                                for ($j = 11; $j <= FONT_SIZE; $j++) {
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
                                                            <td style="" class="manage-column" scope="col"><?php echo esc_html_e("Link title", TEXT_DOMAIN) . ' ' . $i; ?></td>
                                                            <td style="" class="manage-column" scope="col"><input  type="text" class="sh-color-field" name="sh_link_title_color_<?php echo $i; ?>" value="<?php echo get_option('sh_link_title_color_' . $i); ?>"></td>
                                                            <td style="" class="manage-column" scope="col">

                                                                <select id="sh_link_font_size_<?php echo $i; ?>" >
                                                                    <?php
                                                                    for ($j = 11; $j <= FONT_SIZE; $j++) {
                                                                        $selected = '';
                                                                        if ($j == 11) {
                                                                            //   $j=esc_html_e("Font size" );
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

                                            <?php } ?>


                                            <?php if ($tab == 'advancedsettings') { ?>
                                                <input type="hidden" name="action" value="update" />
                                                <input type="hidden" name="page_options" value="<?php echo $splashheader_advanced_settings; ?>"  />
                                                <h3 class="handle"><?php echo esc_html_e("Advanced options", TEXT_DOMAIN); ?> </h3>

                                                <table cellspacing="0" class="widefat post">
                                                    <tbody> 
                                                        <tr> 
                                                            <th style="" class="manage-column" scope="col"><?php echo esc_html_e("Container Width", TEXT_DOMAIN); ?>: </th>
                                                            <td><input type="text" name="sh_width" value="<?php echo get_option('sh_width'); ?>" size="10">%                                                     
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td> 
                                                                <p class="description"><?php esc_html_e("Default value ( field empty ) is 85%", TEXT_DOMAIN); ?>.</p>                                                             
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <h3 class="handle"><?php echo esc_html_e("Clock Settings", TEXT_DOMAIN); ?> </h3>
                                                <div id="tabs-clock-setting">
                                                    <ul>
                                                        <li onclick="openTabs('tabs-clock-1')"><a class="nav-tab" href="#tabs-clock-1"><?php echo esc_html_e('Date settings', TEXT_DOMAIN); ?></a>
                                                        <li  onclick="openTabs('tabs-clock-2')"><a class="nav-tab" href="#tabs-clock-2"><?php echo esc_html_e('Time settings', TEXT_DOMAIN); ?></a>
                                                    </ul>
                                                    <div class="wrap">

                                                        <div id="tabs-clock-1" class="splash-header-tabs">
                                                            <p>

                                                            <table cellspacing="0" class="widefat post">
                                                                <tbody> 
                                                                    <tr > 
                                                                        <?php
                                                                        if (get_option('sh_show_clock_date') == 1) {
                                                                            $checked_show_date = 'checked';
                                                                        } else {
                                                                            $checked_show_date = '';
                                                                        }
                                                                        ?>
                                                                        <td> <input type="checkbox" name="sh_show_clock_date" value="1" <?php echo $checked_show_date; ?>><?php echo esc_html_e("Display clock date", TEXT_DOMAIN); ?><td>
                                                                    </tr>
                                                                    <tr > 
                                                                        <th style="" class="manage-column" scope="col"><?php echo esc_html_e("Date format", TEXT_DOMAIN); ?>: </th>
                                                                        <td><?php
                                                                            //if (splash_header_get_date_format(get_option('sh_date_format')) != '') {
                                                                                echo splash_header_get_date_format(get_option('sh_date_format'));
                                                                            //} else {
                                                                              //  echo esc_html_e("Please save your timezone settings", TEXT_DOMAIN);
                                                                            //}
                                                                            ?></td>
                                                                        <td> </td>
                                                                    </tr>
                                                                    <tr > 
                                                                        <th style="" class="manage-column" scope="col"><?php echo esc_html_e("Date position", TEXT_DOMAIN); ?>: </th>
                                                                        <td><?php
                                                                            $date_pos = get_option('sh_date_position');
                                                                            if (get_option('sh_date_position') == '') {
                                                                                $date_pos = 'center';
                                                                            }
                                                                            echo splash_header_get_date_position($date_pos);
                                                                            ?> </td>
                                                                        <td> </td>

                                                                    </tr>
                                                                    <tr>
                                                                        <th style="" class="manage-column" scope="col"><?php echo esc_html_e("Font size", TEXT_DOMAIN); ?>: </th>
                                                                        <td>

                                                                            <select id="sh_date_font_size" >
                                                                                <?php
                                                                                for ($j = 11; $j <= FONT_SIZE; $j++) {
                                                                                    $selected = '';

                                                                                    if ($j == get_option('sh_date_font_size')) {
                                                                                        $selected = 'selected';
                                                                                    }
                                                                                    echo '<option value="' . $j . '" ' . $selected . '>' . $j . 'px</option>';
                                                                                    echo "\n";
                                                                                }
                                                                                ?>
                                                                            </select>

                                                                            <input type="hidden"  id="sh_hd_date_font_size" name="sh_date_font_size" value="<?php echo get_option('sh_date_font_size'); ?>" />


                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="" class="manage-column" scope="col"><?php echo esc_html_e("Font color", TEXT_DOMAIN); ?>: </th>
                                                                        <td style="" class="manage-column" scope="col"><input  type="text" class="sh-color-field" name="sh_date_font_color" value="<?php echo get_option('sh_date_font_color'); ?>"></td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td> 
                                                                            <p class="description"><?php echo esc_html_e("Currently timezone is wordpress default value", TEXT_DOMAIN); ?><?php echo ': <span style="font-weight:bold">' . get_option('timezone_string'); ?></span></p>                                                             
                                                                            <p class="description"><?php echo esc_html_e('Default value ( no selection) is default wordpress date format', TEXT_DOMAIN) . ': <span style="font-weight:bold">' . get_option('date_format'); ?></span></p>                                                             
                                                                            <p class="description"><?php echo esc_html_e('For custom value please refer to wordpress custom format date', TEXT_DOMAIN); ?> <p>                                                             
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                            </p>
                                                        </div>
                                                        <div id="tabs-clock-2" class="splash-header-tabs" style="display:none">
                                                            <p>
                                                            <table cellspacing="0" class="widefat post">
                                                                <tbody> 
                                                                    <tr > 
                                                                        <?php
                                                                        if (get_option('sh_show_clock_time') == 1) {
                                                                            $checked_show_time = 'checked';
                                                                        } else {
                                                                            $checked_show_time = '';
                                                                        }
                                                                        ?>
                                                                        <td> <input disabled type="checkbox" name="sh_show_clock_time" value="1" <?php echo $checked_show_time; ?>><?php echo esc_html_e("Display clock time", TEXT_DOMAIN); ?><td>
                                                                    </tr>
                                                                    <tr  > 
                                                                        <th style="color:red" class="manage-column " scope="col"><?php echo esc_html_e("This section will be implemented soon", TEXT_DOMAIN); ?> </th>
                                                                    </tr>

                                                                    <tr > 
                                                                        <th style="" class="manage-column" scope="col"> </th>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                            </p>
                                                        </div>

                                                        <br/>
                                                    </div>
                                                </div>
                                            <?php } ?> 
                                            <?php if ($tab != 'general') { ?>
                                                <input type="submit" name="splashheadersubmit" class="button-primary" value="<?php echo esc_html_e("Save Changes", TEXT_DOMAIN); ?>">
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
                        <div id="postbox-container-1" class="postbox-container">

                            <div class="meta-box-sortables">

                                <div class="postbox">

                                    <div class="handlediv" title="<?php echo esc_html_e("Click to toggle", TEXT_DOMAIN); ?>"><br></div>
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
                                    <div class="handlediv" title="<?php echo esc_html_e("Click to toggle", TEXT_DOMAIN); ?>"><br></div>
                                    <!-- Toggle -->
                                    <h3 class="inside">Zeesweb on facebook</h3>
                                    <div class="inside">
                                        <div class="fb-page" data-href="https://www.facebook.com/zeesweb" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/zeesweb"><a href="https://www.facebook.com/zeesweb">Zeesweb</a></blockquote></div></div>                                                

                                    </div>
                                </div>
                                <!-- .postbox -->
                                <div class="postbox">
                                    <div class="handlediv" title="<?php echo esc_html_e("Click to toggle", TEXT_DOMAIN); ?>"><br></div>
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


                        <!-- #post-body .metabox-holder .columns-2 -->

                        <br class="clear">
                    </div>
                    <!-- #poststuff -->

                </div> <!-- .wrap -->

