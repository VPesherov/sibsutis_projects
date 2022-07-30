<?php
	$file = "./notebook_brNN.txt";
	$pattern = '/(\S+)@(\S+)/i';
	$replacement = "<a href='mailto:$1@$2'>$1@$2</a>";

	if (file_exists($file)) 
	{
		$file_array = array();
		$fh = fopen($file, 'r');

		while (!feof($fh)) 
		{
			$line = fgets($fh);

			if (trim($line) != "")
			{
				$line = preg_replace($pattern, $replacement, $line);
				array_push($file_array, $line);
			}
		}

		$output = "<h3>Моя записная книжка</h3><table border=1>";

		foreach($file_array as $ss) 
		{
			$output .= "<tr><td>";
			$ss = rtrim($ss, "| \n");

			while (($offset = strpos($ss, "|")) != false) 
			{
				$ss = substr_replace($ss, "</td><td>", $offset, 1);
			}
			$output .= $ss;
			$output .= "</td></tr>";
		}

		$output .= "</table>";

		print $output;

		print "Дата последней записи: ".date("F d Y H:i:s.", filemtime($file));
		fclose($fh);
	} 
	else 
	{
		print "No such file";
	} 
?>