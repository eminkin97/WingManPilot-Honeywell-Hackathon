
<?php

	function query_class_info(&$res)
	{
		global $db, $cid;

		$SQL = $SQL . "select * from class where school_year = 2013";

		debug_msg("SQL ($SQL) ");

		$retid = mysql_db_query($db, $SQL, $cid);

		if (!$retid) {
			echo("ERROR: " . mysql_error() . "\n$SQL\n");
		}
		else {
			debug_msg ("sql ok");
		}

		$all_types = array();

		while ($row = mysql_fetch_array($retid))
		{
			$type = $row['type'];
			$code = $row['code'];
			$xname = "class_" . "$type";
//			debug_msg ("ar name ($xname)");

			if ( ! array_key_exists($type, $all_types) )
			{
				$all_types[$type]=0;
				$$xname = array();
			}

			$all_types[$type] += 1;
			array_push ($$xname , $row);

//echo "<br/> CL <br/>";
//		var_dump(${$xname});
//			debug_msg("One class  $type  $code");
		}

//		debug_msg("Done");
//		var_dump($all_types);
//		echo "<br/> CL <br/>";
//		var_dump($class_CL);
//		echo "<br/>";

		foreach ($all_types as $type => $val)
		{
			$xname = "class_" . "$type";
			$res[$type] = $$xname;
		}

//		var_dump($res);
//		echo "<br/>";

		debug_msg("Return");
	}

	$chinese_class_list;

	$chinese_class_list["MLP1"] = "Ma Li Ping Grade 1";
	$chinese_class_list["MLP2"] = "Ma Li Ping Grade 2";
//	$chinese_class_list[""] = "";


	$culture_class_list;
	$culture_class_list["KARATE1"] 	= "Karate 1 - Mr. Wang 1:00PM-1:45PM";
	$culture_class_list["MUSIC1"] 	= "Music 1 Violin Ms A, 2:00PM-3:00PM";
//	$culture_class_list[""] = "";
?>
