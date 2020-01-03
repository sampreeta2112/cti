<?php

function GetPagination($page,$total_pages,$targetpage,$param='')
{
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/PAGE_LIMIT);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev$param\">&lt;&lt; previous</a>";
		else
			$pagination.= "<span class=\"disabled\">&lt;&lt; previous</span>";	
		
		//pages	
		if ($lastpage < 7 + (PAGE_ADJUSTMENT * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter$param\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + (PAGE_ADJUSTMENT * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + (PAGE_ADJUSTMENT * 2))		
			{
				for ($counter = 1; $counter < 4 + (PAGE_ADJUSTMENT * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter$param\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1$param\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage$param\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - (PAGE_ADJUSTMENT * 2) > $page && $page > (PAGE_ADJUSTMENT * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1$param\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2$param\">2</a>";
				$pagination.= "...";
				for ($counter = $page - PAGE_ADJUSTMENT; $counter <= $page + PAGE_ADJUSTMENT; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter$param\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1$param\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage$param\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1$param\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2$param\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + (PAGE_ADJUSTMENT * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter$param\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next$param\">next &gt;&gt;</a>";
		else
			$pagination.= "<span class=\"disabled\">next &gt;&gt;</span>";
		$pagination.= "</div>\n";		
	}
	
	return $pagination;
}

?>