$(document).ready(function(){

	$("a[rel='gallery']").fancybox({
		
		showCloseButton : false,
		padding			: 0,
		width        	: 250,
		height         	: 250,
		transitionIn	: "elastic",
		transitionOut	: "elastic",
		cyclic  		: true,
		type			: "image",
		changeFade      : 0,
		easingIn		: "swing",
		easingOut		: "swing",
			
		helpers         : {
						     title : {
						    			type : "inside"
						    		 }
						    			
						  },
        afterLoad    	: function() {
										this.title = '<div id="tip7-title"><span><a href="#" onclick="$.fancybox.close();"><img src="/_sdk/img/fancybox/closelabel.gif" /></a></span>' + (this.title && this.title.length ? '<b>' + this.title + '</b>' : '') + 'Image ' + (this.index + 1) + ' of ' + this.group.length + '</div>' ;
										
								     }
	
	});
	
	

});

