<?php
class frontPageImageList extends Controller_Front
{
    protected function run($aArgs)
    {

        require_once('builder/builderInterface.php');
        usbuilder()->init($this, $aArgs);
		
        $this->importJS('jquery.fancybox');
        //$this->importJS('fancybox_front');
        
        $this->importCSS('jquery.fancybox');
        $this->importCSS('default');
       
        $aContentsList = common()->modelContents()->getImages($aArgs);
        $aCount['total'] = common()->modelContents()->getResultCount(array());
   
        
        $sHtml .= '<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script> 
        <script type="text/javascript" src="/_sdk/js/fancybox/jquery.fancybox.js"></script> 
        <script type="text/javascript">
        					
					$(".fancybox-thumb").click(function(){
						
						
						$.fancybox([';
        foreach($aContentsList as $key => $value)
        {
        
        	$aImage .= "{ href : '" . $aContentsList[$key]['image_url'] . "', title : '" . $aContentsList[$key]['title'] . "' },";
        }
			$sHtml .= substr($aImage, 0, -1);			
							
		$sHtml .= '				],{
								\'padding\'			: 0,
								\'width\'         	: 400,
								\'height\'        	: 400,
								\'transitionIn\'		: \'elastic\',
								\'transitionOut\'		: \'elastic\',
								\'type\'				: \'image\',
								\'changeFade\'        : 0
							}
						);
						
					});
        	      </script>';
        
        
        
		$this->assign("pia", $sHtml);
		$this->assign("test", $aCount['total']);
		
    }
}
