<?php
class frontPageImageList extends Controller_Front
{
    protected function run($aArgs)
    {

        require_once('builder/builderInterface.php');
        usbuilder()->init($this, $aArgs);
		
        $this->importJS('jquery.fancybox');
        $this->importJS('fancybox_front');
        
        $this->importCSS('jquery.fancybox');
        $this->importCSS('default');
       
        $aContentsList = common()->modelContents()->getImages();
        $aCount['total'] = common()->modelContents()->getResultCount(array());
        
		$this->assign("aImages", $aContentsList);
		$this->assign("test", $aCount['total']);
		
    }
}
