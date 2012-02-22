<?php
class frontPagePagination extends Controller_Front
{
	protected function run($aArgs)
	{
		require_once 'builder/builderInterface.php';
		usbuilder()->init($this, $aArgs);
	
		$iRows = 9;
		$iPage = $aArgs['page'] ? $aArgs['page'] : 1;
		$aOption['limit'] = $iRows;
		$aOption['offset'] = $iRows * ($iPage - 1);
	
		$aList = common()->modelContents()->getImages($aOption);
		$iResultCount = common()->modelContents()->getResultCount($aOption);
		
 		$uri = preg_replace('/.page=+.[^\?&]*/','',$_SERVER["REQUEST_URI"]);
        $connector = strpos($_SERVER["SERVER_NAME"].$uri, '?') !== false ? '&' : '?';
        $href = $uri.$connector."page="; 
        
        $prev = $iPage - 1;
        $next = $iPage + 1;
        
		$sTotal = ceil($iResultCount / $iRows);
		$sPagination = array();
		if($iPage > 1)
            $sPagination[] = array('sPageUrl' => $href.$prev, 'sPage' => 'prev', 'sPageClass' => 'prev', 'sImagebtn' => '/_sdk/img/fancybox/prev.png');
		if($iPage < $sTotal)
            $sPagination[] = array('sPageUrl' => $href.$next, 'sPage' => 'next', 'sPageClass' => 'next', 'sImagebtn' => '/_sdk/img/fancybox/next.png');
		
	
		if($aList)
		{
			$this->loopFetch($sPagination);
		}
		else
		{
			$this->fetchClear();
			
		}
		
	
	}
	
}