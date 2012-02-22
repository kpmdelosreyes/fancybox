<?php
class frontPageImageList extends Controller_Front
{
    protected function run($aArgs)
    {

        require_once('builder/builderInterface.php');
        usbuilder()->init($this, $aArgs);
	      
        $aContentsList = common()->modelContents()->getImages($aArgs);
        $aCount['total'] = common()->modelContents()->getResultCount(array());
           
		$this->importJS('jquery.fancybox');
        $this->importJS('fancybox_front');
		$this->importCSS('jquery.fancybox');

		
		$this->assign("pia", $sHtml);
		$this->assign("test", $aCount['total']);
		
    }
}
