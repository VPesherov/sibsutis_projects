<?php
	$size=1;	
	print "<table border=1 cellpadding=0>\n";
	for($x=1; $x <= 30; $x++)
	{
		print "<tr>\n";
		for($y=1; $y <= 30; $y++)
		{
			$var =$x*$y;
			switch($var % 7)
			{
				case 0:
					print "\t<td height=\"14\" width=\"14\" bgcolor=white><font size=$size>";
					break;
				case 1:
					print "\t<td height=\"14\" width=\"14\" bgcolor=aqua><font size=$size>";
					break;
				case 2:
					print "\t<td height=\"14\" width=\"14\" bgcolor=blue><font size=$size>";
					break;
				case 3:
					print "\t<td height=\"14\" width=\"14\" bgcolor=yellow><font size=$size>";
					break;
				case 4:
					print "\t<td height=\"14\" width=\"14\" bgcolor=purple><font size=$size>";
					break;
				case 5:
					print "\t<td height=\"14\" width=\"14\" bgcolor=red><font size=$size>";
					break;
				case 6:
					print "\t<td height=\"14\" width=\"14\" bgcolor=lime><font size=$size>";
					break;
			}
			print "&nbsp;";
			print "</td>\n";
			print "</font>";
		}
		print "</tr>\n";
	}
	print "</table>";
?>