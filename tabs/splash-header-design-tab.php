    <?php
                                                // @todo set as global array  
                                                $border_style_array = array(
                                                    'solid' => __('Solid', 'splash-header'),
                                                    'none' => __('None', 'splash-header'),
                                                    'dotted' => __('Dotted', 'splash-header'),
                                                    'dashed' => __('Dashed', 'splash-header'),
                                                    'double' => __('Double', 'splash-header'),
                                                    'groove' => __('Groove', 'splash-header'),
                                                    'inset' => __('Inset', 'splash-header'),
                                                    'outset' => __('Outset', 'splash-header'),
                                                );

                                                $text_align_array = array(
                                                    'left' => __('Left'),
                                                    'center' => __('Center'),
                                                    'right' => __('Right'),
                                                    'justify' => __('Justify'),
                                                );
                                                $font_weight_array = array(
                                                    'normal' => __('Normal', 'splash-header'),
                                                    'bold' => __('Bold'),
                                                    'bolder' => __('Bolder', 'splash-header'),
                                                    'lighter' => __('Lighter', 'splash-header'),
                                                    '100' => __('100'),
                                                    '200' => __('200'),
                                                    '300' => __('300'),
                                                    '400' => __('400'),
                                                    '500' => __('500'),
                                                    '600' => __('600'),
                                                    '700' => __('700'),
                                                    '800' => __('800'),
                                                    '900' => __('900'),
                                                );
                                                $font_style_array = array(
                                                    'normal' => __('Normal', 'splash-header'),
                                                    'italic' => __('Italic'),
                                                    'oblique' => __('Oblique', 'splash-header'),
                                                );

                                                $font_decoration_array = array(
                                                    'none' => __('None'),
                                                    'overline' => __('Overline', 'splash-header'),
                                                    'line-through' => __('Strikethrough'),
                                                    'underline' => __('Underline'),
                                                    'underline overline' => __('Underline Overline', 'splash-header'),
                                                );
                                                ?>

                                                <input type="hidden" name="action" value="update" />

                                                <input type="hidden" name="page_options" value="<?php echo esc_html($splashheader_design_data); ?>"  />



                                                <h3 class="handle"><?php echo esc_html("Design", 'splash-header'); ?></h3>

                                                <table cellspacing="0" class="widefat post">



                                                    <tr>

                                                        <td style="" class="manage-column" scope="col" ><?php echo esc_html("Splash header background color", 'splash-header'); ?></td>

                                                        <td style="" class="manage-column" scope="col" id="sh_bg_color_picker">
                                                            <input  type="text" class="sh-color-field" id="sh_bg_color" name="sh_bg_color" value="<?php echo get_option('sh_bg_color'); ?>">
                                                        </td>



                                                    </tr>

                                                    <tr>

                                                        <td style="" class="manage-column" scope="col"><?php echo esc_html("Splash header border style", 'splash-header'); ?></td>

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

                                                        <td style="" class="manage-column" scope="col"><?php echo esc_html("Splash header border color and width in pixel", 'splash-header'); ?></td>

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
                                                        <td class="col-header"><?php echo esc_html("Size", 'splash-header'); ?></td>
                                                        <td class="col-header"><?php echo esc_html("Align", 'splash-header'); ?></td>
                                                        <td class="col-header"><?php echo esc_html("Weight", 'splash-header'); ?></td>
                                                        <td class="col-header"><?php echo esc_html("Style", 'splash-header'); ?></td>
                                                        <td class="col-header"><?php echo esc_html("Decoration", 'splash-header'); ?></td>
                                                    </tr>
                                                    <tr>

                                                        <td style="" class="manage-column" scope="col"><?php echo esc_html("Title", 'splash-header'); ?></td>

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

                                                        <td style="" class="manage-column" scope="col"><?php echo esc_html("Message", 'splash-header'); ?></td>

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

                                                            <td style="" class="manage-column" scope="col"><?php echo esc_html("Link title", 'splash-header') . ' ' . $i; ?></td>

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
