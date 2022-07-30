<?php
	$color="blue";
	$plus_color="red";
	print "<table border=1 cellpadding=5>\n";
	for ($x=1; $x <= 10; $x++)
	{
		print "<tr>\n";
		for ($y=1; $y <= 10; $y++)
		{
			print "\t<td>";
			if ($x == 1 && $y == 1)
			{
				print "<font color=$plus_color>";
				print ("+");
				print "</font>";
			}
			else if ($x == 1 || $y == 1)
			{
				print "<font color=$color>";
				print ($x+$y-1);
				print "</font>";
			}
			else
			{
				print ($x+$y);
			}
			print "</td>\n";
		}
		print "</tr>\n";
	}
	print "</table>";
?>
