<?php
class adminExecSaveSetup extends Controller_AdminExec
{
	
	protected function run($aArgs)
	{
		
		require_once('builder/builderInterface.php');
		$sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
		$this->writeJs($sInitScript);
		
		
		
		$aData['fancybox_imageurl'] = $aArgs['fancybox_imageurl'];
		$aData['fancybox_imagecaption'] = $aArgs['fancybox_imagecaption'];
		$aData['fancybox_imageurl'] = $aArgs['fancybox_imageurl'];
		$aData['fancybox_imagewidth'] = $aArgs['fancybox_imagewidth'];
		$aData['fancybox_imageheight'] = $aArgs['fancybox_imageheight'];
		$aData['date_created'] = time();
		
		$oModelContents = new modelFancybox();
		$check = $oModelContents->insertContents($aData);
	
		if ($bResult !== false) {
			usbuilder()->message('Saved succesfully', 'success');
		} else {
			usbuilder()->message('Save failed', 'warning');
		}
	
				
		$sUrl = usbuilder()->getUrl('adminPageSetup');
		$sJsMove = usbuilder()->jsMove($sUrl);
		$this->writeJS($sJsMove);
	}
}