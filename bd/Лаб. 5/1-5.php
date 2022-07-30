<?php	
	$lang = $_GET['lang'];
	if ($lang == "ru")
	{
		print "Русский";
	}
	else if ($lang == "en")
	{
		print "Английский";
	}
	else if ($lang == "fr")
	{
		print "Французский";
	}
	else if ($lang == "de")
	{
		print "Немецкий";
	}
	else
	{
		print "Язык неизвестен";
	}
?>