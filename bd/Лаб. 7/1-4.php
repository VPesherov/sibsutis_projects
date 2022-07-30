<?php
	$size=1;
	$colors = array("white", "aqua", "blue", "yellow", "purple", "red", "lime");
	for($k=4; $k <= 7; $k++)
	{	
		print "<table border=1 cellpadding=0>\n";
		print "<p>k = $k";
		for($x=1; $x <= 30; $x++)
		{
			print "<tr>\n";
			for($y=1; $y <= 30; $y++)
			{
				$var =$x*$y;
				$index = $var % $k;
				print "\t<td height=\"14\" width=\"14\" bgcolor=$colors[$index]><font size=$size>";
				print "&nbsp;";
				print "</td>\n";
				print "</font>";
			}
			print "</tr>\n";
		}
		print "</p>";
	}
	print "</table>";
?>