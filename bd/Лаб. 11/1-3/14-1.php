<html> 
	<head>
		<title> 
			Листинг 14-1. Применение функции ereg()
		</title> 
	</head> 
<body>
<?php
	$url = "http://www.ngs.ru";
	$www_url = preg_match("^(http://www)\.([[:alnum:]]+)\.([[:alnum:]]+)", $url, $regs);
	if ($www_url) 
	{ 
		foreach ($regs as $val) 
		{
			print "<p>$val";
		}
	}
?>
</body> 
</html>
