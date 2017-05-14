
<?php

	include 'lib/header.php';
 	include 'lib/datalogin.php';
	include 'lib/family_record_data.php';
	include 'lib/functions.php';
?>
<html>
<head>
   <title>blazonry.com database tutorial - Insert Data lesson</title>

</head>
<body bgcolor="#ffffff">

<p><font size=5><b> Update flight status </b> </font></p>

<?php

	//var_dump($_SERVER);
	debug_var_dump($_POST);
	echo "<br/> <br/>";

	echo ("Update Family Record:\n $father| $mother| $phone| $cell| $address |$email <br/>");
	//


	$flight_id 		= $_POST['flight_id'];
	$sensor_id 		= $_POST['sensor_id'];
	$sensor_stat 	= $_POST['sensor_stat'];
	$sensor_msg 	= $_POST['sensor_msg'];

	// update sensor status

/*	$SQL	= " INSERT INTO sensor_status (flightid, sensorid, status)
				SELECT * FROM (SELECT $flight_id, $sensor_id, $sensor_stat) AS tmp
					WHERE NOT EXISTS (
				    SELECT flightid, sensorid, status  FROM sensor_status WHERE flightid=$flight_id and sensorid = $sensor_id
				) LIMIT 1";
*/

$SQL	= "INSERT INTO sensor_status (flightid, sensorid, status, message)
 VALUES( $flight_id, $sensor_id, $sensor_stat, $sensor_msg) ON DUPLICATE KEY UPDATE
flightid=$flight_id, sensorid=$sensor_id, status=$sensor_stat, message=$sensor_msg";

//	$SQL = "update family_info set $set_list where id=$familyid";
	debug_msg ("SQL is ($SQL)");

	$result = mysql_db_query($db,"$SQL",$cid);
	debug_msg ("db update result ($result)");

	// check for error
	if (!$result) { echo("ERROR: " . mysql_error() . "\n$SQL\n");	}
	else {
		echo "Family Record Updated !!!";
	}

?>

</body>
</html>
