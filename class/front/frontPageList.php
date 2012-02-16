<?php
class frontPageList extends Controller_Front
{
    protected function run($aArgs)
    {

        //$this->getOption());

        require_once('builder/builderInterface.php');
        usbuilder()->init($this, $aArgs);

        $aOption['seq'] = $this->getSequence();

        $oModelContents = new modelContents();
        $aContentsList = $oModelContents->getContentsList($aOption);

        foreach ($aContentsList as $key => $val) {
            $aContentsList[$key]['date_created'] = date('Y-m-d H:i:s', $val['date_created']);
        }

        $this->loopFetch($aContentsList);
        $iResultCount = count($aContentsList);

        if ($iResultCount == 0) $this->fetchClear();
    }
}
