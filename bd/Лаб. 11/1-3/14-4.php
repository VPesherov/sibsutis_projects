<html> 
	<head>
		<title> 
			Листинг 14-4. Идентификация браузера
		</title> 
	</head> 
<body>
<?php
	function browser_info ($agent) 
	{
		global $type_vers;
		
		if (preg_match('MSIE ([0-9].[0-9]{1,2})', $agent, $version)) 
		{
			$browse_type = "IE";
			$browse_version = $version[1];
		}
		else if(preg_match('Opera ([0-9].[0-9]{1,2})', $agent, $version)) 
		{
			$browse_type = "Opera";
			$browse_version = $version[1];
		}
		else if(preg_match('Mozilla/([0-9].[0-9]{1,2})', $agent, $version)) 
		{
			$browse_type = "Netscape";
			$browse_version = $version[1];
		}
		else 
		{
			$browse_type = "Неизвестно";
			$browse_version = "Неизвестно";
		}
		$type_vers = array($browse_type, $browse_version);
		return $type_vers;
	}
	
	function opsys_info($agent) 
	{
		if (strstr($agent, 'Win')) 
		{
			$opsys = "Windows";
		}
		else if(strstr($agent, 'Linux')) 
		{
			$opsys = "Linux";
		}
		else 
		{
			$opsys = "Неизвестно";
		}
		return $opsys;
	}
	
	browser_info($_SERVER['HTTP_USER_AGENT']);
	$browse_type = $type_vers[0];
	$browse_version = $type_vers[1];
	$operating_sys = opsys_info($_SERVER['HTTP_USER_AGENT']);
	print "Тип браузера: $browse_type <br>";
	print "Версия браузера: $browse_version <br>";
	print "Операционная система: $operating_sys";
?>
</body> 
</html>