<?php
if (get_option('sh_show') == 1) {

    $checked = 'checked';
} else {

    $checked = '';
}
?>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="<?php echo esc_html($splashheader_settings_data); ?>" />

<h3 class="handle"><?php echo esc_html__("General", ZEE_SPLASHHEADER_DOMAIN); ?> </h3>

<p class="display-links"><input type="checkbox" name="sh_show" value="1" <?php echo esc_html($checked); ?>><?php echo esc_html__("Display Splash header welcome note", ZEE_SPLASHHEADER_DOMAIN); ?></p>
<table cellspacing="0" class="widefat post">
    <tbody>
        <tr>
            <td colspan="2">
                <h3><?php echo esc_html__("Welcome note", ZEE_SPLASHHEADER_DOMAIN); ?></h3>
            </td>
        </tr>
        <tr style="font-weight: bold">
            <th style="" class="manage-column sub-titles" scope="col"><?php echo esc_html__("Note title", ZEE_SPLASHHEADER_DOMAIN); ?>: </th>
            <th style="" class="manage-column sub-titles" scope="col"><?php echo esc_html__("Note message", ZEE_SPLASHHEADER_DOMAIN); ?>: </th>
            <th style="" class="manage-column" scope="col"></th>
        </tr>
        <tr>
            <td style="" class="manage-column" scope="col"><input type="text" id="sh_title" name="sh_title" value="<?php echo esc_html(get_option('sh_title')); ?>" size="30"></td>
            <td style="" class="manage-column" scope="col"><textarea type="text" id="sh_message" name="sh_message" cols="50" rows="10"><?php echo esc_html(get_option('sh_message')); ?></textarea></td>
            <td style="" class="manage-column" scope="col"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><input type="button" class="button-primary reset-btn" onClick="resetWelcomeForm()" value="<?php echo esc_html__("Reset form", ZEE_SPLASHHEADER_DOMAIN); ?>"></td>
        </tr>
    </tbody>
</table>

<h3><?php echo esc_html__("Links settings", ZEE_SPLASHHEADER_DOMAIN); ?></h3>

<?php
if (get_option('sh_show_links_1') == 1) {

    $checked_1 = 'checked';
} else {

    $checked_1 = '';
}
?>

