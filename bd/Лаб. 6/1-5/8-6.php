<?php
function ListItem($txt) 
{
	static $num_of_calls = 0;
	$num_of_calls++;
	print "<b>$num_of_calls. $txt</b>";
}
	ListItem("Видеокамеры ");
	print("<p>Sony, Panasonic</p>");
	ListItem("Фотоаппараты");
	print("<p>Canon, Casio");
?>