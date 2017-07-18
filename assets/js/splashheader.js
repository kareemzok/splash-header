function openTabs(e) {
    var t, _ = document.getElementsByClassName("splash-header-tabs");
    for (t = 0; t < _.length; t++)
        _[t].style.display = "none";
    document.getElementById(e).style.display = "block"
}

function resetWelcomeForm() {
    document.getElementById("sh_title").value = "", document.getElementById("sh_message").value = ""
}

function resetLinkForm(e, t, _) {
    for (i = e; i <= t; i++)
        document.getElementById("sh_link_title_" + i).value = "", document.getElementById("sh_link_url_" + i).value = "", document.getElementById("sh_font_icon_" + i).value = ""
}

function resetDesignForm(e, t, _) {
    for (var n = ["wrapper_sh_bg_color_picker", "wrapper_sh_border_color_picker", "wrapper_sh_title_color_picker", "wrapper_sh_message_color_picker"], o = ["#FAFAD2", "#1e73be", "#000000", "#000000"], l = 0; l < n.length; l++) {
        var s = document.getElementById(n[l]);
        s.value = o[l], s.style.backgroundColor = o[l]
    }
    document.getElementById("sh_border_style").value = "solid", document.getElementById("sh_hd_border_style").value = "solid", document.getElementById("sh_border_width").value = 2, document.getElementById("sh_hd_border_width").value = 2, document.getElementById("sh_title_font_size").value = 11, document.getElementById("sh_hd_title_font_size").value = 11, document.getElementById("sh_message_font_size").value = 11, document.getElementById("sh_hd_message_font_size").value = 11;
    for (var r = e; r <= t; r++)
        document.getElementById("sh_link_wrapper_title_color_picker_" + r).style.backgroundColor = "#000000", document.getElementById("sh_link_title_color_" + r).value = "#000000", document.getElementById("sh_link_font_size_" + r).value = 11, document.getElementById("sh_hd_link_font_size_" + r).value = 11
}

function resetAdvancedOptionForm() {
    document.getElementById("sh_width").value = "85"
	for (var w = 1; w <= 4; w++){
		document.getElementById("sh_col_width_"+w).value = '';
	}
}

function resetAdvancedClockForm() {
    document.getElementById("sh_date_format").value = 11, document.getElementById("sh_date_font_size").value = 11, document.getElementById("sh_hd_date_font_size").value = 11, document.getElementById("sh_date_position").value = "left", document.getElementById("sh_date_font_color").value = "#ffffff", document.getElementById("wrapper_sh_date_font_color_picker").style.backgroundColor = "#ffffff"
}

function resetCodeForm() {
    document.getElementById("sh_code_message").value = ""
}

function resetAllForms() {
    resetWelcomeForm(), resetLinkForm(1, 6, 6), resetCodeForm()
}
!function (e) {
    e(function () {
        e(".sh-color-field").wpColorPicker();
        var t = 0,
                _ = 0;
        for (_ = 1; _ <= 6; _++)
            !function (_) {
                e("#sh_link_font_size_" + _).change(function () {
                    var t = this.value;
                    e("#sh_hd_link_font_size_" + _).val(t)
                }), e("#sh_link_thumb_img_btn_" + _).click(function () {
                    return tb_show("", "media-upload.php?type=image&TB_iframe=true"), console.log("tb_show " + _), t = _, !1
                }), window.send_to_editor = function (_) {
                    imgurl = e("img", _).attr("src"), console.log("send_to_editor " + t), e("#sh_link_thumb_img_" + t).val(imgurl), e("#sh_thumb_icon_" + t + " img").attr("src", imgurl), tb_remove()
                }, e("#sh_recentpost_" + _).change(function () {
                    e("#sh_link_url_" + _).val(this.value), e("#sh_link_url_" + _).addClass("highlight"), setTimeout(function () {
                        e(".splashheader #tabs-links-setting input.sh_link_url").removeClass("highlight")
                    }, 2e3)
                }), e("#sh_recentpages_" + _).change(function () {
                    e("#sh_link_url_" + _).val(this.value), e("#sh_link_url_" + _).addClass("highlight"), setTimeout(function () {
                        e(".splashheader #tabs-links-setting input.sh_link_url").removeClass("highlight")
                    }, 2e3)
                })
            }(_);
        e("#sh_date_font_size").change(function () {
            var t = this.value;
            e("#sh_hd_date_font_size").val(t)
        }), e("#sh_title_font_size").change(function () {
            var t = this.value;
            e("#sh_hd_title_font_size").val(t)
        }), e("#sh_message_font_size").change(function () {
            var t = this.value;
            e("#sh_hd_message_font_size").val(t)
        }), e("#sh_border_width").change(function () {
            var t = this.value;
            e("#sh_hd_border_width").val(t)
        }), e("#sh_border_style").change(function () {
            var t = this.value;
            e("#sh_hd_border_style").val(t)
        });
        for (var n = ["sh_bg_color_picker", "sh_border_color_picker", "sh_title_color_picker", "sh_message_color_picker", "sh_date_font_color_picker"], o = 0; o < n.length; o++)
            e("#" + n[o] + " .wp-color-result").attr("id", "wrapper_" + n[o]);
        for (var l = 1; l <= 6; l++)
            e("#sh_link_wrapper_title_color_" + l + " .wp-color-result").attr("id", "sh_link_wrapper_title_color_picker_" + l)
    })
}(jQuery),
        function (e, t, _) {
            var n, o = e.getElementsByTagName(t)[0];
            e.getElementById(_) || ((n = e.createElement(t)).id = _, n.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=1411005919195083", o.parentNode.insertBefore(n, o))
        }(document, "script", "facebook-jssdk");