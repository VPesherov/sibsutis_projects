<?php	
	$lang = $argv[1];
	
	switch($lang)
	{
		case "ru":
			print "Русский";
			break;
		case "en":
			print "Английский";
			break;
		case "fr":
			print "Французский";
			break;
		case "de":
			print "Немецкий";
			break;
		default:
			print "Язык неизвестен";
			break;
	}
?>