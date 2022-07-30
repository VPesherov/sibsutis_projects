<?php
	function print_file($file)
	{
		$handle = fopen($file, "r");
		while (!feof($handle)) 
		{
			print fgets($handle) . "<br>";
		}

		fclose($handle);	
	}
	
	$file = "./notebook_brNN.txt";
	$pattern = '/([0-9]{4})-([0-9]{2})-([0-9]{2})/';
	$replacement = "$3-$2-$1";
	
	$servername = "localhost";
	$user = "root";
	$pass = "";
	$db = "sample";

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
  
	if (file_exists($file)) 
	{
		print "Файл существует!<br>";
		print_file($file);
	} 
	else 
	{
		$fh = fopen($file, 'w');
  
		$result = mysqli_query($conn, "SELECT * FROM notebook_brNN");	
		if (!$result)
		{ 
			$dberror = mysqli_error($conn);
			print "$dberror";
			return false;
		}

		$output = "";
		while($a_row = mysqli_fetch_row($result)) 
		{
			foreach ($a_row as $key => $val) 
			{
				$output .= $val." | ";
			}
			$output .= "\n";
		}
		$output = preg_replace($pattern, $replacement, $output);

		fwrite($fh, $output);
		fclose($fh);
		print_file($file);
	}
?>