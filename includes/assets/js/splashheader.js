function openTabs(e,t){var n,l,o;for(l=document.getElementsByClassName("tabcontent"),n=0;n<l.length;n++)l[n].style.display="none";for(o=document.getElementsByClassName("tablinks"),n=0;n<o.length;n++)o[n].className=o[n].className.replace(" active","");return document.getElementById(t).style.display="block",e.currentTarget.className+=" active",!1}function resetWelcomeForm(){document.getElementById("sh_title").value="",document.getElementById("sh_message").value=""}function resetLinkForm(e,t,n){for(i=e;i<=t;i++)document.getElementById("sh_link_title_"+i).value="",document.getElementById("sh_link_url_"+i).value="",document.getElementById("sh_font_icons_"+i).value="",document.getElementById("sh_link_open_"+i).checked=!1,document.getElementById("sh_recentpost_"+i).value="",document.getElementById("sh_recentpages_"+i).value=""}function resetDesignForm(e,t,n){for(var l=["wrapper_sh_bg_color_picker","wrapper_sh_border_color_picker","wrapper_sh_title_color_picker","wrapper_sh_message_color_picker"],o=["#fafad2","#1e73be","#000000","#000000"],_=0;_<l.length;_++){var s=document.getElementById(l[_]);s.value=o[_],s.style.backgroundColor=o[_]}document.getElementById("sh_title_color").value="#000000",document.getElementById("sh_bg_color").value="#fafad2",document.getElementById("sh_border_color").value="#1e73be",document.getElementById("sh_message_color").value="#000000",document.getElementById("sh_border_style").value="solid",document.getElementById("sh_border_width").value=1,document.getElementById("sh_title_font_size").value=20,document.getElementById("sh_title_font_weight").value="normal",document.getElementById("sh_title_font_style").value="normal",document.getElementById("sh_title_text_align").value="left",document.getElementById("sh_title_font_decoration").value="none",document.getElementById("sh_message_text_align").value="left",document.getElementById("sh_message_font_weight").value="normal",document.getElementById("sh_message_font_style").value="normal",document.getElementById("sh_message_font_decoration").value="none",document.getElementById("sh_message_font_size").value=14;for(var i=e;t>=i;i++)document.getElementById("sh_link_wrapper_title_color_picker_"+i).style.backgroundColor="#000000",document.getElementById("sh_link_title_color_"+i).value="#000000",document.getElementById("sh_link_text_align_"+i).value="left",document.getElementById("sh_link_font_weight_"+i).value="normal",document.getElementById("sh_link_font_style_"+i).value="normal",document.getElementById("sh_link_font_decoration_"+i).value="none",document.getElementById("sh_link_font_size_"+i).value=14}function resetAdvancedOptionForm(){document.getElementById("sh_width").value="85";for(var e=1;4>=e;e++)document.getElementById("sh_col_width_"+e).value=""}function resetAdvancedClockForm(){document.getElementById("sh_date_format").value="",document.getElementById("sh_date_font_size").value=14,document.getElementById("sh_date_position").value="left",document.getElementById("sh_date_font_weight").value="normal",document.getElementById("sh_date_font_style").value="normal",document.getElementById("sh_date_font_decoration").value="none",document.getElementById("sh_date_font_color").value="#000000",document.getElementById("wrapper_sh_date_font_color_picker").style.backgroundColor="#000000",document.getElementById("sh_time_format").value="",document.getElementById("sh_time_font_size").value=14,document.getElementById("sh_time_position").value="left",document.getElementById("sh_time_font_weight").value="normal",document.getElementById("sh_time_font_style").value="normal",document.getElementById("sh_time_font_decoration").value="none",document.getElementById("sh_time_font_color").value="#000000",document.getElementById("wrapper_sh_time_font_color_picker").style.backgroundColor="#000000"}function resetCodeForm(){document.getElementById("sh_code_message").value=""}function resetAllForms(){resetWelcomeForm(),resetLinkForm(1,6,6),resetCodeForm()}!function(e){e(function(){e(".sh-color-field").wpColorPicker();var t=0,n=0;for(n=1;6>=n;n++)!function(n){e("#sh_link_thumb_img_btn_"+n).click(function(){return tb_show("","media-upload.php?type=image&TB_iframe=true"),console.log("tb_show "+n),t=n,!1}),window.send_to_editor=function(n){imgurl=e("img",n).attr("src"),console.log("send_to_editor "+t),e("#sh_link_thumb_img_"+t).val(imgurl),e("#sh_thumb_icon_"+t+" img").attr("src",imgurl),tb_remove()},e("#sh_recentpost_"+n).change(function(){e("#sh_link_url_"+n).val(this.value);var t="";0!=this.selectedIndex&&(t=this.options[this.selectedIndex].text),e("#sh_link_title_"+n).val(t),e("#sh_link_url_"+n).addClass("highlight"),e("#sh_link_title_"+n).addClass("highlight"),setTimeout(function(){e(".splashheader #tabs-links-setting input.sh_link_url").removeClass("highlight"),e(".splashheader #tabs-links-setting input.sh_link_title").removeClass("highlight")},2e3)}),e("#sh_recentpages_"+n).change(function(){e("#sh_link_url_"+n).val(this.value);var t="";0!=this.selectedIndex&&(t=this.options[this.selectedIndex].text),e("#sh_link_title_"+n).val(t),e("#sh_link_url_"+n).addClass("highlight"),e("#sh_link_title_"+n).addClass("highlight"),setTimeout(function(){e(".splashheader #tabs-links-setting input.sh_link_url").removeClass("highlight"),e(".splashheader #tabs-links-setting input.sh_link_title").removeClass("highlight")},2e3)})}(n);for(var l=["sh_bg_color_picker","sh_border_color_picker","sh_title_color_picker","sh_message_color_picker","sh_date_font_color_picker","sh_time_font_color_picker"],o=0;o<l.length;o++)e("#"+l[o]+" .wp-color-result").attr("id","wrapper_"+l[o]);for(var _=1;6>=_;_++)e("#sh_link_wrapper_title_color_"+_+" .wp-color-result").attr("id","sh_link_wrapper_title_color_picker_"+_)})}(jQuery),function(e,t,n){var l,o=e.getElementsByTagName(t)[0];e.getElementById(n)||((l=e.createElement(t)).id=n,l.src="//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=1411005919195083",o.parentNode.insertBefore(l,o))}(document,"script","facebook-jssdk");