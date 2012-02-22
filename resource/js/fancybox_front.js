$(document).ready(function(){

	
	
	$("a[rel='gallery']").fancybox({

		
		'maxWidth'	      : 500,
		'maxHeight'	      : 'auto',
		'fitToView'       : false,
		'autoDimensions'  : true,
		'width'        	  : 500,
	    'height'          : 'auto',
		'transitionIn'	  : "elastic",
		'transitionOut'	  : "elastic",
		'easingIn'		  : "swing",
		'easingOut'		  : "swing",
		'type'			  : "image",
		'helpers'         : {
						     'title' : {
						    			'type' : "inside"
						    		 }
						    			
						  },
        'afterLoad'    	: function() {
										this.title = '<div id="tip7-title"><span><a href="#" onclick="$.fancybox.close();"><img src="/_sdk/img/fancybox/closelabel.gif" /></a></span>' + (this.title && this.title.length ? '<p><b>' + this.title + '</b></p>' : '') + 'Image ' + (this.index + 1) + ' of ' + this.group.length + '</div>' ;
										
								     }
	
	});
	
	

});

