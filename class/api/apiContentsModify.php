<?php
class apiContentsModify extends Controller_Api
{
	protected function post($aArgs)
	{
		require_once('builder/builderInterface.php');
		usbuilder()->init($this, $aArgs);
	
		
		$bResult = common()->modelContents()->updateContents($aArgs);
	
		if ($bResult !== false) {
			usbuilder()->message('Saved succesfully', 'success');
		} else {
			usbuilder()->message('Save failed', 'warning');
		}
	}
}