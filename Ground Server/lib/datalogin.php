<?php

		$usr 	= "app";
		$pwd 	= "app";
		$db 	= "flight";
		$host	= "localhost";

	//connect to database
	$cid = mysql_connect($host,$usr,$pwd);
	if (!$cid)
	{
		echo("ERROR: " . mysql_error() . "!!\n");
	}

//	echo "cid is ($cid)";
//echo "serv mode is ($my_serv_mode)";
//echo "<br/>";

?>
