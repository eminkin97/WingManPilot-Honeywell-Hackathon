
<?php
//	include 'lib/header.php';
// 	include 'lib/datalogin.php';
 	include 'lib/family_record_data.php';
?>
<html>
<head>
   <title>Flight Monitor</title>

</head>
<body bgcolor="#ffffff">

<p><font size=3><b> Sensor Status Update </b> </font></p>

<?php

	// this is processed when the form is submitted
	// back on to this page (POST METHOD)

	if ($REQUEST_METHOD=="POST") {
//									var_dump($_POST);
		include 'lib/functions.php';

		$phone 		= $_POST['home_phone'];
		$email 		= $_POST['email'];

		if ($phone=='' && $email=='')
		{
			echo "email ($email)";
			echo "Need to enter home phone or email. <br/> Go back to create again. <br/>";
	//		header('Location: ' . $_SERVER['HTTP_REFERER']);
			exit();
		}


		if ($_POST['password'] != $_POST['password2'])
		{
			echo "Password does not match! <br>";
			exit();
		}

		echo ("<p><b>Create Family Info Record</b></p>\n");

		////// setup SQL statement
		$d = array();
		filter_rec_data($rec_data_family, $_POST, $d);

		$fields = $d[0];
		$values = $d[1];

		$fields[] = 'password';
		$tmpvar = $_POST['password'];
		$values[] = "'$tmpvar'";

//var_dump($_POST);
//var_dump($fields);
//var_dump($values);
		$x = join(",", $fields);
		$y = join(",", $values);

		$SQL = " INSERT INTO family_info ($x) values($y)";
//echo " SQL is ( $SQL )";
//echo "cid is $cid";
		$result = mysql_db_query($db,"$SQL",$cid);

		// check for error
		if (!$result)
		{
			echo("ERROR: <br/>" . mysql_error() . " <br/> \n$SQL\n");
			echo "$result";
		}

		echo ("<p><b>Family record created</b></p>\n");

		exit();
	}
	else
	{
		/*******************************************************************/
		// Create input form to enter family information
		/*******************************************************************/

		echo "
				<form name='fa' action='family_new.php' method='post'>
				<table>
			";

		$new_line = 1;
		foreach ($rec_data_family as $col => $coldata)
		{
			if ($coldata[1] ==1)
			{
				//	debug_msg ("$data[1] Family field ($col) ($coldata[0]) : ($row[$col])");
				if ( $new_line )
					echo "<tr>";

				echo  "
						<td><b>$coldata[0]: </b> </td>
						<td><input type='text' name='$col' value='' size=40></td>
					";
				if ( ! $new_line )
					echo "</tr>";

				$new_line = 1 - $new_line;
			}
		}

		echo "<tr>
				<td> <b> Password:  </b> </td>
				<td> <b> <input type='password' name='password' />  </b> </td>
			</tr>";

		echo "<tr>
				<td> <b> Retype Password:  </b> </td>
				<td> <b> <input type='password' name='password2' />  </b> </td>
			</tr>";


		echo "<tr>
				<td> <b>How did know our school? </b> </td>
				<td> <select  name=aboutus>
						<option value='friend'			> From Friends 		</option>
						<option value='local_newspaper'	> Local Newspaper 	</option>
						<option value='chinese_newspaper'> Chinese Newspaper </option>
						<option value='internet_search'	> Internet Search 	</option>
						<option value='other'			> Other 		</option>
					</select>
				</td>
			</tr>";

		echo "<tr>
				<th colspan=0><p> <input type='submit' value='Create Family Record'></p></th>
			</tr>";
		echo "</table>";

		echo "</form>";

	}

?>

<?php
	mysql_close($cid);
?>

</body>
</html>
