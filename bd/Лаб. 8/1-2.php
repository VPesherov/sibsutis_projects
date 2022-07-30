<html> 
	<head>
		<title> 
			Листинг 10-7. HTML-форма, вызывающая саму себя 
		</title> 
	</head> 
<body> 
<?php 	
		if ($_GET['align']==null) 
		{
			$align = "left";
		}
		else 
		{
			$align = $_GET['align'];
		}
		if ($_GET['valign']==null) 
		{
			$valign = "top";
		}
		else 
		{
			$valign = $_GET['valign'];
		}
		print "<p><table border=1 width=100 align=center>\n";
			print "<tr>";
				print "<td height=\"100\" width=\"100\" align=$align valign=$valign>";
					print "Текст<br>";
				print "</td>";
			print "</tr></table>\n";
?>
<p><b>Выберите горизонтальное расположение:</b>
<form action="<?=$_SERVER['PHP_SELF'] ?>" method="get">
	<p><input type="radio" name="align" value="left" checked>слева
	<p><input type="radio" name="align" value="center">по центру
	<p><input type="radio" name="align" value="right">справа
<p><b>Выберите вертикальное расположение:</b>
	<p><input type="checkbox" name="valign" value="top" checked>вверху
	<p><input type="checkbox" name="valign" value="middle">посередине
	<p><input type="checkbox" name="valign" value="bottom">внизу
	<p><input type="submit" value="Выполнить">
</form>
</body> 
</html>