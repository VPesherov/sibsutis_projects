<?php
    $servername = "localhost";
    $user = "root";
    $pass = "";
    $db = "study";
  
	$conn = mysqli_connect($servername, $user, $pass);
	if (!$conn)
	{ 
		$dberror = mysqli_error($conn);
		print "$dberror";
		return false;
	} 
		
	if (!mysqli_select_db($conn, $db))
	{ 
		$dberror = mysqli_error($conn);
		print "$dberror";
		return false;
	}
?>