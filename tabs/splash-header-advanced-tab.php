
<input type="hidden" name="action" value="update" />

<input type="hidden" name="page_options" value="<?php echo esc_html($splashheader_advanced_settings); ?>"  />

<h3 class="handle"><?php echo esc_html__("Advanced options", ZEE_SPLASHHEADER_DOMAIN); ?> </h3>

<table cellspacing="0" class="widefat post">

    <tbody> 

        <tr> 

            <th style="" class="manage-column" scope="col"><?php echo esc_html__("Container Width", ZEE_SPLASHHEADER_DOMAIN); ?>: </th> 

            <td><input type="text" id="sh_width"  name="sh_width" value="<?php echo esc_html(get_option('sh_width')); ?>" size="10">%                                                     

            </td>

        </tr>

        <tr>

            <td> 

                <p class="description"><?php echo esc_html__("Default value ( field empty ) is 85%", ZEE_SPLASHHEADER_DOMAIN); ?>.</p>                                                             

            </td>

        </tr>

        <?php
        $arr_text = array('First Col Width', 'Second Col Width', 'Third Col Width', 'Fourth Col Width');

        for ($i = 1; $i <= 4; $i++) {

            $j = $i - 1;
            ?>

            <tr> 

                <th style="" class="manage-column" scope="col"><?php echo esc_html__($arr_text[$j], ZEE_SPLASHHEADER_DOMAIN); ?>: </th>

                <td><input type="text" id="sh_col_width_<?php echo esc_html($i); ?>" name="sh_col_width_<?php echo esc_html($i); ?>" value="<?php echo esc_html(get_option('sh_col_width_' . $i)); ?>" size="10">%                                                     

                </td>

            </tr>

        <?php } ?>

        <tr>

            <td>

                <input type="button" class="button-primary reset-btn" onClick="resetAdvancedOptionForm()"  value="<?php echo esc_html__("Reset to default", ZEE_SPLASHHEADER_DOMAIN); ?>">



            </td>

        </tr>

    </tbody>

</table>

<h3 class="handle"><?php echo esc_html__("Clock Settings", ZEE_SPLASHHEADER_DOMAIN); ?> </h3>

