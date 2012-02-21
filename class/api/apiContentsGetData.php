<?php
class apiContentsGetData extends Controller_Api
{
	
	protected function post($aArgs)
	{
		require_once('builder/builderInterface.php');
		usbuilder()->init($this, $aArgs);
		
		$bResult = common()->modelContents()->getData($aArgs['idx']);
		 
		$sDateTimeFormat = 'm/d/Y';
		$bResult['date_created'] = date($sDateTimeFormat, $bResult['date_created']);

				
		return $bResult;
	}
}