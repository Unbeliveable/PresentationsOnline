<?php

	include_once( "dbconfig.php" );
	$profiles_id=$_COOKIE[ "p_id" ];

	$conn = new mysqli( $db_severname, $db_username, $db_password, $db_name );
	if ( $conn->connect_error )
	{
		exit();
	}

	$imageDirectory = "upload/";

	$sql = "SELECT * FROM picture WHERE profile_id = ('$profiles_id')";
	$result = $conn->query($sql);

	if ( $result->num_rows > 0 ) 
	{
		$arr = array();

		// output data of each row
		while( $row = $result->fetch_assoc() ) 
		{
			$arr[ $row["picture_id"]." : ".$row["p_namepic"] ] = $imageDirectory.$row["p_picture_gen"];
		}

		echo json_encode($arr);
	}
	$conn->close();
	
?>