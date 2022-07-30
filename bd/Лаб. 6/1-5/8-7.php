<?php
function FontSize($txt, $size=4) 
{
	print "<font size=\"$size\">$txt</font>";
}

FontSize("<p>Крупный шрифт", 5);
FontSize("<p>Нормальный шрифт, первая строка");
FontSize("<p>Нормальный шрифт, вторая строка");
?>