$(document).ready(function(){
	
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
		//window.location.href = usbuilder.getUrl("adminPageAddImage");
		popup.load('fancybox_addimage_popup_contents').skin('admin').layer({'title' : 'Add Image','width' : 650});
	},
	
	addImage : function()
	{
		
	}
}