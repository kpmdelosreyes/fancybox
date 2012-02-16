$(document).ready(function(){
	//$(".fancybox-thumb").click(function(){
	$("a:has(img)").fancybox(
	
		'<h2>Hi!</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis mi eu elit tempor facilisis id et neque</p>',
		{
			'autoDimensions'	: false,
			'width'         	: 350,
			'height'        	: 'auto',
			'transitionIn'		: 'elastic',
			'transitionOut'		: 'elastic'
		}
	);
		
	//});
	
	frontPageFancybox.displayImg();

});


var frontPageFancybox = {
		
	displayImg : function()
	{
		
		var countDisplay = parseInt($("#display_img").val());
		
		var iDisplay = Math.ceil(countDisplay / 9);
		
		/*if(countDisplay > 9)
			{
			alert("next");
			}*/
	},
	
	
}