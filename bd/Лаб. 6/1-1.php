<?php
	$tdcolor="blue";
	print "<table border=1 cellpadding=5>\n";
	for ($y=1; $y <= 10; $y++)
	{
		print "<tr>\n";
		for ($x=1; $x <= 10; $x++)
		{
			if ($x == $y)
			{
				print "\t<td bgcolor=$tdcolor>";
			}
			else
			{
				print "\t<td>";
			}
			print ($x*$y);
			print "</td>\n";
		}
		print "</tr>\n";
	}
	print "</table>";
?>
