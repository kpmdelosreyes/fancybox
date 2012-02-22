<?php

class modelFancybox extends Model
{
	function getContents($aOption)
	{
		$sQuery = "SELECT * FROM fancybox_contents WHERE seq = " . $aOption[seq];
		if($aOption['search'] != false)
		{
			$sQuery .= " AND image_url LIKE '%".$aOption[search]."%' OR title LIKE '%".$aOption[search]."%' ";
		}
		
		if($aOption['image_url'] != false)
		{
			$sQuery .= " AND image_url LIKE '%".$aOption[image_url]."%' ";
		}
	 	if ($aOption['sortby']) {
			$sQuery .= " ORDER BY $aOption[sortby] $aOption[sort]";
		} 
		
		if ($aOption['limit']) {
			$sQuery .= " LIMIT $aOption[offset], $aOption[limit]";
		}
	
		return $this->query($sQuery);
		
		
	}
	
	function insertContents($aData)
	{
		$sQuery = "INSERT INTO fancybox_contents (seq, title, caption, image_url, width, height, date_created)
		VALUES('$aData[seq]','$aData[imagetitle]', '$aData[imagecaption]' , '$aData[imageurl]', '$aData[imagewidth]' , '$aData[imageheight]', " . time() . " )";
	
		return $this->query($sQuery);
	}
	
	function getResultCount($aOption)
    {
        $sQuery = "SELECT count(*) as count FROM fancybox_contents";
        $mResult = $this->query($sQuery);
        return $mResult[0]['count'];
    }
    
	
	function deleteContents($sIdx)
	{
		$rest = substr($sIdx, 0,-1);
		$sQuery = "Delete FROM fancybox_contents WHERE idx IN($rest)";
		return $this->query($sQuery);
	}
	
	function updateContents($aData)
	{

		$sQuery = "UPDATE fancybox_contents SET title ='".$aData[imagetitle]."', caption = '".$aData[imagecaption]."', date_modified = ". time() . " WHERE idx= '".$aData[idx]."'";
		return $this->query($sQuery);
	
	}
	
	
	function getData($aData)
	{
		$sQuery = "SELECT * FROM fancybox_contents WHERE idx='".$aData[idx]."'";
		return $this->query($sQuery, "row");
	}
	
	function getImages($aOption)
	{
		$sQuery = "SELECT * FROM fancybox_contents ORDER BY date_created DESC";
		if ($aOption['limit']) {
			$sQuery .= " LIMIT $aOption[offset], $aOption[limit]";
		}
		return $this->query($sQuery);
		
	}	
	
	function getSeqCount($aData)
	{
		$sQuery = "SELECT count(*) AS value FROM fancybox_contents WHERE seq=" .$aData['seq'];
		$mResult = $this->query($sQuery);
        return $mResult[0]['value'];
	}
	
	
	function deleteContentsBySeq($aSeq)
	{
		$sSeqs = implode(',', $aSeq);
		$sQuery = "Delete from fancybox_contents where seq in($sSeqs)";
		$mResult = $this->query($sQuery);
		return $mResult;
	}
	
	
}
