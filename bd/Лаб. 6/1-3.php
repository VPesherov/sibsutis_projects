<?php
	function Ru($color)
	{
	    print "<p><font color=$color>Здравствуйте!</font></p>";
	}
	function En($color)
	{
	    print "<p><font color=$color>Hello!</font></p>";
	}
	function Fr($color)
	{
	    print "<p><font color=$color>Bonjour!</font></p>";
	}
	function De($color)
	{
	    print "<p><font color=$color>Guten Tag!</font></p>";
	}
	$lang = $_GET['lang'];
	$color = $_GET['color'];
	$lang($color);
?>