
<?php


	/*************************************************************************************/
	// Create a record in the fammily registratio table with status "STARTED"
	/*************************************************************************************/
	function start_registration ($familyId)
	{



	}

	/*************************************************************************************/
	// Get family resgistration status,returns "" or status from registration table
	/*************************************************************************************/
	function get_status ($familyId)
	{


	}
	/*************************************************************************************/

	function debug_msg($x)
	{
		global $my_serv_mode;
		if ($my_serv_mode=="DEV")
		{
			echo "DEBUG===>> $x <<==<br/>";
		}
	}

	function debug_var_dump(&$x)
	{
		global $my_serv_mode;
		if ($my_serv_mode=="DEV")
		{
			var_dump($x);
		}
	}


	function build_update_list(&$d)
	{
		// echo "Called    <br/>";

		$list = array();

		$fields = $d[0];
		$values = $d[1];

		$N = count($fields);

		for($i=0; $i < $N; $i++)
		{
			$s = "$fields[$i]=$values[$i]";
			array_push($list, $s);
		}

		$x = join(",", $list);
		return $x;

	}


	/***********************************************************
	*  Create var/val list for insert statement
	***********************************************************/
	function filter_rec_data(&$rec_data, &$map, &$res)
	{
		$col_list = array();
		$val_list = array();

		foreach ($rec_data as $col => $data) {

			if ( $data[1] == 1 )
			{
				$col_list[] = "$col";
				if ($data[2]=="STR")
				{
					$val_list[] = "'$map[$col]'";
				}
				else
				{
					$val_list[]="$map[$col]";
				}
			}
		}

		array_push($res, $col_list, $val_list);

		return;
	}

	/***********************************************************
	*  Create input fields for a record to be updated
	***********************************************************/
	function create_update_items_a(&$rec_data, &$map)
	{
		echo "re ";
		return;
	}
/*
		foreach ($rec_data as $col => $data) {

			echo "$col <br/>";
	//		if (isset($map[$col]))
			{
				echo "	<tr>
							<td><b>$data[0] : 	</b> </td>
							<td><input type='text' name='$col' value='$map[col]' size=40></td>
						</tr>";
			}
		}

		return;
	}
*/
?>


