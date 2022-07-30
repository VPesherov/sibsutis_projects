<?php
$num_of_calls = 0;
function ListItem($txt) 
{
	global $num_of_calls;
	$num_of_calls++;
	print "<b>$num_of_calls: $txt</b>";
}
	ListItem("Видеокамеры");
	print("<p>Sony, Panasonic</p>");
	ListItem("Фотоаппараты");
	print("<p>Canon, Casio");
?>