<?php
class adminExecContentSave extends Controller_AdminExec
{
	
	protected function run($aArgs)
	{
		
		require_once('builder/builderInterface.php');
		usbuilder()->init($this, $aArgs);
			
		$aData['imagetitle'] = $aArgs['imagetitle'];
		$aData['imagecaption'] = $aArgs['imagecaption'];
		$aData['imageurl'] = $aArgs['imageurl'];
		$aData['imagewidth'] = $aArgs['imagewidth'];
		$aData['imageheight'] = $aArgs['imageheight'];
		$aData['date_created'] = time();
		
		$check = common()->modelContents()->insertContents($aData);
	
		if ($bResult !== false) {
			usbuilder()->message('Saved succesfully', 'success');
		} else {
			usbuilder()->message('Save failed', 'warning');
		}
	
				
		$sUrl = usbuilder()->getUrl('adminPageSetup');
		usbuilder()->jsMove($sUrl);
		
	}
}