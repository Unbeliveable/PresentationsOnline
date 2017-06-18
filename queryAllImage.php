<?php

	include_once( "dbconfig.php" );

	$conn = new mysqli( $db_severname, $db_username, $db_password, $db_name );
	if ( $conn->connect_error )
	{
		exit();
	}

	$imageDirectory = "upload/";

	$sql = "SELECT * FROM picture WHERE p_picture_gen";
	$result = $conn->query($sql);

	if ( $result->num_rows > 0 ) 
	{
		$arr = array();

		// output data of each row
		while( $row = $result->fetch_assoc() ) 
		{
			$arr[ $row["picture_id"] ] = $imageDirectory.$row["p_picture_gen"];
		}

		echo json_encode($arr);
	}
	$conn->close();
	
?>