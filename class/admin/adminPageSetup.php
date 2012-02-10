<?php

class adminPageSetup extends Controller_Admin
{
	protected function run($args)
	{
		require_once('builder/builderInterface.php');
        $sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
        $this->writeJs($sInitScript);
        
        $sFormScript = usbuilder()->getFormAction('faqpia_add','adminExecContentSave');
        $this->writeJs($sFormScript);
        
        usbuilder()->validator(array('form' => 'faqpia_add'));
        
        $this->importCSS('fancybox_admin');
        $this->importJS('fancybox_admin');
        
        $this->view(__CLASS__);
	}
}