/** Wonderplugin Video Embed
 * Copyright 2018 Magic Hills Pty Ltd All Rights Reserved
 * Website: http://www.wonderplugin.com
 * Version 1.4 
 */
(function($){$(document).ready(function(){$(document).on("click",".wpve-tab-label",function(){var parent_con=$(this).closest(".wpve-tab-container");parent_con.find(".wpve-tab-label").removeClass("wpve-tab-label-selected");$(this).addClass("wpve-tab-label-selected");parent_con.find(".wpve-tab-content").removeClass("wpve-tab-content-selected");parent_con.find("."+$(this).data("contentclass")).addClass("wpve-tab-content-selected");window.wpve_activetab=$(this).data("contentclass")});$(document).on("widget-updated",
function(){if(window.wpve_activetab){$(".wpve-tab-label").removeClass("wpve-tab-label-selected");$(".wpve-tab-content").removeClass("wpve-tab-content-selected");$(".wpve-tab-label").each(function(){if(window.wpve_activetab==$(this).data("contentclass")){$(this).addClass("wpve-tab-label-selected");$("."+$(this).data("contentclass")).addClass("wpve-tab-content-selected")}})}});$(document).on("click",".wpve-videotype-input",function(){if($(this).closest(".wpve-mce-dialog").length>0)return;var parent_con=
$(this).closest(".wpve-tab-container");if($(this).attr("checked")&&$(this).attr("value")=="mp4"){parent_con.find(".wpve-video-iframe-container").hide();parent_con.find(".wpve-video-mp4-container").show()}else{parent_con.find(".wpve-video-iframe-container").show();parent_con.find(".wpve-video-mp4-container").hide()}});$(document).on("click",".wpve-select-file",function(){var parent_con=$(this).closest(".wpve-tab-container");var text_field=parent_con.find("."+$(this).data("textfield"));var text_type=
$(this).data("texttype");var media_uploader=wp.media({title:"Select an "+(text_type=="video"?"Video":"Image"),multiple:false,library:{type:text_type},button:{text:"Insert into widget"}});media_uploader.on("select",function(){var attachment=media_uploader.state().get("selection").first().toJSON();text_field.val(attachment.url)});media_uploader.open();return false});$(document).on("change",".wpve-select-playbutton-preloaded",function(){var parent_con=$(this).closest(".wpve-tab-container");parent_con.find(".wpve-playbutton-url").val($(this).val())})})})(jQuery);
