(function ($) {

    // Add Color Picker to all inputs that have 'color-field' class
    $(function () {
        $('.sh-color-field').wpColorPicker();
        var icon_index = 0;
        // change drop down slection 
        var i = 0;
        for (i = 1; i <= 6; i++) {
            (function (i) {
                $("#sh_link_font_size_" + i).change(function () {
                    var val = this.value;

                    $('#sh_hd_link_font_size_' + i).val(val);
                });

                $('#sh_link_thumb_img_btn_' + i).click(function () {
                    //   formfield = jQuery('#sh_link_icon_src').attr('name');
                    tb_show('', 'media-upload.php?type=image&TB_iframe=true');
                    console.log('tb_show ' + i);
                    icon_index = i;
                    return false;
                });

                window.send_to_editor = function (html) {
                    imgurl = $('img', html).attr('src');
                    console.log('send_to_editor ' + icon_index);

                    $('#sh_link_thumb_img_' + icon_index).val(imgurl);
                    $('#sh_thumb_icon_' + icon_index + ' img').attr("src", imgurl);
                    tb_remove();
                }

                $("#sh_recentpost_" + i).change(function () {
                    $('#sh_link_url_' + i).val(this.value);
                    $('#sh_link_url_' + i).addClass('highlight');
					
                    setTimeout(function () {
                        $('.splashheader #tabs-links-setting input.sh_link_url').removeClass('highlight');
                    }, 2000)
                });
                $("#sh_recentpages_" + i).change(function () { 
                    $('#sh_link_url_' + i).val(this.value);
                     $('#sh_link_url_' + i).addClass('highlight');
                    setTimeout(function () {
                        $('.splashheader #tabs-links-setting input.sh_link_url').removeClass('highlight');
                    }, 2000)
                });
			

            })(i);


        }
		$("#sh_date_font_size").change(function () {
            var val = this.value;
            $('#sh_hd_date_font_size').val(val);
        });
        $("#sh_title_font_size").change(function () {
            var val = this.value;
            $('#sh_hd_title_font_size').val(val);
        });
        $("#sh_message_font_size").change(function () {
            var val = this.value;
            $('#sh_hd_message_font_size').val(val);
        });
        $("#sh_border_width").change(function () {
            var val = this.value;
            $('#sh_hd_border_width').val(val);
        });
        $("#sh_border_style").change(function () {
            var val = this.value;
            $('#sh_hd_border_style').val(val);
        });
    });




})(jQuery);


function openTabs(tabId) {
    var i;
    var x = document.getElementsByClassName("splash-header-tabs");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none"; 
    }
    document.getElementById(tabId).style.display = "block"; 
}



(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
        return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=1411005919195083";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));