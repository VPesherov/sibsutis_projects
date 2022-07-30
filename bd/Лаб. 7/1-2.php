<?php
	$size=1;
	function print_array($array)
	{
		print "<p>";
		foreach ($array as $val)
		{
			print "$val  ";
		}
		print "</p>";
	}
	
	for($i=1; $i<=30; $i++)
	{
	    $treug[$i] = ($i*($i+1))/2;
		$kvd[$i] = ($i*$i);
	}
	
	print "<table border=1 cellpadding=5>\n";
	for($x=1; $x <= 30; $x++)
	{
		print "<tr>\n";
		for($y=1; $y <= 30; $y++)
		{
			$var =$x*$y;
			if (in_array($var, $treug) && in_array($var, $kvd))
			{
				print "\t<td bgcolor=red><font size=$size>";
			}
			else if (in_array($var, $treug))
			{
				print "\t<td bgcolor=green><font size=$size>";
			}
			else if (in_array($var, $kvd))
			{
				print "\t<td bgcolor=blue><font size=$size>";
			}
			else
			{
				print "\t<td bgcolor=white><font size=$size>";
			}
			print "$var";
			print "</td>\n";
			print "</font>";
		}
		print "</tr>\n";
	}
	print "</table>";
	
	print_array($treug);
?>