<?php
class frontPageFancyboxImg extends Controller_Front
{
    protected function run($aArgs)
    {

        require_once('builder/builderInterface.php');
        usbuilder()->init($this, $aArgs);
		
        $iRows = 9;
        $iPage = $aArgs['page'] ? $aArgs['page'] : 1;
        $aOption['limit'] = $iRows;
        $aOption['offset'] = $iRows * ($iPage - 1);
        
        $aContentsList = common()->modelContents()->getImages($aOption);
		
        $this->importJS('jquery.fancybox');
        $this->importJS('fancybox_front');
        
        $this->importCSS('jquery.fancybox');
        $this->importCSS('default');
        
        foreach ($aContentsList as $key => $val)
        {
        	
        	$aContentsList[$key]['title'] = ucwords($aContentsList[$key]['title']);
            $aContentsList[$key]['date_created'] = date('Y-m-d H:i:s', $val['date_created']);
        }

        $this->loopFetch($aContentsList);
        $iResultCount = count($aContentsList);
		//$iDisplay = $iResultCount / 9 ;
        
        if ($iResultCount == 0) $this->fetchClear();
    }
}
