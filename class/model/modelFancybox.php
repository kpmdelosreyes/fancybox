<?php

class modelFancybox extends Model
{
	function getContents($aOption)
	{
		$sQuery = "SELECT * FROM fancybox_contents";
		
		if($aOption['search'] != false)
		{
			$sQuery .= " WHERE image_url LIKE '%".$aOption[search]."%' OR title LIKE '%".$aOption[search]."%' ";
		}
		
		if($aOption['image_url'] != false)
		{
			$sQuery .= " WHERE image_url LIKE '%".$aOption[image_url]."%' ";
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
		$sQuery = "INSERT INTO fancybox_contents (title, caption, image_url, width, height, date_created)
		VALUES('$aData[imagetitle]', '$aData[imagecaption]' , '$aData[imageurl]', '$aData[imagewidth]' , '$aData[imageheight]', " . time() . " )";
	
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

		$sQuery = "UPDATE fancybox_contents SET title ='".$aData[image_title]."', caption = '".$aData[image_caption]."' date_modified = ". time() . " WHERE idx=".$aData['idx'];
		return $this->query($sQuery);
	
	}
	
	
	function getData($sIdx)
	{
		$sQuery = "SELECT * FROM fancybox_contents WHERE idx= '".$sIdx."'";	
		return $this->query($sQuery, "row");
	
	
	}
}
