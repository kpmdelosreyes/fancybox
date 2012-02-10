<?php
class apiContentsAddImage extends Controller_Api
{
	
	protected function post($aArgs)
	{
		require_once('builder/builderInterface.php');
		usbuilder()->init($this->Request->getAppID(), $aArgs);
		
		
		$aData['imagetitle'] = $aArgs['imagetitle'];
		$aData['imagecaption'] = $aArgs['imagecaption'];
		$aData['imageurl'] = $aArgs['imageurl'];
		$aData['imagewidth'] = $aArgs['imagewidth'];
		$aData['imageheight'] = $aArgs['imageheight'];
		$aData['date_created'] = time();
		
		$oModelContents = new modelFancybox();
		$bResult = $oModelContents->insertContents($aData);

	}
}