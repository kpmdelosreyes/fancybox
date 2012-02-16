<?php
class apiContentsDelete extends Controller_Api
{
	
	protected function post($aArgs)
	{
		require_once('builder/builderInterface.php');
	 	usbuilder()->init($this, $aArgs);

		$bResult = common()->modelContents()->deleteContents($aArgs[idx]);
		
	}
	
}