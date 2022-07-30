<?php
	function AddFive(&$num)
	{
		$num += 5;
	}
	$var = 10;
	AddFive($var);
	print $var;
?>
