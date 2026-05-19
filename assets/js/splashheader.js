function openTabs(event, tabId) {
    var tabContents = document.getElementsByClassName("tabcontent");
    var tabLinks = document.getElementsByClassName("tablinks");
    var target = document.getElementById(tabId);
    var index;

    if (!target) {
        return false;
    }

    for (index = 0; index < tabContents.length; index++) {
        tabContents[index].style.display = "none";
    }

    for (index = 0; index < tabLinks.length; index++) {
        tabLinks[index].className = tabLinks[index].className.replace(" active", "");
    }

    target.style.display = "block";
    event.currentTarget.className += " active";

    return false;
}

function resetWelcomeForm() {
    document.getElementById("sh_title").value = "";
    document.getElementById("sh_message").value = "";
}

function resetLinkForm(start, end) {
    var index;

    for (index = start; index <= end; index++) {
        document.getElementById("sh_link_title_" + index).value = "";
        document.getElementById("sh_link_url_" + index).value = "";
        document.getElementById("sh_font_icons_" + index).value = "";
        document.getElementById("sh_link_open_" + index).checked = false;
        document.getElementById("sh_recentpost_" + index).value = "";
        document.getElementById("sh_recentpages_" + index).value = "";
    }
}

function resetDesignForm(start, end) {
    var pickerIds = [
        "wrapper_sh_bg_color_picker",
        "wrapper_sh_border_color_picker",
        "wrapper_sh_title_color_picker",
        "wrapper_sh_message_color_picker"
    ];
    var pickerDefaults = ["#fafad2", "#1e73be", "#000000", "#000000"];
    var index;

    for (index = 0; index < pickerIds.length; index++) {
        if (document.getElementById(pickerIds[index])) {
            document.getElementById(pickerIds[index]).style.backgroundColor = pickerDefaults[index];
        }
    }

    document.getElementById("sh_title_color").value = "#000000";
    document.getElementById("sh_bg_color").value = "#fafad2";
    document.getElementById("sh_border_color").value = "#1e73be";
    document.getElementById("sh_message_color").value = "#000000";
    document.getElementById("sh_border_style").value = "solid";
    document.getElementById("sh_border_width").value = 1;
    document.getElementById("sh_title_font_size").value = 20;
    document.getElementById("sh_title_font_weight").value = "normal";
    document.getElementById("sh_title_font_style").value = "normal";
    document.getElementById("sh_title_text_align").value = "left";
    document.getElementById("sh_title_font_decoration").value = "none";
    document.getElementById("sh_message_text_align").value = "left";
    document.getElementById("sh_message_font_weight").value = "normal";
    document.getElementById("sh_message_font_style").value = "normal";
    document.getElementById("sh_message_font_decoration").value = "none";
    document.getElementById("sh_message_font_size").value = 14;

    for (index = start; index <= end; index++) {
        if (document.getElementById("sh_link_wrapper_title_color_picker_" + index)) {
            document.getElementById("sh_link_wrapper_title_color_picker_" + index).style.backgroundColor = "#000000";
        }

        document.getElementById("sh_link_title_color_" + index).value = "#000000";
        document.getElementById("sh_link_text_align_" + index).value = "left";
        document.getElementById("sh_link_font_weight_" + index).value = "normal";
        document.getElementById("sh_link_font_style_" + index).value = "normal";
        document.getElementById("sh_link_font_decoration_" + index).value = "none";
        document.getElementById("sh_link_font_size_" + index).value = 14;
    }
}

function resetAdvancedOptionForm() {
    var index;

    document.getElementById("sh_width").value = "85";

    for (index = 1; index <= 4; index++) {
        document.getElementById("sh_col_width_" + index).value = "";
    }
}

function resetAdvancedClockForm() {
    document.getElementById("sh_date_format").value = "";
    document.getElementById("sh_date_font_size").value = 14;
    document.getElementById("sh_date_position").value = "left";
    document.getElementById("sh_date_font_weight").value = "normal";
    document.getElementById("sh_date_font_style").value = "normal";
    document.getElementById("sh_date_font_decoration").value = "none";
    document.getElementById("sh_date_font_color").value = "#000000";
    document.getElementById("sh_time_format").value = "";
    document.getElementById("sh_time_font_size").value = 14;
    document.getElementById("sh_time_position").value = "left";
    document.getElementById("sh_time_font_weight").value = "normal";
    document.getElementById("sh_time_font_style").value = "normal";
    document.getElementById("sh_time_font_decoration").value = "none";
    document.getElementById("sh_time_font_color").value = "#000000";

    if (document.getElementById("wrapper_sh_date_font_color_picker")) {
        document.getElementById("wrapper_sh_date_font_color_picker").style.backgroundColor = "#000000";
    }

    if (document.getElementById("wrapper_sh_time_font_color_picker")) {
        document.getElementById("wrapper_sh_time_font_color_picker").style.backgroundColor = "#000000";
    }
}