<div id="tabs-clock-setting">

    <div class="tab">
        <span class="tablinks" onclick="openTabs(event, 'tabs-clock-1')"><?php echo esc_html__('Date settings', ZEE_SPLASHHEADER_DOMAIN); ?></span>
        <span class="tablinks" onclick="openTabs(event, 'tabs-clock-2')"><?php echo esc_html__('Time settings', ZEE_SPLASHHEADER_DOMAIN); ?></span>
    </div>

    <div id="tabs-clock-1" class="tabcontent">
        <h3><?php echo esc_html__('Date settings', ZEE_SPLASHHEADER_DOMAIN); ?></h3>

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

                    <td> <input type="checkbox" name="sh_show_clock_date" value="1" <?php echo esc_html($checked_show_date); ?>><?php echo esc_html__("Display clock date", ZEE_SPLASHHEADER_DOMAIN); ?><td>

                </tr>

                <tr > 

                    <th style="" class="manage-column" scope="col"><?php echo esc_html__("Date format", ZEE_SPLASHHEADER_DOMAIN); ?>: </th>

                    <td><?php
                        //if (splash_header_get_date_format(get_option('sh_date_format')) != '') {

                        echo zee_splash_header_get_date_format(get_option('sh_date_format'));

                        //} else {
                        //  echo esc_html("Please save your timezone settings", ZEE_SPLASHHEADER_DOMAIN);
                        //}
                        ?></td>

                    <td> </td>

                </tr>

                <tr > 

                    <th style="" class="manage-column" scope="col"><?php echo esc_html__("Date position", ZEE_SPLASHHEADER_DOMAIN); ?>: </th>

                    <td><?php
                        $date_pos = get_option('sh_date_position');

                        if (get_option('sh_date_position') == '') {

                            $date_pos = 'center';
                        }

                        echo zee_splash_header_get_date_position($date_pos);
                        ?> </td>

                    <td> </td>

                </tr>

                <tr>

                    <th style="" class="manage-column" scope="col"><?php echo esc_html__("Font size", ZEE_SPLASHHEADER_DOMAIN); ?>: </th>

                    <td>

                        <select id="sh_date_font_size" name="sh_date_font_size">

                            <?php
                            for ($j = 11; $j <= ZEE_SPLASHHEADER_FONT_SIZE; $j++) {

                                $selected = '';



                                if ($j == get_option('sh_date_font_size')) {

                                    $selected = 'selected';
                                }
                                ?>
                                <option value="<?php echo esc_html($j) ?>" ' . <?php echo esc_html($selected) ?> . '><?php echo esc_html($j) ?> </option>
                                <?php
                            }
                            ?>

                        </select>


                    </td>

                </tr>

                <tr>

                    <th style="" class="manage-column" scope="col"><?php echo esc_html__("Font color", ZEE_SPLASHHEADER_DOMAIN); ?>: </th>

                    <td style="" class="manage-column" scope="col" id="sh_date_font_color_picker"  ><input  type="text" class="sh-color-field" id="sh_date_font_color"  name="sh_date_font_color"  name="sh_date_font_color" value="<?php echo esc_html(get_option('sh_date_font_color')); ?>"></td>

                </tr>
                <tr > 

                    <th style="" class="manage-column" scope="col"><?php echo esc_html__("Font weight", ZEE_SPLASHHEADER_DOMAIN); ?>: </th>

                    <td><?php
                        $date_font_weight = get_option('sh_date_font_weight');

                        if (get_option('sh_date_font_weight') == '') {

                            $date_font_weight = 'normal';
                        }

                        echo zee_splash_header_get_date_font_weight($date_font_weight);
                        ?> </td>

                    <td> </td>

                </tr>
                <tr > 

                    <th style="" class="manage-column" scope="col"><?php echo esc_html__("Font style", ZEE_SPLASHHEADER_DOMAIN); ?>: </th>

                    <td><?php
                        $date_font_style = get_option('sh_date_font_style');

                        if (get_option('sh_date_font_style') == '') {

                            $date_font_style = 'normal';
                        }

                        echo zee_splash_header_get_date_font_style($date_font_style);
                        ?> </td>

                    <td> </td>

                </tr>
                <tr > 

                    <th style="" class="manage-column" scope="col"><?php echo esc_html__("Font decoration", ZEE_SPLASHHEADER_DOMAIN); ?>: </th>

                    <td><?php
                        $date_font_decoration = get_option('sh_date_font_decoration');

                        if (get_option('sh_date_font_decoration') == '') {

                            $date_font_decoration = 'none';
                        }

                        echo zee_splash_header_get_date_font_decoration($date_font_decoration);
                        ?> </td>

                    <td> </td>



                </tr>
                <tr>

                    <td> 

                        <p class="description"><?php echo esc_html__("Currently timezone is wordpress default value", ZEE_SPLASHHEADER_DOMAIN); ?><?php echo ': <span style="font-weight:bold">' . esc_html(get_option('timezone_string')); ?></span></p>                                                             

                        <p class="description"><?php echo esc_html__('Default value ( no selection) is default wordpress date format', ZEE_SPLASHHEADER_DOMAIN) . ': <span style="font-weight:bold">' . esc_html(get_option('date_format')); ?></span></p>                                                             

                        <p class="description"><?php echo esc_html__('For custom value please refer to wordpress custom format date', ZEE_SPLASHHEADER_DOMAIN); ?> <p>                                                             

                    </td>

                </tr>

                <tr>

                    <td>

                        <input type="button" class="button-primary reset-btn" onClick="resetAdvancedClockForm()"  value="<?php echo esc_html__("Reset to default", ZEE_SPLASHHEADER_DOMAIN); ?>">

                    </td>

                </tr>

            </tbody>

        </table>


        </p>

    </div>

    <div id="tabs-clock-2" class="tabcontent tabcontenthidden">
        <h3><?php echo esc_html__('Time settings', ZEE_SPLASHHEADER_DOMAIN); ?></h3>
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

                    <td> <input  type="checkbox" name="sh_show_clock_time" value="1" <?php echo esc_html($checked_show_time); ?>><?php echo esc_html__("Display clock time", ZEE_SPLASHHEADER_DOMAIN); ?><td>

                </tr>

                <tr > 

                    <th style="" class="manage-column" scope="col"><?php echo esc_html__("Time format", ZEE_SPLASHHEADER_DOMAIN); ?>: </th>

                    <td><?php
                        //if (splash_header_get_date_format(get_option('sh_date_format')) != '') {

                        echo zee_splash_header_get_time_format(get_option('sh_time_format'));

                        //} else {
                        //  echo esc_html("Please save your timezone settings", ZEE_SPLASHHEADER_DOMAIN);
                        //}
                        ?></td>

                    <td> </td>

                </tr>

                <tr > 

                    <th style="" class="manage-column" scope="col"><?php echo esc_html__("Time position", ZEE_SPLASHHEADER_DOMAIN); ?>: </th>

                    <td><?php
                        $date_pos = get_option('sh_time_position');

                        if (get_option('sh_time_position') == '') {

                            $date_pos = 'center';
                        }

                        echo zee_splash_header_get_time_position($date_pos);
                        ?> </td>

                    <td> </td>

                </tr>

                <tr>

                    <th style="" class="manage-column" scope="col"><?php echo esc_html__("Font size", ZEE_SPLASHHEADER_DOMAIN); ?>: </th>

                    <td>

                        <select id="sh_time_font_size"  name="sh_time_font_size">

                            <?php
                            for ($j = 11; $j <= ZEE_SPLASHHEADER_FONT_SIZE; $j++) {

                                $selected = '';



                                if ($j == get_option('sh_time_font_size')) {

                                    $selected = 'selected';
                                }
                                ?>
                                <option value="<?php echo esc_html($j) ?>" ' . <?php echo esc_html($selected) ?> . '><?php echo esc_html($j) ?> </option>
                                <?php
                            }
                            ?>

                        </select>


                    </td>

                </tr>

                <tr>

                    <th style="" class="manage-column" scope="col"><?php echo esc_html__("Font color", ZEE_SPLASHHEADER_DOMAIN); ?>: </th>

                    <td style="" class="manage-column" scope="col" id="sh_time_font_color_picker"  ><input  type="text" class="sh-color-field" id="sh_time_font_color"  name="sh_time_font_color"  name="sh_time_font_color" value="<?php echo esc_html(get_option('sh_time_font_color')); ?>"></td>

                </tr>
                <tr > 

                    <th style="" class="manage-column" scope="col"><?php echo esc_html__("Font weight", ZEE_SPLASHHEADER_DOMAIN); ?>: </th>

                    <td><?php
                        $time_font_weight = get_option('sh_time_font_weight');

                        if (get_option('sh_time_font_weight') == '') {

                            $time_font_weight = 'normal';
                        }

                        echo zee_splash_header_get_time_font_weight($time_font_weight);
                        ?> </td>

                    <td> </td>

                </tr>
                <tr > 

                    <th style="" class="manage-column" scope="col"><?php echo esc_html__("Font style", ZEE_SPLASHHEADER_DOMAIN); ?>: </th>

                    <td><?php
                        $time_font_style = get_option('sh_time_font_style');

                        if (get_option('sh_time_font_style') == '') {

                            $time_font_style = 'normal';
                        }

                        echo zee_splash_header_get_time_font_style($time_font_style);
                        ?> </td>

                    <td> </td>

                </tr>
                <tr > 

                    <th style="" class="manage-column" scope="col"><?php echo esc_html__("Font decoration", ZEE_SPLASHHEADER_DOMAIN); ?>: </th>

                    <td><?php
                        $time_font_decoration = get_option('sh_time_font_decoration');

                        if (get_option('sh_time_font_decoration') == '') {

                            $time_font_decoration = 'none';
                        }

                        echo zee_splash_header_get_time_font_decoration($time_font_decoration);
                        ?> </td>

                    <td> </td>

                </tr>
                <tr>

                    <td> 

                        <p class="description"><?php echo esc_html__("Currently timezone is wordpress default value", ZEE_SPLASHHEADER_DOMAIN); ?><?php echo ': <span style="font-weight:bold">' . esc_html(get_option('timezone_string')); ?></span></p>                                                             

                        <p class="description"><?php echo esc_html__('Default value ( no selection) is default wordpress time format', ZEE_SPLASHHEADER_DOMAIN) . ': <span style="font-weight:bold">' . esc_html(get_option('time_format')); ?></span></p>                                                             

                        <p class="description"><?php echo esc_html__('For custom value please refer to wordpress custom format date', ZEE_SPLASHHEADER_DOMAIN); ?> <p>                                                             

                    </td>

                </tr>

                <tr>

                    <td>

                        <input type="button" class="button-primary" onClick="resetAdvancedClockForm()"  value="<?php echo esc_html__("Reset to default", ZEE_SPLASHHEADER_DOMAIN); ?>">

                    </td>

                </tr>

                <tr > 

                    <th style="" class="manage-column" scope="col"> </th>

                </tr>

            </tbody>

        </table>

        </p>
    </div>

</div>
