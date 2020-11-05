<?php
	
	function get_sql($sf, $si, $sc)
	{
		$rtn = "SELECT * FROM books NATURAL JOIN category WHERE ";
		
		if($sf != "")
		{
			//search in
			$si = strtolower($si);
			if ($si == 'anywhere')
			{
				$rtn = $rtn . search_for("title", $sf) . "OR ";
				$rtn = $rtn . search_for("author", $sf) . "OR ";
				$rtn = $rtn . search_for("publisher", $sf) . "OR ";
				$rtn = $rtn . search_for("isbn", $sf);
			}
			else
			{
				$rtn = $rtn . search_for($si, $sf);
			}
			$rtn = $rtn . "AND ";
		}
		
		$rtn = $rtn . "quantity > 0 ";
		
		if ($sc != "all")
		{
			$rtn = $rtn . "AND cat_name = \"" . $sc . "\"";
		}
		
		
		$rtn = $rtn . ";";
		return $rtn;
	}
	
	function search_for($str, $sf)
	{
		//search for
		$sfArray = explode(',', $sf);
		
		foreach ($sfArray as $key)
		{
			return $str . " like \"%" . $key . "%\" ";
		}
	}
?>