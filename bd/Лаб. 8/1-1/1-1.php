<?php
	$al=($_GET['align']);
	$val=($_GET['valign']);
	print "<p><table border=1 width=100 align=center>\n";
		print "<tr>";
			print "<td height=\"100\" width=\"100\" align=$al valign=$val>";
				print "Текст<br>";
			print "</td>";
		print "</tr></table>\n";
	print "<p align=center><a href='1-1.html'>назад</a>";
?>