<?php

class modelFancybox extends modelFancybox
{
	function insertContents($aData)
	{
		$sQuery = "INSERT INTO faqpia_contents (category, question, answer, author, status, date_created, date_modified)
		VALUES('$aData[category]', '$aData[question]' , '$aData[answer]', '$aData[author]' , '$aData[status]', " . time() . ", " . time() . " )";
	
		return $this->query($sQuery);
	}
	
	
}
