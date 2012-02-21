<?php

class adminPageAddImage extends Controller_Admin
{
	protected function run($args)
	{
		require_once('builder/builderInterface.php');
        $sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
        $this->writeJs($sInitScript);
        
        $sFormScript = usbuilder()->getFormAction('fancybox_add','adminExecContentSave');
        $this->writeJs($sFormScript);
        
        usbuilder()->validator(array('form' => 'fancybox_add'));
        
        $this->importCSS('fancybox_admin');
        $this->importJS('fancybox_admin');
        
        $this->view(__CLASS__);
	}
}