<div id="tabs-links-setting">
    <div class="wrap">
        <table cellspacing="0" class="widefat post fixed">
            <tr>
                <td colspan="4">
                    <p class="description">
                        *<?php
                            printf(
                                __('To use the Font Awesome for icons links please refer to the <a target="_blank" href="%s">documentation</a> v5.15.1 Ex:fa-camera-retro', ZEE_SPLASHHEADER_DOMAIN),
                                'http://fontawesome.io/icons/'
                            );
                            ?>
                    </p>
                    <p class="description">*<?php echo esc_html__('Link of the selected post or page dropdown will be inserted into Link Url field', ZEE_SPLASHHEADER_DOMAIN); ?>.</p>
                </td>
            </tr>
        </table>
        <div class="tab">
            <span class="tablinks" onclick="openTabs(event, 'tabs-links-1')"><?php echo esc_html__('First links cols', ZEE_SPLASHHEADER_DOMAIN); ?></span>
            <span class="tablinks" onclick="openTabs(event, 'tabs-links-2')"><?php echo esc_html__('Second links cols', ZEE_SPLASHHEADER_DOMAIN); ?></span>
        </div>
        <div id="tabs-links-1" class="tabcontent">
            <h3><?php echo esc_html('First links cols', ZEE_SPLASHHEADER_DOMAIN); ?></h3>
            <p>
            <table cellspacing="0" class="widefat post">
                <tr>
                    <td colspan="2" class="display-links"><input type="checkbox" name="sh_show_links_1" value="1" <?php echo esc_html($checked_1); ?>><?php echo esc_html__("Display first links cols", ZEE_SPLASHHEADER_DOMAIN); ?></td>
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
                                        <td class="label-link-title"><?php echo esc_html__('Link', ZEE_SPLASHHEADER_DOMAIN) . ' ' . $i; ?></td>
                                        <td><input type="checkbox" id="sh_link_open_<?php echo esc_html($i); ?>" name="sh_link_open_<?php echo esc_html($i); ?>" value="1" <?php echo esc_html($checked_open); ?>><?php echo esc_html__("Open in a new tab", ZEE_SPLASHHEADER_DOMAIN); ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><input class="sh_link_title" placeholder="<?php echo esc_html__("Link title", ZEE_SPLASHHEADER_DOMAIN) . ' ' . $i; ?>" type="text" id="sh_link_title_<?php echo esc_html($i); ?>" name="sh_link_title_<?php echo esc_html($i); ?>" value="<?php echo get_option('sh_link_title_' . $i); ?>" size="30"></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><input class="sh_link_url" placeholder="<?php echo esc_html__("Link url", ZEE_SPLASHHEADER_DOMAIN) . ' ' . $i; ?>" type="text" id="sh_link_url_<?php echo esc_html($i); ?>" name="sh_link_url_<?php echo esc_html($i); ?>" value="<?php echo get_option('sh_link_url_' . $i); ?>" size="30"></td>
                                        <td><?php echo zee_splash_header_recentposts_dropdown($i); ?> <?php echo esc_html('-'); ?> <?php echo zee_splash_header_recentpages_dropdown($i); ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><input placeholder="<?php echo esc_html__("Ex : fa-camera-retro fa-lg", ZEE_SPLASHHEADER_DOMAIN); ?>" type="text" id="sh_font_icons_<?php echo esc_html($i); ?>" name="sh_font_icon_<?php echo esc_html($i); ?>" value="<?php echo get_option('sh_font_icon_' . $i); ?>" size="30"></td>
                                        <td>
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                <?php } ?>

                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="button" class="button-primary reset-btn" onClick="resetLinkForm(1, 3, 6)" value="<?php echo esc_html__("Reset first form", ZEE_SPLASHHEADER_DOMAIN); ?>"></td>

                </tr>

            </table>

            </p>

        </div>

        <div id="tabs-links-2" class="tabcontent tabcontenthidden">

            <p>

            <h3><?php echo esc_html__('Second links cols', ZEE_SPLASHHEADER_DOMAIN); ?></h3>

            <table cellspacing="0" class="widefat post">

                <?php
                if (get_option('sh_show_links_2') == 1) {

                    $checked_2 = 'checked';
                } else {

                    $checked_2 = '';
                }
                ?>

                <tr>

                    <td colspan="2" class="display-links"><input type="checkbox" name="sh_show_links_2" value="1" <?php echo esc_html__($checked_2); ?>><?php echo esc_html("Display second links cols", ZEE_SPLASHHEADER_DOMAIN); ?></td>

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

                                        <td class="label-link-title"><?php echo esc_html__('Link') . ' ' . $i; ?></td>

                                        <td><input type="checkbox" id="sh_link_open_<?php echo esc_html($i); ?>" name="sh_link_open_<?php echo esc_html($i); ?>" value="1" <?php echo esc_html($checked_open); ?>><?php echo esc_html__("Open in a new tab", ZEE_SPLASHHEADER_DOMAIN); ?></td>

                                        <td></td>

                                    </tr>

                                    <tr>

                                        <td><input placeholder="<?php echo esc_html__("Link title", ZEE_SPLASHHEADER_DOMAIN) . ' ' . $i; ?>" type="text" id="sh_link_title_<?php echo esc_html($i); ?>" name="sh_link_title_<?php echo esc_html($i); ?>" value="<?php echo get_option('sh_link_title_' . $i); ?>" size="30"></td>

                                        <td></td>

                                        <td></td>

                                    </tr>

                                    <tr>

                                        <td><input class="sh_link_url" placeholder="<?php echo esc_html__("Link url", ZEE_SPLASHHEADER_DOMAIN) . ' ' . $i; ?>" type="text" id="sh_link_url_<?php echo esc_html($i); ?>" name="sh_link_url_<?php echo esc_html($i); ?>" value="<?php echo get_option('sh_link_url_' . $i); ?>" size="30"></td>

                                        <td><?php echo zee_splash_header_recentposts_dropdown($i); ?> <?php echo esc_html('-'); ?> <?php echo zee_splash_header_recentpages_dropdown($i); ?></td>

                                        <td></td>

                                    </tr>

                                    <tr>

                                        <td><input placeholder="<?php echo esc_html__("Ex : fa-camera-retro fa-lg", ZEE_SPLASHHEADER_DOMAIN); ?>" type="text" id="sh_font_icons_<?php echo esc_html($i); ?>" name="sh_font_icon_<?php echo esc_html($i); ?>" value="<?php echo get_option('sh_font_icon_' . $i); ?>" size="30"></td>

                                        <td></td>

                                        <td></td>

                                    </tr>

                                </tbody>

                            </table>

                        </td>

                    </tr>



                <?php } ?>

                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="button" class="button-primary reset-btn" onClick="resetLinkForm(4, 6, 6)" value="<?php echo esc_html__("Reset second form", ZEE_SPLASHHEADER_DOMAIN); ?>"></td>

                </tr>

            </table>

            </p>

        </div>

        <br />

    </div>

</div>

<h3><?php esc_html("Custom shortcode", ZEE_SPLASHHEADER_DOMAIN); ?></h3>

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

            <td colspan="2" class="display-links"><input type="checkbox" name="sh_show_custom_code" value="1" <?php echo esc_html($checked_custom_code); ?>><?php echo esc_html__("Display custom code", ZEE_SPLASHHEADER_DOMAIN); ?></td>



        </tr>

        <tr>

            <td style="" class="manage-column" scope="col"><textarea type="text" id="sh_code_message" name="sh_code_message" cols="100" rows="7"><?php echo get_option('sh_code_message', ZEE_SPLASHHEADER_DOMAIN); ?></textarea></td>

            <td style="" class="manage-column" scope="col"></td>

            <td style="" class="manage-column" scope="col"></td>

        </tr>

        <tr>

            <td colspan="6">

                <p class="description"><?php esc_html__("Add custom shortcode for any form or html code", ZEE_SPLASHHEADER_DOMAIN); ?>.</p>

                <p class="description reset-wrapper"><input type="button" class="button-primary reset-btn" onClick="resetCodeForm()" value="<?php echo esc_html__("Reset form", ZEE_SPLASHHEADER_DOMAIN); ?>"></p>

            </td>

        </tr>

    </tbody>

</table>