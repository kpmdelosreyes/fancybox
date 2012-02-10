$(document).ready(function(){
	$('.msg_warn_box').hide();

});


var adminPageSetup = {
		
	saveSetting : function()
	{
		if(oValidator.formName.getMessage('fancybox_save'))
        {
    		
            document.fancybox_save.submit();
        }
        else{
            oValidator.generalPurpose.getMessage(false, "Fill all fields");
        }
	}, 
	
	
	mostAction : function()
	{
		popup.load('fancybox_addimage_popup_contents').skin('admin').layer({'title' : 'Add Image','width' : 650});
		
	},
	
	addImage : function()
	{
			
		var imageurl = $("#fancybox_imageurl").val();
		var imagetitle = $("#fancybox_imagetitle").val();
		var imagecaption = $("#fancybox_imagecaption").val();
		var imagewidth = $("#fancybox_imagewidth").val();
		var imageheight = $("#fancybox_imageheight").val();
	
			$.ajax({
				type: "POST",
				url: usbuilder.getUrl("apiContentsAddImage"),
				data : {
						imagetitle : imagetitle,
						imagecaption: imagecaption,
						imageurl : imageurl,
						imagewidth : imagewidth, 
						imageheight : imageheight
					   }
			}).done(function( result ) {
	            oValidator.generalPurpose.getMessage(true, "Saved successfully"); 
	            window.location.href = usbuilder.getUrl("adminPageSetup");
	        });
			popup.close('fancybox_addimage_popup_contents');
	},
	
	checkAll : function(selector)
    {
    	if ($(selector).is(":checked") === true){
			$.browser.msie ? $(".event_mouse_over input:checkbox").prop("checked", "checked") : $(".event_mouse_over input:checkbox").attr("checked", "checked");
		}
		else {
			$.browser.msie ? $(".event_mouse_over input:checkbox").removeProp("checked") : $(".event_mouse_over input:checkbox").removeAttr("checked");
		}
    },
    
    deletePopup : function()
    {
    	
    	var fields = $(".input_chk").serializeArray();
		var idx = "";
		$.each(fields,function(i,field){
			idx += field.value + ",";
		});
		
        if(idx == "")
		{
			oValidator.generalPurpose.getMessage(false, "No item(s) selected.");
		}
	 	else{
	 		popup.load('fancybox_delete_popup_contents').skin('admin').layer({'title' : 'Delete','width' : 300});
	 	}
    	
    },
    
    
    deleteCheckedvalues : function()
	{
		popup.close('fancybox_delete_popup_contents');
		
		var fields = $(".input_chk").serializeArray();
		var idx = "";
		$.each(fields,function(i,field){
			idx += field.value + ",";
		});

			$.ajax({
				type: "POST",
				url: usbuilder.getUrl("apiContentsDelete"),
				data : {idx : idx}
			}).done(function( result ) {  
	            oValidator.generalPurpose.getMessage(true, "Deleted successfully"); 
	            window.location.href = usbuilder.getUrl("adminPageSetup");
	        });
		

	},
	
	fancyImage : function(key)
	{
		var image_url = $("#hidden_url_"+key).val();
		var image_title = $("#hidden_title_"+key).val();
		var image_width = $("#hidden_width_"+key).val();
		var image_height = $("#hidden_height_"+key).val();
	
		$.fancybox([
		        	{href : image_url, title : image_title, width : image_width, height : image_height}
		        
		        ]);
		
	}
}