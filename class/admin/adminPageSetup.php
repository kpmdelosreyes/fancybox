<?php

class adminPageSetup extends Controller_Admin
{
	protected function run($aArgs)
	{
		require_once('builder/builderInterface.php');
		$sInitScript = usbuilder()->init($this->Request->getAppID(), $aArgs);
		$this->writeJs($sInitScript);
		
		$sFormScript = usbuilder()->getFormAction('fancybox_add','adminExecContentSave');
		$this->writeJs($sFormScript);
		
		usbuilder()->validator(array('form' => 'fancybox_add'));
		
		$iRows = 5;
		$iPage = $aArgs['page'] ? $aArgs['page'] : 1;
		$aOption['limit'] = $iRows;
		$aOption['offset'] = $iRows * ($iPage - 1);

	    $aOption['search'] = $aArgs['search'] ? $aArgs['search'] : "";
	    $aOption['image_url'] = $aArgs['image_url'] ? $aArgs['image_url'] : "";
		$aOption['sortby'] = $aArgs['sortby'] ? $aArgs['sortby'] : "";
		$aOption['sort'] = $aArgs['sort'] ? $aArgs['sort'] : ""; 
		
		$sSort = !$aArgs['sort'] || $aArgs['sort'] == '' || $aArgs['sort'] == 'asc' ? 'desc' : 'asc';
        $sFilenameClass = $aArgs['sortby'] == 'image_url' && $aArgs['sort'] == 'desc' ? 'des' : 'asc';
        $sTitleClass = $aArgs['sortby'] == 'title' && $aArgs['sort'] == 'desc' ? 'des' : 'asc';
        $sDateClass = $aArgs['sortby'] == 'date_created' && $aArgs['sort'] == 'desc' ? 'des' : 'asc';
        $sApperanceClass = $aArgs['sortby'] == 'idx' && $aArgs['sort'] == 'desc' ? 'des' : 'asc';
      		
		$oModelContents = new modelFancybox();
		$aContentsList = $oModelContents->getContents($aOption);
		$iResultCount = $oModelContents->getResultCount($aOption);
		
		$aCount['total'] = $oModelContents->getResultCount(array());
		
		$sDateTimeFormat = 'm/d/Y';
		$i = 0;
		foreach($aContentsList as $key => $val)
		{
			$aContentsList[$key]['num'] = $iResultCount - $aOption['offset'] - $i;
			$aContentsList[$key]['date_created'] = date($sDateTimeFormat, $aContentsList[$key]['date_created']);
			$aContentsList[$key]['image_size'] = $aContentsList[$key]['width'] .'x'. $aContentsList[$key]['height'];
			$i++;
		
		}
		
        $this->assign("aImageList" , $aContentsList);
        $this->assign('sPagination', usbuilder()->pagination($iResultCount, $iRows));
        $this->assign('itotal', $aCount['total']);
        
        $this->assign('filenameClass', $sFilenameClass);
        $this->assign('titleClass', $sTitleClass);
        $this->assign('dateClass', $sDateClass);
        $this->assign('apperanceClass', $sApperanceClass);
        $this->assign('catClass1', $sSort);
        
        
        $this->importCSS('fancybox_admin');
        $this->importCSS('jquery.fancybox');
        
        $this->importJS('jquery.fancybox');   
        $this->importJS('fancybox_admin');


      
        
        
        $this->view(__CLASS__);
	}
}