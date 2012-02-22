<?php

class adminPageSetup extends Controller_Admin
{
	protected function run($aArgs)
	{
		require_once('builder/builderInterface.php');
		usbuilder()->init($this, $aArgs);
		
		usbuilder()->getFormAction('fancybox_add','adminExecContentSave');
		
		usbuilder()->validator(array('form' => 'fancybox_add'));
		
		$iRows = 5;
		$iPage = $aArgs['page'] ? $aArgs['page'] : 1;
		$aOption['limit'] = $iRows;
		$aOption['offset'] = $iRows * ($iPage - 1);

	    $aOption['search'] = $aArgs['search'] ? $aArgs['search'] : "";
	    $aOption['image_url'] = $aArgs['image_url'] ? $aArgs['image_url'] : "";
		$aOption['sortby'] = $aArgs['sortby'] ? $aArgs['sortby'] : "";
		$aOption['sort'] = $aArgs['sort'] ? $aArgs['sort'] : ""; 
		
		$aOption['seq'] = $aArgs['seq'];
		
		$sSort = !$aArgs['sort'] || $aArgs['sort'] == '' || $aArgs['sort'] == 'asc' ? 'desc' : 'asc';
        $sFilenameClass = $aArgs['sortby'] == 'image_url' && $aArgs['sort'] == 'desc' ? 'des' : 'asc';
        $sTitleClass = $aArgs['sortby'] == 'title' && $aArgs['sort'] == 'desc' ? 'des' : 'asc';
        $sDateClass = $aArgs['sortby'] == 'date_created' && $aArgs['sort'] == 'desc' ? 'des' : 'asc';
        $sApperanceClass = $aArgs['sortby'] == 'idx' && $aArgs['sort'] == 'desc' ? 'des' : 'asc';
      		
		$aContentsList = common()->modelContents()->getContents($aOption);
		$iResultCount = common()->modelContents()->getResultCount($aOption);
		
		$aCount['total'] = common()->modelContents()->getSeqCount($aOption);
		$aCount['total'] = $aCount['total'] ? $aCount['total'] : 0;
		
		$sDateTimeFormat = 'm/d/Y';
		$i = 0;
		foreach($aContentsList as $key => $val)
		{
			$aContentsList[$key]['num'] = $aCount['total'] - $aOption['offset'] - $i;
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
        
        $this->assign("seq" , $aOption['seq']);
        
        $this->importCSS('fancybox_admin');
        $this->importCSS('jquery.fancybox');
        
        $this->importJS('jquery.fancybox');   
        $this->importJS('fancybox_admin');
        
        $this->view(__CLASS__);
	}
}