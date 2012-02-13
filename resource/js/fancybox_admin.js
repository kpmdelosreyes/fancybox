$(document).ready(function(){
	$('.msg_warn_box').hide();
	
	
	
	/*$('.modifyThis').live("click", function(){
		$("#fancybox_addimage_popup_contents").fancybox({'scrolling' : 'no', 'titleShow' : 'false'});
		popup.load('fancybox_modifyimage_popup_contents').skin('admin').layer({'title' : 'Modify Image','width' : 650});
	});*/
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
	
	
	modifyThis : function(key)
	{

	 	popup.load('fancybox_modifyimage_popup_contents').skin('admin').layer({'title' : 'Modify Image','width' : 650});
	 	$("#hidden_id").val($("#hidden_id_"+key).val());
	 	
	 	$("#realimage").html('<img src="'+$("#hidden_url_"+key).val()+'" alt="Image" style="width: 146px; height:150px"/>');
	 	$("#imageURL").html("Image URL: " + $("#hidden_url_"+key).val());
		$("#imagetitle").val($("#hidden_title_"+key).val());
		$("#imagecaption").val($("#hidden_caption_"+key).val());
		$("#upload_date").html("Upload Date : " + $("#hidden_date_"+key).val());
		$("#size").html("Size : " + $("#hidden_date_"+key).val());
		$("#dimension").html("Dimension : "+ $("#hidden_size_"+key).val());
	},
	
	modify : function()
	{

		$.ajax({
			type: "POST",
			url: usbuilder.getUrl("apiContentsModify"),
			data : {idx : $("#hidden_id").val()}
		}).done(function( result ) {  
            oValidator.generalPurpose.getMessage(true, "Modified is successful"); 
            window.location.href = usbuilder.getUrl("adminPageSetup");
        });
		popup.close('fancybox_modifyimage_popup_contents');
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
		var image_width = parseInt($("#hidden_width_"+key).val());
		var image_height = parseInt($("#hidden_height_"+key).val());
	
		
		$.fancybox([{
			maxWidth	: 800,
			maxHeight	: 600,
			fitToView	: false,
			width		: image_width+'%',
			height		: image_height+'%',
			autoSize	: false,
					showCloseButton : true,
					showNavArrows : true,
					href : image_url,
					transitionIn : 'elastic',
					transitionOut : 'elastic',
		        	title : image_title,
		        	
		        	type : 'image'
		        	
		          }]);
		
		
				
	}
	
	

	
}