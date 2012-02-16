<?php
class apiContentsGetData extends Controller_Api
{
	
	protected function post($aArgs)
	{
		require_once('builder/builderInterface.php');
		usbuilder()->init($this, $aArgs);
		
		$bResult = common()->modelContents()->getData($aArgs[idx]);
		
		return $bResult();
	}
}