function resetCodeForm() {
    document.getElementById("sh_code_message").value = "";
}

function resetAllForms() {
    resetWelcomeForm();
    resetLinkForm(1, 6);
    resetCodeForm();
}

function activateFirstTab() {
    var tabGroups = document.querySelectorAll(".tab");
    var index;

    for (index = 0; index < tabGroups.length; index++) {
        var firstButton = tabGroups[index].querySelector(".tablinks");

        if (firstButton && firstButton.className.indexOf("active") === -1) {
            firstButton.click();
        }
    }
}

(function ($) {
    $(function () {
        var linkIndex;
        var mediaIndex = 0;
        var colorPickerTargets = [
            "sh_bg_color_picker",
            "sh_border_color_picker",
            "sh_title_color_picker",
            "sh_message_color_picker",
            "sh_date_font_color_picker",
            "sh_time_font_color_picker"
        ];

        $(".sh-color-field").wpColorPicker();
        activateFirstTab();

        for (linkIndex = 1; linkIndex <= 6; linkIndex++) {
            (function (currentIndex) {
                $("#sh_link_thumb_img_btn_" + currentIndex).click(function () {
                    tb_show("", "media-upload.php?type=image&TB_iframe=true");
                    mediaIndex = currentIndex;
                    return false;
                });

                $("#sh_recentpost_" + currentIndex).change(function () {
                    var label = this.selectedIndex !== 0 ? this.options[this.selectedIndex].text : "";

                    $("#sh_link_url_" + currentIndex).val(this.value);
                    $("#sh_link_title_" + currentIndex).val(label);
                    $("#sh_link_url_" + currentIndex).addClass("highlight");
                    $("#sh_link_title_" + currentIndex).addClass("highlight");

                    setTimeout(function () {
                        $(".splashheader #tabs-links-setting input.sh_link_url").removeClass("highlight");
                        $(".splashheader #tabs-links-setting input.sh_link_title").removeClass("highlight");
                    }, 2000);
                });

                $("#sh_recentpages_" + currentIndex).change(function () {
                    var label = this.selectedIndex !== 0 ? this.options[this.selectedIndex].text : "";

                    $("#sh_link_url_" + currentIndex).val(this.value);
                    $("#sh_link_title_" + currentIndex).val(label);
                    $("#sh_link_url_" + currentIndex).addClass("highlight");
                    $("#sh_link_title_" + currentIndex).addClass("highlight");

                    setTimeout(function () {
                        $(".splashheader #tabs-links-setting input.sh_link_url").removeClass("highlight");
                        $(".splashheader #tabs-links-setting input.sh_link_title").removeClass("highlight");
                    }, 2000);
                });
            }(linkIndex));
        }

        window.send_to_editor = function (html) {
            var imageUrl = $("img", html).attr("src");

            $("#sh_link_thumb_img_" + mediaIndex).val(imageUrl);
            $("#sh_thumb_icon_" + mediaIndex + " img").attr("src", imageUrl);
            tb_remove();
        };

        for (linkIndex = 0; linkIndex < colorPickerTargets.length; linkIndex++) {
            $("#" + colorPickerTargets[linkIndex] + " .wp-color-result").attr("id", "wrapper_" + colorPickerTargets[linkIndex]);
        }

        for (linkIndex = 1; linkIndex <= 6; linkIndex++) {
            $("#sh_link_wrapper_title_color_" + linkIndex + " .wp-color-result").attr("id", "sh_link_wrapper_title_color_picker_" + linkIndex);
        }
    });
}(jQuery));

(function (document, tagName, scriptId) {
    var script;
    var firstScript = document.getElementsByTagName(tagName)[0];

    if (document.getElementById(scriptId)) {
        return;
    }

    script = document.createElement(tagName);
    script.id = scriptId;
    script.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=1411005919195083";
    firstScript.parentNode.insertBefore(script, firstScript);
}(document, "script", "facebook-jssdk"));
