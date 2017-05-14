<?php

	$myhost = php_uname('n');

	if ( strtoupper($myhost) == "NHXCS-REGISTER")
	{
		$my_serv_mode="DEV";
	}

//	include 'lib/header.php';
 	include 'lib/datalogin.php';
 //	include 'lib/family_record_data.php';
	include 'lib/functions.php';

	session_start();


//include 'lib/header.php';


?>


<html>
<head>
<title>Flight Status</title>
</head>
<body bgcolor="#ffffff" >

<p><b> </b></p>

<hr>

<b> Flight Sensor Status:</b>
<br>
<br>

<?php

	$flight_id 		= $_POST['flight_id'];

//$flight_id 		= 2;


	echo "Flight ID: $flight_id  <br> <br>";

		// setup SQL statement
		$SQL =
		 " SELECT s.*, i.desc1 FROM sensor_status s, sesor_info i WHERE s.flightid=$flight_id and s.SensorId=i.id";
	//	" SELECT * FROM sensor_status WHERE flightid=$flight_id ";

		$retid = mysql_db_query($db, $SQL, $cid);

		echo ("<table style=\"margin-left: 100px\" border=\"1\" >");
		echo 	"<tr>
					<!-- <td> <b> Flight  ID </b> </td>  -->
					<td> <b> Sensor ID </b> </td>
					<td> <b> Sensor Name </b> </td>
					<td> <b> Status </b> </td>
					<td> <b> Message</b> </td>
					<td> <b> Status Time</b> </td>
				</tr>";

		while ($row = mysql_fetch_array($retid))
		{
		// var_dump($row);
		//flightid, sensorid, status, message
			$flightid 	= $row['FlightId'];
			$sensorid 	= $row['SensorId'];
			$sensorname = $row['desc1'];
			$status 	= $row['Status'];
			$message 	= $row['Message'];
			$last 	= $row['CreateDateTime'];

			echo ("<tr>");
		//	echo ("<td>$flightid</td>");
			echo ("<td>$sensorid</td>");
			echo ("<td>$sensorname</td>");
			echo ("<td>$status</td>");
			echo ("<td>$message</td>");
			echo ("<td>$last</td>");

			echo ("</tr>");
		}

		echo ("</table>");
	//	echo ("</dt></p>");

?>


</body>
</html>
