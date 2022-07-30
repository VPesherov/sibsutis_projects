<?php
	$size=7;
	$day[0] = "Понедельник";
	$day[1] = "Вторник";
	$day[2] = "Среда";
	$day[3] = "Четверг";
	$day[4] = "Пятница";
	$day[5] = "Суббота";
	$day[6] = "Воскресенье";

	$color[0] = "red";
	$color[1] = "blue";
	$color[2] = "yellow";
	$color[3] = "black";
	$color[4] = "cyan";
	$color[5] = "green";
	$color[6] = "orange";
			
	function WeekDay($day, $color)
	{
		global $size;
		print "<p><font color=$color><font size=$size>$day</font></font></p>";
		$size--;
	}
			
	for ($i=0; $i < 7; $i++)
	{
		WeekDay($day[$i], $color[$i]);
	}
?>