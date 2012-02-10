<?php
class apiContentsDelete extends Controller_Api
{
	
	protected function post($aArgs)
	{
		require_once('builder/builderInterface.php');
	 	usbuilder()->init($this->Request->getAppID(), $aArgs);

		$oModelContents = new modelFancybox();
		$bResult = $oModelContents->deleteContents($aArgs[idx]);
		
	}
	
}