    <?php
                                                // @todo set as global array  
                                                $border_style_array = array(
                                                    'solid' => __('Solid', ZEE_SPLASHHEADER_DOMAIN),
                                                    'none' => __('None', ZEE_SPLASHHEADER_DOMAIN),
                                                    'dotted' => __('Dotted', ZEE_SPLASHHEADER_DOMAIN),
                                                    'dashed' => __('Dashed', ZEE_SPLASHHEADER_DOMAIN),
                                                    'double' => __('Double', ZEE_SPLASHHEADER_DOMAIN),
                                                    'groove' => __('Groove', ZEE_SPLASHHEADER_DOMAIN),
                                                    'inset' => __('Inset', ZEE_SPLASHHEADER_DOMAIN),
                                                    'outset' => __('Outset', ZEE_SPLASHHEADER_DOMAIN),
                                                );

                                                $text_align_array = array(
                                                    'left' => __('Left'),
                                                    'center' => __('Center'),
                                                    'right' => __('Right'),
                                                    'justify' => __('Justify'),
                                                );
                                                $font_weight_array = array(
                                                    'normal' => __('Normal', ZEE_SPLASHHEADER_DOMAIN),
                                                    'bold' => __('Bold'),
                                                    'bolder' => __('Bolder', ZEE_SPLASHHEADER_DOMAIN),
                                                    'lighter' => __('Lighter', ZEE_SPLASHHEADER_DOMAIN),
                                                    '100' => __('100', ZEE_SPLASHHEADER_DOMAIN),
                                                    '200' => __('200', ZEE_SPLASHHEADER_DOMAIN),
                                                    '300' => __('300', ZEE_SPLASHHEADER_DOMAIN),
                                                    '400' => __('400', ZEE_SPLASHHEADER_DOMAIN),
                                                    '500' => __('500', ZEE_SPLASHHEADER_DOMAIN),
                                                    '600' => __('600', ZEE_SPLASHHEADER_DOMAIN),
                                                    '700' => __('700', ZEE_SPLASHHEADER_DOMAIN),
                                                    '800' => __('800', ZEE_SPLASHHEADER_DOMAIN),
                                                    '900' => __('900', ZEE_SPLASHHEADER_DOMAIN),
                                                );
                                                $font_style_array = array(
                                                    'normal' => __('Normal', ZEE_SPLASHHEADER_DOMAIN),
                                                    'italic' => __('Italic', ZEE_SPLASHHEADER_DOMAIN),
                                                    'oblique' => __('Oblique', ZEE_SPLASHHEADER_DOMAIN),
                                                );

                                                $font_decoration_array = array(
                                                    'none' => __('None', ZEE_SPLASHHEADER_DOMAIN),
                                                    'overline' => __('Overline', ZEE_SPLASHHEADER_DOMAIN),
                                                    'line-through' => __('Strikethrough', ZEE_SPLASHHEADER_DOMAIN),
                                                    'underline' => __('Underline', ZEE_SPLASHHEADER_DOMAIN),
                                                    'underline overline' => __('Underline Overline', ZEE_SPLASHHEADER_DOMAIN),
                                                );
                                                ?>

                                                <input type="hidden" name="action" value="update" />

                                                <input type="hidden" name="page_options" value="<?php echo esc_html($splashheader_design_data); ?>"  />



                                                <h3 class="handle"><?php echo esc_html__("Design", ZEE_SPLASHHEADER_DOMAIN); ?></h3>

                                                <table cellspacing="0" class="widefat post">



                                                    <tr>

                                                        <td style="" class="manage-column" scope="col" ><?php echo esc_html__("Splash header background color", ZEE_SPLASHHEADER_DOMAIN); ?></td>

                                                        <td style="" class="manage-column" scope="col" id="sh_bg_color_picker">
                                                            <input  type="text" class="sh-color-field" id="sh_bg_color" name="sh_bg_color" value="<?php echo get_option('sh_bg_color'); ?>">
                                                        </td>



                                                    </tr>

                                                    <tr>

                                                        <td style="" class="manage-column" scope="col"><?php echo esc_html__("Splash header border style", ZEE_SPLASHHEADER_DOMAIN); ?></td>

                                                        <td style="" class="manage-column" scope="col">

                                                            <select id="sh_border_style" name="sh_border_style"  >

                                                                <?php
                                                                foreach ($border_style_array as $k => $v) {

                                                                    $selected = '';

                                                                    if ($k == get_option('sh_border_style')) {

                                                                        $selected = 'selected';
                                                                    }
                                                                    ?>
                                                                    <option value="<?php echo esc_html($k) ?>" ' . <?php echo esc_html($selected) ?> . '><?php echo esc_html($v) ?> </option>
                                                                    <?php
                                                                }
                                                                ?>

                                                            </select>

                                                        </td>



                                                    </tr>

                                                    <tr>

                                                        <td style="" class="manage-column" scope="col"><?php echo esc_html__("Splash header border color and width in pixel", ZEE_SPLASHHEADER_DOMAIN); ?></td>

                                                        <td style="" class="manage-column" scope="col" id="sh_border_color_picker">

                                                            <input  type="text" class="sh-color-field" id="sh_border_color" name="sh_border_color" value="<?php echo esc_html(get_option('sh_border_color')); ?>">

                                                        </td>

                                                        <td style="" class="manage-column" scope="col">



                                                            <select id="sh_border_width" name="sh_border_width" >

                                                                <?php
                                                                for ($j = 0; $j <= 11; $j++) {

                                                                    $selected = '';



                                                                    if ($j == get_option('sh_border_width')) {

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
                                                        <td></td>
                                                        <td></td>
                                                        <td class="col-header"><?php echo esc_html__("Size", ZEE_SPLASHHEADER_DOMAIN); ?></td>
                                                        <td class="col-header"><?php echo esc_html__("Align", ZEE_SPLASHHEADER_DOMAIN); ?></td>
                                                        <td class="col-header"><?php echo esc_html__("Weight", ZEE_SPLASHHEADER_DOMAIN); ?></td>
                                                        <td class="col-header"><?php echo esc_html__("Style", ZEE_SPLASHHEADER_DOMAIN); ?></td>
                                                        <td class="col-header"><?php echo esc_html__("Decoration", ZEE_SPLASHHEADER_DOMAIN); ?></td>
                                                    </tr>
                                                    <tr>

                                                        <td style="" class="manage-column" scope="col"><?php echo esc_html__("Title", ZEE_SPLASHHEADER_DOMAIN); ?></td>

                                                        <td style="" class="manage-column" scope="col" id="sh_title_color_picker">
                                                            <input  type="text" class="sh-color-field" id="sh_title_color"  name="sh_title_color" value="<?php echo esc_html(get_option('sh_title_color')); ?>"></td>

                                                        <td style="" class="manage-column" scope="col">

                                                            <select id="sh_title_font_size" name="sh_title_font_size"  >

                                                                <?php
                                                                for ($j = 11; $j <= ZEE_SPLASHHEADER_FONT_SIZE; $j++) {

                                                                    $selected = '';


                                                                    if ($j == get_option('sh_title_font_size')) {

                                                                        $selected = 'selected';
                                                                    }
                                                                    ?>
                                                                    <option value="<?php echo esc_html($j) ?>" ' . <?php echo esc_html($selected) ?> . '><?php echo esc_html($j) ?> </option>
                                                                    <?php
                                                                }
                                                                ?>

                                                            </select>


                                                        </td>

                                                        <td style="" class="manage-column" scope="col">

                                                            <select id="sh_title_text_align" name="sh_title_text_align" >

                                                                <?php
                                                                foreach ($text_align_array as $k => $v) {

                                                                    $selected = '';

                                                                    if ($k == get_option('sh_title_text_align')) {

                                                                        $selected = 'selected';
                                                                    }
                                                                    ?>
                                                                    <option value="<?php echo esc_html($k) ?>" ' . <?php echo esc_html($selected) ?> . '><?php echo esc_html($v) ?> </option>
                                                                    <?php
                                                                }
                                                                ?>

                                                            </select>

                                                        </td>


                                                        <td style="" class="manage-column" scope="col">

                                                            <select id="sh_title_font_weight" name="sh_title_font_weight" >

                                                                <?php
                                                                foreach ($font_weight_array as $k => $v) {

                                                                    $selected = '';

                                                                    if ($k == get_option('sh_title_font_weight')) {

                                                                        $selected = 'selected';
                                                                    }
                                                                    ?>
                                                                    <option value="<?php echo esc_html($k) ?>" ' . <?php echo esc_html($selected) ?> . '><?php echo esc_html($v) ?> </option>
                                                                    <?php
                                                                }
                                                                ?>

                                                            </select>




                                                        </td>
                                                        <td style="" class="manage-column" scope="col">

                                                            <select id="sh_title_font_style" name="sh_title_font_style" >

                                                                <?php
                                                                foreach ($font_style_array as $k => $v) {

                                                                    $selected = '';

                                                                    if ($k == get_option('sh_title_font_style')) {

                                                                        $selected = 'selected';
                                                                    }
                                                                    ?>
                                                                    <option value="<?php echo esc_html($k) ?>" ' . <?php echo esc_html($selected) ?> . '><?php echo esc_html($v) ?> </option>
                                                                    <?php
                                                                }
                                                                ?>

                                                            </select>




                                                        </td>
                                                        <td style="" class="manage-column" scope="col">

                                                            <select id="sh_title_font_decoration" name="sh_title_font_decoration" >

                                                                <?php
                                                                foreach ($font_decoration_array as $k => $v) {

                                                                    $selected = '';

                                                                    if ($k == get_option('sh_title_font_decoration')) {

                                                                        $selected = 'selected';
                                                                    }
                                                                    ?>
                                                                    <option value="<?php echo esc_html($k) ?>" ' . <?php echo esc_html($selected) ?> . '><?php echo esc_html($v) ?> </option>
                                                                    <?php
                                                                }
                                                                ?>

                                                            </select>




                                                        </td>
                                                    </tr>

                                                    <tr>

                                                        <td style="" class="manage-column" scope="col"><?php echo esc_html__("Message", ZEE_SPLASHHEADER_DOMAIN); ?></td>

                                                        <td style="" class="manage-column" scope="col" id="sh_message_color_picker"><input  type="text" class="sh-color-field" id="sh_message_color" name="sh_message_color" value="<?php echo esc_html(get_option('sh_message_color')); ?>"></td>

                                                        <td style="" class="manage-column" scope="col">

                                                            <select id="sh_message_font_size" name="sh_message_font_size" >

                                                                <?php
                                                                for ($j = 11; $j <= ZEE_SPLASHHEADER_FONT_SIZE; $j++) {

                                                                    $selected = '';



                                                                    if ($j == get_option('sh_message_font_size')) {

                                                                        $selected = 'selected';
                                                                    }
                                                                    ?>
                                                                    <option value="<?php echo esc_html($j) ?>" ' . <?php echo esc_html($selected) ?> . '><?php echo esc_html($j) ?> </option>
                                                                    <?php
                                                                }
                                                                ?>

                                                            </select>


                                                        </td>

                                                        <td style="" class="manage-column" scope="col">

                                                            <select id="sh_message_text_align" name="sh_message_text_align" >

                                                                <?php
                                                                foreach ($text_align_array as $k => $v) {

                                                                    $selected = '';

                                                                    if ($k == get_option('sh_message_text_align')) {

                                                                        $selected = 'selected';
                                                                    }
                                                                    ?>
                                                                    <option value="<?php echo esc_html($k) ?>" ' . <?php echo esc_html($selected) ?> . '><?php echo esc_html($v) ?> </option>
                                                                    <?php
                                                                }
                                                                ?>

                                                            </select>

                                                        </td>


                                                        <td style="" class="manage-column" scope="col">

                                                            <select id="sh_message_font_weight" name="sh_message_font_weight" >

                                                                <?php
                                                                foreach ($font_weight_array as $k => $v) {

                                                                    $selected = '';

                                                                    if ($k == get_option('sh_message_font_weight')) {

                                                                        $selected = 'selected';
                                                                    }
                                                                    ?>
                                                                    <option value="<?php echo esc_html($k) ?>" ' . <?php echo esc_html($selected) ?> . '><?php echo esc_html($v) ?> </option>
                                                                    <?php
                                                                }
                                                                ?>

                                                            </select>

                                                        </td>
                                                        <td style="" class="manage-column" scope="col">

                                                            <select id="sh_message_font_style" name="sh_message_font_style" >

                                                                <?php
                                                                foreach ($font_style_array as $k => $v) {

                                                                    $selected = '';

                                                                    if ($k == get_option('sh_message_font_style')) {

                                                                        $selected = 'selected';
                                                                    }
                                                                    ?>
                                                                    <option value="<?php echo esc_html($k) ?>" ' . <?php echo esc_html($selected) ?> . '><?php echo esc_html($v) ?> </option>
                                                                    <?php
                                                                }
                                                                ?>

                                                            </select>

                                                        </td>
                                                        <td style="" class="manage-column" scope="col">

                                                            <select id="sh_message_font_decoration" name="sh_message_font_decoration" >

                                                                <?php
                                                                foreach ($font_decoration_array as $k => $v) {

                                                                    $selected = '';

                                                                    if ($k == get_option('sh_message_font_decoration')) {

                                                                        $selected = 'selected';
                                                                    }
                                                                    ?>
                                                                    <option value="<?php echo esc_html($k) ?>" ' . <?php echo esc_html($selected) ?> . '><?php echo esc_html($v) ?> </option>
                                                                    <?php
                                                                }
                                                                ?>

                                                            </select>


                                                        </td>
                                                    </tr>

                                                    <?php
                                                    for ($i = 1; $i <= 6; $i++) {
                                                        ?>

                                                        <tr>

                                                            <td style="" class="manage-column" scope="col"><?php echo esc_html__("Link title", ZEE_SPLASHHEADER_DOMAIN) . ' ' . $i; ?></td>

                                                            <td style="" class="manage-column" scope="col" id="sh_link_wrapper_title_color_<?php echo esc_html($i); ?>">
                                                                <input  type="text" class="sh-color-field" id="sh_link_title_color_<?php echo esc_html($i); ?>" name="sh_link_title_color_<?php echo esc_html($i); ?>" value="<?php echo esc_html(get_option('sh_link_title_color_' . $i)); ?>">
                                                            </td>

                                                            <td style="" class="manage-column" scope="col">

                                                                <select id="sh_link_font_size_<?php echo esc_html($i); ?>" name="sh_link_font_size_<?php echo esc_html($i); ?>" >

                                                                    <?php
                                                                    for ($j = 11; $j <= ZEE_SPLASHHEADER_FONT_SIZE; $j++) {

                                                                        $selected = '';

                                                                        if ($j == 11) {

                                                                            //   $j=esc_html("Font size" );
                                                                        }

                                                                        if ($j == get_option('sh_link_font_size_' . $i)) {

                                                                            $selected = 'selected';
                                                                        }
                                                                        ?>
                                                                        <option value="<?php echo esc_html($j) ?>" ' . <?php echo esc_html($selected) ?> . '><?php echo esc_html($j) ?> </option>
                                                                        <?php
                                                                    }
                                                                    ?>

                                                                </select>

                                                            </td>

                                                            <td style="" class="manage-column" scope="col">

                                                                <select id="sh_link_text_align_<?php echo esc_html($i); ?>" name="sh_link_text_align_<?php echo esc_html($i); ?>" >

                                                                    <?php
                                                                    foreach ($text_align_array as $k => $v) {

                                                                        $selected = '';

                                                                        if ($k == get_option('sh_link_text_align_' . $i)) {

                                                                            $selected = 'selected';
                                                                        }
                                                                        ?>
                                                                        <option value="<?php echo esc_html($k) ?>" ' . <?php echo esc_html($selected) ?> . '><?php echo esc_html($v) ?> </option>
                                                                        <?php
                                                                    }
                                                                    ?>

                                                                </select>

                                                            </td>

                                                            <td style="" class="manage-column" scope="col">

                                                                <select id="sh_link_font_weight_<?php echo esc_html($i); ?>" name="sh_link_font_weight_<?php echo esc_html($i); ?>" >

                                                                    <?php
                                                                    foreach ($font_weight_array as $k => $v) {

                                                                        $selected = '';


                                                                        if ($k == get_option('sh_link_font_weight_' . $i)) {

                                                                            $selected = 'selected';
                                                                        }
                                                                        ?>
                                                                        <option value="<?php echo esc_html($k) ?>" ' . <?php echo esc_html($selected) ?> . '><?php echo esc_html($v) ?> </option>
                                                                        <?php
                                                                    }
                                                                    ?>

                                                                </select>



                                                            </td>
                                                            <td style="" class="manage-column" scope="col">

                                                                <select id="sh_link_font_style_<?php echo esc_html($i); ?>" name="sh_link_font_style_<?php echo esc_html($i); ?>" >

                                                                    <?php
                                                                    foreach ($font_style_array as $k => $v) {

                                                                        $selected = '';


                                                                        if ($k == get_option('sh_link_font_style_' . $i)) {

                                                                            $selected = 'selected';
                                                                        }
                                                                        ?>
                                                                        <option value="<?php echo esc_html($k) ?>" ' . <?php echo esc_html($selected) ?> . '><?php echo esc_html($v) ?> </option>
                                                                        <?php
                                                                    }
                                                                    ?>

                                                                </select>

                                                            </td>
                                                            <td style="" class="manage-column" scope="col">

                                                                <select id="sh_link_font_decoration_<?php echo esc_html($i); ?>" name="sh_link_font_decoration_<?php echo esc_html($i); ?>" >

                                                                    <?php
                                                                    foreach ($font_decoration_array as $k => $v) {

                                                                        $selected = '';


                                                                        if ($k == get_option('sh_link_font_decoration_' . $i)) {

                                                                            $selected = 'selected';
                                                                        }
                                                                        ?>
                                                                        <option value="<?php echo esc_html($k) ?>" ' . <?php echo esc_html($selected) ?> . '><?php echo esc_html($v) ?> </option>
                                                                        <?php
                                                                    }
                                                                    ?>

                                                                </select>
                                                            </td>
                                                        </tr>



                                                    <?php } ?>



                                                </table>
