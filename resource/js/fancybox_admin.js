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
        	sdk_message.show('Fill all fields', 'warning');
        }
	}, 
	
	
	mostAction : function()
	{
		sdk_popup.load('fancybox_addimage_popup_contents').skin('admin').layer({'title' : 'Add Image','width' : 650});
		
	},
	
	addImage : function()
	{
		
		var imageurl = $("#fancybox_imageurl").val();
		var imagetitle = $("#fancybox_imagetitle").val();
		var imagecaption = $("#fancybox_imagecaption").val();
		var imagewidth = $("#fancybox_imagewidth").val();
		var imageheight = $("#fancybox_imageheight").val();
		
		if(oValidator.formName.getMessage('fancybox_add'))
        {
            //document.fancybox_add.submit();
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
				sdk_message.show('Saved succesfully', 'success');
				sdk_popup.close('fancybox_addimage_popup_contents');
	            window.location.href = usbuilder.getUrl("adminPageSetup");
	        });
        }
        else{
        	sdk_message.show('Fill all fields', 'warning');
        	
        }
		//sdk_popup.close('fancybox_addimage_popup_contents');
	},
	
	
	modifyThis : function(key)
	{
		var ext = $("#hidden_url_"+key).val().split('.').pop().toLowerCase();
		var idx = $("#hidden_id").val($("#hidden_id_"+key).val());
		
		 $.ajax({
				type: "GET",
				url: usbuilder.getUrl("apiContentsGetData"),
				data : {idx : idx }
			}).done(function( result ) {
				alert(result);
	        });
	 		
		sdk_popup.load('fancybox_modifyimage_popup_contents').skin('admin').layer({'title' : 'Modify Image','width' : 650});
	},
	
	modify : function()
	{

		$.ajax({
			type: "POST",
			url: usbuilder.getUrl("apiContentsModify"),
			data : {idx : $("#hidden_id").val()}
		}).done(function( result ) { 
			sdk_message.show('Modified is successful', 'success');
            window.location.href = usbuilder.getUrl("adminPageSetup");
        });
		sdk_popup.close('fancybox_modifyimage_popup_contents');
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
        	sdk_message.show('No item(s) selected.', 'warning');
		}
	 	else{
	 		sdk_popup.load('fancybox_delete_popup_contents').skin('admin').layer({'title' : 'Delete','width' : 300});
	 	}
    	
    },
    
    
    deleteCheckedvalues : function()
	{
    	
		
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
				sdk_message.show('Deleted succesfully', 'success');
	            window.location.href = usbuilder.getUrl("adminPageSetup");
	        });
			sdk_popup.close('fancybox_delete_popup_contents');

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